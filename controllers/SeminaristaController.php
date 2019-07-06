<?php

require_once 'models/Seminarista.php';

class SeminaristaController {

	public function Index() {
		
		$seminarista = new Seminarista();
		
		$lista = $seminarista ->MostrarSeminaristas();
		
		
		require_once 'views/layout/menu.php';
		require_once 'views/seminarista/listaseminarista.php';
		
		
		
	}
	
	public function Seminarista() {
		
		if($_GET['id']){
			
			$id = $_GET['id'];
			
			$seminarista = new Seminarista();
			
			$seminarista->setId($id);
			$detallesSeminarista = $seminarista->MostrarDetallesSeminarista();
			
			require_once 'views/layout/menu.php';
			require_once 'views/seminarista/perfil.php';
		}else{
			header('location:'.URL_BASE.'frontend/principal');
		}
		
				
	}
	public function Editar() {
		
		if($_GET['id']){
			
			$id_seminarista = $_GET['id'];			
			$seminarista = new Seminarista();
			$seminarista->setId($id_seminarista);
			$datosSeminarista = $seminarista ->MostrarDetallesSeminarista();
			
			require_once 'views/layout/menu.php';
			require_once 'views/seminarista/editar.php';
			
		}else{
			header('location:'.URL_BASE.'seminarista/');
		}
		
	}
	public function Guardar() {
		if($_POST){			
			$nombre = isset($_POST['nombre'])? $_POST['nombre']:FALSE;
			$apellido = isset($_POST['apellido'])? $_POST['apellido']:FALSE;
			$fechaNacimiento = isset($_POST['fechanacimiento'])?$_POST['fechanacimiento']:FALSE;
			$lugarNacimiento = isset($_POST['lugarnacimiento'])?$_POST['lugarnacimiento']:FALSE;
			$telefono = isset($_POST['telefono'])?$_POST['telefono']:FALSE;
			$email = isset($_POST['email'])?$_POST['email']:FALSE;
		
			if($nombre && $apellido && $fechaNacimiento && $lugarNacimiento ){
				
				$seminarista = new Seminarista();
				
				$seminarista->setNombre($nombre);
				$seminarista->setApellido($apellido);
				$seminarista->setFechaNacimiento($fechaNacimiento);
				$seminarista->setLugarNacimiento($lugarNacimiento);
				$seminarista->setTelefono($telefono);
				$seminarista->setEmail($email);
				
				$filefoto = $_FILES['foto'];
				$nomFile = $filefoto['name'];
				$type = $filefoto['type'];
								
				$dir = 'imagenes/seminarista';
				
				if($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg'){
					
					if(!is_dir($dir)){
						mkdir($dir, 0777,TRUE);
					}
					$seminarista->setFoto($nomFile);
					move_uploaded_file($filefoto['tmp_name'], $dir.'/'.$nomFile);
				}
				$resp =  $seminarista ->Guardar();
				
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

							window.location = "registro";

							}
						})

			  	</script>';
					
				}
				
			}
				
			
		}
	}
	
	public function Actualizar() {
		if($_POST['id']){
			$id_seminarista = $_POST['id'];
			$nombre = isset($_POST['nombre'])? $_POST['nombre']:FALSE;
			$apellido = isset($_POST['apellido'])? $_POST['apellido']:FALSE;
			$fechaNacimiento = isset($_POST['fechanacimiento'])?$_POST['fechanacimiento']:FALSE;
			$lugarNacimiento = isset($_POST['lugarnacimiento'])?$_POST['lugarnacimiento']:FALSE;
			$telefono = isset($_POST['telefono'])?$_POST['telefono']:FALSE;
			$email = isset($_POST['email'])?$_POST['email']:FALSE;
			
			if($id_seminarista && $nombre && $apellido){
				$seminarista = new Seminarista();
				$seminarista->setId($id_seminarista);
				$seminarista->setNombre($nombre);
				$seminarista->setApellido($apellido);
				$seminarista->setFechaNacimiento($fechaNacimiento);
				$seminarista->setLugarNacimiento($lugarNacimiento);
				$seminarista->setTelefono($telefono);
				$seminarista->setEmail($email);
				
				$filename = $_FILES['foto'];
				$nomFile = $filename['name'];
				$type = $filename['type'];
				
				$dir = 'imagenes/seminarista';
				
				if(empty($nomFile)){
					
					$foto = $_POST['fotoActual'];
					$seminarista->setFoto($foto);
					
				}else{
					$filename = $_FILES['foto'];
					$nomFile = $filename['name'];
					$type = $filename['type'];
					
					if($type == 'image/png' || $type == 'image/jpg' || $type = 'image/jpeg'){
						
						if(!empty($_POST['fotoActual'])){
							unlink($dir.'/'.$_POST['fotoActual']);
						}
						
						$seminarista->setFoto($nomFile);
						move_uploaded_file($filename['tmp_name'],$dir.'/'.$nomFile);
						
					}
				}
				$resul = $seminarista->Actualizar();
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actulizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Actualizado !",
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
	
	public function Eliminar() {
		if($_GET['id']){
			$id_seminarista = $_GET['id'];
			$seminarista = new Seminarista();
			$seminarista->setId($id_seminarista);
			$detalle = $seminarista->MostrarDetallesSeminarista();
			
			$dir = 'imagenes/seminarista';
			
			while ($row = $detalle-> fetch_object()) {
				if($row->foto != ''){
					unlink($dir.'/'.$row->foto);
				}
			}
			$tabla = 'seminarista';
			$parm = $id_seminarista;
			$resul = $seminarista->Eliminar($tabla, $parm);
			
			if($resul){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada correctamente",
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
						  title: "¡Registro no Elimidado !",
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