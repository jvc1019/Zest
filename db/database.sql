--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(3) ZEROFILL NOT NULL AUTO_INCREMENT, -- supports up to 999 users
  `user_Name` varchar(30) NOT NULL,
  `user_Password` varchar(100) NOT NULL, -- before placed here, the string is hashed via MD5
  `user_Theme` varchar(50) NOT NULL DEFAULT "default", -- stores the theme name of the user
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_Name` (`user_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_ID` int(4) ZEROFILL NOT NULL AUTO_INCREMENT, -- supports up to 9999 tasks
  `task_Name` varchar(250) DEFAULT NULL,
  `task_Desc` longtext DEFAULT NULL,
  `task_Due` datetime DEFAULT NULL,
  `task_lastModified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `task_isDone` tinyint(1) NOT NULL DEFAULT 0,
  `task_Tags` text DEFAULT NULL,
  `user_ID` int ZEROFILL NOT NULL,
  PRIMARY KEY (`task_ID`),
  UNIQUE KEY `task_Name` (`task_Name`),
  FOREIGN KEY (`user_ID`) REFERENCES `user`(`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_ID` int(2) ZEROFILL NOT NULL AUTO_INCREMENT,
  `subject_Icon` varchar(1) DEFAULT NULL, -- show an emoji picker when adding or editing a subject, serves as icon
  `subject_Name` varchar(150) DEFAULT NULL,
  `subject_Type` varchar(3) NOT NULL DEFAULT "LEC", -- just add a dropdown to select a subject type adding or editing a subject
  `subject_Instructor` varchar(100) DEFAULT NULL,
  `subject_Desc` longtext DEFAULT NULL,
  `subject_Day` varchar(8) DEFAULT NULL,
  `subject_Time` time DEFAULT NULL,
  `user_ID` int ZEROFILL NOT NULL,
  PRIMARY KEY (`subject_ID`),
  UNIQUE KEY `subject_Name` (`subject_Name`),
  FOREIGN KEY (`user_ID`) REFERENCES `user`(`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_ID` int(2) ZEROFILL NOT NULL AUTO_INCREMENT, -- up to 99 notes
  `note_Title` varchar(150) DEFAULT NULL,
  `note_Content` longtext DEFAULT NULL,
  `note_Tags` text DEFAULT NULL,
  `user_ID` int ZEROFILL NOT NULL,
  PRIMARY KEY (`note_ID`),
  UNIQUE KEY `note_Title` (`note_Title`),
  FOREIGN KEY (`user_ID`) REFERENCES `user`(`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;