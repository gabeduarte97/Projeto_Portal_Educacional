<?php
namespace App\Controller;

use App\Core\Seguranca;
use App\Model\Usuario;

class UsuarioController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF inválido!');
            }

            $usuario = Usuario::verificarLogin($_POST['email'], $_POST['senha']);
            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                header('Location: ?pagina=site&acao=home');
                exit;
            } else {
                $erro = 'Login inválido!';
            }
        }

        $token = Seguranca::gerarToken();
        $conteudo = '../app/view/login-conteudo.php';
        include '../app/view/layout.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: ?pagina=site&acao=home');
    }

    public function cadastro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF inválido!');
            }

            if (Usuario::salvar($_POST)) {
                header('Location: ?pagina=usuario&acao=login');
                exit;
            } else {
                $erro = 'Erro ao cadastrar!';
            }
        }

        $token = Seguranca::gerarToken();
        $conteudo = '../app/view/cadastro-conteudo.php';
        include '../app/view/layout.php';
    }

    public function listar()
    {
        $usuarios = Usuario::listarUsuarios();
        $conteudo = '../app/view/listar.php';
        include '../app/view/layout.php';
    }

    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF inválido!');
            }

            if (Usuario::atualizar($_POST['id'], $_POST)) {
                header('Location: ?pagina=usuario&acao=listar');
                exit;
            } else {
                $erro = 'Erro ao atualizar!';
            }
        } else {
            $usuario = Usuario::buscarPorId($_GET['id']);
            $token = Seguranca::gerarToken();
            $conteudo = '../app/view/editar.php';
            include '../app/view/layout.php';
        }
    }

    public function excluir()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF inválido!');
            }

            if (Usuario::deletar($_POST['id'])) {
                header('Location: ?pagina=usuario&acao=listar');
                exit;
            } else {
                $erro = 'Erro ao excluir!';
            }
        } else {
            $usuario = Usuario::buscarPorId($_GET['id']);
            $token = Seguranca::gerarToken();
            $conteudo = '../app/view/confirmar_exclusao.php';
            include '../app/view/layout.php';
        }
    }
}
