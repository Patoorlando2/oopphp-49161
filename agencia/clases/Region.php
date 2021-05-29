<?php

    class Region
    {
        private $regID;
        private $regNombre;

        public function listarRegiones()
        {
            $link = Conexion::conectar();
            $sql = "SELECT regID, regNombre FROM regiones";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $regiones = $stmt->fetchAll();
            return $regiones;
        }

        public function verRegionPorID()
        {
            $regID = $_GET['regID'];
            $link = Conexion::conectar();
            $sql = "SELECT regID, regNombre 
                        FROM regiones
                        WHERE regID = :regID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetch();
            $this->setRegID($datos['regID']);
            $this->setRegNombre($datos['regNombre']);
            return $this;
        }

        /*
        private function validarForm()
        {
            if( ( isset( $_GET['regID']) || isset($_POST['regID']) ) && filter_var($_POST['regID'], FILTER_VALIDATE_INT) ){
                return false;
            }
            if( isset($_POST['regNombre']) ){
                return false;
            }
            return true;
        }
        */

        public function agregarRegion()
        {
            //return $this->validarForm();
            $regNombre = $_POST['regNombre'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO regiones
                        VALUES ( DEFAULT, :regNombre )";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regNombre', $regNombre, PDO::PARAM_STR );
            if( $stmt->execute() ){
                //registramos atributos en el objeto
                $this->setRegID( $link->lastInsertID() );
                $this->setRegNombre( $regNombre );
                return true;
            }
            return false;
        }
        public function modifiarRegion()
        {
        }
        public function eliminarRegion()
        {
        }

        /**
         * @return mixed
         */
        public function getRegID()
        {
            return $this->regID;
        }
        /**
         * @param mixed $regID
         */
        public function setRegID($regID)
        {
            $this->regID = $regID;
        }

        /**
         * @return mixed
         */
        public function getRegNombre()
        {
            return $this->regNombre;
        }
        /**
         * @param mixed $regNombre
         */
        public function setRegNombre($regNombre)
        {
            $this->regNombre = $regNombre;
        }
    }