<?php 
    class Destino
    {
        private $destID;
        private $destNombre;
        private $regID;
        private $destPrecio;
        private $destAsientos;
        private $destDisponibles;

        public function listarDestinos()
        {
            //conexion
            $link = Conexion::conectar();
            /*SELECT Orders.OrderID, Customers.CustomerName FROM Orders INNER JOIN
            Customers ON Orders.CustomerID = Customers.CustomerID;*/

            $sql = "SELECT destinos.destID, destinos.destNombre, regiones.regID, destinos.destPrecio, 
            destinos.destAsientos, destinos.destDisponibles FROM 
            destinos INNER JOIN regiones ON destinos.regID = regiones.regID";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $destinos = $stmt->fetchAll();
            return $destinos;
        }
    }

?>