$(document).ready(function () {

    $('#register-form').submit(function (e) {

        e.preventDefault();
        refreshFeedBack();

        var form_data = $(this)
            .serializeArray()
            .reduce(function (json, {name, value}) {
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
                    var errorsObj = xhr.responseJSON.errors;

                    form = e.target;
                    for (var key in errorsObj) {
                        feedBack(form, key, errorsObj[key][0]);
                    }
                }
                
            }
        })

    });

    function feedBack(form, key, firstError) {
        
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

});