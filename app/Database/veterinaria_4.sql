-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-05-2021 a las 01:32:38
-- Versión del servidor: 8.0.24
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendamiento`
--

CREATE TABLE `agendamiento` (
  `id` int NOT NULL,
  `id_mascota` int NOT NULL,
  `id_cliente` int NOT NULL,
  `fecha` date NOT NULL,
  `asunto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT NULL,
  `fecha_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `agendamiento`
--

INSERT INTO `agendamiento` (`id`, `id_mascota`, `id_cliente`, `fecha`, `asunto`, `contenido`, `activo`, `fecha_alta`, `fecha_update`) VALUES
(10, 15, 1, '2021-05-20', 'eee', 'eeee', 1, '2021-05-04 12:53:27', '2021-05-04 12:53:27'),
(11, 15, 1, '2021-05-21', 'ddd', 'dddd', 1, '2021-05-04 13:01:45', '2021-05-04 13:01:45'),
(12, 15, 1, '2021-05-12', 'cxcxcx', 'xcxcx', 1, '2021-05-04 13:02:19', '2021-05-04 13:02:19'),
(13, 15, 1, '2021-05-10', 'dsdsds', 'dsds', 1, '2021-05-04 13:03:10', '2021-05-04 13:03:10'),
(14, 15, 1, '2021-05-20', 'wddw', 'dwdw', 1, '2021-05-04 13:03:29', '2021-05-04 13:03:29'),
(15, 15, 1, '2021-05-12', '1212', '121212', 1, '2021-05-04 13:21:01', '2021-05-04 13:21:01'),
(16, 15, 1, '2021-05-12', 'aaa', 'aaa', 1, '2021-05-04 13:23:19', '2021-05-04 13:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int NOT NULL,
  `tipoDoc` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pasaporte` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `convencional` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email_cliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint NOT NULL DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT NULL,
  `fecha_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `tipoDoc`, `cedula`, `pasaporte`, `apellido`, `nombre`, `direccion`, `convencional`, `telefono`, `email_cliente`, `activo`, `fecha_alta`, `fecha_update`) VALUES
(1, '', '0901025510', '', 'suarez echanique', 'diego', 'cerro del carmen', '04541547', '0939410481', 'suarezdiego@gmail.com', 1, '2020-12-17 13:28:23', '2021-04-25 15:04:31'),
(2, 'Cedula', '0950510867', '204', 'suarez echanique', 'anthony ', 'cerro del carmen ', '4541547', '0997691584', 'suarezanthony032@gmail.com', 1, '2020-12-18 16:54:59', '2020-12-18 17:04:41'),
(3, 'Cedula', '0901025510', '111', 'sddsd', 'dsdsd', '11', '11', '11', 'dsuareze2196@gmail.com', 1, '2020-12-18 17:03:39', '2021-03-25 11:34:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int NOT NULL,
  `id_mascota` int NOT NULL,
  `id_veterinario` int NOT NULL,
  `fecha` date NOT NULL,
  `pesoMascota` decimal(10,2) NOT NULL,
  `activo` tinyint NOT NULL DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT NULL,
  `fecha_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `id_mascota`, `id_veterinario`, `fecha`, `pesoMascota`, `activo`, `fecha_alta`, `fecha_update`) VALUES
