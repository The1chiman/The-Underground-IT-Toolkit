<?php 
session_start();
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up | The Underground IT Toolkit</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
  <div class="top">
    <a href="index.php" class="logo"><h1>The Underground IT Toolkit</h1></a>
    <button class="hamburger" onclick="toggleMenu()">☰</button>
    <nav>
      <a href="index.php">Home</a>
      <a href="resources.php">Resources</a>
      <a href="dashboard.php">Dashboard</a>
      <a href="topics.php">Topics</a>
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
      <h2>Create Your Account</h2>
      <p class="form-subtitle">Join the IT learning community</p>
      <form id="signupForm">
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="conPassword">Confirm Password:</label>
        <input type="password" id="conPassword" name="conPassword" required>

        <button class="btn-signin" type="submit" id="register">Sign Up</button>
      </form>
      <div class="form-footer">
        <p>Already have an account?<br><a href="login.php" class="signup-link">Sign in</a></p>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-left">
      <p>© 2025 The Underground IT Toolkit. All rights reserved.</p>
    </div>
    <div class="footer-nav">
      <a href="index.php">Home</a>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    $(function(){
      $('#register').click(function(e){
        var valid = this.form.checkValidity();
        var fullName = $('#fullName').val();
        var email    = $('#email').val();
        var password = $('#password').val();

        if(valid){
          e.preventDefault();
          $.ajax({
            type:'POST',
            url: 'process.php',
            data: {fullName:fullName,email:email,password:password},
            success: function(data){
              Swal.fire({
                title: 'Success!',
                text: data,
                icon: 'success',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = 'login.php';
                }
              });
            },
            error: function(){
              Swal.fire({
                title: 'Error!',
                text : 'There was an error while registering.',
                icon : 'error'
              })    
            }
          });
        }
      });
    });
  </script>
  <script src="signup.js"></script>
</body>
</html>
