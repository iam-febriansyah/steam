-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2020 pada 20.02
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_steam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst`
--

CREATE TABLE `mst` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mst`
--

INSERT INTO `mst` (`id`, `nama`, `alamat`, `no_telp`, `gambar`) VALUES
(1, 'Wosh Wosh Car', 'Bekasi', '08128182818', 'logo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_accesoris`
--

CREATE TABLE `tbl_accesoris` (
  `id_accesoris` int(11) NOT NULL,
  `nama_accesoris` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_kendaraan`
--

CREATE TABLE `tbl_jenis_kendaraan` (
  `id_jenis_kendaraan` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `harga_pencuci` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jenis_kendaraan`
--

INSERT INTO `tbl_jenis_kendaraan` (`id_jenis_kendaraan`, `jenis`, `ukuran`, `harga`, `harga_pencuci`, `aktif`) VALUES
(1, 'Mobil', 'Besar', '45000', '15000', 1),
(2, 'Mobil', 'Kecil', '35000', '10000', 1),
(3, 'Motor', 'Besar', '20000', '8000', 1),
(4, 'Motor', 'Kecil', '15000', '5000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mst_kendaraan`
--

CREATE TABLE `tbl_mst_kendaraan` (
  `id_mst_kendaraan` int(11) NOT NULL,
  `id_mst_jenis_kendaraan` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_mst_kendaraan`
--

INSERT INTO `tbl_mst_kendaraan` (`id_mst_kendaraan`, `id_mst_jenis_kendaraan`, `merk`, `nama`, `aktif`) VALUES
(1, 1, 'Toyota', 'Fortuner', 1),
(2, 2, 'Daihatsu', 'Xenia', 1),
(3, 3, 'Honda', 'CBR 250 ', 1),
(4, 4, 'Yamaha', 'Mio Z', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pencuci`
--

CREATE TABLE `tbl_pencuci` (
  `id_pencuci` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` int(40) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_pencuci`
--

INSERT INTO `tbl_pencuci` (`id_pencuci`, `nama`, `no_ktp`, `aktif`) VALUES
(1, 'ANDI', 972385692, 1),
(2, 'ASEP', 972385693, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_mst_kendaraan` int(11) NOT NULL,
  `id_pencuci` int(11) NOT NULL,
  `no_telp` varchar(13) NOT NULL DEFAULT '0',
  `nopol` varchar(20) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `harga_pencuci` int(11) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `date_process` datetime DEFAULT NULL,
  `date_finish` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_mst_kendaraan`, `id_pencuci`, `no_telp`, `nopol`, `total_bayar`, `harga_pencuci`, `created_by`, `created_date`, `date_process`, `date_finish`) VALUES
(1, 1, 1, '08128182012', 'B 1234 C', 45000, 15000, 'Admin', '2020-01-18 13:21:17', '2020-01-19 00:48:33', '2020-01-19 00:48:45'),
(2, 3, 1, '08128182012', 'B 1234 C', 20000, 8000, 'Admin', '2020-01-19 00:52:29', '2020-01-19 01:53:15', '2020-01-19 01:53:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_detail`
--

CREATE TABLE `tbl_transaksi_detail` (
  `id_transaksi` int(11) NOT NULL,
  `id_accesoris` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `otp` int(11) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `nama`, `no_ktp`, `no_telp`, `otp`, `aktif`) VALUES
(1, 'pelanggan', '12345', 'Pelanggan', 'Pelanggan', '', '', 0, 1),
(4, 'admin', '12345', 'Admin', '', '', '', 0, 1),
(5, 'kasir', '12345', 'Kasir', '', '', '', 0, 1),
(7, '08128182012', '08128182012', 'Pelanggan', 'aaaa', '', '081281820121', 0, 1),
(8, '77', '1', 'Pelanggan', '66', '', '08128182012', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_accesoris`
--
ALTER TABLE `tbl_accesoris`
  ADD PRIMARY KEY (`id_accesoris`);

--
-- Indeks untuk tabel `tbl_jenis_kendaraan`
--
ALTER TABLE `tbl_jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenis_kendaraan`);

--
-- Indeks untuk tabel `tbl_mst_kendaraan`
--
ALTER TABLE `tbl_mst_kendaraan`
  ADD PRIMARY KEY (`id_mst_kendaraan`),
  ADD KEY `id_mst_jenis_kendaraan` (`id_mst_jenis_kendaraan`);

--
-- Indeks untuk tabel `tbl_pencuci`
--
ALTER TABLE `tbl_pencuci`
  ADD PRIMARY KEY (`id_pencuci`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_mst_kendaraan` (`id_mst_kendaraan`),
  ADD KEY `id_pencuci` (`id_pencuci`);

--
-- Indeks untuk tabel `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_accesoris` (`id_accesoris`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_accesoris`
--
ALTER TABLE `tbl_accesoris`
  MODIFY `id_accesoris` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_kendaraan`
--
ALTER TABLE `tbl_jenis_kendaraan`
  MODIFY `id_jenis_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_mst_kendaraan`
--
ALTER TABLE `tbl_mst_kendaraan`
  MODIFY `id_mst_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pencuci`
--
ALTER TABLE `tbl_pencuci`
  MODIFY `id_pencuci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_mst_kendaraan`
--
ALTER TABLE `tbl_mst_kendaraan`
  ADD CONSTRAINT `tbl_mst_kendaraan_ibfk_1` FOREIGN KEY (`id_mst_jenis_kendaraan`) REFERENCES `tbl_jenis_kendaraan` (`id_jenis_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_mst_kendaraan`) REFERENCES `tbl_mst_kendaraan` (`id_mst_kendaraan`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_pencuci`) REFERENCES `tbl_pencuci` (`id_pencuci`);

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD CONSTRAINT `tbl_transaksi_detail_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tbl_transaksi_detail_ibfk_2` FOREIGN KEY (`id_accesoris`) REFERENCES `tbl_accesoris` (`id_accesoris`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
