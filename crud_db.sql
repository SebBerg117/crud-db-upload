-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2023 at 03:34 AM
-- Server version: 8.0.34
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `info_db`
--

CREATE TABLE `info_db` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `id_deporte` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `info_db`
--

INSERT INTO `info_db` (`id`, `nombre`, `apellido`, `edad`, `id_deporte`) VALUES
(1, 'Braulio', 'Balan', 20, 1),
(2, 'Juan', 'Puc', 25, 1),
(3, 'Jesus', 'Sanchez', 20, 1),
(4, 'Maria', 'Martinez', 25, 1),
(5, 'Guadalupe', 'Vazquez', 20, 3),
(6, 'Luis', 'Roman', 20, 2),
(7, 'Jair', 'Gil', 23, 3),
(8, 'Mari', 'Chi', 16, 2),
(9, 'Yari', 'Chi', 16, 2),
(10, 'Mario', 'Perez', 24, 3),
(11, 'Angelica', 'Casanova', 23, 1),
(12, 'Yolanda', 'Díaz', 21, 1),
(13, 'Jose', 'Barbosa', 20, 1),
(14, 'Isaac', 'García', 26, 2),
(15, 'Alejandro', 'Torres', 21, 1),
(16, 'Antonio', 'Sanchez', 33, 1),
(17, 'Rocio', 'Puc', 40, 1),
(18, 'Emily', 'Goméz', 20, 1),
(19, 'Jorge', 'Avilés', 19, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_dbandinfo_deporte`
-- (See below for the actual view)
--
CREATE TABLE `info_dbandinfo_deporte` (
`id` int
,`nombre` varchar(255)
,`apellido` varchar(255)
,`edad` int
,`id_deporte` int
,`Deporte` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `info_deporte`
--

CREATE TABLE `info_deporte` (
  `id` int NOT NULL,
  `deporte` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lugar` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `info_deporte`
--

INSERT INTO `info_deporte` (`id`, `deporte`, `lugar`) VALUES
(1, 'Futbol', 'Ferrocarril'),
(2, 'Basquet', 'Cancha'),
(3, 'Béisbol', 'Campo');

-- --------------------------------------------------------

--
-- Structure for view `info_dbandinfo_deporte`
--
DROP TABLE IF EXISTS `info_dbandinfo_deporte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_dbandinfo_deporte`  AS SELECT `info_db`.`id` AS `id`, `info_db`.`nombre` AS `nombre`, `info_db`.`apellido` AS `apellido`, `info_db`.`edad` AS `edad`, `info_db`.`id_deporte` AS `id_deporte`, `info_deporte`.`deporte` AS `Deporte` FROM (`info_db` join `info_deporte` on((`info_db`.`id_deporte` = `info_deporte`.`id`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_db`
--
ALTER TABLE `info_db`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_deporte` (`id_deporte`);

--
-- Indexes for table `info_deporte`
--
ALTER TABLE `info_deporte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info_db`
--
ALTER TABLE `info_db`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `info_deporte`
--
ALTER TABLE `info_deporte`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info_db`
--
ALTER TABLE `info_db`
  ADD CONSTRAINT `info_db_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `info_deporte` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
