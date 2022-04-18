$(document).ready(function () {

	$('#login-form').submit(function (e) {

		e.preventDefault();
		refreshFeedBack();

		var form_data = $(this)
			.serializeArray()
			.reduce(function (json, {name, value}) {
				json[name] = value;
				return json;
			}, {});

		$.ajax({
			url: '/login',
			type: 'POST',
			dataType: 'json',
			data: form_data,
			success: function (data) {

				console.log("Hello world");
				console.log(data);
				window.location.replace('/');
			},
			error: function (xhr, textStatus, errorThrown) {

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