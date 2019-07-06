<?php

require_once 'ModeloBase.php';

class ConsejoDiosesis extends ModeloBase{
	
	private $id_consejo_diosesis;
	private $nombre;
	
	function getId_consejo_diosesis() {
		return $this->id_consejo_diosesis;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setId_consejo_diosesis($id_consejo_diosesis) {
		$this->id_consejo_diosesis = $id_consejo_diosesis;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function __construct() {
		parent::__construct();
	}
	function MostrarConsejoDioseses() {
		$sql = "SELECT * FROM consejo_diocesis";
		$resul = $this->db->query($sql);
		return $resul;
	}
	function DetallesConsejo() {
		$sql = "SELECT * FROM consejo_diocesis WHERE id_consejo_diocesis = {$this->getId_consejo_diosesis()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	function Guardar() {
		$sql = "INSERT INTO consejo_diocesis VALUES (NULL,'{$this->getNombre()}')";
		$resul = $this->db->query($sql);
		$repst = FALSE;
		if($resul){
			$repst = TRUE;
		}
		return $repst;
	}
	function MostrarIntegranteConsejo() {
		$sql = "SELECT s.id idt2,s.nombres,s.apellidos FROM detalles_consejo_diocesis d  ,parroco s  WHERE d.id_sacerdote = s.id AND d.id_consejo_diocesis = {$this->getId_consejo_diosesis()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
}

