-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2025 a las 19:27:48
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
-- Base de datos: `examenweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `id` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `linea_investigacion` varchar(128) NOT NULL,
  `resumen` text NOT NULL,
  `objetivos` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `id_tesista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`id`, `titulo`, `linea_investigacion`, `resumen`, `objetivos`, `fecha_inicio`, `fecha_fin`, `estado`, `id_tesista`) VALUES
(1, 'tesis 1', 'Redes', 'resumen 1', 'objetivos 1', '2025-06-01', '2025-06-11', 0, 2),
(2, 'tesis 1', 'redes', 'resumen1', 'obj 1', '2025-06-01', '2025-06-11', 0, 2),
(3, 'tesis 2', 'Ing. Software', 'resumen 2', 'onjivos 2', '2025-06-01', '2025-06-09', 1, 2),
(4, 'tesis 3 for lozano', 'Ing. Software', 'resumen 3', 'objetivos 3', '2025-06-01', '2025-06-11', 1, 3),
(5, 'tesis 4', 'Ing. Software', 'res 4', 'obj 4', '2025-06-05', '2025-06-02', 1, 2),
(6, 'tesis 5', 'Ing. Software', 'res5', 'obj 5', '2025-06-10', '2025-06-02', 1, 2),
(7, 'tesis 6', 'Ing. Software', 'res 6', 'obj 6', '2025-06-10', '2025-06-02', 1, 3),
(8, 'tesis 6', 'Ing. Software', 'ahas', 'asds', '2025-06-01', '2025-06-02', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesista`
--

CREATE TABLE `tesista` (
  `id` int(11) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `nombres` varchar(64) NOT NULL,
  `dni` char(8) NOT NULL,
  `escuela_profesional` varchar(64) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tesista`
--

INSERT INTO `tesista` (`id`, `apellidos`, `nombres`, `dni`, `escuela_profesional`, `estado`) VALUES
(1, 'lozano', 'Jhonatan', '73529270', 'Ing. Mecanica Electrica', 0),
(2, 'lozano paico', 'jhonatan williams', '44242424', 'Ing. Mecatronica', 1),
(3, 'lozano paico', 'jhonatan williams', '73529270', 'Ing. Mecatronica', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tesista` (`id_tesista`);

--
-- Indices de la tabla `tesista`
--
ALTER TABLE `tesista`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tesis`
--
ALTER TABLE `tesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tesista`
--
ALTER TABLE `tesista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD CONSTRAINT `fk_tesista` FOREIGN KEY (`id_tesista`) REFERENCES `tesista` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
