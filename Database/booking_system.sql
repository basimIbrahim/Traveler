-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2025 at 03:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `HotelID` int(11) NOT NULL,
  `HotelName` varchar(100) NOT NULL,
  `HotelMoto` text NOT NULL,
  `AboutTheStay` text NOT NULL,
  `HotelAmenities` varchar(255) NOT NULL,
  `HotelType` varchar(100) NOT NULL,
  `HotelView` varchar(100) NOT NULL,
  `NearPlace` varchar(100) NOT NULL,
  `CheckInHour` time NOT NULL,
  `CheckOutHour` time NOT NULL,
  `Highlight1` varchar(255) NOT NULL,
  `Highlight2` varchar(255) NOT NULL,
  `MainImg` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL,
  `MinimumPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`HotelID`, `HotelName`, `HotelMoto`, `AboutTheStay`, `HotelAmenities`, `HotelType`, `HotelView`, `NearPlace`, `CheckInHour`, `CheckOutHour`, `Highlight1`, `Highlight2`, `MainImg`, `img2`, `img3`, `img4`, `img5`, `MinimumPrice`) VALUES
(1, 'Four Seasons Hotel Riyadh', ' premium service and elegant rooms.', 'Four Seasons Hotel Riyadh is a 5-star luxury hotel perched in Riyadh’s landmark Kingdom Tower, offering premium service, elegant rooms, and upscale amenities including spa, fine dining, and world-class hospitality.', ' Premium spa & wellness center\r\n', 'Luxury', 'Towers View', 'City Center', '15:00:00', '13:00:00', 'Free breakfast for 2', 'Located at Kingdom Centre Tower', 'images/Riyadh-Seasons-Hotel.jpg', 'images\\fourseasons_main.jpg', 'images\\fourseasons_1.jpg', 'images\\fourseasons_2.jpg', 'images/Riyadh-Seasons-Hotel.jpg\r\n\r\n\r\n', 320.00),
(2, 'Shangri-La Hotel Jeddah', 'Luxurious five-star hotel offering elegant rooms, exceptional service, and breathtaking views.', 'A luxurious five-star hotel offering elegant rooms, exceptional service, and breathtaking sea views. Enjoy premium facilities, high-speed Wi-Fi, spa access, and gourmet breakfast with Corniche views.', ' ✓ Sea-view infinity pool & 24/7 room service                                   \r\n ', 'premium', 'Sea View ', 'Located on Jeddah Corniche', '03:00:00', '12:00:00', ' Tower sea-view rooms\r\n\r\n Premium linens & amenities\r\n\r\n', 'Free breakfast for 2\r\nFlexible cancellation (48h)', 'images/Shangri-La Jeddah.jpg', 'images\\shang_main.jpg', 'images\\shang_1.jpg', 'images\\shang_2.jpg', 'images/Shangri-La Jeddah.jpg', 260.00),
(11, 'Jeddah Hilton Suites ', 'Sea-view suites with private balconies, spa access, and gourmet breakfast included ', 'Jeddah Hilton is a 5-star waterfront hotel on Jeddah’s Corniche offering luxury rooms, Red Sea views, and premium facilities including spa, pools, restaurants, and high-speed Wi-Fi, flat-screen TVs, and spacious living areas.', 'Red Sea beachfront &\r\n Indoor & outdoor pools\r\n', 'Luxury ', 'Waterfront ', '0.5 km to beach', '03:00:00', '12:00:00', 'Red Sea views\r\n', 'King bed, luxury amenities', 'images/jeddah hilton photo.png', 'images\\hilton_main.jpg', 'images\\hilton_1.jpg', 'images\\hilton_2.jpg', 'images/jeddah hilton photo.png', 250.00);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_bookings`
--

