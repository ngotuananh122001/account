<?php

	namespace handle;

	class ResetForm extends \core\Validator {

		public $password;
		public $password_confirm;
		public $token;

		public function rules() {

			return [
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

		public function reset() {

			// verify captch
			if (! ReCaptcha::verifyCaptcha($this, $_POST['g-recaptcha-response'])) {
				return false;
			}

			// verify token
			$token = $this->token;
			$expire = time();

			$record = \models\Recovery::findOne([
				'token' => $token,
			]);


			if (!$record || $expire > $record->expire) {
				$this->error('token', 'Can\'t verify authenication');
				return false;
			} else {
				$this->error('token', "Token valid");
			}

			$user = \models\User::findOne(['email' => $record->email]);
			$user->password = password_hash($this->password, PASSWORD_DEFAULT);
			$user->update(['password']);

			return true;
		}


	}
?>