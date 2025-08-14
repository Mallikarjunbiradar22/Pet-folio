// JavaScript file for Pet-Folio (pet.js)

// Placeholder functions for button actions
document.addEventListener('DOMContentLoaded', () => {
    // Explore More Button
    window.explorePets = function() {
        // Redirect to the Explore page
        window.location.href = 'explore.html';
    };

    // Join Community Button
    window.joinCommunity = function() {
        // Redirect to the community page
        window.location.href = 'communitylogin1.html';
    };

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

    console.log('Pet-Folio JavaScript loaded successfully!');
});

