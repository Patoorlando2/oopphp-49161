<?php
    require 'config/config.php';
    //require 'clases/Conexion.php';
    //require 'clases/Destino.php';

    $Destino = new Destino;
    $destinos = $Destino->listarDestinos();

    include 'includes/over-all-header.html';
    include 'includes/nav.php';
?>

    <main class="container">
        <h1>Panel de administracion de destinos</h1>

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre de destino</th>
                    <th>Región</th>
                    <th>Precio</th>
                    <th>Total asientos</th>
                    <th>Asientos disponibles</th>

                    <th colspan="2">
                        <a href="formAgregarDestino.php" class="btn btn-outline-secondary">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ( $destinos as $destino ) {
                ?>
                <tr>
                    <td><?= $destino['destID']?></td>
                    <td><?= $destino['destNombre']?></td>
                    <td><?= $destino['regID'] ?></td>
                    <td><?= $destino['destPrecio'] ?></td>
                    <td><?= $destino['destAsientos'] ?></td>
                    <td><?= $destino['destDisponibles'] ?></td>
                    <td>
                        <a href="formModificarDestino.php?destID=<?=$destino['destID'] ?>" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="formEliminarDestino.php?destID=<?=$destino['destID'] ?>" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </main>
<br>
<br>
<br>
<?php
    include 'includes/footer.php';
?>
