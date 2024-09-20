-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 01:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eahpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8989898980, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-01-10 08:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblambulance`
--

CREATE TABLE `tblambulance` (
  `ID` int(11) NOT NULL,
  `AmbulanceType` varchar(250) DEFAULT NULL,
  `AmbRegNum` varchar(250) DEFAULT NULL,
  `DriverName` varchar(250) DEFAULT NULL,
  `DriverContactNumber` bigint(20) DEFAULT NULL,
  `Ablemail` varchar(255) NOT NULL,
  `Ablpass` varchar(255) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblambulance`
--

INSERT INTO `tblambulance` (`ID`, `AmbulanceType`, `AmbRegNum`, `DriverName`, `DriverContactNumber`, `Ablemail`, `Ablpass`, `CreationDate`, `Status`, `UpdationDate`) VALUES
(11, '1', 'DL-123456', 'robert 1', 322023026, 'driver', '$2y$10$yd6B4XbiMdT6nh.eEOR7HufI5puLR/3V9cyULOAHt1cooVohWUOOe', '2024-09-20 06:04:55', 'Assigned', '2024-09-20 10:34:06'),
(12, '1', 'DL-123457', 'robert 1', 322023026, 'driver', '$2y$10$zIwXUwWCQ5Rh9H7NeVVKc.0aczhYUJYz074xCkfjscVwxPxyptZDC', '2024-09-20 06:12:21', NULL, NULL),
(13, '1', 'DL-123458', 'cristianaa', 322023026, 'driver', '827ccb0eea8a706c4c34a16891f84e7b', '2024-09-20 06:19:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblambulancehiring`
--

CREATE TABLE `tblambulancehiring` (
  `ID` int(11) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `PatientName` varchar(250) DEFAULT NULL,
  `RelativeName` varchar(250) DEFAULT NULL,
  `RelativeConNum` bigint(11) DEFAULT NULL,
  `hospital` varchar(255) NOT NULL,
  `UserLocation` varchar(255) NOT NULL,
  `HiringDate` varchar(250) DEFAULT NULL,
  `HiringTime` varchar(250) DEFAULT NULL,
  `AmbulanceType` int(5) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `City` mediumtext DEFAULT NULL,
  `State` mediumtext DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `AmbulanceRegNo` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblambulancehiring`
--

INSERT INTO `tblambulancehiring` (`ID`, `BookingNumber`, `PatientName`, `RelativeName`, `RelativeConNum`, `hospital`, `UserLocation`, `HiringDate`, `HiringTime`, `AmbulanceType`, `Address`, `City`, `State`, `Message`, `BookingDate`, `Remark`, `Status`, `AmbulanceRegNo`, `UpdationDate`) VALUES
(1, 292564626, 'Kishore Das', 'Manish ', 1234567899, '', '0', '2024-02-28', '22:21', 2, 'O-908, GHU, Block-7', 'Ghaziabad', 'UP', 'uuk', '2024-02-29 05:20:11', 'Patient reached Hospital', 'Reached', 'DL15RT5678', '2024-03-04 12:34:02'),
(2, 193862343, 'ewqewr', 'Manish ', 78945641235, '', '0', '2024-02-29', '23:23', 1, 'O-908, GHU, Block-7', 'Ghaziabad', 'UP', 'dfserg', '2024-02-29 05:21:41', 'Patient reached to the hospital', 'Reached', 'DL15RT5678', '2024-03-05 05:34:34'),
(3, 901408998, 'Lavanaya Singh', 'Aruna Singhaniya', 9876543210, '', '0', '2024-02-29', '15:33', 1, 'P-816 Kanvya Nagar Geetanjali Apt', 'Lucknow', 'UP', 'Arrange BLS ambulance with gynoclogist', '2024-02-29 05:28:30', 'Patient Pick form given address', 'Pickup', 'DL14RT5678', '2024-03-14 14:51:24'),
(4, 603153853, 'Amit', 'Ravi Kumar', 1425362514, '', '0', '2024-03-13', '23:04', 1, 'A 123 XYZ Society ', 'Ghaziabad', 'UP', 'NA', '2024-03-13 17:33:26', 'Patient reached at hospital', 'Reached', 'DL15RT5678', '2024-03-14 01:38:15'),
(5, 369344538, 'John Doe', 'Alex', 1234569874, '', '0', '2024-03-15', '10:15', 3, 'Hn 18/1 Xyz Apartment Mayur Vihar', 'New Delhi', 'Delhi', 'Please be on time', '2024-03-14 01:44:03', 'Reached hospital\r\n', 'Reached', 'DL15RT5678', '2024-03-14 01:46:26'),
(6, 185258573, 'John Jobs', 'Meera Madhvan', 4561237896, '', '0', '2024-03-14', '14:08', 3, 'H-908,  HPT Apartment', 'Ghaziabad', 'UP', 'Need Nurse with ambulance', '2024-03-14 14:36:45', '', 'Assigned', 'DL15RT5678', '2024-09-20 10:33:46'),
(7, 506835701, 'samsung', 'wsg', 564746, 'Jinnah Hospital Lahore Pakistan Ambulance service, Quaid-i-Azam Campus, Lahore, Pakistan', '0', '2024-09-25', '14:07', 3, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'ds', 'awrgs', '2024-09-19 09:05:45', 'soryy', 'Rejected', '', '2024-09-19 09:30:58'),
(8, 690502340, 'iphone 13 pro max', 'wsg', 3133826989, 'Jinnah International Airport, Airport Road, Faisal Cantonment, Karachi, Pakistan', '0', '2024-09-02', '14:52', 2, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'ds', 'ugiyuj', '2024-09-19 09:50:31', 'vef', 'Reached', 'DL-123456', '2024-09-19 10:01:18'),
(9, 636820173, 'sfget', 'ether', 45676543, 'Jinnah International Airport, Airport Road, Faisal Cantonment, Karachi, Pakistan', '0', '2024-10-09', '14:02', 2, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'ds', 'avsf', '2024-09-19 09:59:37', '', 'Assigned', '', '2024-09-20 10:32:05'),
(10, 969526925, 'samsung', 'wsg', 3133826989, 'Jinnah International Airport, Airport Road, Faisal Cantonment, Karachi, Pakistan', '0', '2024-09-11', '17:34', 2, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'ds', 'jhvuj', '2024-09-19 10:35:32', 'wd', 'Rejected', '', '2024-09-20 10:03:54'),
(11, 983099508, 'samsung', 'wsg', 3133826989, 'Jinnah International Airport, Airport Road, Faisal Cantonment, Karachi, Pakistan', '0', '2024-10-12', '15:39', 1, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'ds', 'vj', '2024-09-19 10:36:54', 'h', 'Assigned', 'DL-123456', '2024-09-20 10:29:11'),
(12, 326919687, 'samsung', 'wsg', 3133826989, 'Jinnah International Airport, Airport Road, Faisal Cantonment, Karachi, Pakistan', '', '2024-10-04', '15:40', 0, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'ds', 'bjj', '2024-09-19 10:39:33', 'vhvh', 'Rejected', '', '2024-09-20 10:29:32'),
(13, 150650264, 'samsung', 'wsg', 3133826989, 'Giga Mall, Sector F DHA Phase II, Islamabad, Pakistan', '', '2024-10-05', '17:42', 1, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'ds', 'a', '2024-09-19 10:42:21', 'mm', 'Rejected', '', '2024-09-20 10:29:54'),
(14, 0, '$pname', '$rname', 0, '$hospital', '$user_location', '$hdate', '$htime', 0, '$address', '$city', '$state', '$message', '2024-09-19 10:44:34', '', 'Assigned', '', '2024-09-20 10:32:23'),
(15, 822291172, 'iphone 7 plus', 'wsg', 3133826989, 'Jinnah International Airport, Airport Road, Faisal Cantonment, Karachi, Pakistan', 'SD 1, Block A North Nazimabad Town, Karachi, Karachi City, Sindh 74600, Pakistan', '2024-09-26', '22:03', 1, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'ds', 'kh', '2024-09-19 12:03:15', 'aegs', 'Reached', '', '2024-09-20 10:52:46'),
(16, 851346545, 'hasssan', 'shaheer', 73456354734, 'Liaquat National Hospital - Institute for Undergraduate and Postgraduate Medical Studies and Health Sciences, National Stadium Road, Liaquat National Hospital, Karachi, Pakistan', 'D 7, Block A North Nazimabad Town, Karachi, Karachi City, Sindh, Pakistan', '2024-09-03', '07:54', 1, 'hanifsaleem2255@gmail.com', 'karachi', 'kpk', 'jalidi aao mareez shart hony wala hai ', '2024-09-19 12:53:22', '', 'Assigned', 'DL-123456', '2024-09-20 10:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', '<div style=\"text-align: center;\"><b>Emergency Ambulance Hiring Portal</b></div><div style=\"text-align: left;\">We prioritize the well-being of our patients above all else. Thats why we offer top-notch ambulance services to ensure swift and secure medical transportation whenever the need arises. Our dedicated team of skilled paramedics and drivers is equipped with state-of-the-art ambulances, ready to respond to emergencies 24/7.<br></div><div style=\"text-align: left;\"><br></div>', NULL, NULL, '2024-03-05 05:00:17'),
(2, 'contactus', 'Contact Us', '#890 KFG Apartment, Gauri Kunj, Delhi-India.', 'test@gmail.com', 7894561236, '2024-03-05 05:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbltrackinghistory`
--

CREATE TABLE `tbltrackinghistory` (
  `ID` int(10) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `AmbulanceRegNum` varchar(250) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltrackinghistory`
--

INSERT INTO `tbltrackinghistory` (`ID`, `BookingNumber`, `AmbulanceRegNum`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 292564626, 'DL15RT5678', 'Assigned', 'Assigned', '2024-03-04 07:05:11'),
(2, 292564626, 'DL15RT5678', 'On the way', 'On the way', '2024-03-04 07:41:03'),
(3, 292564626, 'DL15RT5678', 'Ambulance Pick the patient', 'Pickup', '2024-03-04 08:03:00'),
(4, 292564626, 'DL15RT5678', 'Patient reached Hospital', 'Reached', '2024-03-04 12:34:02'),
(5, 193862343, 'DL15RT5678', 'Ambulance Has been assigned', 'Assigned', '2024-03-05 05:25:18'),
(6, 193862343, 'DL15RT5678', 'Ambulance is on the way reached soon', 'On the way', '2024-03-05 05:33:02'),
(7, 193862343, 'DL15RT5678', 'Patient has been picked', 'Pickup', '2024-03-05 05:33:20'),
(8, 193862343, 'DL15RT5678', 'Patient reached to the hospital', 'Reached', '2024-03-05 05:34:34'),
(9, 901408998, 'DL14RT5678', 'Assigned Ambulance', 'Assigned', '2024-03-05 06:51:45'),
(10, 901408998, 'DL14RT5678', 'On The way', 'On the way', '2024-03-05 06:56:50'),
(11, 603153853, 'DL15RT5678', 'Ambulance Assigned', 'Assigned', '2024-03-14 01:20:22'),
(12, 603153853, 'DL15RT5678', 'Ambulance is on the way to pick the pateint', 'On the way', '2024-03-14 01:20:49'),
(13, 603153853, 'DL15RT5678', 'Patient is picked up and w heading to the hospital', 'Pickup', '2024-03-14 01:28:53'),
(15, 603153853, 'DL15RT5678', 'Patient reached at hospital', 'Reached', '2024-03-14 01:38:15'),
(16, 369344538, 'DL15RT5678', 'Ambulance Assigned ', 'Assigned', '2024-03-14 01:45:04'),
(17, 369344538, 'DL15RT5678', 'Ambulance is on the way to pick the patient', 'On the way', '2024-03-14 01:45:41'),
(18, 369344538, 'DL15RT5678', 'Patient is picked up heading to destination', 'Pickup', '2024-03-14 01:46:07'),
(19, 369344538, 'DL15RT5678', 'Reached hospital\r\n', 'Reached', '2024-03-14 01:46:26'),
(20, 185258573, 'DL15RT5678', 'ambulance assigned', 'Assigned', '2024-03-14 14:39:45'),
(21, 901408998, 'DL14RT5678', 'Patient Pick form given address', 'Pickup', '2024-03-14 14:51:24'),
(22, 506835701, '', 'soryy', 'Rejected', '2024-09-19 09:30:58'),
(23, 690502340, 'DL-123456', 'ffbhdx', 'Assigned', '2024-09-19 09:54:47'),
(24, 185258573, 'DL15RT5678', 'tv', 'On the way', '2024-09-19 10:00:44'),
(25, 690502340, 'DL-123456', '3fv', 'On the way', '2024-09-19 10:00:55'),
(26, 690502340, 'DL-123456', 'ebge', 'Pickup', '2024-09-19 10:01:06'),
(27, 690502340, 'DL-123456', 'vef', 'Reached', '2024-09-19 10:01:18'),
(28, 851346545, 'DL-123456', 'hello', 'Assigned', '2024-09-19 12:55:32'),
(29, 969526925, '', 'wd', 'Rejected', '2024-09-20 10:03:54'),
(30, 983099508, 'DL-123456', 'h', 'Assigned', '2024-09-20 10:29:11'),
(31, 851346545, 'DL-123456', 'gch', 'On the way', '2024-09-20 10:29:23'),
(32, 326919687, '', 'vhvh', 'Rejected', '2024-09-20 10:29:32'),
(33, 150650264, '', 'mm', 'Rejected', '2024-09-20 10:29:54'),
(34, 636820173, '', '', 'Assigned', '2024-09-20 10:32:05'),
(35, 0, '', '', 'Assigned', '2024-09-20 10:32:24'),
(36, 822291172, '', '', 'Assigned', '2024-09-20 10:32:37'),
(37, 636820173, '', '', 'Assigned', '2024-09-20 10:33:33'),
(38, 185258573, 'DL15RT5678', '', 'Assigned', '2024-09-20 10:33:46'),
(39, 851346545, 'DL-123456', '', 'Assigned', '2024-09-20 10:34:06'),
(40, 822291172, '', 'aegws', 'On the way', '2024-09-20 10:52:04'),
(41, 822291172, '', 'hdrhd', 'Pickup', '2024-09-20 10:52:19'),
(42, 822291172, '', 'aegs', 'Reached', '2024-09-20 10:52:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblambulance`
--
ALTER TABLE `tblambulance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AmbRegNum` (`AmbRegNum`);

--
-- Indexes for table `tblambulancehiring`
--
ALTER TABLE `tblambulancehiring`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ablunaceid` (`AmbulanceRegNo`),
  ADD KEY `BookingNumber` (`BookingNumber`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltrackinghistory`
--
ALTER TABLE `tbltrackinghistory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `abid` (`AmbulanceRegNum`),
  ADD KEY `bid` (`BookingNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblambulance`
--
ALTER TABLE `tblambulance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblambulancehiring`
--
ALTER TABLE `tblambulancehiring`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltrackinghistory`
--
ALTER TABLE `tbltrackinghistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
