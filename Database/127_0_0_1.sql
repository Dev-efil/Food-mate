-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 07:27 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-mate`
--
CREATE DATABASE IF NOT EXISTS `food-mate` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `food-mate`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Status` enum('Active','Deactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Email`, `User_name`, `Password`, `Type`, `Status`) VALUES
(1, 'admin@gmail.com', 'adminfood', '123', 'Administrator', 'Active');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `after_insert_admin` AFTER INSERT ON `admin` FOR EACH ROW BEGIN
    INSERT INTO login (User_ID, User_name, Password, Email, Type, Status) VALUES (NEW.Admin_ID, NEW.User_name, NEW.Password, NEW.Email, NEW.Type, NEW.Status);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `Dish_ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Dish_image` varchar(255) NOT NULL,
  `Dish_name` varchar(50) NOT NULL,
  `Dish_info` varchar(255) NOT NULL,
  `Dish_price` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`Dish_ID`, `Restaurant_ID`, `Dish_image`, `Dish_name`, `Dish_info`, `Dish_price`) VALUES
(1, 1, '5b950eb36bcc87.43393428.jpg', 'Chill Burger', 'sadasdasd', 450),
(2, 1, '5b950eca779351.07952903.jpg', 'Hot Burger', 'asdsaw rerer sdwa', 560),
(3, 2, '5b9511128cdf93.17168862.jpg', 'Chicken Exotica', 'asdasd assadas', 1500),
(4, 2, '5b95115ccd6ac1.57848852.jpg', 'Veggie Supreme', 'asdas asdasd', 1200),
(5, 2, '5b9511846ed146.14437803.jpg', 'Chicken Italiano', 'asda reqr bvmnm', 1800),
(6, 3, '5b9513160ab510.32052188.jpg', 'Big box meal', 'asda sdasd ytuy', 800),
(7, 3, '5b95135b3a9804.45775593.jpg', 'Extra crispy', 'asdasd rgrg fsfgrs', 1000),
(8, 4, '5bbadae43ed226.35692809.jpg', 'Sizzle Special Desert', 'Treat yourself to this ultimate experience for the sweet-toothed. A range of sweet dips served in your very own bowl and accompanied by a variety of fruit.', 600),
(9, 8, '5bbb06fc3a2cc0.70705214.jpg', 'Strawberry Cheesecake ', 'Transform summer\'s sweet berries into even-sweeter cakes, crisps, pies, Popsicles and more.', 800);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `User_name` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Token` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_ID`, `User_ID`, `User_name`, `Password`, `Email`, `Type`, `Status`, `Token`) VALUES
(1, 1, 'adminfood', '123', 'admin@gmail.com', 'Administrator', 'Active', NULL),
(2, 1, 'rest1', '$2y$10$dgMytFEUcNCDLGWllUKpt.5ZPqwYPZboJjwCJPZ6ERdbzj8vA.GSa', 'thanushkanth3@gmail.com', 'RManager', 'Active', '9eb935e67d73402'),
(3, 1, 'user1', '$2y$10$8yKiYXKe8HCtVG0T8sfXFe9iqML1d9h852jeidVdVrpWZ4Re7UudK', 'thanushkanth@gmail.com', 'User', 'Deactive', NULL),
(4, 2, 'mikeasd', '$2y$10$711ls4XBtNSJHWEhADTdRunWn8PnHCxLyy6RJCyArygRGwQExVXkq', 'thanush303@gmail.com', 'RManager', 'Active', NULL),
(5, 3, 'rest123', '$2y$10$nm4b3.y5XeR119CTE/odGunEu6OD8nLG0.JKOe.67rzSnqGimsn2i', 'thanu33@gmail.com', 'RManager', 'Active', NULL),
(6, 2, 'milo', '$2y$10$ZqYW6l.5asPj367LxRGo/OftCcNeVKpye.O9w.geQfpcMuZ32/cey', 'milo@gmail.com', 'User', 'Active', NULL),
(7, 4, 'rest2', '$2y$10$4SBd1hDPh2sJaB9HXSWlpu3arPX4/.kaae9Yl4meVinWJDovzMBGO', 'new@gmail.com', 'RManager', 'Deactive', NULL),
(8, 5, 'rest3', '$2y$10$aMZB5uNRLY1zkVUC/k2r/OvTs1pYDCQUu5USPgFPMIccN.VEyFUIq', 'new1@gmail.com', 'RManager', 'Active', NULL),
(9, 6, 'rest4', '$2y$10$q0s80P4Xazj8fUqCRj0G/.XwRZfLHVZYC.zX48Z2zwq/lRlyE7R36', 'sssasth3@gmail.com', 'RManager', 'Deactive', NULL),
(10, 7, 'rest6', '$2y$10$mVtFb1k8AeZMez0Q2durJu1Ak0r/AXwH6y676ZNrSPHogDHIO3RlS', 'thanushka@gmail.com', 'RManager', 'Active', NULL),
(11, 8, 'mike', '$2y$10$/2F59zU3R3qcuDJ1gMUJ6.xZuXChd4rLefMFeCWdIvNq/2TwGE5pC', 'mike@gmail.com', 'RManager', 'Active', NULL),
(12, 3, 'Tom', '$2y$10$vDYDTf1mms1Wc3DnPU59neICPmptrGhWTCmFrAMjOcbJQZXyUEywW', 'thanushkanth95@gmail.com', 'User', 'Active', NULL),
(13, 9, 'William', '$2y$10$noAsH5KAQDrcpVv8Y0j2GOdMgCV18BDmI08ukaQ7uqEUeNG7M5PMC', 'thanushkanth3@gmail.com', 'RManager', 'Active', '9eb935e67d73402'),
(14, 10, 'Manager', '$2y$10$.zxgRYDoK.9h7gRZZmgc9O1oTIu.Kq0yTJMH51HpFz4sPeG8gUdOa', 'manager@gmail.com', 'RManager', 'Active', NULL),
(15, 11, 'Manager', '$2y$10$ZuKZEgLhHyA.MB80NiGuQuviYhOPCaRaYSmrQHeL1aVREv0ucC65C', 'Restaurantmanager@gmail.com', 'RManager', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Menu_ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Menu_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restaurant_ID` int(11) NOT NULL,
  `REditor_ID` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `RName` varchar(50) DEFAULT NULL,
  `Restaurant_info` text,
  `Address` varchar(300) DEFAULT NULL,
  `Contact_No` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Restaurant_ID`, `REditor_ID`, `Image`, `RName`, `Restaurant_info`, `Address`, `Contact_No`, `Email`) VALUES
