<?php
    class Conexion {
        static public function conectar() {
           
            $link = new PDO("mysql:host=localhost; dbname=productos; charset=UTF8", "root", "");
            return $link;
        }
    }	