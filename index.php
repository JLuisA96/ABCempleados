<?php
file_exists("app/core/autoload.php") or die("Error al iniciar MVC");
include 'app/core/autoload.php';

$DF_CONTROLLER = 'Empleados';
$DF_ACTION = 'listado';
$URI =  isset($_SERVER['PATH_INFO'])?explode('/',$_SERVER['PATH_INFO']):[0,$DF_CONTROLLER,$DF_ACTION]; //Obtiene las rutas de la url

$CONTROLLER = (isset($URI[1]) and !empty($URI[1])) ? $URI[1]:$DF_CONTROLLER; // Saber que controlador esta accediendo, en caso de que no exista alguno, se pone el defecto

$ACTION = (isset($URI[2]) and !empty($URI[2])) ? $URI[2]:$DF_ACTION; // Verifica si existe alguna accion, en caso de que no exista alguna, se pone el defecto

$N_CONTROLLER = ucfirst(strtolower($CONTROLLER));
$N_ACTION = strtolower($ACTION);
//print_r($CONTROLLER."/".$ACTION); //Muestra la ruta de mi 
//echo "<br>".$N_CONTROLLER."/".$N_ACTION;

file_exists(CONTROLLERS.$N_CONTROLLER.'.php') or die("404: Controlador");//Verifica si sexiste el controlador

include CONTROLLERS.$N_CONTROLLER.'.php';

$CC = new $N_CONTROLLER();//

method_exists($CC,$N_ACTION) or die("404: Accion");
$CC->$N_ACTION();
exit();