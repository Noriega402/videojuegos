-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2020 a las 03:38:08
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `nuevo_juego` (`_nombre` VARCHAR(80), `_anio` NUMERIC(4,0), `_empresa` VARCHAR(80))  BEGIN
		INSERT INTO t_juegos (nombre,anio,empresa) VALUES (_nombre,_anio,_empresa);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `vista_juego` ()  BEGIN
  		SELECT* FROM t_juegos;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_juegos`
--

CREATE TABLE `t_juegos` (
  `id_juego` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `anio` decimal(4,0) DEFAULT NULL,
  `empresa` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_juegos`
--

INSERT INTO `t_juegos` (`id_juego`, `nombre`, `anio`, `empresa`) VALUES
(1, 'Super Mario Bros 3', '1998', 'Nintendo'),
(2, 'The Legend of Zelda', '1997', 'Nintendo'),
(3, 'Super Mario Bros', '1985', 'Nintendo'),
(4, 'Mega Man 2', '1988', 'Capcom'),
(5, 'Metroid', '1986', 'Nintendo'),
(6, 'Castelvania III Dracula\'s Curse', '1989', 'Konami'),
(7, 'Kirby\'s Adventure', '1993', 'Nintendo'),
(8, 'Super Mario Bros 2', '1970', 'Nintendo'),
(9, 'Final Fantasy', '1987', 'Square'),
(10, 'Contra', '1988', 'Konami'),
(11, 'Double Dragon', '1988', 'Capcom'),
(12, 'Duck Tales', '1989', 'Capcom'),
(13, 'Sonic', '1995', 'Sega'),
(14, 'Sonic y el caballero negro', '2005', 'Sega'),
(15, 'Mario Party 7', '2009', 'Nintendo'),
(16, 'Metal Slug 3', '2007', 'Sega'),
(17, 'Ray Man', '2001', 'Capcom'),
(18, 'Pac Man 3', '2003', 'Capcom'),
(19, 'Super Mario 64', '1990', 'Nintendo'),
(20, 'Donkey Kong Country', '2010', 'Nintendo'),
(21, 'Pokemon Edition Fire Red', '2001', 'Nintendo'),
(22, 'CupHead', '2004', 'Capcom'),
(24, 'Conduit 2', '2009', 'Sega'),
(25, 'Castelvania of the night', '1999', 'Konami'),
(26, 'Mario Kart Double Dash', '2004', 'Nintendo'),
(28, 'Metal Slug Original', '1997', 'Capcom'),
(33, 'The Amazing Spider Man', '2018', 'Sony'),
(34, 'Contra 2', '2000', 'Konami'),
(35, 'Super Mario Kart 8', '2016', 'Nintendo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_juegos`
--
ALTER TABLE `t_juegos`
  ADD PRIMARY KEY (`id_juego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_juegos`
--
ALTER TABLE `t_juegos`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
