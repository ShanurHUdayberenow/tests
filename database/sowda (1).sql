-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 24 2021 г., 12:44
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sowda`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `subsubcategoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `name_tm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_ru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_tr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attributes`
--

INSERT INTO `attributes` (`id`, `categoryId`, `subcategoryId`, `subsubcategoryId`, `name_tm`, `created_at`, `updated_at`, `name_ru`, `name_en`, `name_tr`) VALUES
(1, 1, 1, 1, 'razmer', '2021-06-03 08:13:25', '2021-06-03 08:13:25', 'razmer', 'razmer', 'razmer'),
(2, 2, 2, 2, 'Ýad', '2021-06-05 00:51:39', '2021-06-05 00:51:39', 'Ýad', 'Ýad', 'Ýad'),
(3, 1, 1, 1, 'Caga esikleri', '2021-09-19 09:01:23', '2021-09-19 09:01:23', 'одежда ребенки', 'children wear', 'Caga esikleri');

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attributeId` bigint(20) UNSIGNED NOT NULL,
  `value_tm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `value_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_tr` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_ru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attributeId`, `value_tm`, `created_at`, `updated_at`, `value_en`, `value_tr`, `value_ru`) VALUES
(1, 1, '30', '2021-06-03 08:13:25', '2021-06-03 08:13:25', '', '', ''),
(2, 1, '35', '2021-06-03 08:13:25', '2021-06-03 08:13:25', '', '', ''),
(3, 2, '2 GB', '2021-06-05 00:51:39', '2021-06-05 00:51:39', '', '', ''),
(4, 2, '4 GB', '2021-06-05 00:51:39', '2021-06-05 00:51:39', '', '', ''),
(5, 3, 'esik 1', '2021-09-19 09:01:23', '2021-09-19 09:01:23', 'esik 2', 'esik 4', 'esik 3'),
(6, 3, 'esik 5', '2021-09-19 09:01:23', '2021-09-19 09:01:23', 'esik 7', 'esik 8', 'esik 6');

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'http://localhost:8000/storage/images/banners/1636897219.png', 'qwertyus', '2021-06-10 01:03:02', '2021-11-14 08:40:19'),
(2, 'http://localhost:8000/storage/images/banners/1636897195.png', NULL, '2021-06-10 01:03:15', '2021-11-14 08:39:55');

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `shopProductId` bigint(20) UNSIGNED NOT NULL,
  `quantity` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_tr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name_tm`, `name_ru`, `image`, `slug`, `created_at`, `updated_at`, `file_name`, `name_en`, `name_tr`) VALUES
