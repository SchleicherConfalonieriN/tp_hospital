<?php

//modelo
require '../models/Usuario.php';

class Medico extends Usuario {
	
	private $especialidad;
	
	public function getTodos(){
		$this->db->query("SELECT * FROM medicos");
		return $this->db->fetchAll();
	}
	
	public function generarHorariosDeAtencion(){
		$hora="08:00";
		$retorno=[];
		for($i=0;$i<10;$i++){
			$hora=date("H:i",strtotime ($hora. '+30 minutes'));
			array_push($retorno,$hora);
		}
		return $retorno;
	}
}

