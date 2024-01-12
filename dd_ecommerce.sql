-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 12 2024 г., 09:43
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dd_ecommerce`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `description_tm` text NOT NULL,
  `description_ru` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `about_us`
--

INSERT INTO `about_us` (`id`, `name_tm`, `name_ru`, `description_tm`, `description_ru`, `created_at`, `updated_at`, `image`) VALUES
(1, 'WELCOME TO UREN\'S STORE!', 'WELCOME TO UREN\'S STORE!', 'We Provide Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae nisi fuga facilis, consequuntur, maiores eveniet voluptatum, omnis possimus temporibus aspernatur nobis animi in exercitationem vitae nulla! Adipisci ullam illum quisquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, nulla veniam? Magni aliquid asperiores magnam. Veniam ex tenetur.', 'We Provide Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae nisi fuga facilis, consequuntur, maiores eveniet voluptatum, omnis possimus temporibus aspernatur nobis animi in exercitationem vitae nulla! Adipisci ullam illum quisquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, nulla veniam? Magni aliquid asperiores magnam. Veniam ex tenetur.', '2022-11-27 16:48:08', '2022-11-27 16:48:08', 'http://localhost:8000/storage/images/banners/1669574888.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `subsubcategoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `name_tm` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_ru` varchar(50) NOT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `name_tr` varchar(100) DEFAULT NULL,
  `brandId` int(255) DEFAULT NULL,
  `pacetId` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attributes`
--

INSERT INTO `attributes` (`id`, `categoryId`, `subcategoryId`, `subsubcategoryId`, `name_tm`, `created_at`, `updated_at`, `name_ru`, `name_en`, `name_tr`, `brandId`, `pacetId`) VALUES
(1, 3, 10, NULL, 'ÝAD', '2022-03-05 09:17:57', '2022-03-05 09:17:57', 'ÝAD', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attributeId` bigint(20) UNSIGNED NOT NULL,
  `value_tm` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `value_en` varchar(50) DEFAULT NULL,
  `value_tr` varchar(50) DEFAULT NULL,
  `value_ru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attributeId`, `value_tm`, `created_at`, `updated_at`, `value_en`, `value_tr`, `value_ru`) VALUES
(1, 1, '2 TB', '2022-03-05 09:17:57', '2022-03-05 09:17:57', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(1000) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(12, 'http://akyllyenjam.com.tm/storage/images/banners/1672032306.jpg', 'active', '2022-03-01 04:32:18', '2022-12-26 05:25:06'),
(20, 'http://akyllyenjam.com.tm/storage/images/banners/1675144686.jpg', NULL, '2022-12-22 16:33:54', '2023-01-31 05:58:06'),
(22, 'http://akyllyenjam.com.tm/storage/images/banners/1672030276.jpg', NULL, '2022-12-26 04:51:16', '2022-12-26 04:51:16'),
(23, 'http://akyllyenjam.com.tm/storage/images/banners/1672032765.jpg', NULL, '2022-12-26 04:51:43', '2022-12-26 05:32:45'),
(24, 'http://akyllyenjam.com.tm/storage/images/banners/1672030314.jpg', NULL, '2022-12-26 04:51:54', '2022-12-26 04:51:54');

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_ru` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` enum('unapproved','approved') NOT NULL,
  `description_tm` text NOT NULL,
  `description_ru` text NOT NULL,
  `description_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `quantity` double NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `userId`, `productId`, `quantity`, `created_at`, `updated_at`, `code`) VALUES
