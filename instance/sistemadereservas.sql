-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2024 a las 18:34:16
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
(1, 'Sydney', 'Una de las ciudades más grandes de Australia, es famosa por su Casa de la Ópera de Sídney junto al puerto', 'Opera', 'febrero'),
(10, 'Paris', 'Una importante ciudad europea, cuna de la moda y con una gastronomia increible.', 'Torre Eiffel, Catedral de Notre Dame, Museo del Louvre', 'octubre'),
(11, 'Miami', 'Perfecto para compartir un viaje divertido con amigos y divertirse al máximo. ', 'Wynwood walls, Coconut Grove', 'julio'),
(12, 'New York', 'Perfecto para asombrarse y experimentar la increible y movida vida newyorkina', 'Times Square', 'julio'),
(19, 'Bali', 'Un lugar increible lleno de naturaleza, paz y muchas olas!', 'Pandawa beach, Monte agung', 'enero'),
(20, 'Sydney', 'Una de las ciudades más grandes de Australia, es famosa por su Casa de la Ópera de Sídney junto al puerto', 'Opera', 'enero');

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
(10, 'San Rafael, Mendoza', 'San Martin Hotel y spa', '2023-02-09', '2023-02-15', 14),
(11, 'Destino Ejemplooo', 'Alojamiento Ejemplo', '2024-12-01', '2024-12-10', 14),
(21, 'Barcelona, España', 'Hotel majestic Barcelona', '2022-03-04', '2022-03-11', 15),
(22, 'París, Francia', 'Hôtel Central Bastille', '2022-03-12', '2022-03-17', 15),
(24, 'Tokio, Japón', 'Park Hyatt Tokyo', '2025-05-05', '2025-05-19', 15);

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
  MODIFY `IDDESTINATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `IDRESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
