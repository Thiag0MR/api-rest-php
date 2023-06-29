<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

// Carrega todas as classes contidas no namespace app
require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

$app = new Application(__DIR__.'/../');

$app->router->get('/', 'home');

echo $app->run();