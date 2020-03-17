/*------------------------------------------------------------
Name: Kendall Shearman
Assignment: Coding Seven
Purpose: MVC Frameworks
Notes: No questions or comments at this time
--------------------------------------------------------------*/

"use strict";

function clearForm() {
    $('#name').val('');
    $('#email').val('');
    $('#reemail').val('');
    $('#subject').val('');
    $('#message').val('');
    $('#msg').html('<br>');
    $('#msg').css("border", "none");
    $('#msg').css("background-color", "white");
}

$(document).ready(function () {

    $("#clear-btn").click(function() {
        clearForm();
    });

    $('#form-submit').click(function () {
        var errorMessage = "";

        var name = $('#name').val().trim();
        var remail1 = $('#email').val().trim();
        var remail2 = $('#reemail').val().trim();
        var subject = $('#subject').val().trim();
        var message = $('#message').val().trim();

        $('#name').val(name);
        $('#email').val(remail1);
        $('#reemail').val(remail2);
        $('#subject').val(subject);
        $('#message').val(message);

        if (name === "") {
            errorMessage += "First name cannot be empty.<br>";
        }

        if (!(validEmail(remail1))) {
            errorMessage += "Please enter a valid email address.<br>";
        }

        if (remail2 !== remail1 || remail2 === "") {
            errorMessage += "Please enter a valid email address that matches.<br>"
        }

        if (subject === "") {
            errorMessage += "Subject cannot be empty.<br>"
        }

        if (message === "") {
            errorMessage += "Message cannot be empty.<br>"
        }

        if (errorMessage.length === 0) {
            $('#msg').html("Sending...");

            $.ajax({
                    url: 'Sendemail/send',
                    type: 'POST',
                    data: {name: name, remail1: remail1, subject: subject, message: message},
                    success: function (val) {
                        if (val === "okay") {
                            clearForm();
                            $('#msg').waypoint(function (direction) {
                                $('#msg').addClass('animated bounceInDown');

                            }, { offset: '50%'

                            });
                            $('#msg').css("border", "2px solid darkorchid");
                            $('#msg').css("background-color", "#e2ffff");
                            $('#msg').css("border-radius", "20px");
                            $('#msg').html('SENT!');

                        } else {
                            $('#msg').waypoint(function (direction) {
                                $('#msg').addClass('animated bounceInDown');

                            }, { offset: '50%'

                            });
                            $('#msg').css("border", "2px solid darkorchid");
                            $('#msg').css("background-color", "#e2ffff");
                            $('#msg').css("border-radius", "20px");
                            $('#msg').html('EMAIL.PHP ERROR - NOT SENT!');
                        }
                    },
                    error: function () {
                        $('#msg').waypoint(function (direction) {
                            $('#msg').addClass('animated bounceInDown');

                        }, { offset: '50%'

                        });
                        $('#msg').css("border", "2px solid darkorchid");
                        $('#msg').css("background-color", "#e2ffff");
                        $('#msg').css("border-radius", "20px");
                        $('#msg').html('SERVER ERROR - NOT SENT!');
                    },
                }
            )
        } else {
            $('#msg').waypoint(function (direction) {
                $('#msg').addClass('animated bounceInLeft');

            }, { offset: '50%'

            });
            $('#msg').css("border", "2px solid darkorchid");
            $('#msg').css("background-color", "#e2ffff");
            $('#msg').css("border-radius", "20px");
            $('#msg').html(errorMessage);
        }

    });

});

function validEmail(email) {
    var re =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

