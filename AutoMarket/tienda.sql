-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 02:26:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre_completo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `producto`, `cantidad`, `precio`, `fecha`, `nombre_completo`) VALUES
(1, 'Frijoles', 2, 25.00, '2024-06-04 20:45:46', NULL),
(2, 'Shampoo', 2, 35.00, '2024-06-04 20:56:34', NULL),
(3, 'foca', 2, 35.00, '2024-06-04 20:56:34', NULL),
(4, 'Shampoo', 2, 35.00, '2024-06-04 20:56:48', NULL),
(5, 'foca', 2, 35.00, '2024-06-04 20:56:48', NULL),
(6, 'foca', 1, 35.00, '2024-06-04 21:02:31', NULL),
(7, 'Shampoo', 2, 35.00, '2024-06-04 21:02:48', NULL),
(8, 'foca', 2, 35.00, '2024-06-04 21:02:48', NULL),
(9, 'Aceite', 4, 50.00, '2024-06-04 21:32:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_completo`, `correo`, `telefono`, `direccion`) VALUES
(3, 'Yaqueline', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San #90'),
(4, 'Yaqueline', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San #90'),
(5, 'Yaqueline', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San #90'),
(6, 'Yaqueline', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San #90'),
(7, 'Yaqueline', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San #90'),
(8, 'Yaqueline', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San #90'),
(10, 'Yaqueline', 'jairoleaquevedo@gmail.com', '666', '33'),
(11, 'Yaqueline', 'jairoleaquevedo@gmail.com', '665-118-0514', '4'),
(12, 'Yaqueline', 'jairoleaquevedo@gmail.com', '665-118-0514', '4'),
(13, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '665', 'yyyyy'),
(14, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '665', 'yyyyy'),
(15, 'Yaqueline', 'jairoleaquevedo@gmail.com', '665-118-0514', '22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `asunto` varchar(100) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `email`, `asunto`, `mensaje`, `fecha_creacion`) VALUES
(1, 'jair', 'jairoleaquevedo12@gmail.com', 'Tengo un problema', 'en mi carrito', '2024-05-22 01:12:47'),
(2, 'jair', 'jairoleaquevedo12@gmail.com', 'Tengo un problema', 'en mi carrito', '2024-05-22 01:13:37'),
(3, 'Yaquelin', 'karey@gmail.com', 'Tengo un problema', 'es un problema de conexion\r\n', '2024-05-22 01:24:51'),
(4, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', 'r', 'sd', '2024-05-24 19:41:36'),
(5, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', 'r', 'r', '2024-05-26 07:19:46'),
(6, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', 'r', '4', '2024-05-27 04:48:24'),
(7, 'jair', 'karey@gmail.com', '4', '4', '2024-05-27 04:53:04'),
(8, 'jair', 'karey@gmail.com', '4', '4', '2024-05-27 04:53:49'),
(9, 'jair', 'jairoleaquevedo12@gmail.com', 'r', '4', '2024-05-27 04:55:25'),
(10, 'jair', 'jairoleaquevedo12@gmail.com', 'r', '4', '2024-05-27 04:56:43'),
(11, 'Jair Olea Quevedo', 'karey@gmail.com', 'r', '4', '2024-05-27 05:00:38'),
(12, 'Jair Olea Quevedo', 'karey@gmail.com', 'r', '4', '2024-05-27 05:10:37'),
(13, 'jair', 'jairoleaquevedo12@gmail.com', 'r', 'r', '2024-05-27 05:20:09'),
(14, 'uwu', 'karey@gmail.com', '21111', 'jajaj', '2024-05-27 22:38:10'),
(15, 'uwu', 'jair@gmail.com', '21111', 'jajaj', '2024-05-27 22:38:35'),
(16, 'jair', 'jairoleaquevedo@gmail.com', '21111', 'sd', '2024-05-28 00:56:24'),
(17, 'jair', 'jairoleaquevedo12@gmail.com', 'prueba', 'pruebas', '2024-05-28 21:05:05'),
(18, 'jair', 'jairoleaquevedo12@gmail.com', 'prueba', 'pruebas', '2024-05-28 21:06:34'),
(19, 'r', 'jairoleaquevedo12@gmail.com', '4', '4', '2024-06-01 22:04:36'),
(20, 'jair', 'jairoleaquevedo12@gmail.com', 'r', 'ajaja', '2024-06-04 05:02:50'),
(21, 'jair', 'jairoleaquevedo12@gmail.com', '21111', 'pru', '2024-06-04 05:16:05'),
(22, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '21111', 'e', '2024-06-04 05:17:44'),
(23, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '21111', 'e', '2024-06-04 05:19:07'),
(24, 'jair', 'jairoleaquevedo12@gmail.com', '21111', 'prueba', '2024-06-04 05:20:03'),
(25, 'jair', 'karey@gmail.com', 'r', 'j', '2024-06-04 05:21:25'),
(26, 'Jair Olea Quevedo', 'karey@gmail.com', 'prueba', 'ajaaj', '2024-06-04 05:22:25'),
(27, 'Jair ', 'jair.olea@uabc.edu.mx', 'Buenas tardes ', 'buenas', '2024-06-04 05:23:08'),
(28, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '21111', 'ee', '2024-06-04 05:27:17'),
(29, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '21111', 'ee', '2024-06-04 05:28:24'),
(30, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '21111', 'ee', '2024-06-04 05:29:45'),
(31, 'Jair Olea Quevedo', 'karey@gmail.com', '21111', 'e', '2024-06-04 05:31:19'),
(32, 'Una presentacion de elementos inductivos del tema de circuitos de corriente alterna en Serie', 'jair.olea@uabc.edu.mx', 'Buenas noches.', 'g', '2024-06-04 05:32:10'),
(33, 'jair', 'jairoleaquevedo12@gmail.com', 'prueba', 'd', '2024-06-04 05:34:39'),
(34, 'Johan Jesus', 'karey@gmail.com', 'Buenas tardes ', 'j', '2024-06-04 05:35:09'),
(35, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', 'r', 'rr', '2024-06-04 05:39:02'),
(36, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', 'prueba', 'f', '2024-06-04 05:40:01'),
(37, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', 'Hola', 'Tengo un problema en mis productos', '2024-06-04 05:50:13'),
(38, 'Jair Olea Quevedo', 'karey@gmail.com', 'Buenas tardes ', 'wjw', '2024-06-04 05:51:49'),
(39, 'jair', 'karey@gmail.com', 'prueba', 'jeje', '2024-06-04 05:53:19'),
(40, 'jair', 'karey@gmail.com', 'prueba', 'jeje', '2024-06-04 05:55:03'),
(41, 'jair', 'karey@gmail.com', 'prueba', 'jeje', '2024-06-04 05:55:23'),
(42, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '4', 'e', '2024-06-04 05:55:38'),
(43, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', 'prueba', 'prueba', '2024-06-04 19:46:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_proveedor`
--

CREATE TABLE `mensajes_proveedor` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `correo_cliente` varchar(255) NOT NULL,
  `telefono_cliente` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes_proveedor`
--

INSERT INTO `mensajes_proveedor` (`id`, `nombre_cliente`, `correo_cliente`, `telefono_cliente`, `mensaje`, `fecha`) VALUES
(1, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'faltan productos', '2024-06-03 22:59:10'),
(2, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'prueba', '2024-06-03 23:01:28'),
(3, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'prueba', '2024-06-03 23:01:35'),
(4, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '665-118-0514', 'prueba', '2024-06-04 00:13:05'),
(5, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '665-118-0514', 'prueba', '2024-06-04 03:24:29'),
(6, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '665-118-0514', 'prueba', '2024-06-04 03:25:45'),
(7, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '665-118-0514', 'prueba', '2024-06-04 19:34:15'),
(8, 'juan', 'jairoleaquevedo@gmail.com', '666-666-6666', 'Ocupamoslmas papel higienico', '2024-06-04 20:40:39'),
(9, 'coca cola', 'jairoleaquevedo@gmail.com', '665-118-0514', 'ocupamos 100 coca colas ', '2024-06-04 21:29:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `producto` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `nombre_completo`, `correo`, `telefono`, `direccion`, `producto`, `cantidad`, `id_cliente`, `total`, `fecha`) VALUES
(1, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '665-118-0514', 'Calle San Luis #90', 'Aceite', 6, NULL, 0.00, '2024-06-02 02:42:29'),
(4, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '665', 'Calle San Luis #90', 'Frijoles', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(5, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '665', 'Calle San Luis #90', 'Aceite', 4, NULL, 0.00, '2024-06-02 02:42:29'),
(6, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '665', 'Calle San Luis #90', 'Leche', 1, NULL, 0.00, '2024-06-02 02:42:29'),
(7, 'Jair Olea Quevedo', 'jairoleaquevedo12@gmail.com', '665', 'Calle San Luis #90', 'Arroz', 6, NULL, 0.00, '2024-06-02 02:42:29'),
(8, 'karey', 'karey@gmail.com', '666', 'yyyyy', 'Aceite', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(9, 'karey', 'karey@gmail.com', '666', 'yyyyy', 'Leche', 1, NULL, 0.00, '2024-06-02 02:42:29'),
(10, 'jair', 'jairoleaquevedo@gmail.com', '665-118-0514', 'Calle San Luis #90', 'Aceite', 1, NULL, 0.00, '2024-06-02 02:42:29'),
(11, 'jair', 'jairoleaquevedo@gmail.com', '665-118-0514', 'Calle San Luis #90', 'Aceite', 1, NULL, 0.00, '2024-06-02 02:42:29'),
(12, 'Yaqueline', 'jairoleaquevedo@gmail.com', '665-118-0514', 'Calle San Luis #90', 'Aceite', 1, NULL, 0.00, '2024-06-02 02:42:29'),
(13, 'jair', 'jairoleaquevedo@gmail.com', '665-118-0514', 'Calle San Luis #90', 'Frijoles', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(14, 'jair', 'jairoleaquevedo@gmail.com', '665-118-0514', 'Calle San Luis #90', 'Frijoles', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(15, 'jair', 'jairoleaquevedo@gmail.com', '665-118-0514', 'Calle San Luis #90', 'Frijoles', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(16, 'Yaqueline', 'jairoleaquevedo@gmail.com', '665-118-0514', 'Calle San Luis #90', 'Frijoles', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(17, 'jair', 'yaque@gmail.com', '664110101010', 'Calle San Luis #90', 'jabon', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(18, 'Jair Olea Quevedo', 'yaque@gmail.com', '664110101010', 'Calle San Luis #90', 'Arroz', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(19, 'Jair Olea Quevedo', 'yaque@gmail.com', '664110101010', 'Calle San Luis #90', 'Frijoles', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(20, 'jair', 'jairoleaquevedo@gmail.com', '665-118-0514', 'Calle San Luis #90', 'Arroz', 2, NULL, 0.00, '2024-06-02 02:42:29'),
(21, NULL, NULL, NULL, NULL, 'Pan', 1, 3, 0.00, '2024-06-02 02:42:29'),
(22, NULL, NULL, NULL, NULL, 'Huevos', 2, 5, 0.00, '2024-06-02 02:42:29'),
(23, NULL, NULL, NULL, NULL, 'Huevos', 2, 6, 0.00, '2024-06-02 02:42:29'),
(28, NULL, NULL, NULL, NULL, 'Huevos', 2, 15, 0.00, '2024-06-02 02:42:29'),
(29, 'Yaqueline', 'jairoleaquevedo@gmail.com', '6666', '4', NULL, NULL, NULL, 141.00, '2024-06-02 02:42:29'),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2.00, '2024-06-02 02:42:29'),
(31, 'jair', 'jairoleaquevedo@gmail.com', '6643862651', 'el niño', NULL, NULL, NULL, 680.00, '2024-06-02 02:42:29'),
(32, 'jair', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90', NULL, NULL, NULL, 141.00, '2024-06-02 02:42:29'),
(33, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '664110101010', 'Calle San #90', NULL, NULL, NULL, 2.00, '2024-06-02 02:42:29'),
(34, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '664110101010', 'Calle San #90', NULL, NULL, NULL, 7.00, '2024-06-02 02:42:29'),
(35, 'Yaqueline', 'jairoleaquevedo@gmail.com', '6643862651', '4', NULL, NULL, NULL, 13.00, '2024-06-02 02:42:29'),
(36, 'jair', 'jairoleaquevedo@gmail.com', '6643862651', 'el niño', NULL, NULL, NULL, 17.00, '2024-06-02 02:42:29'),
(37, 'jair olea', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90', NULL, NULL, NULL, 25.00, '2024-06-02 02:42:29'),
(38, 'jair olea', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90', NULL, NULL, NULL, 33.00, '2024-06-02 02:42:29'),
(39, 'Omar', 'hjI@gmail.com', '6666', 'Calle San #90', NULL, NULL, NULL, 35.00, '2024-06-02 02:42:29'),
(40, 'Omar', 'jairoleaquevedo@gmail.com', '6666', 'Calle San #90', NULL, NULL, NULL, 3.00, '2024-06-02 02:42:29'),
(41, 'jair olea', 'jairoleaquevedo@gmail.com', '6643862651', 'Calle San #90', NULL, NULL, NULL, 93.00, '2024-06-02 02:42:29'),
(42, 'jair olea', 'jairoleaquevedo@gmail.com', '665', 'Calle San #90', NULL, NULL, NULL, 101.00, '2024-06-02 02:42:29'),
(43, 'jair olea', 'jairoleaquevedo@gmail.com', '6643862651', '33', NULL, NULL, NULL, 101.00, '2024-06-02 02:42:29'),
(44, 'ja', 'jairoleaquevedo@gmail.com', '55456', '4', NULL, NULL, NULL, 101.00, '2024-06-02 02:42:29'),
(45, 'ja', 'jairoleaquevedo@gmail.com', '55456', '4', NULL, NULL, NULL, 101.00, '2024-06-02 02:45:34'),
(46, 'jair olea', 'jairoleaquevedo@gmail.com', '665', 'Calle San #90', NULL, NULL, NULL, 101.00, '2024-06-02 14:47:02'),
(47, 'jair olea', 'jairoleaquevedo@gmail.com', '6643862651', 'Calle San #90', NULL, NULL, NULL, 191.00, '2024-06-02 14:49:23'),
(48, 'jair', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San #90', NULL, NULL, NULL, 48.00, '2024-06-02 15:31:43'),
(49, 'karey', 'jairoleaquevedo@gmail.com', '664110101010', 'Calle San Luis #90', NULL, NULL, NULL, 20.00, '2024-06-02 15:43:43'),
(50, 'jair olea', 'jairoleaquevedo@gmail.com', '664110101010', 'Calle San Luis #90', NULL, NULL, NULL, 210.00, '2024-06-02 15:49:22'),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 210.00, '2024-06-02 15:49:26'),
(52, 'jair olea', 'jairoleaquevedo@gmail.com', '664110101010', 'Calle San Luis #90', NULL, NULL, NULL, 400.00, '2024-06-02 15:49:48'),
(53, 'jair olea', 'jairoleaquevedo@gmail.com', '664110101010', 'Calle San Luis #90', NULL, NULL, NULL, 590.00, '2024-06-02 15:51:03'),
(54, 'jair olea', 'jairoleaquevedo@gmail.com', '665', 'Calle San #90', NULL, NULL, NULL, 650.00, '2024-06-03 05:10:03'),
(55, 'jair olea', 'jairoleaquevedo@gmail.com', '665', 'Calle San #90', NULL, NULL, NULL, 710.00, '2024-06-03 05:13:33'),
(56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 710.00, '2024-06-03 07:24:10'),
(57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 710.00, '2024-06-03 07:24:20'),
(58, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 20.00, '2024-06-03 07:31:12'),
(59, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 40.00, '2024-06-03 07:33:51'),
(60, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 60.00, '2024-06-03 07:34:15'),
(61, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 80.00, '2024-06-03 07:34:30'),
(62, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 100.00, '2024-06-03 07:35:56'),
(63, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 120.00, '2024-06-03 07:36:12'),
(64, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 140.00, '2024-06-03 07:36:56'),
(65, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 160.00, '2024-06-03 07:37:32'),
(66, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 180.00, '2024-06-03 07:38:23'),
(67, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90, Fraccionamiento Santa Anita', NULL, NULL, NULL, 200.00, '2024-06-03 07:38:51'),
(68, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90', NULL, NULL, NULL, 40.00, '2024-06-03 07:39:39'),
(69, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90', NULL, NULL, NULL, 72.00, '2024-06-03 07:40:20'),
(70, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90', NULL, NULL, NULL, 305.00, '2024-06-03 07:42:28'),
(71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 305.00, '2024-06-03 07:43:35'),
(72, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '6651180514', 'Calle San Luis #90', NULL, NULL, NULL, 465.00, '2024-06-03 18:28:24'),
(73, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', NULL, 'zona rio', NULL, NULL, NULL, 145.00, '2024-06-04 19:33:36'),
(74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145.00, '2024-06-04 19:33:46'),
(75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145.00, '2024-06-04 19:36:53'),
(76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145.00, '2024-06-04 19:42:50'),
(77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145.00, '2024-06-04 19:49:13'),
(78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145.00, '2024-06-04 19:52:27'),
(79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 145.00, '2024-06-04 19:52:34'),
(80, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', NULL, 'zona rio', NULL, NULL, NULL, 180.00, '2024-06-04 19:56:27'),
(81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 180.00, '2024-06-04 19:56:34'),
(82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 180.00, '2024-06-04 19:57:26'),
(83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 180.00, '2024-06-04 19:58:50'),
(84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 180.00, '2024-06-04 19:58:57'),
(85, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '55456', 'zona rio', NULL, NULL, NULL, 225.00, '2024-06-04 19:59:12'),
(86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 225.00, '2024-06-04 19:59:20'),
(87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 225.00, '2024-06-04 20:06:19'),
(88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 225.00, '2024-06-04 20:06:29'),
(89, 'Jair Olea Quevedo', 'jairoleaquevedo@gmail.com', '55456', 'zona rio', NULL, NULL, NULL, 365.00, '2024-06-04 20:10:21'),
(90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:10:26'),
(91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:14:09'),
(92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:17:47'),
(93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:18:10'),
(94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:19:59'),
(95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:20:14'),
(96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:20:28'),
(97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:22:14'),
(98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:25:58'),
(99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 20:31:51'),
(100, 'jair', 'jairoleaquevedo@gmail.com', '6643862651', 'zona rio', NULL, NULL, NULL, 50.00, '2024-06-04 20:45:46'),
(101, 'ja', 'jairoleaquevedo@gmail.com', '6643862651', 'zona rio', NULL, NULL, NULL, 190.00, '2024-06-04 20:56:34'),
(102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 190.00, '2024-06-04 20:56:42'),
(103, 'ja', 'jairoleaquevedo@gmail.com', '6643862651', 'zona rio', NULL, NULL, NULL, 330.00, '2024-06-04 20:56:48'),
(104, 'jair olea quevedo', 'jairoleaquevedo@gmail.com', '6643862651', 'zona rio', NULL, NULL, NULL, 365.00, '2024-06-04 21:02:31'),
(105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365.00, '2024-06-04 21:02:37'),
(106, 'ja', 'jairoleaquevedo@gmail.com', '6643862651', 'zona rio', NULL, NULL, NULL, 505.00, '2024-06-04 21:02:48'),
(107, 'jair olea quevedo', 'jairoleaquevedo@gmail.com', '6643862651', 'zona rio', NULL, NULL, NULL, 705.00, '2024-06-04 21:32:23'),
(108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 705.00, '2024-06-04 21:32:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `stock`, `stock_minimo`, `id_proveedor`, `precio`) VALUES
(1, 'Arroz', 0, 10, 0, 24.00),
(2, 'Frijoles', 5, 10, 0, 25.00),
(3, 'Aceite', 30, 10, 0, 50.00),
(4, 'Azúcar', 0, 10, 0, 18.00),
(5, 'Harina', 9, 10, 0, 22.00),
(6, 'Leche', 100, 10, 0, 15.00),
(7, 'Huevos', 80, 10, 0, 35.00),
(8, 'Pan', 5, 10, 0, 10.00),
(9, 'Café', 25, 10, 0, 45.00),
(10, 'Té', 50, 10, 0, 30.00),
(11, 'Sal', 55, 10, 0, 12.00),
(12, 'Pimienta', 40, 10, 0, 20.00),
(13, 'Pasta', 50, 10, 0, 18.00),
(14, 'Salsa de Tomate', 35, 10, 0, 15.00),
(15, 'Mantequilla', 40, 10, 0, 22.00),
(16, 'Queso', 25, 10, 0, 60.00),
(17, 'Jabón', 100, 10, 0, 8.00),
(18, 'Shampoo', 30, 10, 0, 35.00),
(19, 'Papel Higiénico', 80, 10, 0, 45.00),
(20, 'Detergente', 49, 10, 0, 40.00),
(21, 'Coca Cola', 52, 10, 0, 24.50),
(22, 'foca', 5, 10, 0, 35.00),
(23, 'Ciel', 100, 20, 0, 15.50),
(24, 'Coca Cola', 70, 20, 0, 22.00),
(25, 'Caca', 33, 22, 0, 333.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `correo`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordatorios`
--

CREATE TABLE `recordatorios` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes_proveedor`
--
ALTER TABLE `mensajes_proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recordatorios`
--
ALTER TABLE `recordatorios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `mensajes_proveedor`
--
ALTER TABLE `mensajes_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recordatorios`
--
ALTER TABLE `recordatorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
