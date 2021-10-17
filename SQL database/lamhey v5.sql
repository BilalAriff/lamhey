-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2021 at 05:59 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamhey`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(10) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `profile_image`, `email`, `firstname`, `lastname`, `password`, `role`, `address`, `city`, `state`, `zip`, `created_at`) VALUES
(1, 'Bilal', '', 'bilal@admin.com', 'Bilal', 'Arif', '$2y$10$ijEB91Wp9O2euXKgqqXygOyVxtidgL/h7fsyBNjMfMbuPDdrbXIMu', 'admin', '', '', 'Sindh', '1111', '2021-08-01 23:18:22'),
(2, 'BilalAdmin', 'uploads/BilalAdmin/my-profile-2.jpg', 'Bilal@gmail.com', 'Bilal', 'Arif', '$2y$10$ybspMIVEZlNWwZufFwiHf.TT9OHjMsCycr7Xw26kkBChHIk8yX0Jy', 'admin', 'Aparment, Suite, Karaci', 'Karachi', 'Sindh', '1235', '2021-10-03 17:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_event` int(11) NOT NULL,
  `booking_event_name` varchar(255) NOT NULL,
  `booking_description` text NOT NULL,
  `booking_consultant` int(11) NOT NULL,
  `booking_consultant_username` varchar(255) NOT NULL,
  `booking_user` int(11) NOT NULL,
  `booking_user_username` varchar(255) NOT NULL,
  `booking_status` varchar(50) NOT NULL DEFAULT 'pending',
  `booking_date` date NOT NULL,
  `booking_createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `booking_event`, `booking_event_name`, `booking_description`, `booking_consultant`, `booking_consultant_username`, `booking_user`, `booking_user_username`, `booking_status`, `booking_date`, `booking_createdAt`) VALUES
(15, 17, 'Coding Classes for Juniors', 'i would like to arrange this even in my school please let me know when you are available', 24, 'ZaharaQue', 32, 'BilalUser', 'accepted', '2021-10-30', '2021-10-11 17:21:14'),
(14, 16, 'Long Night Beach Party', 'I wuold like to book this event for my upcoming birthday, for about 20 people', 23, 'HuzaifaAlam', 40, 'Abbashussain', 'accepted', '2021-10-19', '2021-10-10 16:28:17'),
(24, 14, 'Family Dinner', 'sdfasd;fmasdmfksadf', 20, 'NosheenQuyyum', 32, 'BilalUser', 'pending', '2021-10-17', '2021-10-17 15:47:25'),
(12, 15, 'Corporate Meeting', 'Need Corporate Booking for 300 People', 16, 'BilalConsultant', 32, 'BilalUser', 'rejected', '2021-10-16', '2021-10-09 15:17:55'),
(25, 18, 'Naat Khuwani Arrangment', 'fdfdfdfdf', 25, 'UmarHassan', 32, 'BilalUser', 'pending', '2021-10-17', '2021-10-17 21:39:46'),
(26, 27, 'DJ Night', 'loijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo saloijfoias foasi fasjif oasdjfo sa', 27, 'Adheem', 42, 'adheem', 'accepted', '2021-10-21', '2021-10-17 22:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(3, 'Birthday', '2021-10-03 19:43:08'),
(4, 'Wedding', '2021-10-03 19:43:08'),
(5, 'Personal Event', '2021-10-03 19:43:08'),
(6, 'Wedding Dance', '2021-10-03 19:43:08'),
(7, 'Choreography', '2021-10-03 19:43:08'),
(8, 'Children Event', '2021-10-03 19:43:08'),
(18, 'Couple Dinner', '2021-10-07 23:38:34'),
(10, 'Corporate Meetup', '2021-10-03 19:43:08'),
(22, 'DJ Nights', '2021-10-17 22:46:11'),
(12, 'Photography', '2021-10-03 19:43:08'),
(13, 'Open Event', '2021-10-03 19:43:08'),
(14, 'Seminar', '2021-10-03 19:43:08'),
(15, 'Educational Seminar', '2021-10-03 19:43:08'),
(21, 'Concerts', '2021-10-17 22:46:02'),
(23, 'Lunch', '2021-10-17 22:46:18'),
(24, 'Dinner', '2021-10-17 22:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `consultant_id` int(11) NOT NULL,
  `consultant_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `feedback` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `user_id`, `username`, `consultant_id`, `consultant_name`, `description`, `feedback`, `status`, `created_at`) VALUES
