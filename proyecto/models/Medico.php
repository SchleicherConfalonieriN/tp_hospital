<?php

//modelo
require_once '../models/Usuario.php';

class Medico extends Usuario {
	
	private $especialidad;
	
	public function getTodos(){
		$this->db->query("SELECT * FROM medicos");
		return $this->db->fetchAll();
	}
	
	public function generarHorariosDeAtencion($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT horario FROM medicos where dni = " . $dni . " limit 1");
		$h=$this->db->fetch();
		$hora="08:00";
		if ($h['horario']=="t") $hora="13:00";
		$retorno=[];
		for($i=0;$i<10;$i++){
			array_push($retorno,$hora);
			$hora=date("H:i",strtotime ($hora. '+30 minutes'));			
		}
		return $retorno;
	}
}

