<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../class_helper/seguridad.php';
require '../models/estudios.php';




$e = new estudios();
$id = $_POST['estudio_id'];
$nombre     =$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio		=$_POST['precio'];
$horario    =$_POST['horario'];

$e->DarDeAlta($nombre,$descripcion,$precio,$horario,$s);

header('Location:./menuPrincipalAdmin.php'); 
 ?>