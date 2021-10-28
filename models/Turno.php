<?php

//modelo

class Turno extends Model {
	
	public function getTodosPorUsuario($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT turno_id, dni_paciente, dni_medico, fecha, hora, consultorio, usuarios.nombre, usuarios.apellido from turnos left join usuarios on usuarios.dni=turnos.dni_medico where dni_paciente = " . $dni);
		return $this->db->fetchAll();
	}


	public function getTodosPorMedico($dni){
		if (!ctype_digit($dni)) die("error");
		$this->db->query("SELECT turno_id, dni_paciente, dni_medico, fecha, hora, consultorio, usuarios.nombre, usuarios.apellido from turnos left join usuarios on usuarios.dni=turnos.dni_medico where dni_medico = " . $dni);
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
		if (!ctype_digit($id)) die("error");
		$this->db->query("DELETE FROM turnos WHERE turno_id = " . $id);
	}
	
	//public function getTurnosAgendados($dni_medico, $fecha){
		//validar
	//	$this->db->query("SELECT * FROM turnos WHERE dni_medico =" . $dni_medico . );
	//}
	
}