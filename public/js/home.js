$(document).ready(function () {

	$("#upload-form").submit(function (e) {

		e.preventDefault();
		var form = new FormData($(this)[0]);

		$.ajax({
			url: '/profile',
			processData: false,
			contentType: false,
			type: 'POST',
			data: form,
			success: function (res) {

				window.location.replace('/');
			},
			error: function (xhr, textStatus, errorThrown) {

				console.log(xhr);
			}
		})
	});


	$('.js-logout-btn').click(function() {

		alert("Goodbye");
		window.location.replace('/logout');
	});
});

