<?php
session_start();
include '../includes/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

   
    $stmt = $conn->prepare("SELECT id, full_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $full_name, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION["user_id"] = $id;
        $_SESSION["full_name"] = $full_name;
        header("Location: ../public/index.php");
        exit();
    } else {
        $_SESSION["error"] = "Email atau password salah!";
        header("Location: ../public/login.php");
        exit();
    }
}
?>
