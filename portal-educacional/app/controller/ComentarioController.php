<?php
namespace App\Controller;

use App\Model\Comentario;
use App\Core\Seguranca;


class ComentarioController
{
    public function criar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF token inválido!');
            }

            $dados = [
                'postagem_id' => $_POST['postagem_id'],
                'autor_id' => $_SESSION['usuario']['id'] ?? null,
                'conteudo' => $_POST['conteudo']
            ];

            Comentario::salvar($dados);

            header('Location: ?pagina=postagem&acao=visualizar&id=' . $dados['postagem_id']);
            exit;
        }
    }
}
