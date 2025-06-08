<?php
namespace App\Controller;

use App\Model\Postagem;
use App\Model\Comentario;
use App\Core\Seguranca;

class PostagemController {
    public function criar() {
        if (!isset($_SESSION['usuario']['id'])) {
            die('Usuário não autenticado.');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF inválido!');
            }

            $dados = [
                'titulo' => $_POST['titulo'],
                'conteudo' => $_POST['conteudo'],
                'imagem_url' => $_POST['imagem_url'] ?? null,
                'autor_id' => $_SESSION['usuario']['id']
            ];

            if (Postagem::salvar($dados)) {
                header('Location: ?pagina=postagem&acao=listar');
                exit;
            } else {
                $erro = 'Erro ao criar postagem';
            }
        }

        $token = Seguranca::gerarToken();
        $conteudo = '../app/view/postagem/criar.php';
        include '../app/view/layout.php';
    }

    public function listar() {
        $postagens = Postagem::todas();
        $conteudo = '../app/view/postagem/listar.php';
        include '../app/view/layout.php';
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF inválido!');
            }

            $dados = [
                'titulo' => $_POST['titulo'],
                'conteudo' => $_POST['conteudo'],
                'imagem_url' => $_POST['imagem_url'] ?? null
            ];

            if (Postagem::atualizar($_POST['id'], $dados)) {
                header('Location: ?pagina=postagem&acao=listar');
                exit;
            } else {
                $erro = 'Erro ao atualizar postagem';
            }
        } else {
            $postagem = Postagem::buscarPorId($_GET['id']);
            if (!$postagem) {
                die('Postagem não encontrada.');
            }
            $token = Seguranca::gerarToken();
            $conteudo = '../app/view/postagem/editar.php';
            include '../app/view/layout.php';
        }
    }

    public function excluir() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF inválido!');
            }

            if (Postagem::deletar($_POST['id'])) {
                header('Location: ?pagina=postagem&acao=listar');
                exit;
            } else {
                $erro = 'Erro ao excluir postagem';
            }
        } else {
            $postagem = Postagem::buscarPorId($_GET['id']);
            if (!$postagem) {
                die('Postagem não encontrada.');
            }
            $token = Seguranca::gerarToken();
            $conteudo = '../app/view/postagem/confirmar_exclusao.php';
            include '../app/view/layout.php';
        }
    }

    public function visualizar() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ?pagina=postagem&acao=listar');
            exit;
        }

        $postagem = Postagem::buscarPorId($id);
        if (!$postagem) {
            die('Postagem não encontrada.');
        }

        $comentarios = Comentario::listarPorPostagem($id);
        $token = Seguranca::gerarToken();
        $conteudo = '../app/view/postagem/visualizar.php';
        include '../app/view/layout.php';
    }
}
