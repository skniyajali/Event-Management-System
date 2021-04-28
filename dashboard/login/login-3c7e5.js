'use strict';

// Class Definition
var KTLogin = (function () {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _handleFormSignin = function () {
		var form = KTUtil.getById('kt_login_singin_form');
		var formSubmitButton = KTUtil.getById('kt_login_singin_form_submit_button');

		if (!form) {
			return;
		}

		FormValidation.formValidation(form, {
			fields: {
				user_password: {
					validators: {
						notEmpty: {
							message: 'Password is required',
						},
						regexp: {
							regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,15}$/,
							message:
								'Password must be consist at-least one Uppercase, one lowercase and one special character and one number',
						},
					},
				},
				confirm_password: {
					validators: {
						notEmpty: {
							message: 'Confirm your password',
						},
						identical: {
							compare: function () {
								return form.querySelector('[name="user_password"]').value;
							},
							message: 'The password and its confirm are not the same',
						},
					},
				},
			},
			plugins: {
				trigger: new FormValidation.plugins.Trigger(),
				submitButton: new FormValidation.plugins.SubmitButton(),
				//defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
				bootstrap: new FormValidation.plugins.Bootstrap({
					// eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
					// eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
				}),
				icon: new FormValidation.plugins.Icon({
					valid: 'fa fa-check',
					invalid: 'fa fa-times',
					validating: 'fa fa-refresh',
				}),
			},
		})
			.on('core.form.valid', function () {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, 'Please wait');

				// Form Validation & Ajax Submission: https://formvalidation.io/guide/examples/using-ajax-to-submit-the-form

				FormValidation.utils
					.fetch('user_signup.php', {
						method: 'POST',
						dataType: 'json',
						params: {
							password: form.querySelector('[name="user_password"]').value,
							passkey: form.querySelector('[name="_passkey"]').value,
							token: form.querySelector('[name="_token"]').value,
							hash: form.querySelector('[name="_hash"]').value,
							_reset: form.querySelector('[name="_reset"]').value,
						},
					})
					.then(function (data) {
						// Return valid JSON
						// Release button
						KTUtil.btnRelease(formSubmitButton);
						if (data.error != '') {
							Swal.fire({
								icon: 'error',
								title: data.error,
								showConfirmButton: false,
							}).then(function () {
								KTUtil.scrollTop();
							});
						} else {
							Swal.fire({
								icon: 'success',
								title: data.message,
								showConfirmButton: false,
							});
							
						
						}
					});
			})
			.on('core.form.invalid', function () {
				Swal.fire({
					text: 'Sorry, looks like there are some errors detected, please try again.',
					icon: 'error',
					buttonsStyling: false,
					confirmButtonText: 'Ok, got it!',
					customClass: {
						confirmButton: 'btn font-weight-bold btn-light-primary',
					},
				}).then(function () {
					KTUtil.scrollTop();
				});
			});
	};

	// Public Functions
	return {
		init: function () {
			_handleFormSignin();
		},
	};
})();

// Class Initialization
jQuery(document).ready(function () {
	KTLogin.init();
});
