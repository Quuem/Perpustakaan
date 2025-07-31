-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 03:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mzein_kms`
--

-- --------------------------------------------------------

--
-- Table structure for table `akreditasikm`
--

CREATE TABLE `akreditasikm` (
  `komponen_id` int(12) NOT NULL,
  `judul_komponen` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `deskripsi2` text DEFAULT NULL,
  `dokumen` varchar(150) DEFAULT NULL,
  `tanggal_upload` date NOT NULL,
  `user_id` int(12) NOT NULL,
  `kategori_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akreditasikm`
--

INSERT INTO `akreditasikm` (`komponen_id`, `judul_komponen`, `deskripsi`, `deskripsi2`, `dokumen`, `tanggal_upload`, `user_id`, `kategori_id`) VALUES
(20, 'Denah Ruang Perpustakaan', '2', NULL, 'gedung3d.jpg', '2025-07-24', 9, 15),
(21, 'Denah Ruang Perpustakaan', '2', NULL, 'denah.jpg', '2025-07-28', 9, 15),
(23, 'Rekap Luas Ruang Perpustakaan', '1', NULL, 'Rekap_Luas_Ruang_Perpustakaan.jpg', '2025-07-28', 9, 15),
(24, 'KEBIJAKAN PENGEMBANGAN KOLEKSI', 'KEBIJAKAN PENGEMBANGAN KOLEKSI', NULL, '1_1_1_1_KEBIJAKAN_PENGEMBANGAN_KOLEKSI.docx', '2025-07-24', 9, 14),
(25, 'SELEKSI BAHAN PERPUSTAKAAN', 'SELEKSI BAHAN PERPUSTAKAAN', NULL, '1_1_2_2_SELEKSI_BAHAN_PERPUSTAKAAN.docx', '2025-07-24', 9, 14),
(26, 'JUMLAH KOLEKSI TERCETA', 'JUMLAH KOLEKSI TERCETA', NULL, '1_1_3_3_JUMLAH_KOLEKSI_TERCETA1.docx', '2025-07-24', 9, 14),
(27, 'KOLEKSI KHUSUS', 'KOLEKSI KHUSUS', NULL, '1_1_3_6_KOLEKSI_KHUSUS.docx', '2025-07-24', 9, 14),
(28, 'KEBIJAKAN PENGEMBANGAN KOLEKSI', 'KEBIJAKAN PENGEMBANGAN KOLEKSI', NULL, '1_2_9_KEBIJAKAN_PENGOORGANISASIAN_KOLEKSI.docx', '2025-07-24', 9, 14),
(30, 'CACAH ULANG PELESTARIAN KOLEKSI', 'CACAH ULANG PELESTARIAN KOLEKSI', NULL, '1_3_11_CACAH_ULANG_PELESTARIAN_KOLEKSI_(1).docx', '2025-07-24', 9, 14),
(32, 'Pendidikan Pemustaka', '', NULL, 'P.jpg', '2025-07-25', 9, 24),
(36, 'Pendirian Perpustakaan', NULL, NULL, 'document1.jpg', '2025-07-25', 9, 26),
(40, 'Papan Nama Perpustakaan', NULL, NULL, 'Papan_Nama_Perpustakaan.jpg', '2025-07-25', 9, 28),
(41, 'Papan Nama Perpustakaan', NULL, NULL, 'Papan_Nama_Perpustakaan_2.jpg', '2025-07-25', 9, 28),
(42, 'Layanan Baca Di Tempat', 'Layanan ini menyediakan ruang baca bagi pemustaka untuk membaca berbagai macam koleksi yang ada di perpustakaan. Layanan ini disediakan untuk pembaca yang tidak dapat atau tidak ingin meminjam koleksi, tetapi hanya butuh untuk membaca-baca di perpustakaan. Demikian pula apabila perpustakaan memiliki koleksi khusus atau koleksi audiovisual yang memerlukan sarana baca khusus yang hanya dapat dibaca di perpustakaan.', NULL, 'Picture1.jpg', '2025-07-28', 9, 29),
(44, 'Dinda Fatma Yols, S.IP', 'Pustakawan', 'Kepala Perpustakaan', NULL, '2025-07-28', 9, 31),
(45, 'Ega Deny Irianto, S.S.I', 'Pustakawan', 'Unit Pelayanan Teknis', NULL, '2025-07-28', 9, 31),
(46, 'Ihdina Rahmadhani Harahap', 'Penyiar', 'Unit Pelayanan Pengguna', NULL, '2025-07-28', 9, 31),
(47, 'Susfita Eka Putri,  S.Pd', 'Guru', 'Unit Pelayanan Pengguna', NULL, '2025-07-28', 9, 31),
(48, 'Aidil Faisal', 'Guru', 'Unit Pelayanan Pengguna', NULL, '2025-07-28', 9, 31),
(49, 'Yuli Wastuti, S.Pd., M.M', 'Waka. Kurikulum', 'Unit Pengembangan dan Kerjasama', NULL, '2025-07-28', 9, 31),
(50, 'Rika Oktavianti, S.E., M.M', 'Guru', 'Unit Pengembangan dan Kerjasama', NULL, '2025-07-28', 9, 31),
(51, 'Yossica, S.Tr.Kom', 'Guru', 'Unit Pengembangan dan Kerjasama', NULL, '2025-07-28', 9, 31),
(52, 'Oki Helfiska', 'Waka. Sarana dan Prasarana', 'Unit Pelayanan Digital', NULL, '2025-07-28', 9, 31),
(53, 'Muhammad Addinillah, S.Kom', 'Guru', 'Unit Pelayanan Digital', NULL, '2025-07-28', 9, 31),
(54, 'Hanifa Yuti Islamiyah, S.Pd', 'Guru', 'Unit Pelayanan Teknis', NULL, '2025-07-28', 9, 31),
(55, 'Unit Pelayanan Teknis', 'Unit Pelayanan Teknis', 'Unit Pelayanan Teknis', NULL, '2025-07-28', 9, 31),
(57, 'Drs. Hendripides, M.Si', 'Kepala Sekolah', 'Kepala Sekolah', NULL, '2025-07-28', 9, 32),
(58, 'Dinda Fatmayola, S.IP', 'Kepala Perpustakaan', '1. Membuat perencanaan pembinaan dan pengembangan perpustakaan pada awal tahun ajaran\r\n2. Mendayagunakan semua sumber yang ada\r\n3. Mengadakan koordinasi dan pengawasan terhadap semua kegiatan perpustakaan\r\n4. Mengadakan pembinaan terhadap anggota pustaka\r\n5. Membuat kebijaksanaan-kebijaksanaan tertentu sehubungan dengan pembinaan dan pengembangan perpustakaan\r\n6. Melakukan kerja sama dengan perangkat sekolah untuk meningkatkan efisiensi dan efektivitas kegiatan perpustakaan\r\n7. Mengadakan penilaian terhadap penyelenggaraan perpustakaan\r\n8. Mengadakan hubungan kerja sama dengan pihak luar/perpustakaan lain dalam upaya pengembangan perpustakaan\r\n9. Membuat laporan kegiatan perpustakaan pada akhir tahun ajaran', NULL, '2025-07-28', 9, 32),
(59, '1. Ihdina Rahmadhani Harahap\r\n2. Susfita Eka Putri, S.Pd\r\n3. Aidil Faisal, S.Pd', 'Unit Pelayanan Pengguna', '1. Melayani peminjaman buku-buku\r\n2. Melayani pengembalian buku-buku yang telah dipinjam\r\n3. Memberikan pelayanan bimbingan belajar\r\n4. Mengadakan pembinaan minat baca\r\n5. Memberikan bantuan informasi kepada semua pihak\r\n6. Menyusun koleksi/bahan-bahan Pustaka meneurut peraturan yang berlaku.\r\n7. Menyusun program kerja tahunan bidang layanan pengguna\r\n8. Melakukan analisis perkembangan layanan pengguna\r\n9. Mengkordinasikan kegiatan bidang layanan keanggotaan, sirkulasi, shelving serta multimedia\r\n10. Menyusun konsep, materi dan pelaksanaan pendiidkan pengguna\r\n11. Menjawab saran dan masukan dari pengguna baik secara manual maupun elektronik\r\n12. Mengatur dan menyelenggarakan kegiatan layanan anatar perpustakaan\r\n13. Menyusun laporan bulanan kepada kepala perpustakaan', NULL, '2025-07-28', 9, 32),
(60, '1. Hanifa Yuti Islamiyah, S.Pd\r\n2. Ega Deny Irianto, S.S.I', 'Unit Pelayanan Teknis', '1. Merencanakan dan melakukan pengadaan bahan-bahan pustaka sesuai dengan kebutuhan\r\n2. Menginventariskan bahan-bahan pustaka\r\n3. Mengklasifikasikan bahan-bahan pustaka menurut sistem klasifikasi tertentu\r\n4. Mengkatalog dan melabel buku-buku perpustakaan sekolah\r\n5. Membuat perlengkapan buku (kartu buku, barcode, slip tanggal)\r\n6. Menyusun koleksi/bahan-bahan pustaka di rak menurut peraturan yang berlaku\r\n7. Melakukan kegiatan administrasi penggantian buku\r\n8. Memberikan pengesahan bebas pinjam\r\n9. Melakukan koordinasi pendataan buku rusak\r\n10. Melakukan analisis sistem layanan teknis\r\n11. Mengkoordinasikan dan melaksanakan kegiatan stock opname koleksi\r\n12. Melakukan kajian pengembangan dan kebutuhan sumber informasi\r\n13. Melaksanakan penyebaran informasi tentang kegiatan perpustakaan melalui media cetak\r\n14. Mengunggah kegiatan perpustakaan di mading online SMK Labor\r\n15. Menjawab saran dan masukan dari pengguna', NULL, '2025-07-28', 9, 32),
(61, '1. Yuli Wastuti, S.Pd., M.M\r\n2. Rika Oktavianti, S.E., M.M\r\n3. Yossica, S.Tr.Kom', 'Unit Pengembangan dan Kerjasama', '1. Melakukan pengembangan produk inovatif dan kreatif perpustakaan dalam bentuk digitalisasi\r\n2. Memastikan pengembangan perpustakaan selaras dengan kebutuhan pengguna dan peradaban\r\n3. Menjamin pengembangan perpustakaan secara berkesinambungan\r\n4. Melakukan komunikasi dengan berbagai instansi agar kerja sama internal dan eksternal perpustakaan terlaksana dengan baik\r\n5. Menyusun program kerja tahunan bidang pengembangan dan kerja sama\r\n6. Melakukan penyediaan data dan dokumen terkait kebutuhan penyusunan rencana kerja dan pelaporan perpustakaan\r\n7. Menyusun laporan bulanan kepada kepala perpustakaan\r\n8. Menyelenggarakan pelatihan bidang perpustakaan digital\r\n9. Menyusun program kerja urusan keuangan\r\n10. Melakukan administrasi penerimaan, penyimpanan, dan pengeluaran keuangan perpustakaan', NULL, '2025-07-28', 9, 32),
(62, '1. Mummad Addinillah, S.Kom\r\n2. Oki Helfiska', 'Unit Pelayanan Digital', '1. Mendokumentasikan bahan ajar (PowerPoint), perangkat pembelajaran guru\r\n2. Mendokumentasikan PTK guru dan karya tulis siswa yang diikutsertakan dalam lomba\r\n3. Melengkapi pustaka maya dengan buku digital, bahan ajar (materi) berupa bank informasi sesuai dengan kebutuhan guru\r\n4. Mempublikasikan karya siswa, guru, aktivitas sekolah di web sekolah\r\n5. Memberikan pelayanan dan bimbingan pada pustaka maya\r\n6. Menata koleksi pustaka dalam server pustaka maya sehingga mudah ditemukan', NULL, '2025-07-28', 9, 32),
(63, 'Syahril', 'Duta Baca', '1. Mendonasikan buku bacaan minimal setiap semester ke perpustakaan sekolah\r\n2. Mengampanyekan buku bacaan ke seluruh peserta didik dan masyarakat\r\n3. Mengadakan pembinaan minat baca\r\n4. Mengikuti berbagai kegiatan berkaitan dengan literasi dan perpustakaan', NULL, '2025-07-28', 9, 32),
(65, '1. Novi\r\n2. Imel\r\n3. Taskia\r\n4. Hans Castro', 'Laskar Perpustakaan', '1. Merencanakan dan melakukan perawatan bahan-bahan pustaka yang berada di perpustakaan alam dan sudut baca\r\n2. Memajang koleksi/bahan-bahan pustaka di perpustakaan alam dan sudut baca\r\n3. Menempatkan kembali koleksi/bahan-bahan pustaka ke dalam perpustakaan utama setelah jam pelayanan perpustakaan berakhir\r\n4. Melakukan pengembangan literasi di perpustakaan berdasarkan tupoksi masing-masing\r\n5. Mendokumentasikan segala aktivitas yang berada di perpustakaan alam dan sudut baca\r\n6. Membuat laporan bulanan penggunaan perpustakaan alam dan sudut baca', NULL, '2025-07-28', 9, 32),
(66, 'Program Jangka Pendek', '1. Menyediakan dan menghimpun bahan pustaka, informasi, sesuai kurikulum sekolah\r\n2. Menyediakan dan melengkapi fasilitas perpustakaan sesuai kebutuhan\r\n3. Mengolah dan mengorganisasikan bahan pustaka dengan sistem tertentu sehingga memudahkan penggunaannya\r\n4. Melaksanakan layanan perpustakaan yang kreatif, inovatif, serta menarik\r\n5. Meningkatkan minat baca murid, guru, dan staf tata laksana\r\n6. Pembuatan proposal permintaan buku/majalah/jurnal pada beberapa lembaga/instansi/penerbit tertentu\r\n7. Memelihara bahan pustaka agar tahan lama dan tidak cepat rusak\r\n8. Menerbitkan kartu perpustakaan bagi siswa, guru, dan staf tata laksana\r\n9. Menerbitkan berbagai administrasi perpustakaan (kartu buku, kantong, pelabelan, katalog buku, dll)\r\n10. Inventarisasi, klasifikasi, dan katalogisasi bahan pustaka\r\n11. Penerbitan surat tanda Bebas Perpustakaan (STBP) bagi siswa kelas XII sebagai syarat pengambilan ijazah\r\n12. Mengikuti beberapa lomba perpustakaan sekolah, baik tingkat kabupaten, provinsi, maupun nasional', NULL, NULL, '2025-07-28', 9, 33),
(67, 'Program Kerja Menengah', '1. Pembuatan buletin pendidikan\r\n2. Mengoptimalkan mading informasi dan mading kearifan lokal\r\n3. Mengembangkan perpustakaan kelas berbasis digital\r\n4. Mengoptimalkan pelayanan inklusi sosial hari Sabtu dan Minggu\r\n5. Mengembangkan kelas multiliterasi setiap kelas yang kaya akan informasi\r\n6. Melanjutkan kerja sama lintas instansi\r\n7. Membangun perpustakaan cabang di panti asuhan, taman rekreasi, daerah terpencil, dll\r\n8. Melanjutkan pembuatan proposal permintaan buku/majalah/jurnal pada beberapa lembaga/instansi/penerbit tertentu\r\n9. Mengoperasikan model literasi bergerak yaitu sepeda keliling (Spakling)', NULL, NULL, '2025-07-28', 9, 33),
(69, 'Program Jangka Panjang', '1. Merealisasikan kualitas dan kuantitas buku minimal 10.000 judul dengan 200.000 eksemplar pada tahun 2022–2026\r\n2. Mengoperasikan radio online\r\n3. Mengoperasikan Klinik Literasi\r\n4. Rancang bangun gedung perpustakaan baru\r\n5. Rancang bangun Geopark Digital\r\n6. Mengaktifkan sentral bisnis perpustakaan\r\n7. Membina masyarakat setempat dalam bentuk pelatihan guna meningkatkan kesejahteraan masyarakat\r\n8. Mengikuti berbagai pelatihan, bimtek, training, dll. berkaitan dengan peningkatan kompetensi pengelolaan perpustakaan\r\n9. Melanjutkan pembuatan proposal permintaan buku/majalah/jurnal pada beberapa lembaga/instansi/penerbit tertentu\r\n10. Mengembangkan produk inovatif dan kreatif perpustakaan secara berkeseimbangan', NULL, NULL, '2025-07-28', 9, 33),
(71, 'Visi & Misi', 'Dokumen Visi, Misi, Tujuan, dan Tugas', NULL, 'Dokumen_Visi,_Misi,_Tujuan,_dan_Tugas.png', '2025-07-28', 9, 34),
(72, 'Kepemilikan dan Desain Gedung/ruang Perpustakaan', '2', NULL, 'Kepemilikan_dan_Desain_1.jpg', '2025-07-28', 9, 15),
(73, 'Kepemilikan dan Desain Gedung/ruang Perpustakaan', '2', NULL, 'Kepemilikan_dan_Desain_2.jpg', '2025-07-28', 9, 15),
(74, 'Rak Buku', '62', NULL, 'Rak_Buku.jpg', '2025-07-28', 9, 35),
(75, 'Rak Terbitan Berkala', '10', NULL, 'Rak_Terbitan_Berkala.jpg', '2025-07-28', 9, 35),
(76, 'Rak Display', '6', NULL, 'Rak_Display.jpg', '2025-07-28', 9, 35),
(77, 'Komputer yang terhubung ke internet', '118', NULL, 'Komputer_yang_terhubung_ke_internet.png', '2025-07-28', 9, 18),
(78, 'Scanner &amp; Printer', '2', NULL, 'Scanner_Printer.jpg', '2025-07-28', 9, 18),
(79, 'Televisi', '4', NULL, 'Televisi.png', '2025-07-28', 9, 18),
(80, 'Proyektor &amp; Screen Proyektor', '7', NULL, 'Proyektor_Screen_Proyektor.png', '2025-07-28', 9, 18),
(81, 'Scan Barcode', '2', NULL, 'Scan_Barcode.jpg', '2025-07-28', 9, 18),
(82, 'DVD Player', '4', NULL, 'DVD_Player.png', '2025-07-28', 9, 18),
(83, 'Meja dan Kursi Baca', '59', NULL, 'Meja_dan_Kursi_Baca.jpg', '2025-07-28', 9, 19),
(84, 'Papan Pengumuman', '25', NULL, 'Papan_Pengumuman.jpg', '2025-07-28', 9, 19),
(85, 'Perangkat Komputer pengelolaan terhadap jumlah tenaga perpustakaan', '6', NULL, 'Perangkat_Komputer_pengelolaan_terhadap_jumlah_tenaga_perpustakaan.jpg', '2025-07-28', 9, 20),
(86, 'Perangkat Komputer Pemustaka', '118', NULL, 'Perangkat_Komputer_Pemustaka.jpg', '2025-07-28', 9, 20),
(87, 'Kapasitas kecepatan akses Internet (bandwith)', '20', NULL, 'Kapasitas_kecepatan_akses.jpg', '2025-07-28', 9, 20),
(88, 'Lemari', '30', NULL, 'Lemari.jpg', '2025-07-28', 9, 21),
(89, 'AC', '12', NULL, 'AC.png', '2025-07-28', 9, 21),
(90, 'CCTV', '13', NULL, 'CCTV.png', '2025-07-28', 9, 21),
(91, 'Pintu Darurat', '1', NULL, 'Pintu_Darurat.jpg', '2025-07-28', 9, 21),
(92, 'Alat Pemadam Api', '1', NULL, 'Alat_Pemadam_Api.jpg', '2025-07-28', 9, 21),
(93, 'Rambu-Rambu Perpustakaan', '17', NULL, 'Rambu-Rambu_Perpustakaan.jpg', '2025-07-28', 9, 21),
(94, 'Layanan Sirkulasi', 'Dalam layanan ini pemustaka yang sudah menjadi anggota perpustakaan dapat meminjam, mengembalikan, dan/atau memperpanjang peminjaman bahan pustaka yang masih dibutuhkan.', NULL, 'Layanan_Sirkulasi.jpg', '2025-07-28', 9, 29),
(95, 'Layanan Referensi', 'Layanan referensi adalah layanan yang berkaitan dengan bantuan pustakawan kepada pemustaka atau pemakai baik secara langsung maupun tidak langsung dalam mencari informasi dan memanfaatkan perpustakaan secara efektif.', NULL, 'Layanan_Referensi.jpg', '2025-07-28', 9, 29),
(96, 'Layanan Penelusuran Informasi', 'Layanan Penelusuran Informasi berbasis digital menggunakan Komputer maupun menggunakan Gadget, untuk memudahkan mencari Koleksi Perpustakaan. Penelusuran dapat menggunakan layanan online melaui lib.smklabor.sch.id', NULL, 'Layanan_Penelusuran_Informasi.jpg', '2025-07-28', 9, 29),
(97, 'Layanan Bimbingan Literasi', 'Pelayanan literasi informasi adalah program bimbingan yang dirancang untuk mengajari pemustaka agar memperoleh informasi yang mereka butuhkan dengan cepat dan efektif, mampu menggunakan sarana informasi yang disediakan oleh perpustakaan serta dapat mengkases informasi secara efisien.', NULL, 'Layanan_Bimbingan_Literasi.jpg', '2025-07-28', 9, 29),
(98, 'Layanan Penyediaan Dokumen', 'Layanan penyediaan dokumen adalah layanan yang berkaitan dengan permintaan dokumen tertentu yang dibutuhkan oleh pemustaka', NULL, 'Layanan_Penyediaan_Dokumen.jpg', '2025-07-28', 9, 29),
(99, 'Layanan Silang Layan', 'Layanan silang layan diartikan sebagai pemberian jasa layanan antara dua perpustakaan atau lebih. Prinsip utama dalam layanan ini yaitu saling berbagi informasi, bertukar informasi dan sumber informasi antar perpustakaan.', NULL, 'Layanan_Silang_Layan.jpg', '2025-07-28', 9, 29),
(100, 'Layanan Ekstensi', 'Layanan ekstensi merupakan layanan yang diberikan kepada masyarakat di luar lingkungan instansi. Layanan ini sebagai bentuk komitmen perpustakaan dalam gerakan literasi', NULL, 'Layanan_Ekstensi.jpg', '2025-07-28', 9, 29),
(101, 'Layanan Print dan Foto Copy', 'Layanan yang disediakan untuk kepentingan pemustaka dalam menggandakan dokumen', NULL, 'Layanan_Print_dan_Foto_Copy.jpg', '2025-07-28', 9, 29),
(102, 'Layanan Meja Informasi', 'Layanan meja informasi perpustakaan adalah layanan yang disediakan untuk membantu pemustaka (pengguna perpustakaan) dalam mendapatkan informasi yang mereka butuhkan terkait penggunaan perpustakaan. Layanan ini bertujuan untuk mempermudah akses informasi tentang koleksi perpustakaan, cara peminjaman dan pengembalian buku, aturan perpustakaan, serta bantuan lainnya seperti pencarian referensi atau sumber daya literasi tertentu.', NULL, NULL, '2025-07-28', 9, 30),
(103, 'Layanan Bimbingan Penggunaan Koleksi', 'Layanan Bimbingan Penggunaan Koleksi adalah layanan yang disediakan oleh perpustakaan untuk membantu pemustaka (pengguna perpustakaan) dalam memanfaatkan koleksi perpustakaan secara optimal. Layanan ini bertujuan agar pemustaka dapat menemukan, mengakses, dan menggunakan sumber informasi yang tersedia sesuai kebutuhan mereka, baik itu untuk keperluan belajar, penelitian, maupun referensi pribadi.', NULL, NULL, '2025-07-28', 9, 30),
(104, 'Layanan Penelusuran', 'Layanan Penelusuran Perpustakaan adalah layanan yang dirancang untuk membantu pemustaka (pengguna perpustakaan) dalam mencari dan menemukan informasi yang mereka butuhkan dari koleksi perpustakaan. Layanan ini dapat mencakup koleksi cetak dan digital, seperti buku, jurnal, e-book, artikel ilmiah, dan bahan referensi lainnya. Dengan adanya layanan penelusuran ini, pemustaka dapat lebih mudah mengakses sumber daya yang relevan untuk penelitian, pembelajaran, atau kebutuhan informasi lainnya.', NULL, NULL, '2025-07-28', 9, 30),
(105, 'Layanan Konsultasi', 'Layanan Konsultasi Perpustakaan adalah layanan yang disediakan oleh perpustakaan untuk membantu pemustaka (pengguna perpustakaan) dalam memecahkan masalah atau menjawab pertanyaan yang terkait dengan penggunaan perpustakaan, penelitian, atau akses informasi. Layanan ini bertujuan untuk memberikan panduan langsung dan personal, baik untuk penelusuran literatur, penggunaan koleksi perpustakaan, maupun bimbingan dalam mengerjakan tugas akademik atau penelitian.', NULL, NULL, '2025-07-28', 9, 30),
(106, 'Layanan kesiagaan informasi', 'Layanan Kesiagaan Informasi Perpustakaan adalah layanan yang bertujuan untuk memberikan informasi terbaru kepada pemustaka secara proaktif. Layanan ini membantu pemustaka tetap up-to-date dengan publikasi, penelitian, dan perkembangan baru di bidang minat mereka.', NULL, NULL, '2025-07-28', 9, 30),
(107, 'Layanan umum terkait perpustakaan dan sumber informasi', 'Layanan umum terkait perpustakaan dan sumber informasi mencakup berbagai layanan yang disediakan untuk membantu pemustaka dalam mengakses, menggunakan, dan memanfaatkan koleksi serta fasilitas perpustakaan secara efektif. Salah satu layanan utama adalah layanan sirkulasi, yang mencakup peminjaman, pengembalian, dan perpanjangan waktu pinjaman buku serta bahan pustaka lainnya. Pemustaka dapat meminjam koleksi perpustakaan, baik fisik maupun digital, melalui sistem ini.', NULL, NULL, '2025-07-28', 9, 30),
(108, 'Pendirian Perpustakaan', NULL, NULL, 'Pendirian_Perpustakaan.jpg', '2025-07-28', 9, 26),
(109, 'Pendirian Perpustakaan', NULL, NULL, 'Pendirian_Perpustakaan_2.jpg', '2025-07-28', 9, 26),
(110, 'Backdrop meja sirkulasi/layanan', NULL, NULL, 'Scan_Barcode.jpg', '2025-07-28', 9, 28),
(111, 'Brosur Perpustakaan', NULL, NULL, 'Dokumen_Visi,_Misi,_Tujuan,_dan_Tugas.png', '2025-07-28', 9, 28),
(112, 'Banner/flyer perpustakaan', NULL, NULL, 'Banner_perpustakaan.jpg', '2025-07-28', 9, 28),
(113, 'Website perpustakaan', NULL, NULL, 'Website_perpustakaan.jpg', '2025-07-28', 9, 28),
(114, 'Kartu anggota perpustakaan', NULL, NULL, 'Kartu_anggota_perpustakaan_1.jpg', '2025-07-28', 9, 28),
(115, 'Kartu anggota perpustakaan', NULL, NULL, 'Kartu_anggota_perpustakaan_2.jpg', '2025-07-28', 9, 28),
(116, 'Media sosial milik perpustakaan', NULL, NULL, 'Media_sosial_milik_perpustakaan.png', '2025-07-28', 9, 28),
(117, 'Kalender', NULL, NULL, 'Kalender.jpg', '2025-07-28', 9, 28),
(118, 'Running Text', NULL, NULL, 'Running_Text.jpg', '2025-07-28', 9, 28),
(119, 'Sumber Anggaran', 'Perpustakaan Digital M.Zein terlibat aktif dalam menunjang mutu pendidikan dalam bentuk dukungan. Perpustakaan menyediakan berbagai koleksi, fasilitas sesuai dengan kurikulum pendidikan, serta menjalankan berbagai program yang nantinya akan mendukung pembentukan pribadi. \r\n	Dalam pengembangan program perpustakaan sekolah, Khususnya pengadaan koleksi bacaan yang bermutu dan fasilitas yang memadai, maka diperlukan implementasi UU No.43/2007 tentang Perpustakaan, Khususnya dalam Pengalokasian dana minimal 5% dari total anggaran Pendapan dan Belanja Sekolah (APBS) untuk pengembangan perpustakaan sekolah. Selain itu, Pemerintah juga menyiapkan sejumlah dana untuk pengembangan sekolah di indonesia, termasuk diantaranya diperuntukkan bagi perpustakaan yakni Dana Bos. \r\n	Dalam Pendaftaran keanggotaan perpustakaan, anggota perpustakaan baru akan mendapatkan kartu anggota secara gratis, namun bagi anggota lama yang kehilangan kartu dan ingin membuat ulang, maka akan dikenakan biaya sebesar Rp. 10.000, Pembayaran kartu anggota ini menjadi sumber anggaran pengembangan perpustakaan. Perpustakaan juga bekerjasama dengan perpustakaan lainnya dalam layanan sirkulasi dan tukar-menukar koleksi perpustakaan. Selain itu, perpustakaan menerima hibah buku dari masyarakat disekitar lingkungan yaitu staff, akademik, komite, walimurid dan masyarakat sekitar.', NULL, NULL, '2025-07-28', 9, 34),
(120, 'Jumlah Dana Partisipasi Masyarakat/Alumni yang tidak mengikat Rerata Per Tahun dalam 3 (Tiga) Tahun Terakhir', 'Hibah Buku dari Tenaga Pendidik dan Non-Tendik\r\nHibah Buku yang diterima oleh Perpustakaan Digital M.Zein berasal dari koleksi pribadi pimpinan yayasan, direktur pendidikan, kepala sekolah, para guru dan staf', NULL, 'Buku.jpg', '2025-07-28', 9, 34),
(121, 'Penerapan TIK Untuk Pengelolaan Perpustakaan', 'Pengadaan', NULL, 'Pengadaan.png', '2025-07-28', 9, 34),
(122, 'Penerapan TIK Untuk Pengelolaan Perpustakaan', 'Pengolahan', NULL, 'Pengolahan.png', '2025-07-28', 9, 34),
(123, 'Penerapan TIK Untuk Pengelolaan Perpustakaan', 'Sirkulasi', NULL, 'Sirkulasi.png', '2025-07-28', 9, 34),
(124, 'Penerapan TIK Untuk Pengelolaan Perpustakaan', 'OPAC/Penelusuran', NULL, 'Penelusurab.png', '2025-07-28', 9, 34),
(125, 'Penerapan TIK Untuk Pengelolaan Perpustakaan', 'Keanggotaaan', NULL, 'Anggota.png', '2025-07-28', 9, 34),
(126, 'Penerapan TIK Untuk Pengelolaan Perpustakaan', 'Promosi', NULL, 'Promosi.jpg', '2025-07-28', 9, 34),
(128, 'Tingkat Kegemaran Membaca', NULL, NULL, 'KOMPONEN_8.docx', '2025-07-28', 9, 36),
(130, 'Indeks Pembangunan Literasi Sekolah', NULL, NULL, 'KOMPONEN_9.docx', '2025-07-28', 9, 37),
(131, 'Penyiaran radio', '', NULL, 'Penyiaran_radio.jpg', '2025-07-29', 9, 24),
(134, 'KALIS (Kamis Literasi)', '', NULL, 'KALIS_(Kamis_Literasi).jpg', '2025-07-29', 9, 24),
(137, 'Mading', '', NULL, 'Mading.jpg', '2025-07-29', 9, 24),
(138, 'Duta Baca,', '', NULL, 'Duta_Baca,.jpg', '2025-07-29', 9, 24),
(139, 'Membuat Klipping', '', NULL, 'Membuat_Klipping.jpg', '2025-07-29', 9, 24),
(140, 'Membuat Puisi Dan Pantun', '', NULL, 'Membuat_Puisi_Dan_Pantun.jpg', '2025-07-29', 9, 24),
(141, 'Kunjungan Perpustakaan', '', NULL, 'Kunjungan_Perpustakaan.jpg', '2025-07-29', 9, 24),
(142, 'Membuat Berita Di Mading Online', '', NULL, 'Membuat_Berita_Di_Mading_Online.png', '2025-07-29', 9, 24),
(143, 'Ekoliterasi Digital', 'Ekolitersi digital digunakan untuk mencari informasi berkaitan dengan ekosistem flora yang ada di lingkungan SMK Labor Binaan FKIP UNRI Pekanbaru. Untuk mencarinya cukup memindai kode batang yang ada digantungkan di pohon.', NULL, NULL, '2025-07-29', 9, 25),
(144, 'Sudut Inspirasi Digital', 'Sudut inspirasi digital digunakan untuk mencari inspirasi serta mencari buku. Disudut ini sudah tersedia kode batang yang siap ditelusuri dengan kode pemindai.', NULL, NULL, '2025-07-29', 9, 25),
(145, 'Literasi Budaya Digital', 'Literasi budaya digital digunakan untuk mencari kajian berkaitan dengan budaya melayu. Untuk menacrinya cukup memindai kode batang yang sudah tertera. Maka, akan muncul berbagai informasi berkaitan dengan budaya melayu.', NULL, NULL, '2025-07-29', 9, 25),
(146, 'Pustaka Alam', 'Pustaka alam menyediakan berbagai buku dengan keunikan digantung, setiap pembaca dapat membaca buku yang digantung dipohon kemudian meletakannya Kembali setelah digunakan.', NULL, NULL, '2025-07-29', 9, 25),
(147, 'Balai Literasi', 'Balai literasi digunakan untuk berdiskusi, membaca, serta mencari informasi. Dibalai literasi tersedia buku yang siap untuk dibaca. ', NULL, NULL, '2025-07-29', 9, 25),
(148, 'Pojok Ria Labor (Labschool land happy)', 'Pojok ria labor digunakan untuk berswaforo sekaligus berdiskusi. Area ditata khusus agar saat berdiskusi berjalan lancar karena latarnya yang menarik.', NULL, NULL, '2025-07-29', 9, 25),
(149, 'Radio Labschool', 'Labschool Time. Di sini, kamu bisa berswafoto   dan juga scan barcode untuk mendapatkan informasi lengkap tentang berbagai kegiatan dan fasilitas Labschool.', NULL, NULL, '2025-07-29', 9, 25),
(150, 'Mading Online', 'Mading Online adalah majalah digital dinding SMK Labor yang memberikan informasi terkini tentang kegiatan sekolah, prestasi siswa-siswi, serta berbagai update menarik dari perpustakaan SMK Labor. Temukan juga cerita inspiratif tentang para juara yang berhasil mengharumkan nama sekolah.', NULL, NULL, '2025-07-29', 9, 25),
(151, 'Go Book', 'Go Book adalah platform digital yang memudahkan pengguna untuk mengakses, membaca, dan menjelajahi berbagai koleksi buku secara praktis. Dengan Go Book, pengguna dapat menikmati kemudahan membaca buku secara online, mencari referensi.', NULL, NULL, '2025-07-29', 9, 25),
(152, 'Literasi Covid', 'Literasi Covid adalah infromasi yang mengenai covid 19 yang terjadi pada tahun 2020 ', NULL, NULL, '2025-07-29', 9, 25),
(153, 'Kursi Lingkar Mahoni', 'Kursi lingkar mahoni tersedia di perpustakaan utama SMK Labor Binaan FKIP UNRI Pekanbaru dengan bahan dasar potongab kayu yang telah ditebang diperkarangan SMK Labor. Kayu ini ditata khusus dan diberi warna agar terkesan menarik  dan elegan. Kursi ini kerap digunakan pelajar untuk membaca.', NULL, NULL, '2025-07-29', 9, 38),
(154, 'Kursi Panjang Mahoni', 'Kursi panjang mahoni juga dibuat dari potongan kayu yang telah ditebang di perkarangan SMK Labor. Letak kursi panjang ini di Pustaka alam atau disebut juga taman literasi. Letaknya tersebar disepanjang literasi, sehingga memudahkan pemustaka duduk dan menikmati alam terbuka.   ', NULL, NULL, '2025-07-29', 9, 38),
(155, 'Gurindam Dua Belas', 'Gurindam dua belas ditata khusus bernuansa melayu di perpustakaan utama SMK Labor. Gurindam ini mahakarya dari pengarang melayu yang tershoor yaitu Raja Ali Haji. Kerap digunakan pelajar untuk belajar dalam hal mendalami makna dari gurindam tersebut.', NULL, NULL, '2025-07-29', 9, 38),
(156, 'Kursi Swafoto', 'Kursi Swafoto memang ditata secara khusus untuk menarik pemustaka sehingga pemustaka betah di perpustakaan. Setalah membaca atau sedang membaca pemustaka bisa duduk dikursi sekaligaus berswafoto. Apalagi latar swafoto sangat menarik.', NULL, NULL, '2025-07-29', 9, 38),
(157, 'Rumah Kaca Literasi', 'Rumah kaca literasi berada di taman literasi, fungsi rumah kaca literasi untuk memajang buku baru sehingga memudahkan pembaca mengetahui koleksi buku baru yang ada di perpustakaan digiyal M.Zein SMK Labor Binaan FKIP UNRI Pekanbaru.', NULL, NULL, '2025-07-29', 9, 38),
(158, 'Bendera Indonesia', 'Arsip Bendera Indonesia dari tahun 1998 kini diletakkan di Ruangan Hang Nadim sebagai bagian dari koleksi sejarah penting. Arsip ini menggambarkan perjalanan bendera Indonesia dari tahun 1998 sejak berdirinya SMK Labor Binaan FKIP UNRI', NULL, NULL, '2025-07-29', 9, 38),
(159, 'Pohon request buku', 'pohon Request Buku Perpustakaan adalah salah satu keunikan perpustakaan SMK Labor. Di sini, kamu bisa menggantungkan permintaan buku yang ingin dibaca, dan perpustakaan akan berusaha memenuhi permintaanmu. Inisiatif kreatif ini mengajak siswa-siswi untuk lebih aktif dalam menentukan koleksi bacaan mereka, menjadikan perpustakaan sebagai ruang belajar yang interaktif dan dinamis', NULL, NULL, '2025-07-29', 9, 38),
(160, 'Klinik Literasi', 'Klinik Literasi adalah inovasi perpustakaan SMK Labor yang hadir untuk melayani siswa-siswi dengan berbagai &quot;keluhan literasi&quot;, seperti demam panggung, kurang percaya diri, kurang kreatif dalam menulis puisi atau cerpen, serta hobi menulis namun enggan berkarya. Klinik Literasi membantu siswa mengatasi tantangan-tantangan ini dengan memberikan bimbingan, motivasi, dan dukungan agar mereka dapat lebih percaya diri, kreatif, dan produktif dalam mengembangkan bakat serta minat literasi mereka', NULL, NULL, '2025-07-29', 9, 38),
(161, 'Rak buku CPU Komputer', 'Rak Buku dari CPU Komputer adalah inovasi unik perpustakaan SMK Labor yang memanfaatkan CPU komputer bekas sebagai tempat penyimpanan buku.', NULL, NULL, '2025-07-29', 9, 38),
(162, 'Rak buku dari replika candi muara takus', 'Rak Replika Candi Muara Takus di perpustakaan adalah sebuah inovasi desain interior perpustakaan yang memadukan fungsi rak buku dengan elemen arsitektur replika Candi Muara Takus. Rak ini tidak hanya berfungsi sebagai tempat penyimpanan buku, tetapi juga sebagai sarana edukasi dan penghormatan terhadap warisan budaya Indonesia.', NULL, NULL, '2025-07-29', 9, 38),
(163, 'Infaq Pantun', ' &quot;Infak Pantun&quot; di Perpustakaan SMK Labor adalah sebuah program kreatif yang mengajak siswa serta pengunjung perpustakaan untuk berkontribusi dengan cara menyumbangkan pantun karya mereka. Setiap pengunjung yang datang diundang untuk menyampaikan pantun yang mereka ciptakan', NULL, NULL, '2025-07-29', 9, 38),
(164, 'Mesin Penyosa buku', 'Untuk meletakkan buku setalah dibaca oleh pengunjung perppustakaan', NULL, NULL, '2025-07-29', 9, 38);

-- --------------------------------------------------------

--
-- Table structure for table `beritakm`
--

CREATE TABLE `beritakm` (
  `berita_id` int(12) NOT NULL,
  `judul_berita` varchar(150) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `link_video` text DEFAULT NULL,
  `tanggal_publish` date NOT NULL,
  `user_id` int(12) NOT NULL,
  `kategori_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beritakm`
--

INSERT INTO `beritakm` (`berita_id`, `judul_berita`, `isi_berita`, `gambar`, `link_video`, `tanggal_publish`, `user_id`, `kategori_id`) VALUES
(4, 'SMK Labor Ditetapkan Sebagai SMK Pusat Keunggulan Bidang Teknologi Digital', 'Dalam pengumuman resmi dari Direktorat SMK Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi, SMK Labor Pekanbaru ditetapkan sebagai salah satu SMK Pusat Keunggulan (PK) di bidang teknologi digital tahun 2025.\r\n\r\nSebagai SMK PK, SMK Labor akan mendapat berbagai fasilitas dan pendampingan khusus, termasuk:\r\n\r\nRevitalisasi ruang praktik dan laboratorium komputer\r\n\r\nProgram Teaching Factory berbasis kebutuhan industri\r\n\r\nSertifikasi internasional untuk siswa dan guru (contoh: Cisco, Microsoft)\r\n\r\nPelatihan guru dengan mitra industri nasional\r\n\r\nProgram ini merupakan bagian dari strategi besar untuk mendorong lulusan SMK siap kerja dan mampu bersaing secara global.\r\n\r\n“Kami akan memanfaatkan kepercayaan ini sebaik mungkin. Target kami adalah menjadikan SMK Labor sebagai rujukan nasional di bidang vokasi teknologi,” kata Wakil Kepala Sekolah Bidang Kurikulum, Mulyadi, S.Kom.\r\n\r\nPenetapan ini juga akan membuka lebih banyak peluang kerja sama antara SMK Labor dengan industri IT lokal dan internasional.', 'Logo_Smk_Labor.png', '', '2025-07-16', 9, 6),
(5, 'Pencapaian Perpustakaan SMK Labor', 'Perpustakaan SMK Labor telah meraih berbagai prestasi, antara lain:\r\n\r\nJuara 1 Lomba Inovasi Perpustakaan Digital Tingkat Provinsi Riau 2025\r\n\r\nKepala perpustakaan berhasil meraih Penghargaan Pustakawan Teladan Nasional 2024\r\n\r\nMendapat Penghargaan Perpustakaan Ramah Anak dan Inklusi Sosial 2023\r\n\r\nPrestasi ini menunjukkan komitmen perpustakaan dalam menyediakan layanan literasi berkualitas dan inovatif bagi siswa dan guru SMK Labor.', '20210916041002-2402c4ff-me.jpg', NULL, '2025-07-16', 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(12) NOT NULL,
  `judul_faq` varchar(150) NOT NULL,
  `isi1` text NOT NULL,
  `gambar1` text DEFAULT NULL,
  `isi2` text DEFAULT NULL,
  `gambar2` text DEFAULT NULL,
  `isi3` text DEFAULT NULL,
  `gambar3` text DEFAULT NULL,
  `isi4` text DEFAULT NULL,
  `gambar4` text DEFAULT NULL,
  `isi5` text DEFAULT NULL,
  `gambar5` text DEFAULT NULL,
  `kategori_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `judul_faq`, `isi1`, `gambar1`, `isi2`, `gambar2`, `isi3`, `gambar3`, `isi4`, `gambar4`, `isi5`, `gambar5`, `kategori_id`, `user_id`) VALUES
