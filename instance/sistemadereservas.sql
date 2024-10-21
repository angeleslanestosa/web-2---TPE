-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2024 a las 00:49:33
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
  `IDDESTINATION` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `attractions` varchar(100) NOT NULL,
  `season` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destination`
--

INSERT INTO `destination` (`IDDESTINATION`, `name`, `description`, `attractions`, `season`) VALUES
(10, 'Paris', 'Una importante ciudad europea, cuna de la moda y con una gastronomia increible.', 'Torre Eiffel, Catedral de Notre Dame, Museo del Louvre', 'octubre'),
(11, 'Miami', 'Perfecto para compartir un viaje divertido con amigos y divertirse al máximo. ', 'Wynwood walls, Coconut Grove', 'julio'),
(12, 'New York', 'Perfecto para asombrarse y experimentar la increible y movida vida newyorkina', 'Times Square', 'julio'),
(19, 'Bali', 'Un lugar increible lleno de naturaleza, paz y muchas olas!', 'Pandawa beach, Monte agung', 'enero'),
(20, 'Sydney', 'Una de las ciudades más grandes de Australia, es famosa por su Casa de la Ópera de Sídney junto al puerto', 'Opera', 'enero'),
(21, 'Buenos Aires', 'Buenos Aires es la gran capital cosmopolita de Argentina.', 'Teatro colon', 'enero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `IDRESERVA` int(11) NOT NULL,
  `destination` varchar(20) DEFAULT NULL,
  `housing` varchar(30) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `IDUSUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`IDRESERVA`, `destination`, `housing`, `checkin`, `checkout`, `IDUSUARIO`) VALUES
(7, 'Hawaii', 'Hawaii apart', '2024-11-06', '2024-11-22', 16),
(9, 'Dubai', 'Hilton', '2024-10-31', '2024-11-12', 16),
(10, 'Orlando', 'Holliday Inn ', '2024-11-06', '2024-11-22', 11),
(12, 'Buenos Aires', 'Hilton', '2024-10-25', '2024-10-31', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDUSUARIO` int(11) NOT NULL,
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

INSERT INTO `usuario` (`IDUSUARIO`, `name`, `lastname`, `dni`, `email`, `password`, `preferences`) VALUES
(11, 'Tobias', 'Romano', 43216947, 'tobiasromano151@gmail.com', '$2y$10$Jy992R/r66gd.zliy/ETEueHS1NQ0iWDVsRCZgz944CgVTOqFPORG', 'clima calido'),
(14, 'Candela', 'Karaman', 45460395, 'candelakaraman@gmail.com', '$2y$10$RuL5v0nGPCoKr8P1gV8J2uAidg6OFphXYurJe9Xo8iyAVIw7xLt2e', 'clima calido'),
(15, 'webadmin', 'web', 1111, 'webadmin@gmail.com', '$2y$10$5m3l/Sftk8JIc4rS/dO0ye0gqsn48l8W7Qdg.892/PCRbErsO7bcy', 'clima frio'),
(16, 'Angeles', 'Lanestosa', 43659131, 'angeleslanestosa@gmail.com', '$2y$10$90EMXpS4P24RQBUWh5rsMeM3fJIWb3jyKuzIjdi7naBI2kCsY6ANC', 'clima calido');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`IDDESTINATION`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`IDRESERVA`),
  ADD KEY `ID-USUARIO` (`IDUSUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUSUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destination`
--
ALTER TABLE `destination`
  MODIFY `IDDESTINATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `IDRESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`IDUSUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
