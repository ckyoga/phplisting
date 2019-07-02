-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 02, 2019 at 07:41 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `return_distance` (`lat_a` DOUBLE, `long_a` DOUBLE, `lat_b` DOUBLE, `long_b` DOUBLE) RETURNS DOUBLE BEGIN
DECLARE distance DOUBLE;
SET distance = SIN(RADIANS(lat_a)) * SIN(RADIANS(lat_b))
+ COS(RADIANS(lat_a))
* COS(RADIANS(lat_b))
* COS(RADIANS(long_a - long_b));
RETURN((DEGREES(ACOS(distance))) * 69.09);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `mlsNumber` int(10) UNSIGNED NOT NULL,
  `address` varchar(50) NOT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `area` varchar(20) NOT NULL,
  `salesPrice` decimal(10,2) NOT NULL,
  `dateListed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bedrooms` tinyint(4) DEFAULT NULL,
  `bathrooms` tinyint(4) DEFAULT NULL,
  `garageSize` smallint(6) DEFAULT NULL,
  `squareFeet` smallint(6) DEFAULT NULL,
  `lotSize` tinyint(4) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`mlsNumber`, `address`, `address2`, `city`, `state`, `zipcode`, `area`, `salesPrice`, `dateListed`, `bedrooms`, `bathrooms`, `garageSize`, `squareFeet`, `lotSize`, `description`) VALUES
(208, '208 great lane', NULL, 'Boulder', 'CO', '84999', '', '0.00', '2019-07-01 07:41:38', NULL, NULL, NULL, NULL, NULL, 'How can you say no to this one.'),
(2088, '208 final', NULL, 'Pleasantville', 'NV', '98333', '', '0.00', '2019-07-01 08:04:44', NULL, NULL, NULL, NULL, NULL, 'One story home on a quiet street'),
(3344, '383 medea creek lane', NULL, 'oak park', 'ca', '91377', 'conejo valley', '749000.00', '2019-07-01 06:49:21', 3, 2, 900, 1700, 0, 'Great sleepy neighborhood behind Oak Park High School'),
(4523, '23rd street', NULL, '', '', NULL, '', '0.00', '2019-07-02 07:32:18', NULL, NULL, NULL, NULL, NULL, 'Great location by lake'),
(4567, '23 smart street', NULL, '', '', NULL, '', '0.00', '2019-07-02 06:46:35', NULL, NULL, NULL, NULL, NULL, 'Close to downtown and china town.'),
(7456, '74th street', NULL, '', '', NULL, '', '0.00', '2019-07-02 07:19:42', NULL, NULL, NULL, NULL, NULL, 'Downtown oasis'),
(12219, '122 street', NULL, '', '', NULL, '', '0.00', '2019-07-02 06:49:08', NULL, NULL, NULL, NULL, NULL, 'Close to cal');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photoid` int(10) UNSIGNED NOT NULL,
  `description` text,
  `phpid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `userType` enum('public','author','admin') DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` char(40) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userType`, `username`, `email`, `pass`, `dateAdded`) VALUES
(1, 'public', 'publicUser', 'public@example.com', '390d938f809f8ce397f29c28b1c2365ba79779b0', '2019-07-01 05:10:45'),
(2, 'author', 'authorUser', 'author@example.com', '0a7febe6dd39def478cbd8da188ba4005cdc25ec', '2019-07-01 05:10:45'),
(3, 'admin', 'adminUser', 'admin@example.com', '0f4afdf3a12e95916d9750debbcff3999a502aa9', '2019-07-01 05:10:45'),
(108, NULL, 'barney', 'b@b.com', '1ee7760a3190c95641442f2be0ef7774e139fb1f', '2019-07-02 06:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `xref_listings_photos`
--

CREATE TABLE `xref_listings_photos` (
  `mlsNumber` int(10) UNSIGNED NOT NULL,
  `photoid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`mlsNumber`),
  ADD KEY `city` (`city`),
  ADD KEY `state` (`state`),
  ADD KEY `zipcode` (`zipcode`),
  ADD KEY `bedrooms` (`bedrooms`),
  ADD KEY `bathrooms` (`bathrooms`),
  ADD KEY `squareFeet` (`squareFeet`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photoid`),
  ADD KEY `phpid` (`phpid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `login` (`email`,`pass`);

--
-- Indexes for table `xref_listings_photos`
--
ALTER TABLE `xref_listings_photos`
  ADD PRIMARY KEY (`mlsNumber`,`photoid`),
  ADD KEY `mlsNumber` (`mlsNumber`),
  ADD KEY `photoid` (`photoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photoid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;