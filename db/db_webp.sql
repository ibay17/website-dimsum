-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 05:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webp`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 1, 'adib', 'BCA', 200000, '2022-05-16', '20220516075232'),
(2, 2, 'adib', 'Bri', 100000, '2022-05-16', '20220516114840'),
(3, 11, 'haha', 'bni', 64000, '2022-05-22', '20220522095904'),
(4, 3, 'fadiya', 'BCA', 1003000, '2022-05-25', '20220525102721'),
(5, 4, 'a', 'fsasadsad', 200000, '2022-06-17', '20220617153315'),
(6, 22, 'a', 'BCA', 200000, '2022-06-20', '20220620154420'),
(7, 23, 'adib sodoq', 'BCA', 64000, '2024-01-13', '20240113182911'),
(8, 25, 'adib sodoq', 'BCA', 11200, '2024-01-15', '20240115174741');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `deskripsi_pembelian` varchar(255) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `no_pengiriman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `tanggal_pembelian`, `deskripsi_pembelian`, `total_pembelian`, `status_pembelian`, `no_pengiriman`) VALUES
(1, 1, '2022-04-30', 'ga pake sayur', 200000, 'Selesai', 'ADB001'),
(2, 3, '2022-05-01', '', 100000, 'Selesai', ''),
(3, 1, '2022-05-12', '', 100300, 'Lunas', '0'),
(4, 1, '2022-05-12', '', 100300, 'Lunas', '0'),
(5, 1, '2022-05-12', '', 100300, 'pending', '0'),
(6, 1, '2022-05-12', '', 78300, 'pending', '0'),
(7, 1, '2022-05-12', '', 78300, 'pending', '0'),
(8, 1, '2022-05-16', '', 64000, 'pending', '0'),
(9, 1, '2022-05-16', '', 119000, 'pending', '0'),
(10, 1, '2022-05-16', 'gak pedes', 64000, 'pending', '0'),
(11, 1, '2022-05-22', 'ga pake daging', 64000, 'Selesai', ''),
(12, 1, '2022-05-25', 'ga pake daging', 64000, 'pending', ''),
(13, 1, '2022-05-25', '', 64000, 'pending', ''),
(14, 1, '2022-05-28', '', 97000, 'pending', ''),
(15, 1, '2022-05-28', '', 174000, 'pending', ''),
(16, 1, '2022-06-17', '', 64000, 'pending', ''),
(17, 1, '2022-06-17', '', 78300, 'pending', ''),
(18, 1, '2022-06-20', '', 64000, 'pending', ''),
(19, 1, '2022-06-20', '', 64000, 'pending', ''),
(20, 1, '2022-06-20', '', 64000, 'pending', ''),
(21, 1, '2022-06-20', '', 64000, 'pending', ''),
(22, 1, '2022-06-20', '', 64000, 'Lunas', ''),
(23, 9, '2024-01-13', '', 64000, 'Selesai', ''),
(24, 9, '2024-01-13', '', 64000, 'pending', ''),
(25, 9, '2024-01-15', '', 11200, 'Lunas', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `deskripsi_pembelian` varchar(255) NOT NULL,
  `total_harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `deskripsi_pembelian`, `total_harga`) VALUES
(1, 1, 1, 1, '', 100000),
(2, 1, 2, 2, '', 0),
(3, 4, 4, 1, '', 0),
(4, 4, 2, 1, '', 0),
(5, 5, 4, 1, '', 0),
(6, 5, 2, 1, '', 0),
(7, 6, 6, 1, '', 0),
(8, 7, 6, 1, '', 78300),
(9, 8, 1, 1, '', 64000),
(10, 9, 1, 2, '', 119000),
(11, 10, 1, 1, 'ga pedes', 64000),
(12, 11, 5, 1, 'ga pake daging', 64000),
(13, 12, 1, 1, 'ga pake daging', 64000),
(14, 13, 1, 1, '', 64000),
(15, 14, 27, 1, '', 97000),
(16, 15, 1, 1, '', 174000),
(17, 15, 3, 2, '', 174000),
(18, 16, 5, 1, '', 64000),
(19, 17, 26, 1, '', 78300),
(20, 18, 1, 1, '', 64000),
(21, 19, 4, 1, '', 64000),
(22, 20, 1, 1, '', 64000),
(23, 21, 1, 1, '', 64000),
(24, 22, 3, 1, '', 64000),
(25, 23, 3, 1, '', 64000),
(26, 24, 1, 1, '', 64000),
(27, 25, 32, 1, '', 11200);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `pesan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `stok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga_produk`, `foto_produk`, `deskripsi`, `stok`) VALUES
(32, 'Dimsum Ayam', 'Pizza', 2000, 'dimsum ayam.png', '', '99');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) NOT NULL,
  `roleName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `roleName`) VALUES
(1, 'Admin'),
(2, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `No_telp` int(13) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `roleId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`id_user`, `nama`, `email`, `password`, `No_telp`, `Alamat`, `roleId`) VALUES
(8, 'admin', 'admin@gmail.com', '$2y$10$vxjC1tt0fWDJA0dcOREynO/TFmVeUnEccv8Aq7ly9IEj3Xr6fmrvO', 2147483647, 'Jalan Mawar No. 19', 1),
(9, 'adib sodoq', 'adibn22s@gmail.com', '$2y$10$bZ/s5eKkRCqq680cji0y7.mYwBjDgzObNN/RV1ipR5oPhLYuQNnBa', 2147483647, 'mawar', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user2`
--
ALTER TABLE `user2`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
