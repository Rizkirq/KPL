<?php 
session_start();
include '../includes/db.php'; 
include '../includes/header.php'; 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $query = "SELECT * FROM artikel WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();

    if (!$article) {
        echo "<script>alert('Artikel tidak ditemukan!'); window.location='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Artikel tidak ditemukan!'); window.location='index.php';</script>";
    exit();
}

// Proses komentar dan balasan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    $comment = trim($_POST['comment']);
    $parent_id = isset($_POST['parent_id']) ? intval($_POST['parent_id']) : NULL;

    if (!empty($comment)) {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['full_name'];
        } else {
            $user_id = NULL;
            $username = "Guest";
        }

        $stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, username, comment, parent_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iissi", $id, $user_id, $username, $comment, $parent_id);
        $stmt->execute();
        header("Location: view.php?id=" . $id);
        exit();
    }
}

// Ambil komentar utama (tanpa parent_id)
$stmt = $conn->prepare("SELECT * FROM comments WHERE post_id = ? AND parent_id IS NULL ORDER BY created_at DESC");
$stmt->bind_param("i", $id);
$stmt->execute();
$comments = $stmt->get_result();

// Fungsi untuk mengambil balasan komentar
function getReplies($conn, $comment_id) {
    $stmt = $conn->prepare("SELECT * FROM comments WHERE parent_id = ? ORDER BY created_at ASC");
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();
    return $stmt->get_result();
}
?>

<div class="container mx-auto px-4 py-8 mt-14">
    <div class="bg-white p-6 rounded-lg shadow">
        <img class="w-full h-auto object-cover rounded-lg mb-6" src="../uploads/<?= htmlspecialchars($article['gambar']); ?>" alt="<?= htmlspecialchars($article['judul']); ?>">
        <div class="mb-4">
            <p class="mt-6 text-gray-600 font-semibold">Ditulis oleh: <?= htmlspecialchars($article['penulis']); ?></p>
            <p class="text-gray-500 text-sm"><?= date('d F Y', strtotime($article['tanggal'])); ?> at <?= date('H:i', strtotime($article['jam_publikasi'])); ?></p>
            <h2 class="text-3xl font-bold"><?= htmlspecialchars($article['judul']); ?></h2>
        </div>
        <p class="text-gray-700 mt-4 leading-relaxed"><?= nl2br(htmlspecialchars($article['isi'])); ?></p>
    </div>

    <!-- Komentar -->
    <div class="bg-white p-6 rounded-lg shadow mt-8">
        <h2 class="text-lg font-semibold mb-4"><?= $comments->num_rows; ?> Comments</h2>

        <?php while ($row = $comments->fetch_assoc()): ?>
            <div class="border-b border-gray-300 pb-4 mb-4">
                <p class="font-bold"><?= htmlspecialchars($row['username']); ?></p>
                <p class="text-gray-600"><?= nl2br(htmlspecialchars($row['comment'])); ?></p>
                <small class="text-gray-500"><?= date('d F Y H:i', strtotime($row['created_at'])); ?></small>
                <button class="text-green-600 text-sm reply-btn" data-id="<?= $row['id']; ?>">Reply</button>

                <!-- Form Balasan (Hidden by Default) -->
                <form action="view.php?id=<?= $id; ?>" method="POST" class="reply-form hidden mt-3" id="reply-form-<?= $row['id']; ?>">
                    <input type="hidden" name="parent_id" value="<?= $row['id']; ?>">
                    <textarea name="comment" rows="2" class="w-full p-2 border rounded-lg" placeholder="Write a reply..."></textarea>
                    <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded mt-2">Reply</button>
                </form>

                <!-- Balasan -->
                <?php 
                $replies = getReplies($conn, $row['id']);
                while ($reply = $replies->fetch_assoc()): ?>
                    <div class="ml-6 mt-3 border-l-2 border-gray-300 pl-4">
                        <p class="font-bold"><?= htmlspecialchars($reply['username']); ?></p>
                        <p class="text-gray-600"><?= nl2br(htmlspecialchars($reply['comment'])); ?></p>
                        <small class="text-gray-500"><?= date('d F Y H:i', strtotime($reply['created_at'])); ?></small>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endwhile; ?>

        <!-- Form Komentar Utama -->
        <h3 class="text-lg font-semibold mt-6">Post Comment</h3>
        <form action="view.php?id=<?= $id; ?>" method="POST">
            <textarea name="comment" rows="3" class="w-full p-3 border rounded-lg" placeholder="Message"></textarea>
            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded mt-3">Post Comment</button>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".reply-btn").forEach(button => {
        button.addEventListener("click", function() {
            const formId = "reply-form-" + this.getAttribute("data-id");
            const form = document.getElementById(formId);
            form.classList.toggle("hidden");
        });
    });
});
</script>

<?php include '../includes/footer.php'; ?>
