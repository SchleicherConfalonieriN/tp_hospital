<?php 

class seguridad{


	public function dni_validacion($dni){

	$verificacion;
	$verificacion=0;


		if (!ctype_digit($dni)){
			$verificacion= $verificacion+1;
		}

		if ($dni<0){
			$verificacion= $verificacion+1;
		}
		
		if($verificacion>0){
		return false;}
		else{return true;}
	}


public function nombre_validacion($nombre){

	$verificacion;
	$verificacion=0;


		if(preg_match('/^[a-zA-z]*$/', $nombre)==1){
		return true;}
		else{return false;}
	}


public function apellido_validacion($apellido){

	$verificacion;
	$verificacion=0;


		if(preg_match('/^[a-zA-z]*$/', $apellido)==1){
		return true;}
		else{return false;}
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


		if (!ctype_digit($contra)){
			$verificacion= $verificacion+1;
		}

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
}//FINAL DE CLASE




 ?>