<?php

	$token = $_GET['token'];
	if (empty($token)) {
		echo '<h1>Could not validate your request reset password</h1>';
		die();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Recover | Base.vn</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&amp;subset=vietnamese,latin" />
	<link rel="stylesheet" href="/views/css/auth.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<title>Recover</title>
	<script src="/views/js/common.js"></script>
	<script src="/views/js/reset.js"></script>
</head>

<body>
	<div id="auth">
		<div class="auth-content">
			<div class="auth-logo">
				<a href="https://base.vn">
					<img src="https://share-gcdn.basecdn.net/brand/logo.full.png" />
				</a>
			</div>

			<h1 class="auth-title">Create a new password</h1>

			<div class="auth-sub-title">
				Please enter your information.
			</div>

			<form method="POST" id="reset-form">
				<div class="form-item">
					<div class="label">
						Password
						<span></span>
					</div>
					<input type="password" name="password" placeholder="enter password..." />
					<div class="feedback">
					</div>
				</div>

				<div class="form-item">
					<div class="label">
						Confirm password
						<span></span>
					</div>
					<input type="password" name="password_confirm" placeholder="enter repeat password..." />
					<div class="feedback">
					<input type="hidden" name='reset-pwd' value="<?php echo $token ?>" />
					</div>
				</div>

				<div class="g-recaptcha" data-sitekey="6LfkfXMfAAAAAHgm2xcqCl2W--YjekNkWJh7yh2Y"></div>
				<div class="feedback feedback-captcha">
				</div>

				<div class="feedback feedback-token"></div>

				<div class="form-item" id="submit">
					<div class="submit-btn">
						<input type="submit" value="Create" />
					</div>
				</div>

			</form>

			<div class='feedback-resetpwd' style="display: none;">
				Request successfully. Please check your email!
			</div>
		</div>
	</div>

	<div id="background"></div>
</body>

</html>