<?php

	namespace models;

	class User extends \core\DbModel {

		public $firstname;
		public $lastname;
		public $email;
		public $password;
		public $password_confirm;
		public $job_title = '';
		public $address = '';
		public $image = '';

		public static function tableName() {

			return 'users';
		}

		public static function primaryKey() {

			return 'id';
		}

		public function save() {

			$this->password = password_hash($this->password, PASSWORD_DEFAULT);
			return parent::save();
		}

		public function attributes() {
			return ['firstname', 'lastname', 'email', 'password', 'status', 'job_title', 'address', 'image'];
		}

	}


?>