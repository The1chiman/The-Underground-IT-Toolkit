<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $module_id = $_POST['module_id'];
    $progress = $_POST['progress']; 

    // Check if progress already exists
    $stmt = $db->prepare("SELECT * FROM user_progress WHERE user_id = ? AND module_id = ?");
    $stmt->execute([$user_id, $module_id]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing) {
        $stmt = $db->prepare("UPDATE user_progress SET progress_percentage = ?, last_accessed = NOW() WHERE user_id = ? AND module_id = ?");
        $stmt->execute([$progress, $user_id, $module_id]);
    } else {
        $stmt = $db->prepare("INSERT INTO user_progress (user_id, module_id, progress_percentage) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $module_id, $progress]);
    }

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>