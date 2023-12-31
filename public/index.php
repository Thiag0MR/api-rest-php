<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

// Carrega todas as classes contidas no namespace app
require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;
use app\controller\ClubeController;
use app\controller\RecursoController;

$app = new Application(__DIR__.'/../');

$app->router->get('/', 'home');
$app->router->get('/clubes', [ClubeController::class, 'listarTodosClubes']);
$app->router->get('/recursos', [RecursoController::class, 'listarTodosRecursos']);
$app->router->post('/clubes', [ClubeController::class, 'criarClube']);
$app->router->post('/consumirRecurso', [ClubeController::class, 'consumirRecurso']);

echo $app->run();