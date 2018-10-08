/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.29-MariaDB : Database - webnlc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`webnlc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `webnlc`;

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `id_group` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_group` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `group` */

insert  into `group`(`id_group`,`name_group`) values (1,'A'),(2,'B'),(3,'C'),(4,'D');

/*Table structure for table `history` */

DROP TABLE IF EXISTS `history`;

CREATE TABLE `history` (
  `id_history` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_team` int(10) unsigned NOT NULL,
  `id_soal` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `condition` int(1) NOT NULL,
  `score` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_history`),
  KEY `id_team` (`id_team`),
  KEY `id_soal` (`id_soal`),
  KEY `id` (`id`),
  CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `history_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `history_ibfk_3` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `history` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2018_06_21_014247_create_team',1),(3,'2018_06_21_014533_create_soal',1),(4,'2018_06_21_020159_create_history',1),(5,'2018_09_03_130106_create_group',1);

/*Table structure for table `soal` */

DROP TABLE IF EXISTS `soal`;

CREATE TABLE `soal` (
  `id_soal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_soal` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `soal` */

/*Table structure for table `team` */

DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `id_team` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `id_group` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_team`),
  KEY `id_group` (`id_group`),
  CONSTRAINT `team_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `team` */

insert  into `team`(`id_team`,`name_team`,`score`,`id_group`) values (1,'noob',0,1),(2,'noob1',0,2),(3,'noob2',0,3),(4,'noob3',0,4),(5,'noob4',0,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_group` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `id_group` (`id_group`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`id_group`) values (1,'A01','$2y$10$APznsHR6WurWZ7YYj3cUguBlBUacZxgem/LszWMO9/eZkCaZ5UqIy',1),(2,'A02','$2y$10$czsZxIVyvimp9fKNPvneXOBdoDvMewO/bB/OYEzWf2L9ihPj9Rwr.',1),(3,'A03','$2y$10$Zia1JIm/b3oKa6nKOdJcLe.tNmkXL432vHpS1pDKspoxIHdWBkWjW',1),(4,'A04','$2y$10$QAvgbUTTbatW.NlaHxv3mesb3o4B5.odHDMzr6rdzy8iPZPfuBZ.i',1),(5,'B01','$2y$10$94crRcqVmHbYmgQTxrLVNupL/48J/Rxt4LmfWvST0.1aljrXJ9zZO',2),(6,'B02','$2y$10$gVEkDY6ZG4lV9/IxpqOitO0vwwMTsZgJQUFwz4DmaLUTsXZfhF4Li',2),(7,'B03','$2y$10$i7CstknpFZNU7znxvepqIewY5zfNyP6N6rKlDj5E03klROWHFJLtq',2),(8,'B04','$2y$10$IgmLPJzal7rae47qcxm/VOJ8mDtsZidDhC4lCpAfM8DitsSrMBfAq',2),(9,'C01','$2y$10$p.gHQpjV1hItwTh5fYPlCeqSPrxB06LRtzathGU6fa4YG1b9vyJd.',3),(10,'C02','$2y$10$aAPEcFeA0x.PtOxJEIWGv.eJdV8f/eGW1KB4h0hr8mYFtu9gRMuz6',3),(11,'C03','$2y$10$9J5SF/GG3OiWBTjVeOXyMeIRL1RgYOrQ9FYlCk1/Pkhs7bSSn4BcC',3),(12,'C04','$2y$10$IRSqyOOwrjJVM3mo0Ts9tubzlX5ostsTywVvCV5Wrcr.YTVkZ5UPu',3),(13,'D01','$2y$10$WYU6NZ8M6muHCJQbQ8k5BePjK5uvZgr7SlzZ1kk.UXNE7jBQ5MaOq',4),(14,'D02','$2y$10$Hei1QR7Xi.9wMbh7YoHS8OWB8Xibf1S.cDDRiLbDx393dFarb3lf.',4),(15,'D03','$2y$10$f.i20OUMDaW.m3ISbBUI6Oq.ts6pjXlgeORzGILnXz6Ctr3PbMqCa',4),(16,'D04','$2y$10$szfl/cSgh2L4bQfS.DUCRuXv5R5PqiQEwPFmJ397Clqi5dUZzutZq',4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
