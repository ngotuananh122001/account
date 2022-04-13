<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Recover | Base.vn</title>
	<link rel="stylesheet" type="text/css"
		href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&amp;subset=vietnamese,latin" />
	<link rel="stylesheet" href="/views/css/auth.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Document</title>
		<script src="/views/js/common.js"></script>
</head>

<body>
	<div id="auth">
		<div class="auth-content">
			<div class="auth-logo">
				<a href="https://base.vn">
					<img src="https://share-gcdn.basecdn.net/brand/logo.full.png" />
				</a>
			</div>

			<h1 class="auth-title">Password Recovery</h1>

			<div class="auth-sub-title">
			Please enter your information. A password recovery hint will be sent to your email.
			</div>

			<?php $form = \core\form\Form::begin('', 'post', 'recover-form') ?>
				<?php echo $form->field($model, 'email')->emailField()  ?>

				<div class="form-item" id="submit">
					<div class="submit-btn">
						<input type="submit" value="Recover password" />
					</div>
				</div>

			<?php \core\form\Form::end() ?>
		</div>
	</div>

	<div id="background"></div>
</body>

</html>