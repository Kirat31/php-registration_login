$(document).ready(function (){

    jQuery.validator.addMethod("emailExt", function(value, element, param) {
        return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
    });

    jQuery.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                && /[a-z]/.test(value) // has a lowercase letter
                && /\d/.test(value) // has a digit
    });

    $("#form").validate({
        rules: {
            email: {
                required: true,
                emailExt: true
            },     
            password: {
                required: true,
                pwcheck: true
            }
        },
        messages: {
            email: {
                required: "Please enter your mail address",
                emailExt: "The email should be in the format: abc@domain.tld"
            },
            password: {
                required: "Please enter your password",
                pwcheck: "Enter a password with atleast onle lower case letter and a numeric digit "
            }
        }
    });
        
});