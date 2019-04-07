-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Apr 2019 pada 14.23
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `fasilitas` text NOT NULL,
  `lantai` tinyint(4) NOT NULL,
  `duration` tinyint(4) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'kosong',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `name`, `image`, `image2`, `video`, `date`, `time`, `fasilitas`, `lantai`, `duration`, `status`, `user_id`) VALUES
(25, 'update from web', '5ca97b683d1d7.jpg', '5ca97b684f759.jpg', 'https://www.youtube.com/watch?v=k0ellsn6cKk&list=RDk0ellsn6cKk&start_radio=1', NULL, NULL, 'test test', 3, NULL, 'kosong', NULL),
(26, 'a', '5ca868710e22c.jpg', '5ca86871270b8.png', 'https://www.youtube.com/watch?v=k0ellsn6cKk&list=RDk0ellsn6cKk&start_radio=1', NULL, NULL, 'dadwq', 1, NULL, 'kosong', NULL),
(27, 'okky', '5ca875ceb5ce7.jpg', '5ca875cecda2e.png', 'https://www.youtube.com/watch?v=k0ellsn6cKk&list=RDk0ellsn6cKk&start_radio=1', NULL, NULL, 'aku sya', 4, NULL, 'kosong', NULL),
(28, 'dccc', '5ca9e85544716.jpg', '5ca9e855564f9.png', 'https://www.youtube.com/watch?v=k0ellsn6cKk&list=RDk0ellsn6cKk&start_radio=1', NULL, NULL, 'dwq', 2, NULL, 'kosong', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nim`, `password`, `role`) VALUES
(1, 'nyoman', 'asd', 2),
(2, 'dedek', 'asd', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
