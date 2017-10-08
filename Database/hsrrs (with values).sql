-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2017 at 11:30 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hsrrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`) VALUES
(1, 'Engineering Department'),
(2, 'Housekeeping Department');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_lname` varchar(20) NOT NULL,
  `emp_fname` varchar(20) NOT NULL,
  `emp_mname` varchar(20) NOT NULL,
  `emp_contact_no` varchar(15) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_lname`, `emp_fname`, `emp_mname`, `emp_contact_no`, `pos_id`, `dept_id`) VALUES
(2015101, 'Chavez', 'Orly', 'Aguila', '091234567892', 1, 2),
(2015102, 'Meer', 'Reinan', 'Pabustan', '09945612301', 2, 2),
(2015103, 'Furuya', 'John Rafael', 'Peee', '096789123060', 3, 2),
(2015104, 'Bonifacio', 'Ralph Noel', 'Ooooo', '093456789011', 4, 2),
(2015105, 'Peralta', 'Francis Dodi', 'Acosta', '096123789035', 5, 2),
(2015106, 'Borlongan', 'Neil John', 'Ppppp', '099215814701', 1, 1),
(2015107, 'Pedralvez', 'Benjamin', 'Telan', '09321654123', 2, 1),
(2015108, 'Bregias', 'Kevin', 'Gggg', '09741852963', 3, 1),
(2015109, 'Carreon', 'Lean', 'Quiles', '09789321654', 4, 1),
(2015110, 'Ibarra', 'Kim', 'Cccc', '09357159852', 5, 1);


-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `pos_name` varchar(25) NOT NULL,
  `pos_des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `pos_name`, `pos_des`) VALUES
(1, 'Receptionist', 'Receive requests by the guest through phone call and create its ticket / can assigns the ticket'),
(2, 'Department Head', 'Assigns the ticket / leads the department'),
(3, 'Hotel Staff', 'Renders the service / can close the ticket'),
(4, 'Admin', 'have the authority to generate the ticket / Checks what is happening in both department / can see the tickets'),
(5, 'Supervisor', 'Manages the team. ');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_no` int(11) NOT NULL,
  `room_location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_no`, `room_location`) VALUES
(201, 'Lake Wing'),
(205, 'Lake Wing'),
(301, 'Mountain Wing'),
(306, 'Mountain Wing'),
(401, 'Drivers Quarters'),
(409, 'Drivers Quarters');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `tick_status` varchar(10) NOT NULL,
  `tick_priority` varchar(10) NOT NULL,
  `tick_limit` time NOT NULL,
  `tick_closed_time` datetime DEFAULT NULL,
  `tick_date` datetime NOT NULL,
  `tick_escalate` tinyint(4) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `employee_id1` int(11) DEFAULT NULL,
  `ticket_type_id` int(11) NOT NULL,
  `ticket_description_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `room_room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `tick_status`, `tick_priority`, `tick_limit`, `tick_closed_time`, `tick_date`, `tick_escalate`, `employee_id`, `employee_id1`, `ticket_type_id`, `ticket_description_id`, `department_id`, `room_room_no`) VALUES
(1, 'Closed', 'High', '00:10:00', '2017-10-04 12:00:00', '2017-10-04 11:50:00', 0, 2015103, 2015101, 1, 1, 2, 201),
(2, 'Closed', 'Low', '00:20:00', '2017-10-04 13:00:00', '2017-10-04 12:40:00', 1, 2015103, 2015103, 1, 2, 2, 205),
(3, 'Closed', 'High', '00:15:00', '2017-10-04 09:00:00', '2017-10-04 08:45:00', 1, 2015103, 2015102, 1, 3, 2, 301),
(5, 'Closed', 'Low', '00:10:00', '2017-10-04 06:00:00', '2017-10-04 05:50:00', 0, 2015108, 2015106, 18, 7, 1, 306),
(6, 'Closed', 'High', '00:15:00', '2017-10-04 13:00:00', '2017-10-04 12:45:00', 1, 2015103, 2015102, 4, 4, 2, 306),
(7, 'Closed', 'Low', '00:10:00', '2017-10-04 08:00:00', '2017-10-04 07:50:00', 0, 2015103, 2015103, 1, 3, 2, 205);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_description`
--

CREATE TABLE `ticket_description` (
  `id` int(11) NOT NULL,
  `tickd_statement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_description`
--

INSERT INTO `ticket_description` (`id`, `tickd_statement`) VALUES
(1, 'Bath Towel Request'),
(2, 'Set of Toiletries'),
(3, 'Bottled Water'),
(4, 'Assist Guest to lock Vernada Door'),
(5, 'Busted Bulb'),
(6, 'Faucet Contiouos Dripping'),
(7, 'Aircon With Leak');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type`
--

CREATE TABLE `ticket_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_type`
--

INSERT INTO `ticket_type` (`id`, `type_name`) VALUES
(1, 'Guest Room Item Request'),
(2, 'Guest Room Amenities Request'),
(3, 'Guest Room Setup Request'),
(4, 'Guest Room Assistance Request'),
(5, 'Guest Room Maintenance Request'),
(6, 'Guest Aircon Assistance'),
(7, 'Busted Bulb'),
(8, 'Guest Assistance - Others'),
(8, 'Guest Assistance - Others'),
(9, 'Guest TV Assistance'),
(10, 'Guest Door Lock Assistance'),
(11, 'Carpentry Works'),
(12, 'Guest Toilet Assistance'),
(13, 'Plumbing Works'),
(14, 'Clogged Toilet'),
(15, 'Electrical Works'),
(16, 'Guest Electrical Assistance'),
(17, 'Guest Telephone Assistance'),
(18, 'Leak Fixing');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_EMPLOYEE_JOB1_idx` (`pos_id`),
  ADD KEY `dept_idx` (`dept_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `fk_ticket_employee1_idx` (`employee_id`),
  ADD KEY `fk_ticket_employee2_idx` (`employee_id1`),
  ADD KEY `fk_ticket_ticket_type1_idx` (`ticket_type_id`),
  ADD KEY `fk_ticket_ticket_description1_idx` (`ticket_description_id`),
  ADD KEY `fk_ticket_department1_idx` (`department_id`),
  ADD KEY `fk_ticket_room1_idx` (`room_room_no`);

--
-- Indexes for table `ticket_description`
--
ALTER TABLE `ticket_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2015113;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `dept` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EMPLOYEE_JOB1` FOREIGN KEY (`pos_id`) REFERENCES `position` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_employee2` FOREIGN KEY (`employee_id1`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_room1` FOREIGN KEY (`room_room_no`) REFERENCES `room` (`room_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_ticket_description1` FOREIGN KEY (`ticket_description_id`) REFERENCES `ticket_description` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_ticket_type1` FOREIGN KEY (`ticket_type_id`) REFERENCES `ticket_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
