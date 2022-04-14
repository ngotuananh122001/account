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
	<script>
		$(document).ready(function(e) {

			$('#recover-form').submit(function(e) {

				e.preventDefault();
				refreshFeedBack();

				var form_data = $(this)
					.serializeArray()
					.reduce(function (json, {name, value}) {
						json[name] = value;
						return json;
					}, {});

				$.ajax({
					url: '/recover',
					type: 'POST',
					dataType: 'json',
					data: form_data,
					success: function(res) {

						console.log(res);
					},
					error: function(xhr, textStatus, errorThrown) {

						console.log(xhr.responseJSON);
						if (xhr.status === 400) {

							var errors_obj = xhr.responseJSON.errors;

							form = e.target;
							for (var key in errors_obj) {
								feedBack(form, key, errors_obj[key][0]);
							}

							grecaptcha.reset();
						}
					}

				});
			})
		});
	</script>
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

			<form method="POST" id="recover-form">
				<div class="form-item">
					<div class="label">
						Email
						<span></span>
					</div>
					<input type="email" name="email" />
					<div class="feedback">
					</div>
				</div>

				<div class="g-recaptcha" data-sitekey="6LfkfXMfAAAAAHgm2xcqCl2W--YjekNkWJh7yh2Y"></div>
				<div class="feedback feedback-captcha">
				</div>

				<div class="form-item" id="submit">
					<div class="submit-btn">
						<input type="submit" value="Recover password" />
					</div>
				</div>

			</form>
		</div>
	</div>

	<div id="background"></div>
</body>

</html>