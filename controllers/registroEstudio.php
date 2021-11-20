<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../class_helper/seguridad.php';
require '../models/estudios.php';


if(!isset($_POST['nombre'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}
if(!isset($_POST['descripcion'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}
if(!isset($_POST['precio'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}
if(!isset($_POST['horario'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}





$e = new estudios();

$nombre     =$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio		=$_POST['precio'];
$horario    =$_POST['horario'];

$e->DarDeAlta($nombre,$descripcion,$precio,$horario);

header('Location:./menuPrincipalAdmin.php'); 
 ?>