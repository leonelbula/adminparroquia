<?php

require_once 'ModeloBase.php';

class Usuario extends ModeloBase{
	
	private $id;
	private $nombre;
	private $password;
	private $tipo;
	private $estado;
	private $img;



	//private $db;


	public function __construct() {
		
		parent::__construct();
		
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre; 
	}

	function getPassword() {
		return $this->password;
	}

	function getTipo() {
		return $this->tipo;
	}

	function getEstado() {
		return $this->estado;
	}
	function getImg() {
		return $this->img;
	}

	
	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function setTipo($tipo) {
		$this->tipo = $this->db->real_escape_string($tipo);
	}

	function setEstado($estado) {
		$this->estado = $this->db->real_escape_string($estado);
	}
	function setImg($img) {
		$this->img = $img;
	}

	public function save() {
		$sql = "INSERT INTO usuarios VALUE(NULL,'{$this->getNombre()}','{$this->getPassword()}','{$this->getImg()}','{$this->getTipo()}','{$this->getEstado()}')";
		$save = $this->db->query($sql);
		
		$resul = false;
		
		if($save){
			 $resul = true;
		}
		return $resul;
	}
	
	public function Login() {
		
		$result = FALSE;
		$nombre = $this->nombre;
		$password = $this->password;
			
		$sql = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
		$login = $this->db->query($sql);
		
		if($login && $login->num_rows == 1){
			
			$usuario = $login->fetch_object();
			
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		return $result;
	}
    
	public function Actualizar() {
		
		//$2y$04$xVU2JBTSMllVDCGAwWMJdu.YM9VkkquxDl5gKwRWasegzw.LO8zo6
		
		$sql = "UPDATE usuarios SET nombre='{$this->getNombre()}',password='{$this->getPassword()}',img='{$this->getImg()}',tipo='{$this->getTipo()}',estado='{$this->getEstado()}' WHERE id='{$this->getId()}'";
		$save = $this->db->query($sql);
		
		$resul = FALSE;
		if($save){
			$resul = TRUE;
		}
		return $resul;
	}
    
}
