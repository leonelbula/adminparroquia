<?php

require_once 'ModeloBase.php';

class RelacionesExternas extends ModeloBase {
	
	private $id_rel_externa;
	private $nombreEntidad;
	private $direccion;
	private $encargadoEntidad;
	private $telefono;
	private $contrato;
	
	function getId_rel_externa() {
		return $this->id_rel_externa;
	}

	function getNombreEntidad() {
		return $this->nombreEntidad;
	}

	function getDireccion() {
		return $this->direcion;
	}

	function getEncargadoEntidad() {
		return $this->encargadoEntidad;
	}

	function getTelefono() {
		return $this->telefono;
	}

	function getContrato() {
		return $this->contrato;
	}

	function setId_rel_externa($id_rel_externa) {
		$this->id_rel_externa = $id_rel_externa;
	}

	function setNombreEntidad($nombreEntidad) {
		$this->nombreEntidad = $nombreEntidad;
	}

	function setDireccion($direcion) {
		$this->direcion = $direcion;
	}

	function setEncargadoEntidad($encargadoEntidad) {
		$this->encargadoEntidad = $encargadoEntidad;
	}

	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	function setContrato($contrato) {
		$this->contrato = $contrato;
	}

	public function __construct() {
		parent::__construct();
	}
	public function VerRelacionExterna() {
		$sql = "SELECT * FROM relaciones_externas  WHERE id_relaciones_externas = {$this->getId_rel_externa()}";
		$resp = $this->db->query($sql );
		return $resp;
	}
	public function Guardar() {
		$sql = "INSERT INTO relaciones_externas VALUES (NULL,'{$this->getNombreEntidad()}','{$this->getDireccion()}','{$this->getEncargadoEntidad()}','{$this->getTelefono()}','{$this->getContrato()}')";
		$save = $this->db->query($sql );
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function ActualizarExterna() {
		$sql = "UPDATE relaciones_externas SET nombreEntidad='{$this->getNombreEntidad()}',direcion='{$this->getDireccion()}',encargadoEntidad='{$this->getEncargadoEntidad()}',telefono='{$this->getTelefono()}',contrato='{$this->getContrato()}' WHERE id_relaciones_externas = {$this->getId_rel_externa()}";
		$rest = $this->db->query($sql);
		$resul = FALSE;
		if($rest){
			$resul = TRUE;
		}
		return $resul;
	}
}