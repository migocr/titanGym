-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2022 a las 08:59:22
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
('1670154849', '', '', '', ''),
('1670210417', '', '', '', ''),
('1670227723', '', '', '', ''),
('1670228088', '', '', '', ''),
('1670228092', '', '', '', ''),
('1670228187', '', '', '', ''),
('1670228223', '', '', '', ''),
('1670228267', '', '', '', ''),
('1670228356', '', '', '', ''),
('1670228485', '', '', '', ''),
('1670228546', '', '', '', ''),
('1670228662', '', '', '', ''),
('1670228711', '', '', '', ''),
('1670228742', '', '', '', ''),
('1670228777', '', '', '', ''),
('1670228821', '', '', '', ''),
('1670228875', '', '', '', ''),
('1670228900', '', '', '', ''),
('1670228922', '', '', '', ''),
('1670229017', '', '', '', ''),
('1670229060', '', '', '', ''),
('1670229116', '', '', '', ''),
('1670229143', '', '', '', ''),
('1671346945', '', '', '', ''),
('1671575204', '', '', '', ''),
('1671873838', '', '', '', ''),
('1671876060', '', '', '', ''),
('1671876643', '', '', '', ''),
('1671876769', '', '', '', ''),
('1671876848', '', '', '', ''),
('1671876857', '', '', '', ''),
('1671876863', '', '', '', ''),
('1671877106', '', '', '', ''),
('1671877145', '', '', '', ''),
('1671877162', '', '', '', ''),
('1671877316', '', '', '', ''),
('1671877394', '', '', '', ''),
('1671877466', '', '', '', ''),
('1671877482', '', '', '', ''),
('1671877501', '', '', '', ''),
('1671877537', '', '', '', ''),
('1671877584', '', '', '', ''),
('1671877611', '', '', '', ''),
('1671877653', '', '', '', ''),
('1671877672', '', '', '', ''),
('1671877939', '', '', '', ''),
('1671878036', '', '', '', ''),
('1671878269', '', '', '', ''),
('1671878279', '', '', '', ''),
('1671878362', '', '', '', ''),
('1671878729', '', '', '', ''),
('1671878837', '', '', '', '');

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
(4, 'POQKJC', '1580393244', '2020-01-30', '2020-03-01', 'no'),
(5, 'POQKJC', '1669097470', '2022-11-22', '2022-12-22', 'no'),
(6, 'POQKJC', '1670149075', '2022-12-04', '2023-01-04', 'no'),
(7, 'POQKJC', '1580392920', '2022-12-04', '2023-01-04', 'no'),
(10, 'POQKJC', '1670154849', '2022-12-04', '2023-01-04', 'no'),
(11, 'POQKJC', '1529336794', '2022-12-04', '2023-01-04', 'no'),
(12, 'POQKJC', '1670210417', '2022-12-04', '2023-01-04', 'no'),
(13, 'POQKJC', '1670227723', '2022-12-05', '2023-01-05', 'yes'),
(14, 'POQKJC', '1670228088', '2022-12-05', '2023-01-05', 'yes'),
(15, 'POQKJC', '1670228092', '2022-12-05', '2023-01-05', 'yes'),
(16, 'POQKJC', '1670228187', '2022-12-05', '2023-01-05', 'yes'),
(17, 'POQKJC', '1670228223', '2022-12-05', '2023-01-05', 'yes'),
(18, 'RMNOGS', '1670228267', '2022-12-05', '2023-01-05', 'yes'),
(19, 'POQKJC', '1670228356', '2022-12-05', '2023-01-05', 'yes'),
(20, 'RMNOGS', '1670228485', '2022-12-05', '2023-01-05', 'yes'),
(21, 'POQKJC', '1670228546', '2022-12-05', '2023-01-05', 'yes'),
(22, 'POQKJC', '1670228662', '2022-12-05', '2023-01-05', 'yes'),
(23, 'POQKJC', '1670228711', '2022-12-05', '2023-01-05', 'yes'),
(24, 'POQKJC', '1670228742', '2022-12-05', '2023-01-05', 'yes'),
(25, 'POQKJC', '1670228777', '2022-12-05', '2023-01-05', 'yes'),
(26, 'POQKJC', '1670228821', '2022-12-05', '2023-01-05', 'yes'),
(27, 'POQKJC', '1670228875', '2022-12-05', '2023-01-05', 'yes'),
(28, 'RMNOGS', '1670228900', '2022-12-05', '2023-01-05', 'yes'),
(29, 'RMNOGS', '1670228922', '2022-12-05', '2023-01-05', 'yes'),
(30, 'POQKJC', '1670229017', '2022-12-05', '2023-01-05', 'yes'),
(31, 'POQKJC', '1670229060', '2022-12-05', '2023-01-05', 'yes'),
(32, 'RMNOGS', '1670229116', '2022-12-05', '2023-01-05', 'yes'),
(33, 'POQKJC', '1670229143', '2022-12-05', '2023-01-05', 'yes'),
(34, 'POQKJC', '1580393244', '2022-12-17', '2023-01-17', 'yes'),
(35, 'POQKJC', '1671346945', '2022-12-18', '2023-01-18', 'no'),
(36, 'RMNOGS', '1671346945', '2022-12-18', '2023-01-18', 'no'),
(37, 'POQKJC', '1669097470', '2022-12-18', '2023-01-18', 'yes'),
(38, 'RMNOGS', '1670154849', '2022-12-18', '2023-01-18', 'no'),
(39, 'RMNOGS', '1670154849', '2022-12-18', '2023-01-18', 'no'),
(40, 'RMNOGS', '1670154849', '2022-12-18', '2023-01-18', 'no'),
(41, 'POQKJC', '1670154849', '2022-12-18', '2023-01-18', 'no'),
(42, 'POQKJC', '1670154849', '2022-12-18', '2023-01-18', 'no'),
(43, 'RMNOGS', '1671346945', '2022-12-18', '2023-01-18', 'yes'),
(44, 'RMNOGS', '1670149075', '2022-12-18', '2023-01-18', 'yes'),
(45, 'POQKJC', '1670154849', '2022-12-18', '2023-01-18', 'yes'),
(46, 'POQKJC', '1580392920', '2022-12-18', '2023-01-18', 'no'),
(47, 'RMNOGS', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(49, 'RMNOGS', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(50, 'POQKJC', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(51, 'POQKJC', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(52, 'RMNOGS', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(53, 'RMNOGS', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(54, 'RMNOGS', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(55, 'RMNOGS', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(56, 'RMNOGS', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(57, 'POQKJC', '1529336794', '2022-12-18', '2023-01-18', 'no'),
(58, 'RMNOGS', '1529336794', '2022-12-18', '2023-01-18', 'yes'),
(59, 'POQKJC', '1671575204', '2022-12-20', '2023-01-20', 'yes'),
(60, 'RMNOGS', '1580392920', '2022-12-20', '2023-01-20', 'no'),
(61, 'POQKJC', '1580392920', '2022-12-20', '2023-01-20', 'no'),
(62, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(63, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(64, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(65, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(66, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(67, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(68, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(69, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(70, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(71, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(72, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(73, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(74, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(75, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(76, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(82, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(83, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(84, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(85, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(86, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(87, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(88, 'POQKJC', '1671873838', '2022-12-24', '2023-01-24', 'yes'),
(89, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(90, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(91, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(92, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(94, 'POQKJC', '1671876060', '2022-12-24', '2023-01-24', 'yes'),
(95, 'POQKJC', '1671876643', '2022-12-24', '2023-01-24', 'yes'),
(96, 'POQKJC', '1671876769', '2022-12-24', '2023-01-24', 'yes'),
(97, 'POQKJC', '1671876848', '2022-12-24', '2023-01-24', 'yes'),
(98, 'POQKJC', '1671876857', '2022-12-24', '2023-01-24', 'yes'),
(99, 'POQKJC', '1671876863', '2022-12-24', '2023-01-24', 'yes'),
(100, 'POQKJC', '1671877106', '2022-12-24', '2023-01-24', 'yes'),
(101, 'POQKJC', '1671877145', '2022-12-24', '2023-01-24', 'yes'),
(102, 'POQKJC', '1671877162', '2022-12-24', '2023-01-24', 'yes'),
(103, 'POQKJC', '1671877316', '2022-12-24', '2023-01-24', 'yes'),
(104, 'POQKJC', '1671877394', '2022-12-24', '2023-01-24', 'yes'),
(105, 'POQKJC', '1671877466', '2022-12-24', '2023-01-24', 'yes'),
(106, 'POQKJC', '1671877482', '2022-12-24', '2023-01-24', 'yes'),
(107, 'POQKJC', '1671877501', '2022-12-24', '2023-01-24', 'yes'),
(109, 'POQKJC', '1671877537', '2022-12-24', '2023-01-24', 'yes'),
(110, 'POQKJC', '1671877584', '2022-12-24', '2023-01-24', 'yes'),
(111, 'POQKJC', '1671877611', '2022-12-24', '2023-01-24', 'yes'),
(112, 'POQKJC', '1671877653', '2022-12-24', '2023-01-24', 'yes'),
(113, 'POQKJC', '1671877672', '2022-12-24', '2023-01-24', 'yes'),
(114, 'POQKJC', '1671877939', '2022-12-24', '2023-01-24', 'yes'),
(115, 'POQKJC', '1671878036', '2022-12-24', '2023-01-24', 'yes'),
(116, 'POQKJC', '1671878269', '2022-12-24', '2023-01-24', 'yes'),
(117, 'POQKJC', '1671878279', '2022-12-24', '2023-01-24', 'yes'),
(118, 'POQKJC', '1671878362', '2022-12-24', '2023-01-24', 'yes'),
(119, 'RMNOGS', '1580392920', '2022-12-24', '2023-01-24', 'no'),
(120, 'POQKJC', '1580392920', '2022-12-24', '2023-01-24', 'yes'),
(121, 'POQKJC', '1671878729', '2022-12-24', '2023-01-24', 'yes'),
(122, 'RMNOGS', '1670210417', '2022-12-24', '2023-01-24', 'yes'),
(123, 'POQKJC', '1671878837', '2022-12-24', '2023-01-24', 'yes');

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
(7, NULL, NULL, NULL, NULL, NULL, '1670154849'),
(8, NULL, NULL, NULL, NULL, NULL, '1670210417'),
(9, NULL, NULL, NULL, NULL, NULL, '1670227723'),
(10, NULL, NULL, NULL, NULL, NULL, '1670228088'),
(11, NULL, NULL, NULL, NULL, NULL, '1670228092'),
(12, NULL, NULL, NULL, NULL, NULL, '1670228187'),
(13, NULL, NULL, NULL, NULL, NULL, '1670228223'),
(14, NULL, NULL, NULL, NULL, NULL, '1670228267'),
(15, NULL, NULL, NULL, NULL, NULL, '1670228356'),
(16, NULL, NULL, NULL, NULL, NULL, '1670228485'),
(17, NULL, NULL, NULL, NULL, NULL, '1670228546'),
(18, NULL, NULL, NULL, NULL, NULL, '1670228662'),
(19, NULL, NULL, NULL, NULL, NULL, '1670228711'),
(20, NULL, NULL, NULL, NULL, NULL, '1670228742'),
(21, NULL, NULL, NULL, NULL, NULL, '1670228777'),
(22, NULL, NULL, NULL, NULL, NULL, '1670228821'),
(23, NULL, NULL, NULL, NULL, NULL, '1670228875'),
(24, NULL, NULL, NULL, NULL, NULL, '1670228900'),
(25, NULL, NULL, NULL, NULL, NULL, '1670228922'),
(26, NULL, NULL, NULL, NULL, NULL, '1670229017'),
(27, NULL, NULL, NULL, NULL, NULL, '1670229060'),
(28, NULL, NULL, NULL, NULL, NULL, '1670229116'),
(29, NULL, NULL, NULL, NULL, NULL, '1670229143'),
(30, NULL, NULL, NULL, NULL, NULL, '1671346945'),
(31, NULL, NULL, NULL, NULL, NULL, '1671575204'),
(32, NULL, NULL, NULL, NULL, NULL, '1671873838'),
(33, NULL, NULL, NULL, NULL, NULL, '1671876060'),
(34, NULL, NULL, NULL, NULL, NULL, '1671876643'),
(35, NULL, NULL, NULL, NULL, NULL, '1671876769'),
(36, NULL, NULL, NULL, NULL, NULL, '1671876848'),
(37, NULL, NULL, NULL, NULL, NULL, '1671876857'),
(38, NULL, NULL, NULL, NULL, NULL, '1671876863'),
(39, NULL, NULL, NULL, NULL, NULL, '1671877106'),
(40, NULL, NULL, NULL, NULL, NULL, '1671877145'),
(41, NULL, NULL, NULL, NULL, NULL, '1671877162'),
(42, NULL, NULL, NULL, NULL, NULL, '1671877316'),
(43, NULL, NULL, NULL, NULL, NULL, '1671877394'),
(44, NULL, NULL, NULL, NULL, NULL, '1671877466'),
(45, NULL, NULL, NULL, NULL, NULL, '1671877482'),
(46, NULL, NULL, NULL, NULL, NULL, '1671877501'),
(47, NULL, NULL, NULL, NULL, NULL, '1671877537'),
(48, NULL, NULL, NULL, NULL, NULL, '1671877584'),
(49, NULL, NULL, NULL, NULL, NULL, '1671877611'),
(50, NULL, NULL, NULL, NULL, NULL, '1671877653'),
(51, NULL, NULL, NULL, NULL, NULL, '1671877672'),
(52, NULL, NULL, NULL, NULL, NULL, '1671877939'),
(53, NULL, NULL, NULL, NULL, NULL, '1671878036'),
(54, NULL, NULL, NULL, NULL, NULL, '1671878269'),
(55, NULL, NULL, NULL, NULL, NULL, '1671878279'),
(56, NULL, NULL, NULL, NULL, NULL, '1671878362'),
(57, NULL, NULL, NULL, NULL, NULL, '1671878729'),
(58, NULL, NULL, NULL, NULL, NULL, '1671878837');

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
('CXYFBV', 'Funcional Trap', 'Rutinas de cardio que se basan en circuitos prolongados, donde se escala el esfuerzo, en 6 niveles y gradualmente se baja durante el lapso de 1 hora.', '4', 85000, 'no', ''),
('GWLREN', '3 MESES', '3 MESES', '3', 1200, 'no', 'm'),
('KMARLQ', 'Funcional', 'Se realizan los movimientos, solo con el pesos del cuerpo en circuitos de 10 minutos con 1 minuto de descanso.', '1', 65000, 'no', ''),
('OZHSJL', '6 MESES', '6 MESES', '6', 1200, 'yes', ''),
('POQKJC', 'Plan Mensual', 'Suscripcion Mensual', '1', 600, 'yes', 'm'),
('RMNOGS', 'Visita 1 dia', 'Visita 1 dia', '1', 50, 'yes', 'd');

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
('color', 'linear-gradient(310deg, #ea0606 0%, #ff667c 100%)');

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
('1529336794', 'Juana Maren', 'Mujer', '', ''),
('1580392920', 'Roberto Forero e', 'Hombre', '', ''),
('1580393244', 'Johana Campos', 'Mujer', '', ''),
('1669097470', 'Larry', 'Hombre', '', ''),
('1670149075', 'Pruebax', 'Hombre', '', ''),
('1670154849', 'prueba2', 'Hombre', '', ''),
('1670210417', 'Prueba5', 'Hombre', '2022-12-25', '2022-12-05'),
('1670227723', 'x', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228088', 'Prueba', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228092', 'Prueba', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228187', 'sdasd', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228223', 'Prueba', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228267', 'Larry', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228356', 'Prueba', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228485', 'Prueba', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228546', 'Juan', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228662', 'Prueba', 'Mujer', '2022-12-05', '2022-12-05'),
('1670228711', 'prueba2', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228742', 'saas', 'Hombre', '', ''),
('1670228777', 'Prueba', 'Hombre', '', ''),
('1670228821', 'prueba2', 'Mujer', '2022-12-05', '2022-12-05'),
('1670228875', 'prueba2', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228900', 'Prueba', 'Hombre', '2022-12-05', '2022-12-05'),
('1670228922', 'prueba2', 'Hombre', '2022-12-05', '2022-12-05'),
('1670229017', 'Juan', 'Hombre', '2022-12-05', '2022-12-05'),
('1670229060', 'aaaaaaaaaaaa', 'Hombre', '2022-12-05', '2022-12-05'),
('1670229116', 'Larry', 'Hombre', '2022-12-05', '2022-12-05'),
('1670229143', 'aaaaaaaaaaaa', 'Hombre', '2022-12-05', '2022-12-05'),
('1671346945', 'Usuario x', 'Hombre', '2023-01-18', '2022-12-18'),
('1671575204', 'asdaad', 'Mujer', '', ''),
('1671873838', 'Juan', 'Hombre', '2023-01-24', '2022-12-24'),
('1671876060', 'asdsad', 'Mujer', '2022-12-24', '2022-12-24'),
('1671876643', 'sdfsdfs', 'Mujer', '2023-01-24', '2022-12-24'),
('1671876769', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671876848', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671876857', 'Prueba', 'Mujer', '2023-01-24', '2022-12-24'),
('1671876863', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877106', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877145', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877162', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877316', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877394', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877466', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877482', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877501', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877537', 'Prueba', 'Mujer', '2023-01-24', '2022-12-24'),
('1671877584', 'Prueba', 'Mujer', '2023-01-24', '2022-12-24'),
('1671877611', 'Prueba', 'Mujer', '2023-01-24', '2022-12-24'),
('1671877653', 'dsasdasda', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877672', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671877939', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671878036', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671878269', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671878279', 'dsfsfs', 'Mujer', '2023-01-24', '2022-12-24'),
('1671878362', 'prueba2', 'Hombre', '2023-01-24', '2022-12-24'),
('1671878729', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24'),
('1671878837', 'Prueba', 'Hombre', '2023-01-24', '2022-12-24');

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
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `health_status`
--
ALTER TABLE `health_status`
  MODIFY `hid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
