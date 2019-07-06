<?php

require_once 'ModeloBase.php';

class RelacionesDistintas extends ModeloBase{
	
	private $id_rel_distinta;
	private $nombreInstituto;
	private $encargado;
	private $direccion;
	private $telefono;
	private $fiesta_patronal;
	
	function getId_rel_distinta() {
		return $this->id_rel_distinta;
	}

	function getNombreInstituto() {
		return $this->nombreInstituto;
	}

	function getEncargado() {
		return $this->encargado;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getTelefono() {
		return $this->telefono;
	}	

	function setId_rel_distinta($id_rel_distinta) {
		$this->id_rel_distinta = $id_rel_distinta;
	}

	function setNombreInstituto($nombreInstituto) {
		$this->nombreInstituto = $nombreInstituto;
	}

	function setEncargado($encargado) {
		$this->encargado = $encargado;
	}

	function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}
	

	public function __construct() {
		parent::__construct();
	}
	public function VerRelacionDistintas() {
		$sql = "SELECT * FROM relaciones_distinta  WHERE id_relaciones_distinta = {$this->getId_rel_distinta()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Guardar() {
		$sql = "INSERT INTO relaciones_distinta VALUES (NULL,'{$this->getNombreInstituto()}','{$this->getEncargado()}','{$this->getDireccion()}','{$this->getTelefono()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function ActulizarDistinta() {
		$sql = "UPDATE relaciones_distinta SET nombreInstituto='{$this->getNombreInstituto()}',encargado='{$this->getEncargado()}',direccion='{$this->getDireccion()}',telefono='{$this->getTelefono()}' WHERE id_relaciones_distinta= {$this->getId_rel_distinta()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
}