(1, 'computer', 'computer', 'http://localhost:8000/storage/images/categories/1637485016.png', 'computer', '2021-11-21 03:56:57', '2021-11-21 03:56:57', '1637485016.png', 'computer', 'computer'),
(2, 'himiya', 'himiya', 'http://localhost:8000/storage/images/categories/1637485236.png', 'himiya', '2021-11-21 04:00:36', '2021-11-21 04:00:36', '1637485236.png', 'himiya', 'himiya');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_03_131753_create_categories_table', 1),
(5, '2021_05_04_092149_create_subcategories_table', 1),
(6, '2021_05_04_092150_create_subsubcategories_table', 1),
(7, '2021_05_04_105743_add_info_to_users_table', 1),
(8, '2021_05_04_110416_create_shops_table', 1),
(9, '2021_05_04_111952_add_phone_to_users', 1),
(10, '2021_05_04_112137_add_user_id_to_shops_table', 1),
(11, '2021_05_04_112327_create_shop_categories_table', 1),
(12, '2021_05_04_112730_create_orders_table', 1),
(13, '2021_05_04_113735_create_order_lines_table', 1),
(14, '2021_05_04_114143_create_products_table', 1),
(15, '2021_05_04_114305_create_variation_groups_table', 1),
(16, '2021_05_04_114452_create_attributes_table', 1),
(17, '2021_05_04_114710_add_category_id_to_subcategories_table', 1),
(18, '2021_05_04_114711_create_shop_products_table', 1),
(19, '2021_05_04_120826_create_attribute_values_table', 1),
(20, '2021_05_04_120839_create_carts_table', 1),
(21, '2021_05_04_121130_create_user_discounts_table', 1),
(22, '2021_05_04_121154_create_spetifications_table', 1),
(23, '2021_05_04_122913_create_rates_table', 1),
(24, '2021_05_04_123125_create_settings_table', 1),
(25, '2021_05_04_130010_add_shopId_to_shop_products_table', 1),
(26, '2021_05_12_122512_add_file_name_to_categories', 2),
(27, '2021_05_15_090318_add_file_name_to_categories_table', 3),
(28, '2021_05_15_090355_add_file_name_to_subcategories_table', 3),
(29, '2021_05_15_090705_add_file_name_to_subcategories', 4),
(30, '2021_05_15_115523_add_file_name_to_subsubcategories', 5),
(31, '2021_05_15_132014_add_attribute_name_ru_to_attributes', 6),
(32, '2021_05_17_122851_add_name_ru_to_attribute_values', 7),
(33, '2021_05_20_093941_create_units_table', 8),
(34, '2021_05_20_095309_create_products_table', 9),
(35, '2021_05_20_122428_add_file_name_to_products', 10),
(36, '2021_05_20_191158_add_name_ru_to_variation_groups', 11),
(37, '2021_05_21_104822_add_name_ru_to_units', 12),
(38, '2021_05_21_105828_create_units_table', 13),
(47, '2021_05_27_120537_add_name_en_name_tr_to_categories', 14),
(48, '2021_05_27_120735_add_name_en_name_tr_to_subcategories', 15),
(49, '2021_05_27_120905_add_name_en_name_tr_to_subsubcategories', 15),
(50, '2021_05_27_122838_add_name_en_name_tr_to_attributes', 16),
(51, '2021_05_27_123143_add_name_en_name_tr_to_products', 17),
(52, '2021_05_27_123433_add_name_en_name_tr_to_units', 18),
(53, '2021_05_27_123842_add_short_name_en_to_units', 19),
(54, '2021_05_27_130728_add_description_en_to_products', 20),
(55, '2021_06_02_112234_create_image_uploads_table', 20),
(56, '2021_06_03_074426_add_filename_to_users', 21),
(57, '2021_06_03_074623_add_avatar_to_users', 21),
(58, '2021_05_04_121154_create_specifications_table', 22),
(59, '2021_06_04_104941_add_status_to_shops', 22),
(60, '2021_06_07_133612_add_lang_to_attrbiute_values', 23),
(61, '2021_06_08_104359_add_slug_to_products', 23),
(62, '2021_06_08_115520_create_banners_table', 23),
(63, '2021_06_10_060116_create_banners_table', 24),
(64, '2021_06_17_071707_create_shop_prodcut_units_table', 25),
(65, '2021_06_17_113733_add_search_text_to_shops', 25),
(66, '2021_06_18_064854_add_owner_name_to_shops', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_lines`
--

CREATE TABLE `order_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` bigint(20) UNSIGNED NOT NULL,
  `shopProductId` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `subcategoryId` bigint(20) UNSIGNED NOT NULL,
  `subsubcategoryId` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `name_tm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_tm` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `variationGroupId` bigint(20) UNSIGNED DEFAULT NULL,
  `unitId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_tr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `searchText` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_tr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `categoryId`, `subcategoryId`, `subsubcategoryId`, `images`, `name_tm`, `name_ru`, `description_tm`, `description_ru`, `variationGroupId`, `unitId`, `created_at`, `updated_at`, `name_en`, `name_tr`, `searchText`, `description_en`, `description_tr`, `slug`) VALUES
(1, 2, 2, 2, '[{\"image\":\"http:\\/\\/localhost:8000\\/storage\\/images\\/products\\/SRxIT4GPka5fBfeqenYbI0Ni5XHKyxgTlhLJ3Lgg.png\",\"filename\":\"SRxIT4GPka5fBfeqenYbI0Ni5XHKyxgTlhLJ3Lgg.png\"}]', 'sabyn', 'sabyn', 'sabyn', 'sabyn', NULL, 1, '2021-11-21 04:03:46', '2021-11-21 04:03:46', 'sabyn', 'sabyn', 'sabynsabynsabynsabynsabynsabynsabyn', 'sabyn', 'sabyn', 'sabyn');

-- --------------------------------------------------------

--
-- Структура таблицы `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rates`
--

