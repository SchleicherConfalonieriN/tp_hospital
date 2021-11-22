<?php 


class seguridad{

	public static function id_validacion($id){
		if (!ctype_digit($id)) throw new ValidationException("Id invalido");
		if ($id<1 or $id>500)throw new ValidationException("Valor de Id invalido");
	}

	public static function dni_validacion($dni){
		if (!ctype_digit($dni)) throw new ValidationException("DNI invalido");
		if ($dni<1000 or $dni>100000000){throw new ValidationException("Valor de DNI invalido");}
		}

	public static function nombre_validacion($nombre){
			
			if (strlen($nombre)<3 OR strlen($nombre)>15)throw new ValidationException("Nombre invalido", 1);
		}

	public static function apellido_validacion($apellido){
			
			if (strlen($apellido)<3 OR strlen($apellido)>15){throw new ValidationException("Apellido Invalido", 1);}
			}

	public static function email_validacion($mail){
			if (!filter_var($mail,FILTER_VALIDATE_EMAIL)){throw new ValidationException("Email invalido");}
				}

	public static function tipo_validacion($tipo){
			if ($tipo!=0 && $tipo!=1 && $tipo!=2){throw new ValidationException("Tipo de usuario invalido");}
			}

	public static function contra_validacion($contra){
			if (!ctype_digit($contra)){throw new ValidationException("Contraseña Ivalida");
				}
		}
	public static function especialidad_validacion($especialidad){

	if (strlen($especialidad)<4 OR strlen($especialidad)>35)throw new ValidationException("Nombre invalido", 1);
	

	}

	public static function hash_contra($contra){

	$hashcontra=password_hash($contra, PASSWORD_DEFAULT);
	return $hashcontra;
		}

	public static function verify_contra($contra,$datos){

		if (password_verify($contra, $datos['contrasenia'])){
				return true;
		}else{return false;}
		}


	public static function consultorio_validacion($consultorio){
		if (!ctype_digit($consultorio)) {throw new ValidationException("Numero de Consultorio Invalido");}
		if($consultorio<0 OR $consultorio>500){throw new ValidationException("Numero de Consultorio Invalido");}
	 	} 

	public static function horario_validacion($horario){
		if ($horario!="m" && $horario!="t"){throw new ValidationException("Formato de horario invalido");}	
	}
	public static function precio_validacion($precio){
		if($precio<0){throw new ValidationException("Formato de precio invalido");}
		if (!ctype_digit($precio)){throw new ValidationException("Formato de precio invalido");}
	}

	public static function descripcion_validacion($descripcion){
		if (strlen($descripcion)<5 OR strlen($descripcion)>100)throw new ValidationException("Nombre invalido", 1);
	}

	public static function hora_validacion($hora){
	if(!strtotime($hora))throw new ValidationException("hora no valida");
	}

	public static function fecha_validacion($fecha){
	$f=explode('-', $fecha);
	if(!is_numeric($f[0]) OR !is_numeric($f[1]) OR !is_numeric($f[2])){throw new ValidationException("Fecha no valida");}
	if(!checkdate($f[1],$f[2],$f[0])){throw new ValidationException("Fecha no valida");}

	}


}//FINAL DE CLASE




class ValidationException extends exception{}
 ?> 