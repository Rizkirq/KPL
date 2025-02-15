<?php
session_start();
require_once '../includes/db.php';
include '../includes/header.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM artikel WHERE id = $id");
$row = $result->fetch_assoc();
?>

<div class="flex min-h-screen ml-64 p-10">
    <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Edit Artikel</h2>
        <form action="update_post.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            
            <div class="mb-4">
                <label class="block text-gray-700">Judul:</label>
                <input type="text" name="judul" value="<?= htmlspecialchars($row['judul']); ?>" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Isi Artikel:</label>
                <textarea name="isi" class="w-full border p-2 rounded" style="height: 300px;"><?= htmlspecialchars($row['isi']); ?></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Gambar:</label>
                <input type="file" name="gambar" class="w-full border p-2 rounded">
                <p class="text-sm text-gray-600 mt-2">Gambar saat ini:</p>
                <img src="../uploads/<?= htmlspecialchars($row['gambar']); ?>" class="w-32 h-32 object-cover mt-2">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">Update</button>
        </form>
    </div>
</div>
