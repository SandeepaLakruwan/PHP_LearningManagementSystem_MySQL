-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.31 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for online_lms
CREATE DATABASE IF NOT EXISTS `online_lms` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `online_lms`;

-- Dumping structure for table online_lms.assignment
CREATE TABLE IF NOT EXISTS `assignment` (
  `id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `assignment_location` varchar(45) NOT NULL,
  `grade_has_subject_grade_id` int NOT NULL,
  `grade_has_subject_subject_id` int NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `user_username` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assignments_grade_has_subject1_idx` (`grade_has_subject_grade_id`,`grade_has_subject_subject_id`),
  KEY `fk_assignment_user1_idx` (`user_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.assignment: ~6 rows (approximately)
INSERT INTO `assignment` (`id`, `name`, `assignment_location`, `grade_has_subject_grade_id`, `grade_has_subject_subject_id`, `from`, `to`, `user_username`) VALUES
	('2023-1-1-AS-1', 'Maths Question-1', 'Assignments/2023-1-1-AS-1.pdf', 1, 1, '2023-08-15', '2023-08-18', 'hashan@gmail.com'),
	('2023-1-1-AS-2', 'Maths-2', 'Assignments/2023-1-1-AS-2.pdf', 1, 1, '2023-08-23', '2023-08-30', 'hashan@gmail.com'),
	('2023-1-1-AS-3', 'Maths-3', 'Assignments/2023-1-1-AS-3.pdf', 1, 1, '2023-08-17', '2023-08-24', 'hashan@gmail.com'),
	('2023-1-1-AS-4', 'Maths 4', 'Assignments/2023-1-1-AS-4.pdf', 1, 1, '2023-08-17', '2023-08-28', 'hashan@gmail.com'),
	('2023-2-1-AS-1', 'Maths g7 a1', 'Assignments/2023-2-1-AS-1.pdf', 2, 1, '2023-08-19', '2023-08-29', 'hashan@gmail.com'),
	('2023-2-2-AS-1', 'Science-1', 'Assignments/2023-2-2-AS-1.pdf', 2, 2, '2023-08-23', '2023-08-30', 'saduni@gmail.com'),
	('2024-1-1-AS-1', 'Maths AS1', 'Assignments/2024-1-1-AS-1.pdf', 1, 1, '2024-12-01', '2024-12-21', 'hashan@gmail.com'),
	('2024-1-1-AS-2', 'Maths ASS 2', 'Assignments/2024-1-1-AS-2.pdf', 1, 1, '2024-12-08', '2024-12-22', 'hashan@gmail.com'),
	('2024-2-1-AS-1', 'Maths ASS1', 'Assignments/2024-2-1-AS-1.pdf', 2, 1, '2024-12-01', '2024-12-15', 'hashan@gmail.com'),
	('2024-3-1-AS-1', 'Maths ASS 1', 'Assignments/2024-3-1-AS-1.pdf', 3, 1, '2024-12-01', '2024-12-15', 'hashan@gmail.com');

-- Dumping structure for table online_lms.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.city: ~2 rows (approximately)
INSERT INTO `city` (`id`, `name`) VALUES
	(1, 'Kurunegala'),
	(2, 'Gampaha'),
	(3, 'Colombo');

-- Dumping structure for table online_lms.complete_status
CREATE TABLE IF NOT EXISTS `complete_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.complete_status: ~2 rows (approximately)
INSERT INTO `complete_status` (`id`, `name`) VALUES
	(1, 'Complete'),
	(2, 'Pending'),
	(3, 'Teacher');

-- Dumping structure for table online_lms.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.gender: ~2 rows (approximately)
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'Male'),
	(2, 'Female');

-- Dumping structure for table online_lms.generated_code
CREATE TABLE IF NOT EXISTS `generated_code` (
  `code` varchar(45) NOT NULL DEFAULT '',
  `user_username` varchar(45) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_generated_code_user1_idx` (`user_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.generated_code: ~0 rows (approximately)
INSERT INTO `generated_code` (`code`, `user_username`) VALUES
	('J3IMSY', 'sakuni@gmail.com');

-- Dumping structure for table online_lms.grade
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.grade: ~8 rows (approximately)
INSERT INTO `grade` (`id`, `name`) VALUES
	(1, '6'),
	(2, '7'),
	(3, '8'),
	(4, '9'),
	(5, '10'),
	(6, '11'),
	(7, '12'),
	(8, '13');

-- Dumping structure for table online_lms.grade_has_subject
CREATE TABLE IF NOT EXISTS `grade_has_subject` (
  `grade_id` int NOT NULL,
  `subject_id` int NOT NULL,
  PRIMARY KEY (`grade_id`,`subject_id`),
  KEY `fk_grade_has_subject_subject1_idx` (`subject_id`),
  KEY `fk_grade_has_subject_grade1_idx` (`grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.grade_has_subject: ~5 rows (approximately)
INSERT INTO `grade_has_subject` (`grade_id`, `subject_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(5, 1),
	(1, 2),
	(2, 2),
	(1, 3),
	(1, 7);

-- Dumping structure for table online_lms.guardian
CREATE TABLE IF NOT EXISTS `guardian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `nic` varchar(45) DEFAULT NULL,
  `user_username` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_guardian_user1_idx` (`user_username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.guardian: ~0 rows (approximately)
INSERT INTO `guardian` (`id`, `first_name`, `last_name`, `mobile`, `nic`, `user_username`) VALUES
	(1, 'Kamal', 'Herath', '0781112223', '198912322123', 'sandi123');

-- Dumping structure for table online_lms.mark_status
CREATE TABLE IF NOT EXISTS `mark_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.mark_status: ~4 rows (approximately)
INSERT INTO `mark_status` (`id`, `name`) VALUES
	(1, 'Not Submit'),
	(2, 'Submited'),
	(3, 'Marking Assigned'),
	(4, 'Marks Released');

-- Dumping structure for table online_lms.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `note_location` varchar(45) NOT NULL,
  `grade_has_subject_grade_id` int NOT NULL,
  `grade_has_subject_subject_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notes_grade_has_subject1_idx` (`grade_has_subject_grade_id`,`grade_has_subject_subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.notes: ~1 rows (approximately)
INSERT INTO `notes` (`id`, `name`, `note_location`, `grade_has_subject_grade_id`, `grade_has_subject_subject_id`) VALUES
	('2023-1-1-NOTE-1', 'Maths Lesson 1', 'Notes/2023-1-1-NOTE-1.pdf', 1, 1),
	('2024-2-1-NOTE-1', 'Maths lesson 1 G7', 'Notes/2024-2-1-NOTE-1.pdf', 2, 1);

-- Dumping structure for table online_lms.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_has_grade_user_username` varchar(45) NOT NULL,
  `user_has_grade_grade_id` int NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_user_has_grade1_idx` (`user_has_grade_user_username`,`user_has_grade_grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.payment: ~3 rows (approximately)
INSERT INTO `payment` (`id`, `user_has_grade_user_username`, `user_has_grade_grade_id`, `date_time`) VALUES
	(2, 'kaushalyafernando172@gmail.com', 1, '2023-08-20 13:42:03'),
	(4, 'subhashanieherath@gmail.com', 1, '2023-08-21 11:44:21'),
	(5, 'sahan@gmail.com', 2, '2023-09-28 19:11:55');

-- Dumping structure for table online_lms.request
CREATE TABLE IF NOT EXISTS `request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address_1` varchar(45) NOT NULL,
  `address_2` varchar(45) NOT NULL,
  `city_id` int NOT NULL,
  `user_type_id` int NOT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_request_user_type1_idx` (`user_type_id`),
  KEY `fk_request_city1_idx` (`city_id`),
  KEY `fk_request_gender1_idx` (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.request: ~1 rows (approximately)
INSERT INTO `request` (`id`, `first_name`, `last_name`, `mobile`, `email`, `address_1`, `address_2`, `city_id`, `user_type_id`, `gender_id`) VALUES
	(20, 'Ruwan', 'Bandara', '0701212123', 'ruwan@gmail.com', 'No.1', 'Main Street', 2, 4, 1);

-- Dumping structure for table online_lms.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.status: ~2 rows (approximately)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Verified'),
	(2, 'Undefined'),
	(3, 'Disable');

-- Dumping structure for table online_lms.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.subject: ~20 rows (approximately)
INSERT INTO `subject` (`id`, `name`) VALUES
	(1, 'Mathematics'),
	(2, 'Science'),
	(3, 'Sinhala'),
	(4, 'English'),
	(5, 'Buddhist'),
	(6, 'History'),
	(7, 'Commerce'),
	(8, 'Tamil'),
	(9, 'Dancing'),
	(10, 'Music'),
	(11, 'Drama'),
	(12, 'Health Science'),
	(13, 'Art'),
	(14, 'Combined Maths'),
	(15, 'Physics'),
	(16, 'Chemistry'),
	(17, 'Biology'),
	(18, 'Bussiness Study'),
	(19, 'SFT'),
	(20, 'ET');

-- Dumping structure for table online_lms.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address_1` varchar(45) NOT NULL,
  `address_2` varchar(45) NOT NULL,
  `city_id` int NOT NULL,
  `password` varchar(45) NOT NULL,
  `user_type_id` int NOT NULL,
  `status_id` int NOT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`username`),
  KEY `fk_user_city_idx` (`city_id`),
  KEY `fk_user_user_type1_idx` (`user_type_id`),
  KEY `fk_user_status1_idx` (`status_id`),
  KEY `fk_user_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_user_user_type1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.user: ~9 rows (approximately)
INSERT INTO `user` (`username`, `first_name`, `last_name`, `mobile`, `email`, `address_1`, `address_2`, `city_id`, `password`, `user_type_id`, `status_id`, `gender_id`) VALUES
	('admin', 'Sandeepa', 'Lakruwan', '0771234567', 'sandi@gmail.com', 'Meenewa', 'Ilukhena', 1, 'admin', 1, 1, 1),
	('hashan@gmail.com', 'Hashan', 'Bandara', '0751112223', 'hashan@gmail.com', 'No.2', 'Plane Road', 2, '1692118346102', 2, 1, 1),
	('kaushalyafernando172@gmail.com', 'Kinira', 'Fernando', '0771234567', 'kaushalyafernando172@gmail.com', 'No 3', 'Dandagamuwa', 1, '1692476562220', 3, 1, 1),
	('saduni@gmail.com', 'Saduni', 'Pitigala', '0781231234', 'saduni@gmail.com', 'Pitiyaya', 'Tharana', 1, '1692118621987', 4, 1, 2),
	('sahan@gmail.com', 'Sahan', 'Perera', '0771112223', 'sahan@gmail.com', 'No.4', 'Street Road', 3, '1692117549212', 3, 1, 1),
	('sakuni@gmail.com', 'Sakuni', 'Madu', '0761121123', 'sakuni@gmail.com', 'No 8', 'Main Road', 1, '1733038198970', 3, 1, 2),
	('saman@gmail.com', 'Saman', 'Dasun', '0771212121', 'saman@gmail.com', 'No 6', 'Kadana', 3, '1692388188920', 3, 1, 1),
	('sandeepaherath2001@gmail.com', 'Samal', 'Herath', '0774567878', 'sandeepaherath2001@gmail.com', 'Sadana', 'Kota', 2, '1692475774426', 4, 1, 1),
	('subhashanieherath@gmail.com', 'Rajitha', 'Herath', '0712567890', 'subhashanieherath@gmail.com', 'Meenewa', 'Ilukhena', 1, '1692540684096', 3, 1, 2);

-- Dumping structure for table online_lms.user_has_grade
CREATE TABLE IF NOT EXISTS `user_has_grade` (
  `user_username` varchar(45) NOT NULL,
  `grade_id` int NOT NULL,
  `expire_date` date DEFAULT NULL,
  PRIMARY KEY (`user_username`,`grade_id`),
  KEY `fk_user_has_grade_grade1_idx` (`grade_id`),
  KEY `fk_user_has_grade_user1_idx` (`user_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.user_has_grade: ~5 rows (approximately)
INSERT INTO `user_has_grade` (`user_username`, `grade_id`, `expire_date`) VALUES
	('hashan@gmail.com', 1, '2023-08-18'),
	('kaushalyafernando172@gmail.com', 1, '2023-09-20'),
	('saduni@gmail.com', 1, '2024-12-01'),
	('sahan@gmail.com', 2, '2023-09-19'),
	('sakuni@gmail.com', 1, '2025-01-01'),
	('sandeepaherath2001@gmail.com', 2, '2024-12-01'),
	('subhashanieherath@gmail.com', 1, '2023-08-20');

-- Dumping structure for table online_lms.user_has_grade_has_subject
CREATE TABLE IF NOT EXISTS `user_has_grade_has_subject` (
  `user_username` varchar(45) NOT NULL,
  `grade_has_subject_grade_id` int NOT NULL,
  `grade_has_subject_subject_id` int NOT NULL,
  `complete_status_id` int NOT NULL,
  PRIMARY KEY (`user_username`,`grade_has_subject_grade_id`,`grade_has_subject_subject_id`),
  KEY `fk_user_has_grade_has_subject_grade_has_subject1_idx` (`grade_has_subject_grade_id`,`grade_has_subject_subject_id`),
  KEY `fk_user_has_grade_has_subject_user1_idx` (`user_username`),
  KEY `fk_user_has_grade_has_subject_complete_status1_idx` (`complete_status_id`),
  CONSTRAINT `fk_user_has_grade_has_subject_user1` FOREIGN KEY (`user_username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.user_has_grade_has_subject: ~8 rows (approximately)
INSERT INTO `user_has_grade_has_subject` (`user_username`, `grade_has_subject_grade_id`, `grade_has_subject_subject_id`, `complete_status_id`) VALUES
	('sahan@gmail.com', 1, 1, 1),
	('sahan@gmail.com', 2, 1, 2),
	('sahan@gmail.com', 2, 2, 2),
	('subhashanieherath@gmail.com', 1, 1, 2),
	('hashan@gmail.com', 1, 1, 3),
	('hashan@gmail.com', 1, 2, 3),
	('hashan@gmail.com', 1, 3, 3),
	('hashan@gmail.com', 1, 7, 3),
	('hashan@gmail.com', 2, 1, 3),
	('hashan@gmail.com', 3, 1, 3),
	('hashan@gmail.com', 5, 1, 3);

-- Dumping structure for table online_lms.user_has_release_assignment
CREATE TABLE IF NOT EXISTS `user_has_release_assignment` (
  `id` varchar(45) NOT NULL,
  `user_username` varchar(45) NOT NULL,
  `assignment_id` varchar(45) NOT NULL,
  `answer_location` varchar(45) NOT NULL,
  `date_time` datetime NOT NULL,
  `marks` int NOT NULL,
  `mark_status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_release_assignment_user1_idx` (`user_username`),
  KEY `fk_user_has_release_assignment_mark_status1_idx` (`mark_status_id`),
  KEY `fk_user_has_release_assignment_assignment1_idx` (`assignment_id`),
  CONSTRAINT `fk_user_has_release_assignment_user1` FOREIGN KEY (`user_username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.user_has_release_assignment: ~5 rows (approximately)
INSERT INTO `user_has_release_assignment` (`id`, `user_username`, `assignment_id`, `answer_location`, `date_time`, `marks`, `mark_status_id`) VALUES
	('sahan@gmail.com-2023-1-1-AS-1', 'sahan@gmail.com', '2023-1-1-AS-1', 'Answers/sahan@gmail.com-2023-1-1-AS-1.pdf', '2023-08-18 10:36:36', 70, 4),
	('sahan@gmail.com-2023-1-1-AS-2', 'sahan@gmail.com', '2023-1-1-AS-2', 'null', '2023-08-17 18:03:49', 0, 4),
	('sahan@gmail.com-2023-1-1-AS-3', 'sahan@gmail.com', '2023-1-1-AS-3', 'Answers/sahan@gmail.com-2023-1-1-AS-3.pdf', '2023-08-18 10:33:44', 70, 3),
	('sahan@gmail.com-2023-1-1-AS-4', 'sahan@gmail.com', '2023-1-1-AS-4', 'Answers/sahan@gmail.com-2023-1-1-AS-4.pdf', '2023-08-17 16:18:10', 0, 2),
	('sahan@gmail.com-2023-2-1-AS-1', 'sahan@gmail.com', '2023-2-1-AS-1', 'null', '2023-08-20 16:37:32', 0, 1),
	('sahan@gmail.com-2024-2-1-AS-1', 'sahan@gmail.com', '2024-2-1-AS-1', 'null', '2024-12-01 08:25:31', 0, 1),
	('subhashanieherath@gmail.com-2024-1-1-AS-1', 'subhashanieherath@gmail.com', '2024-1-1-AS-1', 'null', '2024-12-01 08:25:01', 0, 1),
	('subhashanieherath@gmail.com-2024-1-1-AS-2', 'subhashanieherath@gmail.com', '2024-1-1-AS-2', 'null', '2024-12-01 08:27:30', 0, 1);

-- Dumping structure for table online_lms.user_type
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table online_lms.user_type: ~4 rows (approximately)
INSERT INTO `user_type` (`id`, `name`) VALUES
	(1, 'Admin'),
	(2, 'Teacher'),
	(3, 'Student'),
	(4, 'Accademic Officer');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
