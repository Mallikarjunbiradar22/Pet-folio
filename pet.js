function explorePets() {
    alert("Explore pets section is under development!");
}

function joinCommunity() {
    alert("Join our community section is under development!");
}

// Scroll-to-section functionality for smooth navigation
document.querySelectorAll("nav ul li a").forEach(anchor => {
    anchor.addEventListener("click", function(e) {
        e.preventDefault();
        const section = document.querySelector(this.getAttribute("href"));
        section.scrollIntoView({ behavior: "smooth" });
    });
});
