-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2023 a las 23:38:51
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
-- Estructura de tabla para la tabla `enrolls_to`
--

CREATE TABLE `enrolls_to` (
  `et_id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `paid_date` varchar(15) DEFAULT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `startDate` varchar(15) NOT NULL,
  `renewal` varchar(15) DEFAULT NULL,
  `uid` int(4) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `enrolls_to`
--

INSERT INTO `enrolls_to` (`et_id`, `pid`, `paid_date`, `expire`, `startDate`, `renewal`, `uid`) VALUES
(1, 'GXQUYF', '2023-01-06', '2023-02-06', '2023-01-06', 'yes', 0001),
(2, 'KBTODF', '2023-01-06', '2023-01-07', '2023-01-06', 'no', 0002),
(3, 'XWNHUS', '2023-01-06', '2023-01-06', '2023-01-06', 'yes', 0003),
(4, 'ULJWQN', '2023-01-06', '2023-01-13', '2023-01-06', 'yes', 0004),
(5, 'XWNHUS', '2023-01-06', '2023-01-06', '2023-01-05', 'yes', 0005),
(6, 'GXQUYF', '2023-01-06', '2023-02-06', '2023-01-06', 'no', 0006),
(29, 'ULJWQN', '2023-01-07', '2023-02-13', '2023-02-06', 'no', 0006),
(30, 'ULJWQN', '2023-01-07', '2023-02-20', '2023-02-13', 'no', 0006),
(31, 'ULJWQN', '2023-01-07', '2023-02-27', '2023-02-20', 'no', 0006),
(32, 'ULJWQN', '2023-01-07', '2023-03-06', '2023-02-27', 'no', 0006),
(33, 'KBTODF', '2023-01-07', '2023-03-07', '2023-03-06', 'yes', 0006),
(34, 'XWNHUS', '2023-01-07', '2023-01-07', '2023-01-07', 'yes', 0007),
(35, 'KBTODF', '2023-01-07', '2023-01-08', '2023-01-07', 'yes', 0002),
(36, 'KBTODF', '2023-01-07', '2023-01-08', '2023-01-07', 'yes', 0008);

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
('GXQUYF', 'Plan Mensual', '', '1', 650, 'yes', 'm'),
('KBTODF', 'Visita', 'Visita 1 dia', '1', 50, 'yes', 'd'),
('ULJWQN', 'Semanal', '1 Semana', '7', 200, 'yes', 'd'),
('VJLRNM', 'Plan Trimestral', '3 meses', '3', 1800, 'yes', 'm'),
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
('color', 'linear-gradient(310deg, #f53939 0%, #fbcf33 100%)'),
('backgroundColor', '');

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
(0001, 'Prueba', 'Hombre', '3111543829', '2023-02-06', '2023-01-06'),
(0002, 'Larry', 'Hombre', '3111543829', '2023-01-08', '2023-01-06'),
(0003, 'Mike', 'Hombre', '3111543829', '2023-01-06', '2023-01-06'),
(0004, 'alma', 'Mujer', '3111543829', '2023-01-13', '2023-01-06'),
(0005, 'Prueba', 'Hombre', '', '2023-01-05', '2023-01-05'),
(0006, 'Larry', 'Hombre', '3111543829', '2023-03-07', '2023-01-06'),
(0007, 'Misael', 'Hombre', '3111543829', '2023-01-07', '2023-01-07'),
(0008, 'Nuevo', 'Hombre', '3111543829', '2023-01-08', '2023-01-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`) USING BTREE;

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
-- AUTO_INCREMENT de la tabla `enrolls_to`
--
ALTER TABLE `enrolls_to`
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
