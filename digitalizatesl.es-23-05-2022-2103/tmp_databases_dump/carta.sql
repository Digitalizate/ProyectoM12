-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: carta
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-1:10.3.34+maria~stretch-log

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

--
-- Table structure for table `Bebidas`
--

DROP TABLE IF EXISTS `Bebidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bebidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `nombre_img` varchar(100) NOT NULL,
  `ingredientes` varchar(200) NOT NULL,
  `marca` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bebidas`
--

LOCK TABLES `Bebidas` WRITE;
/*!40000 ALTER TABLE `Bebidas` DISABLE KEYS */;
INSERT INTO `Bebidas` (`id`, `nombre`, `tipo`, `precio`, `nombre_img`, `ingredientes`, `marca`) VALUES (1,'Botella de agua 33cl','Agua',3,'agua_33cl','Agua','Font Vella'),(3,'Fanta','Refresco',3,'fanta','Agua carbonatada, zumo de naranja, azúcar, Ácido cítrico (E-330), Ácido málico (E-296), goma arábiga (E-414), acetato isobutirato de sacarosa (E-444), Ésteres glicéridos de colofonia de madera (E-445)','Fanta'),(4,'Cocacola 33cl','Refresco',3,'cocacola','Agua carbonatada, azúcar, colorante E-150d, acidulante ácido fosfórico, aromas naturales, aroma cafeína','Cocacola'),(5,'Sangria','Otros',10,'sangria','Vino tinto, Azúcar, Limón, naranja, Melocotón, Especias, Gas carbónico, Vermut',''),(6,'Peñascal rosado','Vinos',8,'penascarrosado','tempranillo, Garnacha','Peñascal'),(7,'Lustau Vermouth','Vinos',13,'VermutLustau','Uvas, Palomino, Palomino Fino','Lustau'),(8,'Bardos reserva tinto 2016','Vinos',17,'bardosreserva','Uva Tinta, Cabernet Sauvignon','Bardos Reserva'),(9,'Pago de carraovejas 2019','Vinos',34,'pago_carraovejas','Tinto Fino (93%), Cabernet Sauvignon (4%), Merlot (3%)','Pago de carraovejas'),(10,'Cabernet Sauvignon 2018','Vinos',26,'marques_cabernet','Uva Cabernet Sauvignon','Cabernet Sauvignon'),(11,'Codorníu clásico','Vinos',6,'codorniu_clasico','Uvas macabeo, xarel·lo, parellada','Codorniu'),(12,'Carajillo','Cafe',2,'carajillo','Café, Aguardiente, ron, Azúcar',''),(13,'Café con leche','Cafe',2,'cafe_leche','Cáfe, Leche',''),(14,'Botella de agua 1L','Agua',3,'agua_1l','Agua','Font Vella'),(15,'LaCasera 50cl','Agua',2,'lacasera_50cl','Agua carbonatada, Ácido cítrico, edulcorantes E-954 y E-952, aromas','LaCasera');
/*!40000 ALTER TABLE `Bebidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Platos`
--

DROP TABLE IF EXISTS `Platos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Platos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `precio` double(10,0) NOT NULL,
  `nombre_img` varchar(100) DEFAULT NULL,
  `oferta` double DEFAULT 0,
  `descuento` int(11) NOT NULL,
  `ingredientes` varchar(200) NOT NULL,
  `curiosidad` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Platos`
--

LOCK TABLES `Platos` WRITE;
/*!40000 ALTER TABLE `Platos` DISABLE KEYS */;
INSERT INTO `Platos` (`id`, `nombre`, `precio`, `nombre_img`, `oferta`, `descuento`, `ingredientes`, `curiosidad`) VALUES (1,'Souffle de queso',35,'souffle',0,0,'Huevos, mantequilla, harina de trigo, leche entera, queso Emmental, sal, nuez moscada','Fue inventado por Vattel, el cocinero del rey Luis XIV. Lo creó para sus esposas.'),(2,'Parmigiana de berenjenas',11,'parmigiana_berenjenas',0,0,'Berenjenas, huevos, harina, mozzarella, queso parmesano, salsa de tomate, cebolla, albahaca, tomillo, orégano, sal, azúcar aceite de oliva','Al principio se consideraba una comida de pobres'),(3,'Tortilla trufada',8,'tortilla_trufada',0,0,'Patatas, huevos, salsa de trufa, sal','La mayor tortilla creada midió 5 metros de diámetro y pesó 1.500 kilos'),(4,'Espaguetis a la bolognesa',8,'espaguetis_bolognesa',0,0,'Espaguetis, carne picada, zanahoria, cebolla, vino blanco, salsa de tomate, leche, orégano, albahaca, aceite de oliva, sal, pimienta negra','Depende del grosor se pueden llamar  ‘espaghettini’, ‘espaghetti’ o ‘spaghettoni’.'),(5,'Bacalao con tomate',8,'bacalao_tomate',1,20,'Bacalao, cebolla, dientes de ajo, tomates, sal, azúcar, aceite de oliva virgen extra',''),(6,'Lomo adobado con pimientos',9,'lomo_pimientos',1,50,'Lomo, pimiento rojo, dientes de ajo, aceite de oliva, sal, azúcar',''),(8,'Garbanzos con rape y langostinos',15,'garbanzos_rape_langostinos',0,0,'Garbanzos, pimiento rojo, pimiento verde, cebolla, dientes de ajo, tomate frito, langostinos, rape, caldo de pescado,  pimentón dulce, azafrán, laurel, sal','El rape puede llegar a engullir un pez de un tamaño al suyo'),(9,'Lasaña de boletus',11,'lasana_boletus',0,0,'Láminas de lasaña, bechamel, mantequilla, parmesano, cebolla, ajo, champiñónes','La lasaña más grande del mundo pesaba 2700 kilos y se hizo en Argentina');
/*!40000 ALTER TABLE `Platos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Postres`
--

DROP TABLE IF EXISTS `Postres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Postres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `oferta` tinyint(1) DEFAULT 0,
  `descuento` int(11) DEFAULT 0,
  `nombre_img` varchar(100) NOT NULL,
  `ingredientes` varchar(200) NOT NULL,
  `curiosidad` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Postres`
--

LOCK TABLES `Postres` WRITE;
/*!40000 ALTER TABLE `Postres` DISABLE KEYS */;
INSERT INTO `Postres` (`id`, `nombre`, `precio`, `oferta`, `descuento`, `nombre_img`, `ingredientes`, `curiosidad`) VALUES (1,'Tarta de queso',5,1,30,'tarta_queso','Queso crema, huevos, nata, azúcar, harina de trigo','Fue creada para la dieta de los atletas en los Juegos Olímpicos del 776 a.C.'),(2,'Flan con nada y helado',5,0,0,'flan_nata_helado','Leche entera, azúcar, huevo, piel de limón, canela en rama, nata, yogur griego natural, miel, extracto de vainilla','El nombre “flan” proviene del francés ‘flaon’, que deriva del alemán ‘flado’, se usa para señalar a un objeto plano'),(3,'Pastel de manzana',4.75,0,0,'tarta_manzana','Manzanas, harina, levadura, huevos, azúcar moreno, leche, mermelada de albaricoque, mantequilla, harina','En Estados Unidos se celebra el 13 de mayo el día nacional de la tarta de manzana'),(5,'Arroz con leche',7,0,0,'arroz_leche','Arroz, leche, azúcar, canela, cáscara de limón, canela en polvo','En la antigüedad usaban miel para endulzarlo');
/*!40000 ALTER TABLE `Postres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'carta'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-23 21:03:53
