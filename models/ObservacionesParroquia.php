<?php

require_once 'Modelobase.php';

class ObservacionesParroquia extends ModeloBase {
	
	private $id_observacion;
	private $id_parroquia;
	private $observacion;
	private $fecha;
	
	function getId_observacion() {
		return $this->id_observacion;
	}

	function getId_parroquia() {
		return $this->id_parroquia;
	}

	function getObservacion() {
		return $this->observacion;
	}

	function getFecha() {
		return $this->fecha;
	}

	function setId_observacion($id_observacion) {
		$this->id_observacion = $id_observacion;
	}

	function setId_parroquia($id_parroquia) {
		$this->id_parroquia = $id_parroquia;
	}

	function setObservacion($observacion) {
		$this->observacion = $observacion;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

				
	function __construct() {
		parent::__construct();
	}
	
	public function Guardar() {
		$sql = "INSERT INTO observ_parroquia VALUES (NULL,{$this->getId_parroquia()},'{$this->getObservacion()}',CURDATE())";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		
		return $resul;
	}
	public function MostrarObaservaciones() {
		$sql = "SELECT * FROM observ_parroquia WHERE id_parroquia = {$this->getId_parroquia()}";
		$query = $this->db->query($sql);
		
		return $query;
	}
	public function EliminarObservaciones() {
		$sql = "DELETE FROM observ_parroquia WHERE id_parroquia = {$this->getId_parroquia()}";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}

}