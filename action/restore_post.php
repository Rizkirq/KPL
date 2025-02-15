<?php
require_once '../includes/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "UPDATE artikel SET status = 'published' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../public/dashboard.php?message=Artikel berhasil dikembalikan");
    } else {
        header("Location: ../public/retracted.php?error=Gagal mengembalikan artikel");
    }
}
?>
