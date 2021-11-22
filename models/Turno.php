<?php

//modelo
require_once '../class_helper/seguridad.php';

class Turno extends Model {
	
	public function getTodosPorUsuario($dni){
		
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT turno_id, dni_paciente, servicio, fecha, hora, consultorio, usuarios.nombre, usuarios.apellido from turnos left join usuarios on usuarios.dni=turnos.servicio where dni_paciente = " . $dni);
		return $this->db->fetchAll();
	}

	public function getTurnosPorUsuario($dni){
		
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT turno_id, dni_paciente, servicio, fecha, hora, consultorio, usuarios.nombre, usuarios.apellido from turnos left join usuarios on usuarios.dni=turnos.servicio where dni_paciente = '$dni' AND servicio > 500000");
		return $this->db->fetchAll();
	}
	
	public function getEstudiosPorUsuario($dni){
		
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT turno_id, dni_paciente, servicio, fecha, hora, consultorio, estudios.nom_estudio from turnos left join estudios on turnos.servicio=estudios.estudio_id where dni_paciente = '$dni' AND servicio < 500000");
		return $this->db->fetchAll();
	}
	
	public function esTurnoLibre($dni_medico,$fecha,$hora){
		$this->db->query("SELECT * from turnos where servicio = '$dni' AND fecha = '$fecha' AND hora = '$hora' LIMIT 1");
		if (($this->db->numRows()==0)) return true;
		return false;
	}
	
	public function agendarTurno($dni_medico,$dni_usuario,$fecha,$hora){
		
		seguridad::dni_validacion($dni_medico);
		seguridad::dni_validacion($dni_usuario);
		$fecha=date("Y-m-d", strtotime($fecha));
		$hora=date("H:i",strtotime($hora));
		$this->db->query("INSERT INTO turnos (servicio, dni_paciente, fecha, hora) values ( '$dni_medico' , '$dni_usuario' , '$fecha' , '$hora' )");
		$this->db->query("UPDATE `turnos` SET consultorio = (select consultorio from medicos WHERE medicos.dni = turnos.servicio)");
	}
	
	public function agendarTurnoEstudio($id_estudio,$dni_usuario,$fecha,$hora){
		
		seguridad::id_validacion($id_estudio);
		seguridad::dni_validacion($dni_usuario);
		$fecha=date("Y-m-d", strtotime($fecha));
		$hora=date("H:i",strtotime($hora));
		$this->db->query("INSERT INTO turnos (servicio, dni_paciente, fecha, hora) values ( '$id_estudio' , '$dni_usuario' , '$fecha' , '$hora' )");
	}
	
	public function existeTurno($id){
		
		seguridad::id_validacion($id);
		$this->db->query("SELECT * FROM turnos WHERE turno_id = '$id'");
		if (($this->db->numRows()==1)) return true; //si lo encuentra entonces existe
		return false;
	}
	
	public function getDatosTurno($id){
		
		seguridad::id_validacion($id);
		$this->db->query("SELECT * FROM turnos WHERE turno_id = " . $id . " LIMIT 1");
		if (($this->db->numRows()==0)) throw new ValidationException("Turno Inexistente");
		return $this->db->fetch();
	}
	
	public function anularTurno($id){
		
		seguridad::id_validacion($id);		
		$this->db->query("DELETE FROM turnos WHERE turno_id = " . $id);
	}
	
	public function coincideIdYUsuario($turno_id,$dni){
		
		seguridad::id_validacion($turno_id);
		seguridad::dni_validacion($dni);
		$this->db->query("SELECT * FROM turnos WHERE turno_id = " . $turno_id ." limit 1");
		$d = $this->db->fetch();
		if (($this->db->numRows()==0)) return false;
		if($d['dni_paciente']==$dni) return true;
		if($d['servicio']==$dni) return true;
		return false;
	}
	
	public function getTodosPorMedicoYFecha($dni,$fecha){
		
		seguridad::dni_validacion($dni);
		$fecha=date("Y-m-d",strtotime($fecha));
		$this->db->query("SELECT turno_id, dni_paciente, servicio, fecha, hora, consultorio, usuarios.nombre, usuarios.apellido 
		from turnos left join usuarios on usuarios.dni=turnos.dni_paciente 
		where servicio = " . $dni . " and fecha = '" . $fecha. "' ORDER BY hora");
		return $this->db->fetchAll();
	}
	
	public function getTodosPorEstudioYFecha($id,$fecha){
		
		seguridad::id_validacion($id);
		$fecha=date("Y-m-d",strtotime($fecha));
		$this->db->query("SELECT turno_id, dni_paciente, servicio, fecha, hora, consultorio, usuarios.nombre, usuarios.apellido 
		from turnos left join usuarios on usuarios.dni=turnos.dni_paciente 
		where servicio = " . $id . " and fecha = '" . $fecha. "' ORDER BY hora");
		return $this->db->fetchAll();
	}


	public function cambiarConsultorioDeTurnos($dni_medico,$consultorio){
		
		seguridad::dni_validacion($dni_medico);
		seguridad::consultorio_validacion($consultorio);
		$this->db->query("UPDATE turnos SET consultorio = '$consultorio' where servicio='$dni_medico'");
	}

}