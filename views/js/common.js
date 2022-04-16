function feedBack(form, key, firstError) {

	if (key === 'captcha') {
		console.log("Captcha");
		var captcha = document.querySelector('.feedback-captcha');
		captcha.innerHTML = firstError;
		return;
	}

	if (key === 'token') {
		console.log('Error: token invalid');
		var token = document.querySelector('.feedback-token');
		token.innerHTML = `<h1>Can't authentification</h1>`
		// setTimeout(function () {
		// 	window.location.replace('/login');
		// }, 5000);
		return;
	}

	// find element
	var element = form.querySelector(`input[name=${key}] + .feedback`);

	element.classList.add('error');
	element.innerHTML = firstError;
}

function refreshFeedBack() {
	var feedbacks = document.querySelectorAll('.feedback');

	for (var feedback of feedbacks) {
		feedback.classList.remove('error');
		feedback.innerHTML = '';
	}
}