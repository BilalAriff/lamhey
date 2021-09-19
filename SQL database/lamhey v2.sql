-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2021 at 06:19 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

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
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `firstname`, `lastname`, `password`, `role`, `state`, `zip`, `created_at`) VALUES
(1, 'Bilal', 'bilal@admin.com', 'Bilal', 'Arif', '$2y$10$ijEB91Wp9O2euXKgqqXygOyVxtidgL/h7fsyBNjMfMbuPDdrbXIMu', 'admin', 'Sindh', '1111', '2021-08-01 23:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_event` int(11) NOT NULL,
  `booking_description` text NOT NULL,
  `booking_consultant` int(11) NOT NULL,
  `booking_user` int(11) NOT NULL,
  `booking_status` varchar(50) NOT NULL DEFAULT 'pending',
  `booking_date` datetime NOT NULL,
  `booking_createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `booking_event`, `booking_description`, `booking_consultant`, `booking_user`, `booking_status`, `booking_date`, `booking_createdAt`) VALUES
(1, 1, 'Booking event for 400 people', 16, 1, 'rejected', '2021-09-18 17:27:54', '2021-09-19 22:58:22');

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
  `payment_methods` varchar(255) NOT NULL DEFAULT 'a:1:{i:0;s:4:"cash";}',
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `username`, `email`, `consultant_type`, `rating`, `about`, `profile_image`, `firstname`, `lastname`, `password`, `role`, `availablity`, `payment_methods`, `address`, `city`, `state`, `zip`, `created_at`) VALUES
(16, 'BilalConsultant', 'bilalarifhussain@gmail.com', 'Individual Consultant', '5', '\"Don\'t go with the flow, be the flow\" ~Rumi', 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'Bilal', 'Arif', '$2y$10$XPmmUcM/XR5UxdO1uk50cehbJITWXCEMjr3qvUUoNwKl3kKKXtWTy', 'consultant', 'available', 'a:2:{i:0;s:9:\"EasyPaisa\";i:1;s:3:\"UBL\";}', 'House No B 87/7, Bacho Bakery Street, Khokrapar 4, Malir karachi', 'karachi', '75500', 'Sindh', '2021-09-13 00:09:47'),
(11, 'Black Flower', 'bilalarifhussain@gmail.com', 'Resturant', '1', 'lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum ', 'sss/sss/ss', 'Black', 'Flower', '$2y$10$vLQMz5w3wEgx3bhbRabm0eMJVL6QX.Uu.sG2DSbU9GqkRYgsLHHri', 'consultant', 'available', 'Cash', 'House No B 87/7, Bacho Bakery Street, Khokrapar 4, Malir karachi', 'karachi', '75500', 'Sindh', '2021-09-12 22:41:23'),
(12, 'BlackFlower', 'blackflower@gmail.com', 'Resturant', '1', 'lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum lorem issum ', 'sss/sss/ss', 'Black', 'Flower', '$2y$10$UKEKgfP/xCTWUoPU5/sFl.Gafw.J5jLtpIvFQ2fLj5DCPPKMlBz1a', 'consultant', 'available', 'Cash', 'Planet Earth, Solar', 'karachi', '75500', 'Sindh', '2021-09-12 22:42:33'),
(13, 'Blue Rose', 'bilalarifhussain@gmail.com', 'Individual Consultant', '1', 'lorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmmlorem ipusmmm', 'img/avatars/default.jpg', 'Blue', 'Rose', '$2y$10$F8ANtHqBkn.fpN566mUfu.oAWbDMb2X4tdmsoD1fqjBHucVRvEkfW', 'consultant', 'available', 'Cash', 'House No B 87/7, Bacho Bakery Street, Khokrapar 4, Malir karachi', 'karachi', '75500', 'Sindh', '2021-09-12 23:26:11'),
(14, 'BilalWithProfile', 'bilalarifhussain@gmail.com', 'Individual Consultant', '1', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'uploads//IMG_20200627_162339_019.jpg', 'Bilal', 'Arif', '$2y$10$5JEJ5S7S0VwwxHaN7gQ.ROSXq87rQuOLn4rcpgUqgC9Ec6a3PNHCy', 'consultant', 'available', 'Cash', 'House No B 87/7, Bacho Bakery Street, Khokrapar 4, Malir karachi', 'karachi', '75500', 'Sindh', '2021-09-12 23:30:40'),
(15, 'Unique Resturant', 'bilalarifhussain@gmail.com', 'Resturant', '1', 'important Resturantimportant Resturantimportant Resturantimportant Resturantimportant Resturantimportant Resturantimportant Resturantimportant Resturantimportant Resturantimportant Resturantimportant Resturantimportant Resturant', 'uploads/Unique Resturant/IMG_20200627_162339_019.jpg', 'Bilal', 'Arif', '$2y$10$K4sU0pllXzf9T9BlS4c.4e7vv2/CVe.rPn7lH4XhFyYOIQ/A28kGa', 'consultant', 'available', 'Cash', 'House No B 87/7, Bacho Bakery Street, Khokrapar 4, Malir karachi', 'karachi', '75500', 'Sindh', '2021-09-12 23:36:58');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_thumbnail`, `event_price`, `event_host`, `event_host_avatar`, `event_host_name`, `event_description`, `event_categories`, `event_featured`, `event_created`) VALUES
(1, 'Birthday Celebration', 'https://th.bing.com/th/id/OIP.ZRUGmb9RN_D2ETzh9lmyxgHaFG?pid=ImgDet&rs=1', 50000, 12, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'Bilal Arif', 'lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm lorem ipusm ', 'a:3:{i:0;s:8:\"birthday\";i:1;s:11:\"celebration\";i:2;s:5:\"party\";}', 1, '2021-09-18 14:40:05'),
(2, 'Wedding Ceremony', 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 100000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'updated Event Description', 'a:3:{i:0;s:8:\"birthday\";i:1;s:11:\"celebration\";i:2;s:5:\"party\";}', 1, '2021-09-18 16:31:59'),
(3, 'my another Event', 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 500000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'Some random description', 'Birthday', 1, '2021-09-18 17:25:51'),
(4, 'my another Event', 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 500000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'Some random description', 'Birthday', 1, '2021-09-18 17:27:54'),
(13, 'Birthday Party', 'uploads/BilalConsultant/OIP.jpg', 160000, 16, 'uploads/BilalConsultant/IMG_20200627_162339_019.jpg', 'BilalConsultant', 'No description available', 'Birthday', 0, '2021-09-18 20:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `pm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pm_name` varchar(20) NOT NULL,
  `pm_icon` varchar(255) NOT NULL,
  `pm_createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`pm_id`, `pm_name`, `pm_icon`, `pm_createdAt`) VALUES
(1, 'EasyPaisa', '/easypaisa.png', '2021-09-19 19:06:58'),
(2, 'UBL', '/UBL.png', '2021-09-19 19:09:26'),
(3, 'HBL', '/hbl.png', '2021-09-19 19:09:36');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_title`, `portfolio_link`, `portfolio_description`, `portfolio_consultant`, `portfolio_categories`, `portfolio_date`, `portfolio_createAt`, `portfolio_type`) VALUES
(1, 'Updated Title', 'updated link', 'updated description', 16, 'updated categories', '2021-09-19 10:54:54', '2021-09-19 10:53:22', 'video'),
(3, 'My Title', 'uploads/BilalConsultant/', 'My long descriptioin', 16, 'Wedding', '2021-09-17 00:00:00', '2021-09-19 12:59:22', 'photo'),
(2, 'Educational Seminar', 'https://th.bing.com/th/id/OIP.Op9akG2wZyUCS5MJtCjqnQHaEY?pid=ImgDet&rs=1', 'Professional Educational Seminar', 16, 'Seminar', '2021-09-18 14:40:05', '2021-09-19 10:54:54', 'photo'),
(4, 'My Title', 'uploads/BilalConsultant/Hassan Logo-03.jpg', 'My long descriptioin', 16, 'Wedding', '2021-09-17 00:00:00', '2021-09-19 13:00:01', 'photo'),
(5, 'test', 'uploads/BilalConsultant/Hassan Logo-03.jpg', 'lorem ipsum test', 16, 'Wedding', '2021-09-16 00:00:00', '2021-09-19 13:01:31', 'video'),
(6, 'dfdfd', 'uploads/BilalConsultant/CS411 Case 1.gif', 'dfdfdfdf', 16, 'Wedding', '2021-09-03 00:00:00', '2021-09-19 13:03:28', 'video'),
(7, 'dfdfd', 'uploads/BilalConsultant/CS411 Case 1.gif', 'dfdfdfdf', 16, 'Wedding', '2021-09-03 00:00:00', '2021-09-19 13:06:10', 'video');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `firstname`, `lastname`, `password`, `role`, `address`, `city`, `state`, `zip`, `created_at`) VALUES
(33, 'BilalWithProfile', 'bilalarifhussain@gmail.com', 'Bilal', 'Arif', '$2y$10$/lG2TiCJH1f7s..os9c1i.yj8GeQtfNxyiCtiUkpTpoKRpDPeJnte', 'user', 'House No B 87/7, Bacho Bakery Street, Khokrapar 4, Malir karachi', 'karachi', 'Sindh', '75500', '2021-09-12 23:29:06'),
(32, 'BilalUser', 'bilal@gmail.com', 'Bilal', 'Arif', '$2y$10$gXD2z4btYpzTsJL8vU2A5uIuS277JSMq2IVS.kFKMHUX2OZ5qyeNW', 'user', 'Planet Earth, Solar', 'karachi', 'Sindh', '1111', '2021-09-12 21:53:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
