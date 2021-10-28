<?php
require '../fw/fw.php';
require './Sesion.php';
require '../models/Usuario.php';
require '../models/Turno.php';
require '../views/MenuPrincipalMedico.php';//COLOCAR VISTA CORRECTO DESPUES DE CREARLA


$dni=$_SESSION['idUsuario'];
$u = new usuario();
$u->cargarDatos($dni);

$t = new Turno();
$turnos_reservados=$t->GetTodosPorMedico($dni);
echo "revision";

$v = new MenuPrincipalMedico;
$v->turnos_reservados=$turnos_reservados; 
$v->render();
  ?>