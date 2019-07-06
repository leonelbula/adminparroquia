<?php

require_once 'ModeloBase.php';

class Vicarias extends ModeloBase{
	
	private $id_vicaria;
	private $nombre;
	
	function getId_vicaria() {
		return $this->id_vicaria;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setId_vicaria($id_vicaria) {
		$this->id_vicaria = $id_vicaria;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

				
	function __construct() {
		parent::__construct();
	}
	
	public function MostrarVicarias() {
		$sql = "SELECT * FROM vicarias";
		$query = $this->db->query($sql);
		return $query;
	}
	public function ParroquiasVicarias() {
		$sql = "SELECT * FROM parroquia WHERE id_vicaria = {$this->getId_vicaria()} ";
		$query = $this->db->query($sql);
		return $query;
	}
	public function Vicarias() {
		$sql = "SELECT * FROM vicarias WHERE id_vicaria = {$this->getId_vicaria()} ";
		$query = $this->db->query($sql);
		return $query;
	}

}