<?php
    //require 'config/config.php';
    require 'clases/Conexion.php';
    require 'clases/Destino.php';
    $Destino = new Destino;
    $check = $Destino->modificarDestino();
    $css = 'danger';
    $mensaje = 'No se pudo modificar el destino.';
    if( $check ){
        $css = 'success';
        $mensaje = 'Destino '.$Destino->getDestNombre().' modificado correctamente.';
    }
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Modificación de una destino</h1>

        <div class="alert alert-<?= $css ?> col-8 mx-auto">
            <?= $mensaje ?> <a href="adminDestinos.php" class="btn btn-light">Volver a panel</a>
        </div>
    </main>

<?php
    include 'includes/footer.php';
?>