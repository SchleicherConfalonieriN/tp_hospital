<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/estudios.php';
require '../class_helper/seguridad.php';


$s = new seguridad();
$e = new estudios();
$id = $_POST['identificador'];
$nombre     =$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio		=$_POST['precio'];
$horario    =$_POST['horario'];

$e->DarDeAlta($id,$nombre,$descripcion,$precio,$horario,$s);

header('Location:./menuPrincipalAdmin.php'); 
 ?>