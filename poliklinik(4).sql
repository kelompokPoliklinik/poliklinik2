-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jun 2015 pada 08.17
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_obat`
--

CREATE TABLE IF NOT EXISTS `data_obat` (
  `id_dataobat` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `bulan_tahun` varchar(64) NOT NULL,
  `jml_obat_awal` varchar(64) NOT NULL,
  `strip` int(11) NOT NULL,
  `butir` int(11) NOT NULL,
  `ampul` int(11) NOT NULL,
  `botol` int(11) NOT NULL,
  `jml_pemakaian_butir` int(11) NOT NULL,
  `jml_pemakaian_botol` int(11) NOT NULL,
  `jml_sisa_butir` int(11) NOT NULL,
  `jml_sisa_strip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_obat`
--

INSERT INTO `data_obat` (`id_dataobat`, `nama`, `jenis`, `bulan_tahun`, `jml_obat_awal`, `strip`, `butir`, `ampul`, `botol`, `jml_pemakaian_butir`, `jml_pemakaian_botol`, `jml_sisa_butir`, `jml_sisa_strip`) VALUES
('20150609_232827', 'nomaden', 'kapsul', 'Mei 2015', '20', 0, 0, 0, 10, 1, 0, 0, 0),
('20150610_073230', 'amoxilin', 'kapsul', 'Mei 2015', '15', 0, 0, 0, 2, 0, 0, 0, 0),
('20150612_115128', 'amoxilin2', 'kapsul', 'Mei 2015', '15', 0, 0, 0, 15, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE IF NOT EXISTS `data_pasien` (
  `id_pasien` varchar(25) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nomor_registrasi` int(25) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `fakultas` int(11) NOT NULL,
  `alergi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pasien`
--

