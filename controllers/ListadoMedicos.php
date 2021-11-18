<?php

//controlador
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../views/ListadoMedicos.php';
require '../views/ListadoMedicosAdministracion.php';

$m=new Medico();
$lista=$m->getTodos();

if ($_SESSION['tipoUsuario']==0){
	$v=new ListadoMedicosAdministracion();
	$v->medicos=$lista;
	$v->render();
	exit();
}

if ($_SESSION['tipoUsuario']==1){
	if(isset($_GET['especialidad_id'])){
		//validarrr
		$especialidad=$_GET['especialidad_id'];
		$lista=$m->getTodosPorEspecialidad($especialidad);	
	}
	$v=new ListadoMedicos();
	$v->medicos=$lista;
	$v->render();
	exit();
}

header('Location:./IngresoAlSistema.php');