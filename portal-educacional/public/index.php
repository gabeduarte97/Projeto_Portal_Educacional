<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Core
require_once '../app/core/Router.php';
require_once '../app/core/Seguranca.php';
require_once '../app/core/Conexao.php';
require_once '../app/core/BaseModel.php';

// Controllers
require_once '../app/controller/SiteController.php';
require_once '../app/controller/UsuarioController.php';
require_once '../app/controller/PostagemController.php';
require_once '../app/controller/ComentarioController.php'; // (verifique o nome correto!)


// Models
require_once '../app/model/Usuario.php';
require_once '../app/model/Postagem.php';
require_once '../app/model/Comentario.php';

// Executa o roteador
use App\Core\Router;

$router = new Router();
$router->run();
