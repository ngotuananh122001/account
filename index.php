<?php

use core\Router;

	spl_autoload_register(function($class_name) {
		include_once $class_name . '.php';
	});

	$app = new core\Application();



	$app->router->get('/login', [\controllers\AuthController::class, 'login']);
	$app->router->post('/login', [\controllers\AuthController::class, 'login']);
	$app->router->get('/register', [\controllers\AuthController::class, 'register']);
	$app->router->post('/register', [\controllers\AuthController::class, 'register']);
	$app->router->get('/logout', [\controllers\AuthController::class, 'logout']);

	$app->router->get('/', [\controllers\SiteController::class, 'home']);

	$app->router->post('/update', [\controllers\UserController::class, 'updateProfile']);
	$app->run();
?>