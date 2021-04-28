'use strict';

// Class Definition
var KTLogin = (function() {
    var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    };

    var _handleSignInForm = function() {
        var validation;
        var form = KTUtil.getById('kt_login_signin_form');
        var formSubmitButton = KTUtil.getById('kt_login_signin_submit');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(KTUtil.getById('kt_login_signin_form'), {
            fields: {
                user_username: {
                    validators: {
                        notEmpty: {
                            message: 'Username is required',
                        },
                    },
                },
                user_password: {
                    validators: {
                        notEmpty: {
                            message: 'Password is required',
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                bootstrap: new FormValidation.plugins.Bootstrap(),
            },
        });

        $('#kt_login_signin_submit').on('click', function(e) {
            e.preventDefault();
            var formData = $(form).serialize();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, 'Please wait');
                    $.ajax({
                        url: 'user_signup.php',
                        method: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(data) {
                            KTUtil.btnRelease(formSubmitButton);
                            if (data.error != '') {
                                swal.fire({
                                    position: 'top-right',
                                    icon: 'error',
                                    title: data.error,
                                    showConfirmButton: false,
                                });
                            } else {
                                swal.fire({
                                    position: 'top-right',
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                });

                                setTimeout(function() {
                                    location.reload(); //Refresh page
                                }, 1500);
                            }
                        },
                    });

                } else {
                    swal.fire({
                        text: 'Sorry, looks like there are some errors detected, please try again.',
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Ok, got it!',
                        customClass: {
                            confirmButton: 'btn font-weight-bold btn-light-primary',
                        },
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Handle forgot button
        $('#kt_login_forgot').on('click', function(e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function(e) {
            e.preventDefault();
            _showForm('signup');
        });
    };

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');
        var formSubmitButton = KTUtil.getById('kt_login_signup_submit');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(form, {
            fields: {
                fullname: {
                    validators: {
                        notEmpty: {
                            message: 'Fullname is required',
                        },
                        stringLength: {
                            min: 5,
                            max: 30,
                            message: 'The fullname must be more than 6 and less than 10 characters long',
                        },
                    },
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email address is required',
                        },
                        emailAddress: {
                            message: 'The value is not a valid email address',
                        },
                    },
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required',
                        },
                        regexp: {
                            regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,15}$/,
                            message: 'Password must be consist at-least one Uppercase, one lowercase and one special character and one number',
                        },
                    },
                },
                cpassword: {
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
                agree: {
                    validators: {
                        notEmpty: {
                            message: 'You must accept the terms and conditions',
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap(),
            },
        });

        $('#kt_login_signup_submit').on('click', function(e) {
            e.preventDefault();
            var formData = $(form).serialize();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, 'Please wait');
                    $.ajax({
                        url: 'user_signup.php',
                        method: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(data) {
                            KTUtil.btnRelease(formSubmitButton);
                            if (data.error != '') {
                                swal.fire({
                                    position: 'top-right',
                                    icon: 'error',
                                    title: data.error,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                _showForm('signin');
                                swal.fire({
                                    position: 'top-right',
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        },
                    });

                } else {
                    swal.fire({
                        text: 'Sorry, looks like there are some errors detected, please try again.',
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Ok, got it!',
                        customClass: {
                            confirmButton: 'btn font-weight-bold btn-light-primary',
                        },
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function(e) {
            e.preventDefault();

            _showForm('signin');
        });
    };

    var _handleForgotForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_forgot_form');
        var formSubmitButton = KTUtil.getById('kt_login_forgot_submit');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(KTUtil.getById('kt_login_forgot_form'), {
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email/Username is required',
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap(),
            },
        });

        // Handle submit button
        $('#kt_login_forgot_submit').on('click', function(e) {
            e.preventDefault();
            var formData = $(form).serialize();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    // Submit form
                    KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, 'Please wait');
                    $.ajax({
                        url: 'user_signup.php',
                        method: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(data) {
                            KTUtil.btnRelease(formSubmitButton);
                            if (data.error != '') {
                                $('#userLogin').modal('hide');
                                swal.fire({
                                    position: 'top-right',
                                    icon: 'error',
                                    title: data.error,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                // _showForm('signin');
                                $('#userLogin').modal('hide');
                                swal.fire({
                                    position: 'top-right',
                                    icon: 'success',
                                    text: data.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        },
                    });

                } else {
                    swal.fire({
                        text: 'Sorry, looks like there are some errors detected, please try again.',
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Ok, got it!',
                        customClass: {
                            confirmButton: 'btn font-weight-bold btn-light-primary',
                        },
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function(e) {
            e.preventDefault();

            _showForm('signin');
        });
    };

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            _handleSignUpForm();
            _handleForgotForm();
        },
    };
})();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});