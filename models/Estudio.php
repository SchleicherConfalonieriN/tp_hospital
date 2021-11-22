<?php 

//modelo
require_once '../class_helper/seguridad.php';


class Estudio extends Model{

	public function getTodos(){
		$this->db->query("SELECT * from estudios");
		return $this->db->fetchAll();
	}
	
	public function getDatosEstudio($id){		
		seguridad::id_validacion($id);	
		$this->db->query("SELECT * FROM estudios WHERE estudio_id = " . $id . " LIMIT 1");
		if (($this->db->numRows()==0)) throw new ValidationException("Id invalido");
		return $this->db->fetch();
	}
	
	public function existeEstudio($id){		
		seguridad::id_validacion($id);	
		$this->db->query("SELECT * FROM estudios WHERE estudio_id = '$id'");
		if (($this->db->numRows()==1)) return true; //si lo encuentra entonces existe
		return false;
	}
	
	public function generarHorariosDeEstudios($id){		
		seguridad::id_validacion($id);
		$this->db->query("SELECT horario FROM estudios where estudio_id = " . $id . " limit 1");
		$h=$this->db->fetch();
		$hora="08:00";
		if ($h['horario']=="t") $hora="13:00";
		$retorno=[];
		for($i=0;$i<20;$i++){
			array_push($retorno,$hora);
			$hora=date("H:i",strtotime ($hora. '+15 minutes'));			
		}
		return $retorno;
	}
	
	public function verificarHora($id,$hora_a_verificar){		
		seguridad::id_validacion($id);
		seguridad::hora_validacion($hora_a_verificar);
		$this->db->query("SELECT horario FROM estudios where estudio_id = " . $id . " limit 1");
		$h=$this->db->fetch();
		$hora="08:00";
		if ($h['horario']=="t") $hora="13:00";
		for($i=0;$i<20;$i++){
			if($hora==$hora_a_verificar) return true;
			$hora=date("H:i",strtotime ($hora. '+15 minutes'));	
		}
		return false;
	}
	
	public function DarDeAlta($nombre,$descripcion,$precio,$horario){		
		seguridad::nombre_validacion($nombre);
		seguridad::descripcion_validacion($descripcion);
		seguridad::precio_validacion($precio);
		seguridad::horario_validacion($horario);
		seguridad::tipo_validacion($tipo);
		$this->db->query("INSERT INTO estudios (nom_estudio, desc_estudio, precio, horario) VALUES ('$nombre', '$descripcion', '$precio', '$horario')");
	}

}// FIN DE CLASE
 ?>
