-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 04:18 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streamingservices`
--

-- --------------------------------------------------------

--
-- Table structure for table `serviset_ss`
--

CREATE TABLE `serviset_ss` (
  `id_SS` int(11) NOT NULL,
  `Servisi_SS` varchar(50) NOT NULL,
  `Lansimi_SS` varchar(50) NOT NULL,
  `Perdoruesit_SS` varchar(30) NOT NULL,
  `Mbulueshmeria_SS` varchar(50) NOT NULL,
  `Progresi_SS` varchar(10) NOT NULL,
  `Kontenti_SS` varchar(20) NOT NULL,
  `Vlera_SS` varchar(20) NOT NULL,
  `CmimiMinimal_SS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviset_ss`
--

INSERT INTO `serviset_ss` (`id_SS`, `Servisi_SS`, `Lansimi_SS`, `Perdoruesit_SS`, `Mbulueshmeria_SS`, `Progresi_SS`, `Kontenti_SS`, `Vlera_SS`, `CmimiMinimal_SS`) VALUES
(1, 'Netflix', '2007', '182,086,000', '190 shtete', '+1.31%', '1,000,000,000 ore', '194,000,000,000$', '7.99$'),
(4, 'HBO GO', '2010', '140.000.000', '50 shtete', '+0.98%', '10.000.000 ore', '1.093.000.000$', '15.00$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serviset_ss`
--
ALTER TABLE `serviset_ss`
  ADD PRIMARY KEY (`id_SS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `serviset_ss`
--
ALTER TABLE `serviset_ss`
  MODIFY `id_SS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
