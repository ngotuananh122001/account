<?php

	namespace core;

	class Request {

		public function getPath() {

			$path = $_SERVER['REQUEST_URI'] ?? '/';
			$position = strpos($path, '?');

			if ($position === false) {
				return $path;
			}

			return substr($path, 0, $position);
		}

		public function method() {

			return strtolower($_SERVER['REQUEST_METHOD']);
		}

		public function isPost() {
			return $this->method() === 'post';
		}

		public function isGet() {
			return $this->method() === 'get';
		}

		public function getBody() {

			$body = [];

			if ($this->method() === 'get') {
				foreach ($_GET as $key => $value) {
					$body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
				}
			}

			if ($this->method() === 'post') {
				foreach ($_POST as $key => $value) {
					$body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
				}

				// save file to images folder if user updates
				if (isset($_FILES['image'])) {
					$img_name = $_FILES['image']['name'];
					$img_tmp = $_FILES['image']['tmp_name'];

					$x = explode('.', $img_name);
					$ext = end($x);
					$name = time() . '.' . $ext;
					$path = __DIR__."/../images/" . $name;

					$allowed_ext = array("gif", "jpg", "jpeg", "png");

					if (in_array($ext, $allowed_ext)) {
						move_uploaded_file($img_tmp, $path);
						$body['image'] = $name;
					} else {
						$body['image'] = '';
					}
				}
			}
			return $body;
		}
	}

?>