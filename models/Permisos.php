<?php

require_once 'ModeloBase.php';

class Permisos extends ModeloBase{
	
	private $id_permiso;
	private $nombre;
	private $estado;
	
	function getId_permiso() {
		return $this->id_permiso;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getEstado() {
		return $this->estado;
	}

	function setId_permiso($id_permiso) {
		$this->id_permiso = $id_permiso;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setEstado($estado) {
		$this->estado = $estado;
	}

		public function __construct() {
		parent::__construct();
	}
	public function ListaModulos() {
		$sql = "SELECT * FROM permisos";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function VerListaModulos() {
		$sql = "SELECT * FROM permisos WHERE id_permiso = {$this->getId_permiso()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
}
