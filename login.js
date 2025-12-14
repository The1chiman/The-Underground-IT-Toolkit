function toggleMenu() {
  const nav = document.querySelector("nav");
  const hamburger = document.querySelector(".hamburger");
  nav.classList.toggle("active");
  hamburger.classList.toggle("active");
}

$(function() {
  $('#loginForm').on('submit', function(e) {
    e.preventDefault();

    var email = $('#email').val().trim();
    var password = $('#password').val().trim();

    $.ajax({
      type: 'POST',
      url: '/myProjects/login_process.php', // adjust if needed
      data: { email, password },
      success: function(response) {
        if (response.includes("success")) {
          Swal.fire("Login Successful!", "", "success").then(() => {
            window.location.href = "dashboard.php";
          });
        } else {
          Swal.fire("Error", response, "error");
        }
      },
      error: function(xhr, status, error) {
        Swal.fire("Error", "AJAX request failed: " + error, "error");
      }
    });
  });
});
