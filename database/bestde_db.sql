-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2023 at 10:09 PM
-- Server version: 10.5.18-MariaDB-0+deb11u1-log
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestde_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_18_175459_create_categories_table', 1),
(7, '2023_12_18_175523_create_products_table', 1),
(8, '2023_12_23_102310_create_orders_table', 2),
(9, '2023_12_23_104421_add_column_order_number_on_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `price` double(8,2) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `price`, `product_code`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Gilt Bronze Statue of The Bodhisattva Vajrasattva', 'This gilt bronze statue of Vajrasattva is a museum quality reproduction. Vajrasattva is the Bodhisattva of great purification, mindfulness & learning.\n\nVajrasattva (translating to Thunderbolt being\') is known as Dorje Sempa in Tibetan Buddhism and is commonly seen in Tibetan thangka paintings. He can be seen here sitting atop a lotus throne holding his symbol of thunderbolts, the dorje.\n\nFrom China\n\n \n\n40 x 30 x 70 (wxdxh cms)', 842.00, '001', 1, '2023-12-24 06:18:58', NULL),
(2, 'Vintage Flower Vase', 'This is a vintage flower vase. A Chinese, ceramic Art Deco display urn, dating to the mid 20th century, circa 1940.\n\nCopious decoration captures the Oriental Art Deco taste\nDisplaying a desirable aged patina in good original order\nWhite ceramic in appealing baluster form\nDecorative panels to front and rear with figural court scenes\n\nSide panels host colourful flowerheads upon a dark blue ground with light blue moriage', 1023.28, '002', 1, '2023-12-24 06:28:35', NULL),
(3, 'Pentbuns Love Birds swan Pair', 'Pentbuns Love Birds swan Pair Made of Metal Polished Golden Decorative Showpiece, Brass Pair of Kissing Duck Showpiece, 11 in, Gold, 2 Piece', 348.64, '003', 1, '2023-12-24 06:33:09', NULL),
(4, 'Elephant Gift Living Room Entrance Shelf Decorations 2 Pack', 'Lucky Blue Feng Shui Elephant Statues represent good luck, strength, wisdom, housewarming, office decor, living room and bedroom, shelf, table top decoration, a pair of elegant elephant figurines are birthday, wedding, easter, The perfect gift for Valentine\'s Day, Thanksgiving, Christmas and New Year holidays or any other occasion.', 133.99, '004', 1, '2023-12-24 06:37:04', NULL),
(5, 'African Lady Figurines ', 'This African statue measures 9.4”x4.7”x4.1”,the African lady figure is lifting a water tank with tranquil cross-legged pose.The measurement for water tank is 1.26”(diameter)/0.79”(depth).The African statues and sculptures is perfect for housewarming and will add a great addition to your African home decor.', 121.33, '005', 1, '2023-12-24 06:40:02', NULL),
(6, 'Barro Negro Owl Handcrafted', 'Discover the enigmatic charm of this extraordinary one-of-a-kind Black Clay Owl from Oaxaca.\n\nStanding at 9.5\" in height, 6\" in width, and 5\" in depth, this mesmerizing piece showcases the artistry of Oaxacan artisans and their mastery of the barro negro technique.', 113.78, '006', 1, '2023-12-24 06:46:34', NULL),
(7, 'HOWFIELD Owl Craft Statues Home Decor', 'This owl sculpture made of natural resin, this material makes the shape of the statue smooth and very pleasant to touch, and it is not easy to wear and scratch, Which ensures the longevity of this statue.', 79.66, '007', 1, '2023-12-24 06:49:32', NULL),
(8, 'White and Silver Center Pieces Decoration for Table', 'Decorate your interior space with this beautiful Abstract Art Ceramic White and Silver flame statue, Take your interior decoration to another level. Creative abstract art sculpture with a design inspired by the burning flame, The meaning of the flame: a symbol of civilization, representing the burning of knowledge, ideals and passion. it Through the form of art - become one of the most popular artworks for aesthetic room decoration.', 58.14, '008', 1, '2023-12-24 06:53:12', NULL),
(9, 'Natural Or White Animal Themed Soapstone Sculpture', 'Natural Or White Animal Themed Soapstone Sculpture, Elephant Royalty', 155.88, '009', 1, '2023-12-24 06:55:11', NULL),
(10, 'Drop Glass Vase Hippie Red/Yellow Canes', 'Measures: Decorative hand blown drop glass vase model low, perfect for flowers and home decor measuring 9.8 inches height x 6.3 inches width\nArt Glass: Perfect to complete the home decor with elegance. This product can be used alone or with flowers and arrangements', 429.22, '010', 1, '2023-12-24 06:57:41', NULL),
(11, 'Sandstone Elephant', 'The elephant is a symbol for power, dignity, intelligence and peace\nA unique ornament for home, collectable items and also a splendid idea as a gift since it immaculately combines artistic detail, finesse and exceptional character\nThe perfect state-of-art -- so exquisite to carefully design every single detail', 59.44, '011', 1, '2023-12-24 07:00:25', NULL),
(12, '3 Pack Chess Statue Ornaments King Queen Knight Sculpture Resin', 'Chess Decoration : The set can be used as a decorative display piece, Perfect decoration on desktop, wine cabinet, TV cabinet, bookshelf, coffee table and more.\nRetro and Creative Decoration : Inspired by chess, golden paint is painted with a mottled effect, creating a retro style.\nGreat Gift Idea : Gift ideas for chess fanatic, Great gifts for housewarmings, birthday, Christmas, or a special piece for business occasions.etc.', 89.42, '012', 1, '2023-12-24 07:03:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
