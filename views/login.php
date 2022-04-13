<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Login | Base.vn</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&amp;subset=vietnamese,latin" />
	<link rel="stylesheet" href="/views/css/auth.css" />
</head>

<body>
	<div id="auth">
		<div class="auth-content">
			<div class="auth-logo">
				<a href="https://base.vn">
					<img src="https://share-gcdn.basecdn.net/brand/logo.full.png" />
				</a>
			</div>

			<h1 class="auth-title">Login</h1>

			<div class="auth-sub-title">
				Welcome back. Login to start working.
			</div>

			<form method="POST" id="login-form">
				<div class="form-item">
					<div class="label">
						Email
						<span></span>
					</div>
					<input type="email" name="email" />
					<div class="feedback">
					</div>
				</div>

				<div class="form-item">
					<div class="label">
						Password
						<span></span>
					</div>
					<input type="email" name="password" />
					<div class="feedback">
					</div>
				</div>

				<div class="form-item" id="submit">
					<div class="checkbox">
						<input type="checkbox" name="saved" />
						Keep me logged in
					</div>

					<div class="submit-btn">
						<input type="submit" value="Login to start working" />
					</div>
				</div>

				<div class="oauth">
					<div class="oauth-label">
						<span>Or, login via single sign-on</span>
					</div>

					<div class="oauth-list">
						<div class="oauth-item">
							<a href="https://sso.base.vn/google">Login with Google</a>
						</div>

						<div class="oauth-item">
							<a href="https://sso.base.vn/ms">Login with Microsoft</a>
						</div>

						<div class="oauth-item">
							<a href="https://sso.base.vn/google">Login with SAML</a>
						</div>
					</div>

					<div class="oauth-simple">
						<a href="https://account.base.vn/a/guest">Login with Guest/Client access?</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div id="background"></div>
</body>

</html>