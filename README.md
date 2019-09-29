-- Create database -- 

CREATE DATABASE [IF NOT EXISTS] webinse;

---------------------------------------------

-- Table structure for table `tbl_webinse` --

 CREATE TABLE IF NOT EXISTS `tbl_webinse` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `first_name` varchar(50) NOT NULL,  
  `second_name` varchar(50) NOT NULL,  
  `email` varchar(50) NOT NULL,  
  PRIMARY KEY (`id`)  
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

----------------------------------------------
 
 -- Dumping data for table `tbl_webinse` --

 INSERT INTO `tbl_webinse` (`first_name`, `second_name`, `email`) VALUES
 ('Nikolas', 'Kokhno', 'nikolaskokhno@gmail.com'),
 ('Oleg', 'Radin', 'radinOleg@gmail.com'),
 ('Ivdokey', 'Lans', 'IvdikeyLans@gmail.com');

 -----------------------------------------------