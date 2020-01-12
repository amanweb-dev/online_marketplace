-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 04:47 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kenabecha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_massage`
--

CREATE TABLE `admin_massage` (
  `m` int(11) NOT NULL,
  `m_user_name` varchar(255) DEFAULT NULL,
  `m_user_email` varchar(255) DEFAULT NULL,
  `m_user_cntct` varchar(255) NOT NULL,
  `massages` text NOT NULL,
  `msg_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_massage`
--

INSERT INTO `admin_massage` (`m`, `m_user_name`, `m_user_email`, `m_user_cntct`, `massages`, `msg_status`) VALUES
(9, 'amanullh aman', 'amanullah.bcse@gmail.com', '01756007000', 'need help', 1),
(10, 'abc', 'abc@x.com', '01765007000', 'and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1),
(11, 'xyz', 'crazycoder.bubt@gmail.com', '0178949510', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution .', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_logo` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_logo`) VALUES
(12, 'Property', 'investmentproperty.jpg'),
(11, 'Vehicle', '78796094_2397708760543715_3751316464590651392_n.jpg'),
(10, 'PC And Laptop', '67349548_2369154860026834_1247586891662884864_n.jpg'),
(9, 'Mobile', '79665917_967689066946076_2323345829873582080_n (1).png'),
(14, 'Pet and Animal', 'db15d425-0b13-11e2-87b9-0050568626ea.jpg'),
(15, 'Electronics', 'eagle electronics logo copy.png');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_user`
--

CREATE TABLE `dashboard_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_full_name` varchar(255) DEFAULT NULL,
  `user_fb` varchar(255) DEFAULT NULL,
  `user_twiter` varchar(255) DEFAULT NULL,
  `user_insta` varchar(255) DEFAULT NULL,
  `user_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard_user`
--

INSERT INTO `dashboard_user` (`user_id`, `user_name`, `user_role`, `user_password`, `user_full_name`, `user_fb`, `user_twiter`, `user_insta`, `user_img`) VALUES
(1, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Crazy Coder', 'amanullah.bcse', 'Amanullah_bcse', 'erroronline749', '73349316_491767754884367_129795440693477376_o.jpg'),
(11, 'admin111', 'ordermgr', '81dc9bdb52d04dc20036dbd8313ed055', 'Sadman Abir', 'profile.php?id=100009422126917', '#', 'sadman_abir21', '23844933_1970274136629971_7503969115387765521_n.jpg'),
(12, 'admin000', 'Modaretor', '81dc9bdb52d04dc20036dbd8313ed055', 'Misu Sabbir', '#', '#', '#', '26233246_2016165405326779_3121184452093204638_o.jpg'),
(13, 'aman', 'Founder', '81dc9bdb52d04dc20036dbd8313ed055', 'Amanullah Aman', 'amanullah.bcse', 'Amanullah_bcse', 'erroronline749', 'image_1_long.jpg'),
(14, 'alif', 'Finance', '81dc9bdb52d04dc20036dbd8313ed055', 'Samin Sakif Alif', 'alif030496', '#', 'samin_sakif_alif', '80445742_2794605807292401_6948126387542687744_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `msg_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `reciever_id` int(11) DEFAULT NULL,
  `massages` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_status` int(11) DEFAULT 0,
  `msg_type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordr_id` int(11) NOT NULL,
  `ordr_post_id` int(11) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `buyer_email` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_number` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `delivery_option` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total_bill` int(11) NOT NULL,
  `ordr_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ordr_status` int(11) NOT NULL DEFAULT 0,
  `confirm_status` int(11) NOT NULL DEFAULT 0,
  `seller_number` varchar(255) DEFAULT NULL,
  `order_deletion_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_user_email` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_price` varchar(255) NOT NULL,
  `post_contact` varchar(255) NOT NULL,
  `post_condition` varchar(255) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_location` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `post_details` text NOT NULL,
  `post_status` int(11) NOT NULL DEFAULT 0,
  `post_mark` int(11) NOT NULL DEFAULT 0,
  `selling_status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_user_email`, `post_title`, `post_price`, `post_contact`, `post_condition`, `post_category_id`, `post_location`, `post_image`, `post_details`, `post_status`, `post_mark`, `selling_status`) VALUES
(47, 'taher.khan.6677@gmail.com', 'Realme 3 3/64gb', '9900', '01751426293', 'Used', 9, 'mirpur 10', 'gsmarena_027.jpg', 'Bluetooth, Camera, Dual-Lens Camera, Dual SIM, Expandable Memory, Fingerprint Sensor, GPS, Motion Sensors, 3G, 4G, GSM, Touch screen', 1, 0, 0),
(46, 'taher.khan.6677@gmail.com', 'TVS Apache RTR 2018', '128000', '01751426293', 'Used', 11, 'mirpur 10', '2018-TVS-Apache-RTR-160-4V-India-launch-Red-rear-right-quarter.jpg', 'TVS Apache RTR 160 (matt yellow).\r\n1st owner. Full fresh, kono spot nai.\r\nDhaka Metro LA-38 serial. Digital number plate and all papers up to date.', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_photo` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_card` varchar(255) DEFAULT NULL,
  `user_card_bl` varchar(255) NOT NULL DEFAULT '10000',
  `user_notf` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_phone`, `user_photo`, `user_pass`, `user_card`, `user_card_bl`, `user_notf`) VALUES
(18, 'taher.khan.6677@gmail.com', 'Taher Khan', '01751426293', 'Untitled-1.jpg', '$2y$12$PRIgbT9ozvG4FTc1clFEbeZuKZVS.LDdIBk57meRmikFpuHn/UE7u', '101112131', '10000', 0),
(19, 'itz.siam@gmail.com', 'Siam', '01747257744', 'siam.jpg', '$2y$12$B88jy/nzkfz4FoBp8G6cJODyau4KgeLw.YgWo0NIXkUDABgijIwZi', '141516171', '10000', 0),
(17, 'itzmemamun80@gmail.com', 'Al Mamun', '01775251044', '80189186_579682152590667_1176776027846737920_n.jpg', '$2y$12$/izCUgRuBLJwj7pJJuxiROOxX0Mpp0GGD6ranmXzv5nsyIbz9bhO2', '16173103079', '10000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_massage`
--
ALTER TABLE `admin_massage`
  ADD PRIMARY KEY (`m`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `dashboard_user`
--
ALTER TABLE `dashboard_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordr_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_massage`
--
ALTER TABLE `admin_massage`
  MODIFY `m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dashboard_user`
--
ALTER TABLE `dashboard_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
