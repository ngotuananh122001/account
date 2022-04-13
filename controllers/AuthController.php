<?php

	namespace controllers;

	class AuthController extends \core\Controller {

		public function register(\core\Request $req, \core\Response $res) {

			// GET method
			if ($req->isGet()) {
				return $this->render('register');
			}

			// POST method
			$register_form = new \handle\RegisterForm();
			$register_form->loadData($req->getBody());

			if ($register_form->validate() && $register_form->register()) {
				// create successfully
				
				\core\Application::$app->session->setFlash('success', 'Thanks for registering');
				return $this->responseToAjax([
					'message' => 'success'
				]);
			} else {
				$res->setStatusCode(400);
				return $this->responseToAjax([
					'message' => 'fail',
					'errors' => $register_form->errors
				]);
			}

		}












		public function login(\core\Request $req, \core\Response $res) {

			$login_form = new \handle\LoginForm();
			// GET method
			if ($req->isGet()) {
				return $this->render('login', [
					'form_handling' => $login_form
				]);
			}

			// POST method

			$login_form->loadData($req->getBody());

			var_dump($login_form);
			die();

		}
	}

?>