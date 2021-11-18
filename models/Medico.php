<?php

//modelo



class Medico extends Model {
	
	public function informacion($dni,$s){
	
	$s->dni_validacion($dni);
	$this->db->query("SELECT * from medicos where dni='$dni'");
	return $this->db->fetchAll();
	}
	
	public function getTodos(){
		$this->db->query("SELECT * FROM `medicos` LEFT JOIN especialidades ON medicos.especialidad=especialidades.especialidad_id");
		return $this->db->fetchAll();
	}
	
	public function generarHorariosDeAtencion($dni,$s){
	
		$s->dni_validacion($dni);
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

	public function registroMedico ($dni, $nombre, $apellido, $contra, $mail, $especialidad,$tipo,$horario,$consultorio,$s){
		$s->dni_validacion($dni);
		$s->nombre_validacion($nombre);
		$s->apellido_validacion($apellido);
		$hashcontra=$s->hash_contra($contra);
		$s->email_validacion($mail);
		$s->especialidad_validacion($especialidad);
		$s->tipo_validacion($tipo);

		$this->db->query("INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `contrasenia`, `tipo`, `mail`) VALUES ('$dni', '$nombre', '$apellido', '$hashcontra', '$tipo', '$mail')");

		$this->db->query("INSERT INTO `medicos` (`dni`, `nom_medico`, `ape_medico`,`especialidad`,`consultorio`,`horario`) VALUES ('$dni', '$nombre', '$apellido', '$especialidad','$consultorio','$horario')");
	}

	public function eliminarMedico($dni,$s){
		$s->dni_validacion($dni);
		$this->db->query("delete from usuarios where dni='$dni'");
		$this->db->query("delete from medicos where dni='$dni'");
	}



	public function cambiar_consultorio ($dni,$consultorio,$s){
		$s->dni_validacion($dni);
		$s->consultorio_validacion($consultorio);
	//	$s->dni_consultorio($identificador);
		$this->db->query("UPDATE `medicos` SET consultorio = '$consultorio' where dni='$dni'");
	}


	public function cambiar_horario ($dni,$turno,$s){
		$s->dni_validacion($dni);
		$s->horario_validacion($turno);
		//$s->dni_turno($identificador);		
		$this->db->query("UPDATE `medicos` SET horario = '$turno' 
		where dni='$dni'");
	}
	
	public function getTodosPorEspecialidad($id){
		$s->id_validacion($id);
		$this->db->query("SELECT * FROM medicos LEFT JOIN especialidades ON medicos.especialidad=especialidades.especialidad_id where especialidad = " . $id);
		return $this->db->fetchAll();
	}



}// fin de la clase


//Exceptions

?>

