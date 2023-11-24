-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 21:20:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--
CREATE DATABASE IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) DEFAULT NULL,
  `contraseña` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `contraseña`) VALUES
(1, 'admin1', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `usuario`, `contraseña`) VALUES
(1, 'lucia', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

DROP TABLE IF EXISTS `detalle_pedido`;
CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `id_pedido` int(6) DEFAULT NULL,
  `id_producto` int(6) DEFAULT NULL,
  `precio_unidad` int(6) DEFAULT NULL,
  KEY `id_pedido` (`id_pedido`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_pedido`, `id_producto`, `precio_unidad`) VALUES
(3, 1, 12),
(3, 2, 60),
(3, 3, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_Clientes` int(6) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Clientes` (`id_Clientes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_Clientes`, `usuario`) VALUES
(3, 1, 'lucia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` int(6) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `estado`, `imagen`) VALUES
(1, 'Pinceles', 'Maravilloso set de piceles con el que podrás darle color y vida a tus dibujos como tú quieras', 12, 'disponible', 'imagenes/pinceles.jpg'),
(2, 'Pinturas', 'Pinturas de diversos colores para pintar al óleo', 60, 'disponible', 'imagenes/pinturas.jpg'),
(3, 'Caballete', 'El apoyo que tus lienzos necesitan para pintar de la manera más óptima', 38, 'disponible', 'imagenes/caballete.jpg'),
(4, 'Lienzos', 'La mejor superficie sobre la que realizar tus dibujos al óleo', 40, 'disponible', 'imagenes/lienzos.jpg'),
(5, 'Delantal', 'Para hacer los mejores trabajos lo mejor es mancharse, pero bastante mejor si no es la ropa', 16, 'disponible', 'imagenes/delantal.jpg'),
(6, 'Lona', 'Lona de plástico para colocar debajo del lienzo, para que no se manche el suelo sobre el que pintas', 20, 'disponible', 'imagenes/Lona.jpg');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_Clientes`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
