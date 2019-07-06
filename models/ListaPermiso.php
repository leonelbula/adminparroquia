<?php

require_once 'ModeloBase.php';

class ListaPermiso extends ModeloBase{
	
	private $id_listapermisos;	
	private $id_usuario;
	private $id_permiso;
	
	function getId_listapermisos() {
		return $this->id_listapermisos;
	}

	function getId_usuario() {
		return $this->id_usuario;
	}

	function getId_permiso() {
		return $this->id_permiso;
	}

	function setId_listapermisos($id_listapermisos) {
		$this->id_listapermisos = $id_listapermisos;
	}

	function setId_usuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

	function setId_permiso($id_permiso) {
		$this->id_permiso = $id_permiso;
	}

	public function __construct() {
		parent::__construct();
	}
	public function GuardarPermisos() {
		$sql = "INSERT INTO listapermisos VALUES (NULL,{$this->getId_usuario()},'{$this->getId_permiso()}')";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
	public function VerpermisosAsignados() {
		$sql = "SELECT * FROM listapermisos WHERE id_usuario = {$this->getId_usuario()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Eliminalistapermisos() {
		$sql = "DELETE FROM listapermisos WHERE id_usuario = {$this->getId_usuario()}";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
}