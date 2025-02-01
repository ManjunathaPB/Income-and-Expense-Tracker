-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 01:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ExpenseCost` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`ID`, `UserId`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(1, 3, '2024-09-30', 'alcohol', '3000', '2024-10-08 10:58:53'),
(2, 1, '2024-02-19', 'college fee', '70000', '2024-10-18 06:08:34'),
(3, 1, '2024-02-26', 'college other fee', '30000', '2024-10-18 06:09:06'),
(4, 1, '2024-06-05', 'Pg', '60000', '2024-10-18 06:09:58'),
(5, 1, '2024-07-01', 'Birth Day', '5000', '2024-10-18 06:10:34'),
(6, 5, '2024-02-21', 'college fee', '70000', '2024-11-26 05:04:24'),
(7, 6, '2024-11-12', 'fee', '20000', '2024-11-26 10:23:55'),
(8, 7, '2025-01-01', 'party', '50000', '2025-01-01 16:49:57'),
(10, 8, '2024-06-03', 'xa', '15000', '2025-01-03 06:58:53'),
(11, 8, '2025-01-01', 'prtyy', '4000', '2025-01-03 06:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblincome`
--

CREATE TABLE `tblincome` (
  `ID` int(11) NOT NULL,
  `UserId` int(200) NOT NULL,
  `IncomeDate` date NOT NULL,
  `IncomeName` varchar(200) NOT NULL,
  `IncomeAmt` int(200) NOT NULL,
  `NoteDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblincome`
--

INSERT INTO `tblincome` (`ID`, `UserId`, `IncomeDate`, `IncomeName`, `IncomeAmt`, `NoteDate`) VALUES
(1, 3, '2024-02-08', 'Total cost', 150000, '2024-10-08 10:57:47'),
(2, 1, '2024-02-16', 'Total Amount', 500000, '2024-10-18 06:04:59'),
(3, 1, '2024-03-01', 'salary', 200000, '2024-10-18 06:06:53'),
(4, 4, '2024-10-29', 'k', 84465, '2024-10-29 16:02:37'),
(5, 5, '2024-02-15', 'College fee', 150000, '2024-11-26 05:02:28'),
(6, 5, '2024-03-26', 'extra amount', 20000, '2024-11-26 05:03:51'),
(7, 6, '2024-02-13', 'salarey', 70000, '2024-11-26 10:23:17'),
(8, 7, '2024-11-01', 'sal', 70000, '2025-01-01 16:48:39'),
(9, 7, '2024-12-01', 'sal2', 50000, '2025-01-01 16:49:26'),
(11, 7, '2025-01-01', 'ji', 20000, '2025-01-01 17:00:50'),
(12, 7, '2024-12-31', 'ki', 3000, '2025-01-01 17:01:16'),
(13, 8, '2024-02-03', 'salary', 40000, '2025-01-03 06:58:18'),
(14, 8, '2025-01-01', 'fyhrt', 50000, '2025-01-03 06:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `full_name` varchar(129) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `full_name`, `email`, `password`, `code`, `updated_time`) VALUES
(1, 'Manju', 'mpb7259@gmail.com', '$2y$10$P0vBXG/Yry0BZAd/09V.4u67swTd9f7tlfTmNH9v9mnUlVC.ZiKxy', '0', '2024-11-08 10:28:12'),
(2, 'P Shekar', 'shekarpabbathi15@gmail.com', '$2y$10$3angtKN.77UdHMtwBpwtWO37MHH6mDqnmF3JEZpwqqEwJESNdU9Wm', '0', '2024-11-08 07:16:15'),
(3, 'Deva vinayak', 'vinaykote12@gmail.com', '$2y$10$6hbQKZTLNK605GGwnx.d9.2BMdGD9yGvfQYvR0p9TI4rETyRLmR.u', '0', '2024-11-08 10:32:39'),
(4, 'raki', 'raki@gmail.com', '$2y$10$znC1PPYszMnhgury.7QbXuoG1kojtKZhwWOkFkvizJBpdOIrHrARO', '0', '2024-11-08 07:16:15'),
(5, 'sunny', 'sunny@gmail.com', '$2y$10$AHM4Kfm3AOnJS3m/yvMUyOAoH2jG9TF84Ipqx8dkn2xWE.WhxApq6', NULL, '2024-11-26 05:01:12'),
(6, 'naveen', 'navi12@gmail.com', '$2y$10$kQR.aSUk40fTOJE90Qt.q.dj0ppKVaEiqLevADFSJNvvxvcl.a0sS', NULL, '2024-11-26 10:21:22'),
(7, 'Pratika', 'pratika@gmail.com', '$2y$10$f8F4amyM5b90kya6E51YiOxMLaAIUH9TjziaeV0LkUNxdQKZW2NiO', NULL, '2025-01-01 16:59:43'),
(8, 'jayanth', 'jayath@gmail.com', '$2y$10$e9D4TdOzZ6XLOKUk/9Bp1enIIEpRAhIc6ZG.bMnuO52hv8F46dVKG', NULL, '2025-01-03 06:57:21'),
(9, 'manju', 'mn@gmail.com', '$2y$10$pvL2EZD5UF5WX3gmbFAovOhzXK82zsn8asXCBcG3lCjIwvRMDDp3G', NULL, '2025-01-31 15:17:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblincome`
--
ALTER TABLE `tblincome`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblincome`
--
ALTER TABLE `tblincome`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
