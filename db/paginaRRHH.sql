-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-07-2016 a las 13:21:14
-- Versión del servidor: 5.5.49-0+deb8u1
-- Versión de PHP: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `PaginaMeridaGob_rrhh`
--
CREATE DATABASE IF NOT EXISTS `PaginaMeridaGob_rrhh` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `PaginaMeridaGob_rrhh`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data02`
--

CREATE TABLE IF NOT EXISTS `data02` (
`id` int(11) NOT NULL,
  `TituloNoticia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ContenidoNoticia` text COLLATE utf8_spanish_ci NOT NULL,
  `FechaPublicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `QuienPublica` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `InternaExterna` int(1) NOT NULL,
  `FotoNoticia` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Noticias de la página';

--
-- Volcado de datos para la tabla `data02`
--

INSERT INTO `data02` (`id`, `TituloNoticia`, `ContenidoNoticia`, `FechaPublicacion`, `QuienPublica`, `InternaExterna`, `FotoNoticia`) VALUES
(5, 'Noticia editada con mensaje', 'Es posible propiciar el pensar desde la misma Universidad. Es decir, enseñar a pensar para valorar la vida. También es posible generar una nueva actitud de pensar que promueva el respeto por los principios y valores universales, si enseñamos de tal forma que orientemos hacia un proceso auténtico y autónomo de pensar, si dejamos de controlar excesivamente, si permitimos que el alumno pueda pensar por cuenta propia. ¿Cómo debiéramos proceder para que realmente el estudiante piense, y que no siga eelmslvbib eihnsinfewf', '2016-06-22 05:36:00', 'Aministrador', 0, 'images3.jpeg'),
(6, 'Noticia editada 12', 'La inducción universitaria, busca comprometer al estudiante y hacerle entender que su vida ha dado un gran giro de trescientos sesenta grados con su ingreso a la Universidad. Es trascendental que el "primíparo" comprenda que sus intereses ya no son los mismos y sobre todo que debe asumir una mayor responsabilidad con sus sueños, un comportamiento más abierto con el estudio. En su nueva vida él debe pensar el mundo, pensar el país y por encima de todo pensarse él, a través de un proyecto de vida.', '2016-06-22 04:30:00', 'Aministrador', 1, 'images2.jpeg'),
(7, 'Noticia 3', 'Asistir a las cátedras en forma regular y puntual es un factor decisivo para la comprensión, la ilación, la interpretación de los conocimientos. Son también compromisos tener una participación activa, compartir ideas, aportar experiencias, realizar talleres, consultas documentarias, visitar la biblioteca; para consultar libros, revistas, artículos y demás cosas útiles en todo proceso de aprendizaje. De lo que se trata de construir un nuevo pensamiento autónomo, comprometido con la academia; capa', '2016-06-22 04:30:00', '0', 0, 'images3.jpeg'),
(10, 'Comunidad de La Asomada recibió jornada médico-asistencial', 'Con un trabajo en conjunto entre la Corporación Drolanca, la alcaldía del municipio Rangel, el Club de Motos de El Vigía, las Damas Voluntarias y la Pastoral Social de El Vigía, se realizó el pasado sábado una importante jornada médico-asistencial en la comunidad de La Asomada, parroquia San Rafael del municipio Rangel, donde habitantes de esta comunidad y comunidades cercanas se vieron beneficiadas con servicio de medicina general, odontología, farmacia, donación de ropa, juguetes y artículos e', '2016-07-11 04:00:00', '0', 0, 'operativolaasomada.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
`id` int(11) NOT NULL,
  `directorio` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `directorio`, `foto`) VALUES
(24, 'prueba de galeria', 'images3.jpeg'),
(25, 'prueba de galeria', 'images1.jpeg'),
(26, 'prueba de galeria', 'images.jpeg'),
(27, 'prueba de galeria', 'Captura de pantalla de 2016-06-06 10:09:28.png'),
(28, 'prueba 2', 'images1.jpeg'),
(29, 'prueba 2', 'images.jpeg'),
(30, 'prueba 2', 'Captura de pantalla de 2016-06-06 10:09:28.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
`id` int(11) NOT NULL,
  `nombreDIR` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fotoDIR` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `nombreDIR`, `fotoDIR`, `fecha_creacion`) VALUES
(9, 'prueba de galeria', 'images3.jpeg', '0000-00-00'),
(10, 'prueba 2', 'images1.jpeg', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `Cedula` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nombres` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Estado` int(1) NOT NULL,
  `Rol` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Usuarios que manejarán el sistema';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `Cedula`, `Nombres`, `Apellidos`, `Usuario`, `Pass`, `Estado`, `Rol`) VALUES
(1, '123456', 'Aministrador', 'Aministrador', 'admin', '300fd72d94299cf3b208e3f7b8973f7d', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `data02`
--
ALTER TABLE `data02`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data02`
--
ALTER TABLE `data02`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
