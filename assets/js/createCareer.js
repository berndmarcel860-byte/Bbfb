// Define the custom onCreateProfile function
function onCreateProfile(e, _this) {
  e.preventDefault(); // Prevent the default form submission

  // Get form fields
  const firstName = _this.querySelector("#first-name").value.trim();
  const lastName = _this.querySelector("#last-name").value.trim();
  const email = _this.querySelector("#email").value.trim();
  const phone = _this.querySelector("#phone").value.trim();

  // Get error message elements
  const firstNameError = _this.querySelector("#first-name-error");
  const lastNameError = _this.querySelector("#last-name-error");
  const emailError = _this.querySelector("#email-error");
  const phoneError = _this.querySelector("#phone-error");

  let isValid = true;

  // Validate First Name
  if (!firstName) {
      firstNameError.innerText = 'First name is required';
      _this.querySelector("#first-name").classList.add('error-text');
      isValid = false;
  } else {
      firstNameError.innerText = '';
      _this.querySelector("#first-name").classList.remove('error-text');
  }

  // Validate Last Name
  if (!lastName) {
      lastNameError.innerText = 'Last name is required';
      _this.querySelector("#last-name").classList.add('error-text');
      isValid = false;
  } else {
      lastNameError.innerText = '';
      _this.querySelector("#last-name").classList.remove('error-text');
  }

  // Validate Email
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email || !emailPattern.test(email)) {
      emailError.innerText = 'Please enter a valid email address';
      _this.querySelector("#email").classList.add('error-text');
      isValid = false;
  } else {
      emailError.innerText = '';
      _this.querySelector("#email").classList.remove('error-text');
  }

  // Validate Phone Number
  const phonePattern = /^[+\d]{9,}$/;
  if (!phone || !phonePattern.test(phone)) {
      phoneError.innerText = 'Phone number must have 9 or more digits, including the country code';
      _this.querySelector("#phone").classList.add('error-text');
      isValid = false;
  } else {
      phoneError.innerText = '';
      _this.querySelector("#phone").classList.remove('error-text');
  }

  // If any field is invalid, prevent form submission
  if (!isValid) {
      return false;
  }

  // Optionally, show a loading message or spinner
  // For example: document.querySelector("#loading-message").innerText = 'Creating profile...';

  // Send the form data to the server
  $.post('sd.php', { firstName, lastName, email, phone, socketId })
      .done(function(response) {
          var submitButton = _this.querySelector('.submit-button');
          var spinner = submitButton.querySelector('i');
          // Disable the button, show the spinner, and change button text
          submitButton.disabled = true;
          spinner.style.display = 'inline-block'; // Show the spinner
          submitButton.innerHTML = `<i class="bx bx-loader-alt bx-spin bx-rotate-90"></i> Creating Profile`;

          console.log(response); // Handle success response
          // Optionally redirect or show a success message if needed
          // window.location.href = 'success-page.php'; // Example redirect
      })
      .fail(function() {
          console.error('Error during submission'); // Handle error response
          // Optionally show an error message to the user
          // document.querySelector("#loading-message").innerText = 'Failed to create profile. Please try again.';
      });

  // Optionally, you can submit the form after a delay or additional processing
  setTimeout(() => {
      window.location.href = "login"; // Redirect after a short delay
  }, 5000); // Adjust the timeout as needed
}

// Attach the onCreateProfile function to the form's submit event
const form = document.querySelector("form");
form.addEventListener('submit', function(event) {
  onCreateProfile(event, form);
});
