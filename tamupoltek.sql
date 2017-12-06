-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Des 2017 pada 08.19
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tamupoltek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(5) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `phone_admin` varchar(15) DEFAULT NULL,
  `jadwal_acara` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `phone_admin`, `jadwal_acara`) VALUES
('A1701', 'Nico', '1234', '089682170532', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` varchar(5) NOT NULL,
  `eventdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `eventdate`) VALUES
('', '0000-00-00'),
('e0001', '2017-11-09'),
('e0003', '2017-12-10'),
('e0005', '2017-11-16'),
('e0009', '2017-11-30'),
('e0011', '2017-11-24'),
('e0012', '2017-11-16'),
('e0013', '2017-11-04'),
('e0014', '2017-11-23'),
('e0015', '2017-11-30'),
('e0016', '2017-01-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id_kritik` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kritiksaran`
--

INSERT INTO `kritiksaran` (`id_kritik`, `nama`, `email`, `message`) VALUES
(1, 'zakia', 'zakia@gmail.com', 'z'),
(2, 'zakia', 'zakia@gmail.com', 'z'),
(3, 'aaa', 'aaa@gmail.com', 'z'),
(4, 'bbb', 'aaa@gmail.com', ''),
(5, 'zakiyatul masruroh', 'zakia@gmail.com', 'aaaaaa\r\n'),
(6, 'jon', 'jon@gmail.com', 'fsdfahfg'),
(7, 'zafdf', 'zakia@gmail.co.id', 'aaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stand`
--

CREATE TABLE `stand` (
  `id_stand` varchar(5) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `id_admin` varchar(5) DEFAULT NULL,
  `nomor_stand` varchar(6) DEFAULT NULL,
  `tipe_stand` varchar(7) DEFAULT NULL,
  `jumlah_stand` varchar(5) DEFAULT NULL,
  `deskripsi_stand` varchar(30) DEFAULT NULL,
  `tgl_pemesanan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stand`
--

INSERT INTO `stand` (`id_stand`, `id_user`, `id_admin`, `nomor_stand`, `tipe_stand`, `jumlah_stand`, `deskripsi_stand`, `tgl_pemesanan`) VALUES
('A01', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('A02', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('A03', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `id_admin` varchar(5) DEFAULT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `email_user` varchar(30) DEFAULT NULL,
  `pass_user` varchar(10) DEFAULT NULL,
  `phone_user` varchar(13) DEFAULT NULL,
  `alamat_user` varchar(60) DEFAULT NULL,
  `nama_usaha` varchar(20) DEFAULT NULL,
  `jenis_usaha` varchar(15) DEFAULT NULL,
  `pekerjaan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_admin`, `nama_user`, `email_user`, `pass_user`, `phone_user`, `alamat_user`, `nama_usaha`, `jenis_usaha`, `pekerjaan`) VALUES
('u0001', NULL, 'Nico Libriawan', 'nicklibra24@gmail.com', '1234', NULL, NULL, NULL, NULL, NULL),
('u0002', NULL, 'Lord Sword', 'nico@gmail.com', '1234', NULL, NULL, NULL, NULL, NULL),
('u0003', NULL, 'zakia', 'zakia@gmail.com', '12345', '081234567890', 'jember', '###########', 'kuliner', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`id_kritik`);

--
-- Indexes for table `stand`
--
ALTER TABLE `stand`
  ADD PRIMARY KEY (`id_stand`),
  ADD KEY `FK_MEMILIH` (`id_user`),
  ADD KEY `FK_MENAMBAHKAN` (`id_admin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_MENDAFTAR` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id_kritik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `stand`
--
ALTER TABLE `stand`
  ADD CONSTRAINT `FK_MEMILIH` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `FK_MENAMBAHKAN` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_MENDAFTAR` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
