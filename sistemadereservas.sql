-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2024 a las 01:22:18
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
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `ID-RESERVA` int(11) NOT NULL,
  `DESTINO` varchar(20) NOT NULL,
  `ALOJAMIENTO` varchar(30) NOT NULL,
  `CHECK-IN` date NOT NULL,
  `CHECK-OUT` date NOT NULL,
  `ID-USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`ID-RESERVA`, `DESTINO`, `ALOJAMIENTO`, `CHECK-IN`, `CHECK-OUT`, `ID-USUARIO`) VALUES
(2, 'miami', 'Fairwind', '2024-11-07', '2024-11-22', 1),
(3, 'atenas', 'Royalty hotel', '2024-11-22', '2024-11-30', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID-USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO` varchar(20) NOT NULL,
  `DNI` int(10) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PREFERENCIAS` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID-USUARIO`, `NOMBRE`, `APELLIDO`, `DNI`, `EMAIL`, `PREFERENCIAS`) VALUES
(1, 'Angeles', 'Lanestosa', 43659131, 'angeleslanestosa@gmail.com', 'clima calido '),
(2, 'Candela ', 'Karaman', 45460395, 'candelakaraman@gmail.com', 'clima calido');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `ID-RESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID-USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
