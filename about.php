<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About | The Underground IT Toolkit</title>
    <link rel="stylesheet" href="about.css" />
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

    <div class="upper">
      <h2 class="title-upper">About The Underground IT Toolkit</h2>
      <p class="p-upper">Empowering IT students and enthusiasts to bridge the gap between academic theory and real-world practice.</p>
    </div>

    <section class="mission-section">
      <div class="mission-content">
        <h3>Our Mission</h3>
        <p>
          The Underground IT Toolkit was created to address a critical gap in IT education. While academic programs provide essential theoretical foundations, many students struggle to apply these concepts in real-world scenarios.
        </p>
        <p>
          We bridge this gap by offering hands-on learning resources, practical guides, and collaborative tools that mirror actual industry workflows. Our platform covers everything from GitHub fundamentals to advanced debugging techniques, cloud deployment strategies, and essential soft skills.
        </p>
        <p>
          Whether you're a student, self-taught developer, or IT professional looking to expand your skillset, we're here to support your learning journey every step of the way.
        </p>
      </div>
      <div class="mission-image">
        <img src="about_logo.png" alt="Underground IT Toolkit Logo" />
      </div>
    </section>

    <div class="members">
      <h3>Meet the Team</h3>
      <div class="member-cards">
        <div class="member-card">
          <img src="member1.webp" alt="John Carlo M. Antonio" />
          <h4>John Carlo M. Antonio</h4>
          <p>Founder & Lead Developer</p>
        </div>
        <div class="member-card">
          <img src="member2.webp" alt="Ace D. Florida" />
          <h4>Ace D. Florida</h4>
          <p>Content Strategist</p>
        </div>
        <div class="member-card">
          <img src="member3.webp" alt="Christian Paul T. Nunag" />
          <h4>Christian Paul T. Nunag</h4>
          <p>UI/UX Designer</p>
        </div>
        <div class="member-card">
          <img src="member4.webp" alt="RJ Rianne M. Neri" />
          <h4>RJ Rianne M. Neri</h4>
          <p>Backend Engineer</p>
        </div>
        <div class="member-card">
          <img src="member5.webp" alt="Arizza Camille J. Castro" />
          <h4>Arizza Camille J. Castro</h4>
          <p>Frontend Developer</p>
        </div>
        <div class="member-card">
          <img src="member6.webp" alt="Euan David C. Cervantes" />
          <h4>Euan David C. Cervantes</h4>
          <p>QA Specialist</p>
        </div>
      </div>
    </div>

    <footer>
      <div class="footer-left">
        <p>© 2025 The Underground IT Toolkit. All rights reserved.</p>
      </div>
      <div class="footer-right">
        <nav class="footer-nav" aria-label="footer navigation">
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
    </footer>

    <script src="about.js"></script>
  </body>
</html>
