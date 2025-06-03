<?php
namespace App\Core;
class Router {
    public function run() {
        $pagina = $_GET['pagina'] ?? 'site';
        $acao = $_GET['acao'] ?? 'home';
        $controllerName = "App\\Controller\\" . ucfirst($pagina) . "Controller";
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $acao)) {
                $controller->$acao();
                return;
            }
        }
        echo "Página não encontrada.";
    }
}