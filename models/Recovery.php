<?php

	namespace models;

	class Recovery extends \core\Model {

		public $email;
		public $token;
		public $expire;

		public static function tableName() {

			return 'ResetPasswordToken';
		}

		public static function primaryKey() {

			return 'id';
		}

		public static function attributes() {

			return ['email', 'token', 'expire'];
		}
	}
?>