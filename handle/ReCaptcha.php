<?php

	namespace handle;

	class ReCaptcha {

		public static function verifyCaptcha(\core\Validator $form, $captcha_response, $SECRET_KEY) {

			$verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='
				.$SECRET_KEY.'&response='.$captcha_response);

			$response_data = json_decode($verify_response);
			if ($response_data->success) {
				return true;
			} else {
				$form->error('captcha', 'Robot verification failed, please try again.');
				return false;
			}

		}
	}
?>