<?php 
    class Conexion
    {
        ##atributos
        static $link;

        #metodos
        private function __construct()
        {}/*Para evitar instanciacion*/

        static function conectar()
        {
            self::$link = new PDO(
                'mysql:host=localhost;dbname=agencia',
                'root',
                ''
            );
            return self::$link;
        }
    }

    // Conexion::link o self::$link = Hace referencia a la clase Conexion atributo $link.
    /* NO se puede $this->link ya que este hace referencia a un objeto y si tenes un constructor privado
    no hay objeto que instanciar*/

     





?>