-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 25, 2018 at 04:02 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `queid` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option_1` varchar(50) NOT NULL,
  `option_2` varchar(50) NOT NULL,
  `option_3` varchar(50) NOT NULL,
  `option_4` varchar(50) NOT NULL,
  `correct_ans` int(11) NOT NULL,
  PRIMARY KEY (`queid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`queid`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_ans`) VALUES
(1, 'How old is the Earth?', '5 million years old', '10 million years old', '4.5 billion years old', '10 billion years old', 3),
(2, 'Which is the largest ocean on our planet?', 'The Pacific Ocean', 'The Atlantic Ocean', 'The Indian Ocean', 'The Arctic Ocean', 1),
(3, 'Which extinct bird lived on Mauritius?', 'The Phoenix', 'The Dodo', 'The Emu', 'The Great Auk', 2),
(4, 'How old are the oldest trees?', '3000 years old.', '6000 years old.', '9000 years old.', '12000 years old.', 2),
(5, 'Which is the longest mountain range on the planet?', 'The Himalayas', 'The Rockies', 'The Andes', 'The Alps', 3),
(6, 'Which is the highest waterfall in the world?', 'Niagara', 'Angel', 'Iguazú', 'Victoria', 2),
(7, 'Who was the first explorer to reach the South Pole?', 'Roald Amundsen', 'Ernest Shackleton', 'Robert Falcon Scott', 'Buzz Aldrin', 1),
(8, 'What do you call the variation of life forms within an ecosystem?', 'Evolution', 'Biology', 'Biodiversity', 'Ecology', 3),
(9, 'Above what altitude are travelers considered to be astronauts?', '30 kms', '50 kms', '80 kms', '100 kms', 3),
(10, 'Where is the Earth located in the Solar System?', 'It\'s the fourth planet', 'It\'s the third planet', 'It\'s the second planet', 'It\'s the first planet', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(10) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `password` varchar(20) CHARACTER SET macroman COLLATE macroman_bin NOT NULL,
  `quizmarks` int(11) NOT NULL,
  `highestmarks` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `fullname`, `password`, `quizmarks`, `highestmarks`) VALUES
('xian', 'Malik Zubayer Ul Haider', '1234', 30, 30);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
