/*
Navicat MySQL Data Transfer

Source Server         : MariaDBLocal
Source Server Version : 50505
Source Host           : localhost:6033
Source Database       : ProjectTemplatePhp7

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-28 16:31:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cat_Area
-- ----------------------------
DROP TABLE IF EXISTS `cat_Area`;
CREATE TABLE `cat_Area` (
  `idArea` int(11) NOT NULL AUTO_INCREMENT,
  `idAreaPadre` int(11) DEFAULT NULL,
  `area` varchar(150) NOT NULL,
  `activa` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`idArea`),
  KEY `fkArea_AreaPadre_idAreaPadre` (`idAreaPadre`),
  CONSTRAINT `fkArea_AreaPadre_idAreaPadre` FOREIGN KEY (`idAreaPadre`) REFERENCES `cat_Area` (`idArea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat_Area
-- ----------------------------

-- ----------------------------
-- Table structure for cat_EstadoUsuario
-- ----------------------------
DROP TABLE IF EXISTS `cat_EstadoUsuario`;
CREATE TABLE `cat_EstadoUsuario` (
  `idEstadoUsuario` int(11) NOT NULL,
  `estadoUsuario` varchar(20) NOT NULL,
  PRIMARY KEY (`idEstadoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat_EstadoUsuario
-- ----------------------------
INSERT INTO `cat_EstadoUsuario` VALUES ('-1', 'INACTIVO');
INSERT INTO `cat_EstadoUsuario` VALUES ('0', 'SUSPENDIDO');
INSERT INTO `cat_EstadoUsuario` VALUES ('1', 'ACTIVO');

-- ----------------------------
-- Table structure for cat_RolUsuario
-- ----------------------------
DROP TABLE IF EXISTS `cat_RolUsuario`;
CREATE TABLE `cat_RolUsuario` (
  `idRolUsuario` int(11) NOT NULL,
  `rolUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idRolUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cat_RolUsuario
-- ----------------------------
INSERT INTO `cat_RolUsuario` VALUES ('1', 'SUPER ADMINISTRADOR');
INSERT INTO `cat_RolUsuario` VALUES ('2', 'ADMINISTRADOR');
INSERT INTO `cat_RolUsuario` VALUES ('3', 'ANALISTA');

-- ----------------------------
-- Table structure for sis_Sesion
-- ----------------------------
DROP TABLE IF EXISTS `sis_Sesion`;
CREATE TABLE `sis_Sesion` (
  `idSesion` int(11) NOT NULL AUTO_INCREMENT,
  `claveSesion` varchar(32) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `activa` bit(1) NOT NULL,
  PRIMARY KEY (`idSesion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sis_Sesion
-- ----------------------------
INSERT INTO `sis_Sesion` VALUES ('1', 'sY32giKyDIix2kVOrJlJj1M9CMWpP73k', '1', '2017-03-28 15:28:16', '');
INSERT INTO `sis_Sesion` VALUES ('2', 'pz5ViYzSVVBeMvoPPjFZwrEBPu2Yew5X', '1', '2017-03-28 15:44:35', '');
INSERT INTO `sis_Sesion` VALUES ('3', 'H7X4s3uZPUsGjL3YPd0eTmxisNmvYCIH', '1', '2017-03-28 15:45:30', '\0');
INSERT INTO `sis_Sesion` VALUES ('4', 'HatUHvrEc8IyF8ur37uER9X32RAY3kBg', '1', '2017-03-28 15:47:37', '\0');
INSERT INTO `sis_Sesion` VALUES ('5', 'LXkhcn8ZMMkcm7uEgRJylYDCXVh4VHhD', '1', '2017-03-28 15:48:22', '');
INSERT INTO `sis_Sesion` VALUES ('6', 'rphejgjWxNvbC45MwHM5GLNW6SQHe7bc', '1', '2017-03-28 15:48:22', '');

-- ----------------------------
-- Table structure for sis_Usuario
-- ----------------------------
DROP TABLE IF EXISTS `sis_Usuario`;
CREATE TABLE `sis_Usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apPaterno` varchar(30) NOT NULL,
  `apMaterno` varchar(20) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `idRolUsuario` int(11) NOT NULL,
  `idArea` int(11) DEFAULT NULL,
  `idEstadoUsuario` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `uqUsuario_cuenta` (`cuenta`),
  KEY `fkUsuario_Area_idArea` (`idArea`),
  KEY `fkUsuario_EstadoUsuario_idEstadoUsuario` (`idEstadoUsuario`),
  KEY `fkUsuario_RolUsuario_idRolUsuario` (`idRolUsuario`),
  CONSTRAINT `fkUsuario_Area_idArea` FOREIGN KEY (`idArea`) REFERENCES `cat_Area` (`idArea`),
  CONSTRAINT `fkUsuario_EstadoUsuario_idEstadoUsuario` FOREIGN KEY (`idEstadoUsuario`) REFERENCES `cat_EstadoUsuario` (`idEstadoUsuario`),
  CONSTRAINT `fkUsuario_RolUsuario_idRolUsuario` FOREIGN KEY (`idRolUsuario`) REFERENCES `cat_RolUsuario` (`idRolUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sis_Usuario
-- ----------------------------
INSERT INTO `sis_Usuario` VALUES ('1', 'ADMINISTRADOR', 'fdee8845ed8040424ad8441341980265', 'ADMINISTRADOR', ' ', ' ', 'O', 'administrador@gmail.com', '1', null, '1');
