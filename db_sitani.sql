-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2022 at 03:10 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sitani`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(10) NOT NULL,
  `id_kelompok_tani` int(10) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `jam_agenda` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `jabatan` varchar(100) NOT NULL,
  `id_kelompok_tani` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id_bantuan` int(10) NOT NULL,
  `nama_bantuan` varchar(100) NOT NULL,
  `ket_bantuan` varchar(100) NOT NULL,
  `tgl_bantuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `id_daerah` int(10) NOT NULL,
  `nama_daerah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_bantuan`
--

CREATE TABLE `detail_bantuan` (
  `id_detail_bantuan` int(10) NOT NULL,
  `id_bantuan` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_detail` int(10) NOT NULL,
  `id_pengguna` int(10) DEFAULT NULL,
  `NIK` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` varchar(100) DEFAULT NULL,
  `id_jk` int(10) DEFAULT NULL,
  `alamat` text,
  `rt_rw` varchar(100) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_detail`, `id_pengguna`, `NIK`, `tempat_lahir`, `tanggal_lahir`, `id_jk`, `alamat`, `rt_rw`, `desa`, `kecamatan`, `kota`, `provinsi`, `telepon`) VALUES
(13, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tgl_posting` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` int(10) NOT NULL,
  `nama_jk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `nama_jk`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_tani`
--

CREATE TABLE `kelompok_tani` (
  `id_kelompok_tani` int(10) NOT NULL,
  `id_daerah` int(10) DEFAULT NULL,
  `nama_kelompok_tani` varchar(100) NOT NULL,
  `luas_lahan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_forum`
--

CREATE TABLE `komentar_forum` (
  `id_komentar` int(10) NOT NULL,
  `id_forum` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `komentar` text NOT NULL,
  `tgl_komentar` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(10) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama_level`) VALUES
(1, 'admin desa'),
(2, 'anggota');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `username`, `password`, `id_level`) VALUES
(1, 'Fiersa Besari', 'admin', 'admindesa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `relation_kelompok_3` (`id_kelompok_tani`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `id_pengguna_2` (`id_user`),
  ADD KEY `id_pengguna` (`id_user`),
  ADD KEY `id_kelompok_tani` (`id_kelompok_tani`);

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `detail_bantuan`
--
ALTER TABLE `detail_bantuan`
  ADD PRIMARY KEY (`id_detail_bantuan`),
  ADD KEY `id_bantuan` (`id_bantuan`),
  ADD KEY `id_pengguna` (`id_user`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `relation_jk` (`id_jk`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `id_pengguna` (`id_user`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `kelompok_tani`
--
ALTER TABLE `kelompok_tani`
  ADD PRIMARY KEY (`id_kelompok_tani`),
  ADD KEY `id_daerah` (`id_daerah`);

--
-- Indexes for table `komentar_forum`
--
ALTER TABLE `komentar_forum`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_forum` (`id_forum`),
  ADD KEY `id_pengguna` (`id_user`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id_bantuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daerah`
--
ALTER TABLE `daerah`
  MODIFY `id_daerah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_bantuan`
--
ALTER TABLE `detail_bantuan`
  MODIFY `id_detail_bantuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelompok_tani`
--
ALTER TABLE `kelompok_tani`
  MODIFY `id_kelompok_tani` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar_forum`
--
ALTER TABLE `komentar_forum`
  MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `relation_kelompok_3` FOREIGN KEY (`id_kelompok_tani`) REFERENCES `kelompok_tani` (`id_kelompok_tani`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `relation_kelompok` FOREIGN KEY (`id_kelompok_tani`) REFERENCES `kelompok_tani` (`id_kelompok_tani`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_pengguna` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_bantuan`
--
ALTER TABLE `detail_bantuan`
  ADD CONSTRAINT `relation_bantuan` FOREIGN KEY (`id_bantuan`) REFERENCES `bantuan` (`id_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_pengguna_5` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `relation_pengguna_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `relation_pengguna_3` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelompok_tani`
--
ALTER TABLE `kelompok_tani`
  ADD CONSTRAINT `relation_daerah` FOREIGN KEY (`id_daerah`) REFERENCES `daerah` (`id_daerah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_forum`
--
ALTER TABLE `komentar_forum`
  ADD CONSTRAINT `relation_forum` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_pengguna_4` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `relation_level` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
