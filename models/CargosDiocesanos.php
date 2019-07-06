<?php
require_once 'Modelobase.php';

class CargoDiocesanos extends ModeloBase{
	private $id_cargos;
	private $id_sacerdote;
	private $nombre;
	private $fecha;
	
	function getId_cargos() {
		return $this->id_cargos;
	}

	function getId_sacerdote() {
		return $this->id_sacerdote;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getFecha() {
		return $this->fecha;
	}

	function setId_cargos($id_cargos) {
		$this->id_cargos = $id_cargos;
	}

	function setId_sacerdote($id_sacerdote) {
		$this->id_sacerdote = $id_sacerdote;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function __construct() {
		parent::__construct();
	}
	public function MostarCargosSacerdote() {
		$sql = "SELECT * FROM cargo_diocesados WHERE id_sacerdote = {$this->getId_sacerdote()}";
		$repst = $this->db->query($sql);
		return $repst;
	}
	public function Guardar() {
		$sql = "INSERT INTO cargo_diocesados VALUES (NULL,{$this->getId_sacerdote()},'{$this->getNombre()}','{$this->getFecha()}')";
		$repst = $this->db->query($sql);
		$resul = FALSE;
		if($repst){
			$resul = TRUE;
		}
		return $resul;
		
	}
}