-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2026 a las 14:52:32
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
-- Base de datos: `ferreteria_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `rol`) VALUES
(1, 'administrad'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticas`
--

CREATE TABLE IF NOT EXISTS `noticas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titular` text NOT NULL,
  `imagen` text NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticas`
--

INSERT INTO `noticas` (`id`, `titular`, `imagen`, `fecha`) VALUES
(12, 'Los artículos para el hogar y utensilios domésticos concentrarán el gasto de los consumidores en 2026', 'https://img.interempresas.net/A/A875/5370406.webp', '2026-01-27'),
(13, 'Entrevista a Diego Barbó, Country Manager de Industrial Pro', 'https://img.interempresas.net/A/A875/5359458.webp', '2026-01-27'),
(14, 'Lo que España puede aprender de Italia y Portugal ante la llegada de Verifactu', 'https://img.interempresas.net/A/A875/5382914.webp', '2026-01-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto` text NOT NULL,
  `marca` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `marca`, `cantidad`, `precio`) VALUES
(2, 'Tornillos de acero', 'TRUPER', 78, 12500),
(3, 'Martillo', 'Stanley', 25, 40000),
(4, 'Pintura vinilo blanco', 'Pintuco', 23, 80000),
(5, 'Llave inglesa', 'Stanley', 30, 45000),
(6, 'Brocas para concreto', 'Bosch', 10, 60000),
(7, 'Cemento gris', 'Argos', 60, 32000),
(9, 'Lija', 'Norton', 93, 10000),
(10, 'Martillo de uña', 'Stanley', 47, 38000),
(12, 'Llave ajustable 10\"', 'Pretul', 19, 44000),
(13, 'metro 5m', 'Komelon', 30, 30000),
(14, 'Taladro percutor 750W', 'Bosch', 10, 290000),
(15, 'Broca para concreto 6mm', 'Makita', 42, 12000),
(16, 'Pegante de contacto 250ml', 'PegaMax', 80, 23000),
(17, 'Guantes de trabajo', '3M', 88, 17000),
(18, 'Cinta aislante 3m', 'Vini-Tape', 150, 4500),
(19, 'Llave Stillson 14\"', 'Truper', 10, 88000),
(20, 'lija 150', 'doña lija', 0, 1000),
(21, 'escalera', 'trump', 10, 400000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cargo` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `correo`, `contraseña`, `id_cargo`) VALUES
(1, 'admin', 'admin', 'admin@admin', 'admin', 1),
(2, 'jaden otalvaro', 'jaden', '111edzir111@gmail.com', '12345', 2),
(3, 'tomas tamayo', 'tomatico', 'tamete@gmail.com', '1234', 2),
(4, 'valentina', 'valen', 'valen@gmail.com', 'valentina', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
