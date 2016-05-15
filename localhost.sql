-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2015 at 10:32 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_project`
--
CREATE DATABASE IF NOT EXISTS `group_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `group_project`;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `year` int(4) NOT NULL,
  `description` text,
  `quantity` int(11) NOT NULL,
  `price` decimal(50,2) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `year`, `description`, `quantity`, `price`, `image`) VALUES
(1, 'Burton Clash Snowboard ', 2016, 'The Burton Clash Snowboard was built for a baller on a budget. The Clash is a do it all board that will get you on a fast-track through the basics or take you through a season across the entire mountain with style.', 10, '379.95', 'http://images.evo.com/imgp/700/93788/410624/burton-clash-snowboard-2016-139.jpg'),
(2, 'Lib Tech Skate Banana BTX Snowboard', 2016, 'When you''re dropping in on the Lib Tech Skate Banana BTX Snowboard, there is no time for selfies - just face shots and perfectly greased rails. The BTX rocker makes for a playful yet predictable ride on any terrain, but truly excels as a jibbing machine.', 10, '489.95', 'http://images.evo.com/imgp/700/92802/408654/lib-tech-skate-banana-btx-snowboard-2016-blue.jpg'),
(3, 'CAPiTA Horrorscope Snowboard', 2016, 'Slaying urban rails for many winters, the CAPiTA Horrorscope Snowboard is a jib junky with a durable construction that will withstand the impacts of hard park riding. ', 10, '369.95', 'http://images.evo.com/imgp/700/92333/416513/capita-horrorscope-snowboard-2016-141.jpg'),
(4, 'Lib Tech T.Rice Pro C2BTX Snowboard', 2016, 'When you see Travis Rice''s shred level, you know his gear better stand up to the ultimate test of power and durability. The Lib Tech T.Rice Pro C2 BTX Snowboard was born to meet Travis'' expectations, and boy has it prevailed.', 10, '559.95', 'http://images.evo.com/imgp/700/91385/408652/lib-tech-t-rice-pro-c2-btx-snowboard-2016-150.jpg'),
(5, 'Burton Throwback Snowboard', 2016, 'Are you ready for an Instagram throwback Thursday? The Burton Throwback Snowboard sure is! Even though the Throwback is supposed to be a blast from the past, the only old-school feature about this pow-stick is that it is made to ride boundary-free, just like the good ol'' days before resorts even allowed boarders.', 10, '119.95', 'http://images.evo.com/imgp/700/90096/416702/burton-throwback-snowboard-2016-100.jpg'),
(6, 'Never Summer Proto HD Snowboard', 2016, 'The Proto HD is a balanced ride with Harmonic Dampers and a unique Perforated Rocker Pad for a board that remains chatter-less and smooth when ripping at high speeds. ', 10, '559.99', 'http://images.evo.com/imgp/700/91021/418193/clone.jpg'),
(7, 'CAPiTA Ultrafear Snowboard', 2016, 'A true winner, the CAPiTA Ultrafear Snowboard has won the Transworld Good Wood Test, the Snowboarder Magazine''s Platinum Pick and High Cascade Camper''s Choice multiple times.', 10, '479.95', 'http://images.evo.com/imgp/700/92323/415769/capita-ultrafear-snowboard-2016-147.jpg'),
(8, 'Never Summer Ripsaw Snowboard', 2016, 'This isn''t a pow-destroyer, groomer-ripper, or park destroyer. This is the Ripsaw. Unlike you''re niche board, anything tossed at the Ripsaw is shredded into oblivion.', 10, '519.99', 'http://images.evo.com/imgp/700/91013/400061/never-summer-ripsaw-snowboard-2016-153.jpg'),
(9, 'Never Summer West Snowboard', 2016, 'The wild west hosts some of the gnarliest terrain known to man so if you''re planning on taking on Mother Nature in one of her raddest forms, take the appropriate tool for the job.', 10, '569.99', 'http://images.evo.com/imgp/700/91009/412302/never-summer-west-snowboard-2016-152.jpg'),
(10, 'Ride Berzerker Snowboard', 2016, 'Chances are you''re not Jake Blauvelt but with the Ride Berzerker Snowboard, you can also ride the insane terrain Mother Nature has to offer. With the Hybrid All Mountain profile, a rockered nose keeps you afloat in deep snow, with stable and precise mellow camber underfoot.', 10, '509.95', 'http://images.evo.com/imgp/700/93412/404563/ride-berzerker-snowboard-2016-156.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `estimated_shipping_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Casey Anderson', 'CAnderson', '11111', 1),
(2, 'Corey Anderson', '', '', 0),
(3, 'Bailey Turner', '', '', 0),
(4, 'Jake Curran', '', '', 0),
(5, 'Jacob Carter', '', '', 0),
(6, 'John Porten', 'jmporten', 'qqqqq', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `inventory` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
