<?php
//controlador
require './Sesion.php';
require './seguridad.php';
require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/NuevoUsuario.php';


$mensaje="";

if(count($_POST)>0){

	$u = new usuario();
	$dni=($_POST['dni']);
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$contra=$_POST['contra'];
	$mail=$_POST['mail'];
	$tipo=1;


	$s=new seguridad();
	$dv=$s->dni_validacion($dni);
	$nv=$s->nombre_validacion($nombre);
	$av=$s->apellido_validacion($apellido);
	$hashcontra=$s->hash_contra($contra);
	$mv=$s->email_validacion($mail);
	$ev=$s->especialidad_validacion($especialidad);
	$tv=$s->tipo_validacion($tipo);


if($dv&&$nv&&$av&&$mv&&$ev&&$tv){// condicional de que se valido
	
		if ($u->UsuarioExistente($dni)){
			$mensaje="Ya existe un usuario con ese número de DNI";
		}
		else{  //try
			$u->DarDeAlta($dni, $nombre, $apellido, $hashcontra, $mail,$tipo);
				header('Location:./IngresoAlSistema.php');
				exit();
		}
	}

}
$v= new NuevoUsuario();
$v->mensaje= $mensaje;
$v->render();
echo $mensaje;

?>



