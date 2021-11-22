<?php

//modelo


class Especialidad extends Model {	
	
	public function getTodos(){
		$this->db->query("SELECT * FROM especialidades");
		return $this->db->fetchAll();
	}
	
	public function existeEspecialidad($id){
		seguridad::id_validacion($id);
		$this->db->query("SELECT * FROM especialidades WHERE especialidad_id = '$id'");
		if (($this->db->numRows()==1)) return true; //si encuentra la especialidad entonces existe
		return false;
	}
	
	public function eliminarEspecialidad($id){
	seguridad::id_validacion($id);
	$this->db->query("delete from especialidades where especialidad_id='$id'");		
	}

	public function darDeAlta($nombre){
		seguridad::nombre_validacion($nombre);
		$this->db->query("INSERT INTO  especialidades (nom_especialidad) VALUES ('$nombre')");
	}
	
}

