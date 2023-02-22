-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2023 г., 18:14
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `book_crossing`
--
CREATE DATABASE IF NOT EXISTS `book_crossing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `book_crossing`;

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
                           `id` bigint(20) UNSIGNED NOT NULL,
                           `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `surname`, `name`, `patronymic`, `created_at`, `updated_at`) VALUES
                                                                                              (1, 'Булгаков', 'Иван', 'Леонидович', '2023-01-30 07:00:50', '2023-01-30 07:04:32'),
                                                                                              (2, 'Пушкин', 'А.', 'С.', '2023-01-30 07:01:02', '2023-01-30 07:01:02'),
                                                                                              (3, 'Толстой', 'И', 'С.', '2023-02-05 05:07:38', '2023-02-05 05:07:38'),
                                                                                              (4, 'Толстой', 'И.', 'С.', '2023-02-05 05:08:02', '2023-02-05 05:08:02'),
                                                                                              (5, 'Толстой', 'Иван', 'С', '2023-02-05 05:09:00', '2023-02-05 05:09:00'),
                                                                                              (6, 'ррне', 'рррпп', 'игееепр', '2023-02-05 05:10:04', '2023-02-05 05:10:04'),
                                                                                              (7, 'рпп', 'рнншш', 'аыыегг', '2023-02-05 05:13:40', '2023-02-05 05:13:40'),
                                                                                              (8, 'бььт', 'ьььтт', 'ттттр', '2023-02-05 05:16:57', '2023-02-05 05:16:57'),
                                                                                              (9, 'оррре', 'рпеека', 'ппммии', '2023-02-05 05:20:45', '2023-02-05 05:20:45'),
                                                                                              (10, 'гггггг', 'тираас', 'ииоолопкк', '2023-02-05 05:23:32', '2023-02-05 05:23:32'),
                                                                                              (11, 'тест', 'иван', 'ссс', '2023-02-05 17:42:21', '2023-02-05 17:42:21'),
                                                                                              (12, 'Шолохов', 'Михаил', 'Сергеевич', '2023-02-06 16:46:57', '2023-02-06 16:46:57'),
                                                                                              (13, 'ян', 'а', 'о', '2023-02-10 15:19:01', '2023-02-10 15:19:01'),
                                                                                              (14, 'Чехов', 'Антон', 'Павлович', '2023-02-12 11:16:36', '2023-02-12 11:16:36');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `rating` double NOT NULL,
                         `author_id` bigint(20) UNSIGNED DEFAULT NULL,
                         `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
                         `reader_id` bigint(20) UNSIGNED DEFAULT NULL,
                         `genre_id` bigint(20) UNSIGNED DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `image`, `rating`, `author_id`, `owner_id`, `reader_id`, `genre_id`, `created_at`, `updated_at`) VALUES
                                                                                                                                                        (1, 'Война и мир', 'огромная книга о войне и мире', NULL, 5.2727272727273, 1, 1, 1, 1, '2023-01-30 07:43:03', '2023-02-03 07:36:46'),
                                                                                                                                                        (2, '1984', 'огромная книга о войне и мире', NULL, 6, 2, 1, 1, 1, '2023-02-02 04:08:32', '2023-02-12 11:12:23'),
                                                                                                                                                        (3, '1984', 'огромная книга о войне и мире', NULL, 7.5, 2, 1, 1, 1, '2023-02-03 16:30:28', '2023-02-12 11:12:16'),
                                                                                                                                                        (4, 'тест', NULL, NULL, 4.5, 1, 1, 1, 1, '2023-02-06 11:37:29', '2023-02-12 11:15:25'),
                                                                                                                                                        (5, 'тест', NULL, NULL, 8, 1, 1, 1, 1, '2023-02-06 11:42:42', '2023-02-10 15:18:20'),
                                                                                                                                                        (6, 'сае', NULL, NULL, 9, 3, 1, 1, 1, '2023-02-06 11:54:44', '2023-02-12 11:26:24'),
                                                                                                                                                        (7, 'Былины', NULL, NULL, 5, 12, 1, 1, 1, '2023-02-06 16:47:09', '2023-02-08 17:30:40'),
                                                                                                                                                        (8, 'теми5', NULL, NULL, 4, 12, 1, 1, 1, '2023-02-06 16:47:40', '2023-02-08 17:26:18'),
                                                                                                                                                        (9, '555555', NULL, NULL, 4, 12, 1, 1, 1, '2023-02-06 16:50:37', '2023-02-08 17:36:39'),
                                                                                                                                                        (10, 'ррпппп', NULL, NULL, 5, 2, 1, 1, 1, '2023-02-06 16:53:15', '2023-02-08 17:39:55'),
                                                                                                                                                        (11, 'ннннее55', NULL, NULL, 8, 2, 1, 1, 1, '2023-02-06 16:54:22', '2023-02-08 17:16:36'),
                                                                                                                                                        (12, 'ггггг', NULL, NULL, 0, 10, 1, 1, 1, '2023-02-06 16:56:34', '2023-02-06 16:56:34'),
                                                                                                                                                        (13, 'азбука', NULL, NULL, 10, 13, 1, 1, 1, '2023-02-10 15:19:18', '2023-02-10 15:19:50'),
                                                                                                                                                        (14, 'рассказы', NULL, NULL, 9, 14, 7, 7, 1, '2023-02-12 11:16:54', '2023-02-12 11:17:05');

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres` (
                          `id` bigint(20) UNSIGNED NOT NULL,
                          `genre_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `created_at`, `updated_at`) VALUES
    (1, 'История', '2023-01-26 18:16:18', '2023-01-30 06:58:31');

-- --------------------------------------------------------

--
-- Структура таблицы `liked_reviews`
--

DROP TABLE IF EXISTS `liked_reviews`;
CREATE TABLE `liked_reviews` (
                                 `id` bigint(20) UNSIGNED NOT NULL,
                                 `user_id` bigint(20) UNSIGNED DEFAULT NULL,
                                 `review_id` bigint(20) UNSIGNED DEFAULT NULL,
                                 `created_at` timestamp NULL DEFAULT NULL,
                                 `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `liked_reviews`
--

INSERT INTO `liked_reviews` (`id`, `user_id`, `review_id`, `created_at`, `updated_at`) VALUES
                                                                                           (32, 2, 42, '2023-02-09 17:29:45', '2023-02-09 17:29:45'),
                                                                                           (37, 1, 5, '2023-02-09 17:38:35', '2023-02-09 17:38:35'),
                                                                                           (61, 1, 12, '2023-02-10 06:17:19', '2023-02-10 06:17:19'),
                                                                                           (71, 1, 1, '2023-02-10 11:49:34', '2023-02-10 11:49:34'),
                                                                                           (112, 1, 42, '2023-02-10 12:49:58', '2023-02-10 12:49:58'),
                                                                                           (114, 1, 13, '2023-02-11 11:09:49', '2023-02-11 11:09:49'),
                                                                                           (115, 1, 44, '2023-02-11 11:56:31', '2023-02-11 11:56:31'),
                                                                                           (116, 5, 44, '2023-02-12 10:15:23', '2023-02-12 10:15:23'),
                                                                                           (117, 5, 43, '2023-02-12 10:15:26', '2023-02-12 10:15:26'),
                                                                                           (118, 5, 10, '2023-02-12 10:15:32', '2023-02-12 10:15:32'),
                                                                                           (119, 7, 44, '2023-02-12 10:34:02', '2023-02-12 10:34:02'),
                                                                                           (120, 7, 43, '2023-02-12 10:34:15', '2023-02-12 10:34:15'),
                                                                                           (121, 7, 10, '2023-02-12 10:34:22', '2023-02-12 10:34:22'),
                                                                                           (122, 7, 9, '2023-02-12 10:34:28', '2023-02-12 10:34:28'),
                                                                                           (123, 7, NULL, '2023-02-12 11:15:37', '2023-02-12 11:15:37'),
                                                                                           (124, 7, NULL, '2023-02-12 11:15:47', '2023-02-12 11:15:47'),
                                                                                           (125, 7, 50, '2023-02-12 11:29:01', '2023-02-12 11:29:01'),
                                                                                           (126, 7, 49, '2023-02-12 11:29:19', '2023-02-12 11:29:19'),
                                                                                           (127, 1, 50, '2023-02-12 11:43:42', '2023-02-12 11:43:42');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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
                                                          (3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
                                                          (4, '2023_01_24_193607_create_genre_table', 1),
                                                          (5, '2023_01_24_195118_create_author_table', 1),
                                                          (6, '2023_01_24_195252_create_books_table', 1),
                                                          (7, '2023_01_24_195806_create_wishlist_table', 1),
                                                          (8, '2023_01_24_195927_create_reviews_table', 1),
                                                          (9, '2023_01_24_200546_create_liked_review_table', 1),
                                                          (10, '2023_01_30_093937_add_token_user_migration', 2),
                                                          (11, '2023_02_03_100500_add_raiting_in_review', 3),
                                                          (13, '2023_02_11_075252_add_soft_delete_review', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
                                   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
                                          `id` bigint(20) UNSIGNED NOT NULL,
                                          `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `tokenable_id` bigint(20) UNSIGNED NOT NULL,
                                          `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `abilities` text COLLATE utf8mb4_unicode_ci,
                                          `last_used_at` timestamp NULL DEFAULT NULL,
                                          `expires_at` timestamp NULL DEFAULT NULL,
                                          `created_at` timestamp NULL DEFAULT NULL,
                                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
    (1, 'App\\Models\\User', 1, 'token', 'd3c8738f929a09b5b11aa3b23788c6c082a2232fee8b818634cfe75dc94c9511', '[\"*\"]', NULL, NULL, '2023-01-30 06:51:12', '2023-01-30 06:51:12');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
                           `id` bigint(20) UNSIGNED NOT NULL,
                           `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `book_id` bigint(20) UNSIGNED DEFAULT NULL,
                           `user_id` bigint(20) UNSIGNED DEFAULT NULL,
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL,
                           `book_rating` int(11) NOT NULL,
                           `is_archived` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `text`, `book_id`, `user_id`, `created_at`, `updated_at`, `book_rating`, `is_archived`) VALUES
                                                                                                                                  (1, 'новый обзор старой книги', 'ну это в общем все круто', 1, 1, '2023-01-30 09:01:39', '2023-01-30 09:01:39', 6, 0),
                                                                                                                                  (2, 'Не очень', 'Дизлайк ,не нравится', 1, 2, '2023-02-01 16:26:53', '2023-02-01 16:26:53', 3, 0),
                                                                                                                                  (3, 'Довольно таки не плохо', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 2, 1, '2023-02-02 04:08:47', '2023-02-02 04:08:47', 8, 0),
                                                                                                                                  (4, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 1, 1, '2023-02-02 07:55:13', '2023-02-02 07:55:13', 2, 0),
                                                                                                                                  (5, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 1, 1, '2023-02-02 07:57:02', '2023-02-02 07:57:02', 5, 0),
                                                                                                                                  (6, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 1, 1, '2023-02-02 08:01:29', '2023-02-02 08:01:29', 7, 0),
                                                                                                                                  (7, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 1, 1, '2023-02-03 07:28:17', '2023-02-03 07:28:17', 9, 0),
                                                                                                                                  (8, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 1, 1, '2023-02-03 07:29:56', '2023-02-03 07:29:56', 9, 0),
                                                                                                                                  (9, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 1, 1, '2023-02-03 07:30:35', '2023-02-03 07:30:35', 2, 0),
                                                                                                                                  (10, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 1, 1, '2023-02-03 07:30:53', '2023-02-03 07:30:53', 5, 0),
                                                                                                                                  (12, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 2, 1, '2023-02-03 07:32:11', '2023-02-11 11:57:26', 5, 1),
                                                                                                                                  (13, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 1, 1, '2023-02-03 07:32:17', '2023-02-11 11:56:20', 5, 1),
                                                                                                                                  (14, 'Понравилось', 'Вообще неплохо вот так вечером почитать, или в дороге очень хорошо', 1, 1, '2023-02-03 07:36:46', '2023-02-11 06:34:10', 5, 1),
                                                                                                                                  (42, 'пп', 'мма', 3, 1, '2023-02-08 17:47:04', '2023-02-11 05:24:24', 8, 1),
                                                                                                                                  (43, 'новач', 'новое ревью', 5, 1, '2023-02-10 15:18:20', '2023-02-12 06:54:54', 8, 0),
                                                                                                                                  (44, 'ноа', 'отличное', 13, 1, '2023-02-10 15:19:50', '2023-02-11 11:56:29', 10, 0),
                                                                                                                                  (46, 'Понравилось', 'Вообще неплохо вот \n\nтак вечером почитать, или в дороге очень хорошо\nfdgdfg\n\ndfg', 2, 1, '2023-02-12 11:12:23', '2023-02-12 11:12:23', 5, 0),
                                                                                                                                  (49, 'класс', 'все ок', 14, 7, '2023-02-12 11:17:05', '2023-02-12 11:29:22', 9, 0),
                                                                                                                                  (50, 'ууу', 'аакк', 6, 7, '2023-02-12 11:26:24', '2023-02-12 11:26:24', 9, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
                                                                                                            (1, 'Гришин', 'Павел', 'g.pav5@mail.ru', '$2y$10$34t9eFXsXuYJ5XI5WLoaDeDtNeJVSwHga5YamfMRy7CKpXQX6ryqG', NULL, '2023-01-26 18:26:11', '2023-02-12 08:47:29'),
                                                                                                            (2, 'ртотоasdasd', 'Кирилл', 'isip_p.s.grishin@mpt.ru', '$2y$10$HWAuo7zz2xlHHZJ/1k8rHOs/9uX/Y/0MEpANILVgAUO5W2v2iil4u', NULL, '2023-01-26 18:33:05', '2023-02-12 07:18:00'),
                                                                                                            (3, 'Иваново', 'Иван', 'qweaa@mail.ru', '$2y$10$CzNFr/cL3HM61a47O8xmk.ng5RltyZXCLF/biLe2Y2gWK0v1vewXq', NULL, '2023-02-12 10:07:36', '2023-02-12 10:07:36'),
                                                                                                            (4, 'ти', 'чай', 'gg@mail.ru', '$2y$10$NuR1XYrzzElba8ninAqXMejldyhcCD8jtX0Yr2I7K090SUCm/0lVe', NULL, '2023-02-12 10:09:56', '2023-02-12 10:09:56'),
                                                                                                            (5, 'дадимррр', 'дадим', 'r@mail.ru', '$2y$10$WFF/RpdEpta4mesvy33ZRemNy.kP8mBS5t9YQ1fkhp9Y/fmmJ.Gsi', NULL, '2023-02-12 10:13:51', '2023-02-12 10:13:51'),
                                                                                                            (6, 'тнрпп', 'рпаа', 'gc@mail.ru', '$2y$10$heJ1GCbyNzb8e7vDYTRfTuCtPsVRSCh6vJjq/Lwt768HVxyvLJYSC', NULL, '2023-02-12 10:20:48', '2023-02-12 10:20:48'),
                                                                                                            (7, 'Алексей', 'Петров', 'qwe@mail.ru', '$2y$10$TpVD3baLrH5JmZ7kVF7meezn0OITMa77qdD2U/73dEuPkMDBGvl36', NULL, '2023-02-12 10:24:03', '2023-02-12 11:26:05');

-- --------------------------------------------------------

--
-- Структура таблицы `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
                            `id` bigint(20) UNSIGNED NOT NULL,
                            `user_id` bigint(20) UNSIGNED DEFAULT NULL,
                            `book_id` bigint(20) UNSIGNED DEFAULT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
    ADD PRIMARY KEY (`id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_owner_id_foreign` (`owner_id`),
  ADD KEY `books_reader_id_foreign` (`reader_id`),
  ADD KEY `books_genre_id_foreign` (`genre_id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `liked_reviews`
--
ALTER TABLE `liked_reviews`
    ADD PRIMARY KEY (`id`),
  ADD KEY `liked_reviews_user_id_foreign` (`user_id`),
  ADD KEY `liked_reviews_review_id_foreign` (`review_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
    ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
    ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `wishlist`
--
ALTER TABLE `wishlist`
    ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_user_id_foreign` (`user_id`),
  ADD KEY `wishlist_book_id_foreign` (`book_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `liked_reviews`
--
ALTER TABLE `liked_reviews`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `wishlist`
--
ALTER TABLE `wishlist`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
    ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `books_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `books_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `books_reader_id_foreign` FOREIGN KEY (`reader_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `liked_reviews`
--
ALTER TABLE `liked_reviews`
    ADD CONSTRAINT `liked_reviews_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `liked_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
    ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `wishlist`
--
ALTER TABLE `wishlist`
    ADD CONSTRAINT `wishlist_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