(1, 2, '5b950c90b6b8b1.05706347.jpg', 'Burger King', 'Best for burgers', '18, 2/3, wellawatte, colombo 06', '0776606500', 'burger@gmail.com'),
(2, 1, '5b950f584635a3.60073519.jpg', 'Pizza Hut', 'Best for pizzas', '18,2/3,wellawatte, colombo', '0776606500', 'pizza@gmail.com'),
(3, 3, '5b9512268d1bc9.54844035.jpg', 'KFC', 'Best for  Fried Chicken ', '18,2/3,wellawatte, colombo', '0776606500', 'kfc@gmail.com'),
(4, 5, '5b951664a161e0.30228003.jpg', 'newtest', 'asdas wqrer asdasda', '18,2/3,wellawatte, colombo', '0776606500', 'newtest@gmail.com'),
(5, 8, '5ba53642018e40.13582864.jpg', 'Dominos', 'asdas dasd fbvgdbgb', '18, 2/3, wellawatte, colombo 06', '2343432324', 'thanushkadd@gmail.com'),
(8, 10, '5bbb01de5f2972.85027031.jpg', 'Restaurant', 'Restaurant-test info', '18, 2/3, wellawatte, colombo 07', '0775604500', 'restaurnattest@gmail.com');

--
-- Triggers `restaurant`
--
DELIMITER $$
CREATE TRIGGER `after_insert_restaurant` AFTER INSERT ON `restaurant` FOR EACH ROW BEGIN
   	Update restauranteditor SET Restaurant_ID =NEW.Restaurant_ID WHERE REditor_ID = NEW.REditor_ID;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `restauranteditor`
