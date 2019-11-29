-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Mei 2018 pada 19.57
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imb_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` char(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Vikriawan', 'Vikri70', 'vikri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_diterima`
--

CREATE TABLE IF NOT EXISTS `tb_diterima` (
  `no_form` char(12) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `jenis_izin` varchar(35) NOT NULL,
  `luas_bangunan` char(4) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `masa_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_diterima`
--

INSERT INTO `tb_diterima` (`no_form`, `nama_perusahaan`, `tanggal_daftar`, `alamat`, `jenis_izin`, `luas_bangunan`, `total_biaya`, `masa_berlaku`) VALUES
('710201805002', 'PLN', '2018-05-09', 'Bogor  ', 'Izin Perindustrian', '5000', 120000000, '2019-05-11'),
('844201805001', 'Logic School', '2018-05-09', 'Bogor Cilebut            ', 'Izin Pendidikan', '5000', 120000000, '2019-05-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokumen`
--

CREATE TABLE IF NOT EXISTS `tb_dokumen` (
  `no_form` char(12) NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `id_perusahaan` char(11) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `pbb` varchar(100) NOT NULL,
  `surat_tanah` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`no_form`, `id_pemohon`, `id_perusahaan`, `ktp`, `pbb`, `surat_tanah`, `status`) VALUES
('844201805001', 2, 'PRS001', '5af2728ed3dac.jpg', '5af2728ed3dbb.jpg', '5af2728ed3dc4.jpg', 'Diterima'),
('710201805002', 2, 'PRS002', '5af2897ba275a.jpg', '5af2897ba276b.jpg', '5af2897ba2774.jpg', 'Diterima'),
('138201805002', 3, 'PRS003', '5af5c338cd350.jpg', '5af5c338cd360.jpg', '5af5c338cd369.jpg', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemohon`
--

CREATE TABLE IF NOT EXISTS `tb_pemohon` (
  `no_form` char(12) NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `nama_pemohon` varchar(55) NOT NULL,
  `kontak` char(13) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `jenis_id` varchar(20) NOT NULL,
  `nomer_id` char(18) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `npwp` char(15) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kabupaten` varchar(6) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemohon`
--

INSERT INTO `tb_pemohon` (`no_form`, `id_pemohon`, `nama_pemohon`, `kontak`, `tanggal_daftar`, `jenis_id`, `nomer_id`, `tempat_lahir`, `tgl_lahir`, `npwp`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`) VALUES
('138201805002', 3, 'Reza Ardiansyah', '0855442123131', '2018-05-11', 'KTP', '746424655613517361', 'Bogor', '1997-03-08', '997878731837817', 'Sukahati            ', 'Jawa Barat', 'Bogor', 'Sukahati', 'Pemda'),
('710201805002', 2, 'Fahmi Ardiansyah', '085695954181', '2018-05-09', 'SIM', '99874428', 'Bogor', '2018-05-28', '142342352523525', 'Bogor            ', 'Jawa Barat', 'Bogor', 'Jonggol', 'Sukaresmi Bogor'),
('844201805001', 2, 'Fahmi Ardiansyah', '085695954181', '2018-05-09', 'KTP', '99742283056', 'Bogor', '2018-05-01', '123456789101122', 'Bogor Cilebut            ', 'Jawa Barat', 'Bogor', 'Sukaraja', 'Cilebut Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perusahaan`
--

CREATE TABLE IF NOT EXISTS `tb_perusahaan` (
  `id_perusahaan` char(11) NOT NULL,
  `no_form` char(12) NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `badan_usaha` varchar(30) NOT NULL,
  `bidang_usaha` varchar(30) NOT NULL,
  `jenis_izin` varchar(35) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `npwp` char(15) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kelurahaan` varchar(30) NOT NULL,
  `kontak` char(13) NOT NULL,
  `luas_bangunan` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `no_form`, `id_pemohon`, `tanggal_daftar`, `badan_usaha`, `bidang_usaha`, `jenis_izin`, `nama_perusahaan`, `npwp`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahaan`, `kontak`, `luas_bangunan`) VALUES
('PRS001', '844201805001', 2, '2018-05-09', 'Yayasan', 'Non Industri', 'Izin Pendidikan', 'Logic School', '123456789101122', 'Bogor Cilebut            ', 'Jawa Barat', 'Bogor', 'Sukaraja', 'Cilebut Barat', '085695954181', '5000'),
('PRS002', '710201805002', 2, '2018-05-09', 'Perseroan Terbatas', 'Industri', 'Izin Perindustrian', 'PLN', '142342352523525', 'Bogor  ', 'Jawa Barat', 'Bogor', 'Jonggol', 'Konoha Gakure', '082210736364', '5000'),
('PRS003', '138201805002', 3, '2018-05-11', 'Perusahaan Perorangan', 'Non Industri', 'Izin Perorangan', 'Reza Elektro', '997878731837817', 'Sukahati            ', 'Jawa Barat', 'Bogor', 'Sukahati', 'Pemda', '0855442123131', '9000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_pemohon` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` char(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_pemohon`, `nama`, `username`, `password`) VALUES
(2, 'Fahmi  Ardiansyah', 'Fahmi97', 'purple'),
(3, 'Reza  Ardiansyah', 'Reza97', 'jajal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_diterima`
--
ALTER TABLE `tb_diterima`
  ADD KEY `no_form` (`no_form`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD KEY `id_pemohon` (`id_pemohon`,`id_perusahaan`), ADD KEY `no_form` (`no_form`), ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `tb_pemohon`
--
ALTER TABLE `tb_pemohon`
  ADD PRIMARY KEY (`no_form`), ADD KEY `id_pemohon` (`id_pemohon`), ADD KEY `id_pemohon_2` (`id_pemohon`,`no_form`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`), ADD KEY `no_form` (`no_form`), ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_diterima`
--
ALTER TABLE `tb_diterima`
ADD CONSTRAINT `tb_diterima_ibfk_1` FOREIGN KEY (`no_form`) REFERENCES `tb_pemohon` (`no_form`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
ADD CONSTRAINT `tb_dokumen_ibfk_1` FOREIGN KEY (`no_form`) REFERENCES `tb_pemohon` (`no_form`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_dokumen_ibfk_2` FOREIGN KEY (`id_perusahaan`) REFERENCES `tb_perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_dokumen_ibfk_3` FOREIGN KEY (`id_pemohon`) REFERENCES `tb_user` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pemohon`
--
ALTER TABLE `tb_pemohon`
ADD CONSTRAINT `tb_pemohon_ibfk_1` FOREIGN KEY (`id_pemohon`) REFERENCES `tb_user` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
ADD CONSTRAINT `tb_perusahaan_ibfk_1` FOREIGN KEY (`no_form`) REFERENCES `tb_pemohon` (`no_form`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_perusahaan_ibfk_2` FOREIGN KEY (`id_pemohon`) REFERENCES `tb_user` (`id_pemohon`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
