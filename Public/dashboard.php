<?php
session_start();
require_once '../includes/db.php';
include '../includes/header.php';
?>
<div class="flex h-screen mt-9">
    <div class="w-64 bg-green-600 text-white p-5 flex-shrink-0 h-full fixed">
        <div class="text-xl font-bold mb-5">Dashboard</div>
        <ul>
            <li class="mb-3"><a href="Post.php" class="block p-2 rounded hover:bg-green-800">+ New Post</a></li>
            <li class="mb-3"><a href="dashboard.php" class="block p-2 rounded hover:bg-green-800">Post</a></li>
            <li class="mb-3"><a href="retracted.php" class="block p-2 rounded hover:bg-green-800">Retracted Articles</a></li>
            <li class="mb-3"><a href="logout.php" class="block p-2 rounded hover:bg-green-800">Logout</a></li>
        </ul>
    </div>

    <!-- Content Area -->
    <div class="flex-1 ml-64 p-10 overflow-y-auto">
        <h2 class="text-2xl font-bold mb-6">Daftar Artikel</h2>
        <div class="space-y-6">
            <?php
            $result = $conn->query("SELECT * FROM artikel WHERE status != 'withdrawn' ORDER BY tanggal DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='bg-white p-6 rounded-lg shadow-md'>
                    <h3 class='text-xl font-bold text-gray-900'>{$row['judul']}</h3>
                    <p class='text-sm text-gray-500'>Published on {$row['tanggal']} at {$row['jam_publikasi']} by {$row['penulis']}</p>
                    <img src='../uploads/{$row['gambar']}' alt='{$row['judul']}' class='w-full h-auto rounded-lg mt-4'>
                    <p class='text-gray-700 mt-2'>{$row['isi']}</p>";

                echo "<div class='mt-4 flex space-x-4'>
                        <a href='../action/edit_post.php?id={$row['id']}' class='text-blue-600 hover:text-blue-800'>Edit</a>
                        <a href='../action/withdraw_post.php?id={$row['id']}' class='text-orange-600 hover:text-orange-800'>Tarik</a>
                        <button class='text-red-600 hover:text-red-800' onclick='deleteArticle({$row['id']})'>Hapus</button>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</div>

<script>
function deleteArticle(id) {
    if (confirm("Apakah Anda yakin ingin menghapus artikel ini?")) {
        window.location.href = "../action/deletepost.php?id=" + id;
    }
}
</script>
