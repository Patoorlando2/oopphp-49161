<?php
    require 'Persona.php';
    //instanciar
    $Persona = new Persona;
    $Persona->setNombre('Ronnie');
    $Persona->setApellido('Woods');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Vista Persona</h1>

    <?php
        echo '<pre>';
        print_r($Persona);
        echo '</pre>';
    ?>

    <div class="objeto">
        <?= $Persona->verDatos() ?>
    </div>
</body>
</html>