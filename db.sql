-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8889
-- Generation Time: Jan 09, 2020 at 01:44 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_steam`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst`
--

CREATE TABLE `mst` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accesoris`
--

CREATE TABLE `tbl_accesoris` (
  `id_accesoris` int(11) NOT NULL,
  `nama_accesoris` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_kendaraan`
--

CREATE TABLE `tbl_jenis_kendaraan` (
  `id_jenis_kendaraan` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `harga_pencuci` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_kendaraan`
--

CREATE TABLE `tbl_mst_kendaraan` (
  `id_mst_kendaraan` int(11) NOT NULL,
  `id_mst_jenis_kendaraan` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pencuci`
--

CREATE TABLE `tbl_pencuci` (
  `id_pencuci` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` int(40) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_mst_kendaraan` int(11) NOT NULL,
  `id_pencuci` int(11) NOT NULL,
  `nopol` varchar(20) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `harga_pencuci` int(11) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_detail`
--

CREATE TABLE `tbl_transaksi_detail` (
  `id_transaksi` int(11) NOT NULL,
  `id_accesoris` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accesoris`
--
ALTER TABLE `tbl_accesoris`
  ADD PRIMARY KEY (`id_accesoris`);

--
-- Indexes for table `tbl_jenis_kendaraan`
--
ALTER TABLE `tbl_jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenis_kendaraan`);

--
-- Indexes for table `tbl_mst_kendaraan`
--
ALTER TABLE `tbl_mst_kendaraan`
  ADD PRIMARY KEY (`id_mst_kendaraan`),
  ADD KEY `id_mst_jenis_kendaraan` (`id_mst_jenis_kendaraan`);

--
-- Indexes for table `tbl_pencuci`
--
ALTER TABLE `tbl_pencuci`
  ADD PRIMARY KEY (`id_pencuci`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_mst_kendaraan` (`id_mst_kendaraan`),
  ADD KEY `id_pencuci` (`id_pencuci`);

--
-- Indexes for table `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_accesoris` (`id_accesoris`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accesoris`
--
ALTER TABLE `tbl_accesoris`
  MODIFY `id_accesoris` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jenis_kendaraan`
--
ALTER TABLE `tbl_jenis_kendaraan`
  MODIFY `id_jenis_kendaraan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_mst_kendaraan`
--
ALTER TABLE `tbl_mst_kendaraan`
  MODIFY `id_mst_kendaraan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pencuci`
--
ALTER TABLE `tbl_pencuci`
  MODIFY `id_pencuci` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_mst_kendaraan`
--
ALTER TABLE `tbl_mst_kendaraan`
  ADD CONSTRAINT `tbl_mst_kendaraan_ibfk_1` FOREIGN KEY (`id_mst_jenis_kendaraan`) REFERENCES `tbl_jenis_kendaraan` (`id_jenis_kendaraan`);

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_mst_kendaraan`) REFERENCES `tbl_mst_kendaraan` (`id_mst_kendaraan`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_pencuci`) REFERENCES `tbl_pencuci` (`id_pencuci`);

--
-- Constraints for table `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD CONSTRAINT `tbl_transaksi_detail_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tbl_transaksi_detail_ibfk_2` FOREIGN KEY (`id_accesoris`) REFERENCES `tbl_accesoris` (`id_accesoris`);
