<?php

require_once 'config/DataBase.php';

class ModeloBase{
	
	public  $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}

	public function MostrarPorId($tabla,$id){
        $sql = "SELECT * FROM $tabla WHERE id = $id";
		$query = $this->db->query($sql);
						
		return $query;

    }
    public function MostrarTodo($tabla,$ordenar,$forma){
        $sql = "SELECT * FROM $tabla ORDER BY $ordenar $forma";
		$query = $this->db->query($sql);
		
		return $query;
    }
		
    public function Eliminar($tabla,$parm){
        $sql = "DELETE FROM $tabla WHERE id_$tabla = $parm";
		$query = $this->db->query($sql);
		
		$reslt = FALSE;
		
		if($query){
			$reslt = TRUE;
		}
		
		return $reslt;
        
    }
    
}