(10, 32, 'BilalUser', 24, 'ZaharaQue', 'tooo much pusshhyyy person', 'yeah we agree she really is asuch a annoying pusshy person', 'inprocess', '2021-10-11 17:24:10'),
(9, 40, 'AbbasHussain', 20, 'NosheenQuyyum', 'i didn\'t like consultants behavior', 'sdfasfsafasfasfasdf', 'resolved', '2021-10-10 16:05:46'),
(7, 32, 'BilalUser', 16, 'BilalConsultant', 'tooo awesome to handle', 'We have completed your complaint', 'completed', '2021-10-03 18:36:44'),
(8, 32, 'BilalUser', 16, 'BilalConsultant', 'tooo awesome to handle', '', 'completed', '2021-10-03 18:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

DROP TABLE IF EXISTS `consultants`;
CREATE TABLE IF NOT EXISTS `consultants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `consultant_type` varchar(255) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `about` longtext NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'img/avatars/default.jpg',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `availablity` varchar(50) NOT NULL DEFAULT 'available',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `payment_methods` varchar(255) NOT NULL DEFAULT 'a:1:{i:0;s:4:"cash";}',
  `categories` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `profile_status` varchar(12) NOT NULL DEFAULT 'fine',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `username`, `email`, `consultant_type`, `rating`, `about`, `profile_image`, `firstname`, `lastname`, `password`, `role`, `availablity`, `featured`, `payment_methods`, `categories`, `address`, `city`, `state`, `zip`, `profile_status`, `created_at`) VALUES
(16, 'BilalConsultant', 'bilalarifhussain@gmail.com', 'Individual Consultant', '50', '\"Don\'t go with the flow, be the flow\" ~Rumi', 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'Bilal', 'Arif', '$2y$10$XPmmUcM/XR5UxdO1uk50cehbJITWXCEMjr3qvUUoNwKl3kKKXtWTy', 'consultant', 'available', 1, 'a:2:{i:0;s:9:\"EasyPaisa\";i:1;s:3:\"UBL\";}', 'birthday', 'House No B 87/7, Bacho Bakery Street, Khokrapar 4, Malir karachi', 'karachi', '75500', 'Sindh', 'fine', '2021-09-13 00:09:47'),
(22, 'MishalLyaquat', 'mishal@gmail.com', 'Individual Consultant', '50', 'â€œYou only live once, but if you do it right, once is enough.â€\r\n', 'uploads/MishalLyaquat/javeriya-profile.jpg', 'Mishal', 'Lyaquat', '$2y$10$LePQ1.x2G.aRtAMC39gM3.4qZoG4gAnscAUvBR/f7phNynvuldFhq', 'consultant', 'available', 0, 'a:1:{i:0;s:4:\"cash\";}', NULL, 'Aparment, suite', 'Karachi', 'Sindh', '1111', 'fine', '2021-09-28 23:33:42'),
(20, 'NosheenQuyyum', 'nosheen@gmail.com', 'Individual Consultant', '50', 'â€œTwo things are infinite: the universe and human stupidity; and I\'m not sure about the universe.â€', 'uploads/NosheenQuyyum/nosheen-profile.jpg', 'Nosheen', 'Quyyum', '$2y$10$KjwZ9I5/W4oaGiG3QvbBnu0mlsm72kJkfEEL01LG3dSDQeAD00l4S', 'consultant', 'available', 1, 'a:1:{i:0;s:4:\"cash\";}', NULL, 'Planet Earth', 'Karachi', 'Sindh', '1234', 'fine', '2021-09-28 01:06:04'),
(21, 'Alaska', 'alaska@gmail.com', 'Marquee', '1', 'Beautiful Luxurius hotel for your weddings and every happy moment', 'uploads/Alaska/Alaska.jpg', 'Alaska', 'Resort', '$2y$10$7fuFveWCDLwEeXSKW8321.VYGjVfSYW0RDWzWxGjIbVPivTJQZhTS', 'consultant', 'available', 0, 'a:1:{i:0;s:4:\"cash\";}', NULL, 'apartment', 'Islamabad', 'Sindh', '1111', 'fine', '2021-09-28 01:22:52'),
(23, 'HuzaifaAlam', 'huzaifa@gmail.com', 'Individual Consultant', '50', 'â€œYou have to be burning with an idea, or a problem, or a wrong that you want to right. If you\'re not passionate enough from the start, you\'ll never stick it out.â€\r\nâ€• Steve Jobs', 'uploads/HuzaifaAlam/huzaifa.jpg', 'Huzaifa', 'Alam', '$2y$10$dBIuaPLk89yWKN1eue6pd.zAebDQbgVgIm0xs8ezMasqeWteZYy46', 'consultant', 'available', 1, 'a:1:{i:0;s:4:\"cash\";}', NULL, '2nd Street, Malir, Karachi', 'karachi', 'Sindh', '1234', 'blocked', '2021-10-10 16:08:52'),
(24, 'ZaharaQue', 'zahara@gmail.com', 'Individual Consultant', '50', '\"fabulously fantastic event manager\"', 'uploads/ZaharaQue/zahara.jpg', 'Zahara', 'Que', '$2y$10$mbBS2yg.3uGa3RqNDA1Jauo4y05qTAI8QEX97IwAgwstyBN.5F7cK', 'consultant', 'available', 1, 'a:1:{i:0;s:4:\"cash\";}', NULL, 'Planet Earth. solar system', 'karachi', 'Sindh', '1234', 'fine', '2021-10-11 17:17:14'),
(25, 'UmarHassan', 'umar@gmail.com', 'Individual Consultant', '1', '\"If you are positive, youâ€™ll see opportunities instead of obstacles\" ~ Widad Akrawi', 'uploads/UmarHassan/umar frofile .jpg', 'Umar', 'Hassan', '$2y$10$0hYsSwN8xN.a63JvhsMnQOl6oGdu1SQjadiuyuDv1CPkx/c9tB4y2', 'consultant', 'available', 0, 'a:1:{i:0;s:4:\"cash\";}', NULL, 'Planet Earth Karachi', 'Karachi', 'Sindh', '1111', 'fine', '2021-10-11 17:44:15'),
(26, 'ZainIbraheem', 'zain@gmail.com', 'Individual Consultant', '50', '\"Straight to the moon\" ~annonymouse', 'uploads/ZainIbraheem/zain.jpg', 'Zain', 'Ibraheem', '$2y$10$4rL7KR6utPA3ua.FZTdrT./OgldykjU5r3asSZ3kr/hs/GjPWCN0S', 'consultant', 'available', 1, 'a:2:{i:0;s:9:\"EasyPaisa\";i:1;s:4:\"Cash\";}', 'a:4:{i:0;s:8:\"Birthday\";i:1;s:7:\"Wedding\";i:2;s:14:\"Personal Event\";i:3;s:13:\"Wedding Dance\";}', 'Planet Earth, Solar', 'Karachi', 'Sindh', '1111', 'fine', '2021-10-14 00:26:08'),
(27, 'Adheem', 'adheem@gmail.com', 'Individual Consultant', '50', 'Specialize In All DJ / Concert Events', 'uploads/Adheem/adheem.jpg', 'Adheem', 'Dj', '$2y$10$6GfQu3m52t9WxF.WmtjAUuIdDs75yhIVDJElrVKKZJj9aHeI/SIXK', 'consultant', 'available', 1, 'a:4:{i:0;s:9:\"EasyPaisa\";i:1;s:8:\"JazzCash\";i:2;s:4:\"Cash\";i:3;s:13:\"Bank Transfer\";}', 'a:4:{i:0;s:8:\"Birthday\";i:1;s:7:\"Wedding\";i:2;s:14:\"Personal Event\";i:3;s:13:\"Wedding Dance\";}', 'Aparment, Suite, Karaci', 'Karachi', 'Sindh', '1122', 'fine', '2021-10-17 22:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `custom_event_request`
--

DROP TABLE IF EXISTS `custom_event_request`;
CREATE TABLE IF NOT EXISTS `custom_event_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `consultant_id` int(11) NOT NULL,
  `consultant_name` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_event_request`
--

INSERT INTO `custom_event_request` (`id`, `user_id`, `username`, `consultant_id`, `consultant_name`, `event_description`, `event_date`, `event_status`, `created_at`) VALUES
(1, 1, 'bilal arif', 1, 'consultant bilal', 'fdfdfd fodijfodifodf', '2021-10-19', 'accepted', '2021-10-14 22:52:51'),
(2, 32, 'BilalUser', 23, 'HuzaifaAlam', 'I Would Like to book an event', '2021-10-20', 'pending', '2021-10-14 23:15:55'),
(3, 32, 'BilalUser', 23, 'HuzaifaAlam', 'i would like to request another event', '2021-10-14', 'pending', '2021-10-14 23:16:49'),
(4, 32, 'BilalUser', 23, 'HuzaifaAlam', 'i would like to request another event', '2021-10-14', 'pending', '2021-10-14 23:17:10'),
(5, 32, 'BilalUser', 23, 'HuzaifaAlam', 'i would like to request another event', '2021-10-14', 'pending', '2021-10-15 21:24:08'),
(6, 32, 'BilalUser', 16, 'BilalConsultant', 'Requesting a event for birthday celebration', '2021-10-21', 'accepted', '2021-10-15 21:33:35'),
(7, 32, 'BilalUser', 16, 'BilalConsultant', 'Requesting a event for corporate meeting', '2021-10-28', 'accepted', '2021-10-15 21:33:56'),
(8, 42, 'Adheem', 27, 'Adheem', 'asdmfasdfsadfsadfoiasdj ofijasdo ifjsia fjoiaj foisdajfoasif as', '2021-10-17', 'rejected', '2021-10-17 22:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` text NOT NULL,
  `event_thumbnail` varchar(255) NOT NULL,
  `event_price` int(255) NOT NULL,
  `event_host` int(11) NOT NULL,
  `event_host_avatar` varchar(255) NOT NULL,
  `event_host_name` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_categories` varchar(255) NOT NULL,
  `event_featured` tinyint(1) NOT NULL DEFAULT '0',
  `event_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_thumbnail`, `event_price`, `event_host`, `event_host_avatar`, `event_host_name`, `event_description`, `event_categories`, `event_featured`, `event_created`) VALUES
(18, 'Naat Khuwani Arrangment', 'uploads/UmarHassan/naat.jpg', 50000, 25, 'uploads/UmarHassan/umar frofile .jpg', 'UmarHassan', 'Arrangment of Naat Khuwaani for your most precious moments', 'Festivals', 0, '2021-10-11 17:46:35'),
(19, 'Wedding Arrangment', 'uploads/BilalConsultant/wedding.jpg', 15000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 'Wedding', 1, '2021-10-17 18:29:12'),
(17, 'Coding Classes for Juniors', 'uploads/ZaharaQue/coding-class.jpg', 5000, 24, 'uploads/ZaharaQue/zahara.jpg', 'ZaharaQue', 'Junior Level Coding classes with real world project at the end', 'Educational', 0, '2021-10-11 17:19:52'),
(16, 'Long Night Beach Party', 'uploads/HuzaifaAlam/shutterstock_547263679.jpg', 300, 23, 'uploads/HuzaifaAlam/huzaifa.jpg', 'HuzaifaAlam', 'Long Night Beach Party for a memorable summer time', 'Beach Party', 1, '2021-10-10 16:25:48'),
(15, 'Corporate Meeting', 'uploads/BilalConsultant/', 40000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'Corporate Event Managment Service inlcuding Guest Managment, Food Managmet, Hotel Booking and Servants ', 'Corporate Meetign', 0, '2021-10-09 15:16:56'),
(14, 'Family Dinner', 'uploads/NosheenQuyyum/Alaska.jpg', 12000, 20, 'uploads/NosheenQuyyum/nosheen-profile.jpg', 'NosheenQuyyum', 'A Perfect Family get together dinner night at our luxurious and lovely resort', 'Dinner', 0, '2021-09-28 01:39:10'),
(20, 'Wedding Arrangment', 'uploads/BilalConsultant/wedding.jpg', 15000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 'Wedding', 0, '2021-10-17 18:31:14'),
(21, 'dfdf', 'uploads/BilalConsultant/wedding.jpg', 10000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'dfdfdf', 'Birthday', 0, '2021-10-17 18:31:28'),
(22, 'dfdf', 'uploads/BilalConsultant/wedding.jpg', 10000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'dfdfdf', 'Birthday', 0, '2021-10-17 18:31:48'),
(23, 'dfdf', 'uploads/BilalConsultant/wedding.jpg', 10000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'dfdfdf', 'Birthday', 0, '2021-10-17 18:32:21'),
(24, 'dfd', 'uploads/BilalConsultant/zahara.jpg', 12312312, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'dfdfdfdfdf', 'Birthday', 0, '2021-10-17 18:41:52'),
(25, 'dfd', 'uploads/BilalConsultant/zahara.jpg', 12312312, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'dfdfdfdfdf', 'Birthday', 0, '2021-10-17 18:42:14'),
(26, 'dfd', 'uploads/BilalConsultant/zahara.jpg', 12312312, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'dfdfdfdfdf', 'Birthday', 0, '2021-10-17 18:44:33'),
(27, 'DJ Night', 'uploads/Adheem/dj-night.jpg', 150000, 27, 'uploads/Adheem/adheem.jpg', 'Adheem', 'loreim ipsum dollar sitam upsum goloreim ipsum dollar sitam upsum goloreim ipsum dollar sitam upsum goloreim ipsum dollar sitam upsum goloreim ipsum dollar sitam upsum goloreim ipsum dollar sitam upsum go', 'Wedding Dance', 0, '2021-10-17 22:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `pm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pm_name` varchar(20) NOT NULL,
  `pm_icon` varchar(255) NOT NULL DEFAULT 'img/payment_methods/default.png',
  `pm_createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`pm_id`, `pm_name`, `pm_icon`, `pm_createdAt`) VALUES
