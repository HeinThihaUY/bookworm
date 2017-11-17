-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2017 at 04:27 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookworm`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `cover` text,
  `pages` int(15) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `price`, `cover`, `pages`, `created_date`, `modified_date`, `category_id`) VALUES
(10, 'Lucky in Love ', 'Kasie West', 'In a flash, Maddieâ€™s life is unrecognizable. No more stressing about college scholarships. Suddenly, sheâ€™s talking about renting a yacht. And being in the spotlight at school is funâ€¦until rumors start flying, and random people ask her for loans. Now Maddie isnâ€™t sure who she can trust.\r\nExcept for Seth Nguyen, her funny, charming coworker at the local zoo. Seth doesnâ€™t seem aware of Maddieâ€™s big news. And, for some reason, she doesnâ€™t want to tell him. But what will happen if he learns her secret?\r\n\r\n', 1700, 'LuckyInLove.jpg', 333, '2017-08-25', '2017-08-25', 7),
(11, 'What to Say Next ', 'Julie Buxbaum', 'From the New York Times bestselling author of Tell Me Three Things comes a charming and poignant story about two struggling teenagers who find an unexpected connection just when they need it most. For fans of Sophie Kinsella, Jennifer Niven, and Rainbow Rowell.', 21.45, 'WhatToSayNext.jpg', 292, '2017-08-30', '2017-08-30', 7),
(12, 'Wildfire', 'Ilona Andrews', 'Just when Nevada Baylor has finally come to accept the depths of her magical powers, she also realizes sheâ€™s fallen in love. Connor â€œMadâ€ Rogan is in many ways her equal when it comes to magic, but sheâ€™s completely out of her elements when it comes to her feelings for him. To make matters more complicated, an old flame comes back into Roganâ€™s lifeâ€¦', 19.91, 'Wildfire.jpg', 391, '2017-08-30', '2017-08-30', 7),
(13, 'Wired', 'Julie Garwood', 'A beautiful computer hacker and a bad-boy FBI agent must collaborateâ€”in more ways than oneâ€”in the sizzling new novel from #1 New York Times bestselling author Julie Garwood.\r\n\r\nAllison Trent doesnâ€™t look like a hacker. In fact, when sheâ€™s not in college working on her degree, she models on the side. But behind her gorgeous face is a brilliant mind for computers and her real love is writingâ€”and hackingâ€”code. Her dream is to write a new security program that could revolutionize the tech industry.\r\n', 24.22, 'Wired.jpg', 336, '2017-08-30', '2017-08-30', 7),
(14, 'This is How it Happened ', 'Paula Stokes', 'Somehow Iâ€™ve become a liar. A coward. Hereâ€™s how it happened. \r\n\r\nWhen Genevieve Grace wakes up from a coma, she canâ€™t remember the car crash that injured her and killed her boyfriend Dallas, a YouTube star who had just released his first album. Genevieve knows she was there, and that there was another driver, a man named Brad Freeman, who everyone assumes is guilty. But as s ...more \r\n\r\n', 18.76, 'ThisIsHowItHappened.jpg', 384, '2017-08-30', '2017-08-30', 7),
(15, 'I See London, I See France', 'Sarah Mlynowski', 'Nineteen-year-old Sydney has the perfect summer mapped out. Sheâ€™s spending the next four and half weeks traveling through Europe with her childhood best friend, Leela. Their plans include Eiffel-Tower selfies, eating cocco gelato, and making out with trÃ¨s hot strangers. Her plans do not include Leelaâ€™s cheating ex-boyfr ...more\r\n\r\n', 16.99, 'I See London I See French.jpg', 378, '2017-08-30', '2017-08-30', 7),
(16, 'The Almost Sisters ', 'Joshilyn Jackson', 'With empathy, grace, humor, and piercing insight, the author of gods in Alabama pens a powerful, emotionally resonant novel of the South that confronts the truth about privilege, family, and the distinctions between perception and reality---the stories we tell ourselves about our origins and who we really are.\r\n\r\nSuperheroes have always been Leia Birch Briggs'' weakness.\r\n', 9.29, 'TheAlmostSisters.jpg', 352, '2017-08-30', '2017-08-30', 12),
(17, 'Goodbye, Vitamin ', 'Rachel Khong', 'A young woman returns home to care for her failing father in this fine, funny, and inescapably touching debut, from an affecting and wonderfully original new literary voice.\r\n\r\nA few days after Christmas in a small suburb outside of L.A., pairs of a man''s pants hang from the trees. The pants belong to Howard Young, a prominent history professor', 15.34, 'GoodByeVitamin.jpg', 196, '2017-08-30', '2017-08-30', 12),
(18, 'What We Lose ', 'Zinzi Clemmons', 'â€œThe debut novel of the year.â€ â€“Vogue\r\n\r\nOne of the Huffington Post, Buzzfeed, Cosmopolitan, Glamour, Redbook, Houston Chronicle, LA Daily News, Nylon, and Elleâ€™s Books to Read This Summer\r\n\r\nâ€œZinzi Clemmonsâ€™s debut novel signals the emergence of a voice that refuses to be ignored.â€ â€”Paul Beatty, Booker-winning author of The Sellout\r\n', 17.56, 'WhatWeLose.jpg', 213, '2017-08-30', '2017-08-30', 12),
(19, 'The Disappearances ', 'Emily Bain Murphy', 'What if the ordinary things in life suddenlyâ€¦disappeared?\r\n\r\nAila Quinnâ€™s mother, Juliet, has always been a mystery: vibrant yet guarded, she keeps her secrets beyond Ailaâ€™s reach. When Juliet dies, Aila and her younger brother Miles are sent to live in Sterling, a rural town far from home--and the place where Juliet grew up.\r\n\r\nSterling is a place with mysteries of its own. A pla ...more \r\n\r\n', 16.98, 'TheDisappearances.jpg', 388, '2017-08-30', '2017-08-30', 12),
(20, 'Fitness Junkie ', 'Lucy Sykes', 'From the bestselling authors of The Knockoff, an outrageously funny novel about one woman''s attempt--through clay diets, naked yoga, green juice, and cultish workout classes--to win back her career, save her best friend, and lose thirty pounds.\r\n\r\nWhen Janey Sweet, CEO of a couture wedding dress company, is photographed in the front row of a fashion show eating a bruffin--the ...more \r\n\r\n', 14.78, 'FitnesJunkie.jpg', 304, '2017-08-30', '2017-08-30', 13),
(21, 'South Pole Station ', 'Ashley Shelby', 'Do you have digestion problems due to stress? Do you have problems with authority? How many alcoholic drinks do you consume a week? Would you rather be a florist or a truck driver? \r\n\r\nThese are some of the questions that determine if you have what it takes to survive at South Pole Station, a place with an average temperature of -54Â°F and no sunlight for six months a year. Coo ...more \r\n\r\n', 15.99, 'SouthPoleStation.jpg', 368, '2017-08-30', '2017-08-30', 13),
(22, 'Less', 'Andrew Sean Greer', 'You are a failed novelist about to turn fifty. A wedding invitation arrives in the mail: your boyfriend of the past nine years is engaged to someone else. You can''t say yes--it would be too awkward--and you can''t say no--it would look like defeat. On your desk are a series of invitations to half-baked literary events around th ...more\r\n\r\n', 16, 'Less.jpg', 272, '2017-08-30', '2017-08-30', 13),
(23, 'The Awkward Path to Getting Lucky ', 'Summer Heacock', 'A humorous novel about a cupcake shop owner with a physical ailment that''s kept her from having sex for two years, and the desperate antics that ensue as she tries to overcome it.\r\n\r\nHaving sex wasn''t a big priority while Kat Carmichael''s successful cupcake shop was taking off. But when she realizes that it''s been nearly two years since she and her boyfriend, Ryan, have been i ...\r\n\r\n', 14.67, 'TheAckwardPathToGettingLucky.jpg', 336, '2017-08-30', '2017-08-30', 13),
(24, 'What Goes Up  ', 'Katie Kennedy', 'Rosa and Eddie are among hundreds of teens applying to NASAâ€™s mysterious Multi-World Agency. After rounds of crazy-competitive testing they are appointed to Team 3, along with an alternate, just in case Eddie screws up (as everyone expects he will)\r\n', 15.34, 'WhatGoesUp.jpg', 336, '2017-08-30', '2017-08-30', 13),
(25, 'Getting a Grip ', 'M.E. Carter', 'This isnâ€™t my life. Okay, it is my life, but not the way I envisioned it would be. \r\n\r\nI wasnâ€™t supposed to be a divorced mother of three when I turned the big 4-0. Sure, I expected the fine lines, gray hairs and left over baby belly. What I didnâ€™t expect was expanding our family get-togethers by oneâ€¦ my ex-husbandâ€™s new child bride. Ok, ok, sheâ€™s not young. Maybe.\r\n\r\nDid I mentio ...more \r\n\r\n', 17.33, 'GettingAGrip.jpg', 345, '2017-08-30', '2017-08-30', 13),
(27, 'Now', 'Antoinette Portis', 'This is my favorite cloud. . .because it''s the one I am watching.\r\nThis is my favorite tree. . .because it''s the one where I''m swinging.\r\nThis is my favorite tooth. . .because it''s the one that is missing.\r\n\r\nFollow a little girl as she takes you on a tour through all of her favorite things, from the holes she digs to the hugs she gives.\r\n', 9, 'Now.jpg', 32, '2017-08-30', '2017-08-30', 14),
(28, 'Almost Paradise ', 'Corabel Shofner', 'Twelve-year-old Ruby Clyde Hendersonâ€™s life turns upside down the day her motherâ€™s boyfriend holds up a convenience store, and her mother is wrongly imprisoned for assisting with the crime. Ruby and her pet pig, Bunny, find their way to her estranged Aunt Eleanor''s home. Aunt Eleanor is a nun who lives on a peach orchard called Paradise, and had turned away from their fami ...more ', 10.45, 'AlmostParadise.jpg', 288, '2017-08-30', '2017-08-30', 14),
(29, 'Jasmine Toguchi, Mochi Queen ', 'Debbi Michiko Florence', 'Grace Kendall at Farrar, Straus and Giroux has preempted a chapter book series by Debbi Michiko Florence, about headstrong eight-year-old Jasmine Toguchi and her Japanese-American family. The first book, Jasmine Toguchi, Mochi Queen, is about yearning to be part of a fun family tradition, even if it''s not something girls typically do. Publication begins in spring 2017.', 15, 'JasmineMochiQueen.jpg', 160, '2017-08-30', '2017-08-30', 14),
(30, 'Bubbles ', 'Abby Cooper', 'Twelve-year-old Sophie Mulvaney''s world has been turned upside down. Mom lost her job at the TV station and broke up with Pratik, whom Sophie adored. Her teacher is making them do a special project about risk-taking, so Sophie gets roped into doing a triathlon. And to top it all off, she''s started seeing bubbles above people''s heads that tell her what these people are thin ...more ', 16.23, 'Bubbles.jpg', 288, '2017-08-30', '2017-08-30', 14),
(31, 'Option B', 'Sheryl Sandberg', 'From Facebook''s COO and Whartonâ€™s top-rated professor, the #1 New York Times best-selling authors of Lean In and Originals: a powerful, inspiring, and practical book about building resilience and moving forward after lifeâ€™s inevitable setbacks.\r\n\r\nAfter the sudden death of her husband, Sheryl Sandberg felt certain that she and her children would never feel pure joy again. â€œI w ...more \r\n\r\n', 15.55, 'OptionB.jpg', 240, '2017-08-30', '2017-08-30', 9),
(32, 'Big Magic: Creative Living Beyond Fear ', 'Elizabeth Gilbert', 'Readers of all ages and walks of life have drawn inspiration and empowerment from Elizabeth Gilbertâ€™s books for years. Now this beloved author digs deep into her own generative process to share her wisdom and unique perspective about creativity. With profound empathy and radiant generosity, she offers potent insights into the mysterious nature of inspiration. She asks us t ...more \r\n\r\n', 18.45, 'BigMagic.jpg', 288, '2017-08-30', '2017-08-30', 9),
(33, 'GIRLBOSS', 'Sophia Amoruso', 'In GIRLBOSS vertelt Sophia Amoruso het verhaal van haar ongelooflijke succes. Ze laat zien hoe iedereen succesvol kan worden, als je op jezelf vertrouwt en je instinct volgt.\r\n\r\nSophia Amoruso is de oprichter en CEO van kledingbedrijf Nasty Gal, een organisatie met een omzet van meer dan 100 miljoen dollar en meer dan 350 mensen in dienst. Maar het eerste wat ze ooit online v ...more \r\n\r\n', 17.44, 'GirlBoss.jpg', 256, '2017-08-30', '2017-08-30', 9),
(34, 'Startup ', 'Doree Shafrir', 'From veteran online journalist and BuzzFeed writer Doree Shafrir comes a hilarious debut novel that proves there are some dilemmas that no app can solve.\r\n\r\nMack McAllister has a $600 million dollar idea. His mindfulness app, TakeOff, is already the hottest thing in tech and he''s about to launch a new and improved version that promises to bring investors running and may turn h ...more \r\n\r\n', 16.33, 'Startup.jpg', 304, '2017-08-30', '2017-08-30', 9),
(35, 'Grit ', 'Angela Duckworth', 'In this must-read book for anyone striving to succeed, pioneering psychologist Angela Duckworth shows parents, educators, athletes, students, and business people-both seasoned and new-that the secret to outstanding achievement is not talent but a focused persistence called â€œgrit.â€ Why do some people succeed and others fail? Sharing new insights from her landmark research o ...more \r\n\r\n', 17.56, 'Grit.jpg', 352, '2017-08-30', '2017-08-30', 9),
(36, 'Spirit Hunters ', 'Ellen Oh', 'We Need Diverse Books founder Ellen Oh returns with Spirit Hunters, a high-stakes middle grade mystery series about Harper Raine, the new seventh grader in town who must face down the dangerous ghosts haunting her younger brother. A riveting ghost story and captivating adventure, this tale will have you guessing at every turn!\r\n\r\nHarper doesnâ€™t trust her new home from the mome ...more \r\n\r\n', 13.44, 'SpiritHunters.jpg', 288, '2017-08-30', '2017-08-30', 7),
(37, 'Nuclear Family', 'Susanna Foge', 'From filmmaker and New Yorker contributor Susanna Fogel comes a comedic novel about a fractured family of New England Jews and their discontents, over the course of three decades. Told entirely in letters to a heroine we never meet, we get to know the Fellers through their check-ins with Julie: their thank-you notes, letters of condolence, family gossip, and good old-fashi ...more ', 11.45, 'NuclearFamily.jpg', 346, '2017-08-30', '2017-08-30', 7),
(38, 'Ten Dead Comedians: A Murder Mystery ', 'Fred Van Lente', 'Fred Van Lenteâ€™s brilliant debut is both an homage to the Golden Age of Mystery and a thoroughly contemporary show-business satire. As the story opens, nine comedians of various acclaim are summoned to the island retreat of legendary Hollywood funnyman Dustin Walker. The group includes a former late ...more \r\n\r\n', 14.67, 'TedDeadComedians.jpg', 336, '2017-08-30', '2017-08-30', 7),
(39, 'The Lake Effect ', 'Erin McCahan', 'Itâ€™s the summer after his senior year, and Briggs Henry is out the door. Heâ€™s leaving behind his ex-girlfriend and his parentsâ€™ money troubles for Lake Michigan and its miles of sandy beaches, working a summer job as a personal assistant, and living in a gorgeous Victorian on the shore. Itâ€™s the kind of house Briggs plans to buy his parents one day when heâ€™s a multi-millio ...more \r\n\r\n', 20.32, 'TheLakeEffect.jpg', 400, '2017-08-30', '2017-08-30', 7),
(40, 'Sting-Ray Afternoons ', 'Steve Rushin', 'A wild and bittersweet memoir of a classic ''70s childhood\r\n\r\nIt''s a story of the 1970s. Of a road trip in a wood-paneled station wagon, with the kids in the way-back, singing along to the Steve Miller Band. Brothers waking up early on Saturday mornings for five consecutive hours of cartoons and advertising jingles that they''ll be humming all day. A father-one of 3M''s greatest ... \r\n\r\n', 14.98, 'Sting-RayAfternoons.jpg', 336, '2017-08-30', '2017-08-30', 15),
(41, 'Arbitrary Stupid Goal ', 'Tamara Shopsin', 'An endlessly entertaining illustrated memoir, time-traveling to the Greenwich Village of the authorâ€™s bohemian 1970s childhood\r\n\r\nTamara Shopsin, the acclaimed New York Times and New Yorker illustrator, takes the reader on a pointillist time-travel trip to the Greenwich Village of her bohemian 1970s childhood, a funky, tight-knit small town in the big city, long before Whole F ...more \r\n\r\n', 16.55, 'ArbitraryStupidGoal.jpg', 336, '2017-08-30', '2017-08-30', 15),
(42, 'Reading with Patrick', 'Michelle Kuo', 'A memoir of race, inequality, and the power of literature told through the life-changing friendship between an idealistic young teacher and her gifted student, jailed for murder in the Mississippi Delta.\r\n\r\nRecently graduated from Harvard University, Michelle Kuo arrived in the rural town of Helena, Arkansas, as a Teach for America volunteer, bursting with optimism and drive. ...more \r\n\r\n', 19.33, 'ReadingWithPatrick.jpg', 320, '2017-08-30', '2017-08-30', 15),
(43, 'Chester B. Himes', 'Lawrence P. Jackson', 'In his Chester B. Himes (1909â€“1984), Lawrence P. Jackson depicts the improbable life of the controversial writer whose novels confront sexuality, racism, and social injustice. In absorbing detail, Jackson explores Chester Himesâ€™s middle-class origins, eight years in prison, painful odyssey as a black World War IIâ€“era artist, and escape to Europe, where Himes became interna ...more \r\n\r\n', 17.45, 'ChesterB.Himes.jpg', 624, '2017-08-30', '2017-08-30', 15),
(44, 'Introduction to Data Science', 'Hein Thiha', 'intro', 22.22, 'AllOrNothingAtAll.jpg', 200, '2017-08-31', '2017-08-31', 16);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `summary` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `summary`) VALUES
(7, 'Romance', 'According to the Romance Writers of America, "Two basic elements comprise every romance novel: a central love story and an emotionally-satisfying and optimistic ending." Both the conflict and the climax of the novel should be directly related to that core theme of developing a romantic relationship, although the novel can also contain subplots that do not specifically relate to the main characters'' romantic love. Other definitions of a romance novel may be broader, including other plots and endings or more than two people, or narrower, restricting the types of romances or conflicts.'),
(9, 'Business', 'A business (also known as enterprise or firm) is an organization engaged in the trade of goods, services, or both to consumers. Businesses are predominant in capitalist economies, where most of them are privately owned and administered to earn profit to increase the wealth of their owners. Businesses may also be not-for-profit or state-owned. A business owned by multiple individuals may be referred to as a company, although that term also has a more precise meaning.'),
(12, 'Fiction', 'Fiction is the telling of stories which are not real. More specifically, fiction is an imaginative form of narrative, one of the four basic rhetorical modes. Although the word fiction is derived from the Latin fingo, fingere, finxi, fictum, "to form, create", works of fiction need not be entirely imaginary and may include real people, places, and events. Fiction may be either written or oral. Although not all fiction is necessarily artistic, fiction is largely perceived as a form of art or entertainment. The ability to create fiction and other artistic works is considered to be a fundamental aspect of human culture, one of the defining characteristics of humanity.'),
(13, 'Humor & Comedy', 'A comic novel is usually a work of fiction in which the writer seeks to amuse the reader, sometimes with subtlety and as part of a carefully woven narrative, sometimes above all other considerations. It could indeed be said that comedy fiction is literary work that aims primarily to provoke laughter, but this isn''t always as obvious as it first may seem.'),
(14, 'Children''s', 'Children''s literature is for readers and listeners up to about age 12. It is often illustrated. The term is used in senses that sometimes exclude young-adult fiction, comic books, or other genres. Books specifically for children existed at least several hundred years ago.'),
(15, 'Biography', 'A biography (from the Greek words bios meaning "life", and graphos meaning "write") is an account of a person''s life, usually published in the form of a book or essay, or in some other form, such as a film.\r\n'),
(16, 'Technology', 'tech');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `salt`, `phone`, `email`) VALUES
(7, 'Hein Thiha', '6001714a1c65b9dbba2a09c73efbc17daec356be319959f3904e408ca58f95dc', 'f02', '09250084887', 'heinth@gmail.com'),
(9, 'Hein Thi Ha', 'c7a0dfd25d8e341ed4d0f200058b8e74e28c31f64c88a23c5d6da54925b6b030', '381', '098272927', 'hth@gmail.com'),
(10, 'Hein Thiha', '0e5f15f199b3cb12d1f661e5a561f823e2f114f104cf7b73b94e87ede931c41a', '6e2', '097273828278', 'heinthiha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `destination` text,
  `order_started_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `status` int(1) NOT NULL,
  `customer_id` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `destination`, `order_started_date`, `delivery_date`, `status`, `customer_id`) VALUES
