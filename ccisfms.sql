-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2025 at 09:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccisfms`
--

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
(5, '2025_08_13_061609_add_date_of_birth_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `priority` int(11) DEFAULT 0,
  `reference_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `from_user_id`, `to_user_id`, `message`, `type`, `icon`, `created_at`, `updated_at`, `is_read`, `priority`, `reference_id`) VALUES
(1, 2, 3, 'Your payment for the semester has been received.', 'payment', 'fa-solid fa-credit-card', '2025-08-16 14:14:00', '2025-08-16 07:43:06', 0, 1, NULL),
(2, NULL, 3, 'Your clearance form is pending approval.', 'clearance', 'fa-solid fa-file', '2025-08-16 14:14:00', '2025-08-16 07:43:06', 0, 2, NULL),
(3, 3, 3, 'New message from admin regarding schedule update.', 'admin', 'fa-solid fa-bell', '2025-08-16 14:14:00', '2025-08-16 07:11:02', 0, 3, NULL),
(4, 2, 3, 'Tuition payment failed. Please resolve immediately.', 'payment', 'fa-solid fa-exclamation-circle', '2025-08-16 14:16:40', NULL, 0, NULL, NULL),
(5, NULL, 3, 'Reminder: Library books due next week.', 'reminder', 'fa-solid fa-book', '2025-08-16 14:16:40', NULL, 0, NULL, NULL),
(6, 2, 3, '📢 Tuition payment failed. Please resolve immediately.', 'payment', 'fas fa-credit-card', '2025-08-15 14:46:32', NULL, 0, NULL, NULL),
(7, 3, 3, '📄 Your clearance form is still pending.x', 'clearance', 'fas fa-file-alt', '2025-08-15 14:46:32', NULL, 0, 1, NULL),
(8, NULL, 3, '🔔 Reminder: Submit your project proposal.', 'admin', 'fas fa-user-shield', '2025-08-15 14:46:32', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `description`) VALUES
(1, 'Council'),
(2, 'PSITS'),
(3, 'LISSO');

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
-- Table structure for table `payment_list`
--

