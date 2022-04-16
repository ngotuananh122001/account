<?php

	namespace handle;

	class UpdateForm extends \core\Validator {

		public $job_title;
		public $image;
		public $address;

		public function rules() {

			return parent::rules();
		}

		public function update() {

			$user = \core\Application::$app->user;
			$id = $user->id;

			if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
				$infor = [
					'id' => $id,
					'key' => 'image',
					'ext' => ['jpg', 'png', 'jpeg'],
					'maxSize' => 1024 * 1024, # bytes = 1MB
					'dir' => 'public/uploads',
				];

				if (!$this->updateFile($infor)) {
					return false;
				}
			}


			$attrs = [];
			foreach ($this as $key => $value) {
				if (property_exists($user, $key)) {
					$attrs[] = $key;
					$user->{$key} = $value ? $value : $user->{$key};
				}
			}

			$user->update($attrs);
			return true;
		}


		private function updateFile($infor) {

			if (!isset($_FILES[$infor['key']])) {
				return false;
			}

			$key = $infor['key'];
			$target_dir = __DIR__ . '/../' . $infor['dir'];
			$max_size = $infor['maxSize'];
			$allow_types = $infor['ext'];

			// check size
			if ($_FILES[$key]['size'] > $max_size) {
				$this->error($key, 'File size is too big!');
				return false;
			}


			// check type
			$file_name = $_FILES['image']['name'];
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			if (!in_array($file_ext, $allow_types)) {

				$this->error($key, "Type of file is not supported!");
				return false;
			}

			// upload file
			$target_file = $target_dir . '/' . $infor['id'] . ".$file_ext";
			move_uploaded_file($_FILES[$key]['tmp_name'], $target_file);

			$this->{$key} = $infor['id'] . ".$file_ext";
			return true;
		}
	}


?>