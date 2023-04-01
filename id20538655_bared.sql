-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2023 at 12:27 AM
-- Server version: 10.5.16-MariaDB
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
-- Database: `id20538655_bared`
--

-- --------------------------------------------------------

--
-- Table structure for table `cocktail`
--

CREATE TABLE `cocktail` (
  `cocktail_id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ingredients` text NOT NULL,
  `equipment` text NOT NULL,
  `method` text NOT NULL,
  `picture_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cocktail`
--

INSERT INTO `cocktail` (`cocktail_id`, `name`, `ingredients`, `equipment`, `method`, `picture_id`) VALUES
(401, 'Pornstar Martini', '25ml - Vodka<br>\r\n25ml - Passoa<br>\r\n25ml - Passionfruit Purée<br>\r\n50ml - Pineapple Juice<br>\r\n25ml - Lemon Juice<br>\r\n25ml - Sugar Syrup<br>\r\n<b>Garnish</b><br>\r\nSliced Passionfruit ', 'Shaker<br> \n25ml Shot Measure<br> \nCubed Ice<br> \nCoupe Glass<br>\nSingle Strainer<br> \nDouble Strainer ', 'Pour all ingredients into shaker and shake with cubed ice for approximately 20 seconds<br>\nPlace single strainer on top of shaker and pour through the double strainer into the coupe glass<br>\nPlace a sliced passionfruit on top for garnish<br> \nServe \n\n\n', 'pornstarMartini.png'),
(402, 'Solero', '37.5ml - Vodka<br>\r\n12.5ml - Passoa<br>\r\n25ml - Passionfruit Purée<br>\r\n25ml - Lime Juice<br> \r\n25ml - Sugar Syrup<br>\r\n<b>Garnish</b><br>\r\nSliced Passionfruit', 'Shaker<br> \r\n25ml Shot Measure<br> \r\nCubed Ice<br> \r\nCrushed Ice<br>\r\nHighball Glass<br>\r\nSingle Strainer \r\n', 'Pour all ingredients, except passoa, into shaker and shake with cubed ice for approximately 20 seconds<br>\nFill highball glass with crushed ice<br>\nPlace single strainer on top of shaker and pour into the highball glass<br>\nPour passoa on top<br>\nPlace a sliced passionfruit on top for garnish<br> \nServe \n', 'solero.png'),
(403, 'Mojito', '50ml - White Rum<br> \r\n25ml - Lime Juice<br> \r\n25ml - Sugar Syrup<br> \r\nSoda Water<br> \r\n6 - Mint Leaves<br> \r\n<b>Garnish</b><br>\r\nMint Sprig<br> \r\nLime Wedge ', 'Spoon<br>\n25ml Shot Measure<br>  \nCrushed Ice<br>\nSling Glass\n', 'Take 6 mint leaves and place them into the sling glass<br>\r\nPour all ingredients into the sling glass<br>\r\nHalf fill the sling glass with crushed ice \r\nUse the spoon to stir the ingredients for approximately 15 seconds<br> \r\nFill the rest of the sling glass with crushed ice<br>\r\nTop up with soda water<br> \r\nPlace a mint sprig and a lime wedge on top for garnish<br> \r\nServe ', 'mojito.png'),
(404, 'Whisky Sour', '50ml - Whisky<br>\r\n25ml - Lemon Juice<br>\r\n25ml - Sugar Syrup\r\n3 drops of foamer bitters<br>\r\n<b>Garnish</b><br>\r\nLemon Slice', 'Shaker<br> \r\n25ml Shot Measure<br> \r\nCubed Ice<br> \r\nRocks Glass<br>\r\nSingle Strainer', 'Pour all ingredients into shaker and shake with cubed ice for approximately 20 seconds<br>\r\nAdd cubed ice to rocks glass<br>\r\nPlace single strainer on top of shaker and pour into the rocks glass<br>\r\nPlace a lemon slice on top for garnish<br> \r\nServe \r\n\r\n\r\n', 'whiskySour.png'),
(405, 'Aperol Spritz', '50ml - Aperol<br> \r\n125ml - Prosecco<br> \r\nSoda Water<br>\r\n<b>Garnish</b><br>\r\nOrange Slice', '25ml Shot Measure<br>  \r\nCubed Ice<br>\r\nGoblet Glass\r\n', 'Pour cubed ice into goblet<br> \r\nBuild ingredients in goblet<br> \r\nPlace orange slice on top for garnish\r\n', 'aperolSpritz.png'),
(406, 'Strawberry Daiquiri ', '50ml - White Rum<br> \r\n50ml - Strawberry Purée<br>\r\n25ml - Lime Juice<br> \r\n25ml - Sugar Syrup<br> \r\n<b>Garnish</b><br>\r\nLime Wedge', 'Spoon<br>\n25ml Shot Measure<br>  \nCubed Ice<br>\nBlender<br> \nHurricane Glass\n', 'Pour all ingredients into blender jug<br>\nAdd two scoops of ice to the blender<br>\nBlend for about 15 seconds at medium speed<br>\nPour contents into hurricane glass, using a spoon if needed<br>\nGarnish with a lime wedge<br>\n<b>Note: Instructions are the same for any other flavour, only difference being the choice of purée</b>', 'strawberryDaiquiri.png'),
(407, 'Candyfloss Martini', '50ml - Vodka<br>\r\n25ml - Raspberry Purée<br>\r\n50ml - Cranberry Juice<br>\r\n25ml - Bubble Gum Syrup<br>\r\n<b>Garnish</b><br>\r\nCandyfloss', 'Shaker<br> \r\n25ml Shot Measure<br> \r\nCubed Ice<br> \r\nCoupe Glass<br>\r\nSingle Strainer<br> \r\nDouble Strainer ', 'Pour all ingredients into shaker and shake with cubed ice for approximately 20 seconds<br>\r\nPlace single strainer on top of shaker and pour through the double strainer into the coupe glass<br>\r\nPlace a piece of candyfloss on the rim of the coupe glass for garnish<br> \r\nServe<br>\r\n<b>Note: This cocktail is thick so takes longer than most cocktails to strain into glass.</b>\r\n\r\n\r\n\r\n', 'candyfloss.png'),
(408, 'Piña Colada', '50ml - Malibu<br> \r\n25ml - Pineapple Juice<br>\r\n25ml - Milk<br> \r\n25ml - Cream<br>\r\n25ml - Coconut Syrup<br> \r\n<b>Garnish</b><br>\r\nPineapple Slice', 'Spoon<br>\r\n25ml Shot Measure<br>  \r\nCubed Ice<br>\r\nBlender<br> \r\nHurricane Glass\r\n', 'Pour all ingredients into blender jug<br>\r\nAdd two scoops of ice to the blender<br>\r\nBlend for about 15 seconds at medium speed<br>\r\nPour contents into hurricane glass, using a spoon if needed<br>\r\nGarnish with a pineapple slice', 'pina.png'),
(409, 'Marshmallow Martini', '25ml - Vanilla Vodka<br>\r\n25ml - Frangelico<br>\r\n25ml - Milk<br>\r\n25ml - Cream<br>\r\n25ml - Sugar Syrup<br>\r\n<b>Garnish</b><br>\r\n6 Marshmallows', 'Shaker<br> \r\n25ml Shot Measure<br> \r\nCubed Ice<br> \r\nCoupe Glass<br>\r\nSingle Strainer<br> \r\nDouble Strainer<br>\r\nBlowtorch  ', 'Pour all ingredients into shaker and shake with cubed ice for approximately 20 seconds<br>\r\nPlace single strainer on top of shaker and pour through the double strainer into the coupe glass<br>\r\nPlace about 6 marshmallows on top for garnish<br> \r\nUse blowtorch to lightly cook the marshmallows<br>\r\nServe \r\n\r\n\r\n', 'mallow.png'),
(410, 'Mai Tai', '25ml - Appleton Estate Rum\r\n25ml - Grand Marnier<br> \r\n50ml - Pineapple<br> \r\n25ml - Orgeat Syrup<br>\r\n<b>Garnish</b><br>\r\nPineapple triangle<br>\r\nPineapple Leaf\r\n', 'Shaker<br> \r\n25ml Shot Measure<br> \r\nCubed Ice<br> \r\nHighball Glass<br>\r\nSingle Strainer', 'Pour all ingredients into shaker and shake with cubed ice for approximately 20 seconds<br>\r\nFill highball glass with cubed ice<br>\r\nPlace single strainer on top of shaker and pour into the highball glass<br>\r\nPlace a pineapple triangle and leaf on top for garnish<br> \r\nServe \r\n', 'maitai.png'),
(411, 'Fab Ice Lolly', '25ml - Vanilla Vodka<br>\r\n25ml - Milk<br> \r\n50ml - Cream<br> \r\n25ml - Strawberry Purée<br>\r\n25ml - Sugar Syrup<br>\r\n<b>Garnish</b><br>\r\nWhipped Cream<br>\r\nSprinkles\r\n', 'Shaker<br> \r\n25ml Shot Measure<br> \r\nCubed Ice<br> \r\nHurricane Glass<br>\r\nSingle Strainer', 'Pour all ingredients into shaker and shake with cubed ice for approximately 20 seconds<br>\r\nFill hurricane glass with cubed ice<br>\r\nPlace single strainer on top of shaker and pour into the highball glass<br>\r\nAdd whipped cream and sprinkles on top for garnish<br> \r\nServe \r\n', 'fab.png'),
(412, 'French Martini', '25ml - Vodka<br>\r\n25ml - Chambord<br>\r\n75ml - Pineapple Juice<br>\r\n<b>Garnish</b><br>\r\nRaspberry Purée Design', 'Shaker<br> \r\n25ml Shot Measure<br> \r\nCubed Ice<br> \r\nCoupe Glass<br>\r\nSingle Strainer<br> \r\nDouble Strainer ', 'Pour all ingredients into shaker and shake with cubed ice for approximately 20 seconds<br>\r\nPlace single strainer on top of shaker and pour through the double strainer into the coupe glass<br>\r\nWait approximately 15 seconds for the cocktail to settle. This allows for the purée to not sink.<br>\r\nPlace a few drops of raspberry purée and make a design of your choice<br> \r\nServe \r\n\r\n\r\n', 'french.png'),
(413, 'White Russian', '25ml - Vanilla Vodka<br>\r\n25ml - Coffee Liqueur<br> \r\n25ml - Milk<br> \r\n25ml - Cream<br>\r\n25ml - Sugar Syrup<br> \r\n<b>Garnish</b><br>\r\nChocolate Powder', 'Shaker<br> \r\n25ml Shot Measure<br> \r\nCubed Ice<br> \r\nRocks Glass<br>\r\nSingle Strainer ', 'Pour coffee liqueur at bottom of rocks glass<br>\r\nPour rest of ingredients into shaker and shake with cubed ice for approximately 20 seconds<br>\r\nFill rocks glass with cubed ice<br>\r\nPlace single strainer on top of shaker and pour into the rocks glass<br>\r\nPour chocolate powder on top for garnish<br> \r\nServe \r\n', 'whiteRussian.png');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `guide_id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(5) NOT NULL,
  `description` text DEFAULT NULL,
  `video_link` varchar(50) DEFAULT NULL,
  `picture_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`guide_id`, `name`, `type`, `description`, `video_link`, `picture_id`) VALUES
