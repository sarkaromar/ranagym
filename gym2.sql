-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 11:03 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gym2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_fee`
--

CREATE TABLE IF NOT EXISTS `admission_fee` (
`adm_id` int(5) NOT NULL,
  `mem_id` int(5) NOT NULL,
  `adm_fee` varchar(7) NOT NULL,
  `adm_paid` varchar(7) NOT NULL,
  `adm_due` varchar(7) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admission_fee`
--

INSERT INTO `admission_fee` (`adm_id`, `mem_id`, `adm_fee`, `adm_paid`, `adm_due`, `created`, `modified`) VALUES
(1, 64, '1000', '1000', '0', '2016-11-14 08:25:53', '2016-11-14 08:25:53'),
(2, 37, '1000', '1000', '0', '2016-11-14 08:26:25', '2016-11-14 08:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `ip_black_list`
--

CREATE TABLE IF NOT EXISTS `ip_black_list` (
`id` int(3) NOT NULL,
  `IP` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ip_black_list`
--

INSERT INTO `ip_black_list` (`id`, `IP`, `date`, `reason`) VALUES
(1, '102.320.3253.', '2016-11-03 09:47:06', 'abcd'),
(2, '20.256632.', '2016-11-03 09:49:22', 'dsfdsafasdfa');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(3) NOT NULL,
  `mem_id` int(4) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gen` varchar(8) NOT NULL,
  `bld_grp` varchar(5) NOT NULL,
  `birth` varchar(10) NOT NULL,
  `area` varchar(40) NOT NULL,
  `add` text NOT NULL,
  `phn1` varchar(15) NOT NULL,
  `phn2` varchar(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `mem_id`, `first_name`, `last_name`, `gen`, `bld_grp`, `birth`, `area`, `add`, `phn1`, `phn2`, `status`, `date`) VALUES
(1, 37, 'Mostafijur', 'Rahman', 'Male', 'B +', '01/26/1994', 'Dhaka', 'Mirpur-1', '01914088503', '123456789', 1, '2016-11-14 14:24:10'),
(2, 64, 'Md Bellal', 'Hussain', 'Male', 'AB -', '04/10/1993', 'Dhaka', 'Mirpur-1', '01672552966', '', 1, '2016-11-14 14:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_fee`
--

CREATE TABLE IF NOT EXISTS `monthly_fee` (
`mon_id` int(5) NOT NULL,
  `mem_id` int(5) NOT NULL,
  `mon_fee` varchar(7) NOT NULL,
  `mon_paid` varchar(7) NOT NULL,
  `mon_due` varchar(7) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(4) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `monthly_fee`
--

INSERT INTO `monthly_fee` (`mon_id`, `mem_id`, `mon_fee`, `mon_paid`, `mon_due`, `month`, `year`, `created`, `modified`) VALUES
(1, 64, '500', '500', '0', 'November', '2016', '2016-11-14 08:25:30', '2016-11-14 08:25:30'),
(2, 37, '500', '500', '0', 'November', '2016', '2016-11-14 08:26:11', '2016-11-14 08:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(1) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_desc` varchar(100) NOT NULL,
  `site_email` varchar(100) NOT NULL,
  `adm_amount` varchar(7) NOT NULL,
  `month_amount` varchar(7) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_desc`, `site_email`, `adm_amount`, `month_amount`) VALUES
(1, 'FIT FOR LIFE GYM', 'Gym Management Application', 'contact@gym.com', '1000', '500');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(2) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `password` varchar(70) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `token` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_level` int(1) NOT NULL,
  `IP` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `username` varchar(25) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `phn1` varchar(15) CHARACTER SET utf8 NOT NULL,
  `phn2` varchar(15) NOT NULL,
  `area` varchar(40) NOT NULL,
  `add` text CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(70) CHARACTER SET utf8 NOT NULL DEFAULT 'default.png',
  `joined_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `online_timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `token`, `user_level`, `IP`, `username`, `first_name`, `last_name`, `phn1`, `phn2`, `area`, `add`, `avatar`, `joined_date`, `online_timestamp`) VALUES
(1, 'super_admin@test.com', '$2a$12$k0IYmVNOVMt5A/dBlGKCAeAnHsGHRat3A7G7hwhIqM//AAactJ3IS', 'ef984926e7290ec8898ce32319230c19', 2, '', 'mostafij_rana', 'Mostafijur Rahman', 'Rana', '01914088503', '111111', 'dhaa', 'Mirpur-1, Dhaka-1216', '1.jpg', '2016-09-27 05:30:48', '1479111963');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_fee`
--
ALTER TABLE `admission_fee`
 ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `ip_black_list`
--
ALTER TABLE `ip_black_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_fee`
--
ALTER TABLE `monthly_fee`
 ADD PRIMARY KEY (`mon_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_fee`
--
ALTER TABLE `admission_fee`
MODIFY `adm_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ip_black_list`
--
ALTER TABLE `ip_black_list`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `monthly_fee`
--
ALTER TABLE `monthly_fee`
MODIFY `mon_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
