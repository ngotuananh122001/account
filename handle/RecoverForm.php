<?php

	namespace handle;

	class RecoverForm extends \core\Validator {

		public $email;

		public function rules() {

			return ['email' => [self::RULE_REQUIRED, self::RULE_EMAIL]];
		}

		public function recover() {

			if (!ReCaptcha::verifyCaptcha($this, $_POST['g-recaptcha-response'])) {
				return false;
			}

			$user = \models\User::findOne(['email' => $this->email]);

			if (!$user) {
				$this->error('email', 'User does not exits with this email');
				return false;
			}

			return true;

		}

		private function sendEmail($email, $msg) {


		}

		private function generateToken($bytes) {

			f
		}
	}
?>