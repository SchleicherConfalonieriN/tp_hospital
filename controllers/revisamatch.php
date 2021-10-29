<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>


<?php 
require './seguridad.php';

$tipo=0;

$nombre='     s#          ';

$apellido='schleicher';

$email='';

$s=new seguridad();

if($s->nombre_validacion($nombre)){

echo "nombre validado";

}else{echo "no nombre validado";}

echo "-------------";


if($s->apellido_validacion($apellido)){

echo "apellido validad";
}else{echo "no apellido validad";}

echo "-------------";


if($s->email_validacion($email)){

	echo "email funciona";
}else{echo "no funciona email";}


echo "-------------";

if($s->tipo_validacion($tipo)){

	echo "tipo funciona";
}else{echo "no funciona tipo";}



 ?>
</body>
</html>


