"use strict";

// Class definition
var KTModalCreateProjectFiles = function () {
	// Variables
	var nextButton;
	var previousButton;
	var form;
	var stepper;

	// Private functions
	var initForm = function() {
		// Project logo

	}

	var handleForm = function() {
		nextButton.addEventListener('click', function (e) {
			// Prevent default button action
			e.preventDefault();

			// Disable button to avoid multiple click
			nextButton.disabled = true;

			// Show loading indication
			nextButton.setAttribute('data-kt-indicator', 'on');

			// Simulate form submission
			setTimeout(function() {
				// Hide loading indication
				nextButton.removeAttribute('data-kt-indicator');

				// Enable button
				nextButton.disabled = false;

				// Go to next step
				stepper.goNext();
			}, 1500);
		});

		previousButton.addEventListener('click', function () {
			stepper.goPrevious();
		});
	}

	return {
		// Public functions
		init: function () {
			form = KTModalCreateProject.getForm();
			stepper = KTModalCreateProject.getStepperObj();
			nextButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element="files-next"]');
			previousButton = KTModalCreateProject.getStepper().querySelector('[data-kt-element="files-previous"]');

			initForm();
			handleForm();
		}
	};
}();

// Webpack support
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
	window.KTModalCreateProjectFiles = module.exports = KTModalCreateProjectFiles;
}
