function feedBack(form, key, firstError) {

	if (key === 'captcha') {
		console.log("Captcha");
		var captcha = document.querySelector('.feedback-captcha');
		captcha.innerHTML = firstError;
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