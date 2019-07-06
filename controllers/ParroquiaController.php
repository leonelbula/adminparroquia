<?php
require_once 'models/Parroquia.php';
require_once 'models/ConsejoParroquial.php';
require_once 'models/GrupoParroquial.php';
require_once 'models/ObservacionesParroquia.php';
require_once 'Models/DatosMinisteriales.php';
require_once 'Models/HistoriaCural.php';

class ParroquiaController{
    
    public function Index(){
		
		$parroquias = new Parroquia();
		
		
		
		$listaParroquia = $parroquias->MostrarListaParroquias();
			   
		
        require_once 'views/layout/menu.php';		
        require_once 'views/parroquia/listaparroquias.php';

    }
	
	public function Detalles() {
		if(isset($_GET['id'])){
			
			$id = $_GET['id'];
			
			$parraqia = new Parroquia();
			$parraqia->setId($id);
			$resulParroquia = $parraqia->MostrarDetallesParroquias();
			
			require_once 'views/layout/menu.php';	
			require_once 'views/parroquia/detalles.php';
		}else{
			header('location:'.URL_BASE.'frontend/principal');
		}
	}
	public function Guardar() {
		if($_POST){
			$id_vicaria = isset($_POST['vicaria']) ? $_POST['vicaria']:FALSE;
			$id_sacerdote = isset($_POST['sacerdote'])? $_POST['sacerdote']:FALSE;
			$nombre = strtoupper(isset($_POST['nombre']) ? $_POST['nombre']:FALSE);
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$municipio = isset($_POST['municipio']) ? $_POST['municipio']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$fundada = isset($_POST['fundada']) ? $_POST['fundada']:FALSE;
			$decreto = isset($_POST['decreto']) ? $_POST['decreto']:FALSE;
			$extencion = isset($_POST['extencion']) ? $_POST['extencion']:FALSE;
			$limites = isset($_POST['limites']) ? $_POST['limites']:FALSE;
			$fiestapatronal = isset($_POST['fiesta']) ? $_POST['fiesta']:FALSE;
			$id_vicario = isset($_POST['vicario']) ? $_POST['vicario']:FALSE;
			$id_sac_anterior = 113;
			$id_vic_anterior = 113;
			
			if($id_vicaria && $id_sacerdote && $nombre && $direccion && $municipio && $fundada && $decreto){
				
				$parroquia = new Parroquia();
				
				$parroquia->setId_vicaria($id_vicaria);
				$parroquia->setId_sacerdote($id_sacerdote);
				$parroquia->setNombre($nombre);
				$parroquia->setDireccion($direccion);
				$parroquia->setMunicipio($municipio);
				$parroquia->setTelefono($telefono);
				$parroquia->setFundada($fundada);
				$parroquia->setDecreto($decreto);
				$parroquia->setExtencion($extencion);
				$parroquia->setLimites($limites);
				$parroquia->setFiestapatronal($fiestapatronal);
				$parroquia->setId_vicario($id_vicario);
				$parroquia->setId_sac_anterior($id_sac_anterior);
				$parroquia->setId_vic_anterior($id_vic_anterior);
				
				$file = $_FILES['foto'];
				$fileNom = $file['name'];
				$type = $file['type'];
				
				$dir = 'imagenes/parroquia';
				
				if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png') {
					
					if(!is_dir($dir)){
						mkdir($dir, 0777,TRUE);
					}
					$parroquia->setFoto($fileNom);
					move_uploaded_file($file['tmp_name'],$dir.'/'.$fileNom);
					
				}else{
					$fileNom = "";
					$parroquia->setFoto($fileNom);
				}
				
				$save = $parroquia->Guardar();
				
				if($save){
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
	public function GuardarConcejo() {
		
		if($_POST['id_parroquia']){			
			$id_parroquia = $_POST['id_parroquia'];
			$nombreC = isset($_POST['nombre'])? $_POST['nombre']: FALSE;
			$encargado = isset($_POST['encargado'])?$_POST['encargado']:FALSE;
			$promedioEdad = isset($_POST['promEdad'])?$_POST['promEdad']:FALSE;
			
			if($id_parroquia && $nombreC && $encargado && $promedioEdad){
				
				$consejo = new ConsejoParroquial();
				$consejo->setId_parroquia($id_parroquia);
				$consejo->setNombreC($nombreC);
				$consejo->setEncargado($encargado);
				$consejo->setPromedioEdad($promedioEdad);
				
				$resul = $consejo->GuardarConsejo();
			
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

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

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

			  	</script>';
				}
			}
			
		}else{
			header('location:'.URL_BASE.'frontend/principal');
		}
		
	}
	public function GuardarGrupo() {
		if($_POST['id_parroquia']){
			
			$id_parroquia = $_POST['id_parroquia'];
			$nombreGrupo = isset($_POST['nombreGrupo'])? $_POST['nombreGrupo']: FALSE;
			$encargadoGrupo = isset($_POST['encargadoGrupo'])?$_POST['encargadoGrupo']:FALSE;
			$proEdadGrupo = isset($_POST['promEdadGrupo'])?$_POST['promEdadGrupo']:FALSE;
			
			if($id_parroquia && $nombreGrupo && $encargadoGrupo && $proEdadGrupo){
				
				$grupo = new GrupoParroquial();
				$grupo->setId_parroquia($id_parroquia);
				$grupo->setNombreGrupo($nombreGrupo);
				$grupo->setEncargadoGrupo($encargadoGrupo);
				$grupo->setProEdadGrupo($proEdadGrupo);
								
				$resul = $grupo ->GuardarGrupo();
								
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

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

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

			  	</script>';
				}
			}
			
		}
	}
	public function GuardarObservacion() {
		if($_POST['id_parroquia']){
			$id_parroquia = $_POST['id_parroquia'];
			$observacion = isset($_POST['observacion']) ? $_POST['observacion']:FALSE;
			
			if($id_parroquia && $observacion){
				
				$observaciones = new ObservacionesParroquia();
				$observaciones->setId_parroquia($id_parroquia);
				$observaciones->setObservacion($observacion);
				
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

							window.location = "detalles&id='.$id_parroquia.'";

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

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

			  	</script>';
				}
			}
			
		}
		
	}
	public function MostrarObservaciones() {
		if($_GET['id']){
			
			$id_parroquia = $_GET['id'];
			$observacion = new ObservacionesParroquia();
			$observacion->setId_parroquia($id_parroquia);
			
			$resp = $observacion->MostrarObaservaciones();
			
			return $resp;
		}
	}
	public function MostrarConsejo() {
		if($_GET['id']){
			$id_parroquia = $_GET['id'];
			$consejo = new ConsejoParroquial();	
			$consejo->setId_parroquia($id_parroquia);
			$datosConsejo = $consejo->MostrarConsejo();
			return $datosConsejo;
			
		}
	}
	public function MostrarGrupoParroquial() {
		if($_GET['id']){
			$id_parroquia = $_GET['id'];
			$grupo = new GrupoParroquial();
			$grupo ->setId_parroquia($id_parroquia);
			$datosGrupo = $grupo->MostrarGrupo();
			return $datosGrupo;
		}
			
	}
	public function MostrarParroquia($id_sacerdote) {
		if($id_sacerdote){
			$parroquia = new Parroquia();
			$parroquia->setId_sacerdote($id_sacerdote);
			$datosParroquia = $parroquia->MostrarParroquia();
			return $datosParroquia;
		}
	}
	public function Eliminar() {
		if($_GET['id']){
			$id = $_GET['id'];
			
			$parroquia = new Parroquia();
			$parroquia->setId($id);	
			
			$datos = $parroquia->MostrarParroquiaId();
			
						
			while ($row = $datos-> fetch_object()) {
				if(isset($row->foto)!= ''){
					if(is_file('imagenes/parroquia/'.$row->foto)){
						unlink('imagenes/parroquia/'.$row->foto);
					}
					
				}
				$datosM = new DatosMinisteriales();
				$datosM->setParroquiaActual($row->id_parroquia);
				$datosM->ActualizarParroquiaActual();
				
				$consejo = new ConsejoParroquial();
				$consejo->setId_parroquia($row->id_parroquia);
				$consejo->EliminarConsejo();
				
				$obs = new ObservacionesParroquia();
				$obs->setId_parroquia($row->id_parroquia);
				$obs->EliminarObservaciones();
				
				$grupo = new GrupoParroquial();
				$grupo->setId_parroquia($row->id_parroquia);
				$grupo->EliminarGrupo();
				
				$hist = new HistoriaCural();
				$hist->setId_parroquia($row->id_parroquia);
				$hist->EliminarParHist();
				
			}
			$tabla = 'parroquia';
			$parm = $id;
			
			$resul = $parroquia->Eliminar($tabla, $parm);
			
			if($resul){
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
	public function Editar() {
		if($_GET['id']){
			$id = $_GET['id'];
			
			$parroquia = new Parroquia();
			$parroquia->setId($id);			
			
			$resul = $parroquia->MostrarDetalesParroquia();
		}
		
		require_once 'views/layout/menu.php';
		require_once 'views/parroquia/editar.php';
	}
	public function Actualizar() {
		if($_POST['id']){
			$id = $_POST['id'];
			$id_vicaria = isset($_POST['vicaria']) ? $_POST['vicaria']:FALSE;
			$id_sacerdote = isset($_POST['sacerdote'])? $_POST['sacerdote']:FALSE;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$municipio = isset($_POST['municipio']) ? $_POST['municipio']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$fundada = isset($_POST['fundada']) ? $_POST['fundada']:FALSE;
			$decreto = isset($_POST['decreto']) ? $_POST['decreto']:FALSE;
			$extencion = isset($_POST['extencion']) ? $_POST['extencion']:FALSE;
			$limites = isset($_POST['limites']) ? $_POST['limites']:FALSE;
			$fiestapatronal = isset($_POST['fiesta']) ? $_POST['fiesta']:FALSE;
			$id_vicario = isset($_POST['vicario']) ? $_POST['vicario']:FALSE;
			$id_sac_anterior = isset($_POST['anteriorsacerdote']) ? $_POST['anteriorsacerdote']:FALSE;
			$id_vic_anterior = isset($_POST['vicarioanterior']) ? $_POST['vicarioanterior']:FALSE;
			
			if($id && $id_vicaria && $id_sacerdote && $nombre  && $direccion && $municipio && $fundada && $decreto){
				$parroquia = new Parroquia();
				$parroquia->setId($id);
				$parroquia->setId_vicaria($id_vicaria);
				$parroquia->setId_sacerdote($id_sacerdote);
				$parroquia->setNombre($nombre);
				$parroquia->setDireccion($direccion);
				$parroquia->setMunicipio($municipio);
				$parroquia->setTelefono($telefono);
				$parroquia->setFundada($fundada);
				$parroquia->setDecreto($decreto);
				$parroquia->setExtencion($extencion);
				$parroquia->setLimites($limites);
				$parroquia->setFiestapatronal($fiestapatronal);
				$parroquia->setId_vicario($id_vicario);
				$parroquia->setId_sac_anterior($id_sac_anterior);
				$parroquia->setId_vic_anterior($id_vic_anterior);
				
				$file = $_FILES['foto'];
				$fileNom = $file['name'];
				$type = $file['type'];
				
				$dir = 'imagenes/parroquia';
				
				if(empty($fileNom)){
					
					$img = $_POST['fotoActual'];
					$parroquia->setFoto($img);
				
				} else {
					if($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png'){
						
						if (!empty($_POST['fotoActual'])){
							unlink($dir.'/'.$_POST['fotoActual']);
						}
						$img = $fileNom;
						$parroquia->setFoto($img);
						
						move_uploaded_file($file['tmp_name'], $dir .'/'.$fileNom);
						
					}
				}
			
				$resul = $parroquia->Actualizar();
				
				
				
				if($resul){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actulizada Correctamente",
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
						  title: "¡Error al Actualizar el Registros !",
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
	public function EditarConcejo() {
		if($_POST['id_consejo']){
			
			$id_conpar = $_POST['id_consejo'];
			$id_parroquia = $_POST['id_parroquia'];
			$nombreC = isset($_POST['nombre'])? $_POST['nombre']: FALSE;
			$encargado = isset($_POST['encargado'])?$_POST['encargado']:FALSE;
			$promedioEdad = isset($_POST['promEdad'])?$_POST['promEdad']:FALSE;
									
			if ($id_conpar && $nombreC && $encargado && $promedioEdad) {
				
				$consejo = new ConsejoParroquial();
				$consejo->setId_conpar($id_conpar);
				$consejo->setNombreC($nombreC);
				$consejo->setEncargado($encargado);
				$consejo->setPromedioEdad($promedioEdad);
				
				$resp = $consejo->ActualizarConsejo();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actulizada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Error al Actualizar el Registros !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function EditarGrupo() {
		if($_POST['id_grupo']){
			
			$id = $_POST['id_grupo'];
			$id_parroquia = $_POST['id_parroquia'];
			$nombreGrupo = isset($_POST['nombreGrupo'])? $_POST['nombreGrupo']: FALSE;
			$encargadoGrupo = isset($_POST['encargadoGrupo'])?$_POST['encargadoGrupo']:FALSE;
			$proEdadGrupo = isset($_POST['promEdadGrupo'])?$_POST['promEdadGrupo']:FALSE;
									
			if ($id && $nombreGrupo && $encargadoGrupo && $proEdadGrupo) {
				
				$grupo = new GrupoParroquial();
				$grupo->setId($id);
				$grupo->setNombreGrupo($nombreGrupo);
				$grupo->setEncargadoGrupo($encargadoGrupo);
				$grupo->setProEdadGrupo($proEdadGrupo);
				
				$resp = $grupo->Actualizar();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actulizada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

					</script>';
				} else {
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Error al Actualizar el Registros !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

			  	</script>';
				}
			}
		}
	}
	public function listarVicarias() {
		
		$vicaria = new Parroquia();
		$tabla = "vicarias";
		$ordenar = "nombre";
		$forma = "ASC";
		$listVicaria = $vicaria->MostrarTodo($tabla, $ordenar, $forma);
		return $listVicaria;
	}
	public function ListarSacerdotes() {
		
		$sacerdotes = new Parroquia();
		$listSacerdote = $sacerdotes->MostrarParroco();
		return $listSacerdote;
	}
	public function ListarParroquia() {
		
		$parroquia = new Parroquia();
		$tabla = 'parroquia';
		$ordenar = 'nombre';
		$forma = 'ASC';
		$listParroquia = $parroquia->MostrarTodo($tabla, $ordenar, $forma);
		return $listParroquia;
	}
	public function SacerdotesParroquia($id_sacerdote) {
		if($id_sacerdote){
			$id = $id_sacerdote;
			$parroquia = new Parroquia();
			$parroquia->setId($id);
			$resulS = $parroquia->SacerdotesParroquia();
			
			return $resulS;
		}
	}
	public function EliminarObservacion() {
		if($_GET['id']){
			$id_Parroquia = $_GET['idp'];
			$id_observacion = $_GET['id'];
			$obser = new ObservacionesParroquia();
			$tabla= 'observ_parroquia';
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

							window.location = "detalles&id='.$id_Parroquia.'";

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

							window.location = "detalles&id='.$id_Parroquia.'";

							}
						})

			  	</script>';
			}
		}
	}
	public function EliminarConcejo() {
		if($_GET['id']){
			$id_consejo = $_GET['id'];
			$id_parroquia = $_GET['ids'];
			
			$cons = new ConsejoParroquial();
			$cons->setId_conpar($id_consejo);
			$dato = $cons->EliminarC();
			if($dato){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

					</script>';
			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Al Eliminar el Registros !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

			  	</script>';
			}
		}
	}
	public function EliminarGrupoP() {
		if($_GET['id']){
			$id_grupo = $_GET['id'];
			$id_parroquia = $_GET['ids'];
			
			$grupo = new GrupoParroquial();
			$grupo->setId($id_grupo);
			$dato = $grupo->EliminarG();
			if($dato){
				echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Eliminada Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

					</script>';
			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Al Eliminar el Registros !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "detalles&id='.$id_parroquia.'";

							}
						})

			  	</script>';
			}
		}
	}
	public function MostrarHistorialParroquia() {
		if($_GET['id']){
			$id_parroquia = $_GET['id'];			
			$parro = new Parroquia();
			$parro->setId($id_parroquia);
			$dato = $parro->MostrarParroquiaId();
			while ($row = $dato ->fetch_object()) {
				$nombre = $row->nombre;
			}	
			$historia = new HistoriaCural();
			$historia->setParroquia($nombre);
			$listHist = $historia->MostrarHistoriaParroquia();			
			
			return $listHist;
		}
	}	
}
