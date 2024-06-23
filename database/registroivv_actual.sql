-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2024 a las 07:19:00
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
-- Base de datos: `registroivv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camara`
--

CREATE TABLE `camara` (
  `id` int(11) NOT NULL,
  `camara` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `camara`
--

INSERT INTO `camara` (`id`, `camara`) VALUES
(1, 'abcd'),
(2, 'jojolete'),
(3, 'qwe'),
(8, '789789789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cecom`
--

CREATE TABLE `cecom` (
  `id` int(11) NOT NULL,
  `cnombre` varchar(150) NOT NULL,
  `capellidos` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medioalerta`
--

CREATE TABLE `medioalerta` (
  `id` int(11) NOT NULL,
  `medioalerta` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operador`
--

CREATE TABLE `operador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `operador`
--

INSERT INTO `operador` (`id`, `nombre`, `apellidos`, `usuario`, `password`, `tipo`) VALUES
(1, 'Victor', 'Poma', 'vpoma', '123456', 'adm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pnp`
--

CREATE TABLE `pnp` (
  `id` int(11) NOT NULL,
  `grado` varchar(100) NOT NULL,
  `pnombre` varchar(150) NOT NULL,
  `papellidos` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroincidencias`
--

CREATE TABLE `registroincidencias` (
  `id` int(11) NOT NULL,
  `id_camara` int(11) NOT NULL,
  `referencia` varchar(150) NOT NULL,
  `id_tipodelito` int(11) NOT NULL,
  `id_medioalerta` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `horaincid` time NOT NULL,
  `intervino` char(2) NOT NULL,
  `horainterv` time NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `nunidad` int(3) NOT NULL,
  `imagen` text NOT NULL,
  `observaciones` text NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `id_cecom` int(11) NOT NULL,
  `id_pnp` int(11) NOT NULL,
  `turno` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `snombre` varchar(150) NOT NULL,
  `sapellidos` varchar(250) NOT NULL,
  `celular` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodelito`
--

CREATE TABLE `tipodelito` (
  `id` int(11) NOT NULL,
  `delito` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `unidad` varchar(150) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camara`
--
ALTER TABLE `camara`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cecom`
--
ALTER TABLE `cecom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medioalerta`
--
ALTER TABLE `medioalerta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operador`
--
ALTER TABLE `operador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pnp`
--
ALTER TABLE `pnp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipodelito`
--
ALTER TABLE `tipodelito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camara`
--
ALTER TABLE `camara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cecom`
--
ALTER TABLE `cecom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medioalerta`
--
ALTER TABLE `medioalerta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `operador`
--
ALTER TABLE `operador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pnp`
--
ALTER TABLE `pnp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipodelito`
--
ALTER TABLE `tipodelito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


SELECT * FROM registroincidencias ORDER BY id DESC;

SELECT r.id as 'id', ca.camara as 'camara', r.referencia as 'referencia', t.delito as 'delito', m.medioalerta as 'alerta', r.referencia as 'descripcion', 
      r.referencia as 'fecha', r.fecha as 'horaincid', r.intervino as 'intervino', r.horainterv as 'horainterv', u.unidad as 'unidad', r.nunidad as 'nunidad' FROM registroincidencias r
      INNER JOIN camara ca ON ca.id = r.id_camara INNER JOIN tipodelito t ON t.id = r.id_tipodelito INNER JOIN medioalerta m ON m.id = r.id_medioalerta
      INNER JOIN unidad u ON u.id = r.id_unidad ORDER BY id DESC;