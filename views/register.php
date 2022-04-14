<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Sign up | Base.vn</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&amp;subset=vietnamese,latin" />
	<link rel="stylesheet" href="/views/css/auth.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="/views/js/common.js"></script>
	<script src="/views/js/register.js"></script>
</head>

<body>
	<div id="auth">
		<div class="auth-content">
			<div class="auth-logo">
				<a href="#">
					<img src="https://share-gcdn.basecdn.net/brand/logo.full.png" />
				</a>
			</div>

			<h1 class="auth-title">Sign up</h1>

			<div class="auth-sub-title">
				Welcome back. Sign up to exploring.
			</div>

			<form method="POST" id="register-form">

				<!-- // #$model nhan tu AuthController/renderView -->
				<div class="form-item">
					<div class="label">
						First name
						<span></span>
					</div>
					<input type="text" name="firstname" class="js-input" />
					<div class="feedback">
					</div>
				</div>

				<div class="form-item">
					<div class="label">
						Last name
						<span></span>
					</div>
					<input type="text" name="lastname" class="js-input" />
					<div class="feedback">
					</div>
				</div>

				<div class="form-item">
					<div class="label">
						Email
						<span></span>
					</div>
					<input type="email" name="email" class="js-input" />
					<div class="feedback">
					</div>
				</div>

				<div class="form-item">
					<div class="label">
						Password
						<span></span>
					</div>
					<input type="password" name="password" class="js-input" />
					<div class="feedback">
					</div>
				</div>

				<div class="form-item">
					<div class="label">
						Confirm password
						<span></span>
					</div>
					<input type="password" name="password_confirm" class="js-input" />
					<div class="feedback">
					</div>
				</div>

				<div class="g-recaptcha" data-sitekey="6LfkfXMfAAAAAHgm2xcqCl2W--YjekNkWJh7yh2Y"></div>
				<div class="feedback feedback-captcha">
				</div>
      			<br/>
				<div class="form-item" id="submit">

					<div class="submit-btn">
						<input type="submit" value="Create user member" />
					</div>
				</div>

				<div class="oauth">
					<div class="oauth-label">
						<span>Or, login via single sign-on</span>
					</div>

					<div class="oauth-list">
						<div class="oauth-item">
							<a href="#">Login with Google</a>
						</div>

						<div class="oauth-item">
							<a href="#">Login with Microsoft</a>
						</div>

						<div class="oauth-item">
							<a href="#">Login with SAML</a>
						</div>
					</div>

					<div class="oauth-simple">
						<a href="#">Login with Guest/Client access?</a>
					</div>
				</div>

			</form>
		</div>
	</div>

	<div id="background"></div>
</body>

</html>