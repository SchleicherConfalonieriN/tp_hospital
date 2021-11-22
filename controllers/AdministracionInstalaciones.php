<?php
require '../fw/fw.php';
require './Sesion.php';
require '../models/Consultorio.php';
require '../models/Especialidad.php';
require '../views/AdministracionInstalaciones.php';

$e=new Especialidad();
$c=new Consultorio();
$especialidad=$e->getTodos();
$consultorio=$c->getTodos();

$v=new AdministracionInstalaciones();
$v->especialidades=$especialidad;
$v->consultorio=$consultorio;
$v->render();
  ?>