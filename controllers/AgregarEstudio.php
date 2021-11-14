<?php

//controlador

require '../fw/fw.php';
require './Sesion.php';
require '../models/Estudio.php';
require '../views/AgregarEstudio.php';
require_once '../class_helper/seguridad.php';

if ($_SESSION['tipoUsuario']!=0)
{
	header('Location:./IngresoAlSistema.php');
	exit();
}

$e=new Estudio();
$lista=$e->getTodos();
$s=new seguridad();

if(isset($_POST['nombre'])){
	$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$precio=$_POST['precio'];
	$horario=$_POST['horario'];
	$e->DarDeAlta($id,$nombre,$descripcion,$precio,$horario,$s);
	/*header('Location:./MenuPrincipalAdministracion.php');
	exit();*/
}

echo ($id);
/*
$v=new AgregarEstudio();
$v->estudios=$lista;
$v->render();*/
	












