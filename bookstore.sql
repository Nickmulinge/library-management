-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 08:51 AM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_ID`, `Username`, `Password`) VALUES
(1, 'admin', '111');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_ID` int(11) NOT NULL,
  `Book_Name` varchar(255) NOT NULL,
  `Publisher` varchar(255) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Edition` varchar(50) NOT NULL,
  `Number_of_pages` int(11) NOT NULL,
  `Sales` int(11) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_ID`, `Book_Name`, `Publisher`, `ISBN`, `Edition`, `Number_of_pages`, `Sales`, `City`, `Price`) VALUES
(1, 'To Kill a Mockingbird', 'J.B. Lippincott & Co.', '9780061120084', '1st Edition', 336, 10000000, 'New York', 14.99),
(2, '1984', 'Secker & Warburg', '9780451524935', '1st Edition', 328, 25000000, 'London', 19.99),
(3, 'Pride and Prejudice', 'T. Egerton', '9780141199078', '1st Edition', 279, 20000000, 'London', 12.99),
(4, 'The Great Gatsby', 'Charles Scribner\'s Sons', '9780743273565', '1st Edition', 180, 15000000, 'New York', 10.99),
(5, 'Harry Potter and the Sorcerer\'s Stone', 'Bloomsbury', '9780747532699', '1st Edition', 223, 120000000, 'London', 24.99),
(6, 'The Catcher in the Rye', 'Little, Brown and Company', '9780316769488', '1st Edition', 277, 65000000, 'New York', 13.99),
(7, 'The Hobbit', 'George Allen & Unwin', '9780345339683', '1st Edition', 310, 100000000, 'London', 15.99),
(8, 'Moby-Dick', 'Richard Bentley', '9780142437247', '1st Edition', 585, 3000000, 'London', 9.99),
(9, 'War and Peace', 'The Russian Messenger', '9781400079988', '1st Edition', 1225, 36000000, 'Moscow', 20.99),
(10, 'The Lord of the Rings', 'George Allen & Unwin', '9780618640157', '1st Edition', 1178, 150000000, 'London', 29.99);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `reg_date`) VALUES
(1, 'user', '111', '2024-06-06 09:16:03'),
(2, 'user2', '123', '2024-06-06 12:12:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_ID`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
