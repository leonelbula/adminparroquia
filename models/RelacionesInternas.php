<?php

require_once 'ModeloBase.php';

class RelacionesInternas extends ModeloBase{
	
	private $id_rel_interna;
	private $nombreEntidad;
	private $encargadoEntidad;
	private $direccion;
	private $promedioEdad;
	private $telefono;
	private $email;
	
	function getId_rel_interna() {
		return $this->id_rel_interna;
	}

	function getNombreEntidad() {
		return $this->nombreEntidad;
	}

	function getEncargadoEntidad() {
		return $this->encargadoEntidad;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getPromedioEdad() {
		return $this->promedioEdad;
	}

	function getTelefono() {
		return $this->telefono;
	}

	function getEmail() {
		return $this->email;
	}

	function setId_rel_interna($id_rel_interna) {
		$this->id_rel_interna = $id_rel_interna;
	}

	function setNombreEntidad($nombreEntidad) {
		$this->nombreEntidad = $nombreEntidad;
	}

	function setEncargadoEntidad($encargadoEntidad) {
		$this->encargadoEntidad = $encargadoEntidad;
	}

	function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	function setPromedioEdad($promedioEdad) {
		$this->promedioEdad = $promedioEdad;
	}

	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	public function __construct() {
		parent::__construct();
	}
	public function VerRelacionInternas() {
		$sql = "SELECT * FROM relaciones_interna  WHERE id_relaciones_interna = {$this->getId_rel_interna()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Guardar() {
		$sql = "INSERT INTO relaciones_interna VALUES (NULL,'{$this->getNombreEntidad()}','{$this->getEncargadoEntidad()}','{$this->getDireccion()}','{$this->getPromedioEdad()}','{$this->getTelefono()}','{$this->getEmail()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function ActualizarInt() {
		$sql = "UPDATE relaciones_interna SET nombreEntidad='{$this->getNombreEntidad()}',encargadoEntidad='{$this->getEncargadoEntidad()}',direccion='{$this->getDireccion()}',promedioEdad='{$this->getPromedioEdad()}',telefono='{$this->getTelefono()}',email='{$this->getEmail()}' WHERE id_relaciones_interna = {$this->getId_rel_interna()}";
		$resul = $this->db->query($sql);
		
		$resp = FALSE;
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
}
