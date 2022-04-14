$(document).ready(function () {
	$('.js-logout-btn').click(function() {

		alert("Goodbye");
		window.location.replace('/logout');
	});
});