-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2021 a las 01:27:50
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todoenimpresiones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `rol` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `sucursal` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `rol`, `foto`, `estado`, `ultimo_login`, `sucursal`, `fecha`) VALUES
(4, 'mariza sheldry brito', 'maritza', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Especial', 'vistas/imagenes/usuarios/maritza/864.jpg', 1, '2021-01-11 18:34:07', 'San miguelito', '2021-01-11 23:34:07'),
(5, 'ramon brito', 'ramon', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Especial', 'vistas/imagenes/usuarios/ramon/439.jpg', 1, '2021-01-11 18:02:07', 'San miguelito', '2021-01-11 23:02:07'),
(8, 'liliam guillén de brito', 'liliam', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Especial', 'vistas/imagenes/usuarios/liliam/109.jpg', 1, '2021-01-11 18:46:03', 'San miguelito', '2021-01-11 23:46:03'),
(15, 'jhonny Rosero', 'jhonny', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Especial', 'vistas/imagenes/usuarios/jhonny/839.jpg', 1, '0000-00-00 00:00:00', 'Paitilla', '2021-01-11 00:21:47'),
(18, 'Criítofol perez', 'cristofel', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Especial', 'vistas/imagenes/usuarios/cristofel/423.jpg', 0, '0000-00-00 00:00:00', 'San miguelito', '2021-01-11 01:19:56'),
(19, 'vicente brito', 'vicente', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Diseñador', 'vistas/imagenes/usuarios/vicente/163.png', 0, '0000-00-00 00:00:00', 'Parque Lefébere', '2021-01-11 00:45:45'),
(23, 'alberto mojica', 'alberto', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Administrador', 'vistas/imagenes/usuarios/alberto/642.jpg', 0, '0000-00-00 00:00:00', 'Parque Lefébere', '2021-01-11 01:21:14'),
(24, 'milking brito', 'milking', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Diseñador', 'vistas/imagenes/usuarios/maritza/864.jpg', 0, '0000-00-00 00:00:00', 'Parque Lefébere', '2021-01-11 01:32:05'),
(26, 'Mariluz pineda', 'mariluz', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Administrador', 'vistas/imagenes/usuarios/maritza/864.jpg', 0, '0000-00-00 00:00:00', 'San miguelito', '2021-01-11 01:56:05'),
(28, 'eliezer perez', 'eliezer', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Especial', 'vistas/imagenes/usuarios//420.jpg', 0, '0000-00-00 00:00:00', 'San miguelito', '2021-01-11 02:25:04'),
(29, 'alicia key', 'alicia', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Especial', 'vistas/imagenes/usuarios//460.jpg', 0, '0000-00-00 00:00:00', 'San miguelito', '2021-01-11 02:25:59'),
(30, 'manuel duarte', 'manuel', '$2a$07$asxx54ahjppf45sd87a5auQMPl.w2jnnYIhkLSeUMDOyGj2124bfS', 'Administrador', 'vistas/imagenes/usuarios/avatar/user.png', 0, '0000-00-00 00:00:00', 'Parque Lefébere', '2021-01-11 03:26:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
