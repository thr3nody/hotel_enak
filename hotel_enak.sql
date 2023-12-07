-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 02:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_enak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id_admin` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id_admin`, `admin_username`, `admin_password`) VALUES
(1, '123', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_room_type` int(11) DEFAULT NULL,
  `id_hotel` int(11) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `id_room_type`, `id_hotel`, `check_in_date`, `check_out_date`, `total_price`) VALUES
(5, NULL, 4, 1, '2023-11-23', '0000-00-00', 9100000.00),
(6, NULL, 4, 1, '2023-11-23', '0000-00-00', 9100000.00),
(7, NULL, 3, 1, '2023-11-17', '0000-00-00', 1000000.00),
(8, NULL, 3, 1, '2023-11-17', '0000-00-00', 1000000.00),
(9, NULL, 3, 1, '2023-11-17', '0000-00-00', 1000000.00),
(10, NULL, 3, 1, '2023-11-17', '0000-00-00', 1000000.00),
(11, NULL, 3, 1, '2023-11-17', '0000-00-00', 1000000.00),
(12, NULL, 3, 1, '2023-11-17', '0000-00-00', 1000000.00),
(13, NULL, 2, 1, '2023-11-26', '0000-00-00', 2000000.00),
(14, NULL, 2, 1, '2023-11-26', '0000-00-00', 2000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `city_country`
--

CREATE TABLE `city_country` (
  `id_city` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city_country`
--

INSERT INTO `city_country` (`id_city`, `city_name`, `id_country`) VALUES
(1, 'Toronto', 2),
(2, 'Montreal', 2),
(3, 'Vancouver', 2),
(4, 'Edmonton', 2),
(5, 'Yukon', 2),
(6, 'Zurich', 1),
(7, 'Geneva', 1),
(8, 'Bern', 1),
(9, 'St Gallen', 1),
(10, 'Freiburg', 1),
(11, 'Biddinghuizen', 3),
(12, 'Buren', 3),
(13, 'Heerlen', 3),
(14, 'Harlingen', 3),
(15, 'Leiden', 3),
(16, 'Kyoto', 4),
(17, 'Tokyo', 4),
(18, 'Fukishima', 4),
(19, 'Akita', 4),
(20, 'Yokohama', 4),
(21, 'Modena', 5),
(22, 'Florence', 5),
(23, 'Venice', 5),
(24, 'Milan', 5),
(25, 'Rome', 5),
(27, 'Something City', 6),
(29, 'Bu Dinda City', 6);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id_country`, `country_name`) VALUES
(1, 'Switzerland'),
(2, 'Canada'),
(3, 'Netherland'),
(4, 'Japan'),
(5, 'Italy'),
(6, 'Something OwO');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `id_city` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `hotel_name`, `id_city`, `address`, `rating`, `image`) VALUES
(1, 'Maple Leaf Manor', 1, '123 Maple Street', 4.5, NULL),
(2, 'Skyline Suites', 1, '456 Skyline Avenue', 4.2, NULL),
(3, 'Lakeside Lodge', 1, '789 Lakeside Drive', 4.0, NULL),
(4, 'Cityscape Hotel', 1, '321 Cityscape Lane', 4.8, NULL),
(5, 'Mount Royal Hotel', 2, '456 Mount Royal Blvd', 4.6, NULL),
(6, 'French Quarter Inn', 2, '789 French Quarter Street', 4.3, NULL),
(7, 'Montreal Grand Plaza', 2, '321 Grand Plaza Avenue', 4.1, NULL),
(8, 'Riverside Retreat', 2, '123 Riverside Drive', 4.7, NULL),
(9, 'Oceanview Resort', 3, '789 Seaside Blvd', 4.5, NULL),
(10, 'Mountain Lodge', 3, '234 Mountain View Avenue', 4.2, NULL),
(11, 'Downtown Oasis', 3, '456 Downtown Street', 4.0, NULL),
(12, 'Parkside Inn', 3, '123 Parkside Drive', 4.6, NULL),
(13, 'Riverfront Hotel', 4, '567 Riverfront Road', 4.3, NULL),
(14, 'Cityscape Suites', 4, '890 City Center Lane', 4.1, NULL),
(15, 'Greenwood Retreat', 4, '345 Greenwood Street', 3.9, NULL),
(16, 'Urban Haven', 4, '678 Urban Avenue', 4.4, NULL),
(17, 'Northern Lights Lodge', 5, '123 Aurora Avenue', 4.5, NULL),
(18, 'Wilderness Retreat', 5, '456 Wilderness Trail', 4.2, NULL),
(19, 'Mountain View Inn', 5, '789 Mountain Road', 4.0, NULL),
(20, 'Arctic Oasis Hotel', 5, '101 Polar Street', 4.3, NULL),
(21, 'Swiss Alps Chalet', 6, '123 Alpine Avenue', 4.7, NULL),
(22, 'Lakeview Lodge', 6, '456 Lakeside Drive', 4.5, NULL),
(23, 'City Center Hotel', 6, '789 Downtown Street', 4.2, NULL),
(24, 'Zurich Skyline Resort', 6, '101 Skyview Road', 4.6, NULL),
(25, 'Lakefront Retreat', 7, '234 Lakeside Avenue', 4.8, NULL),
(26, 'Geneva Grand Hotel', 7, '567 Grand Boulevard', 4.6, NULL),
(27, 'Riverside Inn', 7, '890 Riverside Lane', 4.4, NULL),
(28, 'Alpine View Hotel', 7, '111 Alpine Street', 4.7, NULL),
(29, 'Mountain Vista Lodge', 8, '456 Mountain Road', 4.5, NULL),
(30, 'City Center Suites', 8, '789 City Avenue', 4.3, NULL),
(31, 'Bern Heights Hotel', 8, '123 Heights Lane', 4.6, NULL),
(32, 'Alps View Inn', 8, '890 Alps Street', 4.8, NULL),
(33, 'Swiss Bliss Retreat', 9, '123 Blissful Lane', 4.7, NULL),
(34, 'Alpine Serenity Hotel', 9, '456 Alpine Street', 4.6, NULL),
(35, 'St Gallen Grand Inn', 9, '789 Grand Avenue', 4.9, NULL),
(36, 'Majestic Mountains Hotel', 9, '890 Majestic Road', 4.8, NULL),
(37, 'Black Forest Lodge', 10, '123 Forest Lane', 4.5, NULL),
(38, 'Freiburg Heights Hotel', 10, '456 Heights Street', 4.4, NULL),
(39, 'Green Valley Inn', 10, '789 Valley Avenue', 4.7, NULL),
(40, 'Sunset Retreat Hotel', 10, '890 Sunset Road', 4.6, NULL),
(41, 'Biddinghuizen Beach Resort', 11, '123 Beachfront Blvd', 4.6, NULL),
(42, 'Lakeview Retreat', 11, '456 Lakeside Lane', 4.8, NULL),
(43, 'Dutch Charm Hotel', 11, '789 Windmill Way', 4.5, NULL),
(44, 'Tulip Garden Inn', 11, '890 Tulip Street', 4.7, NULL),
(45, 'Buren Palace Hotel', 12, '123 Royal Road', 4.5, NULL),
(46, 'Golden Fields Resort', 12, '456 Meadow Lane', 4.7, NULL),
(47, 'Historic Charm Inn', 12, '789 Heritage Street', 4.6, NULL),
(48, 'Riverfront Retreat', 12, '890 Riverside Drive', 4.8, NULL),
(49, 'Heerlen Heights Hotel', 13, '321 Summit Avenue', 4.4, NULL),
(50, 'Sunny Slopes Lodge', 13, '654 Sunshine Boulevard', 4.5, NULL),
(51, 'Valley View Inn', 13, '987 Valley Road', 4.6, NULL),
(52, 'Green Oasis Resort', 13, '876 Nature Lane', 4.7, NULL),
(53, 'Harlingen Harbor Hotel', 14, '123 Dockside Drive', 4.2, NULL),
(54, 'Seaside Serenity Resort', 14, '456 Beachfront Avenue', 4.3, NULL),
(55, 'Marine Breeze Lodge', 14, '789 Coastal Lane', 4.4, NULL),
(56, 'Ocean View Inn', 14, '654 Oceanfront Road', 4.5, NULL),
(57, 'Leiden Luxury Suites', 15, '123 Exclusive Avenue', 4.1, NULL),
(58, 'Royal Residences', 15, '456 Regal Road', 4.2, NULL),
(59, 'Noble Nests Hotel', 15, '789 Aristocratic Lane', 4.3, NULL),
(60, 'Imperial Inn Leiden', 15, '654 Majestic Street', 4.4, NULL),
(61, 'Zenith Zen Inn', 16, '321 Tranquil Terrace', 4.5, NULL),
(62, 'Sakura Serenity Hotel', 16, '654 Cherry Blossom Boulevard', 4.6, NULL),
(63, 'Temple Tranquility Lodge', 16, '987 Peaceful Path', 4.7, NULL),
(64, 'Kyoto Grand Retreat', 16, '432 Serene Street', 4.8, NULL),
(65, 'Tokyo Towers Hotel', 17, '789 Metropolitan Avenue', 4.4, NULL),
(66, 'Cherry Blossom Residency', 17, '876 Blossom Street', 4.5, NULL),
(67, 'Urban Oasis Inn', 17, '543 Downtown Drive', 4.6, NULL),
(68, 'Tokyo Tranquil Suites', 17, '210 Serenity Lane', 4.7, NULL),
(69, 'Radiant Rays Resort', 18, '456 Sunshine Street', 4.2, NULL),
(70, 'Mystic Meadows Lodge', 18, '789 Radiance Road', 4.3, NULL),
(71, 'Serenity Springs Hotel', 18, '123 Luminous Lane', 4.5, NULL),
(72, 'Fukishima Zen Retreat', 18, '876 Tranquility Trail', 4.6, NULL),
(73, 'Snowy Peaks Lodge', 19, '789 Frosty Avenue', 4.4, NULL),
(74, 'Northern Lights Inn', 19, '234 Chill Street', 4.6, NULL),
(75, 'Pinecone Paradise Hotel', 19, '567 Glacial Grove', 4.3, NULL),
(76, 'Akita Alpine Chalet', 19, '890 Snowfall Street', 4.5, NULL),
(77, 'Ocean View Resort', 20, '123 Seaside Avenue', 4.7, NULL),
(78, 'Harbor Heights Hotel', 20, '456 Maritime Street', 4.5, NULL),
(79, 'Bayside Bliss Inn', 20, '789 Portside Road', 4.6, NULL),
(80, 'Sunset Serenity Lodge', 20, '890 Sunset Boulevard', 4.4, NULL),
(81, 'Renaissance Retreat', 21, '234 Artisan Lane', 4.8, NULL),
(82, 'Culinary Charm Hotel', 21, '567 Gourmet Street', 4.6, NULL),
(83, 'Historic Elegance Inn', 21, '890 Heritage Square', 4.7, NULL),
(84, 'Artistic Oasis Lodge', 21, '123 Masterpiece Avenue', 4.5, NULL),
(85, 'Riverside Respite', 22, '456 Scenic Drive', 4.9, NULL),
(86, 'Villa Vista', 22, '789 Panorama Place', 4.7, NULL),
(87, 'Grand Gusto Hotel', 22, '012 Culinary Court', 4.8, NULL),
(88, 'Cultural Connection Inn', 22, '345 Heritage Highway', 4.6, NULL),
(89, 'Canal View Hotel', 23, '123 Waterfront Way', 4.8, NULL),
(90, 'Piazza Paradise Inn', 23, '456 Plaza Street', 4.7, NULL),
(91, 'Venetian Retreat', 23, '789 Bridge Avenue', 4.9, NULL),
(92, 'Gondola Grand Hotel', 23, '012 Canal Court', 4.6, NULL),
(93, 'Fashionista Hotel', 24, '123 Catwalk Lane', 4.5, NULL),
(94, 'Duomo Deluxe Inn', 24, '456 Cathedral Street', 4.7, NULL),
(95, 'Galleria Glamour Hotel', 24, '789 Gallery Avenue', 4.6, NULL),
(96, 'Chic City Retreat', 24, '012 Trendy Terrace', 4.8, NULL),
(97, 'Eternal Elegance Resort', 25, '123 History Boulevard', 4.9, NULL),
(98, 'Colosseum Comfort Suites', 25, '456 Gladiator Grove', 4.7, NULL),
(99, 'Vatican View Hotel', 25, '789 Holy Avenue', 4.8, NULL),
(101, 'anu', 19, 'anu anu anu', 1.0, NULL),
(102, 'ina ina ina', 29, 'ina ina ina', 2.0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id_room_type` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `price_per_night` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id_room_type`, `type_name`, `price_per_night`) VALUES
(1, 'Basic Single Bed', 300000),
(2, 'Standard Double Bed', 500000),
(3, 'Deluxe King Size Bed', 1000000),
(4, 'Velvet Package Room', 1300000),
(5, 'You knowww', 1928478953);

-- --------------------------------------------------------

--
-- Table structure for table `the_user`
--

CREATE TABLE `the_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `the_user`
--

INSERT INTO `the_user` (`id_user`, `username`, `password`) VALUES
(8, '123', '$2y$10$mvPfQ.f1aZTPmIT11hyf2uX99dE3RGzVLaMw123123123'),
(9, 'cute', '$2y$10$cldj7K8DMdmqTXiM/AY/xOkn3FYEL3fc5TG58VBf6.JHDZwvkoyzG'),
(10, '1234', '$2y$10$FFymWpSC0APzinh5WrmNgubTk/eHQZU3cn08LKSHQHYPqG18gGeKu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`admin_username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_room_type` (`id_room_type`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indexes for table `city_country`
--
ALTER TABLE `city_country`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `id_country` (`id_country`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `id_city` (`id_city`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id_room_type`);

--
-- Indexes for table `the_user`
--
ALTER TABLE `the_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `city_country`
--
ALTER TABLE `city_country`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id_room_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `the_user`
--
ALTER TABLE `the_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `the_user` (`id_user`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_room_type`) REFERENCES `room_type` (`id_room_type`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);

--
-- Constraints for table `city_country`
--
ALTER TABLE `city_country`
  ADD CONSTRAINT `city_country_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`);

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city_country` (`id_city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
