<?php

    class Destino
    {
        public function listarDestinos()
        {
            $link = Conexion::conectar();
            $sql = "SELECT 
                        destID, destNombre, 
                        regNombre,
                        destPrecio, destAsientos, destDisponibles
                     FROM destinos d, regiones r
                     WHERE d.regID = r.regID";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $destinos = $stmt->fetchAll();
            return $destinos;
        }
    }