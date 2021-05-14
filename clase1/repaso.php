<?php

    $x = 5;
    //define('NOMBRE', 'Marcos');
    const NOMBRE = 'Marcos';

    function foo()
    {
        return 'el valor de x es: '.NOMBRE;
    }

    echo foo();