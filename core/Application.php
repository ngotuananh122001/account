<?php

	namespace core;

	class Application {

		public $request;
		public $response;
		public $router;
		public static $app; // static type Application
		public $controller;
		public $db; // type Database
		public $session;
		public $user;

		public function __construct() {

			self::$app = $this;
			$this->request = new Request();
			$this->response = new Response();
			$this->session = new Session();
			$this->router = new Router($this->request, $this->response);
			$this->db = new Database();

			$primary_value = $this->session->get('user') ?? false;

			if ($primary_value) {
				$primary_key = \models\User::primaryKey();
				$this->user = \models\User::findOne([$primary_key => $primary_value]);
			} else {
				$this->user = null;
			}
		}

		public function run() {

			echo $this->router->resolve();
		}



		// public function logout() {

		// 	$this->user = null;
		// 	$this->session->remove('user');
		// 	setcookie(session_name(), session_id(), time() - 7 * 24 * 3600);
		// }

	}
?>