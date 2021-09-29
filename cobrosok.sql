/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.20-MariaDB : Database - cooperativa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cooperativa` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cooperativa`;

/*Table structure for table `denuncia` */

DROP TABLE IF EXISTS `denuncia`;

CREATE TABLE `denuncia` (
  `idDenuncia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) NOT NULL,
  `numeroMovil` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `idVehiculo` int(11) NOT NULL,
  PRIMARY KEY (`idDenuncia`),
  KEY `fk_denuncia_vehiculo1_idx` (`idVehiculo`),
  CONSTRAINT `fk_denuncia_vehiculo1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `denuncia` */

/*Table structure for table `mensualidad` */

DROP TABLE IF EXISTS `mensualidad`;

CREATE TABLE `mensualidad` (
  `idMensualidad` int(11) NOT NULL AUTO_INCREMENT,
  `idVehiculo` int(11) NOT NULL,
  `mes` varchar(25) NOT NULL,
  `anio` smallint(6) NOT NULL,
  `monto` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idMensualidad`,`idVehiculo`),
  KEY `fk_mensualidad_vehiculo1_idx` (`idVehiculo`),
  KEY `fk_mensualidad_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_mensualidad_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensualidad_vehiculo1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `mensualidad` */

insert  into `mensualidad`(`idMensualidad`,`idVehiculo`,`mes`,`anio`,`monto`,`estado`,`idUsuario`) values (11,10,'Septiembre',2021,100,1,1),(12,6,'Septiembre',2021,123,1,1),(13,15,'Septiembre',2021,200,1,1),(14,16,'Septiembre',2021,200,1,1);

/*Table structure for table `multas` */

DROP TABLE IF EXISTS `multas`;

CREATE TABLE `multas` (
  `idMultas` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idMultas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `multas` */

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `idPagos` int(11) NOT NULL AUTO_INCREMENT,
  `idVehiculo` int(11) NOT NULL,
  `idMultas` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaVencimiento` datetime NOT NULL,
  `mesPagoMulta` datetime NOT NULL,
  `idMensualidad` int(11) NOT NULL,
  PRIMARY KEY (`idPagos`,`idVehiculo`,`idMultas`,`idMensualidad`),
  KEY `fk_pagos_vehiculo1_idx` (`idVehiculo`),
  KEY `fk_pagos_multas1_idx` (`idMultas`),
  KEY `fk_pagos_mensualidad1_idx` (`idMensualidad`),
  CONSTRAINT `fk_pagos_mensualidad1` FOREIGN KEY (`idMensualidad`) REFERENCES `mensualidad` (`idMensualidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_multas1` FOREIGN KEY (`idMultas`) REFERENCES `multas` (`idMultas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_vehiculo1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pagos` */

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `rol` */

insert  into `rol`(`idRol`,`nombreRol`,`descripcion`,`estado`,`fechaRegistro`,`fechaActualizacion`) values (1,'Administrador','Administrador',1,'2021-09-24 11:01:46',NULL);

/*Table structure for table `socio` */

DROP TABLE IF EXISTS `socio`;

CREATE TABLE `socio` (
  `idSocio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `primerApellido` varchar(60) NOT NULL,
  `segundoApellido` varchar(60) DEFAULT NULL,
  `fechaNacimiento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `ingresos` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idSocio`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `socio` */

insert  into `socio`(`idSocio`,`nombre`,`primerApellido`,`segundoApellido`,`fechaNacimiento`,`direccion`,`telefono`,`ingresos`,`fechaRegistro`,`fechaActualizacion`,`estado`) values (1,'Lis','Lopez','Morales','1991-09-24 11:43:43','Ayacucho',4505050,100,'2021-09-24 11:44:19',NULL,1),(2,'Elviz','Moreira','Vela','1990-09-20 00:00:00','Panamericana',71450982,3000,'2021-09-24 03:44:46',NULL,1),(3,'Samuel','fernandez','mamani','1990-09-27 00:00:00','Heroinas',74556321,2000,'2021-09-24 03:49:43',NULL,1),(4,'Arturo','Condori','Juchani','2021-09-25 21:07:01','villa israel',78499748,3000,'2021-09-25 20:58:30',NULL,0),(5,'Arturo','Condori','Choque','1990-09-27 00:00:00','villa Israel',9786648,3000,'2021-09-25 21:09:28',NULL,1),(6,'Mevale','Mevale','Mevale','2021-09-25 21:35:36','Mevale',5555555,1,'2021-09-25 21:35:27',NULL,0),(7,'Oscar','Garcia','Moreno','1990-09-15 00:00:00','Ismael Montes',76536289,5000,'2021-09-25 21:41:33',NULL,1),(8,'Gerson','Alvares','Marca','2021-09-25 23:11:23','Ismael Montes',76386290,5000,'2021-09-25 23:09:19',NULL,0),(9,'Ismael','Vargas','Peredo','1990-09-26 00:00:00','Mananthial',32798269,2000,'2021-09-25 23:14:01',NULL,1),(10,'Santiago','Maldonado','Vela','1990-09-28 00:00:00','Republica',78638683,3000,'2021-09-25 23:17:24',NULL,1),(11,'Alex','fernandez','Panozo','1990-09-27 00:00:00','Tolata',75918991,5000,'2021-09-25 23:49:02',NULL,1);

/*Table structure for table `tipovehiculo` */

DROP TABLE IF EXISTS `tipovehiculo`;

CREATE TABLE `tipovehiculo` (
  `idTipoVehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `montoMensual` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTipoVehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tipovehiculo` */

insert  into `tipovehiculo`(`idTipoVehiculo`,`nombre`,`montoMensual`,`estado`,`fechaRegistro`,`fechaActualizacion`) values (1,'Vagoneta',100,1,'2021-09-24 11:04:38',NULL),(2,'Micro',120,1,'2021-09-24 11:04:51',NULL);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `primerApellido` varchar(60) NOT NULL,
  `segundoApellido` varchar(60) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contrasenia` varchar(64) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `idRol` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'sinfoto.jpg',
  PRIMARY KEY (`idUsuario`),
  KEY `fk_usuario_rol_idx` (`idRol`),
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`idUsuario`,`nombre`,`primerApellido`,`segundoApellido`,`correo`,`telefono`,`usuario`,`contrasenia`,`fechaRegistro`,`fechaActualizacion`,`estado`,`idRol`,`foto`) values (1,'Lis','Lopez','Morales','lis@gmail.com',4505050,'admin','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','2021-09-24 11:03:59',NULL,1,1,'sinfoto.jpg');

/*Table structure for table `vehiculo` */

DROP TABLE IF EXISTS `vehiculo`;

CREATE TABLE `vehiculo` (
  `idVehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `placa` char(10) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `color` varchar(25) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `cilindrada` varchar(50) NOT NULL,
  `motor` varchar(25) NOT NULL,
  `chasis` varchar(50) NOT NULL,
  `numeroMovil` int(11) NOT NULL,
  `fotoVehiculo` varchar(100) NOT NULL DEFAULT 'sinfoto.jpg',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `idSocio` int(11) NOT NULL,
  `idTipoVehiculo` int(11) NOT NULL,
  PRIMARY KEY (`idVehiculo`),
  KEY `fk_vehiculo_socio1_idx` (`idSocio`),
  KEY `fk_vehiculo_tipoVehiculo1_idx` (`idTipoVehiculo`),
  CONSTRAINT `fk_vehiculo_socio1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vehiculo_tipoVehiculo1` FOREIGN KEY (`idTipoVehiculo`) REFERENCES `tipovehiculo` (`idTipoVehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `vehiculo` */

insert  into `vehiculo`(`idVehiculo`,`placa`,`marca`,`color`,`modelo`,`tipo`,`cilindrada`,`motor`,`chasis`,`numeroMovil`,`fotoVehiculo`,`fechaRegistro`,`fechaActualizacion`,`estado`,`idSocio`,`idTipoVehiculo`) values (6,'MDR125','Toyota','Azul','2000','','1234','1234567890','123123asdas4444444',1,'sinfoto.jpg','2021-09-24 12:46:11',NULL,1,1,1),(8,'ASD123','Toyota','Blanco','2201','','1234567890','0987654321','asgdkhasgd1234567890',1,'sinfoto.jpg','2021-09-24 02:28:04',NULL,1,1,2),(9,'DAS123','Audi','Negro','A100','','1234567890','0987654321','asgdkhasgd1234567891',1,'sinfoto.jpg','2021-09-24 02:45:04',NULL,1,1,1),(10,'RPS341','SUZUKI','ROJO','2018','','1234567890','0987654321','GSYSH12838791',2,'sinfoto.jpg','2021-09-24 04:02:51',NULL,0,3,1),(11,'ttt1111','FORTD','AZUL','2015','','DDDDD33333','0987654321','GSYSH12838791',4,'sinfoto.jpg','2021-09-25 21:33:35',NULL,1,5,1),(12,'DES333','FORTD','AZUL','2015','','DDDDD33333','1','1',1,'sinfoto.jpg','2021-09-25 21:56:54',NULL,1,1,1),(13,'DES333','FORTD','AZUL','2015','','187758','EEEEEGGG55','GSYSH12838791',1,'sinfoto.jpg','2021-09-25 21:58:26',NULL,1,1,1),(14,'TTEE12','SUZUKI','VERDE','2003','','TTTTRT53578','EEEEEGGG55','FFFF6555564',2,'sinfoto.jpg','2021-09-25 22:15:01',NULL,1,2,1),(15,'LLL666','SUZUKI','Cafe','2003','','hhhkahskjwu76','1726vx','hsgshdi8777',7,'sinfoto.jpg','2021-09-25 23:19:44',NULL,1,10,1),(16,'hhh111','Toyota','ROJO','2000','','SHDKJ83973','1234TRT','DDDDKKKKKS99',8,'sinfoto.jpg','2021-09-25 23:51:30',NULL,1,11,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
