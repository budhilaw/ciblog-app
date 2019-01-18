# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.3.12-MariaDB)
# Database: ciblog
# Generation Time: 2019-01-18 05:02:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table category
# ------------------------------------------------------------

CREATE TABLE `category` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL DEFAULT '',
  `cat_slug` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_slug`, `created_at`)
VALUES
	(1,'Uncategorized','uncategorized','2019-01-17 20:04:50'),
	(2,'Travel','travel','2019-01-17 17:00:35');

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

CREATE TABLE `comments` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment_author` varchar(255) NOT NULL DEFAULT '',
  `comment_email` varchar(255) NOT NULL DEFAULT '',
  `comment_body` varchar(255) NOT NULL DEFAULT '',
  `comment_post` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table posts
# ------------------------------------------------------------

CREATE TABLE `posts` (
  `post_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL DEFAULT '',
  `post_body` varchar(255) NOT NULL DEFAULT '',
  `post_slug` varchar(255) NOT NULL,
  `post_cat` int(100) NOT NULL,
  `posted_by` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`post_id`, `post_title`, `post_body`, `post_slug`, `post_cat`, `posted_by`, `created_at`)
VALUES
	(1,'Assumenda harum adipisci deserunt non sit sed occaecati.','Cum quibusdam rerum molestiae nesciunt nulla. Corporis aut ut laborum aut quibusdam molestiae.','',2,1,'2019-01-17 17:00:44'),
	(2,'Aut voluptates quas rerum.','Fuga illo quisquam quia dolorem debitis sit. Rerum ut sed rerum alias. Quia temporibus est et at.','',1,1,'2019-01-17 16:52:21'),
	(3,'Aut error laudantium odio quo voluptatem qui ut.','Dicta laboriosam modi modi nam voluptates. Sapiente quos sit quibusdam nulla cumque. Veniam eligendi architecto voluptas quisquam facere reprehenderit et. Omnis aut debitis reiciendis veritatis eaque quisquam.','',1,1,'2019-01-17 16:52:24'),
	(4,'Cumque reiciendis omnis qui voluptatem numquam architecto.','Ducimus facilis fuga consequuntur placeat dolorem. Id harum deserunt recusandae perferendis illum eveniet asperiores. Quod rerum omnis autem voluptatem corporis quas. Soluta tempora exercitationem autem enim aliquid ut rerum.','',1,1,'2019-01-17 16:52:30'),
	(5,'Quidem suscipit autem fugit ratione eos.','Laudantium necessitatibus ipsum consequuntur nostrum aperiam provident. Nam animi rerum dolores tempora qui sit. Et recusandae iure nemo nihil iure. Illum placeat ad error.','',1,1,'2019-01-17 16:52:33'),
	(6,'Ipsa enim quibusdam sit enim sit qui ea.','Porro eos perferendis fugiat sed cum commodi enim. Eaque fuga a vero fuga. Illum sint inventore aut recusandae deserunt.','',1,1,'2019-01-17 16:52:36'),
	(7,'Non rerum hic neque illo placeat saepe explicabo.','Molestias in eaque laboriosam blanditiis eum numquam. Nostrum nulla omnis dolorem ea architecto numquam. Rerum cum dolor unde voluptas.','',1,1,'2019-01-17 16:52:41'),
	(8,'Consequatur illo id delectus nulla necessitatibus et.','Rerum nisi dolor temporibus recusandae doloribus fugit. Et eligendi eligendi quae autem reiciendis accusantium. Tempore corporis animi aut. Consequatur nihil voluptatem qui qui.','',1,1,'2019-01-17 16:52:44'),
	(9,'Sint officiis sed asperiores nisi aut.','Rerum incidunt dolorum beatae illum dicta. Voluptates repellendus explicabo eius deleniti accusamus. Nihil sit itaque eos ratione. Dolorem a et laudantium optio delectus quia aut explicabo.','',1,1,'2019-01-17 16:52:46'),
	(10,'Fuga impedit est doloribus et aliquid ea ea.','Molestiae consectetur sit quas. Ipsam sit inventore nam velit voluptatibus voluptatem. Sunt at quia at aperiam aliquid. Dolores explicabo sapiente excepturi quibusdam est voluptas voluptatem.','',1,1,'2019-01-17 16:52:49'),
	(11,'Expedita quae consectetur corporis dignissimos.','Deserunt est eveniet facilis numquam reiciendis molestiae dolorum. Delectus nam veniam adipisci optio commodi at. Voluptatem placeat illo dolorem quis saepe atque. Sed magnam sed corporis odio tempore.','',1,1,'2019-01-17 16:52:52');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `password`)
VALUES
	(1,'Ericsson Budhilaw','budhilaw.mail@gmail.com','ceritaeric','$2y$10$twUiLIKveWNTGiGoJ1Suy.yOTHubSrxxvncQQkXu1zFJdIrxM/1ya');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
