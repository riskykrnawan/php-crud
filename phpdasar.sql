-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 04:32 AM
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
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `blackbulls`
--

CREATE TABLE `blackbulls` (
  `Rank` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Picture` varchar(50) NOT NULL,
  `Power` int(11) DEFAULT NULL,
  `Magic` varchar(50) DEFAULT NULL,
  `Grimoire` varchar(50) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blackbulls`
--

INSERT INTO `blackbulls` (`Rank`, `Name`, `Picture`, `Power`, `Magic`, `Grimoire`, `Position`) VALUES
(1, 'Yami Sukehiro', 'yami.png', 21000, 'Dark Magic', '3 Leaf', 'Captain'),
(2, 'Nacht', 'nacht.png', 17500, 'Devil Magic', '5 Leaf', 'Vice Captain'),
(3, 'Asta', 'asta.png', 14500, 'Anti Magic', '5 Leaf', 'Member'),
(4, 'Charmy Papiston', 'charmy.png', 12500, 'Cotton and Dwarf Magic', '3 Leaf', 'Member'),
(5, 'Noelle Silva', 'noelle.png', 12000, 'Water Magic', '3 Leaf', 'Member'),
(6, 'Luck Voltia', 'luck.png', 11000, 'Thunder Magic', '3 Leaf', 'Member'),
(7, 'Vannesa Enoteca', 'vanessa.png', 10000, 'Red Thread of Fate Magic', '3 Leaf', 'Member'),
(8, 'Gauche Adlai', 'gauche.png', 9000, 'Mirror Magic', '3 Leaf', 'Member'),
(9, 'Zora Ideale', 'zora.png', 7500, 'Trap Magic', '3 Leaf', 'Member'),
(10, 'Henry Legolant', 'henry.png', 8900, 'Black Bulls Magic', '3 Leaf', 'Member'),
(11, 'Magna Swing', 'magna.png', 7400, 'Fire Magic', '3 Leaf', 'Member'),
(12, 'Finral Roulacase', 'finral.png', 8000, 'Teleportation Magic', '3 Leaf', 'Member'),
(13, 'Secre Swallowtail', 'secre.png', 8500, 'Forbidden Magic', '3 Leaf', 'Member'),
(14, 'Gordon Agrippa', 'gordon.png', 5000, 'Poison Magic', '3 Leaf', 'Member'),
(15, 'Grey', 'grey.png', 7000, 'Transformation Magic', '3 Leaf', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `cloverkingdom`
--

CREATE TABLE `cloverkingdom` (
  `Squad Name` varchar(20) NOT NULL,
  `Captain` varchar(20) NOT NULL,
  `Rank` int(11) NOT NULL,
  `Power` int(11) NOT NULL,
  `Stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cloverkingdom`
--

INSERT INTO `cloverkingdom` (`Squad Name`, `Captain`, `Rank`, `Power`, `Stars`) VALUES
('Golden Dawn', 'William Vangeance', 1, 97800, 125),
('Black Bull', 'Yami Sukehiro', 2, 103100, 101),
('Silver Eagle', 'Nozel Silva', 3, 89000, 95),
('Blue Rose', 'Charlotte Roselei', 4, 77000, 83),
('Crimson Lion', 'Fuegoleon Vermilion', 5, 100000, 76),
('Green Mantis', 'Jack The Ripper', 6, 73000, 69),
('Coral Peacock', 'Dorothy Unsworth', 7, 71000, 67),
('Purple Orca', 'Kaiser Granvorka', 8, 67000, 51),
('Azure Deer', 'Rill Boismortier', 9, 68000, 49);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phonenumber`) VALUES
(1, 'ninini', '$2y$10$5gY3Qj0/bpF1mJ.SGzVSAuBFmSk418Z9nDxIAJq4iJEH7jdSOxtHy', 'ninini@gmail.com', 812532319),
(2, 'kikiki', '$2y$10$zYsaGLMtC2K5vEqE3NYGleJrmvY.JinpKdMTgumkBRhNy1bez0vtu', 'kikiki@gmail.com', 1234),
(3, 'hihihi', '$2y$10$ggsUTX.BPaTnZqok5CDoaeFq5GKni1uWf36w1oZ1BjqZCPjzcm3ee', '123@sad', 1234),
(4, 'tititi', '$2y$10$wKpY/yk6whO36WOK6/OmwOS/6ZwnffBiwYr5Je9BN0Y/iY3WAV11.', 'tititi@titi.ti', 912039),
(5, 'risky kurniawan', '$2y$10$Ug6u5wTgY9.W3GXE3svmUu/DB4NfBOYJdz3LmQCCfHYmJ6.tgw4ne', '1@2.com', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blackbulls`
--
ALTER TABLE `blackbulls`
  ADD PRIMARY KEY (`Rank`);

--
-- Indexes for table `cloverkingdom`
--
ALTER TABLE `cloverkingdom`
  ADD PRIMARY KEY (`Rank`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blackbulls`
--
ALTER TABLE `blackbulls`
  MODIFY `Rank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `cloverkingdom`
--
ALTER TABLE `cloverkingdom`
  MODIFY `Rank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
