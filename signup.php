<?php 
require_once('config.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up | The Underground IT Toolkit</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <?php 
        
        ?>
    </div>

    <div class="top">
      <h1>The Underground IT Toolkit</h1>
      <nav>
        <a href="index.html">Home</a>
        <a href="resources.html">Resources</a>
        <a href="dashboard.html">Dashboard</a>
        <a href="topics.html">Topics</a>
        <a href="about.html">About</a>
        <a href="login.html">Login</a>
      </nav>
    </div> 
  <section class="form-section">
    <h2>Create an Account</h2>
    <form action="signup.php" method="post">
                <div class = "col"> 
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="conPassword">Confirm Password:</label>
                <input type="password" id="conPassword" name="conPassword" required>

                <input type="submit" class="btn btn-primary" value="Sign up" name="create" id="register"></div>
</form>

      <p>Already have an account? <a href="login.php">Sign in</a></p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function(e){
            
            var valid = this.form.checkValidity();

            var fullName    = $('#fullName').val();
            var email       = $('#email').val();
            var password    = $('#password').val();

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
                                  window.location.href = 'login.php'; // ✅ redirect after OK
                              }
                        });
                    },
                    error: function(data){
                        Swal.fire({
                            title: 'Error!',
                            text : 'There was an error while registering.',
                            icon : 'error'
                            })    
                    }
                });

                
            }
            else{
                
            }

            


        });
        
    });
</script> 
    <footer>
      <p>© 2025 The Underground IT Toolkit. All rights reserved.</p>
    </footer>
</body>
</html>