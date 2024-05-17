-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2023 a las 00:24:37
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pibd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `IdAlbum` int(11) NOT NULL,
  `Titulo` text DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`IdAlbum`, `Titulo`, `Descripcion`, `Usuario`) VALUES
(3, 'Explorando Bosques', 'Fotos tomadas en varios bosques y áreas silvestres', 3),
(4, 'Retratos de la Naturaleza', 'Galería de fotografías capturando la belleza natural del entorno', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilos`
--

CREATE TABLE `estilos` (
  `IdEstilo` int(11) NOT NULL,
  `Nombre` text DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Fichero` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estilos`
--

INSERT INTO `estilos` (`IdEstilo`, `Nombre`, `Descripcion`, `Fichero`) VALUES
(1, 'Bajo Contraste', 'Estilo de bajo contraste', 'assets/css/bajocontraste.css'),
(2, 'Letra Grande', 'Estilo que aumenta el tamaño de la letra', 'assets/css/letragrande.css'),
(3, 'Modo Noche', 'Estilo modo noche', 'assets/css/modonoche.css'),
(4, 'Predeterminado', 'Estilo predeterminado', 'assets/css/style.css');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `IdFoto` int(11) NOT NULL,
  `Titulo` text DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `Album` int(11) DEFAULT NULL,
  `Fichero` text DEFAULT NULL,
  `Alternativo` varchar(255) DEFAULT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`IdFoto`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Album`, `Fichero`, `Alternativo`, `FRegistro`) VALUES
(18, 'Río', 'Descripción de Río', '2023-03-01', 3, 3, 'assets/img/Rio_Santa.jpg', 'Imagen de un río', '2023-11-28 16:49:21'),
(19, 'Camino', 'Descripción de Camino', '2023-04-01', 4, 4, 'assets/img/rio.jpg', 'Imagen de un camino en Cartagena', '2023-11-30 22:36:45'),
(20, 'Luna', 'Descripción de Luna', '2023-05-01', 5, 4, 'assets/img/Siluetas_sobre_la_luna.jpg', 'Imagen de la luna', '2023-11-28 16:49:21'),
(26, 'Tortuga', 'Imagen de una tortuga en el agua', '2023-12-18', 7, 3, NULL, 'Imagen de Tortuga', '2023-12-13 23:16:27'),
(27, 'Setas en la naturaleza', 'Así es como se ven las setas en la naturaleza', '2023-12-02', 3, 4, NULL, 'Imagen de setas', '2023-12-13 23:16:27'),
(28, 'Arbol en medio de Chile', 'Perfecta vista de un helecho en el campo de Chile', '2023-12-12', 7, 3, NULL, 'Imagen de árbol en Chile', '2023-12-13 23:18:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `IdPais` int(11) NOT NULL,
  `NomPais` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`IdPais`, `NomPais`) VALUES
(1, 'Senegal'),
(2, 'Francia'),
(3, 'Alemania'),
(4, 'Italia'),
(5, 'Portugal'),
(6, 'Estados Unidos'),
(7, 'Chile'),
(8, 'Letonia'),
(9, 'Brasil'),
(10, 'Argentina'),
(11, 'Ghana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `IdSolicitud` int(11) NOT NULL,
  `Album` int(11) DEFAULT NULL,
  `Nombre` varchar(200) DEFAULT NULL,
  `Titulo` varchar(200) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Email` varchar(254) DEFAULT NULL,
  `Direccion` text DEFAULT NULL,
  `Color` text DEFAULT NULL,
  `Copias` int(11) DEFAULT NULL,
  `Resolucion` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `IColor` tinyint(1) DEFAULT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Coste` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `NomUsuario` varchar(15) DEFAULT NULL,
  `Clave` varchar(15) DEFAULT NULL,
  `Email` varchar(254) DEFAULT NULL,
  `Sexo` smallint(6) DEFAULT NULL,
  `FNacimiento` date DEFAULT NULL,
  `Ciudad` text DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `Foto` text DEFAULT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Estilo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `NomUsuario`, `Clave`, `Email`, `Sexo`, `FNacimiento`, `Ciudad`, `Pais`, `Foto`, `FRegistro`, `Estilo`) VALUES
(3, 'usuario3', 'clave3', 'email3@example.com', 1, '1992-03-01', 'Bilbao', 3, 'assets/img/perfil/foto3.jpg', '2023-11-30 19:59:12', 3),
(4, 'usuario4', 'clave4', 'email4@example.com', 2, '1993-04-01', 'Valencia', 4, 'assets/img/perfil/foto4.jpg', '2023-11-30 19:59:12', 4),
(26, 'usuario1', 'calve1', 'email1@example.com', 0, '1998-12-10', 'Roma', 4, NULL, '2023-12-13 23:23:30', 3),
(27, 'usuario2', 'clave2', 'email2@example.com', 1, '2002-12-15', 'Lisboa', 5, NULL, '2023-12-13 23:23:30', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`IdAlbum`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`IdEstilo`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`IdFoto`),
  ADD KEY `Pais` (`Pais`),
  ADD KEY `Album` (`Album`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`IdPais`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`IdSolicitud`),
  ADD KEY `Album` (`Album`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `NomUsuario` (`NomUsuario`),
  ADD KEY `Pais` (`Pais`),
  ADD KEY `Estilo` (`Estilo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `IdAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `estilos`
--
ALTER TABLE `estilos`
  MODIFY `IdEstilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `IdFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `IdPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `IdSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD CONSTRAINT `albumes_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`Pais`) REFERENCES `paises` (`IdPais`),
  ADD CONSTRAINT `fotos_ibfk_2` FOREIGN KEY (`Album`) REFERENCES `albumes` (`IdAlbum`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`Album`) REFERENCES `albumes` (`IdAlbum`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Pais`) REFERENCES `paises` (`IdPais`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`Estilo`) REFERENCES `estilos` (`IdEstilo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
