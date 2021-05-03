-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 12:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `Audio_ID` int(11) NOT NULL,
  `Uname` varchar(20) NOT NULL,
  `Audio_Path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`Audio_ID`, `Uname`, `Audio_Path`) VALUES
(1, 'testuser', 'C:\\xampp\\htdocs\\gradproject\\audio\\asddd.mp3'),
(2, 'mohamadadmin', 'C:\\xampp\\htdocs\\gradproject\\audio\\aud2.mp3'),
(3, 'testuser', 'C:\\xampp\\htdocs\\gradproject\\audio\\testaudio.mp3'),
(4, 'testuser', 'C:\\xampp\\htdocs\\gradproject\\audio\\audio3.mp3'),
(5, 'nassar', 'C:\\xampp\\htdocs\\gradproject\\audio\\testaudio.mp3'),
(6, 'testuser', 'C:\\xampp\\htdocs\\gradproject\\audio\\audio3.mp3'),
(7, 'mohamadadmin', 'C:\\xampp\\htdocs\\gradproject\\audio\\audio5544.mp3'),
(8, 'testuser', 'C:\\xampp\\htdocs\\gradproject\\audio\\testaudio.mp3'),
(9, 'hnajdi', 'C:\\xampp\\htdocs\\gradproject\\audio\\audio2.mp3'),
(10, 'mohamadadmin', 'C:\\xampp\\htdocs\\gradproject\\audio\\audio1.mp3'),
(11, 'mohamadadmin', 'C:\\xampp\\htdocs\\gradproject\\audio\\audio2.mp3'),
(12, 'mohamadadmin', 'C:\\xampp\\htdocs\\gradproject\\audio\\audio5544.mp3'),
(13, 'mohamadadmin', 'C:\\xampp\\htdocs\\gradproject\\audio\\record0.mp3'),
(14, 'mohamadadmin', 'C:\\xampp\\htdocs\\gradproject\\audio\\audio1.mp3'),
(15, 'testuser', 'C:\\xampp\\htdocs\\gradproject\\audio\\audio5544.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `Complaint_ID` int(11) NOT NULL,
  `Full Name` varchar(40) NOT NULL,
  `Message` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`Complaint_ID`, `Full Name`, `Message`) VALUES
(1, 'Mohamad Salhab', 'test message'),
(2, 'Mohamad Salhab', 'test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test message test mes'),
(3, 'mohamad', 'badbabdad'),
(4, 'hadi', 'hi test'),
(5, 'yasser', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `First Name` varchar(20) NOT NULL,
  `Last Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Country` text NOT NULL,
  `State` text NOT NULL,
  `City` text NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `First Name`, `Last Name`, `Email`, `Password`, `Username`, `Country`, `State`, `City`, `Image`) VALUES
(1, 'testme', 'test2', 'testoftest@gmail.com', '223', 'test', 'Angola', 'Luanda', 'Luanda', '1617904627userphoto.png'),
(2, 'mohamad ali', 'salhab', 'moh@gmail.com', '321', 'moh', 'Belgium', 'Flanders', 'Balen', '1617839897user3.png'),
(14, 'mohamad', 'salhab', 'mohamad@gmail.com', '3431', 'moeeee', 'Chad', 'Ennedi-Est', 'Am Djarass', '1617846906imagetest.jpeg'),
(15, 'hadi', 'najdi', 'hn@gmail.com', 'asdasd@ASD21', 'hadinjdi', 'Colombia', 'Risaralda', 'Pueblo Rico', '1617924458userphoto.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`Audio_ID`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`Complaint_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `Audio_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `Complaint_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
