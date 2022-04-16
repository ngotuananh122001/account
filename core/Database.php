<?php

	namespace core;

	class Database {

		public $pdo; // type PDO

		public function __construct() {

			$dsn = 'mysql:host=' . \core\Application::$config['HOST'] . ';dbname=' . \core\Application::$config['DB_NAME'];
			$user = \core\Application::$config['USER'];
			$password = \core\Application::$config['PASSWORD'];
			$this->pdo = new \PDO($dsn, $user, $password);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}

		public function prepare($sql) {

			return $this->pdo->prepare($sql);
		}
	}
?>