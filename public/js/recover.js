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

                $('.feedback-resetpwd').css({
                    'display': 'block',
                })

				setTimeout(function () {
					window.location.replace('/login');
				}, 4000);
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