-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2013 at 05:35 AM
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
  `keyword` varchar(255) DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`arsip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `jenisarsip_id`, `nama_arsip`, `ruang`, `rak`, `baris`, `box`, `keyword`, `input_date`, `last_update`) VALUES
(12, 5, 'lkpp 2012', 1, 5, 4, 3, NULL, '2013-05-13', '2013-05-13'),
(13, 5, 'lkpp semester 1 2012', 1, 6, 6, 6, NULL, '2013-05-13', '2013-05-13'),
(15, 5, 'Laporan Pertanggungjawaban Penerimaan dan Pengeluaran Negara', 6, 3, 2, 1, NULL, '2013-05-18', '2013-05-18'),
(16, 1, 'Surat Pengumuman Hasil Beasiswa', 3, 1, 2, 1, NULL, '2013-05-18', '2013-05-18'),
(17, 1, 'Surat Pengumuman Hasil Beasiswa', 3, 1, 2, 1, NULL, '2013-05-18', '2013-05-18'),
(18, 1, 'asfdaf', 2, 2, 1, 2, NULL, '2013-05-18', '2013-05-18'),
(26, 2, 'sosialisasi bendum', 4, 2, 2, 2, NULL, '2013-05-18', '2013-05-18'),
(27, 4, 'SPJ Bendum', 9, 5, 3, 5, NULL, '2013-05-19', '2013-05-19'),
(28, 4, 'SPJ Bendum', 9, 5, 3, 5, NULL, '2013-05-19', '2013-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_arsip`
--

CREATE TABLE IF NOT EXISTS `jenis_arsip` (
  `jenisarsip_id` int(15) NOT NULL AUTO_INCREMENT,
  `nama_jenisarsip` varchar(255) NOT NULL,
  `masa_retensi` int(2) NOT NULL,
  `uraian` text,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`jenisarsip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `jenis_arsip`
--

INSERT INTO `jenis_arsip` (`jenisarsip_id`, `nama_jenisarsip`, `masa_retensi`, `uraian`, `input_date`, `last_update`) VALUES
(1, 'Surat Masuk', 5, 'Seluruh Jenis Surat Masuk.', '2013-04-24', '2013-04-29'),
(2, 'Surat Keluar', 5, 'Seluruh Jenis Surat Keluar', '2013-04-22', '2013-04-22'),
(3, 'SP2D', 10, 'Surat Perintah Pencairan Dana (SP2D) Lembar 3 beserta lampiran', '2013-04-22', '2013-04-22'),
(4, 'Laporan Pertanggungjawaban Penerimaan dan Pengeluaran Negara', 10, 'terdiri dari:\r\na. SPJ Bendahara Umum (RPBU, BBU, BPU, BGPU);\r\nb. Laporan Harian Penerimaan dan Pengembalian Pajak;\r\nc. Laporan Harian Penerimaan dan Pengembalian Bea Cukai;\r\nd. Laporan Harian Penerimaan Pendapatan Negara Bukan Pajak;\r\ne. Buku Potongan Umum;\r\nf. Laporan Harian Daftar Perincian Saldo;\r\ng. Laporan Kas Posisi Harian, Mingguan dan Akhir Bulan;\r\nh. BKPP, RBKPP, BKPK, RBKPK, Buku Bank;\r\ni. Daftar Perhitungan dan lampirannya;', '2013-04-24', '2013-04-29'),
(5, 'Laporan Keuangan Pemerintah Pusat', 10, 'Laporan Bulanan Seksi Verifikasi dan Akuntansi', '2013-04-29', '2013-04-29'),
(21, 'Dosir Pegawai', 50, 'Seluruh Data Pegawai, mulai dari SK CPNS hingga Pensiun', '2013-04-22', '2013-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `lkpp_detail`
--

CREATE TABLE IF NOT EXISTS `lkpp_detail` (
  `LKPP_id` int(11) NOT NULL AUTO_INCREMENT,
  `arsip_id` int(11) NOT NULL,
  `uraian` text,
  `attachment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LKPP_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lkpp_detail`
--

INSERT INTO `lkpp_detail` (`LKPP_id`, `arsip_id`, `uraian`, `attachment`) VALUES
(1, 12, 'jhbh', '13052013031219FotocopyKTP.pdf'),
(2, 13, 'ghgbhgbh', '13052013031509FotocopyKTP.pdf'),
(3, 15, 'lkpp lom d audit', '18052013015528LKPP_2012_smt1_unaudited_2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
  `ruang_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ruang` varchar(3) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`ruang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`ruang_id`, `kode_ruang`, `nama_ruang`, `input_date`, `last_update`) VALUES
