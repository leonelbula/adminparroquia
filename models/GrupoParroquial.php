<?php

require_once 'ModeloBase.php';

class GrupoParroquial extends ModeloBase{

	private $id;
	private $id_parroquia;
	private $nombreGrupo;
	private $encargadoGrupo;
	private $proEdadGrupo;
			
	function __construct() {
		parent::__construct();
	}
	
	function getId() {
		return $this->id;
	}

	function getId_parroquia() {
		return $this->id_parroquia;
	}

	function getNombreGrupo() {
		return $this->nombreGrupo;
	}

	function getEncargadoGrupo() {
		return $this->encargadoGrupo;
	}

	function getProEdadGrupo() {
		return $this->proEdadGrupo;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setId_parroquia($id_parroquia) {
		$this->id_parroquia = $id_parroquia;
	}

	function setNombreGrupo($nombreGrupo) {
		$this->nombreGrupo = $nombreGrupo;
	}

	function setEncargadoGrupo($encargadoGrupo) {
		$this->encargadoGrupo = $encargadoGrupo;
	}

	function setProEdadGrupo($proEdadGrupo) {
		$this->proEdadGrupo = $proEdadGrupo;
	}

	public function MostrarGrupo() {
		$sql = "SELECT * FROM grupos_parroquial WHERE id_parroquia = {$this->getId_parroquia()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function GuardarGrupo() {
		$sql = "INSERT INTO grupos_parroquial VALUES (NUll,{$this->getId_parroquia()},'{$this->getNombreGrupo()}','{$this->getEncargadoGrupo()}','{$this->getProEdadGrupo()}')";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		
		if ($save) {
			$resul = TRUE;
		}
		return $resul;
	}
	public function Actualizar() {
		$sql = "UPDATE grupos_parroquial SET nombreGrupo='{$this->getNombreGrupo()}',encargadoGrupo='{$this->getEncargadoGrupo()}',proEdadGrupo='{$this->getProEdadGrupo()}' WHERE id_grupo= {$this->getId()}";
		$rept = $this->db->query($sql);
		
		$resul = FALSE;
		if($rept){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarG() {
		$sql = "DELETE FROM grupos_parroquial WHERE id_grupo = {$this->getId()}";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarGrupo() {
		$sql = "DELETE FROM grupos_parroquial WHERE id_parroquia = {$this->getId_parroquia()}";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}

}

