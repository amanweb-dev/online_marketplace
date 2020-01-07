-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 07:27 PM
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
  `user_id` int(11) NOT NULL,
  `m_user_name` varchar(255) DEFAULT NULL,
  `m_user_email` varchar(255) DEFAULT NULL,
  `massages` text NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `msg_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_massage`
--

INSERT INTO `admin_massage` (`m`, `user_id`, `m_user_name`, `m_user_email`, `massages`, `admin_id`, `msg_status`) VALUES
(6, 11, 'User One', 'userone@gmail.com', 'hello', NULL, 0),
(7, 11, 'User One', 'userone@gmail.com', 'i ordered an item via', NULL, 0),
(8, 11, 'User One', 'userone@gmail.com', 'It is a long established fact that.\r\n\r\n', NULL, 0);

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
(14, 'Pet and Animal', 'db15d425-0b13-11e2-87b9-0050568626ea.jpg');

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
(11, 'Kabila', 'ordermgr', '81dc9bdb52d04dc20036dbd8313ed055', 'Sadman Abir', 'profile.php?id=100009422126917', '#', 'sadman_abir21', '23844933_1970274136629971_7503969115387765521_n.jpg'),
(12, 'suvo', 'Modaretor', '81dc9bdb52d04dc20036dbd8313ed055', 'Misu Sabbir', '#', '#', '#', '26233246_2016165405326779_3121184452093204638_o.jpg'),
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

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`msg_id`, `sender_id`, `reciever_id`, `massages`, `msg_date`, `msg_status`, `msg_type`) VALUES
(162, 11, 12, 'Hello.. is your product sold out?', '2019-12-29 17:48:22', 1, 1),
(163, 12, 11, 'No.It is available.You can contact me personally or contact to the system.thanks', '2019-12-29 17:51:34', 1, 1),
(164, 12, 13, 'is the price fixed?', '2019-12-29 17:58:44', 1, 1),
(165, 13, 12, 'No you can talk to me.', '2019-12-29 18:00:33', 0, 1);

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
  `seller_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordr_id`, `ordr_post_id`, `seller_email`, `buyer_email`, `receiver_name`, `receiver_number`, `receiver_address`, `delivery_option`, `payment_method`, `total_bill`, `ordr_date`, `ordr_status`, `confirm_status`, `seller_number`) VALUES
