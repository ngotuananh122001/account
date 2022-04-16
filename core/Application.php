<?php

	namespace core;

	class Application {

		public $request;
		public $response;
		public $router;
		public $controller;
		public $db; // type Database
		public $session;
		public $user = null;
		public static $app; // static type Application
		public static $config;

		public function __construct($config) {

			self::$app = $this;
			self::$config = $config;
			$this->request = new Request();
			$this->response = new Response();
			$this->session = new Session();
			$this->router = new Router($this->request, $this->response);
			$this->db = new Database();

			$primary_value = $this->session->get('user') ?? false;

			if ($primary_value) {
				$primary_key = \models\User::primaryKey();
				$this->user = \models\User::findOne([$primary_key => $primary_value]);
			}

		}

		public function run() {

			echo $this->router->resolve();
		}
	}
?>