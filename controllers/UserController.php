<?php

	namespace controllers;

	class UserController extends \core\Controller {

		public function updateProfile(\core\Request $req, \core\Response $res) {

			$update_form = new \handle\UpdateForm();

			$update_form->loadData($req->getBody());

			if ($update_form->update()) {

				$this->responseToAjax([
					'message' => 'success',
				]);
			} else {

				$res->setStatusCode(400);
				return $this->responseToAjax([
					'message' => 'fail',
					'errors' => $this->errors
				]);
			}

		}
	}
?>