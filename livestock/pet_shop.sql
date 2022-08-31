-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 10:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Livestock`
--

-- --------------------------------------------------------

--
-- Table structure for table `newuser`
--

CREATE TABLE `newuser` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(35) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `user_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`id`, `username`, `password`, `phoneno`, `address`, `email`, `city`, `pincode`, `user_img`) VALUES
(1, 'user', 'user', '9876543210', 'india', 'example@gmail.com', 'india', '605005', 'beagle dog1.jpg'),
(4, 'Yemula Sai Satya', 'kgrcet123', '7995061384', 'H.no: 13-6-462/A/22/1, Bhagwan Das Bagh, Karwan, Hyderabad', 'placements@kgr.ac.in', 'Hyderabad', '500006', ''),
(5, 'manisha', '123456', '7888987891', 'hhhhh', 'kkkkkk@gmail.com', 'jkkkkk', '899009', ''),
(6, 'rajeshwari', '1234567', '8008098707', 'H.no: 13-6-462/A/22/1, Bhagwan Das Bagh, Karwan, Hyderabad', 'yemulasaisatya@gmail.com', 'Hyderabad', '500006', '');

-- --------------------------------------------------------

--
-- Table structure for table `petdetails`
--

CREATE TABLE `petdetails` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_type` varchar(50) NOT NULL,
  `pet_color` varchar(20) NOT NULL,
  `pet_rate` varchar(10) NOT NULL,
  `pet_keywords` varchar(200) NOT NULL,
  `pet_features1` varchar(50) NOT NULL,
  `pet_features2` varchar(50) NOT NULL,
  `pet_img1` varchar(50) NOT NULL,
  `pet_img2` varchar(50) NOT NULL,
  `pet_img3` varchar(50) NOT NULL,
  `pet_img4` varchar(50) NOT NULL,
  `pet_foods` varchar(50) NOT NULL,
  `pet_owner` varchar(80) NOT NULL,
  `pet_death_place` varchar(50) NOT NULL,
  `pet_birth_place` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petdetails`
--

INSERT INTO `petdetails` (`pet_id`, `pet_name`, `pet_type`, `pet_color`, `pet_rate`, `pet_keywords`, `pet_features1`, `pet_features2`, `pet_img1`, `pet_img2`, `pet_img3`, `pet_img4`, `pet_foods`, `pet_owner`, `pet_death_place`, `pet_birth_place`) VALUES
(9, 'fancy rabbit', 'rabbit', 'white', '1500', 'rabbit', 'cute ear', 'looking nice ', 'lionhead rabbit.jpg', 'Angora-Rabbit-Photo.jpg', '5-popular-bunnies-netherlands-dwarf-511074055.jpg', 'gaint rabbit.jpg', 'Basil, Bokchoy,Carrot etc', '', '', ''),
(10, 'alaska', 'rabbit', 'black', '1000', 'rabbit,muyal', 'black and white', 'dark brown', '5-popular-bunnies-netherlands-dwarf-511074055.jpg', 'Angora-Rabbit-Photo.jpg', 'lionhead rabbit.jpg', 'fancy rabbit.jpg', 'dark leafy greens, various squashes, carrots etc', '', '', ''),
(11, 'parrot Green', 'bird', 'green', '500', 'parrot,kili,keeli,kile', 'colorfull', 'dark red nose', 'indian parrots_.jpg', 'parrot1.jpg', 'parrot2.jpg', 'parrot.jpg', 'green vegetables etc', '', '', ''),
(12, 'love bird', 'bird', 'blue mixing', '1500', 'parrot,kili,keeli,kile', 'colorfull', 'nice ear', 'love3.jpg', 'love bird.jpg', 'love4.jpg', 'love4.jpg', 'vegetables etc', '', '', ''),
(13, 'bengal dog', 'dog', 'black and white', '1500', 'dog,nai', 'colorfull', 'looking nice ', 'beagle dog1.jpg', 'dog2.jpg', 'dog3.jpg', 'dog3.jpg', 'pedigiry', '', '', ''),
(14, 'pixabay', 'rabbit', 'brown', '500', 'rabbit,muyal', 'colorfull', 'looking nice ', 'pixabay2.jpg', 'pixabay2.jpg', 'pixabay1rab.jpg', 'pixabay4.jpg', 'vegetables etc', '', '', ''),
(20, 'lusy', 'dog', 'black with brown', '2500', 'dog,nai', 'soft hair', 'looking nice ', 'dog2.jpg', 'l2.jpg', 'l3.jpg', 'l4.jpg', 'pedigiry', '', '', ''),
(22, 'new jersey', 'COW', 'black', '', 'new jersey', 'good helath', '', 'a.jpg', 'b.png', '', '', 'green vegetables etc', 'yemula sai satya', '', ''),
(24, 'Helen', 'COW', 'white', '50000', 'helen', 'good health', 'gives good milk rate', 'b.png', '', '', '', 'green vegetables etc', 'rajeshwari', '', 'india');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newuser`
--
ALTER TABLE `newuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petdetails`
--
ALTER TABLE `petdetails`
  ADD PRIMARY KEY (`pet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newuser`
--
ALTER TABLE `newuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `petdetails`
--
ALTER TABLE `petdetails`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
