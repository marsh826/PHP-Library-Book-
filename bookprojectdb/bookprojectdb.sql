-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2020 at 03:25 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `AuthorID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Nationality` varchar(30) NOT NULL,
  `BirthYear` int(4) UNSIGNED NOT NULL,
  `DeathYear` int(4) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`AuthorID`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`AuthorID`, `Name`, `Surname`, `Nationality`, `BirthYear`, `DeathYear`) VALUES
(1, 'Miguel', 'de Cervantes Saavedra', 'Spanish', 1547, 1616),
(2, 'Charles', 'Dickens', 'British', 1812, 1870),
(3, 'J.R.R.', 'Tolkien', 'British', 1892, 1973),
(4, 'Antoine', 'de Saint-Exupery', 'French', 1900, 1944),
(5, 'J.K.', 'Rowling', 'British', 1965, 0),
(6, 'Agatha', 'Christie', 'British', 1890, 1976),
(7, 'Cao', 'Xueqin', 'Chinese', 1715, 1763),
(8, 'Henry', 'Rider Haggard', 'British', 1856, 1925),
(9, 'C.S.', 'Lewis', 'British', 1898, 1963),
(111, 'James', 'Dashner', 'American', 1972, 0),
(112, 'Roald', 'Dahl', 'British', 1916, 1990),
(113, 'Francis', 'Fitzgerald', 'American', 1896, 1940);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `BookID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `BookTitle` varchar(255) NOT NULL,
  `OriginalTitle` varchar(255) DEFAULT NULL,
  `YearofPublication` int(4) NOT NULL DEFAULT '0',
  `Genre` varchar(30) NOT NULL,
  `MillionsSold` int(10) UNSIGNED NOT NULL,
  `LanguageWritten` varchar(30) NOT NULL,
  `CoverImagePath` varchar(255) NOT NULL,
  `AuthorID` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`BookID`),
  KEY `fk_author` (`AuthorID`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `BookTitle`, `OriginalTitle`, `YearofPublication`, `Genre`, `MillionsSold`, `LanguageWritten`, `CoverImagePath`, `AuthorID`) VALUES
(2, 'A Tale of Two Cities', 'A Tale of Two Cities', 1859, 'Historical Fiction', 200, 'English', '../Images/A Tale of Two Cities.jpg', 2),
(3, 'The Lord of the Rings', 'The Lord of the Rings', 1954, 'Fantasy/Adventure', 150, 'English', '../Images/The Lord of the Rings.jpg', 3),
(4, 'The Litle Prince', 'Le Petit Prince', 1943, 'Fable', 142, 'French', '../Images/The Little Prince.jpg', 4),
(5, 'Harry Potter and the Sorcerer\'s Stone', 'Harry Potter and the Sorcerer\'s Stone', 1997, 'Fantasy Fiction', 107, 'English', '../Images/Harry Potter and the Sorcerer\'s Stone.jpg', 5),
(6, 'And Then There Were None', 'Ten Little Niggers', 1939, 'Mystery', 100, 'English', '../Images/And Then There Were None.jpg', 6),
(7, 'The Dream of the Red Chamber', 'The Story of the Stone', 1792, 'Novel', 100, 'Chinese', '../Images/The Dream of the Red Chamber.jpg', 7),
(8, 'The Hobbit', 'There and Back Again', 1937, 'High Fantasy', 100, 'English', '../Images/The Hobbit.jpg', 3),
(9, 'She: A History of Adventure', 'She', 1886, 'FIction', 100, 'English', '../Images/She A History of Adventure.jpg', 8),
(10, 'The Lion, the Witch and the Wardrobe', 'The Lion, the Witch and the Wardrobe', 1950, 'Fantasy', 85, 'English', '../Images/The Lion, the Witch and the Wardrobe.jpg', 9),
(83, 'The Maze Runner', 'The Maze Runner', 2009, 'Science Fiction/Novel', 14, 'English', '../Images/The Maze Runner.jpg', 111),
(84, 'Matilda- Children Story', 'Matilda', 1988, 'Fantasy/Children\'s Literature', 17, 'English', '../Images/Matilda.jpg', 112),
(85, 'The Great Gatsby', 'Gatsby, Among Ash-Heaps and Millionaires, Trimalchio, Trimalchio in West Egg, On the Road to West Egg, Under the Red, White and Blue, Gold-Hatted Gatsby or The High-Bouncing Lover.', 1925, 'Tragedy', 25, 'English', '../Images/The Great Gatsby.jpg', 113),
(106, 'The Scorch Trials', 'The Scorch Trials', 2009, 'Science Fiction/Novel', 15, 'English', '../Images/defaultcover.jpg', 111);

-- --------------------------------------------------------

--
-- Table structure for table `bookplot`
--

DROP TABLE IF EXISTS `bookplot`;
CREATE TABLE IF NOT EXISTS `bookplot` (
  `BookPlotID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Plot` text,
  `PlotSource` varchar(255) NOT NULL,
  `BookID` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`BookPlotID`),
  KEY `fk_bookID_P` (`BookID`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookplot`
