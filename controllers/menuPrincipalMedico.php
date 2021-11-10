<?php
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';
require '../views/MenuPrincipalMedico.php';//COLOCAR VISTA CORRECTO DESPUES DE CREARLA


$dni=$_SESSION['idUsuario'];


$m= new medico();
$datos = $m->informacion($dni);


$t = new Turno();
$turnos_reservados=$t->GetTodosPorMedico($dni);



$v = new MenuPrincipalMedico;
$v->turnos_reservados=$turnos_reservados; 
$v->datos = $datos;
$v->render();
  ?>