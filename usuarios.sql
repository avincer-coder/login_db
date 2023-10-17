-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 17:22:01
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
-- Base de datos: `login_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Email` varchar(50) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  `Photo` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Biografia` varchar(250) NOT NULL,
  `Phone` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Email`, `Contraseña`, `Photo`, `Name`, `Biografia`, `Phone`) VALUES
('admin@admin', '$2y$10$CwimQxc/klD9A7Rh0//SSeH8LyEok48dhhUnnH6uoB4KZg62txr86', 'admin@admin.jpg', 'El Admin', 'Nadar, correr, comer ', 123456789),
('test@test', '$2y$10$WvONlE.wSO5CF9jQoNTK/OH9CIYa1/UfqCPVGdsOjh/6g5VVrAWFe', 'test@test.jpg', 'El Tester', 'bailar, cantar, volar', 123456789);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
