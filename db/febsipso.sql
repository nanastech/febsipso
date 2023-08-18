-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2023 at 01:52 AM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `febsipso`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_sidang`
--

CREATE TABLE `daftar_sidang` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `jenjang_pendidikan` varchar(10) NOT NULL,
  `program_studi` varchar(20) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `ortu` varchar(50) NOT NULL,
  `alamatrmh` varchar(250) NOT NULL,
  `teleponrmh` varchar(20) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `kantor` varchar(100) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamatktr` varchar(250) DEFAULT NULL,
  `teleponktr` varchar(20) DEFAULT NULL,
  `judul_skripsi` text NOT NULL,
  `dospem` varchar(10) NOT NULL,
  `tglpo` date NOT NULL,
  `bimbingan` int NOT NULL,
  `pers` int DEFAULT NULL,
  `ipk` float NOT NULL,
  `slipdut` varchar(200) NOT NULL,
  `slipbs` varchar(200) NOT NULL,
  `slipus` varchar(200) NOT NULL,
  `slipps` varchar(200) NOT NULL,
  `ktp` varchar(200) NOT NULL,
  `kk` varchar(200) NOT NULL,
  `lu_slipdut` datetime DEFAULT NULL,
  `lu_slipbs` datetime DEFAULT NULL,
  `lu_slipus` datetime DEFAULT NULL,
  `lu_slipps` datetime DEFAULT NULL,
  `lu_ktp` datetime DEFAULT NULL,
  `lu_kk` datetime DEFAULT NULL,
  `tgl_daftar` datetime NOT NULL,
  `accstaff` varchar(10) DEFAULT NULL,
  `tglaccstaff` datetime DEFAULT NULL,
  `accdospem` varchar(10) DEFAULT NULL,
  `tglaccdospem` datetime DEFAULT NULL,
  `acckaprodi` varchar(10) DEFAULT NULL,
  `tglacckaprodi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int NOT NULL,
  `noreg` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prodi` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosenpa`
--

CREATE TABLE `dosenpa` (
  `id` int NOT NULL,
  `nim` varchar(10) NOT NULL,
  `noreg` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dospem`
--

