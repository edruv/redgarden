-- phpMyAdmin SQL Dump
-- version 5.1.1deb3+bionic1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-02-2022 a las 17:44:18
-- Versión del servidor: 5.7.37-0ubuntu0.18.04.1
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redgarden`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `menu_display` tinyint(1) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `user`, `email`, `password`, `role`, `menu_display`, `activo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@wozial.com', '$2a$10$4RkbKKmavc66IzEvXM6Ek.gH9H.aqsX9F4HWL75ts0ydOChZWvSKy', 1, 1, 1, '7bcbWneSubNyaE2pGrIcVCozYm8yAXH4dmNiQyaBOYKJuQxNGFQQdNWIMgQU', '2022-02-12 16:28:36', '2022-02-12 16:28:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusels`
--

CREATE TABLE `carrusels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '666'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrusels`
--

INSERT INTO `carrusels` (`id`, `titulo`, `subtitulo`, `image`, `url`, `video`, `orden`) VALUES
(1, NULL, NULL, '7zV7vZuseuWCbl5qn0H8LWIp1xEYGt.png', NULL, NULL, 0),
(2, NULL, NULL, '2AdLpwoErvT3An3OHpnl0XrLgdOceN.png', NULL, NULL, 2),
(3, NULL, NULL, '0jAcePKvAJNI5EFoIBkK2qwfvUcn9o.jpg', NULL, NULL, 1),
(6, NULL, NULL, 'PBuOpIlfjrsqnVzZKhKBPLYvi7F6DK.jpg', NULL, NULL, 666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '666'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `nombre_en`, `slug`, `portada`, `parent`, `activo`, `orden`) VALUES
(1, 'piedra de rio', 'river stone', 'river-stone', NULL, 0, 1, 666),
(2, 'tezozontle', 'tezozontle', 'tezozontle', NULL, 0, 1, 666),
(3, 'arena', 'sand', 'sand', NULL, 0, 1, 666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodspag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypalemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destinatario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destinatario2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitentepass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitentehost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitenteport` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitenteseguridad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci,
  `direccion2` text COLLATE utf8mb4_unicode_ci,
  `direccion3` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envioglobal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iva` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incremento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapa` text COLLATE utf8mb4_unicode_ci,
  `envia_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_calle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_colonia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_estado_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_cp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `title`, `description`, `prodspag`, `paypalemail`, `destinatario`, `destinatario2`, `remitente`, `remitentepass`, `remitentehost`, `remitenteport`, `remitenteseguridad`, `telefono`, `telefono2`, `telefono3`, `whatsapp`, `whatsapp2`, `whatsapp3`, `direccion`, `direccion2`, `direccion3`, `facebook`, `instagram`, `youtube`, `linkedin`, `envio`, `envioglobal`, `iva`, `incremento`, `banco`, `mapa`, `envia_key`, `envio_telefono`, `envio_email`, `envio_calle`, `envio_numero`, `envio_colonia`, `envio_ciudad`, `envio_estado`, `envio_estado_code`, `envio_cp`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'Banco: Bancomer Tarjeta: 1234567891012346 Cuenta: 123123132 Clabe: 123456789101112130', NULL, 'cb32179bf65f0154c2dacdafe5fc99e65cc56c2c3bb6e2654a7ec859d2e4bdc9', '3338253305', 'test@x123.com', 'Garibaldi', '880', 'Jesús', 'Guadalajara', NULL, 'JA', '44200', '2022-02-12 22:31:23', '2022-02-28 16:52:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entrecalles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Mexico',
  `favorito` tinyint(1) DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `alias`, `calle`, `numext`, `numint`, `entrecalles`, `colonia`, `cp`, `municipio`, `estado`, `estado_code`, `pais`, `favorito`, `user`, `created_at`, `updated_at`) VALUES
(1, 'trabajo', 'av. Lapizlazuli', '2074', '3', 'esmeralda y perla', 'victoria', '45089', 'guadalajara', 'Jalisco', 'JA', 'Mexico', NULL, 1, '2022-02-28 15:53:15', '2022-02-28 15:53:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `elemento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` tinyint(1) NOT NULL DEFAULT '0',
  `en` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '666',
  `seccion` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`id`, `elemento`, `texto`, `imagen`, `url`, `contenido`, `en`, `activo`, `orden`, `seccion`) VALUES
(1, 'nuestro compromiso', '<div>es Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora iste, quisquam esse mollitia iure, temporibus tempore a. Iste, ab harum eaque voluptatum nostrum. Minus aspernatur magni illo sequi dolor, beatae rem optio debitis vel quo, dolores vitae tenetur voluptas quas ipsum fuga sunt eos asperiores! Dignissimos cumque nihil quasi maiores.<br /><br />Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est saepe veritatis numquam eius facere perspiciatis explicabo laboriosam quo illum vitae. <label class=\"h5 text-capitalize\">&nbsp;Nuestro Compromiso</label></div>', NULL, NULL, 0, 0, 1, 666, 1),
(2, 'EN - nuestro compromiso', '<div>EN Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora iste, quisquam esse mollitia iure, temporibus tempore a. Iste, ab harum eaque voluptatum nostrum. Minus aspernatur magni illo sequi dolor, beatae rem optio debitis vel quo, dolores vitae tenetur voluptas quas ipsum fuga sunt eos asperiores! Dignissimos cumque nihil quasi maiores.<br /><br />Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est saepe veritatis numquam eius facere perspiciatis explicabo laboriosam quo illum vitae. <label class=\"h5 text-capitalize\">EN - Nuestro Compromiso</label></div>', NULL, NULL, 0, 1, 1, 666, 1),
(3, 'certificacion', '<div>es Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est saepe veritatis numquam eius facere perspiciatis explicabo laboriosam quo illum vitae.</div>', NULL, NULL, 0, 0, 1, 666, 1),
(4, 'EN - certificacion', '<div>EN Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est saepe veritatis numquam eius facere perspiciatis explicabo laboriosam quo illum vitae.</div>', NULL, NULL, 0, 1, 1, 666, 1),
(5, 'red garden', '<div>\r\n<div>es Lorem ipsum dolor sit amet, consectetur adipisicing elit. At fuga deleniti eum officiis vel natus, dolores quis blanditiis, molestias possimus minima totam molestiae atque ipsa magnam architecto cum veniam sunt consequuntur. Repellat quam alias sapiente aut. Voluptas culpa delectus voluptatum aliquam consequatur maxime sint expedita repellendus!</div>\r\n<div>Molestias totam fugiat tempore fugit deserunt commodi provident quos incidunt pariatur fuga, dolorum, ipsa, ut vero possimus dolor rerum cupiditate aspernatur?</div>\r\n<div>&nbsp;</div>\r\n<div>Voluptatum tempore et, debitis, totam voluptates optio. Facilis unde molestiae temporibus, odio omnis tempore explicabo saepe. Debitis explicabo, ut obcaecati esse, corrupti voluptates ipsa nam fuga, at qui ab facilis libero, inventore veniam.</div>\r\n</div>', NULL, NULL, 0, 0, 1, 666, 1),
(6, 'EN - red garden', '<div>en Lorem ipsum dolor sit amet, consectetur adipisicing elit. At fuga deleniti eum officiis vel natus, dolores quis blanditiis, molestias possimus minima totam molestiae atque ipsa magnam architecto cum veniam sunt consequuntur. Repellat quam alias sapiente aut. Voluptas culpa delectus voluptatum aliquam consequatur maxime sint expedita repellendus!</div>\r\n<div>Molestias totam fugiat tempore fugit deserunt commodi provident quos incidunt pariatur fuga, dolorum, ipsa, ut vero possimus dolor rerum cupiditate aspernatur?</div>\r\n<div>&nbsp;</div>\r\n<div>Voluptatum tempore et, debitis, totam voluptates optio. Facilis unde molestiae temporibus, odio omnis tempore explicabo saepe. Debitis explicabo, ut obcaecati esse, corrupti voluptates ipsa nam fuga, at qui ab facilis libero, inventore veniam.</div>', NULL, NULL, 0, 1, 1, 666, 1),
(7, 'red garden', NULL, 'tQbsSl1gqJgBu3cMVWHqU80454syEY.png', NULL, 1, 0, 1, 666, 1),
(8, 'EN - red garden', NULL, 'hsAFKIJN6wBpAKWMdulcMsUpkCPtu5.png', NULL, 1, 1, 1, 666, 1),
(9, 'tienda', '<div>ES Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est saepe veritatis numquam eius facere perspiciatis explicabo laboriosam quo illum vitae.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est saepe veritatis numquam eius facere perspiciatis explicabo laboriosam quo illum vitae. store</div>', NULL, NULL, 0, 0, 1, 666, 1),
(10, 'EN - tienda', '<div>EN Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est saepe veritatis numquam eius facere perspiciatis explicabo laboriosam quo illum vitae.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est saepe veritatis numquam eius facere perspiciatis explicabo laboriosam quo illum vitae. store</div>', NULL, NULL, 0, 1, 1, 666, 1),
(11, 'tienda', '<div>es Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>\r\n<div>Accusamus ipsam laborum repellat. Debitis fugit, consequuntur<br />praesentium fuga illum ab voluptatem iste expedita minima facere<br />at sit sapiente maxime aspernatur enim.</div>', NULL, NULL, 0, 0, 1, 666, 2),
(12, 'EN - tienda', '<div>\r\n<div>EN Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>\r\n<div>Accusamus ipsam laborum repellat. Debitis fugit, consequuntur<br />praesentium fuga illum ab voluptatem iste expedita minima facere<br />at sit sapiente maxime aspernatur enim.</div>\r\n</div>', NULL, NULL, 0, 1, 1, 666, 2),
(13, 'nosotros', '<div>es - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat asperiores quia sed maiores aspernatur unde numquam alias quisquam voluptates magnam incidunt sint est consequuntur provident, nesciunt ab assumenda dolor quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, tempore nulla iusto illo rem velit laudantium libero. Facilis eaque quam assumenda dolorum. Deleniti veniam hic similique laborum a delectus quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat asperiores quia sed maiores aspernatur unde numquam alias quisquam voluptates magnam incidunt sint est consequuntur provident, nesciunt ab assumenda dolor quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, tempore nulla iusto illo rem velit laudantium libero. Facilis eaque quam assumenda dolorum. Deleniti veniam hic similique laborum a delectus quia.</div>', NULL, NULL, 0, 0, 1, 666, 3),
(14, 'EN - nosotros', '<div>en - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat asperiores quia sed maiores aspernatur unde numquam alias quisquam voluptates magnam incidunt sint est consequuntur provident, nesciunt ab assumenda dolor quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, tempore nulla iusto illo rem velit laudantium libero. Facilis eaque quam assumenda dolorum. Deleniti veniam hic similique laborum a delectus quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat asperiores quia sed maiores aspernatur unde numquam alias quisquam voluptates magnam incidunt sint est consequuntur provident, nesciunt ab assumenda dolor quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, tempore nulla iusto illo rem velit laudantium libero. Facilis eaque quam assumenda dolorum. Deleniti veniam hic similique laborum a delectus quia.</div>', NULL, NULL, 0, 1, 1, 666, 3),
(15, 'mision', '<div>es - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. Mision</div>', NULL, NULL, 0, 0, 1, 666, 3),
(16, 'EN - mision', '<div>en - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. Mision</div>', NULL, NULL, 0, 1, 1, 666, 3),
(17, 'vision', '<div>es - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. VISI&Oacute;N</div>', NULL, NULL, 0, 0, 1, 666, 3),
(18, 'EN - vision', '<div>en - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. VISI&Oacute;N</div>', NULL, NULL, 0, 1, 1, 666, 3),
(19, 'valores', '<div>es - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident.</div>', NULL, NULL, 0, 0, 1, 666, 3),
(20, 'EN - valores', '<div>en - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum dolorum ea nulla quis iste soluta rem aperiam facere, maxime quasi, consequuntur dignissimos doloribus similique odio tempora perspiciatis inventore provident.</div>', NULL, NULL, 0, 1, 1, 666, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `code_2_digits` varchar(191) DEFAULT NULL,
  `code_3_digits` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `name`, `code_2_digits`, `code_3_digits`) VALUES
(1, 'Aguascalientes', 'AG', 'AGS'),
(2, 'Baja California', 'BC', 'BCN'),
(3, 'Baja California Sur', 'BS', 'BCS'),
(4, 'Campeche', 'CM', 'CAM'),
(5, 'Chiapas', 'CS', 'CHP'),
(6, 'Chihuahua', 'CH', 'CHH'),
(7, 'Ciudad de México', 'CX', 'CMX'),
(8, 'Coahuila', 'CO', 'COA'),
(9, 'Colima', 'CL', 'COL'),
(10, 'Distrito Federal', 'DF', 'DIF'),
(11, 'Durango', 'DG', 'DGO'),
(12, 'Guanajuato', 'GT', 'GTO'),
(13, 'Guerrero', 'GR', 'GRO'),
(14, 'Hidalgo', 'HG', 'HGO'),
(15, 'Jalisco', 'JA', 'JAL'),
(16, 'México', 'EM', 'MEX'),
(17, 'Michoacán', 'MI', 'MIC'),
(18, 'Morelos', 'MO', 'MOR'),
(19, 'Nayarit', 'NA', 'NAY'),
(20, 'Nuevo León', 'NL', 'NLE'),
(21, 'Oaxaca', 'OA', 'OAX'),
(22, 'Puebla', 'PU', 'PUE'),
(23, 'Querétaro', 'QT', 'QRO'),
(24, 'Quintana Roo', 'QR', 'ROO'),
(25, 'San Luis Potosí', 'SL', 'SLP'),
(26, 'Sinaloa', 'SI', 'SIN'),
(27, 'Sonora', 'SO', 'SON'),
(28, 'Tabasco', 'TB', 'TAB'),
(29, 'Tamaulipas', 'TM', 'TAM'),
(30, 'Tlaxcala', 'TL', 'TLA'),
(31, 'Veracruz', 'VE', 'VER'),
(32, 'Yucatán', 'YU', 'YUC'),
(33, 'Zacatecas', 'ZA', 'ZAC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `rfc`, `mail`, `razon_social`, `calle`, `numext`, `numint`, `colonia`, `cp`, `municipio`, `estado`, `user`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respuesta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '666',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_12_153249_create_domicilios_table', 1),
(5, '2020_10_13_163806_create_admins_table', 1),
(6, '2020_10_14_181530_create_configuracions_table', 1),
(7, '2020_12_08_170359_create_carrusels_table', 1),
(8, '2020_12_09_193424_create_politicas_table', 1),
(9, '2020_12_16_000636_create_faqs_table', 1),
(10, '2021_01_21_215846_create_facturas_table', 1),
(11, '2021_01_25_184932_create_productos_table', 1),
(12, '2021_01_25_200200_create_productos_photos_table', 1),
(13, '2021_01_27_192446_create_pedidos_table', 1),
(14, '2021_01_27_212728_create_pedido_detalles_table', 1),
(15, '2021_02_02_175759_create_seccions_table', 1),
(16, '2021_02_02_175823_create_elementos_table', 1),
(17, '2021_02_10_194801_create_payments_table', 1),
(18, '2021_10_27_064531_create_categorias_table', 1),
(19, '2021_12_13_073239_create_producto_relacions_table', 1),
(20, '2022_02_14_090226_create_producto_sizes_table', 1),
(21, '2022_02_14_090236_create_producto_presentacions_table', 1),
(22, '2022_02_14_114008_create_producto_variante_table', 1),
(23, '2022_02_14_120811_create_servicios_table', 1),
(24, '2022_02_14_120847_create_servicios_photos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` int(11) DEFAULT NULL,
  `guia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkguia` text COLLATE utf8mb4_unicode_ci,
  `domicilio` bigint(20) UNSIGNED NOT NULL,
  `factura` tinyint(1) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` double(9,2) NOT NULL,
  `iva` double(9,2) NOT NULL,
  `total` double(9,2) DEFAULT NULL,
  `envio` double(9,2) DEFAULT NULL,
  `comprobante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelado` tinyint(1) DEFAULT '0',
  `usuario` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `envia_resp` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `uid`, `estatus`, `guia`, `linkguia`, `domicilio`, `factura`, `cantidad`, `importe`, `iva`, `total`, `envio`, `comprobante`, `cupon`, `cancelado`, `usuario`, `data`, `envia_resp`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'd709eb10-a94b-4871-9918-f7081cac4c16', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, NULL, 226.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', NULL, NULL, '2022-02-28 16:52:46', '2022-02-28 16:52:46'),
(2, '30c40c01-1051-47de-a77c-0f8cc4924287', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, NULL, 226.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', NULL, NULL, '2022-02-28 16:53:03', '2022-02-28 16:53:03'),
(3, '367d79f9-3507-48de-b58a-beddd5f2112a', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, NULL, 226.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', NULL, NULL, '2022-02-28 16:53:20', '2022-02-28 16:53:20'),
(4, '0d76a8ac-9d3f-45d2-b6e7-063efe19b9ef', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, NULL, 226.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', NULL, NULL, '2022-02-28 16:54:48', '2022-02-28 16:54:48'),
(5, '95c9b65b-4113-41b0-9afa-087f7233d2a6', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, NULL, 226.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', NULL, NULL, '2022-02-28 16:55:08', '2022-02-28 16:55:08'),
(6, '49ac4d0f-b1a1-4b2f-8c7b-389c1815b5e8', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, NULL, 226.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', NULL, NULL, '2022-02-28 16:57:35', '2022-02-28 16:57:35'),
(7, 'ef736fde-1cf3-423f-8379-330c541cdda5', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, NULL, 226.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', NULL, NULL, '2022-02-28 16:58:58', '2022-02-28 16:58:58'),
(8, 'c432510b-9164-4322-8da6-92ddccfcba4c', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, 726.00, 226.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', '{\"code\":400,\"message\":\"Unmanaged exception: ErrorException\",\"description\":\"Undefined offset: -1\",\"location\":\"\\/app\\/vendor\\/illuminate\\/collections\\/Collection.php 1641\",\"reference\":\"ep-621cab5ee5df4\"}', NULL, '2022-02-28 17:00:45', '2022-02-28 17:00:47'),
(9, '38197300-abb1-48f8-8f58-76e7afcce483', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, 851.00, 351.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":1,\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', '{\"meta\":\"generate\",\"data\":[{\"carrier\":\"fedex\",\"service\":\"ground\",\"shipmentId\":18348,\"trackingNumber\":\"794612785479\",\"trackUrl\":\"https:\\/\\/test.envia.com\\/rastreo?label=794612785479&cntry_code=mx\",\"label\":\"https:\\/\\/s3.us-east-2.amazonaws.com\\/envia-staging\\/uploads\\/fedex\\/794612785479444621cadf9e7528.pdf\",\"additionalFiles\":[],\"totalPrice\":351,\"currentBalance\":3857,\"currency\":\"MXN\"}]}', NULL, '2022-02-28 17:11:50', '2022-02-28 17:11:57'),
(10, 'eab388d5-28b4-42bf-89fc-9a81b7e5979c', NULL, NULL, NULL, 1, NULL, 1, 500.00, 0.00, 851.00, 351.00, NULL, NULL, 0, 1, '{\"1\":{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":1,\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}}', '{\"meta\":\"generate\",\"data\":[{\"carrier\":\"fedex\",\"service\":\"ground\",\"shipmentId\":18349,\"trackingNumber\":\"794612785711\",\"trackUrl\":\"https:\\/\\/test.envia.com\\/rastreo?label=794612785711&cntry_code=mx\",\"label\":\"https:\\/\\/s3.us-east-2.amazonaws.com\\/envia-staging\\/uploads\\/fedex\\/794612785711444621cae3c4175a.pdf\",\"additionalFiles\":[],\"totalPrice\":351,\"currentBalance\":3506,\"currency\":\"MXN\"}]}', NULL, '2022-02-28 17:12:57', '2022-02-28 17:13:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalles`
--

