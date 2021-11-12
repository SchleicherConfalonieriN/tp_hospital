<?php

//modelo


class Especialidad extends Model {
	
	
	public function getTodos(){
		$this->db->query("SELECT * FROM especialidades");
		return $this->db->fetchAll();
	}
	
}

