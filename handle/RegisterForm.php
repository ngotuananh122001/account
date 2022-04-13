<?php

	namespace handle;

	class RegisterForm extends \core\Validator {

		public $firstname;
		public $lastname;
		public $email;
		public $password;
		public $password_confirm;

		public function rules() {

			return [
				'firstname' => [self::RULE_REQUIRED],
				'lastname' => [self::RULE_REQUIRED],
				'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
				'password' => [
					self::RULE_REQUIRED,
					[
						self::RULE_MIN,
						'min' => 8
					],
					[
						self::RULE_MAX,
						'max' => 24
					]
				],
				'password_confirm' => [
					self::RULE_REQUIRED,
					[
						self::RULE_MATCH,
						'match' => 'password'
					]]
			];
		}
	}
?>