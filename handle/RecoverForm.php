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

			$this->mailToRecover();

			return true;
		}

		private function mailToRecover() {

			$token = random_bytes(20);
			
			$url = 'http://www.localhost:8080/reset-password?token=' . bin2hex($token);

			$expire = time() + 1800; // 30s

			\models\Recovery::delete(['email' => $this->email]);
			// create new token in database
			$recovery = new \models\Recovery(); 
			$recovery->email = $this->email;
			$recovery->token = password_hash($token, PASSWORD_DEFAULT);
			$recovery->expire = $expire;
			$recovery->create();

			$to = $this->email;
			$subject = 'Reset your password for Base Account';
			$message = '<p>The link to reset password. Please ignore if you don\'t request for it</p>';
			$message .= '<p>Here is your reset password link: </br>';
			$message .= '<a href="' . $url . '">' . $url . '</a></p>';

			$headers = "From: base <ah.ngotuananh12oo1@gmail.com>\r\n";
			$headers .= "Reply-To: ah.ngotuananh12oo1@gmail.com\r\n";
			$headers .= "Content-type: text/html\r\n";

			mail($to, $subject, $message, $headers);
		}
	}
?>