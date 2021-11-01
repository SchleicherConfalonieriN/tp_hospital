<?php 
require '../fw/fw.php';

require '../models/Medico.php';
require '../views/MenuPrincipalAdmin.php';



$m=new Medico();


$v=new MenuPrincipalAdmin();
$v->listado = $m->getTodos();
$v->render();

 ?>