-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-08-2019 a las 17:12:36
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redmiau`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `idmessage` int(11) NOT NULL,
  `from_user` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `to_user` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `message` varchar(9999) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `idLike` int(11) NOT NULL,
  `idPublic` int(11) DEFAULT NULL,
  `Username` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idLogin`, `Email`, `Password`) VALUES
(2, 'admin@admin.com', 'admin'),
(11, 'fld86388@zwoho.com', '12345'),
(12, 'sda@das.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `public`
--

CREATE TABLE `public` (
  `idPublic` int(11) NOT NULL,
  `Username` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Tex_t` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Video` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Audio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigin`
--

CREATE TABLE `sigin` (
  `idReg` int(10) NOT NULL,
  `Name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Username` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `NumPhone` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Occupation` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `AccepTerm` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idmessage`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`idLike`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Indices de la tabla `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`idPublic`);

--
-- Indices de la tabla `sigin`
--
ALTER TABLE `sigin`
  ADD PRIMARY KEY (`idReg`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `public`
--
ALTER TABLE `public`
  MODIFY `idPublic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `sigin`
--
ALTER TABLE `sigin`
  MODIFY `idReg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
