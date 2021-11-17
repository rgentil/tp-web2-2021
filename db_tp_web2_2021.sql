-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 19:39:39
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tp_web2_2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE `avion` (
  `id_avion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fabricante` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `id_hangar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avion`
--

INSERT INTO `avion` (`id_avion`, `nombre`, `fabricante`, `tipo`, `id_hangar`) VALUES
(1, 'F-14 Tomcat', 'Grumman / Northrop Grumman', 'Interceptor, caza de superioridad aérea y caza polivalente', 1),
(2, 'MiG-29', 'Mikoyan', 'Caza polivalente', 1),
(3, 'YF-14A Tomcat', 'Grumman / Northrop Grumman', 'Interceptor, caza de superioridad aérea y caza polivalente', 2),
(4, 'F-14A Tomcat', 'Grumman / Northrop Grumman', 'Interceptor, caza de superioridad aérea y caza polivalente', 2),
(5, 'F-14A+ Plus Tomcat', 'Grumman / Northrop Grumman', 'Interceptor, caza de superioridad aérea y caza polivalente', 2),
(6, 'F-14D Super Tomcat', 'Grumman / Northrop Grumman', 'Interceptor, caza de superioridad aérea y caza polivalente', 3),
(7, 'F-14D Quickstricke Tomcat', 'Grumman / Northrop Grumman', 'Interceptor, caza de superioridad aérea y caza polivalente', 3),
(8, 'Super Tomcat 21', 'Grumman / Northrop Grumman', 'Interceptor, caza de superioridad aérea y caza polivalente', 4),
(9, 'Mirage III', 'Dassault Aviation', 'Interceptor', 4),
(10, 'Mirage IV', 'Dassault Aviation', 'Bombardero estratégico', 4),
(11, 'AH-64 Apache', 'Hughes Helicopters/McDonnell Douglas/Boeing', 'Helicóptero de ataque', 6),
(12, 'RAH-66 Comanche', 'Boeing Helicopters y Sikorsky Aircraft Corporation', 'Helicóptero de ataque y reconocimiento', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `puntuacion` int(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_avion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `descripcion`, `puntuacion`, `id_usuario`, `id_avion`) VALUES
(22, 'comentario5', 2, 5, 1),
(29, 'ghgfhfg', 2, 11, 1),
(30, 'ghgfhfg', 2, 11, 1),
(33, 'uuuuuuuu', 3, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hangar`
--

CREATE TABLE `hangar` (
  `id_hangar` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hangar`
--

INSERT INTO `hangar` (`id_hangar`, `nombre`, `ubicacion`, `capacidad`) VALUES
(1, 'Hangar 1', 'Norte 1-1', 2),
(2, 'Hangar 2', 'Sur 1-1', 9),
(3, 'Hangar 3', 'Norte 1-2', 5),
(4, 'Hangar 4', 'Centro 1-1', 5),
(5, 'Hangar 5', 'Norte 1-3', 2),
(6, 'Hangar 6', 'Centro 1-2', 3),
(7, 'Hangar 7', 'Sur 1-3', 2),
(13, 'Nuevo hangar', 'Lejos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `codigo`, `password`, `rol`, `email`) VALUES
(4, 'Administrador', 'admin', '$2y$10$SrR.vnHy/Dc14obSWNEiyeovf5eKS78DwJsqDpG2sPMpy9zXZAkCO', 'Admin', ''),
(11, 'Ricardo', 'Administrador', '$2y$10$k38tIAbSTR..JkH88iVSw.bFuy2MXOrONYfKn6lqMjJGAvTeavlv.', 'Admin', ''),
(12, 'Juan Carlos ', 'juanca', '$2y$10$e10uFEVDCCH2cvEZH.EC7uLCyilzh9IbGjAFIwclkILskhpxRuBpq', 'Comun', ''),
(13, 'Comun', 'comun', '$2y$10$pFxTjCF.FjxRTm9IZv0nC.LBpJRWS9do7/Hk73pD5nDFx1KWu8Iri', 'Admin', ''),
(22, 'Usuario Comun', 'usuariocomun', '$2y$10$LTkQk9lrfuNwfXuysBD6ueu1ooQQ35bNI/ifTGO.svodvjNWNsNMC', 'Comun', 'e3@hotmail.com'),
(26, 'Carlos Marx', 'carlos21', '$2y$10$WZaAjUjSj7wxjKRuTyuSn.IVEdRxhmExjyBscYl1XU/XjYUthE81y', 'Admin', 'carlos21@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`id_avion`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `hangar`
--
ALTER TABLE `hangar`
  ADD PRIMARY KEY (`id_hangar`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avion`
--
ALTER TABLE `avion`
  MODIFY `id_avion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `hangar`
--
ALTER TABLE `hangar`
  MODIFY `id_hangar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
