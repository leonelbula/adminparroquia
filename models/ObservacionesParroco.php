<?php

require_once 'Modelobase.php';

class ObservacionesParroco extends ModeloBase {
	
	private $id_observacion;
	private $id_sacerdote;
	private $comentario;
	private $fecha;
	
	function getId_observacion() {
		return $this->id_observacion;
	}

	function getId_sacerdote() {
		return $this->id_sacerdote;
	}

	function getComentario() {
		return $this->comentario;
	}

	function getFecha() {
		return $this->fecha;
	}

	function setId_observacion($id_observacion) {
		$this->id_observacion = $id_observacion;
	}

	function setId_sacerdote($id_sacerdote) {
		$this->id_sacerdote = $id_sacerdote;
	}

	function setComentario($comentario) {
		$this->comentario = $comentario;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function __construct() {
		parent::__construct();
	}
	
	public function MostrarObservaciones() {
		$sql = "SELECT * FROM observ_parroco WHERE id_sacerdote = {$this->getId_sacerdote()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Guardar() {
		$sql = "INSERT INTO observ_parroco VALUES (NULL,{$this->getId_sacerdote()},'{$this->getComentario()}',CURDATE())";
		$save = $this->db->query($sql);
		
		$resp = FALSE;
		if($save){
			$resp = TRUE;
		}
		return $resp;
	}
	
}