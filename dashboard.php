<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once('config.php');

$user_id = $_SESSION['user_id'];
$fullName = $_SESSION['fullName'];

// Define subjects (each subject has 4 cards/parts)
$subjects = [
  ['id' => 201, 'title' => 'GitHub Basics'],
  ['id' => 202, 'title' => 'Advanced Debugging'],
  ['id' => 203, 'title' => 'Cloud Deployment'],
  ['id' => 204, 'title' => 'Team Collaboration'],
  ['id' => 205, 'title' => 'Database Design'],
  ['id' => 206, 'title' => 'Clean Code Practices'],
  ['id' => 207, 'title' => 'Command Line Mastery'],
  ['id' => 208, 'title' => 'Documentation Best Practices']
];

// Fetch progress for this user
$progressData = [];
$stmt = $db->prepare("SELECT subject_id, card_id, done FROM user_progress WHERE user_id = :user_id");
$stmt->execute([':user_id' => $user_id]);
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $progressData[$row['subject_id']][$row['card_id']] = $row['done'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | The Underground IT Toolkit</title>
  <link rel="stylesheet" href="dashboard.css" />
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

  <div class="user-section">
    <div class="user-avatar">👤</div>
    <div class="user-info">
      <h2>Welcome, <?php echo htmlspecialchars($fullName); ?>!</h2>
      <p>Continue your learning journey and reach your goals.</p>
    </div>
  </div>

  <section class="progress-container">
    <h3>Your Progress</h3>
    <p class="progress-subtitle">Track your learning journey across different courses</p>

    <div class="progress-cards">
      <?php foreach ($subjects as $s): 
        $completedCards = isset($progressData[$s['id']]) ? array_sum($progressData[$s['id']]) : 0;
        $progress = ($completedCards / 4) * 100;
      ?>
      <div class="progress-card">
        <div class="course-name"><?= htmlspecialchars($s['title']); ?></div>
        <div class="progress-bar">
          <div class="progress-fill" style="width: <?= $progress ?>%;"></div>
        </div>
        <div class="progress-percent"><?= $progress ?>%</div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <script src="dashboard.js"></script>
  
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
</body>
</html>
