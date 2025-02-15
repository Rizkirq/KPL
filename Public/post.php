<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam']; 
    $kata_kunci = $_POST['kata_kunci']; 

  
    $target_dir = "../uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }


    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar = basename($_FILES['gambar']['name']);
        $target_file = $target_dir . $gambar;

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "Gambar berhasil diunggah.";
        } else {
            die("Gagal mengunggah gambar.");
        }
    } else {
        die("Tidak ada gambar yang diunggah.");
    }


    $stmt = $conn->prepare("INSERT INTO artikel (judul, gambar, tanggal, jam_publikasi, penulis, isi, kata_kunci) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $judul, $gambar, $tanggal, $jam, $penulis, $isi, $kata_kunci);

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: dashboard.php"); 
        exit();
    } else {
        die("Error: " . $stmt->error);
    }
}

include '../includes/header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tambah Artikel Baru</h2>
    <form id="articleForm" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
            <input type="text" id="judul" name="judul" required class="block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
            <input type="file" id="gambar" name="gambar" required class="block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div class="mb-4">
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Publikasi</label>
            <input type="date" id="tanggal" name="tanggal" required class="block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div class="mb-4">
            <label for="jam" class="block text-sm font-medium text-gray-700">Jam Publikasi</label>
            <input type="time" id="jam" name="jam" required class="block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div class="mb-4">
            <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
            <input type="text" id="penulis" name="penulis" required class="block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div class="mb-4">
            <label for="isi" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
            <textarea id="isi" name="isi" required rows="6" class="block w-full border border-gray-300 rounded-md p-2"></textarea>
        </div>
        <div class="mb-4">
            <label for="kata_kunci" class="block text-sm font-medium text-gray-700">Kata Kunci</label>
            <input type="text" id="kata_kunci" name="kata_kunci" required class="block w-full border border-gray-300 rounded-md p-2">
        </div>
        <button type="submit" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800">Tambah Artikel</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
