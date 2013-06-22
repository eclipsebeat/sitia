-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2013 at 01:57 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sitia`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE IF NOT EXISTS `arsip` (
  `arsip_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenisarsip_id` int(11) NOT NULL,
  `nama_arsip` varchar(255) NOT NULL,
  `ruang` int(5) NOT NULL,
  `rak` int(5) NOT NULL,
  `baris` int(5) NOT NULL,
  `box` int(5) NOT NULL,
  `keyword` text,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  `status_pinjam` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`arsip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `jenisarsip_id`, `nama_arsip`, `ruang`, `rak`, `baris`, `box`, `keyword`, `input_date`, `last_update`, `status_pinjam`) VALUES
(1, 3, 'SP2D pembayaran gaji', 9, 1, 5, 6, NULL, '2012-01-02', '2012-01-02', 'N'),
(2, 3, 'SP2D pembayaran gaji', 9, 1, 5, 6, NULL, '2012-01-02', '2012-01-02', 'N'),
(12, 5, 'lkpp 2012', 6, 5, 4, 3, NULL, '2013-05-13', '2013-05-13', 'N'),
(13, 5, 'lkpp semester 1 2012', 1, 6, 6, 6, NULL, '2013-05-13', '2013-05-13', 'N'),
(15, 5, 'Laporan Pertanggungjawaban Penerimaan dan Pengeluaran Negara', 6, 3, 2, 1, NULL, '2013-05-18', '2013-05-18', 'Y'),
(26, 2, 'sosialisasi bendum', 4, 2, 2, 2, NULL, '2013-05-18', '2013-05-18', 'N'),
(27, 4, 'SPJ Bendum', 9, 5, 3, 5, NULL, '2013-05-19', '2013-05-19', 'N'),
(28, 4, 'SPJ Bendum', 9, 5, 3, 5, NULL, '2013-05-19', '2013-05-19', 'N'),
(30, 2, 'sos per 55', 5, 5, 4, 3, NULL, '2013-05-20', '2013-05-20', 'N'),
(31, 4, 'SPJ Bendum', 9, 5, 4, 1, NULL, '2013-05-20', '2013-05-20', 'N'),
(32, 5, 'lkpp triwulan 2 2012', 6, 5, 5, 5, NULL, '2013-05-20', '2013-05-20', 'N'),
(38, 1, 'Surat Apresiasi', 1, 1, 1, 1, NULL, '2013-05-22', '2013-05-22', 'N'),
(39, 1, 'Surat Pengumuman Hasil Beasiswa', 3, 1, 2, 3, 'lampiran i surat ini, d iv, ijazah d iii, pemanggilan wawancara beasiswa internal ditjen perbendaharaan, ijazah s, pelamar s, untuk pelamar s, panitia seleksi beasiswa internal ditjen perbendaharaan, s, surat pengumuman hasil beasiswapengumuman hasil seleksi, dipa kantor pusat ditjen perbendaharaan, magister chief information officer itb, magister perencanaan kebijakan publik ui, beasiswa internal ditjen perbendaharaan, magister layanan teknologi informasi itb, foto copy sk kepangkatan, magister ilmu hukum ui, magister ilmu akuntansi ui, no, biaya perjalanan pulang pergi, magister ilmu psikologi ui, sistem teknologi informasi its, surat keterangan berbadan sehat, magister ilmu ekonomi ui, universitas jadwal wawancara internal, sistem informasi manajemen unibraw, foto copy transkrip nilai, universitas indonesia disediakan formulir, pengembangan pegawaiberdasarkan hasil seleksi, berhak mengikuti seleksi tahap, universitas jadwal tes tertulis, seleksi wawancara internal, berhak mengikuti seleksi, dikirim melewati batas waktu, mengikuti seleksi tahap, dalam format pdf, ekonomi kuantitatif unibraw, universitas gadjah mada, magister manajemen ugm, foto copy identitas, foto copy ijazah, tes seleksi tahap, institut teknologi bandung, memperhatikan ketepatan pengiriman, sarana pengiriman tercepat, kartu pelajar berfoto, bentuk hard copy, wawancara internal, ketelitian pengisian dokumen', '2013-06-05', '2013-06-05', 'N'),
(44, 3, 'SP2D gaji Rutan Kolaka', 5, 2, 1, 2, 'd gaji rutan kolakapara pegawai rutan kolaka pembayaran gaji, pegawai', '2013-06-16', '2013-06-16', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
