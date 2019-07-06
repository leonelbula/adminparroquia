<?php

require_once 'ModeloBase.php';

class Sacerdote extends ModeloBase {

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
	function MostrarParroco() {
		$sql = "SELECT * FROM parroco ORDER BY apellidos ASC ";
		$query = $this->db->query($sql);
		return $query;
	}
	
	public function MostrarDetallesParroco() {
		$sql = "SELECT * FROM parroco p LEFT JOIN datosministeriales d ON d.id_sacerdote = p.id  WHERE p.id = {$this->getId()}";
		$query = $this->db->query($sql);
		return $query;
	}	
	public function Guardar() {
		$sql = "INSERT INTO parroco VALUES (NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getLugarNacimiento()}','{$this->getFechaNacimiento()}','{$this->getEmail()}','{$this->getTelefono()}','{$this->getFoto()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function Actualizar() {
		$sql = "UPDATE parroco SET nombres='{$this->getNombre()}',apellidos='{$this->getApellido()}',fechanacimiento='{$this->getFechaNacimiento()}',lugarnacimiento='{$this->getLugarNacimiento()}',telefono='{$this->getTelefono()}',email='{$this->getEmail()}',foto='{$this->getFoto()}' WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}	
	public function EliminarSacrdote(){
        $sql = "DELETE FROM parroco WHERE id = {$this->getId()}";
		$query = $this->db->query($sql);
		
		$reslt = FALSE;
		
		if($query){
			$reslt = TRUE;
		}
		
		return $reslt;
        
    }
	public function VerParroquiaactual() {
		$sql = "SELECT * FROM parroquia WHERE id_sacerdote = {$this->getId()} OR id_vicario = {$this->getId()}";
		$resp = $this->db->query($sql);
		return $resp;
	}	
}