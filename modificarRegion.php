<?php
    require 'config/config.php';
    //require 'clases/Conexion.php';
    //require 'clases/Region.php';
    $Region = new Region;
    $check = $Region->modificarRegion();
    $css = 'danger';
    $mensaje = 'No se pudo modificar la región.';
    if( $check ){
        $css = 'success';
        $mensaje = 'región '.$Region->getRegNombre().' modificada correctamente.';
    }
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Modificación de una región</h1>

        <div class="alert alert-<?= $css ?> col-8 mx-auto">
            <?= $mensaje ?> <a href="adminRegiones.php" class="btn btn-light">Volver a panel</a>
        </div>
    </main>

<?php
    include 'includes/footer.php';
?>