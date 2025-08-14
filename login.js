// Toggle between login and signup forms
function toggleForm(formType) {
  if (formType === 'signup') {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('signupForm').style.display = 'block';
  } else {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('signupForm').style.display = 'none';
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";
  const loginRegisterLink = document.querySelector(".active");

  if (isLoggedIn) {
    loginRegisterLink.style.display = "none";

    // Add Logout option
    const navBar = document.querySelector("nav ul");
    const logoutItem = document.createElement("li");
    logoutItem.innerHTML = '<a href="#" onclick="logoutUser()">Logout</a>';
    navBar.appendChild(logoutItem);
  }
});

// Function to handle user login
function loginUser() {
  localStorage.setItem("isLoggedIn", "true");
  location.reload();
}

// Function to handle user logout
function logoutUser() {
  localStorage.setItem("isLoggedIn", "false");
  location.reload();
}

// Form validation logic
function validateEmail(email) {
  // Regex for email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function validatePassword(password) {
  // Regex for password validation
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  return passwordRegex.test(password);
}

// Attach validation for signup form
document.addEventListener("DOMContentLoaded", () => {
  const signupForm = document.getElementById("signupForm");
  const signupEmail = document.getElementById("signupEmail");
  const signupPassword = document.getElementById("signupPassword");

  signupForm.addEventListener("submit", (event) => {
    if (!validateEmail(signupEmail.value)) {
      event.preventDefault(); // Prevent form submission
      alert("Please enter a valid email address.");
      signupEmail.focus();
      return;
    }

    if (!validatePassword(signupPassword.value)) {
      event.preventDefault(); // Prevent form submission
      alert(
        "Password must be at least 8 characters long and include at least one special character, one number, and one alphabet."
      );
      signupPassword.focus();
      return;
    }
  });
});

// Attach validation for login form
document.addEventListener("DOMContentLoaded", () => {
  const loginForm = document.getElementById("loginForm");
  const loginEmail = document.getElementById("loginEmail");
  const loginPassword = document.getElementById("loginPassword");

  loginForm.addEventListener("submit", (event) => {
    if (!validateEmail(loginEmail.value)) {
      event.preventDefault(); // Prevent form submission
      alert("Please enter a valid email address.");
      loginEmail.focus();
      return;
    }

    if (!validatePassword(loginPassword.value)) {
      event.preventDefault(); // Prevent form submission
      alert(
        "Password must be at least 8 characters long and include at least one special character, one number, and one alphabet."
      );
      loginPassword.focus();
      return;
    }
  });
});