(301, 'Strawberry Daiquiri', 'video', 'Video showing how a frozen daiquiri cocktail is made, in this case being strawberry flavoured.', 'https://youtu.be/QlCJ62_l54U', 'strawberryDaiquiri.png'),
(302, 'Candyfloss Martini', 'video', 'Video showing how a candyfloss martini cocktail is made.', 'https://www.youtube.com/watch?v=RTdi4ebv4GA', 'candyfloss.png'),
(303, 'Aperol Spritz', 'video', 'Video showing how a aperol spritz cocktail is made.', 'https://www.youtube.com/watch?v=dLbGDiYgFfM', 'aperolSpritz.png'),
(304, 'Pouring Pints', 'text', 'When pouring a pint of beer you must always hold it at a 45 degree angle so that it is not too foamy, with the label of the glass facing the customer. Once filled make sure it is left with about an inch of foam. This can be achieved by pushing the nozzle away after the pint has been filled.', NULL, 'beer.png'),
(305, 'Pouring Guinness', 'text', 'When pouring a pint of Guinness you must always hold the glass at a 45 degree angle and fill to about three quarters of the glass. Leave it to settle for about a minute and a half, then push back on the nozzle to top it up. This technique allows for it to have a perfect head.', NULL, 'guinness.png'),
(306, 'Shaking Cocktails', 'text', 'When shaking a cocktail you must find out if the cocktail requires a wet or dry shake or both. A wet shake will involve shaking with some cubed ice in the shaker and a dry shake will only contain the cocktail contents. When shaking you should shake for approximately 15 seconds.  ', NULL, 'shaker.png'),
(307, 'Drink Prioritisation ', 'text', 'When you are given a list of drinks to make, either from a check or an order from a customer, you must prioritise which drinks should be made first in order to be efficient. It should be ordered from longest to make to quickest to make. For example if you have a cocktail and a vodka mix to make, you should always make the cocktail first. It also means that your vodka mix won\'t have too much of the ice melted by the time you are done finishing the order.', NULL, 'prioritisation.png'),
(308, 'Challenge 25', 'text', 'When serving a customer, it is a must to be polite but you must also make sure they are of age before serving alcohol. Challenge 25 means that, if they look under the age of 25, you should ask them for a form of identification to prove their age. If it so happens that you serve a customer who is under the legal age to drink, it can result in a closing down of the venue as well as legal trouble for you, possibly including a fine.', NULL, 'challenge25.png'),
(309, 'Serving Customers', 'text', 'When a customer is waiting to be served it is always important to reassure them that they will soon be served. If you are too busy serving another customer, tell the customer waiting that you will get them as soon as possible and continue to finish serving.', NULL, 'serving.png');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `security_question` varchar(50) NOT NULL,
  `security_answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `email`, `password`, `venue`, `security_question`, `security_answer`) VALUES
(601, 'johnny@sauce.com', '$2y$10$1ae/w0v25tshRXLdfK/p5uaR0utv2PzOAM30b0K6r.mRjoLBjzDYm', 'The Social', 'What was the brand of your first car?', 'toyota'),
(602, 'manager@hotmail.com', '$2y$10$eWQVH6GW5qgDlU7RwegsSu/zW8GwXOBBXslML.pIGxFp/BR.el1hK', 'The Shed', 'What is the name of your best friend?', 'James'),
(603, 'manager1@gmail.com', '$2y$10$Mly/7CCsXRdipNA59wOGj.yzNdpjmWq60EEfj.dQBHye4ItELJlwS', 'The Social', 'What is the name of your best friend?', 'John'),
(604, 'peteweapon@live.co.uk', '$2y$10$BMaAUc1DtZJa/euWeFV5oOgTdqgEjsNu9H8Ito3l6PGa43MibXihm', 'The Social', 'What is the name of your pet?', 'Pete ');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(3) NOT NULL,
  `question` text NOT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL,
  `answer4` text NOT NULL,
  `correct_answer` varchar(7) NOT NULL,
  `quiz_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct_answer`, `quiz_id`) VALUES
(201, 'Which glass is used for making a pornstar martini?', 'Highball.', 'Coupe.', 'Hurricane.', 'Rocks.', 'answer2', 101),
(202, 'What alcohol goes into a mojito?', 'Gin.', 'Dark rum.', 'Vodka.', 'White rum.', 'answer4', 101),
(203, 'Which ice is needed for making a solero?', 'Crushed.', 'Cubed.', 'Both.', 'No Ice.', 'answer3', 101),
(204, 'How many mint leaves are recommended for a mojito?', 'Six.', 'Five.', 'Four.', 'Three.', 'answer1', 101),
(205, 'Does the pornstar martini require a strainer?', 'Yes, the single and double strainer.', 'Yes, just the single strainer.', 'No, you build the ingredients in the glass.', 'Yes, just the double strainer.', 'answer1', 101),
(206, 'A customer approaches the bar who looks under the legal age to be drinking.<br>What should you do?', 'Challenge 25. Ask if they have identification proving they are over the legal age to drink (18).', 'Challenge 18. Ask if they have identification proving they are over the legal age to drink (18).', 'Ask them their age, their answer can be trusted.', 'Serve them anyway as you don\'t want to offend them.', 'answer1', 102),
(207, 'If you are serving a customer and another customer tries to get your attention<br>what should you do?', 'Ignore the customer.', 'Kick the customer out for interrupting your sale.', 'Pay attention to the customer and serve them straight away.', 'Inform the customer that you are serving someone and will get to them as soon as possible.', 'answer4', 102),
(208, 'How should a Guinness be poured to give it a perfect head?', '45 degree angle and poured to the top, giving about an inch of head.', '45 degree angle, fill it up to around three quarters of the glass, wait for around a minute and a half for it to settle, then top up. ', '45 degree angle, fill it up to around half of the glass, wait for around a minute and a half for it to settle, then top up. ', 'Pour it through a sieve.', 'answer2', 102),
(209, 'You are given a cheque with three drinks to make, a pint of beer, a cocktail and a<br> vodka mix. Which order should you make them in for efficiency?', 'beer, cocktail, vodka mix.', 'vodka mix, beer, cocktail.', 'cocktail, vodka mix, beer.', 'cocktail, beer, vodka mix.', 'answer3', 102),
(210, 'When pouring a pint, where should the glass label be facing?', 'Towards you.', 'To your right.', 'Towards the customer.', 'To your left.', 'answer3', 102);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `picture_id` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `title`, `type`, `picture_id`, `description`) VALUES
(101, 'Ingredients', 'Choice', 'recipes.png', 'A quiz testing your knowledge on how different drinks are made.'),
(102, 'General Bar Etiquette', 'Choice', 'barEtiquette.png', 'A quiz testing how well you can operate on a bar, in certain situations, as well as interacting with customers.');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_taken`
--