(12, 'Bagaimana cara menambahkan data pelatihan?', 'Login sebagai Admin atau Pustakawan.', 'e170fe5f71ac28d3d4fb0a15b36dd283.png', 'Klik menu “KM Pelatihan”.', '417241d4f356680743154f864bb490bb.png', 'Tekan tombol “Tambah Data”.', '7c978a0afd8a76006e00168b7aebebf7.png', 'Isi kolom judul, penyelenggara, tanggal, deskripsi, dan unggah file.', '72dd2510bf347a3240a47380ee995057.png', 'Klik “Simpan”.', NULL, 11, 9),
(13, 'Bagaimana cara mengedit data pelatihan', 'Masuk ke menu “KM Pelatihan”.', 'b90e4db83de326cf81253f6d2fba4367.png', 'Temukan data yang ingin diedit.', '5b6146b3420ee65133a0738e001e2978.png', 'Klik tombol “Edit”.', '345ec2b42320899e1198a4774cda82e8.png', 'Ubah informasi sesuai kebutuhan.', 'a1910d65dcd50c02e73df1553b02b71d.png', 'Klik “Update”.', NULL, 11, 9),
(14, 'Bagaimana cara menghapus data pelatihan?', 'Masuk sebagai Admin atau Pustakawan.', '334fd158a425e5d8078ad2569f5972d7.png', 'Klik “KM Pelatihan”.', 'e18979c53665a7873bf8e377bc435567.png', 'Temukan data → klik “Hapus”.', '1255ffd8329bd122fc522d82d6f2e4b1.png', 'Konfirmasi penghapusan.', 'cf1b391f7d947ae8d040a71811dc4ba3.png', 'Data akan terhapus dari sistem.', NULL, 11, 9),
(15, 'Bagaimana cara melihat daftar pelatihan yang telah diunggah?', 'Login ke sistem.', NULL, 'Akses menu “KM Pelatihan”.', '74915d910be4bcd4cf260540f142c896.png', 'Daftar pelatihan akan muncul otomatis.', '4b1218c782101afcc628ba2ecc59b1e3.png', 'Klik “Lihat” untuk detail.', '463b9c8494a2f0f43b5fe08f799f6c03.png', 'Klik “Download” jika tersedia.', NULL, 11, 9),
(17, 'Siapa saja yang bisa melihat data pelatihan?', 'Semua peran: Admin, Pustakawan, dan Pemustaka bisa melihat pelatihan yang telah dipublikasikan.', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 11, 9),
(18, 'Bagaimana cara menambahkan dokumen pengetahuan?', 'Login sebagai Admin atau Pustakawan.', '31d87c423da3197db0a0758a22e45c00.png', 'Klik “KM Pengetahuan”.', '6041b592acbaff51474d2c29faf3d888.png', 'Tekan “Tambah Data”.', '09fde72df9eff6e525ae6139a58a1c3a.png', 'Isi judul, deskripsi, dan unggah file', '3046518f4309dba3ef0ff2e6a1d831bf.png', 'Klik “Simpan”.', NULL, 13, 9),
(19, 'Bagaimana cara mengedit dokumen pengetahuan?', 'Akses menu “KM Pengetahuan”.', '367eeb6f77101a95240b8a354e25afc4.png', 'Cari dokumen → klik “Edit”.', '9df5fb83e2055e535d035a024d1a164c.png', 'Lakukan perubahan.', '32e33df63db551d249d55e622d1524ad.png', 'Klik “Update”.', NULL, '', NULL, 13, 9),
(20, 'Bagaimana cara menghapus dokumen pengetahuan?', 'Masuk ke “KM Pengetahuan”.', '95f544f76ab96038626a52ce9a0d044a.png', 'Pilih dokumen → klik “Hapus”.', 'eb6804395e5b5e99797480f5838ff911.png', 'Konfirmasi penghapusan.', 'bf34c25d4103faba61704768c546e90e.png', '', NULL, '', NULL, 13, 9),
(21, 'Apakah pengguna bisa mengunduh dokumen pengetahuan?', 'Ya. Semua pengguna bisa mengklik tombol “Download” pada setiap dokumen yang tersedia', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 13, 9),
(22, 'Apa saja jenis dokumen yang bisa diunggah?', 'SOP, panduan kerja, template laporan, juknis, dan materi referensi lainnya.', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 13, 9),
(23, 'Bagaimana cara membuat berita baru?', 'Login sebagai Admin/Pustakawan.', 'f09c4feb1168a644617d911d1f865621.png', 'Klik menu “KM Berita”.', '18eef02a9811ddf6c074f1b2fa43967d.png', 'Pilih “Tambah Berita”.', '8e2e58eb9f3a5e8376ef118b141b6449.png', 'Isi judul, isi berita, tanggal, dan gambar (opsional).', 'ea439bfb57010ff3e4b0d586e7eae865.png', 'Klik “Simpan”.', NULL, 9, 9),
(24, 'Bagaimana cara mengedit berita yang sudah diposting?', 'Masuk ke “KM Berita”.', 'b689929a11f82d86c7868ad7bc93059f.png', 'Pilih berita → klik “Edit”.', '200e3d35e33f063877801b12aa9b361f.png', 'Ubah informasi.', '42eef9000dbc55ebdadf8b1e357fa107.png', 'klik \"Simpan\"', NULL, '', NULL, 9, 9),
(25, 'Bagaimana cara menghapus berita?', 'Masuk sebagai Admin atau Pustakawan.', 'eda0b36f671d5872753932d4ecd28ef1.png', 'Akses “KM Berita”.', '91de1c9e401c7ea52131b565543c4e15.png', 'Klik “Hapus” pada berita.', '579385b4c211359b2c9b59146000258b.png', 'Konfirmasi penghapusan.', '492ebbc932a9a864c8caf30fea5905a4.png', '', NULL, 9, 9),
(26, 'Apakah berita langsung tampil setelah disimpan?', 'Ya, berita otomatis tampil untuk semua pengguna setelah disimpan.', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 9, 9),
(27, 'Siapa yang bisa membaca berita?', 'Semua peran (Admin, Pustakawan, Pemustaka) bisa membaca berita yang tersedia.', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 9, 9),
(28, 'Bagaimana cara membuat thread baru?', 'Login ke sistem.', '091a845dfd362ee26a22f530b0bc9cfe.png', 'Klik menu “Forum”.', '71fd16dd262b6d60bc588e84bcad5bf0.png', 'Pilih “Tambah \".', '92e01c41448641af57007f09e17c1dc5.png', 'Isi judul dan isi diskusi.', '0413fdfff32da022e0311263c11429d8.png', 'Klik “Simpan”.', NULL, 10, 9),
(29, 'Bagaimana cara membalas thread?', 'Masuk ke thread yang ingin dibalas.', NULL, 'Tulis balasan di kolom komentar.', '9d40965910d6161eaca328ee56b1c621.png', 'Klik “Kirim”.', NULL, '', NULL, '', NULL, 10, 9),
(30, 'Bagaimana cara menghapus thread yang dibuat?', 'Temukan thread yang Anda buat.', NULL, 'Klik tombol “Hapus”.', 'd4a20bc7f7c77d0f8cffb80277314dd8.png', 'Konfirmasi untuk menghapus thread.', '59ca7bc32e69258a8e409914eca3668e.png', '', NULL, '', NULL, 10, 9),
(31, 'Siapa saja yang bisa membuat thread?', 'Semua pengguna yang telah login: Admin, Pustakawan, dan Pemustaka.', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 10, 9),
(32, 'Apakah thread bisa dilihat oleh semua pengguna?', 'Ya, semua pengguna dapat melihat dan membalas thread yang tersedia.', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 10, 9),
(33, 'Bagaimana cara menambahkan dokumen akreditasi?', 'Login sebagai Admin atau Pustakawan.', 'ccce42699f97c8ad114668358262ce2c.png', 'Masuk ke menu “Akreditasi”.', '08d24bfaac4a81bfd6f8a40eb9f1a720.png', 'Pilih komponen → klik “Tambah”.', '9e88fb78fd4c1e9df38c43cedb88cad6.png', 'Unggah dokumen dan isi keterangannya.', '2e88c20d92f43a8cefb08a11c817f210.png', 'Klik “Simpan”.', NULL, 12, 9),
(34, 'Bagaimana cara mengedit data akreditasi?', 'Buka komponen akreditasi.', 'b1e6702bd9831a739f8fe755e68e3441.png', 'Klik “Edit” pada dokumen.', '5d9258febce0edb1e1e5cc2ee4ff8d49.png', 'Lakukan perubahan → klik “Update”.', '0563a0c89bdf6fcee808797732c728db.png', '', NULL, '', NULL, 12, 9),
(35, 'Bagaimana cara menghapus dokumen akreditasi?', 'Akses menu “Akreditasi”.', 'dbc3eecdb3c3216978ea290e9684bfe5.png', 'Pilih dokumen → klik “Hapus”.', 'a87a19304ddcce8ac1622038c5ac70b4.png', 'Konfirmasi untuk menghapus.', 'bfa0e14ed1d8f3b290dc1cea3ec36e59.png', '', NULL, '', NULL, 12, 9),
(36, 'Siapa yang bisa mengelola data akreditasi?', 'Hanya Admin dan Pustakawan. Pemustaka tidak memiliki akses.', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 12, 9),
(37, 'Apakah data akreditasi bisa diunduh?', 'Ya, jika dokumen bersifat publik dalam tim, dapat diunduh oleh sesama Admin/Pustakawan.\r\n', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forum_id` int(12) NOT NULL,
  `judul_forum` varchar(150) NOT NULL,
  `isi_forum` text NOT NULL,
  `gambar` varchar(150) DEFAULT NULL,
  `tanggal_dibuat` date NOT NULL,
  `user_id` int(12) NOT NULL,
  `komunitas_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `judul_forum`, `isi_forum`, `gambar`, `tanggal_dibuat`, `user_id`, `komunitas_id`) VALUES
