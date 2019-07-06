<?php

require_once 'models/CentrosParroquiales.php';

class CentrosParroquialesController{
	
	public function Index() {
		$centros = new CentroParroquiales();
		$litasCen = $centros->MotrarCentroParroquiales();
		require_once 'views/layout/menu.php';		
        require_once 'views/centrosparroquiales/listacentrosparroquiales.php';
	}
	public function Detalles() {
		if($_GET['id']){
			$id_centro_parroquiales = $_GET['id'];
			
			$cetro = new CentroParroquiales();
			$cetro->setId_centro_parroquiales($id_centro_parroquiales);
			$detalles = $cetro->MostrarDetallesCentroParroquial();
			
			require_once 'views/layout/menu.php';		
			require_once 'views/centrosparroquiales/detalles.php';
		}
	}
	public function Guardar() {
		if($_POST){
			$id_sacerdote = isset($_POST['sacerdote'])? $_POST['sacerdote']:FALSE;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$municipio = isset($_POST['municipio']) ? $_POST['municipio']:FALSE;					
			$fiesta_patronal = isset($_POST['fiesta']) ? $_POST['fiesta']:FALSE;	
			
			if($id_sacerdote && $nombre && $direccion && $municipio && $fiesta_patronal){
				$centro = new CentroParroquiales();
				$centro->setNombre($nombre);
				$centro->setId_sacerdote($id_sacerdote);
				$centro->setDireccion($direccion);
				$centro->setMunicipio($municipio);
				$centro->setFiesta_patronal($fiesta_patronal);
				
				$file = $_FILES['foto'];
				$nomFile = $file['name'];
				$type = $file['type'];
				
				$dir = 'imagenes/centroparroquial';
				//validando el tipo de imagen 
				if($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg'){
					if(!is_dir($dir)){
						mkdir($dir,0777,TRUE);
					}
					$centro->setFoto($nomFile);
					move_uploaded_file($file['tmp_name'], $dir.'/'.$nomFile);
				}
				$resp = $centro->Guardar();
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
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
						  title: "¡Registro no Guardado !",
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
	}
	public function Editar() {
		if($_GET['id']){
			$id_centro_parroquiales = $_GET['id'];
			
			$cetro = new CentroParroquiales();
			$cetro->setId_centro_parroquiales($id_centro_parroquiales);
			$detalles = $cetro->MostrarDetallesCentroParroquial();
			
			require_once 'views/layout/menu.php';		
			require_once 'views/centrosparroquiales/editar.php';
		}
	}
	public function Actualizar() {
		if($_POST['id']){
			$id_centro_parroquiales = $_POST['id'];
			$id_sacerdote = isset($_POST['sacerdote'])? $_POST['sacerdote']:FALSE;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$municipio = isset($_POST['municipio']) ? $_POST['municipio']:FALSE;					
			$fiesta_patronal = isset($_POST['fiesta']) ? $_POST['fiesta']:FALSE;	
			
			if($id_centro_parroquiales && $id_sacerdote && $nombre && $direccion && $municipio && $fiesta_patronal){
				$centro = new CentroParroquiales();
				$centro->setId_centro_parroquiales($id_centro_parroquiales);
				$centro->setNombre($nombre);
				$centro->setId_sacerdote($id_sacerdote);
				$centro->setDireccion($direccion);
				$centro->setMunicipio($municipio);
				$centro->setFiesta_patronal($fiesta_patronal);
				
				$file = $_FILES['foto'];
				$nomFile = $file['name'];
				$type = $file['type'];
				
				$dir = 'imagenes/centroparroquial';
				
				if(empty($nomFile)){
					$centro->setFoto($_POST['fotoActual']);
				}else{
					if(!empty($_POST['fotoActual'])){
						unlink($dir.'/'.$_POST['fotoActual']);
					}
					
					if ($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg') {
						if (!is_dir($dir)) {
							mkdir($dir, 0777, TRUE);
						}
						$centro->setFoto($nomFile);
						move_uploaded_file($file['tmp_name'], $dir.'/'.$nomFile);
				}
				}
								
				$resp = $centro->Actualizar();
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actualizada correctamente",
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
						  title: "¡Registro no Actualizado !",
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
	}
	public function Eliminar() {
		if($_GET['id']){
			$id = $_GET['id'];
			$centro = new CentroParroquiales();
			$tabla = 'centro_parroquiales';
			$parm = $id;
			$resp = $centro->Eliminar($tabla, $parm);
			if($resp){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada Correctamente",
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
						  title: "¡Error Al Eliminar el Registros !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "registro";

							}
						})

			  	</script>';
			}
		}
	}
}
