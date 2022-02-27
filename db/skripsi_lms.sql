-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 06:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `kode_guru` int(10) NOT NULL,
  `nuptk` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pendidikan` varchar(128) NOT NULL,
  `alamat` varchar(258) NOT NULL,
  `kontak` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tmt` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `kode_guru`, `nuptk`, `nip`, `nama_guru`, `gender`, `jabatan`, `pendidikan`, `alamat`, `kontak`, `email`, `tmt`, `is_active`) VALUES
(36, 0, '54321', '', 'ardi', 'Laki-laki', '', '', '', '', '', '0000-00-00', 0),
(37, 0, '12345', '', 'Rizal adi cita', 'Laki-laki', '', '', '', '', '', '0000-00-00', 0),
(38, 0, '123456', '', 'Dea sukmadinata', 'Perempuan', '', '', '', '', '', '0000-00-00', 0),
(39, 0, '66114', '', 'Sekhu', 'Laki-laki', '', '', '', '', '', '0000-00-00', 0),
(40, 0, '44788', '', 'Ade', 'Laki-laki', '', '', '', '', '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(128) NOT NULL,
  `hari` varchar(128) NOT NULL,
  `nuptk_guru` int(128) NOT NULL,
  `id_mapel` int(128) NOT NULL,
  `jam_masuk` varchar(128) NOT NULL,
  `jam_keluar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `hari`, `nuptk_guru`, `id_mapel`, `jam_masuk`, `jam_keluar`) VALUES
(25, 21, 'Senin', 54321, 5, '1', '1'),
(26, 21, 'Senin', 12345, 7, '1', '3'),
(27, 18, 'Senin', 54321, 7, '1', '8'),
(28, 21, 'Selasa', 12345, 7, '1', '7'),
(29, 21, 'Rabu', 54321, 7, '6', '7'),
(30, 21, 'Senin', 54321, 8, '6', '8'),
(31, 20, 'Senin', 54321, 7, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jam_mengajar`
--

CREATE TABLE `jam_mengajar` (
  `id_jam` int(11) NOT NULL,
  `jam_ke` varchar(150) NOT NULL,
  `pukul` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam_mengajar`
--

INSERT INTO `jam_mengajar` (`id_jam`, `jam_ke`, `pukul`) VALUES
(1, '1', '07.00 - 07.45'),
(2, '2', '07.45 - 08.30'),
(3, '3', '08.30 - 09.15'),
(4, '4', '09.15 - 10.00'),
(5, '5', '10.15 - 11.00'),
(6, '6', '11.00 - 11.45'),
(7, '7', '11.45 - 12.30'),
(8, '8', '12.45 - 13.30'),
(9, '9', '13.30 - 14.15');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas_prodi` varchar(100) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL,
  `wali_kelas` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas_prodi`, `tingkat`, `nama_kelas`, `wali_kelas`) VALUES
(18, 'TKR', 'X', 'B', 54321),
(20, 'TKJ', 'XII', 'C', 12345),
(21, 'TKJ', 'X', 'A', 123456),
(24, 'TKJ', 'X', 'B', 66114),
(25, 'TKR', 'X', 'A', 44788);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL,
  `status_mapel` varchar(100) NOT NULL,
  `jp_mapel` varchar(100) NOT NULL,
  `guru_mapel` varchar(100) NOT NULL,
  `kelas_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `status_mapel`, `jp_mapel`, `guru_mapel`, `kelas_mapel`) VALUES
(13, 'Dasar Desain Grafis', 'Produktif', '9', '54321', '21'),
(14, 'Administrasi Sistem Jaringan', 'Produktif', '9', '54321', '21');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `materi_guru` varchar(100) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `isi_materi` longtext NOT NULL,
  `upload_file` varchar(300) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_mapel`, `materi_guru`, `kelas_id`, `judul_materi`, `isi_materi`, `upload_file`, `date_create`) VALUES
(18, 13, '54321', 18, 'Pengenalan Desain Grafis', '<p>asdfasdfa</p>\r\n', '', '2022-02-12 10:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `materi_comment`
--

CREATE TABLE `materi_comment` (
  `id_comment` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `who_comment` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_comment`
--

INSERT INTO `materi_comment` (`id_comment`, `id_kelas`, `id_materi`, `who_comment`, `comment`, `date_create`) VALUES
(1, 18, 11, 11111, 'hai', '2022-02-01 10:45:16'),
(2, 18, 11, 11111, 'saya mau tanya', '2022-02-01 10:45:16'),
(3, 18, 11, 54321, 'silahkan mas', '2022-02-01 12:17:11'),
(4, 18, 11, 54321, 'ada yang bisa dibantu?', '2022-02-01 12:20:18'),
(5, 18, 11, 54321, 'Silahkan ditanyakan', '2022-02-01 12:21:43'),
(6, 18, 11, 54321, 'nanti kita bantu jawab', '2022-02-01 12:22:30'),
(7, 18, 11, 54321, 'Sudahkah dikerjakan?', '2022-02-01 12:23:19'),
(8, 18, 11, 11111, 'yang itu gimana ya pak', '2022-02-01 12:48:42'),
(9, 18, 11, 54321, 'gimana', '2022-02-08 14:07:39'),
(10, 18, 11, 11111, 'asdfa', '2022-02-08 14:22:32'),
(11, 18, 11, 54321, 'asdfa', '2022-02-08 14:39:07'),
(12, 18, 17, 54321, 'asas', '2022-02-08 15:14:23'),
(13, 18, 17, 11111, 'assadasds', '2022-02-08 15:15:38'),
(14, 18, 18, 11111, 'pa saya mau tanya', '2022-02-27 04:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `kaprodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `kaprodi`) VALUES
(1, 'TKJ', 'M. Alvin, S.Kom'),
(2, 'TKR', 'M. Budiono'),
(3, 'APM', 'Anisa,SE');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(128) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `alamat` varchar(258) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `kontak` varchar(128) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nik`, `nama_siswa`, `alamat`, `gender`, `kontak`, `prodi`, `kelas`, `nama_ibu`, `is_active`) VALUES
(58, '11111', 2147483647, 'I Gede Ari Astina', 'Balapulang Wetan Rt 09 Rw 08 Kec. Balapulang Kab. Tegal', 'Laki-Laki', '08925225522', 'TKJ', '21', 'wr', 0),
(60, '22222', 2147483647, 'Ari Astina', 'Balapulang wetan', 'Laki-Laki', '1123334', 'TKJ', '18', 'NUR SOFAH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `isi_tugas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `foto`, `username`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(9, 'Admin SMK Al Amiriyah', 'default.png', 'admin', '$2y$10$ZVvSUR4iK8auxHsLl7SvLe4IL8TxVyQTEY3r3offy.McJ1IyaRVWq', 1, 1, 1615269972),
(76, 'I Gede Ari Astina', 'DSC_03773.png', '11111', '$2y$10$2B1TSUfJBpRYTT/Y/j.cqeoOGcOZ7L0gCzD.WhMtA8nGOwoKbTveO', 3, 1, 0),
(80, 'ardi', 'default.png', '54321', '$2y$10$MiXdZvn9PVr/sBRuQQ51qeDXwF0E2H41wByKvOk7I1/.qb3JFU7O.', 2, 1, 0),
(82, 'Ari Astina', 'default.png', '22222', '$2y$10$GRrgeU.jXVmIGepT0Qn01.xiX4bhQRc4WBfxsfYLTi5xuObc9wH.O', 3, 1, 0),
(83, 'Rizal adi cita', 'default.png', '12345', '$2y$10$DFHaHK.h/aX2cNcrs7XIWehCJ8ppV.KPpkfvo/lOMeBhQidww.urS', 2, 1, 0),
(84, 'Dea sukmadinata', 'default.png', '123456', '$2y$10$3X3/xsjMkKB4l1wGRl0HheQpXb30.b.0NzhEB8vIvAewN3pFsSY0u', 2, 1, 0),
(85, 'Sekhu', 'default.png', '66114', '$2y$10$QTXhesAcuppx2QA8MW2E0ut3FFDqxEHDEB9q.rSO9HBm3wR.jZhHS', 2, 1, 0),
(86, 'Ade', 'default.png', '44788', '$2y$10$0aoU.sY9It5wTYr3zL5cdeRv4uZi2b07tYUXyDJhBc1dseAfQ.raq', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(128) NOT NULL,
  `menu_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Operator'),
(2, 'Guru'),
(3, 'Operator'),
(4, 'Guru'),
(5, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jam_mengajar`
--
ALTER TABLE `jam_mengajar`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `materi_comment`
--
ALTER TABLE `materi_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jam_mengajar`
--
ALTER TABLE `jam_mengajar`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `materi_comment`
--
ALTER TABLE `materi_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
