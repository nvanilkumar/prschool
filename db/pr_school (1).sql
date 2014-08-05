-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2014 at 10:50 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pr_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `sc_attendence`
--

CREATE TABLE IF NOT EXISTS `sc_attendence` (
  `sc_att_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_att_student_id` int(20) DEFAULT NULL,
  `sc_att_month_id` int(20) DEFAULT NULL,
  `sc_att_year` varchar(50) DEFAULT NULL,
  `sc_att_attendend_days` int(20) DEFAULT NULL,
  `sc_att_created_on` datetime DEFAULT NULL,
  `sc_att_updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_fiscalyear_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sc_att_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='sc_attendence' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sc_attendence`
--

INSERT INTO `sc_attendence` (`sc_att_id`, `sc_att_student_id`, `sc_att_month_id`, `sc_att_year`, `sc_att_attendend_days`, `sc_att_created_on`, `sc_att_updated_on`, `sc_fiscalyear_id`) VALUES
(1, 2, 1, NULL, 22, '2014-07-18 15:43:23', '2014-07-18 10:13:23', 1),
(2, 2, 1, NULL, 25, '2014-07-18 15:49:35', '2014-07-18 10:19:35', 1),
(3, 2, 1, NULL, 23, '2014-07-18 17:40:31', '2014-07-18 12:10:31', 1),
(4, 2, 1, NULL, 23, '2014-07-18 17:43:33', '2014-07-18 12:13:33', 1),
(5, 2, 1, NULL, 2, '2014-07-19 09:59:49', '2014-07-19 04:29:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_class`
--

CREATE TABLE IF NOT EXISTS `sc_class` (
  `sc_cls_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_cls_name` varchar(50) DEFAULT NULL,
  `sc_cls_main_class` int(20) DEFAULT NULL COMMENT '0- main class, class id for section',
  `sc_cls_updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_sch_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sc_cls_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sc_class`
--

INSERT INTO `sc_class` (`sc_cls_id`, `sc_cls_name`, `sc_cls_main_class`, `sc_cls_updated_on`, `sc_sch_id`) VALUES
(1, 'I', 0, '2014-07-09 06:07:44', 1),
(2, 'II', 0, '2014-07-08 07:22:49', 1),
(4, 'III', 0, '2014-07-08 07:22:49', 1),
(5, 'IV', 0, '2014-07-08 07:22:49', 1),
(7, 'X', 0, '2014-07-08 07:22:49', 1),
(10, 'mak', 0, '2014-07-08 07:22:49', 1),
(11, 'mak', 0, '2014-07-08 07:22:49', 1),
(12, 'niit', 0, '2014-07-08 07:22:49', 1),
(14, 'class1', 12, '2014-07-09 14:38:44', 1),
(15, 'school', 0, '2014-07-08 07:50:49', 1),
(16, 'sc', 0, '2014-07-08 07:51:20', 2),
(17, 'Pravenn class', 0, '2014-07-12 05:59:58', 1),
(18, 'section 1', 0, '2014-07-12 06:00:19', 1),
(19, 'se2', 17, '2014-07-12 06:39:51', 1),
(20, 'computer science', 0, '2014-07-19 04:02:12', 1),
(21, 'section 1', 20, '2014-07-19 04:03:25', 1),
(22, 'section B', 20, '2014-07-19 08:37:08', 1),
(23, 'Main class', 0, '2014-07-19 08:37:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_class_exams`
--

CREATE TABLE IF NOT EXISTS `sc_class_exams` (
  `sc_class_id` int(20) DEFAULT NULL,
  `sc_exam_id` int(20) DEFAULT NULL,
  `sc_fiscalyear_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_class_exams`
--

INSERT INTO `sc_class_exams` (`sc_class_id`, `sc_exam_id`, `sc_fiscalyear_id`) VALUES
(1, 2, 1),
(2, 0, 1),
(2, 2, 1),
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_class_exam_subject`
--

CREATE TABLE IF NOT EXISTS `sc_class_exam_subject` (
  `sc_class_id` int(20) DEFAULT NULL,
  `sc_exam_id` int(20) DEFAULT NULL,
  `sc_subject_id` int(20) DEFAULT NULL,
  `sc_subj_max_marks` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='\r\n\r\n\r\n';

--
-- Dumping data for table `sc_class_exam_subject`
--

INSERT INTO `sc_class_exam_subject` (`sc_class_id`, `sc_exam_id`, `sc_subject_id`, `sc_subj_max_marks`) VALUES
(1, 2, 2, 25),
(1, 2, 3, 251),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 0, 2, 50),
(2, 0, 5, NULL),
(2, 2, 2, 50),
(2, 2, 5, NULL),
(2, 2, 2, 50),
(2, 2, 5, NULL),
(2, 2, 2, 50),
(2, 2, 5, NULL),
(2, 2, 2, 50),
(2, 2, 5, NULL),
(2, 2, 2, 50),
(2, 2, 5, NULL),
(1, 1, 2, 23),
(1, 1, 3, 25);

-- --------------------------------------------------------

--
-- Table structure for table `sc_class_students`
--

CREATE TABLE IF NOT EXISTS `sc_class_students` (
  `sc_class_id` int(11) DEFAULT NULL,
  `sc_student_id` int(11) DEFAULT NULL,
  `sc_fiscalyear_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores the student related class information\r\n';

--
-- Dumping data for table `sc_class_students`
--

INSERT INTO `sc_class_students` (`sc_class_id`, `sc_student_id`, `sc_fiscalyear_id`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_class_subjects`
--

CREATE TABLE IF NOT EXISTS `sc_class_subjects` (
  `sc_class_id` int(20) DEFAULT NULL,
  `sc_subject_id` int(20) DEFAULT NULL,
  `sc_fiscalyear_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_class_subjects`
--

INSERT INTO `sc_class_subjects` (`sc_class_id`, `sc_subject_id`, `sc_fiscalyear_id`) VALUES
(1, 2, 1),
(1, 3, 1),
(2, 5, 1),
(2, 2, 1),
(17, 1, 1),
(21, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_exam`
--

CREATE TABLE IF NOT EXISTS `sc_exam` (
  `sc_exa_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_exa_name` varchar(50) DEFAULT NULL,
  `sc_exa_descryption` text,
  `sc_exa_updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_sch_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sc_exa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sc_exam`
--

INSERT INTO `sc_exam` (`sc_exa_id`, `sc_exa_name`, `sc_exa_descryption`, `sc_exa_updated_on`, `sc_sch_id`) VALUES
(1, 'unit test', 'zoo', '2014-07-10 03:52:17', 1),
(2, 'tes', 't csfsf', '2014-07-11 08:27:15', 1),
(3, 'unit sf', 'ldsflsf', '2014-07-11 08:27:30', 1),
(4, 'unit test', 'desc', '2014-07-12 06:01:26', 1),
(5, 'computer science exam', 'computer science', '2014-07-19 04:13:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_fiscalyear`
--

CREATE TABLE IF NOT EXISTS `sc_fiscalyear` (
  `sc_fis_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_fis_start_date` date DEFAULT NULL,
  `sc_fis_end_date` date DEFAULT NULL,
  `sc_descryption` text,
  PRIMARY KEY (`sc_fis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sc_marks`
--

CREATE TABLE IF NOT EXISTS `sc_marks` (
  `sc_mak_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_mak_marks` int(20) NOT NULL DEFAULT '0',
  `sc_mak_student_id` int(20) DEFAULT NULL,
  `sc_mak_subject_id` int(20) DEFAULT NULL,
  `sc_mak_exam_id` int(20) DEFAULT NULL,
  `sc_fiscalyear_id` int(20) DEFAULT NULL,
  `sc_mar_created_on` datetime DEFAULT NULL,
  `sc_mar_updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sc_mak_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sc_marks`
--

INSERT INTO `sc_marks` (`sc_mak_id`, `sc_mak_marks`, `sc_mak_student_id`, `sc_mak_subject_id`, `sc_mak_exam_id`, `sc_fiscalyear_id`, `sc_mar_created_on`, `sc_mar_updated_on`) VALUES
(1, 24, 0, 2, 0, 1, '2014-08-04 23:16:28', '2014-08-04 17:46:28'),
(2, 26, 0, 3, 0, 1, '2014-08-04 23:16:28', '2014-08-04 17:46:28'),
(3, 25, 3, 2, 0, 1, '2014-08-04 23:18:15', '2014-08-04 17:48:15'),
(4, 67, 3, 3, 0, 1, '2014-08-04 23:18:15', '2014-08-04 17:48:15'),
(5, 78, 0, 2, 2, 1, '2014-08-04 23:22:27', '2014-08-04 17:52:27'),
(6, 79, 0, 3, 2, 1, '2014-08-04 23:22:27', '2014-08-04 17:52:27'),
(7, 98, 2, 2, 2, 1, '2014-08-04 23:23:01', '2014-08-04 17:53:01'),
(8, 99, 2, 3, 2, 1, '2014-08-04 23:23:01', '2014-08-04 17:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `sc_payment`
--

CREATE TABLE IF NOT EXISTS `sc_payment` (
  `sc_pay_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_pay_student_id` int(20) DEFAULT NULL,
  `sc_pay_description` text,
  `sc_pay_mode` varchar(50) DEFAULT NULL,
  `sc_pay_name` varchar(50) DEFAULT NULL,
  `sc_pay_date` date DEFAULT NULL,
  `sc_pay_amount` int(20) DEFAULT NULL,
  `sc_pay_created_date` datetime DEFAULT NULL,
  `sc_pay_updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_fiscalyear_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sc_pay_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sc_payment`
--

INSERT INTO `sc_payment` (`sc_pay_id`, `sc_pay_student_id`, `sc_pay_description`, `sc_pay_mode`, `sc_pay_name`, `sc_pay_date`, `sc_pay_amount`, `sc_pay_created_date`, `sc_pay_updated_date`, `sc_fiscalyear_id`) VALUES
(1, 2, 'teslfdj ', 'check', 'venki', '0000-00-00', 2999, '2014-07-31 21:34:22', '2014-07-31 16:04:22', 1),
(2, 2, 'lksdflkfds', 'cash', 'guti', '0000-00-00', 2000, '2014-07-31 21:37:42', '2014-07-31 16:07:42', 1),
(3, 2, 'sdfsf', 'cash', 'rajive', '0000-00-00', 300, '2014-07-31 21:40:15', '2014-07-31 16:10:15', 1),
(4, 2, 'lksdf', 'cas', 'venki', '0000-00-00', 444, '2014-07-31 21:42:14', '2014-07-31 16:12:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_remarks`
--

CREATE TABLE IF NOT EXISTS `sc_remarks` (
  `sc_rem_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_rem_student_id` int(20) DEFAULT NULL,
  `sc_rem_description` text,
  `sc_rem_created_date` date DEFAULT NULL,
  `sc_rem_updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_rem_created_by` varchar(50) DEFAULT NULL,
  `sc_fiscalyear_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sc_rem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sc_remarks`
--

INSERT INTO `sc_remarks` (`sc_rem_id`, `sc_rem_student_id`, `sc_rem_description`, `sc_rem_created_date`, `sc_rem_updated_date`, `sc_rem_created_by`, `sc_fiscalyear_id`) VALUES
(1, 2, '', '2014-07-18', '2014-07-18 12:27:28', 'admin', 1),
(2, 2, 'first remarks', '2014-06-03', '2014-07-24 10:50:04', 'admin', 1),
(3, 2, 'frsfs', '2014-07-01', '2014-07-24 10:49:48', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_school`
--

CREATE TABLE IF NOT EXISTS `sc_school` (
  `sc_sch_id` int(20) DEFAULT NULL,
  `sc_sch_name` varchar(200) DEFAULT NULL,
  `sc_sch_address` text,
  `sc_sch_details` text,
  `sc_sch_updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sc_student`
--

CREATE TABLE IF NOT EXISTS `sc_student` (
  `sc_stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_stu_name` varchar(50) DEFAULT NULL,
  `sc_stu_initial_name` varchar(50) DEFAULT NULL,
  `sc_stu_parent_name` varchar(50) DEFAULT NULL,
  `sc_stu_phone1` varchar(50) DEFAULT NULL,
  `sc_stu_phone2` varchar(50) DEFAULT NULL,
  `sc_stu_address` varchar(50) DEFAULT NULL,
  `sc_stu_photo_url` varchar(50) DEFAULT NULL,
  `sc_stu_status` tinyint(1) DEFAULT '1' COMMENT '[active/inactive]',
  `sc_created_date` datetime DEFAULT NULL,
  `sc_updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_blood_group` varchar(50) DEFAULT NULL,
  `sc_stu_user_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sc_stu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sc_student`
--

INSERT INTO `sc_student` (`sc_stu_id`, `sc_stu_name`, `sc_stu_initial_name`, `sc_stu_parent_name`, `sc_stu_phone1`, `sc_stu_phone2`, `sc_stu_address`, `sc_stu_photo_url`, `sc_stu_status`, `sc_created_date`, `sc_updated_date`, `sc_blood_group`, `sc_stu_user_id`) VALUES
(2, 'test user', 'm', 'kjlsf', '111', '11', '111', 'ticket_wid21.png', 1, '2014-07-11 17:53:35', '2014-07-11 13:28:17', '11', 7),
(3, 'bhaskar', 's', 'lsdf', '123456', '09876', 'test editor', 'Website_Construction.jpg', 1, '2014-07-12 11:38:08', '2014-07-12 06:08:08', 'b+', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sc_subject`
--

CREATE TABLE IF NOT EXISTS `sc_subject` (
  `sc_sub_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_sub_name` varchar(50) DEFAULT NULL,
  `sc_sub_descryption` text,
  `sc_sub_updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_sch_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sc_sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sc_subject`
--

INSERT INTO `sc_subject` (`sc_sub_id`, `sc_sub_name`, `sc_sub_descryption`, `sc_sub_updated_on`, `sc_sch_id`) VALUES
(1, 'php', 'language', '2014-07-10 03:45:04', 1),
(2, 'java', '0', '2014-07-10 02:54:12', 1),
(3, 'javascript', 'java sub', '2014-07-10 02:54:42', 1),
(4, 'javascript', 'java sub', '2014-07-10 03:12:00', 1),
(5, 'c++', 'first programe', '2014-07-10 03:15:13', 1),
(6, 'c language', 'c language', '2014-07-19 04:06:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_user`
--

CREATE TABLE IF NOT EXISTS `sc_user` (
  `sc_use_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_use_user_name` varchar(100) DEFAULT NULL,
  `sc_use_password` varchar(100) DEFAULT NULL,
  `sc_use_email` varchar(100) DEFAULT NULL,
  `sc_use_type` enum('admin','student','parent','staff','superadmin') DEFAULT NULL,
  `sc_use_updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_sch_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sc_use_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sc_user`
--

INSERT INTO `sc_user` (`sc_use_id`, `sc_use_user_name`, `sc_use_password`, `sc_use_email`, `sc_use_type`, `sc_use_updated_on`, `sc_sch_id`) VALUES
(7, 'tes', 'IzjeqK', 'a@', 'student', '2014-07-11 13:28:17', 1),
(8, 'bhaskar', 'Y4Wrnn', 'yu', 'student', '2014-07-12 06:08:08', 1),
(9, 'admin', 'admin', NULL, 'admin', '2014-08-05 02:29:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sc_working_days`
--

CREATE TABLE IF NOT EXISTS `sc_working_days` (
  `sc_wor_id` int(20) NOT NULL AUTO_INCREMENT,
  `sc_wor_month` varchar(50) DEFAULT NULL,
  `sc_wor_fis_id` int(20) DEFAULT NULL,
  `sc_wor_no_of_days` int(20) DEFAULT NULL,
  `sc_wor_updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_sch_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sc_wor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sc_working_days`
--

INSERT INTO `sc_working_days` (`sc_wor_id`, `sc_wor_month`, `sc_wor_fis_id`, `sc_wor_no_of_days`, `sc_wor_updated_on`, `sc_sch_id`) VALUES
(1, 'january', 1, 25, '2014-07-18 09:25:51', 1),
(2, 'february', 1, 20, '2014-07-18 09:25:51', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
