// JavaScript for Explore Page - explore.js

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

    // Handle dynamic interactions
    const factCards = document.querySelectorAll('.explore-content .card');
    factCards.forEach(card => {
        card.addEventListener('click', () => {
            alert(`Learn more about: ${card.querySelector('h2').textContent}`);
        });
    });
    
    


    // Interaction for famous pet lovers
    const famousPetCards = document.querySelectorAll('.famous-pet-lovers .card');
    famousPetCards.forEach(card => {
        card.addEventListener('click', () => {
            const name = card.querySelector('h3').textContent;
            const fact = card.querySelector('p').textContent;
            alert(`${name} - ${fact}`);
        });
    });

    // CTA Button Event
    const ctaButton = document.querySelector('.cta-button');
    if (ctaButton) {
        ctaButton.addEventListener('click', () => {
            window.location.href = 'login.html';
        });
    }
});
