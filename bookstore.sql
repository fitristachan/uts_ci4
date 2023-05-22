-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 01:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_books` int(5) NOT NULL,
  `code_book` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `purchase_price` int(50) NOT NULL,
  `selling_price` int(50) NOT NULL,
  `stock` int(50) NOT NULL,
  `id_category` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_books`, `code_book`, `title`, `author`, `year`, `publisher`, `purchase_price`, `selling_price`, `stock`, `id_category`) VALUES
(1, 23001, 'Almond', 'Sohn Won-pyung', 2017, 'Gramedia Widiasarana Indonesia', 40000, 60000, 5, 1),
(2, 23002, 'Keajaiban Toko Kelontong Namiya Novel', 'Keigo Higashino', 2020, 'Gramedia Pustaka Utama', 80000, 100000, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(5) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Fiction'),
(2, 'Encyclopedia');

-- --------------------------------------------------------

--
-- Table structure for table `detail_sale`
--

CREATE TABLE `detail_sale` (
  `id_detail` int(5) NOT NULL,
  `factur` varchar(50) NOT NULL,
  `id_books` int(5) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `selling_price` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `total_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `salary` int(50) NOT NULL,
  `start_date` year(4) NOT NULL,
  `employee_code` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_employee`, `firstName`, `lastName`, `title`, `salary`, `start_date`, `employee_code`) VALUES
(1, 'Fitri', 'Sagita', 'Cashier', 20000000, 2023, 23201),
(2, 'Hirotaka', 'Nifuji', 'Admin', 20000000, 2023, 23101);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `factur` varchar(50) NOT NULL,
  `date_sale` date NOT NULL DEFAULT current_timestamp(),
  `time_sale` time NOT NULL DEFAULT current_timestamp(),
  `grand_total` int(50) NOT NULL,
  `cash` int(50) NOT NULL,
  `change_purchase` int(50) NOT NULL,
  `id_employee` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_employee` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id_users`, `id_employee`) VALUES
('gita', '$2y$10$NOjh1qfdGfzXc6VjPcVqVuTxBJjM3VmS.53A6I3wWyB1EFNUIvMey', 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_books`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `detail_sale`
--
ALTER TABLE `detail_sale`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_books` (`id_books`),
  ADD KEY `factur` (`factur`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`factur`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_employee` (`id_employee`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id_books` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_sale`
--
ALTER TABLE `detail_sale`
  MODIFY `id_detail` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_sale`
--
ALTER TABLE `detail_sale`
  ADD CONSTRAINT `detail_sale_ibfk_1` FOREIGN KEY (`id_books`) REFERENCES `books` (`id_books`),
  ADD CONSTRAINT `detail_sale_ibfk_2` FOREIGN KEY (`factur`) REFERENCES `sale` (`factur`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