CREATE TABLE `quiz_taken` (
  `username` varchar(50) NOT NULL,
  `quiz_id` int(3) NOT NULL,
  `score` int(2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_taken`
--

INSERT INTO `quiz_taken` (`username`, `quiz_id`, `score`, `date`) VALUES
('Aiden_Test', 101, 3, '2031-03-23 07:27:05'),
('Aiden_Test', 102, 3, '2031-03-23 07:29:30'),
('harry', 101, 5, '2029-03-23 12:48:54'),
('harry', 102, 1, '2030-03-23 12:28:24'),
('Jane', 101, 4, '2030-03-23 04:11:48'),
('ross', 101, 1, '2031-03-23 08:10:02'),
('ross', 102, 5, '2031-03-23 06:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_question` varchar(50) NOT NULL,
  `security_answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `gender`, `email`, `password`, `security_question`, `security_answer`) VALUES
('Aiden_Test', 'Male', 'aidenponline@hotmail.com', '$2y$10$jbcyewXhMFOZ3fS8ZLmja.Rc7y7wTZHmImiXaiKSpFn.9DreSLUJe', 'What is your mother\'s maiden name?', 'Chruch'),
('harry', 'Male', 'harry@live.com', '$2y$10$9HKn7OasbEKjjRGpoPqdGuaP6LDPfzKZASPIMKG7cWc6Ik8jt6jha', 'What was the brand of your first car?', 'harry'),
('james', 'Male', 'jamesbond@mi6.co.uk', '$2y$10$s6auJ3unRPZVEz9hztQKeensAgj6CoNZJzMnpE/sJc2zStXBrO3oa', 'What was the brand of your first car?', 'Aston Martin'),
('Jane', 'Female', 'janesmith@hotmail.co.uk', '$2y$10$z.kk/FdijLIMmw1fVGtJbuENNnzPWkhIl2ZjvwuyUf/Izo8/..ev6', 'What was the brand of your first car?', 'toyota'),
('JohnBoyega', 'Other', 'johnboyega@hotmail.co.uk', '$2y$10$ZdcKC20OXU.PZMT6l0ay7eRfNk1/.aekOXNgelny3eV0qTEsnIdrG', 'Which primary school did you attend?', 'galactic empire'),
('johnny', 'Male', 'johnny@sauce.com', '$2y$10$0cHH71GlIvL86c37TUJ1dOy0xYOK1Go1GbhjDhRGrqZ3IBDLxi2Vq', 'What is the name of your pet?', 'Bella'),
('ross', 'Other', 'ross@live.co.uk', '$2y$10$LauS3zohVxX6br.a5RHLNOc1c1tTyVSs9.v4sSnbZ0vEf4sZXW3xG', 'What is your mother\'s maiden name?', 'John'),
('Sam', 'Male', 'samjones@gmail.com', '$2y$10$a8Px9.BrOY9Kelr/Rs1OqeahX3TqydYIlexjIwB3ObVta33DfSi9a', 'What is the name of your pet?', 'molly'),
('user', 'Other', 'user@user.com', '$2y$10$HEOaWCAIFG4K2N4CBy.oyeYdHYwvHBfMwy6rTIWVwXTKFVCzsOjau', 'Which primary school did you attend?', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `picture_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `name`, `postcode`, `city`, `country`, `picture_id`) VALUES
(501, 'The Social', 'G1 3AJ', 'Glasgow', 'Scotland', 'social.png'),
(502, 'The Shed', 'G41 2QS', 'Glasgow', 'Scotland', 'shed.png'),
(503, 'Hillhead Bookclub', 'G12 8SJ', 'Glasgow ', 'Scotland', 'hillhead.png'),
(504, 'Wunderbar', 'G1 3BZ', 'Glasgow', 'Scotland', 'wunderbar.png'),
(505, 'Manuka', 'G2 4TB', 'Glasgow', 'Scotland', 'manuka.png'),
(506, 'Firewater', 'G2 3HW', 'Glasgow', 'Scotland', 'firewater.png'),
(507, 'Tingle', 'G1 3LN', 'Glasgow', 'Scotland', 'tingle.png'),
(508, 'Cathouse', 'G1 3RB', 'Glasgow', 'Scotland', 'cathouse.png'),
(509, 'Revolution', 'G1 3NA', 'Glasgow', 'Scotland', 'revolution.png'),
(510, 'Slouch', 'G2 4HZ', 'Glasgow', 'Scotland', 'slouch.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cocktail`
--
ALTER TABLE `cocktail`
  ADD PRIMARY KEY (`cocktail_id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `fk_quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_taken`
--
ALTER TABLE `quiz_taken`
  ADD PRIMARY KEY (`username`,`quiz_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cocktail`
--
ALTER TABLE `cocktail`
  MODIFY `cocktail_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `guide_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=605;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_quiz_id` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
