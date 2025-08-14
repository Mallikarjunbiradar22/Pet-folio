// JavaScript file for User-Specific Pet-Folio (user.js)

// Placeholder functions for button actions
document.addEventListener('DOMContentLoaded', () => {
    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('nav a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();
            const targetId = link.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
    
    // Profile Dropdown Logic
    const profileDropdown = document.querySelector('.profile-dropdown');
    const dropdownMenu = profileDropdown.querySelector('.dropdown-menu');

    profileDropdown.addEventListener('click', (event) => {
        event.stopPropagation();
        const isMenuVisible = dropdownMenu.style.display === 'block';
        dropdownMenu.style.display = isMenuVisible ? 'none' : 'block';
    });

    // Close the dropdown menu when clicking outside
    document.addEventListener('click', () => {
        dropdownMenu.style.display = 'none';
    });

    console.log('User-Specific Pet-Folio JavaScript loaded successfully!');
});
document.addEventListener('DOMContentLoaded', () => {
    // Explore More Button
    window.explorePets = function() {
        // Redirect to the Explore page
        window.location.href = 'explore1.html';
    };

    // Join Community Button
    window.joinCommunity = function() {
        // Redirect to the community page
        window.location.href = 'communitylogin1.html';
    }});

// Function to fetch user data (mockup)
function loadUserProfile() {
    // This is a placeholder; replace with actual data fetching logic.
    const userDetails = {
        name: 'John Doe',
        email: 'john.doe@example.com',
    };

    const profileDetails = document.querySelector('.profile-details');
    if (profileDetails) {
        profileDetails.innerHTML = `
            <p><strong>Name:</strong> ${userDetails.name}</p>
            <p><strong>Email:</strong> ${userDetails.email}</p>
        `;
    }
}

// Function for logging out the user
function logoutUser() {
    alert('You have been logged out successfully!');
    // Implement actual logout logic here, e.g., clearing tokens, redirecting to login page
    window.location.href = 'index.html';
}

// Call the function to load user profile on page load
loadUserProfile();
