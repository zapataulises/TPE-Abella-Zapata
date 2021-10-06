-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2021 a las 22:24:10
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_gordodrops`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Gama` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `password`, `username`) VALUES
(1, '$2a$12$A6CRxyOXTPZYB4RU7Uwp2eS9vb2Kx3KRnWUUhZSQsfj5mM05VtqU6', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zapatillas`
--

CREATE TABLE `zapatillas` (
  `id_zapatilla` int(11) NOT NULL,
  `Modelo` varchar(30) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Estilo` varchar(30) DEFAULT NULL,
  `Marca` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zapatillas`
--

INSERT INTO `zapatillas` (`id_zapatilla`, `Modelo`, `Precio`, `Estilo`, `Marca`) VALUES
(1, 'Jordan 1 Tie Dye', 300, 'Urbano', 'Nike'),
(2, 'Jordan 24', 155, 'Urbano', 'Nike');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  ADD PRIMARY KEY (`id_zapatilla`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  MODIFY `id_zapatilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;