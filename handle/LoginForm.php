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

		public function login() {

			// verify captch
			if (! ReCaptcha::verifyCaptcha($this, $_POST['g-recaptcha-response'])) {
				return false;
			}


			$user = \models\User::findOne([
				'email' => $this->email
			]);

			if (!$user) {
				$this->error('email', 'User does not exits with this email');
				return false;
			}

			if (!password_verify($this->password, $user->password)) {
				$this->error('password', 'Password doesn\'t correct');
				return false;
			}


			\core\Application::$app->user = $user;
			\core\Application::$app->session->set('user', $user->id);

			// check for keeping user logged in
			if ($this->saved) {
				setcookie(session_name(), session_id(), time() + 7 * 24 * 3600);
			}

			return true;
		}


	}
?>