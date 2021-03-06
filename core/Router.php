<?php

namespace core;

class Router {

	public $request;
	public $response;
	protected $routes = [];

	public function __construct(Request $request, Response $response) {

		$this->request = $request;
		$this->response = $response;
	}

	public function get($path, $callback) {

		$this->routes['get'][$path] = $callback;
	}

	public function post($path, $callback) {

		$this->routes['post'][$path] = $callback;
	}

	public function resolve() {

		$path = $this->request->getPath();
		$method = $this->request->method();

		$callback = $this->routes[$method][$path] ?? false;

		// doesn't find path
		if ($callback === false) {
			$this->response->setStatusCode(404);
			return $this->renderView('_404');
		}

		if (is_array($callback) ) {
			Application::$app->controller = new $callback[0]();
			$callback[0] = Application::$app->controller;
		}

		return call_user_func($callback, $this->request, $this->response);
	}

	public function renderView($view) {

		ob_start();
		include_once "../views/$view.php";
		return ob_get_clean();
	}
}