$(document).ready(function () {

    $("#addStudent, #editStudent").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            last_name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            school_name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            age: {
                required: true,
                number: true,
                maxlength: 3
            },
            email: {
                required: true,
                email: true,
                maxlength: 50
            }

        },

        messages: {
            first_name: {
                required: "Please Enter Your First Name"
            },
            last_name: {
                required: "Please Enter Your Last Name"
            },
            school_name: {
                required: "Please Enter Your School Name"
            },
            age: {
                required: "Please Enter Your Age"
            },
            email: {
                required: "Please Enter Your Email",
                email: "Please Enter Valid Email Address.",
            }
        }
    });

});

