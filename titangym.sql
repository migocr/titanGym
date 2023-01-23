-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2023 a las 09:10:36
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `titangym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `pass_key` varchar(20) NOT NULL,
  `securekey` varchar(20) NOT NULL,
  `Full_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`username`, `pass_key`, `securekey`, `Full_name`) VALUES
('titan', 'titan', '1234abcd..', 'TitanGym');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `uid` int(4) UNSIGNED ZEROFILL NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `uid`, `datetime`) VALUES
(0000000001, 0026, '2023-01-22 04:15:34'),
(0000000002, 0025, '2023-01-21 08:24:10'),
(0000000003, 0001, '2022-12-31 04:24:31'),
(0000000004, 0025, '2023-01-23 04:25:36'),
(0000000005, 0025, '2023-01-23 04:25:47'),
(0000000006, 0014, '2023-01-23 04:26:24'),
(0000000007, 0014, '2023-01-23 04:26:59'),
(0000000008, 0026, '2023-01-23 04:27:13'),
(0000000009, 0026, '2023-01-23 04:27:26'),
(0000000010, 0023, '2023-01-23 04:28:01'),
(0000000011, 0026, '2023-01-23 04:28:56'),
(0000000012, 0023, '2023-01-23 04:29:42'),
(0000000013, 0014, '2023-01-23 04:33:36'),
(0000000014, 0019, '2023-01-23 04:34:52'),
(0000000015, 0018, '2023-01-23 04:37:26'),
(0000000016, 0016, '2023-01-23 05:23:28'),
(0000000017, 0023, '2023-01-23 07:14:14'),
(0000000018, 0006, '2023-01-23 07:16:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrolls_to`
--

CREATE TABLE `enrolls_to` (
  `et_id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `paid_date` varchar(15) DEFAULT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `startDate` varchar(15) NOT NULL,
  `uid` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `enrolls_to`
--

INSERT INTO `enrolls_to` (`et_id`, `pid`, `paid_date`, `expire`, `startDate`, `uid`, `amount`) VALUES
(1, 'GXQUYF', '2023-01-06', '2023-02-06', '2023-01-06', 0001, 0),
(2, 'KBTODF', '2023-01-06', '2023-01-07', '2023-01-06', 0002, 0),
(3, 'XWNHUS', '2023-01-06', '2023-01-06', '2023-01-06', 0003, 0),
(4, 'ULJWQN', '2023-01-06', '2023-01-13', '2023-01-06', 0004, 0),
(5, 'XWNHUS', '2023-01-06', '2023-01-06', '2023-01-05', 0005, 0),
(6, 'GXQUYF', '2023-01-06', '2023-02-06', '2023-01-06', 0006, 0),
(29, 'ULJWQN', '2023-01-07', '2023-02-13', '2023-02-06', 0006, 0),
(30, 'ULJWQN', '2023-01-07', '2023-02-20', '2023-02-13', 0006, 0),
(31, 'ULJWQN', '2023-01-07', '2023-02-27', '2023-02-20', 0006, 0),
(32, 'ULJWQN', '2023-01-07', '2023-03-06', '2023-02-27', 0006, 0),
(33, 'KBTODF', '2023-01-07', '2023-03-07', '2023-03-06', 0006, 0),
(34, 'XWNHUS', '2023-01-07', '2023-01-07', '2023-01-07', 0007, 0),
(35, 'KBTODF', '2023-01-07', '2023-01-08', '2023-01-07', 0002, 0),
(36, 'KBTODF', '2023-01-07', '2023-01-08', '2023-01-07', 0008, 0),
(37, 'KBTODF', '2023-01-10', '2023-01-11', '2023-01-10', 0009, 0),
(38, 'ULJWQN', '2023-01-10', '2023-01-17', '2023-01-10', 0005, 0),
(39, 'KBTODF', '2023-01-11', '2023-01-12', '2023-01-11', 0007, 0),
(40, 'GXQUYF', '2023-01-11', '2023-02-12', '2023-01-12', 0007, 0),
(41, 'GXQUYF', '2023-01-11', '2023-02-12', '2023-01-12', 0007, 0),
(42, 'KBTODF', '2023-01-11', '2023-02-13', '2023-02-12', 0007, 0),
(43, 'KBTODF', '2023-01-11', '2023-02-14', '2023-02-13', 0007, 0),
(44, 'GXQUYF', '2023-01-11', '2023-03-14', '2023-02-14', 0007, 0),
(45, 'GXQUYF', '2023-01-11', '2023-04-14', '2023-03-14', 0007, 0),
(46, 'KBTODF', '2023-01-11', '2023-04-15', '2023-04-14', 0007, 0),
(47, 'KBTODF', '2023-01-11', '2023-04-16', '2023-04-15', 0007, 0),
(48, 'KBTODF', '2023-01-11', '2023-04-17', '2023-04-16', 0007, 0),
(49, 'KBTODF', '2023-01-11', '2023-04-18', '2023-04-17', 0007, 0),
(50, 'KBTODF', '2023-01-11', '2023-04-19', '2023-04-18', 0007, 0),
(51, 'GXQUYF', '2023-01-11', '2023-02-17', '2023-01-17', 0005, 0),
(52, 'GXQUYF', '2023-01-11', '2023-02-11', '2023-01-11', 0014, 0),
(53, 'KBTODF', '2023-01-11', '2023-01-12', '2023-01-11', 0015, 0),
(54, 'GXQUYF', '2023-01-11', '2023-02-11', '2023-01-11', 0016, 0),
(55, 'KBTODF', '2023-01-11', '2023-01-12', '2023-01-11', 0017, 0),
(56, 'GXQUYF', '2023-01-11', '2023-02-11', '2023-01-11', 0018, 0),
(57, 'GXQUYF', '2023-01-11', '2023-02-11', '2023-01-11', 0019, 0),
(58, 'KBTODF', '2023-01-11', '2023-01-12', '2023-01-11', 0020, 0),
(59, 'KBTODF', '2023-01-11', '2023-01-12', '2023-01-11', 0021, 0),
(60, 'KBTODF', '2023-01-11', '2023-01-12', '2023-01-11', 0022, 0),
(61, 'KBTODF', '2023-01-11', '2023-02-07', '2023-02-06', 0001, 0),
(62, 'GXQUYF', '2023-01-11', '2023-04-08', '2023-03-08', 0006, 0),
(63, 'KBTODF', '2023-01-11', '2023-01-12', '2023-01-13', 0023, 0),
(64, 'GXQUYF', '2023-01-22', '2023-02-22', '2023-01-22', 0023, 650),
(65, 'GXQUYF', '2023-01-22', '2023-02-22', '2023-01-22', 0024, 0),
(66, 'GXQUYF', '2023-01-22', '2023-02-22', '2023-01-22', 0025, 0),
(67, 'GXQUYF', '2023-01-22', '2023-02-22', '2023-01-22', 0026, 650),
(68, 'VJLRNM', '2023-01-22', '2023-05-22', '2023-02-22', 0026, 1800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `pid` varchar(8) NOT NULL,
  `planName` varchar(20) NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `validity` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `active` varchar(255) DEFAULT NULL,
  `planType` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`pid`, `planName`, `description`, `validity`, `amount`, `active`, `planType`) VALUES
('GXQUYF', 'Plan Mensual', '1 mes', '1', 650, 'yes', 'm'),
('KBTODF', 'Visita', 'Visita 1 dia', '1', 50, 'yes', 'd'),
('ULJWQN', 'Semanal', '1 Semana', '7', 200, 'yes', 'd'),
('VJLRNM', 'Plan Trimestral', '3 meses de suscripion', '3', 1800, 'no', 'm'),
('XWNHUS', 'Caduca', '', '0', 0, 'yes', 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_settings`
--

CREATE TABLE `system_settings` (
  `nombre` varchar(50) NOT NULL,
  `config` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `system_settings`
--

INSERT INTO `system_settings` (`nombre`, `config`) VALUES
('color', 'radial-gradient(circle, rgba(119,108,106,1) 0%, rgba(141,128,125,1) 100%)'),
('backgroundColor', '#4f4f4f'),
('nombreSitio', 'TitaniumGYM'),
('colorFuente', 'black'),
('logo', ''),
('fixedNav', 'true'),
('navbarColor', ''),
('asideColor', '#dedede'),
('asideTransparency', '47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userid` int(4) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(40) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `joining_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userid`, `username`, `gender`, `phone`, `dob`, `joining_date`) VALUES
(0001, 'Maria Flores Arvizu', 'Mujer', '3111543829', '2023-02-07', '2023-01-06'),
(0002, 'Jose Pedro Ruiz', 'Hombre', '3111543829', '2023-01-08', '2023-01-06'),
(0003, 'Mike', 'Hombre', '3111543829', '2023-02-11', '2023-01-06'),
(0004, 'alma', 'Mujer', '3111543829', '2023-01-13', '2023-01-06'),
(0005, 'Juan Pablo Ruiz Salazar', 'Hombre', '3111543829', '2023-02-17', '2023-01-05'),
(0006, 'Larry Varela', 'Hombre', '3111543829', '2023-04-08', '2023-01-06'),
(0007, 'Misael', 'Hombre', '3111543829', '2023-04-19', '2023-01-07'),
(0008, 'Jesus Gutierrez Aguilar', 'Hombre', '3111543829', '2023-01-08', '2023-01-07'),
(0009, 'Mariela Lopez Murillo', 'Mujer', '3111543829', '2023-01-11', '2023-01-10'),
(0014, 'Prueba', 'Mujer', '', '2023-02-11', '2023-01-11'),
(0015, 'Prueba', 'Hombre', '3111543829', '2023-01-12', '2023-01-11'),
(0016, 'Prueba', 'Hombre', '', '2023-02-11', '2023-01-11'),
(0017, 'Prueba', 'Hombre', '', '2023-01-12', '2023-01-11'),
(0018, 'Prueba', 'Hombre', '3111543829', '2023-02-11', '2023-01-11'),
(0019, 'Prueba', 'Hombre', '', '2023-02-11', '2023-01-11'),
(0020, 'Prueba', 'Hombre', '3111543829', '2023-01-12', '2023-01-11'),
(0021, 'Prueba', 'Hombre', '', '2023-01-12', '2023-01-11'),
(0022, 'Prueba', 'Hombre', '3111543829', '2023-01-12', '2023-01-11'),
(0023, 'Misael G', 'Hombre', '3111543829', '2023-02-22', '2023-01-13'),
(0024, 'Prueba Dos', 'Hombre', '3111543829', '2023-02-22', '2023-01-22'),
(0025, 'aaaaaaaaaaaa', 'Hombre', '1111111111', '2023-02-22', '2023-01-22'),
(0026, 'aaaaaaaaaaaa', 'Hombre', '1111111111', '2023-05-22', '2023-01-22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enrolls_to`
--
ALTER TABLE `enrolls_to`
  ADD PRIMARY KEY (`et_id`) USING BTREE,
  ADD KEY `plan_ID_idx` (`pid`) USING BTREE;

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`) USING BTREE,
  ADD KEY `pid` (`pid`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`) USING BTREE,
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `enrolls_to`
--
ALTER TABLE `enrolls_to`
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `enrolls_to`
--
ALTER TABLE `enrolls_to`
  ADD CONSTRAINT `plan_ID` FOREIGN KEY (`pid`) REFERENCES `plan` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
