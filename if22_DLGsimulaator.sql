-- phpMyAdmin SQL Dump
-- version 5.2.0-1.el9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2023 at 11:21 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if22_DLGsimulaator`
--

-- --------------------------------------------------------

--
-- Table structure for table `Analytics`
--

CREATE TABLE `Analytics` (
  `analytics_id` int(11) NOT NULL,
  `Question_question_id` int(11) NOT NULL,
  `Answer_answer_id` int(11) NOT NULL,
  `Form_form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Answer`
--

CREATE TABLE `Answer` (
  `answer_id` int(11) NOT NULL,
  `answer_text` varchar(300) NOT NULL,
  `next_question_id` int(11) DEFAULT NULL,
  `answer_score` int(11) NOT NULL,
  `Question_question_id` int(11) NOT NULL,
  `answer_end` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Answer`
--

INSERT INTO `Answer` (`answer_id`, `answer_text`, `next_question_id`, `answer_score`, `Question_question_id`, `answer_end`) VALUES
(3, 'Yes.', 2, 1, 1, 0),
(4, 'No.', 3, 0, 1, 0),
(5, 'I don\'t know what you are talking about.', 7, 0, 1, 0),
(6, 'My name is [name] and I want to come to study at Tallinn University.', 101, 0, 2, 0),
(7, 'My name is [name], I\'m [age] year old and I\'m from [country].', 101, 1, 2, 0),
(8, 'I\'m an [work] and I would like to learn more about how to make games.', 101, 1, 2, 0),
(9, 'My name is [name], previously I studied [education] but I want to learn more. ', 101, 1, 2, 0),
(10, 'My name is [name] and I\'m a parent of [X] kid[s].', 8, 1, 2, 0),
(11, 'I\'m an enthusiast of [hobby]. ', 9, 1, 2, 0),
(12, 'Can I have this interview some other time? ', 4, -1, 3, 0),
(13, 'I would like to be accepted to the programme but I\'m afraid of the interview. ', 5, 0, 3, 0),
(14, 'I changed my mind. I would like to study something else.', 6, -80, 3, 0),
(15, 'Let\'s have this interview now. I don\'t believe that next time is better.', 5, 1, 4, 0),
(16, 'Thank you for encouraging me.', 101, 1, 5, 0),
(17, 'Easy for you to say. You are doing this every year, I\'m doing this once in a lifetime.', 101, 0, 5, 0),
(18, 'Ah, you are right. I forgot about it.', 101, 0, 7, 0),
(19, 'Yes, but I was already accepted to another programme.', 6, -80, 7, 0),
(20, 'No, but this is something that influences my activities.', 101, 1, 8, 0),
(21, 'Yes. I\'ll do everything for my kids.', 101, -1, 8, 0),
(22, 'Yes, my hobby always comes first, everything else has to wait for the right time.', 101, -1, 9, 0),
(23, 'Maybe, my hobby can support me in my studies. ', 101, 1, 9, 0),
(24, 'No, this is just a fun fact. It will help you to remember me.', 101, 0, 9, 0),
(25, 'I would like to get my foot in the gaming industry.', 102, 0, 101, 0),
(26, 'I would like to use games as teaching tools.', 106, 1, 101, 0),
(27, 'I would like to create games that teach something.', 107, 1, 101, 0),
(28, 'I would like to create games that tackle social issues.', 109, 1, 101, 0),
(29, 'I would like to learn how to make AAA games.', 103, -1, 102, 0),
(50, 'Thank you for this opportunity. Bye!', NULL, -80, 4, 1),
(51, 'I would like to learn how to run a game studio.', 103, -1, 102, 0),
(52, 'I would like to learn how to sell games.', 103, -1, 102, 0),
(53, 'I am fascinated by games and want to know more about them.', 110, 1, 102, 0),
(54, 'This is about learning how to make games.', 104, -1, 103, 0),
(55, 'This is about games that teach something.', 110, 1, 103, 0),
(56, 'I don\'t know, you tell me.', 105, -1, 103, 0),
(57, 'I see.', 111, 0, 104, 0),
(58, 'Oh! I thought you would teach me.', 111, 0, 104, 0),
(59, 'Creating games that teach something.', 110, 1, 105, 0),
(60, 'Teaching how to make games. ', 111, -1, 105, 0),
(61, 'I don\'t know.', 111, 0, 105, 0),
(62, 'To motivate students.', 110, 1, 106, 0),
(63, 'To teach new skills.', 110, 1, 106, 0),
(64, 'To make teaching more fun.', 110, 0, 106, 0),
(65, 'I don\'t know but it sounds important and promising.', 111, -1, 106, 0),
(66, 'Because students are playing all the time. It would be nice if they do something useful while playing.', 110, 1, 107, 0),
(67, 'Games are excellent tools for introducing boring topics. ', 110, 1, 107, 0),
(68, 'There are not enough good learning games.', 110, 1, 107, 0),
(69, 'Because it is so difficult to come up with new ideas for entertaining games. Learning games are easy to make. ', 111, -1, 107, 0),
(74, 'Gender balance issues.', 110, 1, 109, 0),
(75, 'Rights of minorities.', 110, 1, 109, 0),
(76, 'How to support white supremacy.', 112, -1, 109, 0),
(77, 'I\'m finishing my bachelor\'s studies.', 202, 1, 201, 0),
(78, 'I graduated with bachelor studies some time ago.', 203, 1, 201, 0),
(79, 'I have a master\'s degree.', 204, 1, 201, 0),
(80, 'Finishing my bachelor\'s studies is under my control. I will graduate for sure. ', 203, 1, 202, 0),
(81, 'I don\'t know. I hope I will graduate on time.', 203, 0, 202, 0),
(82, 'Yes, this is a big risk. I\'ll come back next year. ', 203, 0, 202, 0),
(83, 'I have studied computer science.', 205, 1, 203, 0),
(84, 'My previous studies are related to art.', 205, 1, 203, 0),
(85, 'My domain is education and learning. ', 205, 1, 203, 0),
(86, 'I have studied languages.', 205, 1, 203, 0),
(87, 'I have studied something else but I\'m interested in learning game design. ', 205, 1, 203, 0),
(88, 'I have the opposite opinion. Having one master\'s degree is proof that I\'m able to focus on academic activities.', 203, 1, 204, 0),
(89, 'I agree with you. When things are getting complicated I may lose motivation because I already have a master\'s degree. ', 203, 0, 204, 0),
(90, 'I have never thought about this in that way.', 203, 0, 204, 0),
(91, 'Yes.', 206, 1, 205, 0),
(92, 'No.', 211, 0, 205, 0),
(93, 'I don\'t remember.', 211, 0, 205, 0),
(94, 'My teachers used a lot of Kahoots or similar interactive quizzes. ', 210, 1, 206, 0),
(95, 'I have used vehicle simulators.', 210, 1, 206, 0),
(96, 'We played role-playing games.', 210, 1, 206, 0),
(97, 'We watched educational videos.', 207, 0, 209, 0),
(98, 'We solved use cases. ', 209, 0, 206, 0),
(99, 'Yes.', 210, 1, 207, 0),
(100, 'No.', 211, -1, 207, 0),
(101, 'What do you mean?', 208, 0, 207, 0),
(102, 'Yes. We were able to pause the video.', 210, -1, 208, 0),
(103, 'Yes. we could decide what episode is played next.', 211, 1, 208, 0),
(104, 'No, I don\'t think so.', 211, 0, 208, 0),
(105, 'They are story-based.', 211, -1, 209, 0),
(106, 'We had a competition, who can provide a better solution.', 210, 1, 209, 0),
(107, 'I don\'t know.', 211, 0, 209, 0),
(108, 'I work in an IT company. ', 302, 1, 301, 0),
(109, 'I work as an artist.', 307, 1, 301, 0),
(110, 'I work as a teacher.', 309, 1, 301, 0),
(111, 'I have worked as an intern.', 315, 1, 301, 0),
(112, 'I have no previous relevant work experience.', 315, 0, 301, 0),
(113, 'We make digital learning games. ', 303, 2, 302, 0),
(114, 'We make commercial games.', 304, 1, 302, 0),
(115, 'We make online casino games.', 305, 0, 302, 0),
(116, 'This is not related to games. ', 306, 0, 302, 0),
(117, 'Yes, but there is always room for personal development.', 314, 1, 303, 0),
(118, 'No, I need some systematic approach.', 314, 1, 303, 0),
(119, 'I have a lot of experience in development. I can share my knowledge with others.', 314, 1, 304, 0),
(120, 'I\'m looking for cool game ideas on what I can contribute as a developer. ', 315, 0, 304, 0),
(121, 'No, this is a business.', 314, 1, 305, 0),
(122, 'Yes, if you lose money.', 315, -1, 305, 0),
(123, 'Yes, you can learn how the law of probability works.', 315, 0, 305, 0),
(124, 'I can introduce the development process to fellow students.', 314, 1, 306, 0),
(125, 'I can provide internship positions to fellow students.', 314, 1, 306, 0),
(126, 'There is nothing related to learning games.', 315, -1, 307, 0),
(127, 'I make freehand paintings.', 316, 1, 307, 0),
(128, 'I make digital art with the help of 2D or 3D software. ', 316, 1, 307, 0),
(129, 'I compose sounds.', 316, 1, 307, 0),
(130, 'I make animations.', 316, 1, 307, 0),
(131, 'I use artificial intelligence to create computer art.', 308, -1, 307, 0),
(132, 'Yes, why not.', 315, -1, 308, 0),
(133, 'No, not really.', 314, 1, 308, 0),
(134, 'Kindergarden.', 310, 1, 309, 0),
(135, 'Primary School.', 310, 1, 309, 0),
(136, 'Gymnasium or high school.', 310, 1, 309, 0),
(137, 'Higher education (college or university).', 310, 1, 309, 0),
(138, 'Vocational training. ', 310, 1, 309, 0),
(139, 'Languages. ', 311, 1, 310, 0),
(140, 'STEM. ', 311, 1, 310, 0),
(141, 'Art.', 311, 1, 310, 0),
(142, 'Social sciences. ', 311, 1, 310, 0),
(143, 'Yes.', 312, 1, 311, 0),
(144, 'No.', 313, 0, 311, 0),
(145, 'This forces me to learn new things.', 314, 1, 312, 0),
(146, 'I like to see when people acquire new skills. ', 314, 1, 312, 0),
(147, 'I don\'t know why.', 315, 0, 312, 0),
(148, 'Students are stupid.', 315, -1, 313, 0),
(149, 'Thanks to AI there is a lot of cheating.', 314, 1, 313, 0),
(150, 'Teaching is just the only thing I can do.', 315, 0, 313, 0),
(151, 'I play a lot.', 402, 1, 401, 0),
(152, 'I have made some games.', 408, 2, 401, 0),
(153, 'I don\'t play games. ', 409, 0, 401, 0),
(154, 'I\'m a big fan of strategy games. ', 403, 1, 402, 0),
(155, 'I\'m a hardcore action gamer. ', 403, 1, 402, 0),
(156, 'I play casual smartphone games. ', 403, 1, 402, 0),
(157, 'I prefer table and card games.', 403, 1, 402, 0),
(158, 'I enjoy socialising with other players.', 404, 1, 403, 0),
(159, 'Collecting points and finishing all levels is the most enjoyable aspect.', 405, 1, 403, 0),
(160, 'Exploring new things and places motivate me the most.', 406, 1, 403, 0),
(161, 'Competition with other players and winning them is the biggest satisfaction.', 407, 1, 403, 0),
(162, 'I really don\'t know. I just play. ', 410, 0, 403, 0),
(163, 'No, friends are just the most enjoyable factor of the game.', 410, 1, 404, 0),
(164, 'Probably yes.', 410, 0, 404, 0),
(165, 'If they don\'t play they are not my friends.', 411, -1, 404, 0),
(166, 'They have no choice. I\'ll make them play. ', 411, -1, 404, 0),
(167, 'Are there any games like that? ', 412, -1, 405, 0),
(168, 'I will never play such a game.', 411, 0, 405, 0),
(169, 'They are okay although, not my first preference.', 410, 1, 405, 0),
(170, 'Shooting and kicking everything that moves.', 411, -1, 406, 0),
(171, 'Constructing new things.', 411, 0, 406, 0),
(172, 'Find hidden objects and solve puzzles. ', 410, 1, 406, 0),
(173, 'No worries, I\'m a brave loser.', 410, 1, 407, 0),
(174, 'What do you mean? I always win. ', 411, -1, 407, 0),
(175, 'I\'ll play till I win.', 410, 1, 407, 0),
(176, 'I work for a game studio.', 410, 1, 408, 0),
(177, 'I have made a game as a result of a study project.', 410, 1, 408, 0),
(178, 'I have developed a game just for fun.', 410, 1, 408, 0),
(179, 'I have made a desktop game.', 410, 1, 408, 0),
(180, 'I have made a slideshow that looks like a game.', 411, 0, 408, 0),
(181, 'I have made a web pages for online stores.', 411, -1, 408, 0),
(182, 'In my opinion, playing games is a waste of time.', 411, 0, 409, 0),
(183, 'I want to become a game designer, not a game player.', 411, -1, 409, 0),
(184, 'Games are very addictive and I don\'t need another addiction.', 410, 1, 409, 0),
(185, 'Yes, teamwork is my middle name.', 502, 1, 501, 0),
(186, 'No, if possible I prefer to work alone.', 503, -1, 501, 0),
(187, 'I don\'t have any preferences.', 504, 0, 501, 0),
(188, 'Possibility to learn from each other.', 505, 1, 502, 0),
(189, 'Potential to generate good ideas. ', 505, 1, 502, 0),
(190, 'Better control over the quality. ', 505, 0, 502, 0),
(191, 'Possibility to contribute less and let the team members complete all the work.', 505, -1, 502, 0),
(192, 'Because some team members have low motivation and others have to complete their job. ', 505, 1, 503, 0),
(193, 'I hate people!', 505, -1, 503, 0),
(194, 'I have no idea.', 505, 0, 503, 0),
(195, 'I have not had a lot of teamwork experience.', 505, 0, 504, 0),
(196, 'I would like to learn some team management skills first. ', 505, 1, 504, 0),
(197, 'I don\'t want to be controlled by others and I don\'t want to control others.', 505, -1, 504, 0),
(198, 'Developer.', 506, 1, 505, 0),
(199, 'Artist.', 506, 1, 505, 0),
(200, 'Sound designer.', 506, 1, 505, 0),
(201, 'Instructional designer.', 506, 1, 505, 0),
(202, 'Marketing specialist.', 506, 1, 505, 0),
(203, 'Project Manager.', 506, 1, 505, 0),
(205, 'Bookkeeper.', 507, -1, 505, 0),
(206, 'Driver.', 507, -1, 505, 0),
(207, 'Security.', 507, -1, 505, 0),
(208, 'I have all the competencies I need. ', 602, 0, 601, 0),
(209, 'I need a systematic approach on how to design games. ', 606, 1, 601, 0),
(210, 'I need skills in how to disseminate and sell games.', 607, -1, 601, 0),
(211, 'I need a visa for the EU. ', 603, -80, 602, 0),
(212, 'I\'m looking for a romantic relationship with an Estonian.', 603, -80, 602, 0),
(213, 'For networking. I\'m looking for highly motivated and skilful people to start a game studio. ', 604, 0, 602, 0),
(214, 'There is always space for self-development.', 605, 1, 602, 0),
(215, 'Conducting collaborative study projects is the best opportunity to learn to know people and their competencies.', 606, 1, 604, 0),
(216, 'Maybe I should do that.', NULL, -1, 604, 1),
(217, 'I didn\'t know that this kind of networks and events exist.', 608, 0, 604, 0),
(218, 'How to design engaging and educational game challenges?', 606, 1, 605, 0),
(219, 'How do you design game mechanics? ', 606, 1, 605, 0),
(220, 'How to create beautiful and meaningful game assets?', 606, 1, 605, 0),
(221, 'How to create learning management environments? ', 607, -1, 605, 0),
(222, 'How to create a game startup? ', 607, -1, 605, 0),
(223, 'I don\'t know.', 607, 0, 605, 0),
(224, 'I would like to design a game that promotes critical thinking.', 702, 1, 701, 0),
(225, 'I would like to create an environment for interactive tests.', 703, 0, 701, 0),
(226, 'I would like to make a game like a Counter-Strike but better.', 707, -1, 701, 0),
(227, 'I would like to develop critical thinking skills in me.', 709, 0, 702, 0),
(228, 'There are too many stupid people out there. ', 709, -1, 702, 0),
(229, 'Because the lack of critical thinking is a risk to democracy and human rights.', 708, 1, 702, 0),
(230, 'They will be more interactive.', 704, 0, 703, 0),
(231, 'They will be heavily illustrated with graphics and sounds so the player doesn\'t realise they are actual tests. ', 708, 1, 703, 0),
(232, 'Tests are gamified with several game elements. ', 706, 0, 703, 0),
(233, 'Test plays different sounds in the case of the correct or wrong answer. ', 705, -1, 704, 0),
(234, 'The next question depends on the correctness of the previous answer. ', 705, 0, 704, 0),
(235, 'Answering options are randomly selected from the bigger array. ', 708, 1, 704, 0),
(236, 'Yes.', 709, -1, 705, 0),
(237, 'I don\'t know.', 709, 0, 705, 0),
(238, 'Probably no.', 709, 1, 705, 0),
(239, 'Points and badges.', 709, -1, 705, 0),
(240, 'Game story.', 709, 0, 706, 0),
(241, 'Escape room kind of challenges.', 708, 1, 706, 0),
(242, 'That war is bad.', 709, 0, 707, 0),
(243, 'How to kill people effectively.', 709, -1, 707, 0),
(244, 'Have a more realistic experience of tactic operations.', 708, 1, 707, 0),
(245, 'Working in the game industry. ', 802, 1, 801, 0),
(246, 'Founder of an EdTec startup.', 810, 1, 801, 0),
(247, 'PhD student.', 901, 1, 801, 0),
(248, 'Teacher who is using games in education. ', 818, 1, 801, 0),
(249, 'Dunno. Too early to tell. ', 816, 0, 801, 0),
(250, 'A cashier in a supermarket.', 819, -1, 801, 0),
(251, 'I don\'t care about the educational aspects of games. This is simply something I have to accept to study in the DLG programme. ', 803, -80, 802, 0),
(252, 'I plan to use this knowledge in my everyday work. ', 804, 1, 802, 0),
(253, 'I think that all games have learning inside them and that commercial games can be made better if they integrate this into their design. ', 805, 1, 802, 0),
(254, 'I have no idea. ', 816, 0, 802, 0),
(255, 'I would like to motivate my coworkers with the help of gamification.', 806, 1, 804, 0),
(256, 'I would like to create educational games that help to learn different aspects of everyday work. ', 805, 1, 804, 0),
(257, 'I would like to organise a video game club to release the stress of my co-workers.', 816, 0, 804, 0),
(258, 'This is the use of game elements in a non-game environment.', 807, 1, 806, 0),
(259, 'This is the use of games for learning purposes.', 808, -1, 806, 0),
(260, 'This is creating games for serious purposes.', 809, -1, 806, 0),
(261, 'Definitely.', 811, 1, 810, 0),
(262, 'Maybe.', 814, 0, 810, 0),
(263, 'No.', 815, -1, 810, 0),
(264, 'This is too early to tell. ', 816, 0, 811, 0),
(265, 'I have some ideas but I don\'t want to reveal them. You will steal them and become rich.', 812, 0, 811, 0),
(266, 'One of my ideas is related to games as a tool for job place learning and digital transformation. ', 805, 1, 811, 0),
(267, 'I would like to focus on creating language learning games for languages that don\'t have state-language status in any country. ', 813, 1, 811, 0),
(268, 'Yes, business is a serious thing. ', 816, -1, 812, 0),
(269, 'No, I\'m joking of course.', 816, 0, 812, 0),
(270, 'We\'ll see.', 816, 0, 813, 0),
(271, 'Good point.', 901, 1, 813, 0),
(272, 'Market needs.', 901, 1, 814, 0),
(273, 'Competencies of our team members. ', 901, 1, 814, 0),
(274, 'How many good ideas we will manage to generate? ', 901, 1, 814, 0),
(275, 'Games are not suitable tools for learning. ', 816, -1, 815, 0),
(276, 'Games are fun but learning must be serious.', 816, -1, 815, 0),
(277, 'Creating games is too time and resource-consuming. There are better ways to engage and teach students.', 817, 0, 815, 0),
(278, 'Project-based learning. ', 901, 1, 817, 0),
(279, 'Flipped classroom.', 901, 1, 817, 0),
(280, 'Slideshow-based lectures. ', 816, -1, 817, 0),
(281, 'For increasing my students\' motivation.', 805, 1, 818, 0),
(282, 'For teaching new knowledge.', 805, 1, 818, 0),
(283, 'For collecting information.', 805, 1, 818, 0),
(284, 'For changing my students\' behaviour.', 805, 1, 818, 0),
(285, 'Just for fun. ', 816, -1, 818, 0),
(286, 'I need to study something. ', 816, 0, 819, 0),
(287, 'I have no good answer for that.', 816, 0, 819, 0),
(288, 'I don\'t have any specific topics yet.', 902, 0, 901, 0),
(289, 'I can study whatever topic you ask me to research.', 903, -1, 901, 0),
(290, 'First I would like to study the trends in game research. ', 904, 1, 901, 0),
(291, 'I would like to focus on the study of knowledge acquisition among players or students. ', 904, 1, 901, 0),
(292, 'I would like to study the implementation of modern game development tools in educational game design.', 904, 1, 901, 0),
(293, 'I would like to evaluate games created by teachers or students.', 904, 1, 901, 0),
(294, 'No, not really.', 1002, 0, 1001, 0),
(295, 'Yes. I\'m afraid of weather conditions.', 1003, 1, 1001, 0),
(296, 'I have heard that Estonians like social distance.', 1004, 1, 1001, 0),
(297, 'I have some issues with perfectionism. I must be the best student. ', 1005, 0, 1001, 0),
(298, 'I was searching on the internet for master\'s programmes and games. ', 1102, 1, 1101, 0),
(299, 'I have a friend in Estonia who recommended this programme to me. ', 1106, 1, 1101, 0),
(300, 'I have a relative in Estonia.', 1107, 1, 1101, 0),
(301, 'The influencer I follow mentioned DLG in her live stream session.', 1108, 1, 1101, 0),
(302, 'I visited a public seminar where learning possibilities in Estonia were introduced.', 1109, 1, 1101, 0),
(303, 'I attended an online session where TLU international programmes were introduced.', 1109, 1, 1101, 0),
(304, 'I got this information from a social media community.', 1110, 1, 1101, 0),
(305, 'Your study fee is more affordable compared to others. ', 1103, 0, 1102, 0),
(306, 'I like the uniqueness of combining games and education. ', 1104, 1, 1102, 0),
(307, 'I did not. I applied also for other programmes but they did not accept me. ', 1105, -1, 1102, 0),
(308, 'Yes.', 1111, -1, 1103, 0),
(309, 'No, I also like the content of the DLG programme.', 1104, 1, 1103, 0),
(310, 'Yes.', 1111, 0, 1106, 0),
(311, 'I don\'t know.', 1201, 0, 1105, 0),
(312, 'I will. ', 1201, 0, 1106, 0),
(313, 'Thank you.', 1201, 0, 1106, 0),
(314, 'Yes, family always comes first.', 1111, -1, 1107, 0),
(315, 'No, but having family members close is also supportive. ', 1104, 0, 1107, 0),
(316, 'No. Everything is clear. ', NULL, 0, 1201, 1),
(317, 'Do you offer any scholarships? ', 1202, 0, 1201, 0),
(318, 'Do you provide internship options?', 1203, 1, 1201, 0),
(319, 'Do I need a visa for traveling to your country? ', 1204, 0, 1201, 0),
(320, 'Do I need to learn specific game development tools before starting my studies at DLG?', 1205, 1, 1201, 0),
(321, 'How big is the study group?', 1206, 1, 1201, 0),
(322, 'Can I work in parallel with my studies?', 1207, 0, 1201, 0),
(323, 'I have some health issues. How can I find a doctor in Estonia? ', 1208, 0, 1201, 0),
(324, 'Do you involve students in professional game development projects?', 1209, 1, 1201, 0),
(365, 'Okay.', NULL, 0, 6, 1),
(366, 'Okay.', 201, 0, 110, 0),
(367, 'Okay.', 201, 0, 111, 0),
(368, 'Okay.', 201, 0, 112, 0),
(369, 'Okay.', 301, 0, 210, 0),
(370, 'Okay.', 301, 0, 211, 0),
(371, 'Okay.', 401, 0, 314, 0),
(372, 'Okay.', 401, 0, 315, 0),
(373, 'Okay.', 401, 0, 316, 0),
(374, 'Okay.', 405, 0, 412, 0),
(375, 'Okay.', 501, 0, 410, 0),
(376, 'Okay.', 601, 0, 506, 0),
(377, 'Okay.', 601, 0, 507, 0),
(378, 'Okay.', 701, 0, 606, 0),
(379, 'Okay.', 701, 0, 607, 0),
(380, 'Okay.', 701, 0, 608, 0),
(381, 'Okay.', 801, 0, 708, 0),
(382, 'Okay.', 801, 0, 709, 0),
(383, 'Okay.', NULL, 0, 803, 1),
(384, 'Okay.', 901, 0, 805, 0),
(385, 'Okay.', 901, 0, 807, 0),
(386, 'Okay.', 901, 0, 808, 0),
(387, 'Okay.', 901, 0, 809, 0),
(388, 'Okay.', 901, 0, 816, 0),
(389, 'Okay.', 1001, 0, 902, 0),
(390, 'Okay.', 1001, 0, 903, 0),
(391, 'Okay.', 1001, 0, 904, 0),
(392, 'Okay.', 1101, 0, 1002, 0),
(393, 'Okay.', 1001, 0, 1003, 0),
(394, 'Okay.', 1001, 0, 1004, 0),
(395, 'Okay.', 1001, 0, 1005, 0),
(396, 'Okay.', 1201, 0, 1104, 0),
(397, 'Okay.', 1201, 0, 1108, 0),
(398, 'Okay.', 1201, 0, 1109, 0),
(399, 'Okay.', 1201, 0, 1110, 0),
(400, 'Okay.', 1201, 0, 1111, 0),
(401, 'Okay.', 1201, 0, 1202, 0),
(402, 'Okay.', 1201, 0, 1203, 0),
(403, 'Okay.', 1201, 0, 1204, 0),
(405, 'Okay.', 1201, 0, 1205, 0),
(406, 'Okay.', 1201, 0, 1206, 0),
(407, 'Okay.', 1201, 0, 1207, 0),
(408, 'Okay.', 1201, 0, 1208, 0),
(409, 'Okay.', 1201, 0, 1209, 0),
(410, 'Okay.', NULL, 0, 603, 1),
(411, 'Okay.', 501, 0, 411, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Form`
--

CREATE TABLE `Form` (
  `form_id` int(100) NOT NULL,
  `form_name` varchar(100) DEFAULT NULL,
  `form_age` int(100) DEFAULT NULL,
  `form_country` varchar(100) DEFAULT NULL,
  `form_education` varchar(100) DEFAULT NULL,
  `form_work` varchar(100) DEFAULT NULL,
  `form_hobby` varchar(100) DEFAULT NULL,
  `form_kids` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Leaderboard`
--

CREATE TABLE `Leaderboard` (
  `leaderboard_id` int(11) NOT NULL,
  `User_Result_result_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `question_id` int(11) NOT NULL,
  `question_text` varchar(1000) NOT NULL,
  `question_form` tinyint(1) DEFAULT NULL,
  `question_end` tinyint(1) DEFAULT NULL,
  `question_comment` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`question_id`, `question_text`, `question_form`, `question_end`, `question_comment`) VALUES
(1, 'Hi! Are you ready for the\r\nadmission interview?', 0, 0, 0),
(2, 'My name is Martin Sillaots and I\'m the head of the Digital\nLearning Games master\'s programme.\nMy name is Peadar Callaghan. I\'m a graduate of the DLG\nprogramme and a teacher in this programme.\nMy name is Mikhail Fiadotau and I\'m a teacher in this programme.\nPlease, introduce yourself, your background and your interest in\nthe DLG programme.', 1, 0, 0),
(3, ' So what should we do then?', 0, 0, 0),
(4, 'Sure. Our study counsellor will contact you and arrange another time for the interview.\r\n', 0, 0, 0),
(5, 'Relax. Take a deep breath. There is no need to be worried. We are all friendly people here and we are sure you are going to do fine.', 0, 0, 0),
(6, ' We respect your decision. We wish you good luck in your studies.', 0, 1, 0),
(7, 'This is a DLG admission interview. You applied to Dream Apply and our study counsellor scheduled a meeting with you for the interview.', 0, 0, 0),
(8, 'Is the number of kids the most important factor in starting your studies?', 1, 0, 0),
(9, 'It\'s always interesting to know what students\' hobbies and interests are. Is this something that defines you or influences your studies?', 1, 0, 0),
(101, 'Why are you interested in Digital Learning Games?', 0, 0, 0),
(102, 'I see. But how this is related to learning?', 0, 0, 0),
(103, 'This is a valuable skill indeed but this is not the focus of the DLG programme. What does the word \"Learning\" in the DLG programme name mean to you?', 0, 0, 0),
(104, 'Yes, of course, you will learn how to make games but our focus is on games that can be used as learning tools or activities.', 0, 0, 0),
(105, 'Well, we want you to tell us what learning means to you.', 0, 0, 0),
(106, 'Can you tell me more about why it is important to use games as teaching tools?', 0, 0, 0),
(107, 'Can you tell me more about why it is important to create games that teach something?', 0, 0, 0),
(109, 'What kind of social issues?', 0, 0, 0),
(110, 'Very good! Let\'s move on.', 0, 0, 1),
(111, 'Alright. Let\'s move on.', 0, 0, 1),
(112, 'Seriously?', 0, 0, 1),
(201, 'What is your current level of education?\r\n', 0, 0, 0),
(202, 'What happens if you don\'t finish your bachelor studies this year?', 0, 0, 0),
(203, 'What is the field you study?', 0, 0, 0),
(204, ' We have seen that having a master\'s degree is a potential risk for acquiring another one. What is your opinion about this?\r\n', 0, 0, 0),
(205, ' Have you had any experience with learning games during your previous studies?', 0, 0, 0),
(206, ' What games you have played as a student?', 0, 0, 0),
(207, 'Were those videos interactive?', 0, 0, 0),
(208, 'Were you able to choose between alternative storylines?', 0, 0, 0),
(209, 'What makes solving cases a game?', 0, 0, 0),
(210, 'Very interesting.', 0, 0, 1),
(211, ' Alright. Let\'s move on.', 0, 0, 1),
(301, 'What is your previous work experience?', 0, 0, 0),
(302, 'Can you tell me a bit more? What does your company do?', 0, 0, 0),
(303, 'So you already have experience in making learning games?', 0, 0, 0),
(304, 'How can this experience be used in your studies?', 0, 0, 0),
(305, '', 0, 0, 0),
(306, ' How can this knowledge be transferred to learning game development?', 0, 0, 0),
(307, ' What kind of art do you make?', 0, 0, 0),
(308, 'Is this art?', 0, 0, 0),
(309, ' On what level do you teach?', 0, 0, 0),
(310, 'What is the subject you teach?', 0, 0, 0),
(311, 'Do you like teaching?', 0, 0, 0),
(312, 'Why do you like teaching?', 0, 0, 0),
(313, ' Why you don\'t like teaching?', 0, 0, 0),
(314, 'Good point.', 0, 0, 1),
(315, 'Alright then.', 0, 0, 1),
(316, 'Very good.', 0, 0, 1),
(401, 'What is your previous experience with games?', 0, 0, 0),
(402, 'What kind of games do you play?', 0, 0, 0),
(403, 'I see. And what aspect of gaming do you enjoy the most?\r\n', 0, 0, 0),
(404, 'If your friends don\'t play, will you also not play?\r\n', 0, 0, 0),
(405, ' What do you think about games that don\'t provide points and badges?', 0, 0, 0),
(406, 'What kind of exploration do you enjoy the most?', 0, 0, 0),
(407, 'And what happens if you lose?', 0, 0, 0),
(408, 'What kind of games you have made?\r\n', 0, 0, 0),
(409, 'Why not?', 0, 0, 0),
(410, 'Very interesting.', 0, 0, 1),
(411, 'I see.', 0, 0, 1),
(412, 'Yes.', 0, 0, 1),
(501, 'Games are usually a result of teamwork. Are you a team player?', 0, 0, 0),
(502, 'What is the thing you appreciate most in teamwork?', 0, 0, 0),
(503, 'Why you don\'t like teamwork?', 0, 0, 0),
(504, 'Why is that so?', 0, 0, 0),
(505, 'What kind of role you would like to take in the learning game development team?\r\n', 0, 0, 0),
(506, 'Good!', 0, 0, 1),
(507, 'This sounds irrelevant for making games.', 0, 0, 1),
(601, 'What you would like to learn during your studies in DLG?\r\n', 0, 0, 0),
(602, 'So why do you apply for the DLG programme then?\r\n', 0, 0, 0),
(603, 'Thank you for your honest response but this is not something we tolerate here.', 0, 1, 0),
(604, 'It is always good to have somebody who takes initiative but why don\'t you join with game developers association meetups and game jams?\r\n', 0, 0, 0),
(605, ' What subject is most important for you?', 0, 0, 0),
(606, 'This is a very good answer.', 0, 0, 1),
(607, 'It seems that you are not familiar with our programme. ', 0, 0, 1),
(608, 'Well, now you know.', 0, 0, 1),
(701, 'Please suggest one idea for a new learning game.', 0, 0, 0),
(702, 'Why is this an important topic in your opinion?\r\n', 0, 0, 0),
(703, 'How is this different from already existing interactive test environments?\r\n', 0, 0, 0),
(704, 'Can you provide an example?', 0, 0, 0),
(705, 'Is this enough interaction for a game?', 0, 0, 0),
(706, 'What game elements you would like to use?', 0, 0, 0),
(707, 'What players will learn while playing this game?', 0, 0, 0),
(708, 'Good idea.', 0, 0, 1),
(709, 'Alright then.', 0, 0, 1),
(801, 'Who do you see yourself as in 5 years?', 0, 0, 0),
(802, 'How do you plan to implement what you learn during your studies in the field of teaching and education?', 0, 0, 0),
(803, 'Thank you for your honest response but maybe the DLG programme is not the right option for you.', 0, 1, 0),
(804, 'Can you provide an example?', 0, 0, 0),
(805, 'This is a good idea.', 0, 0, 1),
(806, 'What is gamification for you?', 0, 0, 0),
(807, 'Yes, this is a possible definition of gamification. ', 0, 0, 1),
(808, 'This is not gamification but game-based learning.', 0, 0, 1),
(809, 'This is not gamification but a serious game design.', 0, 0, 1),
(810, 'Is this company making learning games?', 0, 0, 0),
(811, 'What kind of games?', 0, 0, 0),
(812, 'Are you serious?', 0, 0, 0),
(813, 'This is a good idea, but how profitable is this?', 0, 0, 0),
(814, 'This depends on what?', 0, 0, 0),
(815, 'Why not?', 0, 0, 0),
(816, 'Okay?', 0, 0, 1),
(817, 'Can you make an example?', 0, 0, 0),
(818, 'For what educational aspect you would like to use the game?', 0, 0, 0),
(819, 'Why do you need to study 2 years in a masters level for that?', 0, 0, 0),
(901, ' At the end of your studies you are asked to conduct a master\'s research project and write a master\'s thesis. What topic you would like to research?', 0, 0, 0),
(902, 'Fair enough. Hopefully, you will get some ideas during your studies.', 0, 0, 1),
(903, 'Sure, we have some open topics for research but we suggest you provide your ideas because ownership is good for motivation.', 0, 0, 1),
(904, 'This is a good idea.', 0, 0, 1),
(1001, 'Do you have any concerns about starting your studies in Estonia?', 0, 0, 0),
(1002, 'Nice to see that you like challenges.', 0, 0, 1),
(1003, 'Yes, Estonian weather is like bad skiing weather - newer enough snow. There is no bad weather, there are wrong clothes. Bring something warm to wear or buy them second-hand here. An alpine skiing suit is an appropriate thing to wear over even formal wear.', 0, 0, 1),
(1004, 'Yes, after the pandemic Estonians were happy to move from the 2m restriction back to the 5m distance they normally have. But the DLG programme has a lot of international students and we pride ourselves in being open, friendly and inclusive.', 0, 0, 1),
(1005, ' We can see you are a very competitive student, but keep in mind, sometimes less is more.', 0, 0, 1),
(1101, 'How did you hear about us?', 0, 0, 0),
(1102, 'Why did you decide to select us?\r\n', 0, 0, 0),
(1103, 'Is this the main criteria for selecting DLG?', 0, 0, 0),
(1104, 'Good to know.', 0, 0, 1),
(1105, 'So DLG is like a last option for you?', 0, 0, 0),
(1106, 'Say hello and thank you to your friend.', 0, 0, 0),
(1107, 'Is your main reason for applying the reuniting your family?', 0, 0, 0),
(1108, 'Nice to see that influencers have noticed us.', 0, 0, 1),
(1109, 'Nice to see that our marketing people are doing a good job.', 0, 0, 1),
(1110, 'Nice to know that such communities exist.', 0, 0, 1),
(1111, 'I see.', 0, 0, 1),
(1201, ' Do you have any questions for us?', 0, 0, 0),
(1202, 'Best students are allowed to apply for TLU and state scholarships but they don\'t cover the full study fee and living costs. So we don\'t recommend you plan your financial support only on scholarships. ', 0, 0, 1),
(1203, 'Internship is a mandatory course in the DLG programme. One learning outcome we want you to achieve during this course is the ability to create contacts and find an internship position. We can provide you with contacts if this task is too challenging for you.', 0, 0, 1),
(1204, 'You are from [country] so [yes, you need a visa / you don\'t need a visa]. To make sure, please check this information from our Ministry of Foreign Affairs website.', 1, 0, 1),
(1205, 'This is not necessary. You will learn all the tools you need here. But if you would like to prepare yourself before your studies begin, we recommend some online courses that teach you how to develop games with Unity.', 0, 0, 1),
(1206, 'This depends on how many candidates we have and what are the admission results. Before the pandemic, we had 30 students. When Corona kicked in the number dropped to 10. The expected size of the study group now is between 15 - 20 students.\r\n', 0, 0, 1),
(1207, 'Yes. You are allowed to work with your study visa. Our classes are scheduled in the evenings to allow students to work during the daytime. But please, make sure that work is not negatively impacting your study.', 0, 0, 1),
(1208, 'We don\'t have an answer to this question but we can help you to find this out when you are here.', 0, 0, 1),
(1209, 'Yes we do. Most of our game development projects are financed by the EU or Estonian government. Students are involved with real projects through the LIFE course. Sometimes we hire students directly for game development teams. One example of such a project is Methodyca - a game about research methods.', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `User_Result`
--

CREATE TABLE `User_Result` (
  `result_id` int(11) NOT NULL,
  `result_score` int(11) NOT NULL,
  `result_time` time DEFAULT NULL,
  `result_name` varchar(100) DEFAULT NULL,
  `Form_form_id` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Analytics`
--
ALTER TABLE `Analytics`
  ADD PRIMARY KEY (`analytics_id`),
  ADD KEY `Analytics_Answer` (`Answer_answer_id`),
  ADD KEY `Analytics_Question` (`Question_question_id`),
  ADD KEY `Form_form_id_fk` (`Form_form_id`);

--
-- Indexes for table `Answer`
--
ALTER TABLE `Answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `Answer_Question` (`Question_question_id`);

--
-- Indexes for table `Form`
--
ALTER TABLE `Form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `Leaderboard`
--
ALTER TABLE `Leaderboard`
  ADD PRIMARY KEY (`leaderboard_id`),
  ADD KEY `Leaderboard_User_Result` (`User_Result_result_id`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `User_Result`
--
ALTER TABLE `User_Result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `Form_form_id_fk` (`Form_form_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Analytics`
--
ALTER TABLE `Analytics`
  MODIFY `analytics_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Answer`
--
ALTER TABLE `Answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT for table `Form`
--
ALTER TABLE `Form`
  MODIFY `form_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Leaderboard`
--
ALTER TABLE `Leaderboard`
  MODIFY `leaderboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1210;

--
-- AUTO_INCREMENT for table `User_Result`
--
ALTER TABLE `User_Result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Analytics`
--
ALTER TABLE `Analytics`
  ADD CONSTRAINT `Analytics_Answer` FOREIGN KEY (`Answer_answer_id`) REFERENCES `Answer` (`answer_id`),
  ADD CONSTRAINT `Analytics_Form` FOREIGN KEY (`Form_form_id`) REFERENCES `Form` (`form_id`),
  ADD CONSTRAINT `Analytics_Question` FOREIGN KEY (`Question_question_id`) REFERENCES `Question` (`question_id`);

--
-- Constraints for table `Answer`
--
ALTER TABLE `Answer`
  ADD CONSTRAINT `Answer_Question` FOREIGN KEY (`Question_question_id`) REFERENCES `Question` (`question_id`);

--
-- Constraints for table `Leaderboard`
--
ALTER TABLE `Leaderboard`
  ADD CONSTRAINT `Leaderboard_User_Result` FOREIGN KEY (`User_Result_result_id`) REFERENCES `User_Result` (`result_id`);

--
-- Constraints for table `User_Result`
--
ALTER TABLE `User_Result`
  ADD CONSTRAINT `User_Result` FOREIGN KEY (`Form_form_id`) REFERENCES `Form` (`form_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
