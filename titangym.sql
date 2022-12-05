-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 06:16:08
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
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE `address` (
  `id` varchar(20) NOT NULL,
  `streetName` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `state` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `city` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `zipcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `address`
--

INSERT INTO `address` (`id`, `streetName`, `state`, `city`, `zipcode`) VALUES
('1529336794', 'Calle 23 Carrera 54', 'AtlÃ¡ntico', 'Barranquilla', '080004'),
('1580392920', 'Calle 92 Carrera 7', 'Cundinamarca', 'BogotÃ¡', '110431'),
('1580393244', 'Calle 12 N 34-23', 'Cundinamarca', 'Bogota', '110611'),
('1669097470', 'Calzada', 'Nayarit', 'Tepic', '63256'),
('1670149075', 'prueba', 'sdda', 'prueba', '263748'),
('1670154294', '', '', '', ''),
('1670154849', '', '', '', ''),
('1670210417', '', '', '', '');

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
('configuroweb', '1234abcd..', '1234abcd..', 'ConfiguroWeb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrolls_to`
--

CREATE TABLE `enrolls_to` (
  `et_id` int(5) NOT NULL,
  `pid` varchar(8) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `paid_date` varchar(15) DEFAULT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `enrolls_to`
--

INSERT INTO `enrolls_to` (`et_id`, `pid`, `uid`, `paid_date`, `expire`, `renewal`) VALUES
(1, 'POQKJC', '1529336794', '2018-06-18', '2018-07-18', 'no'),
(2, 'POQKJC', '1529336794', '2020-01-30', '2020-03-01', 'no'),
(3, 'POQKJC', '1580392920', '2020-01-30', '2020-03-01', 'no'),
(4, 'POQKJC', '1580393244', '2020-01-30', '2020-03-01', 'yes'),
(5, 'POQKJC', '1669097470', '2022-11-22', '2022-12-22', 'yes'),
(6, 'POQKJC', '1670149075', '2022-12-04', '2023-01-04', 'yes'),
(7, 'POQKJC', '1580392920', '2022-12-04', '2023-01-04', 'yes'),
(9, 'POQKJC', '1670154294', '2022-12-04', '2023-01-04', 'yes'),
(10, 'POQKJC', '1670154849', '2022-12-04', '2023-01-04', 'yes'),
(11, 'POQKJC', '1529336794', '2022-12-04', '2023-01-04', 'yes'),
(12, 'POQKJC', '1670210417', '2022-12-04', '2023-01-04', 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `health_status`
--

CREATE TABLE `health_status` (
  `hid` int(5) NOT NULL,
  `calorie` varchar(8) DEFAULT NULL,
  `height` varchar(8) DEFAULT NULL,
  `weight` varchar(8) DEFAULT NULL,
  `fat` varchar(8) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `uid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `health_status`
--

INSERT INTO `health_status` (`hid`, `calorie`, `height`, `weight`, `fat`, `remarks`, `uid`) VALUES
(1, '8500', '1.80', '95', '26', 'Ninguna', '1529336794'),
(2, '8500', '1.80', '95', '26', '', '1580392920'),
(3, NULL, NULL, NULL, NULL, NULL, '1580393244'),
(4, NULL, NULL, NULL, NULL, NULL, '1669097470'),
(5, NULL, NULL, NULL, NULL, NULL, '1670149075'),
(6, NULL, NULL, NULL, NULL, NULL, '1670154294'),
(7, NULL, NULL, NULL, NULL, NULL, '1670154849'),
(8, NULL, NULL, NULL, NULL, NULL, '1670210417');

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
  `active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`pid`, `planName`, `description`, `validity`, `amount`, `active`) VALUES
('CXYFBV', 'Funcional Trap', 'Rutinas de cardio que se basan en circuitos prolongados, donde se escala el esfuerzo, en 6 niveles y gradualmente se baja durante el lapso de 1 hora.', '4', 85000, 'no'),
('KMARLQ', 'Funcional', 'Se realizan los movimientos, solo con el pesos del cuerpo en circuitos de 10 minutos con 1 minuto de descanso.', '1', 65000, 'no'),
('POQKJC', 'Plan Mensual', 'Suscripcion Mensual', '1', 600, 'yes'),
('RMNOGS', 'Visita 1 dia', 'Visita 1 dia', '1', 50, 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timetable`
--

CREATE TABLE `timetable` (
  `tid` int(12) NOT NULL,
  `tname` varchar(45) DEFAULT NULL,
  `day1` varchar(200) DEFAULT NULL,
  `day2` varchar(200) DEFAULT NULL,
  `day3` varchar(200) DEFAULT NULL,
  `day4` varchar(200) DEFAULT NULL,
  `day5` varchar(200) DEFAULT NULL,
  `day6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `timetable`
--

INSERT INTO `timetable` (`tid`, `tname`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`) VALUES
(1, 'Zamba Jazz', 'Cardio 10 minutos, Flexiones de Pierna 50, Flexiones de Pecho 20', 'Cardio 10 minutos, Pesas, Pecho 50 Repeticiones', 'Abdomen 100, Trote 25 minutos, Pesas.', 'Cardio 10 minutos, Pesas, Pecho 50 Repeticiones', 'Cardio 10 minutos, Flexiones de Pierna 50, Flexiones de Pecho 20', 'Abdomen 100, Trote 25 minutos, Pesa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userid` varchar(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `joining_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userid`, `username`, `gender`, `dob`, `joining_date`) VALUES
('1529336794', 'Juana Maren', 'Mujer', '1994-06-15', '2020-01-30'),
('1580392920', 'Roberto Forero', 'Hombre', '1996-06-11', '2020-01-30'),
('1580393244', 'Johana Campos', 'Mujer', '1993-02-20', '2020-01-30'),
('1669097470', 'Larry', 'Hombre', '2022-11-16', '2022-11-22'),
('1670149075', 'Prueba', 'Hombre', '2022-11-30', '0555-05-03'),
('1670154294', 'fsfsdfsd', 'Hombre', '', ''),
('1670154849', 'prueba2', 'Hombre', '2023-02-02', '2022-12-04'),
('1670210417', 'Prueba5', 'Hombre', '2022-12-05', '2022-12-05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `address`
--
ALTER TABLE `address`
  ADD KEY `userID` (`id`) USING BTREE;

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
  ADD KEY `user_ID` (`uid`) USING BTREE,
  ADD KEY `plan_ID_idx` (`pid`) USING BTREE;

--
-- Indices de la tabla `health_status`
--
ALTER TABLE `health_status`
  ADD PRIMARY KEY (`hid`) USING BTREE,
  ADD KEY `userID_idx` (`uid`) USING BTREE;

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`) USING BTREE,
  ADD KEY `pid` (`pid`) USING BTREE;

--
-- Indices de la tabla `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`tid`) USING BTREE;

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
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `health_status`
--
ALTER TABLE `health_status`
  MODIFY `hid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `timetable`
--
ALTER TABLE `timetable`
  MODIFY `tid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `userID` FOREIGN KEY (`id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `enrolls_to`
--
ALTER TABLE `enrolls_to`
  ADD CONSTRAINT `plan_ID` FOREIGN KEY (`pid`) REFERENCES `plan` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`uid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `health_status`
--
ALTER TABLE `health_status`
  ADD CONSTRAINT `uID` FOREIGN KEY (`uid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
