-- -------------------------------------------------------------
-- TablePlus 5.6.0(514)
--
-- https://tableplus.com/
--
-- Database: bestdecorstore
-- Generation Time: 2566-12-28 00:15:42.2790
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `price_from` double(8,2) DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `is_highlight` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_18_175459_create_categories_table', 1),
(7, '2023_12_18_175523_create_products_table', 1),
(8, '2023_12_23_102310_create_orders_table', 2),
(9, '2023_12_23_104421_add_column_order_number_on_orders_table', 2),
(11, '2023_12_24_093147_create_order_items_table', 3),
(12, '2023_12_25_143341_add_hightlight_discount_price_to_products_table', 3);

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2023-12-27 17:14:20', NULL),
(2, 1, 6, 1, '2023-12-27 17:14:20', NULL),
(3, 1, 8, 1, '2023-12-27 17:14:20', NULL),
(4, 1, 5, 1, '2023-12-27 17:14:20', NULL);

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '0', '2023-12-27 17:14:20', NULL);

INSERT INTO `products` (`id`, `product_name`, `product_description`, `price`, `price_from`, `product_code`, `category_id`, `is_highlight`, `created_at`, `updated_at`) VALUES
(1, 'Gilt Bronze Statue of The Bodhisattva Vajrasattva', 'This gilt bronze statue of Vajrasattva is a museum quality reproduction. Vajrasattva is the Bodhisattva of great purification, mindfulness & learning.\n\nVajrasattva (translating to Thunderbolt being\') is known as Dorje Sempa in Tibetan Buddhism and is commonly seen in Tibetan thangka paintings. He can be seen here sitting atop a lotus throne holding his symbol of thunderbolts, the dorje.\n\nFrom China\n\n \n\n40 x 30 x 70 wxdxh cms', 842.00, 869.55, '001', 1, 1, '2023-12-24 13:18:58', NULL),
(2, 'Vintage Flower Vase', 'This is a vintage flower vase. A Chinese, ceramic Art Deco display urn, dating to the mid 20th century, circa 1940.\n\nCopious decoration captures the Oriental Art Deco taste\nDisplaying a desirable aged patina in good original order\nWhite ceramic in appealing baluster form\nDecorative panels to front and rear with figural court scenes\n\nSide panels host colourful flowerheads upon a dark blue ground with light blue moriage', 1023.28, 1187.99, '002', 1, 1, '2023-12-24 13:28:35', NULL),
(3, 'Pentbuns Love Birds swan Pair', 'Pentbuns Love Birds swan Pair Made of Metal Polished Golden Decorative Showpiece, Brass Pair of Kissing Duck Showpiece, 11 in, Gold, 2 Piece', 348.64, 415.54, '003', 1, 1, '2023-12-24 13:33:09', NULL),
(4, 'Elephant Gift Living Room Entrance Shelf Decorations 2 Pack', 'Lucky Blue Feng Shui Elephant Statues represent good luck, strength, wisdom, housewarming, office decor, living room and bedroom, shelf, table top decoration, a pair of elegant elephant figurines are birthday, wedding, easter, The perfect gift for Valentine\'s Day, Thanksgiving, Christmas and New Year holidays or any other occasion.', 133.99, NULL, '004', 1, 0, '2023-12-24 13:37:04', NULL),
(5, 'African Lady Figurines ', 'This African statue measures 9.4”x4.7”x4.1”,the African lady figure is lifting a water tank with tranquil cross-legged pose.The measurement for water tank is 1.26”(diameter)/0.79”(depth).The African statues and sculptures is perfect for housewarming and will add a great addition to your African home decor.', 121.33, NULL, '005', 1, 0, '2023-12-24 13:40:02', NULL),
(6, 'Barro Negro Owl Handcrafted', 'Discover the enigmatic charm of this extraordinary one-of-a-kind Black Clay Owl from Oaxaca.\n\nStanding at 9.5\" in height, 6\" in width, and 5\" in depth, this mesmerizing piece showcases the artistry of Oaxacan artisans and their mastery of the barro negro technique.', 113.78, NULL, '006', 1, 0, '2023-12-24 13:46:34', NULL),
(7, 'HOWFIELD Owl Craft Statues Home Decor', 'This owl sculpture made of natural resin, this material makes the shape of the statue smooth and very pleasant to touch, and it is not easy to wear and scratch, Which ensures the longevity of this statue.', 79.66, NULL, '007', 1, 0, '2023-12-24 13:49:32', NULL),
(8, 'White and Silver Center Pieces Decoration for Table', 'Decorate your interior space with this beautiful Abstract Art Ceramic White and Silver flame statue, Take your interior decoration to another level. Creative abstract art sculpture with a design inspired by the burning flame, The meaning of the flame: a symbol of civilization, representing the burning of knowledge, ideals and passion. it Through the form of art - become one of the most popular artworks for aesthetic room decoration.', 58.14, 68.88, '008', 1, 0, '2023-12-24 13:53:12', NULL),
(9, 'Natural Or White Animal Themed Soapstone Sculpture', 'Natural Or White Animal Themed Soapstone Sculpture, Elephant Royalty', 155.88, NULL, '009', 1, 0, '2023-12-24 13:55:11', NULL),
(10, 'Drop Glass Vase Hippie Red/Yellow Canes', 'Measures: Decorative hand blown drop glass vase model low, perfect for flowers and home decor measuring 9.8 inches height x 6.3 inches width\nArt Glass: Perfect to complete the home decor with elegance. This product can be used alone or with flowers and arrangements', 429.22, NULL, '010', 1, 0, '2023-12-24 13:57:41', NULL),
(11, 'Sandstone Elephant', 'The elephant is a symbol for power, dignity, intelligence and peace\nA unique ornament for home, collectable items and also a splendid idea as a gift since it immaculately combines artistic detail, finesse and exceptional character\nThe perfect state-of-art -- so exquisite to carefully design every single detail', 59.44, 82.56, '011', 1, 0, '2023-12-24 14:00:25', NULL),
(12, '3 Pack Chess Statue Ornaments King Queen Knight Sculpture Resin', 'Chess Decoration : The set can be used as a decorative display piece, Perfect decoration on desktop, wine cabinet, TV cabinet, bookshelf, coffee table and more.\nRetro and Creative Decoration : Inspired by chess, golden paint is painted with a mottled effect, creating a retro style.\nGreat Gift Idea : Gift ideas for chess fanatic, Great gifts for housewarmings, birthday, Christmas, or a special piece for business occasions.etc.', 89.42, NULL, '012', 1, 0, '2023-12-24 14:03:52', NULL);

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `address2`, `city`, `state`, `country`, `zipcode`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asdf asdf', 'ateet@fdsf.com', '23123', 'asdf', 'asdf', 'asdf', 'adsf', 'Thailand (ไทย)', '231', 0, NULL, NULL, NULL, '2023-12-27 17:14:20', NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;