INSERT INTO `rates` (`id`, `date`, `rate`, `created_at`, `updated_at`) VALUES
(1, '2021-06-05', 35, '2021-06-05 06:13:03', '2021-06-05 06:13:03'),
(2, '2021-06-29', 37, '2021-06-29 07:09:16', '2021-06-29 07:09:16');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mainCurrencySymbol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainCurrencyCode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainCurrencyName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainCurrencyFractionalUnit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainCurrencyFractionalSymbol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reportCurrencySymbol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reportCurrencyCode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reportCurrencyName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reportCurrencyFractionalUnit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reportCurrencyFractionalSymbol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `mainCurrencySymbol`, `mainCurrencyCode`, `mainCurrencyName`, `mainCurrencyFractionalUnit`, `mainCurrencyFractionalSymbol`, `reportCurrencySymbol`, `reportCurrencyCode`, `reportCurrencyName`, `reportCurrencyFractionalUnit`, `reportCurrencyFractionalSymbol`, `created_at`, `updated_at`) VALUES
(1, 'qwerty', 'qwerty', 'qwerty', 'qwerty', 'qwerty', 'qwerty', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '2021-06-05 06:16:29', '2021-06-05 06:16:29');

-- --------------------------------------------------------

--
-- Структура таблицы `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('approved','unapproved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `searchText` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopOwnerName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopOwnerPhone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shops`
--

INSERT INTO `shops` (`id`, `name`, `slug`, `images`, `description`, `address`, `phoneNumber`, `email`, `created_at`, `updated_at`, `userId`, `status`, `searchText`, `shopOwnerName`, `shopOwnerPhone`) VALUES
(1, 'Kamil market', 'kamil-market', 'http://localhost:8000/storage/images/shops/shop.jpg', 'Dukan', 'dukan', '+993 12-56-89-45', 'dukan@mail.com', NULL, '2021-11-21 11:44:40', 1, 'approved', '', '', ''),
(2, 'awtoyoly', 'awtoyoly', 'http://localhost:8000/storage/images/shops/shops.jpg', 'Dukan', 'dukan', '+993 12-45-56-78', 'dukan@gmail.com', NULL, '2021-11-21 07:06:13', 1, 'approved', '', '', ''),
(3, 'dukan', 'dukan', 'http://localhost:8000/storage/images/shops/shop.jpg', 'dukan', 'dukan', '123456789', 'dukan@gmail.com', NULL, '2021-11-21 11:44:41', 1, 'approved', 'dukan', 'dukan', 'dukan'),
(4, 'dukan', 'dukan', NULL, 'dukan', 'dukan', '+99363194471', 'dukan@gmail.com', '2021-11-21 06:50:33', '2021-11-22 10:18:25', NULL, 'unapproved', 'dukandukan@gmail.com', 'dukan', '+99363194471');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `subcategoryId` bigint(20) UNSIGNED NOT NULL,
  `subsubcategoryId` bigint(20) UNSIGNED NOT NULL,
  `shopId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `shop_prodcut_units`
--

CREATE TABLE `shop_prodcut_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopProductId` int(10) UNSIGNED NOT NULL,
  `unitId` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `multiply` double NOT NULL,
  `isDouble` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `shop_products`
--

CREATE TABLE `shop_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `discount` double NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shop_products`
--

INSERT INTO `shop_products` (`id`, `shopId`, `productId`, `discount`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 25, 24, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `specifications`
--

CREATE TABLE `specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attributeId` bigint(20) UNSIGNED NOT NULL,
  `attributeValueId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specifications`
--

INSERT INTO `specifications` (`id`, `attributeId`, `attributeValueId`, `productId`, `created_at`, `updated_at`) VALUES
(6, 2, 4, 4, '2021-11-17 10:45:29', '2021-11-17 10:45:29'),
(7, 2, 3, 1, '2021-11-17 12:34:40', '2021-11-17 12:34:40'),
(8, 2, 3, 1, '2021-11-21 04:03:46', '2021-11-21 04:03:46');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_tr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_tm`, `name_ru`, `image`, `slug`, `created_at`, `updated_at`, `categoryId`, `file_name`, `name_en`, `name_tr`) VALUES
(1, 'esikler', 'esikler', 'http://localhost:8000/storage/images/subcategories/1637485100.png', 'esikler', '2021-11-21 03:58:20', '2021-11-21 03:58:20', 1, '1637485100.png', 'esikler', 'esikler'),
(2, 'himiya', 'himiya', 'http://localhost:8000/storage/images/subcategories/1637485310.png', 'himiya', '2021-11-21 04:01:50', '2021-11-21 04:01:50', 2, '1637485310.png', 'himiya', 'himiya');

