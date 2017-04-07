-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2016 at 12:07 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_metronic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app_images`
--

CREATE TABLE IF NOT EXISTS `tbl_app_images` (
  `aid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_app_images`
--

INSERT INTO `tbl_app_images` (`aid`, `mid`, `img`) VALUES
(43, 3, '1450246559-fioguNXl.jpg'),
(44, 3, '1450246559-F50JBVXU.jpeg'),
(45, 1, '1456808308-hNidJReU.png'),
(46, 1, '1456808308-0rsLNkWx.png'),
(57, 8, '1457679338-mSbgMLOE.jpg'),
(58, 8, '1457679339-9SsAKDWN.jpg'),
(59, 8, '1457679339-xeSzZQoD.jpg'),
(60, 8, '1457679339-ZYLKGes5.jpg'),
(61, 8, '1457679352-IT32dSLv.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `cid` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cid`, `cname`, `cat_img`, `description`) VALUES
(1, 'Book', '', 'Book'),
(2, 'Auto', '', 'Auto'),
(3, 'Mobiles', '1445859771-Nsk9fGQq.jpg', 'Microsoft,Nokia'),
(4, 'Accessories', '1445859967-ITgykX3M.jpg', 'All Type of Accessories'),
(5, 'aaa', '1448540751-COARPtxa.jpg', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cid` int(11) NOT NULL,
  `osid` varchar(50) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `keywords` text NOT NULL,
  `desc` text NOT NULL,
  `seotitle` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cid`, `osid`, `cname`, `status`, `keywords`, `desc`, `seotitle`) VALUES
(1, 'Android', 'Dictionary', 'Disable', 'dictionary', 'Gujarati dictionary.', 'dictionary'),
(2, 'Windows', 'Games', 'Disable', 'games', 'App Games', 'games');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`, `status`, `link`) VALUES
(6, 'Home', 'Enable', 'http://localhost/glapps/'),
(7, 'Android', 'Enable', 'http://localhost/glapps/pages/android'),
(8, 'iPhone', 'Enable', 'http://localhost/glapps/pages/ios'),
(9, 'Windows', 'Enable', 'http://localhost/glapps/pages/windows'),
(10, 'Blackberry', 'Enable', 'http://localhost/glapps/pages/blackberry'),
(11, 'Top Apps', 'Enable', 'http://localhost/glapps/pages/topapps'),
(12, 'Featured App', 'Enable', 'http://localhost/glapps/pages/featuredapp'),
(13, 'Contact Us', 'Enable', 'http://localhost/glapps/pages/contactus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobile_apps`
--

