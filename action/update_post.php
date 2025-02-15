<?php
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

 
    $stmt = $conn->prepare("SELECT * FROM artikel WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $oldData = $result->fetch_assoc();

    if ($oldData) {
        $stmt = $conn->prepare("INSERT INTO artikel_revisi (artikel_id, judul, isi, gambar) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $id, $oldData['judul'], $oldData['isi'], $oldData['gambar']);
        $stmt->execute();
    }

    $stmt = $conn->prepare("UPDATE artikel SET judul = ?, isi = ? WHERE id = ?");
    $stmt->bind_param("ssi", $judul, $isi, $id);
    
    if ($stmt->execute()) {
        header("Location: ../public/dashboard.php?message=Artikel berhasil diperbarui.");
    } else {
        echo "Gagal mengupdate artikel.";
    }
}
?>
