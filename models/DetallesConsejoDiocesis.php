<?php

require_once 'Modelobase.php';

class DetallesConsejoDiocesis extends ModeloBase{
	
	private $id_detalles_consejo_diocesis;
	private $id_consejo_diocesis;
	private $id_sacerdote;
	
	function getId_detalles_consejo_diocesis() {
		return $this->id_detalles_consejo_diocesis;
	}

	function getId_consejo_diocesis() {
		return $this->id_consejo_diocesis;
	}

	function getId_sacerdote() {
		return $this->id_sacerdote;
	}

	function setId_detalles_consejo_diocesis($id_detalles_consejo_diocesis) {
		$this->id_detalles_consejo_diocesis = $id_detalles_consejo_diocesis;
	}

	function setId_consejo_diocesis($id_consejo_diocesis) {
		$this->id_consejo_diocesis = $id_consejo_diocesis;
	}

	function setId_sacerdote($id_sacerdote) {
		$this->id_sacerdote = $id_sacerdote;
	}

	public function __construct() {
		parent::__construct();
	}
	public function GuardarIntegrante() {
		$sql = "INSERT INTO detalles_consejo_diocesis VALUES (NULL,{$this->getId_consejo_diocesis()},{$this->getId_sacerdote()})";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
}