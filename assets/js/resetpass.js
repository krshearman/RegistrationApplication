"use strict";



$(document).ready(function () {
    //submit function here
    $('#resetpass-submit').click(function () {
        console.log("clicked");
        var errorMessage = "";

        var password = $('#password').val().trim();
        var passwordconf = $('#passwordconf').val().trim();

        $('#password').val(password);
        $('#passwordconf').val(passwordconf);

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
                url: '../Ajax/resetPass',
                type: 'POST',
                data:{password: password},
                    success: function (val) {
                        if (val === 'okay') {

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