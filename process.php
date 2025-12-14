<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['fullName'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($fullName === '' || $email === '' || $password === '') {
        echo "Missing required fields.";
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Check if email already exists
        $check = $db->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->rowCount() > 0) {
            echo "Email already registered!";
        } else {
            $sql = "INSERT INTO users (fullName, email, password) VALUES (?, ?, ?)";
            $stmt = $db->prepare($sql);
            $result = $stmt->execute([$fullName, $email, $hashedPassword]);

            if ($result) {
                echo "Registration Successful!";
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "Registration Failed: " . $errorInfo[2];
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No data received.";
}
?>
