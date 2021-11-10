<?php 
require '../fw/fw.php';
require '../models/Turno.php';
require '../models/Medico.php';
require '../models/Estudios.php';
require '../views/MenuPrincipalAdmin.php';


$e=new estudios();
$m=new Medico();
$t=new Turno();

$v=new MenuPrincipalAdmin();
$v->listado = $m->getTodos();
$v->turnos =  $t->getTodos();
$v->listado_estudios = $e->getTodos();

$v->render();

 ?>