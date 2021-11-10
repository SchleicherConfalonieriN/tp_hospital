<?php

//modelo
require '../models/Usuario.php';

class Medico extends Usuario {
	
	private $especialidad;

	public function informacion($dni){


	$s->dni_validacion($identificador);

		$this->db->query("SELECT * from medicos where dni='$dni'");
		return $this->db->fetchAll();
	}

	
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

	public function registroMedico ($dni, $nombre, $apellido, $contra, $mail, $especialidad,$tipo,$s){
		$s->dni_validacion($dni);
		$s->nombre_validacion($nombre);
		$s->apellido_validacion($apellido);
		$hashcontra=$s->hash_contra($contra);
		$s->email_validacion($mail);
		$s->especialidad_validacion($especialidad);
		$s->tipo_validacion($tipo);

		$this->db->query("INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `contrasenia`, `tipo`, `mail`) VALUES ('$dni', '$nombre', '$apellido', '$hashcontra', '$tipo', '$mail')");

		$this->db->query("INSERT INTO `medicos` (`dni`, `nom_medico`, `ape_medico`,`especialidad`) VALUES ('$dni', '$nombre', '$apellido', '$especialidad')");
	}

	public function eliminarMedico($dni,$s){
		

		$s->dni_validacion($identificador);

		$this->db->query("delete from usuarios where dni='$dni'");
		$this->db->query("delete from medicos where dni='$dni'");

	}



	public function cambiar_consultorio ($dni,$consultorio,$s){

		$s->dni_validacion($identificador);
	//	$s->dni_consultorio($identificador);

	$this->db->query("UPDATE `medicos` SET consultorio = '$consultorio' where dni='$dni'");
	}


	public function cambiar_horario ($dni,$turno,$s){

		$s->dni_validacion($identificador);
		//$s->dni_turno($identificador);
		
	$this->db->query("UPDATE `medicos` SET horario = '$turno' 
	where dni='$dni'");
	}



}// fin de la clase


