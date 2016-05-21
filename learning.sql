-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2016 a las 18:45:33
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `learning`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
`id` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned DEFAULT NULL,
  `student_id` int(10) unsigned DEFAULT NULL,
  `grade` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grades`
--

INSERT INTO `grades` (`id`, `subject_id`, `student_id`, `grade`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 3, 2, 0),
(4, 4, 2, 0),
(5, 1, 6, 0),
(6, 11, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`user_id`, `name`) VALUES
(1, 'victor'),
(2, 'abner'),
(3, 'wero'),
(4, 'omar'),
(5, 'rafa'),
(6, 'sel'),
(7, 'ejemplo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codename` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subject`
--

INSERT INTO `subject` (`id`, `name`, `codename`) VALUES
(1, 'Algebra Superior 1', 'alg_sup1'),
(2, 'Calculo 1', 'calc1'),
(3, 'Computacion 1', 'comp1'),
(4, 'Geometria Analitica', 'geo_ana'),
(5, 'Algebra Superior 2', 'alg_sup2'),
(6, 'Calculo 2', 'calc2'),
(7, 'Computacion 2', 'comp2'),
(8, 'Geometria Moderna', 'geo_mod'),
(9, 'Algebra Lineal I', 'alg_lin1'),
(10, 'Calculo III', 'calc3'),
(11, 'Analisis Numerico I', 'ana_num1'),
(12, 'Ecs. Diferenciales I', 'ecs_dif1'),
(13, 'Probabilidad', 'proba'),
(14, 'Algebra Lineal II', 'alg_lin2'),
(15, 'Analisis Numerico II', 'ana_num2'),
(16, 'Ecs. Diferenciales II', 'ecs_dif2'),
(17, 'Inf. Estadastica', 'inf_est');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `auth_key`, `access_token`) VALUES
(1, 'victor', '$2y$13$96C5g51ziN3c8JLSeDBQpeaStLVallFer.rE3nsGPU6lnpcec7p0C', 'n--dTbJNvNl9126sf2bNgMLtWygbfwZh', 'F4t-i7fNuGLIGdLsbZLwsyq18YiqvRFo'),
(2, 'abner', '$2y$13$MPkF7X.fuXEVFDHgwwZvbuvkzSth2pVwkso3dB7lvFJ1EYSw9C9N6', 'lLA-koKMYz5DfsKiOScDWuNqUs_ul_KN', 'SLzGvNAisgC8I-ZaIpZ6irWwcTgI3_AE'),
(3, 'wero', '$2y$13$XnZWuDjJbnma44.7.kR91exhPPcX4fx97CosKGtU7EyQA82kRGjs2', 'rjqw8OoqZ_sz4jdnEI0oAK73GPEGOe-_', 'XdOjOwf_xnnU08ARueHEJ1w44SKAkGjm'),
(4, 'omar', '$2y$13$07mXiaLQMtSZXiFpV9LyS.8slpWoZ7Utl2xvYF61hejRmFbCFXgzu', 'FrDzod_56jF8bOOYg8JJOUZic5lx6Fcr', 'ez21Ke2f1ocgBmEqq7uqIu-UrvRLbUxj'),
(5, 'rafa', '$2y$13$.dqqQm4KipDgNbCQRM86SOI3Hwm7/yTZHXC/BlPnbvpllGFhZxkAC', 'kLunBw--HqLasJr36JBqbgzWHSCCtH0J', '0uw68urxbnlWwBeZNwnCsLQ5JHAlT8IJ'),
(6, 'sel', '$2y$13$4epatL6hq5wmBJ8SLki.P.3duwLK8cltwz0bOoHn4BtZbagtOLiTq', 'HFk_MTTbHFdPILuSDI2Ln92uNwkJSmbs', 'oIoeIh-uczFP2JwwRaSe542FxL0gSA1c'),
(7, 'ejemplo', '$2y$13$pX/7WWZ4lvNFloDQ/w2qjuuEnUoInllEhEl4c7Ld8.C.RXJ/UIvae', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grades`
--
ALTER TABLE `grades`
 ADD PRIMARY KEY (`id`), ADD KEY `grades_subject_id_foreign` (`subject_id`), ADD KEY `grades_student_id_foreign` (`student_id`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grades`
--
ALTER TABLE `grades`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `subject`
--
ALTER TABLE `subject`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
