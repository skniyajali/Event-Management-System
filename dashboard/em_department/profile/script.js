document.addEventListener("DOMContentLoaded", function(e) {
    var demoForm = document.getElementById("department_form");

    // Get the submit button element
    var submitButton = demoForm.querySelector('[type="submit"]');

    FormValidation.formValidation(demoForm, {
        fields: {
            ett_name: {
                validators: {
                    notEmpty: {
                        message: 'Faculty name is required',
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                        message: 'The fullname must be more than 6 and less than 10 characters long',
                    },
                },
            },
            ett_role: {
                validators: {
                    notEmpty: {
                        message: 'Faculty Role is required',
                    }
                },
            },
            ett_phone: {
                validators: {
                    notEmpty: {
                        message: 'Faculty Phone No is required',
                    }
                },
            },
            ett_dept: {
                validators: {
                    notEmpty: {
                        message: 'Faculty Department is required',
                    },
                },
            },
            ett_des: {
                validators: {
                    notEmpty: {
                        message: 'Faculty Designation is required',
                    }
                },
            },
            ett_qua: {
                validators: {
                    notEmpty: {
                        message: 'Faculty Qualification is required',
                    }
                },
            },
            ett_location: {
                validators: {
                    notEmpty: {
                        message: 'Faculty Address is required',
                    },
                },
            },
            ett_email: {
                validators: {
                    notEmpty: {
                        message: "Email is required",
                    },
                    emailAddress: {
                        message: "The value is not a valid email address",
                    },
                },
            },
            ett_username: {
                validators: {
                    notEmpty: {
                        message: "Please Enter Username",
                    },
                    stringLength: {
                        min: 6,
                        max: 10,
                        message: "The username must be more than 6 and less than 10 characters long",
                    },
                    regexp: {
                        regexp: /^[a-zA-Z](([\._\-][a-zA-Z0-9])|[a-zA-Z0-9])*[a-z0-9].{6,10}$/,
                        message: "Username Must be case sensitive nd it must be consist with Uppercase,Lowercase,Special character and Number",
                    },
                },
            },
            ett_password: {
                validators: {
                    stringLength: {
                        min: 8,
                        max: 15,
                        message: "The Password must be more than 8 and less than 15 characters long",
                    },
                    regexp: {
                        regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,15}$/,
                        message: "Password must be consist at-least one Uppercase, one lowercase and one special character nd one number",
                    },
                },
            },
            ett_cpassword: {
                validators: {
                    notEmpty: {
                        message: 'The password confirmation is required',
                    },
                    identical: {
                        compare: function() {
                            return form.querySelector('[name="password"]').value;
                        },
                        message: 'The password and its confirm are not the same',
                    },
                },
            },
            ett_passkey: {
                validators: {
                    notEmpty: {
                        message: 'Please Generate Faculty Passkey',
                    }
                },
            },
            ett_hash: {
                validators: {
                    notEmpty: {
                        message: 'Please Generate Faculty Token',
                    }
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            // Bootstrap Framework Integration
            bootstrap: new FormValidation.plugins.Bootstrap(),
            fieldStatus: new FormValidation.plugins.FieldStatus({
                onStatusChanged: function(areFieldsValid) {
                    areFieldsValid ? submitButton.removeAttribute("disabled") : submitButton.setAttribute("disabled", "disabled");
                },
            }),
        },
    });
});