/*------------------------------------------------------------
Name: Kendall Shearman
Assignment: Final Project
Purpose: MVC Frameworks
Notes: No questions or comments at this time
--------------------------------------------------------------*/
"use strict";

function clearResetForm() {
    $('#resetemail').val('');
    $('#password').val('');
    $('#passwordconf').val('');
    $('#resetpass-msg').html('<br>');
    $('#resetpass-msg').css("border", "none");
    $('#resetpass-msg').css("background-color", "white");

}

$(document).ready(function () {
    $("#resetpass-clear").click(function () {
        clearResetForm();
    });

    $('#resetpass-submit').click(function () {
        console.log("clicked");
        var errorMessage = "";

        var resetemail = $('#resetemail').val().trim();
        var password = $('#password').val().trim();
        var passwordconf = $('#passwordconf').val().trim();

        $('#resetemail').val(resetemail);
        $('#password').val(password);
        $('#passwordconf').val(passwordconf);

        if (!(validEmail(resetemail))) {
            errorMessage += "Please enter a valid email address.<br>";
            console.log(errorMessage)
        }

        if (password === "" || !(validPassword(password))) {
            errorMessage += "Password must be at least 8 characters and contain 1 upper, 1 lower, 1 symbol, 1 number.<br>"
            console.log(errorMessage)
        }

        if (passwordconf !== password || passwordconf === "") {
            errorMessage += "Password confirmation cannot be empty and must match.<br>"
            console.log(errorMessage);
        }

        if(errorMessage.length === 0){
            $.ajax({
                url: '/Secure_Ajax/resetPass',
                type: 'POST',
                data:{resetemail: resetemail, password: password},
                    success: function (val) {
                        if (val === 'okay') {
                            console.log(val);
                            clearResetForm();
                            $('#resetpass-msg').waypoint(function (direction) {
                                $('#resetpass-msg').addClass('animated bounceInDown');

                            }, { offset: '50%'

                            });
                            $('#resetpass-msg').css("border", "2px solid darkorchid");
                            $('#resetpass-msg').css("background-color", "#e2ffff");
                            $('#resetpass-msg').css("border-radius", "20px");
                            $('#resetpass-msg').html('Your password has been changed!');

                        } else if (val === 'error'){
                            $('#resetpass-msg').waypoint(function (direction) {
                                $('#resetpass-msg').addClass('animated bounceInDown');

                            }, { offset: '50%'

                            });
                            $('#resetpass-msg').css("border", "2px solid darkorchid");
                            $('#resetpass-msg').css("background-color", "#e2ffff");
                            $('#resetpass-msg').css("border-radius", "20px");
                            $('#resetpass-msg').html('SCRIPT ERROR - PASSWORD NOT CHANGED!');
                        }
                    },
                    error: function (val) {
                        $('#resetpass-msg').waypoint(function (direction) {
                            $('#resetpass-msg').addClass('animated bounceInDown');

                        }, { offset: '50%'

                        });
                        $('#resetpass-msg').css("border", "2px solid darkorchid");
                        $('#resetpass-msg').css("background-color", "#e2ffff");
                        $('#resetpass-msg').css("border-radius", "20px");
                        $('#resetpass-msg').html('SERVER ERROR - PASSWORD NOT CHANGED!');
                    },
                }
            )
        } else {
            $('#resetpass-msg').waypoint(function (direction) {
                $('#resetpass-msg').addClass('animated bounceInLeft');

            }, { offset: '50%'

            });
            $('#resetpass-msg').css("border", "2px solid darkorchid");
            $('#resetpass-msg').css("background-color", "#e2ffff");
            $('#resetpass-msg').css("border-radius", "20px");
            $('#resetpass-msg').html(errorMessage);
        }

    });
});

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

function validEmail(email) {
    var re =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}