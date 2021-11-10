<?php 


class seguridad{
	

public function dni_validacion($dni){

		if (!ctype_digit($dni)) throw new ValidationException("Dni invalido");
		

		if ($dni<0 or $dni>100000000)throw new ValidationException("Valor de dni invalido");

	}


public function nombre_validacion($nombre){

	

		if(preg_match('/^[a-zA-Z]*$/', $nombre)!=1)throw new ValidationException("Nombre invalido", 1);
	}


public function apellido_validacion($apellido){

	
		if(preg_match('/^[a-zA-Z]*$/', $apellido)!=1)throw new ValidationException("Error Processing Request", 1);
	}



public function email_validacion($mail){

	$verificacion;
	$verificacion=0;


		if (filter_var($mail,FILTER_VALIDATE_EMAIL)){
		}else{$verificacion=$verificacion+1;}
		
		if($verificacion>0){
		return false;}
		else{return true;}
	}

	public function tipo_validacion($tipo){
	


	if ($tipo!=0 && $horario!=1 && $horario!=2){throw new ValidationException("Formato de horario invalido");}
	}


		public function contra_validacion($contra){


	if (!ctype_digit($dni)) throw new ValidationException("Contraseña invalida");
	}


	public function especialidad_validacion($especialidad){

		if(!preg_match('/^[a-zA-z]*$/', $especialidad)==1){throw new ValidationException("Formato de Especialidad Invalido");}
	}


	public function hash_contra($contra){

		$hashcontra=password_hash($contra, PASSWORD_DEFAULT);
		return $hashcontra;
	}

	public function verify_contra($contra,$datos){

		if (password_verify($contra, $datos['contrasenia'])){
			return true;
		}else{
			return false;
		}
	}


		public function consultorio_validacion($consultorio){


	if (!ctype_digit($consultorio)) throw new ValidationException("Numero de Consultorio Invalido");
	}



		public function horario_validacion($horario){


	if ($horario!=M && $horario!=T){throw new ValidationException("Formato de horario invalido");}
	
}


	public function precio_validacion($precio){


	if (!ctype_digit($precio)) throw new ValidationException("Formato de precio invalido");
	
}

	public function descripcion_validacion($descripcion){


	if(!preg_match('/^[a-zA-z]*$/', $descripcion)==1){throw new ValidationException("Formato de Especialidad Invalido");}
	

	
}



}//FINAL DE CLASE


//new seguridad




//Exceptions
class ValidationException extends exception{}


 ?>