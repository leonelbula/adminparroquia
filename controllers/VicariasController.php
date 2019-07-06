<?php

require_once 'models/Vicarias.php';

class VicariasController {

	public function Index() {
		
		$vicarias = new Vicarias();
		
		$listarVicaria = $vicarias->MostrarVicarias();
		
		require_once 'views/layout/menu.php';
		require_once 'views/vicaria/listavicarias.php';
		
	}
	public function ParroquiasVicarias($id_vicaria) {
		if($id_vicaria){
			$parroquia = new Vicarias();
			$parroquia->setId_vicaria($id_vicaria);
			$listas = $parroquia->ParroquiasVicarias();
			
			return $listas;
		}
	}
	public function Vicarias($id_vicaria) {
		if($id_vicaria){
			$parroquia = new Vicarias();
			$parroquia->setId_vicaria($id_vicaria);
			$listas = $parroquia->Vicarias();
			
			return $listas;
		}
	}
	public function DetallesVicaria() {
		if($_GET['id']){
			$id_vicaria = $_GET['id'];
			$vicaria = new Vicarias();
			$vicaria->setId_vicaria($id_vicaria);
			$detallesVicaria = $vicaria->ParroquiasVicarias();
			
			require_once 'views/layout/menu.php';
			require_once 'views/vicaria/detallesvicaria.php';
		}else{
			header('location:'.URL_BASE.'frontend/principal');
		}
	}
}
