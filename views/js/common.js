$(document).ready(function() {
	$('.js-btn-submit').click(function() {

		var form = new FormData($('#js-upload-form')[0]);
		$.ajax({
			url: '/',
			processData: false,
			contentType: false,
			type: 'POST',
			data: form,
			success: function (res) {
				res = JSON.parse(res);
				if (res.message === 'success') {
					window.location.replace('/');
				}
			}
		});
	});

	$('.js-logout-btn').click(function() {

		window.location.replace('/logout');
	});

	$('.js-image-input').change(function() {

		console.log("Here");
		var form = new FormData($('#js-upload-image-form')[0]);

		$.ajax({
			url: '/',
			type: 'POST',
			processData: false,
			contentType: false,
			data: form,
			success: function (res) {

				res = JSON.parse(res);
				if (res.message === 'success') {
					window.location.replace('/');
				}
			}
		});
	});

	$('#recover-form').submit(function (e) {
		console.log("Submit");
		e.preventDefault();

		var form = new FormData($(this)[0]);

		$.ajax({
			url: '/recover',
			type: 'POST',
			processData: false,
			contentType: false,
			data: form,
			success: function (res) {

				res = JSON.parse(res);

				if (res.message === 'fail') {
					feedBack(e.target, res.errors);
				}

			}
		});
	});


	function feedBack(form, errors) {

		var feedback = form.querySelector('.feedback');
		feedback.classList.add('error');
		feedback.innerHTML = errors[0];
	}
});