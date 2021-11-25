-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 04:38:20
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_libros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`) VALUES
(6, 'Garcia Marquez Gabriel'),
(8, 'Rowling J. K.'),
(9, 'Stephen King'),
(10, 'Arthur Conan Doyle'),
(11, 'Truman Capote');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `detalle` varchar(255) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `fk_id_libro` int(11) NOT NULL,
  `fk_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `detalle`, `calificacion`, `fk_id_libro`, `fk_id_user`) VALUES
(1, 'Muy bueno el libro, recomendado', 5, 4, 2),
(23, 'Muy bueno este libro de harry', 4, 14, 2),
(24, 'Que grande garcia', 3, 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `fecha_publicacion` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fk_id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `fecha_publicacion`, `imagen`, `fk_id_autor`) VALUES
(1, 'El escandalo del siglo', 2018, '../img/libros/6196dd1502ea5.jpg', 6),
(4, 'Crónica de una muerte anunciada', 2020, './img/libros/6196e65de4839.jpg', 6),
(5, 'Cien años de soledad', 1967, '', 6),
(14, 'Harry Potter Y La Piedra Filosofal', 1997, '', 8),
(15, 'Harry Potter y la cámara secreta', 1998, '', 8),
(16, 'Harry Potter y el prisionero de Azkaban', 1999, '', 8),
(17, 'Las aventuras de Sherlock Holmes', 1891, '', 10),
(18, 'Las memorias de Sherlock Holmes', 1892, '', 10),
(19, 'El sabueso de los Baskerville', 1901, '', 10),
(20, 'Carrie', 1974, '', 9),
(21, 'El misterio de Salem\'s Lot', 1975, '', 9),
(22, 'El resplandor', 1977, '', 9),
(23, 'Otras voces, otros ámbitos', 1948, '', 11),
(24, 'Árbol de noche y otras historias', 1949, '', 11),
(25, 'El arpa de hierba', 1951, '', 11),
(28, 'Desayuno en Tiffany\'s', 1958, './img/libros/6196e41437240.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `isAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email`, `contraseña`, `isAdmin`) VALUES
(2, 'demo@gmail.com', '$2y$10$TDvqABccrSwlApJ0ZYnBAeYZBv5NMZK6nG.d/YkTZkwrKCT5EltTG', 1),
(6, 'juan', '$2y$10$pUNBPPjxuLy4qeYk1yWvCeLNNbT.91u0EbudmHphx09ZfOwI23t/6', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_libro` (`fk_id_libro`),
  ADD KEY `fk_id_user` (`fk_id_user`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_autor` (`fk_id_autor`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`fk_id_libro`) REFERENCES `libro` (`id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`fk_id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`fk_id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
