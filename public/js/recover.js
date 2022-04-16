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

		$('.feedback-resetpwd').text('Chờ trong giây lát...');

        $.ajax({
            url: '/recover',
            type: 'POST',
            dataType: 'json',
            data: form_data,
            success: function(res) {

                $('.feedback-resetpwd').text('Request successfully. Please check your email!');
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