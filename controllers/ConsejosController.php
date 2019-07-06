<?php

require_once 'Models/ConsejoDiosesis.php';
require_once 'Models/DetallesConsejoDiocesis.php';

class ConsejosController {

	public function Index() {
		
		$consD = new ConsejoDiosesis();
		$listaCons = $consD ->MostrarConsejoDioseses();
		require_once 'views/layout/menu.php';		
        require_once 'views/concejos/listaconcejos.php';
	}
	public function Guardar() {
		if($_POST){
			$nombre = $_POST['nombre'];
			
			if($nombre){
				$cons = new ConsejoDiosesis();
				$cons->setNombre($nombre);
				$resp = $cons->Guardar();
				
				if ($resp) {
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
	public function MostrarIntegranteConsejo($id) {
		if($id){			
			$integ = new ConsejoDiosesis();
			$integ ->setId_consejo_diosesis($id);
			$listadI = $integ ->MostrarIntegranteConsejo();
			return $listadI;
		}
	}
	public function DetallesConsejo() {
		if($_GET['id']){
			$id_consejo_diosesis = $_GET['id'];
			$consej = new ConsejoDiosesis();
			$consej->setId_consejo_diosesis($id_consejo_diosesis);
			$lisDet = $consej->MostrarIntegranteConsejo();
			$nombre = $consej->DetallesConsejo();
			
			require_once 'views/layout/menu.php';
			require_once 'views/concejos/detalles.php';
		}
	}
	public function NombreConsejo() {
		if($_GET['id']){
			$id_consejo_diosesis = $_GET['id'];
			$consej = new ConsejoDiosesis();
			$consej->setId_consejo_diosesis($id_consejo_diosesis);			
			$nombrecon = $consej->DetallesConsejo();
			return $nombrecon;
		}
	}
	public function AgregarIntegrante() {
		if($_POST['id_consejo']){
			$id_consejo = $_POST['id_consejo'];
			$id_sacerdote = isset($_POST['sacerdote']) ? $_POST['sacerdote']:FALSE;
			
			if($id_consejo && $id_sacerdote){
				$cons = new DetallesConsejoDiocesis();
				$cons->setId_consejo_diocesis($id_consejo);
				$cons->setId_sacerdote($id_sacerdote);
				$resp = $cons->GuardarIntegrante();
				
				if($resp){
					echo'<script>
					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detallesconsejo&id='.$id_consejo.'";

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

							window.location = "detallesconsejo&id='.$id_consejo.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function Eliminar() {
		if($_GET['id']){
			$id_integrante = $_GET['id'];
			$id_consejo = $_GET['idc'];
			$integ = new DetallesConsejoDiocesis();
			$tabla = 'detalles_consejo_diocesis';
			$parm = $id_integrante;
			$resp = $integ->Eliminar($tabla, $parm);
			
			if($resp){
				echo'<script>
					swal({
						  type: "success",
						  title: "Informacion Eliminada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detallesconsejo&id='.$id_consejo.'";

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

							window.location = "detallesconsejo&id='.$id_consejo.'";

							}
						})

			  	</script>';
			}
		}
	}
}