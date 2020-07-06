-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2020 at 02:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_technova`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `nip`, `name`, `status`, `tanggal_lahir`, `email`) VALUES
(1, '111', 'Yudha', 'kawin', '1998-06-23', 'yudhapermana166@gmail.com'),
(3, '222', 'Permana', 'belum kawin', '2020-07-01', 'permana@email.com'),
(5, '333', 'Bimo', 'kawin', '2020-07-04', 'bimo@email.com'),
(6, '444', 'Raisah', 'belum kawin', '2010-01-02', 'raisah@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `status_pekerjaan` varchar(32) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_deadline` date NOT NULL,
  `tugas` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `status_pekerjaan`, `tanggal_mulai`, `tanggal_deadline`, `tugas`, `keterangan`, `emp_id`) VALUES
(1, 'done', '2020-07-03', '2020-07-07', 'Membuat halaman dashboard', 'Tolong buatkan halaman dashboard dengan responsive di mobile. Deadline 7 hari dari sekarang', 1),
(2, 'assigned', '2020-07-01', '2020-07-15', 'Buat data base', 'Tolong buatkan database project A, lengkap dengan dokumentasi normalisasi', 3),
(3, 'assigned', '2020-07-01', '2020-07-05', 'Dokumentasi Flowchart', 'Tolong buatkan dokumentasi berupa flowchart untuk project B', 5),
(4, 'assigned', '2020-07-08', '2020-07-14', 'Buat Project B', 'Buat project B dengan dokumentasi rest api nya, deadline sampai dengan tanggal 14 Juli 2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `role_id`, `emp_id`) VALUES
(1, 'admin', 'admin', 1, 0),
(2, 'permana', 'permana', 2, 3),
(3, 'bimo', 'bimo', 2, 5),
(4, 'yudha', 'yudha', 2, 1),
(5, 'raisah', 'raisah', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
