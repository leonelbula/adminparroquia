<?php

require_once 'ModeloBase.php';

class HistoriaEstado extends ModeloBase {
	
	private $id_traslado;
	private $id_sacerdote;
	private $historia_traslado;
	
	function getId_traslado() {
		return $this->id_traslado;
	}

	function getId_sacerdote() {
		return $this->id_sacerdote;
	}

	function getHistoria_traslado() {
		return $this->historia_traslado;
	}

	function setId_traslado($id_traslado) {
		$this->id_traslado = $id_traslado;
	}

	function setId_sacerdote($id_sacerdote) {
		$this->id_sacerdote = $id_sacerdote;
	}

	function setHistoria_traslado($historia_traslado) {
		$this->historia_traslado = $historia_traslado;
	}

	public function __construct() {
		parent::__construct();
	}
	public function Verlista() {
		$sql = "SELECT * FROM traslado_pendientes";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function VerificarSacedote() {
		$sql = "SELECT * FROM traslado_pendientes WHERE id_sacerdote = {$this->getId_sacerdote()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function GuardarP() {
		$sql = "INSERT INTO traslado_pendientes VALUES (NULL,{$this->getId_sacerdote()})";
		$query = $this->db->query($sql);	
		$reslt = FALSE;
		
		if($query){
			$reslt = TRUE;
		}		
		return $reslt;
	}
}

