<?php

namespace Config;

use PDO;

class Conn
{

    public static $Host = MYSQL_HOST;
    public static $User = MYSQL_USER;
    public static $Pass = MYSQL_PASSWORD;
    public static $Dbname = MYSQL_DB_NAME;
    private static $Connect = null;

    private static function Conectar() {
        try {
            if(self::$Connect == null):
                self::$Connect = new PDO('mysql:host=' . self::$Host .';charset=utf8;dbname='.self::$Dbname, self::$User, self::$Pass);
            endif;
        } catch (Exception $ex) {
            echo 'Mensagem: ' . $ex->getMessage();
            die();
        }
        return self::$Connect;
    }

    public function getConn() {
        return self::Conectar();
    }
}