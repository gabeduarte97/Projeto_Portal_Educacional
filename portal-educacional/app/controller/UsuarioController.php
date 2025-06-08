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
            $conteudo = '../app/view/usuario/editar.php';
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
            $conteudo = '../app/view/usuario/confirmar_exclusao.php'; // Corrigido caminho
            include '../app/view/layout.php';
        }
    }

    public function recuperarSenha()
    {
        $token = Seguranca::gerarToken();
        $conteudo = '../app/view/recuperar-senha.php';
        include '../app/view/layout.php';
    }

    public function processarRecuperacao()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF inválido!');
            }

            $cpf = $_POST['cpf'];
            $dataNascimento = $_POST['data_nascimento'];

            $usuario = Usuario::buscarPorCpfData($cpf, $dataNascimento);
            if ($usuario) {
                $tokenRecuperacao = bin2hex(random_bytes(16));
                Usuario::salvarTokenRecuperacao($usuario['id'], $tokenRecuperacao);

                $link = "?pagina=usuario&acao=resetarSenha&token=$tokenRecuperacao";
                echo "<p>Link de recuperação: <a href='$link'>Clique aqui para redefinir sua senha</a></p>";
                exit;
            } else {
                $erro = "Dados não encontrados!";
            }

            $token = Seguranca::gerarToken();
            $conteudo = '../app/view/recuperar_senha.php';
            include '../app/view/layout.php';
        }
    }

    public function resetarSenha()
    {
        $tokenUrl = $_GET['token'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Seguranca::verificarToken($_POST['csrf_token'])) {
                die('CSRF inválido!');
            }

            $novaSenha = $_POST['nova_senha'] ?? '';
            $confirmacao = $_POST['confirmar_senha'] ?? '';
            $tokenPost = $_POST['token'] ?? '';

            if ($novaSenha !== $confirmacao) {
                $erro = 'As senhas não coincidem.';
            } elseif (Usuario::atualizarSenhaPorToken($tokenPost, $novaSenha)) {
                echo "<p>Senha redefinida com sucesso! <a href='?pagina=usuario&acao=login'>Entrar</a></p>";
                exit;
            } else {
                $erro = 'Token inválido ou expirado.';
            }
        }

        $csrf_token = Seguranca::gerarToken();
        $token = $tokenUrl;
        $conteudo = '../app/view/resetar_senha.php';
        include '../app/view/layout.php';
    }
}