(4, 'No.2, Insein', '2017-08-28', '2017-09-01', 1, 9),
(5, 'Insein', '2017-08-30', '2017-09-02', 1, 9),
(6, 'No.12, Condo A, Bo Mya Htun Street, Pyay Road, Mayan Gone, Yangon.', '2017-08-30', '2017-09-02', 1, 7),
(7, 'Insein', '2017-08-30', '2017-09-03', 1, 7),
(8, 'Yangon', '2017-08-30', '2017-09-03', 0, 7),
(10, 'No.232, Condo B, Ground Level, Mayan Gone, Yangon', '2017-08-30', '2017-09-03', 1, 7),
(11, 'No.218, U Yar Kyaw Street, Insein Road, Hlaing', '2017-08-30', '2017-09-03', 0, 9),
(12, 'Insein', '2017-08-30', '2017-09-03', 1, 9),
(13, 'Insein', '2017-08-31', '2017-09-04', 1, 10),
(14, 'Insein', '2017-11-14', '2017-11-17', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `qty` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `order_id` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `qty`, `book_id`, `order_id`) VALUES
(3, 5, 22, 4),
(4, 2, 10, 4),
(6, 1, 11, 5),
(7, 2, NULL, 5),
(8, 2, 15, 6),
(9, 2, NULL, 7),
(10, 1, 11, 8),
(11, 2, 13, 10),
(12, 1, 11, 10),
(13, 2, 16, 11),
(14, 1, 15, 11),
(15, 1, 11, 12),
(16, 1, 41, 13),
(17, 1, 34, 14);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_4` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
