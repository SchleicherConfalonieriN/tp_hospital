<?php 


class seguridad{
	
	public function id_validacion($id){

		if(!isset($id))throw new ValidationException("Id  invalido");
		if (!ctype_digit($id)) throw new ValidationException("Id invalido");

		if ($id<1 or $id>150)throw new ValidationException("Valor de Id invalido");

	}
	public static function dni_validacion($dni){


		if(!isset($dni))throw new ValidationException("DNI invalido");
		if (!ctype_digit($dni)) throw new ValidationException("DNI invalido");
		if ($dni<1000 or $dni>100000000)throw new ValidationException("Valor de DNI invalido");

		}

	public static function nombre_validacion($nombre){

			if(!isset($nombre))throw new ValidationException("Nombre invalido", 1);
			if(preg_match('/^[a-zA-Z]*$/', $nombre)!=1){throw new ValidationException("Nombre invalido", 1);}
			if (strlen($nombre)<3 OR strlen($nombre)>15)throw new ValidationException("Nombre invalido", 1);
		}

	public static function apellido_validacion($apellido){

			if(!isset($apellido)){throw new ValidationException("Apellido invalido", 1);}
			if(preg_match('/^[a-zA-Z]*$/', $apellido)!=1){throw new ValidationException("Apellido invalido", 1);}
			if (strlen($apellido)<3 OR strlen($apellido)>15){throw new ValidationException("Apellido Invalido", 1);}
			}

	public static function email_validacion($mail){

			if(!isset($mail)){throw new ValidationException("Email invalido");}
			if (!filter_var($mail,FILTER_VALIDATE_EMAIL)){throw new ValidationException("Email invalido");}
				}
		public static function tipo_validacion($tipo){
		
			if ($tipo!=0 && $tipo!=1 && $tipo!=2){throw new ValidationException("Tipo de usuario invalido");}
			}

		public static function contra_validacion($contra){

			if(!isset($contra)){throw new ValidationException("Contraseña Ivalida");}
			if (!ctype_digit($contra)){throw new ValidationException("Contraseña Ivalida");
				}
			if ($contra<10000 or $contra>100000000000){throw new ValidationException("Contraseña Ivalida");}
			}
		public static function especialidad_validacion($especialidad){

			if(!isset($especialidad)){throw new ValidationException("Especialidad Invalida");}
			if(!preg_match('/^[a-zA-z]*$/', $especialidad)==1){throw new ValidationException("Formato de Especialidad Invalido");}
				}

		public static function hash_contra($contra){

			$hashcontra=password_hash($contra, PASSWORD_DEFAULT);
			return $hashcontra;
		}

		public static function verify_contra($contra,$datos){

			if (password_verify($contra, $datos['contrasenia'])){
				return true;
			}else{
				return false;
			}
		}


		public static function consultorio_validacion($consultorio){

		if(!isset($consultorio))throw new ValidationException("Consultorio Ivalido");
		if (!ctype_digit($consultorio)) {throw new ValidationException("Numero de Consultorio Invalido");}
		if($consultorio<0 OR $consultorio>200){throw new ValidationException("Numero de Consultorio Invalido");}
	 	} 

		public static function horario_validacion($horario){


		if(!isset($horario))throw new ValidationException("Horario invalido");
		if ($horario!="M" && $horario!="T"){throw new ValidationException("Formato de horario invalido");}
		
	}


		public static function precio_validacion($precio){


		if(!isset($precio)){throw new ValidationException("precio invalidp");}
		if($precio<0){throw new ValidationException("Formato de precio invalido");}
		if (!ctype_digit($precio)){throw new ValidationException("Formato de precio invalido");}
	}

		public static function descripcion_validacion($descripcion){

	if(!isset($descripcion))throw new ValidationException("descripcion invalida ");
		if(!preg_match('/^[a-zA-z\s\d]+$/', $descripcion)==1){throw new ValidationException("Formato de Descripcion Invalido");}
	}


	public static function hora_validacion($hora){
	if(!isset($hora))throw new ValidationException("Hora no valida");
	if(!strtotime($hora))throw new ValidationException("hora no valida");
	}
	public static function fecha_validacion($fecha){


	if(!isset($fecha)){throw new ValidationException("fecha no valida");}
	$f=explode('-', $fecha);
	if(!is_numeric($f[0]) OR !is_numeric($f[1]) OR !is_numeric($f[2])){throw new ValidationException("Fecha no valida");}
	if(!checkdate($f[1],$f[2],$f[0])){throw new ValidationException("Fecha no valida");}

	}


}//FINAL DE CLASE




class ValidationException extends exception{}
 ?>