<?php
require_once __DIR__.'/../vendor/autoload.php';
use app\core\Application;
use app\controllers\HomeController;
use app\controllers\AuthController;

// lagay dito yung path mula htdocs na lalabas sa localhost
// e.g. localhost:80/folder/folder2 => /folder/folder2 dapat ito.
const ROUTE_HEAD = ""; // development purposes
 
$app = new Application(__DIR__);

// Routes registration
$app->router->get(ROUTE_HEAD.'/', [HomeController::class, 'home']);
$app->router->get(ROUTE_HEAD.'/auth/login', [AuthController::class, 'login']);
$app->router->post(ROUTE_HEAD.'/auth/login', [AuthController::class, 'login']);
$app->router->get(ROUTE_HEAD.'/auth/register', [AuthController::class, 'register']);
$app->router->post(ROUTE_HEAD.'/auth/register', [AuthController::class, 'register']);

$app->run();