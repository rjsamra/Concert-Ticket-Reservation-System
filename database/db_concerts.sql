-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2020 at 07:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_concerts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `book_id` varchar(20) NOT NULL,
  `ticket_id` varchar(30) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'stadium id',
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL COMMENT 'number of seats',
  `amount` int(5) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`book_id`, `ticket_id`, `t_id`, `user_id`, `show_id`, `screen_id`, `no_seats`, `amount`, `ticket_date`, `date`, `status`) VALUES
('BKID5706817', 'TICKID3168151', 14, 24, 12, 7, 1, 75, '2018-07-06', '2018-06-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_concert`
--

CREATE TABLE `tbl_concert` (
  `concert_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'Stadium id',
  `concert_name` varchar(100) NOT NULL,
  `cast` varchar(500) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 means active '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_concert`
--

INSERT INTO `tbl_concert` (`concert_id`, `t_id`, `concert_name`, `cast`, `desc`, `release_date`, `image`, `video_url`, `status`) VALUES
(1, 3, 'Bantai', 'Emiway Bantai', 'Emiway Bantai is an Indian Rapper ', '2021-05-05', 'images/ban.jpg', 'https://www.youtube.com/playlist?playnext=1&list=PLpfFYR2wui04JyXOVz2ebz0NVZM95iR5v&feature=gws_kp_artist', 0),
(2, 4, 'MTvTourIndia', 'Arjit Singh', 'Arijit Sing is an Indian playback singer. He sings predominantly in Hindi and Bengali but has also performed in various other Indian ..', '2021-07-11', 'images/arjit.jpg', 'https://www.youtube.com/playlist?playnext=1&list=PLl7FgM8EYUapnCcLRRl7M-mrcYgglf66j&feature=gws_kp_artist', 0),
(3, 14, 'gocelebclub', 'Shreya Ghoshal', 'is an Indian playback singer, composer and music producer. She has received four National Film Awards', '2021-07-01', 'images/sre.jpg', 'https://www.youtube.com/playlist?playnext=1&list=PLlokyYPRHlgaWo9oMU7EHC48da-ag-Vgq&feature=gws_kp_artist', 0),
(8, 3, 'Goldens Hours', 'kumar Sanu,Alka Yagnik,Abhijit Da, Udit Narayan,Sadhna Sargam', '90s Playback With Goldys', '2012-07-19', 'images/gunsnroses.png', 'https://www.youtube.com/watch?v=1w7OgIMMRc4', 0),
(14, 4, 'AmezedClub', 'Darshan Raval', ' Indian singer, composer, lyricist and actor, first on-screen appearance was in  reality show Indias Raw Star', '2021-07-12', 'images/darsh.jpg', 'https://www.youtube.com/playlist?playnext=1&list=PL1OH99AZ0m6aKZFlxjaYcHWphLtdzktHb&feature=gws_kp_artist', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'email',
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `password`, `user_type`) VALUES
(42, 28, 'ts@hotmail.com', 'ts', 0),
(43, 29, 'rajkumarsamra@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `attachment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `name`, `cast`, `news_date`, `description`, `attachment`) VALUES
(3, 'Sonu Nigam\r\n', 'Sonu Nigam\r\n', '2021-10-15', ' track Sonu Nigam and get concert alerts when they play near you.\r\n\r\n\r\n', 'new/sonu.png'),
(5, 'Sunburn ', 'Sunburn', '2021-11-21', ' SunBurn Arena Poster Martin Garrix. CG Art Gallery•. Follow Following Unfollow. More Like This. Add to Moodboard. Add to Moodboard.', 'new/sunburn.jpg'),
(6, 'Neha Kakkar\r\n', 'Neha Kakkar\r\n', '2020-07-15', 'Neha Kakkar is an Indian singer. She began performing at religious events at the age of four and participated in the second season of the singing reality show, Indian Idol', 'new/neha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `totalAmount` decimal(8,2) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `name`, `email`, `phone`, `age`, `gender`, `totalAmount`, `lastUpdate`) VALUES
(28, 'ts', 'ts@hotmail.com', '6940000000', 12, 'Male', '1600.00', '2018-06-25 16:34:13'),
(29, 'RAJKUMAR SAMRA', 'rajkumarsamra@gmail.com', '07588243303', 21, 'Male', '7211.00', '2020-12-14 18:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screens`
--

CREATE TABLE `tbl_screens` (
  `screen_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `screen_name` varchar(110) NOT NULL,
  `seats` int(11) NOT NULL COMMENT 'number of seats',
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_screens`
--

INSERT INTO `tbl_screens` (`screen_id`, `t_id`, `screen_name`, `seats`, `charge`) VALUES
(5, 3, ' 1', 50, 70),
(6, 3, '2', 15, 60),
(7, 4, '3', 20, 75),
(8, 14, '4', 34, 120),
(9, 3, '5', 30, 70),
(10, 15, 'a', 123, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shows`
--

CREATE TABLE `tbl_shows` (
  `s_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL COMMENT 'show time id',
  `stadium_id` int(11) NOT NULL,
  `concert_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 means show available',
  `r_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shows`
--

INSERT INTO `tbl_shows` (`s_id`, `st_id`, `stadium_id`, `concert_id`, `start_date`, `status`, `r_status`) VALUES
(10, 1, 3, 1, '2018-05-01', 1, 1),
(11, 2, 4, 2, '2018-06-01', 1, 1),
(12, 3, 14, 3, '2018-07-01', 1, 1),
(13, 4, 3, 8, '2018-08-01', 1, 1),
(14, 5, 4, 14, '2018-09-01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_show_time`
--

CREATE TABLE `tbl_show_time` (
  `st_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL COMMENT 'rokck band etc',
  `start_time` time NOT NULL,
  `date_show` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_show_time`
--

INSERT INTO `tbl_show_time` (`st_id`, `screen_id`, `name`, `start_time`, `date_show`) VALUES
(1, 5, 'Rock', '12:00:00', '2018-07-01'),
(2, 6, 'Rock', '16:00:00', '2018-07-05'),
(3, 7, 'Rock', '18:00:00', '2018-07-06'),
(4, 8, 'Rock', '21:00:00', '2018-07-09'),
(5, 9, 'Rock', '20:00:00', '2018-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stadium`
--

CREATE TABLE `tbl_stadium` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stadium`
--

INSERT INTO `tbl_stadium` (`id`, `name`, `address`, `place`, `state`) VALUES
(3, 'Relplanza', 'Bkc', 'JioGarden', 'Maharashtra'),
(4, 'Panathenaic stadium', 'RD MF ', 'Kallimarmaron', 'hyderabad'),
(14, 'Karaiskakis stadium', 'Lewforo Falirou', 'Neon Faliro', 'Banglore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `tbl_stadium`
--
ALTER TABLE `tbl_stadium`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_stadium`
--
ALTER TABLE `tbl_stadium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
