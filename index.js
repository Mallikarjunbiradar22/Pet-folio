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
