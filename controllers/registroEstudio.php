<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/estudios.php';
require '../class_helper/seguridad.php';



$e = new estudios();



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

$nombre     =($_POST['nombre']);
$descripcion=($_POST['descripcion']);
$precio     =($_POST['precio']);


$e->DarDeAlta($nombre,$descripcion,$precio);

header('Location:./menuPrincipalAdmin.php'); 
 ?>