(1, 'R01', 'Ruang Kepala Kantor', '2013-04-22', '2013-04-22'),
(2, 'R02', 'Ruang Sekretaris', '2013-04-22', '2013-04-22'),
(3, 'R03', 'Ruang Subag Umum', '2013-04-22', '2013-04-22'),
(4, 'R04', 'Ruang Seksi Bank Pos', '2013-04-22', '2013-04-22'),
(5, 'R05', 'Ruang Seksi Pencairan Dana', '2013-04-22', '2013-04-22'),
(6, 'R06', 'Ruang Seksi Verifikasi dan Akuntansi', '2013-04-22', '2013-04-22'),
(7, 'R07', 'Ruang Supervisor', '2013-04-22', '2013-04-22'),
(9, 'R08', 'Ruang Arsip Aktif', '2013-04-22', '2013-04-24'),
(10, 'R09', 'Ruang Arsip In Aktif', '2013-04-24', '2013-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `seksi`
--

CREATE TABLE IF NOT EXISTS `seksi` (
  `kdseksi` int(11) NOT NULL AUTO_INCREMENT,
  `nmseksi` varchar(255) NOT NULL,
  PRIMARY KEY (`kdseksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `seksi`
--

INSERT INTO `seksi` (`kdseksi`, `nmseksi`) VALUES
(1, 'Pencairan Dana I'),
(2, 'Pencairan Dana II'),
(3, 'Bank Giro Pos'),
(4, 'Verifikasi dan Akuntansi'),
(5, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `sp2d_detail`
--

CREATE TABLE IF NOT EXISTS `sp2d_detail` (
  `arsip_id` int(11) DEFAULT NULL,
  `nosp2d` varchar(7) NOT NULL,
  `tgsp2d` date DEFAULT NULL,
  `kdsatker` int(6) DEFAULT NULL,
  `nilaisp2d` int(50) DEFAULT NULL,
  `uraiben` text,
  `untuk` text,
  `attachment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nosp2d`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp2d_detail`
--

INSERT INTO `sp2d_detail` (`arsip_id`, `nosp2d`, `tgsp2d`, `kdsatker`, `nilaisp2d`, `uraiben`, `untuk`, `attachment`) VALUES
(0, '863411W', '0000-00-00', 0, 0, '', '', ''),
(0, '863412W', '0000-00-00', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `spj_detail`
--

CREATE TABLE IF NOT EXISTS `spj_detail` (
  `spj_id` int(11) NOT NULL AUTO_INCREMENT,
  `arsip_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `uraian` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  PRIMARY KEY (`spj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `spj_detail`
--

INSERT INTO `spj_detail` (`spj_id`, `arsip_id`, `tanggal`, `uraian`, `attachment`) VALUES
(1, 27, '2013-05-17', 'SPJ Bendum Jum''at 17 Mei 2013', '19052013015356SE-10 MK.01 2013 (Program Pengendalian Gratifikasi).pdf'),
(2, 28, '2013-05-17', 'SPJ Bendum Jum''at 17 Mei 2013', '19052013015356SE-10 MK.01 2013 (Program Pengendalian Gratifikasi).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluar_detail`
--

CREATE TABLE IF NOT EXISTS `suratkeluar_detail` (
  `sk_id` int(11) NOT NULL AUTO_INCREMENT,
  `arsip_id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `penerbit` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  PRIMARY KEY (`sk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suratkeluar_detail`
--

INSERT INTO `suratkeluar_detail` (`sk_id`, `arsip_id`, `no_surat`, `tanggal`, `perihal`, `kepada`, `penerbit`, `uraian`, `attachment`) VALUES
(1, 26, 'Und-02/WPB.12/KP.0130/2012', '2012-03-30', 'Undangan Sosialisasi', 'Para Pimpinan Bank/Pos Persepsi Mitra Kerja  KPPN Jakarta I', 3, 'Sosialisasi Peraturan Dirjen Perbendaharaan Nomor: PER-13/PB/2012 tanggal 14 Maret 2012 tentang Mekanisme Pelaksanaan Layanan Penerimaan Negara oleh Bank/POs Persepsi pada Kantor Cabang  Pembantu/Kantor Layanan/Unit Layanan Lainnya', '18052013234544und_sosialisasi_bendum.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk_detail`
--

CREATE TABLE IF NOT EXISTS `suratmasuk_detail` (
  `sm_id` int(11) NOT NULL AUTO_INCREMENT,
  `arsip_id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `uraian` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  PRIMARY KEY (`sm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suratmasuk_detail`
--

INSERT INTO `suratmasuk_detail` (`sm_id`, `arsip_id`, `no_surat`, `tanggal`, `perihal`, `pengirim`, `uraian`, `attachment`) VALUES
(1, 18, '21313sda', '2013-05-01', 'asfafa', 'afafaf', 'safaf', '18052013054317SE_11_MK.1_2013.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `NIP`, `role`, `input_date`, `last_update`) VALUES
(1, 'admin', '060113860', '', 1, '0000-00-00', '0000-00-00'),
(3, 'cadmin', '4bfae70590c772a8872dce5c7c9595c0', '060113891', 2, '0000-00-00', '2013-04-29'),
(5, 'eadmin4', '060113860', '', 2, '0000-00-00', '0000-00-00'),
(8, 'hadmin5', '060113860', '', 2, '0000-00-00', '0000-00-00'),
(12, 'testes', '81dc9bdb52d04dc20036dbd8313ed055', '12345', 1, '0000-00-00', '0000-00-00'),
(15, 'tastistus', '81dc9bdb52d04dc20036dbd8313ed055', '060113890', 2, '0000-00-00', '0000-00-00'),
(18, 'teslagi', '81dc9bdb52d04dc20036dbd8313ed055', '060113863', 2, '2013-04-24', '2013-04-24'),
(20, 'nyuba', '827ccb0eea8a706c4c34a16891f84e7b', '060113866', 2, '2013-04-29', '2013-04-29'),
(21, 'nyuba22', '827ccb0eea8a706c4c34a16891f84e7b', '060113866', 2, '2013-04-29', '2013-04-29'),
(22, 'nyuba33', '827ccb0eea8a706c4c34a16891f84e7b', '060113866', 2, '2013-04-29', '2013-04-29'),
(23, 'nyuba44', '827ccb0eea8a706c4c34a16891f84e7b', '060113866', 2, '2013-04-29', '2013-04-29'),
(25, 'hadjimin6', '060113860', '', 2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE IF NOT EXISTS `user_categories` (
  `usercat_id` int(15) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`usercat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_categories`
--

INSERT INTO `user_categories` (`usercat_id`, `category`, `description`) VALUES
(1, 'admin', 'administrator'),
(2, 'user', 'pengguna umum');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
