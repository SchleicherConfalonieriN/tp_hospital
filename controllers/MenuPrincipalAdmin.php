<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../views/MenuPrincipalAdmin.php';


$m=new Medico();
//$listado_medicos=$m->getTodos();

$v=new MenuPrincipalAdmin();
$v->listado = $m->getTodos();
$v->render();

 ?>