<?php

	namespace models;

	class Recovery extends \core\Model {

		public static function tableName() {

			return 'token';
		}

		public static function primaryKey() {

			return 'id';
		}

		public static function attributes() {

			return ['email', 'token'];
		}
	}
?>