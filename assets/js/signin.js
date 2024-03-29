/*------------------------------------------------------------
Name: Kendall Shearman
Assignment: Final Project
Purpose: MVC Frameworks
Notes: No questions or comments at this time
--------------------------------------------------------------*/

"use strict";

function clearSigninForm() {
    $('#user').val('');
    $('#pass').val('');
    $('#signin-msg').css("border", "none");
    $('#signin-msg').css("background-color", "white");
    //$('#signin-msg').css("color", "white");
}

$(document).ready(function () {

    $('#signin-submit').click(function () {
        var errorMessage = "";

        var user = $('#user').val().trim();
        var pass = $('#pass').val().trim();

        $('#user').val(user);
        $('#pass').val(pass);

        if (user === "") {
            errorMessage += "Username cannot be empty.<br>";
        }

        if (pass === ""){
            errorMessage += "Password cannot be empty.<br>";
        }

        if (errorMessage.length === 0) {
            $('#signin-msg').html("Signing in...");

            $.ajax({
                    url: '../Ajax/signin',
                    type: 'POST',
                    data: {user: user, pass: pass},
                    success: function (val) {
                        if (val != 'error') {
                            clearSigninForm();
                            console.log(val);
                            $(location).attr('href', val);
                        } else if (val == 'error'){
                            $('#signin-msg').waypoint(function (direction) {
                                $('#signin-msg').addClass('animated bounceInLeft');

                            }, { offset: '50%'

                            });
                            $('#signin-msg').css("border", "2px solid darkorchid");
                            $('#signin-msg').css("background-color", "#e2ffff");
                            $('#signin-msg').css("border-radius", "20px");
                            $('#signin-msg').html('We do not recognize those credentials.<br> NOT SIGNED IN!');

                        }
                    },
                    error: function (val){
                        if (val){
                            console.log(val);
                            $('#signin-msg').waypoint(function (direction) {
                                $('#signin-msg').addClass('animated bounceInLeft');

                            }, { offset: '50%'

                            });
                            $('#signin-msg').css("border", "2px solid darkorchid");
                            $('#signin-msg').css("background-color", "#e2ffff");
                            $('#signin-msg').css("border-radius", "20px");
                            $('#signin-msg').html('SERVER ERROR - NOT SIGNED IN!');
                        }
                    }
                }
            )
        } else {
            $('#signin-msg').waypoint(function (direction) {
                $('#signin-msg').addClass('animated bounceInLeft');

            }, { offset: '50%'

            });
            $('#signin-msg').css("border", "2px solid darkorchid");
            $('#signin-msg').css("background-color", "#e2ffff");
            $('#signin-msg').css("border-radius", "20px");
            $('#signin-msg').html(errorMessage);
        }

    });

});