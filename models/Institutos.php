<?php

require_once 'ModeloBase.php';

class Instituto extends ModeloBase{
	
	private $id_institutos_seculares;
	private $nombreInstituto;
	private $fiesta_patronal;
	private $presencia_diocesis;
	
	function getId_institutos_seculares() {
		return $this->id_institutos_seculares;
	}

	function getNombreInstituto() {
		return $this->nombreInstituto;
	}

	function getFiesta_patronal() {
		return $this->fiesta_patronal;
	}

	function getPresencia_diocesis() {
		return $this->presencia_diocesis;
	}

	function setId_institutos_seculares($id_institutos_seculares) {
		$this->id_institutos_seculares = $id_institutos_seculares;
	}

	function setNombreInstituto($nombreInstituto) {
		$this->nombreInstituto = $nombreInstituto;
	}

	function setFiesta_patronal($fiesta_patronal) {
		$this->fiesta_patronal = $fiesta_patronal;
	}

	function setPresencia_diocesis($presencia_diocesis) {
		$this->presencia_diocesis = $presencia_diocesis;
	}

	public function __construct() {
		parent::__construct();
	}
	public function VerListaInstitutos() {
		$sql = "SELECT * FROM institutos_seculares";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function VerInstitutos() {
		$sql = "SELECT * FROM institutos_seculares WHERE id_institutos_seculares = {$this->getId_institutos_seculares()} ";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Guardar() {
		$sql = "INSERT INTO institutos_seculares VALUES (NULL,'{$this->getNombreInstituto()}','{$this->getFiesta_patronal()}','{$this->getPresencia_diocesis()}')";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
	public function Actualizar() {
		$sql = "UPDATE institutos_seculares SET nombreInstituto='{$this->getNombreInstituto()}',fiesta_patronal='{$this->getFiesta_patronal()}',presencia_diocesis='{$this->getPresencia_diocesis()}' WHERE id_institutos_seculares = {$this->getId_institutos_seculares()}";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
}