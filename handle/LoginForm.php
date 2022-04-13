<?php

	namespace handle;

	class LoginForm extends \core\Validator {

		public $email;
		public $password;
		public $saved = false; // for keeping user logged in

		public function rules() {
			return [
				'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
				'password' => [self::RULE_REQUIRED],
			];
		}

		// public function login($remember_me = false) {

		// 	$user = \models\User::findOne(['email' => $this->email]);

		// 	if (!$user) {
		// 		$this->error('email', 'User does not exits with this email');
		// 		return false;
		// 	}

		// 	if (!password_verify($this->password, $user->password)) {
		// 		$this->error('password', 'Password is incorrect');
		// 		return false;
		// 	}

		// 	return \core\Application::$app->login($user, $remember_me);
		// }
	}
?>