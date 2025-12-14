<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
        exit;
    }

    $user_id    = $_SESSION['user_id'];
    $subject_id = $_POST['subject_id'];
    $card_id    = $_POST['card_id'];

    $stmt = $db->prepare("SELECT * FROM user_progress WHERE user_id = ? AND subject_id = ? AND card_id = ?");
    $stmt->execute([$user_id, $subject_id, $card_id]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing) {
        $stmt = $db->prepare("UPDATE user_progress SET done = 1, last_accessed = NOW() WHERE user_id = ? AND subject_id = ? AND card_id = ?");
        $stmt->execute([$user_id, $subject_id, $card_id]);
    } else {
        $stmt = $db->prepare("INSERT INTO user_progress (user_id, subject_id, card_id, done) VALUES (?, ?, ?, 1)");
        $stmt->execute([$user_id, $subject_id, $card_id]);
    }

    $stmt = $db->prepare("SELECT COUNT(*) FROM user_progress WHERE user_id = ? AND subject_id = ? AND done = 1");
    $stmt->execute([$user_id, $subject_id]);
    $completed_cards = $stmt->fetchColumn();
    $progress = ($completed_cards / 4) * 100;

    echo json_encode(['status' => 'success', 'progress' => $progress]);
}
?>
