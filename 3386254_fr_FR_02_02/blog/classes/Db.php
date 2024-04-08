<?php

class Db {

    public static $host = "localhost";

    public static $db_name = "blog";

    public static $user = "root";

    public static $password = "";

    public static function connect()
    {

        try {

            $connexion = new PDO('mysql:host='.self::$host.';dbname='.self::$db_name.'', self::$user, self::$password);
             
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            return $connexion;

        } catch(PDOException $e)
        {
            echo "Une erreur est survenue lors de la connexion :".$e->getMessage();
        }

    }
}

print_r(Db::connect());
