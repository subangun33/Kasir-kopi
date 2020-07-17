-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2020 pada 12.04
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopishop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(15) NOT NULL,
  `kode_detail` varchar(15) NOT NULL,
  `refpesanan` varchar(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `subtotal` int(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail`, `kode_detail`, `refpesanan`, `jumlah`, `subtotal`, `status`, `waktu`) VALUES
(23, '2020-07-120001', '002', 2, 6000, 'Pesanan Terkonfirmasi', '2020-07-12 15:31:01'),
(24, '2020-07-120001', '003', 1, 10000, 'Pesanan Terkonfirmasi', '2020-07-12 15:33:00'),
(26, '2020-07-120002', '003', 8, 80000, 'Pesanan Terkonfirmasi', '2020-07-12 15:43:01'),
(27, '2020-07-120002', '002', 4, 12000, 'Pesanan Terkonfirmasi', '2020-07-12 15:57:04'),
(28, '2020-07-130001', '002', 1, 3000, 'Pesanan Terkonfirmasi', '2020-07-13 18:16:11'),
(29, '2020-07-130001', '003', 4, 40000, 'Pesanan Terkonfirmasi', '2020-07-13 18:16:57'),
(30, '2020-07-140001', '002', 4, 12000, 'Pesanan Terkonfirmasi', '2020-07-14 14:08:36'),
(31, '2020-07-140002', '003', 0, 0, 'Pesanan Terkonfirmasi', '2020-07-14 14:09:28'),
(32, '2020-07-140001', '003', 0, 0, 'Pesanan Terkonfirmasi', '2020-07-14 14:11:50'),
(33, '2020-07-140003', '002', 20, 60000, 'Pesanan Terkonfirmasi', '2020-07-14 14:13:27'),
(34, '2020-07-140003', '003', 20, 200000, 'Pesanan Terkonfirmasi', '2020-07-14 15:41:41'),
(35, '2020-07-160001', '002', 5, 15000, 'Pesanan Terkonfirmasi', '2020-07-16 13:53:14'),
(36, '2020-07-160002', '002', 2, 6000, 'Pesanan Terkonfirmasi', '2020-07-16 14:44:20'),
(37, '2020-07-160001', '003', 6, 60000, 'Pesanan Terkonfirmasi', '2020-07-16 15:28:14'),
(38, '2020-07-160003', '002', 11, 33000, 'Pesanan Terkonfirmasi', '2020-07-16 18:44:22'),
(39, '2020-07-170001', '002', 6, 18000, 'Pesanan Terkonfirmasi', '2020-07-17 15:15:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(15) NOT NULL,
  `kode_meja` varchar(5) NOT NULL,
  `no_meja` int(10) NOT NULL,
  `qr_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `kode_meja`, `no_meja`, `qr_code`) VALUES
(1, '001', 1, '001.png'),
(2, '002', 2, '002.png'),
(3, '003', 3, '003.png'),
(4, '006', 6, '006.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL,
  `kode_menu` varchar(30) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga_menu` int(20) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `gambar` text NOT NULL,
  `aktif` enum('T','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `kode_menu`, `nama_menu`, `harga_menu`, `deskripsi`, `gambar`, `aktif`) VALUES
(1, '002', 'Es teh', 3000, 'kopi hitam manis tanpa ampas', '1593666717684.jpg', 'T'),
(8, '003', 'kopi hangat', 10000, 'hangat banget', '1594456132035.png', 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `total` int(30) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `refdetail` varchar(20) NOT NULL,
  `meja` varchar(5) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total`, `nama_pemesan`, `refdetail`, `meja`, `no_hp`, `waktu_pemesanan`, `status`) VALUES
(3, 3000, 'es', '2020-07-140003', '002', '09830928', '2020-07-14 15:22:23', 'Selesai'),
(10, 15000, 'Bangun', '2020-07-160001', '002', '09830928', '2020-07-16 14:00:30', 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `id_detail` (`id_detail`),
  ADD KEY `kode_detail` (`kode_detail`),
  ADD KEY `refpesanan` (`refpesanan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`kode_meja`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kode_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `refdetail` (`refdetail`),
  ADD KEY `meja` (`meja`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`meja`) REFERENCES `meja` (`kode_meja`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`refdetail`) REFERENCES `detail` (`kode_detail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
