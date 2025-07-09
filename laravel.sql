-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 11:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nom`, `prenom`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'nikezwe', 'marie', 'admin@gmail.com', '12345678', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `balises`
--

CREATE TABLE `balises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `typebalise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balises`
--

INSERT INTO `balises` (`id`, `nom`, `prix`, `image`, `typebalise_id`, `created_at`, `updated_at`) VALUES
(27, 'balise courante', 180, 'uploads/erCGM447C1HJh0SG0eBjIfHXNoNvosxNPuWlKh4j.png', 1, '2025-04-14 09:37:38', '2025-04-14 10:24:51'),
(30, 'balise de cle chauffeur', 127, 'uploads/4OMVGPDSmBQ4FWA57MbDT4FOuRgaV9hZuUziyrzn.jpg', 3, '2025-04-14 09:50:27', '2025-04-14 10:28:48'),
(31, 'balise de camera courante', 120, 'uploads/myiH8wd28ogdYAHAIHVSv6BIGcEEf5J215seUZQc.jpg', 8, '2025-04-14 10:20:54', '2025-04-14 10:20:54'),
(32, 'balise complique', 250, 'uploads/9G4ldAqaXNlJwWhkFIveeSS4KOVnpWfxOHTvyluM.jpg', 2, '2025-04-14 10:26:15', '2025-04-14 10:26:15'),
(33, 'sonneriedanger', 87, 'uploads/CwSyaDdePeLNKFZvlOpgWDr6z5UK73brQvxvLkYL.jpg', 2, '2025-04-14 12:37:00', '2025-04-14 12:37:00'),
(34, 'carburant', 120, 'uploads/n3LlI8HKK7Lqt5rBjckArHaFm5SAUKgT4WvUX7Yw.jpg', 1, '2025-04-14 12:37:36', '2025-04-14 12:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `balise_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'en attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `user_id`, `balise_id`, `nom`, `prenom`, `email`, `telephone`, `quantite`, `etat`, `created_at`, `updated_at`) VALUES
(17, 9, 32, 'junior', 'irakoze', 'jkbigdeal@gmail.com', '76796301', 4, 'en attente', '2025-04-15 08:21:33', '2025-04-15 08:21:33'),
(18, 10, 33, 'mansuma', 'ncuti', 'mans@gmail.com', '67400539', 6, 'en attente', '2025-04-15 08:36:15', '2025-04-15 08:36:15'),
(19, 10, 32, 'mansuma', 'ncuti', 'mans@gmail.com', '67400539', 8, 'en attente', '2025-04-15 08:37:05', '2025-04-15 08:37:05'),
(20, 1, 32, 'nikezwe marie', 'prisca', 'mnikezwe@gmail.com', '76796301', 7, 'en attente', '2025-04-15 08:38:56', '2025-04-15 08:38:56'),
(21, 1, 31, 'nikezwe marie', 'ameli', 'mnikezwe@gmail.com', '76796301', 4, 'en attente', '2025-04-15 08:40:37', '2025-04-15 08:40:37'),
(22, 13, 33, 'John Alan', 'shiruka', 'john@gmail.com', '67400536', 2, 'en attente', '2025-04-15 08:59:09', '2025-04-15 08:59:09'),
(23, 14, 34, 'maniganze Bellard', 'prime', 'Bel@gmail.com', '67400536', 3, 'en attente', '2025-04-15 09:13:28', '2025-04-15 09:13:28'),
(24, 12, 33, 'ganira luc lumiere', 'luc', 'luc@gmail.com', '76796301', 7, 'en attente', '2025-04-15 10:00:37', '2025-04-15 10:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`, `telephone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'NIKEZWE', 'Marie', 'mnikezwe@gmail.com', '65649083', 'je vais une balise de geolocalisation de mes camions', '2025-04-07 12:55:47', '2025-04-07 12:55:47');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_20_222108_create_clients_table', 1),
(6, '2025_03_26_035419_create_typebalises_table', 1),
(7, '2025_03_26_035550_create_balises_table', 1),
(8, '2025_03_26_055143_create_contacts_table', 1),
(9, '2025_03_27_180731_commande', 1),
(10, '2025_03_27_211708_create_permission_tables', 1),
(11, '2025_03_28_203259_create_admins_table', 1),
(12, '2025_03_30_221556_addimage_to_balise', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
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

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('mnikezwe@gmail.com', '$2y$12$hcoGRZ1D1Y17xvdiJaXPDeEKAmHfWhJxe8S3ZoEn7wu9e8H3xghLW', '2025-04-15 08:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-04-01 12:07:04', '2025-04-01 12:07:04'),
(2, 'user', 'web', '2025-04-01 12:07:04', '2025-04-01 12:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typebalises`
--

CREATE TABLE `typebalises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typebalises`
--

INSERT INTO `typebalises` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'ecodrive', '2025-03-28 21:33:11', '2025-03-28 21:33:11'),
(2, 'geolocalisation', '2025-03-28 21:33:25', '2025-03-28 21:33:25'),
(3, 'cle chauffeur', '2025-03-28 21:33:39', '2025-03-28 21:33:39'),
(4, 'carburant', '2025-04-01 13:35:00', '2025-04-01 13:35:00'),
(5, 'Vitesse', '2025-04-01 13:35:23', '2025-04-07 12:53:56'),
(8, 'camera', '2025-04-07 17:58:26', '2025-04-07 17:58:26'),
(9, 'camera intelligent', '2025-04-14 12:34:33', '2025-04-14 12:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nikezwe marie', 'mnikezwe@gmail.com', NULL, '$2y$12$r6FTRz9dQpsCgPsyvgnINe5YFUmWWqo10mDe5Ym2FstBpYzLBo9du', NULL, '2025-03-28 21:45:16', '2025-03-28 21:45:16'),
(2, 'jinama', 'jinama@gmail.com', NULL, '$2y$12$EP8w1aOa9Yq0I6q/iGemxuvQVh5ciHqtIbsMlL25cprc9rJsxSWs2', NULL, '2025-03-30 16:11:20', '2025-03-30 16:11:20'),
(3, 'kenguruka', 'kenguruka@gmail.com', NULL, '$2y$12$253nMwbFORxtXGCurrj2MOAR.98GB56DrpzJpBIylaFvTik9MVIXW', NULL, '2025-04-01 09:21:00', '2025-04-01 09:21:00'),
(4, 'irakoze junior', 'irakoze@gmail.com', NULL, '$2y$12$z3pA/Df3aMzbcn7KCCahc.z0Pmy8Wsr4.Xr/rzaP9qjLbLANS9V/i', NULL, '2025-04-01 09:37:13', '2025-04-01 09:37:13'),
(8, 'ingabire', 'ingabire@gmail.com', NULL, '$2y$12$qZ1OtSRUrlNymptEQ4DpdeN2KMinumtTOaEsprpuD/.4Nnwz1p6hC', NULL, '2025-04-01 10:05:55', '2025-04-01 10:05:55'),
(9, 'junior', 'jkbigdeal@gmail.com', NULL, '$2y$12$.hnJnPfycDyT/VHclNgj9utaT.qAPACxZOSB3OJi7mDOAyyIxn2km', 'KrdOmk0AxDb3g2nVEEpQjNjiautkfv0Vvw4nmpgYwzfE68Xgg4DA5TRUi43q', '2025-04-15 08:14:08', '2025-04-15 09:53:46'),
(10, 'mansuma', 'mans@gmail.com', NULL, '$2y$12$5FaghQen7jPQxhAUz5mcIOSVO2GkeF/oS9VWxUf0u0KyXJoX49s5W', NULL, '2025-04-15 08:25:56', '2025-04-15 08:25:56'),
(11, 'kaze', 'kaze@gmail.com', NULL, '$2y$12$g.YDPTtCeNUUPzQ3BFrZ0uzerwZk7RCUZ0w0WSd/65QxiI7KFme1y', NULL, '2025-04-15 08:41:53', '2025-04-15 08:41:53'),
(12, 'ganira luc lumiere', 'luc@gmail.com', NULL, '$2y$12$YFnwwy3kkfyA5.mLBqbR.O08b3H8lvZjik/fnOqQPRwrbUGisO4Ba', NULL, '2025-04-15 08:45:08', '2025-04-15 08:45:08'),
(13, 'John Alan', 'john@gmail.com', NULL, '$2y$12$UZkwsrFFU5IpjFOnVWwlJ.Xy.G0ZXcV7JD.aRcl406llm80iNbQI.', NULL, '2025-04-15 08:56:49', '2025-04-15 08:56:49'),
(14, 'maniganze Bellard', 'Bel@gmail.com', NULL, '$2y$12$d9MWvMO4Q4r2gV/yJUql/uCO3oIJ9uJfeZ4saMFjVoBBcZM2bGGs2', NULL, '2025-04-15 09:01:42', '2025-04-15 09:01:42'),
(15, 'iranzi  colin', 'col@gmail.com', NULL, '$2y$12$mLJKbRF255Gk0IWEfZuFNOhw6C3K6cG7tF6aDlae4tZcdb5vUoVty', NULL, '2025-04-15 09:15:40', '2025-04-15 09:15:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `balises`
--
ALTER TABLE `balises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balises_typebalise_id_foreign` (`typebalise_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_user_id_foreign` (`user_id`),
  ADD KEY `commandes_balise_id_foreign` (`balise_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `typebalises`
--
ALTER TABLE `typebalises`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balises`
--
ALTER TABLE `balises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typebalises`
--
ALTER TABLE `typebalises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balises`
--
ALTER TABLE `balises`
  ADD CONSTRAINT `balises_typebalise_id_foreign` FOREIGN KEY (`typebalise_id`) REFERENCES `typebalises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_balise_id_foreign` FOREIGN KEY (`balise_id`) REFERENCES `balises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commandes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
