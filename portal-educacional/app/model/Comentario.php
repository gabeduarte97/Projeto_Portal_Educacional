<?php
namespace App\Model;

use App\Core\Conexao;
use PDO;

class Comentario
{
    public static function salvar($dados) {
        $sql = "INSERT INTO comentarios (postagem_id, autor_id, conteudo) VALUES (?, ?, ?)";
        $stmt = Conexao::getInstancia()->prepare($sql);
        return $stmt->execute([
            $dados['postagem_id'],
            $dados['autor_id'],
            $dados['conteudo']
        ]);
    }

    public static function listarPorPostagem($postagemId) {
        $sql = "SELECT c.*, u.nome AS autor 
                FROM comentarios c
                JOIN usuarios u ON c.autor_id = u.id
                WHERE c.postagem_id = ?
                ORDER BY c.data_comentario DESC";
        $stmt = Conexao::getInstancia()->prepare($sql);
        $stmt->execute([$postagemId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deletar($id) {
        $sql = "DELETE FROM comentarios WHERE id = ?";
        $stmt = Conexao::getInstancia()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
