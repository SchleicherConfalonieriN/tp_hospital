<?php

//modelo
require_once '../class_helper/seguridad.php';

class Consultorio extends Model {	
	
	public function getTodos(){
		$this->db->query("SELECT * FROM consultorios");
		return $this->db->fetchAll();
	}
	
	public function esConsultorioLibre($numero){
	
		seguridad::consultorio_validacion($numero);
		$this->db->query("SELECT * FROM medicos where consultorio = '$numero'");
		if (($this->db->numRows()==0)) return true;
		return false;
	}
	
	public function existeConsultorio($numero){
	
		seguridad::consultorio_validacion($numero);
		$this->db->query("SELECT * FROM consultorios where numero = '$numero'");
		if (($this->db->numRows()==0)) return false;
		return true;
	}

	
}

