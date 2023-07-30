$(document).ready(function () {

    jQuery.validator.addMethod("emailExt", function(value, element, param) {
        return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
    });

    jQuery.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
     });

    $("#form").validate({

        errorPlacement: function(error, element) {
            if (element.attr('type') == 'radio' || element.attr('type') == 'checkbox') {
                error.appendTo(element.closest('.form-group'));
            } else {
                error.insertAfter(element);
            }
        },
        //errorElement: 'div',
        // Define validation rules
        rules: {
            fname : {
                required: true,
                minlength: 3
            },
            lname : {
                required:true,
                minlength: 3
            },
            email: {
                required: true,
                emailExt: true,
            },
               
            password: {
                required: true,
                pwcheck: true
            },  

            cpassword: {
                required: true,
                equalTo: "#password"
            }
        },
        
        // Specify validation error messages
        messages: {
            fname: {
                required: "Please enter your first name",
                minlength: "Name should be at least 3 characters"
            },

            lname: {
                required: "Please enter your last name",
                minlength: "Name should be at least 3 characters"
            },
        
            email: {
                required: "Please enter your Email address",
                emailExt: "The email should be in the format: abc@domain.tld", 
                //remote:   "Email already registered"
            },

            password: {
                required: "Please enter your required password",
                pwcheck: "Enter a password with atleast one lower case letter and a numeric digit "
            },

            cpassword: {
                required: "Please confirm your password",
                equalTo: "This does not match the password entered"
            }
            
        },
    });  
}); 
/* $('#submit').click(function(){
    $('#form').valid();
});

$(document).ready(function() {
    $("#form").validate();
});*/