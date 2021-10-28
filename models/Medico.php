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

	public function registroMedico ($dni, $nombre, $apellido, $contra, $mail, $especialidad,$tipo){

		$this->db->query("INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `contrasenia`, `tipo`, `mail`) VALUES ('$dni', '$nombre', '$apellido', '$contra', '$tipo', '$especialidad')");

		$this->db->query("INSERT INTO `medicos` (`dni`, `nom_medico`, `ape_medico`,`especialidad`) VALUES ('$dni', '$nombre', '$apellido', '$especialidad')");


	}

	public function eliminarMedico($dni){

		$this->db->query("delete from usuarios where dni='$dni'");
		$this->db->query("delete from medicos where dni='$dni'");

	}

}


