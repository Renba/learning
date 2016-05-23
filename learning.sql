SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `student` (
`user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `subject` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codename` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `grades` (
`id` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned DEFAULT NULL,
  `student_id` int(10) unsigned DEFAULT NULL,
  `grade` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `users` (`id`, `username`, `password_hash`, `auth_key`, `access_token`) VALUES
(1, 'victor', '$2y$13$96C5g51ziN3c8JLSeDBQpeaStLVallFer.rE3nsGPU6lnpcec7p0C', 'n--dTbJNvNl9126sf2bNgMLtWygbfwZh', 'F4t-i7fNuGLIGdLsbZLwsyq18YiqvRFo'),
(2, 'abner', '$2y$13$MPkF7X.fuXEVFDHgwwZvbuvkzSth2pVwkso3dB7lvFJ1EYSw9C9N6', 'lLA-koKMYz5DfsKiOScDWuNqUs_ul_KN', 'SLzGvNAisgC8I-ZaIpZ6irWwcTgI3_AE'),
(3, 'wero', '$2y$13$XnZWuDjJbnma44.7.kR91exhPPcX4fx97CosKGtU7EyQA82kRGjs2', 'rjqw8OoqZ_sz4jdnEI0oAK73GPEGOe-_', 'XdOjOwf_xnnU08ARueHEJ1w44SKAkGjm'),
(4, 'omar', '$2y$13$07mXiaLQMtSZXiFpV9LyS.8slpWoZ7Utl2xvYF61hejRmFbCFXgzu', 'FrDzod_56jF8bOOYg8JJOUZic5lx6Fcr', 'ez21Ke2f1ocgBmEqq7uqIu-UrvRLbUxj'),
(5, 'rafa', '$2y$13$.dqqQm4KipDgNbCQRM86SOI3Hwm7/yTZHXC/BlPnbvpllGFhZxkAC', 'kLunBw--HqLasJr36JBqbgzWHSCCtH0J', '0uw68urxbnlWwBeZNwnCsLQ5JHAlT8IJ'),
(6, 'sel', '$2y$13$4epatL6hq5wmBJ8SLki.P.3duwLK8cltwz0bOoHn4BtZbagtOLiTq', 'HFk_MTTbHFdPILuSDI2Ln92uNwkJSmbs', 'oIoeIh-uczFP2JwwRaSe542FxL0gSA1c'),
(7, 'ejemplo', '$2y$13$pX/7WWZ4lvNFloDQ/w2qjuuEnUoInllEhEl4c7Ld8.C.RXJ/UIvae', NULL, NULL);


INSERT INTO `student` (`user_id`, `name`) VALUES
(1, 'victor'),
(2, 'abner'),
(3, 'wero'),
(4, 'omar'),
(5, 'rafa'),
(6, 'sel'),
(7, 'ejemplo');


INSERT INTO `subject` (`name`, `codename`) VALUES
('Algebra Superior 1', 'alg_sup1'),
('Calculo 1', 'calc1'),
('Computacion 1', 'comp1'),
('Geometria Analitica', 'geo_ana'),
('Algebra Superior 2', 'alg_sup2'),
('Calculo 2', 'calc2'),
('Computacion 2', 'comp2'),
('Geometria Moderna', 'geo_mod'),
('Algebra Lineal I', 'alg_lin1'),
('Calculo III', 'calc3'),
('Analisis Numerico I', 'ana_num1'),
('Ecs. Diferenciales I', 'ecs_dif1'),
('Probabilidad', 'proba'),
('Algebra Lineal II', 'alg_lin2'),
('Analisis Numerico II', 'ana_num2'),
('Ecs. Diferenciales II', 'ecs_dif2'),
('Inf. Estadastica', 'inf_est');

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`user_id`);

ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `grades`
 ADD PRIMARY KEY (`id`), ADD KEY `grades_subject_id_foreign` (`subject_id`), ADD KEY `grades_student_id_foreign` (`student_id`);

ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;