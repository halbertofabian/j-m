<?php

class Conexion
{

    static public function conectar()
    {

        try {
            //code...
            $link = new PDO(
                "mysql:host=localhost;dbname=db_medica",
                "root",
                ""
            );

            $link->exec("set names utf8");

            return $link;
        } catch (PDOException $th) {
            throw $th;
            return false;
        }
    }
}
