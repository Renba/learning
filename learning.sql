-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2016 a las 10:45:24
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `learning`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `grade` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `name`) VALUES
(1, 'Abner Collí');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codename` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `codename`) VALUES
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
<<<<<<< Updated upstream

--
-- Índices para tablas volcadas
--
=======
>>>>>>> Stashed changes

--
-- Indices de la tabla `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_subject_id_foreign` (`subject_id`),
  ADD KEY `grades_student_id_foreign` (`student_id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
