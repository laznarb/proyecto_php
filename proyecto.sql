CREATE DATABASE IF NOT EXISTS `proyecto`;
USE `proyecto`;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 11:46:01
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_Clientes` int(6) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  FOREIGN KEY (id_Clientes) REFERENCES clientes(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` int(6) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_pedido` int(6),
  `id_producto` int(6),
  `precio_unidad` int(6),
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
  FOREIGN KEY (id_producto) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `usuario` varchar(20),
  `contraseña` varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `contraseña`) VALUES
(1, `admin1`, SHA(`123`));  