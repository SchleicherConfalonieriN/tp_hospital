<?php
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';
require '../class_helper/seguridad.php';
require '../views/MenuPrincipalMedico.php';//COLOCAR VISTA CORRECTO DESPUES DE CREARLA


$dni=$_SESSION['idUsuario'];

$s = new seguridad();
$m= new medico();
$datos = $m->informacion($dni,$s);


$t = new Turno();
$turnos_reservados=$t->GetTodosPorMedico($dni,$s);



$v = new MenuPrincipalMedico;
$v->turnos_reservados=$turnos_reservados; 
$v->datos = $datos;
$v->render();
  ?>