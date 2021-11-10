<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>


<?php 
require './seguridad.php';
$contra=86249731;
$hashcontra;

$s=new seguridad();

$s->contra_validacion($contra);

$hashcontra=$s->hash_contra($contra);

echo $hashcontra;

echo "a ver";

 ?>
</body>
</html>


