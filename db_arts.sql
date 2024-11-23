-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 10:53 AM
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
-- Database: `db_arts`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Arts & Crafts', '1731137721.jpg', '2024-11-09 02:35:21', NULL),
(2, 'Gift Articles', '1731145798.avif', '2024-11-09 04:47:14', '2024-11-09 04:49:58'),
(3, 'Greeting Cards', '1731166360.jpg', '2024-11-09 10:32:40', NULL),
(4, 'Home Decoration', '1731211231.jpg', '2024-11-09 23:00:31', NULL),
(5, 'Bags', '1731213790.avif', '2024-11-09 23:43:10', NULL),
(6, 'Files', '1731216240.webp', '2024-11-10 00:23:24', '2024-11-10 00:24:00'),
(7, 'Office Supplies', '1731339612.jpg', '2024-11-11 10:40:12', NULL),
(8, 'Kids’ Toys', '1731395730.jpg', '2024-11-12 02:13:58', '2024-11-12 02:15:30');

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
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `feedback` text NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`order_id`, `product_id`, `feedback`, `rating`, `created_at`, `updated_at`) VALUES
(6, 6, 'Very Amazing', 5, '2024-11-16 11:03:09', '2024-11-16 11:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(16, '2024_10_25_133831_modify_product_image_in_tbl_products_table', 2),
(71, '0001_01_01_000000_create_users_table', 3),
(72, '0001_01_01_000001_create_cache_table', 3),
(73, '0001_01_01_000002_create_jobs_table', 3),
(74, '2024_10_23_095331_drop_users_table', 3),
(75, '2024_10_24_061021_create_tbl_user_table', 3),
(76, '2024_10_28_110309_create_categories_table', 3),
(77, '2024_11_04_053003_create_tbl_products_table', 3),
(78, '2024_11_15_070214_create_orders_table', 4),
(79, '2024_11_16_064143_create_order_items_table', 5),
(80, '2024_11_16_160011_create_feedbacks_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `delivery_type` char(1) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `order_status` int(11) DEFAULT 0,
  `account_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `email`, `phone`, `address`, `quantity`, `total_amount`, `delivery_type`, `payment_status`, `order_status`, `account_number`, `created_at`, `updated_at`) VALUES
(6, 1, 'rizwan', 'rizwan@gmail.com', '3042278844', 'House No llb83 Khanwahan', 2, 1280.00, '1', 'COD', 1, '0', '2024-11-16 01:59:03', '2024-11-17 04:33:36'),
(7, 1, 'rizwan', 'rizwan@gmail.com', '3042278844', 'House No llb83 Khanwahan', 1, 450.00, '1', 'COD', 0, '0', '2024-11-16 02:52:49', NULL),
(8, 1, 'rizwan', 'rizwan@gmail.com', '3042278844', 'House No llb83 Khanwahan', 1, 1600.00, '2', 'Online', 0, '1234567890', '2024-11-16 03:23:57', '2024-11-17 04:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 6, 10073, 1, 200.00, '2024-11-16 01:59:03', NULL),
(3, 6, 10047, 1, 1080.00, '2024-11-16 01:59:03', NULL),
(4, 7, 10013, 1, 450.00, '2024-11-16 02:52:49', NULL),
(5, 8, 10011, 1, 1600.00, '2024-11-16 03:23:57', NULL);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vC6xTckGMK5Go8oBG5b5zc6sjky6nmueGy7Pzq9V', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieXpNd0w4aGY5OGhzc0lWQ0pYb0dib2hHOUduWTFUMTFmTkpPZUVxaCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3ZpZXdmcm9udG9yZGVyLzciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1731837219);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_code` tinyint(3) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_code`, `category_id`, `product_image`, `product_name`, `description`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(10000, 63, 1, '1731137803.webp', 'Acrylic paints', '12pcs Acrylic Colour Paints 30ml per tube.\r\n• 30ml acrylic paints in 12 colors set.\r\n• Ideal for artists and craft enthusiasts.\r\n• Versatile for various art projects and techniques.\r\nIntroducing the 30ml 12pcs Acrylic Colour Paints, perfect for artists and craft enthusiasts. This set offers a vibrant range of colors, ideal for creating stunning artworks on various surfaces. The high-quality acrylic paints provide excellent coverage\r\nand can be easily mixed to achieve custom shades. Whether you\'re a professional artist or a hobbyist, these paints are versatile and suitable for a wide range of art projects. Elevate your creativity with this essential addition to your art supplies collection.', 1900, 80, '2024-11-09 02:36:43', NULL),
(10001, 59, 1, '1731137906.webp', 'Watercolor paints', 'Mont Marte Metallic Watercolor Paint Set 37 Pcs.\r\nMont Marte Signature watercolor cake set.\r\nIncludes 36 metallic color colors paintbrush.\r\nThe lid contains 36 mixing wells.\r\nCreate stunning results on both white and black paper.\r\nPerfect for painting and hand lettering.\r\nResealable plastic case for easy transport and storage.\r\nGreat gift idea!\r\nBrand: Mont Marte.\r\nMade in Australia.\r\nCreate stunning effects on light and dark paper with our Signature Metallic Watercolors. Whether you want to paint shimmering artworks or add a pop of sparkle to your creative projects, you’re going to love this set.', 2400, 40, '2024-11-09 02:38:26', NULL),
(10002, 56, 1, '1731138057.webp', 'Oil pastels', 'Mungyo Oil Pastel MOP - 48 Colors.\r\nParas Art Fever.\r\nMungyo Oil Pastel MOP-48.\r\n48 Colors Box.\r\nFinest Pigment.\r\nVery soft touch.\r\nBrilliant colors.\r\nEasily merged.\r\nFull Stick.\r\nMade in Korea.', 2450, 30, '2024-11-09 02:40:57', NULL),
(10003, 75, 1, '1731138160.webp', 'Colored pencils', 'BAHADUR Pack of 12 Bicolor- Trica- COLOR PENCIL -24 Colors 2 in 1- IMPORTED Includes Silver & Gold- Colour- Stationery.\r\nrica wooden Bicolor\r\nSuperior quality\r\n24 color in 12 color... Interesting?\r\nCompact packaging\r\nBest for Coloring and Shading\r\nTrica wooden Bicolor \r\nSuperior quality\r\n24 color in 12 color... Interesting?\r\nCompact packaging\r\nBest for Coloring and Shading', 450, 60, '2024-11-09 02:42:40', NULL),
(10004, 26, 1, '1731138243.webp', 'Sketch Book', 'Sketch Book - A5 Size - 250g Paper - For Acrylic & Watercolor.\r\n20 sheets\r\n250 g Paper\r\nSize: 5.8 x 8.3 inch\r\nMulticolor beautiful cover page\r\nRecommended for all mediums, i.e. Watercolors, Pastels, etc.\r\nIt can also be used', 250, 10, '2024-11-09 02:44:03', NULL),
(10005, 99, 1, '1731139315.webp', 'Calligraphy Pen Set', 'A 6 nib Calligraphy Set with 1 set of cap and holder.\r\nNib sizes : Broad, Medium, Fine, 4B, 3B, 2B\r\n6 Ink cartridges (EU standard size) plus 1 chrome coated brass converter for large ink capacity.\r\nClassical, Fashionable appearance', 700, 50, '2024-11-09 03:01:55', NULL),
(10006, 54, 1, '1731139592.webp', 'Coloring Kit', 'Kids Art Coloring Kit or Color Kit Art Book Craft Set Artiest Kit Art Set for kids Painting School Kit or Princess 42 PCS Multi Colouring Kit/Set With Button Box or 48pcs kit or 68pcs kit or 86pcs kit or 150pcs kit', 520, 40, '2024-11-09 03:06:32', NULL),
(10007, 83, 1, '1731139734.webp', 'Paint Brushes Set', 'Pack of 10 Multi Shapes High Quality Nylon Professional Art Brush Set Water Color Oil Acrylic Artist Paint Brush Set', 500, 90, '2024-11-09 03:08:54', NULL),
(10008, 98, 1, '1731141216.webp', 'Decorative Washi Tape', '10pcs, Washi Tape - Vintage Watercolor Washi Tape Set with Gold Color Foil - Aesthetic Decorative Tape, Scrapbook, DIY Crafts.', 1600, 90, '2024-11-09 03:33:36', NULL),
(10009, 29, 1, '1731141291.webp', 'Stencil Set', '42pcs Wooden DIY Drawing Template Templates With Markes, Children\'s Drawing Template Drawing Tool Set.', 1200, 50, '2024-11-09 03:34:51', NULL),
(10010, 57, 2, '1731145918.webp', 'Photo Frame', 'Natural Wooden Picture Frames Classic Photo Frame For Wall Hanging With Plexiglass 9X13 10X15 13X18cm Pictures Frame Photo Decor.\r\nThe photo frame is made of natural wood.\r\nThree colors, black photo frame, white photo frame and wood photo frame photo frame\r\nThe thickness of the frame 1 side', 600, 40, '2024-11-09 04:51:58', NULL),
(10011, 37, 2, '1731146080.webp', 'Wooden Pen Stand', 'Wooden Pen Stand / Stationery Holder Organizer Container - Brown.\r\nHigh Quality\r\nMaterial: \r\nWood Durable.\r\nStyle your home/office. \r\nPerfect gift.\r\nSize In inches Length 8.80 Width 5.20 Height 5.80.', 1600, 27, '2024-11-09 04:54:40', NULL),
(10012, 50, 2, '1731146555.webp', 'Gift boxes', '30pcs Gift Box Candy Boxes Snack Boxes Wedding Favor Gift Box DIY Folding Packaging Bag Baby Shower Birthday Party Decoration.\r\nMaterial: Paperboard \r\nColor: As shown\r\nSize: 9*9*5cm; (1mm=0.0393inch,1 inch=2.54cm).\r\nPackage include: 30pcs boxes with ribbon.', 2900, 80, '2024-11-09 05:02:35', NULL),
(10013, 45, 2, '1731146933.webp', 'Personalized Mugs', 'Personalized/Customize Mug, Picture Mug, 3D Mug With Text, Logo, or Photo. Custom Photo Mugs (PERFECT GIFT FOR YOUR FAMILY & FRIENDS).', 450, 55, '2024-11-09 05:08:53', NULL),
(10014, 66, 2, '1731147220.webp', 'Keychains', 'No Brand Customized Wooden Keychain with Photo and Name for your bike and cars keychain.\r\nWooden Keychain Customized with Photo and Name', 200, 79, '2024-11-09 05:13:40', NULL),
(10015, 16, 2, '1731147469.webp', 'Decorative Trays', 'set of 3 home decor (1 jewelry storage box+1 mini vase+1 ovel tray).\r\npre { white-space: pre-wrap; }• Set of 3 elegant home decor pieces in ceramic material• Includes 1 jewelry storage box, 1 mini vase, and 1 oval tray• Non-assembly type, long-lasting shelf life managed• New pattern, perfect for furniture & decor, vases & vessels• Artist name: Light and Scents, model: 2024• Mini vase size: 11 cm, tray size: 18 cm.', 1000, 49, '2024-11-09 05:17:49', NULL),
(10016, 70, 2, '1731147650.webp', 'Throw pillows', 'Soft Decor Plush Pillow Cozy Cushion Cover 45x45cm Home Decor Throw Pillow Cover Living Room Bedroom Sofa Christmas/\r\nPlush Material :Made of soft and comfortable plush material, this pillow cover is perfect for adding a cozy touch to your home decor.\r\n• Versatile Use :This cushion cover can be used not only as a decorative pillow but also as a car seat cover or a throw blanket, making it a versatile addition to your home.\r\n• Variety of Colors :Available in a range of colors, including white, light grey, beige, and dark grey, this pillow cover can be customized to match your personal style.', 600, 80, '2024-11-09 05:20:50', NULL),
(10017, 25, 2, '1731147947.webp', 'Crystal Figurines', 'Miniature Tortoise Statue Chinese Lucky Feng Shui Ornament for Home Office Desk Decoration Crystal Turtle Figurine Home Decor.', 1200, 39, '2024-11-09 05:25:47', NULL),
(10018, 80, 2, '1731148127.webp', 'Leather Bookmarks', '6pcs/Set DIY Heart Diamond Art Corner Bookmarks Leather Book Marks Crystal Rhinestones Diamond Painting Bookmarks for Beginners.\r\nSpecifications:\r\n-Product Name: DIY Heart Diamond Painting Bookmark Corners.\r\n-Material: Leather+ crystal rhinestones.\r\n-Size: 9cmX9cm/3.54inchX3.54inch,10cmX10cm/4inchX4inch.\r\n-About The Diamonds: Each color will be sent more 20%.\r\n-About The Glue: Green Oil-based Glue.\r\n-Package: 6pcs/set,opp bag.\r\n-Package Included:6pcs x Bookmarks,1set x Diamond painting tools(pen,wax,tray).\r\n-About Bookmarks: This is semi-finished diamond art bookmark corners,need to be finished by yourself.', 1560, 38, '2024-11-09 05:28:47', NULL),
(10019, 91, 2, '1731148225.webp', 'Perfume Sets', 'Set of 3 Perfumes Tester Spray | Long Lasting Fragrance for Men.\r\nPremium Quality Fragrance.\r\nSet of 3- 5ml Tester Spray.\r\nSmells Extremely Close To The Original Designer Scent.\r\nLasting up to 6 to 8 hours.\r\nSafe For Skin.\r\nAuthentic Brand.', 500, 60, '2024-11-09 05:30:25', NULL),
(10020, 69, 3, '1731166507.webp', 'Thank You Card', 'Pack Of 100 / Thank You Cards / The Best Part Of My Business Is You - Attract Your Buyers To Give Positive Review/ Grow your business / high quality Cards / Also Customize design Avail .\r\nThank You Card For Your Customers.\r\nPraise Labels For Small Businesses.\r\nDécor For Small Shop Gift Packet.\r\nColor : As Shown.\r\nSize : 3.3 x 2.1 Inches.\r\nCustomize your design ( Avail ).\r\nHigh Quality Cards .', 250, 70, '2024-11-09 10:35:07', NULL),
(10021, 67, 3, '1731166607.webp', 'Congratulation on Graduation', 'Congratulations on Graduation Handmade Customised Greeting Card.\r\nHandmade Customised Quilled Greeting Card', 500, 60, '2024-11-09 10:36:47', NULL),
(10022, 28, 3, '1731166738.webp', 'Happy Father day Card', 'Greeting card, Birthday card for husband , anniversary card, father, mother day card.\r\nBrand :No Brand\r\nHappy birthday to my husband.\r\nAvailable in different color\'s.\r\nFull size standard Card (A5)=Lenght : 8.3 inches * width 5.8 inches approximately.\r\nHigh quality.\r\nHandmade card with envelope.\r\nHappy birthday to my husband. \r\nAvailable in different color\'s .\r\nFull size standard   Card (A5)=Lenght : 8.3 inches * width 5.8 inches approximately.\r\nHigh quality .', 250, 40, '2024-11-09 10:38:58', NULL),
(10023, 19, 3, '1731166896.webp', 'Happy Mother\'s Day Card', 'Happy Mother’s Day Card Wishing Card Seasonal Greeting Card Hand-made Customised Card.\r\nHappy Mother’s Day Card Wishing Card Seasonal Greeting Card Hand-made Card', 550, 89, '2024-11-09 10:41:36', NULL),
(10024, 53, 3, '1731166991.webp', 'Congratulations Card', 'Congratulations Card Wishing Card Greeting Card Hand-made Customised Card.\r\nHand Made Customised Quilled Greeting Card.', 400, 35, '2024-11-09 10:43:11', '2024-11-09 10:43:27'),
(10025, 39, 3, '1731167158.webp', 'Happy Birthday Card', '20pcs Happy Birthday Greeting Card With Envelope Birthday Party Invitation Cards Children DIY Handwritten Cards Message Card Set.\r\nDescription:\r\nMaterial: Card and kraft paper.\r\nProcess: Printing.\r\nStyle: Simple and modern.', 1250, 150, '2024-11-09 10:45:58', NULL),
(10026, 65, 3, '1731167280.webp', 'Happy Friendship Day', 'Friendship day greeting card large size 9 x 6 inch.\r\nGreeting card.\r\nSize 9 x 6 inch.\r\nFriendship card.\r\nHigh quality card.', 750, 60, '2024-11-09 10:48:00', NULL),
(10027, 89, 3, '1731167404.jpg', 'Happy Anniversary Card', 'Happy Anniversary Card Wishing Card Greeting Card Hand-made Customised Card.\r\nHand Made Customised Quilled Greeting Card.', 400, 54, '2024-11-09 10:50:04', NULL),
(10028, 36, 3, '1731167914.jpg', 'Happy new year', 'Greeting Card Clear Print Sincerest Wishes New Year Card.\r\nEasily folded and hiding the 3D pattern inside, this card allows you to bring a unique holiday surprise to everyone who receives it.\r\nEveryone who receives this card will get a unique holiday surprise because this card can be easily folded and hide the 3D pattern inside.\r\nYou can easily fold this card and hide the 3D pattern inside, allowing you to bring a unique holiday surprise to everyone who receives it.\r\nWhoever receives this card will get a unique holiday surprise, because the card can be easily folded and hide the 3D pattern inside.\r\nFolding this card easily and hiding the 3D pattern inside allows you to bring a unique holiday surprise to everyone who receives it.', 1700, 50, '2024-11-09 10:58:34', NULL),
(10029, 44, 3, '1731168063.jpg', 'Best Wishes Card', 'Best Wishes Card Greeting Card Wishing Card Hand-made Customised Card.\r\nHand Made Customised Quilled Greeting Card.', 450, 60, '2024-11-09 11:01:03', NULL),
(10030, 61, 4, '1731211358.webp', 'Wall Clock', 'Bird Cage Wall Clock European Modern Wall Hanging Wooden Clock Crafts Decoration Home Living room Mute Luminous Quartz Wall Clocks Mural Ornaments beautyfull.\r\nA new amazing wall clock art.\r\npattern : laser cut.\r\nSize : 15 by 30 inches.\r\n2.2mm thickness.\r\na charming clock for your home.\r\na new designing bird house clock.', 300, 49, '2024-11-09 23:02:38', NULL),
(10031, 78, 4, '1731211902.webp', 'Wall Decorating Flower', '\"Premium 2 Feet 3D Wall Decorating Flower Sticker: Large Floral Decal - Removable Vinyl - DIY Home Decor - Peel and Stick - Room Decoration - Beautiful Flower Design - Easy to Apply - Wall Art - Self-Adhesive - Elegant 3D Effect - Interior Design - Waterp.\r\nStep 1: Transform your room with the premium 2 feet 3D wall decorating flower sticker.\r\nStep 2: Enjoy the large and beautiful floral decal for a stunning room decoration.\r\nStep 3: Apply easily with the removable vinyl and peel-and-stick design.\r\nStep 4: Experience the elegant 3D effect for a unique DIY home decor.\r\nStep 5: Benefit from the waterproof and durable material for long-lasting use.\r\nStep 6: Perfect for living room, bedroom, or any room decor.\r\nStep 7: Appreciate the high-quality sticker for a creative and stylish decor.\r\nStep 8: Enjoy the easy application and self-adhesive design for a hassle-free experience.', 400, 79, '2024-11-09 23:11:42', NULL),
(10032, 60, 4, '1731212006.webp', 'Butterfly Wall Shelf', 'Decorative Butterfly Wall Shelf, Decoration Candlestick, Wall Décor Ideas, Wooden Wall Shelves (Candle Light Not Include).\r\n• Decorative butterfly wall shelf for elegant wall decor.\r\n• Made of high-quality wood for durability.\r\n• Perfect for displaying candles or other small items.\r\n• Easy to install and adds a touch of sophistication.\r\n• Ideal for any room in your home.\r\n• Candlelight not included.', 100, 200, '2024-11-09 23:13:26', NULL),
(10033, 55, 4, '1731212120.webp', 'Wall Wooden Shelves', 'Adorable Wall Mounted Wooden Shelves - Floating Shelves, Book Shelf, Storage Racks by eFurniturePk.\r\nIdeal for books, DVD\'s, trophies and collectibles\r\nA creative contemporary design and space saving solution for small and narrow areas, yet big enough that it makes a design statement.\r\n5 shelves to store, display and showcase items.\r\nWith its contemporary finish, it is an ideal accent for any living space.\r\nMeasures 12 x 5 x 48\". Weight capacity: 15kg. Attaches to the wall with two screws and anchors. Minor assembly required.\r\nmaterial: wood,( lamination melamine sheet with PVC edge).', 1600, 68, '2024-11-09 23:15:20', NULL),
(10034, 97, 4, '1731212323.webp', 'Wall Panels', '[1 PCS] 3D Wall Panels Foamic Wall Panels Self-Adhesive Wall Panels Peel and Stick 70x70cm.\r\n Instructions:\r\n1. Choose a smooth, clean and dry surface. Firstly dry the surface with a clean cloth before pasting. NOTE:  THIS 3D STICKER IS NOT MADE FOR MOISTURE WALLS.ONLY BEST FOR DRY SURFACES.SO DO NOT PASTE IT ON WET SURFACES. \r\n2. If the wall is damped, aged or just was painted, the wall stickers may automatically fall off after pasting. Therefore, you can use the hair dryer to dry the wall with hot air or paste it after the paint volatilizes for some time. Please carefully select paste position.\r\n3. If you paste the sticker in the wrong position of the wall, you can gently lift up one edge of the sticker and tear it off with a small blade, and it is ok if you re-paste it.', 350, 60, '2024-11-09 23:18:43', NULL),
(10035, 64, 4, '1731212425.webp', 'Desk Lamp', 'Desk Lamp Study Table Study Lamp Decoration Lamp & House Decoration flexible foldable (ONLY Lamp in Box).\r\nLamp Height 38 cm\r\n# Long length Wire140 cm', 1100, 80, '2024-11-09 23:20:25', NULL),
(10036, 18, 4, '1731213306.webp', 'Floral Cycle Decoration', 'Unique Floral Cycle Decoration With Artificial Flowers Bicycle Woven Flower Basket Flower Vase for Home Wedding Decoration Best For Gift Home Deoration.\r\nSize: Bicycle length: 11\'\'; wheel height: 10\'\'.\r\nFeature: accessories of nostalgic bicycle are separated ( handlebar and frame), but they can be installed together easily.\r\nApplying: for Home Decoration, wedding arrangments, party arrangement, and stage decoration,table decoration, etc.\r\nPackage Included: bouquet + plastic bicycle\r\n\r\nEmbellish your home or office space with this extremely elegant-lookingis sure to beautify the surroundings wherever placed piece of home décor, a cycle-shaped flower vase.\r\n\r\nA perfect gift for all occasions, be it your mother, sister, in-laws, boss, or friends, this cycle vase wherever placed, is sure to beautify the surroundings.\r\nPERFECT DÉCOR/GIFT ITEMS:- Perfect Additions To Wedding Flowers, Bouquets, Festival Decor, Occasion Decor, Birthday Decoration, Anniversary, Wedding Gift, Birthday, Mother\'s Day, Father\'s Day, Diwali, Housewarming, Holi, Baisakhi, Eid, Onam, Karva Chauth, Easter, Party Decoration, etc.', 550, 70, '2024-11-09 23:35:06', NULL),
(10037, 71, 4, '1731213453.webp', 'Ladder Shelf', 'Wooden 3 Tier Plant Stand Flower Pot Shelf Rack Solid Wood (Clear).\r\n• 3 tier plant stand made of solid wood.\r\n• Perfect for displaying flowers and plants.\r\n• Sturdy and durable construction.\r\n• Adds a touch of nature to your home decor.\r\n• Ideal for hallway and entryway.\r\n• Handcrafted by Mr. Carpenter.\r\n• Clear finish enhances the natural wood grain.\r\n• Easy to assemble and maintain.\r\nSize: 30 Inches Height And 20 Inches Width.Top Shelf Size : 5 x 18 inchesMiddle Shelf Size : 7 x 18 inches\r\nBottom Shelf Size ; 11 x 18 inches\r\nScrews Are IncludedHave Smooth Sanded Finish. (No Varnish)', 1200, 90, '2024-11-09 23:37:33', NULL),
(10038, 14, 4, '1731213544.webp', 'Ceramic Flower', 'Small Table Ceramic Flower Vase with Iron Stand, Decorative Round Bud Vase, Hydroponics Container, Plant Pot, Floral Vases for Home Decor Centerpieces With Artificial Flower.\r\nSMALL vase, not large. Artificial flower plant + iron stand is included.\r\nExcellent Workmanship Round Ceramic Flower Vase. Round spherical shape, small but beautiful, adorable. Fully glazed, no leaking. It definitely adds a creative touch to your decor. The vases glazed with elegant, attractive white colors. Each of these vases is a little work of art. Simple, graceful and elegant, easily create beautiful ikebana arrangements with just a few flowers.', 1600, 60, '2024-11-09 23:39:04', NULL),
(10039, 81, 4, '1731213617.webp', 'Golden Ginkgo Leaf', '1pcs Golden Ginkgo Leaf Feather Metal Model Figurines Manual Desktop Crafts Ornaments Photo Props Statues Sculptures Home Decor.', 450, 40, '2024-11-09 23:40:17', NULL),
(10040, 11, 5, '1731213880.webp', 'Laptop Bag', 'HP Laptop bag, Backpacks Travel bag.\r\nHP Laptop bag, Backpacks Travel bag Size 17 inches hightWater ResistanceLaptop bag for Student and Business purpose.\r\nHP Laptop bag, Backpacks Travel bag. \r\nSize 17 inches hight.\r\nWater Resistance.\r\nLaptop bag for Student and Business purpose.', 800, 90, '2024-11-09 23:44:40', NULL),
(10041, 90, 5, '1731214093.webp', 'Travel Bag', 'MARKROYAL Large Capacity Fashion Travel Bag For Unsiex Weekend Bag Handle Bag Travel Carry on Bags Dropshipping.', 1200, 50, '2024-11-09 23:48:13', NULL),
(10042, 88, 5, '1731214203.webp', 'Sling Bag', 'Men\'s Small Canvas Crossbody Chest Bag, Multifunctional Sling Bag For Outdoor Sports Travel Hiking Camping.\r\nSling Bag Chest Bag Crossbody Backpack Men and Women Daypack Shoulder Bag for Travel Hiking.\r\nFabric : Nylon/waterproof and wear-resistant.\r\nInner lining/lining: polyester.\r\nStyle: Fashion trend.\r\nColor: Blue,Gray,Black.\r\nSize: 17cm wide x 32cm high x 5cm thick/', 1300, 77, '2024-11-09 23:50:03', NULL),
(10043, 21, 5, '1731214324.webp', 'Fanny Bag', 'Men\'s Breast Package Waterproof Outdoor Sports Bag Canvas Pouch Korean-style Waist Bag Fanny Pouch Crossbody Male Banana Bag.\r\nFeature：\r\n100% Brand New.\r\nMaterial: Oxford cloth.\r\nColor: as picture.\r\nPackage: 1pc.\r\nSize: 28*10*14cm.\r\nConversion: 1inch=2.54cm,  1cm=0.393inches/', 1050, 65, '2024-11-09 23:52:05', NULL),
(10044, 30, 5, '1731214439.webp', 'Diaper Bag', 'Diaper Bag & Accessories Backpack New Fashion Large Capacity Mother Bag Simple and Lightweight Backpack Diaper Bag.\r\nshape vertical square.\r\nNetweight 535g.\r\nhandle type soft handle.\r\nstraps adustable.\r\nclose type zipper.\r\nusage babies clothes, diaper, milk bottles mummy backpack.\r\nlength*width 15*10*6.', 2600, 60, '2024-11-09 23:53:59', NULL),
(10045, 42, 5, '1731214857.webp', 'Folding Bag', 'Ultralight Folding Bag Men Women Waterproof High-volume Portable Backpack Lightweight Travel Bags Outdoor Sports Daypack.\r\nFeatures\r\n\r\n1. Polyester, breathable, lightweight and portable. Waterproof fabric, comfortable and delicate feel.\r\n2. Suitable for intense hiking to leisurely camping.\r\n3. Occasion: camping, hiking, fishing, hiking, mountaineering.\r\n4. Breathable mesh shoulder strap, comfortable and breathable, reducing shoulder pressure.\r\n5. Lightweight design, easy to carry.\r\nSpecifications\r\n\r\nMaterial: Nylon\r\nFabric: Waterproof polyester\r\nColor: Lake Blue, Black, Blue, Gray\r\nUnfolding size: 30cm/11.8in width, 41cm/16.2in height, 11cm/4.33in thickness\r\nStorage size: 7cm/2.75in width, 12cm/4.72in height', 900, 40, '2024-11-09 23:56:03', '2024-11-10 00:00:57'),
(10046, 35, 5, '1731214954.webp', 'Crossbody Bag', 'Waterproof Nylon Crossbody Bags for Women Shoulder Bags Youth Fashion Ladies Handbag Messenger Bag Teenagers Girls School Bags.\r\nNote:Due To Various Factors Such As The Brightness and Light of The Display, The Actual Color of The Product May Be Slightly Different From The Picture Displayed on The Website.', 2200, 54, '2024-11-10 00:02:34', NULL),
(10047, 73, 5, '1731215495.webp', 'Bucket Bag', '3Pcs Female Tassel Bucket Purses And Handbags Women Handbags Set Leather Shoulder Bags Large Capacity Casual Tote Bag.', 1080, 70, '2024-11-10 00:11:35', NULL),
(10048, 68, 5, '1731215593.webp', 'Zippered Bag', 'Chic Vintage Zippered Card Holder Wallet for Women - Secure Multi-Card Slots, Fashionable Faux Leather with Coin PurseLuxurious.', 400, 20, '2024-11-10 00:13:13', '2024-11-10 00:13:26'),
(10049, 38, 5, '1731216016.webp', 'Ladies Handbag', 'New Ladies Handbags Crocodile Chain Pearl Handheld Jelly Bag Women\'s Bag Crossbody Bags for Women Bags for Women.', 1300, 70, '2024-11-10 00:20:16', NULL),
(10050, 23, 6, '1731216436.webp', 'A4 Document File', 'Handheld Organ Bag Folder A4 Large Capacity Student Exam Paper Storage Bag 13 Layers Ticket File Classification Storage Bag.\r\nProduct features:\r\n1. Handheld upright test paper organ bag, 13 large capacity multi-layer folders for primary and middle school students, data sorting and storage bag.\r\n2. The vertical design has 13 layers of large capacity, which can quickly find out the required data. The frosted cover has a texture.\r\n【 13 Layers Large Capacity 】 Vertical design with 13 layers inside, approximately 150-200 sheets of paper, capable of accommodating approximately 300 A4 sheets.\r\n【 Layered Storage 】 Each box contains a type of file that is clear at a glance. Gift label paper can be pasted on each layer of transparent paper to distinguish between files/learning materials.', 1700, 58, '2024-11-10 00:27:16', NULL),
(10051, 84, 6, '1731216623.webp', 'Plastic Folder', 'Plastic folder - 12 pcs.\r\nMaterial:plastic\r\nA Stylish Colourful way to store and carry documents.\r\nHardwearing, low cost polypropylene document folders.\r\nTransparent with a press-stud mechanism to keep contents secure.\r\nWill approximately hold up to 150 sheets of paper.\r\nPackage Included:A Pack of 12 Plastic Document bags.', 400, 77, '2024-11-10 00:30:23', NULL),
(10052, 87, 6, '1731216880.webp', 'Expandable File', 'Portable FC Document Bag Handheld Business Expanding Bag File Folder Storage Organizer School Student Test Paper Holder Pack.\r\nMade of premium PP material, water-resistant and durable. Designed with soft handheld belt, can be used as a daily folder for easy carrying. It can hold lots of paper sheets, A4 size, suitable for most of files or magazines of similar size. 13 Layers of large capacity: each layer can hold 30 sheets of A4 and F4 paper. Can be used to sort and store documents to keep your office organized, can be used to place and display collections of magazines to decorate your room as a great organize helper for home, office and school. Colored layers for sorting the files, with the classification color label so that you can find the file you need immediately. File Holder only, other accessories demo in the picture is not included.', 1200, 148, '2024-11-10 00:34:40', NULL),
(10053, 52, 6, '1731216976.webp', 'Leather File Folder', 'Leather file folder for men file folder file organizer office bag portfolio bag.\r\nOffice Folder A4 SizeBali Leather Portfolio is designed & manufactured for all modern-age professionals – ILARGE INTERIOR POCKET – A large interior pocket in this resume portfolio organizer can be used to store notebooks & other documents of similar sizes. It can also be used as a tablet pocket for most tablets like iPad, Google Nexus, Samsung Galaxy & moreSEAMLESS ORGANIZATION – Organize letters, loose pages, IDs, envelopes, papers, documents & business cards with ease using dedicated internal pockets & compartments in this padfolioDocument organizer adopt high quality balileather material,durable and not easy to deformation* LARGE CAPACITYyou can put into books, business cards, glasses, pens and other small items.meet your different needs.Color black and mustard.', 2000, 30, '2024-11-10 00:36:16', NULL),
(10054, 12, 6, '1731217353.webp', 'Clip File', 'Transparent Color Plastic Clip File FolderA4/A5/A6/Notebook Loose Leaf Ring Binder Planner Agenda School Office Supplies.', 2500, 60, '2024-11-10 00:42:33', NULL),
(10055, 40, 6, '1731217561.webp', 'Assignment Files', 'Pack of 10 Assignment Files, Stick Bar File, A4, Transparent, PVC Plastic, Report Cover.\r\nFor Assignment and Office File Folder,\r\nStick Bar File,\r\nTransparent, PVC Plastic,\r\nReport Cover.\r\nA4 Size,\r\nPVC Plastic,\r\nPacket of 10 Files.', 500, 80, '2024-11-10 00:46:01', NULL),
(10056, 32, 6, '1731217727.webp', 'File Box', '1 pcs, thickened, quadruple file bar, desktop file shelving, storage box, pen holder frame, file box, office supplies.', 2400, 70, '2024-11-10 00:48:47', NULL),
(10057, 94, 6, '1731218773.webp', 'File Folder Desk', 'Unique File Folder Desk Organizer Triangle Wire 9 Section Desktop Iron Storage book Rack Magazine Holder For Office Home Decoration best used able.\r\nMaterial :Metal Wire.\r\nColor :Black -white.\r\nSpecial Feature: Durable.\r\nRome Type: Home, Office,School, Lounge, Living Room, Library.\r\nFinish Type: mate colour.', 500, 40, '2024-11-10 01:06:13', NULL),
(10058, 27, 6, '1731218888.webp', 'Binder Sleeves', '10 Pcs Binder Sleeves 1P 2P 4P Photo Album Binder Refill Inner Cards Photocard Refill Bags Pockets For Mini Name Card.\r\nDescription:\r\nBrand new and high quality.\r\nMaterial : PP \r\nSuit for Standard A5 binder.\r\nSleeves size :15.2*19.8cm,  ( -sided).\r\nA5-1 grid can hold a maximum height of 195mm and a maximum width of 132mm per grid.\r\nA5-2 grid can hold a maximum height of 95mm and a maximum width of 132mm per grid.\r\nA5-4 grid can hold a maximum height of 93.5mm and a maximum width of 66.5mm per grid.', 440, 56, '2024-11-10 01:08:08', NULL),
(10059, 20, 6, '1731219002.webp', 'Folder Wallet', 'MOTARRO 24 Pocket Folder Wallet Bag Documents Organizer File Pouch Bill Folder Document Folders Organizer School Office Binder.\r\n24 Pockets for Maximum Storage :With 24 pockets, this folder wallet bag provides ample space to store all your documents, bills, and files.', 1320, 88, '2024-11-10 01:10:02', NULL),
(10060, 43, 7, '1731342230.webp', 'File cabinet', 'File cabinet ,with 3_drawer.\r\n- Brand:khalilsafdar woods - Color:black brown darkbrown white - Size:40x40x43 - Metrial:Lemination board with PVC edge', 12000, 88, '2024-11-11 11:23:50', NULL),
(10061, 86, 7, '1731343239.webp', 'Ergonomic Chair', 'Home Office Chair Ergonomic Desk Chair Mesh Computer Chair with Lumbar Support Armrest Executive Rolling Swivel Adjustable Mid Back Task Chair, Black.\r\nNOTE : OUR CHAIRS ARE TOTTALY NEW CHINA IMPORTED IN 1ST SUPERIOR QUALITY .\r\nDOES NOT COMPARE WITH LOCAL MARKET CHAIRS . BEAWARE OF LOCAL CHAIRS. THANKS.\r\nYOU WILL GET A SUPERIOR QUALITY IMPORTED CHAIRS FROM TRUST GOODS ONLINE.', 8200, 60, '2024-11-11 11:40:40', NULL),
(10062, 48, 7, '1731392747.webp', 'Correction White Tape', 'Stationary Item - Correction White Tape.\r\nFullmark Correction White Tape 5M- Quickly Stickup Smooth Performance 1 Pc Correction Tape Mini Size Quickly Stick Up For Pocket Stationery Item Words Removal & Write Again White Useful.\r\nSmooth Performance.\r\nSelf Adhesive.\r\n5M Length.\r\nQuickly Stickup.\r\nEasy to use.\r\nPack of Two Correction Tape.\r\nSmooth Performance.\r\nQuickly Stickup.\r\nEasy to use like Whito Pen.\r\nFullmark Correction White Tape 5M- Quickly Stickup Smooth Performance 1 Pc Correction Tape Mini Size Quickly Stick Up For Pocket Stationery Item Words Removal & Write Again White Useful', 150, 59, '2024-11-12 01:25:47', NULL),
(10063, 34, 7, '1731394507.jpg', 'Office Desk', 'Office Desk Book Storage Home Makeup Plastic Drawer Box Stationery Container.\r\nProduct characteristics:\r\n1, desktop storage box sweet style, multifunctional use.\r\n2. Bring your own drawer to store many items.\r\n3, the sense of atmosphere can be decorated with a variety of stickers.\r\n4. Multi-color selection.\r\nProduct specifications:\r\nName; Desktop student storage box.\r\nMaterial; HIPS+PS.\r\nSize; 19.5 * 14.2 * 10 cm.', 2700, 99, '2024-11-12 01:55:07', NULL),
(10064, 72, 7, '1731394746.webp', 'Binder Clips', '20X Black Metal Binder Clips 15mm Notes Letter Paper Clip Office Supplies Binding Securing Clip Prod.\r\nLetter Paperclip Office Supplies Binding Secure Clip.\r\nProduct Feature:\r\nMaterial:Metals.\r\nSize: 15mm (20 pcs).\r\nColor: black.\r\n100% new and high quality These Black Binder clips are ideal for keeping papers, receipts, letters organized.\r\nFor home or professional use Ideal for keeping schoolwork, office paperwork and amp.\r\nbills organized Made of high quality steel.\r\nPackaging: 1 set of binder clip (20 pcs / batch)', 500, 30, '2024-11-12 01:59:06', NULL),
(10065, 41, 7, '1731394910.webp', 'DELI Mini Stapler', 'DELI Mini Stapler Set Portable Color Paper Binding Machine Use 24/6 26/6 Staples Fashion Stationery Office Supplies.', 800, 58, '2024-11-12 02:01:50', NULL),
(10066, 58, 7, '1731395022.webp', 'Colour Paper', 'Color Colour Paper 100 Sheets, Multi Colors - A4 Size.\r\nA4 size papers.\r\n10 different colours.\r\nEach colour having 10 sheets.\r\nMix shades : light and dark colours.\r\nBest for school projects.', 500, 60, '2024-11-12 02:03:42', NULL),
(10067, 85, 7, '1731395130.webp', 'Sticky Notes', '1Pcs 80Sheets Sticky Stationery Notepad Office Bookmark Sticky Notes Khaki / White /Stickers In Notebook Memo Pad.', 550, 70, '2024-11-12 02:05:30', NULL),
(10068, 10, 7, '1731395238.webp', 'Artisan Sketch Markers', 'Artisan Sketch Markers Copic Twin Double Headed Markers alc_ohol ink markers for Drawing Touch Sketch.\r\nSet of sketch markers for drawing Touch Sketch 24 PCSwho are passionate about drawing and calligraphy, love to create comics and pictorial sketches.The set contains 24 markers in different colors. The body is plastic, smooth. The caps close tightly. For ease of recognition of the type of pen, the ends of the markers are colored in different colors. Each color has its own digital code, which is printed on the marker cap. Alc_ohol-based ink absorbs well into paper, so thick paper or cardboard is recommended. The colors mix well with each other, the transition of shades is smooth. Good selection of shades for human skin Marker length 15.5 cm.', 830, 70, '2024-11-12 02:07:18', '2024-11-12 02:09:13'),
(10069, 79, 7, '1731395460.webp', 'Highlighters stationary', '6pcs/set Pastel Color Highlighter Kawaii Stationery Color Marker School Supplies Student Marker Highlighter Japanese Stationery.', 660, 50, '2024-11-12 02:11:00', NULL),
(10070, 62, 8, '1731396070.webp', 'Magnetic Blocks Set', '24-36-42-64 Pes Magnetic Blocks Set Toy Magnetic Bar Constructor Building Blocks Montessori Educational Kids Toys For Children Early Educational Toys Set, Magnetic Building Sticks Kit Kids Gift for Age 3+, Recreational Building Sticks Block Set.\r\nStep 1:\r\n- Product Title: 24-36-42-64 Pes Magnetic Blocks Set Toy\r\n- Category Path: Toys Kids & Babies>Toys>Blocks & Building Toys\r\nStep 2:\r\n- Additional Keywords: Magnetic, Constructor, Montessori, Educational, Kids, Children, Sticks, Building\r\nStep 3:\r\n• Educational magnetic blocks set for kids age 3+\r\n• Montessori-inspired construction toy for early learning\r\n• Includes 24-36-42-64 pieces for versatile building options\r\n• Encourages creativity, imagination, and fine motor skills\r\n• Magnetic bars and sticks for easy and secure construction', 1000, 60, '2024-11-12 02:21:10', NULL),
(10071, 74, 8, '1731396242.webp', 'Puzzle Building Blocks', 'Kids Face Change Expression Puzzle Building Blocks Montessori Cube Table Game Toy Early Educational Toys for Children Gifts.\r\nFeatures:\r\n\r\n1. The Blocks toy is suitable for 3-12 kids and is a great interactive game toy.  Kids take one card and build the blocks according to the reference.  The one takes the shortest time wins.\r\n2. The block puzzle toy has four colors blocks.  Each side of the blocks has a different cartoon expressions and there are 64 cute emoticons on the directive cards.  It looks very interesting so it can quickly arouse your child\'s interest.\r\n3.  The expression block toy has a cute and fun appearance so children will quickly concentrate on and enjoy this toy.  It stimulates children\'s attention and enhances their hand-eye coordination, logical thinking, hands-on ability and fine motor skills.\r\n4. The sturdy packaging box makes this toy portable.  Kids can play with their family members as well as their school classmates.  This game promotes children\'s interpersonal skills and deepens friendships between children.\r\n5. The toy box and cards are cartoonish and childish, perfect as children gift.  The box is designed with thoughtful grooves for children to pick up the cube blocks, which is easy to store easy to carry.  No doubt, kids will love this gift.\r\nNote:\r\n1. We support dropship and wholesale. Don\'t hesitate to contact with us if you have any questions.\r\n2. Due to the light and screen difference, the color may be slightly different from the pictures.\r\nSpecifications of Kids Face Change Expression Puzzle Building Blocks Montessori Cube Table Game Toy Early Educational Toys for Children Gifts\r\nBrandNo BrandSKU561335934_PK-2597135596Recommended Age12 Years and above\r\nWhat’s in the box	کڈز مونٹیسوری کیوب فیس چینج ایکسپریشن پزل بلڈنگ بلاکس تعلیمی ٹیبل گیم کھلونا 3-12 سال کی عمر کے بچوں کے لیے', 980, 100, '2024-11-12 02:24:02', NULL),
(10072, 47, 8, '1731397011.webp', 'Electric Toy Car', 'Anime Pixar Cars 3 Electric Toy Car Lightning Mcqueen Spider Man Four Channel Remote Control Car Model Toys For Children Gift.\r\nProduct Information:\r\nProduct name: Toy Story series remote control vehicle.\r\nLift car size: 19 * 10.5 * 8.5cm.\r\nOriginal box size: 28 * 12 * 12.5cm.\r\nMaterial: plastic.', 2200, 50, '2024-11-12 02:36:51', NULL),
(10073, 33, 8, '1731397157.webp', 'Book Painting', 'Magic Water Book Painting Drawing Coloring Board Book Doodle & Magic Water Pen.\r\nMagic Colouring Bookwith Water PenJust fill the water in the pen and do painting on the magic bookExcellent quality.\r\nMagic Colouring Book.\r\nwith Water Pen.\r\nJust fill the water in the pen and do painting on the magic book.\r\nExcellent quality.', 200, 80, '2024-11-12 02:39:17', NULL),
(10074, 82, 8, '1731397301.webp', 'Kitchen Set', 'Kitchen Accessories Set, Play Cooking Toys 2 Colors Random, Mini Dishes Plastic Playset.', 1800, 40, '2024-11-12 02:41:41', NULL),
(10075, 17, 8, '1731397459.webp', 'Dart Board for Kids', 'Dart Board for Kids Toys.Dart Games for Kids Dart Game Party Games for Kids Ducational Toys Birthday Party Games for Kids.\r\n• Sucker Sticky Ball :The sucker sticky ball design ensures that the dart board stays in place, making it easier for kids to play and enjoy.\r\n• Educational Toy :This dart board is not only fun but also educational, helping kids develop their coordination and problem-solving skills.\r\n• Party Game :Perfect for parties and get-togethers, this dart board is a great way to keep kids entertained and engaged in group activities.\r\n• Unisex Design :With a design that appeals to both boys and girls, this dart board makes a great gift for any child.', 500, 50, '2024-11-12 02:44:19', NULL),
(10076, 77, 8, '1731397646.webp', 'Dentist Play Set', '9PCS Plastic Simulation Dentist Play Set Medical Kit Pretend Toy for Kids Hygienic Habbit Cultivation Role Play Game for Children.\r\n• Plastic Material :Crafted from high-quality plastic, this dentist play set is durable and safe for children aged 3-6 years. It\'s designed to withstand rigorous play while ensuring the kids\' well-being.\r\n• Educational Toy :This medical kit pretend toy serves as a fun and interactive way to teach kids about hygiene and the role of a dentist. It stimulates their imagination and enhances their learning experience.', 600, 70, '2024-11-12 02:47:26', NULL),
(10077, 92, 8, '1731397882.webp', 'Crocodile Teeth Toys.', 'Crocodile Teeth Toys For Kids Alligator Biting Finger Dentist Games. Funny For Party And Children Game Of Luck Pranks Kids Toys.\r\n• Unique and Fun Design :The crocodile teeth toys have a fun and unique design that will capture the attention of kids and adults alike.\r\n• Interactive Play :These toys are perfect for interactive play, allowing kids to pretend to be a dentist or play a game of luck pranks.\r\n• Durable Material :Made from high-quality plastic, these toys are durable and can withstand rough play without breaking easily.', 1070, 60, '2024-11-12 02:51:22', NULL),
(10078, 46, 8, '1731398082.webp', 'Piano Keyboard Game', 'Kids Cartoon Piano Keyboard Game with Animal Sounds Flashing Light Music Baby Instrument Music Toys Educational Toys Kids Gifts.\r\nDescription:\r\nMaterial: High Quality Plastic\r\nStyle: A & B\r\nColor: As image show\r\nSize: \r\nA: 18.5*16.5*3.5cm(7.28*6.49*1.37in)\r\nB: 18*16*3.5cm(7.08*6.29*1.37in)\r\nBattery: 3xAA Battery (Not Included) \r\nPacking: The item will be packed without original box!!!', 980, 80, '2024-11-12 02:54:42', NULL),
(10079, 22, 8, '1731398348.webp', 'Shooting Practice Toys', 'Soft Bullet Target Practice Toy for Children, Educational Shooting Practice Toys with Soft Bullets.', 1200, 50, '2024-11-12 02:59:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `mobile`, `gender`, `role`, `image`, `created_at`, `updated_at`) VALUES
(1, 'rizwan', 'rizwan@gmail.com', '$2y$12$p/yhSOuXRRaEnGghuQHtZOYk9Vl8pTpefJDA6rvkk5eDjIEfmp3HK', 3042278844, 'male', 1, NULL, '2024-11-16 01:36:46', NULL),
(2, 'Muhammad Mudasir', 'mudasir@gmail.com', '$2y$12$p/yhSOuXRRaEnGghuQHtZOYk9Vl8pTpefJDA6rvkk5eDjIEfmp3HK', 3042278844, 'male', 1, NULL, '2024-11-16 10:28:27', NULL),
(3, 'admin', 'admin@gmail.com', '$2y$12$l9JViA3wL63HjdbYG3j1NuQEc/zuVzo4QTyEHBrZ/LuOEucL0T8Mq', NULL, NULL, 0, NULL, '2024-11-17 03:24:03', NULL);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_products_id_unique` (`id`),
  ADD UNIQUE KEY `tbl_products_product_code_unique` (`product_code`),
  ADD KEY `tbl_products_category_id_foreign` (`category_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_user_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10080;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