--

CREATE TABLE `restauranteditor` (
  `REditor_ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) DEFAULT NULL,
  `REditor_profile_pic` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `REditorContact_No` int(20) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Status` enum('Active','Deactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restauranteditor`
--

INSERT INTO `restauranteditor` (`REditor_ID`, `Restaurant_ID`, `REditor_profile_pic`, `Email`, `REditorContact_No`, `User_name`, `Password`, `Type`, `Status`) VALUES
(1, 2, '5b88dcd87aa8b6.49449445.jpg', 'thanushkanth3@gmail.com', 776606500, 'rest1', '$2y$10$vQz7oHIgJSnT6faDcZmmw.HvYO5cysBMiXQUzZzfhFYjcYwhnkN5K', 'RManager', 'Active'),
(2, 1, '5b88dd94339e87.86153917.jpg', 'thanush303@gmail.com', 776606500, 'mikeasd', '$2y$10$711ls4XBtNSJHWEhADTdRunWn8PnHCxLyy6RJCyArygRGwQExVXkq', 'RManager', 'Active'),
(3, 3, '5b88dded417915.85346038.jpg', 'thanu33@gmail.com', 776606507, 'rest123', '$2y$10$nm4b3.y5XeR119CTE/odGunEu6OD8nLG0.JKOe.67rzSnqGimsn2i', 'RManager', 'Active'),
(4, NULL, '5b91ea7a97ee44.52998974.jpg', 'new@gmail.com', 776606507, 'rest2', '$2y$10$4SBd1hDPh2sJaB9HXSWlpu3arPX4/.kaae9Yl4meVinWJDovzMBGO', 'RManager', 'Deactive'),
(5, 4, '5b91ecf94a13b2.17687291.jpg', 'new1@gmail.com', 776606500, 'rest3', '$2y$10$aMZB5uNRLY1zkVUC/k2r/OvTs1pYDCQUu5USPgFPMIccN.VEyFUIq', 'RManager', 'Active'),
(6, NULL, '5b91ed6d65d4e0.43102825.jpg', 'sssasth3@gmail.com', 776606500, 'rest4', '$2y$10$q0s80P4Xazj8fUqCRj0G/.XwRZfLHVZYC.zX48Z2zwq/lRlyE7R36', 'RManager', 'Deactive'),
(7, 6, '5b91ed860841b2.21149946.jpg', 'thanushka@gmail.com', 776606500, 'rest6', '$2y$10$mVtFb1k8AeZMez0Q2durJu1Ak0r/AXwH6y676ZNrSPHogDHIO3RlS', 'RManager', 'Active'),
(8, 5, '5ba374f6df7e29.32507731.jpeg', 'mike@gmail.com', 776606500, 'mike', '$2y$10$/2F59zU3R3qcuDJ1gMUJ6.xZuXChd4rLefMFeCWdIvNq/2TwGE5pC', 'RManager', 'Active'),
(9, NULL, '5bbaae99e5d257.76548310.jpg', 'thanushkanth3@gmail.com', 776607580, 'William', '$2y$10$noAsH5KAQDrcpVv8Y0j2GOdMgCV18BDmI08ukaQ7uqEUeNG7M5PMC', 'RManager', 'Active'),
(11, NULL, '5bbb01a26d2c40.47065689.jpeg', 'Restaurantmanager@gmail.com', 776606543, 'Manager', '$2y$10$ZuKZEgLhHyA.MB80NiGuQuviYhOPCaRaYSmrQHeL1aVREv0ucC65C', 'RManager', 'Active');

--
-- Triggers `restauranteditor`
--
DELIMITER $$
CREATE TRIGGER `after_insert_restauranteditor` AFTER INSERT ON `restauranteditor` FOR EACH ROW BEGIN
    INSERT INTO login (User_ID, User_name, Password, Email, Type, Status) VALUES (NEW.REditor_ID, NEW.User_name, NEW.Password, NEW.Email, NEW.Type, NEW.Status);
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_restauranteditor` AFTER UPDATE ON `restauranteditor` FOR EACH ROW begin
update login
set Status = NEW.Status
where User_name = NEW.User_name;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Review_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `Dish_ID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Review_ID`, `User_ID`, `username`, `Dish_ID`, `Comment`, `Posted_date`) VALUES
(1, 1, 'user1', 1, 'very delicious burger', '2018-09-09 12:50:10'),
(2, 1, 'user1', 5, 'Chicken Italiano is very tastiest pizza', '2018-09-09 12:53:30'),
(3, 1, 'user1', 1, 'Good food', '2018-09-15 14:08:48'),
(4, 1, 'user1', 2, 'Spicy Burger', '2018-09-15 16:29:16'),
(5, 1, 'user1', 2, 'very spicy', '2018-09-20 12:37:45'),
(6, 2, 'milo', 7, 'very good', '2018-09-20 12:54:12'),
(7, 2, 'milo', 1, 'Very tasty', '2018-09-20 12:58:16'),
(8, 3, 'Tom', 1, 'This burger is very delicious. I can recommend this one. ', '2018-10-08 00:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `DateOfBirth` varchar(20) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Contact_No` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Status` enum('Active','Deactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Photo`, `First_name`, `Last_name`, `DateOfBirth`, `Country`, `State`, `City`, `Contact_No`, `Email`, `User_name`, `Password`, `Type`, `Status`) VALUES
(1, '5b88dd3f70c4b9.85691991.jpg', 'Thanushkanth', 'shan', '03/08/1995', 'Sri Lanka', 'Colombo', 'Wellawatte', '0776606500', 'thanushkanth@gmail.com', 'user1', '$2y$10$8yKiYXKe8HCtVG0T8sfXFe9iqML1d9h852jeidVdVrpWZ4Re7UudK', 'User', 'Deactive'),
(2, '5b88de48905906.74767391.jpg', 'Milo', 'ty', '03/08/1985', 'Sri Lanka', 'Colombo', 'Wellawatte', '0776606545', 'milo@gmail.com', 'milo', '$2y$10$ZqYW6l.5asPj367LxRGo/OftCcNeVKpye.O9w.geQfpcMuZ32/cey', 'User', 'Active'),
(3, '5bbaa8db6f2f16.31525962.jpg', 'Tom', 'Hardy', '1982', 'Sri Lanka', 'Colombo', 'Mount Lavinia', '0776656500', 'thanushkanth95@gmail.com', 'Tom', '$2y$10$vDYDTf1mms1Wc3DnPU59neICPmptrGhWTCmFrAMjOcbJQZXyUEywW', 'User', 'Active');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `after_insert_user` AFTER INSERT ON `user` FOR EACH ROW BEGIN
    INSERT INTO login (User_ID, User_name, Password, Email, Type, Status) VALUES (NEW.User_ID, NEW.User_name, NEW.Password, NEW.Email, NEW.Type, NEW.Status);
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_user` AFTER UPDATE ON `user` FOR EACH ROW begin
update login
set Status = NEW.Status
where User_name = NEW.User_name;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`Dish_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Menu_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restaurant_ID`),
  ADD KEY `REditor_ID` (`REditor_ID`);

--
-- Indexes for table `restauranteditor`
--
ALTER TABLE `restauranteditor`
  ADD PRIMARY KEY (`REditor_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Dish_ID` (`Dish_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `Dish_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Menu_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Restaurant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `restauranteditor`
--
ALTER TABLE `restauranteditor`
  MODIFY `REditor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
