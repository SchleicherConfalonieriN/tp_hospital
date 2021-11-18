<?php

session_start();
if (!isset($_SESSION['tipoUsuario']))
{
	header('Location:./IngresoAlSistema.php');
	exit();
}

if(!isset($_SESSION['idUsuario'])){
	header('Location:./IngresoAlSistema.php');
	exit();
}