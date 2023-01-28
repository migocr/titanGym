-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2023 a las 01:13:49
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
('GXQUYF', '1 Mes', 'Valido x 1 mes de suscripcion', '1', 650, 'yes', 'm'),
('KBTODF', 'Visita', 'Visita 1 dia  de suscripcion', '1', 70, 'yes', 'd'),
('ULJWQN', '1 Semana', 'Valido x 7 dias  de suscripcion', '7', 280, 'yes', 'd'),
('XWNHUS', '2 Semanas', 'Valido x 14 dias de suscripcion', '14', 480, 'yes', 'd');

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
('color', 'linear-gradient(310deg, #141727 0%, #3A416F 100%)'),
('backgroundColor', '#a6aab9'),
('nombreSitio', 'TitaniumGYM'),
('colorFuente', 'black'),
('logo', ''),
('fixedNav', 'true'),
('navbarColor', ''),
('asideColor', '#ffffff'),
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
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enrolls_to`
--
ALTER TABLE `enrolls_to`
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

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
