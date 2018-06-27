-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2018 lúc 04:22 AM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên', 'admin@admin.com', '$2y$10$eE.KzHwig1pWGIlzrJV/8u4qZWmT8v2MHZTqPojQqmXfGOuae7oVW', 'kuCuYNeATDxG42woi7nWBLlBvtNTh7usuBKQs5ZMtCuCyWxVZSmm0h0uPYG7', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` varchar(100) NOT NULL,
  `date_order` date NOT NULL,
  `total` int(20) NOT NULL,
  `payment` text NOT NULL,
  `note` text,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(26, '26', '2018-05-17', 523000, 'COD', 'cccc', 1, '2018-05-17 13:20:15', '2018-05-17 14:17:23'),
(30, '31', '2018-05-18', 350000, 'COD', 'aaa', 1, '2018-05-18 02:50:42', '2018-05-19 00:36:54'),
(31, '32', '2018-05-18', 709000, 'COD', 'SSS', 0, '2018-05-18 07:25:12', '2018-05-18 09:00:08'),
(32, '33', '2018-05-19', 359000, 'COD', 'adhsak', 0, '2018-05-19 00:30:34', '2018-05-19 00:30:34'),
(33, '34', '2018-05-19', 210000, 'ATM', 'dat hang nhanh', 1, '2018-05-19 01:15:10', '2018-05-19 01:17:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` varchar(100) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL,
  `unit_price` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(112, '26', '08141e50a8b5db9553f7203055f52a2b', 2, '214000', '2018-05-17 13:20:15', '2018-05-17 13:20:15'),
(113, '26', '2a492f4844ece209e6bce1f050e15cbb', 1, '55000', '2018-05-17 13:20:15', '2018-05-17 13:20:15'),
(114, '26', '3ec72510c62cff907ceead8853ead32d', 1, '40000', '2018-05-17 13:20:15', '2018-05-17 13:20:15'),
(115, '27', 'c79a2da02001c440aa9edac92d17cb2c', 1, '25000', '2018-05-17 14:01:25', '2018-05-17 14:01:25'),
(116, '27', 'd2227032f2ae8b1db400ff3db9fa41e6', 1, '90000', '2018-05-17 14:01:25', '2018-05-17 14:01:25'),
(117, '28', 'c79a2da02001c440aa9edac92d17cb2c', 1, '25000', '2018-05-17 14:14:22', '2018-05-17 14:14:22'),
(118, '28', 'd2227032f2ae8b1db400ff3db9fa41e6', 1, '90000', '2018-05-17 14:14:22', '2018-05-17 14:14:22'),
(122, '30', '045a8fa34ea36e597a0b99395c7fad75', 5, '70000', '2018-05-18 02:50:42', '2018-05-18 02:50:42'),
(123, '31', 'fc939d7ba181719d29845cddf01a3252', 1, '169000', '2018-05-18 07:25:12', '2018-05-18 07:25:12'),
(124, '31', 'b432620483edda4e45cc468795fc4d78', 1, '145000', '2018-05-18 07:25:12', '2018-05-18 07:25:12'),
(125, '31', '2320b20edb331b9e3476601b782b3d38', 2, '25000', '2018-05-18 07:25:12', '2018-05-18 07:25:12'),
(126, '31', 'b27b3af60f5ea76d56f2dfaafc76fabf', 1, '150000', '2018-05-18 07:25:12', '2018-05-18 07:25:12'),
(127, '31', '1b6e91d38268697e0402e90500b9da09', 1, '125000', '2018-05-18 07:25:12', '2018-05-18 07:25:12'),
(128, '31', '2018db72fa06b34102891e1bbba6865f', 1, '70000', '2018-05-18 07:25:13', '2018-05-18 07:25:13'),
(129, '32', '08141e50a8b5db9553f7203055f52a2b', 1, '214000', '2018-05-19 00:30:34', '2018-05-19 00:30:34'),
(130, '32', 'b432620483edda4e45cc468795fc4d78', 1, '145000', '2018-05-19 00:30:34', '2018-05-19 00:30:34'),
(131, '33', '045a8fa34ea36e597a0b99395c7fad75', 3, '70000', '2018-05-19 01:15:10', '2018-05-19 01:15:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `phone_number` text NOT NULL,
  `note` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(26, 'quoc khanh', 'nam', 'khanh@gmail.com', 'can tho', '982974019', 'cccc', '2018-05-17 13:20:15', '2018-05-17 13:59:56'),
(31, 'safdafas', 'nam', 'aadad@gmail.com', 'aaa', '4444', 'aaa', '2018-05-18 02:50:42', '2018-05-18 02:50:42'),
(32, 'quoc khanh', 'nam', 'qqqqq@gmail.com', 'QQ', '00244', 'SSS', '2018-05-18 07:25:12', '2018-05-18 07:25:12'),
(33, 'hoang tho', 'nam', 'tho.cit.vn@gmail.com', 'can tho', '98762222', 'adhsak', '2018-05-19 00:30:34', '2018-05-19 00:30:34'),
(34, 'dai loi', 'nam', 'a@gmail.com', 'can tho', '0972704783', 'dat hang nhanh', '2018-05-19 01:15:10', '2018-05-19 01:15:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` varchar(100) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `soluong` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
('1', 'HẠT GIỐNG CÀ CHUA 1', 'Nội dung 1', 'sample1.jpg', '2018-04-14 15:32:59', '2018-04-14 15:32:59'),
('2', 'HẠT GIỐNG CÀ CHUA 2', 'Nội dung 2', 'sample2.jpg', '2018-04-14 15:33:35', '2018-04-14 15:33:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `description` text,
  `description_detail` text,
  `image` text NOT NULL,
  `giagoc` text,
  `unit_price` text NOT NULL,
  `promotion_price` text,
  `unit` text NOT NULL,
  `new` int(11) DEFAULT NULL,
  `status1` text,
  `soluong` int(11) DEFAULT NULL,
  `soluongton` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `description_detail`, `image`, `giagoc`, `unit_price`, `promotion_price`, `unit`, `new`, `status1`, `soluong`, `soluongton`, `created_at`, `updated_at`) VALUES
('045a8fa34ea36e597a0b99395c7fad75', 'HẠT GIỐNG CẢI CẦU VỒNG', '9e2d40fcd27ef6ad2b3bc9d90842d75a', '<p>Mua Hạt giống Cải cầu vồng 1000 Hạt tại các Tỉnh/Thành: An Giang Bà Rịa - Vũng Tàu Bắc</p>', '<p>Mua Hạt giống Cải cầu vồng 1000 Hạt tại các Tỉnh/Thành: An Giang Bà Rịa - Vũng Tàu Bắc</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/cai-cau-vong-4-174458957-550x386.jpg', '62000', '75000', '0', 'Gói', 0, NULL, 492, NULL, '2018-04-19 02:08:51', '2018-05-19 01:18:30'),
('08141e50a8b5db9553f7203055f52a2b', 'HẠT GIỐNG BẦU HỒ LÔ', '141c1e013b6ab01f5706dc0dbe16ec45', '<p>Mô tả : Giá Hạt giống Bầu Hồ Lô hiện nay, hôm nay Mua Hạt giống Bầu Hồ Lô ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Bầu Hồ Lô ở đâu? Cung cấp Hạt giống Bầu Hồ Lô giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn Quy cách: Gói 10 hạt Tỉ lệ nảy mầm: ~ 90% Nhiệt độ nãy mầm: 20-25º C Nhiệt độ phát triển: 14-38º C</p>', '<p>Mua Hạt giống Bầu Hồ Lô tại các Tỉnh/Thành: An Giang Bà Rịa - Vũng Tàu Bắc Giang Bắc Kạn Bạc Liêu Bắc Ninh Bến Tre Bình Định Bình Dương Bình Phước Bình Thuận Cà Mau Cao Bằng Đắk Lắk Đắk Nông Điện Biên Đồng Nai Đồng Tháp Gia Lai Hà Giang Hà Nam Hà Tĩnh Hải Dương Hậu Giang Hòa Bình Hưng Yên Khánh Hòa Kiên Giang Kon Tum Lai Châu Lâm Đồng Lạng Sơn Lào Cai Long An Nam Định Nghệ An Ninh Bình Ninh Thuận Phú Thọ Quảng Bình Quảng Nam Quảng Ngãi Quảng Ninh Quảng Trị Sóc Trăng Sơn La Tây Ninh Thái Bình Thái Nguyên Thanh Hóa Thừa Thiên Huế Tiền Giang Trà Vinh Tuyên Quang Vĩnh Long Vĩnh Phúc Yên Bái Phú Yên Cần Thơ Đà Nẵng Hải Phòng Hà Nội TP HCM</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/bau-ho-lo-550x550.jpg', '210000', '220000', '214000', 'gói', 1, NULL, 295, NULL, '2018-04-21 02:13:13', '2018-05-19 00:30:34'),
('130cbd59463e1a97c8d8dbfb1eb98389', 'HẠT GIỐNG CÀ RỐT TÍ HON MINI', '88af32a40913b6f82a30574626e7b10a', '<p>Mô tả : Giá Hạt giống Cà rốt tí hon mini hiện nay, hôm nay Mua Hạt giống Cà rốt tí hon mini ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Cà rốt tí hon mini ở đâu? Cung cấp Hạt giống Cà rốt tí hon mini giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn – Quy cách: 2 gram – Nhiệt độ sinh trưởng: 18 – 35 độ C – Thời gian nảy mầm: 5 – 10 ngày – Thời gian thu hoạch: 90 – 100 ngày – Chiều cao cây: 5 cm</p>', '<p>Sự xuất hiện của loại cà rốt tí hon (Cà rốt mini) này gần đây trên thị trường Việt Nam đã tạo ra một “cơn sốt” trong giới đam mê làm vườn. Các chị em nội trợ truyền tai nhau trên các trang mạng xã hội về cách trồng cũng như chăm sóc loại cây nhỏ nhắn chỉ bằng đốt ngón tay này. Trồng loại cà rốt này bạn sẽ có được những trải nghiệm thú vị vì không phải ganh nhau với người khác về độ lớn của củ. Chính hình thù bé nhỏ nhưng hương vị thơm ngon đã tạo nên điểm đặc biệt của loại cây kì lạ này. Cà rốt tí hon (Carot mini) có những đặc tính khá giống như các giống cà rốt thông thường nhưng kích thước của chúng nhỏ hơn rất nhiều lần. Một củ cà rốt tí hon trưởng thành thường chỉ nhỏ bằng một đốt ngón tay cái. Loại cây tí hon xinh xắn này đặc biệt rất thích hợp trồng làm cảnh trong chậu để vừa ăn vừa ngắm. Cà rốt tí hon là loại cây trồng để lấy củ, sống từ 1 đến 2 năm. Giống với cà rốt thường, cà rốt tí hon cũng có màu vàng cam, đỏ hoặc tía. Cà rốt từ xưa đến nay vốn nổi tiếng là loại thực phẩm dồi dào vitamin A, hàm lượng vitamin B1, C và B2 rất tốt cho mắt. Tuy chỉ kém cà rốt thông thường về kích thước nhỏ bé nhưng về hương thơm và vị ngọt thì không thua kém, thậm chí còn ngọt đậm hơn.</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/carot-ti-hon.jpg', '15000', '22000', '0', 'gói', 1, NULL, 240, NULL, '2018-04-21 04:19:24', '2018-05-17 03:19:02'),
('186d702e2ff8b835b0c3ce427b3786d9', 'HẠT GIỐNG CỦ CẢI ĐỎ DÀI KIWI', '88af32a40913b6f82a30574626e7b10a', '<p>Mô tả : Giá Hạt giống Củ Cải đỏ dài Kiwi hiện nay, hôm nay Mua Hạt giống Củ Cải đỏ dài Kiwi ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Củ Cải đỏ dài Kiwi ở đâu? Cung cấp Hạt giống Củ Cải đỏ dài Kiwi giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn – Quy cách:3 gram – Củ cải thịt mềm , thịt ngon giòn, ngọt – Tốt cho ăn sáng ,ăn trưa, ăn tối, làm salad – Thời gian nẩy mầm: 4-8 ngày – Thời gian trồng và thu hoạch ngắn:20 – 30 ngày – Thích hợp trồng quanh năm – Phát triển nhanh, kháng bệnh tốt, năng suất và độ đồng đều cao – Vỏ đỏ, hơi trắng ở phần dưới đuôi, chậm trổ bông, củ chắc, tròn dài, đường kính 2 – 3 cm và dài 4 -5 cm</p>', '<p>Củ cải đỏ dài cho củ dáng thuôn dài, thời gian trồng và thu hoạch ngắn, chỉ khoảng 1 tháng, hơn nữa lại thích hợp để trồng quanh năm. Bạn tha hồ chế biến thành những món vừa đẹp mắt vừa bổ dưỡng như nấu canh, súp, salad, ép lấy nước,… Mỗi túi hạt giống có giá khoảng 35.000 đồng tại cửa hàng hạt giống F1508 cung cấp các loại hạt giống ngoại nhập chất lượng tốt nhất, cho tỉ lệ cao nhất.</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/cu-cai-do-dai-kiwi2-550x550.jpg', '40000', '50000', '0', 'gói', 1, NULL, 366, NULL, '2018-04-21 04:18:18', '2018-05-17 03:18:01'),
('1b6e91d38268697e0402e90500b9da09', 'HẠT GIỐNG BẮP NẾP LAI TÍM NGỌT', '141c1e013b6ab01f5706dc0dbe16ec45', '<p>Giá Hạt giống Bắp nếp lai tím ngọt 099 hiện nay,&nbsp;</p>', '<p><span style=\"color:#DAA520\"><span style=\"font-family:helvetica neue,helvetica,arial,sans-serif; font-size:14px\">Giá Hạt giống Bắp nếp lai tím ngọt 099 hiện nay, hôm nay Mua Hạt giống Bắp nếp lai tím ngọt 099 ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Bắp nếp lai tím ngọt 099 ở đâu? Cung cấp Hạt giống Bắp nếp lai tím ngọt 099 giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn – Cây sinh trưởng khỏe, cứng cây – Độ đồng đều cao – Hạt có màu màu trắng đục (70%) xen kẽ hạt màu tím (25%). Có 25% hạt ngọt và 75% hạt dẻo. Chất lượng ăn ngon, mềm, dẻo và đặc biệt độ ngọt cao. – Thời gian từ gieo đến thu hoạch bắp tươi: 63-65 ngày</span></span></p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/bap-nep-lai-tim-ngot.jpg', '120000', '130000', '125000', 'gói', 1, NULL, 499, NULL, '2018-04-19 02:05:37', '2018-06-07 16:18:21'),
('2018db72fa06b34102891e1bbba6865f', 'HẠT GIỐNG CÚC DAISY ĐỎ', '4d0e0602c762362873ce8325665c55c5', '<p>– Quy cách: 20 hạt – Thời vụ trồng: gieo trồng quanh năm. – Nhiệt độ nẩy mầm: 20 – 25 độ C – Thời gian nẩy mầm: 7 – 15 ngày – Khoảng cách trồng: 20 x 20 cm – Độ sâu gieo hạt: khi gieo hạt không phủ đất và có thể để khay gieo tại nơi có ánh sáng – Hoa nở sau 85 ngày kể từ ngày gieo trồng. – Tập tính: hoa to 3-5cm, nhúm lại nhìn giống hình cầu, chịu lạnh tốt</p>', '<p>– Quy cách: 20 hạt – Thời vụ trồng: gieo trồng quanh năm. – Nhiệt độ nẩy mầm: 20 – 25 độ C – Thời gian nẩy mầm: 7 – 15 ngày – Khoảng cách trồng: 20 x 20 cm – Độ sâu gieo hạt: khi gieo hạt không phủ đất và có thể để khay gieo tại nơi có ánh sáng – Hoa nở sau 85 ngày kể từ ngày gieo trồng. – Tập tính: hoa to 3-5cm, nhúm lại nhìn giống hình cầu, chịu lạnh tốt</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/cuc-daisy-do8.jpg', '68000', '70000', '0', 'gói', 0, NULL, 287, NULL, '2018-04-19 13:31:55', '2018-05-18 07:25:13'),
('2320b20edb331b9e3476601b782b3d38', 'HẠT GIỐNG DƯA HẤU NHỎ MEXICO', '88af32a40913b6f82a30574626e7b10a', '<p>Mô tả : Giá Hạt giống Dưa Hấu Nhỏ Mexico hiện nay, hôm nay Mua Hạt giống Dưa Hấu Nhỏ Mexico ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Dưa Hấu Nhỏ Mexico ở đâu? Cung cấp Hạt giống Dưa Hấu Nhỏ Mexico giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn – Quy cách: 20 hạt/Gói</p>', '<p>Mua Hạt giống Dưa Hấu Nhỏ Mexico tại các Tỉnh/Thành: An Giang Bà Rịa - Vũng Tàu Bắc Giang Bắc Kạn Bạc Liêu Bắc Ninh Bến Tre Bình Định Bình Dương Bình Phước Bình Thuận Cà Mau Cao Bằng Đắk Lắk Đắk Nông Điện Biên Đồng Nai Đồng Tháp Gia Lai Hà Giang Hà Nam Hà Tĩnh Hải Dương Hậu Giang Hòa Bình Hưng Yên Khánh Hòa Kiên Giang Kon Tum Lai Châu Lâm Đồng Lạng Sơn Lào Cai Long An Nam Định Nghệ An Ninh Bình Ninh Thuận Phú Thọ Quảng Bình Quảng Nam Quảng Ngãi Quảng Ninh Quảng Trị Sóc Trăng Sơn La Tây Ninh Thái Bình Thái Nguyên Thanh Hóa Thừa Thiên Huế Tiền Giang Trà Vinh Tuyên Quang Vĩnh Long Vĩnh Phúc Yên Bái Phú Yên Cần Thơ Đà Nẵng Hải Phòng Hà Nội TP HCM</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/dua-hau-ti-hon1-550x550.jpg', '20000', '25000', '0', 'gói', 0, NULL, 198, NULL, '2018-04-21 04:20:31', '2018-05-18 07:25:12'),
('24f495f9cd1636017c7594039fcbc1d0', 'HẠT GIỐNG CẢI KALE TOSCANO', '9e2d40fcd27ef6ad2b3bc9d90842d75a', '<p>Giá Hạt giống cải Kale Toscano hiện nay, hôm nay Mua Hạt giống cải Kale Toscano ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống cải Kale Toscano ở đâu? Cung cấp Hạt giống cải Kale Toscano giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn Lá to 5 – 7.5 cm, dài 25 cm</p>', '<p>Giá Hạt giống cải Kale Toscano hiện nay, hôm nay Mua Hạt giống cải Kale Toscano ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống cải Kale Toscano ở đâu? Cung cấp Hạt giống cải Kale Toscano giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn Lá to 5 – 7.5 cm, dài 25 cm</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/cai-kale-toscano1.jpg', '130000', '150000', '0', 'gói', 1, NULL, 499, NULL, '2018-04-19 12:41:09', '2018-05-17 12:26:04'),
('2a492f4844ece209e6bce1f050e15cbb', 'HẠT GIỐNG BẠC HÀ ÂU – HÚNG LỦI', '934b37f4b806efa9c9872857951ceced', '<p>Cung cấp Hạt giống Bạc Hà Âu – Húng lủi chất lượng, giá tốt Toàn Quốc</p>', '<p>Cung cấp Hạt giống Bạc Hà Âu – Húng lủi chất lượng, giá tốt Toàn Quốc</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/bac-ha-au-hung-lui.jpg', '50000', '60000', '55000', 'gói', 1, NULL, 497, NULL, '2018-04-19 12:54:17', '2018-05-17 14:22:37'),
('2c5f483d302ca8bbec79f33e47ef8197', 'HẠT GIỐNG BÍ ĐỎ CÔ TIÊN', '9e2d40fcd27ef6ad2b3bc9d90842d75a', '<p>Cung cấp Hạt giống Bí đỏ cô Tiên chất lượng, giá tốt Toàn Quốc</p>', '<p>Cung cấp Hạt giống Bí đỏ cô Tiên chất lượng, giá tốt Toàn Quốc</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/bi-do-co-tien.jpg', '100000', '125000', '119000', 'bao', 0, NULL, 500, NULL, '2018-04-19 12:38:35', '2018-05-17 03:01:45'),
('354743599a4c75801ae667d9895c718d', 'HẠT GIỐNG SÚP LƠ XANH', '934b37f4b806efa9c9872857951ceced', '<p>Giá Hạt giống Súp Lơ Xanh hiện nay, hôm nayMua Hạt giống Súp Lơ Xanh ở đâu?Địa chỉ, cửa hàng, shop bán Hạt giống Súp Lơ Xanh ở đâu?Cung cấp Hạt giống Súp Lơ Xanh giá tốt, giá rẻ toàn quốc.Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn</p>', '<p>Giá Hạt giống Súp Lơ Xanh hiện nay, hôm nayMua Hạt giống Súp Lơ Xanh ở đâu?Địa chỉ, cửa hàng, shop bán Hạt giống Súp Lơ Xanh ở đâu?Cung cấp Hạt giống Súp Lơ Xanh giá tốt, giá rẻ toàn quốc.Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/sup-lo-xanh.jpg', '90000', '100000', '95000', 'gói', 1, NULL, 500, NULL, '2018-04-19 12:56:34', '2018-05-17 03:06:24'),
('3ec72510c62cff907ceead8853ead32d', 'HẠT GIỐNG BẮP CẢI MINI TÍM', '934b37f4b806efa9c9872857951ceced', '<p>– Quy cách:0.3 gram (khoảng 100 hạt) – Thời gian nảy mầm 7 – 15 ngày – Thu hoạch sau 90 – 120 ngày – Mỗi cây sẽ cho thu hoạch từ 150-170 chiếc bắp cải mini – Chiều cao cây 130 – 150 cm – Mùa trồng thích hợp: Mùa Xuân, Mùa Hạ, Mùa Thu – Dễ trồng, trồng quanh năm</p>', '<p>– Quy cách:0.3 gram (khoảng 100 hạt) – Thời gian nảy mầm 7 – 15 ngày – Thu hoạch sau 90 – 120 ngày – Mỗi cây sẽ cho thu hoạch từ 150-170 chiếc bắp cải mini – Chiều cao cây 130 – 150 cm – Mùa trồng thích hợp: Mùa Xuân, Mùa Hạ, Mùa Thu – Dễ trồng, trồng quanh năm</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/bap-cai-mini-tim.jpg', '35000', '40000', '0', 'gói', 1, NULL, 232, NULL, '2018-04-19 13:06:01', '2018-05-17 13:20:15'),
('46191f019ee717d932c8536d9eefbaa0', 'HẠT GIỐNG CÚC SAO BĂNG', '4d0e0602c762362873ce8325665c55c5', '<p>Hạt giống cúc sao băng đã được khảo nghiệm. Tư vấn, hỗ trợ kỹ thuật gieo trồng hạt giống cúc sao băng. Thiết kế, thi công vườn rau sạch tại nhà.</p>', '<p>Hạt giống cúc sao băng đã được khảo nghiệm. Tư vấn, hỗ trợ kỹ thuật gieo trồng hạt giống cúc sao băng. Thiết kế, thi công vườn rau sạch tại nhà.</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/cuc-sao-bang-2-550x506.jpg', '176000', '190000', '187000', 'gói', 0, NULL, 390, NULL, '2018-04-19 13:36:31', '2018-05-17 03:12:18'),
('78528da8c9628430407ea1cd319a6dfb', 'HOA ĐỒNG TIỀN MIX', '4d0e0602c762362873ce8325665c55c5', '<p>Cung cấp hạt giống uy tín tại thành phố Hồ Chí Minh.Hướng dẫn kỹ thuật trồng chi tiết nhất.Thiết kế, thi công vườn rau sạch tại nhà</p>', '<p>Cung cấp hạt giống uy tín tại thành phố Hồ Chí Minh.Hướng dẫn kỹ thuật trồng chi tiết nhất.Thiết kế, thi công vườn rau sạch tại nhà</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/hoa-dong-tien-mix-mau-550x487.jpg', '150000', '170000', '165000', 'kg', 0, NULL, 600, NULL, '2018-04-19 13:35:18', '2018-05-17 03:11:11'),
('b27b3af60f5ea76d56f2dfaafc76fabf', 'HẠT GIỐNG MƯỚP RẮN', '141c1e013b6ab01f5706dc0dbe16ec45', '<p>Mô tả : Giá Hạt Giống Mướp Rắn hiện nay, hôm nay Mua Hạt Giống Mướp Rắn ở đâu? Địa chỉ, cửa hàng, shop bán Hạt Giống Mướp Rắn ở đâu? Cung cấp Hạt Giống Mướp Rắn giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn Hạt giống được kiểm soát về chất lượng.Tư vẫn, hỗ trợ jyx thuật gieo trồng cho khách hàng.Thiết kế, lắp đặt hệ thống tưới tiêu tự động và thi công vườn rau sạch.</p>', '<p>Theo đông y, mướp rắn có vị ngọt, tính mát và không độc nên dùng không gây hại gì cho sức khỏe của con người. Tất cả các bộ phận của cây mướp từ quả, lá, dây của cây mướp đều có tác dụng hỗ trợ chữa bệnh. Trong quả mướp rắn có chứa rất nhiều nước, các chất dinh dưỡng như protid, lipid, glucid, xenlulo, canxi, photpho, sắt, beta-caroten và các vitamin như B1, B6, B2, C…</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/muop-ran-452x550.jpg', '130000', '160000', '150000', 'gói', 0, NULL, 399, NULL, '2018-04-21 02:27:49', '2018-05-18 07:25:12'),
('b432620483edda4e45cc468795fc4d78', 'HẠT GIỐNG BÍ NGÔ TÍ HON MINI', '88af32a40913b6f82a30574626e7b10a', '<p>Mô tả : Giá Hạt giống Bí Ngô tí hon mini hiện nay, hôm nay Mua Hạt giống Bí Ngô tí hon mini ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Bí Ngô tí hon mini ở đâu? Cung cấp Hạt giống Bí Ngô tí hon mini giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn – Quy cách:0.5 gram – Bí Ngô tí hon có thể trồng được quanh năm, – Vụ Đông Xuân trồng tháng 11 thu hoạch vào tháng 4- 5 – Vụ Hè Thu trồng tháng 7 để thu hoạch vào tháng 9-10 – Ngâm nước khi gieo: Ngâm nước ấm từ 10-15 giờ, hạt nhỏ quá không cần ngâm mà gieo luôn – Sang chậu sau 30 – 35 ngày – Thu hoạch sau 50 – 60 ngày</p>', '<p>Bí ngô tí hon hay còn gọi Bí Ngô Mini được biết đến với tên gọi Pumpkin Casperita, Baby Boo pumpkins hay Miniture Pumkins. Kích thước quả chỉ để vừa lòng bàn tay, Mọi người đều thích trồng bí ngô tí hon vì đây là loại cây dễ trồng, năng suất, rất nhanh trưởng thành và đặc biệt là quả nhỏ xinh, trông cực kỳ vui mắt. Trong số các loại quả, bí là nhà vô địch về hàm lượng sắt, giàu vitamin, muối khoáng cũng như các axít hữu cơ.</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/bi-ngo-coc-remix.jpg', '140000', '150000', '145000', 'gói', 1, NULL, 297, NULL, '2018-04-21 04:21:59', '2018-05-19 00:30:34'),
('c5334c383d6fd0b25533b11aafc75513', 'HẠT GIỐNG ATISO ĐỎ – BỤP GIẤM', '934b37f4b806efa9c9872857951ceced', '<p>Giá Hạt giống Atiso đỏ – Bụp giấm hiện nay, hôm nay Mua Hạt giống Atiso đỏ – Bụp giấm ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Atiso đỏ – Bụp giấm ở đâu? Cung cấp Hạt giống Atiso đỏ – Bụp giấm giá tốt, giá rẻ toàn quốc.</p>', '<p>Giá Hạt giống Atiso đỏ – Bụp giấm hiện nay, hôm nay Mua Hạt giống Atiso đỏ – Bụp giấm ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Atiso đỏ – Bụp giấm ở đâu? Cung cấp Hạt giống Atiso đỏ – Bụp giấm giá tốt, giá rẻ toàn quốc.</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/atiso-do-bup-giam.jpg', '80000', '85000', '0', 'gói', 0, NULL, 100, NULL, '2018-04-19 12:46:24', '2018-05-17 03:04:24'),
('c79a2da02001c440aa9edac92d17cb2c', 'HẠT GIỐNG BÍ NGỒI XANH', '141c1e013b6ab01f5706dc0dbe16ec45', '<p>Mô tả : Giá Hạt giống Bí Ngồi xanh hiện nay, hôm nay Mua Hạt giống Bí Ngồi xanh ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Bí Ngồi xanh ở đâu? Cung cấp Hạt giống Bí Ngồi xanh giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn – Quy cách: 5 hạt/ gói – Thời gian nảy mầm: 3 -5 ngày – Thời gian thu hoạch: 45 – 60 ngày – Màu sắc: màu xanh đậm, láng đẹp mắt, không vết, gân, nặng 0,8-1,7 kg – Đặc điểm: Vỏ có độ dày trung bình, Thịt là màu be nhạt, dày, ngon ngọt, hương vị tinh tế – Tập tính: Cây sinh trưởng và phát triển khỏe mạnh, kháng bệnh tốt. Trái tròn dài, láng dài 25 – 30 cm, trái còn nhỏ từ (10-15 cm) được sử dụng thay vì dưa chuột trong món salad. trái lớn 1kg trở lên.</p>', '<p>Bí ngòi hay còn gọi là bí zucchini đều chứa nguồn vitamin và dưỡng chất dồi dào, giúp cơ thể luôn khỏe mạnh và chống lại bệnh tật. Nếu hương vị của bí ngòi chưa thuyết phục được bạn đưa chúng vào thực đơn hàng ngày thì hãy có thể bạn phải suy nghĩ lại khi điểm danh những lợi ích sức khỏe vô cùng ấn tượng của trái bí này dưới đây – Ngừa đột quỵ: Một chén bí ngòi chứa 10% magiê – chất khoáng giúp giảm nguy cơ bệnh tim mạch và đột quị. Bí ngòi còn chứa nhiều acid folic, một loại vitamin B giúp giảm hàm lượng homocysteine trong máu. Nghiên cứu cho thấy khi homocysteine tăng có thể gây bệnh tim mạch và máu vón cục. Ngoài ra, chất xơ của bí ngòi cũng có tác dụng hỗ trợ gan sản xuất nhiều acid mật, giúp giảm lượng cholesterol trong máu.</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/bi-ngoi-xanh5.jpg', '20000', '30000', '25000', 'KG', 1, NULL, 342, NULL, '2018-04-21 02:25:23', '2018-05-17 14:14:22'),
('d2227032f2ae8b1db400ff3db9fa41e6', 'HẠT GIỐNG HOA CÚC BẤT TỬ MIX', '4d0e0602c762362873ce8325665c55c5', '<p>– Quy cách: 240 hạt – Thời gian nảy mầm : 7 – 15 ngày. – Thời gian ra hoa: 90 ngày. – Chiều cao cây: 25 -30 cm. – Nhiệt độ phát triển cây: 15 – 38Độ C – Mùa vụ: Trồng quanh năm – Độ sâu gieo hạt: 0,5cm – Đặc tính :Cây thân thảo 1 năm, hoa cánh cứng, bóng láng, nhiều màu sặc sỡ.</p>', '<p>– Quy cách: 240 hạt – Thời gian nảy mầm : 7 – 15 ngày. – Thời gian ra hoa: 90 ngày. – Chiều cao cây: 25 -30 cm. – Nhiệt độ phát triển cây: 15 – 38Độ C – Mùa vụ: Trồng quanh năm – Độ sâu gieo hạt: 0,5cm – Đặc tính :Cây thân thảo 1 năm, hoa cánh cứng, bóng láng, nhiều màu sặc sỡ.</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/hoa-cuc-bat-tu10.jpg', '87000', '93000', '90000', 'kg', 0, NULL, 471, NULL, '2018-04-19 13:33:59', '2018-05-17 14:22:37'),
('fc939d7ba181719d29845cddf01a3252', 'HẠT GIỐNG CÀ CHUA CHERRY ĐỎ', '141c1e013b6ab01f5706dc0dbe16ec45', '<p>Mô tả : Giá Hạt giống Cà Chua Cherry Đỏ hiện nay, hôm nay Mua Hạt giống Cà Chua Cherry Đỏ ở đâu? Địa chỉ, cửa hàng, shop bán Hạt giống Cà Chua Cherry Đỏ ở đâu? Cung cấp Hạt giống Cà Chua Cherry Đỏ giá tốt, giá rẻ toàn quốc. Hạt giống F1508 - Cung cấp hạt giống ký (kg), hạt giống cho nhà vườn – Quy cách: 0.1 gram – Quả tròn hoặc dài, màu đỏ đều rất đẹp – Vị chua nhưng ngọt hơn cà chua thông thường – Dễ trồng, trồng được nhiều vụ trong năm – Thời gian nảy mầm: 4- 8 ngày – Thời gian thu hoạch: 30 – 45 ngày – Công dụng: thức ăn, trái làm kiềng – Tập tính: giống cà chua mini, trái 50-80g, màu đỏ, mỗi chuỗi ra 8-10 trái, sinh trưởng nhanh không giới hạn, quả hình tròn, vị ngon và có giá trị dinh dưỡng cao</p>', '<p>Cà chua thuộc họ bạch anh, có thân mềm bò trên mặt đất hoặc leo thường ưa sống ở vùng có khí hậu mát mẻ. Là loại thực phẩm rất hay được sử dụng nấu ăn, chế biến hàng ngày. Cà chua cherry đỏ là loại cà chua tròn nhỏ, có hình dáng giống quả cherry màu cam bóng, căng tròn, mịn màng, thịt ngọt dày. Cà chua thường được dùng để ăn salad, nấu canh, xào, làm mứt, nước ép hay làm nước sốt chắm, trộn rất ngon Có rất nhiều chất dinh dưỡng trong quả cà chua rất tốt cho cơ thể chúng ta – Các vitamin nhóm B, A, C, D – Nước – Protein – Cacbonhydrat – Chất xơ – Lycopen và beta carotene.. – Cà chua cherry đỏ nhìn rất bắt mắt bởi có màu sắc tươi sáng, hương vị thơm ngon lại rất nhiều tác dụng tốt cho sức khỏe. Có thể thay thế cơm cho các bé ăn dặm bổ sung rất nhiều chất dinh dưỡng cần thiết cho cả ngày hoạt động nhé các mẹ. – Hàm lượng vitamin A trong cà chua rất tốt cho mắt, làm sáng và giảm nhức mỏi mắt, ngăn ngừa thoái hóa điểm vàng, giảm nguy cơ đục thủy tinh thể –Cà chua cherry đỏ làm đẹp da , lycopene chống lão hóa da xoa nếp nhăn hiệu quả, làm da sáng trắng, săn chắc, mịn màng. Dùng cà chua đắp mặt thì rất tuyệt, các lỗ chân lông sẽ se nhỏ lại, chống nắng cao và trị được mụn. – Cà chua cherry đỏ là loại thực phẩm có khả năng ngăn ngừa ung thư rất tốt – Cà chua cherry đỏ điều hòa lượng đường trong máu ổn định – Cà chua cherry đỏ bảo vệ tim mạch khỏe mạnh –Cà chua cherry đỏ giúp giấc ngủ sâu , say hơn – Cà chua cherry đỏ phù hợp với người muốn ăn kiêng Gia đình bạn có muốn trồng vườn cà chua cherry đỏ đẹp mắt và hấp dẫn này không. Cách trồng cà chua cherry đỏ: – Hạt giống: liên hệ hạt giống F1508 cung cấp các loại hạt giống ngoại nhập chất lượng tốt nhất, tỉ lệ nảy mầm cao – Ủ hạt: Pha nước ấm, 3 nước sôi + 2 nước lạnh, cho hạt vào ngâm 5 – 6giờ, vớt hạt ra, rửa hạt lại bằng nước sạch. Dùng bông hoặc vải nhúng nước sau đó vắt ráo, cho hạt vào ủ. Hàng ngày kiểm tra giữ ẩm cho bọc ủ, sau khoảng 4 ngày. Hạt sẽ nứt, xuất hiện mầm trắng, lúc này có thể đem hạt ra gieo. – Cà chua cherry đỏ sau 15 ngày gieo đã nảy mầm và có mấy lá thật. Đặt chậu ra ngoài ánh nắng nhẹ giúp cây cứng cáp, phát triển tốt. – Cà chua cherry đỏ được 20 – 25 ngày cho thể sang chậu khi cây được 4 – 5 lá thật, cứng cáp, không sâu bệnh. Cà chua bị bạn có thể trồng trong chậu, thùng xốp, vườn đều được. Trồng trong chậu, chậu phải sâu 20cm. Khi sang cây cần đào hố phải to, sâu hơn hoặc bằng với bầu ươm để đủ bao phủ bầu ươm, cây không bị nhột, sống cao hơn. – Làm cho Cà chua cherry đỏ quả và bền cây: Tỉa bỏ nhánh phụ và lá già cho cây thông thoáng. Mỗi cây chỉ để lại 1 thân chính và 2 nhánh cấp 1 ở sát dưới chùm hoa thứ nhất, sau đó để cây ra nhiều nhánh sẽ cho nhiều hoa, đậu nhiều lứa trái. Chú ý tưới nước đủ ẩm cho cà chua, không để cà chua bị úng ngập hoặc độ ẩm quá lớn. Thường xuyên phát hiện và phòng trừ sâu bệnh kịp thời cho cà chua. – Thu hoạch: Tùy theo mục đích sử dụng: Ăn Cà chua cherry đỏ l tươi hay đóng lọ chế biến mà thu hái (độ già quả, quả bắt đầu chuyển màu hồng nhạt). Hái nhẹ tay vào sáng sớm hoặc chiều mát. Cách phòng trừ bệnh cho cây cà chua cherry đỏ: – Giống cây: chọn mua giống cà chua khỏe, chịu sâu bệnh, không nên mua giống không rõ nguồn gốc dễ mắc bệnh nấm lá, bệnh héo. – Đất trồng: Không nên trồng Cà chua cherry đỏ liên tục trên một chân ruộng, nên thâm canh tăng vụ, luân chuyển vụ cây trồng. – Nên dùng rơm rạ, trấu, lá cây, ni lông che kín gốc để giữ ẩm và hạn chế sâu bệnh, động vật vào phá gốc. – Một khi thân cây xuất hiện nấm thì nên dùng thuốc diệt nấm để tránh lây sang quả và những cây trồng bên cạnh. Cách khắc phục một số bệnh cho cà chua: – Cà chua cherry đỏ bị rụng quả xanh: bệnh này thường xuất hiện khi đến mùa sương giá để giảm thiểu bệnh làm như sau, trước khi trời lạnh nên dùng nilon phủ cho cà chua từ chiều hôm trước đến buổi sáng hôm sau khi nhiệt độ ngoài trời tăng lên. – Cà chua cherry đỏ bị thối sau khi thu hoạch dù quả chín căng mộng và đẹp: bệnh do thán thư, nấm gây ra vì vậy sau khi thu hoạch nên để nơi khô ráo, thoáng khí và không nên bảo quản quá lâu. Lưu ý Cà chua cherry đỏ không thích hợp với tiết trời sương giá, hoa quả sẽ dễ bị rụng nên dùng túi nilong hoặc bạt che để phủ lên. Đặc biệt kiêng kị sương muối Có thể dùng nước vo gạo để tưới cây Thu hoạch trái Cà chua cherry đỏ xong phải đặt ở nơi khô ráo, thông thoáng Không quá khó để trồng và chăm sóc loại cây này phải không, bạn có thể tô điểm thêm cho khu vườn có màu sắc sinh động vui vẻ, lại có được trái ăn an toàn không lo nhiễm hóa chất bảo quản hay chất kích thích tăng trưởng độc hại cho cơ thể, hãy bảo vệ sức khỏe của bạn và gia đình được tốt nhất có thể.</p>', 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/hat-giong-ca-chua-cherry-do3-1.jpg', '160000', '180000', '169000', 'gói', 1, NULL, 441, NULL, '2018-04-21 02:16:41', '2018-05-18 07:25:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` varchar(100) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
('196cc2fc04b9356b3aed9129776d33e0', NULL, 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/banner7.jpg', '2018-04-19 14:10:26', '2018-04-19 14:42:37'),
('2ab97aa37c911500a8f9c31256534111', NULL, 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/banner4.jpg', '2018-04-19 14:10:14', '2018-04-19 14:42:52'),
('32c91ff67547f0b1d7bfadf6b6283464', NULL, 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/banner8.jpg', '2018-04-19 14:10:38', '2018-04-19 14:42:26'),
('a923d62e0087910ba41641df35635969', NULL, 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/banner3.jpg', '2018-04-19 06:39:15', '2018-04-19 14:43:15'),
('ac1d0757edf449b2319d3b6e24fbc60b', NULL, 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/banner5.jpg', '2018-04-19 14:11:06', '2018-04-19 14:43:31'),
('e656e75106c4b14e389491c963e975fb', NULL, 'http://localhost/QuanLyBanHang/qlbh_admin/public/upload/banner2.jpg', '2018-04-19 14:10:56', '2018-04-19 14:43:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
('1', 'full shop ừ', '3/2 mậu thân', '0976336771', 'fullshop@gmail.com', '2018-04-07 06:24:06', '2018-04-19 08:44:46'),
('5dcad9b8456a07f09405e2f0936cd99a', 'Cửa hàng hạt giống Số 1', '350 Đường 30 Tháng 4, Xuân Khánh, Ninh Kiều, Cần Thơ', '0901087973', 'xuannong.vn@gmail.com', '2018-04-10 16:27:36', '2018-04-10 16:27:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
('141c1e013b6ab01f5706dc0dbe16ec45', 'Hạt Giống Quả', '<p><strong>Thương hiệu nổi tiếng</strong></p>', '2018-04-19 12:26:13', '2018-05-04 10:37:41'),
('4d0e0602c762362873ce8325665c55c5', 'Hạt Giống Hoa', 'Thương hiệu nổi tiếng', '2018-04-19 12:27:03', '2018-04-19 12:29:45'),
('88af32a40913b6f82a30574626e7b10a', 'Hạt Giống Tí Hon', 'Thương hiệu nổi tiếng', '2018-04-19 12:28:24', '2018-04-19 12:28:24'),
('934b37f4b806efa9c9872857951ceced', 'Hạt Giống Rau', 'Thương hiệu nổi tiếng', '2018-04-19 08:03:27', '2018-04-19 12:29:56'),
('9e2d40fcd27ef6ad2b3bc9d90842d75a', 'Hạt giống Nhà vườn', 'Thương hiệu nổi tiếng', '2018-04-19 02:04:17', '2018-04-19 02:04:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
('3ae202838fb2b40e0367e286abaa0639', '111111', '111111@gamil.com', '$2y$10$eE.KzHwig1pWGIlzrJV/8u4qZWmT8v2MHZTqPojQqmXfGOuae7oVW', '2222', 'aaaaa', NULL, '2018-05-16 09:01:42', '2018-05-16 09:01:42'),
('ad80b1c6b6c9fc6f7acfa3649e40a5f1', 'nguyen van A', 'test1@test.com', '$2y$10$jA8EyNGLnnSHY3eDRBJ9gO4vpqQsZPuwqW6B7.BWZBSoUiQ0HTtle', '0987222134', 'can tho', NULL, '2018-05-16 07:39:49', '2018-05-16 07:39:49'),
('b10e0b8a34f0865f01de83bc89115227', 'aaaaa', 'khanh@gmail.com', '$2y$10$0cr2AGKKdhaoV5VInSbTZeCubYqO8.j/l2TBBh0ToHK27GzXkF7U.', '0833333333', 'aaaa', NULL, '2018-05-16 09:15:03', '2018-05-16 09:17:22');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
