-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 06:13 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musica`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'Evolve', 1, 3, 'assets/images/artwork/ImagineDragonsEvolve.jpg'),
(2, 'Smoke+Mirrors', 1, 1, 'assets/images/artwork/ImagineDragonsSmokeMirrors.png'),
(3, 'Night Visions', 1, 2, 'assets/images/artwork/NightVisionsAlbumCover.jpeg'),
(4, 'Parachutes\r\n', 2, 3, 'assets/images/artwork/Coldplayparachutesalbumcover.jpg'),
(5, 'Viva la Vida or Death and All His Friends', 2, 3, 'assets/images/artwork/VivalaVidaorDeathandAllHisFriends.jpg'),
(6, 'The Marshall Mathers LP', 3, 7, 'assets/images/artwork/TheMarshallMathersLP.jpg'),
(7, 'Recovery', 3, 7, 'assets/images/artwork/RecoveryAlbumCover.jpg'),
(8, 'Atlas: Year One', 4, 4, 'assets/images/artwork/atlas.jpg'),
(9, 'Plus (+)', 5, 3, 'assets/images/artwork/plus.jpg'),
(10, 'Divide (/)', 5, 3, 'assets/images/artwork/Divide.png');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Imagine Dragons'),
(2, 'Coldplay'),
(3, 'Eminem'),
(4, 'Sleeping At Last'),
(5, 'Ed Sheeran');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Indie rock'),
(2, 'Alternative rock'),
(3, 'Pop rock'),
(4, 'Emo/hardcore'),
(6, 'Electric pop'),
(7, 'hip hop'),
(8, 'Folk');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Radioactive', 1, 3, 2, '03:06', 'assets/music/NightVisions/ImagineDragons-Radioactive.mp3', 1, 0),
(2, 'TipToe', 1, 3, 2, '03:14', 'assets/music/NightVisions/ImagineDragons-Tiptoe.mp3', 2, 0),
(3, 'It\'s Time', 1, 3, 1, '04:00', 'assets/music/NightVisions/ImagineDragons-It\'sTime.mp3', 3, 0),
(4, 'Demons', 1, 3, 3, '02:57', 'assets/music/NightVisions/ImagineDragons-Demons.mp3', 4, 0),
(5, 'Bleeding Out', 1, 3, 2, '03:43', 'assets/music/NightVisions/ImagineDragons-BleedingOut.mp3', 5, 0),
(6, 'Battle Cry', 1, 2, 2, '04:33', 'assets/music/Smoke+Mirrors/BattleCry.mp3', 1, 0),
(7, 'Dream', 1, 2, 1, '04:18', 'assets/music/Smoke+Mirrors/Dream.mp3', 2, 0),
(8, 'Friction', 1, 2, 3, '03:22', 'assets/music/Smoke+Mirrors/Friction.mp3', 3, 0),
(9, 'I Bet My Life', 1, 2, 3, '03:12', 'assets/music/Smoke+Mirrors/IBetMyLife.mp3', 4, 0),
(10, 'Monster', 1, 2, 2, '04:09', 'assets/music/Smoke+Mirrors/Monster.mp3', 5, 0),
(11, 'Shots', 1, 2, 2, '03:52', 'assets/music/Smoke+Mirrors/Shots.mp3', 6, 0),
(12, 'Warriors', 1, 2, 2, '02:50', 'assets/music/Smoke+Mirrors/Warriors.mp3', 7, 0),
(13, 'Who Are We', 1, 2, 3, '04:09', 'assets/music/Smoke+Mirrors/WhoWeAre.mp3', 8, 0),
(14, 'I Don\'t Know Why', 1, 1, 3, '03:10', 'assets/music/Smoke+Mirrors/IDon’tKnowWhy.mp3', 1, 0),
(15, 'Walking The Wire', 1, 1, 2, '03:52', 'assets/music/Smoke+Mirrors/WalkingTheWire.mp3', 2, 0),
(16, 'Whatever It Takes', 1, 1, 2, '03:21', 'assets/music/Smoke+Mirrors/WhateverItTakes.mp3', 3, 0),
(17, 'Rise Up', 1, 1, 3, '03:51', 'assets/music/Smoke+Mirrors/05. Rise Up.mp3', 4, 0),
(18, 'I\'ll Make It Up To You', 1, 1, 1, '04:22', 'assets/music/Smoke+Mirrors/06. I’ll Make It Up To You.mp3', 5, 0),
(19, 'Yesterday', 1, 1, 3, '03:25', 'assets/music/Smoke+Mirrors/07. Yesterday.mp3', 6, 0),
(20, 'Thunder', 1, 1, 3, '03:07', 'assets/music/Smoke+Mirrors/09. Thunder.mp3', 7, 0),
(21, 'Believer', 1, 1, 3, '03:24', 'assets/music/Smoke+Mirrors/Believer.mp3', 8, 0),
(22, 'Dancing In The Dark', 1, 1, 1, '03:55', 'assets/music/Smoke+Mirrors/11. Dancing In The Dark.mp3', 9, 0),
(23, 'Levitate', 1, 1, 2, '03:18', 'assets/music/Smoke+Mirrors/12. Levitate.mp3', 10, 0),
(24, 'Not Today', 1, 1, 3, '04:20', 'assets/music/Smoke+Mirrors/13. Not Today.mp3', 11, 0),
(25, 'Believer (Kaskade Remix)', 1, 1, 3, '03:10', 'assets/music/Smoke+Mirrors/14. Believer (Kaskade Remix).mp3', 12, 0),
(26, 'Yellow', 2, 4, 8, '04:29', 'assets/music/Parachutes/05 - Yellow.mp3', 1, 0),
(27, '10 - Everything\'s Not Lost.mp3', 2, 4, 8, '07:15', 'assets/music/Parachutes/10 - Everything\'s Not Lost.mp3', 2, 0),
(28, 'Yellow', 2, 4, 8, '04:29', 'assets/music/Parachutes/05 - Yellow.mp3', 1, 0),
(29, 'Everything\'s Not Lost', 2, 4, 8, '07:15', 'assets/music/Parachutes/10 - Everything\'s Not Lost.mp3', 2, 0),
(30, 'Yellow', 2, 4, 8, '04:29', 'assets/music/Parachutes/05 - Yellow.mp3', 1, 0),
(31, 'Everything\'s Not Lost', 2, 4, 8, '07:15', 'assets/music/Parachutes/10 - Everything\'s Not Lost.mp3', 2, 0),
(32, 'Lost!', 2, 5, 1, '03:55', 'assets/music/Viva La Vida Or Death And All His Friends/03 - Lost!.mp3', 1, 0),
(33, 'Viva La Vida', 2, 5, 2, '04:01', 'assets/music/Viva La Vida Or Death And All His Friends/07 - Viva La Vida.mp3', 2, 0),
(34, 'Violet Hill', 1, 5, 1, '03:42', 'assets/music/Viva La Vida Or Death And All His Friends/08 - Violet Hill.mp3', 3, 0),
(35, 'Lost (Bonus Track)', 2, 5, 8, '03:44', 'assets/music/Viva La Vida Or Death And All His Friends/11 - Lost (Bonus Track).mp3', 4, 0),
(36, 'Stan', 3, 6, 7, '06:44', 'assets/music/The Marshall Mathers LP/03 Stan.mp3', 1, 0),
(37, 'The Way I Am', 3, 6, 7, '04:50', 'assets/music/The Marshall Mathers LP/07 The Way I Am.mp3', 2, 0),
(38, 'The Real Slim Shady', 3, 6, 7, '04:44', 'assets/music/The Marshall Mathers LP/08 The Real Slim Shady.mp3', 3, 0),
(39, 'Not Afraid', 3, 7, 7, '04:08', 'assets/music/Recovery/07-eminem-not_afraid-fum.mp3', 1, 0),
(40, 'Space Bound', 3, 7, 7, '04:38', 'assets/music/Recovery/10-eminem-space_bound-fum.mp3', 2, 0),
(41, 'Love The Way You Lie (Ft.Rihanna)', 3, 7, 7, '04:23', 'assets/music/Recovery/15-eminem-love_the_way_you_lie_(feat._rihanna)-fum.mp3', 3, 0),
(42, 'I\'ll Keep You Safe', 4, 8, 4, '04:31', 'assets/music/atlas/03 - I\'ll Keep You Safe.flac', 1, 0),
(43, 'Saturn', 4, 8, 4, '04:49', 'assets/music/atlas/18 - Saturn.flac', 2, 0),
(44, 'Lego House', 5, 9, 3, '03:03', 'assets/music/Plus/09 Lego House.mp3', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(3, 'csanjeev', 'Sanjeevkumar', 'Chintakindi', 'sanjeevkumarchintakindi@gmail.com', 'ff43df9df9657c153e373ffac9c4de10', '2018-06-19 13:40:41', 'assets/images/profile-pics/head_emerald.png'),
(4, 'csanjeev1', 'Sanjeevkumar', 'Chintakindi', 'sanjeevkumarchintak1indi@gmail.com', '9551fe8d9c8ad11d733f673cf5280150', '2018-06-19 13:58:14', 'assets/images/profile-pics/head_emerald.png'),
(5, 'csanjeev25', 'Sanjeev', 'Chintakindi', 'sanjeevchintakindi@npaguru.com', '9551fe8d9c8ad11d733f673cf5280150', '2018-06-19 14:09:59', 'assets/images/profile-pics/head_emerald.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artist`),
  ADD KEY `genre` (`genre`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artist`),
  ADD KEY `album` (`album`),
  ADD KEY `genre` (`genre`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`artist`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`album`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
