-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 17:10:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_nacimieno` date DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `matricula`, `correo`, `contrasena`, `nombre`, `apellido`, `direccion`, `fecha_nacimieno`, `id_rol`) VALUES
(1, '7984651', 'car@car', '$2y$10$jaB3eK0PKveDj3ReuGAROO1i7xOUhNRFWfZUT/q8aPrtr4Isq2IGu', 'carlos', 'sainz', 'dmmsamd', '2002-06-11', 2),
(2, '2', 'alumno@alumno', '$2y$10$XqeJEvv1YhXfu5SOXnlJvOUGM3aF8xIUrFmV3BYfryNQqJIsm6a5e', 'Juli', 'Castro', 'calle del silencio 25', '1982-04-06', 2),
(3, '3', 'fer@gmail', 'ser', 'Mar', 'Gutierres', 'calle norte 17 no 85', '1945-12-24', 2),
(4, '4', 'ger@gmail', 'ser', 'Albert', 'Tabera', 'siervo triste mz2', '2005-09-15', 2),
(5, '5', 'lal@gmail', 'ser', 'pika', 'sainz', 'noche triste 62', '2000-04-25', 2),
(6, '6', 'pik@gmail', 'ser', 'pedro', 'esperaza', 'belizario', '1999-12-31', 2),
(7, '7', 'ego@gmail', 'ser', 'rogelio', 'guerrero', 'no rompas mas', '2006-06-06', 2),
(9, '8451', '', '', 'alumno', 'alumno', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_clase`
--

CREATE TABLE `alumnos_clase` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_clase` int(11) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `comentarios` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos_clase`
--

INSERT INTO `alumnos_clase` (`id`, `id_alumno`, `id_clase`, `calificacion`, `comentarios`) VALUES
(1, 1, 1, 9, 'puedes mejorar'),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL),
(5, 5, 5, NULL, NULL),
(6, 6, 6, NULL, NULL),
(7, 7, 7, NULL, NULL),
(8, 2, 1, NULL, NULL),
(9, 3, 1, NULL, NULL),
(10, 4, 1, NULL, NULL),
(11, 5, 1, NULL, NULL),
(12, 1, 2, NULL, NULL),
(13, 1, 4, NULL, NULL),
(23, 2, 12, 6, 'hechale hanas'),
(24, 6, 12, 8, 'muy bien '),
(25, 5, 12, 9, 'puedes mejorar'),
(26, 4, 12, NULL, NULL),
(27, 3, 12, NULL, NULL),
(28, 2, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `id_maestro` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `id_maestro`, `id_materia`) VALUES
(1, 8, 1),
(2, 9, 2),
(3, 10, 3),
(4, 11, 4),
(5, 12, 5),
(6, 13, 6),
(7, 14, 7),
(8, 15, 1),
(9, 20, 6),
(10, 21, 4),
(11, 22, 2),
(12, 23, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(200) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `nombre`, `correo`, `contrasena`, `direccion`, `fecha_nacimiento`, `id_rol`, `apellido`) VALUES
(8, 'charly', 'carl@carl', '$2y$10$jwnlVSO46HV/aFYjcjBkyuPx2J2e2aP/Ew4hpzjRE.eZJXSSabA.a', 'calle de la asuncion 34', '2023-11-02', 3, 'guerrero'),
(9, 'marleniux', 'kar@kar', '$2y$10$VpaKc1xcieaTs.1kZxweJuHX65dbS78DzGNef/Q.E6HS4WxdFY28G', 'felipe 30', '2023-06-28', 3, 'sainz lara'),
(10, 'rodrigo Guerrero', 'rod@rod', 'rod', 'av de la reforma 482', '1991-05-08', 3, 'sainz'),
(11, 'samantha', 'sam@sam', 'sam', 'reforma socil 30', '1983-09-26', 3, 'lara'),
(12, 'sandrik ', 'san@san', 'san', 'guanajuato}', '1980-04-06', 3, 'mercado'),
(13, 'veronica', 'ver@ver', 'ver', 'plan de ayala', '1975-06-08', 3, 'tuzenr'),
(14, 'leonardo', 'leo@leo', 'leo', 'deconocido', '1956-12-12', 3, 'dicaprio'),
(15, 'pedro', '', NULL, 'tvuybinom', '2023-11-17', 3, 'chillon'),
(20, 'antonio', 'an@an', NULL, 'svnnfvnlvfn', '2023-11-02', 3, NULL),
(21, 'juan', 'jua@jua', NULL, 'rtyuio', '2010-03-25', 3, NULL),
(22, 'carmen', 'carmen@carmen', NULL, 'lalalalalalal', '2023-08-30', NULL, NULL),
(23, 'Sebastian', 'maestro@maestro', '$2y$10$yIsqkxZwNR5LF.qJL72sVOp/WqlWPDUfkIctAoFKTNBBW.yFUue.y', 'calle del refugio 85', '1989-11-15', 3, 'lopez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `materia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `materia`) VALUES
(1, 'fisica'),
(2, 'quimica'),
(3, 'literatura'),
(4, 'historia'),
(5, 'filosofia'),
(6, 'ingles'),
(7, 'calculo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'alumno'),
(3, 'maestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `contrasena` varchar(200) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol_id`) VALUES
(1, 'admin', 'admin@admin', '$2y$10$FVPKKXStpfJK6B0JpbDfz.ueoApVYXXFbGkVnMhdgXO80HRE9DccG', 1),
(2, 'alumno', '', '', 2),
(3, 'maestro', '', '', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `alumnos_clase`
--
ALTER TABLE `alumnos_clase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_clase` (`id_clase`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_maestro` (`id_maestro`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `alumnos_clase`
--
ALTER TABLE `alumnos_clase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `alumnos_clase`
--
ALTER TABLE `alumnos_clase`
  ADD CONSTRAINT `alumnos_clase_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `alumnos_clase_ibfk_2` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id`);

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`id_maestro`) REFERENCES `maestros` (`id`),
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
