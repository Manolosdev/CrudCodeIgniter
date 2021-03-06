-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: anglo_teste
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (14,'Categoria 1','2021-08-07 19:16:58','2021-08-07 20:08:30','2021-08-07 20:08:30'),(15,'Categoria 2','2021-08-07 19:27:34','2021-08-07 20:28:59',NULL),(16,'Categoria 3','2021-08-07 19:27:40','2021-08-07 19:27:40',NULL),(17,'Categoria 4','2021-08-07 18:57:50','2021-08-07 18:57:50',NULL),(18,'Categoria 5','2021-08-07 19:15:54','2021-08-07 19:15:54',NULL),(19,'Categoria 6','2021-08-07 19:16:58','2021-08-07 19:16:58',NULL),(20,'Categoria 7','2021-08-07 19:27:34','2021-08-07 19:27:34',NULL),(21,'Categoria 8','2021-08-07 19:27:40','2021-08-07 19:27:40',NULL),(22,'Categoria 9','2021-08-07 18:57:50','2021-08-07 18:57:50',NULL),(23,'Categoria 10','2021-08-07 19:15:54','2021-08-07 19:15:54',NULL),(24,'Categoria 11','2021-08-07 19:16:58','2021-08-07 19:16:58',NULL),(25,'Categoria 12','2021-08-07 19:27:34','2021-08-07 19:27:34',NULL),(57,'Categoria teste','2021-08-09 14:44:57','2021-08-09 14:44:57',NULL),(58,'Categoria 3','2021-08-09 14:46:03','2021-08-09 14:46:03',NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsaveis`
--

DROP TABLE IF EXISTS `responsaveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `responsaveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsaveis`
--

LOCK TABLES `responsaveis` WRITE;
/*!40000 ALTER TABLE `responsaveis` DISABLE KEYS */;
INSERT INTO `responsaveis` VALUES (14,'teste dev','2021-08-07 19:16:58','2021-08-07 20:09:05','2021-08-07 20:09:05'),(15,'Willian Felps','2021-08-07 19:27:34','2021-08-09 14:06:08','2021-08-09 14:06:08'),(16,'Jhon Kater','2021-08-07 19:27:40','2021-08-09 14:37:59',NULL),(17,'Manoel Louro','2021-08-07 18:57:50','2021-08-08 11:45:33',NULL),(18,'Ricardo Dev','2021-08-07 19:15:54','2021-08-08 11:45:41',NULL);
/*!40000 ALTER TABLE `responsaveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `situacao_registro` int(11) NOT NULL DEFAULT 1 COMMENT '1 - Tarefa pendente; 2 - Tarefa finalizada',
  `fk_responsavel` int(11) DEFAULT NULL,
  `fk_categoria` int(11) DEFAULT NULL,
  `descricao` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tarefa_responsavel_idx` (`fk_responsavel`),
  KEY `fk_tarefe_categoria_idx` (`fk_categoria`),
  CONSTRAINT `fk_tarefa_responsavel` FOREIGN KEY (`fk_responsavel`) REFERENCES `responsaveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarefe_categoria` FOREIGN KEY (`fk_categoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefas`
--

LOCK TABLES `tarefas` WRITE;
/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;
INSERT INTO `tarefas` VALUES (1,2,14,14,'Tarefa 1','2021-08-07 20:48:04','2021-08-09 15:11:56','2021-08-09 15:11:56'),(5,2,15,15,'Tarefa 2','2021-08-08 11:52:01','2021-08-09 15:17:22',NULL),(6,2,14,15,'teste','2021-08-09 15:14:52','2021-08-09 17:14:59',NULL);
/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-09 17:30:50
