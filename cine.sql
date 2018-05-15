-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2018 a las 05:59:55
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE `asiento` (
  `num_asiento` int(11) NOT NULL,
  `fila` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pase`
--

CREATE TABLE `pase` (
  `id_entrada` int(11) NOT NULL,
  `asiento` int(11) NOT NULL,
  `sesion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `duracion` int(11) NOT NULL,
  `sipnopsis` text NOT NULL,
  `img_pelicula` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `titulo`, `tipo`, `duracion`, `sipnopsis`, `img_pelicula`) VALUES
(1, 'Pelicula-1-Ejemplo', 'Comedia - Drama - Romance ', 120, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia aliquet nunc. Aenean sollicitudin diam ultricies fringilla mattis. Aenean suscipit sed enim sed imperdiet. Nulla vel augue ex. Maecenas non consequat libero. Aliquam vel sem urna. Vestibulum cursus semper ullamcorper. Sed varius, orci non scelerisque auctor, nisl est maximus mauris, eu pulvinar ligula sem non libero. Duis lacinia blandit condimentum. Aenean a nisi dolor. Vestibulum ac ex ornare quam tincidunt cursus. Sed cursus pretium velit, ac consectetur urna facilisis quis. Vivamus ac varius lacus, ut suscipit sapien. Donec in nisi bibendum, consectetur sem ac, cursus mauris. Cras malesuada egestas magna, a eleifend nisi finibus ac.\r\n\r\nMauris aliquet venenatis risus in accumsan. Vivamus ac mollis dolor. Suspendisse quis arcu eu enim auctor luctus. Mauris sodales nisl id velit pretium, at cursus velit sagittis. Praesent fringilla vehicula venenatis. Etiam vel ipsum condimentum, fermentum risus ut, consequat arcu. Vivamus nec tempor lacus. Donec at venenatis augue. Phasellus nec dignissim tellus. Curabitur at egestas ipsum. Fusce ornare sapien in ligula porta porta. Nam ullamcorper ligula sit amet semper iaculis. In iaculis imperdiet semper. Vestibulum pellentesque metus vel tempor finibus. Vestibulum faucibus purus ante.\r\n\r\nDonec sed ultrices tortor. Vivamus erat nisi, maximus a faucibus id, maximus eget quam. Morbi dictum, metus et volutpat malesuada, dui leo ultrices nibh, vitae dignissim enim metus at nisl. Sed eu nunc orci. Duis iaculis interdum mauris, ac bibendum odio vestibulum nec. Vivamus rutrum erat et dolor faucibus, posuere laoreet nibh malesuada. Phasellus ultrices felis nec mauris dapibus, ut ultricies risus aliquam. Curabitur at augue eleifend lacus rutrum convallis. Donec posuere laoreet molestie. Donec consequat nibh metus, sed condimentum est placerat nec. Sed vulputate eros eu urna vestibulum commodo.\r\n\r\nNunc dapibus malesuada ex, vitae sagittis massa venenatis non. Cras varius tortor ut consectetur egestas. In hac habitasse platea dictumst. Praesent convallis, tortor at eleifend iaculis, nisi lacus placerat lacus, vel cursus augue eros ut mi. Vestibulum at leo neque. Fusce consectetur condimentum pretium. Vivamus quis neque arcu. Sed sed feugiat ante, sed finibus orci.\r\n\r\nMaecenas aliquet tellus diam, non ultrices eros aliquet rhoncus. Vestibulum ut ex in leo commodo feugiat. Morbi et hendrerit sapien. Donec non nulla fermentum, eleifend arcu ultrices, scelerisque ex. Fusce laoreet arcu ac maximus auctor. Sed dignissim ac massa at euismod. Morbi purus justo, venenatis id sem ut, gravida malesuada lectus. Aliquam erat volutpat. Sed ut suscipit ex. Donec pellentesque quis lorem a tristique. Donec mi sem, viverra quis mi eu, hendrerit commodo elit. Vestibulum pellentesque est quis orci placerat ultrices. Fusce finibus placerat nisi, et facilisis est tempus quis.', './assets/images/JPG/avengers.jpg'),
(2, 'Pelicula-2-Ejemplo', 'Comedia - Drama - Romance ', 140, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia aliquet nunc. Aenean sollicitudin diam ultricies fringilla mattis. Aenean suscipit sed enim sed imperdiet. Nulla vel augue ex. Maecenas non consequat libero. Aliquam vel sem urna. Vestibulum cursus semper ullamcorper. Sed varius, orci non scelerisque auctor, nisl est maximus mauris, eu pulvinar ligula sem non libero. Duis lacinia blandit condimentum. Aenean a nisi dolor. Vestibulum ac ex ornare quam tincidunt cursus. Sed cursus pretium velit, ac consectetur urna facilisis quis. Vivamus ac varius lacus, ut suscipit sapien. Donec in nisi bibendum, consectetur sem ac, cursus mauris. Cras malesuada egestas magna, a eleifend nisi finibus ac.\r\n\r\nMauris aliquet venenatis risus in accumsan. Vivamus ac mollis dolor. Suspendisse quis arcu eu enim auctor luctus. Mauris sodales nisl id velit pretium, at cursus velit sagittis. Praesent fringilla vehicula venenatis. Etiam vel ipsum condimentum, fermentum risus ut, consequat arcu. Vivamus nec tempor lacus. Donec at venenatis augue. Phasellus nec dignissim tellus. Curabitur at egestas ipsum. Fusce ornare sapien in ligula porta porta. Nam ullamcorper ligula sit amet semper iaculis. In iaculis imperdiet semper. Vestibulum pellentesque metus vel tempor finibus. Vestibulum faucibus purus ante.\r\n\r\nDonec sed ultrices tortor. Vivamus erat nisi, maximus a faucibus id, maximus eget quam. Morbi dictum, metus et volutpat malesuada, dui leo ultrices nibh, vitae dignissim enim metus at nisl. Sed eu nunc orci. Duis iaculis interdum mauris, ac bibendum odio vestibulum nec. Vivamus rutrum erat et dolor faucibus, posuere laoreet nibh malesuada. Phasellus ultrices felis nec mauris dapibus, ut ultricies risus aliquam. Curabitur at augue eleifend lacus rutrum convallis. Donec posuere laoreet molestie. Donec consequat nibh metus, sed condimentum est placerat nec. Sed vulputate eros eu urna vestibulum commodo.\r\n\r\nNunc dapibus malesuada ex, vitae sagittis massa venenatis non. Cras varius tortor ut consectetur egestas. In hac habitasse platea dictumst. Praesent convallis, tortor at eleifend iaculis, nisi lacus placerat lacus, vel cursus augue eros ut mi. Vestibulum at leo neque. Fusce consectetur condimentum pretium. Vivamus quis neque arcu. Sed sed feugiat ante, sed finibus orci.\r\n\r\nMaecenas aliquet tellus diam, non ultrices eros aliquet rhoncus. Vestibulum ut ex in leo commodo feugiat. Morbi et hendrerit sapien. Donec non nulla fermentum, eleifend arcu ultrices, scelerisque ex. Fusce laoreet arcu ac maximus auctor. Sed dignissim ac massa at euismod. Morbi purus justo, venenatis id sem ut, gravida malesuada lectus. Aliquam erat volutpat. Sed ut suscipit ex. Donec pellentesque quis lorem a tristique. Donec mi sem, viverra quis mi eu, hendrerit commodo elit. Vestibulum pellentesque est quis orci placerat ultrices. Fusce finibus placerat nisi, et facilisis est tempus quis.', './assets/images/JPG/HanSolo.jpg'),
(3, 'Pelicula-3-Ejemplo', 'Comedia - Drama - Romance ', 140, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia aliquet nunc. Aenean sollicitudin diam ultricies fringilla mattis. Aenean suscipit sed enim sed imperdiet. Nulla vel augue ex. Maecenas non consequat libero. Aliquam vel sem urna. Vestibulum cursus semper ullamcorper. Sed varius, orci non scelerisque auctor, nisl est maximus mauris, eu pulvinar ligula sem non libero. Duis lacinia blandit condimentum. Aenean a nisi dolor. Vestibulum ac ex ornare quam tincidunt cursus. Sed cursus pretium velit, ac consectetur urna facilisis quis. Vivamus ac varius lacus, ut suscipit sapien. Donec in nisi bibendum, consectetur sem ac, cursus mauris. Cras malesuada egestas magna, a eleifend nisi finibus ac.\r\n\r\nMauris aliquet venenatis risus in accumsan. Vivamus ac mollis dolor. Suspendisse quis arcu eu enim auctor luctus. Mauris sodales nisl id velit pretium, at cursus velit sagittis. Praesent fringilla vehicula venenatis. Etiam vel ipsum condimentum, fermentum risus ut, consequat arcu. Vivamus nec tempor lacus. Donec at venenatis augue. Phasellus nec dignissim tellus. Curabitur at egestas ipsum. Fusce ornare sapien in ligula porta porta. Nam ullamcorper ligula sit amet semper iaculis. In iaculis imperdiet semper. Vestibulum pellentesque metus vel tempor finibus. Vestibulum faucibus purus ante.\r\n\r\nDonec sed ultrices tortor. Vivamus erat nisi, maximus a faucibus id, maximus eget quam. Morbi dictum, metus et volutpat malesuada, dui leo ultrices nibh, vitae dignissim enim metus at nisl. Sed eu nunc orci. Duis iaculis interdum mauris, ac bibendum odio vestibulum nec. Vivamus rutrum erat et dolor faucibus, posuere laoreet nibh malesuada. Phasellus ultrices felis nec mauris dapibus, ut ultricies risus aliquam. Curabitur at augue eleifend lacus rutrum convallis. Donec posuere laoreet molestie. Donec consequat nibh metus, sed condimentum est placerat nec. Sed vulputate eros eu urna vestibulum commodo.\r\n\r\nNunc dapibus malesuada ex, vitae sagittis massa venenatis non. Cras varius tortor ut consectetur egestas. In hac habitasse platea dictumst. Praesent convallis, tortor at eleifend iaculis, nisi lacus placerat lacus, vel cursus augue eros ut mi. Vestibulum at leo neque. Fusce consectetur condimentum pretium. Vivamus quis neque arcu. Sed sed feugiat ante, sed finibus orci.\r\n\r\nMaecenas aliquet tellus diam, non ultrices eros aliquet rhoncus. Vestibulum ut ex in leo commodo feugiat. Morbi et hendrerit sapien. Donec non nulla fermentum, eleifend arcu ultrices, scelerisque ex. Fusce laoreet arcu ac maximus auctor. Sed dignissim ac massa at euismod. Morbi purus justo, venenatis id sem ut, gravida malesuada lectus. Aliquam erat volutpat. Sed ut suscipit ex. Donec pellentesque quis lorem a tristique. Donec mi sem, viverra quis mi eu, hendrerit commodo elit. Vestibulum pellentesque est quis orci placerat ultrices. Fusce finibus placerat nisi, et facilisis est tempus quis.', './assets/images/JPG/campeones.jpg'),
(4, 'Pelicula-4-Ejemplo', 'Comedia - Drama - Romance ', 140, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia aliquet nunc. Aenean sollicitudin diam ultricies fringilla mattis. Aenean suscipit sed enim sed imperdiet. Nulla vel augue ex. Maecenas non consequat libero. Aliquam vel sem urna. Vestibulum cursus semper ullamcorper. Sed varius, orci non scelerisque auctor, nisl est maximus mauris, eu pulvinar ligula sem non libero. Duis lacinia blandit condimentum. Aenean a nisi dolor. Vestibulum ac ex ornare quam tincidunt cursus. Sed cursus pretium velit, ac consectetur urna facilisis quis. Vivamus ac varius lacus, ut suscipit sapien. Donec in nisi bibendum, consectetur sem ac, cursus mauris. Cras malesuada egestas magna, a eleifend nisi finibus ac.\r\n\r\nMauris aliquet venenatis risus in accumsan. Vivamus ac mollis dolor. Suspendisse quis arcu eu enim auctor luctus. Mauris sodales nisl id velit pretium, at cursus velit sagittis. Praesent fringilla vehicula venenatis. Etiam vel ipsum condimentum, fermentum risus ut, consequat arcu. Vivamus nec tempor lacus. Donec at venenatis augue. Phasellus nec dignissim tellus. Curabitur at egestas ipsum. Fusce ornare sapien in ligula porta porta. Nam ullamcorper ligula sit amet semper iaculis. In iaculis imperdiet semper. Vestibulum pellentesque metus vel tempor finibus. Vestibulum faucibus purus ante.\r\n\r\nDonec sed ultrices tortor. Vivamus erat nisi, maximus a faucibus id, maximus eget quam. Morbi dictum, metus et volutpat malesuada, dui leo ultrices nibh, vitae dignissim enim metus at nisl. Sed eu nunc orci. Duis iaculis interdum mauris, ac bibendum odio vestibulum nec. Vivamus rutrum erat et dolor faucibus, posuere laoreet nibh malesuada. Phasellus ultrices felis nec mauris dapibus, ut ultricies risus aliquam. Curabitur at augue eleifend lacus rutrum convallis. Donec posuere laoreet molestie. Donec consequat nibh metus, sed condimentum est placerat nec. Sed vulputate eros eu urna vestibulum commodo.\r\n\r\nNunc dapibus malesuada ex, vitae sagittis massa venenatis non. Cras varius tortor ut consectetur egestas. In hac habitasse platea dictumst. Praesent convallis, tortor at eleifend iaculis, nisi lacus placerat lacus, vel cursus augue eros ut mi. Vestibulum at leo neque. Fusce consectetur condimentum pretium. Vivamus quis neque arcu. Sed sed feugiat ante, sed finibus orci.\r\n\r\nMaecenas aliquet tellus diam, non ultrices eros aliquet rhoncus. Vestibulum ut ex in leo commodo feugiat. Morbi et hendrerit sapien. Donec non nulla fermentum, eleifend arcu ultrices, scelerisque ex. Fusce laoreet arcu ac maximus auctor. Sed dignissim ac massa at euismod. Morbi purus justo, venenatis id sem ut, gravida malesuada lectus. Aliquam erat volutpat. Sed ut suscipit ex. Donec pellentesque quis lorem a tristique. Donec mi sem, viverra quis mi eu, hendrerit commodo elit. Vestibulum pellentesque est quis orci placerat ultrices. Fusce finibus placerat nisi, et facilisis est tempus quis.', './assets/images/JPG/VOR.jpg'),
(5, 'Pelicula-5-Ejemplo', 'Comedia - Drama - Romance ', 140, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia aliquet nunc. Aenean sollicitudin diam ultricies fringilla mattis. Aenean suscipit sed enim sed imperdiet. Nulla vel augue ex. Maecenas non consequat libero. Aliquam vel sem urna. Vestibulum cursus semper ullamcorper. Sed varius, orci non scelerisque auctor, nisl est maximus mauris, eu pulvinar ligula sem non libero. Duis lacinia blandit condimentum. Aenean a nisi dolor. Vestibulum ac ex ornare quam tincidunt cursus. Sed cursus pretium velit, ac consectetur urna facilisis quis. Vivamus ac varius lacus, ut suscipit sapien. Donec in nisi bibendum, consectetur sem ac, cursus mauris. Cras malesuada egestas magna, a eleifend nisi finibus ac.\r\n\r\nMauris aliquet venenatis risus in accumsan. Vivamus ac mollis dolor. Suspendisse quis arcu eu enim auctor luctus. Mauris sodales nisl id velit pretium, at cursus velit sagittis. Praesent fringilla vehicula venenatis. Etiam vel ipsum condimentum, fermentum risus ut, consequat arcu. Vivamus nec tempor lacus. Donec at venenatis augue. Phasellus nec dignissim tellus. Curabitur at egestas ipsum. Fusce ornare sapien in ligula porta porta. Nam ullamcorper ligula sit amet semper iaculis. In iaculis imperdiet semper. Vestibulum pellentesque metus vel tempor finibus. Vestibulum faucibus purus ante.\r\n\r\nDonec sed ultrices tortor. Vivamus erat nisi, maximus a faucibus id, maximus eget quam. Morbi dictum, metus et volutpat malesuada, dui leo ultrices nibh, vitae dignissim enim metus at nisl. Sed eu nunc orci. Duis iaculis interdum mauris, ac bibendum odio vestibulum nec. Vivamus rutrum erat et dolor faucibus, posuere laoreet nibh malesuada. Phasellus ultrices felis nec mauris dapibus, ut ultricies risus aliquam. Curabitur at augue eleifend lacus rutrum convallis. Donec posuere laoreet molestie. Donec consequat nibh metus, sed condimentum est placerat nec. Sed vulputate eros eu urna vestibulum commodo.\r\n\r\nNunc dapibus malesuada ex, vitae sagittis massa venenatis non. Cras varius tortor ut consectetur egestas. In hac habitasse platea dictumst. Praesent convallis, tortor at eleifend iaculis, nisi lacus placerat lacus, vel cursus augue eros ut mi. Vestibulum at leo neque. Fusce consectetur condimentum pretium. Vivamus quis neque arcu. Sed sed feugiat ante, sed finibus orci.\r\n\r\nMaecenas aliquet tellus diam, non ultrices eros aliquet rhoncus. Vestibulum ut ex in leo commodo feugiat. Morbi et hendrerit sapien. Donec non nulla fermentum, eleifend arcu ultrices, scelerisque ex. Fusce laoreet arcu ac maximus auctor. Sed dignissim ac massa at euismod. Morbi purus justo, venenatis id sem ut, gravida malesuada lectus. Aliquam erat volutpat. Sed ut suscipit ex. Donec pellentesque quis lorem a tristique. Donec mi sem, viverra quis mi eu, hendrerit commodo elit. Vestibulum pellentesque est quis orci placerat ultrices. Fusce finibus placerat nisi, et facilisis est tempus quis.', './assets/images/JPG/12Valientes.jpg'),
(6, 'Pelicula-6-Ejemplo', 'Comedia - Drama - Romance ', 140, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia aliquet nunc. Aenean sollicitudin diam ultricies fringilla mattis. Aenean suscipit sed enim sed imperdiet. Nulla vel augue ex. Maecenas non consequat libero. Aliquam vel sem urna. Vestibulum cursus semper ullamcorper. Sed varius, orci non scelerisque auctor, nisl est maximus mauris, eu pulvinar ligula sem non libero. Duis lacinia blandit condimentum. Aenean a nisi dolor. Vestibulum ac ex ornare quam tincidunt cursus. Sed cursus pretium velit, ac consectetur urna facilisis quis. Vivamus ac varius lacus, ut suscipit sapien. Donec in nisi bibendum, consectetur sem ac, cursus mauris. Cras malesuada egestas magna, a eleifend nisi finibus ac.\r\n\r\nMauris aliquet venenatis risus in accumsan. Vivamus ac mollis dolor. Suspendisse quis arcu eu enim auctor luctus. Mauris sodales nisl id velit pretium, at cursus velit sagittis. Praesent fringilla vehicula venenatis. Etiam vel ipsum condimentum, fermentum risus ut, consequat arcu. Vivamus nec tempor lacus. Donec at venenatis augue. Phasellus nec dignissim tellus. Curabitur at egestas ipsum. Fusce ornare sapien in ligula porta porta. Nam ullamcorper ligula sit amet semper iaculis. In iaculis imperdiet semper. Vestibulum pellentesque metus vel tempor finibus. Vestibulum faucibus purus ante.\r\n\r\nDonec sed ultrices tortor. Vivamus erat nisi, maximus a faucibus id, maximus eget quam. Morbi dictum, metus et volutpat malesuada, dui leo ultrices nibh, vitae dignissim enim metus at nisl. Sed eu nunc orci. Duis iaculis interdum mauris, ac bibendum odio vestibulum nec. Vivamus rutrum erat et dolor faucibus, posuere laoreet nibh malesuada. Phasellus ultrices felis nec mauris dapibus, ut ultricies risus aliquam. Curabitur at augue eleifend lacus rutrum convallis. Donec posuere laoreet molestie. Donec consequat nibh metus, sed condimentum est placerat nec. Sed vulputate eros eu urna vestibulum commodo.\r\n\r\nNunc dapibus malesuada ex, vitae sagittis massa venenatis non. Cras varius tortor ut consectetur egestas. In hac habitasse platea dictumst. Praesent convallis, tortor at eleifend iaculis, nisi lacus placerat lacus, vel cursus augue eros ut mi. Vestibulum at leo neque. Fusce consectetur condimentum pretium. Vivamus quis neque arcu. Sed sed feugiat ante, sed finibus orci.\r\n\r\nMaecenas aliquet tellus diam, non ultrices eros aliquet rhoncus. Vestibulum ut ex in leo commodo feugiat. Morbi et hendrerit sapien. Donec non nulla fermentum, eleifend arcu ultrices, scelerisque ex. Fusce laoreet arcu ac maximus auctor. Sed dignissim ac massa at euismod. Morbi purus justo, venenatis id sem ut, gravida malesuada lectus. Aliquam erat volutpat. Sed ut suscipit ex. Donec pellentesque quis lorem a tristique. Donec mi sem, viverra quis mi eu, hendrerit commodo elit. Vestibulum pellentesque est quis orci placerat ultrices. Fusce finibus placerat nisi, et facilisis est tempus quis.', './assets/images/JPG/DeadPool2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `numero_sala` int(11) NOT NULL,
  `capacidad` double NOT NULL,
  `arquitectura` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id_sesion` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `3D` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `ape1` varchar(25) NOT NULL,
  `ape2` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fecha_nac` date NOT NULL,
  `tipo` enum('usuario','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`num_asiento`,`fila`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `pase`
--
ALTER TABLE `pase`
  ADD PRIMARY KEY (`id_entrada`,`asiento`,`sesion`),
  ADD KEY `asiento` (`asiento`),
  ADD KEY `sesion` (`sesion`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `id_pelicula` (`id_pelicula`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `id_sesion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `asiento_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`id_entrada`) REFERENCES `pase` (`id_entrada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pase`
--
ALTER TABLE `pase`
  ADD CONSTRAINT `pase_ibfk_1` FOREIGN KEY (`asiento`) REFERENCES `asiento` (`num_asiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pase_ibfk_2` FOREIGN KEY (`sesion`) REFERENCES `sesion` (`id_sesion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `sesion_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id_pelicula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
