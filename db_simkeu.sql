-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 02:24 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simkeu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(15) NOT NULL,
  `id` int(15) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `id`, `username`, `password`, `level`) VALUES
(1, 1, 'LPA01', 'LPA01', 'Amil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_amil`
--

CREATE TABLE `tb_amil` (
  `id_amil` int(15) NOT NULL,
  `nama_amil` varchar(35) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(15) NOT NULL,
  `id_kategori` int(15) NOT NULL,
  `id_nkategori` int(15) NOT NULL,
  `nama_jenis` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(15) NOT NULL,
  `kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mustahik`
--

CREATE TABLE `tb_mustahik` (
  `id_mustahik` int(15) NOT NULL,
  `nama_mustahik` varchar(35) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `pendapatan` varchar(20) NOT NULL,
  `jml_keluarga` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_muzakki`
--

CREATE TABLE `tb_muzakki` (
  `id_muzakki` int(15) NOT NULL,
  `nama_muzakki` varchar(35) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `npwp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nkategori`
--

CREATE TABLE `tb_nkategori` (
  `id_nkategori` int(15) NOT NULL,
  `id_kategori` int(15) NOT NULL,
  `nama_kategori` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `id_kategori` int(15) NOT NULL,
  `id_nkategori` int(15) NOT NULL,
  `id_jenis` int(15) NOT NULL,
  `donatur` varchar(35) NOT NULL,
  `id_muzakki` int(15) NOT NULL,
  `uraian` varchar(225) NOT NULL,
  `bukti` varchar(225) NOT NULL,
  `kas` int(15) NOT NULL,
  `non_kas` int(15) NOT NULL,
  `satuan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_amil`
--
ALTER TABLE `tb_amil`
  ADD PRIMARY KEY (`id_amil`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_mustahik`
--
ALTER TABLE `tb_mustahik`
  ADD PRIMARY KEY (`id_mustahik`);

--
-- Indexes for table `tb_muzakki`
--
ALTER TABLE `tb_muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `tb_nkategori`
--
ALTER TABLE `tb_nkategori`
  ADD PRIMARY KEY (`id_nkategori`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_amil`
--
ALTER TABLE `tb_amil`
  MODIFY `id_amil` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mustahik`
--
ALTER TABLE `tb_mustahik`
  MODIFY `id_mustahik` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_muzakki`
--
ALTER TABLE `tb_muzakki`
  MODIFY `id_muzakki` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nkategori`
--
ALTER TABLE `tb_nkategori`
  MODIFY `id_nkategori` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(25) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
