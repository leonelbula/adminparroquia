<?php

require_once 'ModeloBase.php';

class ComisionesPastorales extends ModeloBase{
	
	private $id_comisiones_pastorales;
	private $nombre;
	private $id_sacerdote;
	
	function getId_comisiones_pastorales() {
		return $this->id_comisiones_pastorales;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getId_sacerdote() {
		return $this->id_sacerdote;
	}

	function setId_comisiones_pastorales($id_comisiones_pastorales) {
		$this->id_comisiones_pastorales = $id_comisiones_pastorales;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setId_sacerdote($id_sacerdote) {
		$this->id_sacerdote = $id_sacerdote;
	}

	public function __construct() {
		parent::__construct();
	}
	public function MostrarComisiones() {
		$sql = "SELECT c.* ,p.nombres nombresacerdote ,p.apellidos FROM comisiones_pastorales c, parroco p WHERE c.id_sacerdote = p.id";
		$reps = $this->db->query($sql);
		return $reps;
	}
	public function Guardar() {
		$sql = "INSERT INTO comisiones_pastorales VALUES (NULL,'{$this->getNombre()}',{$this->getId_sacerdote()})";
		$reps = $this->db->query($sql);
		
		$respt = FALSE;
		if($reps){
			$respt = TRUE;
		}
		return $respt;
	}
	public function MostrarParroco() {
		$sql = "SELECT * FROM parroco ORDER BY nombres ASC ";
		$query = $this->db->query($sql);
		return $query;
	}
	public function VerComision() {
		$sql = "SELECT * FROM comisiones_pastorales WHERE id_comisiones_pastorales = {$this->getId_comisiones_pastorales()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Actulizar() {
		$sql = "UPDATE comisiones_pastorales SET nombre='{$this->getNombre()}',id_sacerdote={$this->getId_sacerdote()} WHERE id_comisiones_pastorales = {$this->getId_comisiones_pastorales()}";
		$resp = $this->db->query($sql);
		$respt = FALSE;
		if($resp){
			$respt = TRUE;
		}
		return $resp;
	}
}