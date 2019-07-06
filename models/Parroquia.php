<?php

require_once 'ModeloBase.php';

class Parroquia extends ModeloBase{
	
	private $id;
	private $id_vicaria;
	private $id_sacerdote;
	private $nombre;
	private $direccion;
	private $municipio;
	private $telefono;
	private $fundada;
	private $decreto;
	private $foto;
	private $extencion;
	private $limites;
	private $fiestapatronal;
	private $id_vicario;
	private $id_sac_anterior;
	private $id_vic_anterior;
			
	

					
	function getId() {
		return $this->id;
	}

	function getId_vicaria() {
		return $this->id_vicaria;
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

	function getTelefono() {
		return $this->telefono;
	}

	function getFundada() {
		return $this->fundada;
	}

	function getDecreto() {
		return $this->decreto;
	}

	function getFoto() {
		return $this->foto;
	}
	function getExtencion() {
		return $this->extencion;
	}

	function getLimites() {
		return $this->limites;
	}

	function getFiestapatronal() {
		return $this->fiestapatronal;
	}

	function getId_vicario() {
		return $this->id_vicario;
	}

	function getId_sac_anterior() {
		return $this->id_sac_anterior;
	}

	function getId_vic_anterior() {
		return $this->id_vic_anterior;
	}

			
	function setId($id) {
		$this->id = $id;
	}

	function setId_vicaria($id_vicaria) {
		$this->id_vicaria = $id_vicaria;
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

	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	function setFundada($fundada) {
		$this->fundada = $fundada;
	}

	function setDecreto($decreto) {
		$this->decreto = $decreto;
	}

	function setFoto($foto) {
		$this->foto = $foto;
	}
	function setExtencion($extencion) {
		$this->extencion = $extencion;
	}

	function setLimites($limites) {
		$this->limites = $limites;
	}

	function setFiestapatronal($fiestapatronal) {
		$this->fiestapatronal = $fiestapatronal;
	}

	function setId_vicario($id_vicario) {
		$this->id_vicario = $id_vicario;
	}

	function setId_sac_anterior($id_sac_anterior) {
		$this->id_sac_anterior = $id_sac_anterior;
	}

	function setId_vic_anterior($id_vic_anterior) {
		$this->id_vic_anterior = $id_vic_anterior;
	}

		
	function __construct() {
		parent::__construct();
	}
	public function MostrarListaParroquias() {
		
		$sql = "SELECT p.* ,s.id idt2,s.nombres sacerdote  FROM parroquia p ,parroco s  WHERE p.id_sacerdote = s.id";
		$query = $this->db->query($sql);
		
		return $query;
		
	}
	public function MostrarParroquia(){
        $sql = "SELECT * FROM parroquia WHERE id_sacerdote = {$this->getId_sacerdote()}  OR id_vicario = {$this->getId_sacerdote()}";
		$query = $this->db->query($sql);
						
		return $query;

    }
	public function MostrarParroquiaId(){
        $sql = "SELECT * FROM parroquia WHERE id_parroquia = {$this->getId()}";
		$query = $this->db->query($sql);
						
		return $query;

    }
	public function MostrarDetalesParroquia(){
        $sql = "SELECT * FROM parroquia WHERE id_parroquia = {$this->getId()}";
		$query = $this->db->query($sql);
						
		return $query;

    }
	public function SacerdotesParroquia() {
		$sql = "SELECT * FROM parroco WHERE id = {$this->getId()}";
		$query = $this->db->query($sql);
						
		return $query;
	}
	public function MostrarDetallesParroquias() {
		
		$sql = "SELECT *  FROM parroquia p  WHERE p.id_parroquia = {$this->getId()}";
		$query = $this->db->query($sql);
		
		return $query;
		
	}
	public function MostrarParroco() {
		$sql = "SELECT * FROM parroco ORDER BY nombres ASC ";
		$query = $this->db->query($sql);
		return $query;
	}
	
	public function Guardar() {
		$sql = "INSERT INTO parroquia VALUES (NULL,{$this->getId_vicaria()},{$this->getId_sacerdote()},'{$this->getNombre()}','{$this->getDireccion()}','{$this->getMunicipio()}','{$this->getTelefono()}','{$this->getFundada()}','{$this->getDecreto()}','{$this->getExtencion()}','{$this->getLimites()}','{$this->getFiestapatronal()}',{$this->getId_vicario()},{$this->getId_sac_anterior()},{$this->getId_vic_anterior()},'{$this->getFoto()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function Actualizar() {
		$sql = "UPDATE parroquia SET id_vicaria={$this->getId_vicaria()},id_sacerdote={$this->getId_sacerdote()},nombre='{$this->getNombre()}',direccion='{$this->getDireccion()}',municipio='{$this->getMunicipio()}',telefono='{$this->getTelefono()}',fundada='{$this->getFundada()}',decreto='{$this->getDecreto()}',extencion='{$this->getExtencion()}',limites='{$this->getLimites()}',fiestapatronal='{$this->getFiestapatronal()}',id_vicario={$this->getId_vicario()},id_sac_anterios={$this->getId_sac_anterior()},id_vic_anterior={$this->getId_vic_anterior()},foto='{$this->getFoto()}' WHERE id_parroquia = {$this->getId()}";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function Traslado() {
		if($this->getId_sacerdote() != NULL){
				$sql = "UPDATE parroquia SET id_sacerdote = {$this->getId_sacerdote()},id_sac_anterios = {$this->getId_sac_anterior()} WHERE id_parroquia = {$this->getId()}";
		}else{
				$sql = "UPDATE parroquia SET id_vicario = {$this->getId_vicario()},id_vic_anterior = {$this->getId_vic_anterior()} WHERE id_parroquia = {$this->getId()}";
		}			
				
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function ActualizarSacerdote() {
		if($this->getId_sacerdote() != NULL){
			$sql = "UPDATE parroquia SET  id_sacerdote = {$this->getId_sacerdote()}  WHERE id_parroquia = {$this->getId()}";
		}else{
			$sql = "UPDATE parroquia SET  id_vicario = {$this->getId_vicario()}  WHERE id_parroquia = {$this->getId()}";
		}
		
		$rept = $this->db->query($sql);
		$resul = FALSE;
		if($rept){
			$resul = TRUE;
		}
		return $resul;
	}

}