<?php

require_once 'models/Relaciones.php';
require_once 'models/RelacionesExternas.php';
require_once 'models/RelacionesDistintas.php';
require_once 'models/RelacionesInternas.php';
require_once 'models/Institutos.php';

class RelacionesController {

	public function listasinternas() {
		
		$relaciones = new Relaciones();
		
		//$listaExt = $relaciones->RelacionesExternas();
		//$listaDis = $relaciones->RelacionesDistintas();
		$listaInt = $relaciones->RelacionesInternas();
		
		require_once 'views/layout/menu.php';
		require_once 'views/relaciones/listainternas.php';
	}
	public function listasexternas() {
		
		$relaciones = new Relaciones();
		
		$listaExt = $relaciones->RelacionesExternas();
		//$listaDis = $relaciones->RelacionesDistintas();
		//$listaInt = $relaciones->RelacionesInternas();
		
		require_once 'views/layout/menu.php';
		require_once 'views/relaciones/listasexternas.php';
	}
	public function listasdistintas() {
		
		$inst = new Instituto();
		
		//$listaExt = $relaciones->RelacionesExternas();
		$listaDis = $inst->VerListaInstitutos();
		//$listaInt = $relaciones->RelacionesInternas();
		
		require_once 'views/layout/menu.php';
		require_once 'views/relaciones/listardistintas.php';
	}
	public function listasdlaicales() {
		
		$relaciones = new Relaciones();
		
		//$listaExt = $relaciones->RelacionesExternas();
		$listaDis = $relaciones->RelacionesDistintas();
		//$listaInt = $relaciones->RelacionesInternas();
		
		require_once 'views/layout/menu.php';
		require_once 'views/relaciones/listalaicales.php';
	}
	public function GuardarInternas() {
		if($_POST){
			$nombreEntidad = isset($_POST['nombreEntidad']) ? $_POST['nombreEntidad']:FALSE;
			$encargadoEntidad = isset($_POST['encargadoEntidad']) ? $_POST['encargadoEntidad']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$promedioEdad = isset($_POST['promedioEdad']) ? $_POST['promedioEdad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$email = isset($_POST['email']) ? $_POST['email']:FALSE;
			
			if($nombreEntidad && $encargadoEntidad && $direccion && $promedioEdad && $telefono && $email){
				$relacion = new RelacionesInternas();
				$relacion->setNombreEntidad($nombreEntidad);
				$relacion->setEncargadoEntidad($encargadoEntidad);
				$relacion->setDireccion($direccion);
				$relacion->setPromedioEdad($promedioEdad);
				$relacion->setTelefono($telefono);
				$relacion->setEmail($email);
				
				$resul = $relacion->Guardar();
				
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "relaciones";

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

							window.location = "relaciones";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function GuardarExternas() {
		if($_POST){
			$nombreEntidad = isset($_POST['nombreEntidad']) ? $_POST['nombreEntidad']:FALSE;
			$encargadoEntidad = isset($_POST['encargadoEntidad']) ? $_POST['encargadoEntidad']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;			
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			
			
			if($nombreEntidad && $encargadoEntidad && $direccion  && $telefono ){
				$relacion = new RelacionesExternas();
				$relacion->setNombreEntidad($nombreEntidad);
				$relacion->setEncargadoEntidad($encargadoEntidad);
				$relacion->setDireccion($direccion);				
				$relacion->setTelefono($telefono);
				
				$file = $_FILES['contrato'];
				$nomfile = $file['name'];
				$type = $file['type'];
								
				$dir = 'contratos';
			
				if($type == 'application/pdf'){
					
					if(!is_dir($dir)){
						mkdir($dir,0777,TRUE);
					}
					$relacion->setContrato($nomfile);
					move_uploaded_file($file['tmp_name'], $dir.'/'.$nomfile);
				}				
				
				$resul = $relacion->Guardar();
				
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "relaciones";

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

							window.location = "relaciones";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function GuardarDistinta() {
		if($_POST){
			$nombreInstituto = isset($_POST['nombreEntidad']) ? $_POST['nombreEntidad']:FALSE;
			$encargado = isset($_POST['encargadoEntidad']) ? $_POST['encargadoEntidad']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;			
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;		
			
			
			if($nombreInstituto && $encargado && $direccion  && $telefono ){
				$relacion = new RelacionesDistintas();
				$relacion->setNombreInstituto($nombreInstituto);
				$relacion->setEncargado($encargado);
				$relacion->setDireccion($direccion);				
				$relacion->setTelefono($telefono);			
				
				$resul = $relacion->Guardar();
				
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "relaciones";

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

							window.location = "relaciones";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function GuardarInstituto() {
		if($_POST){
			$nombreInstituto = isset($_POST['nombreInstituto']) ? $_POST['nombreInstituto']:FALSE;
			$presencia_diocesis = isset($_POST['presencia']) ? $_POST['presencia']:FALSE;			
			$fiesta_patronal = isset($_POST['fiestapatronal']) ? $_POST['fiestapatronal']:FALSE;
			
			
			if($nombreInstituto && $presencia_diocesis &&  $fiesta_patronal ){
				$inst = new Instituto();
				$inst->setNombreInstituto($nombreInstituto);		
				$inst->setPresencia_diocesis($presencia_diocesis);
				$inst->setFiesta_patronal($fiesta_patronal);
				
				
				$resul = $inst->Guardar();
				
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "relaciones";

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

							window.location = "relaciones";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function DetallesInt() {
		if($_GET['id']){
			$id_rel_interna = $_GET['id'];
			$relacion = new RelacionesInternas();
			$relacion->setId_rel_interna($id_rel_interna);
			$listaRelInt = $relacion->VerRelacionInternas();			
			require_once 'views/layout/menu.php';
			require_once 'views/relaciones/detallesint.php';
		}else{
			header('location:'.URL_BASE.'relaciones');
		}
	}
	public function DetallesExt() {
		if($_GET['id']){
			$id_rel_externa = $_GET['id'];
			$relacion = new RelacionesExternas();
			$relacion->setId_rel_externa($id_rel_externa);
			$listaRelExt = $relacion->VerRelacionExterna();			
			require_once 'views/layout/menu.php';
			require_once 'views/relaciones/detallesext.php';
		}else{
			header('location:'.URL_BASE.'relaciones');
		}
	}
	public function DetallesDist(){
		if($_GET['id']){
			$id_relacion = $_GET['id'];
			$relacion = new RelacionesDistintas();
			$relacion->setId_rel_distinta($id_relacion);
			$datosRel = $relacion->VerRelacionDistintas();
			require_once 'views/layout/menu.php';
			require_once 'views/relaciones/detallesdis.php';
		}else{
			header('location:'.URL_BASE.'relaciones');
		}
	}
	public function Detallesinst(){
		if($_GET['id']){
			$id_institutos_seculares = $_GET['id'];
			$inst = new Instituto();
			$inst->setId_institutos_seculares($id_institutos_seculares);
			$datosInst = $inst->VerInstitutos();
			require_once 'views/layout/menu.php';
			require_once 'views/relaciones/detallesinst.php';
		}else{
			header('location:'.URL_BASE.'relaciones');
		}
	}
	public function ActualizarInternas() {
		if($_POST['id_relacion']){
			$id_rel_interna = $_POST['id_relacion'];
			$nombreEntidad = isset($_POST['nombreEntidad']) ? $_POST['nombreEntidad']:FALSE;
			$encargadoEntidad = isset($_POST['encargadoEntidad']) ? $_POST['encargadoEntidad']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$promedioEdad = isset($_POST['promedioEdad']) ? $_POST['promedioEdad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$email = isset($_POST['email']) ? $_POST['email']:FALSE;
			
			if($id_rel_interna && $nombreEntidad && $encargadoEntidad && $direccion && $promedioEdad && $telefono && $email){
				$relacion = new RelacionesInternas();
				$relacion->setId_rel_interna($id_rel_interna);
				$relacion->setNombreEntidad($nombreEntidad);
				$relacion->setEncargadoEntidad($encargadoEntidad);
				$relacion->setDireccion($direccion);
				$relacion->setPromedioEdad($promedioEdad);
				$relacion->setTelefono($telefono);
				$relacion->setEmail($email);
				
				$resul = $relacion->ActualizarInt();
				
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detallesint&id='.$id_rel_interna.'";

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

							window.location = "detallesint&id='.$id_rel_interna.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function ActualizarExternas() {
		if($_POST['id_relacion']){
			$id_rel_externa= $_POST['id_relacion'];
			$nombreEntidad = isset($_POST['nombreEntidad']) ? $_POST['nombreEntidad']:FALSE;
			$encargadoEntidad = isset($_POST['encargadoEntidad']) ? $_POST['encargadoEntidad']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;			
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			
			if($id_rel_externa && $nombreEntidad && $encargadoEntidad && $direccion){
				$relacion = new RelacionesExternas();
				$relacion->setId_rel_externa($id_rel_externa);
				$relacion->setNombreEntidad($nombreEntidad);
				$relacion->setEncargadoEntidad($encargadoEntidad);
				$relacion->setDireccion($direccion);
				$relacion->setTelefono($telefono);
				
				$file = $_FILES['contrato'];
				$filename = $file['name'];
				$type = $file['type'];
				
				$dir = 'contratos';
				
				if($filename != ''){
					if(!empty($_POST['contratoActual'])){
						unlink($dir.'/'.$_POST['contratoActual']);
					}
					if($type == 'application/pdf'){
						if(!is_dir($dir)){
							mkdir($dir, 0777,TRUE);
						}
						$relacion->setContrato($filename);
						move_uploaded_file($file['tmp_name'], $dir.'/'.$filename);
					}
					
				}else{
					$contrato = $_POST['contratoActual'];
					$relacion->setContrato($contrato);
				}
				$resp = $relacion->ActualizarExterna();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detallesext&id='.$id_rel_externa.'";

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

							window.location = "detallesext&id='.$id_rel_externa.'";

							}
						})

			  	</script>';
				}
				
			}
			
		}
	}
	public function ActualizarDistinta() {
		if($_POST['id_relacion']){
			$id_relacion = $_POST['id_relacion'];
			$nombreInstituto = isset($_POST['nombreEntidad']) ? $_POST['nombreEntidad']:FALSE;
			$encargado = isset($_POST['encargadoEntidad']) ? $_POST['encargadoEntidad']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;			
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;			
			
			if($id_relacion && $nombreInstituto && $encargado ){
				$relacion = new RelacionesDistintas();
				$relacion->setId_rel_distinta($id_relacion);
				$relacion->setNombreInstituto($nombreInstituto);
				$relacion->setEncargado($encargado);
				$relacion->setDireccion($direccion);
				$relacion->setTelefono($telefono);
				
				$resp = $relacion->ActulizarDistinta();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detallesdist&id='.$id_relacion.'";

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

							window.location = "detallesdist&id='.$id_relacion.'";

							}
						})

			  	</script>';
				}
			}
			
		}
	}
	public function ActualizarInst() {
		if($_POST['id_relacion']){
			$id_relacion = $_POST['id_instituto'];
			$nombreInstituto = isset($_POST['nombreInstituto']) ? $_POST['nombreInstituto']:FALSE;
			$presencia = isset($_POST['presencia']) ? $_POST['presencia']:FALSE;			
			$fiesta_patronal = isset($_POST['fiestapatronal']) ? $_POST['fiestapatronal']:FALSE;
			
			if($id_relacion && $nombreInstituto && $presencia ){
				
				$inst = new Instituto();
				$inst->setId_institutos_seculares($id_relacion);
				$inst->setNombreInstituto($nombreInstituto);
				$inst->setFiesta_patronal($fiesta_patronal);
				$inst->setPresencia_diocesis($presencia_diocesis);
				$resp = $inst->Actualizar();				
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detallesdist&id='.$id_relacion.'";

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

							window.location = "detallesdist&id='.$id_relacion.'";

							}
						})

			  	</script>';
				}
			}
			
		}
	}
	public function EliminarInt() {
		if($_GET['id']){
			
			$id = $_GET['id'];			
			$relacion = new RelacionesInternas();
			$tabla = 'relaciones_interna';
			$parm = $id;
			$respt = $relacion->Eliminar($tabla, $parm);
			if($respt){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "relaciones/";

							}
						})

					</script>';
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "relaciones/listasinternas";

							}
						})

			  	</script>';
			}
			
		}
	}
	public function Eliminardist() {
		if($_GET['id']){
			
			$id = $_GET['id'];			
			$relacion = new RelacionesInternas();
			$tabla = 'relaciones_distinta';
			$parm = $id;
			$respt = $relacion->Eliminar($tabla, $parm);
			if($respt){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listasdistintas";

							}
						})

					</script>';
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listasdistintas";

							}
						})

			  	</script>';
			}
			
		}
	}
	public function Eliminarest() {
		if($_GET['id']){
			
			$id = $_GET['id'];			
			$relacion = new RelacionesInternas();
			$tabla = 'relaciones_externas';
			$parm = $id;
			$respt = $relacion->Eliminar($tabla, $parm);
			if($respt){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listasexternas";

							}
						})

					</script>';
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listasexternas";

							}
						})

			  	</script>';
			}
			
		}
	}

}
