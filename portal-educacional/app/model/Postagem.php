<?php
namespace App\Model;

use App\Core\BaseModel;
use PDO;

class Postagem extends BaseModel
{
    public static function salvar($dados) {
        // Verifica se autor_id está definido
        if (empty($dados['autor_id'])) {
            return false;
        }

        $sql = "INSERT INTO postagens (titulo, conteudo, autor_id, imagem_url) VALUES (?, ?, ?, ?)";
        return self::executar($sql, [
            $dados['titulo'],
            $dados['conteudo'],
            $dados['autor_id'],
            $dados['imagem_url'] ?? null
        ]);
    }

    public static function todas() {
        $sql = "SELECT p.*, u.nome AS autor_nome
                FROM postagens p
                LEFT JOIN usuarios u ON p.autor_id = u.id
                ORDER BY p.data_publicacao DESC";
        return self::buscarTodos($sql);
    }

    public static function buscarPorId($id) {
        $sql = "SELECT p.*, u.nome AS autor_nome
                FROM postagens p
                LEFT JOIN usuarios u ON p.autor_id = u.id
                WHERE p.id = ?";
        return self::buscarUm($sql, [$id]);
    }

    public static function atualizar($id, $dados) {
        $sql = "UPDATE postagens 
                SET titulo = ?, conteudo = ?, imagem_url = ? 
                WHERE id = ?";
        return self::executar($sql, [
            $dados['titulo'],
            $dados['conteudo'],
            $dados['imagem_url'] ?? null,
            $id
        ]);
    }

    public static function deletar($id) {
        $sql = "DELETE FROM postagens WHERE id = ?";
        return self::executar($sql, [$id]);
    }
}