CREATE TABLE `dospem` (
  `id` int NOT NULL,
  `nim` varchar(10) NOT NULL,
  `noreg` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_sidang`
--

CREATE TABLE `file_sidang` (
  `id` int NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `file` varchar(255) NOT NULL,
  `dari` varchar(10) NOT NULL,
  `prodi` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ganti_dospem`
--

CREATE TABLE `ganti_dospem` (
  `id` int NOT NULL,
  `nim` varchar(10) NOT NULL,
  `pembimbing_lama` varchar(10) NOT NULL,
  `pembimbing_baru` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_mengajukan` datetime NOT NULL,
  `accstaff` varchar(10) DEFAULT NULL,
  `tglaccstaff` datetime DEFAULT NULL,
  `acckaprodi` varchar(10) DEFAULT NULL,
  `tglacckaprodi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ganti_judul`
--

CREATE TABLE `ganti_judul` (
  `id` int NOT NULL,
  `nim` varchar(10) NOT NULL,
  `judul_sebelum` text NOT NULL,
  `judul_baru` text NOT NULL,
  `keterangan` text,
  `tgl_mengajukan` datetime NOT NULL,
  `accstaff` varchar(10) DEFAULT NULL,
  `tglaccstaff` datetime DEFAULT NULL,
  `accdospem` varchar(10) DEFAULT NULL,
  `tglaccdospem` datetime DEFAULT NULL,
  `acckaprodi` varchar(10) DEFAULT NULL,
  `tglacckaprodi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `help_desk`
--

CREATE TABLE `help_desk` (
  `id` int NOT NULL,
  `username` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `masukan` text NOT NULL,
  `tgl_masukan` datetime NOT NULL,
  `respon` text,
  `tgl_respon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int NOT NULL,
  `username` varchar(10) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `info` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(10) NOT NULL,
  `link` varchar(100) NOT NULL,
  `lihat` varchar(5) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sidang`
--

CREATE TABLE `jadwal_sidang` (
  `id` int NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tanggal_id` varchar(5) NOT NULL,
  `waktu` time NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `penguji1` varchar(20) NOT NULL,
  `penguji2` varchar(20) NOT NULL,
  `pembimbing` varchar(20) NOT NULL,
  `staff_attempt` datetime NOT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `no_skl` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judul_skripsi`
--

CREATE TABLE `judul_skripsi` (
  `id` int NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `judul` text NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `pembimbing` varchar(10) NOT NULL,
  `tgl_outline` datetime DEFAULT NULL,
  `tgl_sidang` date DEFAULT NULL,
  `tgl_lulus` datetime DEFAULT NULL,
  `file_skripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kaprodi`
--

CREATE TABLE `kaprodi` (
  `id` int NOT NULL,
  `noreg` varchar(10) NOT NULL,
  `prodi` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_book`
--

CREATE TABLE `log_book` (
  `id` int NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_dospem` varchar(10) NOT NULL,
  `topik` longtext NOT NULL,
  `lu_topik` datetime DEFAULT NULL,
  `catatan` longtext NOT NULL,
  `lu_catatan` datetime DEFAULT NULL,
  `accdospem` varchar(10) DEFAULT NULL,
  `tglaccdospem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_outline`
--

CREATE TABLE `log_outline` (
  `id` int NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `nmp` varchar(5) NOT NULL,
  `ns` varchar(5) NOT NULL,
  `topik1` text NOT NULL,
  `topik2` text NOT NULL,
  `dospem` varchar(10) NOT NULL,
  `dospems` varchar(10) NOT NULL,
  `yajukan` varchar(50) NOT NULL,
  `konsen` varchar(50) NOT NULL,
  `lmedpel` varchar(2) NOT NULL,
  `lstatis` varchar(2) NOT NULL,
  `lkkp` varchar(2) NOT NULL,
  `l128` varchar(2) NOT NULL,
  `ufmhs` varchar(200) NOT NULL,
  `usbs` varchar(200) NOT NULL,
  `uspu` varchar(200) NOT NULL,
  `ukst` varchar(200) NOT NULL,
  `utn` varchar(200) NOT NULL,
  `ukhs` varchar(200) NOT NULL,
  `upro1` varchar(200) NOT NULL,
  `upro2` varchar(200) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `accstaff` varchar(10) DEFAULT NULL,
  `tglaccstaff` datetime DEFAULT NULL,
  `acckaprodi` varchar(10) DEFAULT NULL,
  `status_outline` varchar(10) NOT NULL,
  `dospemfix` varchar(10) NOT NULL,
  `topikfix` text NOT NULL,
  `outline_fix` varchar(200) NOT NULL,
  `komentar` longtext NOT NULL,
  `revisi` varchar(10) NOT NULL,
  `catatan` longtext NOT NULL,
  `judul_revisi` text NOT NULL,
  `outline_revisi` varchar(200) NOT NULL,
  `tglacckaprodi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenjang` varchar(15) NOT NULL DEFAULT 'Strata Satu',
  `jurusan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outline`
--

CREATE TABLE `outline` (
  `id` int NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `nohp` varchar(20) NOT NULL,
  `nmp` varchar(5) NOT NULL,
  `ns` varchar(5) NOT NULL,
  `topik1` text NOT NULL,
  `topik2` text NOT NULL,
  `dospem` varchar(10) NOT NULL,
  `dospems` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `yajukan` varchar(50) NOT NULL,
  `konsen` varchar(50) NOT NULL,
  `lmedpel` varchar(2) NOT NULL,
  `lstatis` varchar(2) NOT NULL,
  `lkkp` varchar(2) NOT NULL,
  `l128` varchar(2) NOT NULL,
  `ufmhs` varchar(200) NOT NULL,
  `usbs` varchar(200) NOT NULL,
  `uspu` varchar(200) NOT NULL,
  `ukst` varchar(200) NOT NULL,
  `utn` varchar(200) NOT NULL,
  `ukhs` varchar(200) NOT NULL,
  `upro1` varchar(200) NOT NULL,
  `upro2` varchar(200) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `accstaff` varchar(10) DEFAULT NULL,
  `tglaccstaff` datetime DEFAULT NULL,
  `acckaprodi` varchar(10) DEFAULT NULL,
  `status_outline` varchar(10) NOT NULL,
  `dospemfix` varchar(10) NOT NULL,
  `topikfix` text NOT NULL,
  `outline_fix` varchar(200) NOT NULL,
  `komentar` longtext NOT NULL,
  `revisi` varchar(20) NOT NULL,
  `catatan` longtext NOT NULL,
  `judul_revisi` text NOT NULL,
  `outline_revisi` varchar(200) NOT NULL,
  `tglacckaprodi` datetime DEFAULT NULL,
  `no_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nosurat` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `tampil` varchar(10) DEFAULT NULL,
  `isi` longtext NOT NULL,
  `tgl_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `penguji` varchar(10) NOT NULL,
  `penyajian1` float NOT NULL,
  `penyajian2` float NOT NULL,
  `penyajian3` float NOT NULL,
  `penulisan1` float NOT NULL,
  `penulisan2` float NOT NULL,
  `penulisan3` float NOT NULL,
  `penulisan4` float NOT NULL,
  `umum1` float NOT NULL,
  `umum2` float NOT NULL,
  `nilai_akhir` float NOT NULL,
  `catatan` text NOT NULL,
  `tgl_penilaian` datetime NOT NULL,
  `batas_revisi` datetime DEFAULT NULL,
  `judul_revisi` text,
  `file_revisi` varchar(255) DEFAULT NULL,
  `tgl_upload` datetime DEFAULT NULL,
  `accpenguji` varchar(10) DEFAULT NULL,
  `tglaccpenguji` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revisi_skripsi`
--

CREATE TABLE `revisi_skripsi` (
  `id` int NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `penguji` varchar(10) NOT NULL,
  `uraian` longtext NOT NULL,
  `halaman` text NOT NULL,
  `tgl_attempt` datetime NOT NULL,
  `accpenguji` varchar(10) DEFAULT NULL,
  `tglaccpenguji` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_sidang`
--

CREATE TABLE `tanggal_sidang` (
  `id` int NOT NULL,
  `tgl_sidang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `prodi` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `prodi`, `created_at`, `status`) VALUES
(1, 'lapstaff', '$2a$12$vAZgBEzvyzE.m.1x5Pr0kewpduhIDHEDw58zj13LmbFrIN8cA3DCq', 'Tugas Akhir sipso', 'staff', 'UM', '2023-08-10 14:25:29', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_sidang`
--
ALTER TABLE `daftar_sidang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `noreg` (`noreg`);

--
-- Indexes for table `dosenpa`
--
ALTER TABLE `dosenpa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `dospem`
--
ALTER TABLE `dospem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `file_sidang`
--
ALTER TABLE `file_sidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ganti_dospem`
--
ALTER TABLE `ganti_dospem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ganti_judul`
--
ALTER TABLE `ganti_judul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_desk`
--
ALTER TABLE `help_desk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_book`
--
ALTER TABLE `log_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_outline`
--
ALTER TABLE `log_outline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `outline`
--
ALTER TABLE `outline`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revisi_skripsi`
--
ALTER TABLE `revisi_skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggal_sidang`
--
ALTER TABLE `tanggal_sidang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tgl_sidang` (`tgl_sidang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_sidang`
--
ALTER TABLE `daftar_sidang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosenpa`
--
ALTER TABLE `dosenpa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dospem`
--
ALTER TABLE `dospem`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_sidang`
--
ALTER TABLE `file_sidang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ganti_dospem`
--
ALTER TABLE `ganti_dospem`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ganti_judul`
--
ALTER TABLE `ganti_judul`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help_desk`
--
ALTER TABLE `help_desk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_book`
--
ALTER TABLE `log_book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_outline`
--
ALTER TABLE `log_outline`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outline`
--
ALTER TABLE `outline`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revisi_skripsi`
--
ALTER TABLE `revisi_skripsi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanggal_sidang`
--
ALTER TABLE `tanggal_sidang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
