-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 02:37 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compiler`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `test_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `question` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`test_id`, `name`, `question`) VALUES
(1, 'try1', 'Due to the COVID pandemic, people have been advised to stay at least 6 feet away from any other person. Now, people are lining up in a queue at the local shop and it is your duty to check whether they are all following this advice.\r\n\r\nThere are a total of N spots (numbered 1 through N) where people can stand in front of the local shop. The distance between each pair of adjacent spots is 1 foot. Each spot may be either empty or occupied; you are given a sequence A1,A2,…,AN, where for each valid i, Ai=0 means that the i-th spot is empty, while Ai=1 means that there is a person standing at this spot. It is guaranteed that the queue is not completely empty.\r\n\r\nFor example, if N=11 and the sequence A is (0,1,0,0,0,0,0,1,0,0,1), then this is a queue in which people are not following the advice because there are two people at a distance of just 3 feet from each other.\r\n\r\nYou need to determine whether the people outside the local shop are following the social distancing advice or not. As long as some two people are standing at a distance smaller than 6 feet from each other, it is bad and you should report it, since social distancing is not being followed.\r\n\r\nInput\r\nThe first line of each test case contains a single integer N.\r\nThe next line contains N space-separated integers A1,A2,…,AN.\r\nOutput\r\nFor each test case, print a single line containing the string \"YES\" if social distancing is being followed or \"NO\" otherwise (without quotes).\r\n\r\nConstraints\r\n1≤N≤100\r\n0≤Ai≤1 for each valid i\r\nat least one spot is occupied\r\nSubtasks\r\nSubtask #1 (100 points): original constraints\r\n\r\nExample Input\r\n3\r\n1 0 1\r\nExample Output\r\nNO\r\nExplanation\r\nExample case 1: The first and third spots are occupied and the distance between them is 2 feet.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `testcase`
--

CREATE TABLE `testcase` (
  `test_id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `tcase` varchar(255) NOT NULL,
  `expop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testcase`
--

INSERT INTO `testcase` (`test_id`, `number`, `tcase`, `expop`) VALUES
(1, '1', '3\r\n1 0 1', 'NO'),
(1, '1', '7\r\n1 0 0 0 0 0 1', 'YES');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
