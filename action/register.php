<?php
session_start();
include '../includes/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        $_SESSION["error"] = "Email sudah digunakan!";
        header("Location: ../public/signup.php");
        exit();
    }


    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $full_name, $email, $password);

    if ($stmt->execute()) {
        $_SESSION["success"] = "Akun berhasil dibuat! Silakan login.";
        header("Location: ../public/login.php");
        exit();
    } else {
        $_SESSION["error"] = "Terjadi kesalahan.";
        header("Location: ../public/signup.php");
        exit();
    }
}
?>