(23, 'Genre Buku Favorit Anak Sekolah Sekarang, Masih pada Baca Buku?', 'Anak-anak sekolah sekarang masih suka baca buku gak sih?\r\nKalau iya, genre favoritnya apa? Ternyata ini beberapa yang paling sering muncul:', NULL, '2025-07-30', 2, 5),
(24, 'Apasih Penyebab Anak Sekolah Sekarang Jarang Membaca Buku?', 'Zaman dulu, baca buku jadi hiburan utama.\r\nSekarang? Banyak siswa lebih pilih scroll HP daripada buka buku.\r\nKenapa ya bisa begitu? Ini beberapa alasannya:\r\n\r\nGadget Lebih Menarik \r\nScroll TikTok 5 menit = langsung ketawa\r\nBaca buku 5 menit = ngantuk\r\n\r\nKonten visual &amp; cepat menang banyak\r\n\r\nBuku Dianggap Ngebosenin \r\nBanyak buku di sekolah terlalu berat, kurang relevan.\r\nJarang ada yang bahas hal sehari-hari atau yang relate sama anak sekarang.\r\n\r\nMinim Akses Buku yang Seru \r\nMasih banyak perpustakaan isinya buku lama, robek, dan gak update.\r\nAnak jadi gak tertarik buat eksplor.\r\n\r\nGak Dibiasain dari Kecil\r\nMinat baca gak muncul tiba-tiba.\r\nKalau dari kecil gak dibiasakan, besar ya makin males baca.\r\n\r\nTekanan Akademik \r\nPR numpuk, tugas terus.\r\nMereka baca buku pelajaran aja udah capek, apalagi buku tambahan?\r\n\r\nJadi, bukan anak-anaknya yang salah.\r\nKadang lingkungan &amp; sistem juga kurang dukung mereka buat suka baca.', NULL, '2025-07-30', 2, 5),
(25, 'Metode Belajar yang Gak Bikin Ngantuk', 'Teman Teman Disini Apa Aja sih caranya biar bisa belajar terus menrus tapi gak ngantuk dan materi yang dipelajari itu masuk ke otak, Aku aja kalo baca buku bentar udah pusing', NULL, '2025-07-30', 3, 5),
(26, 'Apa Yang Diperlukan Perpustakaan Tercinta Kita Ini Untuk Menjadi Lebih Baik Dan Menarik', 'Coba dong beri jawaban dari teman teman sekalian', NULL, '2025-07-30', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(12) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `jenis_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `jenis_kategori`) VALUES
(5, 'Pelatihan', 'Pelatihan'),
(6, 'Berita', 'Berita'),
(7, 'SOP Penjaminan Mutu', 'Pengetahuan'),
(9, 'FAQ - KM Berita', 'FAQ'),
(10, 'FAQ - Fitur Forum Diskusi', 'FAQ'),
(11, 'FAQ - KM Pelatihan', 'FAQ'),
(12, 'FAQ - Fitur Akreditasi Perpustakaan', 'FAQ'),
(13, 'FAQ - KM Pengetahuan', 'FAQ'),
(14, 'Komponen Kelola', 'Komponen'),
(15, 'Gedung / Ruang', 'Sarana Prasarana'),
(16, 'Fasilitas Fisik Perpustakaan', 'Sarana Prasarana'),
(17, 'Pembelajaran', 'Pelatihan'),
(18, 'Peralatan Multidemida', 'Sarana Prasarana'),
(19, 'Perlengkapan Layanan Perpustakaan', 'Sarana Prasarana'),
(20, 'Perlengkapan Teknologi Informasi dan Komunikasi', 'Sarana Prasarana'),
(21, 'Sarana Keamanan Gedung dan Koleksi Perpustakaan', 'Sarana Prasarana'),
(22, 'Rambu-rambu Perpustakaan', 'Sarana Prasarana'),
(24, 'Program/Kegiatan Inovasi dan Kreativitas Perpustakaan', 'Inovasi Dan Kreativitas'),
(25, 'KARYA INOVASI DAN KREATIVITAS PERPUSTAKAAN', 'Inovasi Dan Kreativitas'),
(26, 'Document', 'Pendirian'),
(28, 'NPP', 'Pencantuman NPP'),
(29, 'Pelayanan Perpustakaan M.Zein', 'Pelayanan'),
(30, 'Layanan Referensi', 'Pelayanan'),
(31, 'Pustakawan', 'Tenaga'),
(32, 'Struktur Organisasi', 'Struktur Organisasi'),
(33, 'Program', 'Program Perpustakaan'),
(34, 'Pengelolaan', 'Pengelolaan'),
(35, 'Perlengkapan Penyimpanan Koleksi', 'Sarana Prasarana'),
(36, 'Tingkat Kegemaran Membaca', 'Tingkat Kegemaran Membaca'),
(37, 'Indeks Pembangunan Literasi Sekolah', 'Indeks Literasi'),
(38, 'KEUNIKAN PERPUSTAKAAN', 'Inovasi Dan Kreativitas'),
(40, 'SMK Labor', 'Pendirian'),
(41, 'Instruksi Kerja', 'Pengetahuan');

-- --------------------------------------------------------

--
-- Table structure for table `komentarbalasan`
--

CREATE TABLE `komentarbalasan` (
  `balasan_id` int(12) NOT NULL,
  `isi_balasan` varchar(150) NOT NULL,
  `tanggal_balasan` date NOT NULL,
  `pembalas_id` int(12) NOT NULL,
  `komentar_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarbalasan`
--

INSERT INTO `komentarbalasan` (`balasan_id`, `isi_balasan`, `tanggal_balasan`, `pembalas_id`, `komentar_id`) VALUES
(15, 'Kalo Kamu SIh aku udah gak heran', '2025-07-30', 4, 28),
(16, 'hehehehe.....', '2025-07-30', 3, 29);

-- --------------------------------------------------------

--
-- Table structure for table `komentarforum`
--

CREATE TABLE `komentarforum` (
  `komentar_id` int(12) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `user_id` int(12) NOT NULL,
  `forum_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarforum`
--

INSERT INTO `komentarforum` (`komentar_id`, `isi_komentar`, `tanggal_komentar`, `user_id`, `forum_id`) VALUES
(28, 'Benar Juga sih, soalnya aku sendiri kadang dari pada baca buku mending main hp', '2025-07-30', 3, 24),
(29, 'Kalo Kamunya mah emang gak suka baca buku aja', '2025-07-30', 2, 25),
(30, 'Kalo Aku lebih suka genre action dan adventure, lebih menarik', '2025-07-30', 4, 23);

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `komunitas_id` int(15) NOT NULL,
  `nama_komunitas` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`komunitas_id`, `nama_komunitas`) VALUES
(4, 'Perpustakaan'),
(5, 'Membaca'),
(6, 'Pembelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihankm`
--

CREATE TABLE `pelatihankm` (
  `pelatihan_id` int(12) NOT NULL,
  `judul_pelatihan` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `file_materi` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `user_id` int(12) NOT NULL,
  `kategori_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelatihankm`
--

INSERT INTO `pelatihankm` (`pelatihan_id`, `judul_pelatihan`, `deskripsi`, `file_materi`, `gambar`, `tanggal_upload`, `user_id`, `kategori_id`) VALUES
(4, 'Metode Terbaik Untuk Menghafal Buku Yang Dibaca', 'Menghafal isi buku bukan berarti hanya membaca berulang-ulang sampai hafal. Cara seperti itu justru sering membuat kita cepat lupa dan lelah secara mental. Untuk benar-benar bisa mengingat dan memahami isi buku, kita perlu menggunakan beberapa metode yang sudah terbukti efektif, baik dari segi psikologi belajar maupun pengalaman praktis.\r\n\r\nLangkah pertama adalah memahami terlebih dahulu isi buku secara garis besar. Ini bisa dilakukan dengan memindai atau menyurvei (survey) buku sebelum benar-benar mulai membaca. Perhatikan judul utama, subjudul, daftar isi, dan poin-poin penting yang dicetak tebal atau dicantumkan dalam ringkasan. Tujuannya adalah agar otak punya peta awal atau gambaran umum tentang apa yang akan dipelajari.\r\n\r\nSetelah itu, mulailah membaca dengan tujuan tertentu, bukan sekadar membaca pasif. Salah satu caranya adalah dengan mengubah subjudul atau topik menjadi pertanyaan. Misalnya, jika sedang membaca buku sejarah dengan subjudul &quot;Penyebab Perang Dunia II&quot;, maka ubah menjadi pertanyaan: &quot;Apa saja penyebab Perang Dunia II?&quot; Dengan cara ini, kamu membaca sambil mencari jawaban, sehingga otak akan lebih fokus dan aktif menyerap informasi.\r\n\r\nSetelah membaca, usahakan langsung menjelaskan kembali materi yang baru dibaca Ini disebut dengan teknik active recall atau penarikan informasi aktif. Caranya adalah menutup buku dan mencoba menjawab pertanyaan yang tadi dibuat, atau menjelaskan isi bab tersebut dengan kata-kata sendiri, seolah-olah sedang mengajarkannya kepada orang lain. Teknik ini terbukti jauh lebih efektif dalam memperkuat ingatan dibandingkan hanya membaca berulang-ulang.\r\n\r\nUntuk membantu proses mengingat, kamu bisa membuat catatan ringkas, peta pikiran (mind map), atau rangkuman tertulis. Gunakan kata-kata sendiri dan visualisasi seperti warna-warni, garis penghubung, atau gambar sederhana agar lebih mudah diingat. Otak manusia lebih mudah menyimpan informasi yang berbentuk visual dan terstruktur.\r\n\r\nHal penting lainnya adalah melakukan pengulangan secara berkala, bukan sekaligus dalam satu waktu. Metode ini disebut spaced repetition atau pengulangan bersela. Jadi, ulangi materi yang sudah dibaca pada hari ke-1, ke-2, ke-4, ke-7, dan seterusnya. Jadwal ini bisa dibuat manual atau menggunakan aplikasi seperti Anki yang akan membantu mengingatkan kapan kamu harus mengulang materi tertentu. Informasi yang diulang sebelum benar-benar terlupakan akan lebih kuat tersimpan dalam ingatan jangka panjang.\r\n\r\nAgar hasilnya maksimal, hindari begadang atau belajar dalam kondisi lelah, karena otak perlu istirahat untuk memproses informasi yang masuk. Tidur cukup sangat penting karena saat tidur, otak akan menyusun dan menyimpan informasi yang baru saja dipelajari.\r\n\r\nTerakhir, salah satu cara paling efektif untuk menghafal adalah dengan mengajarkan kembali isi buku kepada orang lain. Saat kamu bisa menjelaskan materi secara runtut dan mudah dimengerti, berarti kamu benar-benar sudah memahami dan menghafalnya.\r\n\r\n\r\n\r\nJadi, menghafal buku yang dibaca bukan tentang seberapa banyak kamu membaca, tapi bagaimana cara kamu membaca dan mengolah informasi tersebut. Dengan membaca aktif, membuat pertanyaan, menjelaskan ulang, membuat catatan visual, mengulang secara berkala, dan tidur cukup, proses menghafal akan menjadi jauh lebih efektif dan bertahan lama dalam ingatanmu.', '57ae349e10014c1780fb56fc5708d869.docx', '1752650121_feature-image-09.jpg', '2025-07-16', 9, 17),
(7, 'Cara Merawat dan Menyimpan Buku', 'Merawat dan menyimpan buku dengan baik penting untuk menjaga ketahanan dan kualitasnya. Buku sebaiknya disimpan di tempat yang kering, sejuk, dan terlindung dari sinar matahari langsung agar tidak cepat menguning atau rusak. Hindari menekuk halaman atau menggunakan bahan tajam sebagai penanda. Gunakan rak yang kokoh dan susun buku secara tegak, tidak terlalu rapat agar sirkulasi udara tetap terjaga. Bersihkan debu secara rutin dengan kain lembut atau kuas halus. Untuk buku yang jarang digunakan, bisa disimpan dalam kotak tertutup yang diberi silica gel untuk mencegah lembap. Perlakuan yang hati-hati saat membaca juga membantu menjaga kondisi buku tetap prima.', 'd1dbdc01bbe8132e90a2ea9a084912fb.docx', '1753703189_61b6f6b773bc2.jpg', '2025-07-28', 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuankm`
--

CREATE TABLE `pengetahuankm` (
  `pengetahuan_id` int(12) NOT NULL,
  `judul_pengetahuan` varchar(150) NOT NULL,
  `file_pendukung` varchar(150) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `user_id` int(12) NOT NULL,
  `kategori_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengetahuankm`
--

INSERT INTO `pengetahuankm` (`pengetahuan_id`, `judul_pengetahuan`, `file_pendukung`, `tanggal_upload`, `user_id`, `kategori_id`) VALUES
(38, 'Layanan Pemustaka', '1_-sop-layanan-pemustaka.pdf', '2025-07-30', 9, 7),
(39, 'Layanan Sumber Informasi', '2_-sop-layanan-sumber-informasi.pdf', '2025-07-30', 9, 7),
(40, 'Layanan Sirkulasi', '3_-SOP-Layanan-Sirkulasi.pdf', '2025-07-30', 9, 7),
(41, 'Layanan Pembinaan Koleksi', '4_-sop-layanan-Pembinaan-Koleksi.pdf', '2025-07-30', 9, 7),
(42, 'Layanan Pelatihan dan Pengembangan', '5_-sop-layanan-pelatihan-dan-pengembangan.pdf', '2025-07-30', 9, 7),
(43, 'Layanan Kehumasan', '6_-SOP-Layanan-Kehumasan.pdf', '2025-07-30', 9, 7),
(44, 'Layanan Penunjang', '7_-SOP-Layanan-Penunjang.pdf', '2025-07-30', 9, 7),
(45, 'Layanan Locker', '1_-IK-Layanan-Locker.pdf', '2025-07-30', 9, 41),
(46, 'Layanan Kunjungan Pemustaka', '2_-IK-Layanan-Kunjungan-Pemustaka.pdf', '2025-07-30', 9, 41),
(47, 'Layanan Sirkulasi', '3_-IK-Layanan-Sirkulasi.pdf', '2025-07-30', 9, 41),
(48, 'Layanan Penelusuran Sumber Informasi', '4_-IK-Layanan-Penelusuran-Sumber-Informasi.pdf', '2025-07-30', 9, 41),
(49, 'Klinik Journal', '5_-IK-Klinik-Jurnal.pdf', '2025-07-30', 9, 41),
(50, 'Seminar dan Workshop', '6_-IK-seminar-dan-workshop.pdf', '2025-07-30', 9, 41),
(51, 'Pengelolaan JPUA', '7_-IK-Pengelolaan-JPUA.pdf', '2025-07-30', 9, 41),
(52, 'Library Class', '8_-IK-Library-Class.pdf', '2025-07-30', 9, 41),
(53, 'Barang Milik Pustaka', '9_-IK-BARANG-MILIK-PEMUSTAKA-CUSTOMER-PROPERTY.pdf', '2025-07-30', 9, 41),
(54, 'Humas Helpdesk Kritik Saran', '10_-IK-Humas-Helpdesk-Kritik-Saran-2.pdf', '2025-07-30', 9, 41),
(55, 'Humas Kerjasama', '11_-IK-HUMAS-KERJASAMA-1.pdf', '2025-07-30', 9, 41),
(56, 'Humas Promosi', '12_-IK-HUMAS-PROMOSI-1.pdf', '2025-07-30', 9, 41),
(57, 'Humas Protokoler Tamu', '13_-IK-HUMAS-PROTOKOLER-TAMU-1.pdf', '2025-07-30', 9, 41),
(58, 'Pengembangan Bahan Pustaka', '14_-IK-PENGEMBANGAN-BAHAN-PERPUSTAKAAN.pdf', '2025-07-30', 9, 41),
(59, 'Pengelolahan Bahan Pustaka', '15_-IK-PENGOLAHAN-BAHAN-PERPUSTAKAAN.pdf', '2025-07-30', 9, 41),
(60, 'Stock Opname', '17_-IK-STOCK-OPNAME-_-WEEDING-DONE.pdf', '2025-07-30', 9, 41),
(61, 'Verifikasi Unggah Karya Ilmiah', '27_-IK-VERIFIKASI-UNGGAH-KARYA-ILMIAH.pdf', '2025-07-30', 9, 41),
(62, 'Layanan Data', '18_-IK-Layanan-Data.pdf', '2025-07-30', 9, 41),
(63, 'Pengembangan Program', '19_-IK-Pengembangan-Program.pdf', '2025-07-30', 9, 41),
(64, 'Perawatan dan Perbaikan Jaringan', '20_-IK-Perawatan-Dan-Perbaikan-Jaringan.pdf', '2025-07-30', 9, 41),
(65, 'Perawatan APAR', '21_-IK-APAR.pdf', '2025-07-30', 9, 41),
(66, 'Pengolahan Limbah', '22_-IK-Pengolahan-Limbah.pdf', '2025-07-30', 9, 41),
(67, 'Peminjaman', '23_-IK-PEMINJAMAN.pdf', '2025-07-30', 9, 41),
(68, 'Perpanjangan', '24_-IK-PERPANJANGAN.pdf', '2025-07-30', 9, 41),
(69, 'Pengembalian', '25_-IK-PENGEMBALIAN.pdf', '2025-07-30', 9, 41),
(70, 'Layanan  Bebas Pustaka', '26_-IK-Layanan-Bebas-Pustaka.pdf', '2025-07-30', 9, 41),
(71, 'Peminjaman Ruang Perpustakaan', '28_-IK-Peminjaman-Ruang-Perpustakaan.pdf', '2025-07-30', 9, 41);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(12) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Pustakawan'),
(3, 'Pemustaka');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `nama_lengkap`, `role_id`) VALUES
(2, 'Pustakawan', '$2y$10$/e4TgouOOfviEVV0rbd5gOYz6L1f3lgI3Cfw86H1gEb77j4Q4LFGy', 'pustakawan@gmail.com', 'Pustakawan', 2),
(3, 'Rehan', '$2y$10$WFwXW/5a8QbLPOL9fhpX8uaZuaDQ4VLBLgB1t4bmxyWayXhgTKBmq', 'pemustaka@gmail.com', 'Rehan', 3),
(4, 'Johan', '$2y$10$7Ahcey6l9V5VJrOdQA3uvOCzTLO0WsMN.q03KmttGsyMUB9c7WMj.', 'Johan@gmail.com', 'Johan', 3),
(9, 'Admin', '$2y$10$oRfvpwZIMZhLujai40kgFutRY4aEIMDLYqZgTZQuFrPMljVhKVlJK', 'Admin@gmail.com', 'Admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akreditasikm`
--
ALTER TABLE `akreditasikm`
  ADD PRIMARY KEY (`komponen_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `beritakm`
--
ALTER TABLE `beritakm`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_fk` (`kategori_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`),
  ADD KEY `userfk` (`user_id`),
  ADD KEY `kategoriFK` (`kategori_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `User` (`user_id`),
  ADD KEY `komunitas` (`komunitas_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `komentarbalasan`
--
ALTER TABLE `komentarbalasan`
  ADD PRIMARY KEY (`balasan_id`),
  ADD KEY `pembalas_id` (`pembalas_id`),
  ADD KEY `komentar_id` (`komentar_id`);

--
-- Indexes for table `komentarforum`
--
ALTER TABLE `komentarforum`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `fk_komentar_user` (`user_id`),
  ADD KEY `fk_komentar_forum` (`forum_id`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`komunitas_id`);

--
-- Indexes for table `pelatihankm`
--
ALTER TABLE `pelatihankm`
  ADD PRIMARY KEY (`pelatihan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `pengetahuankm`
--
ALTER TABLE `pengetahuankm`
  ADD PRIMARY KEY (`pengetahuan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `Role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akreditasikm`
--
ALTER TABLE `akreditasikm`
  MODIFY `komponen_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `beritakm`
--
ALTER TABLE `beritakm`
  MODIFY `berita_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `komentarbalasan`
--
ALTER TABLE `komentarbalasan`
  MODIFY `balasan_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `komentarforum`
--
ALTER TABLE `komentarforum`
  MODIFY `komentar_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `komunitas_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelatihankm`
--
ALTER TABLE `pelatihankm`
  MODIFY `pelatihan_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengetahuankm`
--
ALTER TABLE `pengetahuankm`
  MODIFY `pengetahuan_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akreditasikm`
--
ALTER TABLE `akreditasikm`
  ADD CONSTRAINT `akreditasikm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `akreditasikm_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);

--
-- Constraints for table `beritakm`
--
ALTER TABLE `beritakm`
  ADD CONSTRAINT `beritakm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `kategori_fk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `kategoriFK` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `komentarforum_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `userfk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `User` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `komunitas` FOREIGN KEY (`komunitas_id`) REFERENCES `komunitas` (`komunitas_id`);

--
-- Constraints for table `komentarbalasan`
--
ALTER TABLE `komentarbalasan`
  ADD CONSTRAINT `komentarbalasan_ibfk_1` FOREIGN KEY (`pembalas_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarbalasan_ibfk_2` FOREIGN KEY (`komentar_id`) REFERENCES `komentarforum` (`komentar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarforum`
--
ALTER TABLE `komentarforum`
  ADD CONSTRAINT `fk_komentar_forum` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`forum_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_komentar_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatihankm`
--
ALTER TABLE `pelatihankm`
  ADD CONSTRAINT `pelatihankm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `pelatihankm_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);

--
-- Constraints for table `pengetahuankm`
--
ALTER TABLE `pengetahuankm`
  ADD CONSTRAINT `kategori_kat` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `pengetahuankm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
