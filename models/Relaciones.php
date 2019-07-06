<?php

require_once 'ModeloBase.php';

class Relaciones extends ModeloBase{
	public function __construct() {
		parent::__construct();
	}
	
	public function RelacionesExternas() {
		$sql = "SELECT * FROM relaciones_externas ORDER BY nombreEntidad";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function RelacionesDistintas() {
		$sql = "SELECT * FROM relaciones_distinta ORDER BY nombreInstituto";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function RelacionesInternas() {
		$sql = "SELECT * FROM relaciones_interna ORDER BY nombreEntidad";
		$resp = $this->db->query($sql);
		return $resp;
	}
	
}