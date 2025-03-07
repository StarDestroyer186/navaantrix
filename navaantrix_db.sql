-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 07, 2025 at 06:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `navaantrix_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `slug`, `title`, `description`, `content`, `image`, `created_at`, `updated_at`) VALUES
(4, 'suzuki-gsx-8r', 'Suzuki GSX-8R', 'The New Standard of Sport. The new GSX-8R was born to bring a sense of adventure and riding pleasure into your every day, on every outing. The visceral appeal of cutting-edge sportbike styling immediately catches your eye. Once aboard, you experience the sophisticated balance of power, handling, comfort and faithful response that puts you in full control. It’s a fi ne fusion of elements that invites all riders to a new world of riding pleasure, whether commuting or shopping in town, heading out for an exhilarating run through winding mountain roads, or testing your skills on the racetrack. The GSX-8R is destined to lead the pack toward an exciting new era of sportbike riding.', '<p><br></p><h2>Producing the Power to be Your Best</h2><p>The 776cm3 parallel twin engine that powers the GSX-8R delivers a fine balance of smooth, controllable power and free-revving performance you will enjoy whether touring, enjoying a brisk ride, competing on the racetrack, or tackling errands around town. Designed to be powerful, effi cient, rider-friendly and versatile, the engine features a 270-degree crank layout with a fi ring order that produces rich torque and positive traction, as well as a pleasing rumble and engine note similar to that of a V-twin engine. It also employs the Suzuki Cross Balancer, an innovative primary balancer design that contributes to smooth operation and the GSX-8R’s nimble handling. The engine’s compact front-to-rear size contributes to achieving optimum weight distribution and chassis geometry, while it also helps position the hip point forward to provide you with an optimal riding position.</p>', '1741071058_img1.jpg', '2025-03-04 06:50:58', '2025-03-04 06:56:55'),
(5, 'suzuki-vstorm-800-de', 'Suzuki V-Storm 800 DE', 'The new V-STROM 800DE was born to bring a sense of adventure and riding pleasure into your every day, on every outing. Perhaps you wish to commute to work or run an errand in town. Perhaps you want to head out for the day and enjoy an exhilarating ride on the highway or through some winding mountain roads. Or, maybe you are eager to take a long trip, camp out, and explore some natural scenery. Whatever your purpose, the all-round capabilities of the V-STROM 800DE are engineered to faithfully respond to your command and deliver a satisfying riding experience wherever you decide to go.', '<h3>A Compact, Powerful and Versatile New Engine</h3><p>The V-STROM 800DE is powered by Suzuki’s brand-new parallel twin 776cm 3 engine. It features a long-stroke configuration that delivers a fine balance of smooth, control - lable power and free-revving performance you will enjoy whether riding around town to commute or heading out to tour for long distances. It also results in the engine demon - strating tenacious staying power at extremely low speeds, making it easy to control the V-STROM 800DE on forest roads and trails when you get the desire to venture beyond where the pavement ends and explore your surroundings further</p><p>The engine’s new parallel twin layout brings the distinct advantage of its compact front-to-rear size. This contributes to achieving optimum weight distribution and chassis geometry, both for traversing gravel roads and trails, and for long-distance touring. At the same time, it helps position the hip point forward and provide you with an optimal riding position.</p><p>Suzuki chose a 270-degree crankshaft for the twin engine because its ignition timing contributes to delivering a smooth ride with plenty of torque, positive traction, as well as a pleasing rumble and sound similar to that of a V-twin</p>', '1741071234_800de.jpg', '2025-03-04 06:53:54', '2025-03-04 06:53:54'),
(6, 'suzuki-hayabusa', 'Suzuki Hayabusa', 'Famed for its abundant power, agility and majestic presence. Legendary for establishing new levels of ultimate sport performance, and for retaining the number one position for the past two decades in the class it created. Fast forward to today. Total commitment and tireless effort give birth to a new generation perfectly poised to carry riders boldly into the future. Its further enhanced riding experience features even smoother power delivery and nimbler handling, a collection of the latest electronic systems designed to optimize performance characteristics and make the Hayabusa more controllable and predictable, as well as unshakeable reliability. And it wraps all this in a package that will instantly turn heads with its breathtaking style and grace.', '<h5>Optimum power, durability and control</h5><p>Though the engine is already renowned for its to improve durability and longevity, the following refinements aim to take it to another level. New pistons and connecting rods reduce the weight of moving parts within the engine. Changes to the crankshaft oil passages improve engine lubrication. The transmission shaft needle bearings are extended in length. Attention to detail goes as far as changing the way the engine case bolts are tightened, and even to the threading for the screw holes in the upper crankcase.</p><p>The new pistons and Twin Swirl Combustion Chamber (TSCC) design fully leverage advances in CAE analysis to bring in more air as the valves begin to lift and thereby increase combustion efficiency. Suzuki Side Feed Injectors (S-SFI) feature a new dual injector design that positions the secondary injector so its spray strikes a reflecting plate in the funnel and enters the combustion chamber as a fine mist. This combines with the increased capacity of a new air cleaner and longer intake pipe design to optimize low- to mid-range power output and make the Hayabusa more controllable in typical daily riding situations.</p><p>Suzuki\'s ride-by-wire throttle control system provides natural response with linear control, while a related change to a 43mm bore size for the throttle bodies boosts low- and mid-range power output. Also helping to improve performance and controllability at the most commonly used low- to mid-range speeds are the new engine\'s reduced valve lift overlap and a new pipe on the exhaust header connecting cylinders #1 and #4.</p>', '1741071354_hayabusa.jpg', '2025-03-04 06:55:54', '2025-03-04 06:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(3, 'Pratik Yadav', 'pratikyadav18604@hotmail.com', '8888236756', 'test', '2025-03-07 06:32:55'),
(4, 'Pratik Yadav', 'pratikyadav18604@hotmail.com', '8888236756', 'Test Message', '2025-03-07 06:46:24'),
(5, 'Pratik Yadav', 'pratikyadav18604@hotmail.com', '8888236756', 'Test Message', '2025-03-07 06:46:38'),
(6, 'Pratik Yadav', 'pratikyadav18604@hotmail.com', '8888236756', 'Test Message', '2025-03-07 06:47:51'),
(7, 'Pratik Yadav', 'pratikyadav18604@hotmail.com', '8888236756', 'Test Message', '2025-03-07 06:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'company_email', 'info@navaantrix.com'),
(2, 'company_phone', '9011001818'),
(3, 'company_address', 'Office No. 4, Shivam Complex, Lalit Estate, Baner Road, Baner, Pune, Maharashtra - 411045');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
