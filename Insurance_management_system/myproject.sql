-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 02:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `password`) VALUES
('Supreeta', 'supreeta'),
('Sukanya', 'sukanya');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `ag_user_name` varchar(30) NOT NULL,
  `agent_name` varchar(30) NOT NULL,
  `agent_psw` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `contact_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`ag_user_name`, `agent_name`, `agent_psw`, `address`, `pincode`, `contact_no`) VALUES
('Nitya', 'Nitya Kashyap', 'bml0MTIz', 'Ananda Nilay,Mysore', 581327, 9867689008),
('Pooja', 'Pooja Rao', 'cG9vMTIz', 'Haldipur, Honnavar(U.K)', 534314, 6845366362),
('Roshan', 'Roshan Kharvi', 'cm9zMTIz', 'Satyam apartment, refinery road mysore', 459723, 7685746633),
('Sapna', 'Sapna Shetty', 'c2FwMTIz', 'Shrinidhi apartment, jayanagar', 523134, 9857353212),
('Sharath', 'Sharath Iyer', 'c2hhMTIz', 'Navanagar Bagalkot', 564625, 8788746633),
('Shiva', 'Shiva S', 'c2hpMTIz', 'xyz,mumbai', 453621, 8758483743);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `policy_no` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ag_user_name` varchar(30) DEFAULT NULL,
  `DOB` date NOT NULL,
  `gender` char(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `product_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`policy_no`, `user_name`, `f_name`, `l_name`, `password`, `ag_user_name`, `DOB`, `gender`, `address`, `pincode`, `contact_no`, `product_name`) VALUES
(10000, 'ganesh01', 'Ganesh ', 'Shetty', 'Z2FuMTIz', 'Nitya', '1989-08-09', 'Male', 'Shree shiv nilay, banashankari, Bangalore', 576298, 7685746633, 'Jeevan Labh');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `product_name` varchar(20) NOT NULL,
  `sum_assured` int(11) NOT NULL,
  `premium_mode` varchar(15) NOT NULL,
  `premium_amt` int(11) NOT NULL,
  `maturity_prd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`product_name`, `sum_assured`, `premium_mode`, `premium_amt`, `maturity_prd`) VALUES
('Adhar Shila', 60000, 'Quarterly', 3000, 5),
('Adhar Stambh', 120000, 'Monthly', 1000, 10),
('Jeevan Labh', 50000, 'Yearly', 5000, 10),
('Jeevan Lakshya', 75000, 'Quarterly', 4500, 10),
('Jeevan Mangal', 200000, 'Quarterly', 2500, 20);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `trans_id` int(11) NOT NULL,
  `policy_no` int(11) NOT NULL,
  `premium_amt` int(11) NOT NULL,
  `pay_mode` varchar(20) NOT NULL,
  `pay_date` date NOT NULL,
  `card_no` bigint(20) NOT NULL,
  `exp_date` date NOT NULL,
  `CVV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`ag_user_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`policy_no`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `ag_user_name` (`ag_user_name`),
  ADD KEY `product_name` (`product_name`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`product_name`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `policy_no` (`policy_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `policy_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658678;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`ag_user_name`) REFERENCES `agent` (`ag_user_name`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`product_name`) REFERENCES `insurance` (`product_name`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`policy_no`) REFERENCES `customer` (`policy_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
