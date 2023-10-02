<?php
require_once __DIR__.'/../vendor/autoload.php';
use app\core\Application;
use app\controllers\HomeController;
use app\controllers\AuthController;
 
$app = new Application(__DIR__);

// Routes registration
$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/auth/login', [AuthController::class, 'login']);
$app->router->post('/auth/login', [AuthController::class, 'login']);
$app->router->get('/auth/register', [AuthController::class, 'register']);
$app->router->post('/auth/register', [AuthController::class, 'register']);

$app->run();