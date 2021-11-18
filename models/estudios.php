<<?php 



class estudios extends Model{


			public function getTodos(){

					$this->db->query("SELECT * from estudios");
				return $this->db->fetchAll();

			}

			
			public function DarDeAlta($nombre,$descripcion,$precio,$horario,$s){

		
			$s->precio_validacion($precio);
			$s->descripcion_validacion($descripcion);
			$s->horario_validacion($horario);
			$s->nombre_validacion($nombre);
					$this->db->query("INSERT INTO estudios (estudio_id,nom_estudio, desc_estudio, precio, horario) VALUES ('$id','$nombre', '$descripcion', '$precio', '$horario')");
			}



			public function Eliminar($id,$s){
			
			$s->idEstudio_validacion($id);

				$this->db->query("delete from estudios where estudio_id='$id'");
			}


	
	public function getDatosEstudio($id){
		if (!ctype_digit($id)) die("error");
		$this->db->query("SELECT * FROM estudios WHERE estudio_id = " . $id . " LIMIT 1");
		return $this->db->fetch();
	}
	


	
	public function generarHorariosDeEstudios($identificador,$s){
		//Tendriamos que ver cada cuanto queremos que se generen los turnos para estudios. Aca esta hecho cada 15 minutos a partir de las 8:00 am
		$this->db->query("SELECT horario FROM estudios where estudio_id = " . $identificador . " limit 1");
		$h=$this->db->fetch();
		$hora="08:00";
		if ($h['horario']=="t") $hora="13:00";
		$retorno=[];
		for($i=0;$i<20;$i++){
			array_push($retorno,$hora);
			$hora=date("H:i",strtotime ($hora. '+15 minutes'));			
		}
		return $retorno;}



}// FIN DE CLASE

//Exceptions

 ?>