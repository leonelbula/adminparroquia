<?php

require_once 'ModeloBase.php';

class ConsejoParroquial extends ModeloBase{
	
	private $id_conpar;
	private $id_parroquia;
	private $nombreC;
	private $encargado;
	private $promedioEdad;
	
	function getId_conpar() {
		return $this->id_conpar;
	}

	function getId_parroquia() {
		return $this->id_parroquia;
	}

	function getNombreC() {
		return $this->nombreC;
	}

	function getEncargado() {
		return $this->encargado;
	}

	function getPromedioEdad() {
		return $this->promedioEdad;
	}

	function setId_conpar($id_conpar) {
		$this->id_conpar = $id_conpar;
	}

	function setId_parroquia($id_parroquia) {
		$this->id_parroquia = $id_parroquia;
	}

	function setNombreC($nombreC) {
		$this->nombreC = $nombreC;
	}

	function setEncargado($encargado) {
		$this->encargado = $encargado;
	}

	function setPromedioEdad($promedioEdad) {
		$this->promedioEdad = $promedioEdad;
	}
	
	function __construct() {
		parent::__construct();
	}
	public function MostrarConsejo() {
		$sql = "SELECT * FROM consejos_parroquial WHERE id_parroquia = {$this->getId_parroquia()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function GuardarConsejo() {
		$sql = "INSERT INTO consejos_parroquial VALUES (NULL,{$this->getId_parroquia()},'{$this->getNombreC()}','{$this->getEncargado()}','{$this->getPromedioEdad()}')";
		$save = $this->db->query($sql);

		$resul = FALSE;

		if ($save) {
			$resul = TRUE;
		}
		return $resul;
	}
	public function ActualizarConsejo() {
		$sql = "UPDATE consejos_parroquial SET nombreC='{$this->getNombreC()}',encargadoCons='{$this->getEncargado()}',promedioEdad='{$this->getPromedioEdad()}' WHERE id_conpar = {$this->getId_conpar()}";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarC() {
		$sql = "DELETE FROM consejos_parroquial WHERE id_conpar = {$this->getId_conpar()}";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarConsejo() {
		$sql = "DELETE FROM consejos_parroquial WHERE id_parroquia = {$this->getId_parroquia()}";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	
}
