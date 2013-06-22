-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2013 at 03:59 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `jenisarsip_id`, `nama_arsip`, `ruang`, `rak`, `baris`, `box`, `keyword`, `input_date`, `last_update`, `status_pinjam`) VALUES
(1, 3, 'SP2D pembayaran gaji', 9, 1, 5, 6, NULL, '2012-01-02', '2012-01-02', 'N'),
(2, 3, 'SP2D pembayaran gaji', 9, 1, 5, 6, NULL, '2012-01-02', '2012-01-02', 'N'),
(12, 5, 'lkpp 2012', 6, 5, 4, 3, NULL, '2013-05-13', '2013-05-13', 'N'),
(13, 5, 'lkpp semester 1 2012', 1, 6, 6, 6, NULL, '2013-05-13', '2013-05-13', 'N'),
(15, 5, 'Laporan Pertanggungjawaban Penerimaan dan Pengeluaran Negara', 6, 3, 2, 1, NULL, '2013-05-18', '2013-05-18', 'N'),
(26, 2, 'sosialisasi bendum', 4, 2, 2, 2, NULL, '2013-05-18', '2013-05-18', 'N'),
(27, 4, 'SPJ Bendum', 9, 5, 3, 5, NULL, '2013-05-19', '2013-05-19', 'N'),
(28, 4, 'SPJ Bendum', 9, 5, 3, 5, NULL, '2013-05-19', '2013-05-19', 'N'),
(30, 2, 'sos per 55', 5, 5, 4, 3, NULL, '2013-05-20', '2013-05-20', 'N'),
(31, 4, 'SPJ Bendum', 9, 5, 4, 1, NULL, '2013-05-20', '2013-05-20', 'N'),
(32, 5, 'lkpp triwulan 2 2012', 6, 5, 5, 5, NULL, '2013-05-20', '2013-05-20', 'Y'),
(34, 1, 'Surat Pengumuman Hasil Beasiswa - tes1', 3, 2, 1, 2, '', '2013-05-18', '2013-05-20', 'N'),
(37, 1, 'Surat Pengumuman Hasil Beasiswa - tes1', 1, 2, 1, 2, 'lampiran i surat ini, d iv, ijazah d iii, pemanggilan wawancara beasiswa internal ditjen perbendaharaan, ijazah s, untuk pelamar s, pelamar s, panitia seleksi beasiswa internal ditjen perbendaharaan, s, dipa kantor pusat ditjen perbendaharaan, magister ch', '2013-05-18', '2013-05-23', 'N'),
(38, 1, 'Surat Apresiasi', 1, 1, 1, 1, NULL, '2013-05-22', '2013-05-22', 'N');

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
  `tanggal` date NOT NULL,
  `uraian` text,
  `attachment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LKPP_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lkpp_detail`
--

INSERT INTO `lkpp_detail` (`LKPP_id`, `arsip_id`, `tanggal`, `uraian`, `attachment`) VALUES
(1, 12, '2012-05-05', 'jhbh', '13052013031219FotocopyKTP.pdf'),
(2, 13, '2013-05-06', 'ghgbhgbh', '13052013031509FotocopyKTP.pdf'),
(3, 15, '2012-07-01', 'lkpp lom d audit', '18052013015528LKPP_2012_smt1_unaudited_2.pdf'),
(4, 32, '2012-07-15', '\r\n\r\nNullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.\r\n\r\nMaecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.\r\n', '20052013052040LKPP_2012_smt1_unaudited_2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `pinjam_id` int(11) NOT NULL AUTO_INCREMENT,
  `arsip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `uraian` text NOT NULL,
  PRIMARY KEY (`pinjam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`pinjam_id`, `arsip_id`, `user_id`, `tgl_pinjam`, `tgl_kembali`, `uraian`) VALUES
