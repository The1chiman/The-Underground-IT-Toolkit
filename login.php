<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | The Underground IT Toolkit</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="top">
      <h1>The Underground IT Toolkit</h1>
      <nav>
        <a href="index.html">Home</a>
        <a href="resources.html">Resources</a>
        <a href="dashboard.html">Dashboard</a>
        <a href="topics.html">Topics</a>
        <a href="about.html">About</a>
        <a href="login.php">Login</a>
      </nav>
    </div>
  <section class="form-section">
    <h2>Log In</h2>
    <form action="login.php" method="post">
      <label for="email">Email Address:</label>
      <input type="email" required name="email">
      <label for="password">Password:</label>
      <input type="password" required name="password">
      <input type="submit" class="btn btn-primary w-100" value="Login" id= "login" name="button">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
  </section>

  <script>
document.querySelectorAll("a").forEach(link => {
  link.addEventListener("click", e => {
    const href = link.getAttribute("href");
    if (href && !href.startsWith("#")) {
      e.preventDefault();
      document.body.style.animation = "fadeOut 0.4s ease-in forwards";
      setTimeout(() => window.location.href = href, 400);
    }
  });
});
</script>
<script>
  $(function()){
    $('#login').click(function(e)){
      alert('working');
    }
  }
</script>
    <footer>
      <p>© 2025 The Underground IT Toolkit. All rights reserved.</p>
    </footer>
</body>
</html>