(1, 'EasyPaisa', 'img/payment_methods/easypaisa.png', '2021-09-19 19:06:58'),
(3, 'JazzCash', 'img/payment_methods/jazzcash.png', '2021-09-19 19:09:36'),
(7, 'Cash', 'img/payment_methods/cash.png', '2021-10-07 22:50:55'),
(8, 'Default', 'img/payment_methods/default.png', '2021-10-07 22:52:01'),
(9, 'Bank Transfer', 'img/payment_methods/bank-transfer.jpg', '2021-10-10 16:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE IF NOT EXISTS `portfolio` (
  `portfolio_id` int(11) NOT NULL AUTO_INCREMENT,
  `portfolio_title` varchar(255) NOT NULL,
  `portfolio_link` varchar(255) NOT NULL,
  `portfolio_description` text NOT NULL,
  `portfolio_consultant` int(11) NOT NULL,
  `portfolio_categories` longtext NOT NULL,
  `portfolio_date` datetime NOT NULL,
  `portfolio_createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `portfolio_type` varchar(10) NOT NULL,
  PRIMARY KEY (`portfolio_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_title`, `portfolio_link`, `portfolio_description`, `portfolio_consultant`, `portfolio_categories`, `portfolio_date`, `portfolio_createAt`, `portfolio_type`) VALUES
(13, 'dfd', 'uploads/BilalConsultant/wedding.jpg', 'dfdfdf', 16, 'Birthday', '2021-10-17 00:00:00', '2021-10-17 16:59:37', 'photo'),
(11, 'Nature Photography ', 'uploads/BilalConsultant/photograph.jpg', 'Nature Photography', 16, 'Photography', '2021-10-17 00:00:00', '2021-10-17 16:43:17', 'photo'),
(12, 'Dinner Night', 'uploads/BilalConsultant/al-basit.jpg', 'Dinner Night', 16, 'Couple Dinner', '2021-11-04 00:00:00', '2021-10-17 16:47:00', 'photo'),
(10, 'Wedding Arrangment', 'uploads/BilalConsultant/wedding.jpg', 'Wedding Arrangement for my client', 16, 'Wedding', '2021-10-30 00:00:00', '2021-10-01 14:28:30', 'photo'),
(9, 'Corporate Meeting', 'uploads/BilalConsultant/dubai-meetup.jpg', 'High Level Corporate Meeting in Dubai for my client i was responsible for arranging everything from location booking to guest managment', 16, 'Educational Seminar', '2021-10-19 00:00:00', '2021-10-01 14:26:46', 'photo'),
(14, 'DJ Night', 'uploads/Adheem/dj-night.jpg', 'Dj Night', 27, 'Wedding', '2021-10-17 00:00:00', '2021-10-17 22:33:32', 'photo'),
(15, 'DJ Night', 'uploads/Adheem/dj-night.jpg', 'Dj Night', 27, 'Wedding', '2021-10-17 00:00:00', '2021-10-17 22:33:46', 'photo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'img/avatars/default.jpg',
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `profile_status` varchar(10) NOT NULL DEFAULT 'fine',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `profile_image`, `email`, `firstname`, `lastname`, `password`, `role`, `address`, `city`, `state`, `zip`, `profile_status`, `created_at`) VALUES
(32, 'BilalUser', 'img/avatars/default.jpg', 'bilal@gmail.com', 'Bilal', 'Arif', '$2y$10$gXD2z4btYpzTsJL8vU2A5uIuS277JSMq2IVS.kFKMHUX2OZ5qyeNW', 'user', 'Planet Earth, Solar', 'karachi', 'Sindh', '1111', 'fine', '2021-09-12 21:53:13'),
(40, 'AbbasHussain', 'uploads/AbbasHussain/', 'abbas@gmail.com', 'Abbas', 'Hussain', '$2y$10$HwZ1mdnGKZ3gedWbniv17e9aJ53CJmZIJ1YmTE4/vGXJqsklj2Du2', 'user', '3rd Street, New Port, Karachi', 'Karachi', 'Sindh', '1234', 'fine', '2021-10-10 15:54:32'),
(41, 'AliRaza', 'uploads/AliRaza/', 'ali@gmail.com', 'Ali', 'Raza', '$2y$10$81e6UMakV3MEcA8slZ/mvuh1iwnbiFke1ECODAFDzLVcWVHRk6TUy', 'user', 'Aparment, Suite, Karaci', 'Karachi', 'Sindh', '1235', 'fine', '2021-10-15 22:29:15'),
(42, 'Adheem', 'uploads/Adheem/adheem.jpg', 'adheem@gmail.com', 'Adheem', 'Dj', '$2y$10$6rdS9Qd/3OWdy2bNNlUrAeQLL7MGHrxsOK/0dMel6pFwqTanhbz.i', 'user', 'Aparment, Suite, Karaci', 'Karachi', 'Sindh', '1122', 'fine', '2021-10-17 22:27:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