INSERT INTO `data_pasien` (`id_pasien`, `nama`, `nomor_registrasi`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `pekerjaan`, `fakultas`, `alergi`) VALUES
('KRY_16', 'sen', 16, 'f', '1980-06-02', 'anduring', 'Laki-Laki', 'karyawan', 1004, '-'),
('KRY_18', 'qwerty mar', 18, 'padang', '2015-06-29', 'pariaman', 'Laki-Laki', 'karyawan', 1002, '-'),
('KRY_21', 'donni', 21, 'padang', '1994-02-02', 'padang', 'Perempuan', 'karyawan', 1002, '-'),
('MHS_0', 'jojo', 0, 'yukgfug', '1990-02-02', 'drtdxt', 'Laki-Laki', 'mahasiswa', 1004, 'amoxilin'),
('MHS_10', 'dodol', 10, '', '0000-00-00', '', 'Laki-Laki', 'mahasiswa', 1001, '-'),
('MHS_11', 'dono', 11, '', '0000-00-00', '', 'Laki-Laki', 'mahasiswa', 1001, '-'),
('MHS_12', 'drwffd743ir', 12, 'egflie7wr', '1990-02-02', 'pariaman', 'Perempuan', 'mahasiswa', 1002, '-'),
('MHS_13', 'rtfegeg45', 13, 'padang', '1990-02-02', 'pariaman', 'Laki-Laki', 'mahasiswa', 1002, '-'),
('MHS_14', 'bestial', 14, 'padang', '0000-00-00', 'Padang', 'Laki-Laki', 'mahasiswa', 1003, '-'),
('MHS_17', '234', 17, '', '2015-06-02', '2', 'Perempuan', 'mahasiswa', 1002, '-'),
('MHS_19', '2s', 19, '23', '2015-06-29', '2rt', 'Laki-Laki', 'mahasiswa', 1003, '-'),
('MHS_2', 'aidi', 2, 'padang', '1990-02-02', 'padang', 'Laki-Laki', 'mahasiswa', 1002, '-'),
('MHS_20', 'yandras', 20, 'padang', '1990-02-02', 'pariaman', 'Laki-Laki', 'mahasiswa', 1001, '-'),
('MHS_22', 'doni aidi yandra 2', 22, 'padang', '1994-02-02', 'Padang', 'Laki-Laki', 'mahasiswa', 1003, 'debu'),
('MHS_3', 'total', 3, '2', '2015-06-22', 't', 'Laki-Laki', 'mahasiswa', 1001, '-'),
('MHS_5', '', 5, '', '0000-00-00', '', 'Laki-Laki', 'mahasiswa', 1001, '-'),
('MHS_6', 'ren', 6, 'yt', '2000-06-20', 'r', 'Laki-Laki', 'mahasiswa', 1002, '-'),
('MHS_7', '', 7, '', '0000-00-00', '', 'Laki-Laki', 'mahasiswa', 1001, '-'),
('MHS_8', 'donis', 8, '', '0000-00-00', '', 'Laki-Laki', 'mahasiswa', 1001, '-'),
('MHS_9', 'bobok', 9, '', '0000-00-00', '', 'Laki-Laki', 'mahasiswa', 1001, '-'),
('UMU_001', 'doni', 1, 'padang', '1994-02-02', 'padang', 'laki-laki', 'Lain-Lain', 1002, 'debu'),
('UMU_15', 'Djoni', 15, 'Padang', '0000-00-00', 'Padang', 'Laki-Laki', 'lain-lain', 1002, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `day_status_transaction`
--

CREATE TABLE IF NOT EXISTS `day_status_transaction` (
  `id_ks_t` varchar(32) NOT NULL,
  `id_pasien` varchar(64) NOT NULL,
  `nomor_registrasi` varchar(64) NOT NULL,
  `anemnesa` varchar(512) NOT NULL,
  `pemeriksaan` varchar(512) NOT NULL,
  `terapi` varchar(512) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `perawat` varchar(64) NOT NULL,
  `id_dokter` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `day_status_transaction`
--

INSERT INTO `day_status_transaction` (`id_ks_t`, `id_pasien`, `nomor_registrasi`, `anemnesa`, `pemeriksaan`, `terapi`, `tanggal`, `perawat`, `id_dokter`) VALUES
('2015062035KRY_217', 'KRY_21', '21', 'ttu', 'Terlala ', 'Terlili', '2015-06-20', 'y', 'Tralala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `nip` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `telpon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`nip`, `nama`, `jenis_kelamin`, `alamat`, `hari`, `telpon`) VALUES
('1234214235235', 'dse', 'Laki-Laki', '2q', '123rqwe', '23141245532'),
('12342142352352', 'dses', 'Laki-Laki', '2q', '123rqwe', '23141245532'),
('12433563754', 'Doni Aidi Yandra', 'Laki-Laki', '', 'selasa', '21543265'),
('124356', 'Anggia Septinurjesya', 'Laki-Laki', '', 'minggu', '093748092659'),
('235234234', 'sfsfer', 'Laki-Laki', 'rrwet', '', '3253246234'),
('23563523434', '324erwer324r', 'Laki-Laki', 'erewr3w4r34rq', 'jumat', '0324938526'),
('2qw3456r7', 'guidufiysdvgiu', 'Laki-Laki', 'grfie4t7i', 'ir4w7 tyg78bw4', '1234567890'),
('52365', '199402022015061001', 'Laki-Laki', 'selasa, rabu', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `fakultas` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`fakultas`, `nama`) VALUES
(1001, '-'),
(1002, 'Fakultas Teknologi Informasi'),
(1003, 'Fakultas Kedokteran'),
(1004, 'Fakultas Teknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ks_transaksi`
--

CREATE TABLE IF NOT EXISTS `ks_transaksi` (
  `id_ks` varchar(32) NOT NULL,
  `id_pasien` varchar(64) NOT NULL,
  `nomor_registrasi` varchar(64) NOT NULL,
  `anemnesa` varchar(512) NOT NULL,
  `pemeriksaan` varchar(512) NOT NULL,
  `terapi` varchar(512) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `perawat` varchar(64) NOT NULL,
  `id_dokter` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ks_transaksi`
--

INSERT INTO `ks_transaksi` (`id_ks`, `id_pasien`, `nomor_registrasi`, `anemnesa`, `pemeriksaan`, `terapi`, `tanggal`, `perawat`, `id_dokter`) VALUES
('2015060846UMU_0011', 'UMU_001', '', '32525, pusing', '7ifd7if', '7d76d6i', '2015-06-07 17:56:46', '', ''),
('2015060955MHS_81', 'MHS_8', '', 'bla bla bla, babubi, pusing', 'no, no, no', 'no, no, no', '2015-06-09 05:05:55', '', ''),
('2015061011DOS_41', 'DOS_4', '', 'bla bla, bla bla, anu, anu, tiga, aaaa', '', '', '2015-06-10 06:32:11', '', ''),
('2015061018DOS_46', 'DOS_4', '4', '435erts', 'etrtery4y', 'y5ryert', '2015-06-10 07:31:18', '', ''),
('2015061029DOS_42', 'DOS_4', '', 'bla', 'pening', 'amoxilin', '2015-06-10 06:34:29', '', ''),
('2015061029DOS_44', 'DOS_4', '', '435r', 'retwet', 'erteyrery', '2015-06-10 07:27:29', '', ''),
('2015061030DOS_47', 'DOS_4', '', '324rteerta', '34t34t4rt', '4ertfw4t', '2015-06-10 07:35:30', '', ''),
('2015061035DOS_45', 'DOS_4', '', 'war4d', '4fw3d', 'scsret', '2015-06-10 07:28:35', '', ''),
('2015061053DOS_43', 'DOS_4', '', '-', 'daegr, rtgetrey', '-', '2015-06-10 07:25:53', '', ''),
('2015061337MHS_221', 'MHS_22', '', 'hu', '', '', '2015-06-13 13:59:37', '', ''),
('2015061350MHS_211', 'MHS_21', '', '', '', '', '2015-06-13 14:00:50', '', ''),
('2015061507MHS_222', 'MHS_22', '', 't', '', '', '2015-06-15 05:03:07', '', ''),
('2015061515UMU_151', 'UMU_15', '', '', '', '', '2015-06-15 05:02:15', '', ''),
('2015061538MHS_212', 'MHS_21', '21', '', '', '', '2015-06-15 05:19:38', '', ''),
('2015061548MHS_223', 'MHS_22', '22', '', '', '', '2015-06-15 05:04:48', '', ''),
('2015061605MHS_21312431232', 'MHS_2131243123', '2131243123', '', '', '', '2015-06-16 13:01:05', '', ''),
('2015061619MHS_21312431231', 'MHS_2131243123', '2131243123', 'hanemnes, kutrus hostage', 'eqweqwr', 'qwrqweqwer', '2015-06-16 12:59:18', '', ''),
('2015061814UMU_0012', 'UMU_001', '1', 'qwrbegi', 'bfierugerg', 'beirugtg', '2015-06-18 16:28:14', '', ''),
('2015061821KRY_212', 'KRY_21', '21', 'ttu', 'Terlala ', 'Terlili', '2015-06-18 16:31:21', '', 'Tralala'),
('2015061823KRY_211', 'KRY_21', '21', 'ttu', 'Terlala ', 'Terlili', '2015-06-18 16:29:23', '', 'Tralala'),
('2015061904MHS_224', 'MHS_22', '22', 'sakit kepala sebelah', 'kurang tidur', 'CTM (9)', '2015-06-18 22:05:04', '', ''),
('2015061905MHS_192', 'MHS_19', '19', '34erw', 'w', 'w', '2015-06-19 02:46:05', 'w', 'w'),
('2015061907UMU_153', 'UMU_15', '15', 'sakit kepala', 'Cepat tidur', 'amoxilin (10), CTM (15)', '2015-06-18 21:18:07', '', ''),
('2015061910MHS_227', 'MHS_22', '22', '234', 'y', 'y', '2015-06-19 02:44:10', 'y', 'y'),
('2015061916UMU_155', 'UMU_15', '15', 'sakit kepala', 'Cepat tidur', 'amoxilin (10), CTM (15)', '2015-06-18 21:23:16', '', ''),
('2015061924MHS_191', 'MHS_19', '19', '234rfwe', 'y', 'y', '2015-06-19 02:41:24', 'y', 'y'),
('2015061944KRY_216', 'KRY_21', '21', 'ttu', 'Terlala ', 'Terlili', '2015-06-19 02:45:44', 'rwe', 'Tralala'),
('2015061952KRY_215', 'KRY_21', '21', 'ttu', 'Terlala ', 'Terlili', '2015-06-19 02:41:52', 'y', 'Tralala'),
('2015061956UMU_152', 'UMU_15', '15', '', '', '', '2015-06-18 21:15:56', '', ''),
('2015061958UMU_154', 'UMU_15', '15', 'sakit kepala', 'Cepat tidur', 'amoxilin (10), CTM (15)', '2015-06-18 21:22:58', '', ''),
('2015062010UMU_156', 'UMU_15', '15', 'qwerrw', 'rewrwer', 'wetqweqwr', '2015-06-20 02:32:10', 'tqweewtwe', 'rqweqwrwet'),
('2015062025MHS_225', 'MHS_22', '22', 't36wgru876tr', 'ytuy', 'ytyut', '2015-06-20 02:34:25', 'tuytu', 'ytuy'),
('2015062035KRY_213', 'KRY_21', '21', 'ttu', 'Terlala ', 'Terlili', '2015-06-20 02:33:35', 'q', 'Tralala'),
('2015062035KRY_217', 'KRY_21', '21', 'ttu', 'Terlala ', 'Terlili', '2015-06-20 02:46:35', 'y', 'Tralala'),
('2015062042MHS_226', 'MHS_22', '22', '234ewr3r', 'w434wr4', '4twrq34', '2015-06-20 02:37:42', 'r3wrt4twr', 'wtw4rw4t'),
('2015062053KRY_214', 'KRY_21', '21', 'ttu', 'Terlala ', 'Terlili', '2015-06-20 02:39:53', '5', 'Tralala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan_tahun` date NOT NULL,
  `jml_obat_awal` varchar(64) NOT NULL,
  `strip` int(11) NOT NULL,
  `butir` int(11) NOT NULL,
  `ampul` int(11) NOT NULL,
  `botol` int(11) NOT NULL,
  `jml_pemakaian_butir` int(11) NOT NULL,
  `jml_pemakaian_botol` int(11) NOT NULL,
  `jml_sisa_butir` int(11) NOT NULL,
  `jml_sisa_strip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama`, `jenis`, `tanggal`, `bulan_tahun`, `jml_obat_awal`, `strip`, `butir`, `ampul`, `botol`, `jml_pemakaian_butir`, `jml_pemakaian_botol`, `jml_sisa_butir`, `jml_sisa_strip`) VALUES
('20150609_144449', 'amoxilin', 'tablet', '2015-06-09', '0000-00-00', '12', 0, 0, 0, 0, 0, 0, 0, 0),
('20150609_225207', 'amoxilin', 'tablet', '2015-06-09', '0000-00-00', '12', 0, 0, 0, 0, 0, 0, 0, 0),
('20150609_230226', '', '', '2015-06-09', '0000-00-00', 'Data Obat Telah Dihapus !', 5, 0, 0, 0, 0, 0, 0, 0),
('20150609_230230', '', '', '2015-06-09', '0000-00-00', 'Data Obat Telah Dihapus !', 0, 0, 0, 0, 0, 0, 0, 0),
('20150609_230430', '', '', '2015-06-09', '0000-00-00', 'Data Obat Telah Dihapus !', 0, 0, 0, 0, 0, 0, 0, 0),
('20150609_230654', '', '', '2015-06-09', '0000-00-00', 'Data Obat Telah Dihapus !', 0, 0, 0, 0, 0, 0, 0, 0),
('20150609_230847', 'amoxilin', 'tablet', '2015-06-09', '0000-00-00', 'Data Obat Telah Dihapus !', 0, 0, 0, 0, 0, 0, 0, 0),
('20150609_230955', 'amoxilin', 'tablet', '2015-06-09', '0000-00-00', 'Data Obat Telah Dihapus !', 0, 0, 0, 0, 0, 0, 0, 0),
('20150609_231359', '', '', '2015-06-09', '0000-00-00', '', 0, 0, 0, 0, 0, 0, 0, 0),
('20150609_232827', 'nomaden', 'kapsul', '2015-06-09', '0000-00-00', '20', 0, 0, 0, 10, 0, 0, 0, 0),
('20150609_232921', 'nomaden', 'kapsul', '2015-06-09', '0000-00-00', '20', 0, 0, 0, 10, 0, 0, 0, 0),
('20150610_073230', 'amoxilin', 'kapsul', '2015-06-10', '0000-00-00', '15', 0, 0, 0, 2, 0, 0, 0, 0),
('20150612_115128', 'amoxilin2', 'kapsul', '2015-06-12', '0000-00-00', '15', 0, 0, 0, 15, 0, 0, 0, 0),
('20150612_161234', 'nomaden', 'kapsul', '2015-06-12', '0000-00-00', '20', 0, 0, 0, 10, 0, 0, 0, 0),
('20150613_190510', 'nomaden', 'kapsul', '2015-06-13', '0000-00-00', '20', 0, 0, 0, 10, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE IF NOT EXISTS `pengunjung` (
  `id_pengunjung` varchar(64) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nim_nip` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `fakultas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `berat_badan_kg` varchar(5) NOT NULL,
  `tensi` int(11) NOT NULL,
  `terapi` varchar(256) NOT NULL,
  `tinggi_badan` varchar(5) NOT NULL,
  `id_perawat` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama`, `nim_nip`, `jenis_kelamin`, `umur`, `alamat`, `fakultas`, `tanggal`, `berat_badan_kg`, `tensi`, `terapi`, `tinggi_badan`, `id_perawat`) VALUES
('001001', 'doni', '1210974625', 'Laki-Laki', 23, 'padang', 1002, '2015-05-02', '64', 0, 'amoxilin', '123', '1001'),
('20150612104957_45467', 'yandra', '45467', 'Perempuan', 21, 'pariaman', 1002, '2015-06-12', '45', 120, 'tidur', '170', ''),
('20150615120552_', '', '', 'Laki-Laki', 0, '', 1001, '2015-06-15', '', 0, '', '', ''),
('20150618233225_12345593607', 'doni', '12345593607', 'Laki-Laki', 21, 'd', 1002, '2015-06-18', '21', 0, '', '', ''),
('20150618233255_sann', 'doo', 'sann', 'Laki-Laki', 0, '', 1001, '2015-06-18', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawat`
--

CREATE TABLE IF NOT EXISTS `perawat` (
  `id_perawat` varchar(64) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_n_pass`
--

CREATE TABLE IF NOT EXISTS `user_n_pass` (
  `id_pass` varchar(16) NOT NULL,
  `label_pass` int(11) NOT NULL,
  `nama_pass` varchar(64) NOT NULL,
  `pass_pass` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_n_pass`
--

INSERT INTO `user_n_pass` (`id_pass`, `label_pass`, `nama_pass`, `pass_pass`) VALUES
('1', 1, 'perawat', 'perawat'),
('2', 2, 'dokter', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
 ADD UNIQUE KEY `id_pasien` (`id_pasien`), ADD UNIQUE KEY `nim_nip` (`nomor_registrasi`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
 ADD UNIQUE KEY `fakultas` (`fakultas`);

--
-- Indexes for table `ks_transaksi`
--
ALTER TABLE `ks_transaksi`
 ADD PRIMARY KEY (`id_ks`), ADD UNIQUE KEY `id_ks_2` (`id_ks`), ADD KEY `id_ks` (`id_ks`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
 ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
 ADD PRIMARY KEY (`id_pengunjung`), ADD UNIQUE KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
 ADD PRIMARY KEY (`id_perawat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
