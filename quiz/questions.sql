-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2021 at 12:44 PM
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
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions `;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `question_u_id` varchar(100) NOT NULL,
  `ques_data` json NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UniqueId` (`question_u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_u_id`, `ques_data`, `added_on`) VALUES
(1, '123', '{\"choices\": [\"this\", \"let\", \"var\", \"that\", \"const\"], \"question\": \"Which is not a keyword in javascript ?\", \"correctAnswer\": 3}', '2021-08-27 15:52:29'),
(2, '124', '{\"choices\": [\"A programming language.\", \"A server-side scripting language\", \"A library\", \"A framework\", \"All of the above\"], \"question\": \"What is JavaScript ?\", \"correctAnswer\": 0}', '2021-08-27 15:52:29'),
(3, '125', '{\"choices\": [\"each of these\", \"are immutable\", \"can be reassigned\", \"can not be reassigned\", \"None of these\"], \"question\": \"Variables declared with const keyword -\", \"correctAnswer\": 3}', '2021-08-27 16:03:52'),
(4, '126', '{\"choices\": [\"react\", \"node\", \"express\", \"flask\", \"vue\"], \"question\": \"Which is not related ot JavaScript ?\", \"correctAnswer\": 3}', '2021-08-27 16:09:47'),
(5, '127', '{\"o1\": \"`adfoie\", \"o2\": \"lkivbnj\", \"o3\": \"diebihv\", \"o4\": \"kdvien\", \"o5\": \"biojvhe\", \"ques\": \"question1\"}', '2021-08-28 12:05:53'),
(6, '129', '{\"o1\": \"keyword\", \"o2\": \"variable\", \"o3\": \"constant\", \"o4\": \"array\", \"o5\": \"none of these\", \"ques\": \"What is var in JavaScript ?\"}', '2021-08-28 12:32:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
