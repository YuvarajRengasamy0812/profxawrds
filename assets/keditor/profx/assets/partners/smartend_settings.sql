-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2025 at 12:24 AM
-- Server version: 10.6.23-MariaDB-cll-lve
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profx_leaguelive`
--

-- --------------------------------------------------------

--
-- Table structure for table `smartend_settings`
--

CREATE TABLE `smartend_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title_en` varchar(191) DEFAULT NULL,
  `site_desc_en` varchar(191) DEFAULT NULL,
  `site_keywords_en` text DEFAULT NULL,
  `site_webmails` varchar(191) DEFAULT NULL,
  `notify_messages_status` tinyint(4) DEFAULT NULL,
  `notify_comments_status` tinyint(4) DEFAULT NULL,
  `notify_orders_status` tinyint(4) DEFAULT NULL,
  `notify_table_status` tinyint(4) DEFAULT NULL,
  `notify_private_status` tinyint(4) DEFAULT NULL,
  `site_url` varchar(191) DEFAULT NULL,
  `site_status` tinyint(4) NOT NULL DEFAULT 0,
  `close_msg` text DEFAULT NULL,
  `social_link1` varchar(191) DEFAULT NULL,
  `social_link2` varchar(191) DEFAULT NULL,
  `social_link3` varchar(191) DEFAULT NULL,
  `social_link4` varchar(191) DEFAULT NULL,
  `social_link5` varchar(191) DEFAULT NULL,
  `social_link6` varchar(191) DEFAULT NULL,
  `social_link7` varchar(191) DEFAULT NULL,
  `social_link8` varchar(191) DEFAULT NULL,
  `social_link9` varchar(191) DEFAULT NULL,
  `social_link10` varchar(191) DEFAULT NULL,
  `contact_t1_en` varchar(191) DEFAULT NULL,
  `contact_t3` varchar(191) DEFAULT NULL,
  `contact_t4` varchar(191) DEFAULT NULL,
  `contact_t5` varchar(191) DEFAULT NULL,
  `contact_t6` varchar(191) DEFAULT NULL,
  `contact_t7_en` varchar(191) DEFAULT NULL,
  `style_logo_en` varchar(191) DEFAULT NULL,
  `style_fav` varchar(191) DEFAULT NULL,
  `style_apple` varchar(191) DEFAULT NULL,
  `style_color1` varchar(191) DEFAULT NULL,
  `style_color2` varchar(191) DEFAULT NULL,
  `style_color3` varchar(191) DEFAULT NULL,
  `style_color4` varchar(191) DEFAULT NULL,
  `style_type` tinyint(4) DEFAULT NULL,
  `style_change` tinyint(4) DEFAULT NULL,
  `style_bg_type` tinyint(4) DEFAULT NULL,
  `style_bg_pattern` varchar(191) DEFAULT NULL,
  `style_bg_color` varchar(191) DEFAULT NULL,
  `style_bg_image` varchar(191) DEFAULT NULL,
  `style_subscribe` tinyint(4) DEFAULT NULL,
  `style_footer` tinyint(4) DEFAULT NULL,
  `style_header` tinyint(4) DEFAULT NULL,
  `style_footer_bg` varchar(191) DEFAULT NULL,
  `style_preload` tinyint(4) DEFAULT NULL,
  `css` longtext DEFAULT NULL,
  `js` longtext DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_settings`
--

INSERT INTO `smartend_settings` (`id`, `site_title_en`, `site_desc_en`, `site_keywords_en`, `site_webmails`, `notify_messages_status`, `notify_comments_status`, `notify_orders_status`, `notify_table_status`, `notify_private_status`, `site_url`, `site_status`, `close_msg`, `social_link1`, `social_link2`, `social_link3`, `social_link4`, `social_link5`, `social_link6`, `social_link7`, `social_link8`, `social_link9`, `social_link10`, `contact_t1_en`, `contact_t3`, `contact_t4`, `contact_t5`, `contact_t6`, `contact_t7_en`, `style_logo_en`, `style_fav`, `style_apple`, `style_color1`, `style_color2`, `style_color3`, `style_color4`, `style_type`, `style_change`, `style_bg_type`, `style_bg_pattern`, `style_bg_color`, `style_bg_image`, `style_subscribe`, `style_footer`, `style_header`, `style_footer_bg`, `style_preload`, `css`, `js`, `body`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Win a Trading prize upto $10,000 | ProFX League', 'Win a Trading prize upto $10,000 | ProFX League', 'Forex trading competition Dubai, Best forex trading platform Dubai, Dubai forex trading challenge 2025, Learn forex trading Dubai, ProFX League Dubai, Forex trading events Dubai, Online trading league Dubai, Win cash trading forex Dubai, Forex trading community Dubai, Risk-free forex trading Dubai, Forex trading for beginners Dubai, Dubai forex trading prizes, Join forex league Dubai, Forex trading courses Dubai, Competitive forex trading Dubai, Forex trading competition India, Best forex trading platform India, India forex trading challenge 2025, Learn forex trading India, ProFX League India, Forex trading events India, Online trading league India, Win cash trading forex India, Forex trading community India, Risk-free forex trading India, Forex trading for beginners India, India forex trading prizes, Join forex league India, Forex trading courses India, Competitive forex trading India, Forex trading challenge 2025, Online forex trading league, Live forex trading competition, Forex trading prizes 2025, ProFX League registration, Risk-free trading practice, Forex trading community online, Learn to trade forex free, Forex trading leaderboard, Multi-level referral trading program, Forex tradig simulation platform, High-stakes forex trading league, Forex trading strategy tips, Trade forex and win cash, Best forex trading platform 2025', 'info@profxleague.com', 1, 1, 0, 0, 0, 'https://profxleague.com', 1, '<div class=\'text-center\'><img src=\'/assets/frontend/images/maintenance.gif\' width=\'400\'><h1>Website Under Maintenance</h1><h4>Coming Soon</h4></div>', '#', '#', NULL, '#', '#', '#', '#', '#', '#', '#', 'Global link Business centre, 37 Platon Ioseliani St, Tbilisi, Georgia', '+995322885078', '+(xxx) 0xxxxxxx', '+995322885078', 'info@profxleague.com', 'Sunday to Thursday 08:00 AM to 05:00 PM', '17501679713385.png', '17567935251271.svg', '17501673544445.png', '#0cbaa4', '#2e3e4e', '#edf3f2', '#dfeae8', 0, 1, 0, NULL, NULL, NULL, 1, 1, 1, 'footer-bg.webp', 1, NULL, NULL, NULL, 1, 1, '2025-06-17 06:38:50', '2025-09-14 20:51:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smartend_settings`
--
ALTER TABLE `smartend_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smartend_settings`
--
ALTER TABLE `smartend_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
