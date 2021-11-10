-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2021 a las 21:22:28
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

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
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `Indentificador` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Precio` int(7) NOT NULL,
  `horario` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `dni` int(11) NOT NULL,
  `nom_medico` varchar(100) NOT NULL,
  `ape_medico` varchar(50) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `consultorio` int(2) DEFAULT NULL,
  `horario` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`dni`, `nom_medico`, `ape_medico`, `especialidad`, `consultorio`, `horario`) VALUES
(654321, 'Ricardo', 'Andres', 'cardiologo', 12, 'm'),
(8000000, 'Luis', 'Alfonso', 'psicologo', 2, NULL),
(19053506, 'Nicolas', 'Schleicher', 'Prueba', 4, 'T'),
(90000000, 'roberto', 'Jose', 'neorologo', 7, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `turno_id` int(11) NOT NULL,
  `dni_paciente` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `consultorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`turno_id`, `dni_paciente`, `servicio`, `fecha`, `hora`, `consultorio`) VALUES
(32674449, 21389494, 90000000, '2021-11-16', '08:30:00', 7),
(32674450, 21389494, 654321, '2021-11-23', '08:30:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` int(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `contrasenia` varchar(200) NOT NULL,
  `tipo` int(1) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `contrasenia`, `tipo`, `mail`) VALUES
(123456, 'Admin', 'Super', '$2y$10$0u8cd6Qpu0CqM/LVm4k/dOMqB8pcg/0RiEZys5EDeULCuMbpQc.1C', 0, 'admin@gmial.com'),
(654321, 'Ricardo', 'Andres', '$2y$10$5y/23Jxwr2d0g/PRwCxpBuioQ/LHerJ/qYYQUacrCA34XuHirtZNu', 2, 'cardiologo'),
(8000000, 'Luis', 'Alfonso', '$2y$10$LBhL5YokuWGs6aTfVdOTvengf4FP5gld8KHF9LVrzgkQLjpyoS.1a', 2, 'psicologo'),
(19053506, 'Nicolas', 'Schleicher', '$2y$10$o.Ksx95VsLvnSvAHjPD6YuxNxqL6emxr0Ru13AybMDFDfQNl0C/FC', 2, 'nicosc41@gmail.com'),
(21389494, 'Ricardo', 'Jueres', '$2y$10$bPPngBjffs5KG58tB4dfXuWqkT8vUNLDBaqG4pKQOv76aS.4PNexu', 1, 'ricarjua@gmail.com'),
(90000000, 'roberto', 'Jose', '$2y$10$qxUsn/XpVtHDwAOkBcXuwew4DnFG3Vkc.Gc1RDfJOsU205q3Nr40e', 2, 'neorologo');

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
  MODIFY `turno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32674451;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
