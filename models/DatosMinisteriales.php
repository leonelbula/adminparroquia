<?php

require_once 'ModeloBase.php';

class DatosMinisteriales extends ModeloBase {
	
	private $id_datosM;
	private $id_sacerdote;
	private $lugarOrdenacion;
	private $fechaordenacion;
	private $parroquiaOrdenacion;
	private $parroquiaActual;	
	private $cargo;
	
	function getId_datosM() {
		return $this->id_datosM;
	}

	function getId_sacerdote() {
		return $this->id_sacerdote;
	}

	function getLugarOrdenacion() {
		return $this->lugarOrdenacion;
	}

	function getFechaordenacion() {
		return $this->fechaordenacion;
	}

	function getParroquiaOrdenacion() {
		return $this->parroquiaOrdenacion;
	}

	function getParroquiaActual() {
		return $this->parroquiaActual;
	}

	function getCargo() {
		return $this->cargo;
	}

	function setId_datosM($id_datosM) {
		$this->id_datosM = $id_datosM;
	}

	function setId_sacerdote($id_sacerdote) {
		$this->id_sacerdote = $id_sacerdote;
	}

	function setLugarOrdenacion($lugarOrdenacion) {
		$this->lugarOrdenacion = $lugarOrdenacion;
	}

	function setFechaordenacion($fechaordenacion) {
		$this->fechaordenacion = $fechaordenacion;
	}

	function setParroquiaOrdenacion($parroquiaOrdenacion) {
		$this->parroquiaOrdenacion = $parroquiaOrdenacion;
	}

	function setParroquiaActual($parroquiaActual) {
		$this->parroquiaActual = $parroquiaActual;
	}

	function setCargo($cargo) {
		$this->cargo = $cargo;
	}

	public function __construct() {
		parent::__construct();
	}
	public function MostrarDatos() {
		$sql = "SELECT * FROM datosministeriales WHERE id_sacerdote = {$this->getId_sacerdote()}";
		$datos = $this->db->query($sql);
		return $datos;
	}
	public function GuardarDato() {
		$sql = "INSERT INTO datosministeriales VALUES (NULL,{$this->getId_sacerdote()},'{$this->getLugarOrdenacion()}','{$this->getFechaordenacion()}','{$this->getParroquiaOrdenacion()}','{$this->getParroquiaActual()}','{$this->getCargo()}')";
		$save = $this->db->query($sql);
		
		$resp = FALSE;
		if($save){
			$resp = TRUE;
		}
		return $resp;
	}
	public function ActualizarDato() {
		$sql = "UPDATE datosministeriales SET lugarOrdenacion='{$this->getLugarOrdenacion()}',fechaordenacion='{$this->getFechaordenacion()}',parroquiaOrdenacion='{$this->getParroquiaOrdenacion()}',parroquiaActual='{$this->getParroquiaActual()}',cargo='{$this->getCargo()}' WHERE id_sacerdote = {$this->getId_sacerdote()}";
		$save = $this->db->query($sql);
		
		$resp = FALSE;
		if($save){
			$resp = TRUE;
		}
		return $resp;
	}
	public function ActualizarParroquiaActual() {
		$sql = "UPDATE datosministeriales SET parroquiaActual = 0 WHERE parroquiaActual = {$this->getParroquiaActual()}";
		$resp = $this->db->query($sql);
		
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
}