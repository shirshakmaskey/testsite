-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2017 at 12:24 PM
-- Server version: 5.6.33-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lyricsne_lyrics`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Country` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Region` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `Country`, `Region`) VALUES
(2, 'Andorra', 'Europe'),
(240, 'United Arab Emirates', 'Middle East'),
(3, 'Afghanistan', 'Asia'),
(4, 'Antigua and Barbuda', 'Central America and the Caribbean'),
(5, 'Anguilla', 'Central America and the Caribbean'),
(6, 'Albania', 'Europe'),
(7, 'Armenia', 'Commonwealth of Independent States'),
(8, 'Netherlands Antilles', 'Central America and the Caribbean'),
(9, 'Angola', 'Africa'),
(10, 'Antarctica', 'Antarctic Region'),
(11, 'Argentina', 'South America'),
(12, 'American Samoa', 'Oceania'),
(13, 'Austria', 'Europe'),
(14, 'Australia', 'Oceania'),
(15, 'Aruba', 'Central America and the Caribbean'),
(16, 'Azerbaijan', 'Commonwealth of Independent States'),
(17, 'Bosnia and Herzegovina', 'Bosnia and Herzegovina, Europe'),
(18, 'Barbados', 'Central America and the Caribbean'),
(19, 'Bangladesh', 'Asia'),
(20, 'Belgium', 'Europe'),
(21, 'Burkina Faso', 'Africa'),
(22, 'Bulgaria', 'Europe'),
(23, 'Bahrain', 'Middle East'),
(24, 'Burundi', 'Africa'),
(25, 'Benin', 'Africa'),
(26, 'Bermuda', 'North America'),
(27, 'Brunei Darussalam', 'Southeast Asia'),
(28, 'Bolivia', 'South America'),
(29, 'Brazil', 'South America'),
(30, 'The Bahamas', 'Central America and the Caribbean'),
(31, 'Bhutan', 'Asia'),
(32, 'Bouvet Island', 'Antarctic Region'),
(33, 'Botswana', 'Africa'),
(34, 'Belarus', 'Commonwealth of Independent States'),
(35, 'Belize', 'Central America and the Caribbean'),
(36, 'Canada', 'North America'),
(37, 'Cocos (Keeling) Islands', 'Southeast Asia'),
(38, 'Congo, Democratic Republic of the', 'Africa'),
(39, 'Central African Republic', 'Africa'),
(40, 'Congo, Republic of the', 'Africa'),
(41, 'Switzerland', 'Europe'),
(42, 'Cote d''Ivoire', 'Africa'),
(43, 'Cook Islands', 'Oceania'),
(44, 'Chile', 'South America'),
(45, 'Cameroon', 'Africa'),
(46, 'China', 'Asia'),
(47, 'Colombia', 'South America, Central America and the Caribbean'),
(48, 'Costa Rica', 'Central America and the Caribbean'),
(49, 'Cuba', 'Central America and the Caribbean'),
(50, 'Cape Verde', 'World'),
(51, 'Christmas Island', 'Southeast Asia'),
(52, 'Cyprus', 'Middle East'),
(53, 'Czech Republic', 'Europe'),
(54, 'Germany', 'Europe'),
(55, 'Djibouti', 'Africa'),
(56, 'Denmark', 'Europe'),
(57, 'Dominica', 'Central America and the Caribbean'),
(58, 'Dominican Republic', 'Central America and the Caribbean'),
(59, 'Algeria', 'Africa'),
(60, 'Ecuador', 'South America'),
(61, 'Estonia', 'Europe'),
(62, 'Egypt', 'Africa'),
(63, 'Western Sahara', 'Africa'),
(64, 'Eritrea', 'Africa'),
(65, 'Spain', 'Europe'),
(66, 'Ethiopia', 'Africa'),
(67, 'Finland', 'Europe'),
(68, 'Fiji', 'Oceania'),
(69, 'Falkland Islands (Islas Malvinas)', 'South America'),
(70, 'Micronesia, Federated States of', 'Oceania'),
(71, 'Faroe Islands', 'Europe'),
(72, 'France', 'Europe'),
(73, 'Gabon', 'Africa'),
(74, 'United Kingdom', 'Europe'),
(75, 'Grenada', 'Central America and the Caribbean'),
(76, 'Georgia', 'Commonwealth of Independent States'),
(77, 'French Guiana', 'South America'),
(78, 'Ghana', 'Africa'),
(79, 'Gibraltar', 'Europe'),
(80, 'Greenland', 'Arctic Region'),
(81, 'The Gambia', 'Africa'),
(82, 'Guinea', 'Africa'),
(83, 'Guadeloupe', 'Central America and the Caribbean'),
(84, 'Equatorial Guinea', 'Africa'),
(85, 'Greece', 'Europe'),
(86, 'South Georgia and the South Sandwich Islands', 'Antarctic Region'),
(87, 'Guatemala', 'Central America and the Caribbean'),
(88, 'Guam', 'Oceania'),
(89, 'Guinea-Bissau', 'Africa'),
(90, 'Guyana', 'South America'),
(91, 'Hong Kong (SAR)', 'Southeast Asia'),
(92, 'Heard Island and McDonald Islands', 'Antarctic Region'),
(93, 'Honduras', 'Central America and the Caribbean'),
(94, 'Croatia', 'Europe'),
(95, 'Haiti', 'Central America and the Caribbean'),
(96, 'Hungary', 'Europe'),
(97, 'Indonesia', 'Southeast Asia'),
(98, 'Ireland', 'Europe'),
(99, 'Israel', 'Middle East'),
(100, 'India', 'Asia'),
(101, 'British Indian Ocean Territory', 'World'),
(102, 'Iraq', 'Middle East'),
(103, 'Iran', 'Middle East'),
(104, 'Iceland', 'Arctic Region'),
(105, 'Italy', 'Europe'),
(106, 'Jamaica', 'Central America and the Caribbean'),
(107, 'Jordan', 'Middle East'),
(108, 'Japan', 'Asia'),
(109, 'Kenya', 'Africa'),
(110, 'Kyrgyzstan', 'Commonwealth of Independent States'),
(111, 'Cambodia', 'Southeast Asia'),
(112, 'Kiribati', 'Oceania'),
(113, 'Comoros', 'Africa'),
(114, 'Saint Kitts and Nevis', 'Central America and the Caribbean'),
(115, 'Korea, North', 'Asia'),
(116, 'Korea, South', 'Asia'),
(117, 'Kuwait', 'Middle East'),
(118, 'Cayman Islands', 'Central America and the Caribbean'),
(119, 'Kazakhstan', 'Commonwealth of Independent States'),
(120, 'Laos', 'Southeast Asia'),
(121, 'Lebanon', 'Middle East'),
(122, 'Saint Lucia', 'Central America and the Caribbean'),
(123, 'Liechtenstein', 'Europe'),
(124, 'Sri Lanka', 'Asia'),
(125, 'Liberia', 'Africa'),
(126, 'Lesotho', 'Africa'),
(127, 'Lithuania', 'Europe'),
(128, 'Luxembourg', 'Europe'),
(129, 'Latvia', 'Europe'),
(130, 'Libya', 'Africa'),
(131, 'Morocco', 'Africa'),
(132, 'Monaco', 'Europe'),
(133, 'Moldova', 'Commonwealth of Independent States'),
(134, 'Madagascar', 'Africa'),
(135, 'Marshall Islands', 'Oceania'),
(136, 'Macedonia, The Former Yugoslav Republic of', 'Europe'),
(137, 'Mali', 'Africa'),
(138, 'Burma', 'Southeast Asia'),
(139, 'Mongolia', 'Asia'),
(140, 'Macao', 'Southeast Asia'),
(141, 'Northern Mariana Islands', 'Oceania'),
(142, 'Martinique', 'Central America and the Caribbean'),
(143, 'Mauritania', 'Africa'),
(144, 'Montserrat', 'Central America and the Caribbean'),
(145, 'Malta', 'Europe'),
(146, 'Mauritius', 'World'),
(147, 'Maldives', 'Asia'),
(148, 'Malawi', 'Africa'),
(149, 'Mexico', 'North America'),
(150, 'Malaysia', 'Southeast Asia'),
(151, 'Mozambique', 'Africa'),
(152, 'Namibia', 'Africa'),
(153, 'New Caledonia', 'Oceania'),
(154, 'Niger', 'Africa'),
(155, 'Norfolk Island', 'Oceania'),
(156, 'Nigeria', 'Africa'),
(157, 'Nicaragua', 'Central America and the Caribbean'),
(158, 'Netherlands', 'Europe'),
(159, 'Norway', 'Europe'),
(160, 'Nepal', 'Asia'),
(161, 'Nauru', 'Oceania'),
(162, 'Niue', 'Oceania'),
(163, 'New Zealand', 'Oceania'),
(164, 'Oman', 'Middle East'),
(165, 'Panama', 'Central America and the Caribbean'),
(166, 'Peru', 'South America'),
(167, 'French Polynesia', 'Oceania'),
(168, 'Papua New Guinea', 'Oceania'),
(169, 'Philippines', 'Southeast Asia'),
(170, 'Pakistan', 'Asia'),
(171, 'Poland', 'Europe'),
(172, 'Saint Pierre and Miquelon', 'North America'),
(173, 'Pitcairn Islands', 'Oceania'),
(174, 'Puerto Rico', 'Central America and the Caribbean'),
(175, 'Palestinian Territory, Occupied', NULL),
(176, 'Portugal', 'Europe'),
(177, 'Palau', 'Oceania'),
(178, 'Paraguay', 'South America'),
(179, 'Qatar', 'Middle East'),
(180, 'Reunion', 'World'),
(181, 'Romania', 'Europe'),
(182, 'Russia', 'Asia'),
(183, 'Rwanda', 'Africa'),
(184, 'Saudi Arabia', 'Middle East'),
(185, 'Solomon Islands', 'Oceania'),
(186, 'Seychelles', 'Africa'),
(187, 'Sudan', 'Africa'),
(188, 'Sweden', 'Europe'),
(189, 'Singapore', 'Southeast Asia'),
(190, 'Saint Helena', 'Africa'),
(191, 'Slovenia', 'Europe'),
(192, 'Svalbard', 'Arctic Region'),
(193, 'Slovakia', 'Europe'),
(194, 'Sierra Leone', 'Africa'),
(195, 'San Marino', 'Europe'),
(196, 'Senegal', 'Africa'),
(197, 'Somalia', 'Africa'),
(198, 'Suriname', 'South America'),
(199, 'Sao Tome and Principe', 'Africa'),
(200, 'El Salvador', 'Central America and the Caribbean'),
(201, 'Syria', 'Middle East'),
(202, 'Swaziland', 'Africa'),
(203, 'Turks and Caicos Islands', 'Central America and the Caribbean'),
(204, 'Chad', 'Africa'),
(205, 'French Southern and Antarctic Lands', 'Antarctic Region'),
(206, 'Togo', 'Africa'),
(207, 'Thailand', 'Southeast Asia'),
(208, 'Tajikistan', 'Commonwealth of Independent States'),
(209, 'Tokelau', 'Oceania'),
(210, 'East Timor', NULL),
(211, 'Turkmenistan', 'Commonwealth of Independent States'),
(212, 'Tunisia', 'Africa'),
(213, 'Tonga', 'Oceania'),
(214, 'Turkey', 'Middle East'),
(215, 'Trinidad and Tobago', 'Central America and the Caribbean'),
(216, 'Tuvalu', 'Oceania'),
(217, 'Taiwan', 'Southeast Asia'),
(218, 'Tanzania', 'Africa'),
(219, 'Ukraine', 'Commonwealth of Independent States'),
(220, 'Uganda', 'Africa'),
(221, 'United States Minor Outlying Islands', NULL),
(1, 'United States', 'North America'),
(223, 'Uruguay', 'South America'),
(224, 'Uzbekistan', 'Commonwealth of Independent States'),
(225, 'Holy See (Vatican City)', 'Europe'),
(226, 'Saint Vincent and the Grenadines', 'Central America and the Caribbean'),
(227, 'Venezuela', 'South America, Central America and the Caribbean'),
(228, 'British Virgin Islands', 'Central America and the Caribbean'),
(229, 'Virgin Islands', 'Central America and the Caribbean'),
(230, 'Vietnam', 'Southeast Asia'),
(231, 'Vanuatu', 'Oceania'),
(232, 'Wallis and Futuna', 'Oceania'),
(233, 'Samoa', 'Oceania'),
(234, 'Yemen', 'Middle East'),
(235, 'Mayotte', 'Africa'),
(236, 'Yugoslavia', 'Europe'),
(237, 'South Africa', 'Africa'),
(238, 'Zambia', 'Africa'),
(239, 'Zimbabwe', 'Africa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE IF NOT EXISTS `tbl_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `activity_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=>Normal,1=>Special',
  `added_date` date NOT NULL,
  `show_in_home_page` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisement_space`
--

CREATE TABLE IF NOT EXISTS `tbl_advertisement_space` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertiser_id` int(11) NOT NULL,
  `advert_type` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `durationOfadvert` varchar(255) CHARACTER SET utf8 NOT NULL,
  `request_date` date NOT NULL,
  `payment` int(11) NOT NULL,
  `status` binary(1) NOT NULL,
  `accepted_date` date NOT NULL,
  `accept` int(1) NOT NULL,
  `paid` binary(1) NOT NULL DEFAULT '0',
  `expiredate` date NOT NULL,
  `advert_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `verified_by` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advert_type`
--

CREATE TABLE IF NOT EXISTS `tbl_advert_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advert_name` text CHARACTER SET utf8 NOT NULL,
  `status` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE IF NOT EXISTS `tbl_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cover_image` text NOT NULL,
  `album_name` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modifeid_by` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`id`, `artist_id`, `slug`, `cover_image`, `album_name`, `version`, `detail`, `genre`, `featured`, `created_on`, `created_by`, `modified_on`, `modifeid_by`, `deleted_on`, `deleted_by`, `del_flag`, `status`) VALUES
