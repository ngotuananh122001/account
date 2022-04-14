<?php

	namespace models;

	class User extends \core\Model {

		public $id;
		public $firstname;
		public $lastname;
		public $email;
		public $password;
		public $job_title = '';
		public $address = '';
		public $image = '';

		public static function tableName() {

			return 'users';
		}

		public static function primaryKey() {

			return 'id';
		}

		public static function attributes() {

			return ['firstname', 'lastname', 'email', 'password', 'job_title', 'address', 'image'];
		}

		public function create() {

			$this->password = password_hash($this->password, PASSWORD_DEFAULT);
			return parent::create();
		}


	}


?>