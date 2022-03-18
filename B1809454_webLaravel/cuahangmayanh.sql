-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2021 lúc 12:14 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


------------------------------- Thong tin dang nhap trang quan tri
-------------------------------Ten dang nhap: hohaihanhg@gmail.com
------------------------------------ Mat khau: hohaihanh



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahangmayanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Máy ảnh Canon', 0, 'may-anh-canon', '2021-11-12 00:35:06', '2021-11-12 00:35:06', NULL),
(2, 'Máy ảnh Canon DSLR', 1, 'may-anh-canon-dslr', '2021-11-12 00:39:33', '2021-11-12 00:39:33', NULL),
(3, 'Máy ảnh Canon Compact', 1, 'may-anh-canon-compact', '2021-11-12 00:40:14', '2021-11-12 00:40:14', NULL),
(4, 'Máy ảnh Sony', 0, 'may-anh-sony', '2021-11-12 00:40:25', '2021-11-12 00:40:25', NULL),
(5, 'Máy ảnh Sony DSLR', 4, 'may-anh-sony-dslr', '2021-11-12 00:40:41', '2021-11-12 00:40:41', NULL),
(6, 'Máy ảnh Sony Compact', 4, 'may-anh-sony-compact', '2021-11-12 00:42:16', '2021-11-12 00:42:16', NULL),
(7, 'Máy ảnh Nikon', 0, 'may-anh-nikon', '2021-11-12 00:42:25', '2021-11-12 00:42:25', NULL),
(8, 'Máy ảnh Nikon DSLR', 7, 'may-anh-nikon-dslr', '2021-11-12 00:42:42', '2021-11-12 00:42:42', NULL),
(9, 'Máy ảnh Nikon Compact', 7, 'may-anh-nikon-compact', '2021-11-12 00:42:57', '2021-11-12 00:42:57', NULL),
(10, 'Máy ảnh hãng khác', 0, 'may-anh-hang-khac', '2021-11-12 00:43:11', '2021-11-12 00:43:11', NULL),
(11, 'Máy ảnh Pentax', 10, 'may-anh-pentax', '2021-11-12 00:43:30', '2021-11-12 00:43:30', NULL),
(12, 'Máy ảnh Leica', 10, 'may-anh-leica', '2021-11-12 00:43:50', '2021-11-12 00:43:50', NULL),
(13, 'Ống kính', 0, 'ong-kinh', '2021-11-12 00:44:00', '2021-11-12 00:44:00', NULL),
(14, 'Ống kính Canon', 13, 'ong-kinh-canon', '2021-11-12 00:44:13', '2021-11-12 00:44:13', NULL),
(15, 'Ống kính Sony', 13, 'ong-kinh-sony', '2021-11-12 00:44:26', '2021-11-12 00:44:26', NULL),
(16, 'Ống kính Nikon', 13, 'ong-kinh-nikon', '2021-11-12 00:44:40', '2021-11-12 00:44:40', NULL),
(17, 'Ống kính Pentax', 13, 'ong-kinh-pentax', '2021-11-12 00:44:58', '2021-11-12 00:44:58', NULL),
(18, 'Flash', 13, 'flash', '2021-11-12 00:45:17', '2021-11-12 02:39:31', NULL),
(19, 'Phụ kiện', 0, 'phu-kien', '2021-11-12 00:45:26', '2021-11-12 00:45:26', NULL),
(20, 'Bao đựng máy ảnh', 19, 'bao-dung-may-anh', '2021-11-12 00:45:57', '2021-11-15 09:11:35', NULL),
(21, 'Chân máy ảnh', 19, 'chan-may-anh', '2021-11-12 00:46:11', '2021-11-15 09:11:29', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Khách hàng 1', 'khach1@gmail.com', '50d25ceee6f203926768fe7450f924a7', '0453782938', '2021-11-12 05:51:41', '2021-11-12 05:51:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `shipping_fee` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `shipping_id`, `total`, `shipping_fee`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1001, 1, 2200000, 35000, 'Đã xác nhận', '2021-11-12 05:53:33', '2021-11-12 06:03:39', NULL),
(1002, 1, 700000, 35000, 'Đang chờ xử lý', '2021-11-12 06:03:27', '2021-11-15 09:50:55', NULL),
(1003, 2, 3500000, 35000, 'Đã giao', '2021-11-13 01:27:59', '2021-11-13 07:08:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 1001, 15, 'Chân máy Sony GP-VPT2BT WIRELESS', 2200000, 1, '2021-11-12 05:53:33', '2021-11-12 05:53:33'),
(2, 1002, 14, 'Túi máy ảnh Backpacker BBK-2', 700000, 1, '2021-11-12 06:03:27', '2021-11-12 06:03:27'),
(3, 1003, 14, 'Túi máy ảnh Backpacker BBK-2', 700000, 1, '2021-11-13 01:27:59', '2021-11-13 01:27:59'),
(4, 1003, 13, 'Đèn Flash Fujifilm maike MK-320 Speedlite', 1400000, 2, '2021-11-13 01:27:59', '2021-11-13 01:27:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `views_count` int(11) DEFAULT NULL,
  `quantity_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `feature_image_name`, `deleted_at`, `views_count`, `quantity_product`) VALUES
(1, 'Canon EOS 90D (CHÍNH HÃNG)', 25500000, '/storage/product/1/iVP2CUWz4GLE9Z2HQNbX.jpg', '<p>Canon EOS 90D Body (Ch&iacute;nh h&atilde;ng)</p>\r\n\r\n<p>T&oacute;m tắt sản phẩm:</p>\r\n\r\n<p>- Cảm biến: APS-C CMOS 32.5MP<br />\r\n- Bộ xử l&yacute; h&igrave;nh ảnh: Digic 8<br />\r\n- Chụp li&ecirc;n tiếp: 10fps<br />\r\n- Dải ISO: 100-25600<br />\r\n- Quay video: UHD 4K30p &amp; Full HD 120p<br />\r\n- M&agrave;n h&igrave;nh cảm ứng Vari-Angle<br />\r\n- Tốc độ m&agrave;n trập: 1/16000<br />\r\n- Hệ thống lấy n&eacute;t tự động 45 điểm<br />\r\n- Dual Pixel CMOS AF với 5481 điểm AF<br />\r\n- T&iacute;ch hợp Wifi v&agrave; Bluetooth<br />\r\n- Cảm biến đo s&aacute;ng 220000-Pixel AE<br />\r\n- K&iacute;ch thước: 139.7 x 104.14 x 76.2 mm<br />\r\n- Trọng lượng: 701g</p>\r\n\r\n<h3>Cảm biến CMOS APS-C 32.5MP</h3>\r\n\r\n<p><strong>Canon EOS 90D</strong>&nbsp;được trang bị cảm biến CMOS APS-C 32.5MP với độ ph&acirc;n giải cao ấn tượng c&oacute; khả năng tạo ra những h&igrave;nh ảnh với độ r&otilde; n&eacute;t v&agrave; dải động đ&aacute;ng ch&uacute; &yacute;. Định dạng APS-C của n&oacute; đủ lớn để kiểm so&aacute;t độ s&acirc;u của trường ảnh nhưng cũng đủ nhỏ để cho ph&eacute;p&nbsp;<strong>EOS 90D</strong>&nbsp;v&agrave; c&aacute;c ống k&iacute;nh của n&oacute; c&oacute; thể cầm tay v&agrave; c&acirc;n bằng ho&agrave;n hảo. Độ nhạy mở rộng l&ecirc;n tới 25600 khi chụp cầm tay c&ugrave;ng độ nhiễu thấp cho ph&eacute;p hoạt động trong điều kiện &aacute;nh s&aacute;ng kh&ocirc;ng cho ph&eacute;p.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/107/650/files/7229-canon-eos-90d-1.jpg?v=1588330440406\" /></p>', 1, 2, '2021-11-12 01:45:21', '2021-11-18 08:28:35', '7229-canon-eos-90d-4.jpg', NULL, NULL, 3),
(2, 'Canon Powershot G7X MARK II', 9900000, '/storage/product/1/k5GGafqGkO1rzLzNPiyO.jpg', '<p><em>Th&ocirc;ng số kỹ thuật Canon PowerShot G7 X Mark II</em></p>\r\n\r\n<p>- Cảm biến ảnh: CMOS 20.1MP 1&quot;</p>\r\n\r\n<p>- Bộ xử l&yacute; DIGIC 7</p>\r\n\r\n<p>- Ống k&iacute;nh 8.8-36.8mm f/1.8-2.8 (24-100mm)</p>\r\n\r\n<p>- ISO: 125-6.400, mở rộng 25.600</p>\r\n\r\n<p>- Tốc độ m&agrave;n trập: 1/2.000 gi&acirc;y, chụp li&ecirc;n tiếp 8 fps tối đa 30 h&igrave;nh</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh LCD 3&rdquo; 1,04 triệu điểm ảnh, lật l&ecirc;n 180&deg;, lật xuống 45&deg;</p>\r\n\r\n<p>- Quay phim Full HD 1080p@60fps</p>\r\n\r\n<p>- T&iacute;ch hợp Wi-Fi, NFC</p>\r\n\r\n<p>- Kết nối: AV out, microHDMI, microUSB</p>\r\n\r\n<p>- Pin: 1.250 mAh (NB-13L)</p>\r\n\r\n<p>- K&iacute;ch thước: 105.5 x 60.9 x 42.0 mm</p>\r\n\r\n<p>- Trọng lượng: 320 g (gồm pin v&agrave; thẻ nhớ)</p>', 1, 3, '2021-11-12 01:50:52', '2021-11-27 06:02:14', '3610483-canon-powershot-g7-x-mark-ii-tinhte-4.jpg', NULL, NULL, 4),
(3, 'Sony Alpha A6400 Kit', 30490000, '/storage/product/1/uzXTDr3jexmiRVgwdLWA.jpg', '<p><a href=\"https://binhminhdigital.com/may-anh-sony-alpha-a6400-ilce6400m-kit-18135mm.html\"><strong>M&aacute;y Ảnh Sony Alpha A6400 KIT 18-135MM OSS</strong></a></p>\r\n\r\n<p>- Cảm biến CMOS Exmor APS-C 24.2MP&nbsp;</p>\r\n\r\n<p>- Bộ xử l&yacute; h&igrave;nh ảnh BIONZ X</p>\r\n\r\n<p>- EVF OLED XGA Tru-Finder 2.36m-Dot</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh cảm ứng, lật 180&deg; 3.0&quot; 921.6k-Dot</p>\r\n\r\n<p>- Quay video UHD 4K nội bộ, S-Log3, HLG</p>\r\n\r\n<p>- Quay S&amp;Q Motion ở chế độ Full HD từ 1-120 fps</p>\r\n\r\n<p>- Hệ thống AF nhận diện pha v&agrave; tương phản 425 điểm</p>\r\n\r\n<p>- Real-Time Eye AF; Real-Time Tracking</p>\r\n\r\n<p>- Chụp li&ecirc;n tiếp đến 11 fps</p>\r\n\r\n<p>- ISO mở rộng 100-102400</p>\r\n\r\n<p>- T&iacute;ch hợp Wi-Fi với NFC</p>\r\n\r\n<p>- K&iacute;ch thước: 120 x 66.9 x 59.7 mm</p>\r\n\r\n<p>- Trọng lượng: 403g</p>\r\n\r\n<p>-&nbsp;Ống k&iacute;nh kit Sony&nbsp;E 18-135mm f/3.5-5.6 OSS</p>', 1, 5, '2021-11-12 02:04:08', '2021-11-12 02:04:08', 'may-anh-sony-alpha-a6400-ilce6400m-kit-18135mm.jpg', NULL, NULL, 2),
(4, 'Sony Cyber-shot DSC-RX10 IV', 18500000, '/storage/product/1/LJkIC7NWIhWyY784KZIn.jpg', '<p><strong>Th&ocirc;ng số kỹ thuật Cyber-shot RX10 IV:</strong></p>\r\n\r\n<p><em>- Cảm biến ảnh stacked CMOS Exmor RS, k&iacute;ch thước 1&quot;, 20.1 triệu điểm ảnh</em></p>\r\n\r\n<p><em>- Bộ xử l&yacute; BIONZ X, thuật to&aacute;n full pixel readout cho quay phim</em></p>\r\n\r\n<p><em>- Ống k&iacute;nh: ZEISS Vario-Sonnar T* 8,8-220mm (24-600mm) f/2.4-4</em></p>\r\n\r\n<p><em>- Lấy n&eacute;t: 315 điểm theo pha, tốc độ 0,03 gi&acirc;y</em></p>\r\n\r\n<p><em>- M&agrave;n h&igrave;nh: LCD 3&quot; cảm ứng, độ ph&acirc;n giải 1,44 triệu điểm ảnh</em></p>\r\n\r\n<p><em>- K&iacute;nh ngắm điện tử: OLED độ ph&acirc;n giải XGA (2.35 triệu điểm ảnh), ph&oacute;ng đại 0.70x</em></p>\r\n\r\n<p><em>- Tốc độ m&agrave;n trập: 1/2.000 gi&acirc;y, tối đa 1/32.000 gi&acirc;y (điện tử)</em></p>\r\n\r\n<p><em>- Chụp li&ecirc;n tục tối đa 24 ảnh/gi&acirc;y, tối đa 249 tấm (JPEG Fine)</em></p>\r\n\r\n<p><em>- ISO: 100 - 12800, mở rộng 64 - 25600</em></p>\r\n\r\n<p><em>- Quay phim 4K 3.840 x 2.160 pixel @ 30p/25p/24p / XAVC S 100 Mbps</em></p>\r\n\r\n<p><em>- Quay phim Full HD: XAVC S 50 Mbps @ 120 fps / AVCHD 28 Mbps</em></p>\r\n\r\n<p><em>- Chụp h&igrave;nh 17MP khi quay phim</em></p>\r\n\r\n<p><em>- High Frame: 240 fps, 480 fps, 960 fps</em></p>\r\n\r\n<p><em>- Profile m&agrave;u: Picture Profile, S-Gamut3/S-Log3</em></p>\r\n\r\n<p><em>- Kết nối Wi-Fi, Bluetooth, NFC</em></p>\r\n\r\n<p><em>- Giao tiếp: HDMI 4K/30p, microUSB 2.0 (Terminal)</em></p>\r\n\r\n<p><em>- Thẻ nhớ: SD/SDHC/SDXC UHS-1 (U3) hoặc MemoryStick Pro Duo</em></p>\r\n\r\n<p><em>- Pin: NP-FW50</em></p>', 1, 6, '2021-11-12 02:07:32', '2021-11-12 02:45:50', '1505225826000-img-868053.jpg', NULL, NULL, 5),
(5, 'Nikon FA GOLD LEN 50mm LIMITED', 27500000, '/storage/product/1/0voY1SpYXzipaC6KJnfS.jpg', '<p>Nikon FA Gold len 50mm 1.4 AIS Limited</p>\r\n\r\n<p>Nikon FA Gold k&egrave;m len 50mm 1.4 AIS Gold Bản giới hạn số lượng rất &iacute;t m&aacute;y đẹp.</p>', 1, 8, '2021-11-12 02:12:23', '2021-11-12 02:12:23', 'fa-copy.jpg', NULL, NULL, 1),
(6, 'Nikon Coolpix P900', 8100000, '/storage/product/1/tQ9yBNfH2FGKjVqzMgor.jpg', '<p>Nikon Coolpix&nbsp;P900 si&ecirc;u zoom 83x optical. Pin sạc thẻ nhớ 16gb. Gi&aacute; 8.100.000đ. BH 3 th&aacute;ng</p>\r\n\r\n<p>- M&aacute;y ảnh Nikon si&ecirc;u zoom 83x với cảm biến CMOS 16MP<br />\r\n- Ống k&iacute;nh tương đương 24-2000mm Nikkor Super ED VR<br />\r\n- Hệ thống chống rung k&eacute;p Dual Detect Optical VR<br />\r\n- Độ nhạy s&aacute;ng ISO 100-6400 , chụp li&ecirc;n tiếp 7 h&igrave;nh/gi&acirc;y<br />\r\n- Quay phim Full-HD 1080p 60fps tr&ecirc;n to&agrave;n dải zoom quang<br />\r\n- C&aacute;c chế độ chụp tự động th&ocirc;ng minh v&agrave; thủ c&ocirc;ng ho&agrave;n to&agrave;n<br />\r\n- M&agrave;n h&igrave;nh lật xoay TFT, k&iacute;nh ngắm điện tử</p>', 1, 9, '2021-11-12 02:17:21', '2021-11-12 02:17:21', 'may-anh-nikon-coolpix-p900-1.jpg', NULL, NULL, 5),
(7, 'Pentax K-70 KIT', 8500000, '/storage/product/1/PiowPH5fBecTkaDMkVCc.jpg', '<h4>T&oacute;m tắt sản phẩm:</h4>\r\n\r\n<p>- Cảm biến CMOS APS-C 24.24MP<br />\r\n- Bộ xử l&yacute; h&igrave;nh ảnh Prime MII<br />\r\n- M&agrave;n h&igrave;nh LCD 3&quot; 921K-Dot<br />\r\n- ISO 100-204800<br />\r\n- Tốc độ chụp li&ecirc;n tiếp 6fps<br />\r\n- T&iacute;ch hợp Wifi, tương th&iacute;ch với O-GPS1<br />\r\n- Cấu tr&uacute;c kh&aacute;ng cự thời tiết<br />\r\n- Ống k&iacute;nh Pentax DA 18-135mm f/3.5-5.6 ED AL DC WR</p>', 1, 11, '2021-11-12 02:20:50', '2021-11-12 02:20:50', 'pentax-k70-kit-18-135mm-01-zt3b-mu.jpg', NULL, NULL, 4),
(8, 'Leica M (TYP 240) Body Silver', 59800000, '/storage/product/1/RRanIz2ezfJlDUEmMmkC.jpg', '<p><strong>Leica M 240</strong><br />\r\n- Cảm biến CMOS full-frame độ ph&acirc;n giải 24 megapixel<br />\r\n- ISO 200-6400<br />\r\n- M&agrave;n h&igrave;nh LCD 3inch 920k<br />\r\n-&nbsp;Quay phim FullHD, liveview, b&aacute;o n&eacute;t tr&ecirc;n m&agrave;n h&igrave;nh (focus peaking)<br />\r\n-&nbsp;Tốc độ m&agrave;n trập từ 1/4000 gi&acirc;y đến 60 gi&acirc;y</p>', 1, 12, '2021-11-12 02:24:10', '2021-11-15 20:12:31', 'm240-silver-1.jpg', NULL, NULL, 10),
(9, 'Canon RF 50mm F/1.8 STM', 5000000, '/storage/product/1/Eti8Qt1M2F5PJPfwknTQ.jpg', '<p><strong>Ống k&iacute;nh Canon RF 50mm f/1.8 STM new 100% . Bảo h&agrave;nh 12 th&aacute;ng&nbsp;</strong></p>\r\n\r\n<p>T&Iacute;NH NĂNG NỔI BẬT</p>\r\n\r\n<p>- Loại ống k&iacute;nh: Ống k&iacute;nh một ti&ecirc;u cự<br />\r\n- K&iacute;ch thước định dạng tối đa: 35mm FF<br />\r\n- Ti&ecirc;u cự: 50 mm<br />\r\n- Gắn ống k&iacute;nh: Canon RF<br />\r\n- Khẩu độ tối đa: F1.8<br />\r\n- Khẩu độ tối thiểu: F22<br />\r\n- C&acirc;n nặng: 160 g&nbsp;<br />\r\n- Đường k&iacute;nh: 69 mm&nbsp;<br />\r\n- Chiều d&agrave;i: 41 mm&nbsp;<br />\r\n- Đường k&iacute;nh k&iacute;nh lọc: 43 mm</p>', 1, 14, '2021-11-12 02:28:56', '2021-11-12 02:28:56', 'canon-rf-50mm-f18-stm-2-500x500.jpg', NULL, NULL, 3),
(10, 'Sony FE 100-400mm F/4.5-5.6 GM OSS', 38800000, '/storage/product/1/ZpdcgCJPJkn7ZLFQ1AJq.jpg', '<p><strong>M&ocirc; tả t&oacute;m tắt</strong></p>\r\n\r\n<p>- Ng&agrave;m E định dạng Full frame</p>\r\n\r\n<p>- Khẩu độ f/4.5-40</p>\r\n\r\n<p>- 2 thấu k&iacute;nh ED v&agrave; 1 thấu k&iacute;nh Super ED</p>\r\n\r\n<p>- Tr&aacute;ng phủ&nbsp;Nano AR v&agrave;&nbsp;Fluorine</p>\r\n\r\n<p>- Động cơ lấy n&eacute;t tự động Direct Drive Super Sonic Wave</p>\r\n\r\n<p>- Ổn định h&igrave;nh ảnh quang học&nbsp;Optical SteadyShot</p>\r\n\r\n<p>- V&ograve;ng chỉnh zoom</p>\r\n\r\n<p>- Lấy n&eacute;t trong; Focus Range Limiter</p>\r\n\r\n<p>- Thiết kế chống bụi, chống ẩm</p>\r\n\r\n<p>- 9 l&aacute; khẩu tr&ograve;n</p>', 1, 15, '2021-11-12 02:32:39', '2021-11-12 02:44:37', '1492603626-1333230.jpg', NULL, NULL, 4),
(11, 'Nikon AF DX FISHEYE 10.5mm F2.8G ED', 7500000, '/storage/product/1/0DayZQq4PNbSNCh5TJ5n.jpg', '<p>Ống K&iacute;nh Nikon AF DX Fisheye Nikkor 10.5mm F2.8G ED như mới k&iacute;nh đẹp</p>\r\n\r\n<p>Bảo h&agrave;nh 06 th&aacute;ng</p>\r\n\r\n<p>Gi&aacute; 7.500.000đ</p>\r\n\r\n<p>- Khẩu độ F/ 2.8 -22<br />\r\n-&nbsp; G&oacute;c ngắm 180 độ<br />\r\n- Số lượng l&aacute; khẩu 7<br />\r\n- C&oacute; sẵn lens Hood v&agrave; bộ lọc<br />\r\n- 1 thấu k&iacute;nh ED v&agrave; 1 thấu k&iacute;nh phi cầu</p>\r\n\r\n<p>&quot;</p>', 1, 16, '2021-11-12 02:36:08', '2021-11-12 05:17:05', 'af-dx-fisheye-nikkor-105mmf28-g-ed1.jpg', NULL, NULL, 5),
(12, 'Pentax DA 10-17mm F3.5-4.5 FISHEYE', 4000000, '/storage/product/1/UIR5UlSyURb3K7R7MSx6.jpg', '<p>Pentax DA 10-17mm F3.5-4.5 Fish eye</p>\r\n\r\n<p>Gi&aacute;: 4.000.000đ</p>\r\n\r\n<p>T&oacute;m tắt sản phẩm:</p>\r\n\r\n<p>Cấu tạo thấu k&iacute;nh &nbsp; : 10 thấu k&iacute;nh / 8 nh&oacute;m<br />\r\nG&oacute;c ngắm &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;180&deg; - 100&deg;<br />\r\nSố l&aacute; khẩu &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 6<br />\r\nTi&ecirc;u cự &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 10 - 17mm<br />\r\nK&iacute;ch thước &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 6.86 x 7.11 cm<br />\r\nTrọng lượng &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 320g</p>', 1, 17, '2021-11-12 02:38:22', '2021-11-12 02:38:22', '2010-pentax-da10-17mm.jpg', NULL, NULL, 6),
(13, 'Đèn Flash Fujifilm maike MK-320 Speedlite', 1400000, '/storage/product/1/pGGVGSLci3qabCFygEWs.jpg', '<p>Đ&egrave;n flash Fujifilm Meike MK-320 Speedlite</p>\r\n\r\n<p>M&ocirc; tả t&oacute;m tắt</p>\r\n\r\n<p>- Tương th&iacute;ch c&aacute;c d&ograve;ng m&aacute;y Canon, Fujifilm X-series v&agrave; Sony Nex, A7-series</p>\r\n\r\n<p>- T&iacute;nh năng đo s&aacute;ng TTL</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh lưới LCD c&oacute; độ ch&iacute;nh x&aacute;c cao</p>\r\n\r\n<p>- Thiết kế gọn nhẹ</p>', 1, 18, '2021-11-12 02:41:56', '2021-11-13 01:27:59', 'productimage-picture-meike-mk-320-11211.jpg', NULL, 1, 8),
(14, 'Túi máy ảnh Backpacker BBK-2', 700000, '/storage/product/1/2jeuQz6NsyvpcGKn1vOZ.jpg', '<p>BackPacker BBK-2</p>\r\n\r\n<p>Một kiểu d&aacute;ng cổ điển v&agrave; t&uacute;i m&aacute;y ảnh phong c&aacute;ch thời trang. Vải bạt d&agrave;y v&agrave; đệm ch&egrave;n để bảo vệ m&aacute;y ảnh SLR của bạn.</p>\r\n\r\n<p>M&agrave;u sắc: Khaki Chất liệu: vải chống nước.</p>\r\n\r\n<p>K&iacute;ch thước b&ecirc;n ngo&agrave;i : Rộng x Cao x S&acirc;u = (28x25x12cm).</p>\r\n\r\n<p>K&iacute;ch thước b&ecirc;n trong : Rộng x Cao x S&acirc;u = (22x20x11cm)</p>', 1, 20, '2021-11-12 02:48:05', '2021-11-13 01:27:59', 't2nsxyxsxxxxxxxxxx-52790117.jpg', NULL, 2, 1),
(15, 'Chân máy Sony GP-VPT2BT WIRELESS', 2200000, '/storage/product/1/uAK3X0KvTHQ67e6FiO7l.jpg', '<p><strong>M&ocirc; tả t&oacute;m tắt</strong></p>\r\n\r\n<p>- D&ugrave;ng cho một số mẫu m&aacute;y ảnh Sony với Bluetooth</p>\r\n\r\n<p>- Điều khiển m&aacute;y ảnh kh&ocirc;ng d&acirc;y</p>\r\n\r\n<p>- B&aacute;ng cầm lớn với bộ điều khiển kết hợp</p>\r\n\r\n<p>- Chuyển đổi sang tripod để b&agrave;n</p>', 1, 21, '2021-11-12 02:52:06', '2021-11-12 05:53:33', '1579005196-img-1302994.jpg', NULL, 3, 7),
(16, 'Canon EOS 77D + KIT 18-55mm STM', 12700000, '/storage/product/1/VXu7YJxbEywXTlT2LDk9.jpg', '<p>Canon EOS 77D + Kit 18-55mm STM&nbsp;</p>\r\n\r\n<p>Phụ kiện: pin sạc d&acirc;y đeo tặng thẻ nhớ 16gb</p>\r\n\r\n<p>BH 6 th&aacute;ng.</p>\r\n\r\n<p>- Cảm biến CMOS&nbsp;APS-C 24.2MP</p>\r\n\r\n<p>- Bộ xử l&yacute; h&igrave;nh ảnh DIGIC&nbsp;7</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh&nbsp;LCD&nbsp;cảm ứng đa điểm 3.0&quot; 1.04m-Dot</p>\r\n\r\n<p>- Quay phim&nbsp;Full HD 1080p 60fps</p>\r\n\r\n<p>- Tốc độ chụp li&ecirc;n tiếp l&ecirc;n đến 6fps</p>\r\n\r\n<p>- Lấy n&eacute;t tự động theo pha 45 điểm</p>\r\n\r\n<p>- ISO&nbsp;100-25600&nbsp;(mở rộng đến&nbsp;51200)</p>\r\n\r\n<p>- Động cơ lấy n&eacute;t tự động&nbsp;Dual Pixel CMOS</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh LCD phụ ph&iacute;a tr&ecirc;n v&agrave; v&ograve;ng điều khiển nhanh ph&iacute;a sau m&aacute;y</p>\r\n\r\n<p>- Cảm biến đo s&aacute;ng RGB+IR 7560-Pixel</p>\r\n\r\n<p>- T&iacute;ch hợp kết nối Wi-Fi với NFC, Bluetooth</p>\r\n\r\n<p>- Ống k&iacute;nh&nbsp;EF-S 18-55mm f/4-5.6 IS STM</p>\r\n\r\n<p><strong>Giới thiệu Canon EOS 77D + Kit 18-55mm</strong></p>\r\n\r\n<p>Bao gồm khả năng chụp ảnh tĩnh v&agrave; quay video hiệu quả,&nbsp;<strong>Canon EOS 77D kit 18-55mm</strong>&nbsp;được thiết kế với khả năng chụp ảnh ti&ecirc;n tiến đa năng c&ugrave;ng với thiết kế trực quan. Canon 77D d&ugrave;ng cảm biến CMOS 24.2MP mới, k&iacute;ch thước chuẩn APS-C. Canon đ&atilde; c&oacute; tinh chỉnh về cấu tr&uacute;c của cảm biến v&agrave; thay đổi vị tr&iacute; của c&aacute;c pixel lấy n&eacute;t theo pha. Nhờ đ&oacute; hệ thống lấy n&eacute;t Dual Pixel CMOS tr&ecirc;n 77D c&oacute; thể lấy n&eacute;t với tốc độ chỉ 0.003 gi&acirc;y, nhanh hơn so với chiếc 80D. Cảm biến mới cũng đem lại cho 77D dải ISO rộng hơn, trải d&agrave;i từ 100 đến 25600, mở rộng l&ecirc;n đến 51200 (80D mở rộng rối đa ISO25600). Canon 77D cũng sử dụng chip DIGIC 7, gi&uacute;p m&aacute;y xử l&yacute; nhanh hơn nhưng tốc độ chụp li&ecirc;n tiếp chỉ 6fps.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;</p>', 1, 2, '2021-11-13 05:23:15', '2021-11-18 08:19:06', 'canon-eos-77d-kit-18-55mm-02.jpg', NULL, NULL, 15),
(18, 'Menu 2.1.1', 385367, '/storage/product/1/aEXdzeryL1m4PHszCWMf.png', '<p>df</p>', 1, 2, '2021-11-28 05:13:07', '2021-11-28 05:13:17', 'Untitled.png', '2021-11-28 05:13:17', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `product_id`, `created_at`, `updated_at`, `image_name`) VALUES
(1, '/storage/product/1/jtcLwpwqIgHVradz30tt.jpg', 1, '2021-11-12 01:45:21', '2021-11-12 01:45:21', '7229-canon-eos-90d-1.jpg'),
(2, '/storage/product/1/TxG9ur72lNira01Gwsci.jpg', 1, '2021-11-12 01:45:21', '2021-11-12 01:45:21', '7229-canon-eos-90d-2.jpg'),
(3, '/storage/product/1/7iiIH0bWsgLThp2QqfSs.jpg', 1, '2021-11-12 01:45:21', '2021-11-12 01:45:21', '7229-canon-eos-90d-3.jpg'),
(5, '/storage/product/1/hm1eDq16KCwAKaJ9UPQ7.jpg', 2, '2021-11-12 01:50:52', '2021-11-12 01:50:52', '3610480-canon-powershot-g7-x-mark-ii-tinhte-1.jpg'),
(6, '/storage/product/1/w5Fa2B4KkeT6d7k2oOp3.jpg', 2, '2021-11-12 01:50:52', '2021-11-12 01:50:52', '3610481-canon-powershot-g7-x-mark-ii-tinhte-2.jpg'),
(7, '/storage/product/1/HuPfa9VOxRfhotUbSFfW.jpg', 2, '2021-11-12 01:50:52', '2021-11-12 01:50:52', '3610482-canon-powershot-g7-x-mark-ii-tinhte-3.jpg'),
(9, '/storage/product/1/ehvoIPZ2xKMkgzu4IM5f.jpg', 3, '2021-11-12 02:04:08', '2021-11-12 02:04:08', 'may-anh-sony-alpha-a6400-ilce6400l-kit-1650mm-4.jpg'),
(10, '/storage/product/1/cZw8U2Bi8Fs4BG62Mm1Y.jpg', 3, '2021-11-12 02:04:08', '2021-11-12 02:04:08', 'may-anh-sony-alpha-a6400-ilce6400m-kit-18135mm-1.jpg'),
(11, '/storage/product/1/R1Y5T0mB75O1iV174syj.jpg', 3, '2021-11-12 02:04:08', '2021-11-12 02:04:08', 'may-anh-sony-alpha-a6400-ilce6400m-kit-18135mm-2.jpg'),
(13, '/storage/product/1/KOhcwrlBiJSf2i0xiUbS.jpg', 4, '2021-11-12 02:07:32', '2021-11-12 02:07:32', '1505225826000-img-868053.jpg'),
(14, '/storage/product/1/5Yerfgr8Ys8PiDk8WZUJ.jpg', 4, '2021-11-12 02:07:32', '2021-11-12 02:07:32', '1505225826000-img-868056.jpg'),
(15, '/storage/product/1/buuX8Jhwo9AbTI4PLX1f.jpg', 4, '2021-11-12 02:07:32', '2021-11-12 02:07:32', '1505250917000-img-868050.jpg'),
(17, '/storage/product/1/00cnrrkUA2xfr7ID0JBx.jpg', 5, '2021-11-12 02:12:23', '2021-11-12 02:12:23', 'fac-copy.jpg'),
(18, '/storage/product/1/VZqmfXzIoht0LCFvhefI.jpg', 5, '2021-11-12 02:12:23', '2021-11-12 02:12:23', 'fad-copy.jpg'),
(20, '/storage/product/1/HA5ud9d7YFDLy7klbDWh.jpg', 5, '2021-11-12 02:12:23', '2021-11-12 02:12:23', 'fa-gold.jpg'),
(21, '/storage/product/1/PYeD0nPbbigXyc9pNUYl.jpg', 6, '2021-11-12 02:17:21', '2021-11-12 02:17:21', '2470217-products89713-1000x1000-238098371.jpg'),
(23, '/storage/product/1/g1LEfbcIviZqNTA2a0I3.jpg', 6, '2021-11-12 02:17:21', '2021-11-12 02:17:21', 'p900c-jpg.jpg'),
(24, '/storage/product/1/KHPXHgUaowBQugnsKNEp.jpg', 6, '2021-11-12 02:17:21', '2021-11-12 02:17:21', 'p900d.jpg'),
(26, '/storage/product/1/Vae4qMjs9ITX6p4RO8eD.jpg', 7, '2021-11-12 02:20:50', '2021-11-12 02:20:50', 'pentax-k70-kit-18-135mm-03.jpg'),
(27, '/storage/product/1/UTrnUcCR6MVhVo5y15QT.jpg', 7, '2021-11-12 02:20:50', '2021-11-12 02:20:50', 'pentax-k70-kit-18-135mm-04.jpg'),
(28, '/storage/product/1/OwEXY8X9w7WIHlFl6mva.jpg', 7, '2021-11-12 02:20:50', '2021-11-12 02:20:50', 'pentax-k70-kit-18-135mm-08.jpg'),
(29, '/storage/product/1/eZDfiuQbaajttQt4tlRV.jpg', 8, '2021-11-12 02:24:10', '2021-11-12 02:24:10', 'lcms-5.jpg'),
(30, '/storage/product/1/O3GFQsVpMVHxpMqJNluY.jpg', 8, '2021-11-12 02:24:10', '2021-11-12 02:24:10', 'lcms-7.jpg'),
(32, '/storage/product/1/U2oJy6QWGytGR4Etu4lo.jpg', 8, '2021-11-12 02:24:10', '2021-11-12 02:24:10', 'm24011f.jpg'),
(33, '/storage/product/1/MrZA1Z4QWVTJsEoc4Epv.jpg', 9, '2021-11-12 02:28:56', '2021-11-12 02:28:56', 'canon-rf-50mm-f18-stm-1-500x500.jpg'),
(34, '/storage/product/1/IOEMqotuZla6gBbMr9aw.jpg', 9, '2021-11-12 02:28:56', '2021-11-12 02:28:56', 'canon-rf-50mm-f18-stm-4-500x500.jpg'),
(35, '/storage/product/1/byAcTKSZiOJQTiLvR7v7.jpg', 9, '2021-11-12 02:28:56', '2021-11-12 02:28:56', 'canon-rf-50mm-f18-stm-5-500x500.jpg'),
(36, '/storage/product/1/E6LUXMubbkHKL19FklWh.jpg', 10, '2021-11-12 02:32:39', '2021-11-12 02:32:39', 'sony-fe-100-400mm-f-4-5-5-6-gm-oss-zshop-003.jpg'),
(37, '/storage/product/1/tFnqxx3hCnWJTVxOGYH4.jpg', 10, '2021-11-12 02:32:39', '2021-11-12 02:32:39', 'sony-fe-100-400mm-f-4-5-5-6-gm-oss-zshop-004.jpg'),
(38, '/storage/product/1/g2sWoeqATFJxsQNM9GAt.jpg', 10, '2021-11-12 02:32:39', '2021-11-12 02:32:39', 'sony-fe-100-400mm-f-4-5-5-6-gm-oss-zshop-007.jpg'),
(39, '/storage/product/1/ebOjJE7vb6dlqqY2oJE7.jpg', 11, '2021-11-12 02:36:08', '2021-11-12 02:36:08', 'af-dx-fisheye-nikkor-105mmf28-g-ed1.jpg'),
(40, '/storage/product/1/m5BV0n70oEtkdacFluQ0.jpg', 11, '2021-11-12 02:36:08', '2021-11-12 02:36:08', 'af-dx-fisheye-nikkor-105mmf28-g-ed2-2.jpg'),
(41, '/storage/product/1/meHlRFVyhT4UrVqd5fdr.jpg', 11, '2021-11-12 02:36:08', '2021-11-12 02:36:08', 'af-dx-fisheye-nikkor-105mmf28-g-ed3.jpg'),
(42, '/storage/product/1/HCsLVS6qN4TqtPYFBRsl.jpg', 12, '2021-11-12 02:38:22', '2021-11-12 02:38:22', '2010-ngang-pentax-10-17.jpg'),
(43, '/storage/product/1/1uPM4lMz45X6sTE8WpFD.jpg', 12, '2021-11-12 02:38:22', '2021-11-12 02:38:22', '2010-pentax-10-17mm.jpg'),
(44, '/storage/product/1/N5MvraoLajs1SWDAPVDn.jpg', 12, '2021-11-12 02:38:22', '2021-11-12 02:38:22', '2010-pentax-da10-17mm.jpg'),
(45, '/storage/product/1/SzhcxBS6KiVZPevnLxc7.jpg', 13, '2021-11-12 02:41:56', '2021-11-12 02:41:56', 'productimage-picture-meike-mk-320-11209.jpg'),
(46, '/storage/product/1/uMIebd3kPkLqv5wggAZY.jpg', 13, '2021-11-12 02:41:56', '2021-11-12 02:41:56', 'productimage-picture-meike-mk-320-11210.jpg'),
(47, '/storage/product/1/4xmYGjXbxmsPwUNgmP8x.jpg', 13, '2021-11-12 02:41:56', '2021-11-12 02:41:56', 'productimage-picture-meike-mk-320-11213.jpg'),
(48, '/storage/product/1/WS9jaFldufYUDMuHNfd0.jpg', 14, '2021-11-12 02:48:05', '2021-11-12 02:48:05', 't2nsxyxsxxxxxxxxxx-52790117.jpg'),
(49, '/storage/product/1/skDaPkLWSywQckAtfsP6.jpg', 15, '2021-11-12 02:52:06', '2021-11-12 02:52:06', '1579004482-1540293.jpg'),
(50, '/storage/product/1/OKfWut3rWPtsdKW01Cn0.jpg', 15, '2021-11-12 02:52:06', '2021-11-12 02:52:06', '1579005196-img-1302998.jpg'),
(51, '/storage/product/1/tSHbFA2OhBQSDHsAyeFV.jpg', 15, '2021-11-12 02:52:06', '2021-11-12 02:52:06', '1579005196-img-1303006.jpg'),
(52, '/storage/product/1/9Qswy3DwIP78FXH00qgN.jpg', 16, '2021-11-13 05:23:15', '2021-11-13 05:23:15', 'canon-77da-84fc3dc6-4d19-4b33-817f-6894ee2047fb.jpg'),
(53, '/storage/product/1/GGQOqz4QNBFs4bBI5P0k.jpg', 16, '2021-11-13 05:23:15', '2021-11-13 05:23:15', 'canon-77dc-cfade8ae-ec5a-4700-a819-4c0d792c1d9e.jpg'),
(54, '/storage/product/1/ncjcqBR7R5GbqXuI8z3p.jpg', 16, '2021-11-13 05:23:15', '2021-11-13 05:23:15', 'canon-eos-77d-kit-18-55mm-04.jpg'),
(55, '/storage/product/1/pYlo0tJ32VWwRjjoLyN7.jpg', 17, '2021-11-27 06:30:57', '2021-11-27 06:30:57', 'Banner2.jpg'),
(56, '/storage/product/1/vKUCTQaZMy9cekPQzsRz.jpg', 17, '2021-11-27 06:30:57', '2021-11-27 06:30:57', 'banner3.jpg'),
(57, '/storage/product/1/Qiz28tbZJAFyqJ8hDSwr.png', 18, '2021-11-28 05:13:07', '2021-11-28 05:13:07', '111Untitled.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-11-12 01:45:21', '2021-11-12 01:45:21'),
(2, 1, 2, '2021-11-12 01:45:21', '2021-11-12 01:45:21'),
(3, 2, 1, '2021-11-12 01:50:52', '2021-11-12 01:50:52'),
(4, 2, 3, '2021-11-12 01:50:52', '2021-11-12 01:50:52'),
(5, 2, 2, '2021-11-12 01:50:52', '2021-11-12 01:50:52'),
(6, 2, 4, '2021-11-12 01:50:52', '2021-11-12 01:50:52'),
(7, 3, 5, '2021-11-12 02:04:08', '2021-11-12 02:04:08'),
(8, 3, 2, '2021-11-12 02:04:08', '2021-11-12 02:04:08'),
(9, 3, 6, '2021-11-12 02:04:08', '2021-11-12 02:04:08'),
(10, 4, 5, '2021-11-12 02:07:32', '2021-11-12 02:07:32'),
(11, 4, 3, '2021-11-12 02:07:32', '2021-11-12 02:07:32'),
(12, 4, 2, '2021-11-12 02:07:32', '2021-11-12 02:07:32'),
(13, 5, 7, '2021-11-12 02:12:23', '2021-11-12 02:12:23'),
(14, 5, 6, '2021-11-12 02:12:23', '2021-11-12 02:12:23'),
(15, 5, 2, '2021-11-12 02:12:23', '2021-11-12 02:12:23'),
(16, 5, 8, '2021-11-12 02:12:23', '2021-11-12 02:12:23'),
(17, 6, 7, '2021-11-12 02:17:21', '2021-11-12 02:17:21'),
(18, 6, 3, '2021-11-12 02:17:21', '2021-11-12 02:17:21'),
(19, 6, 2, '2021-11-12 02:17:21', '2021-11-12 02:17:21'),
(20, 7, 2, '2021-11-12 02:20:50', '2021-11-12 02:20:50'),
(21, 7, 9, '2021-11-12 02:20:50', '2021-11-12 02:20:50'),
(22, 7, 10, '2021-11-12 02:20:50', '2021-11-12 02:20:50'),
(23, 8, 11, '2021-11-12 02:24:10', '2021-11-12 02:24:10'),
(24, 8, 2, '2021-11-12 02:24:10', '2021-11-12 02:24:10'),
(25, 8, 12, '2021-11-12 02:24:10', '2021-11-12 02:24:10'),
(26, 9, 13, '2021-11-12 02:28:56', '2021-11-12 02:28:56'),
(27, 9, 1, '2021-11-12 02:28:56', '2021-11-12 02:28:56'),
(28, 10, 5, '2021-11-12 02:32:39', '2021-11-12 02:32:39'),
(29, 10, 13, '2021-11-12 02:32:39', '2021-11-12 02:32:39'),
(30, 11, 7, '2021-11-12 02:36:08', '2021-11-12 02:36:08'),
(31, 11, 13, '2021-11-12 02:36:08', '2021-11-12 02:36:08'),
(32, 12, 9, '2021-11-12 02:38:22', '2021-11-12 02:38:22'),
(33, 12, 13, '2021-11-12 02:38:22', '2021-11-12 02:38:22'),
(34, 13, 14, '2021-11-12 02:41:56', '2021-11-12 02:41:56'),
(35, 13, 13, '2021-11-12 02:41:56', '2021-11-12 02:41:56'),
(36, 14, 15, '2021-11-12 02:48:05', '2021-11-12 02:48:05'),
(37, 14, 16, '2021-11-12 02:48:05', '2021-11-12 02:48:05'),
(38, 14, 17, '2021-11-12 02:48:05', '2021-11-12 02:48:05'),
(39, 15, 18, '2021-11-12 02:52:06', '2021-11-12 02:52:06'),
(40, 15, 5, '2021-11-12 02:52:06', '2021-11-12 02:52:06'),
(41, 15, 17, '2021-11-12 02:52:06', '2021-11-12 02:52:06'),
(42, 16, 1, '2021-11-13 05:23:15', '2021-11-13 05:23:15'),
(43, 16, 6, '2021-11-13 05:23:15', '2021-11-13 05:23:15'),
(44, 16, 2, '2021-11-13 05:23:15', '2021-11-13 05:23:15'),
(45, 17, 2, '2021-11-27 06:30:57', '2021-11-27 06:30:57'),
(46, 18, 2, '2021-11-28 05:13:07', '2021-11-28 05:13:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`, `type`, `deleted_at`) VALUES
(3, 'phone_contact', '+84 0344104985', '2021-10-06 19:26:32', '2021-10-07 05:38:14', 'Text', NULL),
(5, 'facebook_link', 'https://www.facebook.com/profile.php?id=100007853867374', '2021-10-25 06:01:40', '2021-10-25 06:01:40', 'Textarea', NULL),
(6, 'footer_info', '<p class=\"pull-left\">Copyright © 2021 TWENTY .</p>', '2021-10-25 06:12:20', '2021-10-25 06:12:20', 'Textarea', NULL),
(7, 'gmail_contact', 'hohaihanhg@gmail.com', '2021-10-25 06:57:30', '2021-10-25 06:57:30', 'Text', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `customer_id`, `address`, `phone`, `email`, `created_at`, `updated_at`, `notes`) VALUES
(1, 'Khách Hàng đầu tiên', 1, '23/2. 30/4, Hưng Lợi, Ninh Kiều, Cần Thơ', '0947362837', 'khach1@gmail.com', '2021-11-12 05:53:28', '2021-11-12 05:53:28', 'Giao hàng ngoài giờ hành chính'),
(2, 'khách 123', 1, '3/2, Hưng Lợi, Ninh Kiều, Cần Thơ', '0947362837', 'khách hàng 1', '2021-11-13 01:25:26', '2021-11-13 01:25:26', 'Gói hàng kĩ, không móp méo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_path`, `image_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GIỮ trọn từng KHOẢNH KHẮC', NULL, '/storage/slider/1/XIjDK3sa8qgD14QZ224r.jpg', 'banner1.jpg', '2021-11-12 01:08:10', '2021-11-12 01:08:10', NULL),
(2, 'Canon EOS 5D', 'Mark IV', '/storage/slider/1/w3B9vvavfxArBstWKZdq.jpg', 'Banner2.jpg', '2021-11-12 01:11:42', '2021-11-12 01:11:42', NULL),
(3, 'Pentax 645 Z', 'Máy ảnh cảm biến tốt nhất', '/storage/slider/1/2tUbSb3aZLsau21nvSoT.jpg', 'banner3.jpg', '2021-11-12 01:14:58', '2021-11-12 01:14:58', NULL),
(4, 'sdffbdgn', 'sdfgffhn', '/storage/slider/1/VFeCgSLDqJXKHdRzlqGn.jpg', 'canon-77da-84fc3dc6-4d19-4b33-817f-6894ee2047fb.jpg', '2021-11-27 07:08:54', '2021-11-27 07:15:41', '2021-11-27 07:15:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'canon', '2021-11-12 01:45:21', '2021-11-12 01:45:21'),
(2, 'máy ảnh', '2021-11-12 01:45:21', '2021-11-12 01:45:21'),
(3, 'compact', '2021-11-12 01:50:52', '2021-11-12 01:50:52'),
(4, 'powershot', '2021-11-12 01:50:52', '2021-11-12 01:50:52'),
(5, 'sony', '2021-11-12 02:04:08', '2021-11-12 02:04:08'),
(6, 'dslr', '2021-11-12 02:04:08', '2021-11-12 02:04:08'),
(7, 'nikon', '2021-11-12 02:12:23', '2021-11-12 02:12:23'),
(8, 'limited', '2021-11-12 02:12:23', '2021-11-12 02:12:23'),
(9, 'pentax', '2021-11-12 02:20:50', '2021-11-12 02:20:50'),
(10, 'kit', '2021-11-12 02:20:50', '2021-11-12 02:20:50'),
(11, 'leica', '2021-11-12 02:24:10', '2021-11-12 02:24:10'),
(12, 'silver', '2021-11-12 02:24:10', '2021-11-12 02:24:10'),
(13, 'ống kính', '2021-11-12 02:28:56', '2021-11-12 02:28:56'),
(14, 'flash', '2021-11-12 02:41:56', '2021-11-12 02:41:56'),
(15, 'túi', '2021-11-12 02:48:05', '2021-11-12 02:48:05'),
(16, 'bao đựng', '2021-11-12 02:48:05', '2021-11-12 02:48:05'),
(17, 'phụ kiện', '2021-11-12 02:48:05', '2021-11-12 02:48:05'),
(18, 'chân máy', '2021-11-12 02:52:06', '2021-11-12 02:52:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`) VALUES
(1, 'Ho Hai Hanh', 'hohaihanhg@gmail.com', '$2y$10$YZSeI1Uh2lY40GapLye/3.4wrb29YnPcSXbphHzACQBMjo8Y2ScAu', '5xwBAFq0jwBoe3CCpSYsAqKLAuPuI4AuJyMoaNVCP27MfIOzhSR8iZhsv1oM');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
