<?php

	namespace controllers;

	class SiteController extends \core\Controller {

		public function home($req, $res) {

			if (!\core\Application::$app->user) {
				$res->redirect('/login');
				return;
			}

			return $this->render('home');
		}
	}
?>