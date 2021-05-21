<?php

    class Foo
    {
        private function __construct()
        {
            echo 'método constructor invocado<br>';
        }
        public function publico()
        {
            echo 'método público invocado<br>';
        }
        private function privado()
        {
            echo 'método privado invocado<br>';
        }
        static function estatico()
        {
            echo 'método estático invocado<br>';
        }
    }