-- --------------------------------------------------------

--
-- Структура таблицы `subsubcategories`
--

CREATE TABLE `subsubcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `subcategoryId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_tr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subsubcategories`
--

INSERT INTO `subsubcategories` (`id`, `name_tm`, `name_ru`, `image`, `slug`, `categoryId`, `subcategoryId`, `created_at`, `updated_at`, `file_name`, `name_en`, `name_tr`) VALUES
(1, 'esikler', 'esikler', 'http://localhost:8000/storage/images/subsubcategories/1637485156.png', 'esikler', 1, 1, '2021-11-21 03:59:16', '2021-11-21 03:59:16', '1637485156.png', 'esikler', 'esikler'),
(2, 'himiya', 'himiya', 'http://localhost:8000/storage/images/subsubcategories/1637485344.png', 'himiya', 2, 2, '2021-11-21 04:02:24', '2021-11-21 04:02:24', '1637485344.png', 'himiya', 'himiya');

-- --------------------------------------------------------

--
-- Структура таблицы `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortName_tm` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortName_ru` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_tr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortName_en` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortName_tr` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `units`
--

INSERT INTO `units` (`id`, `name_tm`, `name_ru`, `shortName_tm`, `shortName_ru`, `created_at`, `updated_at`, `name_en`, `name_tr`, `shortName_en`, `shortName_tr`) VALUES
(1, 'Kilograms', 'Килограм', 'Kg', 'Кг', '2021-05-29 05:54:06', '2021-05-30 04:20:24', '', '', '', ''),
(3, 'Gigabite', 'Gigabite', 'Gb', 'Gb', '2021-06-05 01:46:26', '2021-06-05 01:46:26', 'Gigabite', 'Gigabite', 'Gb', 'Gb');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','seller','standard') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `phoneNumber`, `filename`, `avatar`) VALUES
(1, 'Admin', 'admin@sowda.net', '2021-08-04 06:23:48', '$2y$10$0L025U2R1SguPCeq8bNf2ut/Kf89cQO7Xc3x5U6m4YQDk6LF2r3Ei', 'EOHxljmpPP1d1HqSpxkuUXlGKF8Ujd7XEBXjE9I4pv818jDha3rp0BwVadoj', '2021-08-04 06:23:48', '2021-10-06 13:59:42', 'admin', '65656565', 'uoCUb88QsMnMqDY6PzuvSKJ9wVryfSohRMqv6mFq.jpg', 'http://localhost:8000/storage/images/avatars/uoCUb88QsMnMqDY6PzuvSKJ9wVryfSohRMqv6mFq.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user_discounts`
--

CREATE TABLE `user_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopProductId` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `discount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `variation_groups`
--

CREATE TABLE `variation_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `variation_groups`
--

INSERT INTO `variation_groups` (`id`, `created_at`, `updated_at`) VALUES
(1, '2021-06-03 08:16:19', '2021-06-03 08:16:19'),
(2, '2021-06-04 01:29:11', '2021-06-04 01:29:11'),
(3, '2021-11-17 10:45:29', '2021-11-17 10:45:29');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributes_categoryid_foreign` (`categoryId`),
  ADD KEY `attributes_subcategoryid_foreign` (`subcategoryId`),
  ADD KEY `attributes_subsubcategoryid_foreign` (`subsubcategoryId`);

--
-- Индексы таблицы `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attributeid_foreign` (`attributeId`);

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_shopproductid_foreign` (`shopProductId`),
  ADD KEY `carts_userid_foreign` (`userId`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_userid_foreign` (`userId`);

--
-- Индексы таблицы `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_categoryid_foreign` (`categoryId`),
  ADD KEY `products_subcategoryid_foreign` (`subcategoryId`),
  ADD KEY `products_subsubcategoryid_foreign` (`subsubcategoryId`),
  ADD KEY `products_groupid_foreign` (`variationGroupId`),
  ADD KEY `products_unitid_foreign` (`unitId`);

--
-- Индексы таблицы `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_userid_foreign` (`userId`);

--
-- Индексы таблицы `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_categories_categoryid_foreign` (`categoryId`),
  ADD KEY `shop_categories_subcategoryid_foreign` (`subcategoryId`),
  ADD KEY `shop_categories_subsubcategoryid_foreign` (`subsubcategoryId`),
  ADD KEY `shop_categories_shopid_foreign` (`shopId`);

--
-- Индексы таблицы `shop_prodcut_units`
--
ALTER TABLE `shop_prodcut_units`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_products_shopid_foreign` (`shopId`),
  ADD KEY `shop_products_productid_foreign` (`productId`);

--
-- Индексы таблицы `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specifications_attributeid_foreign` (`attributeId`),
  ADD KEY `specifications_attributevalueid_foreign` (`attributeValueId`),
  ADD KEY `specifications_productid_foreign` (`productId`);

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_categoryid_foreign` (`categoryId`);

--
-- Индексы таблицы `subsubcategories`
--
ALTER TABLE `subsubcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subsubcategories_categoryid_foreign` (`categoryId`),
  ADD KEY `subsubcategories_subcategoryid_foreign` (`subcategoryId`);

--
-- Индексы таблицы `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_discounts`
--
ALTER TABLE `user_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_discounts_shopproductid_foreign` (`shopProductId`),
  ADD KEY `user_discounts_userid_foreign` (`userId`);

--
-- Индексы таблицы `variation_groups`
--
ALTER TABLE `variation_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `shop_prodcut_units`
--
ALTER TABLE `shop_prodcut_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subsubcategories`
--
ALTER TABLE `subsubcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_discounts`
--
ALTER TABLE `user_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `variation_groups`
--
ALTER TABLE `variation_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `attributes_subcategoryid_foreign` FOREIGN KEY (`subcategoryId`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `attributes_subsubcategoryid_foreign` FOREIGN KEY (`subsubcategoryId`) REFERENCES `subsubcategories` (`id`);

--
-- Ограничения внешнего ключа таблицы `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attributeid_foreign` FOREIGN KEY (`attributeId`) REFERENCES `attributes` (`id`);

--
-- Ограничения внешнего ключа таблицы `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_shopproductid_foreign` FOREIGN KEY (`shopProductId`) REFERENCES `shop_products` (`id`),
  ADD CONSTRAINT `carts_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_groupid_foreign` FOREIGN KEY (`variationGroupId`) REFERENCES `variation_groups` (`id`),
  ADD CONSTRAINT `products_subcategoryid_foreign` FOREIGN KEY (`subcategoryId`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `products_subsubcategoryid_foreign` FOREIGN KEY (`subsubcategoryId`) REFERENCES `subsubcategories` (`id`),
  ADD CONSTRAINT `products_unitid_foreign` FOREIGN KEY (`unitId`) REFERENCES `units` (`id`);

--
-- Ограничения внешнего ключа таблицы `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD CONSTRAINT `shop_categories_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `shop_categories_shopid_foreign` FOREIGN KEY (`shopId`) REFERENCES `shops` (`id`),
  ADD CONSTRAINT `shop_categories_subcategoryid_foreign` FOREIGN KEY (`subcategoryId`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `shop_categories_subsubcategoryid_foreign` FOREIGN KEY (`subsubcategoryId`) REFERENCES `subsubcategories` (`id`);

--
-- Ограничения внешнего ключа таблицы `shop_products`
--
ALTER TABLE `shop_products`
  ADD CONSTRAINT `shop_products_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `shop_products_shopid_foreign` FOREIGN KEY (`shopId`) REFERENCES `shops` (`id`);

--
-- Ограничения внешнего ключа таблицы `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `specifications_attributeid_foreign` FOREIGN KEY (`attributeId`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `specifications_attributevalueid_foreign` FOREIGN KEY (`attributeValueId`) REFERENCES `attribute_values` (`id`),
  ADD CONSTRAINT `specifications_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `subsubcategories`
--
ALTER TABLE `subsubcategories`
  ADD CONSTRAINT `subsubcategories_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `subsubcategories_subcategoryid_foreign` FOREIGN KEY (`subcategoryId`) REFERENCES `subcategories` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_discounts`
--
ALTER TABLE `user_discounts`
  ADD CONSTRAINT `user_discounts_shopproductid_foreign` FOREIGN KEY (`shopProductId`) REFERENCES `shop_products` (`id`),
  ADD CONSTRAINT `user_discounts_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
