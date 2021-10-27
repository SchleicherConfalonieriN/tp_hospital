<?php

//controlador

require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../views/ListadoMedicos.php';

$m=new Medico();
$lista=$m->getTodos();

$v=new ListadoMedicos();
$v->medicos=$lista;

$v->render();