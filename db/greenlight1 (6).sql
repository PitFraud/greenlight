-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2021 at 03:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenlight1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `category_description` varchar(100) NOT NULL,
  `category_parent_id` int(11) NOT NULL,
  `category_status` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `category_description`, `category_parent_id`, `category_status`) VALUES
(1, 'category 1', 'abc', 0, 1),
(2, 'category 2', 'fmkff', 0, 1),
(3, 'category 3', 'abcd', 0, 0),
(4, 'category 3', 'nfksaf', 0, 0),
(6, 'fdfg', 'dsgdg', 0, 0),
(7, 'SUB1', 'saffs', 1, 0),
(8, 'SUB11', 'sfasfs', 2, 0),
(9, 'sdvdsvsvdfe3q24', 'sdvsverwer', 0, 0),
(10, 'erterter232131231', 'etrt123213', 3, 0),
(11, 'harmano232', 'afafasdffaf123123', 0, 0),
(12, 'Positron', 'asdasadsad', 0, 0),
(13, 'Positron123', 'asdasdsad232', 12, 0),
(14, 'sdvdsvsvdfe3q24', 'dfvgfdvfdv', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_menu`
--

DROP TABLE IF EXISTS `dynamic_menu`;
CREATE TABLE IF NOT EXISTS `dynamic_menu` (
  `dyna_menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `dyna_menu_controller` varchar(500) NOT NULL,
  `dyna_menu_name` varchar(255) NOT NULL,
  PRIMARY KEY (`dyna_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `designation` int(10) DEFAULT NULL,
  `phone` int(100) DEFAULT NULL,
  `address` tinytext DEFAULT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `name`, `designation`, `phone`, `address`, `status`) VALUES
(15, 'Rajeev', 4, 2147483647, 'sgtsgsfgsffsdf', 1),
(16, 'sumitha', 7, 97455, 'yryd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_designation`
--

DROP TABLE IF EXISTS `emp_designation`;
CREATE TABLE IF NOT EXISTS `emp_designation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_designation`
--

INSERT INTO `emp_designation` (`id`, `designation`, `description`, `status`) VALUES
(4, 'Human Resources', 'Manage Front Office', 1),
(5, 'Director', 'dadfsfdsfsdfsfsfs', 1),
(6, 'rajeesh', 'hello', 1),
(7, 'CEO', 'company ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fb_users`
--

DROP TABLE IF EXISTS `fb_users`;
CREATE TABLE IF NOT EXISTS `fb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` enum('facebook','google','twitter','') COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frnt_about_us`
--

DROP TABLE IF EXISTS `frnt_about_us`;
CREATE TABLE IF NOT EXISTS `frnt_about_us` (
  `about_us_id` int(10) NOT NULL AUTO_INCREMENT,
  `about_us_title` varchar(255) NOT NULL,
  `about_us_descp` mediumtext NOT NULL,
  `about_us_img_status` int(10) NOT NULL,
  PRIMARY KEY (`about_us_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_about_us`
--

INSERT INTO `frnt_about_us` (`about_us_id`, `about_us_title`, `about_us_descp`, `about_us_img_status`) VALUES
(1, 'A History Has Written For Ecom Explore more Our Story', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.', 0),
(2, 'A History Has Written For Ecom Explore more Our Story', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.', 1),
(3, 'A History Has Written For Ecom Explore more Our Story', 'dasfsdfgfsadd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `frnt_banner`
--

DROP TABLE IF EXISTS `frnt_banner`;
CREATE TABLE IF NOT EXISTS `frnt_banner` (
  `ban_id` int(10) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(255) DEFAULT NULL,
  `ban_img` varchar(255) DEFAULT NULL,
  `ban_seq` int(10) NOT NULL,
  `ban_ent_date` date DEFAULT NULL,
  PRIMARY KEY (`ban_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_banner`
--

INSERT INTO `frnt_banner` (`ban_id`, `banner_name`, `ban_img`, `ban_seq`, `ban_ent_date`) VALUES
(16, 'Banner _1', '48406.png', 0, '2021-08-01'),
(17, 'Mark Henry', '9976.png', 1, '2021-08-28'),
(18, 'Rajeesh', '71552.png', 2, '2021-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `frnt_deal_of_day`
--

DROP TABLE IF EXISTS `frnt_deal_of_day`;
CREATE TABLE IF NOT EXISTS `frnt_deal_of_day` (
  `dod_id` int(10) NOT NULL AUTO_INCREMENT,
  `dod_product_id` int(10) NOT NULL,
  `dod_discount` double NOT NULL,
  `dod_entered_date` date NOT NULL,
  `dod_status` int(10) NOT NULL,
  PRIMARY KEY (`dod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_deal_of_day`
--

INSERT INTO `frnt_deal_of_day` (`dod_id`, `dod_product_id`, `dod_discount`, `dod_entered_date`, `dod_status`) VALUES
(4, 12, 50, '2021-08-18', 1),
(5, 9, 54, '2021-08-12', 1),
(6, 6, 15, '2021-08-18', 1),
(7, 10, 12, '2021-08-18', 1),
(8, 14, 10, '2021-08-18', 1),
(9, 11, 10, '2021-08-18', 1),
(10, 13, 10, '2021-08-18', 1),
(11, 7, 80, '2021-08-18', 1),
(12, 14, 10, '2021-08-18', 1),
(13, 6, 69, '2021-08-18', 1),
(14, 5, 30, '2021-08-18', 1),
(15, 10, 12, '2021-08-18', 1),
(20, 10, 65, '2021-08-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `frnt_footer_details`
--

DROP TABLE IF EXISTS `frnt_footer_details`;
CREATE TABLE IF NOT EXISTS `frnt_footer_details` (
  `footer_detail_id` int(10) NOT NULL AUTO_INCREMENT,
  `footer_detail_about` varchar(255) NOT NULL,
  `footer_detail_email` varchar(255) NOT NULL,
  `footer_detail_contact_1` bigint(20) NOT NULL,
  `footer_detail_contact_2` bigint(20) NOT NULL,
  `footer_detail_status` int(10) NOT NULL,
  PRIMARY KEY (`footer_detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_footer_details`
--

INSERT INTO `frnt_footer_details` (`footer_detail_id`, `footer_detail_about`, `footer_detail_email`, `footer_detail_contact_1`, `footer_detail_contact_2`, `footer_detail_status`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'info@example.com', 9876543210, 9874561230, 1),
(3, 'dfgfd', 'sfgfsdg', 7257274, 74747447, 0);

-- --------------------------------------------------------

--
-- Table structure for table `frnt_hot_deals`
--

DROP TABLE IF EXISTS `frnt_hot_deals`;
CREATE TABLE IF NOT EXISTS `frnt_hot_deals` (
  `deal_id` int(10) NOT NULL AUTO_INCREMENT,
  `deal_psc_fk` int(10) NOT NULL,
  `deal_second_head` varchar(255) NOT NULL,
  `deal_disp_order` int(10) NOT NULL,
  `deal_image` varchar(255) NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_hot_deals`
--

INSERT INTO `frnt_hot_deals` (`deal_id`, `deal_psc_fk`, `deal_second_head`, `deal_disp_order`, `deal_image`) VALUES
(2, 5, 'Inner <span>Plants</span>', 0, '20833.png'),
(3, 11, 'New Plants <span>Deals</span>', 1, '11196.png'),
(4, 6, 'Grow <span>Orchid</span>', 2, '71964.png');

-- --------------------------------------------------------

--
-- Table structure for table `frnt_latest_product`
--

DROP TABLE IF EXISTS `frnt_latest_product`;
CREATE TABLE IF NOT EXISTS `frnt_latest_product` (
  `latpro_id` int(10) NOT NULL AUTO_INCREMENT,
  `latpro_pro_id` int(10) NOT NULL,
  `latpro_ent_date` date NOT NULL,
  `latpro_status` int(10) NOT NULL,
  PRIMARY KEY (`latpro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_latest_product`
--

INSERT INTO `frnt_latest_product` (`latpro_id`, `latpro_pro_id`, `latpro_ent_date`, `latpro_status`) VALUES
(4, 12, '2021-08-22', 1),
(2, 4, '2021-08-21', 1),
(3, 5, '2021-08-21', 1),
(5, 11, '2021-08-22', 1),
(6, 14, '2021-08-22', 1),
(7, 13, '2021-08-22', 1),
(8, 6, '2021-08-22', 1),
(9, 11, '2021-08-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `frnt_menu`
--

DROP TABLE IF EXISTS `frnt_menu`;
CREATE TABLE IF NOT EXISTS `frnt_menu` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_cat_id` int(10) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_link` varchar(255) NOT NULL,
  `menu_entered_date` date NOT NULL,
  `menu_display_order` int(10) NOT NULL,
  `menu_status` int(10) NOT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `menu_cat_id` (`menu_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_menu`
--

INSERT INTO `frnt_menu` (`menu_id`, `menu_cat_id`, `menu_name`, `menu_link`, `menu_entered_date`, `menu_display_order`, `menu_status`) VALUES
(27, 8, 'OFFER ZONE', 'HELLO', '2021-09-16', 1, 1),
(28, 8, 'SUBSCRIPTION', 'HELLO', '2021-09-16', 2, 1),
(29, 9, 'MY WISHLIST', 'HELLO', '2021-09-16', 0, 1),
(30, 9, 'MY ACCOUNT', 'HELLO', '2021-09-16', 1, 1),
(31, 9, 'MY CHAT', 'HELLO', '2021-09-16', 2, 1),
(32, 8, 'EVENTS', 'HELLO', '2021-09-16', 3, 1),
(33, 9, 'REFERRAL', 'HELLO', '2021-09-16', 3, 1),
(34, 9, 'RENEWAL', '#', '2021-09-16', 4, 1),
(35, 10, 'HELP CENTER', 'HELLO', '2021-09-16', 0, 1),
(36, 10, 'TERMS & CONDITIONS', 'HELLO', '2021-09-16', 1, 1),
(37, 10, 'PAYMENT POLICY', 'HELLO', '2021-09-16', 2, 1),
(38, 10, 'PRIVACY POLICY', 'HELLO', '2021-09-16', 3, 1),
(39, 10, 'SETTINGS', 'HELLO', '2021-09-16', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `frnt_menu_cat`
--

DROP TABLE IF EXISTS `frnt_menu_cat`;
CREATE TABLE IF NOT EXISTS `frnt_menu_cat` (
  `menu_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_cat_name` varchar(255) NOT NULL,
  `menu_cat_order` int(10) NOT NULL,
  PRIMARY KEY (`menu_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_menu_cat`
--

INSERT INTO `frnt_menu_cat` (`menu_cat_id`, `menu_cat_name`, `menu_cat_order`) VALUES
(8, 'ZONE', 0),
(9, 'ACCOUNT', 1),
(10, 'HELP & SETTINGS', 2);

-- --------------------------------------------------------

--
-- Table structure for table `frnt_our_team`
--

DROP TABLE IF EXISTS `frnt_our_team`;
CREATE TABLE IF NOT EXISTS `frnt_our_team` (
  `our_team_id` int(10) NOT NULL AUTO_INCREMENT,
  `our_team_name` varchar(255) NOT NULL,
  `our_team_desig` varchar(255) NOT NULL,
  `our_team_twitter_link` varchar(255) DEFAULT NULL,
  `our_team_pintrest_link` varchar(255) DEFAULT NULL,
  `our_team_instagram_link` varchar(255) DEFAULT NULL,
  `our_team_vimeo_link` varchar(255) DEFAULT NULL,
  `our_team_img` varchar(255) NOT NULL,
  `our_team_dip_order` int(10) NOT NULL,
  `our_team_status` int(10) NOT NULL,
  PRIMARY KEY (`our_team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_our_team`
--

INSERT INTO `frnt_our_team` (`our_team_id`, `our_team_name`, `our_team_desig`, `our_team_twitter_link`, `our_team_pintrest_link`, `our_team_instagram_link`, `our_team_vimeo_link`, `our_team_img`, `our_team_dip_order`, `our_team_status`) VALUES
(1, 'Jishu Mohan', 'PROJECT MANAGER', 'https://twitter.com/', 'https://in.pinterest.com/', 'https://www.instagram.com/', 'https://vimeo.com/', '341059843.png', 0, 1),
(2, 'Rajeev Chandran', 'APP DEVELOPER', 'https://twitter.com/', 'https://in.pinterest.com/', 'https://www.instagram.com/', 'https://vimeo.com/', '280188648.png', 1, 1),
(3, 'Sona', 'WEB DESIGNER', 'https://twitter.com/', 'https://in.pinterest.com/', 'https://www.instagram.com/', 'https://vimeo.com/', '146375317.png', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `frnt_product_scroll`
--

DROP TABLE IF EXISTS `frnt_product_scroll`;
CREATE TABLE IF NOT EXISTS `frnt_product_scroll` (
  `proscro_id` int(10) NOT NULL AUTO_INCREMENT,
  `prosco_link_psc_fk` int(10) NOT NULL,
  `proscro_display_ord` int(10) NOT NULL,
  `proscro_enter_date` date NOT NULL,
  `proscro_status` int(10) NOT NULL,
  PRIMARY KEY (`proscro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_product_scroll`
--

INSERT INTO `frnt_product_scroll` (`proscro_id`, `prosco_link_psc_fk`, `proscro_display_ord`, `proscro_enter_date`, `proscro_status`) VALUES
(22, 5, 1, '2021-09-20', 1),
(23, 6, 2, '2021-09-20', 1),
(24, 7, 3, '2021-09-20', 1),
(25, 8, 4, '2021-09-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `frnt_special_offer`
--

DROP TABLE IF EXISTS `frnt_special_offer`;
CREATE TABLE IF NOT EXISTS `frnt_special_offer` (
  `spoff_id` int(10) NOT NULL AUTO_INCREMENT,
  `spoff_psc_fk` int(10) NOT NULL,
  `spoff_second_head` varchar(255) NOT NULL,
  `spoff_disp_order` int(10) NOT NULL,
  `spoff_img` varchar(255) NOT NULL,
  PRIMARY KEY (`spoff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_special_offer`
--

INSERT INTO `frnt_special_offer` (`spoff_id`, `spoff_psc_fk`, `spoff_second_head`, `spoff_disp_order`, `spoff_img`) VALUES
(2, 12, 'European Pan <span>Plant</span>', 0, '82502.png'),
(3, 13, 'Health Plant <span>Deal</span>', 1, '36388.png');

-- --------------------------------------------------------

--
-- Table structure for table `frnt_sub_menu`
--

DROP TABLE IF EXISTS `frnt_sub_menu`;
CREATE TABLE IF NOT EXISTS `frnt_sub_menu` (
  `sub_menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_menu_name` varchar(255) NOT NULL,
  `sub_menu_link` varchar(255) NOT NULL,
  `menu_parent_id` int(10) NOT NULL,
  `sub_menu_status` int(10) NOT NULL,
  PRIMARY KEY (`sub_menu_id`),
  KEY `menu_parent_id` (`menu_parent_id`),
  KEY `menu_parent_id_2` (`menu_parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_sub_menu`
--

INSERT INTO `frnt_sub_menu` (`sub_menu_id`, `sub_menu_name`, `sub_menu_link`, `menu_parent_id`, `sub_menu_status`) VALUES
(5, 'OFFER ZONE', 'HELLOO', 27, 1),
(6, 'SUBSCRIPTION', 'Subscription', 28, 1),
(7, 'MY WISHLIST', 'wishlist', 29, 1),
(8, 'MY ACCOUNT', 'Profile/index', 30, 1),
(9, 'MY CHAT', 'HELLOO', 31, 1),
(10, 'EVENTS', 'HELLOO', 32, 1),
(11, 'REFERRAL', 'HELLOO', 33, 1),
(12, 'MY SUBSCRIPTION', '#', 34, 1),
(13, 'HELP CENTER', 'HELLO', 35, 1),
(14, 'TERMS & CONDITIONS', 'Terms_Condition', 36, 1),
(15, 'PAYMENT POLICY', 'Payment_Policy', 37, 1),
(16, 'PRIVACY POLICY', 'Privacy', 38, 1),
(17, 'SETTINGS', 'HELLOO', 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `frnt_super_deals`
--

DROP TABLE IF EXISTS `frnt_super_deals`;
CREATE TABLE IF NOT EXISTS `frnt_super_deals` (
  `super_deal_id` int(10) NOT NULL AUTO_INCREMENT,
  `super_sub_category_fk` int(10) NOT NULL,
  `super_deal_name` mediumtext NOT NULL,
  `super_deal_img` varchar(255) NOT NULL,
  `super_deal_status` int(10) NOT NULL,
  `super_deal_enter_date` date NOT NULL,
  PRIMARY KEY (`super_deal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_super_deals`
--

INSERT INTO `frnt_super_deals` (`super_deal_id`, `super_sub_category_fk`, `super_deal_name`, `super_deal_img`, `super_deal_status`, `super_deal_enter_date`) VALUES
(6, 9, 'Living Thing Grow <span style=\"color:#b1de4e\">Shop Cactus</span> Now', '564983930.png', 1, '2021-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `frnt_various_product`
--

DROP TABLE IF EXISTS `frnt_various_product`;
CREATE TABLE IF NOT EXISTS `frnt_various_product` (
  `varpro_id` int(10) NOT NULL AUTO_INCREMENT,
  `varpro_pro_id` int(10) NOT NULL,
  `varpro_enter_date` date NOT NULL,
  `varpro_status` int(10) NOT NULL,
  PRIMARY KEY (`varpro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnt_various_product`
--

INSERT INTO `frnt_various_product` (`varpro_id`, `varpro_pro_id`, `varpro_enter_date`, `varpro_status`) VALUES
(1, 5, '2021-08-21', 1),
(3, 15, '2021-08-23', 1),
(4, 12, '2021-08-23', 1),
(5, 66, '2021-09-06', 1),
(6, 67, '2021-09-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `loc_id` int(10) NOT NULL AUTO_INCREMENT,
  `loc_city_name` varchar(255) NOT NULL,
  `loc_dist_name` varchar(255) DEFAULT NULL,
  `loc_state_name` varchar(255) NOT NULL,
  `loc_post_code` int(100) DEFAULT NULL,
  `loc_created_date` date DEFAULT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`loc_id`, `loc_city_name`, `loc_dist_name`, `loc_state_name`, `loc_post_code`, `loc_created_date`) VALUES
(1, 'Karunagapally', 'Kollam', 'Kerala', 690539, '2021-08-10'),
(4, 'Banglore', 'Banglore', 'Karnataka', 690539, '2021-08-10'),
(5, 'Kollam', 'Kollam', 'Kerala', 690531, '2021-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `Logo_id` int(10) NOT NULL AUTO_INCREMENT,
  `Logo_name` varchar(255) NOT NULL,
  `Logo_img` varchar(255) NOT NULL,
  `Logo_status` int(10) NOT NULL,
  PRIMARY KEY (`Logo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`Logo_id`, `Logo_name`, `Logo_img`, `Logo_status`) VALUES
(2, 'GreenLight', '3646572.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `off_id` int(10) NOT NULL AUTO_INCREMENT,
  `off_name` varchar(255) DEFAULT NULL,
  `off_img` varchar(255) DEFAULT NULL,
  `off_strt_date` date NOT NULL,
  `off_end_date` date NOT NULL,
  `off_percentage` int(100) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT NULL,
  PRIMARY KEY (`off_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`off_id`, `off_name`, `off_img`, `off_strt_date`, `off_end_date`, `off_percentage`, `status`) VALUES
(35, 'Blockbuster Sale\'s', '23825.png', '2021-08-26', '2021-08-28', 90, NULL),
(37, 'Daily Sales', '28118.png', '2021-08-20', '2021-08-31', 32, NULL),
(38, 'Blockbuster Sale\'sfghfh', '97722.png', '2021-08-13', '2021-08-14', 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prodlist_wishlist`
--

DROP TABLE IF EXISTS `prodlist_wishlist`;
CREATE TABLE IF NOT EXISTS `prodlist_wishlist` (
  `pro_wish_id` int(10) NOT NULL AUTO_INCREMENT,
  `pro_wish_user_fk` int(10) NOT NULL,
  `pro_wish_prolist_fk` int(10) NOT NULL,
  `pro_wish_like` int(10) NOT NULL,
  `pro_wish_date` date NOT NULL,
  PRIMARY KEY (`pro_wish_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodlist_wishlist`
--

INSERT INTO `prodlist_wishlist` (`pro_wish_id`, `pro_wish_user_fk`, `pro_wish_prolist_fk`, `pro_wish_like`, `pro_wish_date`) VALUES
(9, 11, 9, 1, '2021-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `productlist_images`
--

DROP TABLE IF EXISTS `productlist_images`;
CREATE TABLE IF NOT EXISTS `productlist_images` (
  `proli_img_id` int(10) NOT NULL AUTO_INCREMENT,
  `proli_img_list_fk` int(10) NOT NULL,
  `proli_img_name` varchar(255) NOT NULL,
  `proli_img_status` int(10) NOT NULL,
  PRIMARY KEY (`proli_img_id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productlist_images`
--

INSERT INTO `productlist_images` (`proli_img_id`, `proli_img_list_fk`, `proli_img_name`, `proli_img_status`) VALUES
(74, 75, '86725817.png', 1),
(73, 75, '59039352.png', 1),
(72, 75, '55325836.png', 1),
(71, 75, '58101048.png', 1),
(70, 75, '78430921.png', 1),
(69, 74, '35809521.png', 1),
(68, 74, '1711384.png', 1),
(67, 74, '43602020.png', 1),
(66, 74, '27061299.png', 1),
(65, 74, '23891071.png', 1),
(64, 74, '80618430.png', 1),
(63, 73, '27708451.png', 1),
(62, 73, '73775388.png', 1),
(61, 73, '87498880.png', 1),
(60, 73, '33924408.png', 1),
(59, 73, '64509586.png', 1),
(58, 73, '31748859.png', 1),
(57, 73, '85030988.png', 1),
(56, 67, '29166201.png', 1),
(55, 67, '70030271.png', 1),
(54, 67, '29626681.png', 1),
(53, 67, '63430825.png', 1),
(52, 67, '40911420.png', 1),
(51, 67, '28010055.png', 1),
(50, 67, '34030622.png', 1),
(49, 66, 'categoy3.png', 1),
(48, 66, 'category4.png', 1),
(47, 66, 'category5.png', 1),
(46, 66, 'category6.png', 1),
(45, 66, 'category7.png', 1),
(44, 66, 'category8.png', 1),
(43, 66, 'category9.png', 1),
(75, 75, '91586103.png', 1),
(76, 76, '43043795.png', 1),
(77, 76, '59304520.png', 1),
(78, 76, '8460614.png', 1),
(79, 76, '95815929.png', 1),
(80, 76, '16525336.png', 1),
(81, 76, '97103236.png', 1),
(82, 76, '40332937.png', 1),
(83, 77, '12548407.png', 1),
(84, 77, '67414829.png', 1),
(85, 77, '25349914.png', 1),
(86, 77, '41046577.png', 1),
(87, 77, '9424138.png', 1),
(88, 77, '34115604.png', 1),
(89, 78, 'category3.png', 1),
(90, 78, 'category4.png', 1),
(91, 78, 'category5.png', 1),
(92, 78, 'category6.png', 1),
(93, 78, 'category7.png', 1),
(94, 78, 'category8.png', 1),
(95, 78, 'category9.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productlist_list_location`
--

DROP TABLE IF EXISTS `productlist_list_location`;
CREATE TABLE IF NOT EXISTS `productlist_list_location` (
  `prod_list_loc_id` int(10) NOT NULL AUTO_INCREMENT,
  `prod_list_fk` int(10) NOT NULL,
  `prod_list_loc_lat` double DEFAULT NULL,
  `prod_list_loc_lon` double DEFAULT NULL,
  `prod_list_loc_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`prod_list_loc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productlist_list_location`
--

INSERT INTO `productlist_list_location` (`prod_list_loc_id`, `prod_list_fk`, `prod_list_loc_lat`, `prod_list_loc_lon`, `prod_list_loc_status`) VALUES
(3, 76, 10.014080047607422, 76.3305892944336, 1),
(2, 75, 10.013589859008789, 76.3307113647461, 1),
(4, 77, 10.015219688415527, 76.35842895507812, 1),
(5, 78, 10.01511001586914, 76.35411071777344, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productlist_review`
--

DROP TABLE IF EXISTS `productlist_review`;
CREATE TABLE IF NOT EXISTS `productlist_review` (
  `prolist_re_id` int(10) NOT NULL AUTO_INCREMENT,
  `prolist_re_usr_id` int(10) NOT NULL,
  `prolist_re_pro_fk` int(10) NOT NULL,
  `prolist_re_comment` mediumtext NOT NULL,
  `prolist_re_date` date NOT NULL,
  `prolist_re_status` int(10) NOT NULL,
  PRIMARY KEY (`prolist_re_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productlist_review`
--

INSERT INTO `productlist_review` (`prolist_re_id`, `prolist_re_usr_id`, `prolist_re_pro_fk`, `prolist_re_comment`, `prolist_re_date`, `prolist_re_status`) VALUES
(1, 11, 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-09-02', 1),
(2, 11, 66, 'Yesterday I saw a guy spill all his Scrabble letters on the road. I asked him, “What’s the word on the street?”\r\nOnce my dog ate all the Scrabble tiles. For days he kept leaving little messages around the house. Don’t miss these hilarious egg puns that will absolutely crack you up.', '2021-09-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `pro_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `prod_cat_status` int(10) NOT NULL,
  `prod_cat_name` varchar(255) NOT NULL,
  `prod_cat_display_order` int(10) NOT NULL,
  PRIMARY KEY (`pro_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pro_cat_id`, `prod_cat_status`, `prod_cat_name`, `prod_cat_display_order`) VALUES
(8, 1, 'Seeds', 0),
(9, 1, 'Pots', 1),
(10, 1, 'Pots & Plants', 2),
(11, 1, 'Plant Care', 3),
(12, 1, 'Tools & Accessories', 4),
(13, 1, 'DIY Pest Control', 5),
(14, 1, 'Kits', 6),
(15, 1, 'Offers', 7),
(16, 1, 'Plant Subscription', 8),
(17, 1, 'Green Gifting', 9),
(18, 1, 'Plants', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

DROP TABLE IF EXISTS `product_list`;
CREATE TABLE IF NOT EXISTS `product_list` (
  `pro_list_id` int(10) NOT NULL AUTO_INCREMENT,
  `pro_sub_cat_id` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pro_list_name` varchar(255) NOT NULL,
  `pro_list_details` longtext NOT NULL,
  `prod_list_price_original` double DEFAULT NULL,
  `pro_list_dicount_price` double DEFAULT NULL,
  `pro_list_stock` int(100) DEFAULT NULL,
  `pro_list_status` int(10) NOT NULL,
  `pro_list_enter_date` date NOT NULL,
  `pro_list_img` varchar(255) NOT NULL,
  PRIMARY KEY (`pro_list_id`),
  KEY `pro_sub_cat_id` (`pro_sub_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`pro_list_id`, `pro_sub_cat_id`, `user_id`, `pro_list_name`, `pro_list_details`, `prod_list_price_original`, `pro_list_dicount_price`, `pro_list_stock`, `pro_list_status`, `pro_list_enter_date`, `pro_list_img`) VALUES
(4, 5, 1, ' Plam Plant', 'Hello', 250, 90, 10, 1, '2021-08-18', '63960.png'),
(5, 6, 1, 'Areca palm', 'help', 250, 90, 10, 1, '2021-08-18', '46693.png'),
(6, 6, 1, 'Grow Orchid', 'Grow Orchid', 250, 90, 10, 1, '2021-08-18', '98638.png'),
(7, 7, 1, 'Palm Plants', 'jdfd', 250, 90, 10, 1, '2021-08-18', '6743.png'),
(8, 5, 1, 'Grow Orchid', 'asad', 250, 90, 10, 1, '2021-08-18', '87423.png'),
(9, 7, 1, 'Areca Plam', 'aas', 250, 90, 10, 1, '2021-08-18', '21701.png'),
(10, 5, 1, 'Health Plant', 'adsa', 250, 90, 10, 1, '2021-08-18', '66108.png'),
(11, 5, 1, 'Boston Fern', 'asd', 250, 90, 10, 1, '2021-08-18', '55929.png'),
(12, 7, 1, 'Inspiration Plant', 'dasd', 250, 90, 0, 1, '2021-08-18', '44214.png'),
(13, 8, 1, 'Hanging Plant', 'sadsa', 250, 90, 10, 1, '2021-08-18', '61077.png'),
(14, 6, 1, 'Pearl Orchid', 'asd', 250, 90, 10, 1, '2021-08-18', '90218.png'),
(15, 5, 1, 'Grow Orchid', 'sad', 250, 90, 10, 1, '2021-08-18', '13091.png'),
(16, 5, 1, 'Money Plant', 'it is very good plant', 100, 90, 10, 1, '2021-08-27', '87073.png'),
(17, 8, 1, 'Hanging Orchid', 'ergdfgdfg', 100, 20, 10, 1, '2021-08-29', '40674.png'),
(65, 6, 11, 'awuaduyasd', 'asdaddsadasd', 500, 100, 1, 1, '2021-09-05', '33398471.png'),
(66, 5, 1, 'Honey Plant', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions o', 200, 100, 1, 1, '2021-09-06', '61370.png'),
(67, 5, 11, 'Mango Plant', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 300, 100, 1, 1, '2021-09-07', '92909103.png'),
(75, 6, 11, 'Orange Orchid', 'afgfgfgsgadshgsddfhfdghfgfshfhs', 500, NULL, 1, 1, '2021-09-10', '46311254.png'),
(76, 5, 11, 'Cash Plant', 'This is a new variant of pant, and its fine googd looking', 500, NULL, 1, 1, '2021-09-23', '65598178.png'),
(77, 5, 11, 'Potato', 'this is a good plant', 200, NULL, 1, 1, '2021-09-23', '34215291.png'),
(78, 5, 11, 'Money Press', '`qewadasdasdsadsad', 250, NULL, 1, 1, '2021-10-05', 'category1.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_category`
--

DROP TABLE IF EXISTS `product_sub_category`;
CREATE TABLE IF NOT EXISTS `product_sub_category` (
  `pro_sub_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `pro_cat_id_fk` int(10) NOT NULL,
  `pro_sub_cat_name` varchar(255) NOT NULL,
  `pro_sub_cat_img` varchar(255) NOT NULL,
  `pro_sub_cat_status` int(10) NOT NULL,
  PRIMARY KEY (`pro_sub_cat_id`),
  KEY `pro_cat_id_fk` (`pro_cat_id_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sub_category`
--

INSERT INTO `product_sub_category` (`pro_sub_cat_id`, `pro_cat_id_fk`, `pro_sub_cat_name`, `pro_sub_cat_img`, `pro_sub_cat_status`) VALUES
(5, 18, 'Plants', '7254.png', 1),
(6, 18, 'Orchid', '67199.png', 1),
(7, 18, 'Palm', '5791.png', 1),
(8, 18, 'Hanging', '23438.png', 1),
(9, 18, 'Cactus', '60592.png', 1),
(10, 18, 'Inner Plants', '41701.png', 1),
(11, 18, 'Arrowhead', '95473.png', 1),
(12, 18, 'Palm Plants', '49726.png', 1),
(13, 18, 'Health', '51749.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prolist_reply`
--

DROP TABLE IF EXISTS `prolist_reply`;
CREATE TABLE IF NOT EXISTS `prolist_reply` (
  `prolist_rp_id` int(10) NOT NULL AUTO_INCREMENT,
  `prolist_rp_user_id` int(10) NOT NULL,
  `prolist_rp_list_fk` int(10) NOT NULL,
  `prolist_rp_review_fk` int(10) NOT NULL,
  `prolist_rp_reply` mediumtext NOT NULL,
  `prolist_rp_date` date NOT NULL,
  `prolist_rp_status` int(11) NOT NULL,
  PRIMARY KEY (`prolist_rp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prolist_reply`
--

INSERT INTO `prolist_reply` (`prolist_rp_id`, `prolist_rp_user_id`, `prolist_rp_list_fk`, `prolist_rp_review_fk`, `prolist_rp_reply`, `prolist_rp_date`, `prolist_rp_status`) VALUES
(1, 8, 12, 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '2021-09-06', 1),
(2, 11, 66, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2021-09-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pro_list_star_rating`
--

DROP TABLE IF EXISTS `pro_list_star_rating`;
CREATE TABLE IF NOT EXISTS `pro_list_star_rating` (
  `prod_list_star_id` int(10) NOT NULL AUTO_INCREMENT,
  `prod_list_fk` int(10) NOT NULL,
  `user_fk` int(10) NOT NULL,
  `prod_list_star_rating` int(10) NOT NULL,
  `prod_list_star_enter_date` date NOT NULL,
  PRIMARY KEY (`prod_list_star_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_list_star_rating`
--

INSERT INTO `pro_list_star_rating` (`prod_list_star_id`, `prod_list_fk`, `user_fk`, `prod_list_star_rating`, `prod_list_star_enter_date`) VALUES
(1, 66, 11, 4, '2021-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `subp_id` int(10) NOT NULL AUTO_INCREMENT,
  `subp_name` varchar(255) NOT NULL,
  `subp_price` double NOT NULL,
  `subp_val` int(10) NOT NULL COMMENT 'Validity in Days',
  `subp_ads_no` int(10) DEFAULT NULL,
  `subp_entered_date` date NOT NULL,
  `subp_status` int(10) NOT NULL,
  PRIMARY KEY (`subp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subp_id`, `subp_name`, `subp_price`, `subp_val`, `subp_ads_no`, `subp_entered_date`, `subp_status`) VALUES
(1, 'basic', 299, 30, 10, '2021-08-25', 1),
(2, 'Premium', 699, 180, 30, '2021-08-25', 1),
(3, 'Ultimate', 999, 270, 50, '2021-08-25', 1),
(5, 'Free', 0, 0, 3, '2021-09-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads_post`
--

DROP TABLE IF EXISTS `tbl_ads_post`;
CREATE TABLE IF NOT EXISTS `tbl_ads_post` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `post_user_fk` int(10) NOT NULL,
  `post_sub_fk` int(10) NOT NULL,
  `post_product_list_fk` int(10) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ads_post`
--

INSERT INTO `tbl_ads_post` (`post_id`, `post_user_fk`, `post_sub_fk`, `post_product_list_fk`) VALUES
(1, 11, 1, 76),
(2, 11, 1, 77),
(3, 11, 1, 78);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyer`
--

DROP TABLE IF EXISTS `tbl_buyer`;
CREATE TABLE IF NOT EXISTS `tbl_buyer` (
  `buy_id` int(10) NOT NULL AUTO_INCREMENT,
  `buy_name` varchar(255) NOT NULL,
  `sell_parent_id` int(10) NOT NULL,
  `buy_address` varchar(255) NOT NULL,
  `buy_phone` int(100) NOT NULL,
  `buy_image` varchar(255) NOT NULL,
  `buy_status` enum('Active','InActive') NOT NULL,
  PRIMARY KEY (`buy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buyer`
--

INSERT INTO `tbl_buyer` (`buy_id`, `buy_name`, `sell_parent_id`, `buy_address`, `buy_phone`, `buy_image`, `buy_status`) VALUES
(2, 'Rajeev', 1, 'hello iam rajeeev', 2147483647, 'mark.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyinfo`
--

DROP TABLE IF EXISTS `tbl_companyinfo`;
CREATE TABLE IF NOT EXISTS `tbl_companyinfo` (
  `cmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_name` varchar(50) NOT NULL,
  `cmp_adress` text DEFAULT NULL,
  `cmp_gst` varchar(50) DEFAULT NULL,
  `cmp_email` varchar(50) DEFAULT NULL,
  `cmp_phone` varchar(50) DEFAULT NULL,
  `cmp_status` int(11) NOT NULL,
  PRIMARY KEY (`cmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_companyinfo`
--

INSERT INTO `tbl_companyinfo` (`cmp_id`, `cmp_name`, `cmp_adress`, `cmp_gst`, `cmp_email`, `cmp_phone`, `cmp_status`) VALUES
(5, 'Sarm1', 'kaloor', '123', 'wahysdf@gmail.com', '9988774', 0),
(6, 'Sarm2', 'dgdsh', '215654', 'wahy@gmail.com', '9988774455', 0),
(7, 'green', 'abc', '123', 'wahysdf@gmail.com', '1132', 0),
(8, 'green', 'abc', '123', 'wahysdf@gmail.com', '1132', 0),
(9, 'Hekk', 'as3w333csadvcrvw3 3', '78445', 'raj@123.com', '987451221', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daybuk`
--

DROP TABLE IF EXISTS `tbl_daybuk`;
CREATE TABLE IF NOT EXISTS `tbl_daybuk` (
  `daybuk_id` int(11) NOT NULL AUTO_INCREMENT,
  `route_id_fk` int(11) NOT NULL,
  `date` date NOT NULL,
  `ledger_name` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `closing_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`daybuk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daybuk`
--

INSERT INTO `tbl_daybuk` (`daybuk_id`, `route_id_fk`, `date`, `ledger_name`, `credit`, `debit`, `closing_amount`, `status`) VALUES
(5, 0, '2020-07-02', 'KSEB BILL', 0, 1200, 0, 1),
(6, 0, '2020-07-02', 'MOBILE BILL', 0, 500, 0, 1),
(7, 0, '2020-07-02', 'WATER BILL', 0, 1000, 0, 1),
(9, 0, '2020-07-02', 'SALES', 5000, 0, 0, 1),
(10, 0, '2020-07-02', '', 0, 0, 2300, 1),
(11, 0, '2020-07-03', 'PHOTOSTAT', 0, 100, 0, 1),
(12, 0, '2020-07-03', 'BSNL BILL', 0, 1000, 0, 1),
(13, 0, '2020-07-03', 'SALES', 2000, 0, 0, 1),
(14, 0, '2020-07-03', 'Purchase', 0, 0, 0, 1),
(15, 0, '2020-07-06', 'SALES', 1000, 0, 0, 1),
(16, 0, '2020-07-06', 'SALES', 2000, 0, 0, 1),
(17, 0, '2020-07-06', 'KSEB BILL', 0, 1000, 0, 1),
(18, 0, '2020-07-06', 'KSEB BILL', 0, 1000, 0, 1),
(19, 0, '2020-07-06', 'WATER BILL', 0, 2000, 0, 1),
(20, 0, '2020-07-06', 'Purchase', 0, 0, 0, 1),
(21, 0, '2020-07-06', 'Purchase', 0, 10000, 0, 1),
(22, 0, '2020-07-06', 'Sale', 1200, 0, 0, 1),
(23, 0, '2020-07-06', 'Sale', 1200, 0, 0, 1),
(24, 0, '2020-07-06', 'Sale', 20, 0, 0, 1),
(25, 0, '2020-07-06', 'Sale', 120, 0, 0, 1),
(26, 0, '2020-07-06', 'Sale', 10, 0, 0, 1),
(27, 0, '2020-07-06', 'Purchase', 0, 15099, 0, 1),
(29, 0, '2020-07-06', 'Purchase', 0, 800, 0, 1),
(30, 0, '2020-07-06', '', 0, 0, -24349, 1),
(31, 0, '2020-07-07', 'Salary Payment', 0, 10539, 0, 1),
(32, 0, '2020-07-08', 'Sale', 100, 0, 0, 1),
(37, 0, '2020-07-08', 'Salary Payment', 0, 10560, 0, 1),
(38, 0, '2020-07-08', '', 0, 0, -10460, 1),
(39, 0, '2020-07-08', 'SALES', 1200, 0, 0, 1),
(40, 0, '2020-07-24', 'Purchase', 0, 0, 0, 1),
(41, 0, '2020-09-17', 'Purchase', 0, 0, 0, 1),
(42, 0, '2020-09-17', 'Purchase', 0, 0, 0, 1),
(43, 0, '2020-09-17', 'Purchase', 0, 0, 0, 1),
(44, 0, '2020-09-17', 'Purchase', 0, 0, 0, 1),
(45, 0, '2020-09-17', 'Purchase', 0, 0, 0, 1),
(46, 0, '2020-09-17', 'Purchase', 0, 0, 0, 1),
(47, 0, '2020-09-17', 'Purchase', 0, 8400, 0, 1),
(48, 0, '2020-09-17', 'Sale', 20, 0, 0, 1),
(49, 0, '2020-09-17', 'Sale', 20, 0, 0, 1),
(50, 0, '2020-09-17', 'Sale', 1980, 0, 0, 1),
(51, 0, '2020-09-17', 'Sale', 200, 0, 0, 1),
(52, 0, '2020-09-17', 'Sale', 400, 0, 0, 1),
(53, 0, '2020-09-17', 'Sale', 10, 0, 0, 1),
(54, 0, '2020-09-17', 'Sale', 10, 0, 0, 1),
(55, 0, '2020-09-17', 'Sale', 20, 0, 0, 1),
(56, 0, '2020-09-17', 'Sale', 10, 0, 0, 1),
(57, 0, '2020-10-05', 'Sale', 95, 0, 0, 1),
(58, 0, '2020-10-05', 'Sale', 48, 0, 0, 1),
(59, 0, '2020-10-05', 'Purchase', 0, 0, 0, 1),
(60, 0, '2020-10-05', 'Sale', 48, 0, 0, 1),
(61, 0, '2020-10-05', 'Sale', 1244398369, 0, 0, 1),
(62, 0, '2020-10-07', 'Sale', 19, 0, 0, 1),
(63, 0, '2020-10-07', 'Sale', 10, 0, 0, 1),
(64, 0, '2020-10-07', 'Sale', 10, 0, 0, 1),
(65, 0, '2020-10-07', 'Sale', 20, 0, 0, 1),
(66, 0, '2020-10-07', 'Sale', 20, 0, 0, 1),
(67, 0, '2020-10-07', 'Sale', 10, 0, 0, 1),
(68, 0, '2020-10-07', 'Sale', 9, 0, 0, 1),
(69, 0, '2020-10-08', 'Purchase', 0, 0, 0, 1),
(70, 0, '2020-10-08', 'Purchase', 0, 0, 0, 1),
(71, 0, '2020-10-08', 'Purchase', 0, 0, 0, 1),
(72, 0, '2020-10-08', 'Sale', 10, 0, 0, 1),
(73, 0, '2020-10-08', 'Sale', 10, 0, 0, 1),
(74, 0, '2020-10-08', 'Sale', 10, 0, 0, 1),
(75, 0, '2020-10-08', 'Purchase', 0, 0, 0, 1),
(76, 0, '2020-10-08', 'Sale', 11, 0, 0, 1),
(77, 0, '2020-10-20', 'Purchase', 0, 0, 0, 1),
(78, 0, '2020-10-20', 'Purchase', 0, 0, 0, 1),
(79, 0, '2020-10-20', 'Purchase', 0, 0, 0, 1),
(80, 0, '2020-10-20', 'Sale', 11, 0, 0, 1),
(81, 0, '2020-10-21', 'Purchase', 0, 0, 0, 1),
(82, 0, '2020-10-21', 'Sale', 12, 0, 0, 1),
(83, 0, '2020-10-21', 'Sale', 11, 0, 0, 1),
(84, 0, '2020-10-21', 'Sale', 12, 0, 0, 1),
(85, 0, '2020-10-21', 'Sale', 11, 0, 0, 1),
(86, 0, '2020-10-21', 'Purchase', 0, 0, 0, 1),
(87, 0, '2020-10-21', 'Purchase', 0, 0, 0, 1),
(88, 0, '2020-11-03', 'KSEB BILL', 0, 20000, 0, 1),
(89, 0, '1970-01-01', 'SALES', 789, 0, 0, 1),
(90, 0, '2020-11-03', 'SALES', 2000000000, 0, 0, 1),
(91, 0, '2020-11-03', 'SALES', 4321, 0, 0, 1),
(92, 0, '1970-01-01', 'KSEB BILL', 0, 500, 0, 1),
(93, 0, '1970-01-01', 'LAND TAX', 0, 100, 0, 1),
(94, 0, '1970-01-01', 'PROFESSIONAL TAX', 0, 100, 0, 1),
(95, 0, '1970-01-01', 'CONVEYANCE', 0, 100, 0, 1),
(96, 0, '1970-01-01', 'PROFESSIONAL TAX', 0, 100, 0, 1),
(97, 0, '1970-01-01', 'BSNL BILL', 0, 500, 0, 1),
(98, 0, '2020-11-03', '', 0, 0, 1999984321, 1),
(99, 0, '2020-11-03', 'Purchase', 0, 0, 0, 1),
(100, 0, '2020-11-03', 'Purchase', 0, 0, 0, 1),
(101, 0, '2020-11-04', 'Purchase', 0, 0, 0, 1),
(102, 0, '2020-11-05', 'Purchase', 0, 0, 0, 1),
(103, 0, '2020-11-05', 'Purchase', 0, 0, 0, 1),
(104, 0, '2020-11-05', 'Purchase', 0, 0, 0, 1),
(105, 0, '2020-11-05', 'Purchase', 0, 0, 0, 1),
(106, 0, '1970-01-01', 'CONVEYANCE', 0, 100, 0, 1),
(107, 0, '1970-01-01', 'KSFE ', 0, 150, 0, 1),
(108, 0, '1970-01-01', 'KSFE ', 0, 500, 0, 1),
(109, 0, '2020-11-09', 'Purchase', 0, 0, 0, 1),
(110, 0, '2020-11-09', 'Purchase', 0, 0, 0, 1),
(111, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(112, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(113, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(114, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(115, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(116, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(117, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(118, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(119, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(120, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(121, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(122, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(123, 0, '2020-11-10', 'LABORATORY EXPENSE', 0, 1000, 0, 1),
(124, 0, '2020-11-10', 'MARKETING', 500, 0, 0, 1),
(125, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(126, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(127, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(128, 0, '2020-11-10', 'Purchase', 0, 0, 0, 1),
(129, 0, '2020-11-11', 'Purchase', 0, 0, 0, 1),
(130, 0, '2020-11-11', 'Sale', 110, 0, 0, 1),
(131, 0, '2020-11-11', 'Sale', 110, 0, 0, 1),
(132, 0, '2020-11-13', 'Sale', 118, 0, 0, 1),
(133, 0, '2020-11-13', 'Sale', 60, 0, 0, 1),
(134, 0, '2020-11-13', 'Purchase', 0, 0, 0, 1),
(135, 0, '2020-11-13', 'Purchase', 0, 0, 0, 1),
(136, 0, '2020-11-13', 'Sale', 118, 0, 0, 1),
(137, 0, '2020-11-13', 'Purchase', 0, 0, 0, 1),
(138, 0, '2020-11-13', 'Sale', 3000, 0, 0, 1),
(139, 0, '2020-11-13', 'Sale', 1500, 0, 0, 1),
(140, 0, '2020-11-13', 'Sale', 2670, 0, 0, 1),
(141, 0, '2020-11-13', 'Sale', 2764, 0, 0, 1),
(142, 0, '2020-11-13', 'Sale', 3000, 0, 0, 1),
(143, 0, '2020-11-13', 'Sale', 2764, 0, 0, 1),
(144, 0, '2020-11-13', 'Sale', 26, 0, 0, 1),
(145, 0, '2020-11-13', 'Sale', 0, 0, 0, 1),
(146, 0, '2020-11-13', 'Sale', 950, 0, 0, 1),
(147, 0, '2020-11-13', 'Sale', 11, 0, 0, 1),
(148, 0, '2020-11-13', 'Purchase', 0, 0, 0, 1),
(149, 0, '2020-11-15', 'Sale', 12, 0, 0, 1),
(150, 0, '2020-11-15', 'Sale', 12, 0, 0, 1),
(151, 0, '2020-11-16', 'Sale', 3000, 0, 0, 1),
(152, 0, '2020-11-16', 'Purchase', 0, 0, 0, 1),
(153, 0, '2020-11-16', 'Sale', 945, 0, 0, 1),
(154, 0, '2020-11-16', 'Sale', 530, 0, 0, 1),
(155, 0, '2020-11-16', 'Sale', 265, 0, 0, 1),
(156, 0, '2020-11-16', 'Sale', 265, 0, 0, 1),
(157, 0, '2020-11-16', 'Sale', 3800, 0, 0, 1),
(158, 0, '2020-11-16', 'Sale', 131, 0, 0, 1),
(159, 0, '2020-11-16', 'Sale', 950, 0, 0, 1),
(160, 0, '2020-11-17', 'Sale', 53, 0, 0, 1),
(161, 0, '2020-11-17', 'Sale', 265, 0, 0, 1),
(162, 0, '2020-11-18', 'Sale', 525, 0, 0, 1),
(163, 0, '2020-11-18', 'Sale', 298, 0, 0, 1),
(164, 0, '2020-11-18', 'Purchase', 0, 0, 0, 1),
(165, 0, '2020-11-18', 'Purchase', 0, 0, 0, 1),
(166, 0, '2020-11-18', 'Sale', 64, 0, 0, 1),
(167, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(168, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(169, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(170, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(171, 0, '2020-11-19', 'Sale', 59, 0, 0, 1),
(172, 0, '2020-11-19', 'Sale', 60, 0, 0, 1),
(173, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(174, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(175, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(176, 0, '2020-11-19', 'Sale', 47, 0, 0, 1),
(177, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(178, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(179, 0, '2020-11-19', 'Purchase', 0, 0, 0, 1),
(180, 0, '2020-11-19', 'Sale', 295, 0, 0, 1),
(181, 0, '2020-11-19', 'Sale', 48, 0, 0, 1),
(182, 0, '2020-11-19', 'SALES', 295, 0, 0, 1),
(183, 0, '2020-11-20', 'Purchase', 0, 590, 0, 1),
(184, 0, '2020-11-20', 'Purchase', 0, 590, 0, 1),
(185, 0, '2020-11-20', 'Purchase', 0, 590, 0, 1),
(186, 0, '2020-11-20', 'Purchase', 0, 590, 0, 1),
(187, 0, '2020-11-20', 'Sale', 354, 0, 0, 1),
(188, 0, '2020-11-20', 'Sale', 11, 0, 0, 1),
(189, 0, '2020-11-20', 'Sale', 12, 0, 0, 1),
(190, 0, '2020-11-20', 'Sale', 12, 0, 0, 1),
(191, 0, '2020-11-20', 'Purchase', 0, 0, 0, 1),
(192, 0, '2020-11-20', 'Purchase', 0, 1230, 0, 1),
(193, 0, '2020-11-20', 'Purchase', 0, 0, 0, 1),
(194, 0, '2020-11-20', 'Purchase', 0, 0, 0, 1),
(195, 0, '2020-11-20', 'Purchase', 0, 0, 0, 1),
(196, 0, '2020-11-21', 'Sale', 35, 0, 0, 1),
(197, 0, '2020-11-21', 'Sale', 714, 0, 0, 1),
(198, 0, '2020-11-21', 'Sale', 472, 0, 0, 1),
(199, 0, '2020-11-21', 'Purchase', 0, 0, 0, 1),
(200, 0, '2020-11-21', 'Purchase', 0, 0, 0, 1),
(201, 0, '2020-11-21', 'Sale', 3499, 0, 0, 1),
(202, 0, '2020-11-21', 'Purchase', 0, 5000, 0, 1),
(203, 0, '2020-11-21', 'Purchase', 0, 0, 0, 1),
(204, 0, '2020-11-21', 'Sale', 0, 0, 0, 1),
(205, 0, '2020-11-24', 'Purchase', 0, 0, 0, 1),
(206, 0, '2020-11-24', 'Purchase', 0, 10, 0, 1),
(207, 0, '2020-11-25', 'Sale', 12, 0, 0, 1),
(208, 0, '2020-11-25', 'Sale', 10, 0, 0, 1),
(209, 0, '2020-11-25', 'Sale', 10, 0, 0, 1),
(210, 0, '2020-11-25', 'Sale', 10, 0, 0, 1),
(211, 0, '2020-11-18', 'Salary payment', 0, 125, 0, 1),
(212, 0, '2020-11-25', 'Purchase', 0, 360, 0, 1),
(213, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(214, 0, '2020-11-27', 'CONVEYANCE', 0, 100, 0, 1),
(215, 0, '2020-11-27', 'CASH', 1000, 0, 0, 1),
(216, 0, '2020-11-27', '', 0, 0, 900, 1),
(217, 0, '2020-11-27', 'PHOTOSTAT', 0, 50, 0, 1),
(218, 0, '2020-11-27', 'SALES', 5000, 0, 0, 1),
(219, 0, '2020-11-27', '', 0, 0, 5850, 1),
(220, 0, '2020-11-27', '', 0, 0, 5850, 1),
(221, 0, '2020-11-27', 'Salary payment', 0, 50000, 0, 1),
(222, 0, '2020-11-27', 'Salary payment', 0, 20000, 0, 1),
(223, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(224, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(225, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(226, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(227, 0, '2020-11-27', 'Sale', 680, 0, 0, 1),
(228, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(229, 0, '2020-11-27', 'Sale', 2540, 0, 0, 1),
(230, 0, '2020-11-27', 'Sale', 1207, 0, 0, 1),
(231, 0, '2020-11-27', 'Sale', 635, 0, 0, 1),
(232, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(233, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(234, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(235, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(236, 0, '2020-11-27', 'Purchase', 0, 0, 0, 1),
(237, 0, '2020-11-27', 'Sale', 236, 0, 0, 1),
(238, 0, '2020-11-27', 'Sale', 236, 0, 0, 1),
(239, 0, '2020-12-01', 'Purchase', 0, 0, 0, 1),
(240, 0, '2020-12-01', 'Purchase', 0, 0, 0, 1),
(241, 0, '2020-12-01', 'Sale', 531, 0, 0, 1),
(242, 0, '2020-12-01', 'Sale', 536, 0, 0, 1),
(243, 0, '2020-12-08', 'Purchase', 0, 0, 0, 1),
(244, 0, '2020-12-08', 'Sale', 12, 0, 0, 1),
(245, 0, '2020-12-14', 'Sale', 472, 0, 0, 1),
(246, 0, '2020-12-16', 'Purchase', 0, 0, 0, 1),
(247, 0, '2020-12-16', 'Purchase', 0, 0, 0, 1),
(248, 0, '2020-12-16', 'Sale', 3500, 0, 0, 1),
(249, 0, '2020-12-16', 'Sale', 2000, 0, 0, 1),
(250, 0, '2020-12-17', 'Sale', 12, 0, 0, 1),
(251, 0, '2020-12-17', 'Sale', 1770, 0, 0, 1),
(252, 0, '2020-12-17', 'Sale', 2000, 0, 0, 1),
(253, 0, '2020-12-17', 'Sale', 11, 0, 0, 1),
(254, 0, '2020-12-17', 'Purchase', 0, 10, 0, 1),
(255, 0, '2020-12-17', 'Sale', 3753, 0, 0, 1),
(256, 0, '2020-12-17', 'Purchase', 0, 0, 0, 1),
(257, 0, '2020-12-17', 'Purchase', 0, 1, 0, 1),
(258, 0, '2020-12-17', 'Purchase', 0, 0, 0, 1),
(259, 0, '2020-12-18', 'Purchase', 0, 0, 0, 1),
(260, 0, '2020-12-18', 'Sale', 1050, 0, 0, 1),
(261, 0, '2020-12-22', 'Purchase', 0, 0, 0, 1),
(262, 0, '2020-12-22', 'Purchase', 0, 0, 0, 1),
(263, 0, '2020-12-22', 'Sale', 708, 0, 0, 1),
(264, 0, '2020-12-22', 'Sale', 1888, 0, 0, 1),
(265, 0, '2021-01-06', 'Sale', 1045, 0, 0, 1),
(266, 0, '1970-01-01', 'CONVEYANCE', 0, 200, 0, 1),
(267, 0, '2021-04-12', 'BANK - SHAJI - TPDY', 0, 2500, 0, 1),
(268, 0, '2021-04-09', 'MARKETING', 4500, 0, 0, 1),
(269, 0, '2021-08-25', 'BANK - SONIA ', 0, 2500, 0, 1),
(270, 0, '2021-08-25', 'CASH', 10000, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finyear`
--

DROP TABLE IF EXISTS `tbl_finyear`;
CREATE TABLE IF NOT EXISTS `tbl_finyear` (
  `finyear_id` int(11) NOT NULL AUTO_INCREMENT,
  `fin_year` varchar(50) NOT NULL,
  `fin_startdate` varchar(50) NOT NULL,
  `fin_enddate` varchar(50) NOT NULL,
  `fin_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`finyear_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_finyear`
--

INSERT INTO `tbl_finyear` (`finyear_id`, `fin_year`, `fin_startdate`, `fin_enddate`, `fin_status`, `status`) VALUES
(1, '2021-2022', '2021-04-01', '2022-03-31', 0, 0),
(2, '2021-2022', '2021-04-01', '2022-03-31', 0, 0),
(3, '2021-2022', '2021-03-03', '2021-03-31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledgerbuk`
--

DROP TABLE IF EXISTS `tbl_ledgerbuk`;
CREATE TABLE IF NOT EXISTS `tbl_ledgerbuk` (
  `ledgerbuk_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ledgerbuk_head` varchar(50) NOT NULL,
  `credit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `ledgerbuk_status` int(11) NOT NULL,
  PRIMARY KEY (`ledgerbuk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=275 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ledgerbuk`
--

INSERT INTO `tbl_ledgerbuk` (`ledgerbuk_id`, `date`, `ledgerbuk_head`, `credit`, `debit`, `ledgerbuk_status`) VALUES
(5, '2020-10-02', 'KSEB BILL', 0, 1200, 1),
(6, '2020-10-02', 'MOBILE BILL', 0, 500, 1),
(7, '2020-10-02', 'WATER BILL', 0, 1000, 1),
(9, '2020-10-02', 'SALES', 5000, 0, 1),
(10, '2020-10-03', 'PHOTOSTAT', 0, 100, 1),
(11, '2020-10-03', 'BSNL BILL', 0, 1000, 1),
(12, '2020-07-03', 'SALES', 2000, 0, 1),
(13, '2020-07-06', 'SALES', 1000, 0, 1),
(14, '2020-07-06', 'SALES', 2000, 0, 1),
(15, '2020-07-06', 'KSEB BILL', 0, 1000, 1),
(16, '2020-07-06', 'KSEB BILL', 0, 1000, 1),
(17, '2020-07-06', 'WATER BILL', 0, 2000, 1),
(18, '2020-07-06', 'Purchase', 1200, 0, 1),
(19, '2020-07-06', 'Purchase', 1200, 0, 1),
(20, '2020-07-06', 'Purchase', 20, 0, 1),
(21, '2020-07-06', 'Purchase', 120, 0, 1),
(22, '2020-07-06', 'Purchase', 10, 0, 1),
(23, '2020-07-06', 'Purchase', 0, 15099, 1),
(25, '2020-07-06', 'Purchase', 0, 800, 1),
(26, '2020-07-08', 'Purchase', 100, 0, 1),
(27, '2020-07-08', 'Salary Payment', 0, 10560, 1),
(28, '2020-07-08', 'SALES', 1200, 0, 1),
(29, '2020-07-24', 'Purchase', 0, 0, 1),
(30, '2020-09-17', 'Purchase', 0, 0, 1),
(31, '2020-09-17', 'Purchase', 0, 0, 1),
(32, '2020-09-17', 'Purchase', 0, 0, 1),
(33, '2020-09-17', 'Purchase', 0, 0, 1),
(34, '2020-09-17', 'Purchase', 0, 0, 1),
(35, '2020-09-17', 'Purchase', 0, 0, 1),
(36, '2020-09-17', 'Purchase', 0, 8400, 1),
(37, '2020-09-17', 'Purchase', 20, 0, 1),
(38, '2020-09-17', 'Purchase', 20, 0, 1),
(39, '2020-09-17', 'Purchase', 1980, 0, 1),
(40, '2020-09-17', 'Purchase', 200, 0, 1),
(41, '2020-09-17', 'Purchase', 400, 0, 1),
(42, '2020-09-17', 'Purchase', 10, 0, 1),
(43, '2020-09-17', 'Purchase', 10, 0, 1),
(44, '2020-09-17', 'Purchase', 20, 0, 1),
(45, '2020-09-17', 'Purchase', 10, 0, 1),
(46, '2020-10-05', 'Purchase', 95, 0, 1),
(47, '2020-10-05', 'Purchase', 48, 0, 1),
(48, '2020-10-05', 'Purchase', 0, 0, 1),
(49, '2020-10-05', 'Purchase', 48, 0, 1),
(50, '2020-10-05', 'Purchase', 1244398369, 0, 1),
(51, '2020-10-07', 'Purchase', 19, 0, 1),
(52, '2020-10-07', 'Purchase', 10, 0, 1),
(53, '2020-10-07', 'Purchase', 10, 0, 1),
(54, '2020-10-07', 'Purchase', 20, 0, 1),
(55, '2020-10-07', 'Purchase', 20, 0, 1),
(56, '2020-10-07', 'Purchase', 10, 0, 1),
(57, '2020-10-07', 'Purchase', 9, 0, 1),
(58, '2020-10-08', 'Purchase', 0, 0, 1),
(59, '2020-10-08', 'Purchase', 0, 0, 1),
(60, '2020-10-08', 'Purchase', 0, 0, 1),
(61, '2020-10-08', 'Purchase', 10, 0, 1),
(62, '2020-10-08', 'Purchase', 10, 0, 1),
(63, '2020-10-08', 'Purchase', 10, 0, 1),
(64, '2020-10-08', 'Purchase', 0, 0, 1),
(65, '2020-10-08', 'Purchase', 11, 0, 1),
(66, '2020-10-20', 'Purchase', 0, 0, 1),
(67, '2020-10-20', 'Purchase', 0, 0, 1),
(68, '2020-10-20', 'Purchase', 0, 0, 1),
(69, '2020-10-20', 'Purchase', 11, 0, 1),
(70, '2020-10-21', 'Purchase', 0, 0, 1),
(71, '2020-10-21', 'Purchase', 12, 0, 1),
(72, '2020-10-21', 'Purchase', 11, 0, 1),
(73, '2020-10-21', 'Purchase', 12, 0, 1),
(74, '2020-10-21', 'Purchase', 11, 0, 1),
(75, '2020-10-21', 'Purchase', 0, 0, 1),
(76, '2020-10-21', 'Purchase', 0, 0, 1),
(77, '2020-11-03', 'KSEB BILL', 0, 20000, 1),
(78, '1970-01-01', 'SALES', 789, 0, 1),
(79, '2020-11-03', 'SALES', 2000000000, 0, 1),
(80, '2020-11-03', 'SALES', 4321, 0, 1),
(81, '1970-01-01', 'KSEB BILL', 0, 500, 1),
(82, '1970-01-01', 'LAND TAX', 0, 100, 1),
(83, '1970-01-01', 'PROFESSIONAL TAX', 0, 100, 1),
(84, '1970-01-01', 'CONVEYANCE', 0, 100, 1),
(85, '1970-01-01', 'PROFESSIONAL TAX', 0, 100, 1),
(86, '1970-01-01', 'BSNL BILL', 0, 500, 1),
(87, '2020-11-03', 'Purchase', 0, 0, 1),
(88, '2020-11-03', 'Purchase', 0, 0, 1),
(89, '2020-11-04', 'Purchase', 0, 0, 1),
(90, '2020-11-05', 'Purchase', 0, 0, 1),
(91, '2020-11-05', 'Purchase', 0, 0, 1),
(92, '2020-11-05', 'Purchase', 0, 0, 1),
(93, '2020-11-05', 'Purchase', 0, 0, 1),
(94, '1970-01-01', 'CONVEYANCE', 0, 100, 1),
(95, '1970-01-01', 'KSFE ', 0, 150, 1),
(96, '1970-01-01', 'KSFE ', 0, 500, 1),
(97, '2020-11-09', 'Purchase', 0, 0, 1),
(98, '2020-11-09', 'Purchase', 0, 0, 1),
(99, '2020-11-10', 'Purchase', 0, 0, 1),
(100, '2020-11-10', 'Purchase', 0, 0, 1),
(101, '2020-11-10', 'Purchase', 0, 0, 1),
(102, '2020-11-10', 'Purchase', 0, 0, 1),
(103, '2020-11-10', 'Purchase', 0, 0, 1),
(104, '2020-11-10', 'Purchase', 0, 0, 1),
(105, '2020-11-10', 'Purchase', 0, 0, 1),
(106, '2020-11-10', 'Purchase', 0, 0, 1),
(107, '2020-11-10', 'Purchase', 0, 0, 1),
(108, '2020-11-10', 'Purchase', 0, 0, 1),
(109, '2020-11-10', 'Purchase', 0, 0, 1),
(110, '2020-11-10', 'Purchase', 0, 0, 1),
(111, '2020-11-10', 'LABORATORY EXPENSE', 0, 1000, 1),
(112, '2020-11-10', 'MARKETING', 500, 0, 1),
(113, '2020-11-10', 'Purchase', 0, 0, 1),
(114, '2020-11-10', 'Purchase', 0, 0, 1),
(115, '2020-11-10', 'Purchase', 0, 0, 1),
(116, '2020-11-10', 'Purchase', 0, 0, 1),
(117, '2020-11-11', 'Purchase', 0, 0, 1),
(118, '2020-11-11', 'Purchase', 110, 0, 1),
(119, '2020-11-11', 'Purchase', 110, 0, 1),
(120, '2020-11-13', 'Purchase', 118, 0, 1),
(121, '2020-11-13', 'Purchase', 60, 0, 1),
(122, '2020-11-13', 'Purchase', 0, 0, 1),
(123, '2020-11-13', 'Purchase', 0, 0, 1),
(124, '2020-11-13', 'Purchase', 118, 0, 1),
(125, '2020-11-13', 'Purchase', 0, 0, 1),
(126, '2020-11-13', 'Purchase', 3000, 0, 1),
(127, '2020-11-13', 'Purchase', 1500, 0, 1),
(128, '2020-11-13', 'Purchase', 2670, 0, 1),
(129, '2020-11-13', 'Purchase', 2764, 0, 1),
(130, '2020-11-13', 'Purchase', 3000, 0, 1),
(131, '2020-11-13', 'Purchase', 2764, 0, 1),
(132, '2020-11-13', 'Purchase', 26, 0, 1),
(133, '2020-11-13', 'Purchase', 0, 0, 1),
(134, '2020-11-13', 'Purchase', 950, 0, 1),
(135, '2020-11-13', 'Purchase', 11, 0, 1),
(136, '2020-11-13', 'Purchase', 0, 0, 1),
(137, '2020-11-15', 'Purchase', 12, 0, 1),
(138, '2020-11-15', 'Purchase', 12, 0, 1),
(139, '2020-11-16', 'Purchase', 3000, 0, 1),
(140, '2020-11-16', 'Purchase', 0, 0, 1),
(141, '2020-11-16', 'Purchase', 945, 0, 1),
(142, '2020-11-16', 'Purchase', 530, 0, 1),
(143, '2020-11-16', 'Purchase', 265, 0, 1),
(144, '2020-11-16', 'Purchase', 265, 0, 1),
(145, '2020-11-16', 'Purchase', 3800, 0, 1),
(146, '2020-11-16', 'Purchase', 131, 0, 1),
(147, '2020-11-16', 'Purchase', 950, 0, 1),
(148, '2020-11-17', 'Purchase', 53, 0, 1),
(149, '2020-11-17', 'Purchase', 265, 0, 1),
(150, '2020-11-18', 'Purchase', 525, 0, 1),
(151, '2020-11-18', 'Purchase', 298, 0, 1),
(152, '2020-11-18', 'Purchase', 0, 0, 1),
(153, '2020-11-18', 'Purchase', 0, 0, 1),
(154, '2020-11-18', 'Purchase', 64, 0, 1),
(155, '2020-11-19', 'Purchase', 0, 0, 1),
(156, '2020-11-19', 'Purchase', 0, 0, 1),
(157, '2020-11-19', 'Purchase', 0, 0, 1),
(158, '2020-11-19', 'Purchase', 0, 0, 1),
(159, '2020-11-19', 'Purchase', 59, 0, 1),
(160, '2020-11-19', 'Purchase', 60, 0, 1),
(161, '2020-11-19', 'Purchase', 0, 0, 1),
(162, '2020-11-19', 'Purchase', 0, 0, 1),
(163, '2020-11-19', 'Purchase', 0, 0, 1),
(164, '2020-11-19', 'Purchase', 47, 0, 1),
(165, '2020-11-19', 'Purchase', 0, 0, 1),
(166, '2020-11-19', 'Purchase', 0, 0, 1),
(167, '2020-11-19', 'Purchase', 0, 0, 1),
(168, '2020-11-19', 'Purchase', 295, 0, 1),
(169, '2020-11-19', 'Purchase', 48, 0, 1),
(170, '2020-11-19', 'SALES', 295, 0, 1),
(171, '2020-11-20', 'Purchase', 0, 590, 1),
(172, '2020-11-20', 'Purchase', 0, 590, 1),
(173, '2020-11-20', 'Purchase', 0, 590, 1),
(174, '2020-11-20', 'Purchase', 0, 590, 1),
(175, '2020-11-20', 'Purchase', 354, 0, 1),
(176, '2020-11-20', 'Purchase', 11, 0, 1),
(177, '2020-11-20', 'Purchase', 12, 0, 1),
(178, '2020-11-20', 'Purchase', 12, 0, 1),
(179, '2020-11-20', 'Purchase', 0, 0, 1),
(180, '2020-11-20', 'Purchase', 0, 1230, 1),
(181, '2020-11-20', 'Purchase', 0, 0, 1),
(182, '2020-11-20', 'Purchase', 0, 0, 1),
(183, '2020-11-20', 'Purchase', 0, 0, 1),
(184, '2020-11-21', 'Purchase', 35, 0, 1),
(185, '2020-11-21', 'Purchase', 714, 0, 1),
(186, '2020-11-21', 'Purchase', 472, 0, 1),
(187, '2020-11-21', 'Purchase', 0, 0, 1),
(188, '2020-11-21', 'Purchase', 0, 0, 1),
(189, '2020-11-21', 'Purchase', 3499, 0, 1),
(190, '2020-11-21', 'Purchase', 0, 5000, 1),
(191, '2020-11-21', 'Purchase', 0, 0, 1),
(192, '2020-11-21', 'Purchase', 0, 0, 1),
(193, '2020-11-24', 'Purchase', 0, 0, 1),
(194, '2020-11-24', 'Purchase', 0, 10, 1),
(195, '2020-11-24', 'Paid to Supplier', 0, 1, 1),
(196, '2020-11-24', 'Paid to Supplier', 0, 3, 1),
(197, '2020-11-24', 'Paid to Supplier', 0, 1, 1),
(198, '2020-11-25', 'Purchase', 12, 0, 1),
(199, '2020-11-25', 'Purchase', 10, 0, 1),
(200, '2020-11-25', 'Purchase', 10, 0, 1),
(201, '2020-11-25', 'Purchase', 10, 0, 1),
(202, '2020-11-18', 'Salary payment', 0, 125, 0),
(203, '2020-11-18', 'Salary payment', 0, 125, 0),
(204, '2020-11-25', 'Purchase', 0, 360, 1),
(205, '2020-11-25', 'Paid to Supplier', 0, 1000, 1),
(206, '2020-11-26', 'Paid to Supplier', 0, 1, 1),
(207, '2020-11-27', 'Paid to Supplier', 0, 1000, 1),
(208, '2020-11-27', 'Paid to Supplier', 0, 450, 1),
(209, '2020-11-27', 'Paid to Supplier', 0, 499, 1),
(210, '2020-11-27', 'Purchase', 0, 0, 1),
(211, '2020-11-27', 'CONVEYANCE', 0, 100, 1),
(212, '2020-11-27', 'CASH', 1000, 0, 1),
(213, '2020-11-27', 'PHOTOSTAT', 0, 50, 1),
(214, '2020-11-27', 'SALES', 5000, 0, 1),
(215, '2020-11-27', 'Salary payment', 0, 50000, 0),
(216, '2020-11-27', 'Salary payment', 0, 20000, 0),
(217, '2020-11-27', 'Purchase', 0, 0, 1),
(218, '2020-11-27', 'Purchase', 0, 0, 1),
(219, '2020-11-27', 'Purchase', 0, 0, 1),
(220, '2020-11-27', 'Purchase', 0, 0, 1),
(221, '2020-11-27', 'Purchase', 680, 0, 1),
(222, '2020-11-27', 'Purchase', 0, 0, 1),
(223, '2020-11-27', 'Purchase', 2540, 0, 1),
(224, '2020-11-27', 'Purchase', 1207, 0, 1),
(225, '2020-11-27', 'Purchase', 635, 0, 1),
(226, '2020-11-27', 'Purchase', 0, 0, 1),
(227, '2020-11-27', 'Purchase', 0, 0, 1),
(228, '2020-11-27', 'Purchase', 0, 0, 1),
(229, '2020-11-27', 'Purchase', 0, 0, 1),
(230, '2020-11-27', 'Purchase', 0, 0, 1),
(231, '2020-11-27', 'Purchase', 236, 0, 1),
(232, '2020-11-27', 'Purchase', 236, 0, 1),
(233, '2020-12-01', 'Purchase', 0, 0, 1),
(234, '2020-12-01', 'Purchase', 0, 0, 1),
(235, '2020-12-01', 'Purchase', 531, 0, 1),
(236, '2020-12-01', 'Purchase', 536, 0, 1),
(237, '2020-12-08', 'Purchase', 0, 0, 1),
(238, '2020-12-08', 'Purchase', 12, 0, 1),
(239, '2020-12-14', 'Purchase', 472, 0, 1),
(240, '2020-12-16', 'Purchase', 0, 0, 1),
(241, '2020-12-16', 'Purchase', 0, 0, 1),
(242, '2020-12-16', 'Purchase', 3500, 0, 1),
(243, '2020-12-16', 'Purchase', 2000, 0, 1),
(244, '2020-12-17', 'Purchase', 12, 0, 1),
(245, '2020-12-03', 'Customer Paid', 3, 0, 1),
(246, '2020-12-17', 'Purchase', 1770, 0, 1),
(247, '2020-12-17', 'Purchase', 2000, 0, 1),
(248, '2020-12-17', 'Purchase', 11, 0, 1),
(249, '2020-12-18', 'Customer Paid', 8, 0, 1),
(250, '2020-12-17', 'Purchase', 0, 10, 1),
(251, '2020-12-16', 'Paid to Supplier', 0, 1500, 1),
(252, '2020-12-17', 'Purchase', 3753, 0, 1),
(253, '0000-00-00', 'Customer Paid', 1500, 0, 1),
(254, '2020-12-16', 'Paid to Supplier', 0, 1000, 1),
(255, '2020-12-17', 'Purchase', 0, 0, 1),
(256, '2020-12-17', 'Purchase', 0, 1, 1),
(257, '2020-12-18', 'Paid to Supplier', 0, 1000, 1),
(258, '2020-12-17', 'Purchase', 0, 0, 1),
(259, '0000-00-00', 'Customer Paid', 204, 0, 1),
(260, '2020-12-23', 'Paid to Supplier', 0, 12879, 1),
(261, '2020-12-18', 'Paid to Supplier', 0, 1, 1),
(262, '2020-12-18', 'Purchase', 0, 0, 1),
(263, '2020-12-18', 'Purchase', 1050, 0, 1),
(264, '2020-12-22', 'Customer Paid', 1000, 0, 1),
(265, '2020-12-22', 'Purchase', 0, 0, 1),
(266, '2020-12-22', 'Purchase', 0, 0, 1),
(267, '2020-12-22', 'Purchase', 708, 0, 1),
(268, '2020-12-22', 'Purchase', 1888, 0, 1),
(269, '2021-01-06', 'Purchase', 1045, 0, 1),
(270, '1970-01-01', 'CONVEYANCE', 0, 200, 1),
(271, '2021-04-12', 'BANK - SHAJI - TPDY', 0, 2500, 1),
(272, '2021-04-09', 'MARKETING', 4500, 0, 1),
(273, '2021-08-25', 'BANK - SONIA ', 0, 2500, 1),
(274, '2021-08-25', 'CASH', 10000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `pay_id` int(10) NOT NULL AUTO_INCREMENT,
  `pay_user_fk` int(10) NOT NULL,
  `pay_sub_fk` int(10) NOT NULL,
  `pay_amt` double NOT NULL,
  `pay_payment_id` varchar(255) NOT NULL,
  `pay_status` int(10) NOT NULL COMMENT 'Completed or Pending',
  `pay_enter_datetime` datetime NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `pay_user_fk`, `pay_sub_fk`, `pay_amt`, `pay_payment_id`, `pay_status`, `pay_enter_datetime`) VALUES
(2, 11, 1, 299, 'pay_I0lzN6LmE4Blw6', 1, '2021-09-23 04:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receipt`
--

DROP TABLE IF EXISTS `tbl_receipt`;
CREATE TABLE IF NOT EXISTS `tbl_receipt` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `receip_id_fk` varchar(11) NOT NULL,
  `finyear_id_fk` int(11) NOT NULL,
  `receipt_amount` varchar(100) NOT NULL,
  `rept_date` date NOT NULL,
  `paid_to` varchar(200) NOT NULL,
  `narration` varchar(250) NOT NULL,
  `receipt_status` int(11) NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_receipt`
--

INSERT INTO `tbl_receipt` (`receipt_id`, `receip_id_fk`, `finyear_id_fk`, `receipt_amount`, `rept_date`, `paid_to`, `narration`, `receipt_status`) VALUES
(4, '7', 0, '5000', '2020-07-02', 'DD', ' ', 0),
(5, '7', 0, '2000', '2020-07-03', 'GG', ' ', 0),
(6, '12', 0, '1000', '1970-01-01', 'XCV', '  ', 1),
(7, '7', 0, '2000', '2020-07-06', 'GH', ' ', 0),
(8, '10', 0, '1200', '1970-01-01', 'XCV', '  ', 1),
(9, '7', 0, '789', '2020-11-03', 'DFGH', ' SNB ', 1),
(10, '7', 0, '4', '1970-01-01', 'AAAAAAAAAAAAAAAAA', ' N ', 0),
(11, '7', 0, '4321', '2020-11-03', 'CCC', ' BBB', 1),
(12, '12', 0, '500', '2020-11-10', 'HARI', ' ', 1),
(13, '15', 0, '295', '2020-11-19', 'SAJI TT', ' ', 1),
(14, '14', 0, '1000', '2020-11-27', 'HARI', ' XZC', 1),
(15, '15', 0, '5000', '2020-11-27', 'ARUN', ' VGVB', 1),
(16, '12', 0, '4500', '2021-05-01', 'QWERTY', ' DEFSDFR  ', 1),
(17, '14', 0, '10000', '2021-08-25', 'HAREEZ', ' MKK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receipthead`
--

DROP TABLE IF EXISTS `tbl_receipthead`;
CREATE TABLE IF NOT EXISTS `tbl_receipthead` (
  `receip_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiptId` varchar(100) NOT NULL,
  `fin_year` varchar(100) NOT NULL,
  `receipt_head` varchar(250) NOT NULL,
  `receipt_desc` varchar(255) NOT NULL,
  `receipt_date` date NOT NULL,
  `receipt_status` int(11) NOT NULL,
  PRIMARY KEY (`receip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_receipthead`
--

INSERT INTO `tbl_receipthead` (`receip_id`, `receiptId`, `fin_year`, `receipt_head`, `receipt_desc`, `receipt_date`, `receipt_status`) VALUES
(7, '', '', 'SALES', 'product', '0000-00-00', 0),
(8, '', '', 'ABC', 'DJAFKKKKKKKKKKKK', '0000-00-00', 0),
(9, '', '', 'HBJKHBJ', 'B NBN', '0000-00-00', 0),
(10, '', '', 'ACCOUNT', 'FSD', '0000-00-00', 0),
(11, '', '', 'CASH', 'ADFSN', '0000-00-00', 0),
(12, '', '', 'MARKETING', 'HGHJ', '0000-00-00', 1),
(13, '', '', 'CASH', 'M', '0000-00-00', 0),
(14, '', '', 'CASH', 'H', '0000-00-00', 1),
(15, '', '', 'SALES', 'SALES\r\n', '0000-00-00', 1),
(16, '', '', 'CASH', 'MBNM', '0000-00-00', 0),
(17, '', '', 'PALGHAR334', '343434', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

DROP TABLE IF EXISTS `tbl_seller`;
CREATE TABLE IF NOT EXISTS `tbl_seller` (
  `sell_id` int(10) NOT NULL AUTO_INCREMENT,
  `sell_name` varchar(255) NOT NULL,
  `sell_comp_name` varchar(255) DEFAULT NULL,
  `sell_address` varchar(255) NOT NULL,
  `sell_phone_no` int(250) NOT NULL,
  `sell_img` varchar(255) DEFAULT NULL,
  `sell_status` enum('Active','InActive') NOT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`sell_id`, `sell_name`, `sell_comp_name`, `sell_address`, `sell_phone_no`, `sell_img`, `sell_status`) VALUES
(1, 'Rajeev', 'Luxor', 'Paris,heavenly gardens,NY', 2147483647, 'hello.png', 'Active'),
(2, 'Rajeev', 'Hello', 'asdasdasda', 2147483647, '98979.png', 'Active'),
(3, 'Rajeesh', 'Rajesh LLC', '12dsd 233ds', 1234567890, '29082.png', 'InActive'),
(4, 'Hitesh', 'Banroll', 'wer52asd', 2147483647, '19009.png', 'InActive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voucher`
--

DROP TABLE IF EXISTS `tbl_voucher`;
CREATE TABLE IF NOT EXISTS `tbl_voucher` (
  `voucher_id` int(10) NOT NULL AUTO_INCREMENT,
  `vouch_id_fk` int(10) NOT NULL,
  `finyear_id_fk` int(10) NOT NULL,
  `voucher_amount` varchar(255) NOT NULL,
  `paid_to` varchar(255) NOT NULL,
  `voucher_date` date NOT NULL,
  `narration` varchar(255) NOT NULL,
  `voucher_status` int(10) NOT NULL,
  PRIMARY KEY (`voucher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_voucher`
--

INSERT INTO `tbl_voucher` (`voucher_id`, `vouch_id_fk`, `finyear_id_fk`, `voucher_amount`, `paid_to`, `voucher_date`, `narration`, `voucher_status`) VALUES
(1, 9, 0, '200', 'HAREEZ', '1970-01-01', ' HELLO RAJEEV ', 0),
(2, 27, 0, '2500', 'EEEEE', '2021-04-12', ' ERTRER', 1),
(3, 23, 0, '2500', 'HAREEZ', '2021-08-25', ' KKK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vouchhead`
--

DROP TABLE IF EXISTS `tbl_vouchhead`;
CREATE TABLE IF NOT EXISTS `tbl_vouchhead` (
  `vouch_id` int(11) NOT NULL AUTO_INCREMENT,
  `voucherId` varchar(100) DEFAULT NULL,
  `fin_year` varchar(100) DEFAULT NULL,
  `vouch_head` varchar(250) NOT NULL,
  `vouch_desc` varchar(255) NOT NULL,
  `vouch_date` date DEFAULT NULL,
  `vouch_status` int(11) NOT NULL,
  PRIMARY KEY (`vouch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vouchhead`
--

INSERT INTO `tbl_vouchhead` (`vouch_id`, `voucherId`, `fin_year`, `vouch_head`, `vouch_desc`, `vouch_date`, `vouch_status`) VALUES
(1, '', '', 'WATER BILL', 'DEEPA  EKM , TPDY & HOUSE', '0000-00-00', 0),
(2, '', '', 'KSEB BILL', 'DEEPA EKM ,TPDY & HOUSE', '0000-00-00', 0),
(3, '', '', 'PROPERTY TAX', 'CORPORATION OF COCHIN', '0000-00-00', 0),
(4, '', '', 'LAND TAX', 'VILLAGE OFFICE', '0000-00-00', 0),
(5, '', '', 'PROFESSIONAL TAX', ' STAFF AND COLLEGE', '0000-00-00', 1),
(6, '', '', 'BSNL BILL', 'DEEPA  LAND', '0000-00-00', 1),
(7, '', '', 'MOBILE BILL', 'OFFICE AND SIR', '0000-00-00', 0),
(8, '', '', 'PHOTOSTAT', 'JHKK', '0000-00-00', 1),
(9, '', '', 'CONVEYANCE', 'TRAVELLING TO ALL', '0000-00-00', 1),
(10, '', '', 'SALARY ', 'FOR TEMPORARY AND GUEST  TEACHERS', '0000-00-00', 0),
(11, '', '', 'MISCELLANEOUS  EXPENSE', 'ALL UN HEAD EXPENSE', '0000-00-00', 0),
(12, '', '', 'BOOKS AND STUDY MATERIALS', 'PURCHASE OF BOOKS ITEM', '0000-00-00', 0),
(13, '', '', 'CELEBRATING EXPENSE', 'ANY CELEBRATION EXPENSES', '0000-00-00', 0),
(14, '', '', 'ELECTRIC FITTINGS ', 'ANY  ELECTRIC ITEMS , BATTERY  , USB AND ALL', '0000-00-00', 0),
(15, '', '', 'KSFE ', 'CHIT FUND', '0000-00-00', 1),
(16, '', '', 'LABORATORY EXPENSE', 'ANY LABORATORY  EQUIPMENTS', '0000-00-00', 1),
(17, '', '', 'PRINTING AND  STATIONARY', 'ALL PRINT AND STATIONARY ITEM', '0000-00-00', 1),
(18, '', '', 'BANK - CHERTHALA', 'ANTONY XAVIER A/C ', '0000-00-00', 1),
(19, '', '', 'BANK - ANTONY SBI', 'SBI A/C ', '0000-00-00', 0),
(20, '', '', 'BANK - XAVIER I A - JOINT ', ' SIR AND MERCY JOSEPH JIONT A/C', '0000-00-00', 1),
(21, '', '', 'BANK - XAVIER I A - PERSONAL', 'KALADY A/C ', '0000-00-00', 1),
(22, '', '', ' BANK - COLLEGE A/C', 'DEEPA COLLEGE A/C', '0000-00-00', 1),
(23, '', '', 'BANK - SONIA ', 'CANARA  KALADY  PERSONAL A/C ', '0000-00-00', 1),
(24, '', '', 'BANK - KALADY', 'DEEPA COLLEGE KALADY A/C', '0000-00-00', 1),
(25, '', '', 'BANK - ANTONY ', 'PERSONAL CANARA A/C', '0000-00-00', 1),
(26, '', '', ' BANK - SHAJI - MATTANCHERY', 'P S THOMAS- CANRA-MATTANCHERY', '0000-00-00', 1),
(27, '', '', 'BANK - SHAJI - TPDY', 'CANARA THOPPUMPADY A/C', '0000-00-00', 1),
(28, '', '', 'ONLINE  FEE PAYMENT', 'MG OR NIOS REG.AND EXAMS', '0000-00-00', 1),
(29, '', '', 'UNIFORM PURCHASE', 'ANY PURCHASE ', '0000-00-00', 1),
(30, '', '', 'XAVIER SIR', 'CASH GIVEN TO XAVIER SIR', '0000-00-00', 1),
(31, '', '', 'WATER BILL', 'DSF', '0000-00-00', 1),
(32, '', '', 'PHOTOSTAT', 'BN', '0000-00-00', 1),
(33, '', '', 'BSNL', 'RWE', '0000-00-00', 1),
(34, '', '', 'SALES', 'SALES', '0000-00-00', 1),
(35, '', '', 'BSNL', 'GYJ', '0000-00-00', 0),
(36, '', '', 'BSNL', 'JKHK FGHF', '0000-00-00', 1),
(37, '', '', 'PETROL EXPENCE', 'DGDGHFG', '0000-00-00', 1),
(38, '', '', 'RKODDF', 'SDFDSF', '0000-00-00', 1),
(39, NULL, NULL, 'POSITRON', 'DHASDADS', NULL, 1),
(40, NULL, NULL, 'TECH N9NE12', 'STRANGE MUSIC12', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_no` bigint(20) DEFAULT NULL,
  `user_type` varchar(5) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `cmp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `first_name`, `last_name`, `phone_no`, `user_type`, `created_date`, `updated_date`, `status`, `cmp_id`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234', 'Admin', '', 0, 'A', '2021-06-04 00:00:00', '0000-00-00 00:00:00', 1, 0),
(2, 'user', 'wahysdf@gmail.com', '123', '', '', 0, 'C', '2021-06-04 00:00:00', '0000-00-00 00:00:00', 0, 8),
(5, '', 'ashkarasr@gmail.com', '7fx5rfis', 'ashkar', 'sdf', 0, 'U', '2021-07-05 00:00:00', '0000-00-00 00:00:00', 1, 0),
(6, '', 'user13.wahylab@gmail.com', 'wvtsbEz8', 'werwer', 'dvcvcv', 0, 'U', '2021-07-05 00:00:00', '0000-00-00 00:00:00', 1, 0),
(7, '', 'dhibin.ud@gmail.com', 'DkTNEKof', 'Dhibin', 'krishna', 0, 'U', '2021-07-20 00:00:00', '0000-00-00 00:00:00', 1, 0),
(8, '', 'raj@123.com', '12345678', 'hello', 'r', 0, 'U', '2021-08-09 00:00:00', '0000-00-00 00:00:00', 1, 0),
(9, '', 'rajeev7000raghavan@gmail.com', 'xNESZtfA', 'Rajeev', 'Raghavan', 0, 'U', '2021-08-26 00:00:00', '0000-00-00 00:00:00', 1, 0),
(10, '', 'AronYates@home.com', 'aron@123', 'Aron', 'Yates', 9874564180, 'U', '2021-08-26 00:00:00', '0000-00-00 00:00:00', 1, 0),
(11, '', 'rajeesh@123.com', '1234', 'Rajeesh', 'Chandran', 9822379580, 'U', '2021-08-26 00:00:00', '0000-00-00 00:00:00', 1, 0),
(12, '', 'rajeesh@123', 'password', 'Rajeesh', 'Chandran', 0, 'U', '2021-08-26 00:00:00', '0000-00-00 00:00:00', 1, 0),
(13, '', 'j4mejishnu@yahoo.com', '1234', 'Jishnu', 'Mohan', 0, 'U', '2021-09-23 00:00:00', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_img`
--

DROP TABLE IF EXISTS `user_profile_img`;
CREATE TABLE IF NOT EXISTS `user_profile_img` (
  `user_pimg_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(10) NOT NULL,
  `user_pimage_name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_pimg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_img`
--

INSERT INTO `user_profile_img` (`user_pimg_id`, `user_id_fk`, `user_pimage_name`) VALUES
(1, 11, '9630529.png'),
(4, 10, '97681792.png'),
(5, 13, '51451394.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `frnt_menu`
--
ALTER TABLE `frnt_menu`
  ADD CONSTRAINT `frnt_menu_ibfk_1` FOREIGN KEY (`menu_cat_id`) REFERENCES `frnt_menu_cat` (`menu_cat_id`);

--
-- Constraints for table `frnt_sub_menu`
--
ALTER TABLE `frnt_sub_menu`
  ADD CONSTRAINT `frnt_sub_menu_ibfk_1` FOREIGN KEY (`menu_parent_id`) REFERENCES `frnt_menu` (`menu_id`);

--
-- Constraints for table `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `product_list_ibfk_1` FOREIGN KEY (`pro_sub_cat_id`) REFERENCES `product_sub_category` (`pro_sub_cat_id`);

--
-- Constraints for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  ADD CONSTRAINT `product_sub_category_ibfk_1` FOREIGN KEY (`pro_cat_id_fk`) REFERENCES `product_category` (`pro_cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
