-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2020 pada 15.23
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datamining`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `tahun` varchar(255) NOT NULL,
  `kab_pandeglang` double NOT NULL,
  `kab_lebak` double NOT NULL,
  `kab_tangerang` double NOT NULL,
  `kab_serang` double NOT NULL,
  `kota_tangerang` double NOT NULL,
  `kota_cilegon` double NOT NULL,
  `kota_serang` double NOT NULL,
  `kota_tangerang_selatan` double NOT NULL,
  `result_min` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`tahun`, `kab_pandeglang`, `kab_lebak`, `kab_tangerang`, `kab_serang`, `kota_tangerang`, `kota_cilegon`, `kota_serang`, `kota_tangerang_selatan`, `result_min`) VALUES
('2010', 2261759, 1831286, 3443027, 1574364, 84016, 127712, 460482, 1680, 0),
('2011', 2334827, 2046561, 2995434, 1790629, 136430, 39622, 509463, 173158, 0),
('2012', 2343782, 1942589, 2724983, 1800264, 113458, 42067, 508654, 16381, 0),
('2013', 414124, 0, 0, 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
