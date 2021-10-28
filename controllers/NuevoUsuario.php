<?php
//controlador

require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/NuevoUsuario.php';


$mensaje="";
if(isset($_POST['dni'])){
	$u = new usuario();
	$dni=($_POST['dni']);
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$contra=$_POST['contra'];
	$mail=$_POST['mail'];
	$tipo=1;
	if (!ctype_digit($dni)){
		$mensaje="DNI invalido";
	}
	else{
		if ($u->UsuarioExistente($dni)){
			$mensaje="Ya existe un usuario con ese número de DNI";
		}
		else{  //try
			$u->DarDeAlta($dni, $nombre, $apellido, $contra, $mail,$tipo);
				header('Location:./IngresoAlSistema.php');
				exit();
		}
	}
}

$v= new NuevoUsuario();
$v->mensaje= $mensaje;
$v->render();
echo($mensaje);

?>



