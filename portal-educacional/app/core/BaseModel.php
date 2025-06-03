<?php
namespace App\Core;

use App\Core\Conexao;
use PDO;

class BaseModel
{
    public static function executar($sql, $parametros = [])
    {
        $stmt = Conexao::getInstancia()->prepare($sql);
        $stmt->execute($parametros);
        return $stmt;
    }

    public static function buscarTodos($sql, $parametros = [])
    {
        $stmt = self::executar($sql, $parametros);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarUm($sql, $parametros = [])
    {
        $stmt = self::executar($sql, $parametros);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
