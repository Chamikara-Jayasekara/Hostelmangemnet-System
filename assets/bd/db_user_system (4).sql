-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 06:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_user_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hostal_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `name`, `address`, `no_of_rooms`, `userid`, `hostal_type`, `updated_at`) VALUES
(21, 'Arunachalam Hall', 'GALAHA ROAD', 150, 3, 'Male', '00:00:00'),
(22, 'Akbar Nell Hall', 'GAMPOLA ROAD', 500, 3, 'Male', '00:00:00'),
(23, 'Jayathilake Hall', 'GALAHA ROAD', 150, 3, 'Male', '00:00:00'),
(24, 'Marrs Hall', 'RAJAWATTA ROAD', 160, 3, 'Male', '00:00:00'),
(25, 'Marcus Fernando Hall', 'UDA PERADENIYA ROAD', 100, 3, 'Male', '00:00:00'),
(26, 'Nishmi Hall', 'GAMPOLA ROAD', 40, 3, 'Male', '00:00:00'),
(27, 'Sarasaviuyana Hall', 'RAJAWATTHA', 100, 3, 'Female', '00:00:00'),
(28, 'Hindagala Hall', 'HINDAGALA', 24, 3, 'Male', '00:00:00'),
(29, 'James Peris Hall', 'GALAHA ROAD', 100, 3, 'Male', '00:00:00'),
(30, 'Ramanathan Hall', 'GALAHA ROAD', 300, 3, 'Female', '00:00:00'),
(31, 'Sangamitta Hall', 'GALAHA ROAD', 250, 3, 'Female', '00:00:00'),
(32, 'Hilda Obeysekara Hall', 'GALAHA ROAD', 400, 3, 'Female', '00:00:00'),
(33, 'Wijewardana Hall', 'GALAHA ROAD', 300, 3, 'Female', '00:00:00'),
(34, 'Ivor Jennings Hall', 'UDA PERADENIYA', 200, 3, 'Male', '00:00:00'),
(35, 'Kehelpannala  Bikku Hostel', 'GAMPOLA ROAD', 40, 3, 'Bikku', '00:00:00'),
(36, 'Sangaramaya  Bikku Hostel', 'GAMPOLA ROAD', 40, 3, 'Bikku', '00:00:00'),
(37, 'Ediriweera Sarachchandra Hall', 'GAMPOLA ROAD', 200, 3, 'Female', '00:00:00'),
(38, 'Gunapala Malalasekara Hall', 'GAMPOLA ROAD', 200, 3, 'Female', '00:00:00'),
(39, 'Lalith Athulathmudali Hall', 'UDA PERADENIYA', 80, 3, 'Female', '00:00:00'),
(40, 'Sarasavi Medura Hall', 'GALAHA ROAD', 80, 3, 'Female', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `latepass`
--

CREATE TABLE `latepass` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `regno` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `leavedate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `arrivaldate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `leavetime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `arrivaltime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `reason` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `actions` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `latepass`
--

INSERT INTO `latepass` (`id`, `name`, `regno`, `leavedate`, `arrivaldate`, `leavetime`, `arrivaltime`, `userid`, `reason`, `actions`, `updated_at`, `created_at`, `email`) VALUES
(14, 'yashodha kithmini', 'S/15/523', '2020-3-13', '2020-3-14', '12.48 PM', '12.48 PM', 2, 'CRicekt tournament', 'Approved', '13:01:39', '2020-03-13 07:19:22', ''),
(15, 'kobaaaaaaaa', 's15916', '2021-2-5', '2012-2-2', '10.00', '12.00', 2, 'jungle', 'Not Approved', '13:01:58', '2020-03-13 07:21:30', ''),
(16, 'Mahesh Jayasekara', 's/18/945', '2020-3-13', '2021-4-5', '1.00', '3.00', 2, 'go to the class', '', '00:00:00', '2020-03-13 07:58:57', ''),
(17, 'Jewelry', 'd', 'd', 'dd', 'dd', 'dd', 2, 'ddd', '', '00:00:00', '2020-03-13 08:00:29', ''),
(18, 'Jewelry', 'ss', 'ss', 's', 's', 's', 2, 's', 'Approved', '13:32:56', '2020-03-13 08:01:29', ''),
(19, 'Mahesh', 's/16/956', '2020-3-14', '2020-3-15', '12.00', '8.00', 2, 'corona yako', 'Not Approved', '23:10:42', '2020-03-14 15:12:47', ''),
(20, 'My store.LK', '', '', '', '', '', 3, '', 'Not Approved', '09:59:49', '2020-03-15 04:29:37', ''),
(21, 'APPIT', 'ffsd', 'fff', 'fff', 'fff', 'fff', 3, 'fff', 'Approved', '11:16:18', '2020-03-15 05:45:46', ''),
(22, 'Mahesh Jayasekara', 'S/15/916', '2020-3-15', '2020-3-15', '2020-3-15', '2020-3-15', 3, '2020-3-15', 'Not Approved', '19:21:23', '2020-03-15 05:51:54', 'chamikarabandarauop@gmail.com\r\n'),
(23, 'chamikara bandara', 'S/15/916', '2020-3-16', '2020-3-17', '5.00AM', '12.00 PM', 2, 'Picketing', 'Not Approved', '15:54:39', '2020-03-16 08:52:55', ''),
(24, 'Yashodha Kithmini', 'S/15/523', '2020-3-17', '2020-3-18', '6.00PM', '10.00PM', 3, 'Poster Compaign', '', '00:00:00', '2020-03-17 08:03:25', ''),
(25, 'chamikara_J', 'S/15/918', '2020-3-18', '2020-3-19', '10.00AM', '12.00PM', 3, 'KUPPIYAK', 'Not Approved', '18:49:37', '2020-03-18 04:09:53', ''),
(26, 'kobaaaaaaaa', 's/15/892', '2020-3-18', '2020-3-19', '10.15am', '10.25p,m', 3, 'damn shit uba hukapan sabee', 'Not Approved', '11:37:43', '2020-03-18 04:46:32', ''),
(27, 'APPIT', 'MGT/12/501', '2020-3-18', '2020-3-19', '10.00AM', '12.00PM', 3, 'GOING CLASS', 'Approved', '12:18:05', '2020-03-18 06:47:44', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `bulbs` int(11) NOT NULL,
  `nkey` int(11) NOT NULL,
  `tables` int(11) NOT NULL,
  `chairs` int(11) NOT NULL,
  `racks` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `cupboard` int(11) NOT NULL,
  `updated_at` time NOT NULL,
  `student1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student4` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hallid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room1`
--

CREATE TABLE `room1` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `bulbs` int(11) NOT NULL,
  `nkey` int(11) NOT NULL,
  `tables` int(11) NOT NULL,
  `chairs` int(11) NOT NULL,
  `racks` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `cupboard` int(11) NOT NULL,
  `updated_at` time NOT NULL,
  `student1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `hallid` int(11) NOT NULL,
  `beds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room1`
--

INSERT INTO `room1` (`id`, `name`, `number`, `bulbs`, `nkey`, `tables`, `chairs`, `racks`, `created_at`, `cupboard`, `updated_at`, `student1`, `student2`, `student3`, `student4`, `userid`, `hallid`, `beds`) VALUES
(24, 'Marrs Hall', 70, 2, 3, 3, 4, 0, '2020-03-19 11:24:11', 4, '14:08:22', '', '', '', '', 3, 24, 4),
(26, 'Gunapala Malalasekara Halll', 25, 2, 2, 2, 2, 2, '2020-03-19 14:57:44', 2, '00:00:00', '', '', '', '', 3, 38, 2),
(27, 'Sarasaviuyana Hall', 50, 3, 3, 3, 3, 3, '2020-03-19 15:41:05', 3, '00:00:00', '', '', '', '', 3, 27, 3),
(28, 'Ediriweera Sarachchandra Hall', 7, 2, 2, 2, 2, 2, '2020-03-19 15:41:39', 2, '00:00:00', '', '', '', '', 3, 37, 2),
(30, 'Marcus Fernando Hall', 0, 0, 0, 0, 0, 0, '2020-03-19 16:00:46', 0, '00:00:00', '', '', '', '', 3, 0, 0),
(31, 'Arunachalam Hall', 63, 1, 1, 1, 1, 1, '2020-03-19 17:50:13', 1, '18:15:53', 'koba', 'ataya', 'matta', 'gemba', 2, 0, 1),
(32, 'Sangamitta Hall', 2, 2, 2, 2, 2, 2, '2020-03-19 18:15:11', 2, '00:00:00', '', '', '', '', 2, 0, 2),
(33, 'Arunachalam Hall', 54, 2, 2, 2, 2, 1, '2020-03-19 18:44:33', 2, '00:00:00', '', '', '', '', 2, 24, 2),
(34, 'Arunachalam Hall', 12, 1, 1, 1, 1, 1, '2020-03-19 18:50:53', 1, '00:00:00', '', '', '', '', 2, 0, 1),
(35, 'Marrs Hall', 6, 2, 2, 2, 2, 2, '2020-03-19 21:41:56', 2, '00:00:00', '', '', '', '', 2, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `registration_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `faculty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` longblob NOT NULL,
  `roomno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hallname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `complain` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `latepayment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `payemntprice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `nic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `registration_number`, `faculty`, `year`, `course`, `address`, `DOB`, `image`, `roomno`, `hallname`, `complain`, `latepayment`, `payemntprice`, `userid`, `nic`, `created_at`, `updated_at`, `phone`, `gender`) VALUES
(55, 'Mahesh Bandara', 's15916', 'Faculty of Arts', '', 'Computation and management', '12/24, Horahena', '1995-11-24', '', '', '', '', '', '', 3, '95325981v', '2020-03-01 08:06:26', '2020-03-17 11:31:25', '0779710981', 'male'),
(56, 'chammi', 's15916', 'Faculty of Science', '4th Year', 'Computation and management', '12/24, Horahena', '1995-11-24', '', '', '', '', '', '', 5, '95325981v', '2020-03-01 15:09:37', '2020-03-02 14:00:24', '0779710981', 'male'),
(57, 'dilsha umayangi', 's158956', 'Faculty of Science', '3rd Year', 'Computer science', 'mathara', '1994-2-16', '', '', '', '', '', '', 8, '942533214v', '2020-03-02 13:46:24', '2020-03-02 13:46:24', '0779710981', 'male'),
(58, 'chamikara bandara', 'S/15/916', 'Faculty of Science', '4th Year', 'Computation and management', 'Hokanadara East', '1995-11-24', '', '', '', '', '', '', 2, '953292220v', '2020-03-16 08:51:11', '2020-03-16 08:51:11', '0773265571', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 1,
  `regno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `faculty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `dob`, `photo`, `token`, `token_expire`, `created_at`, `verified`, `deleted`, `regno`, `faculty`, `year`) VALUES
(1, '', '', '$2y$10$gwSxZEU1jzHNS9zHoFQFn.mUlCW5boUmHtx/UdKehg/sN3dSeatNK', '', '', '', '', 'ebdd655c76433', '2020-03-15 07:14:20', '2020-02-17 18:10:34', 0, 1, '', '', ''),
(2, 'University Of Peradeniya', 'upulithapathum@gmail.com', '$2y$10$TbmzL1l8VIudrw6ehgxJ/.7pTSLtndQEveBKwJ/cvd2epUcLDdBNq', '', '', '', '', '', '2020-02-18 05:32:10', '2020-02-18 05:32:10', 0, 1, '', '', ''),
(3, 'University Of Peradeniya', 'jsekaramahesh@gmail.com', '$2y$10$hUWM6C0UuJM5MjfR4JkrBu8VA2Tr4EpipkbTwrfd.31pwdRC3WAGO', '', '', '', '', '2f55e7695653f', '2020-02-25 17:38:31', '2020-02-18 05:54:32', 0, 1, '', '', ''),
(4, 'Mahesh Jayasekara', 'mystore.lk2019@gmail.com', '$2y$10$.8hjZLuJd595fjXCtvt3f.rxyJ1M5Zg3TWoH3mQVN8stfcKAJ/iq2', '', '', '', '', '', '2020-02-20 05:48:46', '2020-02-20 05:48:46', 0, 1, '', '', ''),
(5, 'chamikara bandara', 'chamikarabandarauop@gmail.com', '$2y$10$ViPE8HKEvviIt9BPuP9reezKSZ68aPLXtNxFAWOWXLPAOVXGUAchq', '', '', '', '', 'e48ed1e556dea', '2020-03-15 09:09:04', '2020-02-25 17:22:59', 0, 1, '', '', ''),
(6, 'Sachith shehan', 'saccha@gmail.com', '$2y$10$TZ5oR0WIp6Q/YrkW5KpAzOM1xIQ9NTKkKVO7hc.0nCq2oGrQIK2H.', '', '', '', '', '', '2020-02-27 06:38:23', '2020-02-27 06:38:23', 0, 1, '', '', ''),
(7, 'Mahesh Jayasekara', 'yashodhakithmini999@gmail.com', '$2y$10$NDNK1RdHLxbvXiSxZlwMZeSVVw0NeDJ3sElzhaaRYMkkR3p3jqyMy', '', '', '', '', '', '2020-03-01 15:35:14', '2020-03-01 15:35:14', 0, 1, '', '', ''),
(8, 'dilsha', 'dilshauhh@gmail.com', '$2y$10$Pw5Q/xUqKSYmtcRbgv/cVeMjsgz.jlUQLIe0heDAUngmiMvbYKWEC', '', '', '', '', '', '2020-03-02 13:43:29', '2020-03-02 13:43:29', 0, 1, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `latepass`
--
ALTER TABLE `latepass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `hallid` (`hallid`);

--
-- Indexes for table `room1`
--
ALTER TABLE `room1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `hallid` (`hallid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_ibfk_1` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `latepass`
--
ALTER TABLE `latepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room1`
--
ALTER TABLE `room1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `hall_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `latepass`
--
ALTER TABLE `latepass`
  ADD CONSTRAINT `latepass_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`hallid`) REFERENCES `hall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