CREATE TABLE IF NOT EXISTS `tbl_mobile_apps` (
  `mid` int(11) NOT NULL,
  `osid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_details` text NOT NULL,
  `app_icon` varchar(255) NOT NULL,
  `app_link` text NOT NULL,
  `similer_apps` varchar(200) NOT NULL,
  `isfeatured` varchar(10) NOT NULL,
  `istop` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mobile_apps`
--

INSERT INTO `tbl_mobile_apps` (`mid`, `osid`, `cid`, `scid`, `app_name`, `app_details`, `app_icon`, `app_link`, `similer_apps`, `isfeatured`, `istop`, `status`, `date`) VALUES
(8, 1, 1, 3, 'GL Apps', '0', '1456826104-X4ZvRuzV.jpg', 'http://bxslider.com/examples/carousel-static-number-slides', '9,10,11,12,13,14,15', '0', '1', 'Enable', '2016-03-01'),
(9, 1, 1, 0, 'Gujarati Dictionary', '<p>testteswttestestsetsetset</p>\r\n', '1456826189-VGWt0HsK.jpg', 'test', '8,9,11', '0', '1', 'Active', '2016-03-01'),
(10, 1, 1, 8, 'test', '<p>testteststsetsetse</p>\r\n', '1456827107-pu3wRZJs.jpg', 'test', '8,9,10,13,14,15', '0', '1', 'Active', '2016-03-01'),
(11, 1, 1, 3, 'Gujarati Dictionary', 'test', '1456831395-WR74i8ut.png', 'test', '8,9,12', '0', '1', 'Active', '2016-03-01'),
(12, 1, 1, 8, 'tetete', 'testsetset', '1456834507-Gr9KLptU.png', 'testsetsetes', '', '0', '1', 'Active', '2016-03-01'),
(13, 2, 2, 0, 'hhhhhh', 'Test Test', '1456837054-hQPa76nw.png', 'tsrtretret', '', '0', '1', 'Active', '2016-03-01'),
(14, 1, 1, 8, 'Dictionary', 'asdfasdfasdfadddd', '1457692238-4AfoD5WH.png', 'http://stackoverflow.com/questions/2906582/how-to-create-an-html-button-that-acts-like-a-link', '8,9,11,13', '1', '0', 'Active', '2016-03-11'),
(15, 1, 1, 3, 'test', '<p><strong>gsdfgfdgsdfgsdf</strong></p>\r\n\r\n<p>gfdgsdfgsdfg</p>\r\n', '', 'http://localhost/glapps/', '11,12', '1', '1', 'Active', '2016-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobile_os`
--

CREATE TABLE IF NOT EXISTS `tbl_mobile_os` (
  `id` int(11) NOT NULL,
  `os_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mobile_os`
--

INSERT INTO `tbl_mobile_os` (`id`, `os_name`) VALUES
(1, 'Android'),
(2, 'iPhone'),
(3, 'Windows'),
(4, 'BlackBerry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategories`
--

CREATE TABLE IF NOT EXISTS `tbl_subcategories` (
  `subcat_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subcat_name` varchar(50) NOT NULL,
  `subcat_img` varchar(255) NOT NULL,
  `detail` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategories`
--

INSERT INTO `tbl_subcategories` (`subcat_id`, `cid`, `subcat_name`, `subcat_img`, `detail`) VALUES
(8, 2, 'Test', '', 'Test'),
(9, 3, 'subcate1', '', 'sub cate.'),
(10, 1, 'subcate3', '', 'Sony mobile.\r\n'),
(15, 3, 'subcate2', '', 'aaaaa'),
(16, 3, 'aaa', '1445858803-783mHIrZ.jpg', 'aaa'),
(17, 2, 'Astro', '1445860007-xwgJSOZz.jpg', 'astro book');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `scid` int(11) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `osid` varchar(50) NOT NULL,
  `scname` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `keywords` text NOT NULL,
  `desc` text NOT NULL,
  `seotitle` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`scid`, `cid`, `osid`, `scname`, `status`, `keywords`, `desc`, `seotitle`) VALUES
(3, 1, 'Android', 'Hindi Dictioary', 'Enable', 'hindi dictionary', 'hindi dictionary', 'hindi dictioary.'),
(8, 1, 'Android', 'bbb', 'Disable', 'bbb', 'bbb', 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_sub_menu` (
  `smid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_menu`
--

INSERT INTO `tbl_sub_menu` (`smid`, `id`, `name`, `link`, `status`) VALUES
(3, 7, 'test', 'asdsad', 'Disable');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_subcategories`
--

CREATE TABLE IF NOT EXISTS `tbl_sub_subcategories` (
  `sscat_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `ssname` varchar(200) NOT NULL,
  `sub_sub_img` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_subcategories`
--

INSERT INTO `tbl_sub_subcategories` (`sscat_id`, `cid`, `subcat_id`, `ssname`, `sub_sub_img`, `detail`) VALUES
(1, 3, 9, 'Sub-sub-cat-1', '', 'Black,Red,Green,Blue'),
(4, 3, 9, 'Sub-sub-cat-2', '', 'aaa'),
(5, 1, 8, 'fffff', '', 'aaaaa'),
(7, 3, 15, 'Sub-sub-cat-3', '', 'aaa'),
(9, 4, 17, 'astro uncle', '1445862144-I2bYgLJG.jpeg', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL,
  `role` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `role`, `password`, `email`, `first_name`, `last_name`, `created_date`) VALUES
(1, 'Super Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'Arnion', 'Tech.', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_app_images`
--
ALTER TABLE `tbl_app_images`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mobile_apps`
--
ALTER TABLE `tbl_mobile_apps`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tbl_mobile_os`
--
ALTER TABLE `tbl_mobile_os`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`scid`);

--
-- Indexes for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  ADD PRIMARY KEY (`smid`);

--
-- Indexes for table `tbl_sub_subcategories`
--
ALTER TABLE `tbl_sub_subcategories`
  ADD PRIMARY KEY (`sscat_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_app_images`
--
ALTER TABLE `tbl_app_images`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_mobile_apps`
--
ALTER TABLE `tbl_mobile_apps`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_mobile_os`
--
ALTER TABLE `tbl_mobile_os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `scid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  MODIFY `smid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_sub_subcategories`
--
ALTER TABLE `tbl_sub_subcategories`
  MODIFY `sscat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
