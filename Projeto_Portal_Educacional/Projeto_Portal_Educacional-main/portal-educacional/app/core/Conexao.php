<?php
namespace App\Core;
use PDO;
class Conexao {
    private static $instancia;
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            self::$instancia = new PDO("mysql:host=localhost;dbname=portal", "root", "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        return self::$instancia;
    }
}