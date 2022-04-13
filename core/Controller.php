<?php

	namespace core;

	class Controller {

		public function render($view, $params = []) {

			return Application::$app->router->renderView($view, $params);
		}

		public function responseToAjax($data) {

			echo json_encode($data);
		}

	}
?>