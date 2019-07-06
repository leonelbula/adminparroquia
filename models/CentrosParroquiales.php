<?php
require_once 'ModeloBase.php';

class CentroParroquiales extends ModeloBase {
	
	private $id_centro_parroquiales;
	private $id_sacerdote;
	private $nombre;
	private $direccion;
	private $municipio;
	private $fiesta_patronal;
	private $foto;
	
	

	function getFoto() {
		return $this->foto;
	}			
	function getId_centro_parroquiales() {
		return $this->id_centro_parroquiales;
	}

	function getId_sacerdote() {
		return $this->id_sacerdote;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getMunicipio() {
		return $this->municipio;
	}

	function getFiesta_patronal() {
		return $this->fiesta_patronal;
	}

	function setId_centro_parroquiales($id_centro_parroquiales) {
		$this->id_centro_parroquiales = $id_centro_parroquiales;
	}

	function setId_sacerdote($id_sacerdote) {
		$this->id_sacerdote = $id_sacerdote;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	function setMunicipio($municipio) {
		$this->municipio = $municipio;
	}

	function setFiesta_patronal($fiesta_patronal) {
		$this->fiesta_patronal = $fiesta_patronal;
	}
	function setFoto($foto) {
		$this->foto = $foto;
	}
	
	public function __construct() {
		parent::__construct();
	}
	public function MotrarCentroParroquiales() {
		$sql = "SELECT c.* , p.nombres sacerdote FROM centro_parroquiales c, parroco p WHERE c.id_sacerdote = p.id";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarDetallesCentroParroquial() {
		
		$sql = "SELECT * FROM centro_parroquiales WHERE id_centro_parroquiales = {$this->getId_centro_parroquiales()}";
		$query = $this->db->query($sql);
		
		return $query;
		
	}
	public function Guardar() {
		$sql = "INSERT INTO centro_parroquiales VALUES (NULL,{$this->getId_sacerdote()},'{$this->getNombre()}','{$this->getDireccion()}','{$this->getMunicipio()}','{$this->getFiesta_patronal()}','{$this->getFoto()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function Actualizar() {
		$sql = "UPDATE centro_parroquiales SET id_sacerdote={$this->getId_sacerdote()},nombre='{$this->getNombre()}',direccion='{$this->getDireccion()}',municipio='{$this->getMunicipio()}',fiesta_patronal='{$this->getFiesta_patronal()}',foto='{$this->getFoto()}' WHERE id_centro_parroquiales = {$this->getId_centro_parroquiales()}";
		$resp = $this->db->query($sql);
		
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
}