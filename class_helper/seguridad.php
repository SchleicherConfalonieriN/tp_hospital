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

	$verificacion;
	$verificacion=0;

		if(!is_numeric($tipo)){
			$verificacion=$verificacion+1;
		}

		if(($tipo > 2) || ($tipo < 0)){
			$verificacion=$verificacion+1;
		}


		if($verificacion>0){
		return false;}
		else{return true;}
	}


		public function contra_validacion($contra){

	$verificacion;
	$verificacion=0;


	

		if ($contra<0){
			$verificacion= $verificacion+1;
		}
		
		if($verificacion>0){
		return false;}
		else{return true;}
	}


	public function especialidad_validacion($especialidad){

	$verificacion;
	$verificacion=0;


		if(preg_match('/^[a-zA-z]*$/', $especialidad)==1){
		return true;}
		else{return false;}
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



}//FINAL DE CLASE


//new seguridad




//Exceptions
class ValidationException extends exception{}


 ?>