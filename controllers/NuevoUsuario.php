<?php
//controlador
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/NuevoUsuario.php';


$mensaje="";

if(count($_POST)>0){


if(!isset($_POST['dni'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}


if(!isset($_POST['nombre'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}

if(!isset($_POST['apellido'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}

if(!isset($_POST['contra'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}

if(!isset($_POST['mail'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}




	$u = new usuario();
	$dni=($_POST['dni']);
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$contra=$_POST['contra'];
	$mail=$_POST['mail'];
	$tipo=1;

		if ($u->UsuarioExistente($dni,$s)){
			$mensaje="Ya existe un usuario con ese número de DNI";
		}
		else{  //try
			$u->DarDeAlta($dni, $nombre, $apellido, $contra, $mail,$tipo);
				header('Location:./IngresoAlSistema.php');
				exit();
		}
	}

$v= new NuevoUsuario();
$v->mensaje= $mensaje;
$v->render();
echo $mensaje;

?>



