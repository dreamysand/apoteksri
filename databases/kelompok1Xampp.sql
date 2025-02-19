-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk apoteksri
CREATE DATABASE IF NOT EXISTS `apoteksri` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `apoteksri`;

-- membuang struktur untuk table apoteksri.adminusers
CREATE TABLE IF NOT EXISTS `adminusers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roles` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `use_safety_question` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel apoteksri.adminusers: ~21 rows (lebih kurang)
INSERT INTO `adminusers` (`id`, `username`, `email`, `password`, `roles`, `status`, `gambar`, `use_safety_question`) VALUES
	(1, 'admingaul012', 'admin@gmail.com', '$2y$10$Dtp13bITO/s6Fh99VCeAy.cLQF8FcpYS04SsGrxTuhdGAKlcTUJqW', 'admin', 'inactive', 'asset/profile674c35976c6f4.png', 'Tidak'),
	(2, 'Dreamysand', 'dreamysand@gmail.com', '$2y$10$/.uxjDjU.8ETG/u4UrwHye5oeO40TCepl404UcHdPT6i1IFAx4V36', 'user', 'inactive', 'asset/profile/6721e57f80645.png', 'Tidak'),
	(3, 'dean', 'deansatrio.ag@gmail.com', '$2y$10$cCYBmb0PBjnvE4y2lZj.j.U7ZPoTGkw6LaXtv6qkvKZIx8n3Uyk0K', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(4, 'agus', 'agus@gmail.com', '$2y$10$WcXJ8Mdwx7ybGurqSsWOOu.dsEFEQf3tmertLN8GAkWvtHFaYZdHG', 'admin', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(5, 'robert', 'robert@gmail.com', '$2y$10$YKdQh8sXH6XEjEjFAJ/.ROoVjEuQNXleKK.NFB1zMLHqnYbYGg4DS', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(6, 'budi', 'budi@gmail.com', '$2y$10$ICC56p9gb/3cLl04zcpFF.IkOYM/wOKVVUSayPD.hGgYJaetcLqjm', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(7, 'Jinx Pro Amanda', 'jpa@gmail.com', '$2y$10$cUiklM6S4VmPHirk4Ue.4ecGxpv3WGayEpsVDm0N3XtUmIB38ow3q', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(8, 'Nagato', 'pejuangamegakure@gmail.com', '$2y$10$L2jaoQHrmJVRBO1jS2dgau6V6NmZoitLorM.pa7LG/D2Horzl4bj.', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(9, 'Obito', 'bucinpds4@gmail.com', '$2y$10$Vd6uEo3xxjMEN1QDl522zefaZmKHI.ZI/SetOsPZ7Cwb2lfvaaJaK', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(10, 'Ash', 'championalola@gmail.com', '$2y$10$vXEge3BPl2ZUl3bVzIqfsuwHjjTxLT1SJJTVMFGcLvODgNBAGo4Jy', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(11, 'Cynthia', 'championsinnoh@gmail.com', '$2y$10$/8a.xHPKDmvwVYR8dLC9z.uM18UCnoWl8HiSqpV50uOeDn2/qj0lC', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(12, 'Natan', 'penyelamateruditio@gmail.com', '$2y$10$QEJUKXiBhJvLkx2UQOV8aO7oK1kkJLb2o5EBw6rQEA9HD75rFTFVi', 'user', 'inactive', 'asset/layout/account.png', 'Ya'),
	(13, 'Naruto', 'nanadaimehokage@gmail.com', '$2y$10$ivGMy69/KLxFm1I6XJvaweJV0NVv8T4miL6GJmnjSAQgQqRbOS0/y', 'user', 'inactive', 'asset/profile672c3ba686d5f.png', 'Ya'),
	(14, 'Jiraiya', 'erosannin@gmail.com', '$2y$10$DZ6g7mAkXZbePXrKMbtKi.kSfR09Th/.jCIx.R9M8RwFNWaXOZHZy', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(15, 'Rizal Kecap', 'icikiwir@gmail.com', '$2y$10$70aM6qUB7KbNH1NOa42I2.CDV9Ta/QWbUdjjdHBza2reM9VBrEPLC', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(16, 'aguskoplak', 'aguskoplak@gmail.com', '$2y$10$bJa44vw4h3VZehsy/qyNq.8ymYmhaoOkYqH5DBG95eBYEaKqv9MOm', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(17, 'adminganteng', 'dean@gmail.com', '$2y$10$rHkmJjbG7CVRU9aSU3s13.C3cAImSWdMwMNNkCvHo35PQ6OS8qo9a', 'admin', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(18, 'alfred', 'alfred@gmail.com', '$2y$10$dZ0UR.PKbQ04/K2icMirLubd6KuBYKqfwSa5vP5bp5Syw2R5mh93K', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(19, 'naganadel', 'naga@gmail.com', '$2y$10$BI51Tu3XDFEtDDL4z4M6P.E6fClsdRJHV7CRj50IEQqjHEypwAi9i', 'user', 'inactive', 'asset/layout/account.png', 'Tidak'),
	(20, 'Huricane', 'abdul@gmail.com', '$2y$10$nDakmtDVC99V3FmGkRtnVeJxb0AhSpA2KLAg.JAw/B5bZU7d0JoH.', 'user', 'inactive', 'asset/layout/account.png', 'Tidak');

-- membuang struktur untuk table apoteksri.golongan
CREATE TABLE IF NOT EXISTS `golongan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `golongan` varchar(100) NOT NULL,
  `perlu_resep` enum('Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Tidak',
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel apoteksri.golongan: ~7 rows (lebih kurang)
INSERT INTO `golongan` (`id`, `golongan`, `perlu_resep`, `gambar`) VALUES
	(1, 'Obat Bebas', 'Tidak', 'asset/obat/icon/golongan/bebas.svg'),
	(2, 'Obat Bebas Terbatas', 'Tidak', 'asset/obat/icon/golongan/bebasterbatas.svg'),
	(3, 'Obat Fitofarmaka', 'Tidak', 'asset/obat/icon/golongan/fitofarmaka.svg'),
	(4, 'Obat Jamu', 'Tidak', 'asset/obat/icon/golongan/jamu.svg'),
	(5, 'Obat Keras', 'Ya', 'asset/obat/icon/golongan/keras.svg'),
	(6, 'Obat Narkotika', 'Ya', 'asset/obat/icon/golongan/narkotika.svg'),
	(7, 'Obat Herbal Terstandarisasi', 'Tidak', 'asset/obat/icon/golongan/oht.svg');

-- membuang struktur untuk table apoteksri.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel apoteksri.kategori: ~8 rows (lebih kurang)
INSERT INTO `kategori` (`id`, `kategori`, `gambar`) VALUES
	(1, 'Obat Tablet', 'asset\\obat\\icon\\kategori\\tablet.svg'),
	(2, 'Obat Kapsul', 'asset\\obat\\icon\\kategori\\kapsul.svg'),
	(3, 'Obat Sirup', 'asset\\obat\\icon\\kategori\\sirup.svg'),
	(4, 'Obat Salep', 'asset\\obat\\icon\\kategori\\salep.svg'),
	(5, 'Obat Tetes', 'asset\\obat\\icon\\kategori\\tetes.svg'),
	(6, 'Antiseptik', 'asset\\obat\\icon\\kategori\\antiseptik.svg'),
	(7, 'Vitamin', 'asset\\obat\\icon\\kategori\\vitamin.svg'),
	(8, 'Inhaler', 'asset\\obat\\icon\\kategori\\inhaler.svg');

-- membuang struktur untuk table apoteksri.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kategori_id` int unsigned NOT NULL,
  `golongan_id` int unsigned NOT NULL,
  `produsen` varchar(100) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `khasiat` longtext,
  PRIMARY KEY (`id`),
  KEY `obat_ibfk_1` (`kategori_id`),
  KEY `obat_ibfk_2` (`golongan_id`),
  CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`golongan_id`) REFERENCES `golongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel apoteksri.obat: ~8 rows (lebih kurang)
INSERT INTO `obat` (`id`, `nama`, `kategori_id`, `golongan_id`, `produsen`, `harga`, `stok`, `gambar`, `khasiat`) VALUES
	(1, 'Bodrex Reguler', 1, 1, 'Tempo Scan Pacific', 4000.00, 15, 'asset/obat/bodrex.png', 'Meringankan sakit kepala, sakit gigi, dan demam.'),
	(2, 'Tolak Angin', 3, 7, 'Sido Muncul', 2000.00, 14, 'asset/obat/SM-TOLAK-ANGIN-CAIR-5S-14250.avif', 'Meredakan masuk angin.'),
	(3, 'Amoxicillin', 1, 5, 'Kimia Farma', 10000.00, 21, 'asset/obat/amoxicillin.jpg', 'Mengatasi infeksi bakteri, termasuk gonore, otitis media, atau infeksi ginjal (pielonefritis)'),
	(4, 'Insto Reguler', 5, 2, 'Combiphar', 10000.00, 50, 'asset/obat/insto.jfif', 'Mengobati sakit mata karena bermain game epep.'),
	(5, 'OBH Combi Flu dan Batuk', 3, 2, 'Combiphar', 20000.00, 50, 'asset/obat/combiflubatuk.webp', 'Meredakan flu dan batuk.'),
	(6, 'Paramex Reguler', 1, 2, 'Konimex', 2000.00, 49, 'asset/obat/paramex.webp', 'Meredakan sakit kepala, dan pusing.'),
	(7, 'Bodrex Flu Batuk Tidak Berdahak', 1, 2, 'Tempo Scan Pacific', 4000.00, 50, 'asset/obat/bodrexflubatuktdkberdahak.jpg', 'Mengobatik batuk dan flu tidak berdahak'),
	(8, 'Obat Cinta', 3, 2, 'asd', 123123.00, 12, 'asset/obat/Megumin5.jpg', 'ds');

-- membuang struktur untuk table apoteksri.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `metode_pembayaran` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel apoteksri.pembayaran: ~1 rows (lebih kurang)
INSERT INTO `pembayaran` (`id`, `metode_pembayaran`) VALUES
	(7, 'Tunai');

-- membuang struktur untuk table apoteksri.resep
CREATE TABLE IF NOT EXISTS `resep` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_obat` int unsigned NOT NULL,
  `id_user` int unsigned NOT NULL,
  `id_admin` int unsigned NOT NULL,
  `status` enum('Belum Dikonfirmasi','Diterima','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Belum Dikonfirmasi',
  `tanggal_resep_dibuat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_obat` (`id_obat`),
  KEY `id_user` (`id_user`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `adminusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resep_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `adminusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel apoteksri.resep: ~9 rows (lebih kurang)
INSERT INTO `resep` (`id`, `id_obat`, `id_user`, `id_admin`, `status`, `tanggal_resep_dibuat`) VALUES
	(1, 3, 2, 1, 'Diterima', '2024-11-02 23:33:41'),
	(2, 3, 7, 1, 'Diterima', '2024-11-10 21:55:15'),
	(3, 3, 7, 1, 'Diterima', '2024-11-11 21:14:32'),
	(4, 3, 8, 1, 'Diterima', '2024-11-26 06:56:14'),
	(5, 3, 6, 1, 'Diterima', '2024-11-26 07:03:58'),
	(6, 3, 2, 1, 'Belum Dikonfirmasi', '2024-11-28 01:06:57'),
	(7, 3, 10, 1, 'Belum Dikonfirmasi', '2024-11-28 04:02:30'),
	(8, 3, 7, 1, 'Diterima', '2024-11-28 08:07:09'),
	(9, 3, 7, 1, 'Diterima', '2024-11-28 08:11:20');

-- membuang struktur untuk table apoteksri.safety_question
CREATE TABLE IF NOT EXISTS `safety_question` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel apoteksri.safety_question: ~4 rows (lebih kurang)
INSERT INTO `safety_question` (`id`, `pertanyaan`) VALUES
	(1, 'Siapakah nama teman anda ?'),
	(2, 'Apa judul lagu favorit anda ?'),
	(3, 'Apa makanan favorit anda ?'),
	(4, 'Siapakah sosok yang menjadi idol anda ?'),
	(5, 'Apa film favorit anda ?');

-- membuang struktur untuk table apoteksri.safety_question_answer
CREATE TABLE IF NOT EXISTS `safety_question_answer` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int unsigned NOT NULL,
  `answer_question_number_1` longtext NOT NULL,
  `answer_question_number_2` longtext NOT NULL,
  `answer_question_number_3` longtext NOT NULL,
  `answer_question_number_4` longtext NOT NULL,
  `answer_question_number_5` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__adminusers` (`id_user`),
  CONSTRAINT `FK__adminusers` FOREIGN KEY (`id_user`) REFERENCES `adminusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel apoteksri.safety_question_answer: ~2 rows (lebih kurang)
INSERT INTO `safety_question_answer` (`id`, `id_user`, `answer_question_number_1`, `answer_question_number_2`, `answer_question_number_3`, `answer_question_number_4`, `answer_question_number_5`) VALUES
	(1, 12, 'Nolan', 'Theme Song Natan', 'pirkuadrat', 'Diggie', 'Heart of Anima'),
	(2, 13, 'Sasuke Uchiha', 'Silhouette', 'Ramen', 'Hokage', 'Naruto');

-- membuang struktur untuk table apoteksri.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int unsigned NOT NULL,
  `id_admin` int unsigned DEFAULT NULL,
  `id_resep` int unsigned DEFAULT NULL,
  `id_obat` int unsigned NOT NULL,
  `jumlah_obat` int NOT NULL,
  `id_metode_pembayaran` int unsigned NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `status` enum('Belum Dikonfirmasi','Diterima','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Belum Dikonfirmasi',
  `tanggal_transaksi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `uang_bayar` decimal(15,2) unsigned DEFAULT NULL,
  `uang_kembalian` decimal(15,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_admin` (`id_admin`),
  KEY `id_metode_pembayaran` (`id_metode_pembayaran`),
  KEY `transaksi_ibfk_3` (`id_obat`),
  KEY `transaksi_ibfk_5` (`id_resep`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `adminusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `adminusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_metode_pembayaran`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel apoteksri.transaksi: ~30 rows (lebih kurang)
INSERT INTO `transaksi` (`id`, `id_user`, `id_admin`, `id_resep`, `id_obat`, `jumlah_obat`, `id_metode_pembayaran`, `total_harga`, `status`, `tanggal_transaksi`, `uang_bayar`, `uang_kembalian`) VALUES
	(1, 2, 1, NULL, 2, 1, 7, 2000.00, 'Diterima', '2024-10-23 06:58:47', 3000.00, 1000.00),
	(2, 2, 1, NULL, 1, 50, 7, 200000.00, 'Diterima', '2024-10-30 04:53:25', 400000.00, 200000.00),
	(3, 2, 1, NULL, 2, 10, 7, 20000.00, 'Diterima', '2024-11-04 14:02:44', 50000.00, 30000.00),
	(4, 7, 1, NULL, 1, 1, 7, 4000.00, 'Diterima', '2024-11-04 19:44:28', 7000.00, 3000.00),
	(5, 6, 1, NULL, 2, 1, 7, 2000.00, 'Diterima', '2024-11-05 14:07:45', 9000.00, 7000.00),
	(6, 9, 1, NULL, 1, 1, 7, 4000.00, 'Diterima', '2024-11-05 14:12:05', 8000.00, 4000.00),
	(7, 11, 1, NULL, 6, 10, 7, 20000.00, 'Diterima', '2024-11-05 14:20:34', 90000.00, 70000.00),
	(8, 2, 1, NULL, 2, 19, 7, 38000.00, 'Diterima', '2024-11-07 03:53:23', 40000.00, 2000.00),
	(9, 13, 1, NULL, 2, 5, 7, 10000.00, 'Diterima', '2024-11-06 20:56:55', 90000.00, 80000.00),
	(10, 7, 1, 2, 3, 10, 7, 100000.00, 'Diterima', '2024-11-11 21:04:48', 400000.00, 300000.00),
	(11, 7, 1, 3, 3, 1, 7, 10000.00, 'Diterima', '2024-11-11 21:16:30', 11000.00, 1000.00),
	(12, 2, 1, NULL, 7, 10, 7, 40000.00, 'Diterima', '2024-11-18 22:36:28', 40000.00, 0.00),
	(13, 6, 1, NULL, 2, 20, 7, 40000.00, 'Diterima', '2024-11-18 22:40:38', 40000.00, 0.00),
	(14, 6, 1, NULL, 2, 21, 7, 42000.00, 'Diterima', '2024-11-18 22:42:40', 43000.00, 1000.00),
	(15, 7, 1, NULL, 2, 21, 7, 42000.00, 'Diterima', '2024-11-18 22:44:18', 42000.00, 0.00),
	(16, 2, 1, NULL, 2, 1, 7, 2000.00, 'Diterima', '2024-11-18 23:01:56', 2000.00, 0.00),
	(17, 2, 1, NULL, 2, 1, 7, 2000.00, 'Diterima', '2024-11-19 21:54:07', 2000.00, 0.00),
	(18, 3, 1, NULL, 2, 1, 7, 2000.00, 'Diterima', '2024-11-19 21:58:21', 2000.00, 0.00),
	(19, 3, 1, NULL, 2, 1, 7, 2000.00, 'Diterima', '2024-11-19 22:11:08', 2000.00, 0.00),
	(20, 2, 1, NULL, 2, 1, 7, 2000.00, 'Diterima', '2024-11-19 22:12:50', 2000.00, 0.00),
	(21, 3, 1, NULL, 2, 1, 7, 2000.00, 'Diterima', '2024-11-19 22:13:43', 2000.00, 0.00),
	(22, 7, 1, NULL, 1, 10, 7, 40000.00, 'Diterima', '2024-11-19 22:14:34', 50000.00, 10000.00),
	(23, 3, NULL, NULL, 1, 1, 7, 4000.00, 'Belum Dikonfirmasi', '2024-11-25 21:54:23', NULL, NULL),
	(24, 2, NULL, NULL, 1, 1, 7, 4000.00, 'Belum Dikonfirmasi', '2024-11-26 07:12:06', NULL, NULL),
	(25, 2, NULL, NULL, 2, 1, 7, 2000.00, 'Belum Dikonfirmasi', '2024-11-28 04:10:47', NULL, NULL),
	(26, 2, NULL, NULL, 3, 4, 7, 40000.00, 'Belum Dikonfirmasi', '2024-11-28 04:11:49', NULL, NULL),
	(27, 7, NULL, NULL, 1, 5, 7, 20000.00, 'Belum Dikonfirmasi', '2024-11-28 04:54:04', NULL, NULL),
	(28, 7, NULL, NULL, 1, 12, 7, 48000.00, 'Belum Dikonfirmasi', '2024-11-28 05:21:11', NULL, NULL),
	(29, 7, 1, NULL, 1, 1, 7, 4000.00, 'Diterima', '2024-11-28 05:35:47', 5000.00, 1000.00),
	(30, 7, NULL, NULL, 1, 1, 7, 4000.00, 'Belum Dikonfirmasi', '2024-11-28 08:05:45', NULL, NULL),
	(31, 7, 1, NULL, 1, 1, 7, 4000.00, 'Diterima', '2024-11-28 08:18:54', 4000.00, 0.00),
	(32, 7, 1, 8, 3, 1, 7, 10000.00, 'Diterima', '2024-11-28 08:20:09', 10000.00, 0.00),
	(33, 7, 1, NULL, 1, 1, 7, 4000.00, 'Diterima', '2024-11-28 08:31:54', 4000.00, 0.00),
	(34, 7, 1, 9, 3, 1, 7, 10000.00, 'Diterima', '2024-11-28 08:33:38', 10000.00, 0.00);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