CREATE TABLE `pedido_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(9,2) NOT NULL,
  `importe` double(9,2) NOT NULL,
  `total` double(9,2) DEFAULT NULL,
  `pedido` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `color` bigint(20) UNSIGNED DEFAULT NULL,
  `log` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_detalles`
--

INSERT INTO `pedido_detalles` (`id`, `cantidad`, `precio`, `importe`, `total`, `pedido`, `producto`, `color`, `log`, `created_at`, `updated_at`) VALUES
(1, 1, 500.00, 500.00, 500.00, 7, 1, NULL, '{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}', '2022-02-28 16:58:58', '2022-02-28 16:58:58'),
(2, 1, 500.00, 500.00, 500.00, 8, 1, NULL, '{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":\"1\",\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}', '2022-02-28 17:00:45', '2022-02-28 17:00:45'),
(3, 1, 500.00, 500.00, 500.00, 9, 1, NULL, '{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":1,\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}', '2022-02-28 17:11:50', '2022-02-28 17:11:50'),
(4, 1, 500.00, 500.00, 500.00, 10, 1, NULL, '{\"id\":1,\"name\":\"piedra de rio._en\",\"price\":500,\"quantity\":1,\"attributes\":{\"producto\":{\"id\":1,\"nombre\":\"piedra de rio\",\"nombre_en\":\"river stone\",\"descripcion\":\"<div>Piedra decorativa mezcla de varios colores de origen natural.<br \\/>Disminuye el costo de mantenimiento de jardines. 22<\\/div>\",\"descripcion_en\":\"<div>Decorative stone mixture of various colors of natural origin.<br \\/>Reduces the cost of garden maintenance. 22<\\/div>\",\"categoria\":1,\"inicio\":1,\"activo\":1,\"orden\":666,\"created_at\":\"2022-02-14 16:45:49\",\"updated_at\":\"2022-02-14 20:18:59\"},\"size\":{\"id\":1,\"tamanio\":\"Chica: 1\\/2 Pulgada\",\"tamanio_en\":\"Small: 1\\/2 Inch\"},\"presentacion\":{\"id\":2,\"tamanio\":\"Bolsa de 20 kg\",\"tamanio_en\":\"20 kg bag\"}},\"conditions\":[],\"associatedModel\":{\"id\":1,\"producto\":1,\"size\":1,\"presentacion\":2,\"stock\":\"10\",\"precio\":\"500\",\"descuento\":null,\"activo\":1,\"orden\":666,\"tipo_envio\":\"box\",\"peso\":\"20\",\"largo\":\"10\",\"ancho\":\"60\",\"alto\":\"20\"}}', '2022-02-28 17:12:57', '2022-02-28 17:12:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `politicas`
--

CREATE TABLE `politicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `descripcion_en` text COLLATE utf8mb4_unicode_ci,
  `categoria` int(11) NOT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '666',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `nombre_en`, `descripcion`, `descripcion_en`, `categoria`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'piedra de rio', 'river stone', '<div>Piedra decorativa mezcla de varios colores de origen natural.<br />Disminuye el costo de mantenimiento de jardines. 22</div>', '<div>Decorative stone mixture of various colors of natural origin.<br />Reduces the cost of garden maintenance. 22</div>', 1, 1, 1, 666, '2022-02-14 22:45:49', '2022-02-15 02:18:59'),
(2, 'arena roja', 'red sand', '<div>arena roja</div>', '<div>RED SAND</div>', 3, 1, 1, 666, '2022-02-15 02:15:55', '2022-02-15 02:19:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_photos`
--

CREATE TABLE `productos_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '666'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos_photos`
--

INSERT INTO `productos_photos` (`id`, `producto`, `titulo`, `image`, `orden`) VALUES
(1, 1, NULL, '8FukYsWcJJMckIuMO393gs1QmOvg9p.png', 666),
(2, 1, NULL, 'ezJECeTCgFbnv0dCTHiaPXjVsH7Tp8.png', 666),
(3, 2, NULL, 'KiqfDgbgQM56vR36lmCRjktp1SKB2v.png', 666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_presentacions`
--

CREATE TABLE `producto_presentacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamanio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanio_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_presentacions`
--

INSERT INTO `producto_presentacions` (`id`, `tamanio`, `tamanio_en`) VALUES
(1, 'Bolsa de 10 kg', '10 kg bag'),
(2, 'Bolsa de 20 kg', '20 kg bag');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_relacions`
--

CREATE TABLE `producto_relacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `otroProducto` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_relacions`
--

INSERT INTO `producto_relacions` (`id`, `producto`, `otroProducto`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_sizes`
--

CREATE TABLE `producto_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamanio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanio_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_sizes`
--

INSERT INTO `producto_sizes` (`id`, `tamanio`, `tamanio_en`) VALUES
(1, 'Chica: 1/2 Pulgada', 'Small: 1/2 Inch'),
(2, 'Mediana: 3/4 Pulgada', 'Medium: 3/4 Inch'),
(3, 'Grande: 1 1/2 Pulgada', 'Large: 1 1/2 Inch'),
(4, 'Bolsa de arena', 'Sand Bag');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_variantes`
--

CREATE TABLE `producto_variantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `presentacion` bigint(20) UNSIGNED NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descuento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '666',
  `tipo_envio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `largo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ancho` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_variantes`
--

INSERT INTO `producto_variantes` (`id`, `producto`, `size`, `presentacion`, `stock`, `precio`, `descuento`, `activo`, `orden`, `tipo_envio`, `peso`, `largo`, `ancho`, `alto`) VALUES
(1, 1, 1, 2, '10', '500', NULL, 1, 666, 'box', '20', '10', '60', '20'),
(2, 1, 1, 1, '10', '300', NULL, 1, 666, 'box', '20', '10', '60', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccions`
--

CREATE TABLE `seccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seccions`
--

INSERT INTO `seccions` (`id`, `seccion`, `icon`, `slug`) VALUES
(1, 'inicio', NULL, 'index'),
(2, 'tienda', NULL, 'store'),
(3, 'nosotros', NULL, 'aboutus'),
(4, 'contacto', NULL, 'contact');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `descripcion_en` text COLLATE utf8mb4_unicode_ci,
  `inicio` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '666',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `nombre_en`, `descripcion`, `descripcion_en`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'renta de equipo', 'equipment rent', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! es</div>', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! en</div>', 1, 1, 666, '2022-02-15 00:23:19', '2022-02-15 00:49:37'),
(3, 'renta de equipo 2', 'equipment rent 2', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! es 22</div>', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! en 22</div>', 0, 1, 666, '2022-02-15 00:40:11', '2022-02-15 01:18:19'),
(4, 'renta de equipo 3', 'equipment rent 3', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! es</div>', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam minima illo possimus ex officiis aperiam quisquam aut dolorum similique dolorem minus, magnam quam tempore nesciunt aspernatur nulla vel sapiente! en</div>', 1, 1, 666, '2022-02-15 00:48:40', '2022-02-15 00:49:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_photos`
--

CREATE TABLE `servicios_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `servicio` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '666'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `role` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `email_verified_at`, `telefono`, `facebook`, `empresa`, `avatar`, `rfc`, `activo`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'yahir', 'lopez', '', 'yahir@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$ixFvI1ajnMzpjT8EhK0KsOzC/I8X5prS5vUZLKCsh2eOf7zllQPim', NULL, '2022-02-28 12:49:39', '2022-02-28 17:10:39', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_user_unique` (`user`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indices de la tabla `carrusels`
--
ALTER TABLE `carrusels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_slug_unique` (`slug`);

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domicilios_user_foreign` (`user`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elementos_seccion_foreign` (`seccion`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `facturas_rfc_unique` (`rfc`),
  ADD UNIQUE KEY `facturas_mail_unique` (`mail`),
  ADD KEY `facturas_user_foreign` (`user`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_usuario_foreign` (`usuario`);

--
-- Indices de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_detalles_pedido_foreign` (`pedido`),
  ADD KEY `pedido_detalles_producto_foreign` (`producto`);

--
-- Indices de la tabla `politicas`
--
ALTER TABLE `politicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_photos_producto_foreign` (`producto`);

--
-- Indices de la tabla `producto_presentacions`
--
ALTER TABLE `producto_presentacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_relacions_producto_foreign` (`producto`),
  ADD KEY `producto_relacions_otroproducto_foreign` (`otroProducto`);

--
-- Indices de la tabla `producto_sizes`
--
ALTER TABLE `producto_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_variantes`
--
ALTER TABLE `producto_variantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_variantes_producto_foreign` (`producto`),
  ADD KEY `producto_variantes_size_foreign` (`size`),
  ADD KEY `producto_variantes_presentacion_foreign` (`presentacion`);

--
-- Indices de la tabla `seccions`
--
ALTER TABLE `seccions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seccions_slug_unique` (`slug`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios_photos`
--
ALTER TABLE `servicios_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicios_photos_servicio_foreign` (`servicio`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carrusels`
--
ALTER TABLE `carrusels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `politicas`
--
ALTER TABLE `politicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto_presentacions`
--
ALTER TABLE `producto_presentacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto_sizes`
--
ALTER TABLE `producto_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto_variantes`
--
ALTER TABLE `producto_variantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicios_photos`
--
ALTER TABLE `servicios_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `domicilios_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_seccion_foreign` FOREIGN KEY (`seccion`) REFERENCES `seccions` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_usuario_foreign` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  ADD CONSTRAINT `pedido_detalles_pedido_foreign` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_detalles_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  ADD CONSTRAINT `productos_photos_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  ADD CONSTRAINT `producto_relacions_otroproducto_foreign` FOREIGN KEY (`otroProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_relacions_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `producto_variantes`
--
ALTER TABLE `producto_variantes`
  ADD CONSTRAINT `producto_variantes_presentacion_foreign` FOREIGN KEY (`presentacion`) REFERENCES `producto_presentacions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_variantes_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_variantes_size_foreign` FOREIGN KEY (`size`) REFERENCES `producto_sizes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `servicios_photos`
--
ALTER TABLE `servicios_photos`
  ADD CONSTRAINT `servicios_photos_servicio_foreign` FOREIGN KEY (`servicio`) REFERENCES `servicios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
