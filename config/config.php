<?php 

#### configuración general del sistema

session_start();



function autoload($Clase)
{
    require_once 'clases/'.$Clase.'.php'; 
}

spl_autoload_register('autoload'); //callback

