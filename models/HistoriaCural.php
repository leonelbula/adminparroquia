<?php

require_once 'ModeloBase.php';

class HistoriaCural extends ModeloBase {
	
	private $id_hist;
	private $id_sacerdote;
	private $id_parroquia;
	private $parroquia;
	private $cargo;
	private $desde;
	private $hasta;
			
	function getId_hist() {
		return $this->id_hist;
	}

	function getId_sacerdote() {
		return $this->id_sacerdote;
	}
	function getId_parroquia() {
		return $this->id_parroquia;
	}

	function getParroquia() {
		return $this->parroquia;
	}

	function getCargo() {
		return $this->cargo;
	}

	function getDesde() {
		return $this->fecha;
	}
	
	function getHasta() {
		return $this->hasta;
	}

	function setId_hist($id_hist) {
		$this->id_hist = $id_hist;
	}

	function setId_sacerdote($id_sacerdote) {
		$this->id_sacerdote = $id_sacerdote;
	}
	function setId_parroquia($id_parroquia) {
		$this->id_parroquia = $id_parroquia;
	}

	function setParroquia($parroquia) {
		$this->parroquia = $parroquia;
	}

	function setCargo($cargo) {
		$this->cargo = $cargo;
	}

	function setDesde($fecha) {
		$this->fecha = $fecha;
	}
	function setHasta($hasta) {
		$this->hasta = $hasta;
	}
					
	
	function __construct() {
		parent::__construct();
	}
	//mostrar historial curral  me diente al id del sacerdote
	public function MostrarHistoriaCural() {
		$sql = "SELECT *  FROM historial_cural  WHERE  id_sacerdote = {$this->getId_sacerdote()} ORDER BY hasta DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	//mostrar historial curral  me diente al id del sacerdote
	public function MostrarHistoriaParroquia() {
		$sql = "SELECT * FROM historial_cural h ,parroco p  WHERE  id_parroquia = {$this->getId_parroquia()} AND p.id = h.id_sacerdote ORDER BY hasta DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	//guardar la informacion del historial 
	public function GuardarHistoria() {
		$sql = "INSERT INTO historial_cural VALUES (NULL,{$this->getId_sacerdote()},{$this->getId_parroquia()},'{$this->getParroquia()}','{$this->getCargo()}','{$this->getDesde()}','{$this->getHasta()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	//eliminar el historial 
	public function EliminarParHist() {
		$sql = "DELETE FROM historial_cural WHERE id_parroquia = {$this->getId_parroquia()}";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	//metodo para obtener el ultimo registro del historial
	public function verHultinoRegitro() {
		$sql = "SELECT * FROM historial_cural WHERE id_sacerdote = {$this->getId_sacerdote()} ORDER by id_historial_cural DESC LIMIT 1";
		$resul = $this->db->query($sql);
		return $resul;
	}

}