-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2024 a las 11:33:25
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
-- Base de datos: `series`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `socio` bigint(20) UNSIGNED NOT NULL,
  `serie` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`socio`, `serie`, `fecha`, `texto`) VALUES
(5, 2, '2022-02-20', 'Que la fuerza te acompañe!'),
(5, 3, '2022-02-20', 'Increible Película !!'),
(5, 5, '2022-02-20', 'Esta serie siempre sorprende...'),
(6, 2, '2022-02-20', 'Mi saga fav'),
(6, 5, '2022-02-20', 'Demasiado amarillos...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lanzamientos`
--

CREATE TABLE `lanzamientos` (
  `serie` bigint(20) UNSIGNED NOT NULL,
  `plataforma` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `lanzamientos`
--

INSERT INTO `lanzamientos` (`serie`, `plataforma`, `fecha`) VALUES
(1, 1, '2022-01-28'),
(1, 3, '2024-02-15'),
(2, 2, '2024-02-16'),
(2, 3, '2022-02-16'),
(3, 1, '2022-02-09'),
(3, 2, '2024-02-16'),
(4, 3, '2022-02-01'),
(5, 1, '2022-02-16'),
(5, 2, '2022-03-15'),
(6, 2, '2024-02-02'),
(6, 3, '2022-02-10'),
(12, 18, '2024-02-07'),
(13, 1, '2024-02-16'),
(14, 2, '2024-02-16'),
(14, 19, '2024-02-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `activo` set('0','1') NOT NULL,
  `logotipo` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre`, `activo`, `logotipo`) VALUES
(1, 'Netflix', '1', '1.jpg'),
(2, 'HBO', '1', '2.png'),
(3, 'Disney +', '1', '3.jpg'),
(18, 'Prime Video', '1', '18.png'),
(19, 'Apple Tv', '1', '19.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `foto` varchar(55) NOT NULL,
  `activo` set('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `nombre`, `descripcion`, `foto`, `activo`) VALUES
(1, 'Canta 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '1.jpg', '1'),
(2, 'Star Wars', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '2.jpg', '1'),
(3, 'Al filo del mañana', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '3.jpg', '1'),
(4, 'Juego de Tronos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '4.jpg', '1'),
(5, 'Los Simpsons', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '5.jpg', '1'),
(6, 'Vikingos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '6.jpg', '1'),
(12, 'Los soprano', 'Serie sobre una familia de la mafia de NY', '12.jpg', '1'),
(13, 'Breaking Bad', 'Breaking Bad es una serie de televisión estadounidense creada y producida por Vince Gilligan. Narra la historia de Walter White (Bryan Cranston), un profesor de química con problemas económicos a quien le diagnostican un cáncer de pulmón inoperable. Para pagar su tratamiento y asegurar el futuro económico de su familia, comienza a cocinar y vender metanfetamina4? junto con Jesse Pinkman (Aaron Paul), un antiguo alumno suyo. La serie, ambientada y producida en Albuquerque (Nuevo México), se caracteriza por sus escenarios desérticos y por la tendencia en la historia de poner a sus personajes en situaciones que aparentemente no tienen salida, lo que llevó a que su creador la describa como un wéstern contemporáneo.', '13.jpg', '1'),
(14, 'Westworld', 'Los robots de un parque de diversiones futurista basado en el salvaje Oeste enloquecen y se convierten en una amenaza para los visitantes.', '14.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `nick` varchar(55) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `activo` set('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombre`, `nick`, `pass`, `activo`) VALUES
(0, 'Administrador', 'admin', '67f43efc5701784db1504e4993d7e393', '1'),
(5, 'Esteban', 'shame', '041ad97a76bbcb1ded1c022579dd130d', '1'),
(6, 'David', 'david', 'cd814a6d704446565a6bd346ff6b9d47', '1'),
(7, 'Alberto', 'Padrino', '2f9d91c41ac685028816849b8fd6eed1', '1'),
(11, 'Julio', '', 'eea98ab94d9fa56903b2e38a0004c6db', '0'),
(12, 'Julio', '', 'eea98ab94d9fa56903b2e38a0004c6db', '0'),
(13, 'Julio', 'Rom3ox', 'eea98ab94d9fa56903b2e38a0004c6db', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`socio`,`serie`),
  ADD KEY `ce_coment_serie` (`serie`);

--
-- Indices de la tabla `lanzamientos`
--
ALTER TABLE `lanzamientos`
  ADD PRIMARY KEY (`serie`,`plataforma`),
  ADD KEY `ce_lanz_plataf` (`plataforma`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `ce_coment_serie` FOREIGN KEY (`serie`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ce_coment_socios` FOREIGN KEY (`socio`) REFERENCES `socios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lanzamientos`
--
ALTER TABLE `lanzamientos`
  ADD CONSTRAINT `ce_lanz_plataf` FOREIGN KEY (`plataforma`) REFERENCES `plataformas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ce_lanz_series` FOREIGN KEY (`serie`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
