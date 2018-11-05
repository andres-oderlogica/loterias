-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2018 a las 04:28:00
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `loterias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loteria`
--

CREATE TABLE `loteria` (
  `id_loteria` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `loteria`
--

INSERT INTO `loteria` (`id_loteria`, `descripcion`) VALUES
(1, 'Quinta'),
(2, 'Cuarta'),
(3, 'Tercera'),
(4, 'Segunda'),
(6, 'Primera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeros_loteria`
--

CREATE TABLE `numeros_loteria` (
  `id_numeros` int(11) NOT NULL,
  `id_loteria` int(11) DEFAULT NULL,
  `numero` varchar(3) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `numeros_loteria`
--

INSERT INTO `numeros_loteria` (`id_numeros`, `id_loteria`, `numero`, `fecha`) VALUES
(1, 1, '01', '2018-11-04'),
(2, 6, '03', '2018-11-05'),
(3, 6, '03', '2018-11-04'),
(4, 2, '01', '2018-11-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL,
  `perfil` enum('Administrador','Gerente','Empleado') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`, `perfil`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-05-21 15:06:00', 'Administrador'),
(76, 'carlos', 'Empleado', 'empleado1', '$2y$10$X7ha4rCPbpxBqYwAzfft8uJvhhx5pTfnPhj6.lmY06P80X6Do24yi', 'emp@gmail.com', '2017-11-09 01:10:52', 'Empleado'),
(77, 'gerente', 'Gerente', 'gerente', '$2y$10$f71nf0yAI6XT1nyTZDyjVOb223BLYiuXE2sopZFODXqr47LHq0oS2', 'ge@gmail.com', '2017-11-09 01:13:01', 'Gerente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `loteria`
--
ALTER TABLE `loteria`
  ADD PRIMARY KEY (`id_loteria`);

--
-- Indices de la tabla `numeros_loteria`
--
ALTER TABLE `numeros_loteria`
  ADD PRIMARY KEY (`id_numeros`),
  ADD KEY `jdxLoteria_idx` (`id_loteria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `loteria`
--
ALTER TABLE `loteria`
  MODIFY `id_loteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `numeros_loteria`
--
ALTER TABLE `numeros_loteria`
  MODIFY `id_numeros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=78;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `numeros_loteria`
--
ALTER TABLE `numeros_loteria`
  ADD CONSTRAINT `jdxLoteria` FOREIGN KEY (`id_loteria`) REFERENCES `loteria` (`id_loteria`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
