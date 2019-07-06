<?php

require_once 'ModeloBase.php';

class Estudios extends ModeloBase{

	private $id_estudio;
	private $id_sacerdote;
	private $estudio;
	
	function getId_estudio() {
		return $this->id_estudio;
	}

	function getId_sacerdote() {
		return $this->id_sacerdote;
	}

	function getEstudio() {
		return $this->estudio;
	}

	function setId_estudio($id_estudio) {
		$this->id_estudio = $id_estudio;
	}

	function setId_sacerdote($id_sacerdote) {
		$this->id_sacerdote = $id_sacerdote;
	}

	function setEstudio($estudio) {
		$this->estudio = $estudio;
	}

				
	function __construct() {
		parent::__construct();
	}
	
	public function MostrarEspecializaciones() {
		$sql = "SELECT * FROM estudios_especializaciones WHERE id_sacerdote = {$this->getId_sacerdote()} ";
		$query = $this->db->query($sql);
		return $query;
	}
	
	public function MostrarEstTeologia() {
		$sql = "SELECT * FROM estudios_teologia WHERE id_sacerdote = {$this->getId_sacerdote()} ";
		$query = $this->db->query($sql);
		return $query;
	}
	
	public function MostrarEstFilosofia() {
		$sql = "SELECT * FROM estudios_filosafia WHERE id_sacerdote = {$this->getId_sacerdote()} ";
		$query = $this->db->query($sql);
		return $query;
	}
		
	public function GuardarEspecializacion() {
		$sql = "INSERT INTO estudios_especializaciones VALUES (NULL,{$this->getId_sacerdote()},'{$this->getEstudio()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	
	public function GuardarEstFilosofia() {
		$sql = "INSERT INTO estudios_filosafia VALUES (NULL,{$this->getId_sacerdote()},'{$this->getEstudio()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	
	public function GuardarEstTeologia() {
		$sql = "INSERT INTO estudios_teologia VALUES (NULL,{$this->getId_sacerdote()},'{$this->getEstudio()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	

}