<?php
    require 'Foo.php';
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
    <h1>Método: público, privado, estático</h1>
    <?php
        //$Foo = new Foo; /* no se puede, constructor privado */
        //$Foo->publico();
        //$Foo->privado(); /* no se puede fuera de la clase */
        //$Foo->estatico();
        Foo::estatico();
    ?>

</body>
</html>
