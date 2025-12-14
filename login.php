<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | The Underground IT Toolkit</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="top">
    <a href="index.php" class="logo"><h1>The Underground IT Toolkit</h1></a>
    <button class="hamburger" onclick="toggleMenu()">☰</button>
    <nav>
      <a href="home.php">Home</a>
      <a href="resources.php">Resources</a>
      <a href="dashboard.php">Dashboard</a>
      <a href="about.php">About</a>
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </nav>
  </div>

  <section class="form-container">
    <div class="form-box">
      <h2>Welcome Back</h2>
      <p class="form-subtitle">Sign-in to continue your journey</p>
      <form id="loginForm">
        <label>Email Address:</label>
        <input type="email" name="email" id="email" required>
        <label>Password:</label>
        <input type="password" name="password" id="password" required>
        <button class="btn-signin" type="submit">Sign-in</button>
      </form>
      <div class="form-footer">
        <p>Don't have an account?<br><a href="signup.php" class="signup-link">Sign-up</a></p>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-left">
      <p>© 2025 The Underground IT Toolkit. All rights reserved.</p>
    </div>
    <div class="footer-nav">
      <a href="home.php">Home</a>
      <a href="resources.php">Resources</a>
      <a href="dashboard.php">Dashboard</a>
      <a href="about.php">About</a>
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </div>
  </footer>

  <!-- Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="login.js"></script>
</body>
</html>
