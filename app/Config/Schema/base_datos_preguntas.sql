-- Created by DiaSql-Dump Version 0.01(Beta)
-- Filename: base_datos_preguntas.sql

-- preguntas --
DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
	`id` INT ( 4 ) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`nombre` VARCHAR( 200 ) DEFAULT NULL,
	`cuestionario_id` INT (6) NOT NULL,
	`num_respuestas` INT ( 3 ) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- historiales --
DROP TABLE IF EXISTS `historiales`;
CREATE TABLE IF NOT EXISTS `historiales` (
	`id` INT(8) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`cuestionario_id` INT(6) NOT NULL,
	`user_id` INT(6) NOT NULL,
	`aciertos` INT(3) DEFAULT NULL,
	`calificacion` FLOAT(4) DEFAULT NULL,
	`data` TEXT DEFAULT NULL,
	`created` DATETIME DEFAULT NULL,
	`hora_finalizado` DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- cuestionarios --
DROP TABLE IF EXISTS `cuestionarios`;
CREATE TABLE IF NOT EXISTS `cuestionarios` (
	`id` INT(6) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`nombre` VARCHAR(200) DEFAULT NULL,
	`num_preguntas` INT(3) DEFAULT NULL,
	`publicado` BOOLEAN DEFAULT NULL,
	`profesor_id` INT ( 4 ) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- respuestas --
DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
	`id` INT( 8 ) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`pregunta_id` INT( 4 ) NOT NULL,
	`valor` VARCHAR ( 200 ) DEFAULT NULL,
	`es_cierta` BOOLEAN DEFAULT FALSE DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- users --
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
	`id` INT ( 4 ) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`profesor_id` INT( 4 ) DEFAULT NULL,
	`username` VARCHAR ( 50 ) NOT NULL UNIQUE,
	`password` VARCHAR ( 50 ) DEFAULT NULL,
	`nombre_completo` VARCHAR (200) DEFAULT NULL,
	`tipo` ENUM('Alumno', 'Profesor') DEFAULT NULL,
	`email` VARCHAR( 80 ) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- End SQL-Dump
