<?php

//controlador
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/estudios.php';
require '../views/ListadoEstudios.php';

$e=new estudios();
$lista=$e->getTodos();

$v=new ListadoEstudios();
$v->estudios=$lista;

$v->render();