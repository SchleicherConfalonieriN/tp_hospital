-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2021 a las 01:21:32
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `dni` int(11) NOT NULL,
  `nom_medico` varchar(100) NOT NULL,
  `ape_medico` varchar(50) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `horario` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`dni`, `nom_medico`, `ape_medico`, `especialidad`, `horario`) VALUES
(14558997, 'Doctor', 'Medico', 'Pediatra', 'm'),
(34930477, 'otra', 'persona', 'Psiquiatría', 't');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `turno_id` int(11) NOT NULL,
  `dni_paciente` int(11) NOT NULL,
  `dni_medico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `consultorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`turno_id`, `dni_paciente`, `dni_medico`, `fecha`, `hora`, `consultorio`) VALUES
(2, 3, 34930477, '2021-10-27', '17:00:00', 4),
(4, 32674434, 34930477, '2021-10-14', '17:00:00', 5),
(5, 32674434, 34930477, '2021-10-14', '09:00:00', 66),
(10, 32674434, 14558997, '2021-10-06', '11:00:00', 0),
(11, 32674434, 34930477, '2021-10-18', '08:30:00', 0),
(16, 32674434, 14558997, '2021-10-15', '11:30:00', 0),
(19, 32674434, 14558997, '2021-11-02', '11:30:00', 0),
(20, 32674434, 14558997, '2021-11-03', '08:30:00', 0),
(21, 32674434, 14558997, '2021-10-29', '08:30:00', 0),
(22, 32674434, 14558997, '2021-10-29', '09:00:00', 0),
(23, 32674434, 14558997, '2021-10-29', '09:30:00', 0),
(24, 32674434, 14558997, '2021-10-29', '10:00:00', 0),
(25, 32674434, 14558997, '2021-10-29', '10:30:00', 0),
(26, 32674434, 14558997, '2021-10-29', '11:00:00', 0),
(27, 32674434, 14558997, '2021-10-29', '11:30:00', 0),
(28, 32674434, 14558997, '2021-10-29', '12:00:00', 0),
(29, 32674434, 14558997, '2021-10-29', '12:30:00', 0),
(31, 32674434, 14558997, '2021-10-29', '08:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` int(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `contrasenia` varchar(40) NOT NULL,
  `tipo` int(1) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `contrasenia`, `tipo`, `mail`) VALUES
(3, '3', '3', '3', 1, '3'),
(14558997, 'Doctor', 'Medico', 'papapa', 2, 'sinmail'),
(32674434, 'bruno', 'zicari', '123456', 1, 'brunozicari@mail.com.ar'),
(34930477, 'otra', 'persona', '555555', 2, 'yipiscelzo@mail.com.ar'),
(234234234, 'ff', 'ff', '1111', 1, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`turno_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `turno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
