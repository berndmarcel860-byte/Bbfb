<div class="navbar">
        <div class="logo"><a href="/"><img src="./assets/img/logo.png" alt=""></a></div>
        <div class="menu">
            <a href="/">Home</a>
            <a href="#job-section">Jobs</a>
            <a href="#job-section">Locations</a>
            <a href="#aboutus">About Us</a>
            <span id="loginMenu" onclick="toggleDropdown()">My Career
            <svg height="20" viewBox="0 0 48 48" width="20" xmlns="http://www.w3.org/2000/svg">
    <path d="M14 20l10 10 10-10z" fill="white"/>
    <path d="M0 0h48v48h-48z" fill="none"/>
</svg>

            </span>
            <div class="dropdown" id="dropdown">
                <p><strong>My Career Profile</strong></p>
                <p>You can create a Career Profile to get job suggestions, prepare for the interview process, and more.</p>
                <p><a href="login">Log in</a></p>
                <p><small>Or</small></p>
                <p><a href="createCareer">Create Career Profile</a></p>
            </div>
        </div>
        <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>



    <script>
function toggleMenu() {
    const menu = document.querySelector('.menu');
    const dropdown = document.getElementById('dropdown');
    
    menu.classList.toggle('active'); // Show or hide the menu
    
    // On mobile, ensure the dropdown is always visible under "My Career"
    if (window.innerWidth <= 768) {
        dropdown.classList.add('show'); // Always show the dropdown in mobile
    }
}

function toggleDropdown() {
    // Only toggle the dropdown when in full-screen view (larger screens)
    if (window.innerWidth > 768) {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('show'); // Toggle the dropdown for large screens
    }
}
    </script>
