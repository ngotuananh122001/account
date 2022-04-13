<?php

	namespace core;

	class Database {

		public $pdo; // type PDO

		public function __construct() {

			$dsn = 'mysql:host=localhost;dbname=test';
			$user = 'root';
			$password = '';
			$this->pdo = new \PDO($dsn, $user, $password);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}

		public function prepare($sql) {

			return $this->pdo->prepare($sql);
		}
	}
?>