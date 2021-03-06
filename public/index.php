<?php

	spl_autoload_register(function($class_name) {
		include_once '../' . $class_name . '.php';
	});

	require '../config.php';

	$app = new core\Application($config);

	$app->router->get('/login', [\controllers\AuthController::class, 'login']);
	$app->router->post('/login', [\controllers\AuthController::class, 'login']);

	$app->router->get('/register', [\controllers\AuthController::class, 'register']);
	$app->router->post('/register', [\controllers\AuthController::class, 'register']);

	$app->router->get('/logout', [\controllers\AuthController::class, 'logout']);

	$app->router->get('/recover', [\controllers\AuthController::class, 'recover']);
	$app->router->post('/recover', [\controllers\AuthController::class, 'recover']);

	$app->router->get('/reset-password', [\controllers\AuthController::class, 'resetPwd']);
	$app->router->post('/reset-password', [\controllers\AuthController::class, 'resetPwd']);


	$app->router->get('/', [\controllers\SiteController::class, 'home']);

	$app->router->post('/profile', [\controllers\UserController::class, 'updateProfile']);
	$app->run();
?>