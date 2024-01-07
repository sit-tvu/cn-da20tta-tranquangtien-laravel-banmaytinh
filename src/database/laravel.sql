-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2024 lúc 03:27 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = visible, 1 = hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'LENOVO', 'lenovo', 0, '2023-11-12 15:38:34', '2023-12-16 08:53:09'),
(2, 'ASUS', 'asus', 0, '2023-11-12 15:38:49', '2023-12-16 08:47:48'),
(3, 'ACER', 'acer', 0, '2023-11-12 15:39:14', '2023-12-24 09:58:39'),
(4, 'APPLE', 'apple', 0, '2023-11-12 15:39:24', '2023-12-24 09:58:34'),
(18, 'DELL', 'dell', 0, '2023-12-24 09:58:51', '2023-12-24 09:59:10'),
(19, 'HP', 'hp', 0, '2023-12-24 10:12:44', '2023-12-24 10:12:44'),
(20, 'DareU', 'dareu', 0, '2023-12-24 15:02:24', '2023-12-24 15:02:24'),
(22, 'Rapoo', 'rapoo', 0, '2024-01-04 16:57:09', '2024-01-04 16:57:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'laptop', 'Máy tính xác tay, gọn nhẹ phù hợp cho văn phòng', '1699685861.jpg', 0, '2023-11-11 06:57:41', '2023-11-11 06:57:41'),
(2, 'MacBook', 'macbook', 'Máy tính xách tay chạy hệ điều hành macOS, thiết kế nhỏ gọn, sành điệu', '1699685937.jpg', 0, '2023-11-11 06:58:57', '2023-11-11 06:58:57'),
(3, 'Máy tính để bàn - pc', 'pc', 'Máy tính để bàn với cấu hình khủng, phục vụ cho nhu cầu công việc, chơi game, giải trí', '1699686396.jpg', 0, '2023-11-11 06:59:47', '2023-12-24 14:53:43'),
(4, 'Phụ kiện', 'phu-kien', 'Bao gồm các phụ kiện như: Màn hình, bàn phím, chuột, loa,...', '1699686057.jpg', 1, '2023-11-11 07:00:57', '2024-01-04 07:49:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_10_29_144853_add_details_to_users_table', 1),
(4, '2023_10_30_072019_create_categories_table', 1),
(5, '2023_11_05_141726_create_brands_table', 1),
(6, '2023_11_15_142010_create_products_table', 2),
(7, '2023_11_15_143541_create_product_images_table', 2),
(8, '2023_12_30_223323_create_orders_table', 3),
(9, '2023_12_30_224029_create_order_details_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `total` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `phone`, `status`, `total`, `created_at`, `updated_at`) VALUES
(3, 2, 'Tien Tran', 'VietNam', '0337677141', 0, 91260000, '2023-12-30 16:42:01', '2023-12-30 16:42:01'),
(4, 2, 'Tien Tran', 'VietNam', '0337677141', 1, 30490000, '2023-12-31 15:34:46', '2024-01-01 10:49:02'),
(5, NULL, 'Tien Tran', 'VietNam', '0337677141', 3, 11999900, '2023-12-31 15:44:06', '2024-01-01 10:33:10'),
(6, 2, 'Tien aaaa', 'zzzzzzz', '121312123', 2, 112979400, '2023-12-31 15:45:38', '2024-01-01 10:33:04'),
(7, 2, 'Tien Tran', 'VietNam', '0337677141', 3, 112979500, '2023-12-31 17:45:05', '2024-01-01 10:33:00'),
(8, 2, 'Tien Tran', 'VietNam', '0337677141', 2, 11999900, '2023-12-31 17:47:34', '2024-01-01 10:26:31'),
(9, 1, 'Đồ Cảnh Minh', 'số 123, thôn Phú Đại, xã Hòa Nghĩa, huyện Châu Thành, tỉnh Trà Vinh', '0869876522', 0, 198420000, '2024-01-03 16:04:42', '2024-01-03 16:04:42'),
(10, 10, 'Đồ Cảnh Minh', 'tra vinh', '0987654321', 2, 111979970, '2024-01-05 01:31:14', '2024-01-05 01:38:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 3, 31, 4, 19990000, '2023-12-30 16:42:01', '2023-12-30 16:42:01'),
(4, 3, 29, 1, 11300000, '2023-12-30 16:42:01', '2023-12-30 16:42:01'),
(5, 4, 33, 1, 30490000, '2023-12-31 15:34:46', '2023-12-31 15:34:46'),
(6, 5, 25, 1, 11999900, '2023-12-31 15:44:06', '2023-12-31 15:44:06'),
(7, 6, 25, 6, 11999900, '2023-12-31 15:45:38', '2023-12-31 15:45:38'),
(8, 6, 39, 2, 20490000, '2023-12-31 15:45:38', '2023-12-31 15:45:38'),
(9, 7, 25, 5, 11999900, '2023-12-31 17:45:05', '2023-12-31 17:45:05'),
(10, 7, 32, 2, 26490000, '2023-12-31 17:45:05', '2023-12-31 17:45:05'),
(11, 8, 25, 1, 11999900, '2023-12-31 17:47:34', '2023-12-31 17:47:34'),
(12, 9, 27, 3, 12490000, '2024-01-03 16:04:42', '2024-01-03 16:04:42'),
(13, 9, 36, 2, 39900000, '2024-01-03 16:04:42', '2024-01-03 16:04:42'),
(14, 9, 40, 3, 560000, '2024-01-03 16:04:42', '2024-01-03 16:04:42'),
(15, 9, 32, 3, 26490000, '2024-01-03 16:04:42', '2024-01-03 16:04:42'),
(16, 10, 23, 3, 16999990, '2024-01-05 01:31:14', '2024-01-05 01:31:14'),
(17, 10, 33, 2, 30490000, '2024-01-05 01:31:14', '2024-01-05 01:31:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `sale_cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `option` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible, 1 = hidden',
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=not-trending, 1 = trending',
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `cost`, `sale_cost`, `quantity`, `color`, `option`, `status`, `trending`, `description`, `created_at`, `updated_at`) VALUES
(23, 1, 2, 'Laptop Asus TUF Gaming F15 FX506HF', 'asus-tuf-gaming-f15-fx506hf', 19999990, 16999990, 30, 'Đen', 'i5  11400H/8GB/512GB/4GB RTX2050/144Hz/Win11', 0, 1, 'Với bộ vi xử lý Intel Core i5 dòng H mạnh mẽ và card đồ họa rời NVIDIA GeForce RTX 2050 4 GB, laptop Asus TUF Gaming F15 FX506HF là một trong những lựa chọn tuyệt vời cho các game thủ và những người dùng làm việc đa tác vụ hoặc liên quan đến đồ họa, kỹ thuật.\r\n• Với bộ vi xử lý Intel Core i5 11400H có tốc độ lên đến 4.5 GHz, chiếc laptop Asus TUF Gaming này đảm bảo hoạt động mượt mà và có thể đáp ứng tốt các tác vụ đa nhiệm, mang lại trải nghiệm sử dụng tuyệt vời trong cả công việc lẫn giải trí, chiến game ở mức cấu hình cao.\r\n\r\n• Asus TUF Gaming F15 được trang bị card đồ họa NVIDIA GeForce RTX 2050 với bộ nhớ đồ họa 4 GB, giúp đáp ứng tốt nhu cầu chơi game cấu hình cao và xử lý các file thiết kế nặng. Từ đó mang lại cho người dùng trải nghiệm chơi game đỉnh cao và hiệu suất làm việc mượt mà.\r\n\r\n• Bộ nhớ RAM 8 GB DDR4 với khả năng nâng cấp tối đa lên đến 32 GB đáp ứng nhu cầu chạy đa nhiệm mượt mà, cho bạn tận hưởng những giây phút chiến game đỉnh cao khi có thể mở nhiều ứng dụng từ nghe nhạc, xem phim, game nặng cùng lúc.\r\n\r\n• Với ổ cứng SSD 512 GB, bạn không cần phải lo lắng về dung lượng lưu trữ và đồng thời tận hưởng tốc độ khởi động nhanh chóng cùng khả năng tải ứng dụng mượt mà của chiếc laptop gaming.\r\n\r\n• Màn hình 15.6 inch độ phân giải Full HD (1920 x 1080) và tốc độ làm mới 144 Hz mang lại hình ảnh sắc nét và mượt mà, cho trải nghiệm chơi game tuyệt vời, đặc biệt là các game có tốc độ khung hình cao. Đồng thời tính năng chống chói Anti Glare giúp hạn chế hiện tượng ánh sáng phản chiếu khi sử dụng trong điều kiện ánh sáng mạnh.\r\n\r\n• Bên cạnh đó, laptop còn được trang bị hệ thống âm thanh DTS software tiên tiến, mang lại cho bạn trải nghiệm âm thanh sống động và chân thực hơn bao giờ hết khi sử dụng.\r\n\r\n• Laptop Asus còn có lối thiết kế hầm hố với sắc đen nam tính, tạo nên sự mạnh mẽ và đậm tính thể thao. Điểm nhấn của bàn phím là đèn nền RGB có thể chuyển đổi màu sắc, tạo điểm nhấn độc đáo khi sử dụng nơi đông người.\r\n\r\n• Máy có nhiều cổng giao tiếp hữu ích: Thunderbolt 4, Jack tai nghe 3.5 mm, USB 3.2, HDMI và LAN (RJ45).', '2023-12-24 09:40:01', '2023-12-24 09:58:00'),
(24, 1, 2, 'Laptop Asus Vivobook Go 15 E1504FA', 'asus-vivobook-go-15', 14490000, 12999990, 30, 'Bạc', 'R5 7520U/16GB/512GB/Chuột/Win11', 0, 0, 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.\r\n• Với bộ vi xử lý AMD Ryzen 5 - 7520U tiên tiến, laptop Asus Vivobook mang đến cho bạn hiệu năng vượt trội, đáp ứng nhanh chóng nhất các công việc soạn thảo văn bản, duyệt web, chạy code,... Card tích hợp AMD Radeon Graphics mạnh mẽ sẽ giúp người dùng thực hiện mượt mà các tác vụ đồ họa, xem video HD, xử lý ảnh và thậm chí là chơi các tựa game hot với mức đồ họa trung bình.\r\n\r\n• Không chỉ vậy, bộ nhớ RAM 16 GB LPDDR5 cung cấp một hiệu suất hoạt động tối ưu, giúp bạn duyệt web, chỉnh sửa hình ảnh, đồ họa đòi hỏi nhiều tài nguyên mà không gặp phải tình trạng giật lag khó chịu. Ổ cứng SSD 512 GB của laptop này cung cấp không gian lưu trữ đủ đầy cho mọi tài liệu và tập tin của bạn. Bạn còn có thể tháo ổ SSD ra và lắp thay thế ổ có dung lượng tối đa lên đến 1 TB nếu có nhu cầu lưu trữ nhiều hơn nữa.\r\n\r\n• Màn hình 15.6 inch của laptop Asus cung cấp hình ảnh sắc nét với độ phân giải Full HD (1920 x 1080) và tấm nền TN. Đặc biệt, lớp phủ chống chói Anti Glare giúp bạn xem màn hình một cách thoải mái ngay cả trong môi trường sáng, giảm căng thẳng mắt hiệu quả.\r\n\r\n• Thêm vào đó, màn hình laptop có độ phủ màu đạt 45% NTSC còn tái hiện sắc độ cùng điểm ảnh tương đối tốt, để người dùng trải nghiệm phim ảnh chân thực và làm các công việc đồ họa một cách bán chuyên.\r\n\r\n• Âm thanh chất lượng cao từ công nghệ SonicMaster audio sẽ tăng cường trải nghiệm nghe nhạc, xem phim và chơi game trên máy tính, đem lại những giây phút giải trí sống động và thú vị.\r\n\r\n• Thiết kế vỏ nhựa với màu bạc sang trọng và khối lượng 1.63 kg giúp người dùng dễ dàng mang theo máy khi di chuyển. Thiết kế bản lề đa dụng có khả năng mở gập lên đến 180 độ, hỗ trợ chia sẻ thông tin hiệu quả với mọi người xung quanh trong những buổi họp hay học nhóm.\r\n\r\n• Đồng thời, laptop cũng đạt chuẩn độ bền quân đội MIL STD 810H, vượt qua hàng loạt các bài kiểm tra khắc nghiệt như sốc, rung động, độ ẩm, nhiệt độ và áp suất, đảm bảo hoạt động ổn định và bền bỉ trong quá trình sử dụng.\r\n\r\n• Bảo mật trên máy cũng được đặt lên hàng đầu với công tắc khóa camera giúp kiểm soát việc sử dụng camera trên máy tính, đảm bảo thông tin riêng tư của bạn không bị lộ qua hình ảnh. Tính năng bảo mật vân tay giúp bạn đăng nhập vào máy tính một cách nhanh chóng chỉ với một chạm đơn giản.\r\n\r\n• Laptop học tập - văn phòng cũng được trang bị nhiều cổng kết nối thông dụng như: USB Type-C, USB 2.0, Jack tai nghe 3.5 mm, USB 3.2 và HDMI đảm bảo bạn dễ dàng kết nối với các thiết bị ngoại vi khác nhau.', '2023-12-24 09:51:17', '2023-12-24 09:51:17'),
(25, 1, 18, 'Laptop Dell Inspiron 15 3520', 'dell-inspiron-15-3520', 13690000, 11999900, 20, 'Đen', 'i3 1215U/8GB/256GB/OfficeHS/Win11', 0, 0, 'Laptop Dell Inspiron 15 3520 i3 1215U (i3U082W11BLU) nhắm trực tiếp đến đối tượng người dùng là sinh viên và nhân viên văn phòng với lối thiết kế thanh lịch, cấu hình có thể vận hành ổn định mọi tác vụ thường ngày, một chiếc laptop học tập - văn phòng mà bạn không nên bỏ qua.\r\n• Vận hành hoàn hảo mọi tác vụ văn phòng như Word, Excel, PowerPoint,... hay thậm chí thiết kế hình ảnh 2D cơ bản trên các phần mềm Adobe nhờ bộ vi xử lý Intel Core i3 1215U và card tích hợp Intel UHD Graphics, đồng thời tối ưu mức tiêu thụ điện năng ở mức thấp nhất.\r\n\r\n• Laptop Dell Inspiron được trang bị một thanh RAM DDR4 8 GB và có thêm một khe rời để người dùng dễ dàng nâng cấp lên 16 GB nhằm nâng cao hiệu suất xử lý. Ổ cứng SSD 256 GB tốc độ cao giúp mọi thao tác đều được phản hồi nhanh chóng, hỗ trợ khe cắm HDD SATA nâng cấp bộ nhớ.\r\n\r\n• Laptop Dell được cài sẵn combo Windows 11 + bộ Office Home & Student vĩnh viễn cho bạn trải nghiệm học tập, làm việc thêm dễ dàng và thuận tiện nhất mà không cần phải cài phần mềm không rõ nguồn gốc hay tốn thêm bất kì chi phí phát sinh nào.\r\n\r\n• Màn hình 15.6 inch rộng rãi cho phép bạn làm việc trên nhiều cửa sổ, kết hợp hoàn hảo với tấm nền LED Backlit cho chất ảnh sáng và tươi hơn, công nghệ chống chói Anti Glare và độ phân giải Full HD (1920 x 1080) khiến mọi nội dung đều được tái tạo hoàn hảo, độ chi tiết cao với màu sắc chân thực và nịnh mắt.\r\n\r\n• Trải nghiệm khung hình chuyển động rõ nét ở tốc độ cao nhờ màn hình tần số quét 120 Hz, tái hiện từng chi tiết của một hành động, mượt mà từ các hoạt động giải trí, cuộn, lướt cho đến chơi những tựa game có tiết tấu nhanh.\r\n\r\n• Laptop được hoàn thiện với lớp vỏ nhựa cứng cáp, khối lượng 1.9 kg không quá nặng mà vẫn có thể bỏ vào balo đem theo bên mình mọi lúc để phục vụ cho công việc, học tập.\r\n\r\n• Đa dạng các cổng kết nối: USB 2.0, USB 3.2, HDMI, Jack tai nghe 3.5 mm và khe đọc thẻ nhớ SD.', '2023-12-24 09:55:49', '2023-12-24 09:59:16'),
(26, 1, 3, 'Laptop Acer Aspire 5 Gaming A515 58GM 51LB', 'acer-aspire-5-gaming', 20490000, 18900000, 15, 'Xám', 'i5 13420H/16GB/512GB/4GB RTX2050/Win11', 0, 1, 'Mẫu laptop gaming với mức giá tầm trung đến từ thương hiệu Acer vừa được lên kệ tại Thế Giới Di Động, sở hữu hiệu năng mạnh mẽ với con chip Intel Gen 13 dòng H hiệu năng cao, RAM 16 GB, card rời RTX cùng nhiều tính năng hiện đại. Laptop Acer Aspire 5 Gaming A515 58GM 51LB i5 13420H (NX.KQ4SV.002) chắc chắn sẽ mang đến cho bạn những trải nghiệm sử dụng và chiến game giải trí tuyệt vời.\r\nCấu hình chiến mọi tựa game \"HOT HIT\" \r\nNhững mẫu laptop Aspire Gaming chắc chắn đã quá quen thuộc với anh em nhờ hiệu năng mạnh mẽ nhưng lại được gắn với mác giá vô cùng hợp lý. Với mẫu Acer Aspire 5 Gaming vào năm 2023 này chắc chắn sẽ không làm mọi người thất vọng với cũng giá đó nhưng hiệu năng có phần được nâng lên nữa.\r\n\r\nLaptop được trang bị bộ vi xử lý Intel Core i5 Raptor Lake - 13420H cùng card rời NVIDIA GeForce RTX 2050 4 GB đa nhiệm hiệu quả cho mình mọi công việc trên cơ quan, học tập hay giải trí thường ngày đến việc thực hiện các bản thiết kế trên nền tảng Premiere, Photoshop,... tuy nhiên với các ấn phẩm nghệ thuật, đồ hoạ động quá nhiều layer hay effect thì mình đánh giá máy chưa đáp ứng được nhanh chóng, nếu chỉ sử dụng cho công việc thông thường thôi thì vẫn rất ok nha.', '2023-12-24 10:05:34', '2023-12-24 10:05:34'),
(27, 1, 18, 'Laptop Dell Vostro 15 3520', 'dell-vostro-15', 15490000, 12490000, 10, 'Xám', '1215U/8GB/512GB/120Hz/OfficeHS/Win11', 0, 0, 'Laptop Dell Vostro 15 3520 i3 1215U (5M2TT1) là một lựa chọn hoàn hảo dành cho những người tìm kiếm một thiết bị gọn gàng và đa năng. Với sự kết hợp giữa bộ vi xử lý Intel thế hệ 12 và tần số quét cao 120 Hz, đây là chiếc laptop học tập - văn phòng tuyệt vời phù hợp cho các bạn học sinh - sinh viên.\r\n• Con chip Intel Core i3 1215U mang lại khả năng xử lý ổn định với hiệu suất tốt, giúp bạn thực hiện các công việc từ văn phòng đến giải trí đa phương tiện một cách hiệu quả. Thêm vào đó, card đồ họa tích hợp Intel UHD Graphics trên laptop Dell Vostro hỗ trợ người dùng có thể thoải mái chỉnh sửa hình ảnh đơn giản với Photoshop, Canva,... duyệt web và xem phim với chất lượng hình ảnh tốt.\r\n\r\n• Bộ nhớ RAM 8 GB DDR4 có khả năng mở rộng lên đến 16 GB cho phép người dùng xử lý nhiều tác vụ cùng lúc một cách linh hoạt. Bạn có thể thoải mái vừa duyệt web, nghe nhạc, vừa làm việc văn phòng mà không gặp trở ngại về hiệu suất.\r\n\r\n• Dung lượng ổ cứng SSD 512 GB giúp tăng tốc độ truy cập dữ liệu và khởi động hệ thống nhanh chóng, đồng thời cho phép bạn thỏa sức lưu trữ nhiều ứng dụng, tệp tin.\r\n\r\n• Màn hình 15.6 inch của Dell Vostro có độ phân giải Full HD (1920 x 1080), mang lại hình ảnh sắc nét và chi tiết. Tần số quét 120 Hz cung cấp trải nghiệm xem hình ảnh mượt mà và hạn chế hiện tượng xé hình khi xem những phim chuyển động nhanh hoặc chơi các game hành động.\r\n\r\n• Tấm nền IPS giúp màn hình của laptop Dell hiển thị nội dung rõ ràng, sống động, bạn có thể tận hưởng không gian giải trí từ nhiều góc nhìn mà không mất màu sắc hoặc độ tương phản. Đồng thời, công nghệ chống chói Anti Glare cũng giúp giảm thiểu hiện tượng lóa và chói từ ánh sáng môi trường.\r\n\r\n• Công nghệ Cirrus Logic High Definition Audio mang lại chất âm trung thực và chi tiết, tạo ra trải nghiệm nghe nhạc và xem phim sống động, cho phép người dùng tận hưởng tốt những hiệu ứng âm sắc đặc biệt từ bộ phim.\r\n\r\n• Với thiết kế bo góc tinh tế cùng tông màu xám sang trọng sẽ luôn khiến bạn có nét thẩm mỹ và chuyên nghiệp nhất định khi sử dụng ở nơi đông người. Khối lượng chỉ 1.67 kg, laptop này rất nhẹ nhàng để bạn dễ dàng mang theo mọi lúc mọi nơi và tiện lợi trong công việc.\r\n\r\n• Ngoài ra, laptop đi kèm với Office Home & Student vĩnh viễn, giúp bạn làm việc và giải trí hiệu quả với mọi công cụ và ứng dụng cần thiết.\r\n\r\n• Dọc hai bên thiết bị có đa dạng cổng giao tiếp như: HDMI, USB 2.0, Jack tai nghe 3.5 mm, USB 3.2, LAN và khe SD để bạn thuận tiện kết nối khi cần thiết.', '2023-12-24 10:09:48', '2023-12-24 10:09:48'),
(28, 1, 19, 'Laptop HP 15s fq5162TU', 'hp-15s', 18990000, 16990000, 10, 'Bạc', 'i5 1235U/8GB/512GB/Win11', 0, 0, 'Laptop HP 15s fq5162TU i5 (7C134PA) chắc chắn sẽ khiến các bạn sinh viên hoặc nhân viên văn phòng hài lòng với lối thiết kế đẹp mắt, thông số kỹ thuật có thể đáp ứng đa nhu cầu và giá cả hợp lý.\r\n• Laptop HP sở hữu bộ vi xử lý Intel Core i5 1235U và card tích hợp Intel Iris Xe Graphics cung cấp hiệu năng xử lý tốt đồng thời tiết kiệm điện năng tiêu thụ, giúp máy hoạt động mượt mà và nhanh hơn trong các tác vụ như làm việc văn phòng, chỉnh sửa hình ảnh cơ bản và giải trí.\r\n\r\n• Bộ nhớ RAM 8 GB cùng khả năng nâng cấp lên đến 32 GB giúp máy chạy được nhiều ứng dụng cùng lúc mà không bị chậm hay lag. Ổ cứng SSD 512 GB hỗ trợ bạn mở và tải các tập tin nhanh hơn, không gian đủ để lưu các tài liệu cần thiết cho công việc và giải trí.\r\n\r\n• Màn hình 15.6 inch độ phân giải Full HD (1920 x 1080) hiển thị hình ảnh rõ ràng cho các tác vụ như xem video, làm việc với tài liệu và chơi game. Công nghệ chống chói Anti Glare kết hợp cùng tấm nền LED Backlit nâng cao trải nghiệm, giúp bạn dễ dàng quan sát nội dung trong mọi điều kiện ánh sáng.\r\n\r\n• Laptop được tích hợp công nghệ Realtek High Definition Audio nâng cao trải nghiệm giải trí với các tính năng như giảm tiếng ồn, tăng độ trung thực và cải thiện chất lượng âm thanh.\r\n\r\n• Thiết kế vỏ nhựa giúp chống trầy xước và bụi bẩn tốt hơn, sắc bạc sang trọng thu hút mọi ánh nhìn khi bạn sử dụng nơi đám đông. Khối lượng 1.7 kg không quá nặng đối với một chiếc laptop học tập - văn phòng để bạn mang theo máy di chuyển đến bất kỳ nơi nào.\r\n\r\n• Chiếc laptop HP cơ bản này có các cổng giao tiếp thông dụng như: USB Type-C, Jack tai nghe 3.5 mm, USB 3.2, HDMI.', '2023-12-24 10:15:15', '2023-12-24 10:15:15'),
(29, 1, 2, 'Laptop Asus Vivobook 15 X1504ZA', 'asus-vivobook-15-x1504za', 12450000, 11300000, 10, 'Bạc', 'i3 1215U/8GB/512GB/Win11', 0, 0, 'Một mẫu laptop học tập - văn phòng đến từ nhà Asus mang hiệu năng ổn định để xử lý công việc, nhiều tiện ích sử dụng đi kèm với đó là một mức giá phù hợp. Laptop Asus Vivobook 15 X1504ZA i3 1215U (NJ102W) chắc chắn là sự lựa chọn tuyệt vời cho không chỉ các bạn sinh viên mà còn là người đi làm để giải quyết mọi vấn đề, công việc hàng ngày.\r\n• Laptop Asus sử dụng chip Intel Core i3 1215U cho phép người dùng vận hành nhanh chóng các tác vụ văn phòng, doanh nghiệp trên Word, Excel,... hay duyệt web, xem phim, giải trí một cách hiệu quả. Ngoài ra, với card Intel UHD Graphics được tích hợp trên máy, bạn cũng có thể dễ dàng tinh chỉnh hình ảnh 2D, video cơ bản với Photoshop, Canva,... và chơi một số tựa game nhẹ.\r\n\r\n• Bộ nhớ RAM 8 GB có hỗ trợ nâng cấp tối đa lên đến 16 GB giúp đa nhiệm thêm hiệu quả, mở nhiều tab Chrome, chuyển qua lại giữa các tác vụ mà không lo đến vấn đề giật lag. Hơn nữa, ổ cứng SSD 512 GB NVMe PCIe vừa cho phép bạn tải nhiều tài liệu, hình ảnh và video, vừa tăng tốc độ khởi động ứng dụng lên đáng kể.\r\n\r\n• Màn hình LED Backlit có kích thước 15.6 inch và độ phân giải Full HD (1920 x 1080) mang đến góc nhìn sâu rộng, hình ảnh sắc nét để trải nghiệm xem phim, giải trí, đồng thời kích thước khung hình lớn cho phép người dùng dễ dàng chia nhiều cửa sổ khi làm việc. Công nghệ chống chói Anti Glare làm hạn chế đáng kể tình trạng bóng gương màn hình, tránh phản xạ ánh sáng khi bạn làm việc ngoài trời hay dưới ánh đèn.\r\n\r\n• Hệ thống loa SonicMaster audio cung cấp những dải âm lớn, sống động để bạn thoải mái giải trí âm nhạc, phim ảnh sau những giờ làm việc căng thẳng.\r\n\r\n• Laptop Asus Vivobook được thiết kế theo xu hướng hiện đại, tông màu bạc sang trọng sẽ mang đến cho bạn những trải nghiệm sử dụng đầy thẩm mỹ và chuyên nghiệp. Máy có khối lượng chỉ 1.7 kg, vừa vặn nằm gọn trong balo để người dùng có thể dễ dàng mang theo bên mình cả ngày.\r\n\r\n• Với độ bền chuẩn quân đội MIL STD 810H, thiết bị chịu đựng tốt trước các tác động như nhiệt độ, môi trường, độ sốc,... bạn cũng có thể yên tâm hơn khi có lỡ xảy ra va chạm. Đa dạng các tính năng bảo mật, đảm bảo tối ưu quyền riêng tư của người dùng như tính năng cảm biến vân tay và công tắc khóa camera.\r\n\r\n• Dọc hai bên laptop là đa dạng các cổng giao tiếp như USB Type-C, USB 2.0, Jack tai nghe 3.5 mm, USB 3.2 và HDMI để thuận tiện kết nối khi cần thiết.', '2023-12-24 10:19:32', '2023-12-24 10:19:32'),
(30, 1, 1, 'Laptop Lenovo IdeaPad 1 15AMN7', 'lenovo-ideapad1-15amn7', 12690000, 9400000, 3, 'Xám', 'R5 7520U/8GB/256GB/Win11', 0, 1, 'Với cấu hình mạnh mẽ và thiết kế thanh lịch, Lenovo IdeaPad 1 15AMN7 R5 7520U (82VG0061VN) sẽ đáp ứng đầy đủ các tiêu chí khi bạn chọn mua laptop học tập - văn phòng. Đây cũng là mẫu laptop đầu tiên trang bị CPU AMD 7000 series mới nhất tại Thế Giới Di Động.\r\nNgoại hình tinh tế, thanh lịch\r\nĐiểm đầu tiên mình ấn tượng bởi chiếc máy này chính là thiết kế không mang quá nhiều chi tiết nhưng toát lên được nét hiện đại và thanh lịch, logo được đặt vỏn vẹn ở góc máy giữ cho diện mạo thêm tinh tế cũng như mang những nét đặc trưng vốn của dòng laptop Lenovo. Khối lượng 1.58 kg cho mình cảm giác cầm nắm đầm tay cũng như không quá nặng để có thể linh động mang theo phục vụ công việc.\r\n\r\nLớp vỏ nhựa màu xám được hoàn thiện khá tốt, cho mình cảm giác mát tay khi sờ hay khi cầm nắm đều chắc chắn. Bên cạnh đó, vỏ được chế tác bằng nhựa nhưng máy vẫn đảm bảo được độ chắc chắn, khi mình ấn nhẹ xuống mặt lưng máy thì không gặp hiện tượng bị flex.\r\nLenovo IdeaPad 1 được trang bị hệ thống bàn phím Fullsize, có cả cụm phím số cho phép mình nhập liệu những file tính toán với những số liệu phức tạp. Cá nhân mình khi gõ phím khá thích tay khi các phím được bố trí thoáng, hành trình phím sâu và có độ nảy tốt, kể cả khi soạn thảo văn bản trong thời gian dài cũng không bị mỏi tay.\r\n\r\nMình chỉ hơi tiếc một chút khi bàn phím không hỗ trợ đèn nền, do đó trong thời gian đầu khi mới làm quen với laptop sẽ hơi khó khăn một chút nếu sử dụng vào ban đêm, nhưng về sau khi đã gõ quen tay mình cũng không còn quá chú tâm đến việc có hay không đèn nền bàn phím.\r\n\r\nTouch Pad có độ lớn vừa phải cùng độ nhạy khá tốt nên khi kéo thả hay di chuyển con trỏ để thao tác thì cho mình cảm giác suôn sẻ. Tuy nhiên, với cổ tay nam hơi quá to so với bàn di chuột nên đôi khi mình cũng bị khựng lại khi thao tác, các bạn cũng gặp những tình trạng như vậy thì có thể lưu ý sắm thêm chuột bên ngoài để phục vụ công việc tốt hơn.\r\nCác cổng kết nối của laptop thì cũng được trang bị khá đầy đủ với: USB 2.0, USB 3.2, HDMI, Jack 3.5 mm và USB Type-C. Bạn không cần phải quá lo lắng khi không có đầu chuyển đổi trong mỗi lần thuyết trình hay trong trường hợp phải ghép nối với các thiết bị khác nữa.', '2023-12-24 10:23:00', '2023-12-24 10:23:00'),
(31, 2, 4, 'Laptop Apple MacBook Air 13 inch M1 2020', 'macbook-air-13inch-m1-2020', 21900000, 19990000, 30, 'Bạc', '8-core CPU/8GB/256GB/7-core GPU', 0, 1, 'Laptop Apple MacBook Air M1 2020 thuộc dòng laptop cao cấp sang trọng có cấu hình mạnh mẽ, chinh phục được các tính năng văn phòng lẫn đồ hoạ mà bạn mong muốn, thời lượng pin dài, thiết kế mỏng nhẹ sẽ đáp ứng tốt các nhu cầu làm việc của bạn.\r\nChip Apple M1 tốc độ xử lý nhanh gấp 3.5 lần thế hệ trước\r\nChiếc MacBook này được trang bị con chip Apple M1 được sản xuất độc quyền bởi Nhà Táo trên tiến trình 5 nm, 8 lõi bao gồm 4 lõi tiết kiệm điện và 4 lõi hiệu suất cao, mang đến một hiệu năng kinh ngạc, xử lý mọi tác vụ văn phòng một cách mượt mà như Word, Excel, Powerpoint,... thực hiện tốt các nhiệm vụ chỉnh sửa hình ảnh, kết xuất 2D trên các phần mềm Photoshop, AI,... máy còn hỗ trợ tiết kiệm được điện năng cao.\r\nĐi cùng CPU là card đồ họa tích hợp 7 nhân GPU có hiệu năng vượt trội sau nhiều bài thử nghiệm hiệu năng đồ họa của benchmark, bạn có thể sử dụng nhiều phần mềm đồ họa chuyên nghiệp, thoả sức sáng tạo nội dung, render video ổn định với chất lượng hình ảnh cao.\r\nMacBook Air được trang bị RAM 8 GB cho khả năng đa nhiệm cao, bạn có thể mở cùng lúc nhiều cửa sổ hoặc ứng dụng để phục vụ cho công việc, giải trí của mình ví dụ như vừa mở Chrome tra cứu thông tin vừa mở Word để làm việc cực kỳ tiện lợi mà không cần lo lắng là máy sẽ bị đơ.\r\n\r\nMacBook sở hữu ổ cứng SSD 256 GB cho tốc độ xử lý nhanh chóng, thao tác cuộn trong Safari cực mượt, đánh thức máy đang trong chế độ ngủ chỉ mất vài giây và đem đến không gian lưu trữ rộng rãi bạn cứ thoải mái lưu lại những bộ phim hay mà không lo nó sẽ chiếm chỗ của các tệp tài liệu công việc.\r\nBên cạnh sử dụng con chip mới Apple còn ra mắt phiên bản hệ điều hành macOS Big Sur với giao diện hoàn hảo hơn, các chuyển động cuộn, phóng to và chuyển tiếp màn hình mượt mà. Ngoài đổi mới giao diện macOS Big Sur còn mang đến khả năng phản hồi nhanh chóng và kho ứng dụng khổng lồ.', '2023-12-24 10:31:08', '2023-12-24 10:31:08'),
(32, 2, 4, 'Apple MacBook Air 13 inch M2 2022', 'macbook-air-13inch-m2-2022', 27900000, 26490000, 10, 'Bạc', '8-core CPU/8GB/256GB/8-core GPU', 0, 1, 'Sau 14 năm, ba lần sửa đổi và hai kiến trúc bộ vi xử lý khác nhau, kiểu dáng mỏng dần mang tính biểu tượng của MacBook Air đã đi vào lịch sử. Thay vào đó là một chiếc MacBook Air M2 với thiết kế hoàn toàn mới, độ dày không thay đổi tương tự như MacBook Pro, đánh bật mọi rào cản với con chip Apple M2 đầy mạnh mẽ.\r\nLột xác ngoạn mục với thiết kế thời thượng, sang trọng \r\nSự đẳng cấp đến từ ngoại hình của chiếc MacBook Air nhà Apple là điều không thể phủ nhận và khó có dòng sản phẩm cùng phân khúc nào có thể qua mặt được. Vẫn là lớp vỏ kim loại nguyên khối cứng cáp cùng các cạnh góc vuông vức, sang trọng nhưng chiếc MacBook Air 2022 năm nay đã thoát ra khỏi ngôn ngữ thiết kế nhẹ nhàng vốn có từ lâu và khoác lên diện mạo mới tương tự như “đàn anh” MacBook Pro.\r\nBề dày 11.3 mm cùng cân nặng ấn tượng 1.24 kg sẽ là một điểm cộng hoàn hảo cho khả năng di động, luôn sẵn sàng đồng hành cùng một người dùng là sinh viên, dân văn phòng như mình đến trường học, công ty hay cũng thoải mái cho người dùng sáng tạo và đặc biệt là những chuyến công tác xa của doanh nhân.\r\n\r\nMặc dù có ngoại hình mỏng và khối lượng nhẹ hơn song MacBook Air mới vẫn không kém phần chắc chắn, độ hoàn thiện tốt so với trước đây. Khung máy cứng, nắp máy gần như không uốn cong khi mình tác động lực và vẫn có thể mở lên bằng một ngón tay. Apple luôn đứng đầu khi nói đến chất lượng sản xuất và chiếc Air mới cũng không ngoại lệ.\r\n\r\nCá nhân mình rất thích màu Midnight với lớp hoàn thiện màu xanh đen đậm có thể thay đổi tùy theo ánh sáng nhưng lại có điểm trừ khi dễ bám dấu vân tay, làm mất đi ngoại hình sang chảnh vốn có của một chiếc laptop cao cấp - sang trọng, bạn có thể chọn mua màu xám, bạc hoặc vàng sẽ không dễ bị bám dấu vân tay hoặc chịu khó lau chùi thường xuyên để giữ cho máy luôn sáng bóng.\r\n\r\nMột sự thay đổi rõ rệt trên chiếc bàn phím Magic Key của dòng laptop Apple M2 năm nay chính là kích thước của hàng phím chức năng F được gia tăng bằng với các dòng phím khác, cho mình thao tác sử dụng chuẩn xác, không bị nhầm lẫn. Hơn nữa trải nghiệm gõ phím cũng rất nhẹ nhàng, êm tay, tiếng ấn cũng nhẹ nhàng hơn so với bàn phím cánh bướm cũ. Kết hợp cùng đèn nền hỗ trợ mình làm việc dễ dàng hơn trong nhiều điều kiện ánh sáng tối khác nhau. \r\n\r\nTính năng Touch ID (cảm biến vân tay) tích hợp nút nguồn thay cho mật khẩu cho phép mình mở khóa máy, truy cập các ứng dụng và thanh toán ứng dụng một cách nhanh chóng, không cần tốn nhiều thời gian hay phải nhớ mật khẩu như các kiểu bảo mật truyền thống.\r\nBàn di chuột không có khác nhiều so với các mẫu cũ mặc dù Apple đã làm rộng hơn một chút, hoạt động giống nhau về mặt chức năng với khả năng di vuốt tuyệt vời, hỗ trợ cử chỉ và từ chối lệnh khi mình lỡ đặt lòng bàn tay lên. Một trong những thay đổi thú vị khác trên chiếc Air mới chính là lưới loa đã được giấu đi, nằm ở bản lề giữa bàn phím và màn hình để giữ cho ngoại hình gọn gàng hơn.', '2023-12-24 10:35:49', '2023-12-24 14:41:31'),
(33, 2, 4, 'Apple MacBook Pro 13 inch M2 2022', 'macbook-pro13inch-m2-2022', 31490000, 30490000, 11, 'Bạc', '8-core CPU/8GB/256GB/10-core GPU', 0, 1, 'Sở hữu thiết kế thanh lịch, sang trọng cùng hiệu năng vượt trội đến từ bộ vi xử lý Apple M2 tân tiến, Macbook Pro M2 hứa hẹn sẽ đáp ứng hoàn hảo cho người dùng sáng tạo, phục vụ tốt cho các nhu cầu thiết kế đồ họa nâng cao.\r\nHiệu năng vượt trội của chip M2 thế hệ mới\r\nMacBook Pro 13 inch là thiết bị đầu tiên được trang bị bộ vi xử lý M2 hoàn toàn mới của Apple. Mặc dù công ty cho biết M1 Pro và M1 Max vẫn sẽ có lợi thế hơn về hiệu suất nhờ có thêm lõi nhưng M2 thể hiện một bước tiến khá lớn so với M1.\r\nM2 có CPU 8 nhân với 4 lõi tiết kiệm điện và 4 lõi hiệu năng, GPU 10 lõi, nhiều hơn 2 lõi so với GPU trong M1, có thể chạy mượt mà các tác vụ của một chiếc laptop đồ họa - kỹ thuật như thiết kế, chỉnh ảnh hay render video trên phần mềm của Adobe như: Photoshop, Premiere,... Đồng thời bộ vi xử lý cũng được tích hợp đến 20 triệu bóng bán dẫn.\r\nTừ những con số nói trên, Apple hứa hẹn M2 sẽ có hiệu suất tổng thể tăng 40% so với M1. Mình cũng đã thử đo hiệu năng bằng công cụ Cinebench R23 và Geekbench 5, M2 đạt được hiệu suất tốt hơn về cả CPU và GPU, mang lại sự cải thiện rõ rệt về khả năng đa nhiệm khi mình mở nhiều ứng dụng khác nhau.\r\nKhả năng xử lý video của MacBook Pro M2 rất ấn tượng khi có thể dễ dàng xử lý nhiều luồng video 8K cùng một lúc. Máy có hiệu suất cao, đặc biệt là trong các tác vụ về đồ họa và sử dụng hàng ngày. Trong suốt thời gian sử dụng máy mình rất ấn tượng bởi sự mượt mà và độ mát mẻ, quạt hiếm khi hoạt động dù mình làm việc với nhiều tác vụ nặng trong thời gian dài.\r\nBộ nhớ RAM 8 GB một lần nữa gây ấn tượng với mình khi có thể chạy nhiều ứng dụng cùng lúc mà không gặp bất kỳ vấn đề gì. Mình hoàn toàn có thể đa nhiệm với các tác vụ như lướt web, đọc báo, chỉnh sửa ảnh Photoshop mà không bị đứng máy hay phản hồi chậm.\r\n\r\nTrên lý thuyết M2 cũng có nhiều băng thông bộ nhớ hơn, đạt 100 GB/giây so với 68 GB/giây của M1, do đó sẽ tối ưu được trải nghiệm sử dụng. Ổ cứng SSD 256 GB mang đến cho mình không gian lưu trữ đủ dùng cho các tác vụ văn phòng, thiết kế,... tuy nhiên do chỉ được trang bị một chip nên tốc độ sẽ bị hạn chế hơn so với các dòng máy thuộc thế hệ M1.', '2023-12-24 14:17:06', '2023-12-24 14:41:17'),
(34, 2, 4, 'Apple MacBook Air 15 inch M2 2023', 'macbook-air-15inch-m2-2023', 37990000, 36490000, 10, 'Xám', '8CPU/16GB/256GB/10GPU', 0, 0, 'Sự kiện 2023 của nhà Apple với sự ra mắt cùng diện mạo mới của chiếc MacBook Air 15 inch M2 2023 10-core GPU, có không gian trải nghiệm nội dung rộng lớn với màn hình 15 inch. Với những người dùng yêu thích tính gọn nhẹ cũng như sở hữu hiệu năng mạnh của dòng Macbook Air thì chắc chắn không thể bỏ qua sản phẩm này.\r\nTrải nghiệm không gian sống trọn vẹn với khung hình lớn\r\nMacBook Air 15 inch M2 2023 sở hữu màn hình có kích thước 15.3 inch được nâng cấp đáng kể so với phiên bản cũ, bên cạnh đó với tấm nền IPS có độ phân giải Liquid Retina (2880 x 1864) cho phép người dùng có thể thoải mái tận hưởng những giờ phút giải trí hay làm việc đầy sống động, hình ảnh và nội dung rõ nét với không gian hiển thị mở rộng. Ngoài ra, công nghệ Wide color (P3) cho màu sắc vô cùng chuẩn xác, tái hiện rõ từng chi tiết, phù hợp với người dùng làm trong lĩnh vực thiết kế.\r\n\r\nKhả năng hiển thị nội dung rõ nét với nhiều điều kiện sáng với độ hiển thị 500 nits, giúp người dùng quan sát rõ ràng mọi nội dung. Công nghệ True Tone có khả năng tự động điều chỉnh độ sáng màn hình tùy theo môi trường xung quanh cung cấp cho người dùng những hình ảnh tự nhiên nhất.\r\n\r\nHệ thống âm gồm 6 loa mang đến khả năng phát âm thanh đa chiều cùng tần số âm cao nhờ tích hợp các công nghệ Spatial Audio và Dolby Atmos, cho phép bạn đắm chìm và tận hưởng sâu mọi sắc độ âm thanh được phát ra.', '2023-12-24 14:24:00', '2023-12-24 14:41:04'),
(35, 2, 4, 'Apple MacBook Pro 16 inch M2 Pro 2023', 'macbook-pro-16inch-m2pro-2023', 59900000, 56900000, 5, 'Bạc', '12-core CPU/16GB/512GB/19-core GPU', 0, 1, 'Apple vừa giới thiệu đến người dùng chiếc MacBook Pro 16 inch M2 Pro 2023 có kiểu dáng mỏng nhẹ nhưng bên trong là một hiệu năng vô cùng mạnh mẽ đáp ứng được mọi tác vụ, hứa hẹn sẽ trở thành một người bạn đồng hành tuyệt vời trong công việc, học tập và giải trí. \r\nXử lý trơn tru mọi công việc nhờ con chip Apple M2 Pro\r\nVẫn được sản xuất trên tiến trình 5 nm nhưng con chip Apple M2 Pro có rất nhiều cải tiến so với thế hệ M1 Pro đã ra mắt trước đó. Với CPU 12 nhân cùng băng thông bộ nhớ 200 GB/s sẽ cung cấp sức mạnh cao hơn 20% giúp vận hành trơn tru mọi tác vụ từ cơ bản đến nâng cao nhưng vẫn rất tiết kiệm năng lượng.\r\nChiếc Apple MacBook được trang bị card đồ họa tích hợp 19 lõi GPU cung cấp hiệu suất đồ họa cao hơn 30% và Neural Engine nhanh hơn 40% so với thế hệ tiền nhiệm giúp đẩy nhanh tốc độ xử lý của các tác vụ đồ họa. Người dùng hoàn toàn có thể thực hiện các công việc chỉnh sửa hình ảnh, thiết kế, dựng phim hay render video trên những phần mềm đồ họa một cách nhẹ nhàng.\r\n\r\nĐược trang bị bộ nhớ RAM 16 GB nên chiếc MacBook này có khả năng xử lý đa nhiệm vô cùng mượt mà, người dùng có thể mở cùng lúc nhiều cửa sổ làm việc, layer đồ họa, file Excel lớn,... mà không gặp phải tình trạng giật lag. Bên cạnh đó, thiết bị còn có tốc độ đọc ghi vô cùng nhanh chóng, thời gian khởi động máy được rút ngắn nhờ ổ cứng SSD 512 GB.', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(36, 2, 4, 'Apple MacBook Pro 14 inch M3 2023', 'macbook-pro-14inch-m3-2023', 41999000, 39900000, 12, 'Bạc', '8-core CPU/8GB/512GB/10-core GPU', 0, 0, 'MacBook Pro M3 8 GB là một bước tiến đáng kể trong dòng sản phẩm laptop của Apple, nổi bật với sự tập trung tối ưu hóa hiệu suất và đồ họa đỉnh cao. Với con chip M3 mạnh mẽ, sản phẩm này đặt ra một tiêu chuẩn mới cho hiệu năng và thiết kế thanh lịch. Điều này hứa hẹn mang đến trải nghiệm làm việc mượt mà và hiệu quả, đồng hành đỉnh cao cho tất cả tác vụ từ văn phòng, giải trí cho đến đồ họa chuyên nghiệp.\r\nSức mạnh đỉnh cao thể hiện qua con chip M3 cải tiến\r\nMang trong mình chip Apple M3 tân tiến, chiếc MacBook Pro 14 inch M3 2023 không chỉ đại diện cho một sự tiến bộ đáng kể trong vi xử lý máy tính, mà còn thể hiện sự đột phá cùng công nghệ 3 nanometer. CPU 8 lõi gồm 4 lõi hiệu năng cao và 4 lõi tiết kiệm điện, cho khả năng xử lý đa luồng nhanh hơn đáng kể, đem đến một sự kết hợp hoàn hảo giữa hiệu suất và tối ưu năng lượng, hỗ trợ người dùng thực hiện các tác vụ đa nhiệm và thao tác đòi hỏi hiệu năng phải được tối đa hóa.\r\n\r\nCPU M3 được cải thiện đáng kể vượt trội hơn CPU M2 đến 20%, thậm chí còn nhanh hơn CPU M1 đến 35%, đây thật sự là một sự vượt bậc đáng chú ý. Điều này giúp người dùng làm việc với các ứng dụng đòi hỏi tính toán cao cấp, đồ họa một cách mượt mà và hiệu quả.\r\nMacBook Pro thực sự thống trị trong lĩnh vực đồ họa và kỹ thuật, với khả năng thực hiện trơn tru các tác vụ chỉnh ảnh, thiết kế hay render video trên các ứng dụng đồ họa hàng đầu như Photoshop, Illustrator, Premiere,... Với 10 nhân GPU mạnh mẽ, nó mang đến tốc độ xử lý hiệu suất nhanh hơn so với các con chip trước, vượt trội hơn M2 lên đến 20% và M1 lên đến 65% đây thực sự là một sự đột phá đáng kinh ngạc.\r\n\r\nHơn nữa, MacBook M3 được trang bị kiến trúc Dynamic Caching, công nghệ Mesh shading và Ray tracing là những tính năng giúp tối ưu hóa hiệu suất đồ họa, cho máy tính hoạt động mượt mà và nhanh chóng hơn bao giờ hết, cung cấp độ chi tiết và hiệu ứng 3D tinh tế và tốc độ dò tia để tạo ra hình ảnh sống động.\r\n\r\nVới bộ nhớ RAM 8 GB, chiếc MacBook có khả năng tiến hành đa nhiệm, cho phép người dùng mở cùng lúc nhiều cửa sổ làm việc, thực hiện các layer đồ họa hoặc làm việc trên các file Excel lớn mà không gặp phải tình trạng giật lag. Hơn nữa, thiết bị còn sở hữu tốc độ đọc và ghi nhanh chóng, thời gian khởi động máy được rút ngắn đáng kể nhờ ổ cứng SSD 512 GB.\r\n\r\nSự tối ưu hóa của bộ vi xử lý M3 đảm bảo rằng hiệu năng của MacBook Pro không bị ảnh hưởng bất kể bạn sử dụng pin hay cắm sạc. Thời lượng pin cũng rất ấn tượng, khả năng phát video trong 22 giờ liên tục, thiết bị không chỉ đảm bảo rằng bạn có thể làm việc hoặc sáng tạo trong thời gian dài, đáp ứng trọn vẹn nhu cầu pin cho bạn sử dụng cả ngày.', '2023-12-24 14:32:33', '2023-12-24 14:32:33'),
(39, 3, 19, 'HP ProOne 440 G9 AIO', 'hp-proone-440-g9-aio', 22990000, 20490000, 10, 'Đen', 'i5 12500T/8GB/512GB/23.8\"F/Touch/Bàn phím/Chuột/Win11', 0, 0, 'Với thiết kế đẹp mắt và tính năng tiện ích, máy tính để bàn HP ProOne 440 G9 AIO i5 12500T (6M3X9PA) sẽ giúp người dùng thực hiện công việc một cách dễ dàng và hiệu quả, một sự lựa chọn hoàn hảo cho các bạn học sinh, sinh viên và nhân viên văn phòng.\r\n• Máy tính để bàn HP được trang bị bộ vi xử lý Intel Core i5 12500T thế hệ 12 với tốc độ xung nhịp tối đa lên đến 4.40 GHz nhờ Turbo Boost, giúp máy tính có khả năng thực hiện mượt mà các tác vụ văn phòng và học tập trên các phần mềm như Word, Excel, PowerPoint. Bên cạnh đó máy cũng có thể vận hành các hoạt động giải trí như xem phim, lướt web với tốc độ nhanh và ổn định.\r\n\r\n• Card tích hợp Intel UHD Graphics 770 cho phép máy tính có khả năng xử lý tốt các tác vụ đồ họa cơ bản trên những phần mềm như Photoshop, AI, Canva,... Ngoài ra, card đồ họa này cũng cho phép người dùng chơi một số tựa game phổ biến ở mức cấu hình trung bình một cách mượt mà.\r\n\r\n• Bộ nhớ RAM 8 GB chuẩn DDR4 với khả năng nâng cấp lên đến 64 GB, cho phép người dùng làm việc và giải trí trên máy tính một cách hiệu quả và không bị gián đoạn. Bên cạnh đó, ổ cứng SSD 512 GB giúp thời gian ghi đọc dữ liệu trở nên nhanh chóng và tăng tốc độ khởi động hệ thống.\r\n\r\n• Nhờ màn hình rộng 23.8 inch độ phân giải Full HD, người dùng có thể tận hưởng trải nghiệm giải trí tuyệt vời với các tác vụ như phim, video, chơi game. Đồng thời, công nghệ Anti Glare giúp giảm thiểu tình trạng chói sáng, đảm bảo sức khỏe cho đôi mắt của người dùng.\r\n\r\n• Máy tính để bàn All in one của HP còn được trang bị camera 5 MP, cho phép người dùng dễ dàng tham gia các cuộc họp trực tuyến, gọi điện thoại video hay các hoạt động làm việc, học tập từ xa một cách thuận tiện và nhanh chóng.\r\n\r\n• Công nghệ Wi-Fi 6 mang lại tốc độ truyền tải nhanh hơn, độ ổn định tốt hơn và độ bảo mật cao hơn so với các chuẩn Wi-Fi trước đó, trong khi Bluetooth 5.3 cho phép kết nối không dây với các thiết bị ngoại vi như tai nghe, loa, chuột, bàn phím,... một cách dễ dàng, nhanh chóng.\r\n\r\n• Máy tính để bàn có thiết kế đẹp mắt với các đường nét hiện đại, tông màu đen thanh lịch, phù hợp với nhiều không gian khác nhau, giúp bạn tập trung vào công việc và học tập một cách hiệu quả.\r\n\r\n• Thiết bị được trang bị đầy đủ các cổng giao tiếp như: LAN, HDMI, SuperSpeed USB Type-A, SuperSpeed USB Type-C,... để bạn dễ dàng kết nối với nhiều thiết bị ngoại vi khác nhau, tối ưu hóa trải nghiệm sử dụng.', '2023-12-24 14:56:46', '2023-12-24 14:56:46'),
(40, 4, 20, 'Bàn Phím Không Dây DareU EK807G', 'ban-phim-khong-day-dareu-ek807g', 700000, 560000, 20, 'Đen', 'EK807G', 0, 0, 'Bàn Phím Không Dây DareU EK807G có khối lượng nhẹ với kích thước gọn gàng, thiết kế không dây cho phép dùng linh hoạt, để bạn tùy chọn vị trí sử dụng phù hợp nhất cho riêng mình.\r\n• Bàn phím không dây gây ấn tượng mạnh với màu đen đẹp mắt, thiết kế tuân thủ chuẩn công thái học, giảm áp lực cho ống cổ tay tạo cảm giác thoải mái khi làm việc trong thời gian dài hơn.\r\n\r\n• Các phím bấm có kích cỡ và khoảng cách hợp lý giúp bạn thao tác nhanh nhẹn, hạn chế tình trạng nhầm lẫn các lệnh, tốc độ phản hồi tốt, nhấn êm.\r\n\r\n• Bàn phím DareU kết nối với laptop, màn hình máy tính, màn hình game,… bằng USB Receiver (đầu thu USB) 2.4 GHz với đường truyền tin cậy, hầu như không bị nhiễu sóng.\r\n\r\n• Là chiếc bàn phím cơ thực thụ, DareU EK807G được lắp hệ thống Blue switch phù hợp với nhiều người sử dụng để chơi game lẫn văn phòng.\r\n\r\n• Bàn phím sử dụng 2 viên pin AAA cực kỳ thông dụng, dễ mua, thời lượng sử dụng pin tối đa có thể lên tới 6 tháng.', '2023-12-24 15:05:32', '2023-12-24 15:05:32'),
(41, 1, 3, 'Laptop Acer Aspire 3 A315 59 314F', 'acer-aspire-3-a315-59-314f', 13490000, 9400000, 10, 'Bạc', 'i3 1215U/8GB/256GB/Win11', 0, 1, 'Nếu bạn đang tìm kiếm một chiếc laptop học tập - văn phòng thì laptop Acer Aspire 3 A315 59 314F i3 (NX.K6TSV.002) sẽ là sự lựa chọn lý tưởng đáp ứng đủ nhu cầu với bộ vi xử lý Intel thế hệ thứ 12 mạnh mẽ, thiết kế linh động dễ dàng mang theo mọi lúc mọi nơi.\r\nCấu hình mạnh mẽ cân mọi tác vụ học tập, văn phòng\r\nLaptop Acer Aspire được trang bị bộ vi xử lý Intel Core i3 1215U cùng card tích hợp Intel UHD đủ tốt để đáp ứng đủ mọi nhu cầu của một người dùng là sinh viên như mình, đo đạc hiệu năng bằng công cụ Cinebench R23 được 6382 điểm đa nhân và 1633 điểm đơn nhân, con số ấn tượng đối với một bộ vi xử lý thuộc dòng U tiết kiệm điện năng.', '2024-01-04 16:29:55', '2024-01-04 16:29:55'),
(42, 1, 3, 'Laptop Acer Aspire 7 Gaming A715 76G 59MW', 'acer-aspire-7-gaming-a715-76g-59mw', 21490000, 19400000, 15, 'Đen', 'i5 12450H/8GB/512GB/4GB RTX2050/144Hz/Win11', 0, 1, 'Laptop Acer Aspire 7 Gaming A715 76G 59MW i5 12450H (NH.QMYSV.001) được trang bị hiệu năng mạnh mẽ từ chip Intel dòng H, card đồ hoạ rời, thiết kế tân tiến cùng một mức giá phải chăng. Mẫu laptop gaming đến từ nhà Acer này chắc chắn sẽ làm hài lòng các anh em game thủ với những trải nghiệm tuyệt vời, chân thực qua những đấu trường ảo.\r\nBắt kịp xu hướng với thiết kế thời thượng, tinh giản \r\nThiết kế của những chiếc laptop dòng Aspire Gaming từ nhà Acer luôn được thể hiện được những nét hiện đại, tinh giản mà mình chưa bắt gặp ở bất kì mẫu laptop gaming nào khác trên thị trường. Vào năm 2023 này, Acer Aspire 7 Gaming đã được cải tiến đôi chút về mặt thiết kế, tuy khá nhỏ thôi nhưng vẫn để lại những nét thẩm mỹ khá gây ấn tượng cho mình. Máy được hoàn thiện với lớp vỏ nhựa cao cấp, các chi tiết và bề mặt được gia công khá kĩ nên trong quá trình sử dụng mình hoàn toàn không nhận thấy có dấu hiệu bị ọp ẹp, gây mất cân bằng.', '2024-01-04 16:33:15', '2024-01-04 16:33:15'),
(43, 1, 3, 'Laptop Acer Aspire 3 A315 58 589K', 'acer-aspire-3-a315-58-589k', 13990000, 11490000, 10, 'Vàng', 'i5 1135G7/8GB/256GB/Win11', 0, 0, 'Laptop Acer Aspire 3 A315 58 589K i5 1135G7 (NX.AM0SV.008) thuộc dòng laptop học tập - văn phòng tầm trung được Acer giới thiệu tới người dùng với thông số cấu hình ổn định, ngoại hình ưa nhìn và đặc biệt có mức giá phải chăng.\r\n• Laptop Acer Aspire được trang bị bộ vi xử lý Intel Core i5 1135G7 thế hệ 11 với tốc độ cơ bản 2.4 GHz và card tích hợp Intel Iris Xe Graphics. Nhờ đó máy có khả năng xử lý tốt các tác vụ văn phòng như Word, Excel, PowerPoint và các công việc liên quan đến đồ họa ở mức cơ bản.\r\n\r\n• Với RAM 8 GB và ổ cứng SSD dung lượng 256 GB, Acer Aspire 3 cho phép người dùng thực hiện nhiều tác vụ đa nhiệm cùng lúc một cách mượt mà và không bị giật lag. Hơn nữa ổ SSD còn giúp cho máy khởi động, sao chép dữ liệu nhanh hơn đáng kể so với ổ HDD.\r\n\r\n• Laptop Acer được trang bị màn hình kích thước 15.6 inch với độ phân giải Full HD (1920 x 1080), đi kèm công nghệ Acer ComfyView kết hợp cùng tấm nền LED Backlit tạo trải nghiệm tuyệt vời khi xem phim và làm việc văn phòng, với độ sáng và chất lượng hình ảnh được tối ưu hóa để giảm mỏi mắt, đồng thời đem lại sự thoải mái cho người dùng.\r\n\r\n• Tận hưởng không gian âm nhạc sống động hơn với công nghệ Stereo speakers, đem đến trải nghiệm âm thanh tuyệt vời cho những người yêu thích nghe nhạc hoặc xem phim trên laptop.\r\n\r\n• Acer Aspire 3 có thiết kế vỏ nhựa cứng cáp với tông màu vàng đẹp mắt, cùng với khối lượng 1.7 kg giúp bạn dễ dàng di chuyển khi mang theo máy bên mình.\r\n\r\n• Laptop được trang bị đầy đủ các cổng giao tiếp như USB 2.0, USB 3.0, HDMI, Jack tai nghe 3.5 mm và cổng LAN, giúp bạn kết nối và truyền dữ liệu một cách dễ dàng với các thiết bị khác.', '2024-01-04 16:37:15', '2024-01-04 16:37:15'),
(44, 3, 2, 'Asus ExpertCenter AIO A5402WVAK', 'asus-expertcenter-aio-a5402wvak', 24999000, 22900000, 10, 'Đen', 'i5 1340P/8GB/512GB/23.8\"FullHD/Bàn phím/Chuột/Win11', 0, 1, 'Máy tính để bàn Asus ExpertCenter AIO A5402WVAK i5 1340P (BA016W) với thiết kế hiện đại, sang trọng trong mọi không gian cùng với hiệu năng mạnh mẽ sẽ là giải pháp tuyệt vời cho đối tượng người dùng cá nhân hay doanh nghiệp đang tìm kiếm công cụ đáp ứng mọi công việc nhanh chóng, hiệu quả.\r\nVẻ ngoài hiện đại, phù hợp mọi không gian\r\nNhững mẫu máy tính để bàn luôn là giải pháp hiệu quả đối với công việc cho không chỉ các doanh nghiệp phục vụ nhu cầu văn phòng, đặt ở các quầy lễ tân, phòng họp,... mà còn là một công cụ sử dụng làm việc, học tập và giải trí tuyệt vời đối với người dùng cá nhân. Và đa dụng hơn nữa chúng ta có những dòng máy tính để bàn AIO ( All in one ) với tất cả từ hiệu năng, màn hình, RAM hay bộ nhớ đều được gói gọn chỉ trong 1 chiếc máy, đem đến tính thẩm mỹ và tiết kiệm không gian rất cao.', '2024-01-04 16:40:35', '2024-01-04 16:40:35'),
(45, 3, 19, 'HP AIO 22 dd2002d', 'hp-aio-22-dd2002d', 19990000, 18349000, 15, 'Trắng', 'i5 1235U/8GB/512GB/21.5\"FullHD/Bàn phím/Chuột/Win11', 0, 1, 'Nếu bạn đang cần một trợ thủ đắc lực sở hữu đầy đủ mọi ưu điểm từ cấu hình mạnh mẽ đến màn hình lớn, ngoại hình đẹp mắt, máy tính để bàn HP AIO 22 dd2002d i5 (6K7G1PA) sẽ là sản phẩm All-in-one mà bạn không nên bỏ lỡ, cực kỳ phù hợp cho mọi đối tượng là sinh viên, dân văn phòng hay thậm chí là người dùng sáng tạo.\r\n• Mang trên mình bộ vi xử lý Intel Core i5 1235U mạnh mẽ kết hợp với card Intel UHD Graphics giúp bạn vận hành tốt mọi tác vụ học tập - văn phòng từ cơ bản đến nâng cao hay chỉnh sửa hình ảnh, giải trí với các tựa game nhẹ nhàng. Nếu muốn xử lý khối lượng công việc nhiều hơn, bạn hoàn toàn có thể lắp thêm thanh RAM khác và kích hoạt Dual-Channel để nâng cấp lên card Iris Xe.\r\n\r\n• Bộ nhớ RAM 8 GB cho phép người dùng xử lý công việc trên nhiều cửa sổ ứng dụng cùng lúc nhưng vẫn đảm bảo trơn tru, hạn chế tình trạng giật lag. Ổ cứng 512 GB SSD mang đến không gian lưu trữ ổn định khi tải các tệp tài liệu, học tập cần thiết đồng thời gia tăng tốc độ khởi động máy chỉ trong vài giây. \r\n\r\n• Làm việc tốt hơn trên kích thước màn hình 21.5 inch cho phép bạn quan sát bao quát nội dung được hiển thị trên máy, độ sáng 250 nits cùng độ phân giải Full HD (1920 x 1080) cung cấp chất lượng khung ảnh sắc nét ở nhiều điều kiện ánh sáng khác nhau với gam màu sắc chuẩn xác trên từng chi tiết. Thời gian làm việc trên máy lâu dài nhưng vẫn bảo vệ tốt cho thị lực của người dùng nhờ màn hình Anti Glare, giảm thiểu độ chói sáng ở những nơi ánh sáng cao.\r\n\r\n• Công nghệ High Definition (HD) Audio cho chất âm to rõ, chân thực trên từng thước phim hay bản nhạc.\r\n\r\n• Máy tính để bàn học tập được bao bọc bởi chiếc áo màu trắng tinh khôi, toát lên vẻ đẹp tinh tế và sang trọng khi đặt ở mọi vị trí khác nhau, cân nặng 5.7 kg dễ dàng bưng bê và lắp đặt cố định ở không gian văn phòng, bàn lễ tân nhà hàng, khách sạn,...\r\n\r\n• Tính năng mở khóa bằng khuôn mặt tích hợp với Camera IR hồng ngoại hiện đại được trang bị trên chiếc máy tính để bàn này giúp bạn mở khóa nhanh chóng và an toàn hơn rất nhiều so với các kiểu bảo mật truyền thống dù ở những nơi có điều kiện ánh sáng thấp.\r\n\r\n• Mặt sau máy tính để bàn HP được trang bị đa dạng các cổng kết nối như USB 2.0, Jack 3.5 mm, LAN (RJ45), HDMI và USB 3.2 cho khả năng kết xuất và truyền tải dữ liệu đến các thiết bị ngoại vi nhanh chóng, dễ dàng hơn.', '2024-01-04 16:44:49', '2024-01-04 16:44:49'),
(46, 3, 1, 'HP AIO ProOne 240 G9', 'hp-aio-proone-240-g9', 16100000, 14990000, 15, 'Đen', 'i3 1215U/8GB/512GB/23.8\"FullHD/Bàn phím/Chuột/Win11', 0, 0, 'Máy tính để bàn HP AIO ProOne 240 G9 i3 1215U 23.8 inch (6M3T0PA) sở hữu thiết kế đẹp mắt với lớp vỏ màu đen tinh tế, mang trong mình sức mạnh của bộ vi xử lý Intel Core i3 thế hệ 12 và màn hình 23.8 inch độ phân giải Full HD hoàn hảo để học tập, làm việc.\r\n• Máy tính để bàn HP được trang bị bộ vi xử lý Intel Core i3 1215U cùng card đồ họa tích hợp Intel UHD hỗ trợ bạn xử lý mượt mà các tác vụ văn phòng như Word, Excel, PowerPoint,... cũng như tạo ra các sản phẩm về hình ảnh, video,... trên những ứng dụng của nhà Adobe.\r\n\r\n• Máy tính để bàn RAM 8 GB với tốc độ Bus RAM 3200 MHz cho phép bạn mở cùng lúc nhiều ứng dụng hay các tab làm việc và chuyển đổi qua lại mà không lo xảy ra tình trạng giật, lag. Máy hỗ trợ nâng cấp RAM tối đa lên đến 16 GB đáp ứng cho nhu cầu công việc của bạn được tốt hơn.\r\n\r\n• Ổ cứng 512 GB SSD mở ra không gian lưu trữ rộng lớn để bạn tải về hàng loạt những ứng dụng và dữ liệu mình mong muốn, đồng thời tối ưu thời gian mở và vận hành một cách nhanh chóng. Máy tính để bàn hỗ trợ khe cắm HDD SATA3 2.5 inch để bạn thoải mái lưu trữ các tệp tài liệu học tập.\r\n\r\n• Trải nghiệm sắc nét từng khung hình với màn hình 23.8 inch độ phân giải Full HD (1920 x 1080). Không gian màn ảnh trở nên rộng rãi hơn từ nhiều góc nhìn nhờ tấm nền IPS và công nghệ chống chói Anti Glare giúp bạn có thể sử dụng ở cả những văn phòng có ánh đèn sáng cao. \r\n\r\n• Công nghệ High Definition (HD) Audio tích hợp trong chiếc máy tính để bàn học tập - văn phòng này cho bạn đắm chìm trong thế giới thanh âm đầy thư giãn.\r\n\r\n• Lớp vỏ màu đen sang trọng đi kèm chuột và bàn phím có cùng tông màu giúp bạn dễ dàng bố trí ở mọi không gian làm việc khác nhau. \r\n\r\n• Webcam 5 MP đảm bảo luôn giữ cho hình ảnh của bạn rõ nét khi tham gia những lớp học trực tuyến trên các nền tảng như Zoom, Meet, Teams,...\r\n\r\n• Kết nối dễ dàng với các thiết bị ngoại vi nhờ hệ thống cổng đa dạng như: USB 2.0, Jack 3.5 mm, LAN (RJ45), HDMI và USB 3.2.', '2024-01-04 16:48:41', '2024-01-04 16:48:41'),
(47, 3, 4, 'iMac 24 inch 2023 4.5K', 'imac-24-inch-2023-4-5k', 39400000, 36900000, 10, 'Trắng', 'M3 8-core CPU/8GB/256GB/8-core GPU', 0, 1, 'Mẫu iMac 24 inch M3 2023 trong sự kiện ra mắt vào Quý bốn năm 2023, được thừa hưởng mẫu thiết kế cuốn hút, màn hình 4.5K Retina tuyệt đẹp cũng như lột xác hoàn toàn về hiệu năng với con chip M3 đáp ứng mọi nhu cầu từ văn phòng, thực hiện thiết kế đồ hoạ và video chuyên nghiệp.\r\nThiết kế thời thượng, thể hiện trọn vẹn đẳng cấp\r\nKhông quá thay đổi về mặt thiết kế trong phiên bản ra mắt mới nhưng nhìn chung mẫu iMac vẫn mang đến sự sang trọng, tinh tế luôn là sự lựa chọn không tồi để nâng cấp không gian làm việc và đặc biệt dành cho những người thích sự tối giản nhưng vẫn toát lên dáng vẻ sang trọng.', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(48, 3, 4, 'Mac mini M2 Pro 2023', 'mac-mini-m2-pro-2023', 31999000, 29990000, 10, 'Trắng', '10-core CPU/16GB/512GB/16 core GPU', 0, 1, 'Các sản phẩm của nhà Apple luôn được biết đến với sự tiên phong về mặt công nghệ và đẳng cấp ở lối thiết kế. Đến với chiếc Mac mini M2 Pro 2023 16-core GPU này cũng vậy, Apple sẽ cho người dùng thấy một chiếc máy để bàn có vẻ ngoài cực nhỏ gọn nhưng bên trong là khả năng xử lý đồ hoạ và đa nhiệm đỉnh cao với chip Apple M2 Pro.\r\nHiệu năng cực mạnh mẽ, xử lý mượt mà các tác vụ nặng\r\nChip M2 Pro là phiên bản kế nhiệm của con chip M2, bộ xử lý lớp 5 nanomet thế hệ mới này lần đầu được giới thiệu ở các dòng mac 2023. M2 Pro mở rộng kiến ​​trúc của M2 để cung cấp CPU lên đến 10 nhân cho tốc độ băng thông đạt tới 200 GB/giây, truy xuất và truyền tải dữ liệu nhanh chóng, nâng cao hiệu suất làm việc cho người dùng.', '2024-01-04 16:55:56', '2024-01-04 16:55:56'),
(49, 4, 22, 'Bàn Phím Cơ Có Dây Gaming Rapoo V500alloy', 'rapoo-v500-alloy', 550000, 450000, 10, 'Đen', '*', 0, 0, 'Đặc điểm nổi bật\r\n\r\nThiết kế kiểu Tenkeyless nhỏ gọn, cá tính, dễ bố trí.\r\nBàn phím cơ sử dụng 87 nút bấm cơ bản, Switch Rapoo Blue bền tới 60 triệu lần nhấn.\r\nSử dụng dây cổng USB kết nối thiết bị thuận tiện.\r\nTương thích với hệ điều hành Windows và macOS.\r\nThông tin sản phẩm\r\nBàn phím gaming kiểu Tenkeyless với 87 phím cơ bản độ nhạy cao, bền bỉ\r\nRapoo V500alloy trang bị 87 phím cơ bản đủ đáp ứng mọi nhu cầu trên 1 bàn phím làm việc, chơi game thông thường. Có 2 lựa chọn màu chữ trên keycap cho người dùng: Đỏ hoặc Vàng (giao màu ngẫu nhiên).', '2024-01-04 17:00:47', '2024-01-04 17:00:47'),
(50, 4, 20, 'Bàn Phím Cơ Dareu EK75 Pro', 'dareu-ek75-pro', 1390000, 1150000, 5, 'Đen', 'Bluetooth', 0, 0, 'Bàn Phím Cơ Bluetooth Dareu EK75 Pro sở hữu đầy đủ đặc điểm cần có của một mẫu bàn phím cơ cao cấp, đèn LED RGB đa sắc màu giúp không gian làm việc/giải trí nổi bật trong màn đêm, trang bị switch độc quyền cho hành trình phím sâu, không chiếm quá nhiều diện tích trên bàn làm việc hay balo.\r\n• Bàn phím với thiết kế bố cục 75% đem đến diện mạo nhỏ gọn, tiết kiệm không gian, sử dụng gam màu sang trọng, nâng cấp góc làm việc của bạn.\r\n\r\n• Bàn phím Dareu có 12 chế độ đèn nền cùng với 5 chế độ chiếu sáng trên dải đèn bên để người dùng thoải mái lựa chọn, độ sáng và tốc độ chiếu khác nhau mang đến cho game thủ không gian chơi game hoàn hảo.\r\n\r\n• Bàn phím không dây dễ dàng kết nối bằng 3 cách: dây cắm USB, đầu thu USB hoặc Bluetooth giúp hỗ trợ nhiều loại thiết bị điện tử phổ biến sử dụng hệ điều hành Windows và macOS, linh hoạt lựa chọn cách kết nối phù hợp.\r\n\r\n• Sử dụng switch độc quyền từ nhà Dareu, bàn phím mang lại hành trình phím sâu, cảm giác khi gõ cực kỳ đã tay, độ phản hồi nhanh chóng giúp bạn hoàn thành các tác vụ chuyên nghiệp hơn.', '2024-01-04 17:04:19', '2024-01-04 17:04:19'),
(51, 4, 22, 'Chuột Không dây Rapoo B2', 'rapoo-b2', 180000, 150000, 12, 'Đen', '*', 0, 0, 'Chuột không dây Rapoo B2 sở hữu kiểu dáng tối giản, thiết kế gọn chắc, màu sắc thời thượng, độ nhạy cao, mang đến cho người dùng những trải nghiệm tuyệt vời nhất.\r\n• Thiết kế chắc chắn, khối lượng gọn nhẹ chỉ với 60 g dễ dàng mang theo mọi lúc mọi nơi. Ngoài ra, chất liệu sản xuất chuột bền bỉ, nâng cao trải nghiệm trong quá trình sử dụng.\r\n\r\n• Chuột tương thích với hệ điều hành Windows, hỗ trợ kết nối dễ dàng và tiện lợi với máy tính qua đầu thu USB.\r\n\r\n• Độ phân giải chuột lên đến 1200 DPI cho khả năng phản hồi nhanh nhạy, xử lý tốt các tác vụ văn phòng cơ bản của người dùng.\r\n\r\n• Phím nổi có độ nảy cao, con lăn mềm mại, di chuột nhẹ nhàng và chính xác.\r\n\r\n• Chuột Rapoo sử dụng pin AA thông dụng, dễ dàng thay thế khi hết pin.', '2024-01-04 17:06:45', '2024-01-04 17:06:45');
INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `cost`, `sale_cost`, `quantity`, `color`, `option`, `status`, `trending`, `description`, `created_at`, `updated_at`) VALUES
(52, 4, 20, 'Chuột Không dây DareU LM106G', 'dareu-lm106g', 150000, 100000, 12, 'Trắng', '*', 0, 0, 'Thông tin sản phẩm\r\nChuột Không dây DareU LM106G gọn nhẹ, dễ sử dụng, kết nối nhanh chóng, tương thích nhiều thiết bị.\r\n• Đường nét mềm mại, độ hoàn thiện cao, chuột vừa vặn và êm tay khi sử dụng.\r\n\r\n• Màu sắc thông dụng, phù hợp với mọi người dùng.\r\n\r\n• Chuột DareU được thiết kế đối xứng 2 bên, tay trái hay tay phải sử dụng đều thuận.\r\n\r\n• Phím bấm có độ nảy tốt, con lăn chuột mềm mại, thoải mái thực hiện các thao tác di chuột trên mặt phẳng.\r\n\r\n• Kết nối chuột và thiết bị sử dụng hệ điều hành Windows, macOS nhanh chóng bằng đầu thu USB Receiver.\r\n\r\n• Sản phẩm tương thích với các dòng máy sử dụng hệ điều hành Windows, macOS.', '2024-01-04 17:09:15', '2024-01-04 17:09:15'),
(53, 4, 20, 'Chuột Không dây DareU LM106G', 'dareu-lm106g-den', 150000, 100000, 10, 'Đen', '*', 0, 0, 'Thông tin sản phẩm\r\nChuột Không dây DareU LM106G gọn nhẹ, dễ sử dụng, kết nối nhanh chóng, tương thích nhiều thiết bị.\r\n• Đường nét mềm mại, độ hoàn thiện cao, chuột vừa vặn và êm tay khi sử dụng.\r\n\r\n• Màu sắc thông dụng, phù hợp với mọi người dùng.\r\n\r\n• Chuột DareU được thiết kế đối xứng 2 bên, tay trái hay tay phải sử dụng đều thuận.\r\n\r\n• Phím bấm có độ nảy tốt, con lăn chuột mềm mại, thoải mái thực hiện các thao tác di chuột trên mặt phẳng.\r\n\r\n• Kết nối chuột và thiết bị sử dụng hệ điều hành Windows, macOS nhanh chóng bằng đầu thu USB Receiver.\r\n\r\n• Sản phẩm tương thích với các dòng máy sử dụng hệ điều hành Windows, macOS.', '2024-01-04 17:11:27', '2024-01-04 17:11:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(49, 25, 'uploads/products/17034117741.jpg', '2023-12-24 09:56:14', '2023-12-24 09:56:14'),
(50, 25, 'uploads/products/17034117742.jpg', '2023-12-24 09:56:14', '2023-12-24 09:56:14'),
(51, 25, 'uploads/products/17034117743.jpg', '2023-12-24 09:56:14', '2023-12-24 09:56:14'),
(52, 25, 'uploads/products/17034117744.jpg', '2023-12-24 09:56:14', '2023-12-24 09:56:14'),
(53, 25, 'uploads/products/17034117745.jpg', '2023-12-24 09:56:14', '2023-12-24 09:56:14'),
(54, 25, 'uploads/products/17034117746.jpg', '2023-12-24 09:56:14', '2023-12-24 09:56:14'),
(55, 25, 'uploads/products/17034117747.jpg', '2023-12-24 09:56:14', '2023-12-24 09:56:14'),
(56, 23, 'uploads/products/17034118801.jpg', '2023-12-24 09:58:00', '2023-12-24 09:58:00'),
(57, 23, 'uploads/products/17034118802.jpg', '2023-12-24 09:58:00', '2023-12-24 09:58:00'),
(58, 23, 'uploads/products/17034118803.jpg', '2023-12-24 09:58:00', '2023-12-24 09:58:00'),
(59, 23, 'uploads/products/17034118804.jpg', '2023-12-24 09:58:00', '2023-12-24 09:58:00'),
(60, 23, 'uploads/products/17034118805.jpg', '2023-12-24 09:58:00', '2023-12-24 09:58:00'),
(61, 23, 'uploads/products/17034118806.jpg', '2023-12-24 09:58:00', '2023-12-24 09:58:00'),
(62, 23, 'uploads/products/17034118807.jpg', '2023-12-24 09:58:00', '2023-12-24 09:58:00'),
(63, 24, 'uploads/products/17034120811.jpg', '2023-12-24 10:01:21', '2023-12-24 10:01:21'),
(64, 24, 'uploads/products/17034120812.jpg', '2023-12-24 10:01:21', '2023-12-24 10:01:21'),
(65, 24, 'uploads/products/17034120813.jpg', '2023-12-24 10:01:21', '2023-12-24 10:01:21'),
(66, 24, 'uploads/products/17034120814.jpg', '2023-12-24 10:01:21', '2023-12-24 10:01:21'),
(67, 24, 'uploads/products/17034120815.jpg', '2023-12-24 10:01:21', '2023-12-24 10:01:21'),
(68, 24, 'uploads/products/17034120816.jpg', '2023-12-24 10:01:21', '2023-12-24 10:01:21'),
(69, 24, 'uploads/products/17034120817.jpg', '2023-12-24 10:01:21', '2023-12-24 10:01:21'),
(70, 24, 'uploads/products/17034120818.jpg', '2023-12-24 10:01:21', '2023-12-24 10:01:21'),
(71, 26, 'uploads/products/17034123341.jpg', '2023-12-24 10:05:34', '2023-12-24 10:05:34'),
(72, 26, 'uploads/products/17034123342.jpg', '2023-12-24 10:05:34', '2023-12-24 10:05:34'),
(73, 26, 'uploads/products/17034123343.jpg', '2023-12-24 10:05:34', '2023-12-24 10:05:34'),
(74, 26, 'uploads/products/17034123344.jpg', '2023-12-24 10:05:34', '2023-12-24 10:05:34'),
(75, 26, 'uploads/products/17034123345.jpg', '2023-12-24 10:05:34', '2023-12-24 10:05:34'),
(76, 26, 'uploads/products/17034123346.jpg', '2023-12-24 10:05:34', '2023-12-24 10:05:34'),
(77, 26, 'uploads/products/17034123347.jpg', '2023-12-24 10:05:34', '2023-12-24 10:05:34'),
(78, 27, 'uploads/products/17034125881.png', '2023-12-24 10:09:48', '2023-12-24 10:09:48'),
(79, 27, 'uploads/products/17034125882.jpg', '2023-12-24 10:09:48', '2023-12-24 10:09:48'),
(80, 27, 'uploads/products/17034125883.jpg', '2023-12-24 10:09:48', '2023-12-24 10:09:48'),
(81, 27, 'uploads/products/17034125884.jpg', '2023-12-24 10:09:48', '2023-12-24 10:09:48'),
(82, 27, 'uploads/products/17034125885.jpg', '2023-12-24 10:09:48', '2023-12-24 10:09:48'),
(83, 27, 'uploads/products/17034125886.jpg', '2023-12-24 10:09:48', '2023-12-24 10:09:48'),
(84, 27, 'uploads/products/17034125887.jpg', '2023-12-24 10:09:48', '2023-12-24 10:09:48'),
(85, 28, 'uploads/products/17034129151.jpg', '2023-12-24 10:15:15', '2023-12-24 10:15:15'),
(86, 28, 'uploads/products/17034129152.jpg', '2023-12-24 10:15:15', '2023-12-24 10:15:15'),
(87, 28, 'uploads/products/17034129153.jpg', '2023-12-24 10:15:15', '2023-12-24 10:15:15'),
(88, 28, 'uploads/products/17034129154.jpg', '2023-12-24 10:15:15', '2023-12-24 10:15:15'),
(89, 28, 'uploads/products/17034129155.jpg', '2023-12-24 10:15:15', '2023-12-24 10:15:15'),
(90, 28, 'uploads/products/17034129156.jpg', '2023-12-24 10:15:15', '2023-12-24 10:15:15'),
(91, 28, 'uploads/products/17034129157.jpg', '2023-12-24 10:15:15', '2023-12-24 10:15:15'),
(92, 29, 'uploads/products/17034131721.jpg', '2023-12-24 10:19:32', '2023-12-24 10:19:32'),
(93, 29, 'uploads/products/17034131722.jpg', '2023-12-24 10:19:32', '2023-12-24 10:19:32'),
(94, 29, 'uploads/products/17034131723.jpg', '2023-12-24 10:19:32', '2023-12-24 10:19:32'),
(95, 29, 'uploads/products/17034131724.jpg', '2023-12-24 10:19:32', '2023-12-24 10:19:32'),
(96, 29, 'uploads/products/17034131725.jpg', '2023-12-24 10:19:32', '2023-12-24 10:19:32'),
(97, 29, 'uploads/products/17034131726.jpg', '2023-12-24 10:19:32', '2023-12-24 10:19:32'),
(98, 29, 'uploads/products/17034131727.jpg', '2023-12-24 10:19:32', '2023-12-24 10:19:32'),
(99, 29, 'uploads/products/17034131728.jpg', '2023-12-24 10:19:32', '2023-12-24 10:19:32'),
(100, 30, 'uploads/products/17034134061.jpg', '2023-12-24 10:23:26', '2023-12-24 10:23:26'),
(101, 30, 'uploads/products/17034134062.jpg', '2023-12-24 10:23:26', '2023-12-24 10:23:26'),
(102, 30, 'uploads/products/17034134063.jpg', '2023-12-24 10:23:26', '2023-12-24 10:23:26'),
(103, 30, 'uploads/products/17034134064.jpg', '2023-12-24 10:23:26', '2023-12-24 10:23:26'),
(104, 30, 'uploads/products/17034134065.jpg', '2023-12-24 10:23:26', '2023-12-24 10:23:26'),
(105, 30, 'uploads/products/17034134066.jpg', '2023-12-24 10:23:26', '2023-12-24 10:23:26'),
(106, 30, 'uploads/products/17034134067.jpg', '2023-12-24 10:23:26', '2023-12-24 10:23:26'),
(107, 30, 'uploads/products/17034134068.jpg', '2023-12-24 10:23:26', '2023-12-24 10:23:26'),
(108, 31, 'uploads/products/17034138681.jpg', '2023-12-24 10:31:08', '2023-12-24 10:31:08'),
(109, 31, 'uploads/products/17034138682.jpg', '2023-12-24 10:31:08', '2023-12-24 10:31:08'),
(110, 31, 'uploads/products/17034138683.jpg', '2023-12-24 10:31:08', '2023-12-24 10:31:08'),
(111, 31, 'uploads/products/17034138684.jpg', '2023-12-24 10:31:08', '2023-12-24 10:31:08'),
(112, 31, 'uploads/products/17034138685.jpg', '2023-12-24 10:31:08', '2023-12-24 10:31:08'),
(113, 31, 'uploads/products/17034138686.jpg', '2023-12-24 10:31:08', '2023-12-24 10:31:08'),
(114, 31, 'uploads/products/17034138687.jpg', '2023-12-24 10:31:08', '2023-12-24 10:31:08'),
(115, 31, 'uploads/products/17034138688.jpg', '2023-12-24 10:31:08', '2023-12-24 10:31:08'),
(116, 32, 'uploads/products/17034141491.jpg', '2023-12-24 10:35:49', '2023-12-24 10:35:49'),
(117, 32, 'uploads/products/17034141492.jpg', '2023-12-24 10:35:49', '2023-12-24 10:35:49'),
(118, 32, 'uploads/products/17034141493.jpg', '2023-12-24 10:35:49', '2023-12-24 10:35:49'),
(119, 32, 'uploads/products/17034141494.jpg', '2023-12-24 10:35:49', '2023-12-24 10:35:49'),
(120, 32, 'uploads/products/17034141495.jpg', '2023-12-24 10:35:49', '2023-12-24 10:35:49'),
(121, 32, 'uploads/products/17034141496.jpg', '2023-12-24 10:35:49', '2023-12-24 10:35:49'),
(122, 32, 'uploads/products/17034141497.jpg', '2023-12-24 10:35:49', '2023-12-24 10:35:49'),
(123, 32, 'uploads/products/17034141498.jpg', '2023-12-24 10:35:49', '2023-12-24 10:35:49'),
(124, 32, 'uploads/products/17034141499.jpg', '2023-12-24 10:35:49', '2023-12-24 10:35:49'),
(125, 33, 'uploads/products/17034274261.jpg', '2023-12-24 14:17:06', '2023-12-24 14:17:06'),
(126, 33, 'uploads/products/17034274262.jpg', '2023-12-24 14:17:06', '2023-12-24 14:17:06'),
(127, 33, 'uploads/products/17034274263.jpg', '2023-12-24 14:17:06', '2023-12-24 14:17:06'),
(128, 33, 'uploads/products/17034274264.jpg', '2023-12-24 14:17:06', '2023-12-24 14:17:06'),
(129, 33, 'uploads/products/17034274265.jpg', '2023-12-24 14:17:06', '2023-12-24 14:17:06'),
(130, 33, 'uploads/products/17034274266.jpg', '2023-12-24 14:17:06', '2023-12-24 14:17:06'),
(131, 33, 'uploads/products/17034274267.jpg', '2023-12-24 14:17:06', '2023-12-24 14:17:06'),
(132, 33, 'uploads/products/17034274268.jpg', '2023-12-24 14:17:06', '2023-12-24 14:17:06'),
(133, 33, 'uploads/products/17034274269.jpg', '2023-12-24 14:17:06', '2023-12-24 14:17:06'),
(134, 33, 'uploads/products/170342742710.jpg', '2023-12-24 14:17:07', '2023-12-24 14:17:07'),
(135, 34, 'uploads/products/17034278401.jpg', '2023-12-24 14:24:00', '2023-12-24 14:24:00'),
(136, 34, 'uploads/products/17034278402.jpg', '2023-12-24 14:24:00', '2023-12-24 14:24:00'),
(137, 34, 'uploads/products/17034278403.jpg', '2023-12-24 14:24:00', '2023-12-24 14:24:00'),
(138, 34, 'uploads/products/17034278404.jpg', '2023-12-24 14:24:00', '2023-12-24 14:24:00'),
(139, 34, 'uploads/products/17034278405.jpg', '2023-12-24 14:24:00', '2023-12-24 14:24:00'),
(140, 34, 'uploads/products/17034278406.jpg', '2023-12-24 14:24:00', '2023-12-24 14:24:00'),
(141, 34, 'uploads/products/17034278407.jpg', '2023-12-24 14:24:00', '2023-12-24 14:24:00'),
(142, 34, 'uploads/products/17034278408.jpg', '2023-12-24 14:24:00', '2023-12-24 14:24:00'),
(143, 34, 'uploads/products/17034278409.jpg', '2023-12-24 14:24:00', '2023-12-24 14:24:00'),
(144, 35, 'uploads/products/17034281091.jpg', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(145, 35, 'uploads/products/17034281092.jpg', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(146, 35, 'uploads/products/17034281093.jpg', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(147, 35, 'uploads/products/17034281094.jpg', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(148, 35, 'uploads/products/17034281095.jpg', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(149, 35, 'uploads/products/17034281096.jpg', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(150, 35, 'uploads/products/17034281097.jpg', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(151, 35, 'uploads/products/17034281098.jpg', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(152, 35, 'uploads/products/17034281099.jpg', '2023-12-24 14:28:29', '2023-12-24 14:28:29'),
(182, 36, 'uploads/products/17034292611.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(183, 36, 'uploads/products/17034292612.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(184, 36, 'uploads/products/17034292613.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(185, 36, 'uploads/products/17034292614.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(186, 36, 'uploads/products/17034292615.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(187, 36, 'uploads/products/17034292616.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(188, 36, 'uploads/products/17034292617.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(189, 36, 'uploads/products/17034292618.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(190, 36, 'uploads/products/17034292619.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(191, 36, 'uploads/products/170342926110.jpg', '2023-12-24 14:47:41', '2023-12-24 14:47:41'),
(192, 39, 'uploads/products/17034298061.jpg', '2023-12-24 14:56:46', '2023-12-24 14:56:46'),
(193, 39, 'uploads/products/17034298062.jpg', '2023-12-24 14:56:46', '2023-12-24 14:56:46'),
(194, 39, 'uploads/products/17034298063.jpg', '2023-12-24 14:56:47', '2023-12-24 14:56:47'),
(195, 39, 'uploads/products/17034298074.jpg', '2023-12-24 14:56:47', '2023-12-24 14:56:47'),
(196, 39, 'uploads/products/17034298075.jpg', '2023-12-24 14:56:47', '2023-12-24 14:56:47'),
(197, 39, 'uploads/products/17034298076.jpg', '2023-12-24 14:56:47', '2023-12-24 14:56:47'),
(198, 39, 'uploads/products/17034298077.jpg', '2023-12-24 14:56:47', '2023-12-24 14:56:47'),
(199, 40, 'uploads/products/17034303331.jpeg', '2023-12-24 15:05:33', '2023-12-24 15:05:33'),
(200, 40, 'uploads/products/17034303332.jpg', '2023-12-24 15:05:33', '2023-12-24 15:05:33'),
(201, 40, 'uploads/products/17034303333.jpg', '2023-12-24 15:05:33', '2023-12-24 15:05:33'),
(202, 40, 'uploads/products/17034303334.jpg', '2023-12-24 15:05:33', '2023-12-24 15:05:33'),
(203, 40, 'uploads/products/17034303335.jpg', '2023-12-24 15:05:33', '2023-12-24 15:05:33'),
(204, 40, 'uploads/products/17034303336.jpg', '2023-12-24 15:05:33', '2023-12-24 15:05:33'),
(205, 40, 'uploads/products/17034303337.jpg', '2023-12-24 15:05:33', '2023-12-24 15:05:33'),
(206, 40, 'uploads/products/17034303338.jpg', '2023-12-24 15:05:33', '2023-12-24 15:05:33'),
(207, 41, 'uploads/products/17043857951.jpg', '2024-01-04 16:29:55', '2024-01-04 16:29:55'),
(208, 41, 'uploads/products/17043857952.jpg', '2024-01-04 16:29:55', '2024-01-04 16:29:55'),
(209, 41, 'uploads/products/17043857953.jpg', '2024-01-04 16:29:55', '2024-01-04 16:29:55'),
(210, 41, 'uploads/products/17043857954.jpg', '2024-01-04 16:29:55', '2024-01-04 16:29:55'),
(211, 41, 'uploads/products/17043857955.jpg', '2024-01-04 16:29:55', '2024-01-04 16:29:55'),
(212, 41, 'uploads/products/17043857956.jpg', '2024-01-04 16:29:55', '2024-01-04 16:29:55'),
(213, 41, 'uploads/products/17043857957.jpg', '2024-01-04 16:29:55', '2024-01-04 16:29:55'),
(214, 42, 'uploads/products/17043859951.jpg', '2024-01-04 16:33:15', '2024-01-04 16:33:15'),
(215, 42, 'uploads/products/17043859952.jpg', '2024-01-04 16:33:15', '2024-01-04 16:33:15'),
(216, 42, 'uploads/products/17043859953.jpg', '2024-01-04 16:33:15', '2024-01-04 16:33:15'),
(217, 42, 'uploads/products/17043859954.jpg', '2024-01-04 16:33:15', '2024-01-04 16:33:15'),
(218, 42, 'uploads/products/17043859955.jpg', '2024-01-04 16:33:15', '2024-01-04 16:33:15'),
(219, 42, 'uploads/products/17043859956.jpg', '2024-01-04 16:33:15', '2024-01-04 16:33:15'),
(220, 42, 'uploads/products/17043859957.jpg', '2024-01-04 16:33:15', '2024-01-04 16:33:15'),
(221, 43, 'uploads/products/17043862351.jpg', '2024-01-04 16:37:15', '2024-01-04 16:37:15'),
(222, 43, 'uploads/products/17043862352.jpg', '2024-01-04 16:37:15', '2024-01-04 16:37:15'),
(223, 43, 'uploads/products/17043862353.jpg', '2024-01-04 16:37:15', '2024-01-04 16:37:15'),
(224, 43, 'uploads/products/17043862354.jpg', '2024-01-04 16:37:15', '2024-01-04 16:37:15'),
(225, 43, 'uploads/products/17043862355.jpg', '2024-01-04 16:37:15', '2024-01-04 16:37:15'),
(226, 43, 'uploads/products/17043862356.jpg', '2024-01-04 16:37:15', '2024-01-04 16:37:15'),
(227, 43, 'uploads/products/17043862357.jpg', '2024-01-04 16:37:15', '2024-01-04 16:37:15'),
(228, 44, 'uploads/products/17043864351.jpg', '2024-01-04 16:40:35', '2024-01-04 16:40:35'),
(229, 44, 'uploads/products/17043864352.jpg', '2024-01-04 16:40:35', '2024-01-04 16:40:35'),
(230, 44, 'uploads/products/17043864353.jpg', '2024-01-04 16:40:35', '2024-01-04 16:40:35'),
(231, 44, 'uploads/products/17043864354.jpg', '2024-01-04 16:40:35', '2024-01-04 16:40:35'),
(232, 44, 'uploads/products/17043864355.jpg', '2024-01-04 16:40:35', '2024-01-04 16:40:35'),
(233, 44, 'uploads/products/17043864356.jpg', '2024-01-04 16:40:35', '2024-01-04 16:40:35'),
(234, 44, 'uploads/products/17043864357.jpg', '2024-01-04 16:40:35', '2024-01-04 16:40:35'),
(235, 44, 'uploads/products/17043864358.jpg', '2024-01-04 16:40:35', '2024-01-04 16:40:35'),
(236, 45, 'uploads/products/17043866891.jpg', '2024-01-04 16:44:49', '2024-01-04 16:44:49'),
(237, 45, 'uploads/products/17043866892.jpg', '2024-01-04 16:44:49', '2024-01-04 16:44:49'),
(238, 45, 'uploads/products/17043866893.jpg', '2024-01-04 16:44:49', '2024-01-04 16:44:49'),
(239, 45, 'uploads/products/17043866904.jpg', '2024-01-04 16:44:50', '2024-01-04 16:44:50'),
(240, 45, 'uploads/products/17043866905.jpg', '2024-01-04 16:44:50', '2024-01-04 16:44:50'),
(241, 45, 'uploads/products/17043866906.jpg', '2024-01-04 16:44:50', '2024-01-04 16:44:50'),
(242, 45, 'uploads/products/17043866907.jpg', '2024-01-04 16:44:50', '2024-01-04 16:44:50'),
(243, 45, 'uploads/products/17043866908.jpg', '2024-01-04 16:44:50', '2024-01-04 16:44:50'),
(244, 46, 'uploads/products/17043869211.jpg', '2024-01-04 16:48:41', '2024-01-04 16:48:41'),
(245, 46, 'uploads/products/17043869212.jpg', '2024-01-04 16:48:41', '2024-01-04 16:48:41'),
(246, 46, 'uploads/products/17043869213.jpg', '2024-01-04 16:48:41', '2024-01-04 16:48:41'),
(247, 46, 'uploads/products/17043869214.jpg', '2024-01-04 16:48:42', '2024-01-04 16:48:42'),
(248, 46, 'uploads/products/17043869225.jpg', '2024-01-04 16:48:42', '2024-01-04 16:48:42'),
(249, 46, 'uploads/products/17043869226.jpg', '2024-01-04 16:48:42', '2024-01-04 16:48:42'),
(250, 46, 'uploads/products/17043869227.jpg', '2024-01-04 16:48:42', '2024-01-04 16:48:42'),
(251, 46, 'uploads/products/17043869228.jpg', '2024-01-04 16:48:42', '2024-01-04 16:48:42'),
(252, 47, 'uploads/products/17043871201.jpg', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(253, 47, 'uploads/products/17043871202.jpg', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(254, 47, 'uploads/products/17043871203.jpg', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(255, 47, 'uploads/products/17043871204.jpg', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(256, 47, 'uploads/products/17043871205.jpg', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(257, 47, 'uploads/products/17043871206.jpg', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(258, 47, 'uploads/products/17043871207.jpg', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(259, 47, 'uploads/products/17043871208.png', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(260, 47, 'uploads/products/17043871209.png', '2024-01-04 16:52:00', '2024-01-04 16:52:00'),
(261, 48, 'uploads/products/17043873561.jpg', '2024-01-04 16:55:56', '2024-01-04 16:55:56'),
(262, 48, 'uploads/products/17043873562.jpg', '2024-01-04 16:55:56', '2024-01-04 16:55:56'),
(263, 48, 'uploads/products/17043873563.jpg', '2024-01-04 16:55:56', '2024-01-04 16:55:56'),
(264, 48, 'uploads/products/17043873564.jpg', '2024-01-04 16:55:56', '2024-01-04 16:55:56'),
(265, 48, 'uploads/products/17043873565.jpg', '2024-01-04 16:55:56', '2024-01-04 16:55:56'),
(266, 48, 'uploads/products/17043873566.jpg', '2024-01-04 16:55:56', '2024-01-04 16:55:56'),
(267, 49, 'uploads/products/17043876471.jpeg', '2024-01-04 17:00:47', '2024-01-04 17:00:47'),
(268, 49, 'uploads/products/17043876472.jpg', '2024-01-04 17:00:47', '2024-01-04 17:00:47'),
(269, 49, 'uploads/products/17043876473.jpg', '2024-01-04 17:00:47', '2024-01-04 17:00:47'),
(270, 49, 'uploads/products/17043876474.jpg', '2024-01-04 17:00:47', '2024-01-04 17:00:47'),
(271, 49, 'uploads/products/17043876475.jpg', '2024-01-04 17:00:47', '2024-01-04 17:00:47'),
(272, 49, 'uploads/products/17043876476.jpg', '2024-01-04 17:00:47', '2024-01-04 17:00:47'),
(273, 50, 'uploads/products/17043878591.jpg', '2024-01-04 17:04:19', '2024-01-04 17:04:19'),
(274, 50, 'uploads/products/17043878592.jpg', '2024-01-04 17:04:19', '2024-01-04 17:04:19'),
(275, 50, 'uploads/products/17043878593.jpg', '2024-01-04 17:04:19', '2024-01-04 17:04:19'),
(276, 50, 'uploads/products/17043878594.jpg', '2024-01-04 17:04:19', '2024-01-04 17:04:19'),
(277, 50, 'uploads/products/17043878595.jpg', '2024-01-04 17:04:19', '2024-01-04 17:04:19'),
(278, 50, 'uploads/products/17043878596.jpg', '2024-01-04 17:04:19', '2024-01-04 17:04:19'),
(279, 51, 'uploads/products/17043880051.jpg', '2024-01-04 17:06:45', '2024-01-04 17:06:45'),
(280, 51, 'uploads/products/17043880052.jpg', '2024-01-04 17:06:45', '2024-01-04 17:06:45'),
(281, 51, 'uploads/products/17043880053.jpg', '2024-01-04 17:06:45', '2024-01-04 17:06:45'),
(282, 51, 'uploads/products/17043880054.jpg', '2024-01-04 17:06:45', '2024-01-04 17:06:45'),
(283, 51, 'uploads/products/17043880055.jpg', '2024-01-04 17:06:45', '2024-01-04 17:06:45'),
(284, 51, 'uploads/products/17043880056.jpg', '2024-01-04 17:06:45', '2024-01-04 17:06:45'),
(285, 52, 'uploads/products/17043881551.jpg', '2024-01-04 17:09:15', '2024-01-04 17:09:15'),
(286, 52, 'uploads/products/17043881552.jpg', '2024-01-04 17:09:15', '2024-01-04 17:09:15'),
(287, 52, 'uploads/products/17043881553.jpg', '2024-01-04 17:09:15', '2024-01-04 17:09:15'),
(288, 52, 'uploads/products/17043881554.jpg', '2024-01-04 17:09:15', '2024-01-04 17:09:15'),
(289, 52, 'uploads/products/17043881555.jpg', '2024-01-04 17:09:15', '2024-01-04 17:09:15'),
(290, 53, 'uploads/products/17043882871.jpg', '2024-01-04 17:11:27', '2024-01-04 17:11:27'),
(291, 53, 'uploads/products/17043882872.jpg', '2024-01-04 17:11:27', '2024-01-04 17:11:27'),
(292, 53, 'uploads/products/17043882873.jpg', '2024-01-04 17:11:27', '2024-01-04 17:11:27'),
(293, 53, 'uploads/products/17043882874.jpg', '2024-01-04 17:11:27', '2024-01-04 17:11:27'),
(294, 53, 'uploads/products/17043882875.jpg', '2024-01-04 17:11:27', '2024-01-04 17:11:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'TRẦN QUANG TIẾN', 'sostien0409@gmail.com', '$2y$10$5GYg.4pmyc3CKD7vSivsp.CcRybgu1zjsAWBo82CMwyaE..rtSq46', 'UFIO527NOpccS0hAalpPfyhCPVFrJNY3Q7xpazC9mXAOHbnHZVGTgUp0l43Q', '2023-11-11 06:55:45', '2023-11-11 06:55:45', 1),
(2, 'Lê Quang Liêm', 'test1@gmail.com', '$2y$10$E3u6iew4vR64vXb.YV9mDeU27DBMyCg0fTZPKR/b39Zgblc8MCVlq', NULL, '2023-11-13 07:23:04', '2023-11-13 07:23:04', 0),
(3, 'Vương Thiên Nhất', 'test@admin.admin', '$2y$10$K2AukXfqbAcCR2Py3W6a3.boNB2t4USABLpSv0u7fn0SlxLkOFrGK', NULL, '2023-11-25 14:53:44', '2023-11-25 14:53:44', 1),
(4, 'Lê Thành', 'kaka@test.cc', '$2y$10$Pb4UJ/baVvJGOIu/eZPWuurY2Dv00M5m5q53bYlDCqcr9XXh7/mh.', NULL, '2023-11-26 06:46:30', '2023-11-26 06:46:30', 0),
(5, 'Minh Anh', 'mina@cc.test', '$2y$10$k0tLD0C5Vuioh/fKrf6ecuKNtvoL45fczyfQS/k3AtJsommyPIAGe', NULL, '2023-11-26 06:59:57', '2023-11-26 06:59:57', 0),
(6, 'Hùng Văn', 'hungvan@test.test', '12345678', NULL, NULL, NULL, 0),
(7, 'Triệu Văn Minh', 'trieu@test.test', '12345678', NULL, NULL, NULL, 0),
(8, 'qqqq', '1234@cc.cc', '$2y$10$iQSHe03Ka2XttvRwkHle.eNkc091XhJWcjK/S6iYIl48u3SCSFeh6', NULL, '2023-11-27 03:33:18', '2023-11-27 03:33:18', 0),
(9, 'Tien Tran', 'test@gmail.com', '$2y$10$vMUrYVAW8vODsy6JymoiWegVQ5M59cr41wqWFADA2b2IvM9H7m43.', NULL, '2023-12-16 14:06:53', '2023-12-16 14:06:53', 0),
(10, 'Tien', 'tien@tien.tien', '$2y$10$yl4vo5jWilSphWIUxNjUW.I7WGOikMf/7b7TduscQyuM0k7PZ9N2e', NULL, '2024-01-05 01:27:40', '2024-01-05 01:27:40', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
