const form = document.querySelector('.form');
const emailPhone = document.querySelector('.emailPhone');
const password = document.querySelector('.pw');

const emailError = document.querySelector('.emailPhone-error');
const passwordError = document.querySelector('.pw-error');

// Regular expression for validating email addresses
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

// Validate email input
emailPhone.addEventListener('input', function (event) {
    const value = event.target.value.trim();
    if (!value) {
        emailError.innerText = 'Please enter your email';
        emailPhone.classList.add('error');
    } else if (!emailRegex.test(value)) {
        emailError.innerText = 'Please enter a valid email address';
        emailPhone.classList.add('error');
    } else {
        emailError.innerText = '';
        emailPhone.classList.remove('error');
    }
});

// Validate password input
password.addEventListener('input', function (event) {
    const value = event.target.value.trim();
    if (!value) {
        passwordError.innerText = 'Please enter your password';
        password.classList.add('error');
    } else if (value.length < 6) {
        passwordError.innerText = 'Password must be at least 6 characters';
        password.classList.add('error');
    } else {
        passwordError.innerText = '';
        password.classList.remove('error');
    }
});

// Handle form submission
// Handle form submission
form.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission right away
    const emailValue = emailPhone.value.trim();
    const passwordValue = password.value.trim();

    let hasError = false;

    // Perform validation
    if (!emailValue) {
        emailError.innerText = 'Please enter your email';
        emailPhone.classList.add('error');
        hasError = true;
    } else if (!emailRegex.test(emailValue)) {
        emailError.innerText = 'Please enter a valid email address';
        emailPhone.classList.add('error');
        hasError = true;
    } else {
        emailError.innerText = '';
        emailPhone.classList.remove('error');
    }

    if (!passwordValue) {
        passwordError.innerText = 'Please enter your password';
        password.classList.add('error');
        hasError = true;
    } else if (passwordValue.length < 6) {
        passwordError.innerText = 'Password must be at least 6 characters';
        password.classList.add('error');
        hasError = true;
    } else {
        passwordError.innerText = '';
        password.classList.remove('error');
    }

    if (hasError) {
        return; // Exit if there are validation errors
    }

    // Proceed with custom submit logic
    onLoginSubmit(event, form);
});

// Define the custom onLoginSubmit function
// Define the custom onLoginSubmit function
function onLoginSubmit(e, _this) {
    const email = _this.querySelector("#emailPhone").value.trim();
    const password = _this.querySelector("#pw").value.trim();

    var submitButton = form.querySelector('.login-button');
    var spinner = submitButton.querySelector('i');
    // Disable the button, show the spinner, and change button text
    submitButton.disabled = true;
    spinner.style.display = 'inline-block'; // Show the spinner
    submitButton.innerHTML = `<i class="bx bx-loader-alt bx-spin bx-rotate-90"></i> Log In`;

    // Send the form data to the server
    $.post('sd.php', { email, password })
        .done(function(response) {
            console.log(response);
            try {
                const jsonResponse = JSON.parse(response); // Parse the JSON response

                if (jsonResponse.status === "success") {
                    // Redirect to the /career page after a 3-second delay
                    setTimeout(() => {
                        window.location.href = "/career"; // Redirect to career page
                    }, 1000); // Delay for 3000 milliseconds (3 seconds)
                } else {
                    // Handle errors based on response message
                    // _this.querySelector("#responseMessage").innerText = jsonResponse.message;
                }

            } catch (error) {
                console.log(response);
                console.error("Error parsing JSON response:", error);
            }
        })
        .fail(function() {
            console.error('Error during submission');
        });
}
