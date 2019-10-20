-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2019 a las 17:25:19
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cerveza_artesanal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cerveza`
--

CREATE TABLE `cerveza` (
  `id_cerveza` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `graduacion_porcentaje` double NOT NULL,
  `ibu` double NOT NULL,
  `amargor` varchar(100) NOT NULL,
  `original_gravity` double NOT NULL,
  `id_familia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cerveza`
--

INSERT INTO `cerveza` (`id_cerveza`, `nombre`, `graduacion_porcentaje`, `ibu`, `amargor`, `original_gravity`, `id_familia`) VALUES
(1, 'berliner weisse', 3.2, 5, 'bajo', 1030, 1),
(2, 'belgian white', 5.4, 9, 'bajo', 1044, 1),
(3, 'american wheat', 5, 18, 'bajo', 1045, 1),
(4, 'weissbier', 4.9, 12, 'bajo', 1048, 1),
(5, 'dunkelweizen', 5.2, 14, 'bajo', 1049, 1),
(6, 'weizenbock', 7.3, 18, 'bajo', 1075, 1),
(7, 'lambic', 6, 5, 'medio', 1050, 2),
(8, 'gueuze', 6.5, 5, 'medio', 1050, 2),
(9, 'faro', 4.5, 5, 'medio', 1049, 2),
(10, 'fruit beer', 6.8, 9, 'medio', 1052, 2),
(11, 'flanders red', 5.2, 19, 'medio', 1051, 2),
(12, 'oud bruin', 6, 23, 'medio', 1062, 2),
(13, 'Porter', 5.4, 19, 'medio', 1049, 3),
(14, 'Pilsen', 4, 48, 'bajo', 1010, 4),
(15, 'IPA', 6.5, 48, 'alto', 1030, 3),
(16, 'bock', 6, 35, 'medio', 1035, 4),
(17, 'APA', 5.4, 23, 'alto', 1052, 3),
(18, 'european lager', 5.6, 36, 'bajo', 1020, 4),
(19, ' Brown Ale', 6.5, 19, 'medio', 1048, 3),
(20, ' Múnich ', 6, 35, 'bajo', 1035, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `id_familia` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `caracteristicas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`id_familia`, `nombre`, `caracteristicas`) VALUES
(1, 'cervezas de trigo', 'Son cervezas de fermentación alta elaboradas con una mezcla de trigo y cebada. El trigo, que puede o no maltearse según la tradición de cada país, da a la cerveza un sabor a grano, como el pan recién hecho, sobre todo cuando no está malteado.Su característica principal es su carácter ácido, refrescante y espumoso.'),
(2, 'lambic y ale amargas', 'Son cervezas de fermentación espontánea y ácidas. Pueden ser pálidas u oscuras , tener mucho o poco cuerpo, alta o baja graduación alcohólica y ser más o menos amargas. Todo dependerá, entre otras cosas, de la cantidad y tipo de malta que se utilice, del lúpulo y de la maduración que experimente.'),
(3, 'ALE', 'El término Ale se refiere al tipo de fermentación y no tiene que ver con su color, estilo o cuerpo. Las cervezas Ale pueden ser claras u oscuras, tener mucho cuerpo, alta o baja graduación y ser más o menos amargas.\r\nEl vocablo Ale se deriva del inglés ealu, cuyo significado es cerveza y abarca a todas las que usan levaduras de fermentación alta.\r\nEn la Edad Media, las ales eran una fuente de hidratación y nutrición y se consumían constantemente debido a la falta de agua potable.\r\nEl proceso de fermentación se lleva a cabo a una temperatura de entre 15° y 25° grados centígrados y la levadura se mantiene en la parte superior del líquido de tres a cuatro días, llegando incluso a las dos semanas, antes de que finalmente descienda al fondo.'),
(4, 'Lager', 'El término alemán Lager significa guardar o almacenar y se les conoce así debido a que las cervezas de este tipo reposan en almacenes para su maduración antes de servirlas y beberlas.\r\nUna cerveza Lager es fermentada con una levadura a baja temperatura en la parte baja del tanque a la que luego se le deja madurar en frío. Algunas pueden hacerlo de tres a cuatro semanas, pero otras suelen dejarse hasta seis meses.\r\nLas cervezas Lager tienen menos contenido alcohólico y se sirven a una temperatura más baja, entre 5° y 9° grados centígrados.\r\nLa densidad del mosto, las mezclas de la malta, el lípulo y su proceso de elaboración determinan las características de los distintos estilos de lager');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD PRIMARY KEY (`id_cerveza`),
  ADD KEY `id_familia` (`id_familia`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id_familia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  MODIFY `id_cerveza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `id_familia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD CONSTRAINT `cerveza_ibfk_1` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id_familia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