(1, 12, 27, '2013-05-30', '2013-06-01', 'pinjem sebentar untuk diperbanyak untuk memenuhi permintaa tim pemeriksa kanwil'),
(2, 32, 26, '2013-05-30', NULL, 'pinjem sebentar untuk diperbanyak untuk memenuhi permintaa tim pemeriksa kanwil');

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
(1, '863411W', '2012-01-02', 407360, 120578900, 'PARA PEGAWAI RUTAN KOLAKA ', 'Pembayaran Gaji bulan Januari 2012 untuk 34 pegawai / 85 jiwa', ''),
(2, '863412W', '2012-01-02', 425256, 98369500, 'Para Pegawai ', 'Pembayaran Gaji bulan Januari 2012 untuk 35 pegawai / 94 jiwa ', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `spj_detail`
--

INSERT INTO `spj_detail` (`spj_id`, `arsip_id`, `tanggal`, `uraian`, `attachment`) VALUES
(1, 27, '2013-05-17', 'SPJ Bendum Jum''at 17 Mei 2013', '19052013015356SE-10 MK.01 2013 (Program Pengendalian Gratifikasi).pdf'),
(2, 28, '2013-05-16', 'SPJ Bendum Jum''at 16 Mei 2013', '19052013015356SE-10 MK.01 2013 (Program Pengendalian Gratifikasi).pdf'),
(3, 31, '2013-05-20', '\r\n\r\nNullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.\r\n\r\nMaecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.\r\n', '20052013043913LKPP_2012_smt1_unaudited_2.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suratkeluar_detail`
--

INSERT INTO `suratkeluar_detail` (`sk_id`, `arsip_id`, `no_surat`, `tanggal`, `perihal`, `kepada`, `penerbit`, `uraian`, `attachment`) VALUES
(1, 26, 'Und-02/WPB.12/KP.0130/2012', '2012-03-30', 'Undangan Sosialisasi', 'Para Pimpinan Bank/Pos Persepsi Mitra Kerja  KPPN Jakarta I', 3, 'Sosialisasi Peraturan Dirjen Perbendaharaan Nomor: PER-13/PB/2012 tanggal 14 Maret 2012 tentang Mekanisme Pelaksanaan Layanan Penerimaan Negara oleh Bank/POs Persepsi pada Kantor Cabang  Pembantu/Kantor Layanan/Unit Layanan Lainnya', '18052013234544und_sosialisasi_bendum.pdf'),
(2, 30, 'Und-006/WPB.29/KP.01.10/2013', '2013-04-08', 'Undangan Sosialisasi Perdirjen 55', 'Kepala Kantor/SatuanKerja/KPA', 1, 'Sehubungan dengan terbitnya Per-55/PB/2012', '20052013042032Undangan Sosialisasi Per-55.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `suratmasuk_detail`
--

INSERT INTO `suratmasuk_detail` (`sm_id`, `arsip_id`, `no_surat`, `tanggal`, `perihal`, `pengirim`, `uraian`, `attachment`) VALUES
(4, 34, 'S- 3888 /PB.1/2010', '2010-04-01', 'Pengumuman Hasil Seleksi dan Pemanggilan Wawancara Beasiswa Internal Ditjen Perbendaharaan Tahun 2010', 'Pengembangan Pegawai', 'Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.\r\n\r\nMaecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.\r\n', '20052013040335S- 3888 PB.12010.pdf'),
(7, 37, 'S- 3888 /PB.1/2010', '2010-04-01', 'Pengumuman Hasil Seleksi dan Pemanggilan Wawancara Beasiswa Internal Ditjen Perbendaharaan Tahun 2010', 'Pengembangan Pegawai', 'Berdasarkan hasil seleksi awal Beasiswa Internal Ditjen Perbendaharaan tahun 2010 pada\r\ntanggal 29-30 Mei 2010, dengan ini disampaikan hal-hal sebagai berikut:\r\n1. Para pegawai sebagaimana terdapat pada lampiran surat ini dinyatakan lulus, dan berhak\r\nmengikuti seleksi tahap selanjutnya yaitu seleksi wawancara internal, pendaftaran ke\r\nuniversitas/perguruan tinggi, dan tes masuk pada masing-masing universitas/perguruan tinggi,\r\nsebagaimana jadwal terlampir.\r\n2. Sedangkan bagi para peserta yang tidak tercantum pada lampiran surat ini dinyatakan tidak lulus\r\nsehingga tidak berhak mengikuti seleksi lebih lanjut.\r\n3. Seluruh peserta yang dinyatakan lulus, diwajibkan segera menyampaikan berkas sebagai berikut :\r\n• Foto copy SK kepangkatan terakhir yang dilegalisir pejabat kepegawaian;\r\n• Foto copy Ijazah terakhir yang telah dilegalisir. (Untuk pelamar S2 adalah ijazah S1/D IV,\r\nuntuk pelamar S1 adalah ijazah D III);\r\n• Foto copy transkrip nilai terakhir yang telah dilegalisir;\r\n• Foto copy identitas diri (KTP, SIM, paspor, kartu pelajar berfoto)\r\n• Surat keterangan berbadan sehat dari dokter.\r\n• Khusus untuk pelamar pada Institut Teknologi Bandung, Universitas Gadjah Mada dan\r\nUniversitas Indonesia disediakan formulir yang harus diisi, ditandatangani dan disampaikan\r\nkembali pada panitia seleksi. Formulir untuk ITB berbeda dengan UI dan UGM, serta dapat didownload\r\npada www.perbendaharaan.go.id.\r\n• Pas Foto 4x6 = 4 lembar berwarna dan terbaru.\r\nSeluruh berkas tersebut disampaikan dalam bentuk hard copy kepada Bagian Pengembangan\r\nPegawai melalui sarana pengiriman tercepat, sedangkan soft copy-nya (dalam format pdf)\r\ndikirim melalui alamat e-mail beasiswainternaldjpbn@gmail.com. Berkas dimaksud, baik hard\r\ncopy maupun soft copy harus diterima Bagian Pengembangan Pegawai paling lambat hari Senin\r\ntanggal 14 Juni 2010 pukul 17.00 WIB.\r\n4. Kami mengharapkan bantuan Saudara untuk memperhatikan ketepatan pengiriman, kelengkapan\r\ndan ketelitian pengisian dokumen yang dipersyaratkan, karena apabila dokumen yang dikirimkan\r\ntidak lengkap atau tidak diisi sesuai dengan persyaratan yang berlaku, serta dikirim melewati\r\nbatas waktu, maka tidak akan diproses lebih lanjut.\r\n5. Selain itu diminta bantuan Saudara untuk menugaskan pegawai pada unit kerja masing-masing,\r\nsebagaimana lampiran I surat ini, untuk mengikuti seleksi tahap selanjutnya yaitu wawancara\r\ninternal dan tes pada universitas sebagaimana daftar di bawah ini :\r\nNo. Lokasi Program Studi/Universitas\r\nJadwal Tes\r\nTertulis Pada\r\nUniversitas\r\nJadwal\r\nWawancara\r\nInternal\r\n1. Bandung • Magister Chief Information Officer ITB\r\n• Magister Layanan Teknologi Informasi ITB\r\n2 Juli 2010 3 Juli 2010\r\n2. Jakarta • Magister Ilmu Ekonomi UI\r\n• Magister Ilmu Hukum UI\r\n• Magister Ilmu Akuntansi UI\r\n• Magister Perencanaan Kebijakan Publik UI\r\n• Magister Ilmu Psikologi UI\r\n4 Juli 2010 5 Juli 2010\r\n3. Surabaya • S1 Sistem Teknologi Informasi ITS Tidak ada 14 Juli 2010\r\n4. Yogyakarta • Magister Manajemen UGM 16 – 17 Juli\r\n2010\r\n18 Juli 2010\r\n5. Malang • S1 Sistem Informasi Manajemen UNIBRAW\r\n• S1 Ekonomi Kuantitatif UNIBRAW\r\nTidak ada 22 Juli 2010\r\n(* alamat lokasi dan waktu tes akan diinformasikan kemudian)\r\n6. Biaya perjalanan pulang pergi (PP) dan penginapan seluruh peserta tes yang akan melakukan tes\r\nseleksi tahap berikutnya dibebankan dalam DIPA kantor pusat Ditjen Perbendaharaan.\r\n7. Untuk menjaga konsentrasi dan kesiapan peserta selama mengikuti tes dimaksud, tempat\r\npenginapan para peserta akan diatur serta ditetapkan oleh panitia seleksi beasiswa internal Ditjen\r\nPerbendaharaan tahun 2010.\r\n8. Informasi lebih lanjut dapat diperoleh melalui Bagian Pengembangan Pegawai melalui nomor\r\ntelepon 021-3846322.', '23052013103745S- 3888 PB.12010.pdf'),
(8, 38, 'S-2657/PB/2013', '2013-04-11', 'Apresiasi atas Kinerja Pelaksanaan Reformasi Birokrasi', 'Pak Dirjen', 'Sehubungan penilaian pelaksanaan reformasi birokrasi pada Ditjen Perbendaharaan,\r\ndapat disampaikan hal-hal sebagai berikut:\r\n1. Pada tahun 2012 Itjen Kemenkeu selaku penjamin kualitas (Quality Assurance (QA))\r\npelaksanaan reformasi birokrasi lingkup Kemenkeu melaksanakan penilaian QA reformasi\r\nbirokrasi di seluruh unit eselon I lingkup Kemenkeu dengan berpedoman pada Permenpan\r\ndan RB Nomor 53 tahun 2011, dan hasil penilaiannya menjadi capaian IKU Kemenkeu-One\r\nTahun 2012 pada tiap unit eselon I, yaitu "Indeks Reformasi Birokrasi" dengan target\r\nsebesar 92,00.\r\n2. Hasil akhir penilaian indeks reformasi birokrasi Ditjen Perbendaharaan adalah sebesar\r\n94,07 yang merupakan peringkat ketiga dari seluruh eselon I lingkup Kemenkeu, namun\r\nmerupakan peringkat pertama di antara eselon I Kemenkeu yang memiliki unit vertikal.\r\n3. Selanjutnya, pada tahun 2013 penilaian pelaksanaan reformasi birokrasi dilakukan melalui\r\nPenilaian Mandiri Reformasi Birokrasi (PMPRB) secara online dengan berpedoman pada\r\nPermenpan dan RB Nomor 1 tahun 2012 dan Permenpan dan RB Nomor 31 tahun 2012,\r\nHasil penilaian PMPRB juga menjadi IKU Kemenkeu-One Tahun 2013 pada tiap unit eselon\r\nI, yaitu "Nilai Reformasi Birokrasi" dengan target sebesar 92,00.\r\n4. Nilai PMPRB Ditjen Perbendaharaan yang dilaporkan secara online pada website\r\nKemenpan dan RB adalah sebesar 95,53 yang menempatkan Ditjen Perbendaharaan pada\r\nperingkat kedua lingkup Kemenkeu, namun merupakan peringkat pertama dari seluruh unit\r\neselon I lingkup Kemenkeu yang memiliki unit vertikal.\r\n5. Berdasarkan progress hasil penilaian QA dan PMPRB tersebut di atas, disampaikan\r\npenghargaan dan apresiasi kepada seluruh pejabat/pegawai Ditjen Perbendaharaan at as\r\nkontribusinya di dalam kegiatan penilaian dimaksud.\r\n6. Pencapaian nilai QA dan PMPRB merupakan salah satu indikator keberhasilan\r\npelaksanaan reformasi birokrasi pada Kemenkeu, khususnya Ditjen Perbendaharaan.\r\nMemperhatikan hal tersebut, diminta kepada seluruh pejabat/pegawai lingkup Ditjen\r\nPerbendaharaan untuk mendukung rencana aksi pelaksanaan reformasi birokrasi Ditjen\r\nPerbendaharaan sebagai berikut:\r\na. Meningkatkan dan terus memastikan kualitas pelaksanaan reformasi birokrasi Ditjen\r\nPerbendaharaan sesuai dengan acuan, kebijakan, strategi, dan standar reformasi\r\nbirokrasi nasional yang didukung oleh kepatuhan SOP dan sistem pengendalian internal\r\nyang terintegrasi.\r\nb. Mendukung proses bisnis Ditjen Perbendaharan yang berorientasi pad a kepuasan dan\r\nkepatuhan pengguna layanan sesuai semangat reformasi birokrasi.\r\nDemikian disampaikan, untuk dijadikan perhatia. n.....', '22052013085739s_02657_pb_2013.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `NIP`, `role`, `input_date`, `last_update`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '060113860', 1, '0000-00-00', '2013-05-23'),
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
(25, 'hadjimin6', '060113860', '', 2, '0000-00-00', '0000-00-00'),
(26, 'freaksmj', '4bfae70590c772a8872dce5c7c9595c0', '060113860', 1, '2013-05-21', '2013-05-21'),
(27, 'staff', '4bfae70590c772a8872dce5c7c9595c0', '060113890', 1, '2013-05-23', '2013-06-01');

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
