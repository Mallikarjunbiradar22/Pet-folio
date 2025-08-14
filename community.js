document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector(".registration-form");

  form.addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent default form submission for client-side validation

    // Get form data
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const address = document.getElementById('address').value;
    const mobile = document.getElementById('mobile').value;
    const experience = document.getElementById('experience').value;
    const role = document.querySelector('input[name="role"]:checked');

    // Validate the form fields
    if (name === "" || email === "" || password === "" || confirmPassword === "" || address === "" || mobile === "" || experience === "" || !role) {
      alert("All fields are required. Please fill them in.");
      return;
    }

    // Validate password length (at least 8 characters)
    if (password.length < 8) {
      alert("Password must be at least 8 characters long.");
      return;
    }

    // Check if password and confirm password match
    if (password !== confirmPassword) {
      alert("Passwords do not match. Please re-enter your passwords.");
      return;
    }

    // Validate mobile number format (example: 10-digit number)
    const mobileRegex = /^\d{10}$/;
    if (!mobile.match(mobileRegex)) {
      alert("Please enter a valid 10-digit mobile number.");
      return;
    }

    // If everything is valid, allow the form to submit
    form.submit(); // Submit the form to the server
  });
});
