-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2022 at 01:54 AM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineexam321`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_admin`
--

CREATE TABLE `admin_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_login_id` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_fastname` varchar(255) NOT NULL,
  `admin_lastname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_last_login_ip` varchar(255) NOT NULL,
  `admin_last_login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_admin`
--

INSERT INTO `admin_admin` (`admin_id`, `admin_login_id`, `admin_password`, `admin_fastname`, `admin_lastname`, `admin_email`, `admin_last_login_ip`, `admin_last_login_datetime`) VALUES
(1, 'online', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Panel', 'pinkwebsolutionz@gmail.com', '223.191.54.117', '2021-05-10 11:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_exam`
--

CREATE TABLE `admin_exam` (
  `id` int(11) NOT NULL,
  `examname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_exam`
--

INSERT INTO `admin_exam` (`id`, `examname`) VALUES
(1, 'UPSC (PT) Paper I'),
(2, 'UPSC (PT) Paper II'),
(3, 'UPSC (Mains)'),
(4, 'PSC (PT) Paper I'),
(5, 'PSC (PT) Paper II'),
(6, 'PSC (Mains)'),
(7, 'SSC Tier I'),
(8, 'SSC Tier II'),
(11, 'jamb'),
(9, 'SSC Tier III');

-- --------------------------------------------------------

--
-- Table structure for table `admin_faq`
--

CREATE TABLE `admin_faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_faq`
--

INSERT INTO `admin_faq` (`id`, `question`, `answer`) VALUES
(1, 'Where will I be taken once I Register?', '<p>If you enter all your details, but choose to &#39;Pay Later&#39;, you will reach Dashboard where you will be again reminded to make the payment. If you complete payment process, you will reach Profile Page - where you will be asked to complete your Profile. Don&#39;t forget to upload your profile picture.</p>\r\n'),
(2, 'Can I take this test any time online, any day at my convenience?', '<p>Yes. You can give tests anytime as per your convenience. Once a test is activated from our end, you can take the test anytime, any day till June 3, 2018. After 2018 prelims, you will be allowed only to download 2018 test papers in PDF format. So, please try to stick to the Timetable!</p>\r\n'),
(3, 'Can I take test in Hindi or English?', '<p>You have an option to choose your test language Hindi or English when you subscribe. Test language remains the same throughout. You cannot take tests in both the languages</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin_order`
--

CREATE TABLE `admin_order` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `productinfo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_order`
--

INSERT INTO `admin_order` (`id`, `firstname`, `lastname`, `amount`, `status`, `txnid`, `hash`, `key`, `productinfo`, `email`, `date`) VALUES
(2, 'pinky', 'dutta', '8500.0', 'failure', 'a100513324b27a396231', 'e31e8b53800a97913437409ea00d2ee57ee5428c3bf60cf6a2cc3d334e3d3d04c09613400ec4215d779657463c5d3a22e08b51a54f04cea5b75f8eafb3e359ca', 'hDkYGPQe', 'Exam Subcribsion', 'pinkwebsolutionz@gmail.com', '2017-11-29'),
(3, 'pinky', 'dutta', '8500.0', 'failure', 'b91b94adb4287317b747', '30028555465967baf3f51ff4c3e4092e8fca99378ee2c439b8b14774233081ab73353d39d021dd0682d32cc45df7fc5347bdb50da508d23fe100b657d6d7a30a', 'hDkYGPQe', 'Exam Subcribsion', 'pinkwebsolutionz@gmail.com', '2017-11-29'),
(4, 'Aadesh', '', '8500.00', 'failure', '03755f0011a43e807e3d', '4a36ff7453ddb2e8bdb172bbf26d11972866894d63e339c80da3a3f1ca7c4c6597d07bb7ab7437e349070c0af99a873f4b09a6b3f447d081692860e4bb951ec0', 'hDkYGPQe', 'Exam Subcribsion', 'adeshjainj@gmail.com', '2019-06-30'),
(5, '', '', '', '', '', '', '', '', '', '2019-11-25'),
(6, '', '', '', '', '', '', '', '', '', '2019-11-25'),
(7, '', '', '', '', '', '', '', '', '', '2020-01-25'),
(8, '', '', '', '', '', '', '', '', '', '2020-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `admin_question_answer`
--

CREATE TABLE `admin_question_answer` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `answer` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_question_answer`
--

INSERT INTO `admin_question_answer` (`id`, `test_id`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(2, 9, 'this is question?', '11', '22', '33', '44', 'a'),
(3, 9, ' this is question2?', '33', '44', '55', '66', 'b'),
(4, 9, ' this is question3?', 'er', 'dd', 'eee', 'ttt', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `admin_question_answer2`
--

CREATE TABLE `admin_question_answer2` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_question_answer2`
--

INSERT INTO `admin_question_answer2` (`id`, `test_id`, `question`) VALUES
(1, 6, '1615035790_beclogo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_ques_ans`
--

CREATE TABLE `admin_ques_ans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `ques_answ_id` int(11) NOT NULL,
  `ques_answ` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `user_answer` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_test`
--

CREATE TABLE `admin_test` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `testname` varchar(255) NOT NULL,
  `syllabus` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_test`
--

INSERT INTO `admin_test` (`id`, `exam_id`, `testname`, `syllabus`, `date`) VALUES
(1, 1, 'Test1', 'Day 1 & 2: History\n\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\n\nDay 3 & 4: Polity\n\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\n\nDay 5 & 6: Current Affairs + Extra Topics\n\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '15th April 2018'),
(2, 2, 'Test1', 'Day 1 & 2: History\n\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\n\nDay 3 & 4: Polity\n\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\n\nDay 5 & 6: Current Affairs + Extra Topics\n\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '30th April 2018'),
(3, 3, 'Test1', 'Day 1 & 2: History\n\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\n\nDay 3 & 4: Polity\n\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\n\nDay 5 & 6: Current Affairs + Extra Topics\n\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '30th May 2018'),
(4, 4, 'Test1', 'Day 1 & 2: History\n\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\n\nDay 3 & 4: Polity\n\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\n\nDay 5 & 6: Current Affairs + Extra Topics\n\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '3rd June 2018'),
(5, 5, 'Test1', 'Day 1 & 2: History\n\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\n\nDay 3 & 4: Polity\n\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\n\nDay 5 & 6: Current Affairs + Extra Topics\n\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '15th April 2018'),
(6, 6, 'Test1', 'Day 1 & 2: History\n\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\n\nDay 3 & 4: Polity\n\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\n\nDay 5 & 6: Current Affairs + Extra Topics\n\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '30th April 2018'),
(7, 7, 'Test1', 'Day 1 & 2: History\n\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\n\nDay 3 & 4: Polity\n\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\n\nDay 5 & 6: Current Affairs + Extra Topics\n\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '30th May 2018'),
(9, 1, 'Test2', 'Day 1 & 2: History\r\n\r\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\r\n\r\nDay 3 & 4: Polity\r\n\r\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\r\n\r\nDay 5 & 6: Current Affairs + Extra Topics\r\n\r\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '12th June 2018'),
(10, 8, 'Test 1', 'Day 1 & 2: History\r\n\r\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\r\n\r\nDay 3 & 4: Polity\r\n\r\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\r\n\r\nDay 5 & 6: Current Affairs + Extra Topics\r\n\r\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '15th mar 2018'),
(11, 9, 'Test 1', 'Day 1 & 2: History\r\n\r\n1. Ancient History: NCERT Class VI Our Pasts - I (Full Book); Tamil Nadu History Class XI - Units I, II and III\r\n\r\nDay 3 & 4: Polity\r\n\r\n2. Indian Polity: NCERT CLASS VI Social & Political Life - I (Full Book)\r\n\r\nDay 5 & 6: Current Affairs + Extra Topics\r\n\r\n3. Current Affairs July 1 to July 23 (The Hindu + PIB)', '20th mar 2018 ');

-- --------------------------------------------------------

--
-- Table structure for table `admin_testi`
--

CREATE TABLE `admin_testi` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_browse` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_testi`
--

INSERT INTO `admin_testi` (`id`, `fullname`, `desig`, `description`, `image_browse`) VALUES
(1, 'Kristina', 'Officeal All Star Cafe', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '1509963212_man.png'),
(2, 'Kristina', 'Officeal All Star Cafe', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '1509985024_man.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin_theme_panel`
--

CREATE TABLE `admin_theme_panel` (
  `id` int(11) NOT NULL,
  `aboutheading` varchar(255) NOT NULL,
  `aboutdes` text NOT NULL,
  `link1` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `link2` varchar(255) NOT NULL,
  `fblues` text NOT NULL,
  `sblues` text NOT NULL,
  `tblues` text NOT NULL,
  `foblues` text NOT NULL,
  `fads` text NOT NULL,
  `image_browse1` varchar(255) NOT NULL,
  `sads` text NOT NULL,
  `image_browse2` varchar(255) NOT NULL,
  `tads` text NOT NULL,
  `image_browse3` varchar(255) NOT NULL,
  `foads` text NOT NULL,
  `image_browse4` varchar(255) NOT NULL,
  `fifads` text NOT NULL,
  `image_browse5` varchar(255) NOT NULL,
  `sixads` text NOT NULL,
  `image_browse6` varchar(255) NOT NULL,
  `sevads` text NOT NULL,
  `image_browse7` varchar(255) NOT NULL,
  `eigads` text NOT NULL,
  `image_browse8` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `face_link` varchar(255) NOT NULL,
  `twi_link` varchar(255) NOT NULL,
  `contactinfo` text NOT NULL,
  `map` varchar(255) NOT NULL,
  `subcribe_price` varchar(255) NOT NULL,
  `subcribe_header` varchar(255) NOT NULL,
  `subcribe_des` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_theme_panel`
--

INSERT INTO `admin_theme_panel` (`id`, `aboutheading`, `aboutdes`, `link1`, `video`, `link2`, `fblues`, `sblues`, `tblues`, `foblues`, `fads`, `image_browse1`, `sads`, `image_browse2`, `tads`, `image_browse3`, `foads`, `image_browse4`, `fifads`, `image_browse5`, `sixads`, `image_browse6`, `sevads`, `image_browse7`, `eigads`, `image_browse8`, `address`, `email`, `face_link`, `twi_link`, `contactinfo`, `map`, `subcribe_price`, `subcribe_header`, `subcribe_des`) VALUES
(1, 'WELCOME TO ACME360', '<p>Welcome to ACME360 ! A Gateway to Success.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the world of competition, the rules are quiet simple. You compete and deliver or get kicked out. It applies equally for everyone. Be it a student, a performer or us. Competition is what keeps the sword sharp and the keeps you on-guard for increasing your efforts to better yourself.</p>\r\n\r\n<p>You need to compete with the best and outperform with your intellect and hardwork. Not many people realise the importance of &quot;practice&quot; and performing &quot;mock drills&quot; before the actual showdown. You need to be just more than prepared. Having delt with same time constrains and performance pressure makes you a step ahead than other competitors. Taking mock tests makes you adept in adjusting your strategy and fine tuning the skills needed to outperform the competition and become your best. We at ACME360, do not mince words and engage in sweet talk of standalone betterment. We are professional and practical, we talk in most practical and pragmatic sense. People say, competition is with oneself. We say, competition is with everyone out there including you yourself. Take the Test-Series and practice, not with, but against the best. Our detailed analysis will help you identify your strengths, weakness and how to move from victory to victory. Jump on to the bandwagon of rigorous training to be able to beat the best. Welcome to ACME360, a Gateway to Success.&nbsp; Stay Ahead!&nbsp;</p>\r\n', 'http://acme360.co.in/about-us.php', '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/XM2N4Zz2md0?rel=0&showinfo=0\" frameborder=\"0\" allowfullscreen=\"\"></iframe>', 'http://acme360.co.in/', '<h3>Comprehensive Coverage</h3>\r\n					<p>Our Test Series covers each and every topic of UPSC Prelims Syllabus exhaustively from authentic and primary sources to provide you an in-depth understanding of nature of preliminary exam preparation</p>', '<h3>Get the Real Feel!</h3>\r\n					<p>As acknowledged by our toppers, most of our tests give you the actual feeling of solving real UPSC question paper</p>', '<h3>Be Prepared</h3>\r\n					<p>Our tests are carefully crafted to focus equally on relevant concepts and facts to prepare you to face any kind of question in real exam</p>', '<h3>Plan Ahead</h3>\r\n					<p>Our tests act both as learning resources and an oppurtunity to gauge level of your exam preparedness at regular intervals</p>', '<h3>High Quality Test</h3>\r\n\r\n<p>37 Full Length tests widely acclaimed for their quality questions and right approach to preparing for UPSC civil services Preliminary exam(General Studies Paper - 1)</p>', '1511272669_Advantage1.jpg', '<h3>Detailed Solutions</h3>\r\n					<p>Detailed Solutions to each question with exhaustive explanations make Insights test unique.</p>', 'Advantage2.jpg', '<h3>Full Coverage Of Sources</h3>\r\n					<p>High Precision and more relevant to Present Pattern.</p>', 'Advantage3.jpg', '<h3>Focus On Concepts</h3>\r\n					<p>We take it very serious to focus more on concepts rather than on facts. Questions will help you build your concepts from scratch</p>', 'Advantage4.jpg', '<h3>NCERT</h3>\r\n					<p>You will fall in love with NCERT books and find them more important than any other sources. You will realise this when you solve first few tests of Insights.</p>', 'Advantage5.jpg', '<h3>Recommended By Toppers</h3>\r\n					<p>Questions are framed from standard books and online sources which are recommended by every topper, every year.</p>', 'Advantage6.jpg', '<h3>Detailed Study Plan</h3>\r\n					<p>A detailed Study Plan comes with a Timetable to follow on regular basis to prepare for and solve each test. It streamlines your preparation, gives you daily targets that are achievable and makes sure whole preparation is disciplined and productive.</p>', 'Advantage7.jpg', '<h3>All India Ranking</h3>\r\n					<p>All India Ranking will help in assessing your preparation levels as you will be competing with thousands of other serious aspirants from across India.</p>', 'Advantage8.jpg', '70 C, Pocket A, Budhela Extension, Delhi West, India, 110018', 'support@acme360.co.in', 'https://www.facebook.com/', 'https://www.twitter.com/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.', '<iframe src=\"https://www.google.com/maps/d/embed?mid=1gaQSzilmEXF7ALoUH7VAifYe9fg&hl=en_US\" width=\"100%\" height=\"392\"></iframe>', '8500', 'ACME360 PRELIMS ONLINE TEST SERIES - 2018', '<li>NCERT and other Standard Books based highly conceptual Tests for General Studies Paper - 1</li>\r\n<li>Emphasis on Self Study by providing practical Timetable for whole year that can be followed on a regular basis</li>\r\n<li>37 Full Length Tests Each with 100 High Quality Questions for General Studies Paper - 1</li>\r\n<li>Focus on enabling you to get 130+ score in Paper - 1</li>\r\n<li>Analysis of your Performance in different categories after Each Test</li>\r\n<li>All India Ranking of Individual and Cumulative Tests</li>\r\n<li>Duration of test series is for one year. Date of your ranking and performance in tests will be removed before the beginning of 2019 Test Series.</li>\r\n<li>Revision Tests to allow time for regular revision</li>\r\n<li>Flexibility to subscribe to any of the two test language - Hindi or English</li>');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image_browse` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `password`, `address1`, `city`, `state`, `country`, `zipcode`, `email`, `phone`, `image_browse`, `date`, `firstname`, `lastname`) VALUES
(1, '123', 'kolkata', 'kolkata', 'wb', 'india', '700041', 'pinky@gmail.com', '1234567890', '1512228631Chrysanthemum.jpg', '', 'pinky', 'ganguly');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_result`
--

CREATE TABLE `admin_user_result` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `result` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user_result`
--

INSERT INTO `admin_user_result` (`id`, `user_id`, `test_id`, `total_marks`, `result`, `date`) VALUES
(1, 1, 1, 0, '', '2018-11-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_admin`
--
ALTER TABLE `admin_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_exam`
--
ALTER TABLE `admin_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_faq`
--
ALTER TABLE `admin_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_order`
--
ALTER TABLE `admin_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_question_answer`
--
ALTER TABLE `admin_question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_question_answer2`
--
ALTER TABLE `admin_question_answer2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_ques_ans`
--
ALTER TABLE `admin_ques_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_test`
--
ALTER TABLE `admin_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_testi`
--
ALTER TABLE `admin_testi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_theme_panel`
--
ALTER TABLE `admin_theme_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_result`
--
ALTER TABLE `admin_user_result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_admin`
--
ALTER TABLE `admin_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_exam`
--
ALTER TABLE `admin_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_faq`
--
ALTER TABLE `admin_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_order`
--
ALTER TABLE `admin_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_question_answer`
--
ALTER TABLE `admin_question_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_question_answer2`
--
ALTER TABLE `admin_question_answer2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_ques_ans`
--
ALTER TABLE `admin_ques_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_test`
--
ALTER TABLE `admin_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_testi`
--
ALTER TABLE `admin_testi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_theme_panel`
--
ALTER TABLE `admin_theme_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_user_result`
--
ALTER TABLE `admin_user_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
