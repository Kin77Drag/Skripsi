-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 11:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl20232`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `Golongan` varchar(5) NOT NULL,
  `Pangkat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`Golongan`, `Pangkat`) VALUES
('I A', 'Juru Muda'),
('I B', 'Juru Muda Tingkat 1'),
('I C', 'Juru'),
('I D', 'Juru Tingkat 1'),
('II A', 'Pengatur Muda'),
('II B', 'Pengatur Muda Tingkat 1'),
('II C', 'Pengatur'),
('II D', 'Pengatur Tingkat 1'),
('III A', 'Penata Muda'),
('III B', 'Penata Muda Tingkat 1'),
('III C', 'Penata'),
('III D', 'Penata Tingkat 1'),
('IV A', 'Pembina'),
('IV B', 'Pembina Tingkat 1'),
('IV C', 'Pembina Utama Muda'),
('IV D', 'Pembina Utama Madya'),
('IV E', 'Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `headersurat`
--

CREATE TABLE `headersurat` (
  `IdSurat` int(11) NOT NULL,
  `NomorSurat` varchar(50) NOT NULL,
  `SifatSurat` varchar(30) DEFAULT NULL,
  `Lampiran` varchar(30) DEFAULT NULL,
  `Perihal` text DEFAULT NULL,
  `TglSurat` date NOT NULL DEFAULT current_timestamp(),
  `TujuanSurat` text NOT NULL,
  `TanggalAwal` date NOT NULL DEFAULT current_timestamp(),
  `TanggalAkhir` date NOT NULL DEFAULT current_timestamp(),
  `TempatKegiatan` text NOT NULL,
  `AcaraKegiatan` text NOT NULL,
  `AlatAngkutan` varchar(20) DEFAULT NULL,
  `ValidasiSPPDKabag` tinyint(1) DEFAULT 0,
  `NoSPTAnggotaDewan` varchar(50) DEFAULT NULL,
  `WaktuPengesahanSPTKetua` datetime DEFAULT current_timestamp(),
  `ValidasiSPTKabag` tinyint(1) NOT NULL DEFAULT 0,
  `ValidasiSPTSekwan` tinyint(1) NOT NULL DEFAULT 0,
  `WaktuPengesahanSPTSekwan` datetime DEFAULT current_timestamp(),
  `ValidasiSPTKetua` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headersurat`
--

INSERT INTO `headersurat` (`IdSurat`, `NomorSurat`, `SifatSurat`, `Lampiran`, `Perihal`, `TglSurat`, `TujuanSurat`, `TanggalAwal`, `TanggalAkhir`, `TempatKegiatan`, `AcaraKegiatan`, `AlatAngkutan`, `ValidasiSPPDKabag`, `NoSPTAnggotaDewan`, `WaktuPengesahanSPTKetua`, `ValidasiSPTKabag`, `ValidasiSPTSekwan`, `WaktuPengesahanSPTSekwan`, `ValidasiSPTKetua`) VALUES
(1, '170/10/KOMISI.III/DPRD/2024', 'Penting', 'Satu Lampiran', 'Permohonan Kunjungan Kerja Anggota DPRD Kota Bengkulu', '2024-03-03', 'Sdr. Pimpinan DPRD Kota Bengkulu', '2024-03-05', '2024-03-13', 'Kantor Dinas Lingkungan Hidup Kabupaten Sarolangun  dan DPRD Kabupaten Sarolangun', 'Melksankan Kunjungan Kerja  Anggota DPRD Kota Bengkulu dalam rangka Studi Tiru Terkait Penanganan Pengelolaan Sampah dengan Konsep 3R (Reuse, Refuce, dan Recycle) ke Dinas Lingkuan Hidup dan ke DPRD Kabupaten Sarolangun', 'Mobil', 0, NULL, NULL, 0, 0, '2024-03-05 17:05:38', 1),
(10, '171/10/KOMISI.III/DPRD/2024', 'Penting', 'Satu Lampiran', 'Permohonan Kunjungan Kerja Anggota DPRD Kota Bengkulu', '2024-03-03', 'Sdr. Pimpinan DPRD Kota Bengkulu', '2024-03-05', '2024-03-13', 'Kantor Dinas Lingkungan Hidup Kabupaten Sarolangun  dan DPRD Kabupaten Sarolangun', 'Melaksanakan Kunjungan Kerja  Anggota DPRD Kota Bengkulu dalam rangka Studi Tiru Terkait Penanganan Pengelolaan Sampah dengan Konsep 3R (Reuse, Refuce, dan Recycle) ke Dinas Lingkuan Hidup dan ke DPRD Kabupaten Sarolangun', 'Mobil', 0, NULL, NULL, 0, 0, '2024-03-05 17:05:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keperluan`
--

CREATE TABLE `keperluan` (
  `KodeKeperluan` int(11) NOT NULL,
  `Keperluan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `idlevel` int(2) NOT NULL,
  `namalevel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`idlevel`, `namalevel`) VALUES
(1, 'Ketua Dewan'),
(2, 'Kabag'),
(3, 'Komisi'),
(4, 'Anggota Dewan'),
(5, 'Pendamping'),
(6, 'Operator / Admin'),
(7, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_login` int(30) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `no_pegawai` varchar(20) NOT NULL,
  `idlevel` int(2) DEFAULT NULL,
  `idunit` int(2) DEFAULT NULL,
  `Golongan` varchar(5) DEFAULT NULL,
  `Status` enum('Aktif','TidakAktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_login`, `nik`, `username`, `nama_lengkap`, `password`, `no_pegawai`, `idlevel`, `idunit`, `Golongan`, `Status`) VALUES
(8, '177106101219690001', 'harrywitriyono', 'Harry Witriyono', 'harrywitriyono', '1311094102', 7, 7, 'III B', 'Aktif'),
(9, '1', 'Admin', 'Admin', 'Admin', '1', 7, 0, '-', 'Aktif'),
(10, 'Operator', 'Operator', 'Operator', 'Operator', '2', 6, 7, 'II C', 'Aktif'),
(11, '1', 'Nuzuludin', 'Nuzuludin, SE.', 'Nuzuludin', '1', 4, 3, '-', 'Aktif'),
(12, '2', 'Disti', 'Disti Putriani, SE., MM.', 'Disti', '1234567890', 5, 6, 'III B', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pesertakegiatan`
--

CREATE TABLE `pesertakegiatan` (
  `idPeserta` int(20) NOT NULL,
  `idSurat` int(11) NOT NULL,
  `id_login` int(30) NOT NULL,
  `Setuju` enum('Setuju','Tidak Setuju') DEFAULT 'Tidak Setuju',
  `WaktuSetuju` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesertakegiatan`
--

INSERT INTO `pesertakegiatan` (`idPeserta`, `idSurat`, `id_login`, `Setuju`, `WaktuSetuju`) VALUES
(2, 1, 11, 'Setuju', '2024-03-04 21:59:16'),
(8, 10, 11, 'Tidak Setuju', '2024-03-04 21:59:03'),
(9, 1, 8, 'Tidak Setuju', '2024-03-04 22:22:38'),
(11, 1, 12, 'Tidak Setuju', '2024-03-05 05:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `idunit` int(2) NOT NULL,
  `namaunit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`idunit`, `namaunit`) VALUES
(1, 'Ketua'),
(2, 'Sekwan'),
(3, 'Komisi 1'),
(4, 'Komisi 2'),
(5, 'Komisi 3'),
(6, 'Umum dan Keuangan'),
(7, 'Fasilitasi Penganggaran dan Pengawasan'),
(8, 'Perlengkapan'),
(9, 'Hukum, Persidangan dan Perundang-undangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`Golongan`);

--
-- Indexes for table `headersurat`
--
ALTER TABLE `headersurat`
  ADD PRIMARY KEY (`IdSurat`),
  ADD KEY `NomorSurat` (`NomorSurat`);

--
-- Indexes for table `keperluan`
--
ALTER TABLE `keperluan`
  ADD PRIMARY KEY (`KodeKeperluan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`idlevel`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `pesertakegiatan`
--
ALTER TABLE `pesertakegiatan`
  ADD PRIMARY KEY (`idPeserta`),
  ADD KEY `idSurat` (`idSurat`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`idunit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `headersurat`
--
ALTER TABLE `headersurat`
  MODIFY `IdSurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keperluan`
--
ALTER TABLE `keperluan`
  MODIFY `KodeKeperluan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `idlevel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_login` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesertakegiatan`
--
ALTER TABLE `pesertakegiatan`
  MODIFY `idPeserta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `idunit` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
