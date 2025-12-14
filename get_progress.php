<?php
session_start();
require_once('config.php');

$user_id = $_SESSION['user_id'];
$module_id = $_GET['module_id'];

$stmt = $db->prepare("SELECT progress_percentage FROM user_progress WHERE user_id = ? AND module_id = ?");
$stmt->execute([$user_id, $module_id]);
$progress = $stmt->fetchColumn();

echo json_encode(['progress' => $progress ?: 0]); // default 0 if none
?>