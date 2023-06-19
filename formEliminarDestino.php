<?php
    require 'config/config.php';
    

    $Destino = new Destino;
    $Destino->verDestinoPorID();
    


    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">

        <h1>Confirmación de baja de un destino</h1>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">
            <form action="eliminarDestino.php" method="post">
                <span>Se eliminará el destino <?= $Destino->getDestNombre();?></span><br>
                Precio: $<?=$Destino->getDestPrecio(); ?> <br>

                <button class="btn btn-danger"> Confirmar Baja</button>
                    <a href="adminDestinos.php" class="btn btn-outline-secondary">
                        Volver a panel de regiones
                    </a>
            </form>
        </div> 

    </main>

<?php
    include 'includes/footer.php';
?>