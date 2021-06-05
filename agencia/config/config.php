<?php

    #### configuración general de sistema  ####
    session_start();

    #######################
    #### funciónd e autocarga

    function autoload( $Clase )
    {
        require_once 'clases/'.$Clase.'.php';
    }

    spl_autoload_register('autoload');