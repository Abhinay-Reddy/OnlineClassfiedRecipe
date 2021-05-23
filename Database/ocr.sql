-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 06:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocr`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL,
  `picname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `categoryname`, `picname`) VALUES
(1, 'Pizza', 'pizza.jpg'),
(2, 'Super Bowl', 'superbowl.jpg'),
(3, 'Weekday', 'weekday.jpg'),
(4, 'Veg Pizza', 'vegpizza.jpg'),
(5, 'Pasta Pizza', 'pastapizza.jpg'),
(6, 'sides', 'sides.jpg'),
(7, 'Non Veg Pizza', 'nonvegpizza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mealtype`
--

CREATE TABLE `mealtype` (
  `mid` int(11) NOT NULL,
  `mealname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mealtype`
--

INSERT INTO `mealtype` (`mid`, `mealname`) VALUES
(1, 'Appetizer'),
(2, 'Main Dish'),
(3, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rdate` date NOT NULL,
  `ptime` varchar(255) NOT NULL,
  `ctime` varchar(255) NOT NULL,
  `servings` int(11) NOT NULL,
  `psteps` varchar(255) NOT NULL,
  `mealtype` varchar(255) NOT NULL,
  `picturename` varchar(255) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`rid`, `uid`, `name`, `rdate`, `ptime`, `ctime`, `servings`, `psteps`, `mealtype`, `picturename`, `rating`) VALUES
(32, 1, 'Peppy Paneer', '2021-05-23', '30 mins', '10 mins', 2, 'Take pizza dough and make a flat thin crust||Add cheese on top of it||Add vegetables and paneer||Add Red Paprika||bake it in oven for 10mins at 350F', 'Main', 'peppypaneer.jpg', 4.5),
(33, 1, 'Veggie Paradise', '2021-05-23', '30 mins', '10 mins', 1, 'Take pizza dough and make a flat thin crust||Add cheese on top of it||Add golden corn, black olives, capsicum||Add Red Paprika||Bake it in oven for 10mins at 350F', 'Main', 'veggieparadise.jpg', 4.8),
(34, 1, 'Moroccan Spice Pasta Pizza', '2021-05-23', '30 mins', '10 mins', 3, 'Take pizza dough and make a flat thin crust||Add cheese on top of it||Add Harissa Sauce||Add Peri Peri Chicken Chunks||Add Delicious Pasta on top of it||Bake it in oven for 10mins at 350F', 'Main', 'moroccanspicespastapizza.jpg', 3),
(35, 1, 'Chicken Sausage Pizza', '2021-05-23', '30 mins', '10 mins', 5, 'Take pizza dough and make a flat thin crust||Add cheese on top of it||Add Tomato Sauce||Add Herbed Chicken and Sausage Chunks||Bake it in oven for 10mins at 350F', 'Main', 'chickensausage.jpg', 5),
(36, 1, 'Rosted Chicken Wings', '2021-05-23', '5 mins', '5 mins', 1, 'Take 10 pieces of frozen marinated Chicken Wings||De Freeze the chicken wings||Boil the wings in oil for 5mins ', 'Appetizer', 'rostedchickenwings.jpg', 4),
(37, 1, 'Boneless Chicken Wings', '2021-05-23', '5 mins', '5 mins', 1, 'Take 10 pieces of frozen boneless Chicken Wings||De Freeze the chicken wings||Boil the wings in oil for 5mins ', 'Appetizer', 'bonelesschickenwings.jpg', 4.9),
(38, 1, 'Chicken Meat Balls', '2021-05-23', '5 mins', '5 mins', 1, 'Take 10 pieces of frozen Chicken Meat Balls||De Freeze the chicken meat balls||Boil the meatballs in oil for 5mins ', 'Appetizer', 'chickenmeatballs.jpg', 3.5),
(39, 1, 'Choco Lava Cake', '2021-05-23', '5 mins', '5 mins', 1, 'Take Frozen Choco lava cake || remove the cover and everything||Place it in oven and heat it for 5 mins || ready to serve', 'Dessert', 'chocolavacake.jpg', 5),
(40, 1, 'Red Velvet Lava Cake', '2021-05-23', '5 mins', '5 mins', 1, 'Take Frozen Red Velvet Lava cake || remove the cover and everything||Place it in oven and heat it for 5 mins || ready to serve', 'Dessert', 'redvelvetlavacake.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `recipecategories`
--

CREATE TABLE `recipecategories` (
  `cid` int(11) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipecategories`
--

INSERT INTO `recipecategories` (`cid`, `rid`) VALUES
(1, 32),
(4, 32),
(1, 33),
(4, 33),
(1, 34),
(2, 34),
(3, 34),
(5, 34),
(7, 34),
(1, 35),
(2, 35),
(5, 35),
(7, 35),
(3, 36),
(6, 36),
(3, 37),
(6, 37),
(3, 38),
(6, 38),
(3, 39),
(6, 39),
(3, 40),
(6, 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `utype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `password`, `utype`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 2),
(14, 'Abhinay', 'abhi@gmail.com', 'abhinay', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `name` (`categoryname`),
  ADD UNIQUE KEY `picname` (`picname`);

--
-- Indexes for table `mealtype`
--
ALTER TABLE `mealtype`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `recipecategories`
--
ALTER TABLE `recipecategories`
  ADD KEY `cid` (`cid`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mealtype`
--
ALTER TABLE `mealtype`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `recipecategories`
--
ALTER TABLE `recipecategories`
  ADD CONSTRAINT `recipecategories_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`),
  ADD CONSTRAINT `recipecategories_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `recipe` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
