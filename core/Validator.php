<?php

	namespace core;

	abstract class Validator {

		public const RULE_REQUIRED = 'required';
		public const RULE_EMAIL = 'email';
		public const RULE_MIN = 'min';
		public const RULE_MAX = 'max';
		public const RULE_MATCH = 'match';
		public const RULE_UNIQUE = 'unique';


		public function loadData($data) {

			foreach ($data as $key => $value) {
				if (property_exists($this, $key)) {
					$this->{$key} = $value;
				}
			}
		}

		abstract function rules();

		public $errors = [];

		public function validate() {
			foreach ($this->rules() as $attribute => $rules) {
				$value = $this->{$attribute};

				foreach ($rules as $rule) {
					$rule_name = $rule;

					if (!is_string($rule_name)) {
						$rule_name = $rule[0];
					}

					if ($rule_name === self::RULE_REQUIRED && !$value) {
						$this->addError($attribute, self::RULE_REQUIRED);
					}

					if ($rule_name === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
						$this->addError($attribute, self::RULE_EMAIL);
					}

					if ($rule_name === self::RULE_MIN && strlen($value) < $rule['min']) {
						$this->addError($attribute, self::RULE_MIN, $rule);
					}

					if ($rule_name === self::RULE_MAX && strlen($value) > $rule['max']) {
						$this->addError($attribute, self::RULE_MAX, $rule);
					}

					if ($rule_name === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
						$this->addError($attribute, self::RULE_MATCH, $rule);
					}
				}
			}

			return empty($this->errors);

		}

		public function error($attr, $msg) {

			$this->errors[$attr][] = $msg;
		}

		private function addError($attribute, $rule, $params = []) {

			$message = $this->errorMessage()[$rule] ?? '';

			foreach ($params as $key => $value) {
				$message = str_replace("{{$key}}", $value, $message);
			}

			$this->errors[$attribute][] = $message;
		}

		private function errorMessage() {

			return [
				self::RULE_REQUIRED => 'This field is required',
				self::RULE_EMAIL => 'This field must be valid email address',
				self::RULE_MIN => 'Min length of this field must be {min}',
				self::RULE_MAX => 'Max length of this field must be {max}',
				self::RULE_MATCH => 'This field must be the same as {match}',
			];
		}
	}

?>