(1, 2, 'my-nepal', '90s3_1.jpg', 'My Nepal', '1', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pop', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(2, 2, 'earthquakes', 'shiva.jpg', 'Earthquakes', 'v1.0.1', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pop', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(3, 1, 'my-country-nepal', 'l.jpg', 'My Country Nepal', '1', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pop', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(4, 3, 'romantic', 'll.jpg', 'Romantic', 'v2.0', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pop', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(5, 1, 'zindagani', 'image_11949.jpg', 'Zindagani', '1', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pop', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(6, 6, 'unimax', '1479184969.14095937_1172704782791920_1501112488236261552_n.jpg', 'Unimax', '7.45', 'Lorem ipsum dolor', 'jazz', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artist`
--

CREATE TABLE IF NOT EXISTS `tbl_artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `profile_image` text NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `biography` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` tinyint(1) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` tinyint(1) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` tinyint(1) NOT NULL,
  `del_flag` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `top_artist` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_artist`
--

INSERT INTO `tbl_artist` (`id`, `artist_name`, `slug`, `address`, `country`, `profile_image`, `gender`, `email`, `contact_no`, `biography`, `created_on`, `created_by`, `modified_on`, `modified_by`, `deleted_on`, `deleted_by`, `del_flag`, `status`, `top_artist`) VALUES
(1, 'Raju Lama', 'raju-lama', 'Kathmandu', 'Nepal', '1474450705.10612598_733011076764648_713896240141203127_n.jpg', 'male', 'raju@gmail.com', '9841042363', '&lt;p&gt;\r\n	Sample Test - Raju&lt;/p&gt;', '0000-00-00 00:00:00', 1, '2016-09-21 15:23:24', 0, '0000-00-00 00:00:00', 0, 0, 1, 1),
(2, 'Sworoop', 'sworoop', 'Lumbini', 'Nepal', '1474450735.1.jpg', 'male', 'sworoop@gmail.com', '016619001', '&lt;p&gt;\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', '2015-09-26 16:21:03', 1, '2016-09-21 15:23:55', 0, '0000-00-00 00:00:00', 0, 0, 1, 1),
(3, 'Anur Radha', 'anur-radha', 'Kathmandu', 'Nepal', '1474450746.Bhaktapur-potters-square_624_350_90_s_c1_c_c.jpg', 'male', 'anuradha@gmail.com', '014423659', '&lt;p&gt;\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&lt;br /&gt;\r\n	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;br /&gt;\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&lt;br /&gt;\r\n	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;br /&gt;\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&lt;br /&gt;\r\n	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', '2015-10-01 07:57:58', 1, '2016-09-21 15:24:06', 0, '0000-00-00 00:00:00', 0, 0, 1, 1),
(5, 'Sudar Machamasi', 'sudar-machamasi', 'Bhaktapur', 'Nepal', '1474450761.rath.jpg', 'male', 'sundar@gmail.com', '987654321', '&lt;p&gt;\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&lt;br /&gt;\r\n	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;br /&gt;\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&lt;br /&gt;\r\n	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;br /&gt;\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&lt;br /&gt;\r\n	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', '2016-06-02 15:17:30', 3, '2016-09-21 15:24:21', 0, '0000-00-00 00:00:00', 0, 0, 1, 1),
(6, 'Sundar', 'sundar', 'Golmadi', 'Nepal', '1479184882.1385364_712715948757277_829824972_n.jpg', 'male', 'unimaxmacha@gmail.com', '9841042363', '&lt;p&gt;\r\n	Test&lt;/p&gt;', '2016-11-15 10:26:21', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attribute`
--

CREATE TABLE IF NOT EXISTS `tbl_attribute` (
  `attribute_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `attribute_group_id` int(11) NOT NULL,
  `sort_order` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attribute_group`
--

CREATE TABLE IF NOT EXISTS `tbl_attribute_group` (
  `attribute_group_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `sort_order` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing_info`
--

CREATE TABLE IF NOT EXISTS `tbl_billing_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `apartment_home_address` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `postcode_zip` varchar(50) NOT NULL,
  `town_city` varchar(255) NOT NULL,
  `billing_email` varchar(100) NOT NULL,
  `billing_phone` varchar(30) NOT NULL,
  `booking_info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_child`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_child` (
  `child_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` float NOT NULL,
  PRIMARY KEY (`child_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_booking_child`
--

INSERT INTO `tbl_booking_child` (`child_id`, `booking_id`, `item_id`, `quantity`, `item_price`) VALUES
(2, 1, 13, 1, 0),
(3, 1, 12, 1, 0),
(6, 2, 14, 1, 0),
(10, 3, 14, 1, 10),
(11, 3, 12, 1, 3),
(12, 3, 13, 1, 10),
(13, 4, 18, 1, 0),
(14, 5, 19, 1, 0),
(15, 6, 19, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_master`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `booking_date` datetime NOT NULL,
  `booking_type` varchar(255) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `currency_symbol` varchar(10) NOT NULL,
  `subtotal` float NOT NULL,
  `shipping_type` varchar(255) NOT NULL,
  `shipping_rate` float NOT NULL,
  `discount_coupon` varchar(255) NOT NULL,
  `discount_rate` float NOT NULL,
  `tax` varchar(50) NOT NULL,
  `tax_rate` varchar(50) NOT NULL,
  `service_charge` varchar(50) NOT NULL,
  `grand_total` float NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `has_payment` tinyint(1) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_transaction_id` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `booking_status` enum('open','close') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_booking_master`
--

INSERT INTO `tbl_booking_master` (`id`, `user_id`, `booking_date`, `booking_type`, `currency`, `currency_symbol`, `subtotal`, `shipping_type`, `shipping_rate`, `discount_coupon`, `discount_rate`, `tax`, `tax_rate`, `service_charge`, `grand_total`, `payment_type`, `has_payment`, `payment_date`, `payment_transaction_id`, `status`, `booking_status`) VALUES
(1, 1, '2016-07-03 08:20:46', 'user', 'USD', '$', 0, '', 0, '', 0, '', '', '', 20, 'paypal', 1, '2016-07-04', '6LT01553920716105', 'Payment Done and Completed', 'close'),
(2, 1, '2016-07-09 08:01:46', 'user', 'USD', '$', 0, '', 0, '', 0, '', '', '', 20, 'paypal', 1, '2016-07-09', '6R8539805K5350903', 'Payment Done and Completed', 'close'),
(3, 1, '2016-07-11 11:08:30', 'user', 'USD', '$', 0, '', 0, '', 0, '', '', '', 0, '', 0, '0000-00-00', '', '1', 'open'),
(4, 5, '2016-12-21 22:39:09', 'user', 'USD', '$', 0, '', 0, '', 0, '', '', '', 0, '', 0, '0000-00-00', '', '1', 'open'),
(5, 8, '2017-01-16 11:16:19', 'user', 'USD', '$', 0, '', 0, '', 0, '', '', '', 0, '', 0, '0000-00-00', '', '1', 'open'),
(6, 9, '2017-03-05 07:54:40', 'user', 'USD', '$', 0, '', 0, '', 0, '', '', '', 0, '', 0, '0000-00-00', '', '1', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_online`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `trip_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `child` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country` int(11) NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `company` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `airlines` varchar(255) CHARACTER SET utf8 NOT NULL,
  `flightno` varchar(255) CHARACTER SET utf8 NOT NULL,
  `notify` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hear_about` varchar(255) CHARACTER SET utf8 NOT NULL,
  `i_am` varchar(255) CHARACTER SET utf8 NOT NULL,
  `other_activities` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `booked_date` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_rooms`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `room_category` varchar(50) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `no_of_room` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_table`
--

CREATE TABLE IF NOT EXISTS `tbl_booking_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `checkintime` varchar(20) NOT NULL,
  `adult` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `country` int(11) NOT NULL,
  `phone` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `company` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `notify` varchar(255) CHARACTER SET latin1 NOT NULL,
  `first_time` tinyint(1) NOT NULL,
  `booked_date` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_booking_table`
--

INSERT INTO `tbl_booking_table` (`id`, `checkindate`, `checkoutdate`, `checkintime`, `adult`, `fullname`, `address`, `country`, `phone`, `mobile`, `email`, `company`, `description`, `notify`, `first_time`, `booked_date`, `status`) VALUES
(1, '2015-05-24', '0000-00-00', '17:00', 2, 'Naresh Suwal', '', 0, '9851126954', '9851126954', 'bibil1986imns@gmail.com', 'Wise Exist Web Technology Pvt. Ltd', 'This is testing ok', '1', 1, '2015-05-23', 0),
(2, '2015-05-24', '0000-00-00', '17:00', 2, 'Naresh Suwal', '', 0, '9851126954', '9851126954', 'bibil1986imns@gmail.com', 'Wise Exist Web Technology Pvt. Ltd', 'This is testing ok', '1', 1, '2015-05-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_filter`
--

CREATE TABLE IF NOT EXISTS `tbl_category_filter` (
  `category_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_items`
--

CREATE TABLE IF NOT EXISTS `tbl_category_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_name_de` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `description_de` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `special` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_field_id` int(11) NOT NULL,
  `comment_desc` text CHARACTER SET utf8 NOT NULL,
  `postedby` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_configuration`
--

CREATE TABLE IF NOT EXISTS `tbl_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `configtype` enum('text','textarea','option','checkbox','file','image','functions','link') NOT NULL,
  `configname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `configdesc` text CHARACTER SET utf8 NOT NULL,
  `configvalue` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_configuration`
--

INSERT INTO `tbl_configuration` (`id`, `configtype`, `configname`, `configdesc`, `configvalue`, `status`) VALUES
(1, 'image', 'COMPANY_LOGO', 'Lyrics Nepal -  Nepal No. one Songs and Lyrics directory', 'JjfsjNYlogo.png', 1),
(2, 'image', 'COMPANY_FAVICON', 'Lyrics Nepal -  Nepal No. one Songs and Lyrics directory', 'q2zVAKkfavicon.ico', 1),
(3, 'text', 'COMPANY_SITE_NAME', 'Lyrics Nepal -  Nepal No. one Songs and Lyrics directory', 'Lyrics Nepal', 1),
(4, 'text', 'COMPANY_SHORT_NAME', 'Lyrics Nepal', 'Lyrics Nepal', 1),
(5, 'text', 'COMPANY_OWNER_NAME', 'This is the organization owner Name', 'Sundar Machamasi', 1),
(6, 'text', 'COMPANY_STREET', 'This is the company street', 'New Baneshwor', 1),
(7, 'text', 'COMPANY_LOCATION', 'This is the company location', 'Kathmandu, Nepal', 1),
(8, 'text', 'COMPANY_EMAIL', 'This is the company email address', 'info@lyricsnepal.com', 1),
(9, 'text', 'COMPANY_EMAIL_2', 'This is the company email', 'sundar@lyricsnepal.com', 1),
(10, 'text', 'COMPANY_PHONE', 'This is the company phone number', '+977 1234567', 1),
(11, 'text', 'COMPANY_MOBILE', 'This is the mobile number of company or owner', '00977 9851126954', 1),
(12, 'text', 'COMPANY_COUNTRY', 'this is the company country', 'Nepal', 1),
(13, 'text', 'COMPANY_FAX', 'This is the company telephone number', '0155223344', 1),
(14, 'text', 'COMPANY_ZONE', 'This is the company zone', 'Bagmati', 1),
(15, 'text', 'COMPANY_SITE_URL', 'This is website url', 'http://www.lyricsnepal.com', 1),
(16, 'text', 'FACEBOOK_PAGE', 'Facebook page', 'https://www.facebook.com/lyricsnepal', 1),
(17, 'text', 'SKYPE_ID', 'Skype id', 'lyricsnepal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents`
--

CREATE TABLE IF NOT EXISTS `tbl_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `post_parent` int(11) NOT NULL,
  `post_type` varchar(255) CHARACTER SET latin1 NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `description` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `show_in_home_page` tinyint(1) NOT NULL DEFAULT '0',
  `feature` tinyint(1) NOT NULL,
  `meta_keywords` varchar(150) NOT NULL,
  `meta_desc` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `banner` varchar(255) CHARACTER SET latin1 NOT NULL,
  `banner_title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `layout` enum('two_col_left_image','two_col_right_image','full_page') CHARACTER SET latin1 NOT NULL DEFAULT 'two_col_left_image',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_contents`
--

INSERT INTO `tbl_contents` (`id`, `category_id`, `post_parent`, `post_type`, `article_title`, `slug`, `short_description`, `description`, `author`, `show_in_home_page`, `feature`, `meta_keywords`, `meta_desc`, `status`, `created_at`, `created_by`, `modified_at`, `modified_by`, `banner`, `banner_title`, `layout`) VALUES
(1, 0, 0, 'page', 'welcome', 'welcome', 'welcome', '', '', 0, 0, 'welcome', '', 1, '2016-08-26 12:53:59', 1, '0000-00-00 00:00:00', 0, '', '', 'full_page'),
(2, 0, 0, 'page', 'Privacy Policy', 'privacy-policy', 'Privacy Policy', '', '', 0, 0, 'Privacy,Policy', '', 1, '2016-08-26 12:54:27', 1, '0000-00-00 00:00:00', 0, '', '', 'full_page'),
(3, 0, 0, 'page', 'Term and Conditions', 'term-and-conditions', 'Term and Conditions', '&lt;p&gt;\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;br /&gt;\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;br /&gt;\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;br /&gt;\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;br /&gt;\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;br /&gt;\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;br /&gt;\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;br /&gt;\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;br /&gt;\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&lt;br /&gt;\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse&lt;br /&gt;\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', '', 0, 0, 'Term,and,Conditions', '&lt;p&gt;\r\n	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi', 1, '2016-08-26 12:54:47', 1, '2017-01-16 11:30:47', 1, '', '', 'full_page');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE IF NOT EXISTS `tbl_currency` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_title` varchar(10) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`cur_id`, `currency_title`, `symbol`, `status`) VALUES
(1, 'DKK', 'Kr.', 1),
(2, 'USD', '$', 1),
(3, 'Euro', 'Euro', 1),
(4, 'INR', 'Rrs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `access_code` varchar(255) NOT NULL,
  `last_login_ip` varchar(100) NOT NULL,
  `date_of_last_logon` datetime NOT NULL,
  `number_of_logon` int(11) NOT NULL,
  `time_entry` varchar(100) NOT NULL,
  `is_login` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `group_id`, `first_name`, `last_name`, `phone_no`, `mobile_no`, `email`, `password`, `address`, `gender`, `country`, `image`, `created_at`, `created_by`, `modified_at`, `modified_by`, `account_type`, `access_code`, `last_login_ip`, `date_of_last_logon`, `number_of_logon`, `time_entry`, `is_login`, `status`) VALUES
(1, 1, 'Naresh', 'Suwal', '', '9851126954', 'bibil1986imns@gmail.com', 'NjllNzljNDZkMjVhZGQyNzdjOTgwMWY1Yjg0NmIyM2I=', 'Bhaktapur', '', '160', 'd1c00ambient_intelligence.jpg', '2016-07-03 06:53:17', 0, '2016-09-21', 0, 'memeber', '1487057154', '202.166.220.155', '2017-02-14 01:11:18', 23, '1487057178', 1, 1),
(9, 1, 'Aavee', 'Maharjan', '', '07429566495', 'info@cmsicons.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', 'test', 'male', '74', '', '2017-01-25 07:35:37', 0, '2017-03-05', 1, 'memeber', '1485309037', '103.232.228.100', '2017-03-23 01:11:48', 14, '1490254008', 1, 1),
(11, 1, 'ÐšÐ¾ÑÑ‚Ñ Ð‘Ð°Ð±Ð¸Ð½', 'ÐšÐ¾ÑÑ‚Ñ Ð‘Ð°Ð±Ð¸Ð½', '', '00971503139084', 'kostbab91@mail.ru', 'MjYzNjY3MWZjNzc1ZmI4YjQ2MTZjNDBkZWRiZTM2MTY=', '', '', '25', '', '2017-03-13 23:15:35', 0, '0000-00-00', 0, 'memeber', '1489426235', '', '0000-00-00 00:00:00', 0, '', 0, 0),
(12, 1, 'JamesdizIE', 'JamesdizIE', '', '00971503139084', 'artemmarianovich@gmail.com', 'NzI2OGI4ZWVkNzk0NGY5OTg1Y2Q1YTY5MmM2NzNmZGE=', '', '', '176', '', '2017-03-25 02:41:32', 0, '0000-00-00', 0, 'memeber', '1490388992', '', '0000-00-00 00:00:00', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_group`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_customer_group`
--

INSERT INTO `tbl_customer_group` (`id`, `name`, `description`, `status`) VALUES
(1, 'general', 'general', 1),
(2, 'special', 'special', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `venue` varchar(50) NOT NULL,
  `from_date` date NOT NULL,
  `from_time` varchar(50) NOT NULL,
  `to_date` date NOT NULL,
  `to_time` varchar(50) NOT NULL,
  `special` tinyint(1) NOT NULL,
  `fees` varchar(50) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `meta_desc` tinytext NOT NULL,
  `meta_keywords` tinytext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `category_id`, `title`, `slug`, `short_description`, `description`, `created_at`, `modified_at`, `venue`, `from_date`, `from_time`, `to_date`, `to_time`, `special`, `fees`, `sort_order`, `added_by`, `meta_desc`, `meta_keywords`, `status`) VALUES
(1, 1, 'This is event test', 'this-is-event-test', 'We are organizing the events on thursday .', '&lt;p&gt;\r\n	We are in the business of providing an honest and transparent service to support tourism in Nepal and securing it for the future.Nepal Assistance provides a 24 hour emergency service, everyday of the year, ensuring the best outcome for travellers.&lt;/p&gt;', '2016-03-01 09:29:23', '2016-09-15 09:54:32', 'New baneshwor', '2016-03-03', '10:00 AM', '2016-03-03', '12:00 AM', 1, '100', 0, 1, '', '', 1),
(2, 1, 'Live Concert', 'live-concert', 'This is test', '&lt;p&gt;\r\n	This is testing&lt;/p&gt;', '2016-03-02 09:28:57', '2016-09-15 09:54:58', 'New baneshwor', '2016-07-12', '9:30 AM', '2016-07-22', '3:30 PM', 1, '', 0, 1, '', '', 1),
(3, 1, 'Indra Jatra', 'indra-jatra', 'This is test', '&lt;p&gt;\r\n	This is test - Description&lt;/p&gt;', '2016-09-15 09:49:25', '2016-09-15 09:53:38', 'Kathmandu', '2016-09-15', '10:00 AM', '2016-09-30', '8:00 PM', 1, '500', 0, 1, '', '', 1),
(4, 1, 'Gaijatra', 'gaijatra', 'Test', '&lt;p&gt;\r\n	Tes&lt;/p&gt;', '2016-09-15 09:51:50', '0000-00-00 00:00:00', 'Bhaktapur', '2016-09-15', '10:00 AM', '2016-09-30', '10:00 PM', 1, '700', 0, 1, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_event_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ticket_qty` tinyint(4) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `posted_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_event_booking`
--

INSERT INTO `tbl_event_booking` (`id`, `user_id`, `event_id`, `event_title`, `event_date`, `fullname`, `address`, `contact_no`, `email`, `ticket_qty`, `message`, `posted_date`) VALUES
(1, 8, 3, 'Indra Jatra', '2017-01-20', 'Sundar', 'Golmadi', '9841042363', 'unimaxmacha@gmail.com', 4, 'Test', '2017-01-16'),
(2, 9, 4, 'Gaijatra', '0000-00-00', 'aa', 'london', '0742955495', 'aa@a.com', 1, 'aaa', '2017-03-05'),
(3, 9, 3, 'Indra Jatra', '0000-00-00', 'abc', 'a24245345345', 'wr2525', 'to.2.arun@gmail.com', 1, 'asdf', '2017-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event_type`
--

CREATE TABLE IF NOT EXISTS `tbl_event_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_event_type`
--

INSERT INTO `tbl_event_type` (`id`, `title`, `slug`, `description`, `created_at`, `modified_at`, `added_by`, `status`) VALUES
(1, 'Programs and Concert', 'programs-and-concert', 'Programs and Concert', '2016-03-01 09:01:35', '2016-06-05 10:14:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedbacker_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `posted_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `feedbacker_id`, `fullname`, `address`, `phone`, `mobile`, `email`, `subject`, `message`, `posted_date`) VALUES
(1, '', 'naresh', 'Kathmandu, Kalanki', '9851126954', '9851126954', 'bibil1986imns@gmail.com', 'hello', 'test', '2016-02-26'),
(2, '', 'naresh', 'Kathmandu, Kalanki', '9851126954', '9851126954', 'bibil1986imns@gmail.com', 'hello', 'test', '2016-02-26'),
(3, '', 'fullname', 'address', 'contact_number', 'contact_number', 'example@example.com', 'subject', 'res_message', '2016-02-26'),
(4, '', 'fullname', 'address', 'contact_number', 'contact_number', 'example@example.com', 'subject', 'res_message', '2016-02-26'),
(5, '', 'fullname', 'address', 'contact_number', 'contact_number', 'example@example.com', 'subject', 'res_message', '2016-02-26'),
(6, '', 'fullname', 'address', 'contact_number', 'contact_number', 'example@example.com', 'subject', 'res_message', '2016-02-26'),
(7, '', 'fullname', 'address', 'contact_number', 'contact_number', 'example@example.com', 'subject', 'res_message', '2016-02-26'),
(8, '', 'fullname', 'address', 'contact_number', 'contact_number', 'example@example.com', 'subject', 'res_message', '2016-02-26'),
(9, '', 'fullname', 'address', 'contact_number', 'contact_number', 'example@example.com', 'subject', 'res_message', '2016-02-26'),
(10, '', 'fullname', 'address', 'contact_number', 'contact_number', 'example@example.com', 'subject', 'res_message', '2016-02-26'),
(11, '', 'Sundar Machamasi', 'golmadi', '9841042363', '9841042363', 'unimaxmacha@gmail.com', 'Test', 'Test', '2017-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_down`
--

CREATE TABLE IF NOT EXISTS `tbl_file_down` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `added_by` int(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `meta_keywords` tinytext NOT NULL,
  `meta_desc` tinytext NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_file_down`
--

INSERT INTO `tbl_file_down` (`id`, `category_id`, `title`, `slug`, `short_description`, `description`, `added_by`, `created_at`, `modified_at`, `meta_keywords`, `meta_desc`, `status`) VALUES
(1, 2, 'hello', 'hello', 'test', '&lt;p&gt;\r\n	tests&lt;/p&gt;', 1, '2016-02-28 08:12:51', '2016-02-28 08:48:02', 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_down_type`
--

CREATE TABLE IF NOT EXISTS `tbl_file_down_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_file_down_type`
--

INSERT INTO `tbl_file_down_type` (`id`, `title`, `slug`, `description`, `created_at`, `modified_at`, `added_by`, `status`) VALUES
(2, 'Publication', 'publication', 'Publication', '2016-02-27 20:57:46', '2016-02-28 08:14:37', 1, 1),
(3, 'Brocures and Policies', 'brocures-and-policies', 'Brocures and Policies', '2016-02-27 20:57:46', '2016-02-28 08:15:03', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filter`
--

CREATE TABLE IF NOT EXISTS `tbl_filter` (
  `filter_id` int(11) NOT NULL,
  `filter_group_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filter_group`
--

CREATE TABLE IF NOT EXISTS `tbl_filter_group` (
  `filter_group_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`filter_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `gallery_name` varchar(50) NOT NULL,
  `cover_image` text NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` tinyint(1) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` tinyint(1) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` tinyint(1) NOT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `artist_id`, `gallery_name`, `cover_image`, `description`, `created_on`, `created_by`, `modified_on`, `modified_by`, `deleted_on`, `deleted_by`, `del_flag`, `status`) VALUES
(1, 3, 'Fashion', 'eventbanner.png', '[TEST]', '2015-09-25 00:00:00', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(2, 2, 'Nepali Pop', '', '[TEST]\r\nSample TRest', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(3, 1, 'One man ', '00.jpg', 'This is testing', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(9, 2, 'j', 'jj', 'k', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(10, 6, 'G1', '96583-004-6F565225.jpg', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(11, 6, 'G2', '1001261_554403064625451_1358637521_n.jpg', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(12, 6, 'G3', '1185419_556977651034659_2034213720_n.jpg', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1),
(13, 6, 'G4', '14021673_1952558601637389_2073388084537362128_n.jpg', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_type`
--

CREATE TABLE IF NOT EXISTS `tbl_group_type` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8 NOT NULL,
  `group_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `group_desc` tinytext CHARACTER SET utf8 NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `authority` smallint(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `verified_by` int(11) NOT NULL,
  `verified_date` date NOT NULL,
  `delete_request` tinyint(1) NOT NULL DEFAULT '0',
  `DelReqBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_group_type`
--

INSERT INTO `tbl_group_type` (`id`, `code`, `group_name`, `group_desc`, `type`, `authority`, `status`, `verify`, `verified_by`, `verified_date`, `delete_request`, `DelReqBy`) VALUES
(1, 'Super', 'Super Users', 'Super Users', 'BackEnd', 1, 1, 1, 0, '2012-03-08', 0, 0),
(2, 'Admin', 'Administrator', 'Administrator', 'BackEnd', 2, 1, 1, 1, '2012-03-08', 0, 0),
(3, 'frontend', 'Front End User', 'Front End User', 'FrontEnd', 3, 1, 1, 1, '2015-05-14', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE IF NOT EXISTS `tbl_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `article_title_de` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `category` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `short_description` mediumtext CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `short_description_de` mediumtext CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `description_de` text CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `currency` tinyint(4) NOT NULL,
  `price` varchar(50) CHARACTER SET utf8 NOT NULL,
  `added_by` int(11) NOT NULL,
  `show_in_home_page` tinyint(1) NOT NULL DEFAULT '0',
  `todays_special` tinyint(4) NOT NULL,
  `special_block` tinyint(4) NOT NULL,
  `added_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `meta_keywords` varchar(150) CHARACTER SET utf8 NOT NULL,
  `meta_desc` varchar(150) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_download`
--

CREATE TABLE IF NOT EXISTS `tbl_item_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `events_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `food_item_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_desc` tinytext NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbl_item_download`
--

INSERT INTO `tbl_item_download` (`id`, `content_id`, `file_id`, `package_id`, `destination_id`, `hotel_id`, `news_id`, `events_id`, `room_id`, `food_item_id`, `type`, `item_title`, `item_name`, `item_desc`, `created_date`, `status`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Assitance', '5tFumVBJxe16.jpg', 'Assitance', '2016-02-22 22:01:32', 1),
(2, 8, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'vision', 'VPsrujipGJ4.jpg', 'vision', '2016-02-22 22:39:33', 1),
(3, 8, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'assitance', 'AYuwiaLQaT9.jpg', 'assitance', '2016-02-22 22:39:33', 1),
(5, 11, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Assitance', 'fgr1ZSJ3up6.jpg', 'Assitance', '2016-02-23 09:55:58', 1),
(6, 12, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'a', '6jAEwK6pkz13.jpg', 'a', '2016-02-23 09:58:08', 1),
(7, 13, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'a', 'vyv2yxab8r2.jpg', 'a', '2016-02-23 10:00:05', 1),
(8, 14, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'a', 'Xfe2qn5syX18.jpg', 'a', '2016-02-23 10:02:09', 1),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'focus', 'Ym5ZjyxLT67.jpg', 'focus', '2016-02-25 08:53:40', 1),
(16, 0, 0, 0, 0, 0, 3, 0, 0, 0, 'image', 'a', 'ZgDO9uPfq814.jpg', 'a', '2016-02-25 09:09:12', 1),
(18, 0, 0, 0, 0, 0, 2, 0, 0, 0, 'image', 'a', 'UB36NqrO5s12.jpg', 'a', '2016-02-25 09:21:21', 1),
(19, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'image', 'a', 'Km3m8vK7dd7.jpg', 'a', '2016-02-25 09:22:15', 1),
(20, 37, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Air Destiny', 'bWJ62QnNdQairdynasty1.jpg', 'Air Destiny', '2016-02-25 09:44:24', 1),
(21, 37, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Ciwec Clinic', 'Sxl6hS89mnciwec.jpg', 'Ciwec Clinic', '2016-02-25 09:44:24', 1),
(22, 37, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Grande International Hospital', 'p2cg5JogrIgrande.jpg', 'Grande International Hospital', '2016-02-25 09:44:24', 1),
(23, 37, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Himalayan Rescue Association', '2BmXHZaTvCHRA-New-Logo.jpg', 'Himalayan Rescue Association', '2016-02-25 09:44:24', 1),
(24, 37, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Norvic International Hospital', 'Kw2enjn4Xdlogo_norvic1.jpg', 'Norvic International Hospital', '2016-02-25 09:44:24', 1),
(25, 37, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Shree Airline', '8NNJoGKNLpShree_Airlines_Logo.jpg', 'Shree Airline', '2016-02-25 09:44:24', 1),
(26, 37, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Simrik Air', 'LMQG1wxuXjsimrik-air.jpg', 'Simrik Air', '2016-02-25 09:44:24', 1),
(27, 15, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'who we are?', 'HU2FCTij2bslider8.jpg', 'who we are?', '2016-02-26 08:22:47', 1),
(29, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'file', 'naresh ko image', 'naresh.png', 'abc', '2016-02-28 08:12:51', 1),
(34, 37, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Vayodhya Hospital', 'vaHwGHrXtLvayodhya.jpg', 'Vayodhya Hospital', '2016-05-12 06:55:27', 1),
(35, 43, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'stories1', 'iylMJjwxT3default_user.png', 'stories1', '2016-05-14 18:41:14', 1),
(36, 44, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Stoires2', 'kOl6Ty3pyzdefault_user.png', 'Stoires2', '2016-05-14 18:44:29', 1),
(37, 45, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Stoires3', 'aXDlvHauBRdefault_user.png', 'Stoires3', '2016-05-14 18:44:50', 1),
(38, 47, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Stoires5', 'tqYzAaLrSOdefault_user.png', 'Stoires5', '2016-05-14 18:45:06', 1),
(39, 48, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Stoires6', 'KX9ZbbfhECdefault_user.png', 'Stoires6', '2016-05-14 18:45:20', 1),
(40, 46, 0, 0, 0, 0, 0, 0, 0, 0, 'image', 'Stoires4', '6IFVGS9QiXdefault_user.png', 'Stoires4', '2016-05-14 18:46:11', 1),
(43, 0, 0, 0, 0, 0, 0, 4, 0, 0, 'image', '', '3II1OdWpU81001261_554403064625451_1358637521_n.jpg', '', '2016-09-15 09:51:50', 1),
(44, 0, 0, 0, 0, 0, 0, 3, 0, 0, 'image', '', 'bPsVg6wzQe14089012_10209104892332302_4371406713998275380_n.jpg', '', '2016-09-15 09:53:38', 1),
(45, 0, 0, 0, 0, 0, 0, 1, 0, 0, 'image', '', 'y9aTIS1hN314102375_1172704712791927_7206287963956864513_n.jpg', '', '2016-09-15 09:54:32', 1),
(46, 0, 0, 0, 0, 0, 0, 2, 0, 0, 'image', '', 'kFMx1c1t6B1185419_556977651034659_2034213720_n.jpg', '', '2016-09-15 09:54:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_links`
--

CREATE TABLE IF NOT EXISTS `tbl_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(4) NOT NULL,
  `type` varchar(50) NOT NULL,
  `link_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_desc` text CHARACTER SET utf8 NOT NULL,
  `added_date` date NOT NULL,
  `status` binary(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_links`
--

INSERT INTO `tbl_links` (`id`, `parent_id`, `type`, `link_title`, `link_url`, `link_desc`, `added_date`, `status`) VALUES
(1, 0, '', 'Google', 'http://www.google.com', 'This is the google page', '2011-05-09', '1'),
(7, 0, '', 'hi', 'http://www.bing.com', 'sdfdsf', '2011-05-07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE IF NOT EXISTS `tbl_manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `menu_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category` int(11) NOT NULL,
  `article_page` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_type` enum('internal','external') CHARACTER SET utf8 NOT NULL DEFAULT 'internal',
  `menu_link` tinytext CHARACTER SET utf8 NOT NULL,
  `sort_order` mediumint(9) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `parent_id`, `menu_type`, `category`, `article_page`, `name`, `link_type`, `menu_link`, `sort_order`, `status`) VALUES
(1, 0, '1', 0, 'home', 'Home', 'internal', 'home', 0, 1),
(2, 0, '1', -1, 'about-us', 'About Us', 'internal', 'pages/about-us', 0, 1),
(3, 0, '1', -1, 'our-services', 'Services', 'internal', 'pages/our-services', 0, 1),
(4, 0, '1', 0, 'gallery', 'Gallery', 'internal', 'gallery', 0, 1),
(5, 0, '1', -1, 'news-and-events', 'News &amp; Events', 'internal', 'pages/news-and-events', 0, 1),
(6, 0, '1', 0, 'article', 'Nepal', 'internal', 'article', 0, 1),
(7, 0, '1', 0, 'personal-travel', 'Personal Travel', 'internal', 'personal-travel', 0, 0),
(8, 0, '2', 0, 'inquiry', 'Ask a Question', 'internal', 'inquiry', 0, 1),
(9, 0, '1', 0, 'contact', 'Contact Us', 'internal', 'contact', 0, 1),
(10, 0, '2', 0, 'get_a_quote', 'Get a Quote', 'internal', 'get_a_quote', 0, 1),
(11, 0, '2', 0, 'events', 'Events', 'internal', 'events', 0, 1),
(12, 0, '3', 0, 'article', 'Articles', 'internal', 'article', 0, 1),
(13, 0, '3', 0, 'download', 'Pulication', 'internal', 'download', 0, 1),
(14, 0, '3', -1, 'term-and-conditions', 'Term and Conditions', 'internal', 'pages/term-and-conditions', 0, 1),
(15, 0, '3', -1, 'privacy-policy', 'Privacy Policy', 'internal', 'pages/privacy-policy', 0, 1),
(16, 0, '3', 0, 'contact', 'Inquiry', 'internal', 'contact', 0, 1),
(17, 2, '1', -1, 'about-us', 'Who we are?', 'internal', 'pages/about-us', 0, 1),
(18, 2, '1', -1, 'our-network', 'Our Network', 'internal', 'pages/our-network', 0, 1),
(19, 2, '1', -1, 'our-people', 'Our People', 'internal', 'pages/our-people', 0, 0),
(20, 2, '1', -1, 'our-vision-and-mission', 'Our Vision and Mission', 'internal', 'pages/our-vision-and-mission', 0, 1),
(21, 3, '1', -1, 'security-assistance', 'Security Assitance', 'internal', 'pages/security-assistance', 0, 1),
(22, 3, '1', -1, 'medical-emergency-assistance', 'Medical Emergency Assistance', 'internal', 'pages/medical-emergency-assistance', 0, 1),
(23, 3, '1', -1, 'travel-evacuation-assistance', 'Travel (Evacuation) Assistance', 'internal', 'pages/travel-evacuation-assistance', 0, 1),
(24, 3, '1', -1, 'dental-assitance', 'Dental Assitance', 'internal', 'pages/dental-assitance', 0, 0),
(25, 4, '1', -1, 'assitance', 'Assitance', 'internal', 'pages/assitance', 0, 0),
(26, 4, '1', -1, 'tracking', 'Tracking', 'internal', 'pages/tracking', 0, 0),
(27, 4, '1', -1, 'training', 'Training', 'internal', 'pages/training', 0, 0),
(28, 4, '1', -1, 'consulting', 'Consulting', 'internal', 'pages/consulting', 0, 0),
(29, 4, '1', -1, 'staffing', 'Staffing', 'internal', 'pages/staffing', 0, 0),
(30, 4, '1', -1, 'supplies', 'Supplies', 'internal', 'pages/supplies', 0, 0),
(31, 4, '1', -1, 'top-side', 'Top side', 'internal', 'pages/top-side', 0, 0),
(32, 4, '1', -1, 'clinics', 'Clinics', 'internal', 'pages/clinics', 0, 0),
(33, 4, '1', -1, 'occupational-health', 'Occupational Health', 'internal', 'pages/occupational-health', 0, 0),
(35, 5, '1', 0, 'news', 'News', 'internal', 'news', 0, 1),
(36, 5, '1', 0, 'events', 'Events', 'internal', 'events', 0, 1),
(37, 5, '1', 0, 'download', 'Stories', 'internal', 'stories', 0, 1),
(38, 5, '1', 0, 'multimedia', 'Multimedia', 'internal', 'pages/multimedia', 0, 0),
(39, 6, '1', 0, 'choose', 'About Nepal', 'internal', 'pages/about-nepal', 0, 1),
(40, 6, '1', 0, 'choose', 'Nepali Keywords', 'internal', 'pages/nepali-keywords', 0, 1),
(41, 6, '1', -1, 'our-benifits', 'Our Benifits', 'internal', 'pages/our-benifits', 0, 0),
(42, 6, '1', -1, 'our-oppurtunities', 'Our Oppurtunities', 'internal', 'pages/our-oppurtunities', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_menu_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_type_name` varchar(255) NOT NULL,
  `position` enum('top','top_left','top_middle','top_right','bottom','bottom_top','bottom_left','bottom_middle','bottom_right','left_top','left_middle','left_bottom','right_top','right_middle','right_bottom') NOT NULL,
  `display_number` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_menu_setting`
--

INSERT INTO `tbl_menu_setting` (`id`, `menu_type_name`, `position`, `display_number`, `status`) VALUES
(1, 'Main Menu Navigation', 'top', 9, 1),
(2, 'Top Menu Navigation', 'top_right', 8, 1),
(3, 'Footer Navigation', 'bottom', 10, 1),
(4, 'Left Navigation Menu', 'left_top', 10, 1),
(5, 'Right Navigation Menu', 'right_top', 5, 1),
(6, 'Left Navigation Menu(Middle)', 'left_middle', 10, 1),
(7, 'Left Navigation Menu(Bottom)', 'left_bottom', 10, 1),
(8, 'Right Navigation Menu(Middle)', 'right_middle', 10, 1),
(9, 'Right Navigation Menu(Bottom)', 'right_bottom', 10, 1),
(10, 'Top Navigation Menu(Middle)', 'top_middle', 3, 1),
(11, 'Top Menu Naviation(Left)', 'top_left', 7, 1),
(12, 'Footer Column 1', 'bottom_left', 5, 1),
(13, 'Footer Column 2', 'bottom_left', 5, 1),
(14, 'Footer Column 3', 'bottom_left', 5, 1),
(15, 'Footer Column 4', 'bottom_left', 5, 1),
(16, 'Footer Column 5', 'bottom_left', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE IF NOT EXISTS `tbl_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `module_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_fol_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(255) NOT NULL,
  `page` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `query_string` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `ordering` int(11) NOT NULL,
  `status` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT '1',
  `module_group` varchar(255) CHARACTER SET utf8 NOT NULL,
  `display_desc` text CHARACTER SET utf8 NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1039 ;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`id`, `parent_id`, `module_name`, `module_fol_name`, `icon`, `page`, `query_string`, `description`, `ordering`, `status`, `module_group`, `display_desc`, `menu_icon`) VALUES
(1, 0, 'Online inquiry', 'cms', 'images/icon/icon-content.png', 'index', '', 'This is the Section Where You can View the Static Pages like Contact us, Change Logo, View the Website Title,View the Vacancy Categories, Vacancy applies, Add Vacancy,also you can see the Feed backer of your website. You Can Send Replies to the Feed backer from this section.This section will help you to manage all of the above section according to the user level.', 100, '1', 'top', '', 'fa-question-circle'),
(2, 0, 'Menu', 'menu', 'images/icon/icon-navigation.png', 'index', '', 'This is the Section where you can add,Records, update the menu used in the website likes the services, about us.you can change the position of the menu, and can activate or deactivate the menu from this section', 3, '1', 'top', '', 'fa-tasks'),
(3, 0, 'Slider', 'slider', 'images/icon/icon-banner.png', 'index', '', 'This is the Slider Section Where you can change,Add, Update or Delete the Slider . You can add banner suitable for your website which are in sliding or in randomizing.', 6, '0', 'top', '', 'fa-picture-o'),
(4, 0, 'Setting', 'setting', 'images/icon/icon-setting.png', 'index', '', 'This Setting Section is Very important part of the section. This section include preference setting, seo setting, permission level setting. Please handle this with care and used only by the top level of the website owner. Don''t change any thing if you don''t know how to use this setting panel', 10, '1', 'top', '', 'fa-cog'),
(5, 0, 'Gallery', 'gallery', 'images/icon/gallery.png', 'index', '', 'This is the Section called Gallery. Where you can add new Album and Add the photos/ images in that gallery.You can active, inactive that gallery or the images. This section helps you you to show the success, or occasion  or any events images for the client or the customers', 7, '0', 'top', '', 'fa-camera'),
(6, 0, 'News', 'news', 'images/icon/icon-news.png', 'index', '', 'This is the section where you can add news', 8, '0', 'top', '', 'fa-tasks'),
(7, 0, 'Members', 'user', 'images/icon/userIcon.png', 'index', '', 'This is the member section where you can add the new user. You can Change the level, password and keep the details information about the the members.This section have generally three level for the member. Super Admin , Manager Admin, General Admin. The Super Admin have all authority to control over the whole website, Manager Admin have little low that super admin and higher authority than the General level Admin.General Admin have comparatively lower level or authority to delete the user, edit the user. and all function on the websites  ', 20, '1', 'top', '', 'fa-user'),
(19, 1, 'Feedback Page', 'cms', '', 'feedbackpage', '', '', 0, '1', 'top', '', ''),
(20, 1, 'Replies Feedback', 'cms', '', 'replytemfeedbackpage', '', '', 0, '1', 'top', '', ''),
(24, 4, 'Preferences', 'setting', '', 'configurationpage', '', '', 0, '1', 'top', '', ''),
(25, 4, 'Manage Seo', 'setting', '', 'seopage', '', '', 0, '1', 'top', '', ''),
(26, 4, 'Manage Permission', 'setting', '', 'permission', '', '', 0, '1', 'top', '', ''),
(27, 6, 'Catagory', 'news', '', 'newsTypeList', '', '', 0, '0', 'top', '', ''),
(28, 6, 'Manage News', 'news', '', 'list', '', '', 0, '1', 'top', '', ''),
(1008, 0, 'Testimonials', 'testimonials', 'images/icon/icon-testimonials.png', 'index', '', 'This is the testimonials section', 9, '0', 'top', 'This is the testimonials section where you can add the testimonials of clients.', 'fa-quote-left'),
(32, 2, 'Manage Menu', 'menu', '', 'list', '', '', 2, '1', 'top', '', ''),
(31, 2, 'Add Menu', 'menu', '', 'form', '', '', 1, '1', 'top', '', ''),
(33, 2, 'Menu Setting', 'menusetting', '', 'list', '', '', 3, '1', 'top', '', ''),
(34, 0, 'Destination', 'destination', 'images/icon/icon-destination.png', 'index', '', '', 6, '0', 'top', 'This is the destination country and its attributes like climates, seasons..', 'fa-location-arrow'),
(38, 3, 'Add Slider', 'slider', '', 'form', '', '', 0, '1', 'top', '', ''),
(39, 5, 'Photo Gallery', 'gallery', '', 'list', '', '', 0, '1', 'top', '', 'fa-picture-o'),
(36, 34, 'Manage Destination', 'destination', '', 'list', '', '', 2, '1', 'top', '', ''),
(117, 0, 'Hotels And Resort', 'hotel', 'images/icon/hotel.png', 'index', '', 'This is the Section where you can add Hotels and Resort Descriptions', 11, '0', 'top', '', 'fa-hospital-o'),
(64, 7, 'Manage AdminUser', 'user', '', 'list', '', '', 0, '1', 'top', '', ''),
(105, 104, 'Menu Of Services', 'services', '', 'services', '', '', 0, '0', 'top', '', ''),
(119, 3, 'Manage Slider', 'slider', '', 'list', '', '', 0, '1', 'top', '', ''),
(35, 34, 'Add Destination', 'destination', '', 'form', '', '', 1, '1', 'top', '', ''),
(91, 0, 'Links', 'link', 'images/icon/icon-link.png', 'index', '', 'This is the description for the links', 12, '0', 'top', '', 'fa-share-alt'),
(92, 0, 'Advertisement', 'adverts', 'images/icon/adverts.png', 'index', '', 'This is the advertisement section', 13, '0', 'top', '', 'fa-puzzle-piece'),
(93, 0, 'Files Download', 'filedown', 'images/icon/ico-report.png', 'index', '', 'This is the file download section', 14, '0', 'top', '', 'fa-gift'),
(94, 91, 'Add Links', 'link', '', 'addEditLink', '&action=add', '', 0, '0', 'top', '', ''),
(95, 91, 'View Link', 'link', '', 'link', '', '', 0, '0', 'top', '', ''),
(96, 92, 'Add Advertisement Types', 'adverts', '', 'addeditAdvertType', '&action=add', '', 0, '0', 'top', '', ''),
(97, 92, 'View Advertisement Types', 'adverts', '', 'advertList', '', '', 0, '0', 'top', '', ''),
(98, 92, 'Add Advertisement', 'adverts', '', 'addeditAdvertisementFromAdmin', 'filedown', '', 0, '0', 'top', '', ''),
(99, 92, 'View Advertisement', 'adverts', '', 'advertiseAccepted', '', '', 0, '0', 'top', '', ''),
(100, 93, 'Add Category', 'filedown', '', 'form_type', '', '', 0, '1', 'top', '', ''),
(101, 93, 'Manage Category', 'filedown', '', 'downtype', '', '', 0, '1', 'top', '', ''),
(102, 93, 'Add Download/Report', 'filedown', '', 'form', '', '', 0, '1', 'top', '', ''),
(103, 93, 'Manage Download/Report', 'filedown', '', 'list', '', '', 0, '1', 'top', '', ''),
(111, 0, 'Booking', 'booking', 'images/icon/icon-booking.png', 'index', '', 'This is the Online Booking Section Result, where you can view the online Booker from your website, you can download their details and the download all the records as well as you can reply email from here.', 5, '0', 'top', '', 'fa-shopping-cart'),
(112, 111, 'View Online Booking', 'booking', '', 'bookingpage', '', '', 0, '1', 'top', '', ''),
(113, 111, 'View Replies', 'booking', '', 'replytemBooingpage', '', '', 1, '1', 'top', '', ''),
(10, 0, 'Package Item', 'package', 'images/icon/icon-article.png', 'index', '', 'This is the package section', 8, '0', 'top', '', 'fa-gift'),
(65, 10, 'Activity', 'package', '', 'activity', '', '', 0, '1', 'top', '', ''),
(66, 10, 'Manage Package', 'package', '', 'list', '', '', 0, '1', 'top', '', ''),
(118, 117, 'Manage Hotels & Resort', 'hotel', '', 'list', '', '', 0, '1', 'top', '', ''),
(120, 0, 'Page Category', 'pagecat', 'images/icon/icon-category.png', 'index', '', 'This is the category section for the pages,post,testimonial etc', 1, '1', 'top', '', 'fa-puzzle-piece'),
(121, 120, 'Manage Page Category', 'pagecat', '', 'list', '', 'Page Categories', 0, '1', 'top', '', ''),
(8, 0, 'Contents', 'contents', 'images/icon/icon-contents.png', 'index', '', 'This is the whole pages contents', 2, '1', 'top', 'This is the whole pages contents or say pages,posts etc.', 'fa-copy'),
(1006, 8, 'Add Pages', 'contents', '', 'form', '', 'This is the form for adding the pages contents', 1, '1', 'top', '', ''),
(1007, 8, 'Manage Contents', 'contents', '', 'list', '', 'This is the lists of pages', 2, '1', 'top', '', ''),
(1009, 1008, 'Add Testimonials', 'testimonials', '', 'form', '', 'This is the menu for adding testimonials', 1, '1', 'top', '', ''),
(1010, 1008, 'Manage Testimonials', 'testimonials', '', 'list', '', 'This is the menu for listing testimonials', 2, '0', 'top', '', ''),
(1011, 0, 'Custom Block', 'custom', 'images/icon/icon-custom.png', 'index', '', 'This is the custom block section', 15, '0', 'top', 'custom', ' fa-laptop'),
(1012, 1011, 'Add Custom', 'custom', '', 'form', '', 'This is the custom block add section', 1, '1', 'top', 'custom', ''),
(1013, 1011, 'Manage Custom Blocks', 'custom', '', 'list', '', '', 2, '1', 'top', '', ''),
(1014, 0, 'Catalog', 'product', 'images/icon/icon-room.png', 'list', '', 'Catalog', 3, '0', 'top', 'Catalog', 'fa-folder-open'),
(1015, 1014, 'Catagoires', 'product', '', 'category', '', 'List Category', 1, '0', 'top', 'Manage Category', ''),
(1016, 1014, 'Products', 'product', '', 'list', '', 'List Items', 1, '0', 'top', 'Manage Products', ''),
(1017, 1014, '\r\nFilters', 'filters', '', 'list', '', '', 3, '0', 'top', 'Filters', ''),
(1018, 1014, 'Attributes', 'attributes', '', 'index', '', 'Attributes', 4, '0', 'top', 'Attributes', ''),
(1019, 1018, 'Attributes', 'attributes', '', 'list', '', 'Attributes', 1, '0', 'top', 'Attributes', ''),
(1020, 1018, 'Attributes Group', 'attributes', '', 'group_list', '', 'Attributes Group', 2, '0', 'top', 'Attributes Group', ''),
(1021, 1014, 'Options', 'options', '', 'list', '', 'options', 5, '0', 'top', 'options', ''),
(1022, 1014, 'Manufactures', 'manufactures', '', 'list', '', 'Manufactures', 6, '0', 'top', 'Manufactures', ''),
(1023, 1014, 'Reviews', 'reviews', '', 'list', '', 'Reviews', 7, '0', 'top', 'Reviews', ''),
(1024, 0, 'Articles', 'article', '', 'list', '', 'true', 2, '0', 'top', 'Articles, Blogs and Post', 'fa-copy'),
(1025, 0, 'Online Applies', 'applyform', '', 'index', '', 'Online Applies', 10, '0', 'top', 'Online Applies', 'fa-copy'),
(1026, 1025, 'Online Applies', 'applyform', '', 'list', '', '', 1, '1', 'top', 'applyform', ''),
(1027, 1025, 'Manage Price', 'applyform', '', 'price', '', 'price', 2, '1', 'top', 'price', ''),
(1028, 1025, 'Payment List', 'applyform', '', 'payment', '', 'payment', 3, '1', 'top', 'payment', ''),
(1029, 0, 'Events', 'events', '', 'index', '', 'Manage Events', 11, '1', 'top', 'Manage Events', 'fa-copy'),
(1030, 1029, 'Categoires', 'events', '', 'type', '', '', 1, '1', 'top', '', ''),
(1031, 1029, 'Manage Events', 'events', '', 'list', '', '', 2, '1', 'top', '', ''),
(1032, 0, 'Artist', 'artist', '', 'index', '', '', 1, '1', 'top', 'Artist', 'fa fa-users'),
(1033, 1032, 'Manage Artist', 'artist', '', 'lists', '', 'Artist', 1, '1', 'top', 'Artist', ''),
(1034, 1032, 'Add Artist', 'artist', '', 'form', '', 'Add  Artist', 2, '1', 'top', 'Add/Modify Artist', ''),
(1035, 0, 'Videos', 'videos', '', 'lists', '', '', 1000, '1', 'top', '', 'fa fa-music'),
(1036, 0, 'Sponser', 'sponser', '', 'list', '', '', 1000, '1', 'top', '', 'fa fa-image'),
(1037, 0, 'Songs And Lyrics', 'svl', '', 'all', '', '', 1, '1', 'top', '', 'fa fa-music'),
(1038, 0, 'Manager Customer', 'member', '', 'list', '', '', 35, '1', 'top', '', 'fa fa-user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_multimedia`
--

CREATE TABLE IF NOT EXISTS `tbl_multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `item_name` text NOT NULL,
  `item_type` enum('image','file') NOT NULL,
  `item_url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `short_description` mediumtext CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `meta_keywords` varchar(150) CHARACTER SET utf8 NOT NULL,
  `meta_desc` varchar(150) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `category_id`, `title`, `slug`, `short_description`, `description`, `author`, `added_by`, `created_at`, `modified_at`, `meta_keywords`, `meta_desc`, `status`) VALUES
(1, 1, 'Focused on helping our clients to build a successful business', 'focused-on-helping-our-clients-to-build-a-successful-business', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores. This is test news', '&lt;p&gt;\r\n	Today, people are travelling more often and more widely than ever before, both for work and for pleasure. This means they are often faced with environments that they are unfamiliar with. This level of uncertainty puts them at risk. Even a minor health or security issue, if unchecked, can quickly escalate into a more serious problem. Your ability to respond to these risks, can ultimately impact your reputation, your workforces&amp;rsquo; productivity as well as its happiness and morale.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Whether you&amp;rsquo;re looking to support your teams on an annual basis or for a shorter term &amp;ndash; a specific overseas contract, for example, or a holiday, festival or sporting event &amp;ndash; Nepal Assitance offers a range of corporate, individual and event membership packages that help mitigate those risks and their associated costs. No matter how small a medical or security issue is; our experts are qualified to help.&lt;/p&gt;', '', 1, '2016-02-25 08:53:40', '2016-03-18 06:39:08', '', '', 1),
(2, 1, 'Implementing a global risk mitigation programme', 'implementing-a-global-risk-mitigation-programme', 'Our three-step approach follows the course of a trip or assignment. It helps to prepare your global communities before departure, supports them whilst abroad, and provides assistance should they have a question or concern. Our approach is backed by a robust Assistance Centre network staffed by medical, security, aviation and logistics specialists. Our services are dedicated to providing support for any medical or security question, concern, or emergency - 24 hours a day, seven days a week.', '&lt;p&gt;\r\n	Our three-step approach follows the course of a trip or assignment. It helps to prepare your global communities before departure, supports them whilst abroad, and provides assistance should they have a question or concern. Our approach is backed by a robust Assistance Centre network staffed by medical, security, aviation and logistics specialists. Our services are dedicated to providing support for any medical or security question, concern, or emergency - 24 hours a day, seven days a week.&amp;nbsp;&lt;/p&gt;', '', 1, '2016-02-25 09:07:01', '2016-02-25 09:21:21', '', '', 1),
(3, 1, 'Travel Safety at your Fingertips', 'travel-safety-at-your-fingertips', 'The new platform and user-friendly functionality was developed in partnership with the expertise of Atlas Knowledge, a leader in innovative, learning, compliance and best-in-class competency solutions.', '&lt;p&gt;\r\n	The new platform and user-friendly functionality was developed in partnership with the expertise of Atlas Knowledge, a leader in innovative, learning, compliance and best-in-class competency solutions.&amp;nbsp;&lt;/p&gt;', '', 1, '2016-02-25 09:09:12', '2016-02-25 09:11:16', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_type`
--

CREATE TABLE IF NOT EXISTS `tbl_news_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_news_type`
--

INSERT INTO `tbl_news_type` (`id`, `title`, `slug`, `description`, `created_at`, `modified_at`, `added_by`, `status`) VALUES
(1, 'General News', 'general-news', 'General News.', '2016-02-27 20:01:57', '2016-02-27 20:09:46', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `delivery_address_detail` text NOT NULL,
  `grand_total` varchar(10) NOT NULL,
  `token_keys` varchar(50) NOT NULL,
  `has_payment` tinyint(1) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('pending','processing','completed','canceled') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `fullname`, `email`, `contact_no`, `address`, `delivery_address_detail`, `grand_total`, `token_keys`, `has_payment`, `transaction_id`, `transaction_date`, `payment_method`, `created_at`, `status`) VALUES
(1, 'Naresh Suwal', 'bibil1986imns@gmail.com', '9851126954', 'Bhaktapur', 'This is testing now', '300', 'eAbi3y', 1, 'abc', '2015-11-06 00:00:00', 'esewa', '2015-11-29 06:36:11', 'pending'),
(2, 'Naresh Suwal', 'bibil1986imns@gmail.com', '9851126954', 'Bhaktapur', 'testing', '600', 'gPrthL', 0, '', '0000-00-00 00:00:00', 'esewa', '2015-11-29 10:23:46', 'pending'),
(3, 'Naresh Suwal', 'bibil1986imns@gmail.com', '9851126954', 'Bhaktapur', 'Hello', '400', 'Xboyaz', 0, '', '0000-00-00 00:00:00', 'esewa', '2015-11-29 10:28:15', 'pending'),
(4, 'Naresh Suwal', 'bibil1986imns@gmail.com', '9851126954', 'Bhaktapur', 'This is testing', '400', 'kmUMvC', 0, '', '0000-00-00 00:00:00', 'esewa', '2015-11-29 10:29:49', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_child`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_child` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_payment_child`
--

INSERT INTO `tbl_payment_child` (`id`, `payment_id`, `item`, `item_name`, `qty`, `price`) VALUES
(1, 1, '1', 'A', 1, '100'),
(2, 1, '3', 'C', 1, '200'),
(3, 2, '1', 'China Hereke (Horoscope analysis)', 1, '400'),
(4, 2, '3', 'C', 1, '200'),
(5, 3, '1', 'China Hereke (Horoscope analysis)', 1, '400'),
(6, 4, '1', 'China Hereke (Horoscope analysis)', 1, '400');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE IF NOT EXISTS `tbl_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(5) CHARACTER SET utf8 NOT NULL,
  `group_id` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE IF NOT EXISTS `tbl_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `photo_title` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `detail` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `del_flag` tinytext NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`id`, `gallery_id`, `photo_title`, `image`, `detail`, `created_on`, `created_by`, `modified_on`, `modified_by`, `deleted_on`, `deleted_by`, `del_flag`, `status`) VALUES
(1, 1, 'lyrics photo', 'lyrics.jpg', '[TEST]\r\nSample Test', '2015-09-26 00:00:00', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0', 0),
(2, 3, 'New Title', '4 eanche corner.jpg', 'Sample Test', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0', 1),
(3, 3, 'Greeny Photo', '3_1.jpg', 'Sample Test', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0', 1),
(4, 3, 'Pop Songs', '90s3_1.jpg', '[TEST]', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0', 1),
(5, 1, 'Garden', '3.jpg', '[TEST]\r\nSample Test', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0', 0),
(6, 1, 'Pop Songs', '2.jpg', 'tes', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_playlist`
--

CREATE TABLE IF NOT EXISTS `tbl_playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_playlist`
--

INSERT INTO `tbl_playlist` (`id`, `user_id`, `item_id`, `date_added`) VALUES
(1, 1, 14, '2016-07-31'),
(2, 1, 8, '2016-08-26'),
(3, 1, 13, '2016-09-21'),
(4, 4, 14, '2016-09-22'),
(5, 4, 15, '2016-11-15'),
(6, 5, 19, '2016-12-21'),
(7, 5, 18, '2016-12-21'),
(8, 5, 17, '2016-12-21'),
(9, 8, 20, '2017-01-16'),
(10, 9, 19, '2017-03-05'),
(11, 9, 22, '2017-03-05'),
(12, 9, 21, '2017-03-05'),
(13, 9, 20, '2017-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_category`
--

CREATE TABLE IF NOT EXISTS `tbl_post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_post_category`
--

INSERT INTO `tbl_post_category` (`id`, `category_name`, `slug`, `parent_id`, `type`, `status`) VALUES
(1, 'Pages', 'pages', 0, 'content', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_category_taxonomy`
--

CREATE TABLE IF NOT EXISTS `tbl_post_category_taxonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `types` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `category` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` mediumtext CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `currency` tinyint(4) NOT NULL,
  `price` varchar(50) NOT NULL,
  `special_price` float NOT NULL,
  `added_by` int(11) NOT NULL,
  `show_in_home_page` tinyint(1) NOT NULL DEFAULT '0',
  `todays_special` tinyint(4) NOT NULL,
  `special_block` tinyint(4) NOT NULL,
  `added_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `meta_keywords` varchar(150) NOT NULL,
  `meta_desc` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_filter`
--

CREATE TABLE IF NOT EXISTS `tbl_product_filter` (
  `product_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE IF NOT EXISTS `tbl_product_image` (
  `product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_price`
--

CREATE TABLE IF NOT EXISTS `tbl_product_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_product_price`
--

INSERT INTO `tbl_product_price` (`id`, `title`, `price`, `description`, `status`) VALUES
(1, 'China Hereke (Horoscope analysis)', '400', 'China Hereke (Horoscope analysis)', 1),
(2, 'Graha santi and pooja (7 Days)', '2500', 'Graha santi and pooja (7 Days)', 1),
(3, 'Pratingira path (5 days)', '2000', 'Pratingira path', 1),
(4, 'Poojas and Prays (30 days)', '3500', 'Poojas and Prays (30 days)', 1),
(6, 'China Banayeko in Englsh', '2000', 'China Banayeko in Englsh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_related`
--

CREATE TABLE IF NOT EXISTS `tbl_product_related` (
  `product_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`related_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_to_category`
--

CREATE TABLE IF NOT EXISTS `tbl_product_to_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `rating_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rates` varchar(50) NOT NULL,
  `rating_date` datetime NOT NULL,
  `review_description` text NOT NULL,
  `review_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>review,1=>discussion',
  `verify` tinyint(1) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repliesbook`
--

CREATE TABLE IF NOT EXISTS `tbl_repliesbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `replyname` text CHARACTER SET utf8 NOT NULL,
  `replyemail` text CHARACTER SET utf8 NOT NULL,
  `subject` text CHARACTER SET utf8 NOT NULL,
  `description` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repliesfeed`
--

CREATE TABLE IF NOT EXISTS `tbl_repliesfeed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `replyname` text CHARACTER SET utf8 NOT NULL,
  `replyemail` text CHARACTER SET utf8 NOT NULL,
  `subject` text CHARACTER SET utf8 NOT NULL,
  `description` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_repliesfeed`
--

INSERT INTO `tbl_repliesfeed` (`id`, `date`, `replyname`, `replyemail`, `subject`, `description`) VALUES
(1, '2017-01-16', '', 'unimaxmacha@gmail.com', 'Hello Sundar', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seo`
--

CREATE TABLE IF NOT EXISTS `tbl_seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` text NOT NULL,
  `metasubject` text CHARACTER SET utf8 NOT NULL,
  `metakeyword` text CHARACTER SET utf8 NOT NULL,
  `metadesc` text CHARACTER SET utf8 NOT NULL,
  `metaabstract` text CHARACTER SET utf8 NOT NULL,
  `metakeyphrase` text CHARACTER SET utf8 NOT NULL,
  `metaclassification` text CHARACTER SET utf8 NOT NULL,
  `copyright` varchar(255) CHARACTER SET utf8 NOT NULL,
  `metacatagory` text CHARACTER SET utf8 NOT NULL,
  `reply_to` varchar(255) CHARACTER SET utf8 NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_seo`
--

INSERT INTO `tbl_seo` (`id`, `keywords`, `metasubject`, `metakeyword`, `metadesc`, `metaabstract`, `metakeyphrase`, `metaclassification`, `copyright`, `metacatagory`, `reply_to`, `author`) VALUES
(1, 'Lyrics Nepal', 'Lyrics Nepal', 'Lyrics Nepal', 'Lyrics Nepal', 'Lyrics Nepal', 'Lyrics Nepal', 'Lyrics Nepal', 'Lyrics Nepal', 'Lyrics Nepal', 'info@lyricsnepal.com', 'Sundar Machamasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping_info`
--

CREATE TABLE IF NOT EXISTS `tbl_shipping_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `apartment_home_address` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `postcode_zip` varchar(50) NOT NULL,
  `town_city` varchar(255) NOT NULL,
  `booking_info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_shipping_info`
--

INSERT INTO `tbl_shipping_info` (`id`, `user_id`, `booking_id`, `first_name`, `last_name`, `company_name`, `street_address`, `apartment_home_address`, `country_id`, `postcode_zip`, `town_city`, `booking_info`) VALUES
(1, 1, 1, 'Amit', 'Prajapati', 'Wise Exist', 'Bhaktapur', 'libali-2', 56, '0999', 'libali, bkt', 'This is the special nOtes'),
(2, 1, 2, 'Amit', 'Prjapati', 'Wise Exist', 'Bhaktapur', 'libali-2', 56, '0977', 'libali, bkt', 'This is special notes for delivery.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_songs_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_songs_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `token_keys` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `songs_file` text NOT NULL,
  `video_file` text NOT NULL,
  `lyrics_file` text NOT NULL,
  `detail` text NOT NULL,
  `genre` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `show_in_home` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rating` tinyint(1) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_songs_videos`
--

INSERT INTO `tbl_songs_videos` (`id`, `artist_id`, `album_id`, `token_keys`, `title`, `songs_file`, `video_file`, `lyrics_file`, `detail`, `genre`, `price`, `featured`, `show_in_home`, `created_on`, `created_by`, `modified_on`, `modified_by`, `deleted_on`, `deleted_by`, `del_flag`, `status`, `rating`) VALUES
(8, 1, 3, 'paKPmcT', 'My ring', '1465039960.myring.mp3', 'https://www.youtube.com/watch?v=pzev9CB3vuM', '<p>	This is&nbsp; the lyrics of the songs</p><p>	Hello this is the lyrics of the songs</p><p>	good luck</p>', '', 'popular', '10', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(9, 2, 2, 'fZ4Y278', 'Hello this is earthquake', '1465099133.daiba hey.mp3', 'https://www.youtube.com/watch?v=pzev9CB3vuM', '<p> 	This is&nbsp; the lyrics of the songs</p> <p> 	Hello this is the lyrics of the songs</p> <p> 	good luck</p>', '', '', '11', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(10, 2, 2, 'QnAq57K', 'My Hero', '1465099242.Bato moder gayau 0140011615{famel}.mp3', 'https://www.youtube.com/watch?v=AKeaQfdwduY', '<p> 	This is&nbsp; the lyrics of the songs</p> <p> 	Hello this is the lyrics of the songs</p> <p> 	good luck</p>', '', '', '5', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(11, 2, 1, '52CQnSk', 'Mero Pyaro Manche', '1465195411.05__tu_yaad_na_aaye.mp3', 'https://www.youtube.com/watch?v=AKeaQfdwduY', '<p> 	This is&nbsp; the lyrics of the songs</p> <p> 	Hello this is the lyrics of the songs</p> <p> 	good luck</p>', 'abc', 'dance music', '20', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(12, 1, 3, 'e7j5utg', 'Abi to Party Suru', '1465662145.MARYO NI.mp3', 'https://www.youtube.com/watch?v=AKeaQfdwduY', '<p>\r\n	This is testing</p>\r\n', '', 'popular', '3', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(13, 1, 5, 'PSBdyAK', 'Good morning', '1465692314.aankha_chopi_naroump3', 'https://www.youtube.com/watch?v=MHP0ETuMBwE', '&lt;div class=&quot;copy-paste-block&quot;&gt;\r\n	I got this feeling inside my bones&lt;br /&gt;\r\n	It goes electric, wavey when I turn it on&lt;br /&gt;\r\n	All through my city, all through my home&lt;br /&gt;\r\n	We&amp;#39;re flying up, no ceiling, when we in our zone&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	I got that sunshine in my pocket&lt;br /&gt;\r\n	Got that good soul in my feet&lt;br /&gt;\r\n	I feel that hot blood in my body when it drops&lt;br /&gt;\r\n	I can&amp;#39;t take my eyes up off it, moving so phenomenally&lt;br /&gt;\r\n	Room on lock, the way we rock it, so don&amp;#39;t stop&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	And under the lights when everything goes&lt;br /&gt;\r\n	Nowhere to hide when I&amp;#39;m getting you close&lt;br /&gt;\r\n	When we move, well, you already know&lt;br /&gt;\r\n	So just imagine, just imagine, just imagine&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Nothing I can see but you when you dance, dance, dance&lt;br /&gt;\r\n	A feeling good, good, creeping up on you&lt;br /&gt;\r\n	So just dance, dance, dance, come on&lt;br /&gt;\r\n	All those things I shouldn&amp;#39;t do&lt;br /&gt;\r\n	But you dance, dance, dance&lt;br /&gt;\r\n	And ain&amp;#39;t nobody leaving soon, so keep dancing&lt;br /&gt;\r\n	I can&amp;#39;t stop the feeling&lt;br /&gt;\r\n	So just dance, dance, dance&lt;br /&gt;\r\n	I can&amp;#39;t stop the feeling&lt;br /&gt;\r\n	So just dance, dance, dance, come on&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Ooh, it&amp;#39;s something magical&lt;br /&gt;\r\n	It&amp;#39;s in the air, it&amp;#39;s in my blood, it&amp;#39;s rushing on&lt;br /&gt;\r\n	I don&amp;#39;t need no reason, don&amp;#39;t need control&lt;br /&gt;\r\n	I fly so high, no ceiling, when I&amp;#39;m in my zone&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Cause I got that sunshine in my pocket&lt;br /&gt;\r\n	Got that good soul in my feet&lt;br /&gt;\r\n	I feel that hot blood in my body when it drops&lt;br /&gt;\r\n	I can&amp;#39;t take my eyes up off it, moving so phenomenally&lt;br /&gt;\r\n	Room on lock, the way we rock it, so don&amp;#39;t stop&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	And under the lights when everything goes&lt;br /&gt;\r\n	Nowhere to hide when I&amp;#39;m getting you close&lt;br /&gt;\r\n	When we move, well, you already know&lt;br /&gt;\r\n	So just imagine, just imagine, just imagine&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Nothing I can see but you when you dance, dance, dance&lt;br /&gt;\r\n	Feeling good, good, creeping up on you&lt;br /&gt;\r\n	So just dance, dance, dance, come on&lt;br /&gt;\r\n	All those things I shouldn&amp;#39;t do&lt;br /&gt;\r\n	But you dance, dance, dance&lt;br /&gt;\r\n	And ain&amp;#39;t nobody leaving soon, so keep dancing&lt;br /&gt;\r\n	I can&amp;#39;t stop the feeling&lt;br /&gt;\r\n	So just dance, dance, dance&lt;br /&gt;\r\n	I can&amp;#39;t stop the feeling&lt;br /&gt;\r\n	So just dance, dance, dance&lt;br /&gt;\r\n	I can&amp;#39;t stop the feeling&lt;br /&gt;\r\n	So just dance, dance, dance&lt;br /&gt;\r\n	I can&amp;#39;t stop the feeling&lt;br /&gt;\r\n	So keep dancing, come on&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	I can&amp;#39;t stop the, I can&amp;#39;t stop the&lt;br /&gt;\r\n	I can&amp;#39;t stop the, I can&amp;#39;t stop the&lt;br /&gt;\r\n	I can&amp;#39;t stop the feeling&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Nothing I can see but you when you dance, dance, dance&lt;br /&gt;\r\n	(I can&amp;#39;t stop the feeling)&lt;br /&gt;\r\n	Feeling good, good, creeping up on you&lt;br /&gt;\r\n	So just dance, dance, dance, come on&lt;br /&gt;\r\n	(I can&amp;#39;t stop the feeling)&lt;br /&gt;\r\n	All those things I shouldn&amp;#39;t do&lt;br /&gt;\r\n	But you dance, dance, dance&lt;br /&gt;\r\n	(I can&amp;#39;t stop the feeling)&lt;br /&gt;\r\n	And ain&amp;#39;t nobody leaving soon, so keep dancing&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Everybody sing&lt;br /&gt;\r\n	(I can&amp;#39;t stop the feeling)&lt;br /&gt;\r\n	Got this feeling in my body&lt;br /&gt;\r\n	(I can&amp;#39;t stop the feeling)&lt;br /&gt;\r\n	Got this feeling in my body&lt;br /&gt;\r\n	(I can&amp;#39;t stop the feeling)&lt;br /&gt;\r\n	Wanna see you move your body&lt;br /&gt;\r\n	(I can&amp;#39;t stop the feeling)&lt;br /&gt;\r\n	Got this feeling in my body&lt;br /&gt;\r\n	Break it down&lt;br /&gt;\r\n	Got this feeling in my body&lt;br /&gt;\r\n	Can&amp;#39;t stop the feeling&lt;br /&gt;\r\n	Got this feeling in my body, come on&lt;br /&gt;\r\n	&lt;span&gt;Read more at http://www.lyrics.com/cant-stop-the-feeling-lyrics-justin-timberlake.html#sJ2mgmWaiBYuxAHC.99&lt;/span&gt;&lt;/div&gt;', '', 'popular', '10', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(14, 1, 3, 'x8IlCvS', 'Halla Chalecha', '1465693919.bachekothiye.mp3', 'https://www.youtube.com/watch?v=HxdfgwqZfBM', '&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; line-height: 21.888px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; line-height: 21.888px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; line-height: 21.888px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; line-height: 21.888px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; line-height: 21.888px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; line-height: 21.888px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; line-height: 21.888px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; line-height: 21.888px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; line-height: 21.888px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;', '&lt;p&gt;\r\n	&amp;nbsp;&amp;nbsp; &amp;nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', 'pop', '10', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(15, 6, 6, 'EPnjS8d', 'Dherai Choti', '', '', '&lt;p&gt;\r\n	https://www.youtube.com/watch?v=YHt_cveIU0w&lt;/p&gt;', '', 'pop', '', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(16, 6, 6, 'A8xxcc6', 'Dherai Choti', 'o3bYgjsx6RDherai_Choti.mp3', 'https://www.youtube.com/watch?v=YHt_cveIU0w', '', '&lt;p&gt;\r\n	&lt;span style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 16px; border-radius: 0px !important;&quot;&gt;Dherai choti aakha judhyo tara timi hasenau&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 13px; border-radius: 0px !important;&quot; /&gt;\r\n	&lt;span style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 16px; border-radius: 0px !important;&quot;&gt;Dui din ko jindagi ma k k hune ho&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 13px; border-radius: 0px !important;&quot; /&gt;\r\n	&lt;span style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 16px; border-radius: 0px !important;&quot;&gt;Haei rakhana maya boli rakhana ..&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 13px; border-radius: 0px !important;&quot; /&gt;\r\n	&lt;span style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 16px; border-radius: 0px !important;&quot;&gt;Haei rakhana maya boli rakhana ..&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 13px; border-radius: 0px !important;&quot; /&gt;\r\n	&lt;span style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 16px; border-radius: 0px !important;&quot;&gt;Dherai choti vet vayo tara dhakai fukena&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 13px; border-radius: 0px !important;&quot; /&gt;\r\n	&lt;span style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 16px; border-radius: 0px !important;&quot;&gt;Bolna tah maan lagcha boli futena&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 13px; border-radius: 0px !important;&quot; /&gt;\r\n	&lt;span style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 16px; border-radius: 0px !important;&quot;&gt;Hasu kasari , maya bolu kasari&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 13px; border-radius: 0px !important;&quot; /&gt;\r\n	&lt;span style=&quot;box-sizing: border-box; color: rgb(85, 85, 85); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 16px; border-radius: 0px !important;&quot;&gt;Hasu kasari , maya bolu kasari&lt;/span&gt;&lt;/p&gt;', 'pop', '', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(17, 6, 6, 'Z7BVpy2', 'Jhari parey ko din', 'akLrdu3Vlinewtesting.mp3', 'https://www.youtube.com/watch?v=-F4wG89W5Bw', '&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;', '', 'pop', '', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(18, 6, 6, 'zk5ebXb', 'Jet Udauchu', '1479288903.Mera_Dil_Tere_Liye_(Aashiqui)(bossmobi.com).mp3', 'https://www.youtube.com/watch?v=Wbj34qhlJFI', '&lt;p&gt;\r\n	Kaile timro pacchyauri ma aljhen&lt;br /&gt;\r\n	Kaile timro chaubandhi ma aljhen&lt;br /&gt;\r\n	Lobhaune paaso thapeu maya ko&lt;br /&gt;\r\n	Aakhir timro zindagi ma aljhen (x2)&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Na dhekhe jhai baato kaati,&lt;br /&gt;\r\n	para pugi farki herdha,&lt;br /&gt;\r\n	timi sanga aankha judhai,&lt;br /&gt;\r\n	mutu bhitra raanko baldha (x2)&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Kahile ta naamai bhunle,&lt;br /&gt;\r\n	aafu jaaney thamai bhuley,&lt;br /&gt;\r\n	timi lai pachhayi hinda,&lt;br /&gt;\r\n	thokiyera kati laden&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Kaile timro farkayi ma aljhen,&lt;br /&gt;\r\n	kaile aankha tarkayi ma aljhen,&lt;br /&gt;\r\n	lobhaune paaso thapeu maya ko,&lt;br /&gt;\r\n	aakhir timro zindagi ma aljhen&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Mera sapana timi tira hamphalna&lt;br /&gt;\r\n	po thale achel, aafnai dhuk-dhuki ma&lt;br /&gt;\r\n	paraye baasa khojna thale achel (x2)&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Khoji rahun jasto lagcha,&lt;br /&gt;\r\n	Veti rahun jasto lagcha,&lt;br /&gt;\r\n	timro ghar ko cheu chau,&lt;br /&gt;\r\n	basai sarum jasto lagcha&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Kahile timro hasayi ma aljhen,&lt;br /&gt;\r\n	Kahile kura garayi ma aljhen,&lt;br /&gt;\r\n	Lobhaune paaso thapeu maya ko,&lt;br /&gt;\r\n	aakhir timro zindagi ma aljhen&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	Kaile timro pacchyauri ma aljhen&lt;br /&gt;\r\n	Kaile timro chaubandhi ma aljhen&lt;br /&gt;\r\n	Lobhaune paaso thapeu maya ko&lt;br /&gt;\r\n	Aakhir timro zindagi ma aljhen&lt;/p&gt;', '&lt;p&gt;\r\n	This my first Music video and its a patriotic song for (Nepal).&lt;br /&gt;\r\n	Keep supporting me and Don&amp;#39;t forget to Share and Subscribe.&lt;/p&gt;', 'pop', '', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(19, 6, 6, 'F0aXiuG', 'Ke Sachai Timi', 'ihG4yObqFkNepali_Movie_Song_Homework_Ke_Sachai_Timi_Aryan_Sigdel,_Namrata_Shrestha_Latest_Movie_2016.mp3', 'https://www.youtube.com/watch?v=LQ9Tey6F3H8', '&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot;&gt;New Nepali Movie - &amp;quot;Homework&amp;quot; Ke Sachai Timi || Aryan Sigdel, Namrata Shrestha || Latest Movie 2016&lt;/span&gt;&lt;/p&gt;', '', 'pop', '', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(20, 1, 3, 'A4Ncup2', 'Syndicate (à¤¸à¤¿à¤¨à¥à¤¡à¤¿à¤•à¥‡à¤Ÿà¥à¤•à¥‹)', 'QyWl4NKdrkBipul_Chettri_Syndicate_(Single).mp3', 'https://www.youtube.com/watch?v=0bfk90rWV9U', '&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤­à¥‡à¤Ÿ à¤­à¤¯à¥‹ à¤†à¤œ à¤¹à¤¾à¤®à¥€ à¤¸à¤¿à¤¨à¥à¤¡à¤¿à¤•à¥‡à¤Ÿà¥à¤•à¥‹ à¤®à¤¾à¤ à¤¹à¤¾à¤®à¥€&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤‰à¤­à¤¿à¤à¤›à¥ à¤¤à¤¿à¤®à¥à¤°à¥‹ à¤¬à¤—à¤² à¤®à¤¾, à¤¬à¤¿à¤œà¤¿ à¤¤à¤¿à¤®à¥€ à¤®à¥‹à¤¬à¤¾à¤‡à¤² à¤®à¤¾ à¤¹à¥‡à¤°à¥‡à¤›à¥&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤–à¥‡à¤²à¥‡à¤•à¥‹ à¤¯à¥‹à¤µà¤¨,&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¨à¤¾à¤® à¤¤à¤¿à¤®à¥à¤°à¥‹ à¤¥à¤¾à¤¹à¤¾ à¤›à¥ˆà¤¨ à¤¤à¤° à¤®à¤²à¤¾à¤ˆ à¤ªà¤°à¥à¤µà¤¾à¤¹à¤¾ à¤›à¥ˆà¤¨&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¬à¥‹à¤²à¥€ à¤•à¥‡à¤¹à¥€ à¤°à¤¹à¥‡à¤›à¥Œ à¤¹à¥ˆ, à¤†à¤à¤–à¤¾à¤²à¥‡ à¤•à¥‡à¤¹à¥€ à¤­à¤¨à¤¿à¤°à¤¹à¥‡à¤›à¥Œ à¤¹à¥ˆ&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¬à¥‹à¤²à¥ à¤¤ à¤•à¥‡ à¤­à¤¨à¥‡à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¡à¤° à¤ªà¤¨à¤¿ à¤²à¤¾à¤—à¥à¤› à¤¸à¥‹à¤šà¥‡à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¤à¤¿à¤®à¥€ à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤²à¤¿à¤—à¥à¤°à¤¿, à¤® à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤•à¥à¤•à¤¿à¤® à¤¤à¤¿à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤–à¥à¤¸à¥€ à¤›à¥ à¤¹à¥ˆ à¤¤à¤¿à¤®à¥à¤°à¥ˆ à¤®à¤¾à¤ à¤­à¥à¤²à¥‡ à¤¸à¤¾à¤°à¤¾ à¤¸à¤‚à¤¸à¤¾à¤° à¤†à¤œ&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¤à¤¿à¤®à¥€ à¤ªà¤¨à¤¿ à¤® à¤¸à¤‚à¤— à¤¨à¥ˆ à¤œà¤¾à¤¨ à¤­à¤ à¤•à¤¤à¤¿ à¤°à¤®à¤¾à¤‡à¤²à¥‹&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¹à¥à¤¨à¥‡ à¤¥à¤¿à¤¯à¥‹ à¤­à¤¨à¥à¤¨à¤¤&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤•à¤¸à¥à¤¤à¥‹ à¤¯à¥‹ à¤®à¤¿à¤²à¤¨ à¤¹à¤¾à¤®à¥à¤°à¥‹, à¤¬à¥€à¤¸ à¤®à¤¿à¤¨à¥‡à¤Ÿ à¤•à¥‹ à¤¸à¤®à¥à¤¬à¤¨à¥à¤§ à¤¹à¤¾à¤®à¥à¤°à¥‹&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤ªà¤¾à¤à¤° à¤ªà¤¨à¤¿ à¤¨à¤ªà¤¾à¤ à¤œà¤¸à¥à¤¤à¥‹, à¤šà¤¿à¤¨à¥‡à¤° à¤ªà¤¨à¤¿ à¤¨ à¤šà¤¿à¤¨à¥‡ à¤œà¤¸à¥à¤¤à¥‹&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤œà¤¿à¤¨à¥à¤¦à¤—à¥€ à¤¯à¤¸à¥à¤¤à¥ˆ à¤¨à¥ˆ à¤¹à¥‹ à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤†à¤«à¥à¤¨à¥ˆ à¤¬à¤¾à¤Ÿà¥‹ à¤¤ à¤œà¤¾à¤¨à¥‚ à¤›à¤¦à¥ˆ à¤›à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¤à¤¿à¤®à¥€ à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤²à¤¿à¤—à¥à¤°à¤¿, à¤® à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤•à¥à¤•à¤¿à¤® à¤¤à¤¿à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤®à¤²à¤¾à¤ˆ à¤¨à¥ˆ à¤¹à¥‡à¤°à¥‡à¤•à¥‹ à¤à¥ˆ à¤²à¤¾à¤—à¥à¤› à¤˜à¤°à¥€ à¤˜à¤°à¤¿&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;(à¤¹à¥‡à¤°à¥‡ à¤²à¤¾à¤—à¥à¤› à¤˜à¤°à¤¿à¤˜à¤°à¤¿)&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤«à¤°à¥à¤•à¥€ à¤¹à¥‡à¤°à¥à¤›à¥ à¤® à¤ªà¤¨à¤¿ à¤†à¤¶à¤¾ à¤¸à¤°à¤¿&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;(à¤¹à¥à¤‰... à¤†à¤¶à¤¾ à¤¸à¤°à¤¿)&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤®à¤¨à¤®à¤¾ à¤¸à¥‹à¤šà¥à¤¦à¥ˆ à¤® à¤°à¤®à¤¾à¤‰à¤¦ à¤›à¥&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;(à¤®à¤¨à¤®à¤¾ à¤¸à¥‹à¤šà¥à¤¦à¥ˆ à¤® à¤°à¤®à¤¾à¤‰à¤¦ à¤›à¥)&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¤à¤¿à¤®à¥€ à¤¸à¤‚à¤—à¥ˆ à¤­à¤à¤•à¥‹ à¤•à¤²à¥à¤ªà¤¨à¤¾ à¤—à¤°à¥à¤›à¥&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;(à¤•à¤²à¥à¤ªà¤¨à¤¾ à¤—à¤°à¥à¤›à¥à¤‰...)&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤•à¤¸à¥à¤¤à¥‹ à¤§à¤°à¥à¤•à¥‡ à¤ªà¤¾à¤¨à¥€ à¤ªà¤°à¥à¤¯à¥‹, à¤­à¤¿à¤œà¥‡à¤° à¤® à¤šà¥à¤° à¤­à¤&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¤à¤¿à¤®à¥€ à¤¸à¤‚à¤—à¥ˆ à¤“à¤¤ à¤²à¤¾à¤—à¤¿ à¤†à¤«à¥à¤¨à¥‹ à¤—à¤¾à¤¡à¥€ à¤ªà¤°à¥à¤–à¤¿à¤°à¤¹à¥‡&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤­à¤¿à¤œà¥‡à¤›à¥ à¤†à¤œ à¤® à¤°à¤¹à¤° à¤²à¥‡&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¸à¤¬à¥ˆ à¤—à¤¾à¤¡à¥€ à¤šà¤¦à¥à¤¨ à¤¥à¤¾à¤²à¥à¤¯à¥‹ à¤•à¤®à¤¾à¤£à¥à¤¡à¤° à¤•à¥‹ à¤¹à¤°à¥à¤¨ à¤¸à¥à¤¨à¥€&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤•à¤²à¤¿à¤®à¥à¤ªà¥‹à¤™ à¤Ÿà¥ à¤¸à¤¿à¤²à¤¿à¤—à¥à¤°à¤¿, à¤­à¤¨ à¤¤à¤¿à¤®à¥€ à¤•à¤¸à¥à¤¤à¥‹ à¤¨à¤¿à¤¸à¥à¤ à¥à¤°à¥€&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤šà¤¡à¥‡à¤° à¤—à¤¯à¥‹ à¤•à¤¤à¤¾ à¤¤à¤¿à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤›à¤¾à¤¡à¥€ à¤°à¤¾à¤–à¥à¤¯à¥Œ à¤®à¤²à¤¾à¤ˆ à¤¯à¤¤à¥ˆ à¤¤à¤¿à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¤à¤¿à¤®à¥€ à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤²à¤¿à¤—à¥à¤°à¤¿, à¤® à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤•à¥à¤•à¤¿à¤® à¤¤à¤¿à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¤à¤¿à¤®à¥€ à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤²à¤¿à¤—à¥à¤°à¤¿, à¤® à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤•à¥à¤•à¤¿à¤® à¤¤à¤¿à¤°&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;box-sizing: border-box; color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 14px;&quot;&gt;à¤¤à¤¿à¤®à¥€ à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤²à¤¿à¤—à¥à¤°à¤¿, à¤® à¤œà¤¾à¤¨à¥‡ à¤¸à¤¿à¤•à¥à¤•à¤¿à¤® à¤¤à¤¿à¤°&lt;/span&gt;&lt;/p&gt;', '', 'pop', '', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(21, 6, 6, 'Y3zHcDT', 'Katy Perry - Roar (Official)', '9wRYhkMkN2Katy_Perry_Dark_Horse_(Official)_ft._Juicy_J.mp3', 'https://www.youtube.com/watch?v=0KSOMA3QBU0', '&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot;&gt;Get &amp;ldquo;Dark Horse&amp;quot; feat. Juicy J from Katy Perry&amp;rsquo;s PRISM:&amp;nbsp;&lt;/span&gt;&lt;a class=&quot;yt-uix-servicelink  &quot; data-servicelink=&quot;CDAQ6TgYACITCOLNw9r6xdECFdSaHAodvBwE-ij4HQ&quot; data-target-new-window=&quot;True&quot; data-url=&quot;http://smarturl.it/PRISM&quot; href=&quot;http://smarturl.it/PRISM&quot; rel=&quot;nofollow noopener&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(22, 122, 198); cursor: pointer; text-decoration: none; font-family: Roboto, arial, sans-serif;&quot; target=&quot;_blank&quot;&gt;http://smarturl.it/PRISM&lt;/a&gt;&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot;&gt;Do you want to play with magic? Insert yourself into the video using&amp;nbsp;&lt;/span&gt;&lt;a class=&quot;yt-uix-sessionlink  &quot; data-sessionlink=&quot;itct=CDAQ6TgYACITCOLNw9r6xdECFdSaHAodvBwE-ij4HQ&quot; data-url=&quot;/results?q=%23DarkHorseCam&quot; href=&quot;https://www.youtube.com/results?q=%23DarkHorseCam&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(22, 122, 198); cursor: pointer; text-decoration: none; font-family: Roboto, arial, sans-serif;&quot;&gt;#DarkHorseCam&lt;/a&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot;&gt;:&amp;nbsp;&lt;/span&gt;&lt;a class=&quot;yt-uix-servicelink  &quot; data-servicelink=&quot;CDAQ6TgYACITCOLNw9r6xdECFdSaHAodvBwE-ij4HQ&quot; data-target-new-window=&quot;True&quot; data-url=&quot;http://andCam.com/DarkHorse&quot; href=&quot;http://andcam.com/DarkHorse&quot; rel=&quot;nofollow noopener&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(22, 122, 198); cursor: pointer; text-decoration: none; font-family: Roboto, arial, sans-serif;&quot; target=&quot;_blank&quot;&gt;http://andCam.com/DarkHorse&lt;/a&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot;&gt;THE PRISMATIC WORLD TOUR coming to you soon:&amp;nbsp;&lt;/span&gt;&lt;a class=&quot;yt-uix-servicelink  &quot; data-servicelink=&quot;CDAQ6TgYACITCOLNw9r6xdECFdSaHAodvBwE-ij4HQ&quot; data-target-new-window=&quot;True&quot; data-url=&quot;http://www.katyperry.com/events&quot; href=&quot;http://www.katyperry.com/events&quot; rel=&quot;nofollow noopener&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(22, 122, 198); cursor: pointer; text-decoration: none; font-family: Roboto, arial, sans-serif;&quot; target=&quot;_blank&quot;&gt;http://www.katyperry.com/events&lt;/a&gt;&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot;&gt;Follow Katy Perry:&lt;/span&gt;&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;a class=&quot;yt-uix-servicelink  &quot; data-servicelink=&quot;CDAQ6TgYACITCOLNw9r6xdECFdSaHAodvBwE-ij4HQ&quot; data-target-new-window=&quot;True&quot; data-url=&quot;http://www.katyperry.com&quot; href=&quot;http://www.katyperry.com/&quot; rel=&quot;nofollow noopener&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(22, 122, 198); cursor: pointer; text-decoration: none; font-family: Roboto, arial, sans-serif;&quot; target=&quot;_blank&quot;&gt;http://www.katyperry.com&lt;/a&gt;&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;a class=&quot;yt-uix-sessionlink  &quot; data-sessionlink=&quot;itct=CDAQ6TgYACITCOLNw9r6xdECFdSaHAodvBwE-ij4HQ&quot; data-url=&quot;http://youtube.com/katyperry&quot; href=&quot;http://youtube.com/katyperry&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(22, 122, 198); cursor: pointer; text-decoration: none; font-family: Roboto, arial, sans-serif;&quot;&gt;http://youtube.com/katyperry&lt;/a&gt;&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;a class=&quot;yt-uix-servicelink  &quot; data-servicelink=&quot;CDAQ6TgYACITCOLNw9r6xdECFdSaHAodvBwE-ij4HQ&quot; data-target-new-window=&quot;True&quot; data-url=&quot;http://twitter.com/katyperry&quot; href=&quot;http://twitter.com/katyperry&quot; rel=&quot;nofollow noopener&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(22, 122, 198); cursor: pointer; text-decoration: none; font-family: Roboto, arial, sans-serif;&quot; target=&quot;_blank&quot;&gt;http://twitter.com/katyperry&lt;/a&gt;&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;a class=&quot;yt-uix-servicelink  &quot; data-servicelink=&quot;CDAQ6TgYACITCOLNw9r6xdECFdSaHAodvBwE-ij4HQ&quot; data-target-new-window=&quot;True&quot; data-url=&quot;http://facebook.com/katyperry&quot; href=&quot;http://facebook.com/katyperry&quot; rel=&quot;nofollow noopener&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(22, 122, 198); cursor: pointer; text-decoration: none; font-family: Roboto, arial, sans-serif;&quot; target=&quot;_blank&quot;&gt;http://facebook.com/katyperry&lt;/a&gt;&lt;br style=&quot;color: rgb(51, 51, 51); font-family: Roboto, arial, sans-serif; font-size: 13px;&quot; /&gt;\r\n	&lt;a class=&quot;yt-uix-servicelink  &quot; data-servicelink=&quot;CDAQ6TgYACITCOLNw9r6xdECFdSaHAodvBwE-ij4HQ&quot; data-target-new-window=&quot;True&quot; data-url=&quot;http://instagram.com/katyperry&quot; href=&quot;http://instagram.com/katyperry&quot; rel=&quot;nofollow noopener&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(22, 122, 198); cursor: pointer; text-decoration: none; font-family: Roboto, arial, sans-serif;&quot; target=&quot;_blank&quot;&gt;http://instagram.com/katyperry&lt;/a&gt;&lt;/p&gt;', '', 'pop', '', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3),
(22, 6, 6, 'VQnZxJL', 'Dherai Choti', 'mknSHeRy9sDherai_Choti.mp3', 'https://www.youtube.com/watch?v=YHt_cveIU0w', '&lt;p&gt;\r\n	&lt;span style=&quot;color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;&lt;/p&gt;', '', 'pop', '', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sponser`
--

CREATE TABLE IF NOT EXISTS `tbl_sponser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `block_name` varchar(255) NOT NULL,
  `block_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `short_description` tinytext NOT NULL,
  `description` text NOT NULL,
  `sortorder` tinyint(4) NOT NULL,
  `url_link` varchar(255) NOT NULL,
  `link_type` enum('internal','external') NOT NULL DEFAULT 'internal',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_sponser`
--

INSERT INTO `tbl_sponser` (`id`, `slug`, `block_name`, `block_title`, `image`, `position`, `short_description`, `description`, `sortorder`, `url_link`, `link_type`, `status`) VALUES
(4, '', 'Kutumba', '', '2S28ToMhJOkutumba1.JPG', 'left', 'Test', 'Test', 1, '', 'internal', 1),
(5, 'test', 'Sponsor 2', 'Test', 'HkKZQE3WDY12038153_851819664934066_3823823140504488545_n.jpg', 'left', 'Test', '', 2, '', 'internal', 1),
(6, 'test', 'Sponsor 3', 'Test', 'fvDYyMHuDE15350521_1173294839453212_546078630927190211_n.jpg', 'left', '', '', 3, '', 'internal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_static`
--

CREATE TABLE IF NOT EXISTS `tbl_static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagename` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pagetitle` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pagedescription` blob NOT NULL,
  `metasubject` text CHARACTER SET utf8 NOT NULL,
  `metakeyword` text CHARACTER SET utf8 NOT NULL,
  `metadesc` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_static_link`
--

CREATE TABLE IF NOT EXISTS `tbl_static_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_link` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_name_de` varchar(255) NOT NULL,
  `meta_keywords` tinytext NOT NULL,
  `meta_desc` tinytext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_static_link`
--

INSERT INTO `tbl_static_link` (`id`, `url_link`, `menu_name`, `menu_name_de`, `meta_keywords`, `meta_desc`, `status`) VALUES
(1, 'home', 'Home', 'Home', '', '', 1),
(2, 'gallery', 'Gallery', 'Gallery', 'Gallery, Rooms, Restaurant', 'Gallery, Rooms, Restaurant', 1),
(3, 'destination', 'Destination', 'Destination', '', '', 0),
(4, 'news', 'News', 'News', '', '', 1),
(5, 'contact', 'Contact Us', 'Contact Us', 'Contact Us', 'Contact Us', 1),
(6, 'festival', 'Festival', 'Festival', '', '', 0),
(7, 'packages', 'Packages', 'Packages', 'Tour and Travel Packages', 'Tour and Travel Packages', 0),
(8, 'special', 'Special', 'Special', '', '', 0),
(9, 'booking', 'Reservation', 'Reservation', '', '', 0),
(10, 'hotel', 'Hotels and Resort', 'Hotels and Resort', '', '', 0),
(11, 'testimonials', 'Testimonials', 'Testimonials', 'Testimonials', 'Testimonials', 1),
(12, 'sitemap', 'Sitemap', 'Sitemap', 'Sitemap', 'Sitemap', 0),
(13, 'inquiry', 'Ask a Question', 'Ask a Question', 'Enquiry,Ask a Question', 'Enquiry,Ask a Question', 1),
(14, 'items', 'Food Menu', 'Food Menu', 'Food Menu', 'Food Menu', 0),
(15, 'book_a_table', 'Book a table', 'Book a table', 'Book a table', 'Book a table', 0),
(16, 'register', 'Register', 'Register', '', '', 0),
(17, 'training-center', 'Training Center', 'Training Center', '', '', 0),
(18, 'courses', 'Courses', 'Courses', '', '', 0),
(19, 'article', 'Topics', 'Topics', 'Topics', 'Topics', 1),
(20, 'events', 'Events', '', 'Events', 'Events', 1),
(21, 'download', 'Download', 'Download', 'Download', 'Download', 1),
(22, 'login', 'Login', 'Login', 'Login', 'Login', 0),
(23, 'get_a_quote', 'Get a Quote', 'Get a Quote', 'Get a Quote', 'Get a Quote', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `group_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `designation` varchar(50) NOT NULL,
  `make_login` varchar(255) NOT NULL DEFAULT '1',
  `branch_id` int(11) NOT NULL,
  `access_code` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `username`, `password`, `group_type`, `designation`, `make_login`, `branch_id`, `access_code`, `status`) VALUES
(1, 'Administrator ', 'info@cmsicons.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_history`
--

CREATE TABLE IF NOT EXISTS `tbl_user_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `group_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `designation` varchar(50) NOT NULL,
  `make_login` varchar(255) NOT NULL DEFAULT '1',
  `status` binary(1) NOT NULL DEFAULT '0',
  `temporary_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `telephone1` varchar(255) NOT NULL,
  `telephone2` varchar(255) NOT NULL,
  `mobile1` varchar(255) NOT NULL,
  `mobile2` varchar(255) NOT NULL,
  `email1` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `file_attach` varchar(255) NOT NULL,
  `user_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tbl_user_history`
--

INSERT INTO `tbl_user_history` (`id`, `user_id`, `fullname`, `username`, `password`, `group_type`, `designation`, `make_login`, `status`, `temporary_address`, `permanent_address`, `dob`, `gender`, `district`, `zone`, `country`, `telephone1`, `telephone2`, `mobile1`, `mobile2`, `email1`, `image`, `added_date`, `modified_date`, `added_by`, `file_attach`, `user_description`) VALUES
(3, 1, 'Navraj Mainali', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '0', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2015-04-23', '', '', ''),
(4, 1, 'Navraj Mainali', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '0', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2015-04-23', '', '', ''),
(5, 1, 'Navraj Mainali', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '0', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2015-04-23', '', '', ''),
(6, 1, 'Navraj Mainali', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '0', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2015-04-23', '', '', ''),
(7, 1, 'Navraj Mainali', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '0', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2015-04-23', '', '', ''),
(8, 3, 'Basanta Shrestha', 'basanta', 'NWZmZmM2NDlmNzg2YWY0NDA0NTM4ZGRhMjFhMTcwOGQ=', '1', '', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'guest', '', '0000-00-00', '2015-04-23', '', '', ''),
(9, 1, 'Spring Travel', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2015-04-23', '', '', ''),
(10, 3, 'Basanta Shrestha', 'guest', 'NWZmZmM2NDlmNzg2YWY0NDA0NTM4ZGRhMjFhMTcwOGQ=', '1', '', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'guest', '', '0000-00-00', '2015-08-18', '', '', ''),
(11, 2, 'Naresh Suwal', 'naresh@wiseexist.com', 'N2NiNGZmYmIyNjM1MzU2NjAwYWYwMDE2NmRlY2MzNTA=', '1', '', '1', '1', 'Bhaktapur', 'Bhaktapur', '0000-00-00', 'male', '', '', '', '', '', '', '', 'naresh@wiseexist.com', '', '0000-00-00', '2013-11-17', '', '', ''),
(12, 1, 'Astrology and Vastu Services', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2015-11-13', '', '', ''),
(13, 1, 'Astrology and Vastu', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2015-11-13', '', '', ''),
(14, 3, 'Biredra Prasad Kayastha', 'birendra', 'YjdhZWUwYjI5NzI5MGQ3YjBiOTgwYmNkYTcwNzMxOGE=', '1', '', '1', '1', 'Itachhen, Bhaktapur', 'Itachhen, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9841791456', '', '00977 01 6610292', '', 'birendra', '', '0000-00-00', '2015-11-13', '', '', ''),
(15, 3, 'Damodar Dhakal', 'damodar', 'NDllOTczNmRjNDAxY2M5M2Y1OGI0N2I1ZWMyZDM2NzQ=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9808359102', '', '00977 01 9808359102', '', 'damodar', '', '0000-00-00', '2016-02-19', '', '', ''),
(16, 1, 'Nepal Assitance', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2016-02-19', '', '', ''),
(17, 1, 'Administrator', 'admin@wiseexist.com', 'N2NiNGZmYmIyNjM1MzU2NjAwYWYwMDE2NmRlY2MzNTA=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2016-02-19', '', '', ''),
(18, 1, 'Administrator ', 'admin@wiseexist.com', 'N2NiNGZmYmIyNjM1MzU2NjAwYWYwMDE2NmRlY2MzNTA=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2016-06-04', '', '', ''),
(19, 3, 'Damodar Dhakal', 'damodar', 'NDllOTczNmRjNDAxY2M5M2Y1OGI0N2I1ZWMyZDM2NzQ=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9808359102', '', '00977 01 9808359102', '', 'damodar', '', '0000-00-00', '2016-02-19', '', '', ''),
(20, 3, 'Sundar Machamashi', 'damodar', 'NDllOTczNmRjNDAxY2M5M2Y1OGI0N2I1ZWMyZDM2NzQ=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9808359102', '', '00977 01 9808359102', '', 'damodar', '', '0000-00-00', '2016-06-04', '', '', ''),
(21, 3, 'Sundar Machamashi', 'damodar', 'NDllOTczNmRjNDAxY2M5M2Y1OGI0N2I1ZWMyZDM2NzQ=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9841234567', '', '00977 01 9841234567', '', 'damodar', '', '0000-00-00', '2016-06-04', '', '', ''),
(22, 4, 'Aavee Maharjan', 'aavee@gmail.com', 'YzIwYWQ0ZDc2ZmU5Nzc1OWFhMjdhMGM5OWJmZjY3MTA=', '3', '', '', '0', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'aavee@gmail.com', '', '0000-00-00', '0000-00-00', '', '', ''),
(23, 3, 'Sundar Machamashi', 'sundar', 'NDllOTczNmRjNDAxY2M5M2Y1OGI0N2I1ZWMyZDM2NzQ=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9841234567', '', '00977 01 9841234567', '', 'sundar', '', '0000-00-00', '2016-06-04', '', '', ''),
(24, 3, 'Sundar Machamashi', 'sundar', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9841234567', '', '00977 01 9841234567', '', 'sundar', '', '0000-00-00', '2016-08-30', '', '', ''),
(25, 3, 'Sundar Machamashi', 'sundar@gmail.com', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9841234567', '', '00977 01 9841234567', '', 'sundar@gmail.com', '', '0000-00-00', '2016-08-30', '', '', ''),
(26, 4, 'Aavee Maharjan', 'aavee@gmail.com', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=', '3', '', '', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'aavee@gmail.com', '', '0000-00-00', '2016-08-30', '', '', ''),
(27, 4, 'Aavee Maharjan', 'aavee@gmail.com', 'MTc5YWQ0NWM2Y2UyY2I5N2NmMTAyOWUyMTIwNDZlODE=', '1', '', '', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'aavee@gmail.com', '', '0000-00-00', '2016-12-15', '', '', ''),
(28, 4, 'Aavee Maharjan', 'aavee@gmail.com', 'MTc5YWQ0NWM2Y2UyY2I5N2NmMTAyOWUyMTIwNDZlODE=', '1', '', '', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'aavee@gmail.com', '', '0000-00-00', '2016-12-15', '', '', ''),
(29, 2, 'Naresh Suwal', 'naresh@wiseexist.com', 'N2NiNGZmYmIyNjM1MzU2NjAwYWYwMDE2NmRlY2MzNTA=', '1', '', '1', '1', 'Bhaktapur', 'Bhaktapur', '0000-00-00', 'male', '', '', '', '', '', '', '', 'naresh@wiseexist.com', '', '0000-00-00', '2015-11-13', '', '', ''),
(30, 4, 'Aavee Maharjan', 'aavee@gmail.com', 'YjZjYzYxMjJlM2EyYTAzZDliZDcwMTM2ZDA3Y2JjZTY=', '1', '', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'aavee@gmail.com', '', '0000-00-00', '2016-12-18', '', '', ''),
(31, 3, 'Sundar Machamashi', 'sundar@gmail.com', 'MTc5YWQ0NWM2Y2UyY2I5N2NmMTAyOWUyMTIwNDZlODE=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9841234567', '', '00977 01 9841234567', '', 'sundar@gmail.com', '', '0000-00-00', '2016-11-15', '', '', ''),
(32, 3, 'Sundar Machamashi', 'sundar@gmail.com', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9841234567', '', '00977 01 9841234567', '', 'sundar@gmail.com', '', '0000-00-00', '2016-12-19', '', '', ''),
(33, 3, 'Sundar Machamashi', 'sundar.machamasi@itonics.de', 'NmY4Mjg0OTE2ODVhNjRhYjgwOTc0MGYwMTVhY2RjYTM=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9841234567', '', '00977 01 9841234567', '', 'sundar.machamasi@itonics.de', '', '0000-00-00', '2016-12-19', '', '', ''),
(34, 3, 'Sundar Machamashi', 'sundar.machamasi@itonics.de', 'NmY4Mjg0OTE2ODVhNjRhYjgwOTc0MGYwMTVhY2RjYTM=', '1', '', '1', '1', 'Gathaghar, Bhaktapur', 'Gathaghar, Bhaktapur', '0000-00-00', 'male', '', '', '', '00977 9841234567', '', '00977 01 9841234567', '', 'sundar.machamasi@itonics.de', '', '0000-00-00', '2016-12-19', '', '', ''),
(35, 4, 'Aavee Maharjan', 'aavee@gmail.com', 'ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=', '1', '', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'aavee@gmail.com', '', '0000-00-00', '2016-12-19', '', '', ''),
(36, 2, '', '', '', '1', '', '', '\0', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', ''),
(37, 5, 'Arun Munikar', 'arun@lyricsnepal.com', 'ODIxOWI5ZDNlNDNhZGM1NWExZmQyNWFmYmJhNWNlZGM=', '1', '', '', '1', 'Libali', 'Golimadi', '0000-00-00', 'male', '', '', '', '', '', '9841042363', '', 'unimaxmacha@gmail.com', '', '0000-00-00', '0000-00-00', '', '', ''),
(38, 6, 'Arun Arun Munikar', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', '', '', '1', 'test', 'test', '0000-00-00', 'male', '', '', '', '1234', '', '34234', '', 'unimaxmacha@gmail.com', '', '0000-00-00', '0000-00-00', '', '', ''),
(39, 1, 'Administrator ', 'admin@wiseexist.com', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2016-06-04', '', '', ''),
(40, 1, 'Administrator ', 'admin@wiseexist.com', 'ZmMyZWUwOGU3ZmI4ODAzZDljNjgzOGJmMzI3OTA5YTY=', '1', 'Super Admin', '1', '1', '', '', '0000-00-00', 'male', '', '', '', '', '', '', '', 'admin@wiseexist.com', '', '0000-00-00', '2017-01-31', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE IF NOT EXISTS `tbl_user_info` (
  `user_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `temporary_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `permanent_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `district` varchar(255) CHARACTER SET utf8 NOT NULL,
  `zone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `zip` varchar(10) NOT NULL,
  `country` smallint(3) NOT NULL,
  `telephone1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email1` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `file_attach` varchar(255) NOT NULL,
  `user_description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`user_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`user_info_id`, `user_id`, `temporary_address`, `permanent_address`, `dob`, `gender`, `district`, `zone`, `zip`, `country`, `telephone1`, `mobile1`, `email1`, `image`, `added_date`, `modified_date`, `added_by`, `file_attach`, `user_description`) VALUES
(1, 1, '', '', '0000-00-00', 'male', '', '', '', 0, '', '', 'info@cmsicons.com', '', '2015-04-16', '2017-01-31', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_logininfo`
--

CREATE TABLE IF NOT EXISTS `tbl_user_logininfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(255) NOT NULL,
  `info_id` int(11) NOT NULL,
  `date_of_last_logon` datetime NOT NULL,
  `number_of_logon` int(11) NOT NULL,
  `account_created` datetime NOT NULL,
  `account_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_user_logininfo`
--

INSERT INTO `tbl_user_logininfo` (`id`, `tablename`, `info_id`, `date_of_last_logon`, `number_of_logon`, `account_created`, `account_modified`) VALUES
(1, 'tbl_user', 1, '2015-05-24 08:45:58', 366, '2010-12-06 12:43:53', '2015-04-23 06:57:04'),
(2, 'tbl_user', 2, '2015-08-05 06:16:18', 12, '2013-09-24 09:14:40', '2013-11-17 09:38:14'),
(3, 'tbl_user', 3, '2014-08-31 09:39:41', 39, '2013-11-17 11:16:53', '2015-04-23 06:20:27'),
(4, 'tbl_user', 4, '0000-00-00 00:00:00', 0, '2016-08-30 06:32:46', '2017-01-31 07:18:18'),
(5, 'tbl_user', 5, '0000-00-00 00:00:00', 0, '2016-12-19 11:38:14', '2017-01-16 11:43:30'),
(6, 'tbl_user', 6, '0000-00-00 00:00:00', 0, '2017-01-16 11:54:19', '0000-00-00 00:00:00'),
(7, 'tbl_user', 5, '0000-00-00 00:00:00', 0, '2017-01-31 07:17:34', '0000-00-00 00:00:00'),
(8, 'tbl_user', 6, '0000-00-00 00:00:00', 0, '2017-01-31 07:20:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacancy`
--

CREATE TABLE IF NOT EXISTS `tbl_vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vacancy_type_id` int(11) NOT NULL,
  `vacancy_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vacancy_number` int(11) NOT NULL,
  `vacancy_description` text CHARACTER SET utf8 NOT NULL,
  `started_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `added_by` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacancy_applies`
--

CREATE TABLE IF NOT EXISTS `tbl_vacancy_applies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vacancy_id` int(11) NOT NULL,
  `vacancy_type_id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `attachment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `added_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacancy_type`
--

CREATE TABLE IF NOT EXISTS `tbl_vacancy_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vacancy_type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vacancy_type_description` text CHARACTER SET utf8 NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `added_by` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `show_in_home` tinyint(4) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_videos`
--

INSERT INTO `tbl_videos` (`id`, `title`, `url`, `show_in_home`, `featured`, `status`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 'Sanam Re', 'https://www.youtube.com/watch?v=DS-raAyMxl4', 1, 1, 1, '2016-06-04 20:50:29', 0, '0000-00-00 00:00:00', 0),
(2, 'Timi le Bato Feryo', 'https://www.youtube.com/watch?v=IpQvYLnQywk', 0, 1, 1, '2016-06-05 09:49:08', 0, '0000-00-00 00:00:00', 0),
(3, 'Timi le Bato Feryo Younger', 'https://www.youtube.com/watch?v=76gR-F3Hm8I', 0, 1, 1, '2016-06-05 09:50:03', 0, '0000-00-00 00:00:00', 0),
(4, 'Haanikaarak Bapu', 'https://www.youtube.com/watch?v=6RB89BOxaYY', 1, 1, 1, '2016-11-15 10:46:05', 0, '0000-00-00 00:00:00', 0),
(5, 'Mitho Yaad', 'https://www.youtube.com/watch?v=Dkab4meC7mA', 1, 1, 1, '2016-11-15 10:46:52', 0, '0000-00-00 00:00:00', 0),
(6, 'ETHOS - Sparsha Ft.', 'https://www.youtube.com/watch?v=i4mfhnPMkic', 1, 1, 1, '2016-11-18 10:10:29', 0, '0000-00-00 00:00:00', 0),
(7, 'Sani - Prem Sen Ft', 'https://www.youtube.com/watch?v=a_cNkhbDddM', 1, 1, 1, '2016-11-18 10:12:03', 0, '0000-00-00 00:00:00', 0),
(8, 'MAAJHI ', 'https://www.youtube.com/watch?v=FnODi-HF2iI', 1, 1, 1, '2016-11-18 10:14:01', 0, '0000-00-00 00:00:00', 0),
(9, 'CHHAKKA PANJA', 'https://www.youtube.com/watch?v=lOQD1ozc-70', 1, 1, 1, '2016-11-18 10:21:41', 0, '0000-00-00 00:00:00', 0),
(10, 'Dharai Choti', 'https://www.youtube.com/watch?time_continue=3&v=YHt_cveIU0w', 1, 1, 1, '2017-01-25 16:37:15', 0, '0000-00-00 00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