CREATE TABLE `payment_list` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `program_id` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `due` varchar(255) NOT NULL,
  `penalty` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_list`
--

INSERT INTO `payment_list` (`id`, `organization_id`, `department`, `program_id`, `payment`, `amount`, `due`, `penalty`, `created_by`, `updated_at`, `created_at`) VALUES
(1, 1, 'CTE', 7, 'qwelqkjwqlkr', '123.23', '2025-08-21', '321.42', 0, NULL, NULL),
(2, 1, 'CTE', 7, 'qwelqkjwqlkr', '123.23', '2025-08-21', '321.42', 0, NULL, NULL),
(3, 1, 'CBA', 14, 'qweqwe', '123', '2025-08-21', '12321', 3, NULL, NULL),
(4, 2, 'CAS', 1, 'Karagsakan', '150.25', '2025-12-25', '600', 3, NULL, NULL),
(5, 2, 'CBA', 15, 'Uniform', '250', '2025-08-28', '100', 3, NULL, NULL),
(6, 3, 'CCIS', 20, 'Buwan ng Wika', '150.25', '2025-08-27', '100', 3, NULL, NULL),
(7, 3, 'CCIS', 20, 'Buwan ng Wika2', '150.25', '2025-08-27', '100', 3, NULL, NULL),
(8, 3, 'CCIS', 20, 'Buwan ng Wika2 Buwan ng Wika2', '150.25', '2025-08-27', '100', 3, NULL, NULL);

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `programs` varchar(110) NOT NULL,
  `shortname` varchar(10) DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `college` varchar(10) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `is_order` int(1) NOT NULL DEFAULT 0,
  `is_educ` int(11) DEFAULT NULL,
  `is_validatedBy` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `programs`, `shortname`, `major`, `college`, `is_active`, `is_order`, `is_educ`, `is_validatedBy`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Arts', 'AB', NULL, 'CAS', 0, 1, 5, NULL, NULL, NULL),
(2, 'Bachelor of Arts in Theology', 'AB-Theo', NULL, 'CT', 1, 1, 5, NULL, NULL, NULL),
(3, 'Bachelor of Agricultural Technology', 'BAT', NULL, 'COA', 1, 4, 5, NULL, NULL, NULL),
(4, 'Bachelor of Science in Agricultural Business', 'BSAB', NULL, 'COA', 1, 6, 5, NULL, NULL, NULL),
(5, 'Bachelor of Arts in English Language', 'BAEL', NULL, 'CAS', 1, 3, 5, NULL, NULL, NULL),
(6, 'Bachelor of Arts in History', 'BA Hist', NULL, 'CAS', 1, 2, 5, NULL, NULL, NULL),
(7, 'Bachelor of Secondary Education – Major in Science', 'BSEd-Sci', NULL, 'CTE', 1, 9, 5, NULL, NULL, NULL),
(8, 'Bachelor of Secondary Education – Major in Mathematics', 'BSEd-Math', NULL, 'CTE', 1, 10, 5, NULL, NULL, NULL),
(9, 'Bachelor of Secondary Education – Major in English', 'BSEd-Eng', NULL, 'CTE', 1, 11, 5, NULL, NULL, NULL),
(10, 'Bachelor of Secondary Education – Major in Filipino', 'BSEd-Fil', NULL, 'CTE', 1, 12, 5, NULL, NULL, NULL),
(11, 'Bachelor of Secondary Education – Major in Social Studies', 'BSEd-Soc', NULL, 'CTE', 1, 13, 5, NULL, NULL, NULL),
(12, 'Bachelor of Elementary Education', 'BEED', NULL, 'CTE', 1, 7, 5, NULL, NULL, NULL),
(13, 'Bachelor of Early Childhood Education', 'BECED', NULL, 'CTE', 1, 8, 5, NULL, NULL, NULL),
(14, 'Bachelor of Science in Accountancy', 'BSA', NULL, 'CBA', 1, 14, 5, NULL, NULL, NULL),
(15, 'Bachelor of Science in Accounting Information System', 'BSAIS', NULL, 'CBA', 1, 15, 5, NULL, NULL, NULL),
(18, 'Bachelor of Science in Hospitality Management', 'BSHM', NULL, 'CBA', 1, 16, 5, NULL, NULL, NULL),
(19, 'Bachelor of Science in Agriculture', 'BSAgri', NULL, 'COA', 1, 5, 5, NULL, NULL, NULL),
(20, 'Bachelor of Science in Computer Science', 'BSCS', NULL, 'CCIS', 1, 24, 5, NULL, NULL, NULL),
(21, 'Bachelor of Science in Information Technology', 'BSIT', NULL, 'CCIS', 1, 25, 5, NULL, NULL, NULL),
(22, 'Bachelor of Science in Information Systems', 'BSIS', NULL, 'CCIS', 1, 26, 5, NULL, NULL, NULL),
(23, 'Bachelor of Library and Information Science', 'BLIS', NULL, 'CCIS', 1, 27, 5, NULL, NULL, NULL),
(24, 'Bachelor of Science in Social Work', 'BSSW', NULL, 'CSW', 1, 21, 5, NULL, NULL, NULL),
(25, 'Bachelor of Science in Community Development', 'BSCD', NULL, 'CECD', 1, 22, 5, NULL, NULL, NULL),
(26, 'Bachelor of Science in Extension Education', 'BSExEd', NULL, 'CECD', 1, 23, 5, NULL, NULL, NULL),
(27, 'Bachelor of Science in Nutrition and Dietetics', 'BSND', NULL, 'CMAHS', 1, 28, 5, NULL, NULL, NULL),
(28, 'Bachelor of Science in Midwifery', 'BSM', NULL, 'CMAHS', 1, 29, 5, NULL, NULL, NULL),
(29, 'Diploma in Midwifery', 'DM', NULL, 'CMAHS', 0, 30, 5, NULL, NULL, NULL),
(30, 'Bachelor of Theology (BTh)', 'BTh', NULL, 'CT', 1, 1, 5, NULL, NULL, NULL),
(31, 'Bachelor of Science in Business Administration (BSBA) - Major in Financial Management (FM)', 'BSBA-FM', NULL, 'CBA', 1, 17, 5, NULL, NULL, NULL),
(32, 'Bachelor of Science in Business Administration (BSBA) - Major in Marketing Management (MM)', 'BSBA-MM', NULL, 'CBA', 1, 18, 5, NULL, NULL, NULL),
(33, 'Bachelor of Science in Business Administration (BSBA) - Major in Human Resource Development Management (HRDM)', 'BSBA-HRDM', NULL, 'CBA', 1, 19, 5, NULL, NULL, NULL),
(40, 'Bachelor of Science in Office Administration (BSOA)', 'BSOA', NULL, 'CBA', 1, 20, 5, NULL, NULL, NULL),
(41, 'Earning Units', 'EU', NULL, 'CTE', 0, 31, 5, NULL, NULL, NULL),
(42, 'Earning Units - CTE', 'EU-CTE', NULL, 'CTE', 1, 31, 5, NULL, NULL, NULL),
(43, 'Earning Units - CBA', 'EU-CBA', NULL, 'CBA', 1, 31, 5, NULL, NULL, NULL),
(51, 'Electronic Products Assembly and Servicing NC ll', 'NCII-Elec', NULL, 'TVET', 0, 32, 6, NULL, NULL, NULL),
(52, 'Automotive Servicing NC II', 'NCII-Auto', NULL, 'TVET', 0, 33, 6, NULL, NULL, NULL),
(60, 'NSTP', NULL, NULL, NULL, 0, 0, 8, NULL, NULL, NULL),
(65, 'Kindergarten', 'Kinder', NULL, 'SBE', 0, 0, 1, NULL, NULL, NULL),
(66, 'Elementary', 'ETD', NULL, 'SBE', 1, 0, 2, NULL, NULL, NULL),
(67, 'Junior High School', 'JHS', NULL, 'SBE', 1, 0, 3, NULL, NULL, NULL),
(68, 'Senior High School', 'SHS', NULL, 'SBE', 1, 0, 4, NULL, NULL, NULL),
(69, 'GE Courses', 'GE', NULL, 'GE', 0, 0, 8, NULL, NULL, NULL),
(71, 'Bachelor of Science in Biology', 'BS Bio', NULL, 'CAS', 1, 2, 5, NULL, NULL, NULL),
(72, 'Bachelor of Science in Entrepreneurship', 'BSEntrep', NULL, 'CBA', 1, 20, 5, NULL, NULL, NULL),
(5022, 'Bachelor of Science in Psychology', 'BS Psy', NULL, 'CAS', 1, 2, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `guard` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `description`, `guard`) VALUES
(0, 'STUDENT', 'web'),
(1, 'COUNCILS/PSITS/LISSO', 'web'),
(2, 'ADVISER/DEAN', 'web'),
(3, 'FACULTY', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `program` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `name`, `email`, `program`, `date_of_birth`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(2, '14-0316', 'Gilmark Paungilan', 'gilmark.paungilan@southernchristiancollege.edu.ph', 23, '2025-08-12', '2025-08-05 16:00:00', '$2y$12$Bwm4eAFfKxDtG1zgEH2R8e4fPzE7om.pyN6IXZGDg0YaSfXtHrIe6', NULL, 0, '2025-08-12 22:23:07', '2025-08-12 22:23:07'),
(3, '000', 'Admin Admin', 'admin@southernchristiancollege.edu.ph', 21, '2025-08-06', '2025-08-05 16:00:00', '$2y$12$ZkP6E8pumiFhFtILNjKQC.T/tNeTmihuVUUcKgARrL60Jo1ET5056', 'QlLwXxxTXgzDV1Mz3SERjYkJeZGdnKIpaCJyPyvBGQsCyIwkStgZjxpOygCT', 1, '2025-08-12 23:00:19', '2025-08-12 23:00:19');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_list`
--
ALTER TABLE `payment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_list`
--
ALTER TABLE `payment_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5023;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
