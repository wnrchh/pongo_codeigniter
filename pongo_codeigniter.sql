-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2017 at 11:52 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pongo_codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'User', '0000-00-00 00:00:00', '2017-05-24 09:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `is_have_child` int(1) NOT NULL,
  `title` varchar(45) NOT NULL,
  `link` varchar(150) NOT NULL,
  `icon` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `is_have_child`, `title`, `link`, `icon`) VALUES
(1, 0, 3, 'Settings', '', 'fa fa-cog'),
(2, 1, 0, 'Users', 'user', 'i i-dot'),
(3, 1, 0, 'Groups', 'group', 'i i-dot'),
(4, 1, 0, 'Privileges', 'privilege', 'i i-dot'),
(59, 0, 0, 'Products', 'product', 'fa fa-database'),
(60, 0, 0, 'Transactions', 'transaction', 'fa fa-dollar'),
(83, 0, 2, 'Menu Styles', '', 'fa fa-random'),
(84, 83, 0, 'Fixed Menu', 'template/fixed_menu', 'i i-dot'),
(85, 83, 0, 'Compact Menu', 'template/compact_menu', 'i i-dot'),
(86, 0, 6, 'Forms', '', 'fa fa-window-restore'),
(87, 86, 0, 'Form Elements', 'template/form_element', 'i i-dot'),
(88, 86, 0, 'Form Validation', 'template/form_validation', 'i i-dot'),
(89, 86, 0, 'Form Buttons', 'template/form_button', 'i i-dot'),
(90, 86, 0, 'Form Wizards', 'template/form_wizard', 'i i-dot'),
(91, 86, 0, 'File Upload', 'template/file_upload', 'i i-dot'),
(92, 86, 0, 'Wysiwyg Editor', 'template/wysiwyg_editor', 'i i-dot'),
(93, 0, 2, 'Tables', '', 'fa fa-calendar'),
(94, 93, 0, 'Basic Table', 'template/basic_table', 'i i-dot'),
(95, 93, 0, 'Datatable', 'template/datatable', 'i i-dot'),
(96, 0, 0, 'Charts', 'template/chart', 'fa fa-signal'),
(97, 0, 10, 'Pages', '', 'fa fa-paper-plane'),
(98, 97, 0, 'Landing Page', 'template/landing_page', 'i i-dot'),
(99, 97, 0, 'Invoice', 'template/invoice', 'i i-dot'),
(100, 97, 0, 'Login', 'template/login_form', 'i i-dot'),
(101, 97, 0, 'Register', 'template/register_form', 'i i-dot'),
(102, 97, 0, 'Lock Screen', 'template/lock_screen', 'i i-dot'),
(103, 97, 0, 'Media', 'template/media', 'i i-dot'),
(104, 97, 0, 'Chat', 'template/chat', 'i i-dot'),
(105, 97, 0, 'Error 404', 'template/error_404', 'i i-dot'),
(106, 97, 0, 'Error 500', 'template/error_500', 'i i-dot'),
(107, 97, 0, 'Blank Layout', 'template/blank_layout', 'i i-dot'),
(108, 0, 0, 'Calendar', 'template/calendar', 'fa fa-map-o'),
(109, 0, 11, 'Icons', '', 'fa fa-paper-plane'),
(110, 109, 0, 'Font Awesome', 'template/font_awesome', 'i i-dot'),
(111, 109, 0, 'Batch', 'template/batch', 'i i-dot'),
(112, 109, 0, 'Dashicon', 'template/dashicon', 'i i-dot'),
(113, 109, 0, 'Dripicon', 'template/dripicon', 'i i-dot'),
(114, 109, 0, 'Eightyshades', 'template/eightyshades', 'i i-dot'),
(115, 109, 0, 'Foundation', 'template/foundation', 'i i-dot'),
(116, 109, 0, 'Metrize', 'template/metrize', 'i i-dot'),
(117, 109, 0, 'Simple Line', 'template/simple_line', 'i i-dot'),
(118, 109, 0, 'Themify', 'template/themify', 'i i-dot'),
(119, 109, 0, 'Typeicon', 'template/typeicon', 'i i-dot'),
(120, 109, 0, 'Weather Icon', 'template/weather_icon', 'i i-dot');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `group_id`, `menu_id`) VALUES
(2284, 1, 1),
(2285, 1, 2),
(2286, 1, 3),
(2287, 1, 4),
(2288, 1, 59),
(2289, 1, 60),
(2290, 1, 83),
(2291, 1, 84),
(2292, 1, 85),
(2293, 1, 86),
(2294, 1, 87),
(2295, 1, 88),
(2296, 1, 89),
(2297, 1, 90),
(2298, 1, 91),
(2299, 1, 92),
(2300, 1, 93),
(2301, 1, 94),
(2302, 1, 95),
(2303, 1, 96),
(2304, 1, 97),
(2305, 1, 98),
(2306, 1, 99),
(2307, 1, 100),
(2308, 1, 101),
(2309, 1, 102),
(2310, 1, 103),
(2311, 1, 104),
(2312, 1, 105),
(2313, 1, 106),
(2314, 1, 107),
(2315, 1, 108),
(2316, 1, 109),
(2317, 1, 110),
(2318, 1, 111),
(2319, 1, 112),
(2320, 1, 113),
(2321, 1, 114),
(2322, 1, 115),
(2323, 1, 116),
(2324, 1, 117),
(2325, 1, 118),
(2326, 1, 119),
(2327, 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `images` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `stock`, `images`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Microsoft Lumia 950 XL Dual SIM', 220, 24, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:22:00', '2017-05-27 00:22:00'),
(2, 'Samsung B130', 221, 50, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:02', '2017-05-27 00:24:02'),
(3, 'Samsung M260 Factor', 232, 89, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:02', '2017-05-27 00:24:02'),
(4, 'Samsung Galaxy S Duos S7562', 243, 59, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(5, 'Samsung Galaxy J2', 212, 35, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(6, 'Samsung Galaxy S Duos 2 S7582', 245, 82, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(7, 'Samsung Ativ Odyssey L930', 401, 40, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(8, 'Samsung Galaxy S4 Active LTE-A', 324, 14, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(9, 'Samsung Galaxy J7', 413, 99, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(10, 'Samsung Galaxy Tab 2', 482, 43, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(11, 'Samsung Galaxy Star 2 Plus', 474, 26, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(12, 'Microsoft Lumia 535 Dual SIM', 396, 23, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(13, 'Microsoft Lumia 430 Dual SIM', 227, 44, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(14, 'Microsoft Lumia 940 XL', 366, 75, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(15, 'Microsoft Lumia 1030', 329, 57, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(16, 'Microsoft Lumia 535', 202, 85, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-05-27 00:24:03'),
(17, 'Microsoft Lumia 540 Dual SIM', 231, 17, '[{"file_name":"nokia-lumia-930-new.27-05-2017_00-15-27.jpg","file_size":7518,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/nokia-lumia-930-new.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-950-1.27-05-2017_00-15-27.jpg","file_size":7217,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_web/public/product_images/microsoft-lumia-950-1.27-05-2017_00-15-27.jpg"},{"file_name":"microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg","file_size":7649,"file_type":"image/jpeg","file_thumbnail":"http://localhost/pongo_laravel/public/product_images/microsoft-lumia-540-ds1.27-05-2017_00-15-27.jpg"}]', '-', '2017-05-27 00:24:03', '2017-07-15 13:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(150) NOT NULL,
  `meta_value` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'Native Theme Inc', '0000-00-00 00:00:00', '2017-07-15 13:20:38'),
(2, 'company_address', '1 Infinite Loop 95014 Cuperino, CA United States', '0000-00-00 00:00:00', '2017-07-15 13:20:38'),
(3, 'company_phone_number', '800-692-7753', '0000-00-00 00:00:00', '2017-07-15 13:20:38'),
(4, 'company_email', 'mail@native-theme.com', '0000-00-00 00:00:00', '2017-06-04 06:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `client_name` varchar(150) NOT NULL,
  `client_address` text NOT NULL,
  `client_phone` varchar(50) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `invoice_number`, `client_name`, `client_address`, `client_phone`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 'TR27052017969', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 19842, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(2, 'TR2705201764', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 68916, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(3, 'TR27052017802', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 76730, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(4, 'TR27052017483', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 44612, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(5, 'TR27052017390', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 47982, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(6, 'TR27052017935', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 24009, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(7, 'TR27052017564', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 29378, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(8, 'TR27052017888', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 51905, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(9, 'TR27052017133', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 24549, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(10, 'TR27052017412', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 37306, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(11, 'TR27052017699', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 75418, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(12, 'TR27052017108', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 72122, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(13, 'TR27052017622', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 78264, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(14, 'TR27052017514', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 20216, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(15, 'TR27052017565', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 83556, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(16, 'TR27052017856', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 67095, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(17, 'TR27052017288', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 78546, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(18, 'TR27052017301', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 22938, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(19, 'TR2705201758', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 65936, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(20, 'TR27052017439', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 61971, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(21, 'TR27052017653', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 7981, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(22, 'TR27052017453', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 70566, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(23, 'TR27052017806', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 18772, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(24, 'TR27052017854', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 50720, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(25, 'TR27052017184', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 15134, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(26, 'TR27052017152', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 26041, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(27, 'TR27052017444', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 59162, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(28, 'TR2705201794', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 44473, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(29, 'TR2705201727', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 13720, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(30, 'TR27052017574', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 65849, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(31, 'TR27052017240', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 73738, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(32, 'TR27052017995', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 77566, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(33, 'TR27052017853', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 56332, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(34, 'TR27052017296', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 36412, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(35, 'TR27052017964', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 60700, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(36, 'TR27052017331', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 51715, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(37, 'TR27052017638', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 56294, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(38, 'TR27052017931', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 20526, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(39, 'TR27052017471', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 43673, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(40, 'TR27052017851', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 65520, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(41, 'TR27052017113', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 31110, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(42, 'TR27052017562', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 84255, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(43, 'TR27052017694', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 34333, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(44, 'TR27052017697', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 59192, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(45, 'TR27052017121', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 4119, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(46, 'TR27052017355', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 86857, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(47, 'TR27052017918', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 75824, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(48, 'TR27052017286', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 11664, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(49, 'TR27052017256', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 10827, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(50, 'TR27052017387', 'Apple Inc', '2nd Floor St John Street, Aberdeenshire 2541 United Kingdom', '800-692-7753', 21433, '2017-05-27 01:03:11', '2017-05-27 01:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `price`, `qty`, `subtotal_price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 243, 28, 6804, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(2, 1, 12, 396, 3, 1188, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(3, 1, 11, 474, 25, 11850, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(4, 2, 3, 232, 84, 19488, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(5, 2, 4, 243, 26, 6318, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(6, 2, 2, 221, 31, 6851, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(7, 2, 12, 396, 3, 1188, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(8, 2, 1, 220, 8, 1760, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(9, 2, 9, 413, 32, 13216, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(10, 2, 16, 202, 27, 5454, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(11, 2, 7, 401, 15, 6015, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(12, 2, 13, 227, 38, 8626, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(13, 3, 9, 413, 2, 826, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(14, 3, 14, 366, 29, 10614, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(15, 3, 3, 232, 66, 15312, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(16, 3, 6, 245, 14, 3430, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(17, 3, 10, 482, 41, 19762, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(18, 3, 15, 329, 41, 13489, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(19, 3, 16, 202, 16, 3232, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(20, 3, 13, 227, 20, 4540, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(21, 3, 2, 221, 25, 5525, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(22, 4, 11, 474, 9, 4266, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(23, 4, 14, 366, 75, 27450, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(24, 4, 1, 220, 15, 3300, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(25, 4, 15, 329, 7, 2303, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(26, 4, 2, 221, 33, 7293, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(27, 5, 7, 401, 40, 16040, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(28, 5, 9, 413, 54, 22302, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(29, 5, 10, 482, 20, 9640, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(30, 6, 7, 401, 23, 9223, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(31, 6, 1, 220, 21, 4620, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(32, 6, 2, 221, 46, 10166, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(33, 7, 13, 227, 16, 3632, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(34, 7, 4, 243, 2, 486, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(35, 7, 3, 232, 17, 3944, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(36, 7, 2, 221, 38, 8398, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(37, 7, 5, 212, 33, 6996, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(38, 7, 15, 329, 18, 5922, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(39, 8, 9, 413, 94, 38822, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(40, 8, 6, 245, 4, 980, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(41, 8, 16, 202, 42, 8484, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(42, 8, 15, 329, 11, 3619, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(43, 9, 4, 243, 43, 10449, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(44, 9, 9, 413, 15, 6195, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(45, 9, 12, 396, 2, 792, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(46, 9, 15, 329, 1, 329, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(47, 9, 5, 212, 32, 6784, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(48, 10, 17, 231, 16, 3696, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(49, 10, 12, 396, 20, 7920, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(50, 10, 13, 227, 43, 9761, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(51, 10, 8, 324, 2, 648, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(52, 10, 9, 413, 37, 15281, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(53, 11, 15, 329, 19, 6251, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(54, 11, 1, 220, 18, 3960, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(55, 11, 9, 413, 89, 36757, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(56, 11, 3, 232, 67, 15544, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(57, 11, 11, 474, 17, 8058, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(58, 11, 16, 202, 24, 4848, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(59, 12, 5, 212, 33, 6996, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(60, 12, 11, 474, 11, 5214, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(61, 12, 7, 401, 24, 9624, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(62, 12, 6, 245, 2, 490, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(63, 12, 8, 324, 1, 324, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(64, 12, 17, 231, 16, 3696, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(65, 12, 2, 221, 24, 5304, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(66, 12, 9, 413, 98, 40474, '2017-05-27 01:03:10', '2017-05-27 01:03:10'),
(67, 13, 17, 231, 15, 3465, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(68, 13, 7, 401, 36, 14436, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(69, 13, 2, 221, 26, 5746, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(70, 13, 11, 474, 26, 12324, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(71, 13, 14, 366, 25, 9150, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(72, 13, 13, 227, 3, 681, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(73, 13, 5, 212, 14, 2968, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(74, 13, 9, 413, 62, 25606, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(75, 13, 8, 324, 12, 3888, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(76, 14, 16, 202, 8, 1616, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(77, 14, 10, 482, 20, 9640, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(78, 14, 2, 221, 35, 7735, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(79, 14, 6, 245, 5, 1225, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(80, 15, 16, 202, 42, 8484, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(81, 15, 14, 366, 34, 12444, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(82, 15, 3, 232, 70, 16240, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(83, 15, 4, 243, 27, 6561, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(84, 15, 9, 413, 30, 12390, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(85, 15, 13, 227, 41, 9307, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(86, 15, 6, 245, 74, 18130, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(87, 16, 6, 245, 32, 7840, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(88, 16, 11, 474, 17, 8058, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(89, 16, 12, 396, 6, 2376, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(90, 16, 14, 366, 56, 20496, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(91, 16, 16, 202, 9, 1818, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(92, 16, 8, 324, 11, 3564, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(93, 16, 13, 227, 41, 9307, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(94, 16, 10, 482, 8, 3856, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(95, 16, 1, 220, 8, 1760, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(96, 16, 7, 401, 20, 8020, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(97, 17, 4, 243, 46, 11178, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(98, 17, 9, 413, 52, 21476, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(99, 17, 12, 396, 2, 792, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(100, 17, 17, 231, 8, 1848, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(101, 17, 2, 221, 32, 7072, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(102, 17, 13, 227, 34, 7718, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(103, 17, 15, 329, 32, 10528, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(104, 17, 14, 366, 49, 17934, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(105, 18, 8, 324, 1, 324, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(106, 18, 3, 232, 87, 20184, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(107, 18, 4, 243, 10, 2430, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(108, 19, 12, 396, 4, 1584, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(109, 19, 6, 245, 70, 17150, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(110, 19, 16, 202, 69, 13938, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(111, 19, 7, 401, 24, 9624, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(112, 19, 15, 329, 50, 16450, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(113, 19, 10, 482, 13, 6266, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(114, 19, 17, 231, 4, 924, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(115, 20, 2, 221, 31, 6851, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(116, 20, 4, 243, 50, 12150, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(117, 20, 5, 212, 18, 3816, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(118, 20, 1, 220, 16, 3520, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(119, 20, 9, 413, 18, 7434, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(120, 20, 11, 474, 19, 9006, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(121, 20, 6, 245, 77, 18865, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(122, 20, 15, 329, 1, 329, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(123, 21, 11, 474, 8, 3792, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(124, 21, 2, 221, 9, 1989, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(125, 21, 1, 220, 10, 2200, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(126, 22, 8, 324, 4, 1296, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(127, 22, 17, 231, 5, 1155, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(128, 22, 9, 413, 44, 18172, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(129, 22, 6, 245, 14, 3430, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(130, 22, 14, 366, 50, 18300, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(131, 22, 15, 329, 43, 14147, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(132, 22, 11, 474, 19, 9006, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(133, 22, 1, 220, 23, 5060, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(134, 23, 1, 220, 16, 3520, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(135, 23, 17, 231, 2, 462, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(136, 23, 11, 474, 23, 10902, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(137, 23, 8, 324, 12, 3888, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(138, 24, 6, 245, 21, 5145, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(139, 24, 2, 221, 27, 5967, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(140, 24, 4, 243, 37, 8991, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(141, 24, 15, 329, 28, 9212, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(142, 24, 7, 401, 36, 14436, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(143, 24, 8, 324, 2, 648, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(144, 24, 13, 227, 23, 5221, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(145, 24, 1, 220, 5, 1100, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(146, 25, 15, 329, 46, 15134, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(147, 26, 7, 401, 2, 802, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(148, 26, 5, 212, 9, 1908, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(149, 26, 15, 329, 3, 987, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(150, 26, 11, 474, 3, 1422, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(151, 26, 3, 232, 11, 2552, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(152, 26, 13, 227, 20, 4540, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(153, 26, 4, 243, 30, 7290, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(154, 26, 1, 220, 15, 3300, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(155, 26, 8, 324, 10, 3240, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(156, 27, 13, 227, 16, 3632, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(157, 27, 14, 366, 60, 21960, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(158, 27, 4, 243, 37, 8991, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(159, 27, 17, 231, 1, 231, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(160, 27, 1, 220, 1, 220, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(161, 27, 6, 245, 20, 4900, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(162, 27, 15, 329, 20, 6580, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(163, 27, 8, 324, 14, 4536, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(164, 27, 5, 212, 8, 1696, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(165, 27, 7, 401, 16, 6416, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(166, 28, 7, 401, 2, 802, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(167, 28, 5, 212, 30, 6360, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(168, 28, 13, 227, 20, 4540, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(169, 28, 14, 366, 32, 11712, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(170, 28, 11, 474, 6, 2844, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(171, 28, 17, 231, 5, 1155, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(172, 28, 4, 243, 59, 14337, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(173, 28, 9, 413, 6, 2478, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(174, 28, 6, 245, 1, 245, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(175, 29, 5, 212, 11, 2332, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(176, 29, 12, 396, 15, 5940, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(177, 29, 13, 227, 24, 5448, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(178, 30, 15, 329, 51, 16779, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(179, 30, 9, 413, 27, 11151, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(180, 30, 12, 396, 21, 8316, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(181, 30, 1, 220, 8, 1760, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(182, 30, 3, 232, 3, 696, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(183, 30, 10, 482, 14, 6748, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(184, 30, 14, 366, 39, 14274, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(185, 30, 6, 245, 25, 6125, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(186, 31, 11, 474, 15, 7110, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(187, 31, 1, 220, 22, 4840, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(188, 31, 14, 366, 25, 9150, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(189, 31, 9, 413, 45, 18585, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(190, 31, 2, 221, 4, 884, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(191, 31, 15, 329, 51, 16779, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(192, 31, 6, 245, 30, 7350, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(193, 31, 3, 232, 4, 928, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(194, 31, 5, 212, 8, 1696, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(195, 31, 7, 401, 16, 6416, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(196, 32, 12, 396, 6, 2376, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(197, 32, 13, 227, 10, 2270, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(198, 32, 10, 482, 2, 964, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(199, 32, 14, 366, 38, 13908, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(200, 32, 11, 474, 10, 4740, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(201, 32, 9, 413, 51, 21063, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(202, 32, 3, 232, 77, 17864, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(203, 32, 1, 220, 15, 3300, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(204, 32, 16, 202, 10, 2020, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(205, 32, 2, 221, 41, 9061, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(206, 33, 3, 232, 14, 3248, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(207, 33, 9, 413, 43, 17759, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(208, 33, 7, 401, 34, 13634, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(209, 33, 14, 366, 45, 16470, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(210, 33, 13, 227, 23, 5221, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(211, 34, 13, 227, 19, 4313, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(212, 34, 9, 413, 50, 20650, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(213, 34, 16, 202, 14, 2828, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(214, 34, 15, 329, 25, 8225, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(215, 34, 12, 396, 1, 396, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(216, 35, 12, 396, 6, 2376, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(217, 35, 14, 366, 56, 20496, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(218, 35, 1, 220, 20, 4400, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(219, 35, 4, 243, 13, 3159, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(220, 35, 17, 231, 12, 2772, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(221, 35, 11, 474, 9, 4266, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(222, 35, 9, 413, 45, 18585, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(223, 35, 16, 202, 23, 4646, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(224, 36, 13, 227, 31, 7037, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(225, 36, 4, 243, 17, 4131, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(226, 36, 2, 221, 23, 5083, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(227, 36, 1, 220, 13, 2860, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(228, 36, 15, 329, 48, 15792, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(229, 36, 12, 396, 12, 4752, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(230, 36, 8, 324, 10, 3240, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(231, 36, 6, 245, 36, 8820, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(232, 37, 13, 227, 37, 8399, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(233, 37, 7, 401, 27, 10827, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(234, 37, 2, 221, 19, 4199, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(235, 37, 8, 324, 13, 4212, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(236, 37, 1, 220, 15, 3300, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(237, 37, 3, 232, 22, 5104, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(238, 37, 10, 482, 13, 6266, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(239, 37, 5, 212, 25, 5300, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(240, 37, 9, 413, 13, 5369, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(241, 37, 11, 474, 7, 3318, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(242, 38, 10, 482, 3, 1446, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(243, 38, 11, 474, 14, 6636, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(244, 38, 14, 366, 34, 12444, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(245, 39, 10, 482, 14, 6748, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(246, 39, 16, 202, 34, 6868, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(247, 39, 7, 401, 21, 8421, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(248, 39, 11, 474, 6, 2844, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(249, 39, 3, 232, 81, 18792, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(250, 40, 5, 212, 20, 4240, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(251, 40, 6, 245, 35, 8575, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(252, 40, 12, 396, 12, 4752, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(253, 40, 1, 220, 23, 5060, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(254, 40, 3, 232, 29, 6728, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(255, 40, 9, 413, 21, 8673, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(256, 40, 16, 202, 2, 404, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(257, 40, 7, 401, 38, 15238, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(258, 40, 11, 474, 25, 11850, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(259, 41, 3, 232, 87, 20184, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(260, 41, 11, 474, 21, 9954, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(261, 41, 8, 324, 3, 972, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(262, 42, 15, 329, 36, 11844, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(263, 42, 14, 366, 57, 20862, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(264, 42, 4, 243, 17, 4131, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(265, 42, 17, 231, 2, 462, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(266, 42, 5, 212, 35, 7420, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(267, 42, 9, 413, 24, 9912, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(268, 42, 7, 401, 20, 8020, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(269, 42, 16, 202, 61, 12322, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(270, 42, 2, 221, 42, 9282, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(271, 43, 17, 231, 10, 2310, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(272, 43, 8, 324, 9, 2916, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(273, 43, 6, 245, 71, 17395, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(274, 43, 14, 366, 32, 11712, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(275, 44, 1, 220, 14, 3080, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(276, 44, 7, 401, 32, 12832, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(277, 44, 13, 227, 30, 6810, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(278, 44, 14, 366, 65, 23790, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(279, 44, 17, 231, 13, 3003, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(280, 44, 6, 245, 17, 4165, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(281, 44, 5, 212, 26, 5512, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(282, 45, 8, 324, 12, 3888, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(283, 45, 17, 231, 1, 231, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(284, 46, 10, 482, 25, 12050, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(285, 46, 15, 329, 25, 8225, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(286, 46, 6, 245, 23, 5635, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(287, 46, 3, 232, 85, 19720, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(288, 46, 12, 396, 8, 3168, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(289, 46, 2, 221, 22, 4862, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(290, 46, 1, 220, 22, 4840, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(291, 46, 5, 212, 35, 7420, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(292, 46, 11, 474, 17, 8058, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(293, 46, 4, 243, 53, 12879, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(294, 47, 1, 220, 20, 4400, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(295, 47, 12, 396, 1, 396, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(296, 47, 14, 366, 60, 21960, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(297, 47, 17, 231, 7, 1617, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(298, 47, 7, 401, 22, 8822, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(299, 47, 4, 243, 47, 11421, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(300, 47, 15, 329, 28, 9212, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(301, 47, 16, 202, 70, 14140, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(302, 47, 10, 482, 8, 3856, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(303, 48, 4, 243, 48, 11664, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(304, 49, 8, 324, 13, 4212, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(305, 49, 6, 245, 27, 6615, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(306, 50, 7, 401, 3, 1203, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(307, 50, 16, 202, 35, 7070, '2017-05-27 01:03:11', '2017-05-27 01:03:11'),
(308, 50, 15, 329, 40, 13160, '2017-05-27 01:03:11', '2017-05-27 01:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', 'johndoe@native-theme.com', '123456', '0000-00-00 00:00:00', '2017-07-15 13:18:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2328;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `privileges`
--
ALTER TABLE `privileges`
  ADD CONSTRAINT `privileges_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `privileges_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
