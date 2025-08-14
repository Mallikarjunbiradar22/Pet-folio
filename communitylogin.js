document.addEventListener('DOMContentLoaded', () => {
  const loginBtn = document.getElementById('login-btn');
  const signupBtn = document.getElementById('signup-btn');

  // Redirect to Login Page
  loginBtn.addEventListener('click', () => {
    document.body.innerHTML = `
      <main>
        <div class="container">
          <h1>Login</h1>
          <form action="communitylogin.php" method="POST" class="login-form">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <button type="submit">Login</button>
          </form>
        </div>
      </main>
    `;
  });

  // Redirect to Signup Page
  signupBtn.addEventListener('click', () => {
    window.location.href = "community.html";
  });
});
