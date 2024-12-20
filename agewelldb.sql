-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 08:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agewelldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `duration_weeks` int(11) DEFAULT NULL CHECK (`duration_weeks` > 0),
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `duration_weeks`, `price`) VALUES
(1, 'Yoga for Seniors', 'Gentle yoga sessions tailored for seniors.', 8, 120.00),
(2, 'Nutrition Basics', 'Learn the fundamentals of healthy eating.', 4, 80.00),
(3, 'Digital Literacy', 'Basic computer and smartphone skills.', 6, 100.00),
(4, 'Memory Enhancement', 'Techniques to improve memory retention.', 5, 90.00),
(5, 'Art Therapy', 'Creative sessions for mental well-being.', 6, 110.00),
(6, 'Pilates for Beginners', 'Introduction to Pilates exercises.', 8, 130.00),
(7, 'First Aid Training', 'Essential first aid skills.', 4, 70.00);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_responses`
--

CREATE TABLE `questionnaire_responses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `comments` text DEFAULT NULL,
  `recommend` varchar(10) NOT NULL,
  `services` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaire_responses`
--

INSERT INTO `questionnaire_responses` (`id`, `name`, `email`, `rating`, `comments`, `recommend`, `services`) VALUES
(1, 'Sara Said', 'ss12@gmail.com', 'Good', 'I like service', 'yes', 'Vaccinations'),
(2, 'Ali Saif', 'as3@gmail.com', 'Excellent', 'Very Friendly Staff', 'yes', ' Routine Check-ups'),
(3, 'Ahmed Al-Harthy', ' ahmed.alharthy@gmail.com', 'Good', 'the services were quick. Overall, a good experience.', 'yes', 'General Medical Consultations'),
(4, 'Fatima Al-Muqbali', 'fatima.mu01@gmail.com', 'Excellent', 'I loved how attentive the team was. Everything went smoothly', 'yes', 'Temporary Nursing Care'),
(5, 'Salim Al-Nabhani', 'sn23@yahoo.com', 'Average', 'The service was okay, but I believe there is room for improvement in scheduling', 'No', 'General Medical Consultations'),
(6, 'Mariam Al-Hinai', 'malh234@gmail.com', 'Good', 'The team was very professional, and the facilities were clean. Thank you', 'yes', 'Routine Check-ups'),
(7, 'Hassan Al-Busaidi', 'has32@gmail.com', 'Poor', 'The wait time was too long, and I didn’t receive clear instructions. This needs improvement.', 'No', 'Vaccinations');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `FullName` varchar(65) DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Plan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`FullName`, `Age`, `Gender`, `Email`, `Password`, `Plan`) VALUES
('Ahmed Said', 78, 'Male', 'ah@gmail.com', 'ah091234', 'Full Routine Check-up'),
('Zuwaina Hamad ', 85, 'Female', 'zh011@yahoo.com', 'zh1m828', 'Clinical Patient Care Packages'),
('Ali Nasser', 69, 'Male', 'ali023@gmail.com', 'al98ns2923!', 'Full Routine Check-up'),
('Moza Salim', 61, 'Female', 'ms89@gmail.com', 'moAl28393@', 'Full Routine Check-up'),
('Harib Saif', 90, 'Male', 'har293@gmail.com', 'hs7&282O3', 'Clinical Patient Care Packages'),
('Salma Saud', 74, 'Female', 'ss678@gmail.com', 'ss@79302!', 'Full Routine Check-up'),
('Khalfan Sultan', 58, 'Male', 'ks3829@yahoo.com', 'ksAl2839#', 'Full Routine Check-up');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `questionnaire_responses`
--
ALTER TABLE `questionnaire_responses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questionnaire_responses`
--
ALTER TABLE `questionnaire_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;