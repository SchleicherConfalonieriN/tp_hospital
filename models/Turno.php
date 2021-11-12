<?php

//modelo

class Turno extends Model {
	
	public function getTodosPorUsuario($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT turno_id, dni_paciente, servicio, fecha, hora, consultorio, usuarios.nombre, usuarios.apellido from turnos left join usuarios on usuarios.dni=turnos.servicio where dni_paciente = " . $dni);
		return $this->db->fetchAll();
	}

	public function getTurnosPorUsuario($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT turno_id, dni_paciente, servicio, fecha, hora, consultorio, usuarios.nombre, usuarios.apellido from turnos left join usuarios on usuarios.dni=turnos.servicio where dni_paciente = '$dni' AND servicio > 500000");
		return $this->db->fetchAll();
	}


	

	public function cambiarTurnoFecha($id,$fecha,$hora){
		$this->db->query("UPDATE `turnos` SET fecha = '$fecha' where turno_id='$id'");

		$this->db->query("UPDATE `turnos` SET hora = '$hora' where turno_id='$id'");
	}


	public function getEstudiosPorUsuario($dni){
		if (!ctype_digit($dni)) die("error");
				$this->db->query("SELECT turno_id, dni_paciente, servicio, fecha, hora, consultorio, estudios.nom_estudio from turnos left join estudios on turnos.servicio=estudios.estudio_id where dni_paciente = '$dni' AND servicio < 500000");
		return $this->db->fetchAll();
	}

	public function getTodosPorMedico($dni){
	

		$this->db->query("SELECT * from turnos  where servicio = " . $dni);
		return $this->db->fetchAll();

	}
	public function coincideIdYPaciente($turno_id,$dni){
		if (!ctype_digit($dni)) die("error");
		if (!ctype_digit($turno_id)) die("error");
		$this->db->query("SELECT dni_paciente FROM turnos WHERE turno_id = " . $turno_id);
		$d = $this->db->fetch();
		if($d['dni_paciente']==$dni) return true;
		return false;
	}
	
	public function anularTurno($id){
		
		$this->db->query("DELETE FROM turnos WHERE turno_id = " . $id);
	}
	


	public function getTodos(){
		$this->db->query("SELECT * from turnos");
		return $this->db->fetchAll();
	}

	public function agendarTurno($dni_medico,$dni_usuario,$fecha,$hora){
		//validar
		$this->db->query("INSERT INTO turnos (servicio, dni_paciente, fecha, hora) values ( '$dni_medico' , '$dni_usuario' , '$fecha' , '$hora' )");

		$this->db->query("UPDATE `turnos` SET consultorio = (select consultorio from medicos WHERE medicos.dni = turnos.servicio)");
	}
	
	public function getTurnosAgendados($dni_medico, $fecha){
		//validar
		$this->db->query("SELECT * FROM turnos WHERE servicio = '$dni_medico' and fecha= '$fecha'");
		//$this->db->query("SELECT * FROM turnos WHERE dni_medico =" . $dni_medico);
		return $this->db->fetchAll();
	}
	
	public function getDatosTurno($id){
		if (!ctype_digit($id)) die("error");
		$this->db->query("SELECT * FROM turnos WHERE turno_id = " . $id . " LIMIT 1");
		return $this->db->fetch();
	}
	
	public function esTurnoLibre($dni_medico,$fecha,$hora){
		//validarrr
		if (!ctype_digit($dni_medico)) die("error");
		$this->db->query("SELECT * FROM turnos WHERE servicio = '$dni_medico' and fecha = '$fecha' and hora ='$hora' LIMIT 1");
		if (($this->db->numRows()==0)) return true;
		return false;
	}

	public function coincideIdYUsuario($turno_id,$dni){
		if (!ctype_digit($dni)) die("error");
		if (!ctype_digit($turno_id)) die("error");
		$this->db->query("SELECT * FROM turnos WHERE turno_id = " . $turno_id ." limit 1");
		$d = $this->db->fetch();
		if($d['dni_paciente']==$dni) return true;
		if($d['servicio']==$dni) return true;
		return false;
	}
	
	public function getTodosPorMedicoYFecha($dni,$fecha){
		if (!ctype_digit($dni)) die("error");
		//validar fecha
		$this->db->query("SELECT turno_id, dni_paciente, servicio, fecha, hora, consultorio, usuarios.nombre, usuarios.apellido 
		from turnos left join usuarios on usuarios.dni=turnos.dni_paciente 
		where servicio = " . $dni . " and fecha = '" . $fecha. "' ORDER BY hora");
		return $this->db->fetchAll();
	}





}