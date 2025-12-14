<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning | The Underground IT Toolkit</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="learning.css">
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

  <section class="content">
    <h2>Learning Materials</h2>
    <p class="main-description">This subject has 4 parts. Each card contributes 25% to your progress.</p>

    <div id="subject-progress">Progress: 0%</div>

    <div class="card learning-block" data-subject-id="201" data-card-id="1">
      <h3>Part 1</h3>
      <p>Placeholder content for part 1.</p>
      <button class="mark-done-btn">Mark as Done</button>
    </div>

    <div class="card learning-block" data-subject-id="201" data-card-id="2">
      <h3>Part 2</h3>
      <p>Placeholder content for part 2.</p>
      <button class="mark-done-btn">Mark as Done</button>
    </div>

    <div class="card learning-block" data-subject-id="201" data-card-id="3">
      <h3>Part 3</h3>
      <p>Placeholder content for part 3.</p>
      <button class="mark-done-btn">Mark as Done</button>
    </div>

    <div class="card learning-block" data-subject-id="201" data-card-id="4">
      <h3>Part 4</h3>
      <p>Placeholder content for part 4.</p>
      <button class="mark-done-btn">Mark as Done</button>
    </div>
  </section>

  <footer>
    <p>© 2025 The Underground IT Toolkit. All rights reserved.</p>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="learning.js"></script>
</body>
</html>
