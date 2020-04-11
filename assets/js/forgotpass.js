"use strict";

function clearForgotPassForm() {

    $('#email').val('');
    $('#forgotpass-msg').html('<br>');
    $('#forgotpass-msg').css("border", "none");
    $('#forgotpass-msg').css("background-color", "white");

}

$(document).ready(function () {

    $("#forgotpass-clear").click(function () {
        clearForgotPassForm();
    });

    $('#forgotpass-submit').click(function () {
    let errorMessage = "";
    let email = $('#email').val().trim();
    $('#email').val(email);
    if (!(validEmail(email))) {
        errorMessage += "Please enter a valid email address.<br>";
    } else {
        $.ajax({
            url: '../Ajax/sendResetLink',
            type: 'POST',
            data: {email: email},
            success: function (val) {
                if (val === 'okay') {
                    clearForgotPassForm();
                    console.log(val);
                    $('#forgotpass-msg').waypoint(function (direction) {
                        $('#forgotpass-msg').addClass('animated bounceInLeft');

                    }, {
                        offset: '50%'

                    });
                    $('#forgotpass-msg').css("border", "2px solid darkorchid");
                    $('#forgotpass-msg').css("background-color", "#e2ffff");
                    $('#forgotpass-msg').css("border-radius", "20px");
                    $('#forgotpass-msg').html("An email has been sent to the address on file.");
                } else {
                    //console.log(val);
                    $('#forgotpass-msg').waypoint(function (direction) {
                        $('#forgotpass-msg').addClass('animated bounceInLeft');

                    }, {
                        offset: '50%'

                    });
                    $('#forgotpass-msg').css("border", "2px solid darkorchid");
                    $('#forgotpass-msg').css("background-color", "#e2ffff");
                    $('#forgotpass-msg').css("border-radius", "20px");
                    $('#forgotpass-msg').html("That didn't work with our script");
                }
            },
            error: function (val) {
                $('#forgotpass-msg').waypoint(function (direction) {
                    $('#forgotpass-msg').addClass('animated bounceInDown');

                }, { offset: '50%'

                });
                $('#forgotpass').css("border", "2px solid darkorchid");
                $('#forgotpass-msg').css("background-color", "#e2ffff");
                $('#forgotpass-msg').css("border-radius", "20px");
                $('#forgotpass-msg').html('SERVER ERROR - NO EMAIL SENT!');
            },


            });

        }

        if(errorMessage.length > 0){
        $('#forgotpass-msg').waypoint(function (direction) {
            $('#forgotpass-msg').addClass('animated bounceInLeft');

        }, {
            offset: '50%'

        });
        $('#forgotpass-msg').css("border", "2px solid darkorchid");
        $('#forgotpass-msg').css("background-color", "#e2ffff");
        $('#forgotpass-msg').css("border-radius", "20px");
        $('#forgotpass-msg').html(errorMessage);
        }

    });
});

function validEmail(email) {
    var re =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}