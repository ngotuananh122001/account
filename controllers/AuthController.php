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

			// GET method
			if ($req->isGet()) {
				return $this->render('login');
			}

			// POST method
			$login_form = new \handle\LoginForm();
			$login_form->loadData($req->getBody());

			if ($login_form->validate() && $login_form->login()) {

				// login sucessfully
				return $this->responseToAjax([
					'message' => 'success',
				]);


			} else {
				// fail
				$res->setStatusCode(400);
				return $this->responseToAjax([
					'message' => 'fail',
					'errors' => $login_form->errors,
				]);
			}
		}

		public function logout(\core\Request $req, \core\Response $res) {

			\core\Application::$app->user = null;
			\core\Application::$app->session->remove('user');
			setcookie(session_name(), session_id(), time() - 3600);

			$res->redirect('/login');
		}
	}

?>