-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2020 a las 09:42:47
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

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
  `idca` int(11) NOT NULL,
  `camara` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `camara`
--

INSERT INTO `camara` (`idca`, `camara`) VALUES
(1, '01: Breña y Real'),
(2, '02: Puno y Arequipa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cecom`
--

CREATE TABLE `cecom` (
  `idce` int(11) NOT NULL,
  `cnombre` varchar(150) NOT NULL,
  `cappaterno` varchar(150) NOT NULL,
  `capmaterno` varchar(150) NOT NULL,
  `abrvcecm` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cecom`
--

INSERT INTO `cecom` (`idce`, `cnombre`, `cappaterno`, `capmaterno`, `abrvcecm`) VALUES
(1, 'Jorge', 'Caballero', 'Garcia', 'Jorge Caballero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medioalerta`
--

CREATE TABLE `medioalerta` (
  `idm` int(11) NOT NULL,
  `medioalerta` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medioalerta`
--

INSERT INTO `medioalerta` (`idm`, `medioalerta`) VALUES
(1, 'Cámara de Vídeo Vigilancia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operador`
--

CREATE TABLE `operador` (
  `ido` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `appaterno` varchar(150) NOT NULL,
  `apmaterno` varchar(150) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `permiso` varchar(1) NOT NULL,
  `abrvoper` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operador`
--

INSERT INTO `operador` (`ido`, `nombre`, `appaterno`, `apmaterno`, `usuario`, `pass`, `permiso`, `abrvoper`) VALUES
(1, 'Victor', 'Poma', 'Canchari', 'vpoma', '123456', '1', 'Victor Poma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pnp`
--

CREATE TABLE `pnp` (
  `idp` int(11) NOT NULL,
  `grado` varchar(100) NOT NULL,
  `pnombre` varchar(150) NOT NULL,
  `pappaterno` varchar(150) NOT NULL,
  `papmaterno` varchar(150) NOT NULL,
  `abrvpnp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pnp`
--

INSERT INTO `pnp` (`idp`, `grado`, `pnombre`, `pappaterno`, `papmaterno`, `abrvpnp`) VALUES
(1, 'Sub Of 2°', 'Ivonne', 'Coz', 'Palomino', 'Sub Of 2° Ivonne Coz');

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
  `screenshot` text NOT NULL,
  `observaciones` text NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `id_cecom` int(11) NOT NULL,
  `id_pnp` int(11) NOT NULL,
  `turno` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registroincidencias`
--

INSERT INTO `registroincidencias` (`id`, `id_camara`, `referencia`, `id_tipodelito`, `id_medioalerta`, `descripcion`, `fecha`, `horaincid`, `intervino`, `horainterv`, `id_unidad`, `nunidad`, `screenshot`, `observaciones`, `id_operador`, `id_supervisor`, `id_cecom`, `id_pnp`, `turno`) VALUES
(1, 1, 'Casa del Artesano', 1, 1, 'Personas pintando la vereda', '2020-05-20', '01:42:00', 'Si', '01:45:00', 1, 1, '623-madara-hashirama-konoha.jpg', 'Los intervenidos pusieron resistencia', 1, 1, 1, 1, 'Noche'),
(2, 2, 'Puerta Antojitos', 1, 1, 'Personas botando basura', '2020-05-20', '02:07:00', 'No', '00:00:00', 1, 0, '', '', 1, 1, 1, 1, 'Noche'),
(3, 1, 'BCP', 1, 1, 'Personas pintando la pista', '2020-05-20', '02:19:00', 'Si', '02:20:00', 2, 1, 'imagen31.png', 'ninguna', 1, 1, 1, 1, 'Noche'),
(4, 2, 'Frontis discoteca la Zona', 1, 1, 'Bacos golpeando poste de Luz', '2020-05-20', '02:27:00', 'No', '00:00:00', 1, 0, '', '', 1, 1, 1, 1, 'Noche'),
(5, 2, 'aaaa', 1, 1, 'ssssss', '2020-05-20', '02:37:00', 'No', '00:00:00', 1, 0, '', '', 1, 1, 1, 1, 'Noche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

CREATE TABLE `supervisor` (
  `ids` int(11) NOT NULL,
  `snombre` varchar(150) NOT NULL,
  `sappaterno` varchar(150) NOT NULL,
  `sapmaterno` varchar(150) NOT NULL,
  `celular` int(9) NOT NULL,
  `abrvsupr` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `supervisor`
--

INSERT INTO `supervisor` (`ids`, `snombre`, `sappaterno`, `sapmaterno`, `celular`, `abrvsupr`) VALUES
(1, 'Juan Carlos', 'Bonifacio', 'Guerra', 987654321, 'Juan Carlos Bonifacio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodelito`
--

CREATE TABLE `tipodelito` (
  `idtd` int(11) NOT NULL,
  `delito` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodelito`
--

INSERT INTO `tipodelito` (`idtd`, `delito`) VALUES
(1, '1.1 Delito Contra el Patrimonio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `idu` int(11) NOT NULL,
  `unidad` varchar(150) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idu`, `unidad`, `descripcion`) VALUES
(1, 'Elija una Unidad', 'Ninguna'),
(2, 'P.A.R Cerrito', 'Puesto de Auxilio Rápido Cerrito de la Libertad'),
(3, 'Coyote', 'Personal a pie');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camara`
--
ALTER TABLE `camara`
  ADD PRIMARY KEY (`idca`);

--
-- Indices de la tabla `cecom`
--
ALTER TABLE `cecom`
  ADD PRIMARY KEY (`idce`);

--
-- Indices de la tabla `medioalerta`
--
ALTER TABLE `medioalerta`
  ADD PRIMARY KEY (`idm`);

--
-- Indices de la tabla `operador`
--
ALTER TABLE `operador`
  ADD PRIMARY KEY (`ido`);

--
-- Indices de la tabla `pnp`
--
ALTER TABLE `pnp`
  ADD PRIMARY KEY (`idp`);

--
-- Indices de la tabla `registroincidencias`
--
ALTER TABLE `registroincidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_camara` (`id_camara`),
  ADD KEY `id_tipodelito` (`id_tipodelito`),
  ADD KEY `id_medioalerta` (`id_medioalerta`),
  ADD KEY `id_unidad` (`id_unidad`),
  ADD KEY `id_operador` (`id_operador`),
  ADD KEY `id_supervisor` (`id_supervisor`),
  ADD KEY `id_cecom` (`id_cecom`),
  ADD KEY `id_pnp` (`id_pnp`);

--
-- Indices de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`ids`);

--
-- Indices de la tabla `tipodelito`
--
ALTER TABLE `tipodelito`
  ADD PRIMARY KEY (`idtd`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camara`
--
ALTER TABLE `camara`
  MODIFY `idca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cecom`
--
ALTER TABLE `cecom`
  MODIFY `idce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medioalerta`
--
ALTER TABLE `medioalerta`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `operador`
--
ALTER TABLE `operador`
  MODIFY `ido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pnp`
--
ALTER TABLE `pnp`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registroincidencias`
--
ALTER TABLE `registroincidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipodelito`
--
ALTER TABLE `tipodelito`
  MODIFY `idtd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registroincidencias`
--
ALTER TABLE `registroincidencias`
  ADD CONSTRAINT `registroincidencias_ibfk_1` FOREIGN KEY (`id_camara`) REFERENCES `camara` (`idca`),
  ADD CONSTRAINT `registroincidencias_ibfk_2` FOREIGN KEY (`id_tipodelito`) REFERENCES `tipodelito` (`idtd`),
  ADD CONSTRAINT `registroincidencias_ibfk_3` FOREIGN KEY (`id_medioalerta`) REFERENCES `medioalerta` (`idm`),
  ADD CONSTRAINT `registroincidencias_ibfk_4` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`idu`),
  ADD CONSTRAINT `registroincidencias_ibfk_5` FOREIGN KEY (`id_operador`) REFERENCES `operador` (`ido`),
  ADD CONSTRAINT `registroincidencias_ibfk_6` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`ids`),
  ADD CONSTRAINT `registroincidencias_ibfk_7` FOREIGN KEY (`id_cecom`) REFERENCES `cecom` (`idce`),
  ADD CONSTRAINT `registroincidencias_ibfk_8` FOREIGN KEY (`id_pnp`) REFERENCES `pnp` (`idp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
