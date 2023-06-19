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
            $sql = "SELECT regID, regNombre FROM regiones WHERE regID = :regID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetch(); //Devuelve solo 1 dato
            $this->setRegID($datos['regID']);
            $this->setRegNombre($datos['regNombre']);
            return $this;
        }

        public function agregarRegion($regNombre)
        {
            $regNombre = $_POST['regNombre'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO regiones VALUES (DEFAULT, :regNombre )"; //Parámetro con nombre. evitar inyeccion SQL y 
            // y entrecomillar
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regNombre', $regNombre, PDO::PARAM_STR);
            //$stmt->execute();
            if( $stmt->execute() ){
                //registramos atributos en el objeto
                $this->setRegID($link->lastInsertID());
                $this->setRegNombre($regNombre);
                return true;
            }
            return false;
        }

        public function modificarRegion()
        {
            $regID = $_POST['regID'];
            $regNombre = $_POST['regNombre'];
            $link = Conexion::Conectar();
            $sql = "UPDATE regiones SET regNombre = :regNombre WHERE regID = :regID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regNombre', $regNombre, PDO::PARAM_STR);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            if($stmt->execute() ){
                $this->setRegID($regID);
                $this->setRegNombre($regNombre);
                return $this;
            }
            return false;
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
     *
     * @return self
     */
    public function setRegID($regID)
    {
        $this->regID = $regID;

        return $this;
    }

        /**
         * Get the value of regNombre
         */ 
        public function getRegNombre()
        {
                return $this->regNombre;
        }

        /**
         * Set the value of regNombre
         *
         * @return  self
         */ 
        public function setRegNombre($regNombre)
        {
                $this->regNombre = $regNombre;

                return $this;
        }
}
?>