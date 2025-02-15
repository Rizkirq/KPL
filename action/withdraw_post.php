<?php
require_once '../includes/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "UPDATE artikel SET status = 'withdrawn' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../public/retracted.php?message=Artikel berhasil ditarik");
    } else {
        header("Location: ../public/dashboard.php?error=Gagal menarik artikel");
    }
}
?>
