<?php 
    class Destino
    {
        private $destID;
        private $destNombre;
        private $regID;
        static  $regNombre; /*static se pone self*/
        private $destPrecio;
        private $destAsientos;
        private $destDisponibles;

        public function listarDestinos()
        {
            //conexion
            $link = Conexion::conectar();
            $sql = "SELECT destinos.destID, destinos.destNombre, regiones.regID, destinos.destPrecio, 
            destinos.destAsientos, destinos.destDisponibles FROM 
            destinos INNER JOIN regiones ON destinos.regID = regiones.regID";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $destinos = $stmt->fetchAll();
            return $destinos;
        }

        public function verDestinoPorID()
		{
	        $destID = $_GET['destID'];
        	$link = Conexion::conectar();
        	$sql = "SELECT * FROM destinos WHERE destID = :destID";
        	$stmt = $link->prepare($sql);

        	$stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
        	$stmt->execute();
        	$datos = $stmt->fetch(); //Devuelve solo 1 dato
        	$this->setDestID($datos['destID']);
        	$this->setDestNombre($datos['destNombre']);
			self::setRegNombre($datos['regNombre']);
			$this->setRegID($datos['regID']);
			$this->setDestPrecio($datos['destPrecio']);
			$this->setDestAsientos($datos['destAsientos']);
			$this->setDestDisponibles($datos['destDisponibles']);
        	return $this;
		}

        public function agregarDestino()
        {
            $destID = $_POST['destID'];
            $destNombre = $_POST['destNombre'];
            $regID = $_POST['regID'];
            $destPrecio = $_POST['destPrecio'];
            $destAsientos = $_POST['destAsientos'];
            $destDisponibles = $_POST['destDisponibles'];

            $link = Conexion::conectar();
            $sql = "INSERT INTO destinos (destID, destNombre, regID, destPrecio, destAsientos, destDisponibles) 
			VALUES 
			(:destNombre, :regID, :destPrecio, :destAsientos, :destDisponibles)";
            // con :columna evito inyección SQL
            $stmt = $link->prepare($sql);
            //$stmt->bindParam(' :destID', $destID, PDO::PARAM_INT);
            $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
            $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
            //$stmt->execute();
            if($stmt->execute() ){
                //registramos atributos en el objeto
            	$this->setDestID($link->lastInsertID());
                $this->setDestNombre($destNombre);
                $this->setRegID($regID);
                $this->setDestPrecio($destPrecio);
                $this->setDestAsientos($destAsientos);
                $this->setDestDisponibles($destDisponibles);
    
                return $this;
            }
            return false;
        }

        public function modificarDestino()
        {
			$destNombre = $_POST['destNombre'];
        	$destID = $_POST['destID'];
            //$destPrecio = $_POST['destPrecio'];
            //$destAsientos = $_POST['destAsientos'];
            //$destDisponibles = $_POST['destDisponibles'];
			
			$link = Conexion::conectar();
			$sql = "UPDATE destinos SET destNombre = :destNombre AND  WHERE destID = :destID";
			$stmt = $link->prepare($sql);
			$stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
			$stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
            $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);

			if($stmt->execute()){
				$this->setDestNombre($destNombre);
				$this->setDestID($destID);
				$this->setRegID($regID);
				$this->setDestPrecio($destPrecio);
				$this->setDestAsientos($destAsientos);
				$this->setDestDisponibles($destDisponibles);
			return $this;
			}
			return false;
        }
        public function eliminarDestino()
        {
			$link = Conexion::conectar();
			$sql = "DELETE ";
        }

        // create Setter & Getter's atribute
        
        /**
         * Get the value of destID
         */ 
        public function getDestID()
        {
                return $this->destID;
        }

        /**
         * Set the value of destID
         *
         * @return  self
         */ 
        public function setDestID($destID)
        {
                $this->destID = $destID;

                return $this;
        }

		/*Getter & setter static*/
        public static function getRegNombre()
        {
			return self::$regNombre;
        }

		public static function setRegNombre($regNombre)
		{
			self::$regNombre = $regNombre;
		}
		/*Getter & setter static*/
        
        /**
         * Get the value of destNombre
         */ 
        public function getDestNombre()
        {
                return $this->destNombre;
        }

        /**
         * Set the value of destNombre
         *
         * @return  self
         */ 
        public function setDestNombre($destNombre)
        {
                $this->destNombre = $destNombre;

                return $this;
        }
        

        /**
         * Get the value of regID
         */ 
        public function getRegID()
        {
                return $this->regID;
        }

        /**
         * Set the value of regID
         *
         * @return  self
         */ 
        public function setRegID($regID)
        {
                $this->regID = $regID;

                return $this;
        }
		
        /**
         * Get the value of destPrecio
         */ 
        public function getDestPrecio()
        {
                return $this->destPrecio;
        }

        /**
         * Set the value of destPrecio
         *
         * @return  self
         */ 
        public function setDestPrecio($destPrecio)
        {
                $this->destPrecio = $destPrecio;

                return $this;
        }

        /**
         * Get the value of destAsientos
         */ 
        public function getDestAsientos()
        {
                return $this->destAsientos;
        }

        /**
         * Set the value of destAsientos
         *
         * @return  self
         */ 
        public function setDestAsientos($destAsientos)
        {
                $this->destAsientos = $destAsientos;

                return $this;
        }
        
        /**
         * Get the value of destDisponibles
         */ 
        public function getDestDisponibles()
        {
                return $this->destDisponibles;
        }

        /**
         * Set the value of destDisponibles
         *
         * @return  self
         */ 
        public function setDestDisponibles($destDisponibles)
        {
                $this->destDisponibles = $destDisponibles;

                return $this;
        }
    }
?>