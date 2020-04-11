"use strict";

$(document).ready(function () {

    $('#forgotpass-submit').click(function () {
    let errorMessage = "";
    let email = $('#email').val().trim();
    $('#email').val(email);
    if (!(validEmail(email))) {
        errorMessage += "Please enter a valid email address.<br>";
    }
    if (errorMessage.length === 0) {
        $('#forgotpass-msg').waypoint(function (direction) {
            $('#forgotpass-msg').addClass('animated bounceInLeft');

        }, { offset: '50%'

        });
        $('#forgotpass-msg').css("border", "2px solid darkorchid");
        $('#forgotpass-msg').css("background-color", "#e2ffff");
        $('#forgotpass-msg').css("border-radius", "20px");
        $('#forgotpass-msg').html("An email has been sent to the address on file.");
    } else {
        $('#forgotpass-msg').waypoint(function (direction) {
            $('#forgotpass-msg').addClass('animated bounceInLeft');

        }, { offset: '50%'

        });
        $('#forgotpass-msg').css("border", "2px solid darkorchid");
        $('#forgotpass-msg').css("background-color", "#e2ffff");
        $('#forgotpass-msg').css("border-radius", "20px");
        $('#forgotpass-msg').html(errorMessage);
        }
    })

});

function validEmail(email) {
    var re =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}