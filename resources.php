<?php
session_start();
require_once('config.php');

$user_id = $_SESSION['user_id'] ?? null;

// Define subjects (each subject has 4 cards/parts)
$subjects = [
  ['id' => 201, 'title' => 'GitHub Basics', 'level' => 'Beginner', 'desc' => 'Learn version control fundamentals and collaborative development.', 'img' => 'github_mastery.webp'],
  ['id' => 202, 'title' => 'Advanced Debugging', 'level' => 'Advanced', 'desc' => 'Master debugging tools and techniques for complex problems.', 'img' => 'debugging_Secrets.webp'],
  ['id' => 203, 'title' => 'Cloud Deployment', 'level' => 'Intermediate', 'desc' => 'Deploy applications to AWS, Azure, and Google Cloud.', 'img' => 'cloud_tools.webp'],
  ['id' => 204, 'title' => 'Team Collaboration', 'level' => 'Beginner', 'desc' => 'Effective communication and agile methodologies.', 'img' => 'soft_skills.webp'],
  ['id' => 205, 'title' => 'Database Design', 'level' => 'Intermediate', 'desc' => 'SQL, NoSQL, and database optimization strategies.', 'img' => 'cloud_tools.webp'],
  ['id' => 206, 'title' => 'Clean Code Practices', 'level' => 'Beginner', 'desc' => 'Write maintainable, readable, and efficient code.', 'img' => 'debugging_Secrets.webp'],
  ['id' => 207, 'title' => 'Command Line Mastery', 'level' => 'Intermediate', 'desc' => 'Become proficient with terminal and shell scripting.', 'img' => 'productivity_hacks.webp'],
  ['id' => 208, 'title' => 'Documentation Best Practices', 'level' => 'Beginner', 'desc' => 'Create clear, comprehensive technical documentation.', 'img' => 'github_mastery.webp']
];

// Fetch progress for each subject
$progressData = [];
if ($user_id) {
    $stmt = $db->prepare("SELECT subject_id, card_id, done FROM user_progress WHERE user_id = :user_id");
    $stmt->execute([':user_id' => $user_id]);
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $progressData[$row['subject_id']][$row['card_id']] = $row['done'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resources | The Underground IT Toolkit</title>
  <link rel="stylesheet" href="resources.css"/>
  <script src="resources.js" defer></script>
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
      <?php if ($user_id): ?>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </nav>
  </div>

  <div class="upper">
    <h2 class="title-upper">Learning Resources</h2>
    <p class="p-upper">Explore our comprehensive collection of IT learning materials, from beginner to advanced topics.</p>
  </div>

  <section class="content">
    <h2>Learning Resources</h2>
    <div class="cards">
      <?php foreach ($subjects as $s): 
        $completedCards = isset($progressData[$s['id']]) ? array_sum($progressData[$s['id']]) : 0;
        $progress = ($completedCards / 4) * 100;
      ?>
      <div class="card">
        <img class="card-img" src="<?= $s['img'] ?>" alt="<?= htmlspecialchars($s['title']) ?>">
        <div class="card-header">
          <h3><?= htmlspecialchars($s['title']) ?></h3>
          <span class="level-badge"><?= htmlspecialchars($s['level']) ?></span>
        </div>
        <p><?= htmlspecialchars($s['desc']) ?></p>
        <div class="progress-section">
          <div class="progress-label">
            <span>PROGRESS</span>
            <span class="progress-percent"><?= $progress ?>%</span>
          </div>
          <div class="progress-bar">
            <div class="progress-fill" style="width: <?= $progress ?>%;"></div>
          </div>
        </div>
        <a href="learning.php?subject=<?= $s['id'] ?>" class="continue-link">Continue Learning</a>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

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
        <?php if ($user_id): ?>
          <a href="logout.php">Logout</a>
        <?php else: ?>
          <a href="login.php">Login</a>
        <?php endif; ?>
      </nav>
    </div>
  </footer>
</body>
</html>