CREATE TABLE `hotel_bookings` (
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `PaymentID` int(11) DEFAULT NULL,
  `CheckInHour` time NOT NULL,
  `CheckOutHour` time NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Status` enum('pending','confirmed','cancelled') NOT NULL DEFAULT 'confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RoomID` int(11) DEFAULT NULL,
  `TourID` int(11) DEFAULT NULL,
  `RoomPrice` decimal(10,2) DEFAULT NULL,
  `TourPrice` decimal(10,2) DEFAULT NULL,
  `Method` enum('Credit Card','PayPal','Apple Pay') NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Status` enum('pending','completed','failed') NOT NULL DEFAULT 'completed',
  `PaidAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `RoomType` varchar(100) NOT NULL,
  `RoomDescription` text DEFAULT NULL,
  `RoomSize` varchar(20) NOT NULL,
  `RoomView` varchar(100) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `RoomFeature` text DEFAULT NULL,
  `RoomImg` varchar(255) NOT NULL,
  `RoomPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `HotelID`, `RoomType`, `RoomDescription`, `RoomSize`, `RoomView`, `Capacity`, `RoomFeature`, `RoomImg`, `RoomPrice`) VALUES
(1, 1, 'Superior King Room', 'King Room With A Beautiful View, Ideal for Couples and Business Travelers', '45 m²', 'City view', 2, '35th Floor', 'images\\fourseasons_room1.jpg', 320.00),
(2, 1, 'Premier Suite', 'Premier Suite with luxurious amenities and stunning city views.', '65 m²', 'Skyline view', 3, 'Window Wall', 'images\\fourseasons_room2.jpg', 420.00),
(3, 1, 'Royal Kingdom Suite', 'Private Floor, Have its own amenities and services for an exclusive experience ideal for big families or groups.', '120 m²', 'Panoramic skyline', 10, 'Private Floor', 'images\\fourseasons_room3.jpg', 750.00),
(4, 2, 'Deluxe King ', 'Breakfast included • Wi-Fi • Elegant interior', '38 m²', 'Sea View ', 2, 'Balcony ', 'images\\shang_room1.jpg', 260.00),
(5, 2, 'Premier Sea Suite', 'Spa access • Breakfast • Concierge service', ' 55 m²', 'Balcony ', 3, 'Ocean view', 'images\\shang_room2.jpg', 340.00),
(6, 2, 'Royal Penthouse ', 'Private dining • Lounge access • Butler service', '110 m²', 'Terrace', 4, 'Panoramic sea ', 'images\\shang_room3.jpg', 650.00),
(7, 11, 'Deluxe Red Sea Room', 'Deluxe Room with Balcony and city view, perfect for couples.  ', ' 40 m²', 'City view ', 2, 'Big window ', 'images\\hilton_room1.jpg', 250.00),
(8, 11, 'Executive Suite ', 'Executive lounge access with huge living area and premium amenities ', ' 60 m²', 'Sea view ', 3, 'Balcony ', 'images\\hilton_room2.jpg', 350.00),
(9, 11, 'Royal Sea Suite ', 'Royal Sea Suite  with all amenities and a panoramic Sea view ', '100 m²', 'Royal Suite ', 8, 'panoramic Sea view ', 'images\\hilton_room3.jpg', 600.00);

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `TourID` int(11) NOT NULL,
  `TourName` varchar(100) NOT NULL,
  `Moto` text NOT NULL,
  `AboutTheAdventure` text NOT NULL,
  `TourAmenities` varchar(255) NOT NULL,
  `TourType` varchar(100) NOT NULL,
  `ForWho` varchar(100) NOT NULL,
  `Place` varchar(100) NOT NULL,
  `TourCheckInHour` time NOT NULL,
  `TourCheckOutHour` time NOT NULL,
  `TourHighlight1` varchar(255) NOT NULL,
  `TourHighlight2` varchar(255) NOT NULL,
  `MainImg` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL,
  `TourPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`TourID`, `TourName`, `Moto`, `AboutTheAdventure`, `TourAmenities`, `TourType`, `ForWho`, `Place`, `TourCheckInHour`, `TourCheckOutHour`, `TourHighlight1`, `TourHighlight2`, `MainImg`, `img2`, `img3`, `img4`, `img5`, `TourPrice`) VALUES
