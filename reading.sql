-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-05-2022 a las 01:08:33
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reading`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_08_1651981334_create_UserBook_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UserBook`
--

CREATE TABLE `UserBook` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idGoogle` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `userFk` bigint(20) UNSIGNED NOT NULL,
  `ISBN_13` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date DEFAULT NULL,
  `rating` int(11) DEFAULT '0',
  `review` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `UserBook`
--

INSERT INTO `UserBook` (`id`, `idGoogle`, `userFk`, `ISBN_13`, `dateStart`, `dateEnd`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(6, 'RIXCDgAAQBAJ', 2, '9999999999999', '2016-09-22', NULL, 1, NULL, '2022-05-08 09:22:59', '2022-05-08 09:22:59'),
(7, 'hp5cEAAAQBAJ', 2, '9999999999999', '2022-03-16', NULL, 4, 'Até agora excelente!', '2022-05-08 11:18:03', '2022-05-08 11:18:03'),
(8, 'g21HEAAAQBAJ', 2, '9999999999999', '2001-08-15', '2002-04-01', 3, NULL, '2022-05-08 11:41:23', '2022-05-08 11:41:23'),
(9, 'NjUQCwAAQBAJ', 2, '9999999999999', '2021-10-21', '2021-12-29', 3, 'Ótimo Livro.', '2022-05-09 00:42:32', '2022-05-09 00:42:32'),
(10, 'ImUoDwAAQBAJ', 2, '9999999999999', '2022-05-02', NULL, 4, 'Lendo ainda....', '2022-05-09 00:43:20', '2022-05-09 00:43:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UserBook_`
--

CREATE TABLE `UserBook_` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idGoogle` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `userFk` int(10) UNSIGNED NOT NULL,
  `ISBN_13` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date DEFAULT NULL,
  `rating` int(11) DEFAULT '0',
  `review` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ana Heloise', 'ana_eloise@depotit.com.br', NULL, '$2y$10$ahB1H6MnlvkHE0HHe1a3E.bTIJZ/VHBFlAKC73w9OdT2hmqebsJua', NULL, NULL, NULL),
(2, 'Raul Filipe', 'raul_filipe_lopes@depotit.com.br', NULL, '$2y$10$AXDsXqZkZ2D/3pcKU/si9eTM9PVwA8XIF3tt5CRVhycczGOt8ju1S', NULL, NULL, NULL),
(3, 'Hugo Márcio', 'hugo_marcio_nascimento@corpoclinica.com.br', NULL, '$2y$10$xU/EhqXMtSyo6.6mMnR46OXauE2kk9vIEJNbXckHwFuSHROfqcNsC', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `UserBook`
--
ALTER TABLE `UserBook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userbook_userfk_foreign` (`userFk`);

--
-- Indices de la tabla `UserBook_`
--
ALTER TABLE `UserBook_`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `UserBook`
--
ALTER TABLE `UserBook`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `UserBook_`
--
ALTER TABLE `UserBook_`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `UserBook`
--
ALTER TABLE `UserBook`
  ADD CONSTRAINT `userbook_userfk_foreign` FOREIGN KEY (`userFk`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `UserBook_`
--
ALTER TABLE `UserBook_`
  ADD CONSTRAINT `userFk` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
