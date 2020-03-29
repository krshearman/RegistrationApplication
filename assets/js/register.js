/* Clear, validate, ajax, submit */

"use strict";

function clearRegForm() {
    $('#username').val('');
    $('#email').val('');
    $('#emailconf').val('');
    $('#password').val('');
    $('#passwordconf').val('');
    $('#reg-msg').html('<br>');
    $('#reg-msg').css("border", "none");
    $('#reg-msg').css("background-color", "white");
}

$(document).ready(function () {

    $("#reg-clear").click(function () {
        clearRegForm();
    });

    $('#reg-submit').click(function () {
        var errorMessage = "";

        var username = $('#username').val().trim();
        var email = $('#email').val().trim();
        var emailconf = $('#emailconf').val().trim();
        var password = $('#password').val().trim();
        var passwordconf = $('#passwordconf').val().trim();

        $('#username').val(username);
        $('#email').val(email);
        $('#emailconf').val(emailconf);
        $('#password').val(password);
        $('#passwordconf').val(passwordconf);

        if (username === "") {
            errorMessage += "Username cannot be empty.<br>";
        }

        if (!(validEmail(email))) {
            errorMessage += "Please enter a valid email address.<br>";
        }

        if (emailconf !== email || emailconf === "") {
            errorMessage += "Please enter a valid email address that matches.<br>"
        }

        if (password === "" || !(validPassword(password))) {
            errorMessage += "Password must be at least 8 characters and contain 1 upper, 1 lower, 1 symbol, 1 number.<br>"
        }

        if (passwordconf !== password || passwordconf === "") {
            errorMessage += "Password confirmation cannot be empty and must match.<br>"
        }

        if (errorMessage.length === 0) {
            $('#reg-msg').html("Registering...");

            $.ajax({
                url: 'register',
                type: 'POST',
                data: {username: username, email: email, password: password},
                success: function (val) {
                    if (val === "okay") {
                        clearRegForm();
                        $('#reg-msg').waypoint(function (direction) {
                            $('#reg-msg').addClass('animated bounceInDown');

                        }, {
                            offset: '50%'

                        });
                        $('#reg-msg').css("border", "2px solid darkorchid");
                        $('#reg-msg').css("background-color", "#e2ffff");
                        $('#reg-msg').css("border-radius", "20px");
                        $('#reg-msg').html('SENT!');

                    } else {
                        $('#reg-msg').html(errorMessage);
                    }


                }
            });
        }

    });
});

function validEmail(email) {
    var re =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


function validPassword(password) {
    var upperCase = new RegExp('[A-Z]');
    var lowerCase = new RegExp('[a-z]');
    var numbers = new RegExp('[0-9]');
    var symbols = new RegExp('[_.,:;#$?!]');

    if (password.match(upperCase) && password.match(lowerCase) &&
        password.match(numbers) && password.match(symbols)) {
        return true;

    }
}

