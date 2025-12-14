function toggleMenu() {
  const nav = document.querySelector("nav");
  const hamburger = document.querySelector(".hamburger");
  nav.classList.toggle("active");
  hamburger.classList.toggle("active");
}

$(function() {
  $('#signupForm').on('submit', function(e) {
    e.preventDefault(); // stop normal form submission

    var fullName = $('#fullName').val().trim();
    var email = $('#email').val().trim();
    var password = $('#password').val().trim();
    var conPassword = $('#conPassword').val().trim();

    if (password !== conPassword) {
      Swal.fire("Error", "Passwords do not match!", "error");
      return;
    }

    $.ajax({
      type: 'POST',
      url: '/myProjects/process.php',
      data: { fullName, email, password },
      success: function(response) {
        Swal.fire({
          title: 'Response',
          text: response,
          icon: response.includes("Successful") ? 'success' : 'error',
          confirmButtonText: 'OK'
        }).then(() => {
          if (response.includes("Successful")) {
            window.location.href = 'login.html';
          }
        });
      },
      error: function(xhr, status, error) {
        Swal.fire("Error", "AJAX request failed: " + error, "error");
      }
    });
  });
});
