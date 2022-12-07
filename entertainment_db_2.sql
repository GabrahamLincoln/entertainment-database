-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 01:28 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entertainment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `crew` (
  `crew_id` varchar(12) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actor`
--

INSERT INTO `crew` (`crew_id`, `fname`, `lname`) VALUES
('1', 'John', 'Doe'),
('2', 'Jane', 'Doe'),
('3', 'Jim', 'Doe'),
('4', 'Jenny', 'Doe');

-- --------------------------------------------------------

--
-- Table structure for table `acts_in`
--

CREATE TABLE `works_on` (
  `crew_id` varchar(12) NOT NULL,
  `entertainment_eid` int(5) NOT NULL
  `job` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acts_in`
--

INSERT INTO `works_on` (`crew_id`, `entertainment_eid`, `job`) VALUES
('1', '1', 'Actor'),
('1', '2', 'Actor'),
('1', '3', 'Actor'),
('1', '4', 'Actor'),
('2', '1', 'Actor'),
('2', '2', 'Actor'),
('3', '1', 'Actor'),
('3', '2', 'Actor'),
('1', '1', 'Director'),
('1', '2', 'Director'),
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('administrator', 'P@ssw0rd2'),
('adminSimrat', 'P@ssw0rd');

-- --------------------------------------------------------

--
-- Table structure for table `available_in`
--

CREATE TABLE `available_in` (
  `eid` int(5) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `theatre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_in`
--

INSERT INTO `available_in` (`eid`, `city_name`, `theatre_name`) VALUES
(1, 'Calgary', 'Chinook'),
(7, 'Calgary', 'Chinook'),
(1, 'Calgay', 'Market_Mall');

-- --------------------------------------------------------

--
-- Table structure for table `available_on`
--

CREATE TABLE `available_on` (
  `eid` int(5) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_on`
--

INSERT INTO `available_on` (`eid`, `url`) VALUES
(1, 'www.amazonPrime.com'),
(1, 'www.hotStar.com'),
(1, 'www.netflix.com'),
(7, 'www.youtube.com'),
(7, 'www.amazonPrime.com');

-- --------------------------------------------------------

--
-- Table structure for table `city_theater_name`
--

CREATE TABLE `city_theater_name` (
  `city_name` varchar(20) NOT NULL,
  `theatre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_theater_name`
--

INSERT INTO `city_theater_name` (`city_name`, `theatre_name`) VALUES
('Calgary', 'Chinook'),
('Calgary', 'CrossIron'),
('Calgay', 'Market_Mall'),
('Calgay', 'University Ave'),
('Edmonton', 'Theater_edm'),
('Edmonton', 'Theater_edm_2'),
('Vancouver', 'Cinema_van'),
('Vancouver', 'Theater_van');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `ssn` varchar(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`ssn`, `fname`, `lname`) VALUES
('123-123-1234', 'John', 'Doe_Director'),
('123451234567', 'director2', 'last2'),
('1234567', 'Director', 'Boy'),
('123456789009', 'director1', 'last1');

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `eid` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT '''no type''',
  `rating` decimal(5,0) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `prod_pid` int(5) NOT NULL,
  `dir_ssn` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entertainment`
--

INSERT INTO `entertainment` (`eid`, `name`, `type`, `rating`, `date`, `prod_pid`, `dir_ssn`) VALUES
(1, 'James Bond', 'Movie', '0', '2016-07-22', 1, '1234567'),
(2, 'Avengers', 'Movie', '0', '2020-12-22', 1, '1234567'),
(3, 'James Bond', '', '0', '2022-11-18', 1234, '123-123-1234'),
(4, 'The Test Movie', 'test', '0', '2022-11-18', 1234, '123-123-1234'),
(5, 'Test', 'Sci-Fi', '5', '2018-07-22', 1234, '123451234567');

-- --------------------------------------------------------

--
-- Table structure for table `hires`
--

CREATE TABLE `hires` (
  `prod_pid` int(5) NOT NULL,
  `director_ssn` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hires`
--

INSERT INTO `hires` (`prod_pid`, `director_ssn`) VALUES
(1234, '1234567'),
(1234, '123451234567');

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `url` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`url`, `name`) VALUES
('www.amazonPrime.com', 'Amazon_Prime'),
('www.hotStar.com', 'Hotstar'),
('www.netflix.com', 'NetFlix'),
('www.youtube.com', 'YouTube');

-- --------------------------------------------------------

--
-- Table structure for table `productioncompany`
--

CREATE TABLE `productioncompany` (
  `pid` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productioncompany`
--

INSERT INTO `productioncompany` (`pid`, `name`, `address`) VALUES
(1234, 'The Production Company', 'Calgary'),
(123456, 'qwerty', 'qwert'),
(3243432, 'the orod c', 'dfsg'),
(2147483647, 'delete', 'this');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Num_Reviews` int(11) NOT NULL DEFAULT 0,
  `Rating` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Num_Reviews`, `Rating`) VALUES
('4352345', 'werwterwret', 0, 0),
('administrator', 'P@ssw0rd2', 5, 5),
('administrator234', 'P@ssw0rd2', 0, 2),
('administrator4654', 'P@ssw0rd2', 0, 0),
('administrator67676', 'P@ssw0rd2', 0, 0),
('administratordas', 'P@ssw0rd2', 0, 5),
('newRegisterUser', 'P@ssw0rd7', 0, 0),
('newuser', 'asdfasdfasfad', 0, 0),
('Simrat', 'P@ssword', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`ssn`);

--
-- Indexes for table `acts_in`
--
ALTER TABLE `acts_in`
  ADD KEY `fkey_actor` (`actor_ssn`),
  ADD KEY `fkey_entertainment` (`entertainment_eid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `available_in`
--
ALTER TABLE `available_in`
  ADD UNIQUE KEY `pkey_theater_name_ai` (`theatre_name`,`eid`) USING BTREE;

--
-- Indexes for table `available_on`
--
ALTER TABLE `available_on`
  ADD KEY `fkey_eid` (`eid`),
  ADD KEY `fkey_platform_url` (`url`);

--
-- Indexes for table `city_theater_name`
--
ALTER TABLE `city_theater_name`
  ADD UNIQUE KEY `pkey_theater_name` (`city_name`,`theatre_name`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`ssn`);

--
-- Indexes for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `fkey_prod_pid` (`prod_pid`),
  ADD KEY `fkey_dir_ssn` (`dir_ssn`);

--
-- Indexes for table `hires`
--
ALTER TABLE `hires`
  ADD KEY `fkey_directorSSN` (`director_ssn`),
  ADD KEY `fkey_prodPID` (`prod_pid`) USING BTREE;

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`url`);

--
-- Indexes for table `productioncompany`
--
ALTER TABLE `productioncompany`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acts_in`
--
ALTER TABLE `acts_in`
  ADD CONSTRAINT `fkey_actor` FOREIGN KEY (`actor_ssn`) REFERENCES `actor` (`ssn`),
  ADD CONSTRAINT `fkey_entertainment` FOREIGN KEY (`entertainment_eid`) REFERENCES `entertainment` (`eid`);

--
-- Constraints for table `available_on`
--
ALTER TABLE `available_on`
  ADD CONSTRAINT `fkey_eid` FOREIGN KEY (`eid`) REFERENCES `entertainment` (`eid`),
  ADD CONSTRAINT `fkey_platform_url` FOREIGN KEY (`url`) REFERENCES `platform` (`url`);

--
-- Constraints for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD CONSTRAINT `fkey_dir_ssn` FOREIGN KEY (`dir_ssn`) REFERENCES `director` (`ssn`),
  ADD CONSTRAINT `fkey_prod_pid` FOREIGN KEY (`prod_pid`) REFERENCES `productioncompany` (`pid`);

--
-- Constraints for table `hires`
--
ALTER TABLE `hires`
  ADD CONSTRAINT `fkey_directorSSN` FOREIGN KEY (`director_ssn`) REFERENCES `director` (`ssn`),
  ADD CONSTRAINT `fkey_prodPID` FOREIGN KEY (`prod_pid`) REFERENCES `productioncompany` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
