-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2023 at 01:12 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notobo_sieuthiminijava`
--

-- --------------------------------------------------------

--
-- Table structure for table `import_product`
--

CREATE TABLE `import_product` (
  `import_id` int(11) NOT NULL,
  `date` date DEFAULT curdate(),
  `suppilier_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `import_product`
--
ALTER TABLE `import_product`
  ADD PRIMARY KEY (`import_id`),
  ADD KEY `FK_import_product_account_id` (`account_id`),
  ADD KEY `FK_import_product_suppilier_id` (`suppilier_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `import_product`
--
ALTER TABLE `import_product`
  ADD CONSTRAINT `FK_import_product_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_import_product_suppilier_id` FOREIGN KEY (`suppilier_id`) REFERENCES `suppilier` (`suppilier_id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
