-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 01:19 PM
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
-- Database: `patient-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `b_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `pathology_fees` decimal(10,2) DEFAULT NULL,
  `room_fees` decimal(10,2) DEFAULT NULL,
  `misc` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_address` varchar(100) NOT NULL,
  `d_gender` char(20) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `d_phone` varchar(15) NOT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `d_name`, `d_address`, `d_gender`, `specialization`, `d_phone`, `dob`) VALUES
(0, 'Sneharsh Kerkar', 'Taliegao', 'male', 'Dentist', '7898212143', '2000-11-10'),
(1, 'Joel D\'Souza', 'Mapusa, Bardez, Goa', 'Male', 'Dentist', '9076325476', NULL),
(2, 'Shivani Gorpode', 'Pune, Maharashtra, India', 'Female', 'Surgeon, Physician', '9809212198', NULL),
(3, 'Ravi Shankar', 'Tamilnadu, India', 'Male', 'Cardiologist', '7766908709', NULL),
(4, 'Kevin Fernandes', 'Margao, Goa, India', 'Male', 'Neurologist, Psychiatrist', '8709321254', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medhist`
--

CREATE TABLE `medhist` (
  `d_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `date_admit` date DEFAULT NULL,
  `date_discharge` date DEFAULT NULL,
  `medicines` varchar(255) DEFAULT NULL,
  `treatment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `p_gender` varchar(20) NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `p_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `p_name`, `dob`, `p_gender`, `p_address`, `p_phone`) VALUES
(1, 'Ravi Chadda', '1992-12-10', 'Male', 'Panjim, Goa, India', '9876871209'),
(2, 'Sita Chauhan', '1998-01-09', 'Female', 'Belgaum, Karnataka, India', '8765980912'),
(3, 'Rohit Shetty', '1989-04-07', 'Male', 'Dharavi, Mumbai, India', '9867095487'),
(4, 'Heeralal Mehta', '2001-04-26', 'Male', 'Powder Galli, Mumbai, India', '7687769809'),
(5, 'Terrance Silva', '2003-04-02', 'Male', 'St. Cruz, Panjim, Goa', '8754760987'),
(6, ' Shiva Kumar', '1997-06-11', 'male', 'Baga, Anjuna, Bardez, Goa', '7698686430'),
(7, ' Kiran Gawde', '2001-08-01', 'male', 'Calangute, Bardez, Goa', '9876634546'),
(10, 'Sneharsh Kerkar', '2000-11-10', 'male', 'Taliegao', '7898212143');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `medhist`
--
ALTER TABLE `medhist`
  ADD PRIMARY KEY (`d_id`,`p_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`);

--
-- Constraints for table `medhist`
--
ALTER TABLE `medhist`
  ADD CONSTRAINT `medhist_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`d_id`),
  ADD CONSTRAINT `medhist_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
