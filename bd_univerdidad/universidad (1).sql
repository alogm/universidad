-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2023 a las 12:55:01
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
(11, '1', 'ser@gmail', '$2y$10$FvtZdQlb7PVVfH4nXqatbehnJMfkf02L1UUbH9GNIoQlIQBNk4PVW', 'Victor', 'rosales', 'cerrada de la rinconada 8', '1991-05-08', 2),
(12, '2', 'der@gmail', '$2y$10$FvtZdQlb7PVVfH4nXqatbehnJMfkf02L1UUbH9GNIoQlIQBNk4PVW', 'Juli', 'Castro', 'calle del silencio 25', '1982-04-06', 2),
(13, '3', 'fer@gmail', '$2y$10$FvtZdQlb7PVVfH4nXqatbehnJMfkf02L1UUbH9GNIoQlIQBNk4PVW', 'Mar', 'Gutierres', 'calle norte 17 no 85', '1945-12-24', 2),
(14, '4', 'ger@gmail', '$2y$10$FvtZdQlb7PVVfH4nXqatbehnJMfkf02L1UUbH9GNIoQlIQBNk4PVW', 'Albert', 'Tabera', 'siervo triste mz2', '2005-09-15', 2),
(15, '5', 'lal@gmail', '$2y$10$FvtZdQlb7PVVfH4nXqatbehnJMfkf02L1UUbH9GNIoQlIQBNk4PVW', 'pika', 'sainz', 'noche triste 62', '2000-04-25', 2),
(16, '6', 'pik@gmail', '$2y$10$FvtZdQlb7PVVfH4nXqatbehnJMfkf02L1UUbH9GNIoQlIQBNk4PVW', 'pedro', 'esperaza', 'belizario', '1999-12-31', 2),
(17, '7', 'ego@gmail', '$2y$10$FvtZdQlb7PVVfH4nXqatbehnJMfkf02L1UUbH9GNIoQlIQBNk4PVW', 'rogelio', 'guerrero', 'no rompas mas', '2006-06-06', 2),
(18, '', '', '', 'juan', '', '', '0000-00-00', NULL),
(19, '', '', '', 'irma', '', '', '0000-00-00', NULL),
(20, '123456', 'alumno@alumno', '$2y$10$Ndu479A4nioSFeCX3T5RROBRi3N8TXle440QuqYIkPDH53mcfZKlO', 'antonio', 'guerrero', 'porfirio diaz 52', '1993-11-30', 2);

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
(30, 12, 38, NULL, NULL),
(31, 13, 39, NULL, NULL),
(32, 14, 40, NULL, NULL),
(33, 15, 41, NULL, NULL),
(34, 16, 42, NULL, NULL),
(35, 17, 46, NULL, NULL),
(36, 20, 46, 10, 'buen trabajo'),
(37, 11, 46, NULL, NULL),
(38, 12, 46, NULL, NULL),
(39, 13, 46, NULL, NULL),
(40, 14, 46, NULL, NULL),
(41, 20, 38, NULL, NULL),
(42, 20, 39, NULL, NULL),
(43, 20, 40, NULL, NULL),
(44, 20, 41, NULL, NULL);

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
(38, 40, 25),
(39, 41, 26),
(40, 42, 27),
(41, 43, 28),
(42, 44, 29),
(43, 45, 30),
(45, 46, 31),
(46, 47, 29);

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
(39, 'carlos antonio', 'car@car', '$2y$10$Xkm5hPpy5Vc3xHpPG13GkuKS9SadCnO7NoxWN3c2ogRJ2eplQoWHm', 'calle de la asuncion 34', '1991-01-22', 3, NULL),
(40, 'karla sainz', 'kar@kar', '$2y$10$Xkm5hPpy5Vc3xHpPG13GkuKS9SadCnO7NoxWN3c2ogRJ2eplQoWHm', 'felipe 30', '1991-12-24', 3, NULL),
(41, 'rodrigo Guerrero', 'rod@rod', '$2y$10$Xkm5hPpy5Vc3xHpPG13GkuKS9SadCnO7NoxWN3c2ogRJ2eplQoWHm', 'av de la reforma 482', '1991-05-08', 3, NULL),
(42, 'samantha', 'sam@sam', '$2y$10$Xkm5hPpy5Vc3xHpPG13GkuKS9SadCnO7NoxWN3c2ogRJ2eplQoWHm', 'reforma socil 30', '1983-09-26', 3, NULL),
(43, 'sandrik ', 'san@san', '$2y$10$Xkm5hPpy5Vc3xHpPG13GkuKS9SadCnO7NoxWN3c2ogRJ2eplQoWHm', 'guanajuato}', '1980-04-06', 3, NULL),
(44, 'veronica', 'ver@ver', '$2y$10$Xkm5hPpy5Vc3xHpPG13GkuKS9SadCnO7NoxWN3c2ogRJ2eplQoWHm', 'plan de ayala', '1975-06-08', 3, NULL),
(45, 'leonardo', 'leo@leo', '$2y$10$Xkm5hPpy5Vc3xHpPG13GkuKS9SadCnO7NoxWN3c2ogRJ2eplQoWHm', 'deconocido', '1956-12-12', 3, NULL),
(46, 'Pendiente de asignar clase', '', NULL, '', '0000-00-00', 3, NULL),
(47, 'Marleen', 'maestro@maestro', '$2y$10$Efw0g2/YGVsDyUYR8eZ6K.ZBY.A/CtyQHPnkoUWNyAt5h0eFrD7kW', 'calle de los hermanos ', '1992-12-24', 3, 'sainz');

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
(25, 'quimica'),
(26, 'literatura'),
(27, 'historia'),
(28, 'filosofia'),
(29, 'ingles'),
(30, 'calculo'),
(31, 'danza');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `alumnos_clase`
--
ALTER TABLE `alumnos_clase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
