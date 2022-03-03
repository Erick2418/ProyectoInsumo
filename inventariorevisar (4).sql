-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-03-2022 a las 15:28:31
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventariorevisar`
--
CREATE DATABASE IF NOT EXISTS `inventariorevisar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `inventariorevisar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `box`
--

DROP TABLE IF EXISTS `box`;
CREATE TABLE IF NOT EXISTS `box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `image`, `name`, `description`, `created_at`) VALUES
(1, NULL, 'Materia Prima', '', '2022-01-12 16:03:04'),
(2, NULL, 'Producto terminado', '', '2022-01-12 16:03:29'),
(4, NULL, 'Insumos', '', '2022-01-21 16:45:47'),
(5, NULL, 'Equipo', 'es un equipo', '2022-01-21 16:46:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `valor_total_compra` int(11) NOT NULL,
  `total_producto` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kind` int(11) NOT NULL,
  `val` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short` (`short`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuration`
--

INSERT INTO `configuration` (`id`, `short`, `name`, `kind`, `val`) VALUES
(1, 'title', 'Titulo del Sistema', 2, 'Inventio Lite'),
(2, 'use_image_product', 'Utilizar Imagenes en los productos', 1, '0'),
(3, 'active_clients', 'Activar clientes', 1, '0'),
(4, 'active_providers', 'Activar proveedores', 1, '0'),
(5, 'active_categories', 'Activar categorias', 1, '0'),
(6, 'active_reports_word', 'Activar reportes en Word', 1, '0'),
(7, 'active_reports_excel', 'Activar reportes en Excel', 1, '0'),
(8, 'active_reports_pdf', 'Activar reportes en PDF', 1, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depreciacion`
--

DROP TABLE IF EXISTS `depreciacion`;
CREATE TABLE IF NOT EXISTS `depreciacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `meses` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `depreciacion`
--

INSERT INTO `depreciacion` (`id`, `id_producto`, `meses`) VALUES
(20, 7, 7),
(19, 7, 7),
(18, 7, 7),
(17, 7, 7),
(16, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labores`
--

DROP TABLE IF EXISTS `labores`;
CREATE TABLE IF NOT EXISTS `labores` (
  `idlabores` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `condicion` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idlabores`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `labores`
--

INSERT INTO `labores` (`idlabores`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'Arar', 'Arado de tierra', 1),
(2, 'Cultivar', 'Se cultiva', 1),
(3, 'Cosechar', 'se cosecha', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lot`
--

DROP TABLE IF EXISTS `lot`;
CREATE TABLE IF NOT EXISTS `lot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `num_lot` int(11) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `condicion` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lot`
--

INSERT INTO `lot` (`id`, `name`, `num_lot`, `dimension`, `condicion`) VALUES
(1, 'Lote1', 12, '5000', 1),
(2, 'LOTE 2', 123, '5000', 1),
(3, 'Lote 3', 123, '5000', 1),
(5, 'prueba_condicion', 12, '5000', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novelty`
--

DROP TABLE IF EXISTS `novelty`;
CREATE TABLE IF NOT EXISTS `novelty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_novedad` datetime NOT NULL,
  `id_produccion` int(11) NOT NULL,
  `id_tipoNovedad` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `valor` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `id_subProduccion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `novelty`
--

INSERT INTO `novelty` (`id`, `fecha_novedad`, `id_produccion`, `id_tipoNovedad`, `descripcion`, `valor`, `status`, `id_subProduccion`) VALUES
(26, '2022-02-24 00:00:00', 77, 3, 'empleado enfermo', 20, 1, 65),
(25, '2022-02-23 00:00:00', 77, 2, 'combustible 2', 20, 1, 64),
(24, '2022-02-23 00:00:00', 77, 1, 'combustible', 20, 1, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation`
--

DROP TABLE IF EXISTS `operation`;
CREATE TABLE IF NOT EXISTS `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `q` float NOT NULL,
  `operation_type_id` int(11) NOT NULL,
  `sell_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `operation_type_id` (`operation_type_id`),
  KEY `sell_id` (`sell_id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operation`
--

INSERT INTO `operation` (`id`, `product_id`, `q`, `operation_type_id`, `sell_id`, `created_at`) VALUES
(84, 6, 1, 3, 1, '2022-02-23 01:05:06'),
(83, 4, 1, 3, 1, '2022-02-23 01:05:06'),
(82, 7, 1, 3, 1, '2022-02-23 01:05:06'),
(81, 5, 5, 3, 1, '2022-02-23 01:05:06'),
(80, 6, 1, 3, 1, '2022-02-23 01:00:10'),
(79, 7, 1, 3, 1, '2022-02-22 23:37:43'),
(66, 1, 800, 1, 14, '2022-02-22 23:19:20'),
(67, 2, 800, 1, 15, '2022-02-22 23:19:53'),
(68, 3, 800, 1, 16, '2022-02-22 23:21:24'),
(69, 4, 800, 1, 17, '2022-02-22 23:22:03'),
(70, 5, 800, 1, 18, '2022-02-22 23:22:34'),
(71, 6, 800, 1, 19, '2022-02-22 23:22:58'),
(72, 7, 800, 1, 20, '2022-02-22 23:23:21'),
(73, 3, 1, 3, 1, '2022-02-22 23:32:06'),
(74, 7, 1, 3, 1, '2022-02-22 23:32:06'),
(75, 4, 1, 3, 1, '2022-02-22 23:32:06'),
(76, 6, 1, 3, 1, '2022-02-22 23:32:06'),
(77, 5, 5, 3, 1, '2022-02-22 23:32:06'),
(78, 7, 1, 3, 1, '2022-02-22 23:35:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation_type`
--

DROP TABLE IF EXISTS `operation_type`;
CREATE TABLE IF NOT EXISTS `operation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operation_type`
--

INSERT INTO `operation_type` (`id`, `name`) VALUES
(1, 'entrada'),
(2, 'salida'),
(3, ' Consumo Produccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `kind` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `sueldo` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`id`, `image`, `name`, `lastname`, `company`, `address1`, `address2`, `phone1`, `phone2`, `email1`, `email2`, `kind`, `created_at`, `sueldo`) VALUES
(9, '', 'PIÃ‘A ', 'INTERNA', '', 'ORIENTE', '', '04222222', '', 'notiene@gmail.com', '', 1, '2022-01-24 14:13:22', 100),
(2, '', 'piÃ±a', 'INTERNACIONAL', '', 'ORIENTE', '', '04222222', '', 'notiene@gmail.com', '', 1, '2022-01-12 16:12:08', 200),
(5, '', 'Interagua', 'Planilla', '', 'ORIENTE', '', '04222222', '', 'notiene@gmail.com', '', 2, '2022-01-12 16:15:07', 300),
(6, '', 'Insectisida', 'ver ', '', 'ORIENTE', '', '04222222', '', 'notiene@gmail.com', '', 2, '2022-01-12 16:15:26', 400),
(7, '', 'prueba', 'prueba', '', 'prueba', '', '04222222', '', 'prueba@gmail.com', '', 1, '2022-01-21 16:34:38', 500),
(8, '', 'ProducciÃ³n ', 'Interna Cayena', '', 'ORIENTE', '', '04222222', '', 'notiene@gmail.com', '', 2, '2022-01-21 16:53:45', 15),
(10, '', 'ProducciÃ³n', 'Interna MD2', '', 'ORIENTE', '', '04222222', '', 'notiene@gmail.com', '', 2, '2022-02-01 19:27:29', 70),
(11, '', 'Bioagricolappm', '1', '', 'ECUADOR', '', '04222222', '', 'notiene@gmail.com', '', 2, '2022-02-01 19:28:08', 50),
(12, '', 'XYZ', 'venta de quipo', '', 'Guayaquil', '', '0222222', '', 'notiene@gmail.com', '', 2, '2022-02-14 16:50:21', 400),
(14, NULL, 'pruebaIngreso', 'prueba', NULL, 'prueba', NULL, '123', NULL, 'aa@gmail.com', NULL, 1, '2022-02-17 11:48:05', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producciontotal`
--

DROP TABLE IF EXISTS `producciontotal`;
CREATE TABLE IF NOT EXISTS `producciontotal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_produccion` double NOT NULL,
  `total_hijuelos` double NOT NULL,
  `id_Produccion` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producciontotal`
--

INSERT INTO `producciontotal` (`id`, `total_produccion`, `total_hijuelos`, `id_Produccion`) VALUES
(16, 300, 300, 79),
(15, 5, 5, 78),
(14, 800, 800, 77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `barcode` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `inventary_min` int(11) NOT NULL DEFAULT '10',
  `price_in` float NOT NULL,
  `price_out` float DEFAULT NULL,
  `unit` varchar(255) NOT NULL,
  `presentation` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `image`, `barcode`, `name`, `description`, `inventary_min`, `price_in`, `price_out`, `unit`, `presentation`, `user_id`, `category_id`, `created_at`, `is_active`) VALUES
(1, 'pina_md2.jpeg', '', 'PIÃ‘A MD2', 'PiÃ±a de Exportacion', 500, 0, 20, '800', 'PiÃ±a MD2', 2, 2, '0000-00-00 00:00:00', 1),
(2, 'pina_normal.jpg', '', 'PIÃ‘A INTERNA', 'PiÃ±a de uso interno del paÃ­s', 10, 0, 1, '800', 'PiÃ±a ', 2, 2, '0000-00-00 00:00:00', 1),
(3, 'tipos-labranza.jpg', '', 'labranza', 'para arar la tierra', 80, 800, 0, '800', 'labranza arar', 1, 5, '0000-00-00 00:00:00', 1),
(4, 'images.jpg', '', 'Armony', 'abono para la tierra', 500, 500, 0, '798', 'abono', 1, 4, '0000-00-00 00:00:00', 1),
(5, '0000000', '', 'Agua', 'Tanque de Agua', 10, 1, 0, '790', 'Agua', 1, 1, '2022-02-21 03:11:48', 1),
(6, '0000', '00', 'Fertilizante', 'Fertilizante', 10, 300, 0, '797', 'Fertilizante', 1, 4, '2022-02-21 03:29:16', 1),
(7, '00', '00', 'RASTRILLO', 'RASTRILLO', 10, 800, 0, '800', 'RASTRILLO', 1, 5, '2022-02-21 03:29:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `production`
--

DROP TABLE IF EXISTS `production`;
CREATE TABLE IF NOT EXISTS `production` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lote` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_labores` int(11) NOT NULL,
  `id_productProduction` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `estadoProduccion` varchar(50) NOT NULL DEFAULT 'EN PROCESO',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `production`
--

INSERT INTO `production` (`id`, `id_lote`, `fecha_inicio`, `fecha_fin`, `id_empleado`, `id_labores`, `id_productProduction`, `status`, `estadoProduccion`) VALUES
(79, 2, '2022-02-23', '2022-03-12 00:00:00', 9, 3, 85146, 1, 'FINALIZADO'),
(77, 1, '2022-02-23', '2022-03-03 00:00:00', 7, 3, 13979, 1, 'FINALIZADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_production`
--

DROP TABLE IF EXISTS `product_production`;
CREATE TABLE IF NOT EXISTS `product_production` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_temp` int(11) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT '1',
  `id_produccion` int(11) DEFAULT NULL,
  `id_subProduccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product_production`
--

INSERT INTO `product_production` (`id`, `idProducto`, `cantidad`, `id_temp`, `condicion`, `id_produccion`, `id_subProduccion`) VALUES
(128, 5, 5, 85146, 1, 79, 69),
(127, 7, 1, 85146, 1, 79, 69),
(126, 4, 1, 85146, 1, 79, 69),
(125, 6, 1, 85146, 1, 79, 69),
(124, 6, 1, 5445, 1, 78, 66),
(123, 7, 1, 77, 1, 77, 64),
(122, 7, 1, 77, 1, 77, 63),
(121, 3, 1, 13979, 1, 77, 63),
(120, 7, 1, 13979, 1, 77, 63),
(119, 4, 1, 13979, 1, 77, 63),
(118, 6, 1, 13979, 1, 77, 63),
(117, 5, 5, 13979, 1, 77, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sell`
--

DROP TABLE IF EXISTS `sell`;
CREATE TABLE IF NOT EXISTS `sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `operation_type_id` int(11) DEFAULT '2',
  `box_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `box_id` (`box_id`),
  KEY `operation_type_id` (`operation_type_id`),
  KEY `user_id` (`user_id`),
  KEY `person_id` (`person_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sell`
--

INSERT INTO `sell` (`id`, `person_id`, `user_id`, `operation_type_id`, `box_id`, `created_at`) VALUES
(20, 12, 1, 1, NULL, '2022-02-22 23:23:21'),
(19, 11, 1, 1, NULL, '2022-02-22 23:22:58'),
(18, 5, 1, 1, NULL, '2022-02-22 23:22:34'),
(17, 11, 1, 1, NULL, '2022-02-22 23:22:03'),
(16, 12, 1, 1, NULL, '2022-02-22 23:21:24'),
(15, 8, 1, 1, NULL, '2022-02-22 23:19:53'),
(14, 10, 1, 1, NULL, '2022-02-22 23:19:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subproduccion`
--

DROP TABLE IF EXISTS `subproduccion`;
CREATE TABLE IF NOT EXISTS `subproduccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_fin` datetime NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_labores` int(11) NOT NULL,
  `id_productProduction` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `idProduccion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subproduccion`
--

INSERT INTO `subproduccion` (`id`, `fecha_fin`, `id_empleado`, `id_labores`, `id_productProduction`, `status`, `idProduccion`) VALUES
(71, '2022-03-12 00:00:00', 9, 3, 79, 1, 79),
(70, '2022-03-12 00:00:00', 9, 2, 79, 1, 79),
(69, '2022-03-12 00:00:00', 9, 1, 85146, 1, 79),
(68, '2022-02-26 00:00:00', 2, 3, 78, 1, 78),
(67, '2022-02-26 00:00:00', 2, 2, 78, 1, 78),
(66, '2022-02-26 00:00:00', 2, 1, 5445, 1, 78),
(65, '2022-03-03 00:00:00', 14, 3, 77, 1, 77),
(64, '2022-03-03 00:00:00', 7, 2, 77, 1, 77),
(63, '2022-02-28 00:00:00', 7, 1, 13979, 1, 77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_novedad`
--

DROP TABLE IF EXISTS `tipo_novedad`;
CREATE TABLE IF NOT EXISTS `tipo_novedad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(240) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_novedad`
--

INSERT INTO `tipo_novedad` (`id`, `nombre`, `status`) VALUES
(1, 'novedad1', 1),
(2, 'novedad2', 1),
(3, 'novedad3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `username`, `email`, `password`, `image`, `is_active`, `is_admin`, `created_at`) VALUES
(1, 'Administrador', '', NULL, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 1, '2022-01-12 15:57:38'),
(2, 'MB', 'TA', 'MBTA', 'matielenatagle@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, 1, 1, '2022-01-12 15:59:36'),
(3, 'PRUEBA', 'VENDEDOR', 'VENDEDOR', 'VENDEDOR@GMAIL.COM', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, 0, 0, '2022-01-12 16:00:20'),
(4, 'LILIBETH', 'REYES', 'lili', 'lilibethcarolina20@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, 1, 1, '2022-01-14 15:00:06'),
(5, 'Empleado', 'ProducciÃ³n', 'alex', 'empleado@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, 1, 0, '2022-01-20 16:56:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