(146, 16, 1, '2021-05-08', '44.00', 1, '2021-05-02 06:06:21', '2021-05-02 06:06:21'),
(147, 16, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:06:37', '2021-05-02 06:06:37'),
(148, 16, 1, '2021-05-09', '0.00', 1, '2021-05-02 06:06:51', '2021-05-02 06:06:51'),
(149, 16, 1, '2021-05-16', '55.00', 1, '2021-05-02 06:12:50', '2021-05-02 06:12:50'),
(150, 15, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:14:00', '2021-05-02 06:14:00'),
(151, 15, 1, '2021-05-09', '77.00', 1, '2021-05-02 06:16:20', '2021-05-02 06:16:20'),
(152, 16, 1, '2021-05-08', '44.00', 1, '2021-05-02 06:18:42', '2021-05-02 06:18:42'),
(153, 17, 1, '2021-05-09', '33.00', 1, '2021-05-02 06:20:17', '2021-05-02 06:20:17'),
(154, 17, 1, '2021-05-08', '33.00', 1, '2021-05-02 06:23:59', '2021-05-02 06:23:59'),
(155, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:35:14', '2021-05-02 06:35:14'),
(156, 17, 1, '2021-05-14', '44.00', 1, '2021-05-02 06:35:35', '2021-05-02 06:35:35'),
(157, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:42:09', '2021-05-02 06:42:09'),
(158, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:44:49', '2021-05-02 06:44:49'),
(159, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:44:57', '2021-05-02 06:44:57'),
(160, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:45:03', '2021-05-02 06:45:03'),
(161, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:45:05', '2021-05-02 06:45:05'),
(162, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:46:14', '2021-05-02 06:46:14'),
(163, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:46:18', '2021-05-02 06:46:18'),
(164, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:39', '2021-05-02 06:49:39'),
(165, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:40', '2021-05-02 06:49:40'),
(166, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:40', '2021-05-02 06:49:40'),
(167, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:40', '2021-05-02 06:49:40'),
(168, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:41', '2021-05-02 06:49:41'),
(169, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:41', '2021-05-02 06:49:41'),
(170, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:41', '2021-05-02 06:49:41'),
(171, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:41', '2021-05-02 06:49:41'),
(172, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:46', '2021-05-02 06:49:46'),
(173, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:49:58', '2021-05-02 06:49:58'),
(174, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:51:35', '2021-05-02 06:51:35'),
(175, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:52:23', '2021-05-02 06:52:23'),
(176, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:52:24', '2021-05-02 06:52:24'),
(177, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:52:25', '2021-05-02 06:52:25'),
(178, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:52:26', '2021-05-02 06:52:26'),
(179, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:52:27', '2021-05-02 06:52:27'),
(180, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:52:28', '2021-05-02 06:52:28'),
(181, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:54:45', '2021-05-02 06:54:45'),
(182, 17, 1, '2021-05-16', '55.00', 1, '2021-05-02 06:55:04', '2021-05-02 06:55:04'),
(183, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:56:46', '2021-05-02 06:56:46'),
(184, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 06:59:11', '2021-05-02 06:59:11'),
(185, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:00:07', '2021-05-02 07:00:07'),
(186, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:01:43', '2021-05-02 07:01:43'),
(187, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:03:46', '2021-05-02 07:03:46'),
(188, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:04:56', '2021-05-02 07:04:56'),
(189, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:05:34', '2021-05-02 07:05:34'),
(190, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:07:01', '2021-05-02 07:07:01'),
(191, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:07:04', '2021-05-02 07:07:04'),
(192, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:09:26', '2021-05-02 07:09:26'),
(193, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:32', '2021-05-02 07:12:32'),
(194, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:33', '2021-05-02 07:12:33'),
(195, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:35', '2021-05-02 07:12:35'),
(196, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:35', '2021-05-02 07:12:35'),
(197, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:52', '2021-05-02 07:12:52'),
(198, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:53', '2021-05-02 07:12:53'),
(199, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:53', '2021-05-02 07:12:53'),
(200, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:53', '2021-05-02 07:12:53'),
(201, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:53', '2021-05-02 07:12:53'),
(202, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:12:54', '2021-05-02 07:12:54'),
(203, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:13:20', '2021-05-02 07:13:20'),
(204, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:13:21', '2021-05-02 07:13:21'),
(205, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:13:21', '2021-05-02 07:13:21'),
(206, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:13:21', '2021-05-02 07:13:21'),
(207, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:13:21', '2021-05-02 07:13:21'),
(208, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:13:21', '2021-05-02 07:13:21'),
(209, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:13:37', '2021-05-02 07:13:37'),
(210, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:14:01', '2021-05-02 07:14:01'),
(211, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:14:37', '2021-05-02 07:14:37'),
(212, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:14:50', '2021-05-02 07:14:50'),
(213, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:16:11', '2021-05-02 07:16:11'),
(214, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:16:12', '2021-05-02 07:16:12'),
(215, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:16:26', '2021-05-02 07:16:26'),
(216, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:16:37', '2021-05-02 07:16:37'),
(217, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:31:05', '2021-05-02 07:31:05'),
(218, 17, 1, '0000-00-00', '0.00', 1, '2021-05-02 07:31:12', '2021-05-02 07:31:12'),
(219, 17, 1, '2021-05-16', '12.00', 1, '2021-05-02 07:32:43', '2021-05-02 07:32:43'),
(220, 15, 1, '2021-05-12', '33.00', 1, '2021-05-04 12:51:31', '2021-05-04 12:51:31'),
(221, 15, 1, '0000-00-00', '0.00', 1, '2021-05-04 13:25:43', '2021-05-04 13:25:43'),
(222, 14, 1, '2021-05-13', '77.00', 1, '2021-05-04 17:55:05', '2021-05-04 17:55:05'),
(223, 14, 1, '2021-05-05', '34.00', 1, '2021-05-04 17:55:54', '2021-05-04 17:55:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_servicio`
--

CREATE TABLE `consulta_servicio` (
  `id_cs` int NOT NULL,
  `id_servicio` int NOT NULL,
  `id_consulta` int NOT NULL,
  `observacion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `activo` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consulta_servicio`
--

INSERT INTO `consulta_servicio` (`id_cs`, `id_servicio`, `id_consulta`, `observacion`, `precio`, `activo`) VALUES
(1, 2, 146, ' 44', '12.22', 1),
(2, 2, 148, ' r', '12.22', 1),
(3, 1, 149, ' 55', '20.51', 1),
(5, 2, 151, ' rrr', '12.22', 1),
(6, 1, 151, ' y', '20.51', 1),
(7, 1, 152, ' rrr', '20.51', 1),
(9, 1, 153, ' efefe', '20.51', 1),
(10, 1, 153, ' 333', '20.51', 1),
(12, 1, 154, ' ddd', '20.51', 1),
(13, 2, 156, ' 44', '12.22', 1),
(14, 2, 182, ' ttt', '12.22', 1),
(15, 2, 219, ' 1', '12.22', 1),
(16, 4, 220, ' dd', '1.00', 1),
(17, 2, 222, ' nn', '12.22', 1),
(18, 1, 222, '', '20.51', 1),
(19, 1, 223, ' 434', '20.51', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint NOT NULL DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT NULL,
  `fecha_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`id`, `nombre`, `activo`, `fecha_alta`, `fecha_update`) VALUES
(1, 'perro', 1, '2020-12-17 13:16:05', '2020-12-17 14:30:34'),
(2, 'gato', 1, '2020-12-17 13:16:05', '2020-12-17 14:30:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `id_veterinario` int NOT NULL,
  `evento` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `detalles` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `id_veterinario`, `evento`, `fecha`, `ip`, `detalles`) VALUES
(94, 1, 'Inicio de sesion', '2021-04-27 09:23:50', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85'),
(95, 1, 'Inicio de sesion', '2021-04-27 10:14:54', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85'),
(96, 1, 'Inicio de sesion', '2021-04-27 10:46:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85'),
(97, 1, 'Inicio de sesion', '2021-04-27 10:47:38', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85'),
(98, 1, 'Cierre de sesion', '2021-04-27 10:48:09', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85'),
(99, 1, 'Inicio de sesion', '2021-04-27 10:48:25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85'),
(100, 1, 'Cierre de sesion', '2021-04-27 10:50:53', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85'),
(101, 1, 'Inicio de sesion', '2021-04-28 21:51:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85'),
(102, 1, 'Inicio de sesion', '2021-04-28 21:52:35', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0'),
(103, 1, 'Inicio de sesion', '2021-04-28 22:41:48', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0'),
(104, 1, 'Inicio de sesion', '2021-04-28 22:48:33', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85'),
(105, 1, 'Inicio de sesion', '2021-04-30 07:26:08', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0'),
(106, 1, 'Inicio de sesion', '2021-04-30 07:30:52', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0'),
(107, 1, 'Inicio de sesion', '2021-04-30 07:34:43', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0'),
(108, 1, 'Inicio de sesion', '2021-04-30 07:39:57', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(109, 1, 'Inicio de sesion', '2021-04-30 08:05:27', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(110, 1, 'Inicio de sesion', '2021-04-30 09:53:51', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(111, 1, 'Inicio de sesion', '2021-04-30 09:56:14', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0'),
(112, 1, 'Inicio de sesion', '2021-04-30 10:10:29', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(113, 1, 'Inicio de sesion', '2021-04-30 10:20:44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(114, 1, 'Inicio de sesion', '2021-05-01 09:11:24', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(115, 1, 'Inicio de sesion', '2021-05-01 12:04:11', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(116, 1, 'Cierre de sesion', '2021-05-01 12:05:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(117, 1, 'Inicio de sesion', '2021-05-01 12:05:50', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(118, 1, 'Cierre de sesion', '2021-05-01 12:07:51', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(119, 1, 'Inicio de sesion', '2021-05-01 12:08:38', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(120, 1, 'Inicio de sesion', '2021-05-01 19:25:36', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(121, 1, 'Cierre de sesion', '2021-05-01 19:54:18', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(122, 1, 'Inicio de sesion', '2021-05-01 19:54:55', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(123, 1, 'Inicio de sesion', '2021-05-01 20:34:10', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(124, 1, 'Inicio de sesion', '2021-05-01 23:21:06', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(125, 1, 'Inicio de sesion', '2021-05-02 01:00:11', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(126, 1, 'Cierre de sesion', '2021-05-02 01:00:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(127, 1, 'Inicio de sesion', '2021-05-02 01:00:20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(128, 1, 'Inicio de sesion', '2021-05-02 01:02:22', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(129, 1, 'Inicio de sesion', '2021-05-02 01:12:24', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(130, 1, 'Inicio de sesion', '2021-05-02 01:18:23', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(131, 1, 'Inicio de sesion', '2021-05-02 10:55:02', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(132, 1, 'Cierre de sesion', '2021-05-02 10:59:46', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(133, 1, 'Inicio de sesion', '2021-05-02 10:59:52', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(134, 1, 'Cierre de sesion', '2021-05-02 11:07:59', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(135, 1, 'Inicio de sesion', '2021-05-02 11:08:06', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(136, 1, 'Inicio de sesion', '2021-05-02 12:56:43', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(137, 1, 'Inicio de sesion', '2021-05-03 23:11:33', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(138, 1, 'Inicio de sesion', '2021-05-04 07:27:08', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(139, 1, 'Inicio de sesion', '2021-05-04 12:53:52', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(140, 1, 'Inicio de sesion', '2021-05-04 14:56:14', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93'),
(141, 1, 'Inicio de sesion', '2021-05-06 08:01:39', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int NOT NULL,
  `id_cliente` int NOT NULL,
  `id_especie` int NOT NULL,
  `id_raza` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pelaje` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint NOT NULL DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT NULL,
  `fecha_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `id_cliente`, `id_especie`, `id_raza`, `nombre`, `edad`, `sexo`, `pelaje`, `activo`, `fecha_alta`, `fecha_update`) VALUES
(14, 3, 1, 11, 'df', '23', 'macho', 'we', 1, '2021-05-02 01:17:37', '2021-05-02 01:22:20'),
(15, 1, 2, 4, 'ffff', '23', 'macho', 'ff', 1, '2021-05-02 05:14:46', '2021-05-02 05:14:46'),
(16, 3, 1, 3, 'fff', '23', 'hembra', 'fff', 1, '2021-05-02 05:49:36', '2021-05-02 05:49:36'),
(17, 3, 1, 1, 'rfrfr', '22', 'macho', 'efef', 1, '2021-05-02 06:19:45', '2021-05-02 06:19:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `id` int NOT NULL,
  `id_especie` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint NOT NULL DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT NULL,
  `fecha_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`id`, `id_especie`, `nombre`, `activo`, `fecha_alta`, `fecha_update`) VALUES
(1, 1, 'pitbulld', 1, '2020-12-17 13:50:04', '2021-04-30 15:27:46'),
(2, 2, 'ssiame', 1, '2020-12-17 13:54:53', '2020-12-17 13:54:53'),
(3, 1, 'dase', 1, '2020-12-17 14:21:00', '2020-12-17 14:25:55'),
(4, 2, 'angora', 1, '2020-12-17 14:26:16', '2020-12-17 14:27:20'),
(5, 2, 'esfinge', 1, '2021-04-25 01:34:23', '2021-04-25 01:34:46'),
(6, 1, 'lasmye', 1, '2021-04-26 14:45:11', '2021-04-26 14:45:11'),
(7, 1, 'lasmye', 1, '2021-04-26 14:50:02', '2021-04-26 14:50:02'),
(8, 1, 'lasmye', 1, '2021-04-26 14:50:19', '2021-04-26 14:50:19'),
(9, 1, 'lasmye', 0, '2021-04-26 14:50:51', '2021-05-01 15:37:46'),
(10, 1, 'lasmye', 1, '2021-04-26 14:52:57', '2021-04-26 14:52:57'),
(11, 1, 'lasmye', 1, '2021-04-26 15:03:06', '2021-04-26 15:03:06'),
(12, 1, 'lasmye', 1, '2021-04-26 15:03:18', '2021-04-26 15:03:18'),
(15, 1, 'ttt', 1, '2021-04-26 15:15:11', '2021-04-26 15:15:11'),
(16, 2, 'tttt', 1, '2021-04-26 15:17:05', '2021-04-26 15:20:11'),
(17, 1, 'ttttt', 0, '2021-04-30 15:25:00', '2021-05-02 04:31:33'),
(18, 1, 'ttttt', 0, '2021-04-30 15:25:13', '2021-05-02 04:30:32'),
(19, 1, 'dddd', 1, '2021-05-02 05:10:07', '2021-05-02 05:10:07'),
(20, 1, 'fff', 1, '2021-05-02 05:14:10', '2021-05-02 05:14:10'),
(21, 1, 'fffff', 1, '2021-05-02 05:16:37', '2021-05-02 05:16:37'),
(22, 1, 'fffffff', 1, '2021-05-02 05:20:23', '2021-05-02 05:20:23'),
(23, 1, 'ddd', 1, '2021-05-02 05:21:41', '2021-05-02 05:21:41'),
(24, 1, 'eeee', 1, '2021-05-02 05:29:57', '2021-05-02 05:29:57'),
(25, 2, 'ffff', 1, '2021-05-02 05:46:39', '2021-05-02 05:46:39'),
(26, 1, 'f', 1, '2021-05-02 05:49:19', '2021-05-02 05:49:19'),
(27, 1, 'f', 1, '2021-05-02 06:16:34', '2021-05-02 06:16:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT NULL,
  `fecha_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `nombre`, `descripcion`, `precio`, `activo`, `fecha_alta`, `fecha_update`) VALUES
(1, 'vacuna', 'rabia1', '20.51', 1, '2020-12-17 13:48:12', '2020-12-17 13:48:12'),
(2, 'f', 'd', '12.22', 1, '2020-12-17 13:47:53', '2020-12-17 14:32:42'),
(3, 'desparasitaciojn ', 'primera desparasitacion ', '13.00', 0, '2020-12-18 16:56:10', '2020-12-18 16:56:23'),
(4, 'peluqeria', 'corto de pelo', '1.00', 1, '2021-02-23 21:00:17', '2021-02-23 21:00:17'),
(5, 'rrrr', 'rrr', '44.00', 1, '2021-05-02 00:28:16', '2021-05-02 00:28:16'),
(6, 'ffff', 'ffff', '54.00', 1, '2021-05-02 00:28:24', '2021-05-02 00:28:24'),
(7, 'gtg', 'gtgt', '556.00', 0, '2021-05-02 00:28:51', '2021-05-02 00:48:05'),
(8, 'fghfh', 'fghfh', '65.00', 1, '2021-05-02 00:47:11', '2021-05-02 04:39:22'),
(9, 'fff', 'fff', '44.00', 1, '2021-05-02 05:14:24', '2021-05-02 05:14:24'),
(10, 'ttt', 'ttt', '666.00', 1, '2021-05-02 05:16:07', '2021-05-02 05:16:07'),
(11, 'ffff', 'ff', '333.00', 1, '2021-05-02 05:20:00', '2021-05-02 05:20:00'),
(12, 'sss', 'ss', '11.00', 1, '2021-05-02 05:36:08', '2021-05-02 05:36:08'),
(13, 'fff', 'ff', '55.00', 1, '2021-05-02 05:40:58', '2021-05-02 05:40:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `id` int NOT NULL,
  `tipoDoc` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pasaporte` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `matricula` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `convencional` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint NOT NULL DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT NULL,
  `fecha_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`id`, `tipoDoc`, `cedula`, `pasaporte`, `matricula`, `apellido`, `nombre`, `usuario`, `password`, `email`, `direccion`, `convencional`, `telefono`, `activo`, `fecha_alta`, `fecha_update`) VALUES
(1, 'Cedula', '0931108955', '', '12', 'echanique', 'armando', 'dase230', '$2y$10$GlHE2w6qKG0MT/HiJQjtau/C/DuUole.QGV6MRIhMSMc3ZvX9U3B2', 'echanique@gmail.com', 'cerro', '121', '12', 1, '2020-12-17 13:34:17', '2021-04-16 17:12:31'),
(2, 'Cedula', '0901025510', 'e', 'ca', 'd', 'da', 'da', '$2y$10$GlHE2w6qKG0MT/HiJQjtau/C/DuUole.QGV6MRIhMSMc3ZvX9U3B2', 'd@gmail.com', 'es', '1111', '11', 0, '2020-12-17 13:56:25', '2021-05-02 04:41:40'),
(3, 'cedula', '9393939', '39393', '39393', 'mm', 'kk', 'kk', 'kk', 'k', 'kk', '333', '33', 1, NULL, '2021-05-04 18:01:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendamiento`
--
ALTER TABLE `agendamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mascota` (`id_mascota`),
  ADD KEY `fk_veterinario` (`id_veterinario`);

--
-- Indices de la tabla `consulta_servicio`
--
ALTER TABLE `consulta_servicio`
  ADD PRIMARY KEY (`id_cs`),
  ADD KEY `id_servicio` (`id_servicio`,`id_consulta`),
  ADD KEY `id_consulta` (`id_consulta`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_veterinario` (`id_veterinario`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`id_cliente`),
  ADD KEY `fk_especie` (`id_especie`),
  ADD KEY `fk_raza` (`id_raza`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_especies` (`id_especie`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agendamiento`
--
ALTER TABLE `agendamiento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de la tabla `consulta_servicio`
--
ALTER TABLE `consulta_servicio`
  MODIFY `id_cs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agendamiento`
--
ALTER TABLE `agendamiento`
  ADD CONSTRAINT `agendamiento_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamiento_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consulta_servicio`
--
ALTER TABLE `consulta_servicio`
  ADD CONSTRAINT `consulta_servicio_ibfk_1` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`id_especie`) REFERENCES `especie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_3` FOREIGN KEY (`id_raza`) REFERENCES `raza` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `raza_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `especie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
