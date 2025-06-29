-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2025 a las 05:40:40
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
-- Base de datos: `ci4_crud_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `anio` year(4) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `destacado` tinyint(1) DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `titulo`, `autor`, `carrera`, `descripcion`, `anio`, `imagen`, `pdf`, `destacado`, `id_user`, `id_tipo`) VALUES
(1, 'Sistema de Gestión Escolar', 'Laura Mendoza', 'Ingeniería Informática', 'Este proyecto trata sobre...', '2024', 'proyecto1.jpg', 'proyecto1.pdf', 1, NULL, NULL),
(2, 'Navegación Inteligente', 'Carlos Díaz', 'Ingeniería Marítima', NULL, '2023', 'proyecto2.jpg', 'proyecto2.pdf', 1, NULL, NULL),
(3, 'Plataforma E-learning', 'Ana Torres', 'Ingeniería Informática', NULL, '2024', 'proyecto3.jpg', 'proyecto3.pdf\r\n', 1, NULL, NULL),
(4, 'Desarrollo de Aplicación Web para Gestión de Inventarios', 'Juan Pérez', 'Ingeniería Informática', NULL, '2024', 'proyecto4.jpg', 'proyecto4.pdf', 0, NULL, NULL),
(5, 'Estudio de Impacto Ambiental en el Puerto de la Ciudad', 'María García', 'Ingeniería Marítima', NULL, '2023', 'proyecto5.jpg', NULL, 0, NULL, NULL),
(6, 'Análisis de Sostenibilidad en el Uso del Agua en Regiones Áridas', 'Carlos Sánchez', 'Ingeniería Ambiental', NULL, '2022', 'proyecto6.jpg', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `Rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_archivo`
--

CREATE TABLE `tipos_archivo` (
  `id` int(11) NOT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_archivo`
--

INSERT INTO `tipos_archivo` (`id`, `extension`, `descripcion`) VALUES
(1, 'pdf', 'Documento PDF'),
(2, 'docx', 'Word'),
(3, 'txt', 'Texto plano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `codigo`, `contraseña`, `id_rol`) VALUES
(1, 'admin', 'admin', 1),
(2, 'Estudiante', 'estudiante', 2),
(3, 'jose', '12345678', 2),
(4, 'alarcon', '12345678', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_archivo`
--
ALTER TABLE `tipos_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `extension` (`extension`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_archivo`
--
ALTER TABLE `tipos_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipos_archivo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyectos_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
