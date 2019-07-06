<?php

require_once 'models/Sacerdote.php';
require_once 'models/Estudio.php';
require_once 'models/HistoriaCural.php';
require_once 'models/DatosMinisteriales.php';
require_once 'models/ObservacionesParroco.php';
require_once 'models/Parroquia.php';
require_once 'models/CargosDiocesanos.php';
require_once 'models/HistoriaEstado.php';

class SacerdoteController {

	public function Index() {
		
		$sacerdotes = new Sacerdote();
		
		$lista = $sacerdotes ->MostrarParroco();
		
		
		require_once 'views/layout/menu.php';
		require_once 'views/sacerdote/listasacerdote.php';
	}	
	public function Sacerdote() {
		
		if($_GET['id']){
			
			$id = $_GET['id'];
			
			$parroco = new Sacerdote();
			
			$parroco->setId($id);
			$detallesParroco = $parroco->MostrarDetallesParroco();
			
			require_once 'views/layout/menu.php';
			require_once 'views/sacerdote/perfil.php';
		}else{
			header('location:'.URL_BASE.'frontend/principal');
		}
					
	}
	public function MostrarDatosMinisteriales() {
		if($_GET['id']){
			$id_sacerdote = $_GET['id'];			
			$datos = new DatosMinisteriales();
			$datos->setId_sacerdote($id_sacerdote);
			
			$listdatos = $datos->MostrarDatos();
			
			return $listdatos;
			
		}
		
	}
	public function MostraEstudioFilosofia() {
		if($_GET['id']){
			$id_sacerdote = $_GET['id'];			
			$estdio = new Estudios();
			$estdio->setId_sacerdote($id_sacerdote);
			
			$listEstuF = $estdio->MostrarEstFilosofia();
			
			return $listEstuF;
			
		}
	}
	public function MostraEstudioTeologia() {
		if($_GET['id']){
			$id_sacerdote = $_GET['id'];			
			$estdio = new Estudios();
			$estdio->setId_sacerdote($id_sacerdote);			
			$listEstuF = $estdio->MostrarEstTeologia();
			
			return $listEstuF;
			
		}
	}	
	public function Mostrarespecializacion() {
		if($_GET['id']){
			$id_sacerdote = $_GET['id'];			
			$estdio = new Estudios();
			$estdio->setId_sacerdote($id_sacerdote);
			
			$listEstu = $estdio->MostrarEspecializaciones();
			
			return $listEstu;
			
		}
		
	}	
	public function MostrarHistoriaCural() {
		if($_GET['id']){
			$id_sacerdote = $_GET['id'];
			$historia = new HistoriaCural();
			$historia->setId_sacerdote($id_sacerdote);
			$listHist = $historia->MostrarHistoriaCural();
			return $listHist;
		}
	}	
	public function MostrarObservaciones() {
		if($_GET['id']){
			$id_sacerdote = $_GET['id'];
			$observacione = new ObservacionesParroco();
			$observacione->setId_sacerdote($id_sacerdote);
			$listObs = $observacione->MostrarObservaciones();
			return $listObs;
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
				
				$sacerdote = new Sacerdote();
				
				$sacerdote->setNombre($nombre);
				$sacerdote->setApellido($apellido);
				$sacerdote->setFechaNacimiento($fechaNacimiento);
				$sacerdote->setLugarNacimiento($lugarNacimiento);
				$sacerdote->setTelefono($telefono);
				$sacerdote->setEmail($email);
				
				$filefoto = $_FILES['foto'];
				$nomFile = $filefoto['name'];
				$type = $filefoto['type'];
								
				$dir = 'imagenes/parroco';
				
				if($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg'){
					
					if(!is_dir($dir)){
						mkdir($dir, 0777,TRUE);
					}
					$sacerdote->setFoto($nomFile);
					move_uploaded_file($filefoto['tmp_name'], $dir.'/'.$nomFile);
				}
				$resp =  $sacerdote ->Guardar();
				
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
	public function GuardarDatos() {
		if($_POST['id_sacerdote']){
			
			$id_sacerdote = $_POST['id_sacerdote'];
			$lugarOrdenacion = isset($_POST['lugarOrdenacion']) ? $_POST['lugarOrdenacion']:FALSE;
			$fechaordenacion = isset($_POST['fechaOrdenacion']) ? $_POST['fechaOrdenacion']:FALSE;
			$parroquiaOrdenacion = isset($_POST['parroquiaordenacion']) ? $_POST['parroquiaordenacion']:FALSE;
			$parroquiaActual = isset($_POST['parroquiaActual']) ? $_POST['parroquiaActual']:FALSE;
			$cargo = isset($_POST['cargo']) ? $_POST['cargo']:FALSE;
			$teologia =  isset($_POST['teologia']) ? $_POST['teologia']:FALSE;			
			$filosofia =  isset($_POST['filosofia']) ? $_POST['filosofia']:FALSE;
			
				
			
			if ($id_sacerdote && $lugarOrdenacion && $fechaordenacion && $parroquiaOrdenacion && $parroquiaActual ) {
				
				$datos = new DatosMinisteriales();
				$datos->setId_sacerdote($id_sacerdote);
				$datos->setLugarOrdenacion($lugarOrdenacion);
				$datos->setFechaordenacion($fechaordenacion);
				$datos->setParroquiaOrdenacion($parroquiaOrdenacion);
				$datos->setParroquiaActual($parroquiaActual);
				$datos->setCargo($cargo);
				
				if(!empty($filosofia)){
					$estudio = new Estudios();
					$estudio->setId_sacerdote($id_sacerdote);
					$estudio->setEstudio($filosofia);	
					$estudio->GuardarEstFilosofia();
				}
				if(!empty($teologia)){					
					$teolog = new Estudios();
					$teolog->setId_sacerdote($id_sacerdote);
					$teolog->setEstudio($teologia);	
					$teolog->GuardarEstTeologia();
					
				}
				
				
				
				$reps = $datos->GuardarDato();
				
				if (true) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function Editar() {
		if($_GET['id']){
			
			$id_sacerdote = $_GET['id'];
			$sacerdote = new Sacerdote();
			$sacerdote->setId($id_sacerdote);
			$datosSacerdote = $sacerdote->MostrarDetallesParroco();
			
			require_once 'views/layout/menu.php';
			require_once 'views/sacerdote/editar.php';
		}else{
			header('location:'.URL_BASE.'sacerdote/listasacerdote');
		}
	}
	public function EditarDatos() {
		if($_POST['id_sacerdote']){
			
			$id_sacerdote = $_POST['id_sacerdote'];
			$lugarOrdenacion = isset($_POST['lugarOrdenacion']) ? $_POST['lugarOrdenacion']:FALSE;
			$fechaordenacion = isset($_POST['fechaOrdenacion']) ? $_POST['fechaOrdenacion']:FALSE;
			$parroquiaOrdenacion = isset($_POST['parroquiaordenacion']) ? $_POST['parroquiaordenacion']:FALSE;
			$parroquiaActual = isset($_POST['parroquiaActual']) ? $_POST['parroquiaActual']:FALSE;
			$cargo = isset($_POST['cargo']) ? $_POST['cargo']:FALSE;
			
			if ($id_sacerdote && $lugarOrdenacion && $fechaordenacion && $parroquiaOrdenacion && $parroquiaActual ) {
				$datos = new DatosMinisteriales();
				$datos->setId_sacerdote($id_sacerdote);
				$datos->setLugarOrdenacion($lugarOrdenacion);
				$datos->setFechaordenacion($fechaordenacion);
				$datos->setParroquiaOrdenacion($parroquiaOrdenacion);
				$datos->setParroquiaActual($parroquiaActual);
				$parr = new Parroquia();
				if($cargo == "Vicario"){
					$parr->setId_vicario($id_sacerdote);
				}else{
					$parr->setId_sacerdote($id_sacerdote);
				}
				
				$parr->setId($parroquiaActual);
				$parr->ActualizarSacerdote();
				
				$datos->setCargo($cargo);
				
				$reps = $datos->ActualizarDato();
				
				if (true) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Actulizado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function GuardarDatosM() {
		if($_POST['id_sacerdote']){
			
			$id_sacerdote = $_POST['id_sacerdote'];
			$lugarOrdenacion = isset($_POST['lugarOrdenacion']) ? $_POST['lugarOrdenacion']:FALSE;
			$fechaordenacion = isset($_POST['fechaOrdenacion']) ? $_POST['fechaOrdenacion']:FALSE;
			$parroquiaOrdenacion = isset($_POST['parroquiaordenacion']) ? $_POST['parroquiaordenacion']:FALSE;
			$parroquiaActual = isset($_POST['parroquiaActual']) ? $_POST['parroquiaActual']:FALSE;
			$cargo = isset($_POST['cargo']) ? $_POST['cargo']:FALSE;
			
			if ($id_sacerdote && $lugarOrdenacion && $fechaordenacion && $parroquiaOrdenacion && $parroquiaActual ) {
				$datos = new DatosMinisteriales();
				$datos->setId_sacerdote($id_sacerdote);
				$datos->setLugarOrdenacion($lugarOrdenacion);
				$datos->setFechaordenacion($fechaordenacion);
				$datos->setParroquiaOrdenacion($parroquiaOrdenacion);
				$datos->setParroquiaActual($parroquiaActual);
				$parr = new Parroquia();
				if($cargo == "Vicario"){
					$parr->setId_vicario($id_sacerdote);
				}else{
					$parr->setId_sacerdote($id_sacerdote);
				}
				
				$parr->setId($parroquiaActual);
				$parr->ActualizarSacerdote();
				
				$datos->setCargo($cargo);
				
				$reps = $datos->GuardarDato();
				
				if (true) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Actulizado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function Actualizar() {
		if($_POST['id_sacerdote']){
			
			$id = $_POST['id_sacerdote'];
			$nombre = isset($_POST['nombre'])? $_POST['nombre']:FALSE;
			$apellido = isset($_POST['apellido'])? $_POST['apellido']:FALSE;
			$fechaNacimiento = isset($_POST['fechanacimiento'])?$_POST['fechanacimiento']:FALSE;
			$lugarNacimiento = isset($_POST['lugarnacimiento'])?$_POST['lugarnacimiento']:FALSE;
			$telefono = isset($_POST['telefono'])?$_POST['telefono']:FALSE;
			$email = isset($_POST['email'])?$_POST['email']:FALSE;
			
			if($id && $nombre && $apellido && $fechaNacimiento && $lugarNacimiento){
				$sacerdote = new Sacerdote();
				$sacerdote->setId($id);
				$sacerdote->setNombre($nombre);
				$sacerdote->setApellido($apellido);
				$sacerdote->setFechaNacimiento($fechaNacimiento);
				$sacerdote->setLugarNacimiento($lugarNacimiento);
				$sacerdote->setTelefono($telefono);
				$sacerdote->setEmail($email);
				
				$file = $_FILES['foto'];
				$nomFile = $file['name'];
				$type = $file['type'];
				
				$dir = 'imagenes/parroco';
				
				if(!empty($nomFile)){
					if($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg'){
						if(!empty($_POST['fotoActual'])){
							unlink($dir.'/'.$_POST['fotoActual']);
						}
						$sacerdote->setFoto($nomFile);
						move_uploaded_file($file['tmp_name'], $dir.'/'.$nomFile);
					}
				}else{
					$sacerdote->setFoto($_POST['fotoActual']);
				}
				$resp = $sacerdote->Actualizar();
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id.'";

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

							window.location = "sacerdote&id='.$id.'";

							}
						})

			  	</script>';
				}
			}
		} else {
			header('location:'.URL_BASE.'sacerdote/listasacerdote');
		}
	}
	public function Eliminar() {
		if($_GET['id']){
			$id = $_GET['id'];
			$sacerdote = new Sacerdote();
			$sacerdote->setId($id);
			$resp = $sacerdote->EliminarSacrdote();
			if($resp){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id.'";

							}
						})

					</script>';
			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id.'";

							}
						})

			  	</script>';
			}
			
		}else{
			header('location:'.URL_BASE.'sacerdote/listasacerdote');
		}
	}
	public function EliminarHist() {
		if($_GET['id']){
			$id = $_GET['id'];
			$ids = $_GET['ids'];
			$hist = new Sacerdote();
			$tabla = 'historial_cural';
			$parm = $id;
			$resp = $hist->Eliminar($tabla, $parm);
			if($resp){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$ids.'";

							}
						})

					</script>';
			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$ids.'";

							}
						})

			  	</script>';
			}
			
		}else{
			header('location:'.URL_BASE.'sacerdote/listasacerdote');
		}
	}
	public function GuardarEspecializacion() {
		if($_POST['id_sacerdote']){
			$id_sacerdote = $_POST['id_sacerdote'];
			$especializacion = isset($_POST['Especializacion'])? $_POST['Especializacion']:FALSE;
			
			
			
			if($id_sacerdote && $especializacion){
				$estudio = new Estudios();
				$estudio->setId_sacerdote($id_sacerdote);
				$estudio->setEstudio($especializacion);
				
				$resp = $estudio->GuardarEspecializacion();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

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

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function GuardarEstFilosofia () {
			if($_POST['id_sacerdote']){
			$id_sacerdote = $_POST['id_sacerdote'];
			$estFilosofia = isset($_POST['estudioFilosofia'])? $_POST['estudioFilosofia']:FALSE;
			
			
			
			if($id_sacerdote && $estFilosofia){
				$estudio = new Estudios();
				$estudio->setId_sacerdote($id_sacerdote);
				$estudio->setEstudio($estFilosofia);
				
				$resp = $estudio->GuardarEstFilosofia();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

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

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function GuardarHistorial() {
		if($_POST['id_sacerdote']){
			$id_sacerdote = $_POST['id_sacerdote'];
			$parroquia = isset($_POST['parroquia']) ? $_POST['parroquia']:FALSE;
			$cargo = isset($_POST['cargo']) ? $_POST['cargo']:FALSE;
			$fecha = isset($_POST['fecha']) ? $_POST['fecha']:FALSE;
			$desde = null;
			
			if($id_sacerdote && $parroquia && $cargo && $fecha){
				$historia = new HistoriaCural();
				$historia->setId_sacerdote($id_sacerdote);
				$historia->setParroquia($parroquia);
				$historia->setCargo($cargo);
				$historia->setDesde($desde);
				$historia->setHasta($fecha);				
				
				$resul = $historia->GuardarHistoria();
				
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

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

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				}
			} else {
				header('location:sacerdote&id='.$id_sacerdote);
			}			
			
		}
	}
	public function GuardarObservacion() {
		if($_POST['id_sacerdote']){
			$id_sacerdote = $_POST['id_sacerdote'];
			$comentario = isset($_POST['observacion']) ? $_POST['observacion']:FALSE;
			
			if($id_sacerdote && $comentario){
				
				$observaciones = new ObservacionesParroco();
				$observaciones->setId_sacerdote($id_sacerdote);
				$observaciones->setComentario($comentario);
				
				$resul = $observaciones->Guardar();
				
				if($resul){
					
					echo'<script>

					swal({
						  type: "success",
						  title: "Observacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

					</script>';
					
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Observacion no Guardada !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				}
			}
			
		}
		
	}
	public function EliminarEstF() {
		if($_GET['id']){
			$id_parroco = $_GET['idp'];
			$id_estudio = $_GET['id'];
			$estudio = new Estudios();
			$tabla= 'estudios_filosafia';
			$parm = $id_estudio;
			
			$resul = $estudio->Eliminar($tabla, $parm);
			if($resul){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_parroco.'";

							}
						})

					</script>';
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Al Eliminar el Registros !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_parroco.'";

							}
						})

			  	</script>';
			}
		}
	}
	public function EliminarEstE() {
		if($_GET['id']){
			$id_parroco = $_GET['idp'];
			$id = $_GET['id'];
			$estudio = new Estudios();
			$tabla= 'estudios_especializaciones';
			$parm = $id;
			
			$resul = $estudio->Eliminar($tabla, $parm);
			if($resul){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_parroco.'";

							}
						})

					</script>';
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Al Eliminar el Registros !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_parroco.'";

							}
						})

			  	</script>';
			}
		}
	}
	public function EliminarObservacion() {
		if($_GET['id']){
			$id_parroco = $_GET['idp'];
			$id_observacion = $_GET['id'];
			$obser = new ObservacionesParroco();
			$tabla= 'observ_parroco';
			$parm = $id_observacion;
			
			$resul = $obser->Eliminar($tabla, $parm);
			if($resul){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_parroco.'";

							}
						})

					</script>';
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Al Eliminar el Registros !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_parroco.'";

							}
						})

			  	</script>';
			}
		}
	}
	public function Realizartraslado() {
		if($_POST['id_sacerdote']){
			 $id_sacerdote = $_POST['id_sacerdote'];
			 $id_parroquia_trasn = $_POST['parroquiatraslado'];
			 $cargoRealizar = $_POST['cargoarealizar'];
			 $sacDefaul = 113;
			 $parDefaul = 60;
			 $fecha = date('Y');
			 //consultar informacion dela parroquia de traslado
			 $parTras = new Parroquia();
			 $parTras->setId($id_parroquia_trasn);
			 $datos = $parTras->MostrarDetalesParroquia();
			 //consulta a la informacion de la parroquia a trasladar
			 while ($row2 = $datos->fetch_object()) {
				 $nombreP = $row2->nombre;
				 $id_sac_par_tras = $row2->id_sacerdote;
				 $id_vic_par_tras = $row2->id_vicario;
				 $idsacAnt = $row2->id_sac_anterios;
				 $idvicAnt = $row2->id_vic_anterior;
			 }
			 //consulta a la informacion del sacerdote a trasladar
			 $inf = new Sacerdote();
			 $inf ->setId($id_sacerdote);
			 $datosparActu = $inf->VerParroquiaactual();
			 
			  while ($rowP= $datosparActu->fetch_object()) {
				  $parActu = $rowP->id_parroquia;
				  $parTras = new Parroquia();
				  $parTras->setId($parActu);
				  $datos = $parTras->MostrarDetalesParroquia();
				//consulta a la informacion de la parroquia a trasladar
				  while ($row2 = $datos->fetch_object()) {
					 $parActuN = $row2->nombre;					
				  }

				$sacer = $rowP->id_sacerdote;
				 $vicar = $rowP->id_vicario;
				 $saAnt = $rowP->id_sac_anterios;
				 $viAnt = $rowP->id_vic_anterior;				 
			 }
			 if($cargoRealizar == 'sacerdote'){
				 
				 if($sacDefaul != $id_sac_par_tras){
					$hst2 = new HistoriaCural();
					$hst2->setId_sacerdote($id_sac_par_tras);
					$resul2 = $hst2->verHultinoRegitro();
					$cargo2 = 'sacerdote';
					//revisando el ultimo registro de la historia para saber
					//cual fue su fechas de ultimo traslado
					while ($row1 = $resul2->fetch_object()) {
						$ultimoCargoF2 = $row1->hasta;
					}
					//verificando que si tiene fecha registrada
					if (!empty($ultimoCargoF2)) {
						//verificando que si la fecha anterior es igual ala actual
						if ($ultimoCargoF2 == $fecha) {
							$fechainicio2 = $fecha;
						} else {
							$fechainicio2 = (int) $ultimoCargoF + 1;
						}
					} else {
						//asignando el valor en caso que no tenga registro anteriores
						$fechainicio2 = $fecha;
					}
					
					$histo2 = new HistoriaCural();
					$histo2->setId_sacerdote($id_sac_par_tras);
					$histo2->setParroquia($nombreP);
					$histo2->setCargo($cargo2);
					$histo2->setDesde($fechainicio2);
					$histo2->setHasta($fecha);					
					$histo2->GuardarHistoria();
					
					$pendtras = new HistoriaEstado();
					$pendtras->setId_sacerdote($id_sac_par_tras);
					$pendtras->GuardarP();
				} 
				 if($id_sacerdote == $sacer){
					 $cargo = 'sacerdote';
				 }else{
					 $cargo = 'vicario';
				 }
				 if ($parActu != $parDefaul) {
					$histo2 = new HistoriaCural();
					$histo2->setId_sacerdote($id_sacerdote);
					$histo2->setParroquia($parActuN);
					$histo2->setCargo($cargo);
					$histo2->setDesde($fechainicio2);
					$histo2->setHasta($fecha);
					$histo2->GuardarHistoria();					
				}
				 $trasS = new Parroquia();
				 $trasS->setId($id_parroquia_trasn);
				 $trasS->setId_sacerdote($id_sacerdote);
				 $trasS->setId_sac_anterior($id_sac_par_tras);				 
				 $resp = $trasS->Traslado();
				 
				 if($resp){
					 echo'<script>

					swal({
						  type: "success",
						  title: "Traslado realizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

					</script>';
				 } else {
					 echo'<script>

					swal({
						  type: "error",
						  title: "¡Traslado no realizado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				 }
				 				 
			 }else{
				 
				 if($sacDefaul != $id_vic_par_tras){
					$hst2 = new HistoriaCural();
					$hst2->setId_sacerdote($id_vic_par_tras);
					$resul2 = $hst2->verHultinoRegitro();
					$cargo2 = 'vicario';
					//revisando el ultimo registro de la historia para saber
					//cual fue su fechas de ultimo traslado
					while ($row1 = $resul2->fetch_object()) {
						$ultimoCargoF2 = $row1->hasta;
					}
					//verificando que si tiene fecha registrada
					if (!empty($ultimoCargoF2)) {
						//verificando que si la fecha anterior es igual ala actual
						if ($ultimoCargoF2 == $fecha) {
							$fechainicio2 = $fecha;
						} else {
							$fechainicio2 = (int) $ultimoCargoF + 1;
						}
					} else {
						//asignando el valor en caso que no tenga registro anteriores
						$fechainicio2 = $fecha;
					}
					
					$histo2 = new HistoriaCural();
					$histo2->setId_sacerdote($id_vic_par_tras);
					$histo2->setParroquia($nombreP);
					$histo2->setCargo($cargo2);
					$histo2->setDesde($fechainicio2);
					$histo2->setHasta($fecha);					
					$histo2->GuardarHistoria();					

					$pendtras = new HistoriaEstado();
					$pendtras->setId_sacerdote($id_vic_par_tras);
					$pendtras->GuardarP();
				}
				
				if($id_sacerdote == $vicar){
					 $cargo = 'vicario';
				 }else{
					 $cargo = 'sacerdote';
				 }
				 if ($parActu != $parDefaul) {
					$histo2 = new HistoriaCural();
				    $histo2->setId_sacerdote($id_sacerdote);
				    $histo2->setId_parroquia($parActuN);
				    $histo2->setCargo($cargo);
				    $histo2->setDesde($fechainicio2);
				    $histo2->setHasta($fecha);					
				    $histo2->GuardarHistoria();
				 } 	 
									
				 $trasS = new Parroquia();
				 $trasS->setId($id_parroquia_trasn);
				 $trasS->setId_vicario($id_sacerdote);
				 $trasS->setId_vic_anterior($id_vic_par_tras);				 
				 $resp = $trasS->Traslado();			
				
				 if($resp){
					 echo'<script>

					swal({
						  type: "success",
						  title: "Traslado realizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

					</script>';
				 } else {
					 echo'<script>

					swal({
						  type: "error",
						  title: "¡Traslado no realizado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				 }
			 }	 		 		
			 
				 
		} else {			
			header('location:sacerdote/');
		}
	}
	public function GuardarCargo() {
		if($_POST['id_sacerdote']){
			$id_sacerdote = $_POST['id_sacerdote'];
			$nombre = isset($_POST['cargo'])?$_POST['cargo']:FALSE;
			$fecha =  isset($_POST['fecha'])?$_POST['fecha']:FALSE;
			if($id_sacerdote && $nombre && $fecha){
				$cargo = new CargoDiocesanos();
				$cargo->setId_sacerdote($id_sacerdote);
				$cargo->setNombre($nombre);
				$cargo->setFecha($fecha);
				
				$resp = $cargo->Guardar();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sacerdote&id='.$id_sacerdote.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function MostrarCargos() {
		if($_GET['id']){
			$id_sacerdote = $_GET['id'];
			$cargo = new CargoDiocesanos();
			$cargo->setId_sacerdote($id_sacerdote);
			$listcar = $cargo->MostarCargosSacerdote();
			return $listcar;
		}
	}
}