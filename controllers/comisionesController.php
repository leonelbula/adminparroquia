<?php

require_once 'models/ComisionesPastorales.php';

class comisionesController {

	function Index() {
		$comi = new ComisionesPastorales();
		$lista = $comi->MostrarComisiones();
		require_once 'views/layout/menu.php';		
        require_once 'views/comisiones/listacomisiones.php';
	}
	public function ListarSacerdotes() {
		$sacerdotes = new ComisionesPastorales();
		$listSacerdote = $sacerdotes->MostrarParroco();
		return $listSacerdote;
	}
	public function Guardar() {
		if($_POST){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$sacerdote = isset($_POST['sacerdote']) ? $_POST['sacerdote']:FALSE;
			
			if($nombre && $sacerdote){
				$datos = new ComisionesPastorales();
				$datos->setNombre($nombre);
				$datos->setId_sacerdote($sacerdote);
				$resp = $datos->Guardar();
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
				} else {
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
			$id_comision = $_GET['id'];
			$comi = new ComisionesPastorales();
			$comi->setId_comisiones_pastorales($id_comision);
			$datosComi = $comi->VerComision();			
			
			require_once 'views/layout/menu.php';
			require_once 'views/comisiones/editarcomicion.php';
			
		}
	}
	public function Actualizar() {
		if($_POST['id']){
			$id_comisiones_pastorales = $_POST['id'];
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$sacerdote = isset($_POST['sacerdote']) ? $_POST['sacerdote']:FALSE;
			
			if($id_comisiones_pastorales && $nombre && $sacerdote){
				$com = new ComisionesPastorales();
				$com->setId_comisiones_pastorales($id_comisiones_pastorales);
				$com->setNombre($nombre);
				$com->setId_sacerdote($sacerdote);
				$resp = $com->Actulizar();
				if($resp){
					echo'<script>
					swal({
						  type: "success",
						  title: "Informacion actulizar correctamente",
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
				
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Datos incompletos !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
			}
		}else{
			header('location:'.URL_BASE.'comisiones/index');
		}
	}
		public function Eliminar() {
		if($_GET['id']){
			$id_comisiones_pastorales = $_GET['id'];			
			$comi= new ComisionesPastorales();
			$tabla = 'comisiones_pastorales';
			$parm = $id_comisiones_pastorales;
			$resp = $comi->Eliminar($tabla, $parm);
			
			if($resp){
				echo'<script>
					swal({
						  type: "success",
						  title: "Informacion Eliminada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "comisiones";

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

							window.location = "comisiones";

							}
						})

			  	</script>';
			}
		}
	}

}