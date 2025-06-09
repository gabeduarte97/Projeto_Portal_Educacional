<?php
namespace App\Controller;

use App\Model\Postagem;

class SiteController {
    public function home() {
        $postagens = Postagem::todas();
        $conteudo = '../app/view/home-conteudo.php';
        include '../app/view/layout.php';
    }

    public function sobre() {
        $conteudo = '../app/view/sobre-conteudo.php';
        include '../app/view/layout.php';
    }

    public function contato() {
        $conteudo = '../app/view/contato-conteudo.php';
        include '../app/view/layout.php';
    }

    public function admin() {
    if (!isset($_SESSION['usuario'])) {
        header('Location: ?pagina=usuario&acao=login');
        exit;
    }
    
    $conteudo = '../app/view/admin.php';
    include '../app/view/layout.php';
}

}
