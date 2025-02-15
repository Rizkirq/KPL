-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2025 pada 03.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makeblog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `jam_publikasi` time NOT NULL DEFAULT curtime(),
  `penulis` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `kata_kunci` text DEFAULT NULL,
  `tanggal_revisi` datetime DEFAULT NULL,
  `status` enum('published','draft','withdrawn') DEFAULT 'published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `gambar`, `tanggal`, `jam_publikasi`, `penulis`, `isi`, `kata_kunci`, `tanggal_revisi`, `status`) VALUES
(2, 'Teknologi AI Makin Canggih, Apa Dampaknya Bagi Dunia Kerjaan?', 'download.jpg', '2025-02-15 00:00:00', '00:00:00', 'iki', 'Perkembangan kecerdasan buatan (AI) semakin pesat dan memengaruhi banyak aspek kehidupan, terutama di dunia kerja. Banyak perusahaan mulai mengadopsi AI untuk meningkatkan efisiensi. Namun, di sisi lain, ada kekhawatiran bahwa AI dapat menggantikan pekerjaan manusia dalam berbagai sektor.', NULL, NULL, 'withdrawn'),
(3, 'Kemajuan Teknologi AI Meningkatkan Efisiensi di Berbagai bidang', 'types-of-technology.jpg.webp', '2025-02-15 00:00:00', '04:05:00', 'iki', 'Dalam beberapa tahun terakhir, teknologi kecerdasan buatan (AI) telah mengalami perkembangan pesat dan memberikan dampak besar di berbagai sektor. Dari industri manufaktur hingga sektor kesehatan dan pendidikan, AI semakin menunjukkan perannya dalam meningkatkan efisiensi dan produktivitas.\r\n\r\nSalah satu contoh penerapan AI yang signifikan adalah dalam bidang industri. Banyak perusahaan kini mengadopsi teknologi AI untuk meningkatkan efisiensi produksi, mengurangi biaya operasional, serta meningkatkan kualitas produk. Dengan adanya sistem otomatisasi berbasis AI, perusahaan dapat mengurangi ketergantungan pada tenaga kerja manusia dalam pekerjaan berulang dan berisiko tinggi.\r\n\r\nDi sektor pendidikan, AI telah digunakan untuk meningkatkan metode pembelajaran. Platform pembelajaran berbasis AI memungkinkan pengajaran yang lebih personal dan adaptif sesuai dengan kebutuhan masing-masing siswa. Selain itu, teknologi ini juga membantu pendidik dalam mengelola tugas administratif, sehingga mereka dapat lebih fokus pada interaksi dengan siswa.\r\n\r\nSementara itu, di bidang kesehatan, AI telah membawa perubahan signifikan dalam diagnosis dan perawatan pasien. Dengan bantuan kecerdasan buatan, dokter dapat menganalisis data medis dengan lebih cepat dan akurat, sehingga memungkinkan deteksi dini berbagai penyakit. Robot medis berbasis AI juga telah digunakan dalam operasi bedah untuk meningkatkan presisi dan mengurangi risiko kesalahan manusia.\r\n\r\nNamun, di balik kemajuan ini, tantangan tetap ada. Masalah etika, keamanan data, serta dampak AI terhadap lapangan pekerjaan menjadi perhatian utama para pakar dan pemangku kebijakan. Oleh karena itu, regulasi yang tepat sangat diperlukan agar perkembangan teknologi AI dapat memberikan manfaat maksimal bagi masyarakat tanpa menimbulkan dampak negatif.\r\n\r\nDengan perkembangan pesat teknologi ini, banyak pihak optimis bahwa AI akan terus memberikan inovasi baru yang dapat membawa perubahan positif dalam kehidupan manusia. Oleh karena itu, kolaborasi antara pemerintah, industri, dan akademisi sangat diperlukan untuk mengembangkan dan mengimplementasikan teknologi ini dengan cara yang bertanggung jawab.', 'Kecerdasan Buatan (AI) Efisiensi Industri Pendidikan Kesehatan Otomatisasi Teknologi Regulasi Keamanan Data Lapangan Pekerjaan', NULL, 'published'),
(4, 'Perekonomian Indonesia Diprediksi Menguat di Tahun 2025', 'Indonesia small.png', '2025-02-15 00:00:00', '14:05:00', 'iki', 'Jakarta - Para ekonom memprediksi bahwa perekonomian Indonesia akan mengalami pertumbuhan yang signifikan pada tahun 2025. Faktor utama yang mendorong pertumbuhan ini antara lain stabilitas investasi, peningkatan ekspor, serta inovasi teknologi yang semakin berkembang di berbagai sektor industri.\r\n\r\nMenurut laporan dari Bank Indonesia, pertumbuhan ekonomi nasional diperkirakan mencapai 5,2% hingga 5,5%, lebih tinggi dibandingkan tahun sebelumnya. Stabilitas nilai tukar rupiah serta meningkatnya kepercayaan investor menjadi faktor kunci dalam proyeksi positif ini.\r\n\r\nSektor industri dan manufaktur diharapkan tetap menjadi pendorong utama pertumbuhan ekonomi. Pemerintah terus mendorong investasi dalam sektor ini dengan berbagai insentif serta kebijakan yang mendukung efisiensi produksi dan ekspor. Selain itu, sektor teknologi dan digital juga berkembang pesat, memberikan kontribusi signifikan terhadap perekonomian nasional.\r\n\r\nMenteri Keuangan, Sri Mulyani Indrawati, menyatakan bahwa reformasi struktural yang dilakukan pemerintah dalam beberapa tahun terakhir telah membuahkan hasil. “Kami terus berupaya menciptakan iklim investasi yang kondusif serta mendorong inovasi teknologi agar Indonesia dapat bersaing di pasar global,” ujarnya.\r\n\r\nNamun, para ahli juga mengingatkan bahwa ada beberapa tantangan yang perlu diwaspadai, seperti ketidakstabilan ekonomi global, dampak perubahan iklim terhadap sektor pertanian, serta potensi inflasi yang dapat mempengaruhi daya beli masyarakat. Oleh karena itu, pemerintah diharapkan dapat mengambil langkah antisipatif agar pertumbuhan ekonomi tetap stabil dan berkelanjutan.\r\n\r\nDengan optimisme yang tinggi, banyak pihak berharap bahwa tahun 2025 akan menjadi momentum kebangkitan ekonomi Indonesia menuju masa depan yang lebih cerah dan berdaya saing di kancah global.', 'Perekonomian Indonesia Pertumbuhan Ekonomi Investasi Inovasi Teknologi Stabilitas Nilai Tukar Ekspor Industri dan Manufaktur Reformasi Struktural Inflasi Pasar Global', NULL, 'published');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel_revisi`
--

CREATE TABLE `artikel_revisi` (
  `id` int(11) NOT NULL,
  `artikel_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `revisi_tanggal` datetime NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel_revisi`
--

INSERT INTO `artikel_revisi` (`id`, `artikel_id`, `judul`, `isi`, `revisi_tanggal`, `gambar`) VALUES
(1, 3, 'Kemajuan Teknologi AI Meningkatkan Efisiensi di Berbagai Sektor', 'Dalam beberapa tahun terakhir, teknologi kecerdasan buatan (AI) telah mengalami perkembangan pesat dan memberikan dampak besar di berbagai sektor. Dari industri manufaktur hingga sektor kesehatan dan pendidikan, AI semakin menunjukkan perannya dalam meningkatkan efisiensi dan produktivitas.\r\n\r\nSalah satu contoh penerapan AI yang signifikan adalah dalam bidang industri. Banyak perusahaan kini mengadopsi teknologi AI untuk meningkatkan efisiensi produksi, mengurangi biaya operasional, serta meningkatkan kualitas produk. Dengan adanya sistem otomatisasi berbasis AI, perusahaan dapat mengurangi ketergantungan pada tenaga kerja manusia dalam pekerjaan berulang dan berisiko tinggi.\r\n\r\nDi sektor pendidikan, AI telah digunakan untuk meningkatkan metode pembelajaran. Platform pembelajaran berbasis AI memungkinkan pengajaran yang lebih personal dan adaptif sesuai dengan kebutuhan masing-masing siswa. Selain itu, teknologi ini juga membantu pendidik dalam mengelola tugas administratif, sehingga mereka dapat lebih fokus pada interaksi dengan siswa.\r\n\r\nSementara itu, di bidang kesehatan, AI telah membawa perubahan signifikan dalam diagnosis dan perawatan pasien. Dengan bantuan kecerdasan buatan, dokter dapat menganalisis data medis dengan lebih cepat dan akurat, sehingga memungkinkan deteksi dini berbagai penyakit. Robot medis berbasis AI juga telah digunakan dalam operasi bedah untuk meningkatkan presisi dan mengurangi risiko kesalahan manusia.\r\n\r\nNamun, di balik kemajuan ini, tantangan tetap ada. Masalah etika, keamanan data, serta dampak AI terhadap lapangan pekerjaan menjadi perhatian utama para pakar dan pemangku kebijakan. Oleh karena itu, regulasi yang tepat sangat diperlukan agar perkembangan teknologi AI dapat memberikan manfaat maksimal bagi masyarakat tanpa menimbulkan dampak negatif.\r\n\r\nDengan perkembangan pesat teknologi ini, banyak pihak optimis bahwa AI akan terus memberikan inovasi baru yang dapat membawa perubahan positif dalam kehidupan manusia. Oleh karena itu, kolaborasi antara pemerintah, industri, dan akademisi sangat diperlukan untuk mengembangkan dan mengimplementasikan teknologi ini dengan cara yang bertanggung jawab.', '0000-00-00 00:00:00', 'types-of-technology.jpg.webp'),
(2, 2, 'Teknologi AI Makin Canggih, Apa Dampaknya Bagi Dunia Kerjaan?', 'Perkembangan kecerdasan buatan (AI) semakin pesat dan memengaruhi banyak aspek kehidupan, terutama di dunia kerja. Banyak perusahaan mulai mengadopsi AI untuk meningkatkan efisiensi. Namun, di sisi lain, ada kekhawatiran bahwa AI dapat menggantikan pekerjaan manusia dalam berbagai sektor.', '0000-00-00 00:00:00', 'download.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `username`, `comment`, `created_at`, `parent_id`) VALUES
(7, 3, NULL, 'Guest', 'sawsdwssws', '2025-02-15 02:29:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `created_at`) VALUES
(2, 'iki maulana', 'iki@gmail.com', '$2y$10$zCkczrlD8yM/K.77.fkDIe8DoIynME.ynP/m7V8u00rBoWOPKi2B6', '2025-02-14 15:56:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel_revisi`
--
ALTER TABLE `artikel_revisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_id` (`artikel_id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `artikel_revisi`
--
ALTER TABLE `artikel_revisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel_revisi`
--
ALTER TABLE `artikel_revisi`
  ADD CONSTRAINT `artikel_revisi_ibfk_1` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
