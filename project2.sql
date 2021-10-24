-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2020 at 01:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID`, `Name`, `Description`, `Price`, `Quantity`) VALUES
(25, 'Naman', 'asdasasdasdas', 91, 100),
(26, 'test', 'This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.', 190, 199),
(27, 'Hello', 'Testinggg.....', 90, 1000),
(28, 'dummy', 'This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random text and i am writing this thing for no reason.This is a random', 156, 1999);

-- --------------------------------------------------------

--
-- Table structure for table `item_img`
--

CREATE TABLE `item_img` (
  `ID` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_img`
--

INSERT INTO `item_img` (`ID`, `itemid`, `image`) VALUES
(23, 25, 'uploads/image/namansngh64/Untitled12020-09-12;01-32-19pm.png'),
(24, 26, 'uploads/image/namansngh64/scheduling2020-09-12;01-35-28pm.png'),
(25, 27, 'uploads/image/namansngh64/poppies-1369329-639x4262020-09-12;01-37-46pm.jpg'),
(26, 28, 'uploads/image/namansngh64/poppies-1369329-639x4262020-09-12;01-38-14pm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `ID` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `confirm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_order`
--

INSERT INTO `item_order` (`ID`, `i_id`, `c_id`, `confirm`) VALUES
(1, 14, 1, 0),
(2, 17, 1, 2),
(3, 20, 1, 1),
(4, 22, 1, 1),
(5, 19, 1, 1),
(6, 14, 2, 1),
(7, 18, 1, 1),
(8, 23, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserID` varchar(255) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `ID` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `LastName`, `UserID`, `Password`, `ID`, `active`) VALUES
('Sumit', 'Negi', 'sumit@gmail.com', 'sumit', 1, 1),
('Naman', 'Singh', 'naman007@gmail.com', 'naman', 2, 1),
('hacker', 'team', 'hackersteam64@gmail.com', 'hacker', 12, 1),
('test', '1', 'test1@gmail.com', 'test', 13, 1),
('naman', 'singh', 'naman@gmail.com', 'naman', 14, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item_img`
--
ALTER TABLE `item_img`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `item_img`
--
ALTER TABLE `item_img`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
