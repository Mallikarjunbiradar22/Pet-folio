document.addEventListener('DOMContentLoaded', () => {
    console.log('Explore page JavaScript loaded successfully.');

    // Add smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', event => {
            if (link.getAttribute('href').startsWith('#')) {
                event.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
});
