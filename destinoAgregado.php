<?php
    require 'config/config.php';
    //inyección de dependencias
    //require 'clases/Conexion.php';
    //require 'clases/Destino.php';
    $Destino = new Destino;
    $check = $Destino->agregarDestino();
    
    $css = 'danger';
    $mensaje = 'No se pudo agregar el destino.';
    if( $check ){
        $css = 'success';
        $mensaje = 'Destino '.$Destino->getDestNombre().' agregado correctamente.';
    }
    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Alta de un destino</h1>

        <div class="alert alert-<?= $css ?> col-8 mx-auto">
            <?= $mensaje ?> <a href="adminDestinos.php" class="btn btn-light">Volver a panel</a>
        </div>
    </main>

<?php
    include 'includes/footer.php';
?>