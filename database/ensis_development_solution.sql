-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 06:37 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensis_development_solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`) VALUES
(1, 'Datch Bangla Bank Ltd'),
(2, 'Islami Bank');

-- --------------------------------------------------------

--
-- Table structure for table `bank_branches`
--

CREATE TABLE `bank_branches` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_branches`
--

INSERT INTO `bank_branches` (`id`, `name`, `bank_id`, `location`) VALUES
(1, 'Dhanmondhi Branch', 1, 'Dhanmondhi 8/a'),
(2, 'Mirpur Branch', 2, 'Mirpur 10, Dhaka, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `nid_passport` varchar(200) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `marital_status` int(11) DEFAULT '0',
  `father_name` varchar(200) DEFAULT NULL,
  `mother_name` varchar(200) DEFAULT NULL,
  `husband_wife` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `job_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `permanent_address`, `nid_passport`, `gender`, `marital_status`, `father_name`, `mother_name`, `husband_wife`, `phone`, `job_status`) VALUES
(1, 'Md Shakil Hossain', 'shakil.shaion@gmail.com', 'Mohammadpur, Dhaka', '123456789', 'Male', 1, NULL, NULL, NULL, '01679584270', 'Software Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `stf` varchar(255) DEFAULT NULL,
  `costs` double(15,2) DEFAULT NULL,
  `discount` double(10,2) NOT NULL,
  `flat_ready` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_sold` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `name`, `project_id`, `floor`, `stf`, `costs`, `discount`, `flat_ready`, `is_sold`) VALUES
(1, 'A1', 2, '1st', '2300', 6500000.00, 0.00, '2018-12-31 18:00:00', 1),
(2, 'A2', 2, '2nd', '2300', 6000000.00, 0.00, '2018-04-14 18:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `storied` int(11) NOT NULL DEFAULT '1',
  `flats` int(11) NOT NULL DEFAULT '1',
  `costs` double(20,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `location`, `storied`, `flats`, `costs`, `date`) VALUES
(2, 'Enosis A1', 'Dhanmondi-15, Dhaka, Bangladesh', 10, 30, 50000000.00, '2018-04-14 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_books`
--

CREATE TABLE `receipt_books` (
  `id` int(11) NOT NULL,
  `receive_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_id` int(11) DEFAULT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `payment_by` varchar(200) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `mr_no` varchar(255) DEFAULT NULL,
  `on_account_of` timestamp NULL DEFAULT NULL,
  `receive_amount` double(10,2) DEFAULT NULL,
  `check_cash_date` timestamp NULL DEFAULT NULL,
  `signature_mark` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_books`
--

INSERT INTO `receipt_books` (`id`, `receive_date`, `project_id`, `flat_id`, `customer_id`, `payment_by`, `bank_id`, `branch_id`, `mr_no`, `on_account_of`, `receive_amount`, `check_cash_date`, `signature_mark`) VALUES
(1, '2018-03-03 18:00:00', 2, 1, 1, 'Bank', 1, 1, 'x32452f32', NULL, 3500000.00, '2018-03-03 18:00:00', 'Advanced'),
(2, '2018-03-06 18:00:00', 2, 1, 1, 'Bank', 1, 1, 'x332452f32', NULL, 15000.00, '2018-03-06 18:00:00', 'Installment'),
(3, '2018-03-06 18:00:00', 2, 2, 1, 'Bank', 1, 1, 'x332452f32', NULL, 3500.00, NULL, 'Advanced');

-- --------------------------------------------------------

--
-- Table structure for table `sold_flats`
--

CREATE TABLE `sold_flats` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `advanced_type` varchar(255) NOT NULL,
  `advanced` double(10,2) DEFAULT NULL,
  `advanced_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `advanced_by` varchar(200) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `mr_no` varchar(200) DEFAULT NULL,
  `total_installment` varchar(20) DEFAULT NULL,
  `utilite_names` varchar(255) DEFAULT NULL,
  `utility_total_costs` double(10,2) DEFAULT NULL,
  `total_costs` double(10,2) DEFAULT NULL,
  `discount` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sold_flats`
--

INSERT INTO `sold_flats` (`id`, `project_id`, `flat_id`, `customer_id`, `advanced_type`, `advanced`, `advanced_date`, `advanced_by`, `bank_id`, `branch_id`, `mr_no`, `total_installment`, `utilite_names`, `utility_total_costs`, `total_costs`, `discount`) VALUES
(1, 2, 1, 1, 'Bank', 3500000.00, '2018-03-03 18:00:00', 'Shakil Hossain', 1, 1, 'x32452f32', '72', 'Rooftop', 50000.00, 6550000.00, 0.00),
(2, 2, 2, 1, 'Bank', 3500.00, '2018-03-06 18:00:00', 'Md Shakil Hossain', 1, 1, 'x332452f32', '36', 'Garage', 200000.00, 6200000.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT '0',
  `designation` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `designation`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456789', 0, 'CEO', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cost` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `name`, `cost`) VALUES
(4, 'Garage', 200000.00),
(5, 'Rooftop', 50000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_branches`
--
ALTER TABLE `bank_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_books`
--
ALTER TABLE `receipt_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `flat_id` (`flat_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `bank_id` (`bank_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `sold_flats`
--
ALTER TABLE `sold_flats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `flat_id` (`flat_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `bank_id` (`bank_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_branches`
--
ALTER TABLE `bank_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt_books`
--
ALTER TABLE `receipt_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sold_flats`
--
ALTER TABLE `sold_flats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_branches`
--
ALTER TABLE `bank_branches`
  ADD CONSTRAINT `bank_branches_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`);

--
-- Constraints for table `flats`
--
ALTER TABLE `flats`
  ADD CONSTRAINT `flats_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `receipt_books`
--
ALTER TABLE `receipt_books`
  ADD CONSTRAINT `receipt_books_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `receipt_books_ibfk_2` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`id`),
  ADD CONSTRAINT `receipt_books_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `receipt_books_ibfk_4` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `receipt_books_ibfk_5` FOREIGN KEY (`branch_id`) REFERENCES `bank_branches` (`id`);

--
-- Constraints for table `sold_flats`
--
ALTER TABLE `sold_flats`
  ADD CONSTRAINT `sold_flats_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `sold_flats_ibfk_2` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`id`),
  ADD CONSTRAINT `sold_flats_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sold_flats_ibfk_4` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `sold_flats_ibfk_5` FOREIGN KEY (`branch_id`) REFERENCES `bank_branches` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
