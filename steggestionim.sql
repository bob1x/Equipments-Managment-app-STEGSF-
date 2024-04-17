-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 10:20 AM
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
-- Database: `steggestionim`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `image`) VALUES
(1, 'Meuble', '/images/office_elements.png'),
(2, 'Tech', '/images/techjpeg.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id_equipment` int(8) NOT NULL,
  `Referance` varchar(8) NOT NULL,
  `id_subcategory` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id_equipment`, `Referance`, `id_subcategory`, `name`, `image`, `description`) VALUES
(1, 'ROG233', 2, 'asus rog', '/images/zephirus.jpg', 'great gaming pc '),
(2, 'PICMOY2', 3, 'imprimante moyenne ', '/images/Photocopieur moyen.jpeg', 'Nice print'),
(3, 'PICGRAN1', 3, 'imprimante Grand', '/images/Photocopieur grand.jpeg', 'Greate'),
(5, 'TABXL21', 1, 'table long', '/images/longtable.jpeg', 'LONG TABLE'),
(6, 'AR32', 4, 'Armoire', '/images/Armoire de rangemen.jpg', 'great at stroing ');

-- --------------------------------------------------------

--
-- Table structure for table `local`
--

CREATE TABLE `local` (
  `id_local` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `placement` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `local`
--

INSERT INTO `local` (`id_local`, `name`, `placement`, `image`) VALUES
(1, 'Salle de reunion', '1er ETAGE', '/images/salleReunions.png'),
(2, 'Bureau 23', '1er ETAGE', '/images/b23.png'),
(3, 'Bureau 24', '1er ETAGE', '/images/b24.png'),
(4, 'Bureau 25', '1er ETAGE', '/images/b25.png'),
(5, 'Bureau 26', '1er ETAGE', '/images/b26.png'),
(6, 'Bureau 27', '1er ETAGE', '/images/b27.png'),
(7, 'Bureau 28', '1er ETAGE', '/images/b28.png'),
(8, 'Bureau 29', '1er ETAGE', '/images/b29.png'),
(9, 'Bureau 30', '1er ETAGE', '/images/b30.png'),
(10, 'Bureau 31', '1er ETAGE', '/images/b31.png');

-- --------------------------------------------------------

--
-- Table structure for table `localequipment`
--

CREATE TABLE `localequipment` (
  `id_local` int(8) NOT NULL,
  `id_equipment` int(8) NOT NULL,
  `status` varchar(255) NOT NULL,
  `unique_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `localequipment`
--

INSERT INTO `localequipment` (`id_local`, `id_equipment`, `status`, `unique_id`) VALUES
(1, 1, 'nouveau', '24485'),
(1, 5, 'nouveau', '33114'),
(1, 2, 'En panne', '40067'),
(2, 3, 'In Service', '44093'),
(1, 6, 'casse', '68726'),
(2, 6, 'nouveau', '76689'),
(7, 2, 'nouveau', '78894'),
(2, 2, 'En panne', '86234'),
(2, 1, 'In Service', '92207'),
(2, 5, 'nouveau', '98406');

-- --------------------------------------------------------

--
-- Table structure for table `localusers`
--

CREATE TABLE `localusers` (
  `id_local` int(8) NOT NULL,
  `id_user` int(8) NOT NULL,
  `mat_user` int(5) NOT NULL,
  `Refop` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `localusers`
--

INSERT INTO `localusers` (`id_local`, `id_user`, `mat_user`, `Refop`) VALUES
(1, 1, 12345, 1),
(2, 1, 12345, 2),
(7, 1, 12345, 3),
(10, 3, 23456, 4);

-- --------------------------------------------------------

--
-- Table structure for table `logsequipment`
--

CREATE TABLE `logsequipment` (
  `id` int(11) NOT NULL,
  `id_local` int(8) NOT NULL,
  `local_name` varchar(50) NOT NULL,
  `placement` varchar(50) NOT NULL,
  `ref_equipment` varchar(8) NOT NULL,
  `equipment_name` varchar(50) NOT NULL,
  `mat_user` int(5) NOT NULL,
  `role_user` varchar(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `typelog` varchar(40) NOT NULL,
  `date_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logsequipment`
--

INSERT INTO `logsequipment` (`id`, `id_local`, `local_name`, `placement`, `ref_equipment`, `equipment_name`, `mat_user`, `role_user`, `user_name`, `status`, `typelog`, `date_update`) VALUES
(9, 1, 'Salle de reunion', '1er ETAGE', 'PICGRAN1', 'imprimante Grand', 12345, 'admin', 'Bob b', '', 'Retirer', '2024-03-14'),
(10, 1, 'Salle de reunion', '1er ETAGE', 'PICMOY2', 'imprimante moyenne ', 12345, 'admin', 'Bob b', 'nouveau', 'Retirer', '2024-03-14'),
(11, 2, 'Bureau 23', '1er ETAGE', 'AR32', 'Armoire', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-03-14'),
(12, 2, 'Bureau 23', '1er ETAGE', 'ROG233', 'asus rog', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-03-14'),
(13, 2, 'Bureau 23', '1er ETAGE', 'TABXL21', 'table long', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-03-14'),
(14, 2, 'Bureau 23', '1er ETAGE', 'PICMOY2', 'imprimante moyenne ', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-03-14'),
(15, 2, 'Bureau 23', '1er ETAGE', 'PICMOY2', 'imprimante moyenne ', 12345, 'admin', 'Bob b', 'nouveau', 'Retirer', '2024-03-14'),
(16, 2, 'Bureau 23', '1er ETAGE', 'PICGRAN1', 'imprimante Grand', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-03-14'),
(17, 1, 'Salle de reunion', '1er ETAGE', 'ROG233', 'asus rog', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-03-14'),
(18, 1, 'Salle de reunion', '1er ETAGE', 'TABXL21', 'table long', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-03-14'),
(19, 1, 'Salle de reunion', '1er ETAGE', 'AR32', 'Armoire', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-03-14'),
(20, 1, 'Salle de reunion', '1er ETAGE', 'PICMOY2', 'imprimante moyenne ', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-03-14'),
(21, 7, 'Bureau 28', '1er ETAGE', 'PICMOY2', 'imprimante moyenne ', 12345, 'admin', 'Bob b', 'nouveau', 'Ajouter', '2024-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `logslocals`
--

CREATE TABLE `logslocals` (
  `id` int(11) NOT NULL,
  `refop` int(8) NOT NULL,
  `local_name` varchar(50) NOT NULL,
  `mat_user` int(5) NOT NULL,
  `role_user` varchar(30) NOT NULL,
  `typelog` varchar(30) NOT NULL,
  `date_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logslocals`
--

INSERT INTO `logslocals` (`id`, `refop`, `local_name`, `mat_user`, `role_user`, `typelog`, `date_update`) VALUES
(1, 1, 'Salle de reunion', 12345, 'admin', 'Assign', '2024-03-08'),
(2, 2, 'Bureau 23', 12345, 'admin', 'Assign', '2024-03-08'),
(3, 3, 'Bureau 28', 12345, 'admin', 'Assign', '2024-03-08'),
(4, 4, 'Bureau 31', 23456, 'admin', 'Assign', '2024-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id_subcategory` int(8) NOT NULL,
  `id_category` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id_subcategory`, `id_category`, `name`, `image`) VALUES
(1, 1, 'Tables', '/images/tablessub.jpeg'),
(2, 2, 'Pc', '/images/pc.png'),
(3, 2, 'imprimante', '/images/Imprimente.jpeg'),
(4, 1, 'Meuble Bureatique', '/images/meuble.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(8) NOT NULL,
  `mat_user` int(5) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(8) NOT NULL DEFAULT 'user',
  `telnum` int(10) NOT NULL,
  `Fonction` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `mat_user`, `name`, `email`, `password`, `role`, `telnum`, `Fonction`) VALUES
(1, 12345, 'Bob b', 'aloun123@gg.com', '12', 'admin', 9282822, 'Site Admin '),
(3, 23456, 'Ali', 'ali@gmail.com', '&é', 'admin', 3232232, 'manager'),
(4, 212121, 'ahmed', 'ahmed@gmail.com', '12', 'user', 98765432, 'Agent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id_equipment`),
  ADD UNIQUE KEY `Referance` (`Referance`),
  ADD KEY `id_subcategory` (`id_subcategory`);

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`);

--
-- Indexes for table `localequipment`
--
ALTER TABLE `localequipment`
  ADD PRIMARY KEY (`unique_id`),
  ADD KEY `id_local` (`id_local`),
  ADD KEY `id_equipment` (`id_equipment`);

--
-- Indexes for table `localusers`
--
ALTER TABLE `localusers`
  ADD PRIMARY KEY (`Refop`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_local` (`id_local`);

--
-- Indexes for table `logsequipment`
--
ALTER TABLE `logsequipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_local` (`id_local`),
  ADD KEY `ref_equipment` (`ref_equipment`),
  ADD KEY `mat_user` (`mat_user`);

--
-- Indexes for table `logslocals`
--
ALTER TABLE `logslocals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id_subcategory`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `mat_user` (`mat_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id_equipment` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `localusers`
--
ALTER TABLE `localusers`
  MODIFY `Refop` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logsequipment`
--
ALTER TABLE `logsequipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `logslocals`
--
ALTER TABLE `logslocals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id_subcategory` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
