<?php

require_once 'models/Usuario.php';
require_once 'models/Permisos.php';
require_once 'models/ListaPermiso.php';

class UsuarioController{
	
	public function Index() {
		
		$usuarios = new Usuario();
		
		$tabla = "usuarios";
		$ordena = "nombre";
		$forma = "ASC";
		
		$listaUsuario = $usuarios->MostrarTodo($tabla,$ordena,$forma);
		
				
		require_once 'views/layout/menu.php';
		require_once 'views/usuario/usuarios.php';		
		
	}
	public function Mostrarusuario() {
		$usuarios = new Usuario();
		
		$tabla = "usuarios";
		$ordena = "nombre";
		$forma = "ASC";
		
		$listaUsuario = $usuarios->MostrarTodo($tabla,$ordena,$forma);
		return $listaUsuario;
	}    
    public function Save(){
        
		if (isset($_POST)) {
			
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$pass = isset($_POST['password']) ? $_POST['password'] : false;
			$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
			$estado = isset($_POST['estado']) ? $_POST['estado'] : false;
			
			if($nombre && $pass && $tipo && $estado){
				
				$usuario = new Usuario();
				
				$usuario->setNombre($nombre);
				
				$password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
				$usuario->setPassword($password);
				$usuario->setTipo($tipo);
				$usuario->setEstado($estado);
				
				$file = $_FILES['img'];
				$imgname = $file['name'];
				$tipo = $file['type'];
				
				if($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png"){
								
					if(!is_dir('imagenes/perfil')){
					
						mkdir('imagenes/perfil',0777,TRUE);
					}
					
					$usuario->setImg($imgname);
					move_uploaded_file($file['tmp_name'], 'imagenes/perfil/'.$imgname);
					
				}
				
				$save = $usuario ->save();
				
				//var_dump($save);
				
				if($save){
					
					echo'<script>

					swal({
						  type: "success",
						  title: "Usuario ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
					
				}else{
					echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puedo registrar Usuario!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "registro";

							}
						})

			  	</script>';

			  	return;
				}
				
			}			
			//header('location:index');
			
		}
        
    }
	public function Editar() {
		
		require_once 'views/layout/menu.php';
		
		if($_GET['id']){
			$id = $_GET['id'];
			$usuario = new Usuario();
			
			$tabla = "usuarios";
			$infoUser = $usuario->MostrarPorId($tabla, $id);
			
			require_once 'views/usuario/editar.php';
			
		}
		
	}	
	public function Eliminar() {
		
		require_once 'views/layout/menu.php';
		
		if($_GET['id']){
			$id = $_GET['id'];
			$usuario = new Usuario();
			$tabla = "usuarios";
			
			//mostrando los datos del usuario a eliminar  
			
			$datos = $usuario ->MostrarPorId($tabla, $id);
			
			while ($row = $datos->fetch_object()) {
				if($row->img){
				unlink('imagenes/perfil/'.$row ->img);
				}
			}
			
			
			$resul = $usuario->Eliminar($tabla, $id);
					
			
			if($resul){
				echo'<script>

					swal({
						  type: "success",
						  title: "Usuario ha sido Eliminado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puedo Eliminar Usuario!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
			}
		}
	}	
	public function Login() {
		if(isset($_POST)){
			
			$usuario = new Usuario();
			$usuario->setNombre($_POST['nombre']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->Login();
			//var_dump($identity);
			
			if($identity && is_object($identity)){
				
				$_SESSION['identity'] = $identity;
								
					header('location:'.URL_BASE.'frontend/principal');
					
					
				
			} else {
				
				header('Location:'.URL_BASE); 
			}
			
		}		
		
	}
	public function Salir() {
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		header('Location:'.URL_BASE); 
	}
	public function Perfil() {
		
		if($_GET['id']){
			
			$id = $_GET['id'];
			$usuario = new Usuario();
			
			$tabla = "usuarios";
			$infoUser = $usuario->MostrarPorId($tabla, $id);
			
			require_once 'views/layout/menu.php';		
			require_once 'views/usuario/perfil.php';
		}		
		
	}
	public function Actualizar() {
		
		if($_POST['id']){		
			
			$id = $_POST['id'];
			
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			
			if(empty($_POST['password'])){				
				$password = $_POST['passwordActual'];
			} else {
				
				$password = password_hash($_POST['password'],PASSWORD_BCRYPT,['cost' => 4]) ;
			}
			
			$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
			$estado = isset($_POST['estado']) ? $_POST['estado'] : false;
			
			if($id && $nombre && $password && $tipo && $estado){
				
				$usuario = new Usuario();
				
				$usuario->setId($id);
				$usuario->setNombre($nombre);
				$usuario->setPassword($password);
				$usuario->setTipo($tipo);
				$usuario->setEstado($estado);
				
				//valinado imagen a modificar
				if (empty($_FILES['img']['name'])) {
					
					$img = $_POST['imgActual'];
					
					$usuario->setImg($img);
					
				} else {
					
					unlink('imagenes/perfil/'.$_POST['imgActual']);
				

					$file = $_FILES['img'];
					$img = $file['name'];
					$tipoimg = $file['type'];

					if ($tipoimg == 'image/jpg' || $tipoimg == 'image/jpeg' || $tipoimg == 'image/png') {

						if (!is_dir('imagenes/perfil')) {
							mkdir('imagenes/perfil', 0777, TRUE);
						}

						$usuario->setImg($img);
						move_uploaded_file($file['tmp_name'], 'imagenes/perfil/'. $img);
					}
				}
				
				$resul = $usuario->Actualizar();								
				
				if($resul){
						echo'<script>

					swal({
						  type: "success",
						  title: "Usuario Actualizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
				}else{
					
					echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puedo Actualizar Usuario!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';

			  	return;
					
				}
			}
			
		}
	}
	public function Permisos() {
		$permisos = new Permisos();
		$listaPermisos = $permisos->ListaModulos();
		require_once 'views/layout/menu.php';
		require_once 'views/usuario/permisos.php';				
	}
	public function savepermisos() {
		if($_POST){
			$id_usuario = $_POST['usuario'];				
			$permisos = new Permisos();
			$lisper = new ListaPermiso();
			$lista = $permisos->ListaModulos();
			
			$json = array();
			while ($row = $lista->fetch_object()) {
				$nombre = str_replace(' ','', $row->nombre);
				$estado = 'on';
				if(!empty($_POST["$nombre"]) == 'on'){
					$id_permiso = $_POST['id_'.$nombre];			
					$json[] = array('id'=>$id_permiso);									
				}
			}
			$datosjson = json_encode($json);
			$lisper->setId_usuario($id_usuario);
			
			
			$persAsg = $lisper->VerpermisosAsignados();			
			
			if($persAsg->num_rows == 0){
				$lisper->setId_usuario($id_usuario);
				$lisper->setId_permiso($datosjson);
				$resp = $lisper->GuardarPermisos();
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Permisos agregados correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "permisos";

							}
						})

					</script>';
				}else{
					echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puedo agregar permisos!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "permisos";

							}
						})

			  	</script>';
				}
			}elseif ($persAsg->num_rows > 0) {
					$lisper->setId_usuario($id_usuario);
					$lisper->Eliminalistapermisos();
					
					$lisper->setId_usuario($id_usuario);
					$lisper->setId_permiso($datosjson);
					$resp = $lisper->GuardarPermisos();
					if ($resp) {
						echo'<script>

						swal({
							  type: "success",
							  title: "Permisos agregados correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "permisos";

								}
							})

						</script>';
					} else {
						echo'<script>

						swal({
							  type: "error",
							  title: "¡No se puedo agregar permisos!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "permisos";

								}
							})

					</script>';
					}
			}else{
				echo'<script>

						swal({
						  title: "No puede registar Permisos",
						  text: "El Usuario ya tiene permisos Aginados. Ingrese ha opcion de Editar perfil!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						}).then(function(result){
							if (result.value) {

							window.location = "permisos";

							}
						})
						

			  	</script>';
			}
		}
	}
	public function PermisosPorUsuario($id) {
		if($id){
			$id_usuario = $id;
			$per = new ListaPermiso();
			$per->setId_usuario($id_usuario);
			$listper = $per->VerpermisosAsignados();
			return $listper;
		}
	}
	public function VerModulos($id) {
		$id_modulo = $id;
		$modulo = new Permisos();
		$modulo->setId_permiso($id_modulo);
		$lista = $modulo->VerListaModulos();
		return $lista;
	}
	public function VerListaModulos() {
		$permisos = new Permisos();
		$listaPermisos = $permisos->ListaModulos();
		return $listaPermisos;		
	}
	public function Registro() {		
		require_once 'views/layout/menu.php';
		require_once 'views/usuario/registro.php';		
	}

}
