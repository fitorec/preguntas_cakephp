-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1:3300
-- Tiempo de generación: 20-11-2014 a las 22:57:22
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `preguntas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--
DROP TABLE IF EXISTS cuestonarios;
CREATE TABLE IF NOT EXISTS `cuestionarios` (
  `id` int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL UNIQUE KEY,
  `num_preguntas` int(11) NOT NULL,
  `publicado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS preguntas;
CREATE TABLE IF NOT EXISTS `preguntas`(
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR (50) NOT NULL,
	custionario_id INT(6) NOT NULL,
	num_respuestas INT(2)
) ENGINE=InnoDB CHARSET=latin1;

DROP TABLE IF EXISTS respuestas;
CREATE TABLE IF NOT EXISTS respuestas(
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	pregunta_id INT(11) NOT NULL,
	valor VARCHAR(100) NOT NULL,
	es_cierta BOOLEAN DEFAULT FALSE
)ENGINE=InnoDB CHARSET=latin1;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
	id INT(3) PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL,
	password VARCHAR(50) NOT NULL,
	tipo VARCHAR(20) NOT NULL,
	email VARCHAR(50) NOT NULL
)ENGINE=InnoDB CHARSET=latin1;


DROP TABLE IF EXISTS historiales;
CREATE TABLE IF NOT EXISTS historiales(
	id INT(6) PRIMARY KEY AUTO_INCREMENT,
	user_id INT(3) NOT NULL,
	cuestionario_id INT(6) NOT NULL,
	aciertos INT(3) NOT NULL DEFAULT 0,
	calificacion FLOAT(5) NOT NULL DEFAULT 0
)ENGINE=InnoDB CHARSET=latin1;
--
-- Índices para tablas volcadas
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