--

INSERT INTO `bookplot` (`BookPlotID`, `Plot`, `PlotSource`, `BookID`) VALUES
(2, 'In A Tale of Two Cities, Charles Darnay tries to escape his heritage as a French aristocrat in the years leading up to the French Revolution. On the eve of the Revolution, he\'s captured, but Sydney Carton, a man who looks like Darnay, takes his place and dies on the guillotine.', 'https://www.enotes.com/topics/tale-of-two-cities', 2),
(3, 'The title of the novel refers to the story\'s main antagonist, the Dark Lord Sauron, who had in an earlier age created the One Ring to rule the other Rings of Power as the ultimate weapon in his campaign to conquer and rule all of Middle-earth.', 'https://en.wikipedia.org/wiki/The_Lord_of_the_Rings', 3),
(4, 'If Saint-Exupery is to be believed The Little Prince is a book for children written for grown-ups. It can be read on many different levels to provide pleasure and food for thought for readers of all ages.The author, an aviator, crashes with his aeroplane in the middle of the Sahara desert.', 'http://www.thelittleprince.com/work/the-story/', 4),
(5, 'Harry Potter is not a normal boy. Raised by his cruel Aunt and Uncle, and tormented by his bully of a cousin, Dudley, he has resigned to a life of neglect. On his eleventh birthday, however, a half-giant called Hagrid comes crashing-ï¿½quite literally-ï¿½into his life, and announces that Harry is a wizard. Together they journey to London to get school supplies for Harryï¿½s first year at Hogwarts School of Witchcraft and Wizardry.', 'http://www.hypable.com/harry-potter/sorcerers-stone-book-plot/', 5),
(6, 'And Then There Were None is a detective fiction novel by Agatha Christie, first published in the United Kingdom by the Collins Crime Club on 6 November 1939 under the title Ten Little Niggers and in the United States by Dodd, Mead and Company in January 1940 under the title And Then There Were None. In the novel, ten people, who have previously been complicit in the deaths of others but have escaped notice and/or punishment, are tricked into coming onto an island. Even though the guests are the only people on the island, they are all mysteriously murdered one by one, in a manner paralleling, inexorably and sometimes grotesquely, the old nursery rhyme,', 'http://agathachristie.wikia.com/wiki/And_Then_There_Were_None', 6),
(7, 'The novel provides a detailed, episodic record of the two branches of the Jia Clan, the Ning-guo and Rong-guo Houses, who reside in two large adjacent family compounds in the capital. Their ancestors were made Dukes, and as the novel begins the two houses remain among the most illustrious families in the capital. The story\'s preface has supernatural Taoist and Buddhist overtones.', 'http://www.foreignercn.com/index.php?option=com_content&amp;amp;id=698:dream-of-the-red-chamber-&amp;amp;catid=34:chinese-literature&amp;amp;Itemid=117', 7),
(8, 'The Hobbit is the story of Bilbo Baggins, a hobbit who lives in Hobbiton. He enjoys a peaceful and pastoral life but his life is interrupted by a surprise visit by the wizard Gandalf. Before Bilbo is really able to improve upon the situation, Gandalf has invited himself to tea and when he arrives, he comes with a company of dwarves led by Thorin. They are embarking on a journey to recover lost treasure that is guarded by the dragon Smaug, at the Lonely Mountain.', 'http://www.gradesaver.com/the-hobbit/study-guide/summary', 8),
(9, 'She is the story of Cambridge professor Horace Holly and his ward Leo Vincey, and their journey to a lost kingdom in the African interior. The journey is triggered by a mysterious package left to Leo by his father, to be opened on his 25th birthday.The story expresses numerous racial and evolutionary conceptions of the late Victorians, especially notions of degeneration and racial decline prominent during the fin de siï¿½cle.', 'http://www.goodreads.com/book/show/682681.She', 9),
(10, 'When the Pevensie children, Peter, Susan, Edmund, and Lucy are sent out of London during World War II, they have no idea of the magical journey they are beginning. In the darkness of the old country house where they are sent, the children stumble through an old wardrobe to the land of Narnia, where animals talk and magic exists. This is the first story of Narnia written by C.S. Lewis and it tells the story of how these four children with the help of Aslan, the Great Lion, help defeat the White Witch who holds Narnia.', 'http://www.wikisummaries.org/wiki/The_Lion,_The_Witch_and_The_Wardrobe', 10),
(83, 'A teen wakes up in a clearing in the center of a gigantic maze with no memory of his past, finding himself a resident in community of boys who have built a village in the glade and who sends two of its strongest and fittest runners into the maze every morning to find a way out.', 'https://en.wikipedia.org/wiki/The_Maze_Runner', 83),
(84, 'Matilda befriends her school teacher, Miss Honey. She soon realizes Matilda\'s talents, but is later amazed to see the full extent of Matilda\'s powers. This is the story of a sweet bright little girl named Matilda, who is a child of wondrous intelligence. But unfortunately she is different from the rest of her family.', 'https://en.wikipedia.org/wiki/Matilda_(novel)', 84),
(85, 'Jay Gatsby, a man who orders his life around one desire: to be reunited with Daisy Buchanan, the love he lost five years earlier. Gatsby\'s quest leads him from poverty to wealth, into the arms of his beloved, and eventually to death.', 'https://en.wikipedia.org/wiki/The_Great_Gatsby', 85),
(102, 'After surviving the first Trial set by the creators: the Maze, Thomas, Newt, Minho and the other ravaged Gladers must survive in a decimated world overcome with the deadly disease known as the Flare. As Thomas and the gang try to complete the second Trial their adventure is filled with love, deceit, and death.', 'https://en.wikipedia.org/wiki/The_Scorch_Trials', 106);

