-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 11:04 AM
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
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `doc_name`) VALUES
(1, 'Dr. Smith'),
(8, 'Dr. Smith'),
(9, 'Dr. Johnson'),
(10, 'Dr. Brown');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'user1', 'password1'),
(2, 'user2', 'password2'),
(3, 'user3', 'password3');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `medication_id` int(11) NOT NULL,
  `medication_name` varchar(100) DEFAULT NULL,
  `medication_cost` decimal(10,2) DEFAULT NULL,
  `availability` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`medication_id`, `medication_name`, `medication_cost`, `availability`) VALUES
(1, 'Medicine A', 10.99, 82),
(8, 'Medicine E', 10.99, 70),
(9, 'Medicine B', 15.99, 83),
(10, 'Medicine C', 8.99, 150),
(11, 'Medicine D', 1000.00, 20);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`) VALUES
(1, 'John Doe'),
(8, 'John Andrew'),
(9, 'Alice Smith'),
(10, 'Bob Johnson');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `payment_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `patient_id`, `payment_name`) VALUES
(9, 8, 'Credit Card'),
(10, 9, 'Cash'),
(11, 10, 'Insurance'),
(12, 1, 'Debit Card'),
(13, 9, 'credit'),
(14, 10, 'credit'),
(15, 10, 'cash'),
(16, 10, 'cash'),
(17, 8, 'credit'),
(18, 8, 'cash'),
(19, 9, 'cash'),
(20, 10, 'credit'),
(21, 8, 'credit'),
(22, 8, 'credit'),
(23, 8, 'credit'),
(24, 8, 'credit'),
(25, 8, 'credit'),
(26, 8, 'credit'),
(27, 8, 'credit'),
(28, 8, 'credit'),
(29, 8, 'credit1'),
(30, 8, 'credit1'),
(31, 8, 'credit1'),
(32, 8, 'credit1'),
(34, 8, 'credit1'),
(35, 8, 'credit'),
(36, 8, 'credit'),
(37, 8, 'credit'),
(38, 8, 'credit'),
(39, 9, 'credit'),
(40, 8, 'credit'),
(41, 8, 'credit'),
(42, 8, 'credit'),
(43, 8, 'credit'),
(44, 8, 'credit'),
(45, 8, 'credit'),
(46, 8, 'credit'),
(47, 8, 'credit'),
(48, 8, 'credit1'),
(49, 8, 'credit'),
(50, 9, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `medication_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `patient_id`, `doc_id`, `quantity`, `date`, `medication_name`) VALUES
(1, 1, 1, 2, '2024-03-03', 'Medicine A'),
(5, 1, 1, 1, '2024-03-03', 'Medicine A'),
(6, 8, 8, 8, '2024-03-04', 'Medicine B'),
(7, 9, 9, 9, '2024-03-05', 'Medicine C'),
(8, 10, 10, 10, '2024-04-05', 'Medicine E'),
(9, 9, 9, 30, '2024-03-28', 'Medication C'),
(10, 10, 10, 10, '2024-03-21', 'Medication C'),
(14, 8, 8, 6, '2024-03-18', 'Medication D'),
(15, 8, 8, 6, '2024-03-18', 'Medication D'),
(16, 8, 8, 12, '2024-03-15', 'Medication D'),
(20, 8, 8, 10, '2024-03-15', 'Medication D'),
(21, 8, 8, 10, '2024-03-15', 'Medication D'),
(22, 8, 8, 10, '2024-03-15', 'Medicine D'),
(23, 8, 8, 10, '2024-03-15', 'Medicine D'),
(24, 8, 8, 10, '2024-03-15', 'Medicine D'),
(25, 8, 8, 10, '2024-03-15', 'Medicine D'),
(26, 8, 8, 10, '2024-03-15', 'Medicine D'),
(27, 8, 8, 10, '2024-03-15', 'Medicine D'),
(28, 8, 8, 10, '2024-03-15', 'Medicine A'),
(29, 8, 8, 10, '2024-03-15', 'Medicine D'),
(30, 8, 8, 10, '2024-03-15', 'Medicine D'),
(31, 8, 8, 10, '2024-03-15', 'Medicine D'),
(32, 8, 8, 10, '2024-03-15', 'Medicine D'),
(33, 8, 8, 10, '2024-03-15', 'Medicine D'),
(34, 8, 8, 10, '2024-03-15', 'Medicine D'),
(35, 8, 8, 10, '2024-03-15', 'Medicine D'),
(36, 8, 8, 10, '2024-03-15', 'Medicine D'),
(37, 8, 8, 1, '2024-03-15', 'Medicine B'),
(38, 8, 8, 1, '2024-03-15', 'Medicine B'),
(39, 8, 8, 1, '2024-03-15', 'Medicine B'),
(40, 8, 8, 1, '2024-03-15', 'Medicine B'),
(41, 8, 8, 1, '2024-03-15', 'Medicine B'),
(42, 8, 8, 1, '2024-03-15', 'Medicine B'),
(43, 8, 8, 1, '2024-03-15', 'Medicine B'),
(44, 8, 8, 1, '2024-03-15', 'Medicine B'),
(45, 8, 8, 1, '2024-03-15', 'Medicine B'),
(46, 8, 8, 1, '2024-03-15', 'Medicine B'),
(47, 8, 8, 1, '2024-03-15', 'Medicine B'),
(48, 8, 8, 1, '2024-03-15', 'Medicine B'),
(49, 8, 8, 1, '2024-03-15', 'Medicine B'),
(50, 8, 8, 1, '2024-03-15', 'Medicine B'),
(51, 8, 8, 1, '2024-03-15', 'Medicine B'),
(52, 8, 8, 12, '2024-03-15', 'Medicine B'),
(53, 9, 9, 4, '2024-03-25', 'Medicine A'),
(54, 9, 9, 4, '2024-03-25', 'Medicine A');

--
-- Triggers `prescription`
--
DELIMITER $$
CREATE TRIGGER `update_availability` AFTER INSERT ON `prescription` FOR EACH ROW BEGIN
UPDATE medication set medication.availability=medication.availability-NEW.quantity where medication.medication_name=NEW.medication_name;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `new_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`, `new_password`) VALUES
(1, 'kiranmayee', 'narendra', 'narendra'),
(2, 'henry', 'horrid', 'horrid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`medication_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `medication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
