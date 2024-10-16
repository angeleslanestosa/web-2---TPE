-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 01:13:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadereservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destination`
--

CREATE TABLE `destination` (
  `ID-DESTINATION` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `attractions` varchar(100) NOT NULL,
  `season` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `ID-RESERVA` int(11) NOT NULL,
  `destination` varchar(20) DEFAULT NULL,
  `housing` varchar(30) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `ID-USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID-USUARIO` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `dni` int(40) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `preferences` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID-USUARIO`, `name`, `lastname`, `dni`, `email`, `password`, `preferences`) VALUES
(11, 'Tobias', 'Romano', 43216947, 'tobiasromano151@gmail.com', '$2y$10$Jy992R/r66gd.zliy/ETEueHS1NQ0iWDVsRCZgz944CgVTOqFPORG', 'clima calido'),
(13, 'Angeles', 'Lanestosa', 43659131, 'angeleslanestosa@gmail.com', '$2y$10$db4/4Phvr1ynlFBu/nrmx./tyyb7x9RohXS.9M/drr67HQRvTQwJ.', 'clima calido'),
(14, 'Candela', 'Karaman', 45460395, 'candelakaraman@gmail.com', '$2y$10$RuL5v0nGPCoKr8P1gV8J2uAidg6OFphXYurJe9Xo8iyAVIw7xLt2e', 'clima calido'),
(15, 'webadmin', 'web', 1111, 'webadmin@gmail.com', '$2y$10$5m3l/Sftk8JIc4rS/dO0ye0gqsn48l8W7Qdg.892/PCRbErsO7bcy', 'clima frio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`ID-DESTINATION`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`ID-RESERVA`),
  ADD KEY `ID-USUARIO` (`ID-USUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID-USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destination`
--
ALTER TABLE `destination`
  MODIFY `ID-DESTINATION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `ID-RESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID-USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`ID-USUARIO`) REFERENCES `usuario` (`ID-USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
