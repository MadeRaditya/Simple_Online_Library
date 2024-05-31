-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 03:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `posted_by`, `cover`, `file_name`, `create_time`, `update_time`) VALUES
(16, 'HTML & CSS Manual Dasar', 'ligmatv.vercel.app', 1, 'HTML & CSS Manual Dasar.jpg', 'HTML & CSS Manual Dasar.pdf', '2024-05-28 13:46:42', '2024-05-28 13:46:42'),
(17, 'Javascript Guide', 'Desrizal', 1, 'Javascript Guide.jpg', 'Javascript Guide.pdf', '2024-05-28 14:47:46', '2024-05-28 14:47:46'),
(18, 'Kali Linux Cookbook', 'Willie L. Pritchett, David De Smet', 1, 'Kali Linux Cookbook.jpg', 'Kali Linux Cookbook.pdf', '2024-05-28 14:51:27', '2024-05-28 14:51:27'),
(19, 'Cepat Mahir Python', 'Hendri', 1, 'Cepat Mahir Python.jpg', 'Cepat Mahir Python.pdf', '2024-05-28 14:53:25', '2024-05-28 14:53:25'),
(20, 'Tutorial Belajar Git dan GitHub untuk Pemula', 'Hendry Irawan', 1, 'Tutorial Belajar Git dan GitHub untuk Pemula.jpg', 'Tutorial Belajar Git dan GitHub untuk Pemula.pdf', '2024-05-28 14:54:11', '2024-05-28 14:54:11'),
(21, 'Algoritma & pemrograman Python series', 'Irwan A. Kautsar, Ph.D', 1, 'Algoritma & pemrograman Python series.jpg', 'Algoritma & pemrograman Python series.pdf', '2024-05-28 15:18:04', '2024-05-28 15:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'andika', 'andhikaaja@gmail.com', '$2y$10$7h9Hiuv2tozj7aWi4nnpRexx/vVzG9MGSe5cZbV1ar2TBExON8VO2'),
(2, 'sandhika', 'SandhikaGalih@gmail.com', '$2y$10$xbK60iNG7ccu4RsT1sAwKOUab6G1dDN1nLFTAurhEbEDAw0mrKemO'),
(3, 'anjay', 'anjay@gmail.com', '$2y$10$Zz8Wak5igW4JJjbnOYljJe/1NesZt7N0x31uDRzEnNS3HVPtJFr5W'),
(4, 'dodi aza', 'dodiasdr@mail.dj.ac.id', '$2y$10$GnyxrKbVnPLIqB7qKjSrMuQpN0xny1VsQkdtIvJOlHXLDUeKatLP6'),
(5, 'juniardi', 'juniardiaza@gmail.com', '$2y$10$LVL1RmrtUEtffcJbwm92tOGTibFb140UA13wJiDE53yC6Hbl5FAha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posted_by` (`posted_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`posted_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
