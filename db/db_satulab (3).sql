-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2024 at 04:30 PM
-- Server version: 11.2.2-MariaDB-log
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_satulab`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification_signal`
--

CREATE TABLE `notification_signal` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `processed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `notification_signal`
--

INSERT INTO `notification_signal` (`id`, `notification_id`, `created_at`, `processed`) VALUES
(1, 1, '2024-12-18 04:46:50', 0),
(2, 2, '2024-12-18 04:47:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys_notifications`
--

CREATE TABLE `sys_notifications` (
  `id` int(11) NOT NULL,
  `pernr` varchar(50) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `template_id` int(11) NOT NULL,
  `via` varchar(255) NOT NULL DEFAULT 'email',
  `feature` varchar(255) NOT NULL,
  `id_data_feature` varchar(32) NOT NULL,
  `status` enum('pending','sent','failed') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `sent_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_notifications`
--

INSERT INTO `sys_notifications` (`id`, `pernr`, `id_unit`, `template_id`, `via`, `feature`, `id_data_feature`, `status`, `created_at`, `sent_at`) VALUES
(1, '90000754', NULL, 4, 'email', 'Karantina', '1000000145', 'pending', '2024-12-18 04:46:50', NULL),
(2, '90000754', NULL, 4, 'email', 'Karantina', '1000000146', 'pending', '2024-12-18 04:47:07', NULL);

--
-- Triggers `sys_notifications`
--
DELIMITER $$
CREATE TRIGGER `after_insert_sys_notifications` AFTER INSERT ON `sys_notifications` FOR EACH ROW BEGIN
    INSERT INTO notification_signal (notification_id, created_at) 
    VALUES (NEW.id, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sys_notification_templates`
--

CREATE TABLE `sys_notification_templates` (
  `id` int(11) NOT NULL,
  `template_name` varchar(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `template_content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_notification_templates`
--

INSERT INTO `sys_notification_templates` (`id`, `template_name`, `subject`, `template_content`, `created_at`) VALUES
(1, 'Keputusan Karantina', 'Keputusan Karantina', 'Kepada Yth Bapak/Ibu,<br><br>Karantina dengan nomor {no_karantina} telah selesai. Hasil keputusan dari Manager QC adalah {kesimpulan}.<br>Untuk lebih detailnya, mohon untuk mengakses sistem Satu Lab pada link berikut ini:<br><a href=\"{link}\">Satu Lab</a><br><br>Terima Kasih,<br><br>Satu Lab', '2024-11-04 03:04:12'),
(2, 'Notifikasi Karantina', 'Notifikasi Karantina', 'Kepada Yth,<br><br>Permohonan analisa bahan karantina dengan No Karantina {no_karantina} telah diproses lebih lanjut.<br>Silakan cek status terbaru pada sistem Satu Lab pada link berikut ini:<br><a href=\"{link}\">Klik Disini</a><br><br>Terima Kasih,<br><br>Satu Lab', '2024-11-04 03:04:12'),
(3, 'Penolakan Karantina', 'Penolakan Karantina', 'Kepada Yth,<br><br>Permohonan analisa bahan karantina dengan No Karantina {no_karantina} telah ditolak.<br>Silakan cek alasan penolakan pada sistem Satu Lab pada link berikut ini:<br><a href=\"{link}\">Klik Disini</a><br><br>Terima Kasih,<br><br>Satu Lab', '2024-11-04 03:04:12'),
(4, 'Approval Karantina', 'Approval Analisa Karantina', 'Kepada Yth Bapak/Ibu {name},<br><br>Mohon untuk melakukan preview dan approval pada permohonan dengan No Permintaan {no_karantina} pada sistem Satu Lab pada link berikut ini:<br><a href=\"{link}\">Klik Disini</a><br><br>Terima Kasih,<br><br>Satu Lab', '2024-11-04 04:08:58'),
(5, 'Konfirmasi Serah Terima R&D', 'Konfirmasi Serah Terima Sample', 'Kepada Yth Unit Research & Development,<br><br>\n    Mohon untuk melakukan preview dan konfirmasi serah terima sample pada permohonan dengan No Karantina {no_karantina} pada sistem Satu Lab pada link berikut ini:\n    <a href=\"{link}\">Satu Lab</a><br><br>\n    Terima Kasih,<br><br>\n    Satu Lab', '2024-11-04 07:31:40'),
(6, 'Konfirmasi Serah Terima Lab Analisa', 'Konfirmasi Serah Terima Sample', 'Kepada Yth Unit Lab Analisa,<br><br>\n    Mohon untuk melakukan preview dan konfirmasi serah terima sample pada permohonan dengan No Karantina {no_karantina} pada sistem Satu Lab pada link berikut ini:\n    <a href=\"{link}\">Satu Lab</a><br><br>\n    Terima Kasih,<br><br>\n    Satu Lab', '2024-11-04 07:31:40'),
(8, 'Pemberitahuan Status Karantina', 'Pemberitahuan Status Karantina', 'Kepada Yth,<br><br>\nPermohonan analisa bahan karantina dengan No Karantina {no_karantina} telah diproses lebih lanjut.<br> \nSilakan cek status  terbaru pada sistem Satu Lab pada link berikut ini:<br> \n\n<a href=\"{link}\">Klik Disini</a><br><br>Terima Kasih,<br><br>Satu Lab', '2024-11-05 04:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_analisa_master_material`
--

CREATE TABLE `tb_analisa_master_material` (
  `id` int(5) NOT NULL,
  `material` varchar(20) NOT NULL,
  `singkatan` varchar(20) NOT NULL,
  `zbentuk` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_analisa_master_material`
--

INSERT INTO `tb_analisa_master_material` (`id`, `material`, `singkatan`, `zbentuk`) VALUES
(1, '50000748', 'BBNS ', 'A4'),
(2, '50000006', 'ASP', 'E1'),
(3, '80000020', 'A2', 'A1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_analisa_master_parameter`
--

CREATE TABLE `tb_analisa_master_parameter` (
  `id` int(5) NOT NULL,
  `material` varchar(20) NOT NULL,
  `bentuk` varchar(64) NOT NULL,
  `mstrchar` varchar(255) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `penyelia` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_analisa_master_parameter`
--

INSERT INTO `tb_analisa_master_parameter` (`id`, `material`, `bentuk`, `mstrchar`, `metode`, `penyelia`) VALUES
(1, '50000748', 'OTS', 'MKKX0165', 'A1', '90001733'),
(2, '50000748', 'OTS', 'MKKX0180', 'A2', '90001733'),
(3, '50000748', 'Gmm', 'MKKX0165', 'A1', '90001733'),
(4, '50000748', 'Gmm', 'MKKX0180', 'B1', '90001733'),
(5, '50000748', 'A4', 'MKKX0165', 'A1', '90001733'),
(6, '50000748', 'A4', 'MKKX0180', 'A2', '90001733'),
(7, '50000006', 'E1', 'MKFA0004', 'A1', '90001627'),
(8, '50000006', 'E1', 'MKFA0002', 'A2', '90001078'),
(9, '50000006', 'E1', 'MKFA0001', 'A3', '90001733'),
(10, '50000006', 'E1', 'MKFA0003', 'A4', '90001737'),
(11, '50000006', 'E1', 'MKFA0005', 'A5', '90001627'),
(12, '80000020', 'A1', 'MKME0002', 'A2', '90001627'),
(13, '80000020', 'A1', 'MKMG0007', 'A1', '90001627');

-- --------------------------------------------------------

--
-- Table structure for table `tb_analisa_request_sap`
--

CREATE TABLE `tb_analisa_request_sap` (
  `id` int(5) NOT NULL,
  `id_kar` int(10) NOT NULL,
  `month` int(2) NOT NULL,
  `years` year(4) NOT NULL,
  `id_req` varchar(20) NOT NULL,
  `urgent` int(11) NOT NULL,
  `jenis_req` varchar(128) NOT NULL,
  `lv_total` int(3) DEFAULT NULL,
  `plant` varchar(10) NOT NULL,
  `sloc` varchar(10) DEFAULT NULL,
  `sloc_desc` varchar(255) NOT NULL,
  `zyear` varchar(4) DEFAULT NULL,
  `jenis_material` varchar(255) NOT NULL,
  `material` varchar(20) DEFAULT NULL,
  `zbentuk` varchar(255) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `batch` varchar(20) DEFAULT NULL,
  `kode_proses_produksi` varchar(20) NOT NULL,
  `karantina_ke` varchar(32) NOT NULL,
  `no_karantina` varchar(20) DEFAULT NULL,
  `nomor_registrasi_lab` varchar(32) NOT NULL,
  `memo` int(1) NOT NULL,
  `memo_lab` varchar(255) NOT NULL,
  `label_lab` varchar(255) NOT NULL,
  `attachment_lab` varchar(255) NOT NULL,
  `admin_lab` varchar(10) NOT NULL,
  `analis_lab` varchar(20) NOT NULL,
  `batch_lapangan` varchar(20) DEFAULT NULL,
  `manuf_date` date DEFAULT NULL,
  `ed` date DEFAULT NULL,
  `ed_plus_rnd` int(5) NOT NULL,
  `ed_plus` int(11) NOT NULL,
  `ed_next` date NOT NULL,
  `uji_ulang` date DEFAULT NULL,
  `tgl_karantina` date DEFAULT NULL,
  `zmasalah` varchar(255) DEFAULT NULL,
  `desc_mslh` text DEFAULT NULL,
  `nama_qc` varchar(50) DEFAULT NULL,
  `nama_koor` varchar(50) DEFAULT NULL,
  `nama_ka` varchar(50) DEFAULT NULL,
  `dqc` tinyint(1) DEFAULT NULL,
  `dlab` tinyint(1) DEFAULT NULL,
  `drnd` tinyint(1) DEFAULT NULL,
  `zind` tinyint(1) DEFAULT NULL,
  `status_kar` varchar(20) DEFAULT NULL,
  `progress` varchar(255) NOT NULL,
  `progress_rnd` varchar(255) NOT NULL,
  `keputusan_qc` varchar(255) NOT NULL,
  `keputusan_rnd` varchar(255) NOT NULL,
  `kesimpulan_qc` varchar(255) NOT NULL,
  `insplot` int(11) DEFAULT NULL,
  `order` varchar(50) DEFAULT NULL,
  `matdoc` varchar(50) DEFAULT NULL,
  `matyears` int(11) DEFAULT NULL,
  `ztransaksi` varchar(20) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `uom` varchar(10) DEFAULT NULL,
  `jumlah_sample` int(3) NOT NULL,
  `kimia` int(2) NOT NULL,
  `mikro` int(2) NOT NULL,
  `jumlah_sample_rnd` int(3) NOT NULL,
  `reff` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `waktu_pengerjaan_qc` int(11) DEFAULT NULL,
  `waktu_pengerjaan_lab` int(11) DEFAULT NULL,
  `waktu_pengerjaan_rnd` int(11) DEFAULT NULL,
  `total_waktu_pengerjaan` int(11) DEFAULT NULL,
  `satuan_waktu` varchar(25) NOT NULL,
  `waktu_in_qc` datetime DEFAULT NULL,
  `waktu_out_qc` datetime DEFAULT NULL,
  `waktu_in_lab` datetime DEFAULT NULL,
  `waktu_out_lab` datetime DEFAULT NULL,
  `waktu_in_rnd` datetime DEFAULT NULL,
  `waktu_out_rnd` datetime DEFAULT NULL,
  `nama_koordinator` varchar(255) NOT NULL,
  `email_koordinator` varchar(255) NOT NULL,
  `qndat` date NOT NULL,
  `done_lab_at` datetime DEFAULT NULL,
  `done_rnd_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `is_deleted` int(1) NOT NULL,
  `delete_at` datetime DEFAULT NULL,
  `deleted_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_analisa_request_sap`
--

INSERT INTO `tb_analisa_request_sap` (`id`, `id_kar`, `month`, `years`, `id_req`, `urgent`, `jenis_req`, `lv_total`, `plant`, `sloc`, `sloc_desc`, `zyear`, `jenis_material`, `material`, `zbentuk`, `desc`, `batch`, `kode_proses_produksi`, `karantina_ke`, `no_karantina`, `nomor_registrasi_lab`, `memo`, `memo_lab`, `label_lab`, `attachment_lab`, `admin_lab`, `analis_lab`, `batch_lapangan`, `manuf_date`, `ed`, `ed_plus_rnd`, `ed_plus`, `ed_next`, `uji_ulang`, `tgl_karantina`, `zmasalah`, `desc_mslh`, `nama_qc`, `nama_koor`, `nama_ka`, `dqc`, `dlab`, `drnd`, `zind`, `status_kar`, `progress`, `progress_rnd`, `keputusan_qc`, `keputusan_rnd`, `kesimpulan_qc`, `insplot`, `order`, `matdoc`, `matyears`, `ztransaksi`, `quantity`, `uom`, `jumlah_sample`, `kimia`, `mikro`, `jumlah_sample_rnd`, `reff`, `created_at`, `waktu_pengerjaan_qc`, `waktu_pengerjaan_lab`, `waktu_pengerjaan_rnd`, `total_waktu_pengerjaan`, `satuan_waktu`, `waktu_in_qc`, `waktu_out_qc`, `waktu_in_lab`, `waktu_out_lab`, `waktu_in_rnd`, `waktu_out_rnd`, `nama_koordinator`, `email_koordinator`, `qndat`, `done_lab_at`, `done_rnd_at`, `update_at`, `update_by`, `is_deleted`, `delete_at`, `deleted_by`) VALUES
(1, 17, 12, '2024', '1000000145', 0, 'Karantina', 7, 'S100', 'K200', 'KMS Blok I', '2024', '', '80000020', 'Cair', 'KMS BERAS KENCUR MINUMAN', 'HR00001', '', '', 'KMS Blok I/0001/12/2', '', 0, '', '', '', '', '', '', '2024-12-05', '2027-01-05', 0, 0, '0000-00-00', '0000-00-00', '2024-12-17', 'Rusak', '', '90003560', '90000755', '90000754', 1, 1, 0, 0, 'Open', 'Approval Ka Unit', '', '', '', '', 2147483647, '', '', 0, 'Recurring', 1.00, 'ROL', 1, 0, 0, 0, '', '2024-12-18 11:46:50', 5, 365, 0, 370, 'Hari', NULL, NULL, NULL, NULL, NULL, NULL, 'Siti Kulilah', 'Test@gmail.com', '2026-10-05', NULL, NULL, NULL, NULL, 0, NULL, ''),
(2, 18, 12, '2024', '1000000146', 0, 'Karantina', 7, 'S100', 'K200', 'KMS Blok I', '2024', '', '80000020', 'Cair', 'KMS BERAS KENCUR MINUMAN', 'HR00001', '', '', 'KMS Blok I/0002/12/2', '', 0, '', '', '', '', '', '', '2024-12-05', '2027-01-05', 0, 0, '0000-00-00', '0000-00-00', '2024-12-17', 'Rusak', '', '90003560', '90000755', '90000754', 1, 1, 0, 0, 'Open', 'Approval Ka Unit', '', '', '', '', 2147483647, '', '', 0, 'Recurring', 1.00, 'ROL', 1, 0, 0, 0, '', '2024-12-18 11:47:07', 5, 365, 0, 370, 'Hari', NULL, NULL, NULL, NULL, NULL, NULL, 'Siti Kulilah', 'Test@gmail.com', '2026-10-05', NULL, NULL, NULL, NULL, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_analisa_request_spec`
--

CREATE TABLE `tb_analisa_request_spec` (
  `id` int(11) NOT NULL,
  `id_kar` varchar(255) NOT NULL,
  `id_req` varchar(255) NOT NULL,
  `sample_ke` int(2) NOT NULL,
  `mstrchar` varchar(255) NOT NULL,
  `short_text` varchar(255) NOT NULL,
  `short_text_method` varchar(255) NOT NULL,
  `cat_oprshrttxt` varchar(20) NOT NULL,
  `oprshrttxt` varchar(255) NOT NULL,
  `zjenis_lab` varchar(128) NOT NULL,
  `spec` varchar(255) DEFAULT NULL,
  `type_mic` varchar(64) NOT NULL,
  `zresult` varchar(255) DEFAULT NULL,
  `manual_add` int(1) NOT NULL,
  `valid` varchar(128) NOT NULL,
  `status_done` int(1) NOT NULL,
  `penyelia` varchar(128) NOT NULL,
  `analis` varchar(128) NOT NULL,
  `status_at` datetime NOT NULL,
  `update_by` varchar(32) NOT NULL,
  `upload_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_analisa_request_spec`
--

INSERT INTO `tb_analisa_request_spec` (`id`, `id_kar`, `id_req`, `sample_ke`, `mstrchar`, `short_text`, `short_text_method`, `cat_oprshrttxt`, `oprshrttxt`, `zjenis_lab`, `spec`, `type_mic`, `zresult`, `manual_add`, `valid`, `status_done`, `penyelia`, `analis`, `status_at`, `update_by`, `upload_at`) VALUES
(1, '17', '1000000145', 0, 'MKFX0608', 'pitch (104-106 MM)', 'Pengujian Bhn Pengemas & Pengemas Tmbhn', 'QC', 'QC GUDANG KEMASAN', 'Mikro', '104,0000000 ~ 106,0000000', 'quantitatif', '105', 0, '105', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, '17', '1000000145', 0, 'MKFE0005', 'Arah gulungan terbaca', 'Pengujian Bhn Pengemas & Pengemas Tmbhn', 'QC', 'QC GUDANG KEMASAN', 'Mikro', 'Terbaca', 'qualitatif', '10', 0, 'A', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, '17', '1000000145', 1, 'MKMG0007', 'Angka Lempeng Total 3000 KOL/g', 'Angka Lempeng Total', 'LAB', 'LAB ANALISA MIKRO', 'Mikro', 'Upper: 3.000,0000000', 'quantitatif', '', 0, '', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, '17', '1000000145', 1, 'MKME0002', 'Angka Kapang 100 KOL/g', 'Angka Kapang dan Khamir', 'LAB', 'LAB ANALISA MIKRO', 'Kimia', 'Upper: 100,0000000', 'quantitatif', '', 0, '', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, '18', '1000000146', 0, 'MKFX0608', 'pitch (104-106 MM)', 'Pengujian Bhn Pengemas & Pengemas Tmbhn', 'QC', 'QC GUDANG KEMASAN', 'Mikro', '104,0000000 ~ 106,0000000', 'quantitatif', '105', 0, '105', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, '18', '1000000146', 0, 'MKFE0005', 'Arah gulungan terbaca', 'Pengujian Bhn Pengemas & Pengemas Tmbhn', 'QC', 'QC GUDANG KEMASAN', 'Mikro', 'Terbaca', 'qualitatif', '10', 0, 'A', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(7, '18', '1000000146', 1, 'MKMG0007', 'Angka Lempeng Total 3000 KOL/g', 'Angka Lempeng Total', 'LAB', 'LAB ANALISA MIKRO', 'Mikro', 'Upper: 3.000,0000000', 'quantitatif', '', 0, '', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(8, '18', '1000000146', 1, 'MKME0002', 'Angka Kapang 100 KOL/g', 'Angka Kapang dan Khamir', 'LAB', 'LAB ANALISA MIKRO', 'Mikro', 'Upper: 100,0000000', 'quantitatif', '', 0, '', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_analisa_tracking`
--

CREATE TABLE `tb_analisa_tracking` (
  `id` int(5) NOT NULL,
  `id_req` varchar(20) NOT NULL,
  `unit_progress` varchar(64) DEFAULT NULL,
  `waktu_tracking` datetime DEFAULT NULL,
  `desc_tracking` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_analisa_tracking`
--

INSERT INTO `tb_analisa_tracking` (`id`, `id_req`, `unit_progress`, `waktu_tracking`, `desc_tracking`, `attachment`) VALUES
(1, '1000000145', 'ALL', '2024-12-18 11:46:50', 'Permintaan Analisa dibuat', ''),
(2, '1000000145', 'ALL', NULL, 'Proses Approval Ka Unit', ''),
(3, '1000000146', 'ALL', '2024-12-18 11:47:07', 'Permintaan Analisa dibuat', ''),
(4, '1000000146', 'ALL', NULL, 'Proses Approval Ka Unit', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan_master`
--

CREATE TABLE `tb_bahan_master` (
  `id` int(12) NOT NULL,
  `type_bahan` varchar(128) NOT NULL,
  `nama_bahan` varchar(256) NOT NULL,
  `kode_bahan` varchar(128) NOT NULL,
  `jenis_bahan` varchar(128) NOT NULL,
  `peringatan_bahaya` varchar(256) NOT NULL,
  `file_msds` varchar(256) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `input_by` varchar(128) NOT NULL,
  `edit_by` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan_pemakaian`
--

CREATE TABLE `tb_bahan_pemakaian` (
  `id` int(10) NOT NULL,
  `nama_analis` varchar(30) NOT NULL,
  `kode_bahan` varchar(30) NOT NULL,
  `analisa` varchar(50) NOT NULL,
  `jumlah_bahan` float NOT NULL,
  `bahan_mati` float NOT NULL,
  `jumlah_bahan_awal` float(10,6) NOT NULL,
  `jumlah_bahan_sisa` float(10,6) NOT NULL,
  `satuan` varchar(5) NOT NULL,
  `tanggal_ambil` date NOT NULL DEFAULT current_timestamp(),
  `input_date` datetime NOT NULL DEFAULT current_timestamp(),
  `input_by` varchar(32) NOT NULL,
  `edit_by` varchar(32) NOT NULL,
  `deletion_flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan_stock`
--

CREATE TABLE `tb_bahan_stock` (
  `id` int(11) NOT NULL,
  `id_bahan` int(10) NOT NULL,
  `kode_bahan` varchar(150) NOT NULL,
  `nomor_batch` varchar(30) NOT NULL,
  `kemasan` float NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `sisa_bahan` float(10,6) NOT NULL,
  `bahan_mati` float NOT NULL,
  `period_ed` int(1) DEFAULT NULL,
  `tanggal_datang` date DEFAULT NULL,
  `tanggal_ed` date NOT NULL,
  `merek` varchar(128) NOT NULL,
  `tanggal_buka` date DEFAULT NULL,
  `status_segel` int(1) NOT NULL DEFAULT 1,
  `lokasi_penyimpanan` varchar(100) NOT NULL,
  `file_coa` varchar(256) NOT NULL,
  `file_msds` varchar(256) NOT NULL,
  `input_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `input_by` varchar(32) NOT NULL,
  `edit_by` varchar(32) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_glassware`
--

CREATE TABLE `tb_daftar_glassware` (
  `nomor` int(11) DEFAULT NULL,
  `id_aset` varchar(20) NOT NULL,
  `id_instrumen` varchar(10) NOT NULL,
  `tipe_instrumen` varchar(128) NOT NULL,
  `rumus_instrumen` varchar(128) NOT NULL,
  `merek` varchar(128) NOT NULL,
  `kapasitas` varchar(128) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `type` varchar(128) NOT NULL,
  `grade` varchar(128) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `aktif` int(2) NOT NULL,
  `kondisi` int(11) NOT NULL,
  `status_kalibrasi` varchar(128) NOT NULL,
  `awal_kalibrasi` date NOT NULL,
  `selanjutnnya_kalibrasi` date NOT NULL,
  `periode_kalibrasi` int(3) NOT NULL,
  `id_kalibrasi` varchar(32) NOT NULL,
  `penyelia` varchar(32) NOT NULL,
  `user_input` varchar(128) NOT NULL,
  `tanggal_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_input_kalibrasi_glassware`
--

CREATE TABLE `tb_daftar_input_kalibrasi_glassware` (
  `id_input` int(10) NOT NULL,
  `id_lembarkerja` varchar(15) DEFAULT NULL,
  `id_laporan` int(10) NOT NULL,
  `id_aset` varchar(32) NOT NULL,
  `skala` decimal(5,1) DEFAULT NULL,
  `perulangan` int(11) NOT NULL,
  `berat_kosong` decimal(11,5) NOT NULL,
  `berat_isi` decimal(9,5) NOT NULL,
  `suhu_akuades` double(4,2) NOT NULL,
  `berat_air` decimal(10,4) NOT NULL,
  `Hasil1` decimal(10,4) NOT NULL,
  `Hasil2` decimal(10,4) NOT NULL,
  `Hasil3` decimal(10,4) NOT NULL,
  `Hasil4` decimal(10,5) NOT NULL,
  `V20` decimal(10,4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_instrumen`
--

CREATE TABLE `tb_daftar_instrumen` (
  `id_aset` varchar(20) NOT NULL,
  `id_instrumen` varchar(10) NOT NULL,
  `no_aset` varchar(32) NOT NULL,
  `tipe_instrumen` varchar(128) NOT NULL,
  `merek` varchar(128) NOT NULL,
  `seri` varchar(128) NOT NULL,
  `serial_number` varchar(64) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `aktif` int(2) NOT NULL,
  `kondisi` int(11) NOT NULL,
  `status_kalibrasi` varchar(128) NOT NULL,
  `awal_kalibrasi` date NOT NULL,
  `selanjutnnya_kalibrasi` date NOT NULL,
  `periode_kalibrasi` int(3) NOT NULL,
  `id_log_instrumen` varchar(32) NOT NULL,
  `user_input` varchar(128) NOT NULL,
  `tanggal_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_kalibrasi_glassware`
--

CREATE TABLE `tb_hasil_kalibrasi_glassware` (
  `id_hasil` int(11) NOT NULL,
  `id_laporan` int(15) NOT NULL,
  `id_aset` varchar(32) NOT NULL,
  `suhu_awal` decimal(4,1) NOT NULL,
  `suhu_ahkir` decimal(4,1) NOT NULL,
  `suhu_avg` decimal(4,2) NOT NULL,
  `kelembaban_awal` int(4) NOT NULL,
  `kelembaban_ahkir` int(4) NOT NULL,
  `kelembaban_avg` int(4) NOT NULL,
  `beratair_avg` float(10,4) NOT NULL,
  `V20` decimal(6,4) NOT NULL,
  `stddev_pop` decimal(12,9) NOT NULL,
  `koreksi` decimal(5,4) NOT NULL,
  `ketidakpastian` decimal(10,6) NOT NULL,
  `waktu_input` datetime NOT NULL,
  `suhuakuades_avg` decimal(4,2) NOT NULL,
  `maxsuhu` decimal(4,2) NOT NULL,
  `minsuhu` decimal(4,2) NOT NULL,
  `id_lembarkerja` varchar(15) NOT NULL,
  `skala` decimal(5,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_input_kalibrasi_glassware`
--

CREATE TABLE `tb_input_kalibrasi_glassware` (
  `id_input` int(10) NOT NULL,
  `id_lembarkerja` varchar(15) DEFAULT NULL,
  `id_laporan` int(10) NOT NULL,
  `id_aset` varchar(32) NOT NULL,
  `skala` decimal(5,1) DEFAULT NULL,
  `perulangan` int(11) NOT NULL,
  `berat_kosong` decimal(11,5) NOT NULL,
  `berat_isi` decimal(9,5) NOT NULL,
  `suhu_akuades` double(4,1) NOT NULL,
  `berat_air` decimal(10,4) NOT NULL,
  `hasil1` decimal(10,4) NOT NULL,
  `hasil2` decimal(10,4) NOT NULL,
  `hasil3` decimal(10,4) NOT NULL,
  `hasil4` decimal(10,5) NOT NULL,
  `V20` decimal(10,4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_instrumen_baru`
--

CREATE TABLE `tb_instrumen_baru` (
  `nomor` int(11) NOT NULL,
  `id_order` varchar(32) NOT NULL,
  `id_order_unit` varchar(32) NOT NULL,
  `id_order_tiket` varchar(32) NOT NULL,
  `id_batch` varchar(32) NOT NULL,
  `tanggal_input` date NOT NULL,
  `kategori_barang` varchar(128) NOT NULL,
  `id_instrumen` varchar(32) NOT NULL,
  `rumus_instrumen` varchar(32) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `spesifikasi` varchar(128) NOT NULL,
  `merek` varchar(254) NOT NULL,
  `ukuran` varchar(8) NOT NULL,
  `ukuran_satuan` varchar(32) NOT NULL,
  `type` varchar(64) NOT NULL,
  `grade` varchar(16) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `jumlah_diterima` int(4) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `penyelia` varchar(128) NOT NULL,
  `id_status` varchar(11) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `urgent` varchar(11) NOT NULL,
  `penawaran` varchar(2) NOT NULL,
  `no_pr` varchar(32) NOT NULL,
  `no_po` varchar(32) NOT NULL,
  `keterangan_ka_unit` varchar(300) NOT NULL,
  `keterangan_seleksi_unit` varchar(300) NOT NULL,
  `keterangan_pr` varchar(300) NOT NULL,
  `keterangan_diterima` varchar(300) NOT NULL,
  `keterangan_ditunda` varchar(300) NOT NULL,
  `keterangan_dibatalkan` varchar(300) NOT NULL,
  `tanggal_buat` datetime NOT NULL,
  `tanggal_penyelia` datetime NOT NULL,
  `tanggal_ka_unit` datetime NOT NULL,
  `tanggal_admin` datetime NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `tanggal_seleksi` datetime NOT NULL,
  `tanggal_pr` datetime NOT NULL,
  `tanggal_diterima` datetime NOT NULL,
  `tanggal_ditunda` datetime NOT NULL,
  `tanggal_dibatalkan` datetime NOT NULL,
  `last_edit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karantina_dummy`
--

CREATE TABLE `tb_karantina_dummy` (
  `id_request` int(10) NOT NULL,
  `no_request` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `desc_produk` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `date_exp` date NOT NULL,
  `date_uji_ulang` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `requestor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karantina_hasil_analisa`
--

CREATE TABLE `tb_karantina_hasil_analisa` (
  `plant_code` varchar(4) NOT NULL,
  `quarantine_number` varchar(10) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `years` year(4) DEFAULT NULL,
  `material` varchar(40) DEFAULT NULL,
  `mic_code` varchar(10) DEFAULT NULL,
  `mic_description` varchar(40) DEFAULT NULL,
  `specification` varchar(40) DEFAULT NULL,
  `result` varchar(40) DEFAULT NULL,
  `inspection_lot_reference` varchar(40) DEFAULT NULL,
  `created_by` varchar(8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `changed_by` varchar(8) DEFAULT NULL,
  `changed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karantina_request`
--

CREATE TABLE `tb_karantina_request` (
  `id_request` int(5) NOT NULL,
  `plant` varchar(4) NOT NULL,
  `no_karantina` varchar(10) NOT NULL,
  `month` varchar(11) NOT NULL,
  `years` year(4) NOT NULL,
  `material` varchar(40) NOT NULL,
  `bets` varchar(40) NOT NULL,
  `bets_sap` varchar(40) NOT NULL,
  `mat_desc` varchar(100) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `tgl_uji_ulang` date DEFAULT NULL,
  `tgl_karantina` date DEFAULT NULL,
  `masalah` varchar(40) DEFAULT NULL,
  `desc_masalah` varchar(80) DEFAULT NULL,
  `stats` varchar(40) DEFAULT NULL,
  `qc` varchar(40) DEFAULT NULL,
  `koor_qc` varchar(40) DEFAULT NULL,
  `kaunit` varchar(40) DEFAULT NULL,
  `reff_insp_lot` varchar(40) DEFAULT NULL,
  `reff_order` varchar(40) DEFAULT NULL,
  `distribusi` varchar(80) DEFAULT NULL,
  `created_by` varchar(8) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `changed_by` varchar(8) DEFAULT NULL,
  `changed_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karantina_tf_sample`
--

CREATE TABLE `tb_karantina_tf_sample` (
  `plant_code` varchar(4) NOT NULL,
  `quarantine_number` varchar(10) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `years` year(4) DEFAULT NULL,
  `material` varchar(40) DEFAULT NULL,
  `mic_code` varchar(10) DEFAULT NULL,
  `mic_description` varchar(40) DEFAULT NULL,
  `specification` varchar(40) DEFAULT NULL,
  `result` varchar(40) DEFAULT NULL,
  `inspection_lot_reference` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_glassware`
--

CREATE TABLE `tb_kategori_glassware` (
  `id_instrumen` varchar(10) NOT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `kategori_instrumen` varchar(64) NOT NULL,
  `kalibrasi` int(11) NOT NULL,
  `periode_kalibrasi` int(4) DEFAULT NULL,
  `rumus_instrumen` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori_glassware`
--

INSERT INTO `tb_kategori_glassware` (`id_instrumen`, `jumlah`, `kategori_instrumen`, `kalibrasi`, `periode_kalibrasi`, `rumus_instrumen`) VALUES
('', NULL, 'Semua Glassware\r\n', 1, NULL, ''),
('AL001', 0, 'Alat Destilasi MA', 0, 358, 'RMS001'),
('AL002', 0, 'Alat/ Kolom Isolasi', 0, 358, 'RMS001'),
('AL003', 0, 'Batang Pengaduk', 0, 358, 'RMS001'),
('AL004', 0, 'Beaker Glass', 0, 358, 'RMS001'),
('AL005', 0, 'Beaker Glass Coklat', 0, 358, 'RMS001'),
('AL006', 0, 'Botol COD', 0, 358, 'RMS001'),
('AL007', 0, 'Botol Coklat', 0, 358, 'RMS001'),
('AL008', 0, 'Botol Reagent Bening', 0, 358, 'RMS001'),
('AL009', 0, 'Botol Winkler', 0, 358, 'RMS001'),
('AL010', 0, 'Buret', 1, 358, 'RMS001'),
('AL011', 0, 'Buret Coklat', 0, 358, 'RMS001'),
('AL012', 0, 'Cawan', 0, 358, 'RMS001'),
('AL013', 0, 'Corong', 0, 358, 'RMS001'),
('AL014', 0, 'Corong Pisah', 0, 358, 'RMS001'),
('AL015', 0, 'Corong Pisah Coklat', 0, 358, 'RMS001'),
('AL016', 0, 'Desikator', 0, 358, 'RMS001'),
('AL017', 0, 'Erlenmeyer', 0, 358, 'RMS001'),
('AL018', 0, 'Erlenmeyer Coklat', 0, 358, 'RMS001'),
('AL019', 0, 'Flakon', 0, 358, 'RMS001'),
('AL020', 0, 'Flakon Coklat', 0, 358, 'RMS001'),
('AL021', 0, 'Gelas Lemak', 0, 358, 'RMS001'),
('AL022', 0, 'Gelas Ukur', 1, 358, 'RMS001'),
('AL023', 0, 'Glass Jam', 0, 358, 'RMS001'),
('AL024', 0, 'Kolom Kromatografi', 0, 358, 'RMS001'),
('AL025', 0, 'Kolom Pestisida', 0, 358, 'RMS001'),
('AL026', 0, 'Kondensor Lemak (Soxhlet)', 0, 358, 'RMS001'),
('AL027', 0, 'Kondensor MA Berskala', 0, 358, 'RMS001'),
('AL028', 0, 'Kondensor Refluks Ulir', 0, 358, 'RMS001'),
('AL029', 0, 'Kondensor untuk Destilasi', 0, 358, 'RMS001'),
('AL030', 0, 'Krus', 0, 358, 'RMS001'),
('AL031', 0, 'Labu Alas Bulat', 0, 358, 'RMS001'),
('AL032', 0, 'Labu Alas Bulat Leher Panjang', 0, 358, 'RMS001'),
('AL033', 0, 'Labu Leher 3', 0, 358, 'RMS001'),
('AL034', 0, 'Labu Ukur', 1, 358, 'RMS001'),
('AL035', 0, 'Labu Ukur Coklat', 0, 358, 'RMS001'),
('AL036', 0, 'Magnetic Stirrer', 0, 358, 'RMS001'),
('AL037', 0, 'Mikropipet', 0, 358, 'RMS001'),
('AL038', 0, 'Mortir', 0, 358, 'RMS001'),
('AL039', 0, 'Piknometer', 1, 358, 'RMS001'),
('AL040', 0, 'Piknometer+Thermometer', 0, 358, 'RMS001'),
('AL041', 0, 'Pipa Alonga', 0, 358, 'RMS001'),
('AL042', 0, 'Pipet Tetes', 0, 358, 'RMS001'),
('AL043', 0, 'Pipet Ukur', 1, 358, 'RMS001'),
('AL044', 0, 'Pipet Volume', 1, 358, 'RMS001'),
('AL045', 0, 'Rangkaian Destilasi', 0, 358, 'RMS001'),
('AL046', 0, 'Skala Kadar Air', 0, 358, 'RMS001'),
('AL047', 0, 'Soxhlet', 0, 358, 'RMS001'),
('AL048', 0, 'Spatula', 0, 358, 'RMS001'),
('AL049', 0, 'Stamper', 0, 358, 'RMS001'),
('AL050', 0, 'Tabung Centrifuge', 0, 358, 'RMS001'),
('AL051', 0, 'Tabung COD', 0, 358, 'RMS001'),
('AL052', 0, 'Tabung Digestion Protein', 0, 358, 'RMS001'),
('AL053', 0, 'Tabung Reaksi', 0, 358, 'RMS001'),
('AL054', 0, 'Tabung TOC', 0, 358, 'RMS001'),
('AL055', 0, 'Thermometer', 0, 358, 'RMS001'),
('AL056', 0, 'Vacuum Pump', 0, 358, 'RMS001'),
('AL057', 0, 'Vessel', 0, 358, 'RMS001'),
('AL058', 0, 'Vial Agylent Coklat', 0, 358, 'RMS001'),
('AL059', 0, 'Vial GC', 0, 358, 'RMS001'),
('AL060', 0, 'Vial HPLC', 0, 358, 'RMS001'),
('AL061', 0, 'Vial UPLC', 0, 358, 'RMS001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_instrumen`
--

CREATE TABLE `tb_kategori_instrumen` (
  `id_instrumen` varchar(10) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `kategori_instrumen` varchar(64) NOT NULL,
  `periode_kalibrasi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori_instrumen`
--

INSERT INTO `tb_kategori_instrumen` (`id_instrumen`, `jumlah`, `kategori_instrumen`, `periode_kalibrasi`) VALUES
('', 0, 'Semua Instrumen', 0),
('AL001', 0, 'Analytical Balance', 23),
('AL002', 0, 'Conductivity Meter', 23),
('AL003', 0, 'HPLC', 358),
('AL004', 0, 'pH meter', 358);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_instrumen`
--

CREATE TABLE `tb_log_instrumen` (
  `id_kalibrasi` varchar(11) NOT NULL,
  `id_aset` varchar(32) NOT NULL,
  `id_laporan` int(10) NOT NULL,
  `tindakan` varchar(128) NOT NULL,
  `petugas` varchar(254) NOT NULL,
  `jam_mulai` datetime NOT NULL,
  `jam_selesai` datetime NOT NULL,
  `kondisi` varchar(32) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `user_input` varchar(128) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tempat_kalibrasi` varchar(128) NOT NULL,
  `cetak_laporan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_api`
--

CREATE TABLE `tb_master_api` (
  `id_api` int(5) NOT NULL,
  `name_api` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `tipe_status` int(1) NOT NULL,
  `create_at` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_api`
--

INSERT INTO `tb_master_api` (`id_api`, `name_api`, `token`, `tipe_status`, `create_at`, `expiry_date`) VALUES
(3, 'SAP', 'Bearer c29dcbaace39f843510dd02c2a0c765cfb7e9238a986701ba123e6338bd2497a', 1, '2024-05-12', '0000-00-00'),
(4, 'Vendor A', 'Bearer 1b95e42beca0903355ba166d697f5cef9ab64a6fe3c9bd8cbb0e003008645a8e', 1, '2024-05-12', '2024-09-30'),
(7, 'test', 'Bearer a660a723901478e3f72767e85715fa50d1b20784643bde0d4913f72e250201c9', 1, '2024-05-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_company`
--

CREATE TABLE `tb_master_company` (
  `id_plant` int(11) NOT NULL,
  `company_code` varchar(10) DEFAULT NULL,
  `company_sub` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_company`
--

INSERT INTO `tb_master_company` (`id_plant`, `company_code`, `company_sub`, `company_name`) VALUES
(1, 'S100', 'SM-Bergas', 'PT Jamu dan Farmasi Sido Muncul Tbk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_default_approval`
--

CREATE TABLE `tb_master_default_approval` (
  `id_default_approval` int(10) NOT NULL,
  `name_default` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_default_approval`
--

INSERT INTO `tb_master_default_approval` (`id_default_approval`, `name_default`) VALUES
(6, 'IT'),
(7, 'MANAGER RND'),
(8, 'MANAGER QC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_halaman`
--

CREATE TABLE `tb_master_halaman` (
  `id_halaman` int(6) NOT NULL,
  `nama_halaman` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `tipe` int(1) NOT NULL,
  `view` int(1) NOT NULL,
  `create` int(1) NOT NULL,
  `update` int(1) NOT NULL,
  `delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_halaman`
--

INSERT INTO `tb_master_halaman` (`id_halaman`, `nama_halaman`, `title`, `url`, `tipe`, `view`, `create`, `update`, `delete`) VALUES
(1, 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 0),
(2, 'Daftar Instrumen', 'Daftar Instrumen', 'instrumen', 2, 1, 1, 0, 0),
(3, 'Daftar Glassware', 'Daftar Glassware', 'glassware', 2, 1, 1, 0, 0),
(30, 'Kategori Instrumen', 'Daftar Kategori Instrumen', 'kategori_instrumen', 1, 1, 1, 0, 0),
(31, 'Kategori Glassware', 'Daftar Kategori Glassware', 'kategori_glassware', 1, 1, 1, 0, 0),
(32, 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(38, 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(39, 'Master ', 'Master', 'master', 2, 1, 1, 0, 0),
(40, 'Karantina', 'Karantina', 'karantina', 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_kategori_barang`
--

CREATE TABLE `tb_master_kategori_barang` (
  `id_kategori` int(10) NOT NULL,
  `kategori_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_kategori_barang`
--

INSERT INTO `tb_master_kategori_barang` (`id_kategori`, `kategori_barang`) VALUES
(1, 'Glassware'),
(2, 'Sparepart'),
(3, 'Sparepart PCR'),
(4, 'IT'),
(5, 'Alat Tulis Kantor'),
(6, 'Mebel'),
(7, 'Reagent'),
(8, 'Standard Uji'),
(9, 'Media Mikro'),
(10, 'Teknik'),
(11, 'Telekomunikasi'),
(12, 'Kalibrasi Eksternal'),
(13, 'Consumable Part Instrument'),
(14, 'Gas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_list_approval`
--

CREATE TABLE `tb_master_list_approval` (
  `id_approval` int(5) NOT NULL,
  `id_default_approval` int(5) NOT NULL,
  `pernr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_list_approval`
--

INSERT INTO `tb_master_list_approval` (`id_approval`, `id_default_approval`, `pernr`) VALUES
(7, 3, '90002459'),
(11, 6, '90002459'),
(13, 7, '90001370'),
(14, 8, '90000260');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_menu`
--

CREATE TABLE `tb_master_menu` (
  `id_menu` int(3) NOT NULL,
  `menu_level` int(1) NOT NULL,
  `id_menu_parent` int(2) DEFAULT NULL,
  `menu_name` varchar(256) NOT NULL,
  `menu_icon` varchar(256) NOT NULL,
  `menu_title` varchar(256) NOT NULL,
  `menu_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_menu`
--

INSERT INTO `tb_master_menu` (`id_menu`, `menu_level`, `id_menu_parent`, `menu_name`, `menu_icon`, `menu_title`, `menu_url`) VALUES
(1, 0, 1, 'Dashboard', 'bx bx-home-alt', 'Dashboard', 'dashboard'),
(2, 1, 2, 'Apps', 'bx bx-grid-alt', 'Apps', 'apps'),
(3, 2, 2, 'Apps-Permintaan Analisa', '-', 'Daftar Karantina', 'karantina'),
(4, 1, 4, 'Master', 'bx bx-archive', 'Master', 'master'),
(6, 2, 4, 'Master-Menu', '-', 'Menu', 'master/menu'),
(11, 2, 4, 'Master-User', '', 'User', 'master/user'),
(12, 2, 2, 'Apps-Daftar Approval', '', 'Daftar Approval', 'approval'),
(13, 2, 2, 'Apps-Penerimaan Sample LAB', '', 'Penerimaan Sample LAB', 'sample'),
(14, 2, 4, 'Master-API', '', 'API', 'master/api'),
(15, 2, 2, 'Apps-Penerimaan Sample RND', '', 'Penerimaan Sample RND', 'sample_rnd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_rumus`
--

CREATE TABLE `tb_master_rumus` (
  `id_rumus` int(3) NOT NULL,
  `rumus_instrumen` varchar(32) NOT NULL,
  `Q` decimal(10,8) NOT NULL,
  `RhoW` decimal(10,8) NOT NULL,
  `RhoAT` decimal(10,8) NOT NULL,
  `RhoA` decimal(10,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_rumus`
--

INSERT INTO `tb_master_rumus` (`id_rumus`, `rumus_instrumen`, `Q`, `RhoW`, `RhoAT`, `RhoA`) VALUES
(1, 'RMS001', 1.00001300, 0.99820200, 7.78000000, 0.00120000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_satuan`
--

CREATE TABLE `tb_master_satuan` (
  `id` int(10) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `ukuran` decimal(6,1) NOT NULL,
  `satuan_ukuran` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_satuan`
--

INSERT INTO `tb_master_satuan` (`id`, `satuan`, `ukuran`, `satuan_ukuran`) VALUES
(1, '', 0.5, 'g'),
(2, 'Buah', 1.0, ''),
(3, 'Pak', 10.0, ''),
(4, 'Unit', 10.0, ''),
(5, 'Botol', 100.0, ''),
(6, '', 1000.0, ''),
(7, 'Rim', 2.0, ''),
(8, '', 200.0, ''),
(9, 'Lembar', 2000.0, ''),
(10, '', 25.0, ''),
(11, 'Lembar', 250.0, ''),
(12, 'Lembar', 5.0, 'Kg'),
(13, 'Lembar', 50.0, 'L'),
(14, 'Lembar', 150.0, 'ml'),
(15, 'Lembar', 2500.0, ''),
(16, 'Lembar', 4000.0, ''),
(17, 'Lembar', 5000.0, ''),
(18, 'Lembar', 500.0, ''),
(19, 'Lembar', 500.0, ''),
(20, 'Lembar', 500.0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_status_order`
--

CREATE TABLE `tb_master_status_order` (
  `id_status` int(2) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_status_order`
--

INSERT INTO `tb_master_status_order` (`id_status`, `status`) VALUES
(1, 'Menunggu Persetujuan Spv'),
(2, 'Diproses Admin Lab'),
(3, 'Menunggu Persetujuan Ka Unit'),
(4, 'Diproses Admin SAP'),
(5, 'Menunggu Penawaran'),
(6, 'Unit Seleksi Penawaran'),
(7, 'Menunggu Persetujuan Direktur'),
(8, 'Pembuatan PR'),
(9, 'Input Nomor PO'),
(10, 'Proses Pembelian'),
(11, 'Diterima Sebagian'),
(12, 'Barang Diterima'),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, 'Orderan Ditunda'),
(20, 'Orderan Dibatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_unit_company`
--

CREATE TABLE `tb_master_unit_company` (
  `id_unit` int(11) NOT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `unit_type` int(11) DEFAULT 2,
  `unit_priority` int(11) DEFAULT 1,
  `unit_cost_center` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `company_parent` varchar(255) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `company_code` varchar(10) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_unit_company`
--

INSERT INTO `tb_master_unit_company` (`id_unit`, `unit_name`, `unit_type`, `unit_priority`, `unit_cost_center`, `email`, `company_parent`, `id_company`, `company_code`, `company_name`) VALUES
(1, 'Budidaya Tanaman', 1, 1, 'S100E003', 'budidaya@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(2, 'Building', 1, 1, 'S100S001', 'perawatangedung@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(3, 'COD Botol', 1, 1, 'S100P017', 'codbotol.sidomuncul@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(4, 'Finance', 1, 1, 'S000F002', 'cepungcentil@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(5, 'General Affair', 1, 1, 'S100H002', 'ga.sidomuncul@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(6, 'General Affair - Advertising', 1, 1, 'S100H002', 'Promosisidomuncul@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(7, 'General Affair - Angkutan', 1, 1, 'S100H002', 'angkutansidomuncul@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(8, 'General Affair - K3', 1, 1, 'S100H002', 'ga.k3@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(9, 'General Affair - Rumah Tangga', 1, 1, 'S100H002', 'rumahtangga.sidomuncul@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(10, 'General Affair - Satpam', 1, 1, 'S100H002', 'satpamsm@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(11, 'General Affair - Telekomunikasi', 1, 1, 'S100H002', 'divisitelekomunikasism@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(12, 'Gudang Alat Kebersihan & Tulis', 1, 1, 'S100L016', 'gd.atk@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(13, 'Gudang Bahan Baku Non Simplisia', 1, 1, 'S100L002', 'gbbns@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(14, 'Gudang Bahan Baku Simplisia', 1, 1, 'S100L003', 'gbbs@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(15, 'Gudang Bahan Baku Simplisia Bersih & For', 1, 1, 'S100L004', 'gbbsb@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(16, 'Gudang Bahan Pengemas', 1, 1, 'S100L005', 'gudangpengemas@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(17, 'Gudang Pengemas Jamu', 1, 1, 'S100L009', 'gdkemaspildanjamu@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(18, 'Gudang Produk Jadi', 1, 1, 'S100L015', 'gudangjadi@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(19, 'HR-BP - Payroll', 1, 1, 'S100H001', '', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(20, 'HR-BP - People Development', 1, 1, 'S100H001', 'training@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(21, 'HR-BP - Recruitment', 1, 1, 'S100H001', 'recruitment.klepu@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(22, 'HR-BP - Social Relation', 1, 1, 'S100H001', 'social.relation@sidomuncul.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(23, 'Humas', 1, 1, 'S100H004', 'humas.semarang@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(24, 'Information Technology', 2, 1, 'S000F003', 'adminit.klepu@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(25, 'Lab Analisa', 2, 1, 'S100R003', 'prasojotrii@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(26, 'Logistik', 1, 1, 'S100L018', 'logistik.sm@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(27, 'Pemastian Mutu', 1, 1, 'S100R006', 'pemastian.mutu@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(28, 'Pengawasan Mutu', 1, 1, 'S100R002', 'qualitycontrol@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(29, 'Pengolahan Ekstrak', 1, 1, 'S100P007', 'ekstraksi@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(30, 'Pengolahan Kopi', 1, 1, 'S100P008', 'pengolahankopi@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(31, 'Pengolahan Serbuk Jamu', 1, 1, 'S100P001', 'serbukjamu@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(32, 'Poliklinik', 1, 1, 'S100S003', 'klinikpratama425@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(33, 'PPIC', 1, 1, 'S100L001', 'internalcontrol@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(34, 'Pra Pengolahan Bahan Baku Non Simplisia', 1, 1, 'S100P002', 'ppbbns@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(35, 'Pra Pengolahan Bahan Baku Simplisia', 1, 1, 'S100P003', 'ppbbs@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(36, 'Produksi Cairan Obat Dalam', 1, 1, 'S100P005', 'cairanobatdalam@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(37, 'Produksi COD2', 1, 1, 'S100P014', 'cairanobatdalam@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(38, 'Produksi Jamu Serbuk', 1, 1, 'S100P004', 'jamuserbuk@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(39, 'Produksi Makanan,Minuman Cair & Kosmetik', 1, 1, 'S100P006', 'mmk.sidomuncul@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(40, 'Produksi Pil Klepu', 1, 1, 'S100P015', 'pil.jamu@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(41, 'Produksi Sediaan Farmasi', 1, 1, 'S100P009', 'sediaanfarmasi@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(42, 'Produksi Serbuk Effervescent', 1, 1, 'S100P010', 'pengolahanserbukeffervescent@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(43, 'Produksi Serbuk Instant & Sediaan Pangan', 1, 1, 'S100P011', 'sisp.sidomuncul@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(44, 'Registrasi', 1, 1, 'S100R004', 'rnd.registrasi@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(45, 'Research & Development', 2, 1, 'S100R001', 'prasojotrii@gmail.com', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(46, 'Teknik', 1, 1, 'S100S002', 'teknik@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk'),
(47, 'Uji Farmakologi', 1, 1, 'S100R005', 'rnd.farmakologi@sidomuncul.co.id', 'SM-Bergas', 1, 'S100', 'PT Jamu dan Farmasi Sido Muncul Tbk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_unit_sub`
--

CREATE TABLE `tb_master_unit_sub` (
  `id_unit_sub` int(3) NOT NULL,
  `id_unit` int(3) NOT NULL,
  `sub_unit_name` varchar(256) NOT NULL,
  `sub_unit_inisial` varchar(10) NOT NULL,
  `email_sub_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_unit_sub`
--

INSERT INTO `tb_master_unit_sub` (`id_unit_sub`, `id_unit`, `sub_unit_name`, `sub_unit_inisial`, `email_sub_unit`) VALUES
(1, 25, 'Administration', 'ADM', 'laborat@sidomuncul.co.id'),
(2, 25, 'Lab Mikro', 'MKR', 'laboratmikrobiologi.sm@gmail.com'),
(3, 25, 'Lab Kimia (MTS)', 'MTS', 'groupmts.sm@gmail.com'),
(4, 25, 'Lab Kimia (BBG)', 'BBG', 'delio.paundra@gmail.com'),
(5, 25, 'Lab Kimia (OTC & Simplisia)', 'OTCSMP', 'otcsimplisia@gmail.com'),
(6, 25, 'Lab Lingkungan', 'LGK', 'delio.paundra@gmail.com'),
(7, 24, 'General', '', ''),
(9, 24, 'Administration', 'ADM', ''),
(10, 28, 'Administration', 'ADM', 'qualitycontrol@sidomuncul.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_user`
--

CREATE TABLE `tb_master_user` (
  `id_user` int(5) NOT NULL,
  `pernr` varchar(10) NOT NULL,
  `password` varchar(254) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `kode_admin` varchar(2) NOT NULL,
  `id_unit_sub` varchar(32) DEFAULT NULL,
  `id_unit` int(10) NOT NULL,
  `id_plant` int(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jobdesk` varchar(64) NOT NULL,
  `locked` int(1) NOT NULL,
  `tipe` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `change_at` datetime DEFAULT NULL,
  `change_by` varchar(128) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_user`
--

INSERT INTO `tb_master_user` (`id_user`, `pernr`, `password`, `name`, `kode_admin`, `id_unit_sub`, `id_unit`, `id_plant`, `email`, `jobdesk`, `locked`, `tipe`, `created_at`, `created_by`, `change_at`, `change_by`, `last_login`) VALUES
(1, '90002459', '$2y$10$ZVZSYaK/YVhefkf5ond23u1Y/5gVrSAlqFnvZMXbtWQ/dr3.bDYAS', 'Prasojo Tri Widiyanto', '', '7', 24, 1, 'prasojo.tri@sidomuncul.co.id', 'Staff', 0, 'Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-05-07 23:43:46', '0000-00-00 00:00:00', '2024-12-18 08:19:04'),
(2, '90000093', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Aldi Ridson Huda', '', '4', 25, 1, 'prasojo.tri@sidomuncul.co.id', 'Ka unit', 0, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-11-04 10:40:59', '0000-00-00 00:00:00', '2024-11-21 15:42:29'),
(3, '90000409', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Anita Martiana', '', '4', 25, 1, 'prasojo.tri@sidomuncul.co.id', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '90000404', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Fira Fitriana', '', '4', 25, 1, 'prasojo.tri@sidomuncul.co.id', 'Koordinator QC', 0, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-11-04 10:42:11', '0000-00-00 00:00:00', '2024-11-21 15:42:52'),
(5, '90005531', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Imro\'Atun Mahmudah', '', '4', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '90004735', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Isma Datin Riri Cahya P', '', '4', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '90003474', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Pramita Aryati', '', '4', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '90002607', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Reni Arifianti', '', '4', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '90006039', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Sandya Puspa Rahayu', '', '4', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '90002468', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Vania Mardika Syavitri', '', '4', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '90002139', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Marita Widyaningrum', '', '4', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '90005105', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Oey, Stevanus Ardian H', '', '4', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '90002128', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Retno Widyaningsih', '', '4', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '90006600', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Anis Puspita Sari', '', '4', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '90005483', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Desta Firontika', '', '4', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '90006462', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Ritho Ritura', '', '4', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '90001627', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dwi Rahayu Handayani', '', '4,6', 25, 1, 'delio.paundra@gmail.com', 'Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '90004952', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Adela Syarifina', '', '6', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '90001735', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Desi Kurnia Sari', '', '6', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '90003881', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Retno Rena Pratama', '', '6', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '90006254', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Tri Nur Janah', '', '6', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '90003546', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Cahya Amalia Pramesti', '', '6', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '90005494', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Deniza Dian Wardoyo', '', '6', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '90005093', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Ririt Kurniawati', '', '6', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '90005644', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Mardhiyyatush Sholihah', '', '6', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '90003048', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Nova Shintia Bokau', '', '6', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '90005524', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Michelle Oryza Devi N', '', '1', 25, 1, 'auditiso.sm@gmail.com', 'Administrasi', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '90003092', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Lesi Deska Ardanti', 'C', '1', 25, 1, 'deskaardanti@gmail.com', 'Administrasi', 0, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-12-16 09:14:11'),
(29, '90001457', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Sri Daryati', 'B', '1', 25, 1, 'srisetiawan0508@gmail.com', 'Administrasi', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '90001330', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Umi Ardani', 'A', '1', 25, 1, 'umiard.wkk@gmail.com', 'Administrasi', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '90002083', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Suwarti', '', '1', 25, 1, '', 'Asisten Administrasi', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '90001737', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dewie Koes Harayu', '', '3', 25, 1, 'groupmts.sm@gmail.com', 'Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '90003516', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Annisa Wahyu S', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '90002988', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Antalgin Prabuningtyas', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '90002296', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Ari Widyastutik', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '90003493', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dewi Rahmawati', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '90002566', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dwi Yani', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '90005492', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Nindya Novita Wahyu A', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '90006602', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Galih Noviar Pratama', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '90003883', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Miftachul Jannah', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '90004165', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Didha Rizki Sholika', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '90005165', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Quthrotun Nada A', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '90006157', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Nindarwoto Hera Indrasti', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '90006160', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Winda Ludfi Ariani', '', '3', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '90006599', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Angga Miftakhul Rizky', '', '3', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '90002508', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Denok Wulandari', '', '3', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '90002847', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Tri Ambar Setyaningsih', '', '3', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '90003553', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Sri Nur Daryasih', '', '3', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '90003428', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Hartini', '', '3', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '90006559', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Reza Zatadini', '', '3', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '90006171', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Yudha Hery Setyawan', '', '3', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '90006264', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Ulyana Nur Habitoh', '', '3', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '90001733', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Indah Krismiyati', '', '5', 25, 1, 'otcsimplisia@gmail.com', 'Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '90002852', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Ana Maulia Ulfah', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '90001527', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dewi Endah Puspitasari', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '90001564', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Diah Pravitasari', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '90006547', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Diah Kartikasari', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '90001736', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dwi Lestari', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '90003671', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Galih Andi Rahmanto', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '90005510', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Galuh Pravita Briliani', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '90002987', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Kharisma Dessy A', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '90002586', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Meytrin Delfi Irawati', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '90006283', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Sabrina Intan Salsabila', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '90002674', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Yusi Nora Hermada', '', '5', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '90005527', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Puput Wahyuningtias', '', '5', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '90002743', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Malfin Delsia Kasandra', '', '5', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '90002903', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Aprilya Muvidasari', '', '5', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '90003441', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Fajrul Suryandari', '', '5', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '90003616', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Murti Cahyaningrum', '', '5', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, '90004672', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Novi Aditya Kumalasari', '', '5', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, '90006385', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Ratna Kusuma Harjanti', '', '5', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, '90003746', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Annisa Marda Gupita', '', '5', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, '90003090', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dita Nuryuliastuti', '', '5', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, '90002294', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Sulis Irtanti', '', '5', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, '90003601', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Yosia Adi Susetyo', '', '5', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, '90001078', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Candra Ratnaningsih', '', '2', 25, 1, 'laboratmikrobiologi.sm@gmail.com', 'Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, '90001732', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Asih Dyah Ekowati', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '90003821', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Cicilia Lilik Waskinasih', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, '90003277', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Desi Wulandari', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, '90003091', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Desy Rachmalisa Verawati', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, '90002760', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Fitri Permanasari', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, '90004547', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Iyon Praditya', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, '90003581', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Jafar Adi Nugroho', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, '90004577', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Kholiq Setiawan', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, '90001624', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Nur Ika Permatasari', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '90002169', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Pradita Anggriani', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, '90006269', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Rizky Enggar Asnaningsih', '', '2', 25, 1, '', 'Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, '90004602', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Della Savira', '', '2', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '90006543', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Hoo Mega Nissa Cp', '', '2', 25, 1, '', 'Asisten Analis', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, '90003035', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Citra Arum Pawestri', '', '2', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, '90004546', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Siti Mu\'Awanah', '', '2', 25, 1, '', 'Asisten Penyelia', 1, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, '90001127', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Erni Rusmalawati', '', '1,2,3,4,5,6', 25, 1, 'prasojotrii@gmail.com', 'Ka Unit Lab Analisa', 0, 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-12-14 15:45:10'),
(125, '9000', '$2y$10$yX8npM81LfvWCOBEXp0NO.MJAstwSzW4hAC6B2DdAEYQGz/uQAayq', 'test', '', '9', 24, 1, 'alerts.smsuite@gmail.com', 'Admin', 0, 'User', '2024-05-08 08:21:27', NULL, '2024-05-08 10:05:09', NULL, '2024-05-08 11:15:15'),
(128, '90005751', '$2y$10$c4mCBTZUm77D0wNz8nptjOP6LXZgK8aR1LUHPSfL2OJYpQKpJ3Mce', 'David Wijaya', '', '7', 24, 1, 'prasojo.tri@sidomuncul.co.id', 'Koordinator QC', 0, 'User', '2024-06-30 16:34:21', NULL, '2024-07-02 12:44:06', NULL, '2024-11-13 11:51:52'),
(129, '90003545', '$2y$10$bTInkDa7neBNUFHGgQf5/.5WwdmYC7ADjqrYHvoW1XOXyt2gt3Oqm', 'Laurentius Aditya Henri Wicaksono', '', '7', 24, 1, 'prasojotrii@gmail.com', 'Ka Unit', 0, 'User', '2024-06-30 16:45:44', NULL, NULL, NULL, '2024-12-14 10:13:16'),
(130, '90001370', '$2y$10$7/QJpOZPk0tycJbw32SYZOHVzSShRdwHLL7tunSe2RoFW1d5topre', 'Dionisia Sih Tripurnomorini', '', NULL, 45, 1, 'prasojo.tri@sidomuncul.co.id', 'Manager R&D', 0, 'User', '2024-08-08 11:58:38', NULL, NULL, NULL, '2024-11-18 17:46:51'),
(131, '90000260', '$2y$10$oHT1kBXwy/xfKwQsYQBp1.CrVQYZi/6d7IZ/7ysp5p.ujSXZ/sTXe', 'Ernawati', '', NULL, 27, 1, 'prasojo.tri@sidomuncul.co.id', 'Manager QC', 0, 'User', '2024-08-08 11:59:49', NULL, NULL, NULL, '2024-12-18 09:11:52'),
(132, '90000785', '$2y$10$IUuWTyR0pcggHuHO.SMi7.Cg.rRFrflSNjoyuqwG866zxJX3aPdiS', 'Wenefrida Dwayanti Wrehadnala', '', NULL, 45, 1, 'prasojo.tri@sidomuncul.co.id', 'Ka Unit R&D', 0, 'User', '2024-08-08 12:02:25', NULL, NULL, NULL, '2024-12-12 16:58:54'),
(133, '90001446', '$2y$10$/c4Oe3HW9DDMOUZJLJxKR.0xqYiPndQFBAkqeCnBOAuIReQDTULgm', 'Julianingsih', '', NULL, 13, 1, 'prasojo.tri@sidomuncul.co.id', 'Ka Unit ', 0, 'User', '2024-08-08 12:05:34', NULL, NULL, NULL, '2024-08-08 12:06:11'),
(134, '90001761', '$2y$10$b/uhjFkSAK2dMk6XA7nzQOUsgo2hOZBwv9sSlF/6D6nmMKwLtp5hi', 'Indriyani Haris Wulandari', '', '10', 28, 1, 'qualitycontrol@sidomuncul.co.id', 'Koord Administrasi & Retained Sampel', 0, 'User', '2024-08-29 13:31:09', NULL, NULL, NULL, '2024-08-29 13:31:58'),
(135, '90003560', '$2y$10$imHmyfff0.mfGoeN28ZnbOXnH4MVl6n2INOyHoyNSe5hdRK4Yl2SC', 'Brondol', '', '1', 25, 1, 'azis62364@gmail.com', 'Random', 0, 'Admin', '2024-09-30 10:18:06', NULL, '2024-11-01 15:58:57', NULL, '2024-12-18 08:19:36'),
(136, '90000754', '$2y$10$/e7Ea03YK4BI21/7/.7Z8.o9mbhTAaAhCGwO4Q/LRK2p7Tog8pYZ.', 'Paidi', '', NULL, 16, 1, 'azis62364@gmail.com', 'Ka Unit', 0, 'User', '2024-12-03 15:33:54', NULL, '2024-12-03 15:50:37', NULL, '2024-12-18 14:58:01'),
(137, '90000755', '$2y$10$cpaw9jVtD5yBVSOD3itlRuXxeNargMSU6x734zOscLAE2L6p7yu7C', 'Paido', '', NULL, 28, 1, 'azis62364@gmail.com', 'Koordinator QC', 0, 'User', '2024-12-03 15:49:30', NULL, NULL, NULL, '2024-12-18 08:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_user_akses`
--

CREATE TABLE `tb_master_user_akses` (
  `id_akses` int(6) NOT NULL,
  `pernr` varchar(10) NOT NULL,
  `id_menu` int(5) NOT NULL,
  `view` int(1) NOT NULL,
  `create` int(1) NOT NULL,
  `update` int(1) NOT NULL,
  `delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_user_akses`
--

INSERT INTO `tb_master_user_akses` (`id_akses`, `pernr`, `id_menu`, `view`, `create`, `update`, `delete`) VALUES
(1, '90002459', 1, 1, 0, 0, 0),
(2, '90002459', 2, 1, 0, 0, 0),
(3, '90002459', 3, 1, 0, 0, 0),
(8, '90002459', 4, 1, 0, 0, 0),
(9, '90002459', 6, 1, 0, 0, 0),
(10, '90002459', 11, 1, 0, 0, 0),
(11, '90002459', 12, 1, 0, 0, 0),
(12, '9000', 1, 1, 0, 0, 0),
(13, '9000', 2, 1, 0, 0, 0),
(14, '9000', 3, 1, 1, 0, 0),
(15, '90002459', 13, 1, 0, 0, 0),
(16, '90002459', 14, 1, 0, 0, 0),
(17, '90000260', 3, 1, 1, 0, 0),
(18, '90000260', 12, 1, 0, 0, 0),
(19, '90001370', 1, 1, 0, 0, 0),
(20, '90000260', 1, 1, 0, 0, 0),
(21, '90001370', 2, 1, 0, 0, 0),
(22, '90000260', 2, 1, 0, 0, 0),
(23, '90001370', 12, 1, 0, 0, 0),
(24, '90001370', 3, 1, 1, 0, 0),
(25, '90003545', 1, 1, 0, 0, 0),
(26, '90003545', 2, 1, 0, 0, 0),
(27, '90003545', 12, 1, 0, 0, 0),
(28, '90003545', 3, 1, 0, 0, 0),
(29, '90005751', 1, 1, 0, 0, 0),
(30, '90005751', 2, 1, 0, 0, 0),
(31, '90005751', 12, 1, 0, 0, 0),
(32, '90005751', 3, 1, 0, 0, 0),
(33, '90003092', 1, 1, 0, 0, 0),
(34, '90003092', 2, 1, 0, 0, 0),
(35, '90003092', 13, 1, 1, 0, 0),
(37, '90001127', 1, 1, 0, 0, 0),
(38, '90001127', 12, 1, 0, 0, 0),
(39, '90001127', 13, 1, 0, 0, 0),
(40, '90001127', 2, 1, 0, 0, 0),
(41, '90000785', 1, 1, 0, 0, 0),
(42, '90000785', 2, 1, 0, 0, 0),
(43, '90000785', 3, 1, 0, 0, 0),
(44, '90000785', 15, 1, 0, 0, 0),
(45, '90000785', 12, 1, 0, 0, 0),
(46, '90001370', 15, 1, 0, 0, 0),
(47, '90001446', 1, 1, 0, 0, 0),
(48, '90001446', 2, 1, 0, 0, 0),
(49, '90001446', 3, 1, 0, 0, 0),
(50, '90001446', 12, 1, 0, 0, 0),
(51, '90001761', 1, 1, 0, 0, 0),
(52, '90001761', 12, 1, 0, 0, 0),
(53, '90001761', 3, 1, 0, 0, 0),
(54, '90001761', 13, 1, 0, 0, 0),
(55, '90001761', 2, 1, 0, 0, 0),
(56, '90000435', 1, 0, 0, 0, 0),
(57, '90000435', 2, 1, 1, 1, 1),
(58, '90000435', 12, 1, 1, 1, 1),
(59, '90000435', 3, 1, 1, 1, 1),
(60, '90000093', 1, 1, 1, 1, 1),
(61, '90000093', 2, 1, 1, 1, 1),
(62, '90000093', 12, 1, 1, 1, 1),
(63, '90003560', 1, 1, 0, 0, 0),
(64, '90003560', 2, 1, 0, 0, 0),
(65, '90003560', 3, 1, 0, 0, 0),
(66, '90003560', 13, 1, 0, 0, 0),
(68, '90003560', 4, 1, 0, 0, 0),
(69, '90003560', 6, 1, 0, 0, 0),
(70, '90003560', 11, 1, 0, 0, 0),
(71, '90003560', 14, 1, 0, 0, 0),
(72, '90000404', 1, 1, 0, 0, 0),
(73, '90000404', 2, 1, 1, 1, 1),
(74, '90000404', 12, 1, 0, 0, 0),
(76, '90000093', 0, 0, 0, 0, 0),
(79, '90000755', 1, 1, 1, 1, 1),
(80, '90000755', 2, 1, 1, 1, 1),
(81, '90000755', 12, 1, 1, 1, 1),
(82, '90000754', 1, 1, 1, 1, 1),
(83, '90000754', 2, 1, 1, 1, 1),
(84, '90000754', 12, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `nomor` int(11) NOT NULL,
  `id_order` varchar(32) NOT NULL,
  `id_order_unit` varchar(32) NOT NULL,
  `id_order_tiket` varchar(32) NOT NULL,
  `id_batch` varchar(32) NOT NULL,
  `tanggal_input` date NOT NULL,
  `kategori_barang` varchar(128) NOT NULL,
  `id_instrumen` varchar(32) NOT NULL,
  `rumus_instrumen` varchar(32) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `spesifikasi` varchar(128) NOT NULL,
  `merek` varchar(254) NOT NULL,
  `ukuran` varchar(8) NOT NULL,
  `ukuran_satuan` varchar(32) NOT NULL,
  `type` varchar(64) NOT NULL,
  `grade` varchar(16) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `jumlah_diterima` int(4) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `penyelia` varchar(128) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `urgent` int(11) NOT NULL,
  `penawaran` varchar(2) NOT NULL,
  `no_pr` varchar(32) NOT NULL,
  `no_po` varchar(32) NOT NULL,
  `keterangan_ka_unit` varchar(300) NOT NULL,
  `keterangan_seleksi_unit` varchar(300) NOT NULL,
  `keterangan_pr` varchar(300) NOT NULL,
  `keterangan_diterima` varchar(300) NOT NULL,
  `keterangan_ditunda` varchar(300) NOT NULL,
  `keterangan_dibatalkan` varchar(300) NOT NULL,
  `tanggal_buat` datetime NOT NULL,
  `tanggal_penyelia` datetime NOT NULL,
  `tanggal_ka_unit` datetime NOT NULL,
  `tanggal_admin` datetime NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `tanggal_seleksi` datetime NOT NULL,
  `tanggal_pr` datetime NOT NULL,
  `tanggal_diterima` datetime NOT NULL,
  `tanggal_ditunda` datetime NOT NULL,
  `tanggal_dibatalkan` datetime NOT NULL,
  `last_edit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`nomor`, `id_order`, `id_order_unit`, `id_order_tiket`, `id_batch`, `tanggal_input`, `kategori_barang`, `id_instrumen`, `rumus_instrumen`, `nama_barang`, `spesifikasi`, `merek`, `ukuran`, `ukuran_satuan`, `type`, `grade`, `jumlah`, `jumlah_diterima`, `satuan`, `nama`, `keterangan`, `penyelia`, `id_status`, `tanggal_datang`, `urgent`, `penawaran`, `no_pr`, `no_po`, `keterangan_ka_unit`, `keterangan_seleksi_unit`, `keterangan_pr`, `keterangan_diterima`, `keterangan_ditunda`, `keterangan_dibatalkan`, `tanggal_buat`, `tanggal_penyelia`, `tanggal_ka_unit`, `tanggal_admin`, `tanggal_upload`, `tanggal_seleksi`, `tanggal_pr`, `tanggal_diterima`, `tanggal_ditunda`, `tanggal_dibatalkan`, `last_edit`) VALUES
(2333, '12220001', 'PCR', '10001', '10001', '2022-12-14', 'Spare Part Instrument', '', '', 'Gene Fragment without adapters(300bp-500bp)', '106357', 'Twist Bioscience', '', '', '', '', 1, 0, 'Buah', 'Umi Ardani', 'Lab PCR', 'Umi Ardani', 5, '0000-00-00', 1, '1', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dwi Anik P'),
(2334, '12220002', 'PCR', '10001', '10001', '2022-12-14', 'Spare Part Instrument', '', '', 'dual labeled LNA probe 5\' FAM/3\' BHQ-1, 50 nmol', 'LNA-FB1-5', 'LGC', '', '', '', '', 1, 0, 'Buah', 'Umi Ardani', 'Lab PCR', 'Umi Ardani', 5, '0000-00-00', 1, '1', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dwi Anik P'),
(2335, '12220003', 'PCR', '10001', '10001', '2022-12-14', 'Reagent', '', '', 'Standard Oligo synthesis 0,025Umole,Desalt', '', 'Macrogen', '', '', '', '', 1, 0, 'Pak', 'Umi Ardani', 'Lab PCR', 'Umi Ardani', 5, '0000-00-00', 1, '1', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dwi Anik P'),
(2336, '12220004', 'PCR', '10001', '10001', '2022-12-14', 'Spare Part Instrument', '', '', 'S soAdv univer probes SMX 200', '1725280', 'Bio rad laboratories', '', '', '', '', 1, 0, 'Buah', 'Umi Ardani', 'Lab PCR', 'Umi Ardani', 5, '0000-00-00', 1, '1', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dwi Anik P'),
(2337, '12220005', 'PCR', '10001', '10001', '2022-12-14', 'Spare Part Instrument', '', '', 'Processed food DNA Extraction kit 100 preps ', '4992430', 'Tiangen biotech', '', '', '', '', 1, 0, 'Buah', 'Umi Ardani', 'Lab PCR', 'Umi Ardani', 5, '0000-00-00', 1, '1', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dwi Anik P'),
(2338, '12220006', 'PCR', '10001', '10001', '2022-12-14', 'Glassware', '', '', 'Kolom kaca kromatografi vaccum', 'ukuran 150ml,diameter 20mm x 300mm,pakai filter', '', '', '', '', '', 1, 0, 'Buah', 'Umi Ardani', 'Lab PCR', 'Umi Ardani', 5, '0000-00-00', 1, '1', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dwi Anik P'),
(2340, '12220007', 'ADM', '10001', '10001', '2022-12-14', 'Reagent', '', '', 'Parafin cair', '', '', '2000.0', 'ml', '', '', 1, 0, 'Buah', 'Umi Ardani', 'Administrasi', 'Umi Ardani', 4, '0000-00-00', 2, '2', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 08:52:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Umi Ardani'),
(2341, '12220008', 'ADM', '10001', '10001', '2022-12-14', 'Reagent', '', '', 'Silica Gel 60HF 254 For TLC ', '1.07739.1000', 'Merck', '1000.0', 'ml', '', '', 6, 0, 'Botol', 'Umi Ardani', 'Administrasi', 'Umi Ardani', 5, '0000-00-00', 1, '1', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dwi Anik P'),
(2342, '12220009', 'ADM', '10001', '10001', '2022-12-14', 'Reagent', '', '', 'Silica Gel 60 (0.2-0.5mm)', '1.07733.0500', 'merck', '500.0', 'ml', '', '', 1, 0, 'Botol', 'Umi Ardani', 'Administrasi', 'Umi Ardani', 8, '0000-00-00', 2, '0', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-26 23:15:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dwi Anik P'),
(2344, '12220011', 'INS', '10001', '10001', '2022-12-14', 'Consumable Part Instrument', '', '', 'Assy frit 0,2 UM 2,1 mm', '', 'Waters', '', '', '', '', 1, 0, 'Pak', 'Umi Ardani', 'Lab Instrument', 'Umi Ardani', 5, '0000-00-00', 1, '1', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dwi Anik P'),
(2345, '12220012', 'INS', '10001', '10001', '2022-12-14', 'Gas', '', '', 'Gas Argon', '', '', '', '', '', '', 1, 1, 'Buah', 'Umi Ardani', 'Lab Instrument', 'Umi Ardani', 8, '2022-12-14', 1, '0', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-14 09:10:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-12-26 23:15:54', '2022-12-26 23:29:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Umi Ardani');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_diterima`
--

CREATE TABLE `tb_order_diterima` (
  `id_diterima` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `id_order` varchar(32) NOT NULL,
  `id_order_unit` varchar(32) NOT NULL,
  `id_order_tiket` varchar(32) NOT NULL,
  `id_batch` varchar(32) NOT NULL,
  `tanggal_input` date NOT NULL,
  `kategori_barang` varchar(128) NOT NULL,
  `id_instrumen` varchar(32) NOT NULL,
  `rumus_instrumen` varchar(32) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `spesifikasi` varchar(128) NOT NULL,
  `merek` varchar(254) NOT NULL,
  `ukuran` varchar(8) NOT NULL,
  `ukuran_satuan` varchar(32) NOT NULL,
  `type` varchar(64) NOT NULL,
  `grade` varchar(16) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `jumlah_diterima` int(4) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `penyelia` varchar(128) NOT NULL,
  `id_status` varchar(11) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `urgent` varchar(11) NOT NULL,
  `penawaran` varchar(2) NOT NULL,
  `no_pr` varchar(32) NOT NULL,
  `no_po` varchar(32) NOT NULL,
  `keterangan_ka_unit` varchar(300) NOT NULL,
  `keterangan_seleksi_unit` varchar(300) NOT NULL,
  `keterangan_pr` varchar(300) NOT NULL,
  `keterangan_diterima` varchar(300) NOT NULL,
  `keterangan_ditunda` varchar(300) NOT NULL,
  `keterangan_dibatalkan` varchar(300) NOT NULL,
  `tanggal_buat` datetime NOT NULL,
  `tanggal_penyelia` datetime NOT NULL,
  `tanggal_ka_unit` datetime NOT NULL,
  `tanggal_admin` datetime NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `tanggal_seleksi` datetime NOT NULL,
  `tanggal_pr` datetime NOT NULL,
  `tanggal_diterima` datetime NOT NULL,
  `tanggal_ditunda` datetime NOT NULL,
  `tanggal_dibatalkan` datetime NOT NULL,
  `last_edit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order_diterima`
--

INSERT INTO `tb_order_diterima` (`id_diterima`, `nomor`, `id_order`, `id_order_unit`, `id_order_tiket`, `id_batch`, `tanggal_input`, `kategori_barang`, `id_instrumen`, `rumus_instrumen`, `nama_barang`, `spesifikasi`, `merek`, `ukuran`, `ukuran_satuan`, `type`, `grade`, `jumlah`, `jumlah_diterima`, `satuan`, `nama`, `keterangan`, `penyelia`, `id_status`, `tanggal_datang`, `urgent`, `penawaran`, `no_pr`, `no_po`, `keterangan_ka_unit`, `keterangan_seleksi_unit`, `keterangan_pr`, `keterangan_diterima`, `keterangan_ditunda`, `keterangan_dibatalkan`, `tanggal_buat`, `tanggal_penyelia`, `tanggal_ka_unit`, `tanggal_admin`, `tanggal_upload`, `tanggal_seleksi`, `tanggal_pr`, `tanggal_diterima`, `tanggal_ditunda`, `tanggal_dibatalkan`, `last_edit`) VALUES
(2138, 0, '', 'BBG', '', '', '0000-00-00', 'Glassware', 'AL034', 'RMS001', 'Labu Ukur', '', 'Iwaki', '5', 'ml', 'Borosilicate Glass', 'Class A', 20, 0, 'Buah', '', 'BBG', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2139, 0, '', 'OMG', '', '', '0000-00-00', 'Glassware', 'AL034', 'RMS001', 'Labu Ukur', '', 'Iwaki', '25', 'ml', 'Borosilicate Glass', 'Class A', 30, 0, 'Buah', '', 'OMG', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2140, 0, '', 'BBG', '', '', '0000-00-00', 'Glassware', 'AL039', 'RMS001', 'Piknometer', '', '', '', '', '', '', 1, 0, 'Buah', '', 'BBG', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2141, 0, '', 'OMG', '', '', '0000-00-00', 'Glassware', 'AL022', 'RMS001', 'Gelas Ukur', '', 'Iwaki', '50', 'ml', '	Borosilicate Glass', 'Class A', 2, 0, 'Buah', '', 'OMG', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_penawaran`
--

CREATE TABLE `tb_order_penawaran` (
  `id_penawaran` int(11) NOT NULL,
  `id_order` int(10) NOT NULL,
  `nama_supplier` varchar(128) NOT NULL,
  `nama_penawaran` varchar(128) NOT NULL,
  `keterangan_penawaran` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_persetujuan`
--

CREATE TABLE `tb_order_persetujuan` (
  `nomor` int(11) NOT NULL,
  `id_order` varchar(32) NOT NULL,
  `id_order_unit` varchar(32) NOT NULL,
  `id_order_tiket` varchar(32) NOT NULL,
  `id_batch` varchar(32) NOT NULL,
  `tanggal_input` date NOT NULL,
  `kategori_barang` varchar(128) NOT NULL,
  `id_instrumen` varchar(32) NOT NULL,
  `rumus_instrumen` varchar(32) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `merek` varchar(254) NOT NULL,
  `ukuran` varchar(8) NOT NULL,
  `type` varchar(64) NOT NULL,
  `grade` varchar(16) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `penyelia` varchar(128) NOT NULL,
  `id_status` varchar(11) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `urgent` varchar(11) NOT NULL,
  `penawaran` varchar(2) NOT NULL,
  `no_po` varchar(32) NOT NULL,
  `no_pr` varchar(32) NOT NULL,
  `keterangan_ka_unit` varchar(300) NOT NULL,
  `keterangan_seleksi_unit` varchar(300) NOT NULL,
  `keterangan_pr` varchar(300) NOT NULL,
  `keterangan_diterima` varchar(300) NOT NULL,
  `keterangan_ditunda` varchar(300) NOT NULL,
  `keterangan_dibatalkan` varchar(300) NOT NULL,
  `tanggal_buat` datetime NOT NULL,
  `tanggal_penyelia` datetime NOT NULL,
  `tanggal_ka_unit` datetime NOT NULL,
  `tanggal_admin` datetime NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `tanggal_seleksi` datetime NOT NULL,
  `tanggal_pr` datetime NOT NULL,
  `tanggal_diterima` datetime NOT NULL,
  `tanggal_ditunda` datetime NOT NULL,
  `tanggal_dibatalkan` datetime NOT NULL,
  `last_edit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order_persetujuan`
--

INSERT INTO `tb_order_persetujuan` (`nomor`, `id_order`, `id_order_unit`, `id_order_tiket`, `id_batch`, `tanggal_input`, `kategori_barang`, `id_instrumen`, `rumus_instrumen`, `nama_barang`, `merek`, `ukuran`, `type`, `grade`, `jumlah`, `satuan`, `nama`, `keterangan`, `penyelia`, `id_status`, `tanggal_datang`, `urgent`, `penawaran`, `no_po`, `no_pr`, `keterangan_ka_unit`, `keterangan_seleksi_unit`, `keterangan_pr`, `keterangan_diterima`, `keterangan_ditunda`, `keterangan_dibatalkan`, `tanggal_buat`, `tanggal_penyelia`, `tanggal_ka_unit`, `tanggal_admin`, `tanggal_upload`, `tanggal_seleksi`, `tanggal_pr`, `tanggal_diterima`, `tanggal_ditunda`, `tanggal_dibatalkan`, `last_edit`) VALUES
(173, '', '', '10001', '10001', '2022-12-14', '', '', '', '', '', '', '', '', 0, '', '', '', 'Umi Ardani', '5', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2022-12-14 08:51:33', '2022-12-14 08:52:46', '2022-12-14 08:57:33', '2022-12-14 08:52:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Umi Ardani');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request_approval`
--

CREATE TABLE `tb_request_approval` (
  `id` int(10) NOT NULL,
  `fitur` varchar(10) NOT NULL,
  `id_req` varchar(20) NOT NULL,
  `pernr` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `usulan` varchar(2550) NOT NULL,
  `kesimpulan` varchar(255) NOT NULL,
  `desc_approval` varchar(256) NOT NULL,
  `date_approval` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_request_approval`
--

INSERT INTO `tb_request_approval` (`id`, `fitur`, `id_req`, `pernr`, `status`, `usulan`, `kesimpulan`, `desc_approval`, `date_approval`) VALUES
(1, 'Analisa', '1000000145', '90000754', 0, '', '', '', NULL),
(2, 'Analisa', '1000000145', '90000755', 0, '', '', '', NULL),
(3, 'Analisa', '1000000146', '90000754', 0, '', '', '', NULL),
(4, 'Analisa', '1000000146', '90000755', 0, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(32) NOT NULL,
  `pernr` varchar(32) NOT NULL,
  `password` varchar(254) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `sub_laboratorium` varchar(128) NOT NULL,
  `id_order_unit` varchar(32) NOT NULL,
  `penyelia` varchar(128) NOT NULL,
  `email_penyelia` varchar(256) NOT NULL,
  `kepalaunit` varchar(128) NOT NULL,
  `email_kepalaunit` varchar(256) NOT NULL,
  `tipe` varchar(64) NOT NULL,
  `is_active` varchar(32) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `pernr`, `password`, `nama`, `email`, `sub_laboratorium`, `id_order_unit`, `penyelia`, `email_penyelia`, `kepalaunit`, `email_kepalaunit`, `tipe`, `is_active`, `last_login`) VALUES
('LAB001', '90002459', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Prasojo', '', 'Administrasi', 'ADM', 'Prasojo Tri', 'prasojo.tri@sidomuncul.co.id', 'Erni Rusmalawati', 'prasojo.tri@sidomuncul.co.id', 'SysAdmin', 'Yes', NULL),
('LAB002', '90001737', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dewie Koes Harayu', '', 'Lab Kimia 1 MTS', 'MTS', 'Dewie Koes Harayu', 'Groupmts.sm@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', '	Supervisor', 'Yes', NULL),
('LAB003', '90001627', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dwi Rahayu Handayani', '', 'Lab Kimia 2 BBG', 'BBG', 'Dwi Rahayu Handayani', 'lingkunganbahanbaku@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', '	Supervisor', 'Yes', NULL),
('LAB004', '90001078', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Candra Ratnaningsih', '', 'Lab Mikrobiologi', 'MKR', 'Candra Ratnaningsih', 'Laboratmikrobiologi.sm@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'Supervisor', 'Yes', NULL),
('LAB005', '90001733', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Indah Krismiyati', '', 'Lab Kimia 1 OMG', 'OMG', 'Indah Krismiyati', 'Otcsimplisia@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', '	Supervisor', 'Yes', NULL),
('LAB006', '90001330', '$2y$10$wSAI0/BGYxlKmTphiUYcaubT28lBJ1nNDFcC0Zzlk4UPeK/zO/QXC', 'Umi Ardani', '', 'Administrasi', 'ADM', 'Umi Ardani', 'laboratorium.order@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'Admin Lab', 'Yes', NULL),
('LAB007', '90001127', '$2y$10$S0o2k6FFr2Z.XD3WE1aNtOyhtk47xV8zR7.CwYcUcljZyex6J/MH.', 'Erni Rusmalawati', '', 'Administrasi', 'ADM', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'Kepala Unit', 'Yes', NULL),
('LAB008', '90001381', '$2y$10$76SAQyao8rcrGJ5g1iB8hu6A1JotD8LhznN9SFQvSE9QuYNQK.hRS', 'Dwi Anik P', '', 'Administrasi', 'ADM', '', '', 'Erni Rusmalawati', '', 'Admin SAP', 'Yes', NULL),
('LAB014', '90004952', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Adela Syarifina', '', 'Lab PCR', 'PCR', 'Candra Ratnaningsih', 'Laboratmikrobiologi.sm@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB015', '90003530', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Aldi Ridson Huda', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB016', '90002852', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Ana Maulia Ulfah', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB017', '90002281', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Anita Martiana', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB018', '90003746', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Annisa Marda Gupita', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB019', '90003516', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Annisa Wahyu Setyaningrum', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB020', '90002988', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Antalgin Prabuningtyas', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB021', '90002903', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Aprilya Muvidasari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB022', '90002296', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Ari Widyastutik', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB023', '90001732', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Asih Dyah Ekowati', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB024', '90003546', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Cahya Amalia Pramesti', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB025', '90003821', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Cicilia Lilik Waskinasih', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB026', '90003035', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Citra Arum Pawestri', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB027', '90004602', '$2y$10$h37inuh2F33X1MaeeJWTe.dCfKmcnHCDayQztqefqa.y75eSP9OYm', 'Della Savira', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB028', '90005494', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Deniza Dian Wardoyo', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB029', '90000093', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Denok Wulandari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB030', '90001735', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Desi Kurniasari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB031', '90003277', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Desi Wulandari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB032', '90005483', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Desta Firontika', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB033', '90003091', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Desy Rachmalisa Verawati', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB034', '90001527', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Dewi Endah Puspitasari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB035', '90003493', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Dewi Rahmawati', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB036', '90001737', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Dewie Koes Harayu', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB037', '90001564', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Diah Pravitasari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB038', '90003547', '$2y$10$d/4ioimK8tJDTLtUf852z.hIVPYH3Dyfw3amBnU3J56a9PSVSw7Me', 'Dian Aditya', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB039', '90004165', '$2y$10$xxTitRi7rHK18NKNFpwBnOp7CgpYtJFtnx9R4e.zbZREymxBTnVdq', 'Didha RS', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB040', '90003090', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Dita Nuryuliastuti', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB041', '90001736', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Dwi Lestari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB042', '90001627', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Dwi Rahayu Handayani', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB043', '90002566', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Dwi Yani', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB044', '90003441', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Fajrul Suryandari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB045', '90006233', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Fesa Aulia Nurul Haq', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB046', '90005569', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Fira Fitriana', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB047', '90002760', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Fitri Permanasari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB048', '90003671', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Galih Andi Rahmanto', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB049', '90005510', '$2y$10$KF2Fvfj7eNuz7NcG5gpaJeoKDHnC5q4301hDoyaCocWZoR/15Iqa6', 'Galuh Pravita Briliani', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB050', '90003428', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Hartini', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB051', '90004186', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Ifa Masfufa Hidayanti', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB052', '90005531', '$2y$10$/Sx2MRYv4D7uHb5urjeNGeD5pPFDSbL2FBvxCQqiqDvv0oKQdP6ty', 'ImroAtun Mahmudah', '', 'Lab PCR', 'PCR', 'Candra Ratnaningsih', 'Laboratmikrobiologi.sm@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB053', '90001733', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Indah Krismiyati', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB054', '90004735', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Isma Datin Riri Cahya Puspita', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB055', '90004547', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Iyon Praditya', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB056', '90003581', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Jafar Adi Nugroho', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB057', '90002987', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Kharisma Dessy Asmarandani', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB058', '90004577', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Kholiq Setiawan', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB059', '90003092', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Lesi Deska Ardanti', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB060', '90002743', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Malfin Delsia Kasandra', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB061', '90005644', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Mardhiyyatush Sholihah', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB062', '90002139', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Marita Widyaningrum', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB063', '90002586', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Meytrin Delfi Irawati', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB064', '90005524', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Michelle Oryza Devi Natasha', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB065', '90003883', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Miftachul Jannah', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB066', '90003616', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Murti Cahyaningrum', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB067', '90006157', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Nindarwoto Hera Indrasti', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB068', '90005492', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Nindya Novita Wahyu Ashari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB069', '90003048', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Nova Shintia Bokau', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB070', '90004672', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Novi Aditya Kumalasari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB071', '90001624', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Nur Ika Permatasari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB072', '90005105', '$2y$10$lJ6BsT0P8dXaawPk.Ua7IOlfAJv8MBusoZyhReHjcEvFktsacr9qW', 'Oey, Stefanus Ardian Harsono', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB073', '90002169', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Pradita Anggriani', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB074', '90003474', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Pramita Aryati', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB075', '90005527', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Puput Wahyuningtias', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB076', '90005165', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Quthrotun Nada Al Baridah', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB077', '90006385', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Ratna Kusuma Harjanti', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB078', '90002607', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Reni Arifianti', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB079', '90003881', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Retno Rena Pratama', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB080', '90002128', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Retno Widyaningsih', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB081', '90004306', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Rima Santi Rohmawati', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB082', '90005093', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Ririt Kurniawati', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB083', '90006462', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Ritho Ritura', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB084', '90006269', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Rizky Enggar Asnaningsih', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB085', '90006283', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Sabrina Intan Salsabila', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB086', '90006039', '$2y$10$gsp4rXC4sQouU5SnUyXrCOhlUcjCVFvqh4GEpD0LYfS7xpEsC/4Fe', 'Sandya Puspa Rahayu', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB087', '90004546', '$2y$10$yIwIifKF8kdtRfi8kGDBBOUX3t8h5AtI1cWRbgTs5/OcYMT3CjZP6', 'Siti MuAwanah', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB088', '90001457', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Sri Daryati', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB089', '90003553', '$2y$10$ATSePh136lbT8DiCls4ZkerRSFRuPu8zb48KrvkWqZ6473ZkygZXO', 'Sri Nur Daryasih', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB090', '90002294', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Sulis Irtanti', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB091', '90002083', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Suwarti', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB092', '90002847', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Tri Ambar Setyaningsih', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB093', '90006254', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Tri Nur Janah', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB094', '90001790', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Trisma Wulansari', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB095', '90006264', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Ulyana Nur Habitoh', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB096', '90002468', '$2y$10$5Mj2VTkW0jPVQ7BNgdRPOOt9jjmoajtj3D17/JBHZF0wjb4V86t/q', 'Vania Mardika Syavitri', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB097', '90006160', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Winda Ludfi Ariani', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB098', '90002537', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Wulan Tria Luthfiana Aryani', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB099', '90003601', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Yosia Adi Susetyo', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB100', '90006171', '$2y$10$ngqoPS0phdqjVtnNVQazhecw0ijimhoOAKwsajwqjo6lBLOw8b04G', 'Yudha Hery Setyawan', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB101', '90002674', '$2y$10$By6Xp7bYbUvSfWVKnmUjYOlu22Q69PdFDkdAId1DRQbt5NxOReKGa', 'Yusi Nora Hermada', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB102', '90006547', '$2y$10$3oD1Rs3lo9QeyLRXYDkVP.hzrMEOI0WFGq81/KnBPXW9OMMPYee4.', 'Diah Kartikasari', '', 'Lab Kimia 1 OMG', 'OMG', 'Indah Krismiyati ', 'Otcsimplisia@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User-Lab', 'Yes', NULL),
('LAB103', '90006543', '$2y$10$U0bESEbaRaBKEJG..8fQyOdWM2MdnB59x/VBr6BLaXQZRzDnhJuxG', 'Hoo Mega Nissa C. P.', '', 'Lab Mikrobiologi', 'MKR', 'Candra Ratnaningsih', 'Laboratmikrobiologi.sm@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB104', '90006599', '$2y$10$MfMn/QSxwv20DcvbCUbntOAS7ybtIiff7gM0i3Hl9UwT/0RsIFy6O', 'Angga Miftakhul Rizky', '', 'Lab Kimia 1 MTS', 'MTS', 'Dewie Koes Harayu', 'Groupmts.sm@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB105', '90006559 ', '$2y$10$q3icl4xImn1ZlmbFag.qM.J76dhbZ4oWrFswI1rFkUHeVuh0zsYRy', 'Reza Zatadini', '', 'Lab Kimia 1 MTS', 'MTS', 'Dewie Koes Harayu', 'Groupmts.sm@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB106', '90006602', '$2y$10$uylKwye2IrRWDHdANZKYtO/VDvm8z4ugcF98i.xgDI1MFs//WfF5e', 'Galih Noviar Pratama', '', 'Lab Kimia 1 MTS', 'MTS', 'Dewie Koes Harayu', 'Groupmts.sm@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB107', '90006600', '$2y$10$PGRnd31K76ughV11QxoR4eVUNW0vEweLGLQAGQesI0EDzpgzMR1zC', 'Anis Puspita Sari', '', 'Lab Kimia 2 BBG', 'BBG', 'Dewie Koes Harayu', 'Groupmts.sm@gmail.com', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'User', 'Yes', NULL),
('LAB108', '90003560', '$2y$10$ap8KyDlg4uKpcQs9gCjb.ev2qNqTdBcbc7A3rTgHGJmVf9/OuDq0m', 'Azis', '', '', '', '', '', 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'SysAdmin', 'Yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_akses`
--

CREATE TABLE `tb_user_akses` (
  `id_akses` int(6) NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `pernr` varchar(10) NOT NULL,
  `id_halaman` varchar(32) NOT NULL,
  `id_role` int(3) NOT NULL,
  `nama_role` varchar(128) NOT NULL,
  `nama_halaman` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `tipe` int(1) NOT NULL,
  `view` int(1) NOT NULL,
  `create` int(1) NOT NULL,
  `update` int(1) NOT NULL,
  `delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user_akses`
--

INSERT INTO `tb_user_akses` (`id_akses`, `id_user`, `pernr`, `id_halaman`, `id_role`, `nama_role`, `nama_halaman`, `title`, `url`, `tipe`, `view`, `create`, `update`, `delete`) VALUES
(140, 'LAB001', '90002459', '32', 0, '', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(142, 'LAB001', '90002459', '30', 0, '', 'Kategori Instrumen', 'Daftar Kategori Instrumen', 'kategori_instrumen', 1, 1, 1, 1, 0),
(144, 'LAB002', '90001737', '32', 0, '', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(145, 'LAB002', '90001737', '1', 0, '', 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(146, 'LAB003', '90001627', '32', 0, '', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(147, 'LAB003', '90001627', '1', 0, '', 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(148, 'LAB005', '90001733', '32', 0, '', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(149, 'LAB005', '90001733', '1', 0, '', 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(150, 'LAB006', '90001330', '32', 0, '', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(151, 'LAB006', '90001330', '1', 0, '', 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(154, 'LAB007', '90001127', '32', 0, '', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(155, 'LAB007', '90001127', '1', 0, '', 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(156, 'LAB007', '90001127', '30', 0, '', 'Kategori Instrumen', 'Daftar Kategori Instrumen', 'kategori_instrumen', 1, 1, 1, 0, 0),
(158, 'LAB007', '90001127', '2', 0, '', 'Daftar Instrumen', 'Daftar Instrumen', 'instrumen', 2, 1, 1, 0, 0),
(160, 'LAB004', '90001078', '32', 0, '', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(161, 'LAB004', '90001078', '1', 0, '', 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(163, 'LAB001', '90002459', '2', 0, '', 'Daftar Instrumen', 'Daftar Instrumen', 'instrumen', 2, 1, 1, 0, 0),
(164, 'LAB001', '90002459', '3', 0, '', 'Daftar Glassware', 'Daftar Glassware', 'glassware', 2, 1, 1, 1, 0),
(166, 'LAB007', '90001127', '31', 0, '', 'Kategori Glassware', 'Daftar Kategori Glassware', 'kategori_glassware', 1, 1, 1, 1, 0),
(167, 'LAB008', '90001381', '32', 0, '', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(168, 'LAB008', '90001381', '1', 0, '', 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(195, 'LAB001', '90002459', '38', 0, '', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 1, 1),
(198, 'LAB014', '90004952', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(199, 'LAB015', '90003530', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(200, 'LAB016', '90002852', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(201, 'LAB017', '90002281', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(202, 'LAB018', '90003746', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(203, 'LAB019', '90003516', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(204, 'LAB020', '90002988', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(205, 'LAB021', '90002903', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(206, 'LAB022', '90002296', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(207, 'LAB023', '90001732', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(208, 'LAB024', '90003546', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(209, 'LAB025', '90003821', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(210, 'LAB026', '90003035', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(211, 'LAB027', '90004602', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(212, 'LAB028', '90005494', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(213, 'LAB029', '90002508', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(214, 'LAB030', '90001735', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(215, 'LAB031', '90003277', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(216, 'LAB032', '90005483', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(217, 'LAB033', '90003091', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(218, 'LAB034', '90001527', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(219, 'LAB035', '90003493', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(220, 'LAB036', '90001737', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(221, 'LAB037', '90001564', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(222, 'LAB038', '90003547', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(223, 'LAB039', '90004165', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(224, 'LAB040', '90003090', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(225, 'LAB041', '90001736', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(226, 'LAB042', '90001627', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(227, 'LAB043', '90002566', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(228, 'LAB044', '90003441', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(229, 'LAB045', '90006233', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(230, 'LAB046', '90005569', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(231, 'LAB047', '90002760', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(232, 'LAB048', '90003671', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(233, 'LAB049', '90005510', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(234, 'LAB050', '90003428', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(235, 'LAB051', '90004186', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(236, 'LAB052', '90005531', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(237, 'LAB053', '90001733', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(238, 'LAB054', '90004735', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(239, 'LAB055', '90004547', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(240, 'LAB056', '90003581', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(241, 'LAB057', '90002987', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(242, 'LAB058', '90004577', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(243, 'LAB059', '90003092', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(244, 'LAB060', '90002743', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(245, 'LAB061', '90005644', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(246, 'LAB062', '90002139', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(247, 'LAB063', '90002586', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(248, 'LAB064', '90005524', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(249, 'LAB065', '90003883', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(250, 'LAB066', '90003616', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(251, 'LAB067', '90006157', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(252, 'LAB068', '90005492', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(253, 'LAB069', '90003048', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(254, 'LAB070', '90004672', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(255, 'LAB071', '90001624', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(256, 'LAB072', '90005105', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(257, 'LAB073', '90002169', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(258, 'LAB074', '90003474', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(259, 'LAB075', '90005527', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(260, 'LAB076', '90005165', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(261, 'LAB077', '90006385', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(262, 'LAB078', '90002607', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(263, 'LAB079', '90003881', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(264, 'LAB080', '90002128', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(265, 'LAB081', '90004306', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(266, 'LAB082', '90005093', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(267, 'LAB083', '90006462', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(268, 'LAB084', '90006269', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(269, 'LAB085', '90006283', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(270, 'LAB086', '90006039', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(271, 'LAB087', '90004546', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(272, 'LAB088', '90001457', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(273, 'LAB089', '90003553', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(274, 'LAB090', '90002294', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(275, 'LAB091', '90002083', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(276, 'LAB092', '90002847', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(277, 'LAB093', '90006254', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(278, 'LAB094', '90001790', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(279, 'LAB095', '90006264', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(280, 'LAB096', '90002468', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(281, 'LAB097', '90006160', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(282, 'LAB098', '90002537', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(283, 'LAB099', '90003601', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(284, 'LAB100', '90006171', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(285, 'LAB101', '90002674', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(286, 'LAB014', '90004952', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(287, 'LAB015', '90003530', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(288, 'LAB016', '90002852', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(289, 'LAB017', '90002281', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(290, 'LAB018', '90003746', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(291, 'LAB019', '90003516', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(292, 'LAB020', '90002988', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(293, 'LAB021', '90002903', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(294, 'LAB022', '90002296', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(295, 'LAB023', '90001732', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(296, 'LAB024', '90003546', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(297, 'LAB025', '90003821', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(298, 'LAB026', '90003035', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 1, 1),
(299, 'LAB027', '90004602', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(300, 'LAB028', '90005494', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(301, 'LAB029', '90002508', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(302, 'LAB030', '90001735', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(303, 'LAB031', '90003277', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(304, 'LAB032', '90005483', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(305, 'LAB033', '90003091', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(306, 'LAB034', '90001527', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(307, 'LAB035', '90003493', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(308, 'LAB036', '90001737', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(309, 'LAB037', '90001564', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(310, 'LAB038', '90003547', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(311, 'LAB039', '90004165', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(312, 'LAB040', '90003090', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(313, 'LAB041', '90001736', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(314, 'LAB042', '90001627', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(315, 'LAB043', '90002566', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(316, 'LAB044', '90003441', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(317, 'LAB045', '90006233', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 1, 1),
(318, 'LAB046', '90005569', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(319, 'LAB047', '90002760', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(320, 'LAB048', '90003671', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(321, 'LAB049', '90005510', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(322, 'LAB050', '90003428', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(323, 'LAB051', '90004186', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(325, 'LAB053', '90001733', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(326, 'LAB054', '90004735', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(327, 'LAB055', '90004547', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(328, 'LAB056', '90003581', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(329, 'LAB057', '90002987', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(330, 'LAB058', '90004577', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(331, 'LAB059', '90003092', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(332, 'LAB060', '90002743', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(333, 'LAB061', '90005644', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 1, 0),
(334, 'LAB062', '90002139', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(335, 'LAB063', '90002586', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(336, 'LAB064', '90005524', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(337, 'LAB065', '90003883', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(338, 'LAB066', '90003616', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(339, 'LAB067', '90006157', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(340, 'LAB068', '90005492', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(341, 'LAB069', '90003048', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(342, 'LAB070', '90004672', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(343, 'LAB071', '90001624', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(344, 'LAB072', '90005105', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 1, 1),
(345, 'LAB073', '90002169', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(346, 'LAB074', '90003474', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(347, 'LAB075', '90005527', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(348, 'LAB076', '90005165', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(349, 'LAB077', '90006385', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(350, 'LAB078', '90002607', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(351, 'LAB079', '90003881', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(352, 'LAB080', '90002128', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(353, 'LAB081', '90004306', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(354, 'LAB082', '90005093', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(355, 'LAB083', '90006462', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 1, 0),
(356, 'LAB084', '90006269', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(357, 'LAB085', '90006283', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(358, 'LAB086', '90006039', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(359, 'LAB087', '90004546', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 1, 1),
(360, 'LAB088', '90001457', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(361, 'LAB089', '90003553', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(362, 'LAB090', '90002294', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(363, 'LAB091', '90002083', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(364, 'LAB092', '90002847', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(365, 'LAB093', '90006254', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(366, 'LAB094', '90001790', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(367, 'LAB095', '90006264', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 1, 0),
(368, 'LAB096', '90002468', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(369, 'LAB097', '90006160', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(370, 'LAB098', '90002537', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(371, 'LAB099', '90003601', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(372, 'LAB100', '90006171', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(373, 'LAB101', '90002674', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(374, 'LAB001', '90002459', '31', 0, '', 'Kategori Glassware', 'Daftar Kategori Glassware', 'kategori_glassware', 1, 1, 1, 0, 0),
(375, 'LAB001', '90002459', '1', 0, '', 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 0),
(376, 'LAB102', '90006547', '32', 65, 'User-Lab', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(380, 'LAB102', '90006547', '38', 0, '', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 0, 0, 0),
(381, 'LAB052', '90005531', '38', 0, '', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 1, 0, 0),
(382, 'LAB103', '90006543', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(383, 'LAB103', '90006543', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 0, 0, 0),
(384, 'LAB104', '90006599', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(385, 'LAB104', '90006599', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 0, 0, 0),
(386, 'LAB105', '90006559', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(387, 'LAB105', '90006559', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 0, 0, 0),
(388, 'LAB106', '90006602', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(389, 'LAB106', '90006602', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 0, 0, 0),
(390, 'LAB107', '90006600', '32', 75, 'User', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(391, 'LAB107', '90006600', '38', 77, 'User', 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 0, 0, 0),
(392, 'LAB108', '90003560', '32', 51, 'SysAdmin', 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 1),
(393, 'LAB108', '90003560', '1', 52, 'SysAdmin', 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(394, 'LAB108', '90003560', '30', 53, 'SysAdmin', 'Kategori Instrumen', 'Daftar Kategori Instrumen', 'kategori_instrumen', 1, 1, 1, 0, 1),
(395, 'LAB108', '90003560', '31', 54, 'SysAdmin', 'Kategori Glassware', 'Daftar Kategori Glassware', 'kategori_glassware', 1, 1, 1, 0, 1),
(523, 'LAB001', '90002459', '39', 0, '', 'Master User', 'Master User', 'master', 1, 1, 1, 0, 0),
(524, 'LAB001', '90002459', '40', 0, '', 'Karantina', 'Karantina', 'karantina', 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_atasan`
--

CREATE TABLE `tb_user_atasan` (
  `id_atasan` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `lab` varchar(64) NOT NULL,
  `sublab` varchar(60) NOT NULL,
  `id_order_unit` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user_atasan`
--

INSERT INTO `tb_user_atasan` (`id_atasan`, `nama`, `email`, `jabatan`, `lab`, `sublab`, `id_order_unit`) VALUES
(1, 'Candra Ratnaningsih', 'Laboratmikrobiologi.sm@gmail.com', 'Supervisor', 'Lab Analisa', 'Lab Mikrobiologi', 'MKR'),
(2, 'Dewie Koes Harayu', 'Groupmts.sm@gmail.com', 'Supervisor', 'Lab Analisa', 'Lab Kimia 2 BBG', 'MTS'),
(3, 'Dwi Rahayu Handayani', 'lingkunganbahanbaku@gmail.com', 'Supervisor', 'Lab Analisa', 'Lab Kimia 2 BBG', 'BBG'),
(4, 'Indah Krismiyati ', 'Otcsimplisia@gmail.com', 'Supervisor', 'Lab Analisa', 'Lab Kimia 1 OMG', 'OMG'),
(5, 'Erni Rusmalawati', 'erni.rusmalawati@sidomuncul.co.id', 'Kepala Unit', 'Lab Analisa', 'Lab Analisa', 'LAB'),
(9, 'Umi Ardani', 'laboratorium.order@gmail.com', 'Supervisor', 'Lab Analisa', 'Administrasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id_role` int(6) NOT NULL,
  `nama_role` varchar(128) NOT NULL,
  `id_halaman` int(6) NOT NULL,
  `nama_halaman` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `tipe` int(1) NOT NULL,
  `view` int(1) NOT NULL,
  `create` int(1) NOT NULL,
  `update` int(1) NOT NULL,
  `delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id_role`, `nama_role`, `id_halaman`, `nama_halaman`, `title`, `url`, `tipe`, `view`, `create`, `update`, `delete`) VALUES
(51, 'SysAdmin', 32, 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 1),
(52, 'SysAdmin', 1, 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(53, 'SysAdmin', 30, 'Kategori Instrumen', 'Daftar Kategori Instrumen', 'kategori_instrumen', 1, 1, 1, 0, 1),
(54, 'SysAdmin', 31, 'Kategori Glassware', 'Daftar Kategori Glassware', 'kategori_glassware', 1, 1, 1, 0, 1),
(55, 'Kepala Unit', 32, 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 1),
(56, 'Kepala Unit', 1, 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(57, 'Kepala Unit', 30, 'Kategori Instrumen', 'Daftar Kategori Instrumen', 'kategori_instrumen', 1, 1, 1, 0, 1),
(58, 'Kepala Unit', 31, 'Kategori Glassware', 'Daftar Kategori Glassware', 'kategori_glassware', 1, 1, 1, 0, 1),
(59, 'Supervisor', 32, 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 1),
(60, 'Supervisor', 1, 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 1),
(61, 'Admin Lab', 32, 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 1, 0, 0),
(62, 'Admin Lab', 1, 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 1, 0, 0),
(63, 'Admin SAP', 32, 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(64, 'Admin SAP', 1, 'Daftar Order Internal', 'Daftar Order Internal', 'data_order', 1, 1, 0, 0, 0),
(65, 'User-Lab', 32, 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(66, 'User-Lab', 3, 'Daftar Glassware', 'Daftar Glassware', 'glassware', 2, 1, 0, 0, 0),
(67, 'User-Lab', 31, 'Kategori Glassware', 'Daftar Kategori Glassware', 'kategori_glassware', 1, 1, 0, 0, 0),
(69, 'User-Lab', 38, 'Daftar Reagent', 'Daftar Reagent', 'reagent', 1, 1, 0, 0, 0),
(75, 'User', 32, 'Dashboard', 'Dashboard', 'dashboard', 0, 1, 0, 0, 0),
(76, '', 38, 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 0, 0, 0),
(77, 'User', 38, 'Daftar Reagen & Media', 'Daftar Reagen & Media', 'bahan', 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_analisa_full`
-- (See below for the actual view)
--
CREATE TABLE `view_analisa_full` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_analisa_request_sap`
-- (See below for the actual view)
--
CREATE TABLE `view_analisa_request_sap` (
`id` int(5)
,`id_kar` int(10)
,`month` int(2)
,`years` year(4)
,`id_req` varchar(20)
,`urgent` int(11)
,`jenis_req` varchar(128)
,`plant` varchar(10)
,`sloc` varchar(10)
,`sloc_desc` varchar(255)
,`zyear` varchar(4)
,`jenis_material` varchar(255)
,`material` varchar(20)
,`zbentuk` varchar(255)
,`desc` varchar(255)
,`batch` varchar(20)
,`kode_proses_produksi` varchar(20)
,`karantina_ke` varchar(32)
,`no_karantina` varchar(20)
,`nomor_registrasi_lab` varchar(32)
,`memo` int(1)
,`memo_lab` varchar(255)
,`label_lab` varchar(255)
,`attachment_lab` varchar(255)
,`admin_lab` varchar(10)
,`analis_lab` varchar(20)
,`batch_lapangan` varchar(20)
,`manuf_date` date
,`ed` date
,`uji_ulang` date
,`tgl_karantina` date
,`zmasalah` varchar(255)
,`desc_mslh` text
,`nama_qc` varchar(50)
,`nama_koor` varchar(50)
,`nama_ka` varchar(50)
,`dqc` tinyint(1)
,`dlab` tinyint(1)
,`drnd` tinyint(1)
,`zind` tinyint(1)
,`status_kar` varchar(20)
,`progress` varchar(255)
,`insplot` int(11)
,`order` varchar(50)
,`matdoc` varchar(50)
,`matyears` int(11)
,`ztransaksi` varchar(20)
,`quantity` decimal(10,2)
,`uom` varchar(10)
,`jumlah_sample` int(3)
,`jumlah_sample_rnd` int(3)
,`reff` text
,`created_at` datetime
,`done_at` datetime
,`update_at` datetime
,`update_by` varchar(10)
,`is_deleted` int(1)
,`delete_at` datetime
,`deleted_by` varchar(10)
,`nama_qc_label` varchar(128)
,`waktu_tracking` datetime
,`bentuk` varchar(64)
,`singkatan` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_analisa_request_sap_material`
-- (See below for the actual view)
--
CREATE TABLE `view_analisa_request_sap_material` (
`id` int(5)
,`id_kar` int(10)
,`month` int(2)
,`years` year(4)
,`id_req` varchar(20)
,`urgent` int(11)
,`jenis_req` varchar(128)
,`plant` varchar(10)
,`sloc` varchar(10)
,`zyear` varchar(4)
,`jenis_material` varchar(255)
,`material` varchar(20)
,`zbentuk` varchar(255)
,`desc` varchar(255)
,`batch` varchar(20)
,`kode_proses_produksi` varchar(20)
,`karantina_ke` varchar(32)
,`no_karantina` varchar(20)
,`nomor_registrasi_lab` varchar(32)
,`admin_lab` varchar(10)
,`batch_lapangan` varchar(20)
,`manuf_date` date
,`ed` date
,`uji_ulang` date
,`tgl_karantina` date
,`zmasalah` varchar(255)
,`desc_mslh` text
,`nama_qc` varchar(50)
,`nama_koor` varchar(50)
,`nama_ka` varchar(50)
,`dqc` tinyint(1)
,`dlab` tinyint(1)
,`drnd` tinyint(1)
,`zind` tinyint(1)
,`status_kar` varchar(20)
,`progress` varchar(255)
,`insplot` int(11)
,`order` varchar(50)
,`matdoc` varchar(50)
,`matyears` int(11)
,`ztransaksi` varchar(20)
,`quantity` decimal(10,2)
,`uom` varchar(10)
,`jumlah_sample` int(3)
,`reff` text
,`created_at` datetime
,`update_at` datetime
,`update_by` varchar(10)
,`is_deleted` int(1)
,`delete_at` datetime
,`deleted_by` varchar(10)
,`singkatan` varchar(20)
,`jenis` varchar(64)
,`parameter_bentuk` varchar(64)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_analisa_tracking_lab`
-- (See below for the actual view)
--
CREATE TABLE `view_analisa_tracking_lab` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_bahan_pemakaian_stock`
-- (See below for the actual view)
--
CREATE TABLE `view_bahan_pemakaian_stock` (
`id_bahan` int(12)
,`type_bahan` varchar(128)
,`nama_bahan` varchar(256)
,`kode_bahan` varchar(128)
,`jenis_bahan` varchar(128)
,`peringatan_bahaya` varchar(256)
,`tgl_input` timestamp
,`id_bahan_stock` int(11)
,`kode_bahan_stok` varchar(150)
,`nomor_batch` varchar(30)
,`sisa_bahan` float(10,6)
,`tanggal_ed` date
,`merek` varchar(128)
,`tanggal_buka` date
,`status_segel` int(1)
,`kemasan` float
,`lokasi_penyimpanan` varchar(100)
,`id_pemakaian` int(10)
,`nama_analis` varchar(30)
,`analisa` varchar(50)
,`jumlah_bahan` float
,`jumlah_bahan_awal` float(10,6)
,`jumlah_bahan_sisa` float(10,6)
,`satuan` varchar(5)
,`tanggal_ambil` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_data_bahan_by_stok`
-- (See below for the actual view)
--
CREATE TABLE `view_data_bahan_by_stok` (
`id` int(11)
,`id_bahan` int(10)
,`kode_bahan` varchar(150)
,`nomor_batch` varchar(30)
,`kemasan` float
,`satuan` varchar(10)
,`sisa_bahan` float(10,6)
,`tanggal_ed` date
,`tanggal_datang` date
,`tanggal_buka` date
,`status_segel` int(1)
,`merek` varchar(128)
,`lokasi_penyimpanan` varchar(100)
,`nama_bahan` varchar(256)
,`type_bahan` varchar(128)
,`jenis_bahan` varchar(128)
,`peringatan_bahaya` varchar(256)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_request_approval`
-- (See below for the actual view)
--
CREATE TABLE `view_request_approval` (
`id_req` varchar(20)
,`pernr` varchar(10)
,`fitur` varchar(10)
,`desc_approval` varchar(256)
,`kesimpulan` varchar(255)
,`nama_user` varchar(128)
,`jobdesk` varchar(64)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_analisa_request`
-- (See below for the actual view)
--
CREATE TABLE `vw_analisa_request` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_analisa_request_email_requestor`
-- (See below for the actual view)
--
CREATE TABLE `vw_analisa_request_email_requestor` (
`id_req` varchar(20)
,`nama_qc` varchar(50)
,`no_karantina` varchar(20)
,`requestor_email` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_list_approval`
-- (See below for the actual view)
--
CREATE TABLE `vw_list_approval` (
`id_approval` int(5)
,`id_default_approval` int(5)
,`pernr` varchar(10)
,`name` varchar(128)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_master_unit`
-- (See below for the actual view)
--
CREATE TABLE `vw_master_unit` (
`unit_name` varchar(255)
,`company_parent` varchar(255)
,`id_sub_unit` int(3)
,`id_unit` int(3)
,`sub_unit_name` varchar(256)
,`sub_unit_inisial` varchar(10)
,`unit_email` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_request_approval`
-- (See below for the actual view)
--
CREATE TABLE `vw_request_approval` (
`id` int(10)
,`fitur` varchar(10)
,`id_req` varchar(20)
,`pernr` varchar(10)
,`status` int(1)
,`usulan` varchar(2550)
,`kesimpulan` varchar(255)
,`desc_approval` varchar(256)
,`date_approval` datetime
,`nama_user` varchar(128)
,`jobdesk` varchar(64)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_access_menu`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_access_menu` (
`id_akses` int(6)
,`pernr` varchar(10)
,`id_menu` int(5)
,`view` int(1)
,`create` int(1)
,`update` int(1)
,`delete` int(1)
,`menu_level` int(1)
,`id_menu_parent` int(2)
,`menu_name` varchar(256)
,`menu_icon` varchar(256)
,`menu_title` varchar(256)
,`menu_url` varchar(256)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_unit_company_info`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_unit_company_info` (
`id_user` int(5)
,`pernr` varchar(10)
,`password` varchar(254)
,`name` varchar(128)
,`id_unit_sub` varchar(32)
,`id_unit` int(10)
,`id_plant` int(10)
,`email` varchar(255)
,`jobdesk` varchar(64)
,`locked` int(1)
,`tipe` varchar(128)
,`created_at` datetime
,`created_by` varchar(128)
,`change_at` datetime
,`change_by` varchar(128)
,`last_login` datetime
,`unit_name` varchar(255)
,`unit_cost_center` varchar(10)
,`unit_email` varchar(255)
,`company_parent` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_unit_company_sub_info`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_unit_company_sub_info` (
`id_user` int(5)
,`pernr` varchar(10)
,`password` varchar(254)
,`name` varchar(128)
,`id_unit_sub` varchar(32)
,`id_unit` int(10)
,`id_plant` int(10)
,`email` varchar(255)
,`jobdesk` varchar(64)
,`locked` int(1)
,`tipe` varchar(128)
,`created_at` datetime
,`created_by` varchar(128)
,`change_at` datetime
,`change_by` varchar(128)
,`last_login` datetime
,`unit_name` varchar(255)
,`unit_cost_center` varchar(10)
,`unit_email` varchar(255)
,`company_parent` varchar(255)
,`sub_unit_names` mediumtext
);

-- --------------------------------------------------------

--
-- Structure for view `view_analisa_full`
--
DROP TABLE IF EXISTS `view_analisa_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_analisa_full`  AS SELECT `spec`.`id` AS `id`, `spec`.`id_req` AS `id_req`, `spec`.`mstrchar` AS `mstrchar`, `spec`.`short_text` AS `short_text`, `spec`.`cat_oprshrttxt` AS `cat_oprshrttxt`, `spec`.`oprshrttxt` AS `oprshrttxt`, `spec`.`spec` AS `spec`, `spec`.`result` AS `result`, `spec`.`valid` AS `valid`, `spec`.`manual_add` AS `manual_add`, `spec`.`status_done` AS `status_done`, `spec`.`status_at` AS `status_at`, `spec`.`update_by` AS `update_by`, `spec`.`upload_at` AS `upload_at`, `sap`.`no_karantina` AS `no_karantina`, `sap`.`urgent` AS `urgent`, `sap`.`jenis_req` AS `jenis_req`, `sap`.`kode_proses_produksi` AS `kode_proses_produksi`, `sap`.`karantina_ke` AS `karantina_ke`, `sap`.`batch` AS `batch`, `sap`.`material` AS `material`, `sap`.`jenis_material` AS `jenis_material`, `sap`.`jumlah_sample` AS `jumlah_sample`, `sap`.`desc` AS `desc`, `sap`.`zmasalah` AS `zmasalah`, `sap`.`nama_qc` AS `nama_qc`, `master_material`.`zbentuk` AS `bentuk`, `master_material`.`singkatan` AS `singkatan`, `param_metode`.`metode` AS `metode`, `param_metode`.`penyelia` AS `penyelia`, `tracking`.`waktu_tracking` AS `waktu_tracking`, `user`.`name` AS `penyelia_name` FROM (((((`tb_analisa_request_spec` `spec` join `tb_analisa_request_sap` `sap` on(`spec`.`id_req` = `sap`.`id_req`)) left join (select `tb_analisa_tracking`.`id_req` AS `id_req`,`tb_analisa_tracking`.`waktu_tracking` AS `waktu_tracking` from `tb_analisa_tracking` where `tb_analisa_tracking`.`desc_tracking` = 'Pengiriman sample ke lab analisa') `tracking` on(`sap`.`id` = `tracking`.`id_req`)) left join `tb_analisa_master_material` `master_material` on(`sap`.`material` = `master_material`.`material`)) left join `tb_analisa_master_parameter` `param_metode` on(`sap`.`material` = `param_metode`.`material` and `spec`.`mstrchar` = `param_metode`.`mstrchar` and `master_material`.`zbentuk` = `param_metode`.`bentuk`)) left join `tb_master_user` `user` on(`param_metode`.`penyelia` = `user`.`pernr`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_analisa_request_sap`
--
DROP TABLE IF EXISTS `view_analisa_request_sap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_analisa_request_sap`  AS SELECT `a`.`id` AS `id`, `a`.`id_kar` AS `id_kar`, `a`.`month` AS `month`, `a`.`years` AS `years`, `a`.`id_req` AS `id_req`, `a`.`urgent` AS `urgent`, `a`.`jenis_req` AS `jenis_req`, `a`.`plant` AS `plant`, `a`.`sloc` AS `sloc`, `a`.`sloc_desc` AS `sloc_desc`, `a`.`zyear` AS `zyear`, `a`.`jenis_material` AS `jenis_material`, `a`.`material` AS `material`, `a`.`zbentuk` AS `zbentuk`, `a`.`desc` AS `desc`, `a`.`batch` AS `batch`, `a`.`kode_proses_produksi` AS `kode_proses_produksi`, `a`.`karantina_ke` AS `karantina_ke`, `a`.`no_karantina` AS `no_karantina`, `a`.`nomor_registrasi_lab` AS `nomor_registrasi_lab`, `a`.`memo` AS `memo`, `a`.`memo_lab` AS `memo_lab`, `a`.`label_lab` AS `label_lab`, `a`.`attachment_lab` AS `attachment_lab`, `a`.`admin_lab` AS `admin_lab`, `a`.`analis_lab` AS `analis_lab`, `a`.`batch_lapangan` AS `batch_lapangan`, `a`.`manuf_date` AS `manuf_date`, `a`.`ed` AS `ed`, `a`.`uji_ulang` AS `uji_ulang`, `a`.`tgl_karantina` AS `tgl_karantina`, `a`.`zmasalah` AS `zmasalah`, `a`.`desc_mslh` AS `desc_mslh`, `a`.`nama_qc` AS `nama_qc`, `a`.`nama_koor` AS `nama_koor`, `a`.`nama_ka` AS `nama_ka`, `a`.`dqc` AS `dqc`, `a`.`dlab` AS `dlab`, `a`.`drnd` AS `drnd`, `a`.`zind` AS `zind`, `a`.`status_kar` AS `status_kar`, `a`.`progress` AS `progress`, `a`.`insplot` AS `insplot`, `a`.`order` AS `order`, `a`.`matdoc` AS `matdoc`, `a`.`matyears` AS `matyears`, `a`.`ztransaksi` AS `ztransaksi`, `a`.`quantity` AS `quantity`, `a`.`uom` AS `uom`, `a`.`jumlah_sample` AS `jumlah_sample`, `a`.`jumlah_sample_rnd` AS `jumlah_sample_rnd`, `a`.`reff` AS `reff`, `a`.`created_at` AS `created_at`, `a`.`done_lab_at` AS `done_at`, `a`.`update_at` AS `update_at`, `a`.`update_by` AS `update_by`, `a`.`is_deleted` AS `is_deleted`, `a`.`delete_at` AS `delete_at`, `a`.`deleted_by` AS `deleted_by`, `u`.`name` AS `nama_qc_label`, `tracking`.`waktu_tracking` AS `waktu_tracking`, `m`.`zbentuk` AS `bentuk`, `m`.`singkatan` AS `singkatan` FROM (((`tb_analisa_request_sap` `a` left join `tb_master_user` `u` on(`a`.`nama_qc` = `u`.`pernr`)) left join `tb_analisa_tracking` `tracking` on(`a`.`id_req` = `tracking`.`id_req` and `tracking`.`desc_tracking` = 'Pengiriman sample ke lab analisa')) left join `tb_analisa_master_material` `m` on(`a`.`material` = `m`.`material`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_analisa_request_sap_material`
--
DROP TABLE IF EXISTS `view_analisa_request_sap_material`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_analisa_request_sap_material`  AS SELECT `sap`.`id` AS `id`, `sap`.`id_kar` AS `id_kar`, `sap`.`month` AS `month`, `sap`.`years` AS `years`, `sap`.`id_req` AS `id_req`, `sap`.`urgent` AS `urgent`, `sap`.`jenis_req` AS `jenis_req`, `sap`.`plant` AS `plant`, `sap`.`sloc` AS `sloc`, `sap`.`zyear` AS `zyear`, `sap`.`jenis_material` AS `jenis_material`, `sap`.`material` AS `material`, `sap`.`zbentuk` AS `zbentuk`, `sap`.`desc` AS `desc`, `sap`.`batch` AS `batch`, `sap`.`kode_proses_produksi` AS `kode_proses_produksi`, `sap`.`karantina_ke` AS `karantina_ke`, `sap`.`no_karantina` AS `no_karantina`, `sap`.`nomor_registrasi_lab` AS `nomor_registrasi_lab`, `sap`.`admin_lab` AS `admin_lab`, `sap`.`batch_lapangan` AS `batch_lapangan`, `sap`.`manuf_date` AS `manuf_date`, `sap`.`ed` AS `ed`, `sap`.`uji_ulang` AS `uji_ulang`, `sap`.`tgl_karantina` AS `tgl_karantina`, `sap`.`zmasalah` AS `zmasalah`, `sap`.`desc_mslh` AS `desc_mslh`, `sap`.`nama_qc` AS `nama_qc`, `sap`.`nama_koor` AS `nama_koor`, `sap`.`nama_ka` AS `nama_ka`, `sap`.`dqc` AS `dqc`, `sap`.`dlab` AS `dlab`, `sap`.`drnd` AS `drnd`, `sap`.`zind` AS `zind`, `sap`.`status_kar` AS `status_kar`, `sap`.`progress` AS `progress`, `sap`.`insplot` AS `insplot`, `sap`.`order` AS `order`, `sap`.`matdoc` AS `matdoc`, `sap`.`matyears` AS `matyears`, `sap`.`ztransaksi` AS `ztransaksi`, `sap`.`quantity` AS `quantity`, `sap`.`uom` AS `uom`, `sap`.`jumlah_sample` AS `jumlah_sample`, `sap`.`reff` AS `reff`, `sap`.`created_at` AS `created_at`, `sap`.`update_at` AS `update_at`, `sap`.`update_by` AS `update_by`, `sap`.`is_deleted` AS `is_deleted`, `sap`.`delete_at` AS `delete_at`, `sap`.`deleted_by` AS `deleted_by`, `material`.`singkatan` AS `singkatan`, `material`.`zbentuk` AS `jenis`, `parameter`.`zbentuk` AS `parameter_bentuk` FROM ((`tb_analisa_request_sap` `sap` left join `tb_analisa_master_material` `material` on(`sap`.`material` = `material`.`material`)) left join `tb_analisa_master_material` `parameter` on(`sap`.`material` = `parameter`.`material`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_analisa_tracking_lab`
--
DROP TABLE IF EXISTS `view_analisa_tracking_lab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_analisa_tracking_lab`  AS SELECT `spec`.`id` AS `id`, `spec`.`id_req` AS `id_req`, `spec`.`mstrchar` AS `mstrchar`, `spec`.`short_text` AS `short_text`, `spec`.`oprshrttxt` AS `oprshrttxt`, `spec`.`spec` AS `spec`, `spec`.`result` AS `result`, `spec`.`valid` AS `valid`, `spec`.`manual_add` AS `manual_add`, `spec`.`status_done` AS `status_done`, `spec`.`status_at` AS `status_at`, `spec`.`update_by` AS `update_by`, `spec`.`upload_at` AS `upload_at`, `sap`.`no_karantina` AS `no_karantina`, `sap`.`urgent` AS `urgent`, `sap`.`ed` AS `ed`, `sap`.`uji_ulang` AS `uji_ulang`, `sap`.`jenis_req` AS `jenis_req`, `sap`.`kode_proses_produksi` AS `kode_proses_produksi`, `sap`.`karantina_ke` AS `karantina_ke`, `sap`.`batch` AS `batch`, `sap`.`sloc` AS `sloc`, `sap`.`sloc_desc` AS `sloc_desc`, `sap`.`material` AS `material`, `sap`.`zbentuk` AS `zbentuk`, `sap`.`jenis_material` AS `jenis_material`, `sap`.`progress` AS `progress`, `sap`.`jumlah_sample` AS `jumlah_sample`, `sap`.`desc` AS `desc`, `sap`.`zmasalah` AS `zmasalah`, `sap`.`nama_qc` AS `nama_qc`, `spec`.`penyelia` AS `penyelia`, `spec`.`analis` AS `analis`, `tracking`.`waktu_tracking` AS `waktu_tracking`, `master_material`.`zbentuk` AS `bentuk`, `master_material`.`singkatan` AS `singkatan`, `param_metode`.`metode` AS `metode` FROM ((((`tb_analisa_request_spec` `spec` join `tb_analisa_request_sap` `sap` on(`spec`.`id_req` = `sap`.`id`)) left join (select `tb_analisa_tracking`.`id_req` AS `id_req`,`tb_analisa_tracking`.`waktu_tracking` AS `waktu_tracking` from `tb_analisa_tracking` where `tb_analisa_tracking`.`desc_tracking` = 'Pengiriman sample ke lab analisa') `tracking` on(`sap`.`id` = `tracking`.`id_req`)) left join `tb_analisa_master_material` `master_material` on(`sap`.`material` = `master_material`.`material`)) left join `tb_analisa_master_parameter` `param_metode` on(`sap`.`material` = `param_metode`.`material` and `spec`.`mstrchar` = `param_metode`.`mstrchar`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_bahan_pemakaian_stock`
--
DROP TABLE IF EXISTS `view_bahan_pemakaian_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_bahan_pemakaian_stock`  AS SELECT `c`.`id` AS `id_bahan`, `c`.`type_bahan` AS `type_bahan`, `c`.`nama_bahan` AS `nama_bahan`, `c`.`kode_bahan` AS `kode_bahan`, `c`.`jenis_bahan` AS `jenis_bahan`, `c`.`peringatan_bahaya` AS `peringatan_bahaya`, `c`.`tgl_input` AS `tgl_input`, `b`.`id` AS `id_bahan_stock`, `b`.`kode_bahan` AS `kode_bahan_stok`, `b`.`nomor_batch` AS `nomor_batch`, `b`.`sisa_bahan` AS `sisa_bahan`, `b`.`tanggal_ed` AS `tanggal_ed`, `b`.`merek` AS `merek`, `b`.`tanggal_buka` AS `tanggal_buka`, `b`.`status_segel` AS `status_segel`, `b`.`kemasan` AS `kemasan`, `b`.`lokasi_penyimpanan` AS `lokasi_penyimpanan`, `a`.`id` AS `id_pemakaian`, `a`.`nama_analis` AS `nama_analis`, `a`.`analisa` AS `analisa`, `a`.`jumlah_bahan` AS `jumlah_bahan`, `a`.`jumlah_bahan_awal` AS `jumlah_bahan_awal`, `a`.`jumlah_bahan_sisa` AS `jumlah_bahan_sisa`, `a`.`satuan` AS `satuan`, `a`.`tanggal_ambil` AS `tanggal_ambil` FROM ((`tb_bahan_pemakaian` `a` left join `tb_bahan_stock` `b` on(`a`.`kode_bahan` = `b`.`kode_bahan`)) left join `tb_bahan_master` `c` on(`b`.`id_bahan` = `c`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_data_bahan_by_stok`
--
DROP TABLE IF EXISTS `view_data_bahan_by_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_bahan_by_stok`  AS SELECT `bs`.`id` AS `id`, `bs`.`id_bahan` AS `id_bahan`, `bs`.`kode_bahan` AS `kode_bahan`, `bs`.`nomor_batch` AS `nomor_batch`, `bs`.`kemasan` AS `kemasan`, `bs`.`satuan` AS `satuan`, `bs`.`sisa_bahan` AS `sisa_bahan`, `bs`.`tanggal_ed` AS `tanggal_ed`, `bs`.`tanggal_datang` AS `tanggal_datang`, `bs`.`tanggal_buka` AS `tanggal_buka`, `bs`.`status_segel` AS `status_segel`, `bs`.`merek` AS `merek`, `bs`.`lokasi_penyimpanan` AS `lokasi_penyimpanan`, `bm`.`nama_bahan` AS `nama_bahan`, `bm`.`type_bahan` AS `type_bahan`, `bm`.`jenis_bahan` AS `jenis_bahan`, `bm`.`peringatan_bahaya` AS `peringatan_bahaya` FROM (`tb_bahan_stock` `bs` join `tb_bahan_master` `bm` on(`bs`.`id_bahan` = `bm`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_request_approval`
--
DROP TABLE IF EXISTS `view_request_approval`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_request_approval`  AS SELECT `ra`.`id_req` AS `id_req`, `ra`.`pernr` AS `pernr`, `ra`.`fitur` AS `fitur`, `ra`.`desc_approval` AS `desc_approval`, `ra`.`kesimpulan` AS `kesimpulan`, coalesce(`mu`.`name`,'') AS `nama_user`, `mu`.`jobdesk` AS `jobdesk` FROM (`tb_request_approval` `ra` left join `tb_master_user` `mu` on(`ra`.`pernr` = `mu`.`pernr`)) WHERE `mu`.`jobdesk` is not null OR `mu`.`pernr` is null ;

-- --------------------------------------------------------

--
-- Structure for view `vw_analisa_request`
--
DROP TABLE IF EXISTS `vw_analisa_request`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_analisa_request`  AS SELECT `spec`.`id` AS `id`, `spec`.`id_req` AS `id_req`, `spec`.`mstrchar` AS `mstrchar`, `spec`.`short_text` AS `short_text`, `spec`.`oprshrttxt` AS `oprshrttxt`, `spec`.`spec` AS `spec`, `spec`.`result` AS `result`, `spec`.`valid` AS `valid`, `spec`.`manual_add` AS `manual_add`, `spec`.`status_done` AS `status_done`, `spec`.`status_at` AS `status_at`, `spec`.`update_by` AS `update_by`, `spec`.`upload_at` AS `upload_at`, `sap`.`no_karantina` AS `no_karantina`, `sap`.`urgent` AS `urgent`, `sap`.`jenis_req` AS `jenis_req`, `sap`.`jenis_material` AS `jenis_material`, `sap`.`material` AS `material`, `sap`.`jumlah_sample` AS `jumlah_sample`, `sap`.`desc` AS `desc`, `sap`.`zmasalah` AS `zmasalah`, `sap`.`nama_qc` AS `nama_qc`, `tracking`.`waktu_tracking` AS `waktu_tracking_lab_analisa` FROM ((`tb_analisa_request_sap` `sap` join `tb_analisa_request_spec` `spec` on(`sap`.`id` = `spec`.`id_req`)) left join `tb_analisa_tracking` `tracking` on(`spec`.`id` = `tracking`.`id_req` and `tracking`.`desc_tracking` = 'Proses pengiriman sample ke lab analisa')) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_analisa_request_email_requestor`
--
DROP TABLE IF EXISTS `vw_analisa_request_email_requestor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_analisa_request_email_requestor`  AS SELECT `ar`.`id_req` AS `id_req`, `ar`.`nama_qc` AS `nama_qc`, `ar`.`no_karantina` AS `no_karantina`, `u`.`email` AS `requestor_email` FROM (`tb_analisa_request_sap` `ar` join `tb_master_user` `u` on(`u`.`pernr` = `ar`.`nama_qc`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_list_approval`
--
DROP TABLE IF EXISTS `vw_list_approval`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_list_approval`  AS SELECT `la`.`id_approval` AS `id_approval`, `la`.`id_default_approval` AS `id_default_approval`, `la`.`pernr` AS `pernr`, `u`.`name` AS `name` FROM (`tb_master_list_approval` `la` join `tb_master_user` `u` on(`la`.`pernr` = `u`.`pernr`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_master_unit`
--
DROP TABLE IF EXISTS `vw_master_unit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_master_unit`  AS SELECT `u`.`unit_name` AS `unit_name`, `u`.`company_parent` AS `company_parent`, `s`.`id_unit_sub` AS `id_sub_unit`, `s`.`id_unit` AS `id_unit`, `s`.`sub_unit_name` AS `sub_unit_name`, `s`.`sub_unit_inisial` AS `sub_unit_inisial`, `s`.`email_sub_unit` AS `unit_email` FROM (`tb_master_unit_sub` `s` left join `tb_master_unit_company` `u` on(`s`.`id_unit` = `u`.`id_unit`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_request_approval`
--
DROP TABLE IF EXISTS `vw_request_approval`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_request_approval`  AS SELECT `ra`.`id` AS `id`, `ra`.`fitur` AS `fitur`, `ra`.`id_req` AS `id_req`, `ra`.`pernr` AS `pernr`, `ra`.`status` AS `status`, `ra`.`usulan` AS `usulan`, `ra`.`kesimpulan` AS `kesimpulan`, `ra`.`desc_approval` AS `desc_approval`, `ra`.`date_approval` AS `date_approval`, `u`.`name` AS `nama_user`, `u`.`jobdesk` AS `jobdesk` FROM (`tb_request_approval` `ra` join `tb_master_user` `u` on(`ra`.`pernr` = `u`.`pernr`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_access_menu`
--
DROP TABLE IF EXISTS `vw_user_access_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_access_menu`  AS SELECT `a`.`id_akses` AS `id_akses`, `a`.`pernr` AS `pernr`, `a`.`id_menu` AS `id_menu`, `a`.`view` AS `view`, `a`.`create` AS `create`, `a`.`update` AS `update`, `a`.`delete` AS `delete`, `m`.`menu_level` AS `menu_level`, `m`.`id_menu_parent` AS `id_menu_parent`, `m`.`menu_name` AS `menu_name`, `m`.`menu_icon` AS `menu_icon`, `m`.`menu_title` AS `menu_title`, `m`.`menu_url` AS `menu_url` FROM (`tb_master_user_akses` `a` join `tb_master_menu` `m` on(`a`.`id_menu` = `m`.`id_menu`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_unit_company_info`
--
DROP TABLE IF EXISTS `vw_user_unit_company_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_unit_company_info`  AS SELECT `u`.`id_user` AS `id_user`, `u`.`pernr` AS `pernr`, `u`.`password` AS `password`, `u`.`name` AS `name`, `u`.`id_unit_sub` AS `id_unit_sub`, `u`.`id_unit` AS `id_unit`, `u`.`id_plant` AS `id_plant`, `u`.`email` AS `email`, `u`.`jobdesk` AS `jobdesk`, `u`.`locked` AS `locked`, `u`.`tipe` AS `tipe`, `u`.`created_at` AS `created_at`, `u`.`created_by` AS `created_by`, `u`.`change_at` AS `change_at`, `u`.`change_by` AS `change_by`, `u`.`last_login` AS `last_login`, `c`.`unit_name` AS `unit_name`, `c`.`unit_cost_center` AS `unit_cost_center`, `c`.`email` AS `unit_email`, `c`.`company_parent` AS `company_parent` FROM (`tb_master_user` `u` left join `tb_master_unit_company` `c` on(`u`.`id_unit` = `c`.`id_unit`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_unit_company_sub_info`
--
DROP TABLE IF EXISTS `vw_user_unit_company_sub_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_unit_company_sub_info`  AS SELECT `u`.`id_user` AS `id_user`, `u`.`pernr` AS `pernr`, `u`.`password` AS `password`, `u`.`name` AS `name`, `u`.`id_unit_sub` AS `id_unit_sub`, `u`.`id_unit` AS `id_unit`, `u`.`id_plant` AS `id_plant`, `u`.`email` AS `email`, `u`.`jobdesk` AS `jobdesk`, `u`.`locked` AS `locked`, `u`.`tipe` AS `tipe`, `u`.`created_at` AS `created_at`, `u`.`created_by` AS `created_by`, `u`.`change_at` AS `change_at`, `u`.`change_by` AS `change_by`, `u`.`last_login` AS `last_login`, `u`.`unit_name` AS `unit_name`, `u`.`unit_cost_center` AS `unit_cost_center`, `u`.`unit_email` AS `unit_email`, `u`.`company_parent` AS `company_parent`, group_concat(`s`.`sub_unit_name` separator ',') AS `sub_unit_names` FROM (`vw_user_unit_company_info` `u` left join `tb_master_unit_sub` `s` on(find_in_set(`s`.`id_unit_sub`,`u`.`id_unit_sub`))) GROUP BY `u`.`id_user` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification_signal`
--
ALTER TABLE `notification_signal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_notifications`
--
ALTER TABLE `sys_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_notification_templates`
--
ALTER TABLE `sys_notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_analisa_master_material`
--
ALTER TABLE `tb_analisa_master_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_analisa_master_parameter`
--
ALTER TABLE `tb_analisa_master_parameter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_analisa_request_sap`
--
ALTER TABLE `tb_analisa_request_sap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_analisa_request_spec`
--
ALTER TABLE `tb_analisa_request_spec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_analisa_tracking`
--
ALTER TABLE `tb_analisa_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bahan_master`
--
ALTER TABLE `tb_bahan_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bahan_pemakaian`
--
ALTER TABLE `tb_bahan_pemakaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bahan_stock`
--
ALTER TABLE `tb_bahan_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_daftar_glassware`
--
ALTER TABLE `tb_daftar_glassware`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tb_daftar_input_kalibrasi_glassware`
--
ALTER TABLE `tb_daftar_input_kalibrasi_glassware`
  ADD PRIMARY KEY (`id_input`);

--
-- Indexes for table `tb_daftar_instrumen`
--
ALTER TABLE `tb_daftar_instrumen`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tb_hasil_kalibrasi_glassware`
--
ALTER TABLE `tb_hasil_kalibrasi_glassware`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tb_input_kalibrasi_glassware`
--
ALTER TABLE `tb_input_kalibrasi_glassware`
  ADD PRIMARY KEY (`id_input`);

--
-- Indexes for table `tb_instrumen_baru`
--
ALTER TABLE `tb_instrumen_baru`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_karantina_dummy`
--
ALTER TABLE `tb_karantina_dummy`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `tb_karantina_hasil_analisa`
--
ALTER TABLE `tb_karantina_hasil_analisa`
  ADD PRIMARY KEY (`plant_code`,`quarantine_number`);

--
-- Indexes for table `tb_karantina_request`
--
ALTER TABLE `tb_karantina_request`
  ADD PRIMARY KEY (`id_request`,`plant`,`no_karantina`,`month`,`years`) USING BTREE;

--
-- Indexes for table `tb_karantina_tf_sample`
--
ALTER TABLE `tb_karantina_tf_sample`
  ADD PRIMARY KEY (`plant_code`,`quarantine_number`);

--
-- Indexes for table `tb_kategori_glassware`
--
ALTER TABLE `tb_kategori_glassware`
  ADD PRIMARY KEY (`id_instrumen`);

--
-- Indexes for table `tb_kategori_instrumen`
--
ALTER TABLE `tb_kategori_instrumen`
  ADD PRIMARY KEY (`id_instrumen`);

--
-- Indexes for table `tb_log_instrumen`
--
ALTER TABLE `tb_log_instrumen`
  ADD PRIMARY KEY (`id_kalibrasi`);

--
-- Indexes for table `tb_master_api`
--
ALTER TABLE `tb_master_api`
  ADD PRIMARY KEY (`id_api`);

--
-- Indexes for table `tb_master_company`
--
ALTER TABLE `tb_master_company`
  ADD PRIMARY KEY (`id_plant`);

--
-- Indexes for table `tb_master_default_approval`
--
ALTER TABLE `tb_master_default_approval`
  ADD PRIMARY KEY (`id_default_approval`);

--
-- Indexes for table `tb_master_halaman`
--
ALTER TABLE `tb_master_halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `tb_master_kategori_barang`
--
ALTER TABLE `tb_master_kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_master_list_approval`
--
ALTER TABLE `tb_master_list_approval`
  ADD PRIMARY KEY (`id_approval`);

--
-- Indexes for table `tb_master_menu`
--
ALTER TABLE `tb_master_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_master_rumus`
--
ALTER TABLE `tb_master_rumus`
  ADD PRIMARY KEY (`id_rumus`);

--
-- Indexes for table `tb_master_satuan`
--
ALTER TABLE `tb_master_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_status_order`
--
ALTER TABLE `tb_master_status_order`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_master_unit_company`
--
ALTER TABLE `tb_master_unit_company`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tb_master_unit_sub`
--
ALTER TABLE `tb_master_unit_sub`
  ADD PRIMARY KEY (`id_unit_sub`);

--
-- Indexes for table `tb_master_user`
--
ALTER TABLE `tb_master_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_master_user_akses`
--
ALTER TABLE `tb_master_user_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_order_diterima`
--
ALTER TABLE `tb_order_diterima`
  ADD PRIMARY KEY (`id_diterima`);

--
-- Indexes for table `tb_order_penawaran`
--
ALTER TABLE `tb_order_penawaran`
  ADD PRIMARY KEY (`id_penawaran`);

--
-- Indexes for table `tb_order_persetujuan`
--
ALTER TABLE `tb_order_persetujuan`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_request_approval`
--
ALTER TABLE `tb_request_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_akses`
--
ALTER TABLE `tb_user_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `tb_user_atasan`
--
ALTER TABLE `tb_user_atasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification_signal`
--
ALTER TABLE `notification_signal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_notifications`
--
ALTER TABLE `sys_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_notification_templates`
--
ALTER TABLE `sys_notification_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_analisa_master_material`
--
ALTER TABLE `tb_analisa_master_material`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_analisa_master_parameter`
--
ALTER TABLE `tb_analisa_master_parameter`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_analisa_request_sap`
--
ALTER TABLE `tb_analisa_request_sap`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_analisa_request_spec`
--
ALTER TABLE `tb_analisa_request_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_analisa_tracking`
--
ALTER TABLE `tb_analisa_tracking`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_bahan_master`
--
ALTER TABLE `tb_bahan_master`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bahan_pemakaian`
--
ALTER TABLE `tb_bahan_pemakaian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bahan_stock`
--
ALTER TABLE `tb_bahan_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_daftar_input_kalibrasi_glassware`
--
ALTER TABLE `tb_daftar_input_kalibrasi_glassware`
  MODIFY `id_input` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasil_kalibrasi_glassware`
--
ALTER TABLE `tb_hasil_kalibrasi_glassware`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_input_kalibrasi_glassware`
--
ALTER TABLE `tb_input_kalibrasi_glassware`
  MODIFY `id_input` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_instrumen_baru`
--
ALTER TABLE `tb_instrumen_baru`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_karantina_dummy`
--
ALTER TABLE `tb_karantina_dummy`
  MODIFY `id_request` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_karantina_request`
--
ALTER TABLE `tb_karantina_request`
  MODIFY `id_request` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_master_api`
--
ALTER TABLE `tb_master_api`
  MODIFY `id_api` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_master_company`
--
ALTER TABLE `tb_master_company`
  MODIFY `id_plant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_master_default_approval`
--
ALTER TABLE `tb_master_default_approval`
  MODIFY `id_default_approval` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_master_halaman`
--
ALTER TABLE `tb_master_halaman`
  MODIFY `id_halaman` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_master_kategori_barang`
--
ALTER TABLE `tb_master_kategori_barang`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_master_list_approval`
--
ALTER TABLE `tb_master_list_approval`
  MODIFY `id_approval` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_master_menu`
--
ALTER TABLE `tb_master_menu`
  MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_master_rumus`
--
ALTER TABLE `tb_master_rumus`
  MODIFY `id_rumus` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_master_satuan`
--
ALTER TABLE `tb_master_satuan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_master_status_order`
--
ALTER TABLE `tb_master_status_order`
  MODIFY `id_status` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_master_unit_company`
--
ALTER TABLE `tb_master_unit_company`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_master_unit_sub`
--
ALTER TABLE `tb_master_unit_sub`
  MODIFY `id_unit_sub` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_master_user`
--
ALTER TABLE `tb_master_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tb_master_user_akses`
--
ALTER TABLE `tb_master_user_akses`
  MODIFY `id_akses` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2346;

--
-- AUTO_INCREMENT for table `tb_order_diterima`
--
ALTER TABLE `tb_order_diterima`
  MODIFY `id_diterima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2157;

--
-- AUTO_INCREMENT for table `tb_order_penawaran`
--
ALTER TABLE `tb_order_penawaran`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `tb_order_persetujuan`
--
ALTER TABLE `tb_order_persetujuan`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `tb_request_approval`
--
ALTER TABLE `tb_request_approval`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user_akses`
--
ALTER TABLE `tb_user_akses`
  MODIFY `id_akses` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525;

--
-- AUTO_INCREMENT for table `tb_user_atasan`
--
ALTER TABLE `tb_user_atasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id_role` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
