-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: kobeku
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `isipesanan`
--

DROP TABLE IF EXISTS `isipesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `isipesanan` (
  `idPesanan` int(11) DEFAULT NULL,
  `idMakanan` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  KEY `idPesanan` (`idPesanan`),
  KEY `idMakanan` (`idMakanan`),
  CONSTRAINT `idMakanan` FOREIGN KEY (`idMakanan`) REFERENCES `makanan` (`idMakanan`),
  CONSTRAINT `idPesanan` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `isipesanan`
--

LOCK TABLES `isipesanan` WRITE;
/*!40000 ALTER TABLE `isipesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `isipesanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makanan`
--

DROP TABLE IF EXISTS `makanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `makanan` (
  `idMakanan` int(11) NOT NULL,
  `jenisMakanan` varchar(7) DEFAULT NULL,
  `namaMakanan` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idMakanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makanan`
--

LOCK TABLES `makanan` WRITE;
/*!40000 ALTER TABLE `makanan` DISABLE KEYS */;
INSERT INTO `makanan` VALUES (1,'Makanan','ChickenTeriyaki',27000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTt3T7bmT-OXKcmlCXFyqgGNFTjIKxcQMEykgy6v-_cLBhbnh6k'),(2,'Makanan','ChickenYakiniku',27000,1,'https://www.lowcarbingasian.com/wp-content/uploads/2019/07/Keto-Japanese-Grilled-Beef-Yakiniku-LowCarbingAsian-Cover-480x270.jpg'),(3,'Makanan','ChickenKatsu',27000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTsTzXPqNqYthPj_rISR_TT7xpcaB3ADHDA2LMsjbKWEhzHfLWR'),(4,'Makanan','ChickenMongolia',30000,1,'https://i2.wp.com/sweetandsavorymeals.com/wp-content/uploads/2017/02/Pressure-Cooker-Instant-Pot-Mongolian-Chicken-3.jpg?resize=680%2C907&ssl=1'),(5,'Makanan','ChickenGoma',30000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ0BtjavjWj5SZPSpn3_q5thfhWUb3W9mub6T1NpuiZOmP0R4Ku'),(6,'Makanan','ChickenMayonnaise',33000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTYsYVsg_PBAOuDDroBX35PBuNz0NP3vVnYAPdMyllizI9mDksJ'),(7,'Makanan','ChickenTorinoKaraage',28000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRC3TZYIoJylaFlOnZuCnF8A7XGJBhAUcDZzHuju3QKsgZqIvrU'),(8,'Makanan','BeefTeriyaki',33000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRNZNx43cMW33xL1N8-oElxhHuTk_Np5s7nbWY7LvgRlJGaUzLR'),(9,'Makanan','BeefYakiniku',33000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQIaMryVWF1kPuWST1InQg5yafJCc07AwIG3PSPhmCwnqvDwzQ5'),(10,'Makanan','BeefKatsu',33000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTUbHnihT15722SGN8bMkiWcOEN3KdUYKz26iU7QA2_VmpWFbiR'),(11,'Makanan','BeefMongolia',33000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRfEjEdB_Cm0VGitNTfHJqWp1zJLjqQTEsaK5MX2ZfXNhGWgIsa'),(12,'Makanan','Teppanyaki',45000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTPteCQyk3FAdUxKacWWX4bJFyiUVkUnrPp0kThHRowFty8QTIW'),(13,'Makanan','SeafoodTeriyaki',35000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSsHhddhVIN6YXeQKWwHMTyyuWbPsbIzUDr08A1s2E_N_D5rOEi'),(14,'Makanan','SeafoodYakiniku',35000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTUy3r-HD-Iv6euLizSxq1NwqmhFwUZ4jZAGOFWVhRKiJxRBGXp'),(15,'Makanan','FishKatsu',35000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ4QbY5QOYeSMlZqY5vgjILvD_4WKJ_4Id4x_ilUC2D50GxuGTh'),(16,'Makanan','FishFilletwithJapaneseSauce',38000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRUcDo7-GXVKKYTudhX_hENtEpCTaqv7hQT38C8Ko-jGAe3TCRj'),(17,'Makanan','FishFrywithJapaneseSauce',39000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQqDA0nZ580NT8aYeBV4bM42t5ykoREevwl3BIwuEHDPDLj63Cz'),(18,'Makanan','DoryTempura',48000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSAy-JUkJ98_vn5LAv3X5C-ym4AgotEJSjDSmmFd0ipS9iQewS-'),(19,'Makanan','CumiTempura',45000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRWicO_fzEcm0mz_xdZB_L2oGxDFC0qLkYl0wacxhIQ6IuiFJos'),(20,'Makanan','CumiGorengKeringdenganSaus',35000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSjrQHx1EBH1l1zb8ob0FAIniPsa_5NT2y3GHcPUPMf5x_BI7AM'),(21,'Makanan','EbiFurai',40000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQBLh93UbePUg5d-_2m-tXcy-hZ5K2qs5jlu7wZbAHMtA2HFHxl'),(22,'Makanan','UdangMayonnaise',38000,1,'https://www.radarsultra.co.id/wp-content/uploads/2019/03/IMG-20190301-WA0002-e1551442722144.jpg'),(23,'Makanan','UdangTempura',49000,1,'https://cf.shopee.co.id/file/a8aed26667c36d5aa69f003400654128'),(24,'Makanan','SteamBoatKobeSpecial',55000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRcjtbWTUPQEQLPaJ9yH_c1G_aYAFjKZFFZybECKrk3jeu-N9v9'),(25,'Makanan','TahuPanggangGaram',29000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ_9iw-ZbWuOIWIcboItkL5vbvP9pzBYxK3ABJgiW6xZ7oBlm7b'),(26,'Makanan','KweTiawGorengAyam',30000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRLBB78kUA1hR7kmt59FAZ03NSVRLkMfML4mzr0iYHBah8npGA0'),(27,'Makanan','NasiCapCay',35000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQRQsr178SHwMHoxqsnTw0ksgnMJZOgaiLyPM26ibKH0Mp71XYJ'),(28,'Minuman','Ocha',10000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQAzWZCQwWmW2Yej_-jAQtauewkqshZr7-kUl6PM4qnDsbUFdCe'),(29,'Minuman','CocaCola',15000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRFRux21cbmALxfm1wSxe6rOKV64BulAqQnP3Uo2RGAl8FsXg4R'),(30,'Minuman','LemonTea',13000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSKQ9Wu1HDE-3c3YcYSKJXaYrdxCqw1-kOAsuq9vswPH5hTJFT3'),(31,'Minuman','Cappucino',15000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTmlmPoEhqIdawgRIYcjZSvT2yo0snIN2UWkBsr8NAgO_j35fFn'),(32,'Minuman','AirMineral',7000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSSB0tAbqZ9n0Jets3U5dJwBL3iuZx-40XpFXDAEKsJfQkNpLf7'),(33,'Minuman','IceChocolate',15000,1,'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSSvGGJVW6jVdfonOAQ7Ey0wuZcWBmSBKoZlrzD_WhPJCX9KAxR');
/*!40000 ALTER TABLE `makanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesanan` (
  `idPesanan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggalPembelian` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `noMeja` int(11) DEFAULT NULL,
  `selesaidimasak` boolean DEFAULT 0,
  `selesaidiantar` boolean DEFAULT 0,
  `sudahdibayar` boolean DEFAULT 0,
  PRIMARY KEY (`idPesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

LOCK TABLES `pesanan` WRITE;
/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `nama_user` varchar(20) DEFAULT NULL,
  `username` varchar(8) DEFAULT NULL,
  `divisi` varchar(10) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-15 11:34:43
