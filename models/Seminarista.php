<?php

require_once 'ModeloBase.php';

class Seminarista extends ModeloBase {

	private $id;
	private $nombre;
	private $apellido;
	private $lugarNacimiento;
	private $fechaNacimiento;
	private $email;
	private $telefono;
	private $foto;
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getApellido() {
		return $this->apellido;
	}

	function getLugarNacimiento() {
		return $this->lugarNacimiento;
	}

	function getFechaNacimiento() {
		return $this->fechaNacimiento;
	}

	function getEmail() {
		return $this->email;
	}

	function getTelefono() {
		return $this->telefono;
	}

	function getFoto() {
		return $this->foto;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setApellido($apellido) {
		$this->apellido = $apellido;
	}

	function setLugarNacimiento($lugarNacimiento) {
		$this->lugarNacimiento = $lugarNacimiento;
	}

	function setFechaNacimiento($fechaNacimiento) {
		$this->fechaNacimiento = $fechaNacimiento;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	function setFoto($foto) {
		$this->foto = $foto;
	}

				
	function __construct() {
		parent::__construct();
	}
	function MostrarSeminaristas() {
		$sql = "SELECT * FROM seminarista ORDER BY nombres ASC ";
		$query = $this->db->query($sql);
		return $query;
	}
	
	public function MostrarDetallesSeminarista() {
		$sql = "SELECT * FROM seminarista WHERE id_seminarista= {$this->getId()}";
		$query = $this->db->query($sql);
		return $query;
	}
	public function Guardar() {
		$sql = "INSERT INTO seminarista VALUES (NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getLugarNacimiento()}','{$this->getFechaNacimiento()}','{$this->getEmail()}','{$this->getTelefono()}','{$this->getFoto()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function Actualizar() {
		$sql = "UPDATE seminarista SET nombres='{$this->getNombre()}',apellidos='{$this->getApellido()}',lugar_nacimiento='{$this->getLugarNacimiento()}',fecha_nacimiento='{$this->getFechaNacimiento()}',email='{$this->getEmail()}',telefono='{$this->getTelefono()}',foto='{$this->getFoto()}' WHERE id_seminarista = {$this->getId()}";
		$resp = $this->db->query($sql);
		
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
}
