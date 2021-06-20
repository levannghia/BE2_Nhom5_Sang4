-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2021 at 01:02 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_status`) VALUES
(2, 'Rau củ an toàn 4K', NULL, 'Ẩn'),
(3, 'Thịt, Cá, Trứng', NULL, 'Hiện'),
(4, 'Đồ uống các loại', NULL, 'Ẩn'),
(5, 'Mì , Cháo , Phở , Bún', '<p><strong>Sản phẩm đóng gói, món ăn tiện lợi , món ăn nhanh</strong></p>', 'Hiện'),
(6, 'Trái cây tươi ngon', NULL, 'Hiện'),
(7, 'Thực phẩm đông lạnh', NULL, 'Hiện');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_product_id_foreign` (`product_id`),
  KEY `comments_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `comment`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 2, 0, '1.5 nhieu the', 'Phát', 'thanhphat147@gmail.com', '2021-06-14 05:14:47', '2021-06-14 05:14:47'),
(2, 2, 0, 'bớt nửa lít đi, tui muốn mua 1 lít thôi', 'Phát', 'thanhphat147@gmail.com', '2021-06-14 05:16:37', '2021-06-14 05:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2021_04_24_070825_create_product_table', 1),
(3, '2021_04_24_071132_create_review_table', 1),
(4, '2021_04_24_071846_create_orderdetail_table', 1),
(5, '2021_04_24_071858_create_order_table', 1),
(11, '2021_04_24_071932_create_category_table', 3),
(7, '2021_05_30_002355_create_comment_table', 1),
(8, '2021_05_31_081536_create_shipping_table', 2),
(9, '2021_05_31_081806_create_payment_table', 2),
(10, '2021_06_01_055015_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_total` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_shipping_id_foreign` (`shipping_id`),
  KEY `orders_payment_id_foreign` (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, '2', '3', '1', '34,000.00', 'Đang chờ xử lý', '2021-06-14 02:03:56', NULL),
(2, '2', '4', '2', '17,500.00', 'Đang chờ xử lý', '2021-06-14 04:12:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_detail_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int NOT NULL,
  `sale_quantity` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_detail_id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `sale_quantity`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Nước ngọt Pepsi Cola 1.5L', 17000, '2', NULL, NULL),
(2, '2', '2', 'Nước ngọt Coca Cola chai 1.5 L', 17500, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Đang chờ xử lý', NULL, NULL),
(2, '1', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_rating` int NOT NULL DEFAULT '0',
  `product_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_view` int NOT NULL DEFAULT '0',
  `product_quantity` int NOT NULL DEFAULT '0',
  `category_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_total_comment` int NOT NULL DEFAULT '0' COMMENT 'tổng số comment',
  `product_total_review` int NOT NULL DEFAULT '0' COMMENT 'tổng số đánh giá',
  `product_total_number` int NOT NULL DEFAULT '0' COMMENT 'Tổng số điểm đánh giá',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_content`, `product_price`, `product_rating`, `product_image`, `product_view`, `product_quantity`, `category_id`, `product_total_comment`, `product_total_review`, `product_total_number`, `created_at`, `updated_at`) VALUES
(1, 'Nước ngọt Pepsi Cola 1.5L', 'HSD còn 67 ngày', 'Thương hiệu Pepsi (Mỹ)\r\nSản xuất tại Việt Nam\r\nLoại nước nước ngọt\r\nThành phần Nước bảo hoà CO2, đường mía, đường HFCS, màu tổng hợp, chất điều chỉnh độ acid, caffein, chất ổn định, hỗn hợp hương tự nhiên\r\nLượng ga Có ga\r\nLượng đường Có đường', 17000, 0, '1623500367-pes.jpg,1623500367-pesi.jpg,1623500367-pessi.jpg', 2, 100, '4', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-14 04:12:13'),
(2, 'Nước ngọt Coca Cola chai 1.5 L', 'HSD còn 3 tháng', 'Thương hiệu Coca Cola (Mỹ)\r\nSản xuất tại Việt Nam\r\nLoại nước nước ngọt\r\nThành phần Nước bão hòa CO2, đường HFCS, đường mía, màu tự nhiên (caramen nhóm IV), chất điều chỉnh độ acid (338), hương cola tự nhiên, caffeine, chất tạo ngọt tổng hợp (sucralose).\r\nLượng ga Có ga\r\nLượng đường  Ít đường', 17500, 3, '1623501411-c3.jpg,1623501411-c2.jpg,1623501411-c1.jpg', 3, 100, '4', 2, 1, 3, '2021-06-21 05:19:27', '2021-06-14 05:16:37'),
(3, 'Nước ngọt Mirinda vị soda kem 1.5L', 'HSD còn 40 ngày', 'Thương hiệu Mirinda (Việt Nam)\r\nSản xuất tại Việt Nam\r\nLoại nước nước ngọt\r\nHương vị soda kem\r\nThành phần Nước bão hoà CO2, đường mía, hương soda kem giống tự nhiên, chất điều chỉnh axit 330,...\r\nLượng ga Có ga\r\nLượng đường  Có đường', 20000, 0, '1623501648-m3.jpg,1623501648-m2.jpg,1623501648-m1.jpg', 0, 100, '4', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:00:23'),
(4, 'Nước ngọt Mirinda hương cam 1.5L', 'HSD còn 5 tháng', 'Thương hiệu Mirinda (Việt Nam)\r\nSản xuất tại Việt Nam\r\nHương vị hương cam\r\nThành phần\r\nNước bão hòa CO2, đường, đường mía, chất tạo độ chua…\r\nLượng ga Có ga\r\nLượng đường Có đường', 20000, 0, '1623501821-r3.jpg,1623501821-r2.jpg,1623501821-r1.jpg', 1, 100, '4', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 05:59:32'),
(5, '24 chai nước tăng lực Compact vị cherry 330ml', 'HSD còn 4 tháng', 'Thương hiệu Compact (Việt Nam)\r\nSản xuất tại Việt Nam\r\nThành phần Nước, đường, glucose syrup, chất điều chỉnh độ acid (330, 500ii), chất tạo khí carbonic (290), hương liệu (hương mật hoa tự nhiên, hương cherry tổng hợp, giống tự nhiên), taurine 3g/l, chất tạo ngọt tổng hợp, caffein 200mg/l, hỗn hợp vitamin, chất bảo quản, chất tạo màu tổng hợp\r\nHướng dẫn sử dụng Lắc nhẹ trước khi uống, dùng ngay sau khi mở nắp. Ngon hơn khi uống lạnh.', 214000, 0, '1623502075-111.jpg,1623502075-11.jpg,1623502075-1.jpg', 1, 100, '4', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-18 05:51:50'),
(6, 'Thùng 24 lon nước tăng lực Muaythai 250ml', 'HSD còn 11 tháng', 'Thương hiệu Muaythai ()\r\nSản xuất tại Việt Nam\r\nThể tích 250ml\r\nBảo quản Để nơi khô ráo, thoáng mát, tránh ánh sáng trực tiếp hoặc nơi có nhiệt độ cao.', 232000, 0, '1623502193-qqq.jpg,1623502193-qq.jpg,1623502193-q.jpg', 0, 100, '4', 0, 0, 0, '2021-06-21 05:49:53', '2021-06-12 05:57:41'),
(7, 'Thùng 12 chai nước ngọt Mirinda hương xá xị 1.5 lít', 'HSD còn 33 ngày', 'Thương hiệu Mirinda (Việt Nam)\r\nSản xuất tại Việt Nam\r\nHương xá xị\r\nLượng ga Có ga\r\nLượng đường Có đường\r\nThể tích 1.5 lít\r\nSố lượng Thùng 12 chai', 230000, 0, '1623502321-eee.jpg,1623502321-ee.jpg,1623502321-e.jpg', 1, 100, '4', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 05:56:50'),
(8, 'Thùng 24 lon trà hoa cúc Yeo\'s 300ml', 'HSD còn 1 năm', 'Thương hiệu Yeo\'s (Singapore)\r\nLoại trà Trà hoa cúc\r\nDung tích 300ml\r\nLượng đường Có đường\r\nHướng dẫn sử dụng Lắc đều trước khi dùng. Ngon hơn khi uống lạnh', 225000, 0, '1623502440-www.jpg,1623502440-ww.jpg,1623502440-w.jpg', 0, 100, '4', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 05:54:00'),
(9, 'Thùng 12 chai trà ô long Tea Plus 1 lít', 'HSD còn 8 tháng', 'Thương hiệu Tea Plus\r\nLoại trà Trà ô long\r\nDung tích 1 lít\r\nLượng đường Có đường\r\nHướng dẫn sử dụng', 185000, 0, '1623502990-ttt.jpg,1623502990-tt.jpg,1623502990-t.jpg', 0, 100, '4', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:03:10'),
(10, 'Thùng 40 gói mì khô gà cay Samyang vị Carbonara 130g', 'HSD còn 1 năm', 'Loại mì Mì khô\r\nVị mì Gà cay Carbonara\r\nKhối lượng 130g / gói\r\nThành phần Bột mì, tinh bột sắn biến tính, dầu cọ, tinh bột khoai tây biến tính, muối, chất nhũ hóa lecithin, chất điều chỉnh độ acid (E501i, E500, E339ii, E330), chất làm dày (E412), tinh dầu trà xanh, nước, bột gà tổng hợp, nước tương, đường, bột ớt, dầu nành, hành, dầu hạt ớt, tỏi, chiết xuất paprika, chiết xuất ớt, bột tiêu, bột cà ri, sữa bột nguyên chất, sữa bột, bột phô mai mozzarella, bột bơ, rau mùi tây, bột ớt, bột tỏi, dầu nành.\r\nCách dùng Cho mì vào 600ml nước sôi và nấu trong 5 phút. Đổ bớt nước ra (để lại khoảng 8 muỗng nước), sau đó cho gói súp và gói bột phô mai vào. Trộn đều và thưởng thức\r\nBảo quản Để nơi khô ráo, thoáng mát tránh ánh nắng mặt trời.\r\nThương hiệu Samyang (Hàn Quốc)\r\nSản xuất tại Hàn Quốc', 1255000, 0, '1623503152-mmmmm.jpg,1623503152-mmm.jpg,1623503152-mm.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:05:52'),
(11, 'Thùng 10 túi mì Koreno Jumbo vị bò cay 1kg', 'HSD còn 4 tháng', 'Loại mì Mì nước\r\nVị mì Bò cay\r\nSợi mì Sợi tròn, nhỏ\r\nKhối lượng 1kg / túi\r\nThành phần VẮT MÌ - Bột mì, dầu thực vật, tinh bột khoai mì, muối, chất ổn định (pentanatri triphosphat (451(i)), kali carbonat (501(i)), natri carbonat 500(i))), chất làm dày (gôm gua (412), propylene glycol alginat (405)), phẩm màu tự nhiên (riboflavin (101(i))).\r\nGÓI GIA VỊ - Bột bò (4.4% khối lượng), muối, đường, chất điều vị (mononatri glutamat (621)), bột xì dầu, bột tỏi, glucoza, bột ớt, chất điều vị (Dinatri 5\' - Inosinat (631), Dinatri 5\' - Guanylat (627)), phẩm màu tự nhiên (Parika oleoresin (160c)), gia vị, bột gừng, chất điều chỉnh độ acid (natri citrat (33f)), bột tiêu, dầu ớt.\r\nGÓI RAU - Cà rốt khô, hành khô.\r\nCách dùng Đun sôi 400ml ~ 450ml nước. Cho vắt mì, gói gia vị, gói rau vào nồi cùng một lúc, nấu trong 4 phút. Sau đó tắt bếp, múc ra bát và dùng được ngay. Sẽ ngon hơn khi bạn cho thêm trứng, hành, rau thơm.\r\nBảo quản Để nơi khô ráo, thoáng mát tránh ánh nắng mặt trời.\r\nThương hiệu Koreno (Việt Nam)\r\nSản xuất tại Việt Nam', 760000, 0, '1623503238-yyyy.jpg,1623503238-yy.jpg,1623503238-y.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:07:18'),
(12, 'Thùng 36 ly mì Mama hương thịt heo bằm 60g', 'HSD còn 4 tháng', 'Loại mì Mì nước\r\nVị mì Thịt heo bằm\r\nSợi mì Sợi tròn, nhỏ\r\nKhối lượng 60g / ly\r\nThành phần Bột mì, shortening, gia vị (hành, tỏi, tiêu), thịt heo (0,19%), vitamin A và sắt, chất điều vị (E621, E631, E627), chất điều chỉnh độ acid (E451 (i), E500(ii)), chất ổn định E501(i), chất tạo gel (E466), màu thực phẩm tự nhiên (E150a), hương thịt heo nhân tạo.\r\nCách dùng Rắc gói gia vị lên vắt mì, sau đó đổ khoảng 400ml nước sôi ngập bề mặt mì trong khoảng 3 phút là có thể dùng ngay.\r\nBảo quản Để nơi khô ráo, thoáng mát tránh ánh nắng mặt trời.\r\nThương hiệu Mama (Thái Lan)\r\nSản xuất tại Thái Lan', 515000, 0, '1623503325-zzz.jpg,1623503325-zz.jpg,1623503325-z.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:08:45'),
(13, 'Thùng 30 gói mì udon rong biển New Way 85g', 'HSD còn 8 tháng', 'Loại mì Mì không chiên\r\nVị mì Rong biển\r\nSợi mì Sợi tròn, nhỏ\r\nKhối lượng 85g / gói\r\nThành phần VẮT MÌ - Bột lúa mì, tinh bột acetat (1420), muối i-ốt, đường, bột nghệ, chất ổn định (pentanatri triphosphat, natri cacboxymethyl cellulose).\r\nGIA VỊ - Muối I-ốt, đường, dầu thực vật (palm olein tinh luyện, dầu mè), chất điều vị (mononatri glutamat, dinatri 5\'-inosinat, dinatri 5\'-guanylat), bột đạm thực vật thủy phân từ đậu nành, rong biển sấy 7%, hạt mè, bột gừng, hành paro, ngò rí.\r\nCách dùng Cho 450ml nước vào nồi đun sôi. Khi nước sôi, cho mì và các gói gia vị vào rồi đun sôi trong vòng 4 phút. Có thể thêm đậu hủ hoặc các thực phẩm khác theo ý thích để tăng giá trị dinh dưỡng.\r\nBảo quản Để nơi khô ráo, thoáng mát tránh ánh nắng mặt trời.\r\nThương hiệu New Way (Việt Nam)\r\nSản xuất tại Việt Nam', 285000, 0, '1623503393-ooo.jpg,1623503393-oo.jpg,1623503393-o.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:09:53'),
(14, 'Thùng 30 gói mì khoai tây Omachi Special bò hầm xốt vang 92g', 'HSD còn 77 ngày', 'Loại mì Mì trộn\r\nVị mì bò hầm xốt vang\r\nSợi mì Sợi mì khoai tây, tròn và nhỏ\r\nKhối lượng 92g / gói\r\nThành phần VẮT MÌ - Bột mì, dầu thực vật, tinh bột khoai mì, tinh bột khoai tây 16,4 g/kg, muối, nước mắm, chất tạo xốp (451i, 452i, 500ii), chất làm dầy (412), chất điều vị (621, 635), chiết xuất nấm men, bột lòng đỏ trứng 690 mg/kg, màu thực phẩm (100i), bột cà ri, chất chống oxy hoá (320, 321), chất điều chỉnh độ axit (330).\r\nGÓI THỊT - Nước, thịt (thịt heo, thịt gà, thịt bò 4,5 g/kg) 78,5 g/kg, mỡ heo, gia vị hỗn hợp, tinh bột biến tính (1420), tương dầu nấu bò kho, đường, muối, dầu thực vật, chất điều vị (621, 635), chiết xuất thịt bò 1,0 g/kg, cà chua cô đặc, hạt điều màu, đường caramel.\r\nSÚP - Nước, muối, chất điều vị (621, 635, 364ii), gia vị hỗn hợp, dầu thực vật, đường , nước mắm, mỡ bò 4,9 g/kg, cà rốt sấy, chiết xuất thịt bò 2,8 g/kg, nước tương, tinh bột biến tính (1422), cà chua cô đặc, bột gia vị bò kho, đường caramel, hương tự nhiên và tổng hợp, màu thực phẩm (160c), rượu vang 100 mg/kg, chất bảo quản (211), chất tạo ngọt tổng hợp (950), hạt điều màu, chất làm dầy (415), chất điều chỉnh độ axit (330), chất chống oxy hoá (320, 321). Sản phẩm chứa các nguyên liệu có nguồn gốc từ lúa mì, thuỷ sản, trứng, đậu nành. Có thể chứa vết đậu phộng và hạt điều.\r\nCách dùng Cho vắt mì, gói rau và gói xốt vào tô. Đổ vào 350 ml nước sôi. Đậy nắp trong 3 phút. Mở nắp ra, cho gói thịt vào, trộn đều là dùng được ngay.\r\nBảo quản Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp. Không để gần hóa chất hoặc sản phẩm có mùi mạnh.\r\nThương hiệu Omachi (Việt Nam)\r\nSản xuất tại Việt Nam', 227000, 0, '1623503480-d3.jpg,1623503480-d2.jpg,1623503480-d1.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:11:20'),
(15, 'Thùng 24 ly phở bò Vifon 55g', 'HSD còn 31 ngày', 'Vị Bò\r\nLoại Phở nước\r\nSợi phở Sợi dẹp, to\r\nKhối lượng 55g / ly\r\nThành phần VẮT PHỞ - Gạo (38.7%), chất ổn định (1404, 412), đường tinh luyện, muối ăn, chất điều vị (mononatri glutamat), chất tạo ngọt tổng hợp (acesulfam kali, aspartam).\r\nGIA VỊ - Muối ăn, dầu cọ tinh luyện, chất điều vị (mononatri glutamat, dinatri 5\' - guanylat, dinatri 5\' - inosinat), mỡ bò (2.3%), đường tinh luyện, hành lá sấy, giả thịt (bột đậu nành đã khử béo), hương bò tổng hợp, bột thịt bò (0.3%), ớt, gia vị phở (quế, đinh hương, hồi), hành tím, gừng, tỏi, tiêu, chất làm dày (1422), cà chua cô đặc, hương ngò gai tổng hợp, maltodextrin, chất chống đông vón (551), chất tạo ngọt tổng hợp (acesulfam kali, aspartam), chất điều chỉnh độ acid (260, acid citric), phẩm màu tự nhiên (caroten tự nhiên (chiết xuất từ thực vật)), chất bảo quản (kali sorbat).\r\nCách nấu Mở nắp, cắt các gói gia vị cho vào ly. Chế nước sôi đến vạch trong ly (khoảng 330ml) và đậy nắp ly trong 3 phút. Mở nắp, trộn đều và thưởng thức.\r\nBảo quản Nơi khô ráo, thoáng mát, tránh ánh nắng mặt trời\r\nThương hiệu Vifon (Việt Nam)\r\nSản xuất tại Việt Nam', 324, 0, '1623503587-ppp.jpg,1623503587-pp.jpg,1623503587-p.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:13:07'),
(16, 'Thùng 18 khay phở xào chua ngọt Vifon 80g', 'HSD còn 58 ngày', 'Vị Chua ngọt\r\nLoại Phở xào\r\nSợi phở Sợi dẹp, nhỏ\r\nKhối lượng 80g / hộp\r\nThành phần VẮT PHỞ - Gạo (45%), chất ổn định (1404, 412), đường tinh luyện, muối ăn, chất điều vị (mononatri glutamat).\r\nGÓI SỐT CHUA NGỌT (31.2%) - Đường tinh luyện (8.1%), dầu cọ tinh luyện, nước, cốt me (0.9%), nước mắm, muối ăn, chất điều vị (mononatri glutamat, dinatri 5\'-guanylat, dinatri 5\'-inosinat), tỏi, hành tím, ớt, bột kem không sữa, bột trứng, chất làm dày (1422), chất điều chỉnh độ acid (0.2%)(260, acid citric), dầu mè, dầu tôm chiết xuất, đạm thực vật thuỷ phân từ đậu nành, chiết xuất nấm men, tiêu, hương gà tổng hợp, chất bảo quản (kali sorbat, natri benzoat), phẩm màu tự nhiên (caroten tự nhiên (chiết xuất từ thực vật)), chất chống oxy hoá (mixed tocopherol (vitamin E)).\r\nGÓI RAU SẤY - Bắp cải, cà rốt, trứng sấy, giả thịt (gluten từ bột mì), hành lá, bánh cá sấy (Itoyori (golden threadfin bream), đường tinh luyện, natri phosphat), ớt.\r\nGÓI TỎI PHI - Tỏi, dầu cọ tinh luyện.\r\nCách nấu Mở nắp, cắt gói rau cho vào khay. Chế nước sôi ngập vắt phở (khoảng 400ml) và đậy nắp khay trong 2 phút. Chắt bỏ hết nước trong khay qua các lỗ thoát nước trên nắp khay. Mở nắp, cho gói sốt chua ngọt, gói tỏi phi vào. Trộn đều và thưởng thức.\r\nBảo quản Nơi khô ráo, thoáng mát, tránh ánh nắng mặt trời\r\nThương hiệu Vifon (Việt Nam)\r\nSản xuất tại Việt Nam', 282000, 0, '1623503652-uuu.jpg,1623503652-uu.jpg,1623503652-u.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:14:12'),
(17, 'Thùng 30 gói hủ tiếu bò kho Vifon 65g', 'HSD còn 6 tháng', 'Loại hủ tiếu Hủ tiếu nước\r\nVị Bò kho\r\nSợi hủ tiếu Sợi dẹp, màu trắng\r\nKhối lượng 65g / gói\r\nThành phần VẮT HỦ TIẾU - Tinh bột gạo (75%), đường tinh luyện, muối, chất điều vị (mononatri glutamat), chất ổn định (412), dầu cọ, muối I-ốt, chất điều vị (mononatri glutamat, dinatri 5\'-guanylat, dinatri 5\'-inosinat), mỡ bò, giả thịt (protein đậu nành), rau (cà rốt, hành lá), bột thịt bò (0.5%), gia vị \"bò kho\" (đại hồi, đinh hương, quế, thảo quả), hành tím, sả, tiêu, dầu hương ngò gai tổng hợp, hương quế tổng hợp, chất làm dày (415), chất chống đông vón (551), phẩm màu tự nhiên (caroten tự nhiên).\r\nCách nấu Cho gia vị và vắt hủ tiếu vào tô. Chế vào 400 ml nước thật sôi. Đậy kín nắp tô và chờ trong 3 phút. Mở nắp, trộn đều và thưởng thức.\r\nBảo quản Bảo quản nơi khô ráo, tránh ánh nắng mặt trời. Nên chế biến ngay khi mở bao bì. Tránh để gần hoá chất và sản phẩm có mùi mạnh.\r\nThương hiệu Vifon (Việt Nam)\r\nSản xuất tại Việt Nam', 206000, 0, '1623503747-iii.jpg,1623503747-ii.jpg,1623503747-i.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:15:47'),
(18, 'Thùng 30 gói hủ tiếu khô Nhịp Sống hương vị Nam Vang 70g', 'HSD còn 5 tháng', 'Loại hủ tiếu Hủ tiếu khô\r\nVị Hủ tiếu Nam Vang\r\nKhối lượng 70g / gói\r\nBảo quản Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp\r\nThương hiệu Nhịp Sống (Việt Nam)\r\nSản xuất tại Việt Nam', 161000, 0, '1623503817-fff.jpg,1623503817-ff.jpg,1623503817-f.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:16:57'),
(19, 'Thùng 30 gói Cháo yến chay rau nấm Yến Việt 50g', 'HSD còn 7 tháng', 'Vị Chay rau nấm\r\nKhối lượng 50g / gói\r\nThành phần PHÔI CHÁO - Gạo dẻo, gạo thơm.\r\nGÓI GIA VỊ - Muối, đường, chất chiết xuất nấm men (0.8g/50g), bột nấm đông cô (0.3g/50g), bột xì dầu, bột tiêu, cà rốt sấy, ngò rí sấy, vitamin (B1, B2, B6).\r\nGÓI YẾN VÀ RAU - Tổ yến sấy thăng hoa (0.05g/50g), nấm tuyết sấy thăng hoa (0.3g/50g).\r\nGÓI DẦU - Dầu thực vật tinh luyện, hành boa-rô, dầu mè, hương nấm tổng hợp, màu paprika.\r\nCách nấu Cho cháo cùng gói dầu, gói gia vị, gói yến và rau vào tô. Cho khoảng 320 ml nước sôi vào tô cháo và quậy đều. Đậy kín nắp sau 3 phút, mở nắp, trộn đều và thưởng thức.\r\nBảo quản Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp.\r\nThương hiệu Yến Việt (Việt Nam)\r\nSản xuất tại Việt Nam\r\nSản phẩm cháo yến chay rau nấm từ thương hiệu Yến Việt đang được người dùng quan tâm hàng đầu. Đây là một loại cháo chay thanh ngọt phù hợp với người ăn chay không dầu mỡ.', 240000, 0, '1623503907-hhh.jpg,1623503907-hh.jpg,1623503907-h.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:18:27'),
(20, 'Thùng 24 ly cháo đậu xanh thịt bằm Shangha 50g', 'HSD còn 3 tháng', 'Vị Thịt bằm\r\nKhối lượng 50g / ly\r\nThành phần Gạo, đậu xanh (200 g/kg), chất điều vị (621, 627, 631), muối I-ốt, đường, bột chiết xuất thịt heo (20 g/kg), cà rốt, trứng sấy, rau sấy, tỏi, bột nước tương, chất chống đông vón (551), nghệ. Sản phẩm chứa các nguyên liệu có nguồn gốc từ trứng và đậu nành.\r\nCách nấu Mở nắp, chế nước sôi đến vạch của ly, khuấy đều, đậy nắp và chờ trong 3 phút\r\nBảo quản Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp.\r\nThương hiệu Shangha (Việt Nam)\r\nSản xuất tại Việt Nam', 199000, 0, '1623503973-ggg.jpg,1623503973-gg.jpg,1623503973-g.jpg', 0, 100, '5', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 06:19:33'),
(21, 'Cá hồi cắt khúc khay 300g (giao ngẫu nhiên khúc mình hoặc đuôi)', 'Bảo quản Nhiệt đồ từ 0 - 2 độ C', 'Cá hồi là loại cá được coi là một trong những thực phẩm bổ dưỡng nhất hành tinh vì không chỉ chứa axit béo Omega-3 mà còn chứa đa vitamin và khoáng chất khác. Cụ thể axit béo Omega-3 làm giảm viêm, giảm huyết áp và giảm nguy cơ mắc các bệnh khác, tạo thuận lợi cho sự hấp thu đường và việc hạ thấp mức đường huyết, duy trì tính linh hoạt của động mạch, tĩnh mạch và tăng cường cơ tim và vô cùng nhiều những lợi ích khác mà cá hồi có thể mang lại cho sức khỏe con người.', 118000, 0, '1623507279-ca-hoi-cat-khuc-khay-300g-202103021229180620.jpg,1623507279-ca-hoi-cat-khuc-khay-300g-202103021229185583.jpg,1623507279-ca-hoi-cat-khuc-khay-300g-202103021229191637.jpg', 0, 100, '3', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 07:33:01'),
(26, 'Dựng heo G khay 500g', 'Bảo quản ở nhiệt độ từ 0-4 độ C trong 3 ngày kế từ ngày sản xuấ', 'Dựng heo thích hợp nấu các món hầm hay hấp vào những ngày lạnh để húp rất ngon', 99000, 0, '1623508509-thit-heo-xay-g-kitchen-khay-300g-202106021513586626.jpg,1623508509-thit-heo-xay-g-kitchen-khay-300g-202106021513591952.jpg,1623508509-thit-heo-xay-g-kitchen-khay-300g-202106021514000434.jpg', 0, 100, '3', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 07:35:09'),
(22, 'Bít tết đùi bò Úc Pacow khay 250g', 'Bảo quản Nhiệt đồ từ 0 - 2 độ C', 'Bít tết đùi bò Úc Pacow với thành phần là thịt bò mát 100% thiên nhiên, nguồn gốc rõ ràng đảm bảo an toàn vệ sinh thực phẩm, chất lượng cao. Thịt bò Úc Pacow đạt chuẩn từ trang trại tới bàn ăn.\r\nBít tết đùi bò là loại thịt mềm nhất, ngọt và có độ thơm tự nhiên của bò. Có lớp mỡ bao phủ và vân mỡ xen kẽ đều đặn, béo ngậy hấp dẫn.', 109000, 0, '1623507345-bit-tet-dui-bo-uc-pascow-khay-250g-202009300015025208.jpg,1623507345-bit-tet-dui-bo-uc-pascow-khay-250g-202009300015034764.jpg,1623507345-bit-tet-dui-bo-uc-pascow-khay-250g-202009300015046121.jpg', 0, 100, '3', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 07:32:53'),
(23, 'Thịt bò tái Úc Pacow khay 250g', 'Bảo quản Nhiệt đồ từ 0 - 2 độ C', 'Bít tết đùi bò Úc Pacow với thành phần là thịt bò mát 100% thiên nhiên, nguồn gốc rõ ràng đảm bảo an toàn vệ sinh thực phẩm, chất lượng cao. Thịt bò Úc Pacow đạt chuẩn từ trang trại tới bàn ăn.\r\nBít tết đùi bò là loại thịt mềm nhất, ngọt và có độ thơm tự nhiên của bò. Có lớp mỡ bao phủ và vân mỡ xen kẽ đều đặn, béo ngậy hấp dẫn.', 109000, 0, '1623507385-thit-bo-tai-pascow-khay-250g-202010011942130115.jpg,1623507385-thit-bo-tai-pascow-khay-250g-202010011942135928.jpg,1623507385-thit-bo-tai-pascow-khay-250g-202010011942140891.jpg', 0, 100, '3', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 07:29:30'),
(27, 'Sườn cốt lết C.P khay 500g', 'Thời hạn sử dụng 3 ngày kể từ ngày sản xuất, bảo quản ở nhiệt độ 0 - 4 độ C', 'Sườn cốt lết CP được sản xuất từ hệ thống được kiểm soát chặt chẽ theo nguyên tắc chuỗi khép kín “Thức ăn chăn nuôi - Trang trại chăn nuôi – Nhà máy chế biến thực phẩm”.', 80000, 0, '1623508597-suon-cot-let-khay-500g-202009290944421613.jpg,1623508597-suon-cot-let-khay-500g-202009290944426926.jpg,1623508597-suon-cot-let-khay-500g-202009290944436082.jpg', 0, 100, '3', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 07:36:37'),
(24, 'Thịt ba chỉ bò Úc Pacow khay 250g', 'Bảo quản Nhiệt độ từ 0 - 2 độ C', 'Thịt ba chỉ bò Úc Pacow với thành phần là thịt bò mát 100% thiên nhiên, nguồn gốc rõ ràng đảm bảo an toàn vệ sinh thực phẩm, chất lượng cao. Thịt bò Úc Pacow đạt chuẩn từ trang trại tới bàn ăn.\r\nThịt ba chỉ bò là loại thịt mềm nhất, ngọt và có độ thơm tự nhiên của bò. Có lớp mỡ bao phủ và vân mỡ xen kẽ đều đặn, béo ngậy hấp dẫn.', 98000, 0, '1623507487-thit-ba-chi-bo-uc-pascow-khay-250g-202009261055185704.jpg,1623507487-thit-ba-chi-bo-uc-pascow-khay-250g-202009261055191177.jpg,1623507487-thit-ba-chi-bo-uc-pascow-khay-250g-202009261055194379.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:18:07', '2021-06-12 07:29:26'),
(25, 'Sườn non heo G khay 300g', 'Bảo quản Bảo quản ở nhiệt độ từ 0-4 độ C trong 3 ngày kế từ ngày sản xuất', 'Sường là sản phẩm được nhiều người tin dùng, với tính chất dễ ăn, sơ chế dễ dàng, ngon nên món sường là món ăn nên có trong bữa ăn gia đình', 94000, 0, '1623507842-cot-let-heo-co-xuong-g-kitchen-khay-300g-202106021428312228.jpg,1623507842-suon-non-heo-g-khay-300g-202106091749459706.jpg,1623507842-suon-non-heo-g-khay-300g-202106091749473346.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:24:02', '2021-06-12 07:29:17'),
(28, 'Xương cổ heo G khay 500g', 'Bảo quản ở nhiệt độ từ 0-4 độ C trong 3 ngày kế từ ngày sản xuất', 'Thích hợp nấu các món như hầm, kho, xào. Là món ăn rất thích hợp trên  mâm cơm gia đình', 72000, 0, '1623508714-xuong-duoi-heo-g-kitchen-khay-500g-202106021557405471.jpg,1623508714-xuong-duoi-heo-g-kitchen-khay-500g-202106021557423764.jpg,1623508714-xuong-duoi-heo-g-kitchen-khay-500g-202106021557434384.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:38:34', '2021-06-12 07:38:34'),
(29, 'Cá hường làm sạch khay 500g', 'Bảo quản 4 ngày kể từ ngày đóng gói (nhiệt độ từ 2 - 5 độ C)', 'Cá hường hay còn gọi là cá mùi là loài cá không còn lạ với những người dân đồng bằng sông Cửu Long. Loại cá này có thịt mềm, ngọt, ít bị tanh và còn chứa nhiều khoáng chất và các vitamin bổ sung năng lượng cho cơ thể.', 55000, 0, '1623508860-ca-huong-lam-sach-khay-500g-202011141603308444.jpg,1623508860-ca-huong-lam-sach-khay-500g-202011141603319421.jpg,1623508860-ca-huong-lam-sach-khay-500g-202011141603326926.jpg', 1, 100, '3', 0, 0, 0, '2021-06-12 07:41:00', '2021-06-12 07:42:36'),
(30, 'Cá lóc sống khay 500g', 'Bảo quản 4 ngày kể từ ngày đóng gói (nhiệt độ từ 2 - 5 độ C)', 'Cá lóc hay còn được gọi là cá quả, là loại cá được nhiều người yêu thích bởi vị ngọt của thịt, lành tính, ít mỡ, chứa nhiều khoáng chất và các vitamin bổ sung năng lượng cho cơ thể. Cá lóc không chỉ là nguyên liệu chế biến phong phú mà còn là một liều thuốc chữa bệnh hiệu quả.\r\nNgoài ra, hàm lượng vitamin A cao trong cá lóc giúp hồi phục sức khỏe cho những người mới khỏi ốm, tăng lợi sữa cho mẹ bầu, chữa huyết khô.', 57000, 0, '1623508981-ca-loc-song-tui-500g-202101272326143573.jpg,1623508981-ca-loc-song-tui-500g-202101272326148757.jpg,1623508981-ca-loc-song-tui-500g-202101272326157922.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:43:01', '2021-06-12 07:43:01'),
(31, 'Cá điêu hồng làm sạch khay 500g', 'Bảo quản 4 ngày kể từ ngày đóng gói (nhiệt độ từ 2 - 5 độ C)', 'Cá diêu hồng hay cá điêu hồng hay còn gọi là cá rô phi đỏ là một loài cá nước ngọt thuộc họ cá rô phi. Là một loại cá có chất lượng thịt thơm ngon, thịt cá diêu hồng có màu trắng, trong sạch, các thớ thịt được cấu trúc chắc và đặc biệt là thịt không quá nhiều xương. Đặc biệt là cá có giá trị dinh dưỡng cao, giàu protein, vitamin A, B, D và chất khoáng như phốt pho và iốt, ít chất béo hơn thịt nên dễ tiêu hóa.', 48000, 0, '1623509043-ca-dieu-hong-lam-sach-khay-500g-202012101138462365.jpg,1623509043-ca-dieu-hong-lam-sach-khay-500g-202012101138469030.jpg,1623509043-ca-dieu-hong-lam-sach-khay-500g-202012101138472342.jpg', 0, 100, '3', 0, 0, 0, '2021-06-21 07:44:03', '2021-06-12 07:44:03'),
(32, 'Cá nục vỉ 500g', 'Bảo quản 4 ngày kể từ ngày đóng gói (nhiệt độ từ 2 - 5 độ C)', 'Cá nục là một loại cá sống ở biển, đây là một loại cá được nhiều người yêu thích bởi sự thơm ngon và nhiều lợi ích đối với sức khoẻ. Đây là loại thực phẩm thường xuyên được các bà nội trợ mua về để chế biến thành các món ăn ngon để phục vụ cho gia đình của mình.', 47000, 0, '1623509103-ca-nuc-tui-500g-202101281036273788.jpg,1623509103-ca-nuc-tui-500g-202101281036293590.jpg,1623509103-ca-nuc-tui-500g-202101281036304147.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:45:03', '2021-06-12 07:45:03'),
(33, 'Cá cơm túi 200g', 'Bảo quản 4 ngày kể từ ngày đóng gói (nhiệt độ từ 2 - 5 độ C)', 'Món cá cơm này thích hợp làm các món như kho và nấu cháo. Là món ăn nên có trong nhưng bữa cơm của gia đình', 22000, 0, '1623509204-ca-com-tui-200g-202012292316404576.jpg,1623509204-ca-com-tui-200g-202012292316409269.jpg,1623509204-ca-com-tui-200g-202012292316415092.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:46:44', '2021-06-12 07:46:44'),
(34, 'Cá basa phi lê túi 300g', 'Bảo quản 4 ngày kể từ ngày đóng gói (nhiệt độ từ 2 - 5 độ C)', 'Cá basa là loại cá có nguồn protein chất lượng cao và chất béo lành mạnh như axit béo omega-3. Trong cá basa có chứa 5 gam chất béo không bão hòa như axit béo omega-3. Đây là một chất béo thiết yếu quan trọng để duy trì sức khỏe tối ưu của cơ thể và não bộ. Phi lê cá basa là phần thịt cá basa đã loại bỏ xương và da, thích hợp cho những người nội trợ có thể chế biến nhanh các món ăn cho trẻ mà không tốn thời gian để lọc xương.', 36000, 0, '1623509285-ca-basa-phi-le-tui-300g-202012292313193694.jpg,1623509285-ca-basa-phi-le-tui-300g-202012292313198217.jpg,1623509285-ca-basa-phi-le-tui-300g-202012292313203230.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:48:05', '2021-06-12 07:48:05'),
(35, 'Hộp 10 trứng gà tươi QLEgg', 'Hạn sử dụng 14 ngày ở nhiệt độ 30 - 35 độ C. 30 ngày ở nhiệt độ 7 - 10 độ C', 'Trứng gà là một loại thực phẩm chứa nhiều chất dinh dưỡng, cung cấp lượng đạm cao, cung cấp chất béo và vitamin, khoáng chất. Trứng gà QLEgg được sản xuất ở trang trại sạch, chất lượng, nên khách hàng có thể yên tâm về sản phẩm.', 27000, 0, '1623509395-hop-10-trung-ga-tuoi-qlegg-202011040900353675.jpg,1623509395-hop-10-trung-ga-tuoi-qlegg-202011040900362921.jpg,1623509395-hop-10-trung-ga-tuoi-qlegg-202011040900368775.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:49:55', '2021-06-12 07:49:55'),
(36, 'Hộp 4 trứng vịt bắc thảo TFood', 'Hạn sử dụng 30 ngày kể từ ngày đóng gói', 'Trứng vịt bắc thảo (hay còn gọi bách thảo, bách nhật trứng) là món trứng đặc biệt có nguồn gốc từ Trung Hoa. Trứng bắc thảo ngoài hương vị rất ngon còn có nhiều chất tốt cho sức khỏe. Trứng vịt bắc thảo T.Food được sản xuất ở cơ sở chất lượng, an toàn.', 26000, 0, '1623509510-hop-4-trung-vit-bac-thao-tfood-202102050234378425.jpg,1623509510-hop-4-trung-vit-bac-thao-tfood-202102050234384739.jpg,1623509510-hop-4-trung-vit-bac-thao-tfood-202102050234392294.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:51:50', '2021-06-12 07:51:50'),
(37, 'Hộp 6 trứng vịt TFood', 'Hạn sử dụng 12 ngày kể từ ngày đóng gói', 'Cũng như trứng gà, trứng vịt là một loại thực phẩm chứa nhiều chất dinh dưỡng, cung cấp lượng đạm cao, cung cấp chất béo và vitamin, khoáng chất. Trứng vịt T.Food được sản xuất ở trang trại sạch, chất lượng, nên khách hàng có thể yên tâm về sản phẩm.', 22000, 0, '1623509570-hop-6-trung-vit-bach-hoa-xanh-202101271546383524.jpg,1623509570-hop-6-trung-vit-bach-hoa-xanh-202101271546376980.jpg,1623509570-hop-6-trung-vit-bach-hoa-xanh-202101271546387776.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:52:50', '2021-06-12 07:52:50'),
(38, 'Hộp 30 trứng cút tươi TFood', 'Hạn sử dụng 12 ngày kể từ ngày đóng gói', 'Trứng cút là một loại thực phẩm chứa nhiều chất dinh dưỡng, cung cấp lượng đạm cao, cung cấp chất béo và vitamin, khoáng chất. Trứng cút T.Food được sản xuất ở trang trại sạch, chất lượng nên khách hàng có thể yên tâm về sản phẩm.', 21000, 0, '1623509621-vi-30-trung-cut-loai-1-vfarm-202010261554148844.jpg,1623509621-vi-30-trung-cut-loai-1-vfarm-202010261554129091.jpg,1623509621-vi-30-trung-cut-loai-1-vfarm-202010261554138968.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:53:41', '2021-06-12 07:53:41'),
(39, 'Hộp 4 trứng vịt muối V.Food', 'Hạn sử dụng 30 ngày kể từ ngày đóng gói', 'Trong lòng đỏ trứng vịt muối có chứa nhiều chất dinh dưỡng tốt cho sức khoẻ như vitamin, giàu chất oxy hoá, protein. Các sản phẩm trứng vịt muối V.Food được sản xuất ở trang trại sạch, chất lượng, nên khách hàng có thể yên tâm về sản phẩm.', 21000, 0, '1623509672-hop-4-trung-vit-muoi-tfood-202105261322205496.jpeg,1623509672-hop-4-trung-vit-muoi-tfood-202105261322218934.jpeg,1623509672-hop-4-trung-vit-muoi-tfood-202105261322211169.jpeg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:54:32', '2021-06-12 07:54:32'),
(40, 'Hộp 5 trứng gà quê ngoại T.Food', 'Hạn sử dụng 12 ngày kể từ ngày đóng gói', 'Trứng gà quê ngoại là một loại thực phẩm chứa nhiều chất dinh dưỡng, cung cấp lượng đạm cao, cung cấp chất béo và vitamin, khoáng chất. Các sản phẩm trứng của T.Food được sản xuất ở trang trại sạch, chất lượng, nên khách hàng có thể yên tâm về sản phẩm. Đặc biệt trứng gà quê ngoại giàu vitamin E và Omega 3 so với những trứng gà thông thường.', 22000, 0, '1623509780-hop-5-trung-ga-que-ngoai-tfood-202011181225472287.jpg,1623509780-hop-5-trung-ga-que-ngoai-tfood-202011181225482623.jpg,1623509780-hop-5-trung-ga-que-ngoai-tfood-202011181225493960.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:56:20', '2021-06-12 07:56:20'),
(41, 'Gói 6 trứng cút phá lấu V.Food', 'Hạn sử dụng 4 tháng kể từ ngày đóng gói', 'Trứng cút phá lấu là một loại thực phẩm chứa nhiều chất dinh dưỡng, cung cấp lượng đạm cao, cung cấp chất béo và vitamin, khoáng chất. Trứng cút phá lấu V.Food được sản xuất ở trang trại sạch, chất lượng nên khách hàng có thể yên tâm về sản phẩm.', 9000, 0, '1623509833-goi-6-trung-cut-pha-lau-vfood-202009181227191096.jpg,1623509833-goi-6-trung-cut-pha-lau-vfood-202009181227200751.jpg,1623509833-goi-6-trung-cut-pha-lau-vfood-202009181227185302.jpg', 0, 100, '3', 0, 0, 0, '2021-06-12 07:57:13', '2021-06-12 07:57:13'),
(42, 'Nấm mỡ nâu hộp 150g', 'Bảo quản Sử dụng trong vòng 7 ngày kể từ ngày đóng gói', 'Rửa sơ bằng nước trước khi sử dụng, chế biến nhanh trong khoảng 3 phút. Thích hợp xào, nấu lẩu, nướng, súp, pizza,.', 69000, 0, '1623510054-nam-mo-nau-hop-150g-202101292220221056.jpg,1623510054-nam-mo-nau-hop-150g-202101292220228440.jpg,1623510054-nam-mo-nau-hop-150g-202101292220236706.jpg', 1, 100, '2', 0, 0, 0, '2021-06-12 08:00:54', '2021-06-12 08:02:42'),
(43, 'Nấm mỡ trắng hộp 150g', 'Bảo quản Sử dụng trong vòng 7 ngày kể từ ngày đóng gói', 'Rửa sơ bằng nước trước khi sử dụng, chế biến nhanh trong khoảng 3 phút. Thích hợp xào, nấu lẩu, nướng, súp,...', 69000, 0, '1623510121-nam-mo-trang-hop-150g-202101292221391979.jpg,1623510121-nam-mo-trang-hop-150g-202101292221399233.jpg,1623510121-nam-mo-trang-hop-150g-202101292221409970.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:02:01', '2021-06-12 08:02:01'),
(44, 'Khoai mỡ túi 1kg', 'Bảo quản Sử dụng trong vòng 7 ngày kể từ ngày đóng gói', 'Giá trị dinh dưỡng có trong khoai mỡ:\r\nTrong khoai mỡ chứa rất nhiều tinh bột, chất xơ cùng hàm lượng vitamin và các khoáng chất dồi dào. Cứ 100g khoai mỡ sẽ có khoảng 5.3g chất xơ, 10mg vitamin C, vitamin B6, 0.31mg Kali, Magnesium và Phosphorus. Điểm đặc biệt của khoai mỡ so với các loại củ, quả khác chính là khả năng chuyển hóa tối đa lượng carbonhydrate và điều tiết, tối ưu quá trình chuyển hóa năng lượng nhờ hàm lượng Magnesium dồi dào của mình, hiệu quả trong việc duy trì cân nặng, giảm cân. Ngoài ra nguồn dinh dưỡng dồi dào trong khoai mỡ còn hỗ trợ trong việc điều trị rất nhiều bệnh, vitamin B6 là chất dinh dưỡng rất tốt hỗ trợ cải thiện sức khỏe tim mạch, đồng thời làm giảm huyết áp cho cơ thể, Ăn nhiều khoai mỡ còn giúp nhuận tràng, chống viêm ruột, hàm lượng chất xơ cao trong khoai mỡ còn giúp chữa táo bón rất tốt. Đặc biệt phụ nữ có thể tránh được các hội chứng khó chịu trong giai đoạn mãn kinh bằng cách sử dụng khoai mỡ.', 57000, 0, '1623510194-khoai-mo-tui-1kg-202011071639012682.jpg,1623510194-khoai-mo-tui-1kg-202011071639006438.jpg,1623510194-khoai-mo-tui-1kg-202011071639009630.jpg', 1, 100, '2', 0, 0, 0, '2021-06-12 08:03:14', '2021-06-12 08:07:51'),
(45, 'Củ cải đỏ hộp 500g', 'Bảo quản Sử dụng trong vòng 7 ngày kể từ ngày đóng gói', 'Củ cải đỏ (hay còn gọi là củ cải đường) có vị ngọt mát, thanh đạm, là nguyên liệu không thể thiếu cho những thực đơn giảm cân lành mạnh và hiệu quả. Đồng thời, loại củ này cũng chứa rất nhiều vitamin và khoáng chất cần thiết cho cơ thể.\r\nKhông giống với cà rốt và củ cải trắng, củ cải đỏ có lớp vỏ ngoài mỏng, màu đỏ hồng. Bên trong có phần thịt giòn xốp màu trắng trong và củ có dạng tròn.', 37000, 0, '1623510246-cu-cai-do-hop-500g-202105281850277732.jpg,1623510246-cu-cai-do-hop-500g-202105281850261292.jpg,1623510246-cu-cai-do-hop-500g-202105281850270053.jpg', 1, 100, '2', 0, 0, 0, '2021-06-12 08:04:06', '2021-06-12 08:27:49'),
(46, 'Khoai lang mật túi 1kg', 'Bảo quản Sử dụng trong vòng 7 ngày kể từ ngày đóng gói', 'Thích hợp làm các món hầm, nướng. Rất ngọt cũng thích hợp làm bành hay nấu ăn', 33000, 0, '1623510419-khoai-lang-mat-tui-1kg-202101252146214490.jpg,1623510419-khoai-lang-mat-tui-1kg-202101252146219503.jpg,1623510419-khoai-lang-mat-tui-1kg-202101252146224346.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:06:59', '2021-06-12 08:06:59'),
(47, 'Nấm linh chi nâu hộp 150g', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 7 ngày kể từ ngày sản xuất', 'Cách dùng Ngâm nước muối pha loãng khoảng 5-10 phút sau đó rửa lại sạch với nước. Dùng để nấu lẩu, xào, nấu canh,...', 57000, 0, '1623510469-nam-linh-chi-nau-bach-hoa-xanh-150g-202103242256133427.jpg,1623510469-nam-linh-chi-nau-bach-hoa-xanh-150g-202103242256093127.jpg,1623510469-nam-linh-chi-nau-bach-hoa-xanh-150g-202103242256127635.jpg', 1, 100, '2', 0, 0, 0, '2021-06-12 08:07:49', '2021-06-12 08:18:29'),
(48, 'Tỏi cô đơn loại 3 túi 250g', 'Hạn sử dụng 90 ngày kể từ ngày sản xuất', 'Dùng làm gia vị hoặc ăn trực tiếp', 31000, 0, '1623510543-toi-co-don-tui-200g-202012282312218836.jpg,1623510543-toi-co-don-tui-200g-202012282312204017.jpg,1623510543-toi-co-don-tui-200g-202012282312212492.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:09:03', '2021-06-12 08:09:03'),
(49, 'Nấm bào ngư xám túi 300g', 'Bảo quản Ở nhiệt độ dưới 20 độ C, sử dụng trong vòng 5 ngày kể từ ngày sản xuất', 'Nấm bào ngư xám là một trong những loại nấm được ưa chuộng bởi nhiều gia đình. Không chỉ được dùng để chế biến thành những món ăn ngon và thân thiện với cơ thể mà loại nấm này còn có vị thuốc tốt cho sức khỏe. Cũng giống với những loại nấm khác, nấm bào ngư xám có chứa hàm lựa chất dinh dưỡng và chất xơ cao nhưng lại ít calo, rất phù hợp cho chế độ ăn hàng ngày của mọi người.', 31000, 0, '1623510603-nam-bao-ngu-xam-bich-300g-202009300011236390.jpg,1623510603-nam-bao-ngu-xam-bich-300g-202009300011222402.jpg,1623510603-nam-bao-ngu-xam-bich-300g-202009300011229306.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:10:03', '2021-06-12 08:10:03'),
(50, 'Khoai lang Nhật túi 1kg', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 7 ngày kể từ ngày sản xuất', 'Khoai lang Nhật là một loại củ ngon và có rất nhiều loại giống thì trong đó, khoai lang Nhật là một cái tên có lẻ được nhiều người yêu thích nhất. Khoai lang Nhật có hình dáng thon, dài. Với lớp vỏ bên ngoài màu tím, trong ruột thì vàng, hương vị ngọt dịu nhẹ, bùi nên chiếm được rất nhiều cảm tình của mọi người. \r\nTrong Đông y củ khoai lang có vị ngọt, tính bình, có công dụng nhuận tràng, bồi bổ cơ thể, tiêu viêm, lợi mật, sáng mắt,.. đặc biệt ăn khoai vào buổi sáng sẽ giúp bạn cung cấp đầy đủ dinh dưỡng cho cơ thể, đặc biệt là chữa được nhiều bệnh nguy hiểm mà bạn không ngờ tới.', 28000, 0, '1623510658-khoai-lang-nhat-1kg-202101150934394381.jpg,1623510658-khoai-lang-nhat-1kg-202101150934398643.jpg,1623510658-khoai-lang-nhat-1kg-202101150934416584.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:10:58', '2021-06-12 08:18:19'),
(51, 'Ớt chuông xanh túi 300g', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 7 ngày kể từ ngày sản xuất', 'Ớt chuông có 92% là nước, còn lại là các chất dinh dưỡng như Carb, Protein, Chất béo cùng các khoáng chất và vitamin như: Vitamin A, C, K1, Folate và Kali cùng nhiều chất chống oxy hóa khác. Với hàm lượng vitamin A dồi dào cùng Lutein và Zeaxanthin, ớt chuông hỗ trợ giúp bảo vệ võng mạc khỏi các tác động oxy hóa, tránh khỏi các bệnh thoái hóa võng mạc, thoái hóa điểm vàng. Ngoài ra ớt chuông sinh nhiệt và làm tăng tỷ lệ trao đổi chất, giúp đốt cháy calo, hỗ trợ giảm cân. Các vitamin A, C, K cùng hàm lượng lưu huỳnh có trong ớt chuông hỗ trợ hệ thống miễn dịch, bảo vệ tế bào khỏi quá trình oxy hoá, tăng cường khả năng hấp thụ và bổ sung chất sắt, ngăn ngừa ung thư.', 26000, 0, '1623510719-ot-chuong-xanh-tui-300g-202012110830033144.jpg,1623510719-ot-chuong-xanh-tui-300g-202012110830041379.jpg,1623510719-ot-chuong-xanh-tui-300g-202012120848006524.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:11:59', '2021-06-12 08:18:06'),
(52, 'Khoai môn túi 500g', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 7 ngày kể từ ngày sản xuất', 'Khoai môn là một loại rau củ quen thuộc có thể chế biến thành nhiều món ăn mà chị em nội trợ nào cũng biết đến. Ban đầu, khoai môn chỉ được trồng nhiều ở châu Á nhưng càng ngày, với độ thơm ngon và bổ dưỡng, khoai môn đã lan rộng ra toàn thế giới.\r\nKhoai môn có lớp vỏ ngoài màu nâu, phần thịt bên trong màu trắng kết hợp với nhiều đốm màu tím nhạt.', 25000, 0, '1623510766-khoai-mon-tui-1kg-202011131737590276.jpg,1623510766-khoai-mon-tui-1kg-202011131737597291.jpg,1623510766-khoai-mon-tui-1kg-202011131738000133.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:12:46', '2021-06-12 08:17:56'),
(53, 'Khoai sọ túi 500g', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 7 ngày kể từ ngày sản xuất', 'Khoai sọ là một trong những loại khoai được nhiều người yêu thích và có thể chế biến thành nhiều món ăn khác nhau. Cũng giống như các loại củ khác, khoai sọ có chứa hàm lượng lớn tinh bột, chất béo, đường, chất xơ cùng các khoáng chất có lợi như sắt, canxi,... vì thế, khoai sọ có một số tác dụng như nhuận tràng, chống táo bón, ổn định đường huyết, giảm cholesterol trong máu,...', 23000, 0, '1623510834-khoai-so-tui-1kg-202011071707560482.jpg,1623510834-khoai-so-tui-1kg-202011071707564265.jpg,1623510834-khoai-so-tui-1kg-202011071707568117.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:13:54', '2021-06-12 08:17:46'),
(54, 'Nấm bào ngư trắng túi 300g', 'Bảo quản ở nhiệt độ dưới 20 độ C, sử dụng trong 5 ngày kể từ ngày sản xuất', 'Nấm bào ngư là loại nấm có những đặc điểm dễ nhận biết: tai nấm có dạng phễu lệch, phiến nấm mang bào tử kéo dài xuống đến chân, cuống nấm gần gốc có lớp lông nhỏ mịn, nấm bào ngư trắng còn có những tên gọi khác là nấm sò, nấm hương trắng, nấm dai và tên khoa học là Pleurotus florida. Từ lâu nấm bào ngư trắng đã trở thành sản phẩm quen thuộc trong bữa ăn của mỗi gia đình Việt, nấm bào ngư trắng có thể dùng để chế biến thành các món chính hoặc dùng để nhúng lẩu hoặc ăn kèm như các loại rau khác.', 57000, 0, '1623510908-nam-bao-ngu-xam-bich-300g-202009300011222402.jpg,1623510908-nam-bao-ngu-trang-bich-300g-202009300010085029.jpg,1623510908-nam-bao-ngu-trang-bich-300g-202009300010105865.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:15:08', '2021-06-12 08:15:08'),
(55, 'Bắp cải tím túi 500g', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 7 ngày kể từ ngày sản xuất', 'Mọi người dường như đã quá quen thuộc với những quả bắp cải xanh nhưng ít người biết rằng, bắp cải còn có loại màu tím bắt mắt. \r\nBắp cải tím là một dạng bắp cải (bắp sú) có nhiều lá giống như bắp cải xanh. Đây là một loại rau dinh dưỡng đã trở nên phổ biến do đem lại nhiều lợi ích sức khỏe. Bắp cải tím đậm hay nhạt thường được đo bằng chỉ số pH vì thay đổi màu sắc tùy thuộc vào độ pH của đất giúp nó phát triển.', 22000, 0, '1623510984-bap-cai-tim-tui-1kg-202011130923399992.jpg,1623510984-bap-cai-tim-tui-1kg-202011130923406537.jpg,1623510984-bap-cai-tim-tui-1kg-202012022316572858.jpg', 1, 100, '2', 0, 0, 0, '2021-06-12 08:16:24', '2021-06-12 08:19:40'),
(56, 'Xà lách búp mỡ thuỷ canh túi 300g', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 7 ngày kể từ ngày sản xuất', 'Xà lách búp mỡ thủy canh túi 300g có lá lớn, liên kết xếp tầng xung quanh, rất dễ tách ra từ thân cây. Lá cây rất mềm, có vị ngọt thanh, rất thơm ngon khi ăn sống. Chứa nhiều chất xơ có lợi cho tiêu hóa, giàu giá trị dinh dưỡng, chứa nhiều vitamin và khoáng chất, có công dụng bồi bổ sức khỏe, chống oxy hóa, ngăn ngừa ung thư…', 20000, 0, '1623511197-xa-lach-bup-mo-thuy-canh-tui-300g-202010051645203830.jpg,1623511197-xa-lach-bup-mo-thuy-canh-tui-300g-202010051645209664.jpg,1623511197-xa-lach-bup-mo-thuy-canh-tui-300g-202010051645213476.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:19:57', '2021-06-12 08:19:57'),
(57, 'Bắp mỹ 2 trái', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 7 ngày kể từ ngày sản xuất', 'Tổ chức Dinh dưỡng thế giới đã có công trình nghiên cứu và phân tích các thành phần dinh dưỡng trong bắp Mỹ. Theo đó, trong loại quả này có chứa đa dạng các khoáng chất và vitamin như protein, calo, đồng, sắt, selen, kẽm, niacin, A, E, C, B3, B1, thiamine…Ngoài ra, trong bắp Mỹ còn chứa cellulose, chất xơ rất tốt cho hệ tiêu hóa. Có thể nói đây là một loại ngũ cốc giàu dưỡng chất, hương vị lại thơm ngon, dễ ăn, dễ chế biến,', 17000, 0, '1623511242-bap-my-2-trai-202012282219106049.jpg,1623511242-bap-my-2-trai-202012282219117576.jpg,1623511242-bap-my-2-trai-202012282219121219.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:20:42', '2021-06-12 08:20:42'),
(58, 'Rau tần ô túi 500g', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 5 ngày kể từ ngày sản xuất', 'Rau tần ô hay còn gọi là rau cải cúc, là một loại rau có tính hàn mát, vị ngọt nhẹ, rất phù hợp cho việc chế biến thành các món canh rau cho gia đình. Ngoài ra, rau tần ô cũng mang đến nhiều lợi ích cho sức khỏe con người như trị ho, trị đau đầu, lợi tiểu, chữa tiêu chảy,...', 12000, 0, '1623511291-rau-tan-o-tui-500g-202010311011414715.jpg,1623511291-rau-tan-o-tui-500g-202010310956354176.jpg,1623511291-rau-tan-o-tui-500g-202010310956364083.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:21:31', '2021-06-12 08:21:31'),
(59, 'Bông súng túi 300g', 'Bảo quản ngăn mát tủ lạnh, sử dụng tốt nhất trong vòng 4 ngày kể từ ngày sản xuất', 'Bông súng là loại rau giàu chất dinh dưỡng, được so sánh dinh dưỡng hơn cả Viagra thời nay, trong bông súng có chứa nhiều giàu Nuciferine C19 H21 NO2 giúp hỗ trợ điều trị chứng yếu sinh lý ở nam và nữ giới. Bên cạnh đó, bông súng còn chứa nhiều Apomorphine C17 H17 NO2, Phytosterol, Bioflavonoids, Phosphodiesterase, Glucose, Fructose, Sucrose, Mannitol, Raffinose, Amino axit, Axit Galacturonic, là những chất cần thiết trong việc điều trị Parkinson. Ngoài ra bông súng còn được dùng để chữa bệnh tiêu chảy, kiết lỵ, rối loạn tiêu hóa, bệnh gan, mất ngủ kinh niên. Không những thế, bông súng còn giúp làm giảm lượng đường trong máu, giảm mỡ trong máu hiệu quả, giúp cải thiện tình trạng bệnh tối đa.', 12000, 0, '1623511385-bong-sung-tui-300g-202011071632068821.jpg,1623511385-bong-sung-tui-300g-202011071632065629.jpg,1623511385-bong-sung-tui-300g-202011071632062587.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:23:05', '2021-06-12 08:23:05'),
(60, 'Rau húng cây túi 50g', 'Bảo quản Sử dụng trong vòng 4 ngày kể từ ngày đóng gó', 'Rau húng cây là loại rau thuộc họ rau thơm, thường được gọi với nhiều tên gọi khác nhau như: rau thơm, húng cây, húng láng, húng đứng. Húng cây được trồng rộng khắp Việt Nam nhưng đặc biệt húng cây của vùng làng Láng - Đống Đa - Hà Nội là ngon nhất và là đặc sản của nơi đây. Húng cây là cây thân thảo, cao trung bình chỉ 40 - 50cm, có tính ưa nắng, có thể trồng và thu hoạch quanh năm. Lá húng cây có hình bầu dục, có gân lá, nhọn ở đỉnh, thường mọc thành cặp đối xứng, gân lá có màu tím, gân có lông con, lá nhám, mép có răng cưa, thường có màu xanh thẫm.', 7000, 0, '1623511491-rau-hung-cay-goi-50g-202011071626548804.jpg,1623511491-rau-hung-cay-goi-50g-202011071626556118.jpg,1623511491-rau-hung-cay-goi-50g-202011071626559760.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:24:51', '2021-06-12 08:24:51'),
(61, 'Hẹ lá túi 100g', 'Bảo quản Sử dụng trong vòng 3 ngày kể từ ngày đóng gó', 'Hẹ còn có tên gọi khác cửu thái, cửu thái tử, khởi dương thảo, tên khoa học là Allium ramosum L. thuộc họ Hành, theo đông y, hẹ có vị cay, hơi chua, hăng, tính ấm, có tác dụng bổ thận, tráng dương, trừ hàn khí, tán huyết, tiêu đờm, giải độc. Theo nhiều nghiên cứu, hẹ có tác dụng giảm đường huyết, giảm mỡ máu, ngăn ngừa xơ vữa động mạch và bảo vệ tuyến tụy. Chất odorin trong loại rau này là một kháng sinh mạnh giúp chống tụ cầu khuẩn và các vi khuẩn khác. Trong 1 kg lá hẹ có 5-10 g đạm, 5-30 g đường, 20 mg Vitamin A, 89 g Vitamin C, 263 mg canxi, 212 mg phốt pho, nhiều chất xơ. Với hàm lượng chất xơ cao thuộc hàng \"top\" so với các loại rau, hẹ trở thành không chỉ nguyên liệu cần thiết trong mỗi bữa ăn mà còn trong cả các bài thuốc chữa bệnh.', 7000, 0, '1623511558-he-la-tui-100g-202009292353397316.jpg,1623511558-he-la-tui-100g-202009292354168279.jpg,1623511558-he-la-tui-100g-202009292353400548.jpg', 0, 100, '2', 0, 0, 0, '2021-06-12 08:25:58', '2021-06-12 08:25:58'),
(62, 'Nho đỏ không hạt hộp 1kg', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Nho đỏ không hạt được bán tại Bách hoá XANH có xuất xứ từ Úc. Đây là loại trái cây quen thuộc, chứa nhiều vitamin và dưỡng chất, không những thế nho còn giúp phòng chống nhiều bệnh.\r\nQuả nho có vị chua chua, ngọt ngọt rất ngon có thể ăn trực tiếp hoặc làm nước ép, sinh tố,... đều rất có lợi cho sức khoẻ, giúp phòng ngừa nhiều bệnh và làm đẹp. Nho chứa nhiều dưỡng chất như: vitamin B1, B2, B6, B12, A, C, P,... canxi, magiê, sắt, axit salicilic , axit photphoric, axit amin và những chất khác rất cần thiết cho cơ thể.', 186000, 0, '1623511706-nho-do-khong-hat-tui-1kg-202103300814582826.jpg,1623511706-nho-do-khong-hat-tui-1kg-202103300814589810.jpg,1623511706-nho-do-khong-hat-tui-1kg-202103300815000047.jpg', 0, 100, '6', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 08:28:26'),
(63, 'Táo Dazzle New Zealand hộp 1kg', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Bên cạnh những loại táo nhập khẩu nổi tiếng như táo nữ hoàng Queen, táo Gala mini,... táo Dazzle xuất xứ từ New Zealand được bán tại Bách hoá XANH có size 110-135, là một trong những \"ứng viên\" đang làm mưa làm gió trên thị thường. Trong tiếng Anh, \"Dazzle\" có nghĩa là sáng chói và đúng với cái tên này, táo Dazzle đang là một loại trái cây nhập khẩu phù hợp với khẩu vị người Việt và được nhiều bà nội trợ săn lùng. Táo Dazzle là loại trái cây nổi tiếng về độ giòn ngọt tuyệt đối, hương thơm nhẹ nhàng rất đặc trưng, có phần vỏ mỏng, màu đỏ đậm quý phái xen lẫn với sắc đỏ pha vàng và phần thịt táo có màu trắng kem có sức chịu oxy hóa cao, nhiều nước và không quá cứng.', 90000, 0, '1623511783-tao-dazzle-nhap-khau-tui-1kg-202106010041292887.jpg,1623511783-tao-dazzle-nhap-khau-tui-1kg-202106010041308618.jpg,1623511783-tao-dazzle-nhap-khau-tui-1kg-202106010041301881.jpg', 0, 100, '6', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 08:29:43'),
(64, 'Lê Nam Phi nhập khẩu hộp 1kg (5 - 6 trái)', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Lê Nam Phi giòn, ngọt, mọng nước, là loại trái cây nhập khẩu rất được yêu thích, lê Nam Phi bổ sung nhiều chất xơ, vitamin và khoáng chất cho cơ thể khoẻ và da đẹp, dáng chuẩn hơn.', 69000, 0, '1623511823-le-nam-phi-nhap-khau-hop-1kg-5-6-trai-201905241649392847.jpg,1623511823-le-nam-phi-nhap-khau-hop-1kg-5-6-trai-201906141628552988.jpg,1623511823-le-nam-phi-nhap-khau-hop-1kg-5-6-trai-201906141629038187.jpg', 0, 100, '6', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 08:30:23'),
(65, 'Táo Ambrosia nhập khẩu Mỹ hộp 1kg (6 - 7 trái)', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Táo Ambrosia nhập khẩu Mỹ là loại trái cây được mệnh danh là \"món ăn của các vị thần\" trong thần thoại Hy Lạp bởi hương vị thơm ngon, ngọt ngào và độ giòn của nó. Loại táo này có vẻ ngoài đẹp mắt với sắc vỏ đỏ hồng tươi tắn trên nền màu vàng kem. \r\nKhi ăn, loại quả này sẽ kích thích vị giác và lôi cuốn bạn ngay từ lần thưởng thức đầu tiên. Khác với những loại táo khác, táo Ambrosia là trái cây nhập khẩu Mỹ không hề có vị chua mà chỉ có vị ngọt thanh nhẹ nhàng cùng với phần thịt táo giòn, không xốp bột cùng với hương thơm đặc trưng đầy quyến rũ.', 118000, 0, '1623511864-tao-ambrosia-nhap-khau-my-hop-1kg-6-7-trai-202012031653167351.jpg,1623511864-tao-ambrosia-nhap-khau-my-hop-1kg-6-7-trai-202012031653178207.jpg,1623511864-tao-ambrosia-nhap-khau-my-hop-1kg-6-7-trai-202012031653187403.jpg', 0, 100, '6', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 08:31:04'),
(66, 'Kiwi vàng hộp 300g', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Quả kiwi không được mấy ấn tượng với lớp lông xù xì và có màu nâu xám bên ngoài nhưng đây được xem là loại trái cây có nhiều lợi ích cho sức khỏe người dùng. Tại Bách hoá XANH, kiwi vàng Zespri là loại trái cây nhập khẩu được nhiều bà nội trợ yêu thích và tin dùng.', 109000, 0, '1623511912-kiwi-vang-tui-300g-202106010032398953.jpg,1623511912-kiwi-vang-tui-300g-202106010032422070.jpg,1623511912-kiwi-vang-tui-300g-202106010032428951.jpg', 0, 100, '6', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 08:31:52'),
(67, 'Thanh long hồng túi 1kg', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Thanh long hồng là loại thanh long được lai từ giống thanh long ruột đỏ Bình Định và giống thanh long ruột trắng Chợ Gạo. Sự kết hợp này đã tại nên một giống thanh long mới, vừa ngon ngọt lại mang đến năng suất thu hoạch tốt hơn. Thanh long là một loại trái cây được rất nhiều người yêu thích bởi vị ngọt thanh, chứa nhiều protein, các nhóm vitamin B2, B3, C và chứa nhiều sắt, kali, phốt pho… giúp tăng cường sức khỏe, mang lại cho bạn một cơ thể khỏe mạnh.\r\nThanh long cũng cần phải biết cách chọn đó nha, không phải thấy màu đỏ là chọn được đâu.', 54000, 0, '1623511977-thanh-long-hong-tui-1kg-202101271725492331.jpg,1623511977-thanh-long-hong-tui-1kg-202101271725496534.jpg,1623511977-thanh-long-hong-tui-1kg-202101271725506400.jpg', 0, 100, '6', 0, 0, 0, '2021-06-12 08:32:57', '2021-06-12 08:32:57');
INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_content`, `product_price`, `product_rating`, `product_image`, `product_view`, `product_quantity`, `category_id`, `product_total_comment`, `product_total_review`, `product_total_number`, `created_at`, `updated_at`) VALUES
(68, 'Cam vàng Valencia Úc hộp 1kg (4- 5 trái)', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Cam vàng Valencia trái tròn căng bóng, mọng nước và cực kỳ thơm ngon, đây là loại trái cây nhập khẩu từ Úc an toàn vệ sinh. Thích hợp để vắt uống bởi chứa nhiều vitamin C và vị chua dịu hợp khẩu vị.', 54000, 0, '1623512027-cam-vang-valencia-ai-cap-nhap-khau-hop-1kg-4-5-trai-201905241825361796.jpg,1623512027-cam-vang-valencia-ai-cap-nhap-khau-hop-1kg-4-5-trai-201905241825450941.jpg,1623512027-cam-vang-valencia-ai-cap-nhap-khau-hop-1kg-4-5-trai-201905241825574425.jpg', 0, 100, '6', 0, 0, 0, '2021-06-12 08:33:47', '2021-06-12 08:33:47'),
(69, 'Xoài cát Hoà Lộc túi 1kg', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Trong các loại xoài ngon ở nước ta thì không thể không nhắc đến xoài cát Hoà Lộc, đây được xem là loại trái cây đặc sản của miền Tây bởi hương vị thơm ngon, màu sắc bắt mắt, nguồn dinh dưỡng cao. Không chỉ nổi tiếng ở trong nước, xoài cát Hoà Lộc còn là loại trái cây xuất khẩu top đầu trong các loại hoa quả sạch trên thế giới.', 49000, 0, '1623512070-xoai-cat-hoa-loc-tui-1kg-202103180811509891.jpg,1623512070-xoai-cat-hoa-loc-tui-1kg-202103180811516385.jpg,1623512070-xoai-cat-hoa-loc-tui-1kg-202103180811528652.jpg', 0, 100, '6', 0, 0, 0, '2021-06-12 08:34:30', '2021-06-12 08:34:30'),
(70, 'Vải thiều tươi 1kg (giao ngẫu nhiên túi hoặc hộp)', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Cứ đến khoảng tháng 6, tháng 7 là mùa rộ thu hoạch vải thiều ở các tỉnh phía Bắc. Những quả vải thiều chín đỏ, căng mọng và thơm ngọt là món trái cây ưa thích của nhiều gia đình trong mùa hè bởi giá thành không quá cao. Tại Bách hoá XANH, trái vải được lấy từ nhiều nơi khác nhau như vải thiều Thanh Hà, vải thiều Lục Ngạn. Dù vậy, chất lượng vẫn luôn được cam kết, đảm bảo an toàn và tươi ngon.', 49000, 0, '1623512109-vai-thieu-tuoi-tui-1kg-202106111840289175.jpeg,1623512109-vai-thieu-tuoi-tui-1kg-202106111840296075.jpeg,1623512109-vai-thieu-tuoi-tui-1kg-202106111840299815.jpeg', 0, 100, '6', 0, 0, 0, '2021-06-12 08:35:09', '2021-06-12 08:35:09'),
(71, 'Lê đường nhập khẩu Trung Quốc hộp 1kg (2 - 3 trái)', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Quả lê hay còn gọi là Mắc cọp, là một trong những loại trái cây được người tiêu dùng ưa chuộng trong những ngày mùa hè oi bức vì tính ngọt thanh mát, có tác dụng giải khát và cung cấp hàm lượng cao các vi khoáng chất cho cơ thể.  Lê nhập khẩu Trung Quốc là loại quả có kích thước to hơn lê Việt Nam, giống lê này có hình dáng tròn đều, vỏ ngoài nhẵn mịn, sáng bóng, da căng và có màu vàng tươi, rất bắt mắt. Là một trong những loại trái cây nhập khẩu được nhiều người Việt Nam ưa chuộng.\r\nĐặc biệt, chúng có vị ngọt đậm, nhiều nước và thịt ít sạn cát hơn nên khi ăn cảm thấy mềm và xốp hơn lê Việt Nam.', 57000, 0, '1623512190-le-duong-trung-quoc-hop-1kg-2-3-trai-202009111112239779.jpg', 0, 100, '6', 0, 0, 0, '2021-06-12 08:36:30', '2021-06-12 08:36:30'),
(72, 'Cam sành loại 2 túi 1kg', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Cam là loại trái cây được nhiều người yêu thích. Cam có rất nhiều loại khác nhau như: cam canh, cam xoàn, cam Vinh,.. trong đó cam sành là một trong những loại cam ngon và nổi tiếng ở Việt Nam.', 38000, 0, '1623512233-cam-sanh-loai-2-tui-1kg-202101271631264363.jpg,1623512233-cam-sanh-loai-2-tui-1kg-202101271631275130.jpg,1623512233-cam-sanh-loai-2-tui-1kg-202101271631270717.jpg', 0, 100, '6', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 08:37:13'),
(73, 'Mãng cầu na túi 500g', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Mãng cầu na hay còn gọi là mãng cầu dai là loại trái cây có xuất xứ từ vùng Châu Mỹ nhiệt đới. Mãng cầu là loại quả được nhiều người yêu thích vì hương vị ngon ngọt và có nhiều lợi ích tốt cho sức khoẻ.', 30000, 0, '1623512292-mang-cau-na-tui-500g-202101091035277721.jpg,1623512292-mang-cau-na-tui-500g-202101091035288998.jpg,1623512292-mang-cau-na-tui-500g-202101091035296923.jpg', 0, 100, '6', 0, 0, 0, '2021-06-12 08:38:12', '2021-06-12 08:38:12'),
(74, 'Kiwi vàng nhập khẩu Trung Quốc hộp 300g', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Trái kiwi vàng xuất xứ Trung Quốc có phần thịt màu vàng, hạt nhỏ màu đen vị ngọt giống với vị của trái xoài và đào. Đặc biệt về hình dáng bên ngoài thì quả có dạng trái xoan. Vỏ của quả có màu vàng nâu khi chín.\r\nTuy có kích thước nhỏ nhưng nó là một trong số loại trái cây nhập khẩu chứa nhiều khoáng chất và vitamin, có tác dụng chống oxy hóa và chữa nhiều bệnh tật.', 23000, 0, '1623512338-kiwi-vang-nhap-khau-tui-300g-202101311342431052.jpg,1623512338-kiwi-vang-nhap-khau-tui-300g-202101311342423807.jpg,1623512338-kiwi-vang-nhap-khau-tui-300g-202101311342427029.jpg', 0, 100, '6', 0, 0, 0, '2021-06-12 08:38:58', '2021-06-12 08:38:58'),
(75, 'Nhãn quế hộp 500g', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Nhãn quế là loại trái cây có rất nhiều tại miền Tây và rất được ưa chuộng. Bởi loại nhãn có cơm rất dày, hạt nhỏ như hạt tiêu kèm thêm vỏ nhãn có màu vàng như da bò nên dân gian đặt tên là nhãn tiêu da bò. Khi thưởng thức bạn sẽ cảm nhận được hương thơm mát cùng vị ngọt thanh lưu lại trên đầu lưỡi và dưới cuống họng. Những cây nhãn càng nhiều tuổi thì phần thịt cơm bên trong lại càng dày và quả sẽ càng ngọt và thơm hơn.', 16000, 0, '1623512391-nhan-que-tui-500g-202102261141588122.jpg,1623512391-nhan-que-tui-500g-202102261141572802.jpg,1623512391-nhan-que-tui-500g-202102261141581297.jpg', 1, 100, '6', 0, 0, 0, '2021-06-12 08:39:51', '2021-06-12 08:44:03'),
(76, 'Kiwi xanh nhập khẩu túi 300g', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Trái kiwi xanh có vỏ màu nâu, nhiều lông xù xì hơn kiwi vàng, thịt quả màu xanh ngọc rất đẹp mắt, với nhiều hạt đen tạo thành 1 vòng tròn xung quanh trục dọc của quả, khi chín có vị rất ngọt, lúc xanh có vị chua.\r\nTuy có kích thước nhỏ nhưng nó là một trong số loại trái cây nhập khẩu chứa nhiều khoáng chất và vitamin, có tác dụng chống oxy hóa và chữa nhiều bệnh tật.', 16000, 0, '1623512651-kiwi-xanh-tui-300g-202101252312571594.jpg,1623512651-kiwi-xanh-tui-300g-202101252312576697.jpg,1623512651-kiwi-xanh-tui-300g-202101252312583902.jpg', 0, 100, '6', 0, 0, 0, '2021-06-12 08:44:11', '2021-06-12 08:44:11'),
(77, 'Chanh dây túi 500g (giao ngẫu nhiên trái sống hoặc chín)', 'Bảo quản trong tủ lạnh sử dụng được 10 ngày', 'Trái cây Bách Hóa Xanh đề cử hôm nay chính là chanh dây. Chanh dây là loại trái cây có vị chua nhưng hậu ngọt, thường dùng làm bánh hay nước giải khát thanh nhiệt trong mùa hè nóng bức, là thức uống được nhiều người yêu thích. Ngoài là nước giải khát thì chanh dây còn có nhiều lợi ích cho sức khỏe. Loại trái này còn giàu các chất hữu cơ như caroten và polyphenol. Trên thực tế, khoa học đã chứng minh rằng trong các loại trái cây', 22000, 0, '1623512719-chanh-day-tui-500g-202012290835235135.jpg,1623512719-chanh-day-tui-500g-202012290835239348.jpg,1623512719-chanh-day-tui-500g-202103190012381345.jpg', 0, 100, '6', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-12 08:45:19'),
(78, 'Chả mực hạ long La Cusina gói 250g', 'Bảo quản ở nhiệt độ 0-5 độ C trong 2 tháng và -18 độ C trong 1 năm', 'Cá, mực, tinh bột mì, hành tím, đường, nước mắm, muối, chất điều vị, tỏi, chất nhũ hoá,...', 129000, 0, '1623513258-cha-muc-ha-long-la-cusina-goi-250g-202105161651427280.jpg,1623513258-cha-muc-ha-long-la-cusina-goi-250g-202105161651444090.jpg,1623513258-cha-muc-ha-long-la-cusina-goi-250g-202105161651447602.jpg', 1, 100, '7', 0, 0, 0, '2021-06-21 05:19:27', '2021-06-13 22:24:00'),
(79, 'Bò viên VuiVui gói 500g', 'Ngăn mát (2 - 8 độ C) 24 giờ, ngăn đông (dưới bằng -18 độ C) 12 tháng', 'Nếu bò viên, chả viên là món ăn ưa thích của bạn và cả gia đình, nhưng bạn lại sợ đồ bán bên ngoài không đảm bảo chất lượng và hợp vệ sinh. Hãy thử ngay với bò viên VuiVui gói 500g đến từ thương hiệu chả cá VuiVui, đảm bảo chất lượng lại tự tay làm tại nhà an toàn vệ sinh thực phẩm', 84000, 0, '1623513333-bo-vien-vuivui-goi-500g-202011111056062653.jfif,1623513333-bo-vien-vuivui-goi-500g-202011111056074290.jpg,1623513333-bo-vien-vuivui-goi-500g-202011111056117122.jpg', 0, 100, '7', 0, 0, 0, '2021-06-12 08:55:33', '2021-06-12 08:55:33'),
(80, 'Chả mực hương vị truyền thống SG Food gói 250g', 'Nhiệt độ -18 độ C hoặc trong ngăn đá tủ lạnh', 'Chiên, xào, nấu canh, nấu lẩu', 110000, 0, '1623513390-cha-muc-huong-vi-truyen-thong-sg-food-goi-250g-202005151627498337.jpg,1623513390-cha-muc-huong-vi-truyen-thong-sg-food-goi-250g-202005151627515497.jpg,1623513390-cha-muc-huong-vi-truyen-thong-sg-food-goi-250g-202005151627519630.jpg', 0, 100, '7', 0, 0, 0, '2021-06-12 08:56:30', '2021-06-12 08:56:30'),
(81, 'Bò viên Bếp 5 sao gói 500g', 'Bảo quản ở nhiệt độ 0 - 5 độ C trong 2 tháng.\r\nBảo quản ở nhiệt độ -18 độ C trong 12 tháng.\r\nSau khi mở bao bì nên sử dụng hết trong ngày và bảo quản ở nhiệt độ 0 - 5 độ C.', 'Chả viên, mực viên,... là một trong những món ăn vặt ưa thích của nhiều người, nhất là giới trẻ. Nhằm đáp ứng và chinh phục khẩu vị người dùng, thương hiệu thực phẩm Bếp 5 Sao đã cho ra mắt sản phẩm Bò viên Bếp 5 sao gói 500g giúp thực đơn trong gia đình bạn trở nên phong phú và ngon miệng hơn.', 94000, 0, '1623513437-bo-vien-bep-5-sao-goi-500g-202101081007249951.jpg,1623513437-bo-vien-bep-5-sao-goi-500g-202101081007268963.jpg,1623513437-bo-vien-bep-5-sao-goi-500g-202101081007274697.jpg', 0, 100, '7', 0, 0, 0, '2021-06-12 08:57:17', '2021-06-12 08:57:17'),
(82, 'Bò viên ngon Cầu Tre gói 500g', 'Bảo quản nhiệt độ -18 độ C hoặc ngăn đá tủ lạnh', 'Sản phẩm phải được rã đông trước khi sử dụng. Chiên, xào, nấu, hấp hoặc chế biến món ăn khác. Sẽ ngon hơn khi dùng chung với sốt mayonnaise, tương ớt, tương xí muội', 80000, 0, '1623513509-bo-vien-ngon-cau-tre-goi-500g-202103261350423945.jpg,1623513509-bo-vien-ngon-cau-tre-goi-500g-202103261350456526.jpg,1623513509-bo-vien-ngon-cau-tre-goi-500g-202103261350462800.jpg', 0, 100, '7', 0, 0, 0, '2021-06-12 08:58:29', '2021-06-12 08:58:29'),
(83, 'Tôm thịt 31/40 Đôi Đũa Vàng khay 252g', '-18 độ C hoặc ngăn đá tủ lạnh', 'Rã đông sản phẩm trước khi sử dụng. Phương pháp rã đông tốt nhất là để sản phẩm ở ngăn mát tủ lạnh (0 - 5 độ C) trong khoảng 4 - 5 giờ. Dùng chế biến các món ăn tuỳ thích', 149000, 0, '1623513582-tom-thit-doi-dua-vang-31-40-goi-450g-201910251612116700.jfif,1623513582-tom-thit-doi-dua-vang-31-40-goi-450g-201910251612130218.jfif,1623513582-tom-thit-doi-dua-vang-31-40-goi-450g-201910251612126896.jfif', 0, 100, '7', 0, 0, 0, '2021-06-22 08:59:42', '2021-06-12 08:59:42'),
(84, 'Gầu bò Mỹ đông lạnh Thảo Tiến Foods khay 300g HSD còn 5 tháng', '-18 độ C hoặc ngăn đá tủ lạnh', 'Gầu bò được tách ra từ phần ức bởi một đường cắt giữa đốt sườn thứ 5 và 6, từ góc phải bả vai đến phần đầu tiên trên ống khuỷu. Đây là phần thịt có gân mỡ xen kẽ nhưng nhiều nạc hơn so với ba chỉ. Thịt gầu bò thuộc phần cơ hoạt động chính của con bò. Khi bò ăn và nhai thì toàn bộ phần thịt ở ức được vận động làm cho vùng thịt này có kết cấu chắc, thớ thịt rõ ràng, vị thịt mềm ngọt tự nhiên.', 137000, 0, '1623513651-gau-bo-my-dong-lanh-thao-tien-foods-khay-300g-201911011112162827.jpg,1623513651-gau-bo-my-dong-lanh-thao-tien-foods-khay-300g-201911011113463178 (1).jpg,1623513651-gau-bo-my-dong-lanh-thao-tien-foods-khay-300g-201911011110119678.jpg', 0, 100, '7', 0, 0, 0, '2021-06-22 09:00:51', '2021-06-12 09:00:51'),
(85, 'Càng ghẹ đông lạnh Trần Gia khay 200g', 'Bảo quản từ -18 độ C hoặc ngăn đá tủ lạnh', '.', 129000, 0, '1623513713-cang-ghe-dong-lanh-tran-gia-khay-200g-202106021027370469.jpg,1623513713-cang-ghe-dong-lanh-tran-gia-khay-200g-202106021027380665.jpg,1623513713-cang-ghe-dong-lanh-tran-gia-khay-200g-202106021027402989.jpg', 0, 100, '7', 0, 0, 0, '2021-06-12 09:01:53', '2021-06-12 09:01:53'),
(86, 'Sò điệp nhật hokkaido Nghi Khánh khay 400g', '-18 độ C hoặc ngăn đá tủ lạnh', 'Rã đông tự nhiên, chế biến theo ý thích. Nấu chín trước khi sử dụng', 113000, 0, '1623513798-so-diep-nhat-hokkaido-nghi-khanh-khay-400g-202011101101484437.jpg,1623513798-so-diep-nhat-hokkaido-nghi-khanh-khay-400g-202011101101496935.jpg,1623513798-so-diep-nhat-hokkaido-nghi-khanh-khay-400g-202011101101487470.jpg', 0, 100, '7', 0, 0, 0, '2021-06-22 09:03:18', '2021-06-12 09:03:18'),
(87, 'Bạch tuộc làm sạch Nghi Khánh khay 400g', '-18 độ C hoặc ngăn đá tủ lạnh', 'Rã đông tự nhiên, chế biến theo ý thích. Nấu chín trước khi sử dụng', 113000, 0, '1623513848-bach-tuoc-lam-sach-nghi-khanh-khay-400g-202011101103324336.jpg,1623513848-bach-tuoc-lam-sach-nghi-khanh-khay-400g-202011101103340176.jpg,1623513848-bach-tuoc-lam-sach-nghi-khanh-khay-400g-202011101103330309.jpg', 0, 100, '7', 0, 0, 0, '2021-06-22 09:04:08', '2021-06-12 09:04:08'),
(88, 'Mực nang Nghi Khánh khay 400g', '-18 độ C hoặc ngăn đá tủ lạnh', 'Rã đông tự nhiên, chế biến theo ý thích. Nấu chín trước khi sử dụng', 108000, 0, '1623513910-muc-nang-lam-sach-nghi-khanh-khay-400g-202011101102450877.jpg,1623513910-muc-nang-lam-sach-nghi-khanh-khay-400g-202011101102461984.jpg,1623513910-muc-nang-lam-sach-nghi-khanh-khay-400g-202011101102468018.jpg', 0, 100, '7', 0, 0, 0, '2021-06-22 09:05:10', '2021-06-12 09:05:10'),
(89, 'Cá tuyết cắt khoanh đông lạnh Camimex khay 270g', '-18 độ C hoặc ngăn đá tủ lạnh', 'Rã đông tự nhiên từ 15-20 phút trước khi chế biến. Nấu súp, làm lẩu hoặc chế biến các món ăn tuỳ thích.', 94000, 0, '1623513979-ca-tuyet-cat-khoanh-dong-lanh-camimex-khay-270g-202104191151478836.jpg,1623513979-ca-tuyet-cat-khoanh-dong-lanh-camimex-khay-270g-202104191151483439.jpg,1623513979-ca-tuyet-cat-khoanh-dong-lanh-camimex-khay-270g-202104191151490123.jpg', 0, 100, '7', 0, 0, 0, '2021-06-21 12:58:20', '2021-06-12 09:06:19'),
(90, 'Tôm thẻ tươi 41/50 Camimex khay 230g', 'Nhiệt độ bảo quản -18 độ C hoặc ngăn đá tủ lạnh', 'Rã đông tự nhiên từ 15-20 phút trước khi chế biến. Nấu súp, làm lẩu hoặc chế biến các món ăn tuỳ thích.', 87000, 0, '1623514047-tom-the-tuoi-41-50-camimex-khay-230g-202104191139145895.jpg,1623514047-tom-the-tuoi-41-50-camimex-khay-230g-202104191139154570.jpg,1623514047-tom-the-tuoi-41-50-camimex-khay-230g-202104191139157622.jpg', 0, 100, '7', 0, 0, 0, '2021-06-11 09:07:27', '2021-06-12 09:07:27'),
(91, 'Cá trứng Đôi Đũa Vàng khay 400g', 'Bảo quản lạnh từ -18 đến 0 độ hoặc ngăn đá tủ lạnh', 'Rã đông hoàn toàn ở nhiệt độ thường. Rán (chiên), kho, nướng hoặc chế biến các món ăn tuỳ thích', 57000, 0, '1623514103-ca-trung-doi-dua-vang-khay-500g-201910251615044026.jpg,1623514103-ca-trung-doi-dua-vang-khay-500g-201910251615049640.jpg,1623514103-ca-trung-doi-dua-vang-khay-500g-201910251615057445.jpg', 0, 100, '7', 0, 0, 0, '2021-06-12 09:08:23', '2021-06-12 09:08:23'),
(92, 'Que surimi hương cua Kani gói 250g', 'Nhiệt độ bảo quản', 'Rã đông trước khi dùng. Dùng chế biến các món như cơm chiên, mì xào, lẩu, canh. Dùng thay cho tôm, cua, hải sản. Không nấu quá lâu (chỉ từ 1 - 2 phút)', 72000, 0, '1623514147-que-surimi-huong-cua-kani-fresh-goi-250g-201910062152003758.jpg,1623514147-que-surimi-huong-cua-kani-fresh-goi-250g-201910062152057341.jpg,1623514147-que-surimi-huong-cua-kani-fresh-goi-250g-201910062152176105.jpg', 0, 100, '7', 0, 0, 0, '2021-06-22 09:09:07', '2021-06-12 09:09:07'),
(93, 'Cá saba tẩm sa tế Trần Gia gói 550g', 'Bảo quản ở nhiệt độ từ -10 đến -18 độ C hoặc trong ngăn đá tủ lạnh', 'Cá saba, hỗn hợp gia vị', 69000, 0, '1623514235-ca-saba-tam-sa-te-tran-gia-goi-550g-202105291547377820.jpg,1623514235-ca-saba-tam-sa-te-tran-gia-goi-550g-202105291547385810.jpg,1623514235-ca-saba-tam-sa-te-tran-gia-goi-550g-202105291547392337.jpg', 0, 100, '7', 0, 0, 0, '2021-06-22 09:10:35', '2021-06-12 09:10:35'),
(94, 'Lườn cá hồi đông lạnh Trần Gia khay 500g', 'Bảo quản từ -18 độ C hoặc ngăn đá tủ lạnh', '.', 57000, 0, '1623514275-luon-ca-hoi-dong-lanh-tran-gia-khay-500g-202106021025595251.jpg,1623514275-luon-ca-hoi-dong-lanh-tran-gia-khay-500g-202106021026004021.jpg,1623514275-luon-ca-hoi-dong-lanh-tran-gia-khay-500g-202106021026026039.jpg', 1, 100, '7', 0, 0, 0, '2021-06-22 09:11:15', '2021-06-13 04:31:37'),
(95, 'Đậu hũ hải sản Tân Việt Sin gói 200g', '12 tháng kể từ ngày sản xuất khi bảo quản ở nhiệt độ dưới 18 độ C đến 0 độ C hoặc trong ngăn đá tủ lạnh', 'Có thể chiên và dùng kèm với đồ chua, tương ớt', 41000, 0, '1623514343-dau-hu-hai-san-tan-viet-sin-goi-200g-202012051128296688.jpg,1623514343-dau-hu-hai-san-tan-viet-sin-goi-200g-202012051128274164.jpg,1623514343-dau-hu-hai-san-tan-viet-sin-goi-200g-202012051128305723.jpg', 3, 100, '7', 0, 0, 0, '2021-06-22 09:12:23', '2021-06-17 21:16:46'),
(96, 'Cá trứng loại 8 con Tân Hải Hòa khay 200g', 'Bảo quản lạnh từ -18 đến 0 độ hoặc ngăn đá tủ lạnh', 'Rã đông tự nhiên rồi chế biến các món ăn (chiên, nướng,...)', 36000, 0, '1623514478-ca-trung-loai-8-con-tan-hai-hoa-200g-202011101131468433.jpg,1623514478-ca-trung-loai-8-con-tan-hai-hoa-200g-202011101131491958.jpg,1623514478-ca-trung-loai-8-con-tan-hai-hoa-200g-202011101131500803.jpg', 3, 100, '7', 0, 0, 0, '2021-06-22 09:14:38', '2021-06-18 05:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_detail_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rating` int NOT NULL DEFAULT '0',
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  KEY `reviews_order_detail_id_foreign` (`order_detail_id`),
  KEY `reviews_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `order_detail_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, '2', '2', '2', 3, 'tam dc', '2021-06-14 05:13:02', '2021-06-14 05:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `shipping_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipping_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_phone`, `shipping_note`, `created_at`, `updated_at`) VALUES
(1, 'Phát', 'thanhphat147@gmail.com', 'VN', '0974444444', NULL, NULL, NULL),
(2, 'Phát', 'thanhphat147@gmail.com', 'VN', '0974444444', NULL, NULL, NULL),
(3, 'Phát', 'thanhphat147@gmail.com', 'VN', '0974444444', NULL, NULL, NULL),
(4, 'Phát', 'thanhphat147@gmail.com', 'VN', '0974444444', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_foreign` (`role`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `telephone`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', 1, '2021-06-12 00:46:46', NULL, '2021-06-12 00:46:46', '2021-06-12 00:46:46'),
(2, 'admin', 'thanhphat147@gmail.com', '$2y$10$vDshaglzdm8XCFjFoZBjsecD6tqQB.1Ci1nXXR7KQDad8jxidyKFm', 'VN', '0974444444', 1, '2021-06-13 02:47:52', NULL, '2021-06-13 02:47:34', '2021-06-13 02:47:52'),
(3, 'Phát', 'thanhphat1247@gmail.com', '$2y$10$YVeGVLOIVxxHI06uBikU7uxits8/aqIUwVAVvjMibfKUX12ucBoo2', 'vn', '0974444444', 2, '2021-06-17 05:45:36', NULL, '2021-06-17 05:45:03', '2021-06-17 05:45:36'),
(4, 'Lê Văn Nghĩa', 'meoem2712@gmail.com', '$2y$10$zIQCcLDvHyzDw7s.c8u/.eTOLV3CntTz/dqwymr8B72gaa.NmqYJq', 'Ninh Thuan', '0328827134', 1, '2021-06-18 06:01:22', NULL, '2021-06-18 06:00:48', '2021-06-18 06:01:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
