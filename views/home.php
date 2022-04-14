<?php

	// get user in current session
	$user = \core\Application::$app->user ?? new \models\User();

	$firstname = $user->firstname;
	$lastname = $user->lastname;
	$email = $user->email;
	$job_title = $user->job_title;
	$address = $user->address;
	$img = $user->image;

	if ($img === '') {
		$img = 'non-image.jpg';
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:500,400,300,400italic,700,700italic,400italic,300italic&amp;subset=vietnamese,latin" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="/views/css/home.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="/views/js/home.js"></script>
</head>

<body>

	<div id="panel">
		<div class="panel-header">
			<img src="/images/<?php echo $img ?>" alt="user-image" id="profile_img" />
		</div>

		<div class="panel-body">
			<div class="items">
				<div class="item active">
					<div class="icon">
						<i class="fa-solid fa-circle-user"></i>
					</div>
					<div class="info">Account</div>
				</div>

				<div class="item">
					<div class="icon">
						<i class="fa-solid fa-user-group"></i>
					</div>
					<div class="info">Members</div>
				</div>

				<div class="item">
					<div class="icon">
						<i class="fa-solid fa-bolt"></i>
					</div>
					<div class="info">Groups</div>
				</div>

				<div class="item">
					<div class="icon">
						<i class="fa-solid fa-bolt"></i>
					</div>
					<div class="info">Guests</div>
				</div>

				<div class="item">
					<div class="icon">
						<i class="fa-solid fa-bolt"></i>
					</div>
					<div class="info">Applications</div>
				</div>
			</div>
		</div>

		<div class="panel-footer js-logout-btn">
			<div class="icon">
				<i class="fa-solid fa-arrow-right-from-bracket"></i>
			</div>
			<div class="logout">Logout</div>
		</div>
	</div>

	<div id="main">
		<div class="app-title">
			<div class="back-link">
				<i class="fa-solid fa-arrow-left"></i>
			</div>
			<div class="app-title-content">
				<div class="label">Account</div>
				<div class="title">
					<?php echo "$lastname $firstname" ?> · <?php echo $job_title ?>
				</div>
			</div>
			<div class="upload js-edit-profile">
				<div class="upload-icon">
					<i class="fa-solid fa-arrow-up"></i>
				</div>
				<div class="upload-text">Edit my account</div>
			</div>
		</div>

		<div id="profile">
			<div class="header">
				<div class="image upload">
					<img src="/images/<?php echo $img ?>">
					<div class="upload-form">
						<form method="post" id="js-upload-image-form" enctype="multipart/form-data">
							<label for="image-label"></label>
							<input type="file" id="image-label" name="image" accept=".jpg, .jpeg, .png" class="js-image-input">
							<input type="hidden" name='update_image'>
						</form>
					</div>
				</div>

				<div class="text">
					<div class="title"><?php echo "$user->lastname $user->firstname" ?></div>
					<div class="subtitle"><?php echo $user->job_title ?></div>
					<div class="info">
						<b>Email address</b>
						<?php echo $email ?>
					</div>
					<div class="info">
						<b>Phone number</b>
						0337933110
					</div>
				</div>

			</div>

			<div class="body">
				<div class="list">
					<div class="title">CONTACT INFO</div>
					<div class="info">
						<b>Address</b>
						<?php echo $address ?>
					</div>
				</div>

				<div class="list">
					<div class="title">User groups (0)</div>
				</div>

				<div class="list">
					<div class="title">Direct reports (0)</div>
				</div>

				<div class="list addition">
					<div class="title">Education background</div>
					<div class="add">
						<i class="fa-solid fa-plus"></i>
					</div>
					<div class="item-none">No information.</div>
				</div>

				<div class="list addition">
					<div class="title">Work experiences</div>
					<div class="add">
						<i class="fa-solid fa-plus"></i>
					</div>
					<div class="item-none">No information.</div>
				</div>

				<div class="list addition">
					<div class="title">Honors and Awards</div>
					<div class="add">
						<i class="fa-solid fa-plus"></i>
					</div>
					<div class="item-none">No information.</div>
				</div>


			</div>
		</div>
	</div>

	<div id="menu">
		<!-- Begin: menu-header -->
		<div class="menu-header">
			<div class="name"><?php echo "$user->lastname $user->firstname" ?></div>

			<div class="user-info">
				<?php
				$lastname = strtolower($user->lastname);
				$firstname = strtolower($user->firstname);
				$firstname = explode(' ', $firstname);

				$username = '@' . $firstname[count($firstname) - 1] . $lastname;
				?>
				<div class="username"><?php echo $username ?></div>

				<div class="email"><?php echo $email ?></div>
			</div>
		</div>
		<!-- End: menu-header -->

		<!-- Begin: menu-body -->
		<div class="menu-body">
			<div class="menu-item">
				<div class="title">Account information</div>
				<ul class="box">
					<li class="active">
						<div class="icon">
							<i class="fa-solid fa-gear"></i>
						</div>
						<div class="text">Account overview</div>
					</li>

					<li>
						<div class="icon">
							<i class="fa-solid fa-pencil"></i>
						</div>
						<div class="text">Edit account</div>
					</li>

					<li>
						<div class="icon">
							<i class="fa-solid fa-globe"></i>
						</div>
						<div class="text">Edit language</div>
					</li>

					<li>
						<div class="icon">
							<i class="fa-solid fa-key"></i>
						</div>
						<div class="text">Edit password</div>
					</li>

					<li>
						<div class="icon">
							<i class="fa-solid fa-palette"></i>
						</div>
						<div class="text">Edit theme color</div>
					</li>

					<li>
						<div class="icon">
							<i class="fa-solid fa-clock-rotate-left"></i>
						</div>
						<div class="text">Set timesheet</div>
					</li>

					<li>
						<div class="icon">
							<i class="fa-solid fa-gear"></i>
						</div>
						<div class="text">2-factor authentication</div>
					</li>
				</ul>
			</div>

			<div class="menu-item">
				<div class="title">APPLICATION & SECURITY</div>
				<ul class="box"></ul>
			</div>

			<div class="menu-item">
				<div class="title">ADVANCE SETTING</div>
				<ul class="box">
					<li>
						<div class="icon">Icon</div>
						<div class="text">Login histories</div>
					</li>

					<li>
						<div class="icon">Icon</div>
						<div class="text">Manage linked devices</div>
					</li>

					<li>
						<div class="icon">Icon</div>
						<div class="text">Edit email notification</div>
					</li>

					<li>
						<div class="icon">Icon</div>
						<div class="text">Edit timezone</div>
					</li>

					<li>
						<div class="icon">Icon</div>
						<div class="text">On-leave delegation</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- End: menu-body -->
	</div>

	<div class="modal hidden js-modal">
		<div class="popup">
			<div class="popup-header">
				<div class="title">Edit personal profile</div>
				<div class="close js-close-modal">
					<i class="fa-solid fa-xmark"></i>
				</div>
			</div>
			<div class="popup-content">
				<form action="" id="js-upload-form" method="POST" enctype="multipart/form-data">

					<!-- Code update profile -->

					<!-- End update -->
					<div class="form-rows">
						<div class="form-row">
							<div class="label">
								Your first name
								<span class="sublabel">Your first name</span>
							</div>
							<div class="input-data">
								<input type="text" value="<?php echo $user->firstname ?>" disabled>
							</div>
						</div>
						<div class="form-row">
							<div class="label">
								Your last name
								<span class="sublabel">Your last name</span>
							</div>
							<div class="input-data">
								<input type="text" value="<?php echo $user->lastname ?>" disabled>
							</div>
						</div>
						<div class="form-row">
							<div class="label">
								Email
								<span class="sublabel">Your email address</span>
							</div>
							<div class="input-data">
								<input type="email" name="email" value="<?php echo $user->email ?>" disabled>
							</div>
						</div>
						<div class="form-row">
							<div class="label">
								Username
								<span>Your username</span>
							</div>
							<div class="input-data">
								<input type="text" value="<?php echo $username ?>" disabled>
							</div>
						</div>
						<div class="form-row">
							<div class="label">
								Job title
								<span class="sublabel">Job title</span>
							</div>
							<div class="input-data">
								<input type="text" name="job_title" value="<?php echo $user->job_title ?>">
							</div>
						</div>

						<div class="form-row">
							<div class="label">
								Profile image
								<span class="sublabel">Profile image</span>
							</div>
							<div class="input-data">
								<input type="file" name="image">
							</div>
						</div>

						<div class="form-row">
							<div class="label">
								Current address
								<span class="sublabel">Current address</span>
							</div>
							<div class="input-data">
								<input type="text" name="address" value="<?php echo $user->address ?>">
							</div>
						</div>
					</div>
					<div class="form-button">
						<div class="button ok js-btn-submit">Update</div>
						<div class="button cancel">Cancel</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		var body = document.body;
		var edit_btn = document.querySelector('.js-edit-profile');
		var close_btn = document.querySelector('.js-close-modal');

		var modal = document.querySelector('.js-modal');

		var showModal = function(e) {
			modal.classList.toggle('hidden');

			if (!modal.classList.contains('hidden')) {
				body.style.overflow = 'hidden';
			} else {
				body.style.overflow = 'auto';
			}
		}

		edit_btn.onclick = showModal;

		close_btn.onclick = showModal;
	</script>

</body>

</html>