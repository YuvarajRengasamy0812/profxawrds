
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `smartend_sponsor_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `row_no` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `smartend_sponsor_categories` DISABLE KEYS */;
INSERT INTO `smartend_sponsor_categories` VALUES (1,'Official Sponsor',1,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(2,'Event Sponsor',2,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(3,'Co-Sponsors',3,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(4,'Featured Brands',4,1,'2026-10-07 02:56:42','2026-10-07 02:56:42');
/*!40000 ALTER TABLE `smartend_sponsor_categories` ENABLE KEYS */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `smartend_sponsors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT 'home',
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `row_no` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `smartend_sponsors` DISABLE KEYS */;
INSERT INTO `smartend_sponsors` VALUES (1,'home',1,'Dominion Markets','assets/keditor/profx/assets/sponsors/Domino Markets.png','https://www.dominionmarkets.com/',1,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(2,'home',2,'Bridging Fx','assets/keditor/profx/assets/sponsors/bridgingfx.png','https://www.bridgingfx.net/',1,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(3,'home',2,'Finx Card','assets/keditor/profx/assets/sponsors/finxcart.png','https://finxcart.com/',2,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(4,'home',3,'Swiset','assets/keditor/profx/assets/award/10.png','https://swiset.com/',1,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(5,'home',3,'Taurex','assets/keditor/profx/assets/award/13.png','https://www.tradetaurex.com/',2,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(6,'home',4,'Yamarkets','assets/keditor/profx/assets/sponsors/9-yamarkets.png','https://www.yamarkets.com/',1,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(7,'home',4,'NXG Markets','assets/keditor/profx/assets/award/6.png','https://www.nxgmarkets.com/',2,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(8,'home',4,'Puprime','assets/keditor/profx/assets/award/7.png','https://www.puprime.com/',3,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(9,'home',4,'Avora Markets','assets/keditor/profx/assets/award/2.png','https://avoramarkets.com/',4,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(10,'home',4,'Hyro Trader','assets/keditor/profx/assets/sponsors/hyrotrader.png','https://www.hyrotrader.com/',5,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(11,'home',4,'Salma Markets','assets/keditor/profx/assets/award/8.png','https://www.salmamarkets.com/',6,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(12,'home',4,'Leverage Markets','assets/keditor/profx/assets/sponsors/leveragemarkets.png','https://leveragemarkets.com/',7,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(13,'home',4,'Pipstone Capital','assets/keditor/profx/assets/pipstones.png','https://pipstonecapital.com/',8,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(14,'home',4,'Forexer','assets/keditor/profx/assets/sponsors/forexer.png','https://www.forexer.com/',9,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(15,'home',4,'Trade Ultra','assets/keditor/profx/assets/partners/tradeultra.png','https://www.tradeultra.com/',10,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(16,'home',4,'Liberty Groups','assets/keditor/profx/assets/sponsors/libertymarkets.png','https://www.libertygroups.com/',11,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(17,'home',4,'Arabic Broker','assets/keditor/profx/assets/award/1.png','https://www.arabicbroker.com/',12,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(18,'home',4,'Supreme Fx','assets/keditor/profx/assets/award/9.png','https://supremefxtrading.com/',13,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(19,'home',4,'Financial Markets','assets/keditor/profx/assets/award/3.png','https://financialmarketsonline.com/',14,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(20,'home',4,'FX Brokers Startup','assets/keditor/profx/assets/sponsors/15-fx-broker-startup.png','https://fxbrokerstartup.com/',15,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(21,'home',4,'Dominion Markets','assets/keditor/profx/assets/sponsors/Domino Markets.png','https://www.dominionmarkets.com/',16,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(22,'home',4,'Bridging Fx','assets/keditor/profx/assets/sponsors/bridgingfx.png','https://www.bridgingfx.net/',17,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(23,'home',4,'Hybrid Solution','assets/keditor/profx/assets/sponsors/hybridsolution.png','https://hybridsolutions.com/',18,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(24,'home',4,'Setup FX','assets/keditor/profx/assets/sponsors/setupfx.png','https://setupfx.com/',19,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(25,'home',4,'Dominion Funding','assets/keditor/profx/assets/sponsors/domino Funding.png','https://dominionfunding.trade/',20,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(26,'home',4,'STP TRADING','assets/keditor/profx/assets/sponsors/spt_trading.png','https://www.stptrading.io/',21,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(27,'home',4,'BSX','assets/keditor/profx/assets/sponsors/bsx.png','https://www.bsxdao.com/',22,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(28,'home',4,'MYMAA Markets','assets/keditor/profx/assets/sponsors/mymarkets.png','https://www.mymaamarkets.com/',23,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(29,'home',4,'BAKARA','assets/keditor/profx/assets/sponsors/bakara.png','https://bakinv.com/',24,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(30,'home',4,'PRIME X','assets/keditor/profx/assets/sponsors/primex.png','https://www.primexcapital.com/en',25,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(31,'home',4,'XCHIEF','assets/keditor/profx/assets/sponsors/xchief.png','https://www.xchief.com/',26,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(32,'event',NULL,'Bridging Fx','assets/keditor/profx/assets/Event/bridging-white.png','https://www.bridgingfx.net/',1,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(33,'event',NULL,'GGCC','assets/keditor/profx/assets/Event/ggcc-white.png','https://www.ggccfx.com/',2,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(34,'event',NULL,'Profit Fx','assets/keditor/profx/assets/Event/profit-white.png','https://www.profitfxmarkets.com/',3,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(35,'event',NULL,'ZARA FX','assets/keditor/profx/assets/Event/zara-fx-logo.jpeg','https://www.zara-fx.com/',4,1,'2026-10-07 02:56:42','2026-10-07 02:56:42'),(36,'event',NULL,'JKV','assets/keditor/profx/assets/Event/jkv.png','https://jkvglobal.com/',5,1,'2026-10-07 02:56:42','2026-10-07 02:56:42');
/*!40000 ALTER TABLE `smartend_sponsors` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

