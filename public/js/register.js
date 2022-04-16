$(document).ready(function () {

	$('#register-form').submit(function (e) {

		e.preventDefault();
		refreshFeedBack();

		var form_data = $(this)
			.serializeArray()
			.reduce(function (json, { name, value }) {
				json[name] = value;
				return json;
			}, {});

		$.ajax({
			url: '/register',
			type: 'POST',
			dataType: 'json', // the type of data which expecting back from server
			data: form_data,
			success: function (data, textStatus, xhr) {

				window.location.replace('/login');
			},
			error: function (xhr, textStatus, errorThrown) {

				//console.log(xhr);
				// console.log("Status: " + textStatus);
				// console.log("Error: " + errorThrown);

				if (xhr.status === 400) {
					var errors_obj = xhr.responseJSON.errors;

					form = e.target;
					for (var key in errors_obj) {
						feedBack(form, key, errors_obj[key][0]);
					}
				}

			}
		})

	});

});