(5, 17, 768, 1, NULL, NULL, 'ST00265'),
(6, 17, 739, 1, NULL, NULL, 'ST00751'),
(7, 17, 737, 1, NULL, NULL, 'ST00749');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(100) NOT NULL,
  `name_ru` varchar(100) NOT NULL,
  `images` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `name_tr` varchar(100) DEFAULT NULL,
  `number` int(255) DEFAULT NULL,
  `status` enum('approved','unapproved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name_tm`, `name_ru`, `images`, `slug`, `created_at`, `updated_at`, `file_name`, `name_en`, `name_tr`, `number`, `status`) VALUES
(1, 'PPR turba we birikdirijiler', 'PPR трубы и фитинги', '[{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/OjQwDTpHido7spbRNKbIosSTuytyM8XT2DkRwOsw.png\",\"filename\":\"OjQwDTpHido7spbRNKbIosSTuytyM8XT2DkRwOsw.png\"},{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/w4ZdoRMcDUuTVuqj7qrinr0cIUhlfOI9ySijcH5Q.png\",\"filename\":\"w4ZdoRMcDUuTVuqj7qrinr0cIUhlfOI9ySijcH5Q.png\"}]', 'PPR Pilsa Wavin', '2022-11-09 03:39:55', '2023-01-18 04:58:45', '1667983195.png', 'PPR pipes and fittings', NULL, 4, 'approved'),
(2, 'PVC turba we birikdirijiler', 'PVC трубы и фитинги', '[{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/Xbd7405QPshLu0XkUfpILSVao0rVME7Xz9YT5K5o.png\",\"filename\":\"Xbd7405QPshLu0XkUfpILSVao0rVME7Xz9YT5K5o.png\"},{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/yYmKpSDpx14Sdx74QlSSHZpOHwjtJz74MfCCp8H1.png\",\"filename\":\"yYmKpSDpx14Sdx74QlSSHZpOHwjtJz74MfCCp8H1.png\"}]', 'PVC Pilsa Wavin', '2022-11-09 03:40:15', '2023-01-18 04:58:12', '1667983215.png', 'PVC pipes and fittings', NULL, 5, 'approved'),
(3, 'Aksessuarlar', 'Аксессуары', '[{\"image\":\"https:\\/\\/akylly-enjam.nokatonline.com\\/storage\\/images\\/products\\/uwsurtqbAi4x3lvyH8CNLSSwpnZtTrRPcuimxJR0.png\",\"filename\":\"uwsurtqbAi4x3lvyH8CNLSSwpnZtTrRPcuimxJR0.png\"},{\"image\":\"https:\\/\\/akylly-enjam.nokatonline.com\\/storage\\/images\\/products\\/iudyBBXqBF2QSVdn5YMD3X2uPHSjBusC4rCOykIu.png\",\"filename\":\"iudyBBXqBF2QSVdn5YMD3X2uPHSjBusC4rCOykIu.png\"}]', 'Aksessuarlar', '2022-11-09 03:40:35', '2022-12-08 01:01:57', '1667983235.png', 'Accessories', NULL, 8, 'approved'),
(4, 'Kombiler', 'Газовые котлы', '[{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/NS4OFMde6DvMiGiBlSLAy62lG6Mi32xxYkcciYnn.png\",\"filename\":\"NS4OFMde6DvMiGiBlSLAy62lG6Mi32xxYkcciYnn.png\"},{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/WKp4f4DNtNYYctZqweGnRUOxLffFnFlVkCEMfRwc.png\",\"filename\":\"WKp4f4DNtNYYctZqweGnRUOxLffFnFlVkCEMfRwc.png\"}]', 'demirdokum', '2022-11-09 03:40:55', '2023-01-14 09:07:51', '1667983255.png', 'Gas boilers', NULL, 1, 'approved'),
(5, 'Radiator we guradyjylar', 'Радиаторы и полотенцесушители', '[{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/izo55TfkyEoYK7yTpZiU0bq5n2d19oftgrCoZu0m.png\",\"filename\":\"izo55TfkyEoYK7yTpZiU0bq5n2d19oftgrCoZu0m.png\"},{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/LQE731nMBRDOrn0VEIEVGk97VBkErzxTEgiufjwy.png\",\"filename\":\"LQE731nMBRDOrn0VEIEVGk97VBkErzxTEgiufjwy.png\"}]', 'Radiator  Demirdokum', '2022-11-09 03:41:34', '2023-01-14 09:22:34', '1667983294.png', 'Radiators and towel warmers', NULL, 3, 'approved'),
(6, 'Smesitel we duşlar', 'Смесители и души', '[{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/z4k6WL2fcqrkix1SsVNkbeKSaIsMWeNgzhWzFlfN.png\",\"filename\":\"z4k6WL2fcqrkix1SsVNkbeKSaIsMWeNgzhWzFlfN.png\"},{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/kvOiriaPfFQr30mzW7woepMg212Svnnmqp5zfLe0.png\",\"filename\":\"kvOiriaPfFQr30mzW7woepMg212Svnnmqp5zfLe0.png\"}]', 'adell', '2022-11-09 03:42:11', '2023-01-14 09:22:09', '1667983331.png', 'Faucets and showers', NULL, 6, 'approved'),
(8, 'Unitaz we rakowinalar', 'Унитазы и раковины', '[{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/2Z46fDM6sPudhRjyC7inoBtxzLCAT2XxVpMMjcY0.png\",\"filename\":\"2Z46fDM6sPudhRjyC7inoBtxzLCAT2XxVpMMjcY0.png\"},{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/3bRwGVbt5nAUGBs8b6usjZlOUiuUqgReC3iIICuT.png\",\"filename\":\"3bRwGVbt5nAUGBs8b6usjZlOUiuUqgReC3iIICuT.png\"}]', 'idevit', '2022-11-09 03:42:47', '2023-01-14 09:21:58', '1667983367.png', 'WC Pans and Sinks', NULL, 7, 'approved'),
(11, 'Elektrikli suw gyzdyryjylar', 'Электрические водонагреватели', '[{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/ELXZtFh6I2cs49FogUMzs67ZeY77COPBsDeZQbUX.png\",\"filename\":\"ELXZtFh6I2cs49FogUMzs67ZeY77COPBsDeZQbUX.png\"},{\"image\":\"http:\\/\\/akyllyenjam.com.tm\\/storage\\/images\\/products\\/Nwc7iUc4cfZqDsfHRT1AK3CcKKdNUzXRlxEGcNrM.png\",\"filename\":\"Nwc7iUc4cfZqDsfHRT1AK3CcKKdNUzXRlxEGcNrM.png\"}]', 'demirdokumDT4', '2022-12-05 07:36:37', '2023-01-16 04:39:20', NULL, 'Electric boilers', NULL, 2, 'approved');

-- --------------------------------------------------------

--
-- Структура таблицы `color_settings`
--

CREATE TABLE `color_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_navbar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color_category1` varchar(255) NOT NULL,
  `color_category2` varchar(255) NOT NULL,
  `color_search1` varchar(255) NOT NULL,
  `color_search2` varchar(255) NOT NULL,
  `color_cart` varchar(255) NOT NULL,
  `color_product` varchar(255) NOT NULL,
  `color_category_menu` varchar(255) NOT NULL,
  `color_footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `color_settings`
--

INSERT INTO `color_settings` (`id`, `color_navbar`, `created_at`, `updated_at`, `color_category1`, `color_category2`, `color_search1`, `color_search2`, `color_cart`, `color_product`, `color_category_menu`, `color_footer`) VALUES
(1, '#00a8e1', '2022-11-26 19:38:24', '2022-12-29 05:39:14', '#000000', '#00a8e1', '#00a8e1', '#ff6720', '#00a8e1', '#00a8e1', '#ff6720', '#ffffff');

-- --------------------------------------------------------

--
-- Структура таблицы `delivery_uses`
--

CREATE TABLE `delivery_uses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `description_tm` varchar(255) NOT NULL,
  `description_ru` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `feed_backs`
--

CREATE TABLE `feed_backs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `footer_logos`
--

CREATE TABLE `footer_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `footer_logos`
--

INSERT INTO `footer_logos` (`id`, `image`, `created_at`, `updated_at`, `file_name`) VALUES
(1, 'http://localhost:8000/storage/images/footerlogos/1676642968.png', '2022-02-08 06:38:04', '2023-02-17 09:09:28', '1676642968.png');

-- --------------------------------------------------------

--
-- Структура таблицы `guarantee_uses`
--

CREATE TABLE `guarantee_uses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `description_tm` varchar(255) NOT NULL,
  `description_ru` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'http://akyllyenjam.com.tm/storage/images/logos/1675326950.png', '2022-11-15 06:13:27', '2023-02-02 08:35:50');

-- --------------------------------------------------------

--
-- Структура таблицы `magazine_information`
--

CREATE TABLE `magazine_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `magazine_information`
--

INSERT INTO `magazine_information` (`id`, `slogan`, `phoneNumber`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Nothing', '99312754160', 'ddofistm@gmail.com', 'Aşgabat şäheri G.Kulyýew köçesi, 29 \"Rowana\" binasy', '2022-02-05 08:30:51', '2023-01-11 04:36:44');

-- --------------------------------------------------------

--
-- Структура таблицы `maps`
--

CREATE TABLE `maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `map` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `maps`
--

INSERT INTO `maps` (`id`, `map`, `created_at`, `updated_at`) VALUES
(1, 'https://www.google.com/maps/dir//DemirDokum+Ashgabat+Turkmenistan,+G.Kulyyew+Rowana,+Ashgabat/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3f6fff5f8ed5f7e9:0x57856f8368faf33?sa=X&ved=2ahUKEwj4tq7x2L78AhVaUKQEHU0rCh4Q48ADegQIBBAJ&hl=en', '2022-12-04 08:51:25', '2023-01-11 04:37:55'),
(2, 'google-site-verification: google5b773f27b13f82e1.html', '2023-01-25 18:35:24', '2023-01-25 18:35:24');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(66, '2021_06_18_064854_add_owner_name_to_shops', 25),
(67, '2021_12_04_133938_create_brands_table', 26),
(68, '2014_10_12_200000_add_two_factor_columns_to_users_table', 27),
(69, '2020_05_21_100000_create_teams_table', 27),
(70, '2020_05_21_200000_create_team_user_table', 27),
(71, '2020_05_21_300000_create_team_invitations_table', 27),
(72, '2021_12_22_043757_create_sessions_table', 27),
(73, '2021_12_22_155445_create_admin_table', 28),
(74, '2021_12_25_094300_create_carts_table', 29),
(75, '2022_01_05_133209_add_address_to_users_table', 30),
(76, '2022_01_05_135426_create_user_addresses_table', 30),
(77, '2022_01_14_165054_create_user_discounts_table', 31),
(78, '2022_01_14_165316_create_user_discounts_table', 32),
(79, '2022_01_19_102919_add_address2_to_users_table', 33),
(80, '2022_01_19_112315_add_address2_to_orders_table', 33),
(81, '2022_01_19_164934_create_user_discounts_table', 33),
(82, '2022_01_19_195443_add_status_to_orders_table', 34),
(83, '2022_01_21_105753_create_user_discounts_table', 35),
(84, '2022_01_21_105826_add_discount_price_to_products_table', 36),
(85, '2022_01_21_110112_add_discount_price_to_products_table', 37),
(86, '2022_01_22_062011_add_user_discount_price_to_user_discounts_table', 38),
(87, '2022_01_24_160716_add_variation_difference_to_products_table', 39),
(88, '2022_01_24_161633_add_code_to_products_table', 40),
(89, '2022_01_24_174912_create_logos_table', 41),
(90, '2022_01_27_103037_add_slug_to_brands_table', 42),
(91, '2022_01_29_121718_create_feed_backs_table', 43),
(92, '2022_01_31_104540_create_footer_logos_table', 44),
(93, '2022_02_05_124733_create_magazine_informations_table', 45),
(94, '2022_01_29_174625_create_footer_logos_table', 46),
(95, '2022_01_29_175412_add_filename_to_footer_logos_table', 46),
(96, '2022_02_08_103203_create_about_us_table', 47),
(97, '2022_02_08_103215_create_delivery_uses_table', 47),
(98, '2022_02_08_103232_create_order_uses_table', 47),
(99, '2022_02_08_103242_create_guarantee_uses_table', 47),
(101, '2022_02_15_101506_create_pacets_table', 48),
(102, '2022_02_16_101150_add_pending_to_orders_table', 49),
(103, '2022_03_04_101019_create_pacet_poducts_table', 50),
(104, '2022_03_04_121221_create_pacet_products_table', 51),
(105, '2022_11_17_205030_create_offers_table', 52),
(106, '2022_11_17_205049_create_offer_lines_table', 52),
(107, '2022_11_26_205413_create_color_settings_table', 53),
(108, '2022_11_27_122257_add_color_category_to_color_settings_table', 54),
(109, '2022_11_27_123748_add_color_footer_to_color_settings_table', 55),
(110, '2022_12_01_084328_create_maps_table', 56),
(111, '2022_12_14_094357_add_code_to_order_lines_table', 57),
(112, '2022_12_14_100042_add_code_to_carts_table', 57),
(113, '2022_12_14_100156_add_code_to_offer_lines_table', 57),
(114, '2023_01_27_125703_add_guest_price_guest_discount_to_products_table', 58),
(115, '2023_01_29_142003_add_description_to_brands_table', 58),
(116, '2023_02_11_100940_add_specificprice_to_products_table', 59),
(117, '2023_02_11_101647_create_roles_table', 60),
(118, '2023_02_11_105540_add_pricetype_to_users_table', 61),
(119, '2023_02_11_105851_add_pricetype_to_users_table', 62),
(120, '2023_02_11_110055_add_pricetype_to_users_table', 63),
(121, '2023_02_11_154547_add_order_no_to_orders_table', 64),
(122, '2023_02_11_155150_add_order_no_to_orders_table', 65);

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('unapproved','approved') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `offer_lines`
--

CREATE TABLE `offer_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offerId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `status` enum('unapproved','approved') NOT NULL,
  `description` text DEFAULT NULL,
  `orderNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `userId`, `address`, `date`, `created_at`, `updated_at`, `name`, `surname`, `email`, `phoneNumber`, `address2`, `price`, `status`, `description`, `orderNo`) VALUES
(1, NULL, 'Aşgabat şäheri', '2023-02-15 12:39:46', '2023-02-15 07:39:46', '2023-02-15 07:39:46', 'Shanur', 'Hudayberenov', 'shanurhudayberenov99@gmail.com', '63194471', NULL, 0.00, 'unapproved', NULL, '#OS000001'),
(2, NULL, 'Aşgabat şäheri', '2023-02-15 13:02:31', '2023-02-15 08:02:32', '2023-02-15 08:02:32', 'Shanur', 'Hudayberenov', 'shanurhudayberenov99@gmail.com', '63194471', NULL, 0.00, 'unapproved', NULL, '#OS000002'),
(3, 2, '11 mkr', '2023-02-15 14:03:57', '2023-02-15 09:03:57', '2023-02-15 09:03:57', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 35100.00, 'unapproved', NULL, '#OS000003'),
(4, 2, '11 mkr', '2023-02-15 14:18:59', '2023-02-15 09:18:59', '2023-02-15 09:18:59', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 35100.00, 'unapproved', NULL, '#OS000004'),
(5, 2, '11 mkr', '2023-02-15 14:20:05', '2023-02-15 09:20:05', '2023-02-15 09:20:05', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 0.00, 'unapproved', NULL, '#OS000005'),
(6, 2, '11 mkr', '2023-02-15 14:20:32', '2023-02-15 09:20:32', '2023-02-15 09:20:32', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 0.00, 'unapproved', NULL, '#OS000006'),
(7, 2, '11 mkr', '2023-02-15 14:20:55', '2023-02-15 09:20:55', '2023-02-15 09:20:55', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 0.00, 'unapproved', NULL, '#OS000007'),
(8, 2, '11 mkr', '2023-02-16 10:59:31', '2023-02-16 05:59:31', '2023-02-16 05:59:31', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 0.00, 'unapproved', NULL, '#OS000008'),
(9, 2, '11 mkr', '2023-02-16 11:13:20', '2023-02-16 06:13:20', '2023-02-16 06:13:20', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 35100.00, 'unapproved', NULL, '#OS000009'),
(10, 2, '11 mkr', '2023-02-16 11:14:51', '2023-02-16 06:14:52', '2023-02-16 06:14:52', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 35100.00, 'unapproved', NULL, '#OS000010'),
(11, 2, '11 mkr', '2023-02-16 11:15:07', '2023-02-16 06:15:07', '2023-02-16 06:15:07', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 35100.00, 'unapproved', NULL, '#OS000011'),
(12, 2, '11 mkr', '2023-02-16 11:15:59', '2023-02-16 06:15:59', '2023-02-16 06:15:59', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 0.00, 'unapproved', NULL, '#OS000012'),
(13, 2, '11 mkr', '2023-02-16 11:16:30', '2023-02-16 06:16:30', '2023-02-16 06:16:30', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 0.00, 'unapproved', NULL, '#OS000013'),
(14, 2, '11 mkr', '2023-02-16 11:19:44', '2023-02-16 06:19:44', '2023-02-16 06:19:44', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 0.00, 'unapproved', NULL, '#OS000014'),
(15, 2, '11 mkr', '2023-02-16 11:19:53', '2023-02-16 06:19:53', '2023-02-16 06:19:53', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 0.00, 'unapproved', NULL, '#OS000015'),
(16, 2, '11 mkr', '2023-02-16 11:32:41', '2023-02-16 06:32:41', '2023-02-16 06:32:41', 'Admin', 'adminov', 'admin@akylly2022enjam', '63******', NULL, 0.00, 'unapproved', NULL, '#OS000016');

-- --------------------------------------------------------

--
-- Структура таблицы `order_lines`
--

CREATE TABLE `order_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(1000) NOT NULL,
  `quantity` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_lines`
--

INSERT INTO `order_lines` (`id`, `orderId`, `productId`, `price`, `quantity`, `created_at`, `updated_at`, `code`) VALUES
(1, 1, 735, '1980', 1, '2023-02-15 07:39:46', '2023-02-15 07:39:46', 'ST00747'),
(2, 2, 768, '46200', 1, '2023-02-15 08:02:32', '2023-02-15 08:02:32', 'ST00265'),
(3, 2, 766, '4090', 1, '2023-02-15 08:02:32', '2023-02-15 08:02:32', 'ST00581'),
(4, 3, 768, '35100', 1, '2023-02-15 09:03:57', '2023-02-15 09:03:57', 'ST00265'),
(5, 3, 766, '', 1, '2023-02-15 09:03:57', '2023-02-15 09:03:57', 'ST00581'),
(6, 4, 768, '35100', 1, '2023-02-15 09:18:59', '2023-02-15 09:18:59', 'ST00265'),
(7, 4, 766, '', 1, '2023-02-15 09:18:59', '2023-02-15 09:18:59', 'ST00581'),
(8, 4, 767, '', 1, '2023-02-15 09:18:59', '2023-02-15 09:18:59', 'ST02111'),
(9, 6, 766, '', 1, '2023-02-15 09:20:32', '2023-02-15 09:20:32', 'ST00581'),
(10, 6, 767, '', 1, '2023-02-15 09:20:32', '2023-02-15 09:20:32', 'ST02111'),
(11, 6, 735, '', 1, '2023-02-15 09:20:32', '2023-02-15 09:20:32', 'ST00747'),
(12, 8, 102, '', 1, '2023-02-16 05:59:31', '2023-02-16 05:59:31', 'ST00208'),
(13, 8, 101, '', 1, '2023-02-16 05:59:31', '2023-02-16 05:59:31', 'ST00207'),
(14, 9, 768, '35100', 1, '2023-02-16 06:13:20', '2023-02-16 06:13:20', 'ST00265'),
(15, 9, 766, '0', 1, '2023-02-16 06:13:20', '2023-02-16 06:13:20', 'ST00581'),
(16, 11, 768, '35100', 1, '2023-02-16 06:15:07', '2023-02-16 06:15:07', 'ST00265'),
(17, 11, 739, '', 1, '2023-02-16 06:15:07', '2023-02-16 06:15:07', 'ST00751'),
(18, 11, 766, '', 1, '2023-02-16 06:15:07', '2023-02-16 06:15:07', 'ST00581'),
(19, 11, 767, '', 1, '2023-02-16 06:15:07', '2023-02-16 06:15:07', 'ST02111'),
(20, 12, 766, '', 1, '2023-02-16 06:15:59', '2023-02-16 06:15:59', 'ST00581'),
(21, 12, 767, '', 1, '2023-02-16 06:15:59', '2023-02-16 06:15:59', 'ST02111'),
(22, 12, 735, '', 1, '2023-02-16 06:15:59', '2023-02-16 06:15:59', 'ST00747'),
(23, 15, 767, '0', 1, '2023-02-16 06:19:53', '2023-02-16 06:19:53', 'ST02111'),
(24, 15, 735, '0', 1, '2023-02-16 06:19:53', '2023-02-16 06:19:53', 'ST00747'),
(25, 15, 737, '0', 1, '2023-02-16 06:19:53', '2023-02-16 06:19:53', 'ST00749'),
(26, 15, 739, '0', 1, '2023-02-16 06:19:53', '2023-02-16 06:19:53', 'ST00751'),
(27, 16, 767, '0', 1, '2023-02-16 06:32:41', '2023-02-16 06:32:41', 'ST02111');

-- --------------------------------------------------------

--
-- Структура таблицы `order_uses`
--

CREATE TABLE `order_uses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `description_tm` varchar(255) NOT NULL,
  `description_ru` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pacets`
--

CREATE TABLE `pacets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `description_tm` varchar(255) NOT NULL,
  `description_ru` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('approved','unapproved') NOT NULL DEFAULT 'approved',
  `name_en` varchar(255) NOT NULL,
  `description_en` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pacets`
--

INSERT INTO `pacets` (`id`, `name_tm`, `name_ru`, `description_tm`, `description_ru`, `slug`, `image`, `file_name`, `created_at`, `updated_at`, `status`, `name_en`, `description_en`) VALUES
(1, 'Aksiýa', 'Акция', 'Aksiýa', 'Акция', 'Акция', 'https://akylly-enjam.nokatonline.com/storage/images/pacets/1669107283.jpg', '1669107283.jpg', '2022-11-16 03:47:01', '2023-01-09 04:36:12', 'approved', 'Sale', 'Акция'),
(2, 'Täze harytlar', 'Новинки', 'Täze harytlar', 'Täze harytlar', 'Täze harytlar', 'http://akyllyenjam.com.tm/storage/images/pacets/1671622996.jpg', '1671622996.jpg', '2022-11-16 03:48:16', '2023-01-09 05:32:06', 'approved', 'New Products', 'Täze harytlar');

-- --------------------------------------------------------

--
-- Структура таблицы `pacet_products`
--

CREATE TABLE `pacet_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pacetId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `attributeId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('approved','unapproved') NOT NULL DEFAULT 'approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pacet_products`
--

INSERT INTO `pacet_products` (`id`, `pacetId`, `productId`, `attributeId`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, NULL, NULL, NULL, 'approved'),
(2, 1, 2, NULL, NULL, NULL, 'approved'),
(4, 2, 1, NULL, NULL, NULL, 'approved'),
(5, 2, 2, NULL, NULL, NULL, 'approved'),
(6, 3, 2, NULL, NULL, NULL, 'approved'),
(9, 1, 3, NULL, NULL, NULL, 'approved'),
(10, 1, 4, NULL, NULL, NULL, 'approved'),
(11, 2, 32, NULL, NULL, NULL, 'approved'),
(12, 2, 33, NULL, NULL, NULL, 'approved'),
(13, 2, 34, NULL, NULL, NULL, 'approved'),
(14, 2, 83, NULL, NULL, NULL, 'approved'),
(15, 2, 84, NULL, NULL, NULL, 'approved'),
(16, 2, 85, NULL, NULL, NULL, 'approved'),
(17, 2, 86, NULL, NULL, NULL, 'approved'),
(18, 2, 87, NULL, NULL, NULL, 'approved'),
(19, 2, 88, NULL, NULL, NULL, 'approved'),
(32, 1, 101, NULL, NULL, NULL, 'approved'),
(33, 1, 102, NULL, NULL, NULL, 'approved');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shanurhudayberenov99@gmail.com', '$2y$10$KSE8oG./JnamWr/84/vDLei4yd6Tv7XEg7vuU9HaES.4v8rEsYSBe', '2022-01-31 07:48:29');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `subcategoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `subsubcategoryId` bigint(20) UNSIGNED DEFAULT NULL,
  `images` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `name_tm` varchar(255) NOT NULL,
  `name_ru` varchar(255) NOT NULL,
  `description_tm` text NOT NULL,
  `description_ru` text NOT NULL,
  `variationGroupId` bigint(20) UNSIGNED DEFAULT NULL,
  `unitId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_tr` varchar(100) DEFAULT NULL,
  `searchText` varchar(10000) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_tr` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(12) NOT NULL,
  `isNew_tm` varchar(255) DEFAULT NULL,
  `brandId` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `discount_price` varchar(100) DEFAULT NULL,
  `variation_difference` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `advice` varchar(255) DEFAULT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `isNew_ru` varchar(255) DEFAULT NULL,
  `pacetId` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('approved','unapproved') DEFAULT 'approved',
  `isNew_en` varchar(255) DEFAULT NULL,
  `guestPrice` varchar(255) DEFAULT NULL,
  `guestDiscount` varchar(255) DEFAULT NULL,
  `price_usd` varchar(255) DEFAULT NULL,
  `specificprice_tm` varchar(255) DEFAULT NULL,
  `specificprice_usd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'guest', '2023-02-11 05:30:56', '2023-02-11 05:30:56'),
(2, 'standart', '2023-02-11 05:31:08', '2023-02-11 05:31:08'),
(3, 'Operator', '2023-02-11 05:32:19', '2023-02-11 05:32:19'),
(4, 'admin', '2023-02-11 05:32:53', '2023-02-11 05:32:53');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8BQRAoCZW1LBxJep70fhfGMB3oEZvyTm5yoMy0Dz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiejhueHA4dHlOSGk5TjZTTnl3R0N3dkxrY2hhZWdGUGRWaHVxYTlvdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbiI7fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVVZBcE9TTXpLVERrdTBQdThRUlRyZWx0amVjd1JNOFVKUGRSSUJWR2x2U2ZQakRjM1doankiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFVWQXBPU016S1REa3UwUHU4UVJUcmVsdGplY3dSTThVSlBkUklCVkdsdlNmUGpEYzNXaGp5Ijt9', 1640151911),
('NOUHUOexD2Qri2C1iyHXvnDxs2Uo3P1O9dBx7yPR', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTmQ2a2E4RHN5SU5tRVVqcU1ueGZSQ2VWMWRtZU85emNwMTAycURsTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRVVkFwT1NNektURGt1MFB1OFFSVHJlbHRqZWN3Uk04VUpQZFJJQlZHbHZTZlBqRGMzV2hqeSI7fQ==', 1640165329),
('V8b9zAHOvoWI92IFs7rF0eyWACEG7WPXmWgAixyI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3ZBOWM3UWNtVnhxTlM5T3NnNndqT3VvbEhXTURWYjg3Y0dqUVFnSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1640361574);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mainCurrencySymbol` varchar(10) NOT NULL,
  `mainCurrencyCode` varchar(10) NOT NULL,
  `mainCurrencyName` varchar(20) NOT NULL,
  `mainCurrencyFractionalUnit` varchar(10) NOT NULL,
  `mainCurrencyFractionalSymbol` varchar(10) NOT NULL,
  `reportCurrencySymbol` varchar(10) NOT NULL,
  `reportCurrencyCode` varchar(10) NOT NULL,
  `reportCurrencyName` varchar(20) NOT NULL,
  `reportCurrencyFractionalUnit` varchar(10) NOT NULL,
  `reportCurrencyFractionalSymbol` varchar(10) NOT NULL,
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
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('approved','unapproved') NOT NULL,
  `searchText` text NOT NULL,
  `shopOwnerName` varchar(100) NOT NULL,
  `shopOwnerPhone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shops`
--

INSERT INTO `shops` (`id`, `name`, `slug`, `images`, `description`, `address`, `phoneNumber`, `email`, `created_at`, `updated_at`, `userId`, `status`, `searchText`, `shopOwnerName`, `shopOwnerPhone`) VALUES
(1, 'Kamil market', 'kamil-market', 'http://localhost:8000/storage/images/shops/shop.jpg', 'Dukan', 'dukan', '+993 12-56-89-45', 'dukan@mail.com', NULL, '2022-01-02 05:27:16', 1, 'approved', '', '', ''),
(2, 'awtoyoly', 'awtoyoly', 'http://localhost:8000/storage/images/shops/shops.jpg', 'Dukan', 'dukan', '+993 12-45-56-78', 'dukan@gmail.com', NULL, '2022-03-19 06:59:34', 1, 'approved', '', '', ''),
(3, 'dukan', 'dukan', 'http://localhost:8000/storage/images/shops/shop.jpg', 'dukan', 'dukan', '123456789', 'dukan@gmail.com', NULL, '2022-03-19 06:57:00', 1, 'unapproved', 'dukan', 'dukan', 'dukan'),
(4, 'dukan', 'dukan', NULL, 'dukan', 'dukan', '+99363194471', 'dukan@gmail.com', '2021-11-21 06:50:33', '2022-01-02 05:30:59', NULL, 'approved', 'dukandukan@gmail.com', 'dukan', '+99363194471');

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

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(100) NOT NULL,
  `name_ru` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `name_tr` varchar(100) DEFAULT NULL,
  `status` enum('unapproved','approved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_tm`, `name_ru`, `image`, `slug`, `created_at`, `updated_at`, `categoryId`, `file_name`, `name_en`, `name_tr`, `status`) VALUES
(1, 'Wanna uçin', 'Для ванной комнаты', 'https://akylly-enjam.nokatonline.com/storage/images/subcategories/1670005409.jpg', 'test', '2022-12-02 16:23:30', '2022-12-22 09:07:41', 3, '1670005409.jpg', 'For bathroom', NULL, 'approved'),
(2, 'Täze harytlar', 'Täze harytlar', 'https://akylly-enjam.nokatonline.com/storage/images/subcategories/1670005433.jpg', 'Täze harytlar', '2022-12-02 16:23:53', '2022-12-21 10:05:25', 3, '1670005433.jpg', 'Täze harytlar', NULL, 'approved'),
(6, 'Asma Unitaz we Bide', 'Подвесные унитазы и бидэ', 'https://akylly-enjam.nokatonline.com/storage/images/subcategories/1670477306.jpg', 'wallhung', '2022-12-08 00:28:26', '2022-12-29 04:52:39', 8, '1670477306.jpg', 'Wall hung toilet and bidet', NULL, 'approved'),
(7, 'Diwara yakyn (duvara sifir) unitaz', 'Приставной унитаз', 'https://akylly-enjam.nokatonline.com/storage/images/subcategories/1670477427.jpg', 'Diwara yakyn (duvara sifir)', '2022-12-08 00:30:27', '2022-12-22 08:25:59', 8, '1670477427.jpg', 'Back to wall WC', NULL, 'approved'),
(8, 'Lavabo', 'Раковины', 'https://akylly-enjam.nokatonline.com/storage/images/subcategories/1670477486.jpg', 'Lavabo', '2022-12-08 00:31:26', '2022-12-22 08:32:37', 8, '1670477486.jpg', 'Washbasin', NULL, 'approved'),
(9, 'Dekoratif', 'Декоративные', 'https://akylly-enjam.nokatonline.com/storage/images/subcategories/1670477562.jpg', 'Decorative', '2022-12-08 00:32:43', '2022-12-24 06:02:26', 8, '1670477562.jpg', 'Decorative', NULL, 'approved'),
(10, 'Goşmaça Aksessuarlar', 'Аксессуары для унитазов', 'https://akylly-enjam.nokatonline.com/storage/images/subcategories/1670477646.jpg', 'Goşmaça-Aksessuarlar', '2022-12-08 00:34:06', '2022-12-22 09:00:20', 8, '1670477646.jpg', 'WC accessories', NULL, 'approved'),
(11, 'Radiatorlar', 'Радиаторы', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671773410.jpg', 'radiator', '2022-12-23 05:30:10', '2022-12-23 05:30:15', 5, '1671773410.jpg', 'Radiators', NULL, 'approved'),
(12, 'Guradyjylar suwly', 'Полотенцесушители водяные', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671773788.jpg', 'towel warmers', '2022-12-23 05:36:28', '2022-12-23 05:44:32', 5, '1671773788.jpg', 'Hydronic Towel Warmers', NULL, 'approved'),
(13, 'Guradyjylar elektrikli', 'Полотенцесушители электрические', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671774512.jpg', 'electric towel warmers', '2022-12-23 05:48:32', '2022-12-23 05:54:56', 5, '1671774512.jpg', 'Electric Towel Warmers', NULL, 'approved'),
(14, 'Rakowina uçin smesiteller', 'Смесители для раковины', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671863023.png', 'Rakowina uçin smesiteller', '2022-12-24 06:23:43', '2022-12-24 06:23:49', 6, '1671863023.png', 'Basin Mixer', NULL, 'approved'),
(15, 'Wanna we Duş uçin smesiteller', 'Смесители для ванны и душа', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671863263.png', 'Bath and Shower Mixers', '2022-12-24 06:27:43', '2022-12-24 06:28:08', 6, '1671863263.png', 'Bath and Shower Mixers', NULL, 'approved'),
(16, 'Aşhana uçin smesiteller', 'Смесители для кухни', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671864172.png', 'kitchenbasin', '2022-12-24 06:42:52', '2022-12-24 06:42:54', 6, '1671864172.png', 'Kitchen Basin', NULL, 'approved'),
(17, 'Aksesuarlar Adell', 'Аксессуары Adell', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671864791.png', 'accessoriesAdell', '2022-12-24 06:53:11', '2022-12-24 06:53:14', 6, '1671864791.png', 'accessories Adell', NULL, 'approved'),
(18, 'PPR Turba', 'PPR Трубы', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671896128.png', 'PPRpipes', '2022-12-24 15:35:28', '2022-12-24 15:35:31', 1, '1671896128.png', 'PPR Pipes', NULL, 'approved'),
(19, 'PPR Mufta', 'PPR Муфта', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671898170.png', 'PPRmufta', '2022-12-24 16:09:30', '2022-12-24 16:49:38', 1, '1671898170.png', 'PPR Coupling', NULL, 'approved'),
(20, 'PPR Dirsek', 'PPR Колено', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671898615.png', 'PPRdirsek', '2022-12-24 16:16:55', '2022-12-24 16:51:02', 1, '1671898615.png', 'PPR elbow', NULL, 'approved'),
(21, 'PPR Troynik TE', 'PPR Тройник', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671898962.png', 'PPRtroynik', '2022-12-24 16:22:42', '2022-12-24 16:49:48', 1, '1671898962.png', 'PPR Tee', NULL, 'approved'),
(22, 'PPR Perehod', 'PPR Переход', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671899377.png', 'PPRperehod', '2022-12-24 16:29:37', '2022-12-24 16:49:47', 1, '1671899377.png', 'PPR Transition', NULL, 'approved'),
(23, 'PPR Adaptor', 'PPR Адаптор', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671900205.png', 'PPRadaptor', '2022-12-24 16:43:25', '2022-12-24 16:49:45', 1, '1671900205.png', 'PPR Adaptor', NULL, 'approved'),
(24, 'PPR Amerikanka', 'PPR Американка', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671900494.png', 'PPRunion', '2022-12-24 16:48:14', '2022-12-24 16:49:44', 1, '1671900494.png', 'PPR Union', NULL, 'approved'),
(25, 'Kollektorlar', 'Коллекторы', 'http://akyllyenjam.com.tm/storage/images/subcategories/1671901030.png', 'collectors', '2022-12-24 16:57:10', '2022-12-24 16:57:14', 1, '1671901030.png', 'Сollectors', NULL, 'approved'),
(26, 'Radiatorlar we guradyjylar uçin aksesuarlar', 'Аксессуары  для радиаторов и полотенцесушителей', 'http://akyllyenjam.com.tm/storage/images/subcategories/1672028480.png', 'accessoriesRadiators', '2022-12-26 04:21:20', '2022-12-26 04:21:27', 5, '1672028480.png', 'accessories for radiators and towel heaters', NULL, 'approved'),
(27, 'PE turbalar', 'PE трубы', 'http://akyllyenjam.com.tm/storage/images/subcategories/1672033460.png', 'PEpipes', '2022-12-26 05:44:20', '2022-12-26 05:44:27', 1, '1672033460.png', 'PE pipes', NULL, 'approved'),
(28, 'Wavin kranlar', 'Wavin краны', 'http://akyllyenjam.com.tm/storage/images/subcategories/1672033951.png', 'Wavinvalves', '2022-12-26 05:52:31', '2022-12-26 05:52:34', 1, '1672033951.png', 'Wavin valves', NULL, 'approved'),
(29, 'PPR fitingler', 'PPR фитинги', 'http://akyllyenjam.com.tm/storage/images/subcategories/1672034489.png', 'PPRfittings', '2022-12-26 06:01:29', '2022-12-26 06:01:32', 1, '1672034489.png', 'PPR fittings', NULL, 'approved'),
(30, 'PVC Turba', 'PVC Трубы', 'http://akyllyenjam.com.tm/storage/images/subcategories/1672129808.png', 'PVCpipes', '2022-12-27 08:30:08', '2022-12-27 08:30:13', 2, '1672129808.png', 'PVC Pipes', NULL, 'approved'),
(31, 'PVC Dirsek', 'PVC Колено', 'http://akyllyenjam.com.tm/storage/images/subcategories/1672129885.png', 'PVCelbow', '2022-12-27 08:31:25', '2022-12-27 08:31:30', 2, '1672129885.png', 'PVC Elbow', NULL, 'approved'),
(32, 'PVC Troynik TE', 'PVC Тройник', 'http://akyllyenjam.com.tm/storage/images/subcategories/1672130036.png', 'PVCtee', '2022-12-27 08:33:56', '2022-12-27 08:33:58', 2, '1672130036.png', 'PVC Tee', NULL, 'approved'),
(33, 'PVC Fitingler', 'PVC Фитинги', 'http://akyllyenjam.com.tm/storage/images/subcategories/1672131393.png', 'PVCfittings', '2022-12-27 08:56:33', '2022-12-27 08:56:36', 2, '1672131393.png', 'PVC Fittings', NULL, 'approved');

-- --------------------------------------------------------

--
-- Структура таблицы `subsubcategories`
--

CREATE TABLE `subsubcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(100) NOT NULL,
  `name_ru` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `subcategoryId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(50) NOT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `name_tr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_tm` varchar(20) NOT NULL,
  `name_ru` varchar(20) NOT NULL,
  `shortName_tm` varchar(5) NOT NULL,
  `shortName_ru` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `name_tr` varchar(100) DEFAULT NULL,
  `shortName_en` varchar(5) DEFAULT NULL,
  `shortName_tr` varchar(5) DEFAULT NULL
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `price_type` enum('tmt','usd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `role`, `phoneNumber`, `filename`, `avatar`, `address`, `surname`, `address2`, `price_type`) VALUES
(2, 'Admin', 'admin@akylly2022enjam', NULL, '$2y$10$l5fCkpRYn6GE6IMmqhfmduYbUBFDap2PhE09RJd2l5eqLxcxxiKQm', NULL, NULL, 'iMWtWlWDhLqXFBcNPBGB4IIuD3Sp2hBTslerwuVve90qJxGTRV6askdIleVe', '2021-12-22 05:31:19', '2023-02-16 06:32:09', 'admin', '63******', 'xJzkyGk5IztFjBD3N6kKpEGl8OAUiwooG9z1wp64.jpg', 'http://akyllyenjam.com.tm/storage/images/avatars/xJzkyGk5IztFjBD3N6kKpEGl8OAUiwooG9z1wp64.jpg', '11 mkr', 'adminov', 'garadamak', 'tmt'),
(9, 'operator', 'operator@gmail.com', NULL, '$2y$10$qZu5OL1HnXw9idwzmGAsuurwjmQV/0ypig2WAdMvda.B4FDf6YTze', NULL, NULL, NULL, '2022-12-26 19:11:12', '2022-12-26 19:11:12', 'operator', '63194471', NULL, NULL, 'test', 'tests', NULL, 'tmt'),
(10, 'Merdan', 'merdan.demirdokum@gmail.com', NULL, '$2y$10$SRbb/iRL.lmo11SqoFzekuuPz54CR8LUEtXOnD.pqGS/voygsYbKK', NULL, NULL, NULL, '2022-12-27 07:57:50', '2023-01-05 05:17:56', 'standard', '62650313', NULL, NULL, 'Rowana bina DD magazin', 'A', NULL, 'tmt'),
(13, 'Kakamyrat', 'teamworkhydyrow@gmail.com', NULL, '$2y$10$1oGNhG07Rs9Ra5mLHdfKAuV9J2YO4ZFrGIRDWgycQnEf2I21LJaoK', NULL, NULL, NULL, '2023-01-05 05:02:10', '2023-01-05 05:04:41', 'standard', '62670904', NULL, NULL, 'Asgabat', 'H', NULL, 'tmt'),
(15, 'Hangeldi', 'creavit@creavit.com', NULL, '$2y$10$xU0YTtHA3RiJoBW0tO3//uNjQ3jjb2SBuX31Z/PRo2m5OmraJUXfe', NULL, NULL, NULL, '2023-01-27 06:54:55', '2023-01-27 06:54:55', 'standard', '65500648', NULL, NULL, 'CREAVIT', 'Creavit', NULL, 'tmt'),
(17, 'Shanur', 'shanurhudayberenov99@gmail.com', NULL, '$2y$10$1Bj7tj94A7jH5SGQK5hheuW8f582Tm2SUZUIOoPuSNMZ/kixZwHKW', NULL, NULL, NULL, '2023-02-11 07:16:13', '2023-02-17 07:22:57', 'registered', '63194472', NULL, NULL, 'Aşgabat şäheri', 'Hudayberenov', NULL, 'tmt');

-- --------------------------------------------------------

--
-- Структура таблицы `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `address`, `userId`, `created_at`, `updated_at`) VALUES
(5, 'Oguz han', 1, '2022-01-06 13:07:42', '2022-01-06 13:07:42'),
(6, 'Oguz han 13', 2, '2022-01-15 15:27:12', '2022-01-15 15:27:12');

-- --------------------------------------------------------

--
-- Структура таблицы `user_discounts`
--

CREATE TABLE `user_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `discount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_discount_price` varchar(255) DEFAULT NULL
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
(3, '2021-11-17 10:45:29', '2021-11-17 10:45:29'),
(4, '2021-12-04 13:06:19', '2021-12-04 13:06:19'),
(6, '2022-01-17 12:59:19', '2022-01-17 12:59:19'),
(9, '2022-01-21 06:16:30', '2022-01-21 06:16:30'),
(10, '2022-01-21 06:16:49', '2022-01-21 06:16:49'),
(11, '2022-02-15 08:04:05', '2022-02-15 08:04:05'),
(12, '2022-02-15 08:12:08', '2022-02-15 08:12:08'),
(13, '2022-02-15 08:18:04', '2022-02-15 08:18:04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_productid_foreign` (`productId`),
  ADD KEY `carts_userid_foreign` (`userId`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `color_settings`
--
ALTER TABLE `color_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `delivery_uses`
--
ALTER TABLE `delivery_uses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `footer_logos`
--
ALTER TABLE `footer_logos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guarantee_uses`
--
ALTER TABLE `guarantee_uses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `magazine_information`
--
ALTER TABLE `magazine_information`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offer_lines`
--
ALTER TABLE `offer_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_lines_offerid_foreign` (`offerId`),
  ADD KEY `offer_lines_productid_foreign` (`productId`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_orderno_unique` (`orderNo`),
  ADD KEY `orders_userid_foreign` (`userId`);

--
-- Индексы таблицы `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_uses`
--
ALTER TABLE `order_uses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pacets`
--
ALTER TABLE `pacets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pacet_products`
--
ALTER TABLE `pacet_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `pacet_products_pacetid_foreign` (`pacetId`),
  ADD KEY `pacet_products_productid_foreign` (`productId`),
  ADD KEY `pacet_products_attributeid_foreign` (`attributeId`);

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
  ADD UNIQUE KEY `advice` (`id`,`categoryId`,`subcategoryId`),
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
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- Индексы таблицы `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Индексы таблицы `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Индексы таблицы `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

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
-- Индексы таблицы `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_userid_foreign` (`userId`);

--
-- Индексы таблицы `user_discounts`
--
ALTER TABLE `user_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_discounts_userid_foreign` (`userId`),
  ADD KEY `user_discounts_productid_foreign` (`productId`);

--
-- Индексы таблицы `variation_groups`
--
ALTER TABLE `variation_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `color_settings`
--
ALTER TABLE `color_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `delivery_uses`
--
ALTER TABLE `delivery_uses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feed_backs`
--
ALTER TABLE `feed_backs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `footer_logos`
--
ALTER TABLE `footer_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `guarantee_uses`
--
ALTER TABLE `guarantee_uses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `magazine_information`
--
ALTER TABLE `magazine_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `maps`
--
ALTER TABLE `maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `offer_lines`
--
ALTER TABLE `offer_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `order_uses`
--
ALTER TABLE `order_uses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pacets`
--
ALTER TABLE `pacets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `pacet_products`
--
ALTER TABLE `pacet_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `subsubcategories`
--
ALTER TABLE `subsubcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user_discounts`
--
ALTER TABLE `user_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `variation_groups`
--
ALTER TABLE `variation_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attributeid_foreign` FOREIGN KEY (`attributeId`) REFERENCES `attributes` (`id`);

--
-- Ограничения внешнего ключа таблицы `offer_lines`
--
ALTER TABLE `offer_lines`
  ADD CONSTRAINT `offer_lines_offerid_foreign` FOREIGN KEY (`offerId`) REFERENCES `offers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offer_lines_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