-- --------------------------------------------------------

--
-- Table structure for table `changelog`
--

DROP TABLE IF EXISTS `changelog`;
CREATE TABLE IF NOT EXISTS `changelog` (
  `ChangeLogID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DateCreated` datetime DEFAULT NULL,
  `DateChanged` datetime DEFAULT NULL,
  `BookID` int(10) UNSIGNED NOT NULL,
  `UserID` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ChangeLogID`),
  KEY `fk_bookID_C` (`BookID`),
  KEY `fk_userID_C` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `changelog`
--

INSERT INTO `changelog` (`ChangeLogID`, `DateCreated`, `DateChanged`, `BookID`, `UserID`) VALUES
(2, '2020-09-07 00:00:00', '2020-09-07 05:09:11', 83, 1),
(3, '2020-09-09 12:09:56', '2020-09-16 05:09:35', 84, 1),
(4, '2020-09-09 06:09:15', '2020-09-09 06:09:53', 85, 1),
(5, '2020-09-07 16:49:34', '2020-09-09 07:09:44', 2, 1),
(6, '2020-09-07 16:51:53', '2020-09-09 07:09:08', 3, 1),
(7, '2020-09-07 16:51:53', '2020-09-09 07:09:23', 4, 1),
(8, '2020-09-07 16:51:54', '2020-09-09 07:09:57', 5, 1),
(9, '2020-09-07 16:51:55', '2020-09-09 07:09:17', 6, 1),
(10, '2020-09-07 16:52:23', '2020-09-09 07:09:22', 7, 1),
(11, '2020-09-07 16:52:33', '2020-09-09 07:09:28', 8, 1),
(12, '2020-09-07 16:52:53', '2020-09-09 07:09:37', 9, 1),
(13, '2020-09-08 15:09:53', '2020-09-09 07:09:45', 10, 1),
(24, '2020-09-16 11:09:27', NULL, 106, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `LoginID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `AccessRights` varchar(200) NOT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LoginID`, `Username`, `Password`, `AccessRights`) VALUES
(1, 'steve', '$2y$10$X1q/y7W8YWoUSQpyyzyN1OcppFC4mhkLvj/urEywIvbYFdki/.5a2', 'Manager'),
(2, 'mike', '$2y$10$MoVWXctRajkC1U1R/hosUeLDFJaQWpj7stHstpEXzj3rgTbT3k.Ry', 'Admin'),
(6, 'marsle', '$2y$10$GuaDJ.milC8JOR/yGW5.puF0Lh0pW4Zv1r5sA2/hiZvzNA2K.Wh2q', 'Customer'),
(7, 'john', '$2y$10$VMfk.ZBxaK105LEOF2vWD.4fRHyv.m6K.M67OeVh/zC2kRQT/jj8m', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `LoginID` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `fk_loginID_U` (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `Email`, `LoginID`) VALUES
(1, 'Steve', 'Anderson', 'steve.anderson@gmail.com', 1),
(2, 'Michael', 'Dumbo', 'dumbolorian@gmail.com', 2),
(6, 'Marshall', 'Le', 'grovemagnus2002@gmail.com', 6),
(7, 'John', 'Sword', 'jon@gmail.com', 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`AuthorID`) REFERENCES `author` (`AuthorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookplot`
--
ALTER TABLE `bookplot`
  ADD CONSTRAINT `fk_bookID_P` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `changelog`
--
ALTER TABLE `changelog`
  ADD CONSTRAINT `fk_bookID_C` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userID_C` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_loginID_U` FOREIGN KEY (`LoginID`) REFERENCES `login` (`LoginID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
