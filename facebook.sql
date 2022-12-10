# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Base de Dados: facebook
# Tempo de Geração: 2016-08-27 14:55:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela grupos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grupos`;

CREATE TABLE `grupos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;

INSERT INTO `grupos` (`id`, `id_usuario`, `titulo`)
VALUES
	(2,1,'Grupo de Teste');

/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela grupos_membros
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grupos_membros`;

CREATE TABLE `grupos_membros` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `grupos_membros` WRITE;
/*!40000 ALTER TABLE `grupos_membros` DISABLE KEYS */;

INSERT INTO `grupos_membros` (`id`, `id_grupo`, `id_usuario`)
VALUES
	(1,2,1),
	(2,2,2),
	(3,2,3);

/*!40000 ALTER TABLE `grupos_membros` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `texto` text,
  `url` varchar(50) DEFAULT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `id_usuario`, `data_criacao`, `tipo`, `texto`, `url`, `id_grupo`)
VALUES
	(2,1,'2016-08-27 05:57:58','foto','Teste de envio de imagem com texto...','91b1addbcc2f6b6e25e8742e096c971c.png',0),
	(3,1,'2016-08-27 05:59:29','texto','Mais algumas','',0),
	(4,1,'2016-08-27 05:59:32','texto','De texto','',0),
	(5,1,'2016-08-27 06:16:04','texto','Algum texto de exemplo','',0),
	(6,2,'2016-08-27 06:17:03','texto','Minha postagem de fulano...','',0),
	(7,1,'2016-08-27 06:17:25','texto','Algum outro','',0),
	(8,2,'2016-08-27 07:43:41','texto','Teste de postagem no grupo de Bonieky...','',2),
	(9,1,'2016-08-27 07:44:57','texto','Que legal Fulano...','',2);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela posts_comentarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts_comentarios`;

CREATE TABLE `posts_comentarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `texto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts_comentarios` WRITE;
/*!40000 ALTER TABLE `posts_comentarios` DISABLE KEYS */;

INSERT INTO `posts_comentarios` (`id`, `id_post`, `id_usuario`, `data_criacao`, `texto`)
VALUES
	(1,7,1,'2016-08-27 06:56:24','Teste legal');

/*!40000 ALTER TABLE `posts_comentarios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela posts_likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts_likes`;

CREATE TABLE `posts_likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts_likes` WRITE;
/*!40000 ALTER TABLE `posts_likes` DISABLE KEYS */;

INSERT INTO `posts_likes` (`id`, `id_post`, `id_usuario`)
VALUES
	(2,7,2),
	(3,7,1),
	(4,6,1),
	(6,2,1);

/*!40000 ALTER TABLE `posts_likes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela relacionamentos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `relacionamentos`;

CREATE TABLE `relacionamentos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_de` int(11) DEFAULT NULL,
  `usuario_para` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `relacionamentos` WRITE;
/*!40000 ALTER TABLE `relacionamentos` DISABLE KEYS */;

INSERT INTO `relacionamentos` (`id`, `usuario_de`, `usuario_para`, `status`)
VALUES
	(1,1,4,1),
	(2,4,3,1),
	(3,1,5,1),
	(4,1,3,1),
	(5,1,2,1),
	(6,3,4,1);

/*!40000 ALTER TABLE `relacionamentos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sexo` tinyint(1) DEFAULT NULL,
  `bio` text,
  `senha` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id`, `email`, `nome`, `sexo`, `bio`, `senha`)
VALUES
	(1,'suporte@b7web.com.br','Bonieky Lacerda',1,'Esta Ã© minha biografia... Esse sou quem eu sou.','698dc19d489c4e4db73e28a713eab07b'),
	(2,'fulano@hotmail.com','Fulano',1,NULL,'202cb962ac59075b964b07152d234b70'),
	(3,'cicrano@hotmail.com','Cicrano',0,NULL,'202cb962ac59075b964b07152d234b70'),
	(4,'beltrano@hotmail.com','Beltrano',1,NULL,'202cb962ac59075b964b07152d234b70'),
	(5,'zibrano@hotmail.com','Zibrano',1,NULL,'202cb962ac59075b964b07152d234b70'),
	(6,'greltranio@hotmail.com','Greltranio',1,NULL,'202cb962ac59075b964b07152d234b70');

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
