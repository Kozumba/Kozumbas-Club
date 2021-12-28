-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 12:17 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kozumbas_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_ID` int(11) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `ban` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_ID`, `account_type`, `username`, `password`, `profile_picture`, `description`, `ban`) VALUES
(2, 'admin', 'Admin_Kozumba', 'test', 'Kozumba.png', 'This is my updated description!\r\n', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` varchar(255) NOT NULL,
  `clicks` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `picture`, `link`, `title`, `description`, `category`, `clicks`) VALUES
(1, '2048.png', 'games/2048/index.php', '2048', '2048 is a popular single-player game for Web and mobile. It’s a type of “sliding block puzzle” — think Threes!, on which 2048 is based, or the old-timey game klotski — that’s played on an almost Sudoku-like grid. Like Sudoku, it also involves some math. The object of the game is to combine the numbers displayed on the tiles until you reach 2048.', 'Puzzle', 89),
(46, 'bravetriangle.jpg', 'games/BraveTriangle', 'Brave Triangle', 'This Brave Triangle was born for adventure, and he’s running off to find it! It’s a big world out there, filled with plenty of barriers. With quick reflexes and a little skill, however, you should be able to make it far in this arcade game. Slip your way through narrow gates as a futuristic beat pulses in the background. Dash left and right to avoid the walls. This heroic adventurer only knows one speed: full. If you even graze a wall, BOOM!', 'Adventure', 34),
(47, 'Bubbleshooter.png', 'games/BubbleShooter', 'Bubble Shooter', 'Play the classic and most addictive bubble pop game for FREE, match 3 colors and clear levels. Don’t miss out on this fun relaxing game! You need to aim & shoot, to drop & burst all bubbles.', 'Puzzle', 26),
(48, 'PL_270_196.png', 'games/Platfoban', 'Platfoban', 'Platfoban is a Sokoban-style puzzle game with a platforming element! You need to collect all the coins at every level. There are two modes in the game: the platforming mode, in which you can run and jump, and the Sokoban mode, in which you can move blocks, coins, etc. In Sokoban mode, chest monsters wake up, attack, and chase the main character. In platforming mode, chests sleep and can be used as platforms.', 'Puzzle', 18),
(49, '270x196_football.io-html5_thumbnail.png', 'games/Footballio', 'Football.io', 'Football.io is a football game with a difference. Rather than trying to kick a single ball into the opposition’s goal, the player must avoid a multitude of balls while collecting yellow ones. The yellow balls gives you various bonuses; some give a speed boost, some restore lost lives, some make you temporarily invincible. The bar at the bottom of the screen indicates how much of the power is left – but be quick, as it depletes fast. Players start with six health points, but can pick up more along the way. Move using the arrow keys Touchscreen players can use the on-screen joystick.', 'Sports', 16),
(50, '270x196_towerboxer-html5_thumbnail.png', 'games/TowerBoxer', 'Tower Boxer', 'A bunch of boxing champions challenged themselves to wreck a whole skyscraper with their fists! A rather crazy idea, are you willing to help out? Punch the tower from left or right to chop it down, but watch out for approaching balconies!', 'Action', 16),
(51, 'UltimateBoxing-Thumbs.jpg', 'games/UltimateBoxing', 'Ultimate Boxing', 'Knock out your competitor in the ultimate boxing match! This sports fighting game lets you play as Ironfist or Dynamite. Each heavyweight fighter can throw jabs, hooks, and uppercuts in the ring. Put up your gloves to block incoming punches!', 'Sports', 21),
(52, 'ZNGtOIUprp5rWH-220-165.jpg', 'games/CartoonStrike', 'Cartoon Strike', 'This is a simple lite version of PC game Cartoon Strike.\r\nPlay with your friends or with strangers this first-person multiplayer game (FPS). There is no story available at this moment, just the multiplayer. Join to running game or create your own server and invite your friends. The game has simple pixel graphics so you should have no problem starting it on any device. The game has also mobile version too.', 'Action', 129),
(53, 'MVnavWEQc1wnfg-220-165.jpg', 'games/MiniSurvival', 'Mini Survival', 'Mini Survival is a great mini game where you\'ll be trying to survive for as long as possible. You start barehanded, with your first objective being to collect a few stones, some wood and other resources that can be used to create your first tools. You can therefore create an axe, a fishing rod or something to attack with, a sword for instance. You can also start a fire that you\'ll be grateful for during the night. If you like gardening, you can start your own farm by planting seeds. You can also hunt animals. As you can see, the possibilities are endless, and you’ll be entertained for hours.', 'Action', 24),
(54, 'MsPTA5BEcQWBBU-220-165.jpg', 'games/BusinessTycoon', 'Business Tycoon', 'Business Tycoon is a strategy game where you’ll have to build up your own store empire. You start off with a single store and you’ll have to do everything yourself. As you progress, you start buying upgrades that will improve the sum of money you earn. After a while, you can buy more upgrades or hire managers who will be taking care of the cash flow. This way, you can improve the stores and earn more revenue. The goal will be to buy up all of the stores and create an empire.', 'Strategy', 15),
(55, 'SzlsbzuKdxE126-220-165.jpg', 'games/StuntDestroyer', 'Stunt Destroyer', 'Stunt Destroyer is an online game where you’ll be controlling a race car. Your objective is to gain speed on a platform. After that, try to destroy as many obstacles as you can. You will get rewarded with money that can be used to upgrade your engine or your turbo. You can also use this money to buy a new car. Your main objective will be to get to the green box. This can be done only with an upgraded car. If you reach the green box, you continue to the next level!', 'Racing', 13),
(56, 'ZqiOAhE4q8R9wq-220-165.png', 'games/SaveThePenguin', 'Save the penguin!', 'Save the Penguin is a nice little adventure game with a rather short story. Your objective is to save your friend who’s been imprisoned by evil penguins. If you want to save him, you first need to defeat the penguins. Your friend will be free only after you break his chains. In your surroundings, there will be fish that will help you gain some HP by eating them. There are also snowballs that you can use against your enemies. Move around and explore the world. Get through all of the objectives and defeat your opponents. Good luck!', 'Adventure', 16),
(45, 'word-connect-2021-thumbnail-270x196.png', 'games/WordConnect2021', 'Word Connect 2021', 'Word Connect 2021 is a kind of cross word puzzle game. Concentrate to find all hidden words in given letters and connect them anyway you like to catch the word! It starts off as an easy word game and becomes challenging! You will have fun improving your vocabulary and spelling skills.', 'Puzzle', 22),
(57, 'rNmazeTGaZkH3g-220-165.jpg', 'games/SamuraiWarrior', 'Samurai warrior', 'Samurai Warrior is an action online game where you’ll be fighting against a lot of enemies. Right at the beginning of the game, you pick a character that you’ll be playing as. You can pick between a man and a woman. While playing, you won’t be able to change your gender, so be sure to choose correctly. You can then start fighting against your enemies. There\'s a total of 5 levels where you’ll meet many opponents. They will all try to kill you, so be sure to watch your HP bar. Let’s try the game out!', 'Action', 16),
(58, 'L2ETMWRHgpcyaN-220-165.jpg', 'games/PrisonBreak', 'Prison break', 'Prison Break is an action online game where you’ll be in control of an inmate. As the name of the game suggest, your goal will be to break out of prison. There’s a total of 15 levels waiting for you with numerous objectives, where you\'ll have to unlock a lock, put in the right code or get rid of guards. You always need to get to a place that has been marked on the mini map. Don’t forget that you can use your fists or a baseball bat to attack. The game offers simple gameplay with mediocre graphics, so come on!', 'Action', 136),
(59, 'qFPCNQQSnx5OIu-220-165.jpg', 'games/DeerSimAnimalFamily3D', 'Deer Simulator: Animal Family 3D', 'Deer Simulator: Animal Family 3D is yet another great online game where you will be playing as a deer. There\'s a ton of adventures that you can start and find many different enemies and friends. You can build up your own house, start a family and buy accessories that will help you get through all of the obstacles the game throws at your feet. The game is offering a ton of options when it comes to character customization and improvement of your surroundings. If you start playing the game regularly, you will get a ton of great gifts, but you can start exploring the world without this in mind.\r\nIt\'s a great game with pleasant 3D graphics, so be sure to try it out, you won’t regret it.', 'Action', 16),
(60, '8cKJ4RrN5Zr20k-220-165.jpg', 'games/BeanJump', 'Bean Jump', 'Bean Jump is an interesting puzzle game where you will be controlling a little bean. Your objective will be to jump around platforms floating on water. There’s a problem however, since you can only jump on a platform once. After you jump away from it, it will disintegrate. There are many other rules that make the gameplay more engaging. The game is offering you a ton of levels, so expect hours and hours of fun. You can also buy new items that can help you break some platforms and thus make the game easier for you. Will you be able to finish all of the levels?', 'Puzzle', 16),
(61, 's19ujwDjrTqf7j-220-165.jpg', 'games/CarMechanic2020', 'Car Mechanic 2020', 'Car Mechanic 2020 is another interesting simulator where you will try out a new job. You will become a car mechanic and you will try to fix all of the cars that your customers bring you. The game will guide you as to what to do with the cars, but it still won’t be that easy. Aside from that there is a time limit that you will need to be aware of. Sometimes it can be stressful, but you need to keep your calm, you will surely pass the game’s objectives. There will be many different levels for you to try out that you will unlock as you progress through the game. So put on a uniform and start playing!', 'Strategy', 19),
(62, 'Akzn6myTe5GJam-220-165.jpg', 'games/InfinityRoyale', 'Infinity Royale', 'Infinity Royale is an action online game where you will be playing as a soldier. Your objective will be to neutralize all of the enemies on the island. You will get transported there by a plane from which you will have to jump down. Firstly, you need to activate your parachute, else you crash into the ground and die. After that you can take a car and get closer to your enemies. You can neutralize them using the car, but the best course of action will be to use your weapon. For each of the levels, you get rewarded. You can later buy new guns in the store. Will you manage to get through all of the 10 missions on your first try?', 'Action', 17),
(63, 'S8r3AThwCMaQiu-220-165.jpg', 'games/IronSuperhero', 'Iron Superhero', 'Iron Superhero is an action online game where you will be playing as a superhero. Your main objective will be to save hostages and get rid of all of your enemies. Right at the start, you will move to a designated location where the game will provide you with a mission. After that, enemies will show up on the map and you will be tasked with destroying them. Your hero has a few skills of his own, he can shoot lasers, fly or jump really high. If you combine these skills, your enemies won\'t have a chance against you. The game offers you 20 levels in total, so it will take some time for you to finish the whole game. So come on, try the game out!', 'Action', 18),
(64, '7VbIlJxdkCjDUn-220-165.jpg', 'games/FireStorm', 'FireStorm', 'FireStorm is an action game from the future where the whole city is controlled by a single gang terrorizing the citizens living there. Your only option of saving the city is to eliminate the gang. You will have a few fighters at your disposal who will gladly help you out. Your objective will be to complete missions in each of the levels and thus earn money. The money can be used to buy upgrades for your fighter. During the fighting, you can also use vehicles, such as tanks that can help you eliminate your enemies much faster. If you want to pass a level, you must not die, so don\'t forget to pick up first-aid kids as you progress through the game. So come on, let’s play!', 'Action', 20),
(65, 'le5syFXHJYiufR-220-165.jpg', 'games/BackflipManiac', 'Backflip Maniac', 'Backflip Maniac is great online game, where you\'ll be jumping with your character. The first levels will be fairly easy, since you won’t be jumping from the highest buildings just yet. As you progress, the levels will get progressively higher. It’s very important to hit the red target, else you won’t be able to move to the next level. The controls can be a bit difficult for some, at the start, but you will adapt in the long run. Overall, the game offers you great gameplay, 3D graphics and 30 levels. So come on, let’s play!', 'Puzzle', 20),
(66, '6gtb3AvlnyN6i9-220-165.jpg', 'games/CrazyCarStunts', 'Crazy Car Stunts', 'Crazy Car Stunts is a crazy online game where you’ll be showing off your tricks in vehicles. There’s a lot of them available, so you can pick a sports car, a monster truck, a military vehicle, a bus or even a normal truck. Each of these have their own physics that can be changed during your play through. Aside from that you see the stats of your vehicle in detail. There are numerous ramps on the map, so pick the right car and you can start jumping around. Pick the right car and start jumping or simply driving around.', 'Racing', 24),
(67, 'E5IA4FiLp6rSzy-220-165.jpg', 'games/CityTycoon', 'City Tycoon', 'City Tycoon is an online building game where you will be tasked with building up your city. Right at the beginning of the game, you will be able to set up the size of your map. Don’t be a megalomaniac though, it’s better to start small and expand with each play-through. Also, the game might start lagging if your city gets too large. The terrain can be adjusted to your needs. Terrain elevation can also be adjusted. Then, there are some buildings that you might build. You can also build on water. The most important thing is to have a flat terrain base. Don’t forget to build roads connecting the buildings so that cars can drive there. It’s an interesting online game, where you can build up the whole city according to your imagination, so come try it out!', 'Strategy', 23),
(68, 'pYlwwLkveRFzqt-220-165.jpg', 'games/ZombieOutbreakArena', 'Zombie Outbreak Arena', 'Zombie Outbreak Arena is an online action game where you will be fighting against hordes of undead. For each kill, you will be rewarded with XP that can then be used up to rank up. The game is offering you 5 different maps with a functioning day/night cycle. That’s important because you get awarded with more XP points during the night. When it comes to weapons, these will be scattered randomly around you. Ammo will be limited, so you need to switch weapons frequently. You can also use your surroundings to eliminate your enemies. You can shoot a car tank so that it explodes and kills everyone around.', 'Action', 20),
(69, 'HiEmjSyxfCBTg8-220-165.jpg', 'games/SteampunkGenius', 'Steampunk Genius', 'Steampunk Genius is yet another great online game from PS Games. It’s the same game developer who brought you Genius Mechanic. Likewise, you will be able to build almost anything even in this game. Your only limit is your imagination. It’s all made in a steampunk theme. The game is offering you a ton of models that you can choose from, it can be an airplane, a car or even a robot spider walking around. All you need to do is find enough parts so that you wouldn’t have to remake everything. There are quality graphics available together with tons of fun.\r\n\r\nThe game can also be played on a mobile phone.', 'Puzzle', 28),
(70, 'YMxAtIohWyyDYJ-220-165.jpg', 'games/PoliceHelicopter', 'Police Helicopter', 'Police Helicopter is a 3D online game where you will be flying a helicopter. Your objective is to find a vehicle that’s being driven by a criminal that you need to eliminate. This vehicle is being pursued by police vehicles though, so you need to watch out not to hit them. If you destroy them, you will have to start again. There are also skyscrapers in the city that you need to avoid, else you might crash into them. The game is offering you 20 levels in total that you will be continuously unlocking with new helicopters awaiting you. There’s a lot to look forward to!', 'Racing', 28),
(71, 'gvHcmawJlZJF26-220-165.jpg', 'games/MiniTennis3D', 'Mini Tennis 3D', 'Mini Tennis 3D is a great online game for tennis fans. If you don’t want to deal with any settings, you can simply start playing right away. Your objective will be to win every match. You will then start ascending the leader boards and earning more diamonds. These can be spent in the menu and you can buy a new character with these. There is 27 characters in total, so you will be able to choose whichever you want. You can also earn the diamonds in bonus levels where a mini-game awaits. During the fight, you can find many different bonuses that you can pick up. You can expect pretty graphics and simple gameplay, so enjoy the game!', 'Sports', 44),
(75, 'thumb_400x300.jpg', 'games/BFFsDarkAcademia', 'BFFs Dark Academia', 'Help your favourite princesses to get ready for school. There\'s a new cool fashion style they want to try on; dark academia. Mix and match the clothes to create unique outfits and complete the look with amazing makeup. Thanks to you, the girls will look amazing.', 'PointAndclick', 25),
(74, 'basketballhit.png', 'games/BasketballHit', 'Basketball Hit', 'Basketball Hit is a free physics game. You\'ve squeaked your sneaks across basketball courts all over the world. You have sunk 3 pointers with your eyes closed and made half-court baskets that electrified the world. But that was then, this is now. You\'ve seen it all. You\'ve done it all. And now, the world of competitive basketball bores you, you thirst for greater challenges in a new arena. Enter Basketball Hit. A game that takes everything you love about basketball and puts it into the top-down world of physics-based puzzles. Basketball Hit will finally let you challenge yourself by dribbling your basketball through a series of slats, barriers, borders, walls, and baskets. Can you think ahead? Do you know how to navigate the labyrinthian world of competitive basketball puzzles? This is your chance to be the queen\'s gambit of the basketball puzzle world. To show your haters that you are like Micheal Jordan and will be successful in not just one sport but multiple sports.', 'Sports', 21),
(77, 'mayagolf300.jpg', 'games/MayaGolf', 'Maya Golf', 'Maya Golf is an online puzzle game where you get to digitally golf! Each hole has its own challenge like hills, bodies of water, trees, and sand holes. If your ball falls in water or goes completely out of bound, your ball will reset to its original spot. If you hit a tree your ball gets placed under the tree.  However, if you get stuck on a certain level with a bad angle, you have the option to restart which does add a tick to your score. Use this option wisely and rarely! There are 18 holes to each level so you will not get bored with this online game!  Pass and unlock every level with your amazing scores. If you don’t do well the first time around, you can always go back and replay a level in this online golfing game. This will help increase your chances of landing on the leaderboards!', 'Puzzle', 7);

-- --------------------------------------------------------

--
-- Table structure for table `usergames`
--

CREATE TABLE `usergames` (
  `game_id` int(11) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `clicks` int(255) NOT NULL,
  `downloadlink` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `usergames`
--
ALTER TABLE `usergames`
  ADD PRIMARY KEY (`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `usergames`
--
ALTER TABLE `usergames`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
