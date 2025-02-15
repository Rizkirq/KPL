<?php
include '../includes/db.php';
include '../includes/header.php';

$query = "SELECT * FROM artikel WHERE status != 'withdrawn' ORDER BY tanggal DESC LIMIT 3";
$result = $conn->query($query);
?>

<div class="container mx-auto px-4 py-8 mt-24">
    <h1 class="text-3xl font-bold text-center mb-6">Artikel Terbaru</h1>

    <div class="grid md:grid-cols-3 gap-6">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img class="w-full h-48 object-cover" src="../uploads/<?= htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['judul']); ?>">
                    <div class="p-4">
                        <p class="text-gray-500 text-sm">
                            <?= date('M d, Y', strtotime($row['tanggal'])); ?> at <?= date('H:i', strtotime($row['jam_publikasi'])); ?>
                        </p>
                        <h3 class="text-lg font-semibold mt-2">
                            <a href="view.php?id=<?= $row['id']; ?>" class="text-green-600 hover:underline">
                                <?= htmlspecialchars($row['judul']); ?>
                            </a>
                        </h3>
                        <p class="text-gray-600 mt-2 text-sm"><?= substr(htmlspecialchars($row['isi']), 0, 100); ?>...</p>
                        <p class="text-sm font-semibold"><?= htmlspecialchars($row['penulis']); ?></p>
                        <?php if (!empty($row['kata_kunci'])): ?>
                            <div class="mt-3">
                                <span class="text-sm font-semibold text-gray-600">Kata Kunci:</span>
                                <div class="flex flex-wrap mt-1">
                                    <?php
                                    $keywords = explode(',', $row['kata_kunci']);
                                    foreach ($keywords as $keyword) {
                                        echo "<span class='bg-green-600 text-white px-2 py-1 rounded-full text-xs mr-2 mb-2'>" . htmlspecialchars(trim($keyword)) . "</span>";
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-gray-500">Tidak ada artikel ditemukan.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Contact Section -->
<div class="container mx-auto px-6 py-12 text-center">
    <h2 class="text-3xl font-semibold">CONTACT US</h2>
    <p class="text-gray-600 mt-2">"Contact us for inquiries, collaborations, or support.<br>We're here to help!"</p>

    <!-- Contact Information -->
    <div class="flex flex-wrap justify-center mt-8 gap-6">
        <div class="bg-green-600 text-white p-6 rounded-lg w-64">
            <h3 class="font-semibold">Office Location</h3>
            <p class="text-sm mt-2">1234 St. Market St. Suite 567<br>New York, USA</p>
        </div>
        <div class="bg-green-600 text-white p-6 rounded-lg w-64">
            <h3 class="font-semibold">Working Hours</h3>
            <p class="text-sm mt-2">Monday to Friday: 9AM - 5PM<br>Sat & Sun: Closed</p>
        </div>
        <div class="bg-green-600 text-white p-6 rounded-lg w-64">
            <h3 class="font-semibold">Communication</h3>
            <p class="text-sm mt-2">+1 234 567 890<br>mail@example.com</p>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="bg-green-600 text-white p-10 mt-12 rounded-lg max-w-3xl mx-auto">
        <h3 class="text-lg font-semibold">Have any query?</h3>
        <h2 class="text-2xl font-semibold mt-2">CONTACT US</h2>
        <p class="text-sm mt-2">Feel free to reach out to us for any inquiries, collaborations, or discussions. We'd love to hear from you!</p>

        <form class="mt-6 space-y-4">
            <input type="text" placeholder="What's your name?" class="w-full p-3 text-gray-900 rounded focus:outline-none">
            <input type="email" placeholder="Your Email?" class="w-full p-3 text-gray-900 rounded focus:outline-none">
            <textarea placeholder="Message" class="w-full p-3 text-gray-900 rounded focus:outline-none h-24"></textarea>
            <button class="bg-white text-green-600 px-6 py-2 rounded font-semibold">Send Message</button>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