(1, 'Fakieh Aquarium ', 'Fakieh Aquarium is the only aquarium for the public in Saudi Arabia and offers education and entertainment by presenting the wonders of the underwater', 'Discover the enchanting world of over 200 marine species, each with its own unique charm and hidden wonders. From the mighty Napoleon wrasse to shimmering rays, every visit unveils nature\'s most beautiful treasures. Immerse yourself in the beauty and diversity of the sea,  where each encounter reveals new worlds.', 'Underwater glass tunnel &\r\n Dolphin show\r\n', 'Adventure ', 'Family ', 'City Center of Jeddah ', '10:00:00', '12:00:00', 'Red Sea marine life exhibits\r\n\r\n', 'Shark and stingray displays', 'images\\fakieh-aquarium.jpg', 'images/Fakieh-AquariumTour.webp', 'images\\fakieh-aquarium-main.jpg', 'images\\fakieh-aquarium-Dolphin-show.jpg', 'images/Fakieh-AquariumTour.webp', 75.00),
(2, 'Boulevard World', 'BLVD World this season takes you on a magical experience from the heart of Riyadh Explore new zones .', 'Boulevard World is one of Riyadh Season’s biggest entertainment zones, featuring cultural areas inspired by many countries, a huge man-made lake with boat rides, fun attractions, shows, restaurants, and shopping. It offers a “world tour” experience in one place with zones from Europe, Asia, Africa, and the Americas.', 'Global cultural zones ', 'Entertainment', 'All ages', 'Along Prince Turki Al-Awwal Road', '04:00:00', '01:00:00', 'World-themed cultural zones', 'Family-friendly fun areas', 'images\\Boulevard-World-Main.webp', 'images/Boulevard-img2.webp', 'images\\Boulevard-img3.webp', 'images\\Boulevard-img4.webp', 'images\\Boulevard-img5.webp', 30.00),
(3, 'Al Shallal Theme Park', 'Thrills, fun, and family adventures on Jeddah’s Corniche', 'Al Shallal Theme Park is a major amusement park located on Jeddah’s Corniche.\r\nIt offers thrill rides, family-friendly attractions, and an indoor ice-skating rink.\r\nVisitors can enjoy games, arcades, dining, and shopping within the park.\r\nIt’s designed for all ages, making it perfect for families, friends, and couples.', 'Thrill rides & roller coasters', 'Amusement', 'Family‑friendly', 'Al Kurnaysh Road', '04:30:00', '12:00:00', 'Fun rides for families & kids', 'High‑thrill rides', 'images\\Al-Shlal-main.jpg', 'images/aL-Shlal-img2.jpg', 'images\\Al-Shlal-img3.webp', 'images\\Al-Shlal-img4.jpeg', 'images\\Al-Shlal-img5.webp', 35.00);

-- --------------------------------------------------------

--
-- Table structure for table `tour_bookings`
--

CREATE TABLE `tour_bookings` (
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TourID` int(11) NOT NULL,
  `PaymentID` int(11) DEFAULT NULL,
  `BookingDate` date NOT NULL,
  `CheckInHour` time NOT NULL,
  `CheckOutHour` time NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Status` enum('pending','confirmed','cancelled') NOT NULL DEFAULT 'confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Email`, `PasswordHash`) VALUES
(7, 'Basim', 's445005309@uqu.edu.sa', '1129682926');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`HotelID`);

--
-- Indexes for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `HotelID` (`HotelID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `PaymentID` (`PaymentID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `TourID` (`TourID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `HotelID` (`HotelID`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`TourID`);

--
-- Indexes for table `tour_bookings`
--
ALTER TABLE `tour_bookings`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `TourID` (`TourID`),
  ADD KEY `PaymentID` (`PaymentID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `HotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `TourID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tour_bookings`
--
ALTER TABLE `tour_bookings`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD CONSTRAINT `hotel_bookings_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `hotel_bookings_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `hotel_bookings_ibfk_3` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `hotel_bookings_ibfk_4` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`PaymentID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`TourID`) REFERENCES `tour` (`TourID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`);

--
-- Constraints for table `tour_bookings`
--
ALTER TABLE `tour_bookings`
  ADD CONSTRAINT `tour_bookings_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `tour_bookings_ibfk_2` FOREIGN KEY (`TourID`) REFERENCES `tour` (`TourID`),
  ADD CONSTRAINT `tour_bookings_ibfk_3` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`PaymentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
