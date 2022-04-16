<?php

	namespace handle;

	class RecoverForm extends \core\Validator {

		public $email;

		public function rules() {

			return ['email' => [self::RULE_REQUIRED, self::RULE_EMAIL]];
		}

		public function recover() {

			if (!ReCaptcha::verifyCaptcha($this, $_POST['g-recaptcha-response'], \core\Application::$config['PRIVATE_KEY'])) {
				return false;
			}

			$user = \models\User::findOne(['email' => $this->email]);

			if (!$user) {
				$this->error('email', 'User does not exits with this email');
				return false;
			}

			$this->mailToRecover();

			return true;
		}

		private function mailToRecover() {

			$token = bin2hex(random_bytes(20));

			$url = \core\Application::$config['URL'] . '/reset-password?token=' . $token;

			$expire = time() + 1800; // 30'

			\models\Recovery::delete(['email' => $this->email]);
			// create new token in database
			$recovery = new \models\Recovery();
			$recovery->email = $this->email;
			$recovery->token = $token;
			$recovery->expire = $expire;
			$recovery->create();

			$to = $this->email;
			$subject = 'Reset your password for Base Account';
			$message = '<p>The link to reset password. Please ignore if you don\'t request for it</p>';
			$message .= '<p>Here is your reset password link: </br>';
			$message .= '<a href="' . $url . '">' . $url . '</a></p>';

			$headers = "From: base <" . \core\Application::$config['SENDER_EMAIL'] . ">\r\n";
			$headers .= "Reply-To: " . \core\Application::$config['SENDER_EMAIL'] . "\r\n";
			$headers .= "Content-type: text/html\r\n";

			mail($to, $subject, $message, $headers);
		}
	}
?>