(12, 35, 'userone@gmail.com', 'userthree@gmail.com', 'User Three', '01822222222', 'house no:3,lane:8, Block :A, mirpur-6,Dhaka', 'via_system', 'user_card', 3500, '2019-12-29 17:28:55', 1, 3, '01000000000'),
(13, 36, 'userone@gmail.com', 'usertwo@gmail.com', 'User Two', '01711111111', 'house no:3,lane:8, Block :A, mirpur-14,Dhaka', 'self', 'user_card', 2500, '2019-12-29 17:42:16', 1, 3, '01000000000');

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
(35, 'userone@gmail.com', 'Dual Core CPU', '3500', '01000000000', 'Used', 10, 'mirpur 10', '72484924_549584292519245_8781432443400880128_n.jpg', 'Dual Core PC with 19\" LED. 1 Year (Ltd.) Replace and Service Warranty.\r\n. Processor Intel Dual Core 3.0/2.80GHz (3m/1066)\r\n. Motherboard Intel G31/G41 chip Korean\r\n03. Ram DDR2 GB 800 Samsung Genuine Korean\r\n04. Hard disk 500GB sata\r\n05. Thermal Case with 500 watt power box\r\n06. Keyboard and Mouse Optical USB', 1, 0, 1),
(36, 'userone@gmail.com', 'Monitor', '2500', '01000000000', 'Used', 10, 'mirpur 10', '80074250_449120232451729_1198293629316104192_n.jpg', 'Original Samsung Monitor\r\nScreen Size - 16\"\r\nCondition - Fresh\r\nWarranty - 7 Days', 1, 0, 1),
(37, 'usertwo@gmail.com', 'House For Rent', '15000', '01711111111', 'New', 12, 'mirpur 11', 'hsss.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.', 1, 0, 0),
(38, 'usertwo@gmail.com', 'Yamaha YZF-R15 V3.0', '350000', '01711111111', 'Used', 11, 'mirpur 6', '43177__ANI8066.jpg', 'Yamaha had recently increased the price of the R15 V3 by Rs 600. It now retails at Rs 1,40,880 (ex-showroom Delhi). However, we do expect the price to be hiked once again by around 10-15 per cent for the BS6-compliant model. Official documents of the BS6-compliant model showcasing a drop in power were leaked online recently. The BS6 bike will produce 18.63PS compared to the current modelâ€™s 19.3PS. Expect the BS6-compliant model to be launched by the end of this year.', 1, 0, 0),
(39, 'userthree@gmail.com', 'Samsung S8', '25000', '01822222222', 'New', 9, 'mirpur 14', 'giant_56001.jpg', 'Multi-SIM	Dual SIM model (Hybrid SIM slot)\r\nSIM size	Nano-SIM (4FF)\r\nInfra	2G GSM,3G WCDMA,3G TD-SCDMA,4G LTE FDD,4G LTE TDD\r\n2G GSM	GSM850,GSM900,DCS1800,PCS1900\r\n3G UMTS	B1(2100),B2(1900),B4(AWS),B5(850),B8(900)\r\n4G FDD LTE	B1(2100), B2(1900), B3(1800), B4(AWS), B5(850), B7(2600), B8(900), B12(700), B13(700), B17(700), B18(800), B19(800), B20(800), B25(1900), B26(800), B28(700), B32(1500), B66(AWS-3)', 1, 0, 0),
(40, 'userthree@gmail.com', 'Acer One 14', '30000', '01822222222', 'Used', 10, 'mirpur 12', 'maxresdefault.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution', 1, 0, 0),
(41, 'userfour@gmail.com', 'Single Male Budgerigar', '2500', '01933333333', 'Used', 14, 'mirpur 14', '1727.jpg', 'Post Content:\r\nYF2 double circle (frillback blood line) 4 times breeded Call for details.......', 1, 0, 0),
(42, 'userfour@gmail.com', 'Lava Iris 50 2GB RAM 16GB ROM', '7000', '01933333333', 'Used', 9, 'mirpur 1', 'giant_86217.jpg', 'IPS LCD capacitive touchscreen, 480 x 854 pixels resolution display, 8MP single rear camera and 2MP selfie camera, 5.0 inch and ~70.5% screen-to-body ratio, dual-LED flash, li-po 3000 mAh removable battery.', 1, 0, 0);

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
(13, 'userthree@gmail.com', 'User Three', '01822222222', 'dummy-user-img-1-400x400_x_acf_cropped.png', '$2y$12$f/M9m0gACKy7UGUQxnvHaeZ89MAGYn.Zhu1VKQGYWl7reAXmPG3kG', '151617181', '6500', 6),
(11, 'userone@gmail.com', 'User One', '01000000000', '822711_user_512x512.png', '$2y$12$FhqgFIe1/a.wgnxmvapOSu/KNwoIC4fXmon2XEVBs4reYpxXq4N4K', '123456789', '10000', 6),
(12, 'usertwo@gmail.com', 'User Two', '01711111111', 'avatar1.png', '$2y$12$xXcHHSJdCJayDdU5zZaILOnqJzJwsfaFwpkUQnfgXVVltNyYkbCGe', '101112131', '7500', 6),
(14, 'userfour@gmail.com', 'User Four', '01933333333', 'img_avatar2.png', '$2y$12$68qn6HHaHgMaAyohPmSPtehcLRpfl3oNq.W.4ACx5XNQj8I2xsv4C', '202122232', '10000', 6);

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
  MODIFY `m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dashboard_user`
--
ALTER TABLE `dashboard_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
