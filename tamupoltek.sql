-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Des 2017 pada 15.31
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tamupoltek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(5) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `phone_admin` varchar(15) DEFAULT NULL,
  `jadwal_acara` date DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
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

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` varchar(5) NOT NULL,
  `eventdate` date NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `eventdate`) VALUES
('e0001', '2017-11-09'),
('e0003', '2017-12-10'),
('e0005', '2017-11-16'),
('e0009', '2017-11-30'),
('e0011', '2017-11-24'),
('e0012', '2017-11-16'),
('e0013', '2017-11-04'),
('e0014', '2017-11-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` varchar(5) NOT NULL,
  `nama_gambar` varchar(20) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `nama_gambar`, `gambar`) VALUES
('G0001', 'foto1', '01.jpg'),
('G0002', 'foto2', '02.jpg'),
('G0003', 'foto3', '03.jpg'),
('G0004', 'foto4', '04.jpg'),
('G0005', 'foto5', '05.jpg'),
('G0006', 'foto6', '06.jpg'),
('G0007', 'foto7', '07.jpg'),
('G0008', 'foto8', '08.JPG'),
('G0009', 'foto9', '09.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritiksaran`
--

CREATE TABLE IF NOT EXISTS `kritiksaran` (
  `id_kritik` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(300) NOT NULL,
  PRIMARY KEY (`id_kritik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `kritiksaran`
--

INSERT INTO `kritiksaran` (`id_kritik`, `nama`, `email`, `message`) VALUES
(5, 'zakiyatul masruroh', 'zakia@gmail.com', 'aaaaaaaaa... Keren Banyak makanan dan minuman yang membuat diriku ngiler'),
(6, 'Nico Libriawan', 'nicklibra24@gmail.com', 'Acaranya cukup menarik, tetapi kuliner - kulinernya cukup mahal ^_^');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stand`
--

CREATE TABLE IF NOT EXISTS `stand` (
  `id_stand` varchar(5) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `tgl_pemesanan` date DEFAULT NULL,
  PRIMARY KEY (`id_stand`),
  KEY `FK_MEMILIH` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stand`
--

INSERT INTO `stand` (`id_stand`, `id_user`, `tgl_pemesanan`) VALUES
('A01', 'u0004', '2017-12-14'),
('A02', 'u0004', '2017-12-14'),
('A03', 'u0004', '2017-12-14'),
('A04', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(5) NOT NULL,
  `id_admin` varchar(5) DEFAULT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `email_user` varchar(30) DEFAULT NULL,
  `pass_user` varchar(10) DEFAULT NULL,
  `phone_user` varchar(13) DEFAULT NULL,
  `alamat_user` varchar(60) DEFAULT NULL,
  `nama_usaha` varchar(20) DEFAULT NULL,
  `jenis_usaha` varchar(15) DEFAULT NULL,
  `pekerjaan` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `FK_MENDAFTAR` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_admin`, `nama_user`, `email_user`, `pass_user`, `phone_user`, `alamat_user`, `nama_usaha`, `jenis_usaha`, `pekerjaan`) VALUES
('u0003', NULL, 'zakia', 'zakia@gmail.com', '12345', '081234567890', 'jember', '###########', 'kuliner', 'mahasiswa'),
('u0004', NULL, 'Nico Libriawan', 'nicklibra24@gmail.com', '1234', NULL, NULL, NULL, NULL, NULL);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `stand`
--
ALTER TABLE `stand`
  ADD CONSTRAINT `FK_MEMILIH` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_MENDAFTAR` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
