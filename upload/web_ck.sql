-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 07:48 AM
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
-- Database: `web_ck`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hang` int(11) NOT NULL,
  `hoatdong` int(11) NOT NULL DEFAULT 1,
  `databegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`, `hang`, `hoatdong`, `databegin`) VALUES
(1, 'Lê Phú Vinh', 'lephuvinh30605@gmail.com', '$2y$10$R9tkKRDDUeForoIKOCTsO.iXjM.iQhz9/cI4abBnmbgHMWWP4jioi', 1, 1, '2025-05-01 22:29:31'),
(2, 'Lương Lê Nhân Trí', 'Lenhantrisp@gmail.com', '$2y$10$1R4ZISRXAUl8Fa2pq1Xf/OS0qUPdLBxyMLaxOgj6qattRf/LDsrUe', 1, 1, '2025-05-01 22:33:29'),
(3, 'Nguyễn Minh Hưng', 'nguyenminhhungaz8@gmail.com', '$2y$10$fdG2hLZ4KIaPslp.Zdh71u3h7bORqEVbhDvk4/BI0ZKUDauwmzoqO', 1, 1, '2025-05-01 22:33:56'),
(4, 'Vinh', 'lephuvinh3006@gmail.com', '$2y$10$sA2.DDyAGdyZKtEKYY22KORKFaZzVts8Sqvn421onsBCqLdfllwWC', 2, 1, '2025-05-01 23:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `booktour`
--

CREATE TABLE `booktour` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tourid` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `bookdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `booktour`
--

INSERT INTO `booktour` (`id`, `userid`, `tourid`, `total_price`, `status`, `payment`, `bookdate`) VALUES
(6, 1, 14, 4490000, 1, 'VNPay', '2025-05-20 12:55:55'),
(7, 1, 1, 12799000, 0, 'VNPay', '2025-05-21 08:41:24'),
(8, 1, 9, 10039000, 0, 'VNPay', '2025-05-21 08:42:43'),
(9, 1, 17, 4490000, 0, 'VNPay', '2025-05-21 08:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `canhdep`
--

CREATE TABLE `canhdep` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `hide` int(11) NOT NULL DEFAULT 0,
  `datebegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `canhdep`
--

INSERT INTO `canhdep` (`id`, `name`, `image`, `hide`, `datebegin`) VALUES
(1, 'Cao nguyên đá Đồng Văn', 'Canhdep1-DongVan.jpg', 0, '2025-04-19 18:46:33'),
(2, 'Mù Cang Chải', 'Canhdep2-Mucangchai.jpg', 0, '2025-04-19 18:46:33'),
(3, 'Tràng An - Ninh Bình', 'Canhdep3-TrangAn.jpg', 0, '2025-04-19 18:46:33'),
(4, 'Đảo ngọc Phú Quốc', 'Canhdep4-PhuQuoc.jpg', 0, '2025-04-19 18:46:33'),
(5, 'Đồng bằng sông Cửu Long', 'Canhdep5-DBSCL.jpg', 0, '2025-04-19 18:46:33'),
(6, 'Vịnh Hạ Long', 'Canhdep6-HaLong.jpg', 0, '2025-04-19 18:46:33'),
(7, 'Hang Sơn Đoòng', 'Canhdep7-SonDoong.jpg', 0, '2025-04-19 18:46:33'),
(8, 'Cố đô Huế', 'Canhdep8-Hue.jpg', 0, '2025-04-19 18:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `meta` varchar(255) NOT NULL,
  `hide` int(11) NOT NULL DEFAULT 0,
  `ordered` int(11) NOT NULL,
  `datebegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `link`, `meta`, `hide`, `ordered`, `datebegin`) VALUES
(1, 'Du lịch miền Bắc', '', 'Du-lich-mien-Bac', 0, 1, '2025-04-13 20:57:51'),
(2, 'Du lịch miền Trung', '', 'Du-lich-mien-Trung', 0, 2, '2025-04-13 20:57:51'),
(3, 'Du lịch miền Nam', '', 'Du-lich-mien-Nam', 0, 3, '2025-04-13 20:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `chitiettour`
--

CREATE TABLE `chitiettour` (
  `id` int(11) NOT NULL,
  `tourid` int(11) NOT NULL,
  `mota1` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `datebegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chitiettour`
--

INSERT INTO `chitiettour` (`id`, `tourid`, `mota1`, `image1`, `image2`, `image3`, `datebegin`) VALUES
(1, 1, 'Tour này có gì hay\r\n\r\n- Chiêm ngưỡng vẻ đẹp hút hồn của cung đường ruộng bậc thang nổi tiếng tại các xã La Pán Tẩn, Chế Cu Nha và Zế Xu Phình\r\n\r\n- Chinh phục đỉnh Fansipan với hệ thống cáp treo 3 dây hiện đại cảm giác như đi giữa biển mây\r\n\r\n- Chiêm ngưỡng cánh đồng Mường Lò vào mùa thu hoạch', 'fansipan.jpg', 'catholic.jpg', 'mocchau_tea.jpg', '2025-04-14 22:52:01'),
(2, 2, 'Tour này có gì hay\r\n- Tham quan Mường Phăng – nơi đặt Sở chỉ huy Chiến dịch Điện Biên Phủ lịch sử, gắn liền với tên tuổi Đại tướng Võ Nguyên Giáp.\r\n- Khám phá thành phố Điện Biên với các di tích lịch sử nổi tiếng như Đồi A1, Hầm Đờ Cát, Tượng đài Chiến thắng Điện Biên Phủ.\r\n- Tìm hiểu văn hóa, phong tục độc đáo của đồng bào dân tộc Thái và H\'Mông trong khung cảnh núi rừng hùng vĩ.\r\n- Thưởng thức ẩm thực đặc sản vùng cao và tận hưởng không khí yên bình, trong lành của miền Tây Bắc.', 'dienbien.jpg', 'dienbien2.jpg', 'dienbien3.jpg', '2025-04-14 22:52:01'),
(3, 3, 'Tour này có gì hay\r\nTừ xưa cho đến nay du khách trẩy hội Chùa Hương đã biết đến một quần thể hang động mang đậm đà màu sắc tín ngưỡng dân gian – đạo Phật với nền văn hoá nông nghiệp (ao bèo, con trâu, đàn lợn, nong tằm, né kén…) và phảng phất cả văn hoá phồn thực (bầu sữa mẹ, núi cô, núi cậu...) du khách đến Chùa Hương cầu mong được thăp một nén tâm hương trước đấng siêu phàm và lời nguyện cầu mọi sự tốt lành.', 'hanoi.jpg', 'hanoi2.jpg', 'hanoi3.jpg', '2025-04-14 22:58:45'),
(4, 4, 'Tour này có gì hay- Tham quan Ga Hà Nội, ngắm nghía kiến trúc Pháp cổ kính, đắm mình trong một không gian đầy hoài niệm và chụp ảnh check in \r\n- Tham quan Nhà Hát Múa Rối Việt Nam.', 'hanoi4.jpg', 'hanoi5.jpg', 'hanoi6.jpg', '2025-04-14 22:58:45'),
(5, 5, 'Tour này có gì hay\r\n- Khám phá cảnh quan di sản thế giới Vịnh Hạ Long\r\n- Kỳ nghỉ sang trọng, tiện ích trên Du thuyền tiêu chuẩn 5 sao', 'halong2.jpg', 'halong3.jpg', 'halong4.jpg', '2025-04-14 23:04:20'),
(6, 6, 'Tour này có gì hay\r\n- Chụp hình lưu niệm với biểu tượng, cột mốc nơi mũi Sa Vĩ thiêng liêng\r\n- Viếng Thiền Viện Trúc Lâm Giác Tâm (chùa Cái Bầu), ngắm toàn cảnh vịnh Bái Tử Long yên bình\r\n- Tham quan Khu du lịch Tràng An – có cảnh quan ngoạn mục với hệ thống sông, suối chảy tràn trong các thung lũng, các hang xuyên thủy động, các dãy núi đá vôi trùng điệp', 'halong5.jpg', 'halong6.jpg', 'halong7.jpg', '2025-04-14 23:04:20'),
(7, 7, 'Tour này có gì hay\r\n- Tham quan bản Cát Cát\r\n- Chinh phục cáp treo Fansipang; Cầu kính rồng mây - Pơ mu Sapa\r\n- Check in Moana sapa view - được ví như 1 phim trường thu nhỏ giữa lòng thành phố Sapa', 'sapa2.jpg', 'sapa3.jpg', 'sapa4.jpg', '2025-04-14 23:09:35'),
(8, 8, 'Tour này có gì hay\r\n- Trải nghiệm tàu hỏa leo núi ngắm cảnh thung lũng Mường Hoa trên cung đường đến ga cáp treo Fansipan.', 'sapa5.jpg', 'sapa6.jpg', 'laocai.jpg', '2025-04-14 23:09:35'),
(9, 9, 'Tour này có gì hay\r\n- Tham quan bán đảo Sơn Trà, ngắm cảng Tiên Sa, viếng chùa Linh Ứng Bãi Bụt - ngôi chùa lớn nhất ở thành phố Đà Nẵng\r\n- Viếng nhà thờ La Vang, tham quan di tích Cầu Hiền Lương, Sông Bến Hải \r\n- Dạo bước trên Cầu Vàng tọa lạc tại Vườn Thiên Thai, với thiết kế độc đáo và ấn tượng', 'hue.jpg', 'banahill.jpg', 'hoian2.jpg', '2025-04-14 23:15:34'),
(10, 10, 'Tour này có gì hay\r\n- Tham quan Bảo Tàng Đà Nẵng, Cầu Tình Yêu, Cầu Rồng. \r\n- Tham quan Khu du lịch sinh thái Rừng dừa Bảy Mẫu, phố cổ Hội An, thăm Hội Quán Phúc Kiến, chùa Cầu Nhật Bản, khu phố Đèn Lồng\r\n- Khám phá tại khu vui chơi giải trí Bà Nà Hills', 'banahill2.jpg', 'banahill3.jpg', 'baiong_beach.jpg', '2025-04-14 23:15:34'),
(11, 11, 'Tour này có gì hay- Khởi hành\r\n- Khám phá những cung đường cao tốc mới của khu vực phía Nam: TP.HCM – Long Thành - Dầu Giây – Phan Thiết – Vĩnh Hảo.\r\n- Tham quan Thác Yang Bay nổi tiếng bởi vẻ đẹp hoang sơ giữa cánh rừng nguyên sinh ngập tràn màu xanh\r\n- Tham quan chụp ảnh tại Vega City Nha Trang - quần thể bất động sản phức hợp nghệ thuật, nghỉ dưỡng, giải trí hàng đầu tại Nha Trang.', 'vinpearl_nhatrang.jpg', 'longson.jpg', 'longson2.jpg', '2025-04-14 23:24:36'),
(12, 12, 'Tour này có gì hay\r\n- Tham quan Tháp Bà Ponagar; Chùa Long Sơn...\r\n- Khám phá Hòn Tằm; Vinwonders Nha Trang', 'nhatrang2.jpg', 'nhatrang3.jpg', 'nhatrang4.jpg', '2025-04-14 23:24:36'),
(13, 13, 'Tour này có gì hay\r\n- Chụp hình tại Đồi chè Cầu Đất.\r\n- Tham quan Thác Datanla - nổi tiếng với vẻ đẹp hoang sơ, thơ mộng mà dữ dội, đặc trưng của đại ngàn Tây Nguyên (tự túc chi phí tham gia trò chơi máng trượt)\r\n- Tham quan Mongo Land - nơi được mệnh danh là tiểu Mông Cổ ở Đà Lạt với hàng ngàn góc check-in sống ảo siêu dễ thương như khu vực lều Mông Cổ, cối xay gió, sa mạc xương rồng, ruộng cỏ Tây Bắc, nông trại thú cưng như lạc đà Alpaca, hươu sao, dê mini, thỏ sư tử', 'linhphuoc.jpg', 'dalat2.jpg', 'dalat3.jpg', '2025-04-14 23:29:06'),
(14, 14, '<p>Tour n&agrave;y c&oacute; g&igrave; hay - Combo trọn g&oacute;i d&agrave;nh cho du kh&aacute;ch từ H&agrave; Nội bao gồm v&eacute; m&aacute;y bay khứ hồi, kh&aacute;ch sạn nghỉ dưỡng v&agrave; lịch tr&igrave;nh tham quan linh hoạt. - Kh&aacute;m ph&aacute; Đ&agrave; Lạt mộng mơ với c&aacute;c địa điểm nổi bật như Thung Lũng T&igrave;nh Y&ecirc;u, Đồi Ch&egrave; Cầu Đất, Quảng Trường L&acirc;m Vi&ecirc;n, Chợ Đ&agrave; Lạt&hellip; - Tận hưởng kh&ocirc;ng kh&iacute; se lạnh đặc trưng, cảnh sắc thi&ecirc;n nhi&ecirc;n thơ mộng v&agrave; những g&oacute;c check-in &ldquo;triệu like&rdquo;. - Ph&ugrave; hợp cho nh&oacute;m bạn, cặp đ&ocirc;i hoặc gia đ&igrave;nh muốn nghỉ ngơi, kh&aacute;m ph&aacute; nhẹ nh&agrave;ng với chi ph&iacute; hợp l&yacute; v&agrave; dịch vụ tiện lợi.</p>', 'xuanhuong_hanoi.jpg', 'dalat4.jpg', 'dalat5.jpg', '2025-04-14 23:29:06'),
(15, 15, 'Tour này có gì hay\r\n- Bay thẳng từ Hà Nội đến Phú Quốc, tận hưởng combo trọn gói gồm vé máy bay khứ hồi và lưu trú tại khách sạn hoặc resort cao cấp.\r\n- Thỏa thích vui chơi tại các địa điểm nổi bật như VinWonders, Safari, Hòn Thơm, Sunset Sanato, chợ đêm Dinh Cậu…\r\n- Tắm biển, ngắm hoàng hôn tuyệt đẹp và thưởng thức hải sản tươi ngon trên đảo ngọc.\r\n- Tiết kiệm chi phí – linh hoạt lịch trình – lý tưởng cho nghỉ dưỡng, trăng mật hoặc kỳ nghỉ gia đình.', 'phuquoc2.jpg', 'phuquoc3.jpg', 'phuquoc4.jpg', '2025-04-14 23:32:58'),
(16, 16, 'Tour này có gì hay\r\n- Trải nghiệm “Cáp treo 3 dây vượt biển dài nhất thế giới tại Hòn Thơm” với tổng chiều dài 7.899,9m, thời gian di chuyển 15 phút\r\n- Khám phá Vinpearl Safari Phú Quốc – vườn thú hoang dã đầu tiên tại Việt Nam với quy mô 180ha, cùng hơn 130 loài động vật quý hiếm và các chương trình biểu diễn, chụp ảnh với động vật\r\n- Tham quan VinWonder Phú Quốc – công viên chủ đề được chia làm 6 phân khu, tượng trưng cho 6 vùng lãnh địa với 12 chủ đề được lấy cảm hứng từ các nền văn minh nổi tiếng', 'phuquoc5.jpg', 'phuquoc6.jpg', 'phuquoc7.jpg', '2025-04-14 23:32:58'),
(17, 17, 'Tour này có gì hay\r\n- Viếng chùa Âng - một trong những ngôi chùa cổ kính nhất trong hệ thống hơn 140 ngôi chùa Khmer tại Trà Vinh\r\n- Trải nghiệm các hoạt động sản xuất nông nghiệp cùng người dân, chăm sóc các loại cây màu trồng tại đây như khoai lang, ngô, dưa gang, hành lá (tùy theo mùa)… và được tham gia thu hoạch nông sản khi đến mùa', 'travinh.jpg', 'travinh2.jpg', 'cantho.jpg', '2025-04-14 23:36:37'),
(18, 18, 'Tour này có gì hay\r\n- Viếng Miếu Bà Chúa Xứ, Tây An cổ tự, Lăng Thoại Ngọc Hầu- danh nhân có công khai mở đất An Giang\r\n- Tham quan rừng tràm Trà Sư, du khách sẽ được bước đi trên - “Cầu tre vạn bước” với chiều dài hơn 2km len lỏi vào rừng\r\n- Viếng đền thờ dòng họ Mạc - dòng họ có công khai trấn vùng đất Hà Tiên', 'trasu.jpg', 'bachuaxu.jpg', 'chaudoc.jpg', '2025-04-14 23:36:37'),
(19, 19, 'Tour này có gì hay\r\n- Tham quan Giáo xứ Song Vĩnh là một công trình kiến trúc Gothic Phương Tây bên ngoài với màu xám đặc trưng của đá vô cùng ân tượng.\r\n- Tham quan Bảo tàng Vũ khí cổ Robert Taylor - nơi hiện trưng bày hơn 2000 hiện vật.\r\n- Tham quan Khu căn cứ Rừng Sác. Đến đây du khách sẽ được đắm mình trong không khí trong lành, xanh mát của rừng đước ngập mặn Cần Giờ', 'vungtau2.jpg', 'vungtau3.jpg', 'cangio.jpg', '2025-04-14 23:43:44'),
(20, 20, 'Tour này có gì hay\r\n- Tham quan suối khoáng nóng Bình Châu tham quan công viên rừng, khu luộc trứng,ngâm chân. Ngoài ra có các dịch vụ: xông hơi, tắm khoáng, ngâm hồ (tự túc chi phí). \r\n- Tham quan cầu ngắm biển Hồ Tràm “Hamptons Pier tại Hồ Tràm” cầu được thiết kế dài 270m sở hữu vẻ đẹp lãng mạn thoáng mát của thiên đường biển Hồ Tràm đang là điểm đến cực hot.', 'binhchau.jpg', 'binhchau3.jpg', 'resort_vungtau.jpg', '2025-04-14 23:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `tourid` int(11) NOT NULL,
  `content` text NOT NULL,
  `datecomment` timestamp NOT NULL DEFAULT current_timestamp(),
  `hide` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `userid`, `tourid`, `content`, `datecomment`, `hide`) VALUES
(1, 'Lê Phú Vinh', 1, 20, 'tour này rất tốt', '2025-05-17 06:00:53', 0),
(2, 'Lê Phú Vinh', 1, 14, 'Chuyến đi rất tuyệt vời', '2025-05-20 12:01:44', 0),
(3, 'Lê Phú Vinh', 1, 19, 'nên trải nghiệm sau một tuần làm việc căng thẳng ở thành phố Hồ Chí Minh', '2025-05-21 21:45:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customerfeedback`
--

CREATE TABLE `customerfeedback` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customerfeedback`
--

INSERT INTO `customerfeedback` (`id`, `fullname`, `email`, `title`, `content`, `date`) VALUES
(1, 'Lê Phú Vinh', 'lephuvinh30605@gmail.com', 'Nhận xét Tour', 'Tour rất tốt', '2025-05-02 15:57:03'),
(2, 'Lê Phú Vinh', 'lephuvinh30605@gmail.com', 'Nhận xét Tour', 'tour tốt', '2025-05-02 16:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `dieuchinhnews`
--

CREATE TABLE `dieuchinhnews` (
  `id` int(11) NOT NULL,
  `idnews` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dieuchinhnews`
--

INSERT INTO `dieuchinhnews` (`id`, `idnews`, `adminid`, `action`, `date`) VALUES
(1, 1, 1, 'Sửa', '2025-05-21 15:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `dieuchinhslide`
--

CREATE TABLE `dieuchinhslide` (
  `id` int(11) NOT NULL,
  `slideid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dieuchinhslide`
--

INSERT INTO `dieuchinhslide` (`id`, `slideid`, `adminid`, `action`, `date`) VALUES
(1, 1, 1, 'Sửa', '2025-05-21 15:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `dieuchinhtour`
--

CREATE TABLE `dieuchinhtour` (
  `id` int(11) NOT NULL,
  `tourid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dieuchinhtour`
--

INSERT INTO `dieuchinhtour` (`id`, `tourid`, `adminid`, `action`, `date`) VALUES
(1, 14, 1, 'Sửa', '2025-05-21 15:14:48'),
(2, 14, 1, 'Sửa', '2025-05-21 15:16:31'),
(3, 14, 1, 'Sửa', '2025-05-21 15:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `lichtrinhtour`
--

CREATE TABLE `lichtrinhtour` (
  `id` int(11) NOT NULL,
  `tourid` int(11) NOT NULL,
  `Ngay1` text NOT NULL,
  `Ngay2` text NOT NULL,
  `Ngay3` text NOT NULL,
  `Ngay4` text NOT NULL,
  `Ngay5` text NOT NULL,
  `Ngay6` text NOT NULL,
  `datebegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lichtrinhtour`
--

INSERT INTO `lichtrinhtour` (`id`, `tourid`, `Ngay1`, `Ngay2`, `Ngay3`, `Ngay4`, `Ngay5`, `Ngay6`, `datebegin`) VALUES
(1, 1, 'NGÀY 01: TP. HCM – HÀ NỘI – NGHĨA LỘ (Ăn trưa, chiều)\r\nBuổi sáng, quý khách tập trung tại Cổng D2 – Ga đi trong nước – SB.Tân Sơn Nhất. Hướng dẫn viên Lữ hành sẽ đón quý khách và hỗ trợ làm thủ tục. Khởi hành ra Hà Nội trên chuyến bay VN206 lúc 06h00. Đáp xuống sân bay Nội Bài, xe đưa đoàn đi Phú Thọ. Viếng khu di tích Đền Hùng – nơi đất tổ thiêng liêng, viếng đền Hạ, đền Trung, đền Thượng, lăng Vua Hùng. Tiếp tục hành trình đến Yên Bái, trên đường đoàn chiêm ngưỡng cánh đồng Mường Lò vào mùa thu hoạch. Buổi tối, đoàn thưởng thức các món ăn đặc sản địa phương và cùng giao lưu văn nghệ, tìm hiểu về phong tục, đời sống đồng bào dân tộc bản địa. Nghỉ đêm tại Nghĩa Lộ.', 'NGÀY 02: NGHĨA LỘ – MÙ CANG CHẢI – SAPA (Ăn sáng, trưa, chiều)\r\nSau bữa sáng, đoàn khởi hành đến Tú Lệ khám phá Động Tiên Nữ với vẻ đẹp nguyên sơ, hang đá kỳ vĩ cùng những thạch nhũ kết hợp với ánh sáng tạo cảnh đẹp lung linh và chút kỳ ảo. Khởi hành qua Tú Lệ đi Mù Cang Chải. Đoàn chinh phục đèo Khau Phạ, ngắm nhìn bản Lìm Mông – Lìm Thái xinh đẹp dưới chân đèo. Chiêm ngưỡng vẻ đẹp hút hồn của cung đường ruộng bậc thang nổi tiếng tại các xã La Pán Tẩn, Chế Cu Nha và Zế Xu Phình. Khởi hành đi Sapa, chinh phục đỉnh đèo Ô Quy Hồ. Buổi tối, đoàn tự do thăm nhà thờ đá, dạo chợ Sapa. Nghỉ đêm tại Sapa.', 'NGÀY 03: SAPA – FANSIPAN – LAI CHÂU (Ăn sáng, trưa, chiều)\r\nBuổi sáng, đoàn trải nghiệm tàu hỏa leo núi, ngắm cảnh thung lũng Mường Hoa trên cung đường đến Ga cáp treo Fansipan, quý khách tự túc chi phí trải nghiệm cáp treo, chinh phục đỉnh Fansipan với hệ thống cáp treo 3 dây hiện đại cảm giác như đi giữa biển mây, viếng khu tâm linh Fansipan, vượt gần 600 bậc thang, chinh phục “Nóc nhà Đông Dương” – đỉnh Fansipan 3,143m. Tiếp tục đi Lai Châu, trên đường đi đoàn ghé tham quan KDL Cổng Trời Ô Quy Hồ, nơi mang đến quý khách tầm nhìn tuyệt đẹp bao quát dãy Hoàng Liên Sơn hung vĩ. Buổi tối, đoàn tự do tham quan và khám phá thành phố về đềm. Nghỉ đêm tại Lai Châu.\r\nLựa chọn (tự túc chi phí tham quan):\r\n- Trải nghiệm cầu kính Rồng Mây và một số trò chơi cảm giác mạnh tại khu du lịch Cầu Kính Rồng Mây.', 'NGÀY 04: LAI CHÂU – ĐIỆN BIÊN (Ăn sáng, trưa, chiều)\r\nKhởi hành đi Điện Biên, đoàn đi ngang qua các địa danh: Phong Thổ, cầu Hang Tôm – ranh giới 2 tỉnh Điện Biên & Lai Châu, Mường Lay, Mường Chà,… Trên đường đi, đoàn có dịp chiêm ngưỡng khung cảnh hùng vĩ của núi rừng Tây Bắc. Buổi chiều, đoàn tham quan các di tích gắn liền với chiến thắng Điện Biên Phủ: bảo tàng chiến thắng Điện Biên Phủ, đồi A1, Hầm tướng De Castries, tượng đài chiến thắng Điện Biên Phủ (đồi D1), ngắm toàn cảnh thành phố Điện Biên Phủ từ trên cao. Nghỉ đêm tại Điện Biên.', 'NGÀY 05: ĐIỆN BIÊN – SƠN LA – MỘC CHÂU (Ăn sáng, trưa, chiều)\r\nKhởi hành chinh phục đèo Pha Đin – một trong những đường đèo dài và hiểm trở thuộc “Tứ đại đỉnh đèo” miền Bắc, ranh giới 2 tỉnh Điện Biên & Sơn La. Đến Mộc Châu, đoàn đến tham quan khu du lịch Mộc Châu Island. Quý khách tự do trải nghiệm hệ thống cầu kính Bạch Long – cầu kính đi bộ dài nhất thế giới, thưởng ngoạn cảnh quan thiên nhiên hùng vỹ (tự túc chi phí) ... Buổi tối, quý khách tự do khám phá thị trấn xinh đẹp hoặc ghé thăm phố đi bộ chợ đêm Mộc Châu. Nghỉ đêm tại Mộc Châu.', 'NGÀY 06: MỘC CHÂU – HÒA BÌNH – HÀ NỘI – TPHCM (Ăn sáng, trưa)\r\nĐoàn tham quan đồi chè Mocha Hill chụp ảnh, check -in, quý khách có dịp hoà mình không gian xanh mướt của đồi chè, chụp ảnh, check -in lưu lại khoảnh khắc tuyệt đẹp. Khởi hành về Hà Nội. Trên đường, đoàn dừng chân nghỉ ngơi tại Thung Khe – đèo Đá Trắng. Đến Hà Nội, xe đưa đoàn đến viếng chùa cổ Tây Phương, nổi tiếng với 18 pho tượng La Hán bằng gỗ độc đáo nơi gắn liền với lịch sử Phật giáo Việt Nam và là nơi tu hành của nhiều cao tăng xe đưa đoàn ra SB Nội Bài để về TPHCM trên chuyến bay VN263 lúc 20h00. Kết thúc chương trình.', '2025-04-15 08:11:34'),
(2, 2, 'NGÀY 01: TP.HCM – ĐIỆN BIÊN (Ăn trưa, chiều)\r\nBuổi sáng, quý khách tập trung tại Cổng D2 – Ga đi trong nước – SB.Tân Sơn Nhất. Hướng dẫn viên của Lữ hành sẽ đón quý khách và hỗ trợ làm thủ tục. Khởi hành ra Điện Biên trên chuyến bay sáng (tham khảo VJ298 lúc 7h10). Đáp xuống sân bay Điện Biên Phủ, xe đưa đoàn về trung tâm tham quan các di tích lịch sử - nơi ghi dấu chiến thắng 56 ngày đêm “Khoét núi ngủ hầm, mưa dầm cơm vắt” để làm lên chiến thắng Điện Biên Phủ lẫy lừng năm xưa: Cầu Mường Thanh, Hầm tướng De Castries, Bảo tàng chiến thắng Điện Biên Phủ, Nghĩa trang liệt sĩ Điện Biên Phủ, Đồi A1, tượng đài chiến thắng Điện Biên Phủ. Nghỉ đêm tại Điện Biên.', 'NGÀY 02: ĐIỆN BIÊN PHỦ LỊCH SỬ (Ăn sáng, trưa, chiều)\r\nSau bữa sáng, xe đưa đoàn đến thăm Di tích Lịch sử Mường Phăng – là sở chỉ huy của Đại tướng Võ Nguyên Giáp, Đại tướng Hoàng Văn Thái trong Chiến dịch Điện Biên Phủ năm xưa. Buổi chiều, đoàn đến Thành Bản Phủ, đền thờ Hoàng Công Chất – người có công giữ vững biên cương vùng Tây Bắc của Tổ Quốc. Buổi tối, đoàn thưởng thức các món ăn đặc sắc địa phương và cùng giao lưu văn nghệ, tìm hiểu về phong tục, đời sống đồng bào dân tộc Tây Bắc tại bản Mển hoặc bản Noong Chứn. Nghỉ đêm tại Điện Biên.', 'NGÀY 03: ĐIỆN BIÊN – TPHCM (Ăn sáng)\r\nSau bữa sáng, xe đưa đoàn ra sân bay Điện Biên để về TPHCM trên chuyến bay sáng (tham khảo VJ299 lúc 9h45). Kết thúc chương trình.', '', '', '', '2025-04-15 08:11:34'),
(3, 3, '05h00: Xe đón du khách tại 55B Phan Chu Trinh khởi hành đi chùa Hương. Sau 3 giờ đi ô tô qua thị xã Hà Đông đến bến Đục thì dừng xe để chuyển sang đi thuyền dọc suối Yến Vĩ chừng 3km thăm Đền Trình, Thiên Trù, du khách lên thăm Động Hương Tích - nơi chúa Trịnh Sâm đến vãn cảnh động đã tự tay đề năm chữ Hán lên cửa động \"Nam thiên đệ nhất động\" - là nơi phong cảnh hữu tình thờ đức Phật Quan Thế Âm Bồ Tát. Sau khoảng 1 giờ thăm quan quý khách quay trở lại khu vực chùa Thiên Trù ăn trưa, nghỉ ngơi. Chiều quý khách lên thăm quan và thắp hương tại chùa Thiên Trù – nơi được giải nghĩa là bếp của Trời. Quay trở lại thuyền về bến lên xe ôtô về Hà Nội.\r\n18h00: Xe đưa quý khách về tới Hà nội. Trả khách tại điểm hẹn ban đầu. Kết thúc chuyến thăm quan.', '', '', '', '', '', '2025-04-15 08:17:50'),
(4, 4, 'NGÀY 1: TP.HCM – HÀ NỘI – LÀNG HƯƠNG QUẢNG PHÚ CẦU – HỒ GƯƠM\r\nSáng: Đón khách tại sân bay Tân Sơn Nhất, bay đến Hà Nội.\r\nTrưa: Dùng bữa tại nhà hàng địa phương.\r\nChiều: Tham quan Làng hương Quảng Phú Cầu – làng nghề truyền thống rực rỡ sắc màu, nổi tiếng với những bó hương được phơi đều như những đóa hoa nở rộ.\r\nGhé Hồ Gươm, tham quan Tháp Rùa, cầu Thê Húc, đền Ngọc Sơn.\r\nTối: Nhận phòng khách sạn. Tự do khám phá Hà Nội về đêm, thưởng thức ẩm thực phố cổ (bún chả, phở Hà Nội, kem Tràng Tiền…).', 'NGÀY 2: LÀNG NÓN CHUÔNG – VĂN MIẾU – PHỐ CỔ HÀ NỘI\r\nSáng: Ăn sáng tại khách sạn. Khởi hành đi Làng nón Chuông – tìm hiểu quy trình làm nón lá truyền thống, trải nghiệm thử làm nón dưới sự hướng dẫn của nghệ nhân.\r\nTrưa: Ăn trưa tại nhà hàng với các món Bắc đặc trưng.\r\nChiều: Tham quan Văn Miếu – Quốc Tử Giám, trường đại học đầu tiên của Việt Nam. Dạo quanh Phố cổ Hà Nội, thưởng thức đặc sản, chụp ảnh các góc phố xưa.\r\nTối: Về khách sạn nghỉ ngơi hoặc tham gia hoạt động tự chọn như: đi chợ đêm, xem múa rối nước...', 'NGÀY 3: HÀ NỘI – MUA SẮM ĐẶC SẢN – TP.HCM\r\nSáng: Ăn sáng, trả phòng. Tham quan và mua sắm tại Chợ Đồng Xuân hoặc các cửa hàng đặc sản Hà Nội (trà sen, ô mai, bánh cốm…).\r\nTrưa: Ăn trưa tại nhà hàng.\r\nChiều: Di chuyển ra sân bay Nội Bài, đáp chuyến bay về lại TP.HCM. Kết thúc hành trình.', '', '', '', '2025-04-15 08:17:50'),
(5, 5, 'NGÀY 1: HÀ NỘI – HẠ LONG – ĐẢO TITOP   (ăn trưa, tối)     \r\n12:00: Lễ tân đón Quý khách tại Cảng tàu khách quốc tế Hạ Long. 12:30: Thuyền trưởng làm thủ tục đón Quý khách ra tàu bằng xuồng nhỏ.12:45: Lên tàu, Quý khách thưởng thức đồ uống chào mừng, nghe giới thiệu về hành trình, an toàn trong chuyến đi và nhận phòng nghỉ.13:00: Tàu nhổ neo rời Cảng tàu khách quốc tế Hạ Long đưa Quý khách khám phá kỳ quan thiên nhiên thế giới Vịnh Hạ Long. Quý khách dùng bữa trưa với những món ăn đặc sắc được chế biến từ các sản vật của địa phương (thực đơn tự chọn); Ngắm núi đá vôi với muôn hình đặc sắc của danh thắng Hạ Long huyền bí…15:00: Tàu thả neo tại khu vực hang Bồ Nâu, vùng lõi của di sản thế giới, xuồng nhỏ đưa Quý khách đi thăm hang Sửng Sốt - một trong những hang động đẹp nổi tiếng nhất Vịnh Hạ Long.15:45: Kết thúc thăm quan hang Luồn, xuồng nhỏ tiếp tục chở Quý khách đến thăm đảo Titop – hòn đảo mang tên người anh hùng vũ trụ Liên Xô - Gherman Titov được Hồ Chủ Tịch đặt tên từ năm 1962. Tại đây, Quý khách có thể tư do tắm biển hoặc leo núi. Trên đỉnh núi cao hơn 100m so với mặt nước biển, Quý khách có thế ngắm nhìn một góc Vịnh Hạ Long lung linh huyền ảo …17:00: Quý khách trở lại tàu tự do thư giãn, ngắm hoàng hôn trên biển. Tàu nhổ neo về điểm ngủ - Điểm Titop 587. 18:00-19:00: Tham gia chương trình \"Giờ Hạnh Phúc\", mua 1 đồ uống tặng 1 đồ uống (không áp dụng khi mua cả chai rượu).18:30: Tham gia lớp hướng dẫn làm món ăn truyền thống Việt Nam.19:00: Quý khách thưởng thức bữa tối (phục vụ tại bàn). 20:30: Sau bữa tối, Quý khách có thể xem phim (tại nhà hàng); câu mực; massage thư giãn (liên hệ quản lý tàu để báo giá dịch vụ)...', 'NGÀY 2: HANG SỬNG SỐT - HÀ NỘI\r\n06:00: Điện thoại báo thức (nếu Quý khách yêu cầu).\r\n06:30:Tham gia lớp thể dục dưỡng sinh buổi sáng trong 30 phút trên sân thượng.Tàu nhổ neo rời điểm ngủ hành trình đến hang Sửng Sốt.\r\n07:00: Quý khách được phục vụ bữa sáng nhẹ tại nhà hàng (cà phê, trà, sữa tươi, nước lọc, bánh ngọt, bánh mỳ, ngũ cốc).\r\n08:00: Quý khách thăm Hang Luồn bằng Kayak - một trong những hang mở đẹp với sự dạng về thảm thực vật đặc hữu của Vịnh Hạ Long. Quý khách sẽ thăm quan hang trên những chiếc thuyền nan của các ngư dân nơi đây (30.000đ/khách).\r\n09:00: Quý khách trở lại tàu nghỉ ngơi và làm thủ tục trả phòng. Vui lòng để hành lý ra cửa cabin, nhân viên sẽ chuyển lên cảng khi tàu cập bến. Tàu nhổ neo đưa Quý khách trở lại Cảng Cảng tàu khách quốc tế Hạ Long.\r\n09:30: Quý khách làm thủ tục trả phòng. Quý khách dùng bữa trưa sớm  và thanh toán hóa đơn dịch vụ (nếu có) tại nhà hàng.\r\n10:45: Tàu cập Cảng tàu khách quốc tế Hạ Long.\r\nChào tạm biệt Quý khách và kết thúc hành trình.', '', '', '', '', '2025-04-15 08:23:26'),
(6, 6, 'NGÀY 01: TP.HCM – HẢI PHÒNG – MÓNG CÁI -  MŨI SA VĨ (Ăn trưa, chiều)\r\nBuổi sáng, quý khách tập trung tại Cổng D2 – Ga đi trong nước – SB.Tân Sơn Nhất. Hướng dẫn viên Lữ hành sẽ đón quý khách và hỗ trợ làm thủ tục. Khởi hành ra Hải Phòng trên chuyến bay VN1176 lúc 07h45. Đáp xuống sân bay Cát Bi, xe đón đoàn đi Móng Cái. Buổi chiều, đoàn tham quan đình Trà Cổ - nơi tạo cảm hứng cho nhạc sĩ Nguyễn Cường sáng tác bài hát Mái Đình làng biển; xe đưa đoàn đi dọc biển Trà Cổ, đến chụp hình lưu niệm với biểu tượng, cột mốc nơi mũi Sa Vĩ thiêng liêng. Nghỉ đêm tại Móng Cái.\r\n\r\n', 'NGÀY 02: MÓNG CÁI – HẠ LONG (Ăn sáng, trưa, chiều)\r\nBuổi sáng, đoàn mua sắm tại chợ Trung Tâm, tham quan cửa khẩu Móng Cái (chụp ảnh lưu niệm bên ngoài). Khởi hành về Vân Đồn, viếng Thiền Viện Trúc Lâm Giác Tâm (chùa Cái Bầu), ngắm toàn cảnh vịnh Bái Tử Long yên bình. Tiếp tục đến Hạ Long theo trục đường ven biển qua khu dân cư hiện đại, tham quan bảo tàng Quảng Ninh. Nghỉ đêm tại Hạ Long.\r\nLựa chọn (tự túc chi phí di chuyển & tham quan):\r\n- Trải nghiệm xe bus 2 tầng vừa khai thác từ T2.2023, chiêm ngưỡng cảnh quan trên trục đường ven biển thành phố Hạ Long\r\n- Tham quan Quần thể Du lịch - Giải trí Sun World Hạ Long Park, gồm 2 khu công viên vui chơi ven biển Bãi Cháy và  trên núi Ba Đèo - được kết nối với nhau bởi hệ thống cáp treo vượt biển Nữ Hoàng đạt 2 kỷ lục thế giới (cabin có sức chứa lớn nhất thế giới và cáp treo có trụ cao nhất thế giới so với mặt đất). Trải nghiệm trò chơi mạo hiểm,  Vòng quay Mặt Trời - một trong những vòng quay cao nhất thế giới,...', 'NGÀY 03: HẠ LONG – NINH BÌNH – PHỐ CỔ HOA LƯ (Ăn sáng, trưa, chiều)\r\nBuổi sáng, quý khách lên thuyền du ngoạn vịnh Hạ Long – một trong 7 kỳ quan thiên nhiên mới của thế giới, chiêm ngưỡng động Thiên Cung, các hòn Đỉnh Hương – Trống Mái (Gà Chọi) – Chó Đá. Đoàn khởi hành đi Ninh Bình. Buổi tối, đoàn tự do khám phá phố cổ Hoa Lư, ngắm tháp Chùa Bạc lung linh ánh đèn soi bóng bên hồ Kỳ Lân. Nghỉ đêm tại Ninh Bình.', 'NGÀY 04: NINH BÌNH – TRÀNG AN – NỘI BÀI – TPHCM (Ăn sáng, trưa)\r\nSau bữa sáng, đoàn trả phòng, tham quan Khu du lịch Tràng An – có cảnh quan ngoạn mục với hệ thống sông, suối chảy tràn trong các thung lũng, các hang xuyên thủy động, các dãy núi đá vôi trùng điệp. KDL nằm trong quần thể danh thắng Tràng An đã được UNESCO công nhận di sản hỗn hợp đầu tiên của Việt Nam và khu vực ĐNÁ (đạt cả hai tiêu chí về văn hóa và thiên nhiên). … Tiếp tục đến tham quan động Am Tiên (Tuyệt Tình Cốc). Khởi hành về Hà Nội, đoàn đến tham quan Bảo Tàng Lịch Sử Quân Sự Việt Nam, bảo tàng quan trọng và nổi bật bậc nhất Việt Nam, nơi trưng bày các giá trị lịch sử quân sự đất nước, xe đưa đoàn ra sân bay Nội Bài để về TPHCM trên chuyến bay VN265 lúc 20h30. Kết thúc chương trình.', '', '', '2025-04-15 08:23:26'),
(7, 7, 'NGÀY 01: HÀ NỘI – SAPA – BẢN CÁT CÁT (Ăn trưa, tối)\r\n06h15: Xe trung chuyển đón quý khách tại điểm hẹn trong khu vực quận Hoàn Kiếm/quận Ba Đình/ quận Đống Đa lên xe giường nằm khởi hành đi Sapa (dự kiến 06h45).\r\n13h00: Đến Sapa, hướng dẫn viên đón đoàn dùng bữa trưa. Sau đó về khách sạn nhận phòng, nghỉ ngơi.\r\n15h00: Xe và hướng dẫn viên đưa đoàn đi tham quan bản Cát Cát - một bản cổ của người H’Mông, thăm thác nước Cát Cát, thuỷ điện Cát Cát nơi có ba con suối gặp nhau tạo thành thung lũng Mường Hoa. Sau đó, quý khách tự do khám phá Sapa (tự túc chi phí) như Nhà Thờ Đá, Hồ Sapa... Mua sắm đồ tại các dãy phố...\r\n18h00: Sau bữa tối, quý khách tự do dạo chơi chợ đêm Sapa, thưởng thức các món nướng đặc sắc vùng cao. Nghỉ đêm tại Sapa.', 'NGÀY 02: CHINH PHỤC FANSIPAN/CẦU KÍNH RỒNG MÂY – PƠ MU SAPA (Ăn sáng, trưa)\r\nQuý khách dùng bữa sáng tại khách sạn. 07h30 Quý khách tự do lựa chọn các điểm tham quan (hdv hỗ trợ tư vấn cho khách) – chi phí vé tự túc\r\n(báo phí có trong mục dưới giá tour):\r\n- Lựa chọn 1: HDV đưa quý khách tới nhà Ga SAPA để chinh phục đỉnh Fansipan, trải nghiệm:\r\nTàu hỏa leo núi Mường Hoa .Đến Ga cáp treo, tiếp tục hành trình khám phá Sun World Fansipan Legend\r\nvới cáp treo ba dây hiện đại nhất TG băng qua dãy Hoàng Liên Sơn, chinh phục đỉnh Fansipan - nóc nhà Đông Dương và chiêm bái quần thể văn hóa tâm linh trên đỉnh Fansipan.\r\n- Lựa chọn 2 : Đến với Cầu Kính Rồng Mây (chi phí vé tự túc) cách trung tâm thị trấn Sapa 17km, tại đây quý khách sẽ có trải nghiệm hết sức thú vị như: đi thang máy trong lòng núi, săn mây, chụp ảnh cùng những khung cảnh núi non hùng vĩ vừa đẹp, vừa nên thơ.\r\n11h30: Quý khách dùng bữa trưa tại khách sạn hoặc nhà hàng.. Sau đó về lại khách sạn nghỉ ngơi.\r\n15h00: Hướng dẫn viên đưa quý khách đến PƠ MU SAPA – là tổ hợp cafe check in gồm công viên hoa, quầy cà phê, nhà hàng có view ngắm toàn bộ dãy Hoàng Liên Sơn cùng đỉnh Fansipan hùng vĩ.\r\n18h30: Dùng bữa tối ấm cúng. Sau bữa tối, quý khách tự do thư giãn thưởng thức không khí núi rừng Tây Bắc. Quý khách có thể trải\r\nnghiệm dịch vụ tắm lá thuốc Dao đỏ để thư giãn sau một ngày thăm quan để thư giãn và hồi phục sức\r\nkhỏe (chi phí tự túc)....', 'NGÀY 03: SAPA – MOANA SAPA VIEW- HÀ NỘI  (Ăn sáng, trưa)\r\nQuý khách dùng bữa sáng tại khách sạn.\r\n07h30: Hướng dẫn viên đưa quý khách đến với MOANA SAPA (chi phí tự túc) – được ví như 1 phim trường thu nhỏ giữa lòng thành phố Sapa (có thể di chuyển bằng xe máy/ taxi – tùy tình trạng thực tế):\r\nQuý khách trải nghiệm & chụp hình tại Moana Sapa: Cổng trời Bali; Tượng Moana; Hồ Vô Cực\r\n11h00: Đoàn làm thủ tục trả phòng, dùng bữa trưa. Quý khách có mặt tại văn phòng xe hoặc bến xe Sapa lên xe giường nằm khởi hành về Hà Nội (dự kiến chuyến 12h30 hoặc 13h00). Về đến trung tâm Tp Hà Nội, quý khách tự túc phương tiện trở về nhà.', '', '', '', '2025-04-15 08:28:14'),
(8, 8, 'NGÀY 1: TP. HỒ CHÍ MINH – HÀ NỘI – SAPA (TỰ DO KHÁM PHÁ PHỐ NÚI)\r\nSáng: Đoàn tập trung tại sân bay Tân Sơn Nhất, làm thủ tục bay ra Hà Nội. Xe đón đoàn tại sân bay Nội Bài, khởi hành đi Sapa theo đường cao tốc Hà Nội – Lào Cai.\r\nTrưa: Dùng bữa tại nhà hàng trên đường đi.\r\nChiều: Đến thị trấn Sapa, nhận phòng khách sạn, nghỉ ngơi. Tự do dạo phố núi, check-in tại nhà thờ đá Sapa, thưởng thức không khí mát lành vùng cao.\r\nTối: Ăn tối và tự do khám phá chợ đêm Sapa, thưởng thức đồ nướng, mua đồ thổ cẩm', 'NGÀY 2: FANSIPAN – BẢN CÁT CÁT – TẮM LÁ THUỐC NGƯỜI DAO\r\nSáng: Ăn sáng, sau đó đi chinh phục đỉnh Fansipan – “Nóc nhà Đông Dương” bằng cáp treo 3 dây hiện đại. Tự do tham quan và chụp ảnh tại đỉnh Fansipan (3.143m), nơi có tượng Phật A Di Đà, Đại hồng chung, vườn hoa...\r\nTrưa: Dùng cơm tại nhà hàng dưới chân núi.\r\nChiều: Tham quan bản Cát Cát – làng dân tộc H’Mông cổ kính với nghề dệt thổ cẩm, rèn bạc, làm giấy dó. Trải nghiệm tắm lá thuốc người Dao đỏ (chi phí tự túc) – phương pháp thư giãn độc đáo của vùng cao.\r\nTối: Ăn tối và nghỉ đêm tại Sapa.', 'NGÀY 3: SAPA – HÀ KHẨU (TRUNG QUỐC) – LÀO CAI\r\nSáng: Dùng điểm tâm sáng, trả phòng khách sạn. Di chuyển về thành phố Lào Cai, làm thủ tục xuất cảnh sang Hà Khẩu (Trung Quốc) – tham quan và mua sắm tại khu phố đi bộ, chợ địa phương.\r\nTrưa: Ăn trưa tại Hà Khẩu hoặc Lào Cai.\r\nChiều: Quay về lại Lào Cai, tham quan đền Thượng, đền Mẫu, chụp ảnh tại cột mốc biên giới 102 Việt – Trung.\r\nTối: Di chuyển về lại Hà Nội, nghỉ đêm tại khách sạn gần sân bay Nội Bài (hoặc tiếp tục bay chuyến tối về TP.HCM nếu muốn rút ngắn thời gian – tùy chọn).', 'NGÀY 4: HÀ NỘI – TP. HỒ CHÍ MINH\r\nSáng: Dùng bữa sáng, thư giãn, tự do mua sắm đặc sản tại Hà Nội.\r\nTrưa: Di chuyển ra sân bay Nội Bài, làm thủ tục về lại TP. Hồ Chí Minh.\r\nChiều: Đáp xuống sân bay Tân Sơn Nhất. Kết thúc tour, chia tay và hẹn gặp lại.', '', '', '2025-04-15 08:28:14'),
(9, 9, 'NGÀY 01: TP. HCM – ĐÀ NẴNG – HỘI AN – TẶNG VÉ CV ẤN TƯỢNG & SHOW KÝ ỨC HỘI AN (Ăn trưa, chiều)\r\nBuổi sáng, quý khách tập trung tại Cổng D2, Ga đi trong nước, sân bay Tân Sơn Nhất. Hướng dẫn viên Lữ hành sẽ đón quý khách, hỗ trợ làm thủ tục. Khởi hành ra Đà Nẵng trên chuyến bay VN110 lúc 06h55. Đến Đà Nẵng, đoàn tham quan bán đảo Sơn Trà, ngắm cảng Tiên Sa, viếng chùa Linh Ứng Bãi Bụt - ngôi chùa lớn nhất ở thành phố Đà Nẵng, chiêm bái tượng Phật Quan Thế Âm cao nhất Việt Nam, đoàn dùng bữa trưa. Buổi chiều, đoàn tham quan Ngũ Hành Sơn và làng nghề điêu khắc đá Hòa Hải. Khởi hành vào Hội An tham quan Phố cổ Hội An với các công trình tiêu biểu: chùa cầu, chùa Ông, hội quán Phúc Kiến, phố đèn lồng. Công viên Ấn tượng Hội An – tái hiện Hội An của quá khứ, một cảng thị quốc tế sầm uất với sự hiện diện của các nền văn hóa Á, Âu với rất nhiều mini show tương tác … Đặc biệt xem Show “Ký Ức Hội An” - vở diễn thực cảnh ngoài trời với số lượng diễn viên đạt kỷ lục Việt Nam, tái hiện nhịp nhàng sinh động miền ký ức Faifo đa văn hóa: Champa, Bồ Đào Nha, Nhật, Trung… chứng kiến cuộc sống thôn quê bình dị bên dòng sông Hoài, khoảnh khắc hùng tráng trong lịch sử, nét hoàng kim của cảng thị một thời hay phố Hội nhộn nhịp của hiện tại... Sau khi xem show đoàn quay về Đà Nẵng. Nghỉ đêm tại Đà Nẵng.', 'NGÀY 02: ĐÀ NẴNG – KDL BÀ NÀ – CÀU VÀNG (Ăn sáng, chiều)\r\nSau bữa sáng, quý khách sẽ được tự do tham quan hoàn toàn. Lữ hành Saigontourist xin phép gợi ý 3 chương trình để quý khách tham khảo: \r\n- Lựa chọn 1 (Tự túc ăn trưa) Tự do để khám phá Hội An hoặc TP.Đà Nẵng. Quý khách có thể ra sông Hàn ngắm cầu Rồng - một trong những con rồng thép lớn nhất thế giới, cầu Trần Thị Lý - với kiến trúc tựa con thuyền căng buồm vươn ra biển lớn, tượng Cá chép hóa rồng - một biểu tượng mang đậm tính nghệ thuật và tín ngưỡng dân gian, cầu Tình Yêu - cây cầu trái tim với những ổ khóa dễ thương trên thành cầu rất thú vị và lãng mạn. Hoặc đến chợ Hàn (hoặc chợ Cồn), mua sắm đặc sản địa phương. Quý khách tự túc ăn trưa, trải nghiệm phong vị ẩm thực độc đáo của Đà Nẵng.\r\n- Lựa chọn 2 (Cáp treo Bà Nà Hills & tự túc ăn trưa): Xe đưa quý khách đến Ga cáp treo của KDL Bà Nà Hills. Lên Bà Nà bằng cáp treo, dạo bước trên Cầu Vàng tọa lạc tại Vườn Thiên Thai. Viếng chùa Linh Ứng, khám phá Fantasy Park - khu vui chơi giải trí trong nhà và trò chơi Hiệp sĩ Thần thoại (Máng trượt). Dạo bộ giữa Khu làng Pháp một không gian kiến trúc tái hiện sinh động nước Pháp thời cận đại đầy lãng mạn, sang trọng và lịch lãm. Trải nghiệm Tàu hỏa leo núi, tham quan vườn hoa, Hầm rượu cổ Debay (không bao gồm thưởng thức rượu vang). Trải nghiệm Tàu hỏa leo núi số 2 qua Lâu Đài công trình mới tại KDL Bà Nà được đưa vào hoạt động năm 2022. Tự túc chi phí khám phá Khu trưng bày tượng sáp - duy nhất tại Việt Nam. Ăn trưa tự túc tại Bà Nà. Xe đưa quý khách về lại TP.Đà Nẵng.\r\n- Lựa chọn 3 (Combo cáp treo + buffet trưa tại Bà Nà Hills): Xe đưa quý khách đến Ga cáp treo KDL Bà Nà Hills. Đoàn tự do tham quan như lựa chọn 2. Đến trưa, ăn buffet trưa tại Bà Nà Hills. Xe đưa quý khách về lại TP.Đà Nẵng.\r\nNghỉ đêm tại Đà Nẵng.', 'NGÀY 03: ĐÀ NẴNG – LA VANG – QUẢNG BÌNH (Ăn sáng, trưa, chiều)\r\nBuổi sáng, quý khách trả phòng. Khởi hành đi Quảng Bình. Dừng chân tại Quảng Trị, viếng nhà thờ La Vang, Trên hành trình ngang qua Vĩ tuyến 17, tham quan di tích Cầu Hiền Lương, Sông Bến Hải - nơi đã từng là giới tuyến của hai miền Nam – Bắc. Đến Quảng Bình, nhận phòng và nghỉ đêm Quảng Bình.', 'NGÀY 04: QUẢNG BÌNH – ĐỘNG THIÊN ĐƯỜNG – HUẾ (Ăn sáng, trưa, chiều)\r\nBuổi sáng, quý khách trả phòng. Đoàn đi tham quan động Thiên Đường – một trong những hang động kỳ vĩ và dài nhất thế giới với muôn trạng thạch nhũ và măng đá, mang vẻ đẹp lộng lẫy tựa một “Hoàng cung dưới lòng đất”. Buổi chiều khởi hành về Huế theo đường Hồ Chí Minh. Buổi tối, đi thuyền trên sông Hương và thưởng thức ca hò Huế. Nghỉ đêm tại Huế.', 'NGÀY 05: HUẾ – TPHCM (Ăn sáng, trưa)\r\nBuổi sáng, tham quan Di sản Văn hóa Thế giới Kinh Thành Huế - Hoàng cung của 13 vị Vua triều Nguyễn với các công trình tiêu biểu: Ngọ Môn, điện Thái Hoà, Tử Cấm Thành, Thế Miếu, Hiển Lâm Các, Cửu Đỉnh,… Đoàn vãng cảnh chùa Thiên Mụ - ngôi chùa cổ và nổi tiếng nhất ở đất Cố Đô. Buổi chiều, xe đưa đoàn viếng lăng Khải Định – chiêm ngưỡng một công trình kết hợp hài hòa giữa kiến trúc truyền thống Huế và hiện đại của Tây phương. Xe khởi hành ra sân bay Phú Bài để về TPHCM trên chuyến bay VN1375 lúc 17h40. Kết thúc chương trình. Quý khách tự túc phương tiện từ sân bay TSN về nhà\r\n\r\n', '', '2025-04-15 08:31:31'),
(10, 10, 'NGÀY 01: HÀ NỘI– ĐÀ NẴNG    (Ăn tối)\r\nSáng: Quý khách tập trung tại 55B Phan Chu Trinh, Hoàn Kiếm, Hà Nội hoặc ga đi trong nước, sân bay Nội Bài (Hà Nội). Hướng dẫn viên hỗ trợ làm thủ tục cho chuyến bay khởi hành đi Đà Nẵng (chuyến bay dự kiến VN173 14h35 - 16h00). Đến Đà Nẵng, xe đón đoàn tại sân bay và đưa về khách sạn nhận phòng nghỉ ngơi. Chiều: Tham quan Bảo Tàng Đà Nẵng - lưu giữ các hiện vật quý giá về lịch sử & văn hóa. Tiếp tục tham quan Chùa Linh Ứng- nổi tiếng với bức tượng Phật Bà Quan Âm cao 67m. Quý khách tự do tắm biển Mỹ Khê, một trong những bãi biển đẹp nhất Đà Nẵng. Tối: Dùng bữa tối tại nhà hàng với các món ăn đặc sản của Đà Nẵng. Tự do khám phá Đà Nẵng về đêm, tham quan Cầu Rồng, Cầu Tình Yêu và thưởng thức đặc sản. Quý khách nghỉ đêm tại khách sạn theo tiêu chuẩn đăng ký.', 'NGÀY 2: KHU DU LỊCH BÀ NÀ - ĐÀ NẴNG     (Ăn sáng, tối)\r\nSáng: Sau khi ăn sáng, đoàn bắt đầu hành trình tham quan Khu du lịch Bà Nà Hills. (chi phí tụ túc)\r\nQuý khách di chuyển bằng cáp treo đạt 2 kỷ lục Guinness, tận hưởng không khí mát mẻ và ngắm toàn cảnh núi non hùng vĩ. Đến Bà Nà, tham quan Chùa Linh Ứng, ngắm cảnh đẹp từ cầu Vàng nổi tiếng với đôi bàn tay khổng lồ nâng đỡ cây cầu. Trưa: Dùng bữa trưa tại Bà Nà, sau đó tự do khám phá Fantasy Park – khu vui chơi giải trí trong nhà đẳng cấp quốc tế với các trò chơi cảm giác mạnh, phù hợp cho mọi lứa tuổi. Chiều: Quý khách tiếp tục tham quan Làng Pháp tại Bà Nà với các công trình kiến trúc cổ điển. Quay lại Đà Nẵng, quý khách nghỉ ngơi tại khách sạn. Tối: Dùng bữa tối tại nhà hàng địa phương. quý khách trở lại khách sạn, tự do khám phá về đêm.', 'NGÀY 3: RỪNG DỪA BẢY MẪU – PHỐ CỔ HỘI AN   (Ăn sáng, trưa, tối)\r\nSáng: Sau bữa sáng và trả phòng, xe đưa quý khách tham quan Rừng Dừa Bảy Mẫu tại Cẩm Thanh, Hội An. Tại đây, quý khách tham gia trải nghiệm bơi thuyền thúng qua những con lạch dừa nước và tham gia hoạt động đua thuyền thúng đầy thú vị.Khám phá các hoạt động nông nghiệp truyền thống, như bắt cua, bắt cá, và học cách dùng vải chài. Trưa: Quý khách dùng bữa trưa tại nhà hàng địa phương tại Hội An, thưởng thức các món ăn đặc sản của khu vực như cao lầu, mỳ Quảng. Chiều: Quý khách nhận phòng khách sạn tại Hội An và nghỉ ngơi. Sau đó, tự do tham quan Phố Cổ Hội An, một di sản văn hóa thế giới với các điểm tham quan như Chùa Cầu Nhật Bản, Hội Quán Phúc Kiến, và Khu phố Đèn Lồng. Quý khách có thể tự do tham quan, mua sắm các sản phẩm thủ công mỹ nghệ tại các cửa hàng trong khu phố cổ. Tối: Quý khách dùng bữa tối tại nhà hàng và tự do khám phá Hội An về đêm với những ánh đèn lồng rực rỡ. Quý khách nghỉ tại khách sạn tiêu chuẩn đã đăng ký.', 'NGÀY 04: HỘI AN – ĐÀ NẴNG – HÀ NỘI   (Ăn sáng, trưa)\r\nSáng: Quý khách tự do tắm biển và nghỉ ngơi tại khách sạn đến giờ trả phòng. xe đưa quý tham quan Chợ Hàn và mua sắm đặc sản, quà lưu niệm trước khi ra sân bay. Trưa: Quý khách ăn trưa tại nhà hàng địa phương (tùy theo giờ bay). Sau bữa trưa, đoàn di chuyển ra sân bay Đà Nẵng, chuẩn bị cho chuyến bay về Hà Nội (chuyến bay dự kiến VN180 (18h05 - 19h30). Xe đón quý khách từ sân bay và đưa về điểm đón ban đầu. Kết thúc chương trình tour. (Quý khách tự túc phương tiện về lại nhà).', '', '', '2025-04-15 08:31:31'),
(11, 11, 'NGÀY 01: QUÝ KHÁCH CÓ THỂ LỰA CHỌN 1 TRONG 2 PHƯƠNG THỨC DI CHUYỂN NHƯ SAU :\r\nTP. HỒ CHÍ MINH - NHA TRANG – THÁC YANG BAY (Ăn sáng, trưa, chiều)\r\nĐón du khách tại văn phòng lữ hành, khởi hành đi Nha Trang. Trên đường đi du khách sẽ được khám phá những cung đường cao tốc mới của khu vực phía Nam : TP.HCM – Long Thành - Dầu Giây – Phan Thiết – Vĩnh Hảo. Xe đưa du khách tham quan Thác Yang Bay nổi tiếng bởi vẻ đẹp hoang sơ giữa cánh rừng nguyên sinh ngập tràn màu xanh. Xem biểu diễn nhạc cụ dân tộc Raglay. Thử cảm giác mạnh Câu cá sấu (Quý khách được miễn phí 1 lần câu cá sấu). Tắm khoáng nóng tại Hocho giữa đại ngàn. Chụp hình lưu niệm với các cảnh quan nghệ thuật. Buổi chiều xe đưa du khách về Nha Trang, du khách nhận phòng nghỉ ngơi. Nghỉ đêm tại Nha Trang.', 'NGÀY 02: NHA TRANG – ĐẢO HOA LAN (Ăn sáng, trưa, chiều)\r\nBuổi sáng, xe đưa du khách đến Bến Nha Phu (bến tàu du lịch Long Phú), lên tàu cao tốc di chuyển đến Khu du lịch Đảo Hoa Lan là vùng đất đa địa hình với biển, núi, rừng, suối, thác. Du khách tự do tham quan phong cảnh đảo, tản bộ trên con đường Hoa Lan, checkin cầu cảng đảo Hoa lan, cây đàn guitar khổng lồ, vườn Disney, vòi nước thần kỳ. Khu đa dạng sinh học rừng Khánh Hòa, khu vườn Bướm, thân thiện chụp hình lưu niệm với đàn Hươu, Đà Điểu, xem biểu diễn chim (từ tháng 2 đến tháng 8). Tự do thư giãn tại bãi biển, ghế lều tại bãi biển, tắm nước ngọt. Tham gia các trò chơi thể thao trên biển như moto nước, dù bay, chèo thuyền kayak (chi phí tự túc). Dùng bữa trưa tại nhà hàng trên đảo.\r\nBuổi chiều trên đường về dừng chân tham quan chụp ảnh tại Vega City Nha Trang - quần thể bất động sản phức hợp nghệ thuật, nghỉ dưỡng, giải trí hàng đầu tại Nha Trang, dạo bộ quanh Vega Shopping Continental Plaza, chụp ảnh lưu niệm với các dãy nhà đầy màu sắc và hàng trăm artwork, khu tiểu cảnh độc đáo, Nhà hát Đó với kiến trúc văn hóa bản địa độc đáo,… Xe đưa đoàn về khách sạn nghỉ ngơi. Nghỉ đêm tại Nha Trang.', 'NGÀY 03: NHA TRANG – CHÙA LONG SƠN – LÀNG YẾN MAI SINH (Ăn sáng, trưa)\r\nBuổi sáng, xe đưa du khách tham quan xe đưa đoàn viếng Chùa Long Sơn được biết tới là ngôi cổ tự lâu đời ở Nha Trang. Nơi đây sở hữu bức tượng Phật Tổ ngoài trời lớn nhất được ghi tên vào sách kỷ lục Guiness Việt Nam. Quý khách ghé tham quan Làng Yến Mai Sinh - tận mắt chiêm ngưỡng mô hình hang Yến, tìm hiểu quá trình chim Yến làm tổ, quy trình thu hái, tinh chế, nếm thử các sản phẩm làm từ tổ Yến.\r\nBuổi chiều, du khách tự do khám phá thành phố biển về đêm và thưởng thức ẩm thực địa phương (chi phí tự túc). Nghỉ đêm tại Nha Trang.\r\nLựa chọn:\r\n- Tham quan Khu vui chơi giải trí Vinwonder với Khu trò chơi trong nhà hoặc chinh phục thử thách cao độ từ hàng chục trò chơi cảm giác mạnh tại Khu trò chơi ngoài trời và Công viên nước ngọt trên bãi biển đầu tiên & duy nhất tại Việt Nam; Phòng chiếu phim 4D; Chương trình biểu diễn nhạc nước (tự túc chi phí di chuyển và tham quan)\r\n- Tham quan Bến du thuyền Ana Marina vịnh Nha Trang - là bến du thuyền được đầu tư theo chuẩn quốc tế đầu tiên và duy nhất tại Việt Nam, điểm thu hút đông đảo du khách đến tham quan thời gian gần đây (tự túc chi phí di chuyển và tham quan).', 'NGÀY 04: NHA TRANG - TP. HỒ CHÍ MINH (Ăn sáng, trưa)\r\nSau khi ăn sáng quý khách nghỉ ngơi đến giờ trả phòng. Đoàn khởi hành về TP. Hồ Chí Minh. Đi cao tốc mới của khu vực phía Nam. Đến Tp. Hồ Chí Minh, xe đưa quý khách về văn phòng lữ hành Saigontourist số 19 Hoàng Việt, Phường 4, Quận Tân Bình. Kết thúc chuyến tham quan./.', '', '', '2025-04-15 08:34:09'),
(12, 12, 'NGÀY 01: HÀ NỘI– NHA TRANG    (Ăn tối)\r\n10h30: Quý khách tập trung tại 55B Phan Chu Trinh, Hoàn Kiếm, Hà Nội hoặc ga đi trong nước, sân bay Nội Bài (Hà Nội). Hướng dẫn viên hỗ trợ làm thủ tục cho chuyến bay khởi hành đi Nha Trang (chuyến bay dự kiến VN1559 1315  - 1510). Đến Cam Ranh, đoàn khởi xe đón và đưa đoàn về khách sạn, làm thủ tục nhận phòng và ăn trưa. Chiều: Đoàn khởi hành tham quan Tháp Bà Ponagar, một trong những di tích lịch sử và văn hóa nổi tiếng của Nha Trang, nơi thờ các vị thần Hindu. Tiếp tục hành trình tham quan Chùa Long Sơn, ngôi chùa nổi tiếng với tượng Phật trắng khổng lồ. Tắm biển Nha Trang: Sau khi tham quan, đoàn có thể thư giãn tắm biển tại bãi biển Nha Trang, tận hưởng làn nước trong xanh. Tối: Quý khách tự do khám phá Nha Trang về đêm, thưởng thức các món hải sản tươi ngon. Quý khách nghỉ đêm tại khách sạn theo tiêu chuẩn đăng ký.\r\n\r\n', 'NGÀY 2: KHÁM PHÁ HÒN TẰM BẰNG CANO (chi phí tự túc)    (Ăn sáng và tối)\r\nSáng: Sau bữa sáng, xe đưa đoàn ra cảng Nha Trang, lên tàu khởi hành tham quan Hòn Tằm – một trong những hòn đảo đẹp nhất ở Nha Trang.Tại đây, quý khách có thể tắm biển, tham gia các hoạt động như lặn biển ngắm san hô / chèo thuyền kayak. Trưa: Quý khách thưởng thức bữa trưa hải sản tươi sống trên đảo. Chiều: Tự thư giãn trên bãi biển Hòn Tằm hoặc tham gia các trò chơi thể thao dưới nước (chi phí tự túc). Trở về đất liền và xe đưa đoàn về khách sạn nghỉ ngơi. Tối: Quý khách ăn tối tại nhà hàng địa phương và tự do khám phá Nha Trang về đêm. Quý khách nghỉ đêm tại khách sạn theo tiêu chuẩn đăng ký.', 'NGÀY 3: KHÁM PHÁ VINWONDER NHA TRANG  (chi phí tự túc)    (Ăn sáng và tối)\r\nSáng: Sau bữa sáng, xe đưa đoàn đến Vinpearl Land Nha Trang (công viên giải trí lớn nhất ở Nha Trang).\r\nQuý khách có thể tham gia vào các trò chơi hấp dẫn tại công viên nước, công viên giải trí, khu vui chơi mạo hiểm, hoặc thưởng thức các chương trình biểu diễn nghệ thuật đặc sắc.\r\nTrưa: Quý khách ăn trưa tại nhà hàng trong khu vực Vinpearl Land. Chiều: Tiếp tục tham quan và vui chơi tại Vinpearl Land: Quý khách có thể tham gia vào các trò chơi dưới nước, tham quan thuỷ cung Vinpearl, hoặc thưởng thức những màn biểu diễn hấp dẫn. Tối: Quý khách ăn tối tại Vinpearl Land hoặc trở về khách sạn ăn tốii, tự do khám phá Nha Trang về đêm. Xe đưa quý khách trở lại khách sạn, tự do khám phá  về đêm.', 'NGÀY 04: NHA TRANG - HÀ NỘI/TPHCM      (Ăn sáng, trưa)\r\nSáng: Quý khách tự do tắm biển và nghỉ ngơi tại khách sạn đến giờ trả phòng. Sau đó, xe đưa quý khách đi trung tâm mua săm (chợ Nha Trang) – những đặc sản nổi tiếng của Nha Trang. Trưa: Đoàn dùng bữa trưa tại nhà hàng. Sau bữa trưa, đoàn di chuyển ra sân bay Cam Ranh, chuẩn bị cho chuyến bay về Hà Nội (chuyến bay dự kiến VN1558 15h35 - 17h35). Xe đón quý khách từ sân bay và đưa về điểm đón ban đầu. Kết thúc chương trình tour. (Quý khách tự túc phương tiện về lại nhà).', '', '', '2025-04-15 08:34:09'),
(13, 13, 'NGÀY 01: TP. HỒ CHÍ MINH - ĐÀ LẠT (Ăn sáng, trưa, chiều)\r\nĐón quý khách tại văn phòng lữ hành, khởi hành đi Đà Lạt. Đến Đà Lạt tham quan Quảng trường Lâm Viên với không gian rộng lớn, thoáng mát hướng ra hồ Xuân Hương cùng công trình nghệ thuật khối bông hoa dã quỳ và khối nụ hoa Atiso khổng lồ được thiết kế bằng kính màu rất đẹp mắt. Du khách tự do dạo thành phố Đà Lạt về đêm, thưởng thức nhịp sống phố núi. Nghỉ đêm tại Đà Lạt.', 'NGÀY 02: THAM QUAN ĐÀ LẠT (Ăn sáng, trưa)\r\nSau khi dùng bữa sáng, xe đưa đoàn đi ngang qua làng hoa Vạn Thành sau đó trải nghiệm cung đường uốn lượn tuyệt đẹp của đèo Tà Nung để đến với Mongo Land - nơi được mệnh danh là tiểu Mông Cổ ở Đà Lạt với hàng ngàn góc check-in sống ảo siêu dễ thương như khu vực lều Mông Cổ, cối xay gió, sa mạc xương rồng, ruộng cỏ Tây Bắc, nông trại thú cưng như lạc đà Alpaca, hươu sao, dê mini, thỏ sư tử...Qúy khách tham gia trò chơi trượt cỏ, hóa thân thành những chàng trai cô gái du mục (chi phí thuê trang phục tự túc), cùng trải nghiệm đường trượt phao khô dài nhất Đà Lạt với nguồn cảm hứng từ dải lụa cầu vồng trên thảo nguyên đầy màu sắc. Buổi chiều, quý khách tự do dạo hồ Xuân Hương, chợ Đà Lạt, mua sắm đặc sản và tự túc thưởng thức đặc sản phố núi. Nghỉ đêm tại Đà Lạt.\r\nLựa chọn: (tự túc chi phí di chuyển và vé tham quan)\r\n- Tham dự đêm giao lưu văn hóa cồng chiêng với người dân tộc Tây Nguyên và uống rượu Cần.\r\n- Tham quan Vườn ánh sáng Lumiere - tổ hợp 7 khu giải trí với công nghệ 3D mapping đầy hư ảo.', 'NGÀY 03: THAM QUAN ĐÀ LẠT (Ăn sáng, trưa, chiều)\r\nBuổi sáng, xe đưa quý khách đến Đồi chè Cầu Đất với đồi quạt gió khổng lồ bên những luống trà dưới nền trời biếc xanh, trải nghiệm khu cầu gỗ săn mây, ghé quán cà phê Phin Deli nổi bật giữa bạt ngàn núi rừng... (chi phí tự túc). Đoàn dừng chân viếng Chùa Linh Phước - một trong những công trình kiến trúc cổ kính mang đậm đà bản sắc văn hóa, ngôi chùa đạt nhiều kỷ lục gia nhất từ trước tới giờ. Buổi chiều, đoàn ghé thăm nhà thờ Domain de Marie. Xe đưa đoàn tham quan Thác Datanla - nổi tiếng với vẻ đẹp hoang sơ, thơ mộng mà dữ dội, đặc trưng của đại ngàn Tây Nguyên (tự túc chi phí tham gia trò chơi máng trượt). Nghỉ đêm tại Đà Lạt.', 'NGÀY 04: ĐÀ LẠT - TP. HỒ CHÍ MINH (Ăn sáng, trưa)\r\nSau bữa sáng, quý khách trả phòng, khởi hành về TP.HCM. Về đến thị trấn Nam Ban, quý khách dừng chân thưởng thức trà và cà phê tại Tám Trình Coffee (tự túc chi phí) - quán cà phê sở hữu tầm nhìn ra Thác Voi ngày đêm tuôn chảy và tượng Phật Bà Quan Âm cao nhất Việt Nam. Về tới TP.HCM, xe đưa quý khách về văn phòng lữ hành. Kết thúc chương trình.', '', '', '2025-04-15 08:37:58'),
(14, 14, 'NGÀY 1: HÀ NỘI – ĐÀ LẠT – CHECK-IN THÀNH PHỐ NGÀN HOA\r\nSáng: Quý khách ra sân bay Nội Bài, làm thủ tục đáp chuyến bay đến Đà Lạt. Xe và HDV đón đoàn tại sân bay Liên Khương, đưa về trung tâm thành phố.\r\nTrưa: Dùng bữa trưa tại nhà hàng, sau đó về khách sạn nhận phòng nghỉ ngơi.\r\nChiều: Tham quan Quảng trường Lâm Viên – biểu tượng với nụ hoa Atiso và hoa Dã Quỳ khổng lồ. Tham quan Nhà thờ Con Gà và dạo quanh chợ Đà Lạt.\r\nTối: Tự do thưởng thức ẩm thực Đà Lạt về đêm như bánh tráng nướng, lẩu gà lá é, sữa đậu nành nóng… Nghỉ đêm tại Đà Lạt', 'NGÀY 2: KHÁM PHÁ VẺ ĐẸP ĐÀ LẠT\r\nSáng: Dùng bữa sáng tại khách sạn. Bắt đầu hành trình tham quan: Đồi chè Cầu Đất – nơi sống ảo tuyệt vời giữa đồi chè xanh mướt. Chùa Linh Phước (Chùa Ve Chai) – ngôi chùa nổi tiếng với kiến trúc khảm sành độc đáo.\r\nTrưa: Dùng cơm trưa tại nhà hàng địa phương.\r\nChiều: Tiếp tục tham quan Đường hầm điêu khắc – Hồ Vô Cực, địa điểm \"triệu like\" của giới trẻ. Trải nghiệm cáp treo hoặc xe jeep để lên Núi LangBiang (chi phí tự túc) – ngắm toàn cảnh Đà Lạt từ độ cao hơn 2.000m.\r\nTối: Ăn tối, tự do dạo phố và nghỉ đêm tại Đà Lạt.', 'NGÀY 3: ĐÀ LẠT – HÀ NỘI\r\nSáng: Dùng bữa sáng, trả phòng khách sạn. Tham quan Vườn hoa Thành phố hoặc các quán cà phê view rừng thông thơ mộng.\r\nTrưa: Xe đưa đoàn ra sân bay Liên Khương, làm thủ tục bay về Hà Nội.\r\nChiều: Đến sân bay Nội Bài. Kết thúc chương trình tour, chia tay và hẹn gặp lại!', '', '', '', '2025-04-15 08:37:58'),
(15, 15, 'NGÀY 1: HÀ NỘI – PHÚ QUỐC – THAM QUAN NAM ĐẢO\r\nSáng: Quý khách tập trung tại sân bay Nội Bài, làm thủ tục bay đến Phú Quốc. Đến sân bay Phú Quốc, xe đón đoàn về khách sạn nhận phòng, nghỉ ngơi.\r\nTrưa: Dùng bữa trưa với đặc sản địa phương. Chiều: Tham quan Nam Đảo: Chùa Hộ Quốc – ngôi chùa hướng biển đẹp nhất Phú Quốc. Bãi Sao – bãi biển nổi tiếng với cát trắng mịn và nước biển trong xanh. Cơ sở sản xuất ngọc trai hoặc nước mắm truyền thống.\r\nTối: Ăn tối, tự do dạo chợ đêm Dinh Cậu, thưởng thức hải sản tươi sống. Nghỉ đêm tại Phú Quốc.', 'NGÀY 2: KHÁM PHÁ BẮC ĐẢO – HÒN THƠM – CÁP TREO VƯỢT BIỂN\r\nSáng: Dùng điểm tâm tại khách sạn. Xe đưa đoàn đến nhà ga An Thới, trải nghiệm Cáp treo Hòn Thơm – cáp treo vượt biển dài nhất thế giới. Vui chơi tại công viên nước Aquatopia (nếu có).\r\nTrưa: Ăn trưa tại Hòn Thơm hoặc nhà hàng ven biển.\r\nChiều: Tham quan Bắc Đảo (nếu thời gian cho phép): Vườn tiêu Phú Quốc – trải nghiệm không gian xanh và mua sắm đặc sản. Rượu sim Phú Quốc – nếm thử hương vị đặc biệt của rượu địa phương.\r\nTối: Tự do nghỉ ngơi, hoặc tham gia tour câu mực đêm (chi phí tự túc). Nghỉ đêm tại Phú Quốc.', 'NGÀY 3: PHÚ QUỐC – HÀ NỘI\r\nSáng: Dùng bữa sáng, tự do tắm biển hoặc mua sắm đặc sản Phú Quốc. Trả phòng, xe đưa quý khách ra sân bay.\r\nTrưa: Làm thủ tục bay về Hà Nội.\r\nChiều: Đến sân bay Nội Bài, kết thúc tour. Chào tạm biệt và hẹn gặp lại!\r\n\r\n', '', '', '', '2025-04-15 08:41:44'),
(16, 16, 'NGÀY 01: TPHCM – PHÚ QUỐC – HÒN THƠM – SUNSET TOWN (Ăn trưa, chiều)\r\nBuổi sáng, quý khách tập trung tại ga đi trong nước, sân bay Tân Sơn Nhất. Hướng dẫn viên lữ hành đón quý khách và hỗ trợ làm thủ tục. Khởi hành đi Phú Quốc (trên chuyến bay VN1825 lúc 10h25). Đến Phú Quốc, sau khi dùng bữa trưa, quý khách sẽ trải nghiệm “Cáp treo 3 dây vượt biển dài nhất thế giới tại Hòn Thơm” với tổng chiều dài 7.899,9m, thời gian di chuyển 15 phút. Cáp treo sẽ đưa du khách đến với một hành trình du ngoạn kỳ thú trên cao, để thu vào tầm mắt 360 độ vẻ đẹp tựa thiên đường của biển, đảo, rừng xanh và những bãi tắm trong cụm đảo An Thới, nam Phú Quốc. Tham gia các trò chơi tại khu công viên chủ đề và Aquatopia Water Park, công viên nước đầu tiên ở Việt Nam mang phong cách đảo hoang và thổ dân, không gian công viên được thiết kế theo hai chủ đề chính là “Đảo hoang huyền bí” và “Thổ dân hoang dã”, đưa du khách vào hành trình khám phá phấn khích, khi lần lượt trải nghiệm từng khu vực chủ đề gồm sinh vật biển, động vật hoang dã, thủy quái, thổ dân, cướp biển. Các trò chơi được phân chia thành khu vực riêng biệt dành cho trẻ em và khu vui chơi mạo hiểm cho người lớn. Cùng ngắm hoàng hôn tại Sunset Town, một thị trấn đậm chất Địa Trung Hải với những căn nhà ven biển đầy sắc màu - được mệnh danh là nơi ngắm hoàng hôn đẹp nhất Phú Quốc, chiêm ngưỡng Cầu Hôn, biểu tượng của tình yêu... Nghỉ đêm tại Phú Quốc.', 'NGÀY 02: KHÁM PHÁ BẮC ĐẢO VỚI SAFARI – VINWONDER – GRAND WORLD (Ăn sáng, trưa, chiều)\r\nSau bữa sáng, xe đưa đoàn đến Bắc Đảo khám phá Vinpearl Safari Phú Quốc – vườn thú hoang dã đầu tiên tại Việt Nam với quy mô 180ha, cùng hơn 130 loài động vật quý hiếm và các chương trình biểu diễn, chụp ảnh với động vật; trải nghiệm vườn thú mở trong rừng tự nhiên, gần gũi và thân thiện với con người. Tiếp tục đến tham quan VinWonder Phú Quốc – công viên chủ đề được chia làm 6 phân khu, tượng trưng cho 6 vùng lãnh địa với 12 chủ đề được lấy cảm hứng từ các nền văn minh nổi tiếng, các câu chuyện cổ tích, giai tho0ại thế giới, sẽ đưa du khách đi từ ngạc nhiên này đến bất ngờ khác, tạo nên những trải nghiệm mới lạ mang tính giải trí, giáo dục và nghệ thuật cao. Đoàn đến “Thành phố không ngủ” Grand World tự do tham quan các công trình tre, công viên nghệ thuật đương đại thuộc Urban Park và tự túc chi phí các trải nghiệm tại Grand World: bảo tàng Gấu Teddy, thuyền trên sông Venice, Tinh hoa Việt Nam. Nghỉ đêm tại Phú Quốc.', 'NGÀY 03: PHÚ QUỐC - TP. HỒ CHÍ MINH (Ăn sáng, trưa)\r\nSau bữa sáng, quý khách tự do nghỉ ngơi và làm thủ tục trả phòng. Xe đưa quý khách ra sân bay, trên đường đi đoàn dừng chân tham quan Trung tâm nuôi cấy ngọc trai Phú Quốc, Vườn tiêu, Nhà thùng làm nước mắm, Lò rượu Sim...Đến sân bay Phú Quốc, đoàn bay về TP.Hồ Chí Minh (trên chuyến bay VN1828 lúc 16h45). Kết thúc chương trình (quý khách tự túc phương tiện từ sân bay về lại nhà)./.', '', '', '', '2025-04-15 08:41:44'),
(17, 17, 'NGÀY 01: TP. HỒ CHÍ Minh – BẾN TRE – TRÀ VINH (Ăn sáng, trưa, chiều)\r\nĐón quý khách tại văn phòng lữ hành lúc 5h00 sáng, khởi hành đi Mỹ Tho bằng đường cao tốc Sài Gòn - Trung Lương.Tiếp tục qua cầu Rạch Miễu, xe đưa đoàn đến xứ dừa Bến Tre - tham quan cơ sở chế biến dừa dọc hai bên sông, lò kẹo dừa. Thuyền máy đưa du khách vào những kênh rạch chằng chịt hiền hòa của miền Tây sông nước, thăm làng nghề truyền thống, thưởng thức trà, trái cây bốn mùa. Qúy khách ngồi trên xe lôi ngắm nhìn cảnh làng quê yên ả với vườn dừa, rẫy hoa màu... Trải nghiệm cảm giác len lỏi qua các kênh rạch bằng đò chèo, tận hưởng không khí trong lành, mát mẻ. Buổi chiều, đoàn theo quốc lộ 60 đến Trà Vinh - thành phố của những hàng cây cổ thụ, tham quan Ao Bà Om, viếng chùa Âng - một trong những ngôi chùa cổ kính nhất trong hệ thống hơn 140 ngôi chùa Khmer tại Trà Vinh. Nghỉ đêm tại Trà Vinh.', 'NGÀY 02: TRÀ VINH – VĨNH LONG (Ăn sáng, trưa, chiều)\r\nBuổi sáng, đoàn trả phòng và khởi hành đến với làng du lịch Cồn Ông. Qúy khách dừng chân chụp ảnh check-in bên điện gió Hàn Quốc tỉnh Trà Vinh, những chiếc điện gió khổng lổ vươn mình ra biển sẽ giúp du khách có thêm nhiều bức ảnh tuyệt đẹp. Đến với du lịch Cồn Ông, du khách được tham quan, tìm hiểu đời sống văn hóa, ẩm thực dân gian và sinh hoạt đời thường của người dân miền duyên hải Trà Vinh, với những con người rất gần gũi, bình dị và hiếu khách giống như lời bài hát “...về đây người quê chỉ có tấm lòng..”. Đặc biệt, du khách được trải nghiệm các hoạt động sản xuất nông nghiệp cùng người dân, chăm sóc các loại cây màu trồng tại đây như khoai lang, ngô, dưa gang, hành lá (tùy theo mùa)… và được tham gia thu hoạch nông sản khi đến mùa. Thưởng thức các món đặc sản đậm chất miền Tây như bánh lá, sương sáo, bắp xào, bánh khọt, gỏi đu đủ, tham gia trải nghiệm nấu bánh tét và mang thành quả về làm quà kỉ niệm của hành trình về lại quê nhà. Đoàn dùng bữa trưa tại khu du lịch sinh thái Tường Anh, thưởng thức những món ăn đặc sản vùng duyên hải và tham gia một số dịch vụ giải trí như câu cua, câu tôm... (chi phí tự túc). Đoàn khởi hành đi Vĩnh Long. Nhận phòng và nghỉ đêm tại Vĩnh Long.', 'NGÀY 03: VĨNH LONG – ĐỒNG THÁP (Ăn sáng, trưa)\r\nSau khi dùng bữa sáng, đoàn xuôi dòng sông Long Hồ về thăm vương quốc đỏ - di sản đương đại Mang Thít Vĩnh Long nơi còn lưu giữ nhiều xóm nghề truyền thống được hình thành từ nhiều năm như nghề chằm nón, đan rổ, đan rế, sản xuất hủ tiếu, bún…đặc biệt là nghề làm gạch. Tiếp tục hành trình, đoàn khởi hành tham quan nhà cổ Huỳnh Thủy Lê - nam chính trong cuốn tiểu thuyết “Người Tình” rất nổi tiếng của Marguerite Duras - một văn sĩ người Pháp - ngôi nhà cổ thể hiện thời kỳ thịnh vượng, phú quý giàu sang bậc nhất lúc bấy giờ của vùng Nam Bộ xưa. Tiếp tục hành trình đến Đồng Tháp, sau khi nhận phòng, quý khách tự do khám phá Thành phố Cao Lãnh và thưởng thức đặc sản địa phương. Nghỉ đêm tại Cao Lãnh.\r\nLựa chọn: (tự túc chi phí di chuyển và vé tham quan)\r\n- Tham quan khu Đền thờ ông bà Đỗ Công Tường, dân gian hay gọi là ông bà chủ chợ Cao Lãnh- điểm tham quan văn hóa tâm linh nổi tiếng thuộc di tích lịch sử văn hóa quốc gia.\r\n- Tham quan chợ quê Tân Thuận Đông (chỉ mở từ 14h-20h, thứ bảy hàng tuần), phiên chợ tái hiện khung cảnh chợ xưa với những sản phẩm cây nhà lá vườn như các loại trái cây, thức uống dân dã, bánh nhân gian, đặc sản địa phương, thưởng thức đờn ca tài tử…', 'NGÀY 04: ĐỒNG THÁP – TIỀN GIANG – TP.HCM (Ăn sáng, trưa)\r\nBuổi sáng, đoàn trả phòng. Xe đưa quý khách viếng Thiền viện Trúc Lâm Chánh Giác là ngôi chùa lớn nhất tại Tiền Giang thuộc hệ phái Trúc Lâm Yên Tử. Nơi đây còn gây ấn tượng với nhiều du khách gần xa về Bốn Thánh Tích hay còn gọi là Tứ Động Tâm được xây dựng theo tỉ lệ 6/10 so với phiên bản gốc tại Ấn Độ và Nepal (quý khách viếng chùa vui lòng mang theo áo tràng nếu đến viếng Bảo Tháp hoặc có thể thuê tại chùa). Đoàn di chuyển đến khu bảo tồn sinh thái Đồng Tháp Mười, nơi đây có hơn 70 loài thực vật và 83 loài động vật, hiện đang được tôn tạo để phục vụ cho du lịch và thực hiện bảo tồn các loài động vật quý hiếm. Đến với vùng Đồng Tháp Mười, du khách sẽ cảm thấy thú vị hơn khi chèo thuyền tham quan, khám phá những vùng rừng lau sậy ngập phèn, men theo các con rạch ngắm động vật hoang dã như: chim, cò, diệc, le le...Sau đó quý khách tự do đạp xe khám phá hệ sinh thái rừng ngập mặn Đồng Tháp Mười....Đoàn dừng chân mua sắm đặc sản tại xứ khóm Tân Phước. Khởi hành về TP. Hồ Chí Minh, xe đưa đoàn về văn phòng lữ hành Saigontourist số 19 Hoàng Việt, Phường 4, Quận Tân Bình. Kết thúc chương trình.', '', '', '2025-04-15 08:44:01'),
(18, 18, 'NGÀY 01: TP. HỒ CHÍ MINH - CHÂU ĐỐC (Ăn sáng, trưa, chiều)\r\nĐón quý khách tại văn phòng lữ hành, khởi hành đi An Giang bằng đường cao tốc Sài Gòn – Mỹ Thuận. Đến Châu Đốc về khách sạn nhận phòng. Buổi chiều, đoàn viếng Miếu Bà Chúa Xứ, Tây An cổ tự, Lăng Thoại Ngọc Hầu- danh nhân có công khai mở đất An Giang. Thăm làng Chăm Đa Phước tìm hiểu phong tục tập quán, tín ngưỡng cư dân tại làng Chăm, viếng thánh đường Masjid Ihsan - Thánh đường lớn và đẹp nhất vùng. Nghỉ đêm tại Châu Đốc.', 'NGÀY 02: CHÂU ĐỐC - TRÀ SƯ - HÀ TIÊN (Ăn sáng, trưa, chiều)\r\nĂn sáng - trả phòng tham quan rừng tràm Trà Sư, du khách sẽ được bước đi trên - “Cầu tre vạn bước” với chiều dài hơn 2km len lỏi vào rừng, hòa mình vào thiên nhiên sinh thái hoang dã, thong thả khám phá những bí ẩn mà một khu rừng đang hiện hữu, đi tắc ráng theo những con rạch xuyên qua Lung Sen và khu Rừng Giồng, lên tháp vọng cảnh cao 23m nhìn toàn cảnh rừng tràm. Khởi hành đi Hà Tiên,đến Hà Tiên đoàn nhận phòng sau đó đoàn tham quan Thạch Động và dạo biển Mũi Nai – hai cảnh đẹp được miêu tả trong “Thập cảnh Hà Tiên”. Nghỉ đêm tại Tp Hà Tiên, du khách tự do dạo khám phá chợ đêm và khu lấn biển của thành phố mới Hà Tiên, nghỉ đêm tại Hà Tiên. Du khách tự do dạo khám phá chợ đêm và khu lấn biển của thành phố mới Hà Tiên.', 'GÀY 03: HÀ TIÊN - TP. HỒ CHÍ MINH (Ăn sáng, trưa)\r\nTrả phòng và ăn sáng, đoàn viếng đền thờ dòng họ Mạc - dòng họ có công khai trấn vùng đất Hà Tiên và Phù Dung cổ tự, tạm biệt Hà Tiên khởi hành về TP.HCM. Về đến Thành phố Hồ Chí Minh, xe đưa khách về văn phòng lữ hành. Kết thúc chương trình.', '', '', '', '2025-04-15 08:44:01'),
(19, 19, 'NGÀY 01: TP. HỒ CHÍ MINH – VŨNG TÀU (Ăn sáng, trưa, chiều)\r\nĐón du khách tại văn phòng lữ hành. Khởi hành đi Vũng Tàu, HDV đưa đoàn đi tham quan Giáo xứ Song Vĩnh đây là một công trình kiến trúc Gothic Phương Tây bên ngoài với màu xám đặc trưng của đá vô cùng ân tượng đặc biệt gây chú ý cho những ai đi ngang qua bởi dáng vẻ nguy nga, diễm lệ của ngôi thánh đường. Xe đưa đoàn tiếp tục tham quan Bảo tàng Vũ khí cổ Robert Taylor - nơi hiện trưng bày hơn 2000 hiện vật gồm: các loại vũ khí như: súng, gươm, kiếm, mác, cung tên, quân trang, quân phục của nhiều nước có niên đại từ thế kỷ 17 đến 20 như quân đội Anh, Pháp, Hà Lan, Đức, trang phục của võ sĩ samurai Nhật Bản, quân đội La Mã, súng cạc bin của vua Napoleon Bonaparte (từ 1600 – 1620). Sau khi ăn trưa du khách di chuyển về khách sạn nhận phòng. Buổi chiều quý khách tự do nghỉ ngơi, tận hưởng các tiện nghi - tiện ích và dịch vụ của khách sạn. Nghỉ đêm tại Vũng Tàu.', 'NGÀY 02: VŨNG TÀU – CẦN GIỜ (Ăn sáng, trưa)\r\nBuổi sáng, du khách nghỉ dưỡng trong khách sạn, tắm biển. Du khách trả phòng. Đoàn lên khởi hành đi Cần Giờ bằng đường Biển qua Cần Giờ. Tham quan Khu căn cứ Rừng Sác. Đến đây du khách sẽ được đắm mình trong không khí trong lành, xanh mát của rừng đước ngập mặn Cần Giờ, ngắm nhìn và tiếp xúc với hàng ngàn con khỉ nơi đây và đặc biệt hơn du khách sẽ được tham quan khu căn cứ cách mạng của Đoàn 10 Rừng Sác Anh Hùng (di chuyển bằng cano). Tiếp tục xe đưa đoàn di chuyển xuống Bãi Biển 30/4 và dùng cơm trưa tại Nhà hàng thuộc khu Du lịch Sinh Thái Cần Giờ - Cần Giờ Resort. Quý khách dừng chân thưởng thức trà và cà phê tại Lata Camping trải nghiệm hoạt động bắt cua, ốc ngay tại bãi biển (tự túc chi phí). Quán cà phê nằm trong khu cắm trại quý khách tự do tham quan khám phá khuôn viên, check in ngay tại bãi biển. Về đến TP.HCM, xe đưa du khách về văn phòng lữ hành Saigontourist số 19 Hoàng Việt, Phường 4, Quận Tân Bình. Kết thúc chương trình.\r\n\r\n', '', '', '', '', '2025-04-15 08:45:31');
INSERT INTO `lichtrinhtour` (`id`, `tourid`, `Ngay1`, `Ngay2`, `Ngay3`, `Ngay4`, `Ngay5`, `Ngay6`, `datebegin`) VALUES
(20, 20, 'NGÀY 01: TP. HỒ CHÍ MINH –  MINERA HOT SPRING BÌNH CHÂU (Ăn trưa, chiều)\r\n8h Quý khách tập trung tại văn phòng lữ hành. (Quý khách vui lòng tự túc bữa sáng) Khởi hành đi Bình Châu, quý khách đến Tân Thành tham quan chụp hình Nhà thờ Song Vĩnh – mới xây dựng lại theo kiến trúc Gothic Châu Âu lộng lẫy. Đoàn nhận phòng Minera Hot Spring Bình Châu nghỉ trưa. Quý khách tự do nghỉ ngơi, tắm biển, sử dụng các tiện ích của resort. Nghỉ đêm tại resort.\r\n\r\n', 'NGÀY 02: SUỐI KHOÁNG NÓNG BÌNH CHÂU (Ăn sáng, trưa, chiều )\r\nĐoàn ăn sáng buffe tại Resort, quý khách tham quan suối khoáng nóng Bình Châu tham quan công viên rừng, khu luộc trứng,ngâm chân. Ngoài ra có các dịch vụ: xông hơi, tắm khoáng, ngâm hồ (tự túc chi phí). Chiều xe đưa đoàn đi tham quan cầu ngắm biển Hồ Tràm “Hamptons Pier tại Hồ Tràm” cầu được thiết kế dài 270m sở hữu vẻ đẹp lãng mạn thoáng mát của thiên đường biển Hồ Tràm đang là điểm đến cực hot. Nghỉ đêm tại resort.', 'NGÀY 03: HỒ TRÀM – TP HỒ CHÍ MINH (Ăn sáng, trưa)\r\nBuổi sáng quý khách tự do nghỉ dưỡng tận hưởng không gian yên tĩnh và trong lành. Trưa đoàn trả phòng. Xe đưa quý khách khởi hành về văn phòng lữ hành. Kết thúc chương trình tour.', '', '', '', '2025-04-15 08:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `meta` varchar(255) NOT NULL,
  `hide` int(11) NOT NULL DEFAULT 0,
  `ordered` int(11) NOT NULL,
  `datebegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `meta`, `hide`, `ordered`, `datebegin`) VALUES
(1, 'Trang chủ', '', 'Trang-chu', 0, 1, '2025-04-07 22:45:33'),
(2, 'Tour', '', 'Tour', 0, 2, '2025-04-07 22:45:33'),
(3, 'Xu hướng du lịch', '', 'Xu-huong-du-lich', 0, 3, '2025-04-07 22:45:33'),
(4, 'Liên hệ', '', 'Lien-he', 0, 4, '2025-04-07 22:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `detail` text NOT NULL,
  `meta` varchar(255) NOT NULL,
  `hide` int(11) NOT NULL DEFAULT 0,
  `ordered` int(11) NOT NULL,
  `datebegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `image`, `image2`, `image3`, `description`, `detail`, `meta`, `hide`, `ordered`, `datebegin`) VALUES
(1, 'Ngọt ngào vẻ đẹp Tây Bắc mùa lúa chín', 'News-TayBac-1.jpg', 'News-TayBac-2.jpg', 'News-TayBac-3.jpg', '<p>Nhắc đến &quot;m&ugrave;a l&uacute;a ch&iacute;n&quot; chắc hẳn bạn sẽ nghĩ về miền T&acirc;y ngay lập tức nhưng bạn ơi miền Bắc ở đất nước h&igrave;nh...</p>', '<p>T&acirc;y Bắc m&ugrave;a l&uacute;a ch&iacute;n &ndash; Th&aacute;ng 9, 10 ch&iacute;nh l&agrave; thời điểm đẹp nhất để bạn c&oacute; thể chi&ecirc;m ngưỡng vẻ h&ugrave;ng vĩ của n&uacute;i rừng đại ng&agrave;n nơi đ&acirc;y. Đến đ&acirc;y bạn sẽ được ngắm nh&igrave;n c&aacute;c ruộng bậc thang v&agrave;ng ruộm chạy dọc triền n&uacute;i, những c&aacute;nh đồng đang trổ b&ocirc;ng như chiếc thang bắc l&ecirc;n tận trời xanh. Lữ h&agrave;nh sẽ đưa bạn đến những tọa độ &ldquo;săn&rdquo; m&ugrave;a l&uacute;a ch&iacute;n đẹp v&agrave; rực rỡ nhất v&ugrave;ng T&acirc;y Bắc. P&ugrave; Lu&ocirc;ng ở Thanh H&oacute;a Với vẻ đẹp đơn sơ, giản dị của những c&aacute;nh đồng l&uacute;a m&ecirc;nh m&ocirc;ng c&ugrave;ng thời tiết m&aacute;t mẻ quanh năm, P&ugrave; Lu&ocirc;ng l&agrave; c&aacute;nh đồng l&uacute;a nổi tiếng nhất Thanh H&oacute;a. Từ đỉnh P&ugrave; Lu&ocirc;ng nh&igrave;n xuống những c&aacute;nh đồng ruộng bậc thang xa xa, &oacute;ng mượt m&agrave;u v&agrave;ng của l&uacute;a ch&iacute;n chắc chắn bạn sẽ cảm nhận được sự b&igrave;nh y&ecirc;n v&agrave; xao xuyến trong l&ograve;ng. M&ugrave; Cang Chải - Y&ecirc;n B&aacute;i Ruộng bậc thang M&ugrave; Cang Chải được xem l&agrave; tuyệt t&aacute;c nghệ thuật của người M&ocirc;ng, nh&igrave;n từ tr&ecirc;n cao, những thửa ruộng bậc thang như kho&aacute;c l&ecirc;n m&igrave;nh nhiều lớp &aacute;o bởi c&aacute;c sườn n&uacute;i tr&ugrave;ng tr&ugrave;ng nối nhau. Nếu chưa tận mắt đến đ&acirc;y ngắm l&uacute;a ch&iacute;n, bạn sẽ kh&ocirc;ng thể tưởng tượng ra sự h&ugrave;ng vĩ, rực rỡ đến tự h&agrave;o về tuyệt phẩm n&agrave;y. Sa Pa - L&agrave;o Cai Sa Pa từng lọt v&agrave;o top 7 ruộng bậc thang đẹp nhất ch&acirc;u &Aacute; v&agrave; top 30 ruộng bậc thang đẹp nhất h&agrave;nh tinh. V&agrave;o những ng&agrave;y cuối th&aacute;ng 9, dạo bước tr&ecirc;n sườn đồi đầy nắng trong tiết trời se lạnh của m&ugrave;a thu, bạn sẽ được h&ograve;a m&igrave;nh với m&agrave;u v&agrave;ng rực rỡ ấm &aacute;p của những thửa ruộng bậc thang ngập tr&agrave;n m&ugrave;i hương l&uacute;a ch&iacute;n. Tam cốc - B&iacute;ch Động ở Ninh B&igrave;nh Ngồi thuyền xu&ocirc;i d&ograve;ng s&ocirc;ng Ng&ocirc; Đồng v&agrave;o m&ugrave;a l&uacute;a ch&iacute;n, bạn như h&ograve;a m&igrave;nh v&agrave;o bức tranh đồng qu&ecirc; v&agrave;ng rực, được bao bọc bởi quần thể n&uacute;i đ&aacute; h&ugrave;ng vĩ. Bạn sẽ kh&oacute; tr&aacute;nh khỏi bồi hồi khi đứng trước vẻ đẹp quyến rũ của đồng l&uacute;a ch&iacute;n mộng n&agrave;y. Bạn đ&atilde; sẵn s&agrave;ng ngắm nh&igrave;n T&acirc;y Bắc m&ugrave;a l&uacute;a ch&iacute;n v&agrave; trở th&agrave;nh lữ kh&aacute;ch nơi thi&ecirc;n nhi&ecirc;n kỳ diệu n&agrave;y chưa?</p>', 'News-TayBac-Luachin', 0, 1, '2025-04-19 09:52:10'),
(2, 'Hành trình đắm chìm vẻ đẹp biển trời miền Trung', 'News-MienTrung-1.jpg', 'News-MienTrung-2.jpg', 'News-MienTrung-3.jpg', 'Không gian xanh mát, thơ mộng hoà cùng làn nước biển trong xanh đã làm lưu luyến bao trái tim khách thập phương khi tìm...', 'Bạn là người yêu thiên nhiên, thích khám phá những vùng đất mới cùng bãi cát vàng trải dài dọc bờ biển thơ mộng và làn nước trong xanh thơ mộng chưa bị thương mại hóa quá nhiều? \r\n\r\nLữ hành hứa hẹn mang đến cho bạn nhiều điều thú vị qua Hành trình Du lịch Tuy Hòa – Quy Nhơn 4 ngày 3 đêm sẽ khởi hành từ TP. Hồ Chí Minh, bay với Vietnam Airlines. Hãy cùng Lữ hành Saigontourist trải nghiệm và lưu giữ những khoảnh khắc đẹp tại “xứ Nẫu” nhé!\r\n\r\nMũi Đại Lãnh (Mũi Điện) – Bạn có thể đứng trên mỏm đá cao chót vót, vươn vai để đón những tia nắng đầu tiên từ mặt trời ở hướng biển khơi. Và là nơi để bạn ngắm bình minh sớm nhất trên đất liền Việt Nam.\r\n\r\nBãi Xép - Khu vực xung quanh tháp còn là nơi thường xuyên tổ chức các sự kiện, lễ hội lớn của thành phố, thu hút rất đông du khách và người dân địa phương. \r\n\r\nNhà thờ Mằng Lăng - Với kiến trúc Gothic cổ kính, không gian xanh tươi mát cùng giá trị lịch sử văn hóa đặc biệt, nhà thờ Mằng Lăng không chỉ là điểm đến tôn giáo mà còn là nơi bạn có thể chiêm ngưỡng vẻ đẹp thời gian và khám phá di sản văn hóa quý báu của Việt Nam.\r\n\r\nĐiểm đến Tuy Hòa – Quy Nhơn đang là cơn sóng sức hút đối với du khách trong và ngoài nước. Là điểm tham quan thú vị đáng để trải nghiệm cho kì nghỉ đặc biệt cùng với những người thân yêu chúng ta, hãy cùng nhau ghi lại những khoảnh khắc đẹp tại nơi này bạn nhé!', 'News-MienTrung-Bien', 0, 2, '2025-04-19 09:58:17'),
(3, 'Tây Bắc - Hành trình về nguồn', 'News-TayBac-Venguon-1.jpg', 'News-TayBac-Venguon-2.jpg', 'News-TayBac-Venguon-3.jpg', 'Hãy lên kế hoạch ngay để tận hưởng một kỳ nghỉ lễ đầy ý nghĩa và trọn vẹn tại Tây Bắc!', 'Tham quan các tích lịch sử hào hùng \r\nBảo tàng Chiến thắng Điện Biên Phủ: Nơi lưu giữ nhiều hiện vật và thông tin về chiến thắng lừng lẫy trước thực dân Pháp, giúp bạn hiểu rõ hơn về một trong những chiến công vĩ đại của dân tộc.\r\n\r\nĐồi A1: Một trong những chiến trường quan trọng trong trận chiến Điện Biên Phủ, nơi bạn có thể tìm hiểu về các trận đánh quyết liệt và chiến thuật quân sự.\r\n\r\nHầm Tướng De Castries: Di tích lịch sử nổi tiếng, là nơi chỉ huy của tướng Pháp trong trận Điện Biên Phủ, mang lại cái nhìn sâu sắc về chiến lược quân sự.\r\n\r\nTượng đài Chiến thắng Điện Biên Phủ (đồi D1): Biểu tượng của chiến thắng và lòng yêu nước, nơi tôn vinh sự hy sinh và đóng góp của các chiến sĩ và nhân dân trong cuộc kháng chiến.\r\n\r\nChinh phục các “đỉnh cao”\r\nKhám phá Tây Bắc trong dịp lễ 2/9, bạn sẽ không thể bỏ qua hai thử thách đầy hứng khởi: đỉnh Fansipan và đèo Pha Đin. Đỉnh Fansipan, với độ cao 3,143m, được mệnh danh là “Nóc nhà Đông Dương”, là điểm đến lý tưởng cho những ai yêu thích sự chinh phục. Còn đèo Pha Đin, với chiều dài gần 32 km và độ hiểm trở nổi tiếng, mang đến một cuộc phiêu lưu kỳ thú. Chinh phục đèo Pha Đin không chỉ là thử thách về thể lực mà còn là cơ hội để bạn chiêm ngưỡng cảnh quan hùng vĩ của dãy Hoàng Liên Sơn.\r\n\r\nKhi đến với Tây Bắc, bạn không thể bỏ qua vẻ đẹp quyến rũ của Mộc Châu và Sapa. Mộc Châu là thiên đường cho những ai yêu thiên nhiên và sự bình yên, nơi bạn có thể thưởng ngoạn cánh đồng hoa cải trắng tinh khôi, đồi chè xanh mướt và rừng thông bản Áng. Với khí hậu mát mẻ và phong cảnh tuyệt đẹp, Sapa hứa hẹn mang đến cho bạn những trải nghiệm khó quên và cảm giác hòa mình vào vẻ đẹp hoang sơ của thiên nhiên.\r\n\r\nVới sự kết hợp hoàn hảo giữa những thử thách chinh phục, di tích lịch sử hào hùng và cảnh quan thiên nhiên tuyệt đẹp, Tây Bắc chính là điểm đến lý tưởng cho dịp lễ 2/9. Đây là cơ hội tuyệt vời để bạn vừa tìm hiểu về lịch sử dân tộc, vừa trải nghiệm những hoạt động ngoài trời hấp dẫn và thưởng thức vẻ đẹp hùng vĩ của vùng đất Tây Bắc. Hãy lên kế hoạch ngay để tận hưởng một kỳ nghỉ lễ Quốc khánh đầy ý nghĩa và trọn vẹn tại Tây Bắc! Hãy liên hệ Lữ hành Saigontourist để đặt tour ngay hôm nay nhé! ', 'News-TayBac-Venguon', 0, 3, '2025-04-19 10:08:52'),
(4, 'Phú Quốc – Đón xuân xanh, hòa nhịp biển khơi', 'News-PhuQuoc-1.jpg', 'News-PhuQuoc-2.jpg', 'News-PhuQuoc-3.jpg', '\"Đảo Ngọc\" là mỹ từ mà du khách dành tặng cho Phú Quốc bởi những đặc trưng, những cảnh sắc tuyệt tác mà thiên...', 'Mỗi dịp Tết đến, khi không khí xuân tràn ngập khắp nơi, chúng ta lại tìm kiếm một điểm đến để thư giãn, bình yên và ý nghĩa bên gia đình, bạn bè. Và nơi mà Lữ hành muốn giới thiệu cho bạn đó là Phú Quốc - thiên đường đảo ngọc của Việt Nam - nơi đây sẽ là lựa chọn hoàn hảo để bạn có một kỳ nghỉ Tết 2025 khó quên.\r\n\r\n\r\nPhú Quốc, hòn đảo lớn nhất Việt Nam, được mệnh danh là “Đảo Ngọc” nhờ vẻ đẹp tự nhiên kỳ vĩ và bầu không khí trong lành cùng với những bãi biển cát trắng mịn màng, nước biển trong xanh màu ngọc bích đặc trưng. Lữ hành Saigontourist sẽ đưa bạn đến checkin những bãi biển nổi tiếng nhất như Bãi Sao, Bãi Dài hay Bãi Khem, và những điểm nhất định không thể bỏ lỡ khi đến Phú Quốc sau đây. \r\n\r\nĐến Bắc Đảo, ngoài vẻ đẹp của thiên nhiên, bạn còn sẽ bị thu hút bởi các điểm đến nổi bật. Vinpearl Safari Phú Quốc - vườn thú bán hoang dã đầu tiên và lớn nhất Việt Nam. Điểm đặc biệt của Safari là hình thức tham quan “nhốt người thả thú”, nơi bạn ngồi trên xe buýt chuyên dụng để quan sát các động vật tự do di chuyển trong môi trường tự nhiên.\r\n\r\nNếu bạn là người yêu thích các hoạt động vui chơi giải trí, VinWonders Phú Quốc sẽ mang đến vô vàn trải nghiệm với 6 phân khu tại công viên chủ đề lớn nhất Việt Nam này. Và xem show diễn triệu đô đẳng cấp Thế giới “Once” - chương trình biểu diễn ánh sáng và âm nhạc đỉnh cao.\r\n\r\nLữ hành Saigontourist sẽ cùng bạn du ngoạn “Thành phố không ngủ” - Grand World Phú Quốc, nơi hội tụ các hoạt động vui chơi suốt 24/7. Trải nghiệm cảm giác lãng mạn khi ngồi thuyền gondola trôi dọc trên Kênh đào Venice, xem show tái hiện sống động văn hóa - lịch sử Việt Nam, tham quan Bảo tàng gấu Teddy,...\r\n\r\nKhám phá Nam Đảo trên cáp treo 3 dây vượt biển dài nhất Thế giới, ngắm nhìn vẻ đẹp tựa thiên đường của biển, đảo, rừng xanh và toàn cảnh quần đảo An Thới với góc nhìn 360 độ.\r\n\r\nTiếp theo trong hành trình bạn sẽ được trải nghiệm một ngày lạc vào đảo hoang nơi sinh sống của bộ lạc thổ dân với Công viên chủ đề Aquatopia Water Park nằm trong khuôn viên Sun World Hon Thom.\r\n\r\nHoàng hôn Phú Quốc là một trong những khoảnh khắc kỳ diệu không thể bỏ lỡ. Bạn sẽ ngắm trọn vẹn vẻ đẹp ấy tại Sunset Town - một thị trấn đậm chất Địa Trung Hải, bạn như đang lạc vào một thị trấn ven biển ở Ý, Tây Ban Nha hay Hy Lạp. Và chiêm ngưỡng công trình biểu tượng về tình yêu - Cầu Hôn, cùng rất nhiều công trình kiến trúc khác.\r\n\r\nPhú Quốc còn nổi tiếng với nhiều đặc sản hấp dẫn như nước mắm truyền thống, hồ tiêu, rượu sim, ngọc trai và hải sản tươi ngon...\r\n\r\nVới tất cả những gì mà Phú Quốc mang lại, tin chắn rằng đây sẽ là một điểm đến lý tưởng cho chuyến du xuân trong dịp Tết 2025. Hãy để chúng tôi là người bạn đồng hành đáng tin cậy của bạn.', 'News-PhuQuoc', 0, 4, '2025-04-19 10:08:52'),
(5, 'Top 5 địa điểm du lịch hè', 'News-He-1.jpg', 'News-He-2.jpg', 'News-He-3.jpg', 'Mùa hè đến mọi người thường nghĩ về những chuyến du lịch nghỉ ngơi, thư giãn cùng gia đình, bạn bè để nạp lại năng lượng sau những ngày học tập, làm việc căng thẳng cũng như có thêm những trải nghiệm mới mẻ. Nếu như bạn còn băn khoăn chưa biết đi đâu, chúng tôi sẽ gợi ý cho bạn 5 điểm đến hấp dẫn trong mùa hè này.', 'SAPA\r\nSapa nằm ở địa hình cao và gần chí tuyến nên khí hậu mát mẻ quanh năm. Khi vào hè, nhiệt độ dao động khoảng 20 -28 độ C. Một ngày ở Sa Pa du khách có thể tận hưởng không khí của cả bốn mùa. Đặc biệt từ tháng 5 đến tháng 9 là mùa đông khách nhất bởi khí hậu ôn hòa, thuận lợi khi di chuyển cáp treo để chinh phục nóc nhà Đông Dương - đỉnh Fansipan. \r\nVì nằm ở địa hình cao nên ruộng bậc thang chính là nét đặc trưng nổi bật thu hút du khách đến với Sa Pa. Đặc biệt vào dịp hè, những thửa ruộng bậc thang ở nơi đây như lột xác và khoác lên mình một màu áo tươi mới. Lúc này, du khách sẽ được chiêm ngưỡng những cánh đồng xanh mướt, tầng tầng lớp lớp trải dài trên các ngọn đồi nối liền nhau, tạo nên một khung cảnh hết sức kỳ vĩ.\r\n\r\nHÀ GIANG\r\nĐến với Hà Giang, du khách sẽ được trải nghiệm cung đường đèo Mã Pí Lèng – một trong “Tứ đại đèo” của vùng núi biên viễn phía Bắc, hay lên thuyền chiêm ngưỡng cảnh quan dòng sông Nho Quế chảy qua khe vực Tu Sản sâu hun hút, thăm thẳm giữa những vách núi dựng đứng, sừng sững. Bên cạnh việc chiêm ngưỡng phong cảnh núi non hùng vĩ, du khách còn có thể tìm hiểu thêm về con người, văn hóa ở các làng văn hóa người Mông, người Tày nơi đây.\r\nVào khoảng tháng 5, tháng 6 nhiệt độ ở Hà Giang dao động từ 25 đến 32 độ C, tuy nhiên, do được bao bọc bởi những đồi núi và dòng Nho Quế chảy quanh nên khí hậu Hà Giang vẫn rất thoáng đãng, mát mẻ và dễ chịu.\r\n\r\nĐÀ LẠT\r\nĐà Lạt luôn là sự lựa chọn hàng đầu cho du khách khi đi du lịch hè. Nơi đây khiến người ta mê mẩn bởi nét đẹp nên thơ, trữ tình cùng không khí trong lành, se se lạnh hòa cùng cảnh sắc thiên nhiên rực rỡ, hùng vĩ. Còn gì tuyệt vời bằng khi được ngồi bên bờ Xuân Hương thơ mộng, ăn cái bánh tráng nướng nóng hổi giữa không khí se lạnh của Đà Lạt. Du khách cũng có thể ghé thăm những địa điểm nổi tiếng khác như Dinh Bảo Đại, thác Datanla, … hoặc trải nghiệm các nông trại, khu nhà vườn trồng hoa hay rau sạch tại Đà Lạt.\r\nNếu đã chán việc ở khách sạn mỗi khi đi du lịch, thì Đà Lạt chính là lựa chọn hợp lý để có trải nghiệm mới mẻ. Vì Đà Lạt có nhiều đồi thoải nên rất thích hợp để đi dã ngoại hay cắm trại qua đêm. Thời gian gần đây, Đà Lạt cũng rất phát triển loại hình này nên đây sẽ là điểm đến cho du khách có thể có những trải nghiệm thật gần gũi với thiên nhiên và tăng sự gắn kết. \r\n\r\nNHA TRANG\r\nGiữa cái nóng của mùa hè, du lịch biển luôn là sự lựa chọn ưu tiên. Thành phố biển Nha Trang được mệnh danh là “Viên ngọc quý của biển Đông”. Nơi đây được thiên nhiên ban tặng bờ biển xanh ngắt, cát trắng mịn nên thơ, vùng vịnh đẹp cùng nhiều đảo lớn nhỏ. Ngoài ra, Nha Trang còn sở hữu nhiều danh lam thắng cảnh, điểm tham quan nổi tiếng như đảo khỉ, tháp bà Ponagar hay một vài điểm đến tâm linh như Chùa Long Sơn - ngôi cổ tự lâu đời, sở hữu bức tượng Phật Tổ ngoài trời lớn nhất được ghi tên vào sách kỷ lục Guiness Việt Nam hay Chùa Từ Vân (Chùa Ốc) - ngôi chùa được xây dựng và trang trí bằng nhiều vỏ ốc và san hô.\r\nKhí hậu Nha Trang tương đối ôn hòa với mùa khô kéo dài từ tháng 1 đến tháng 8. Chính vì vậy, mùa hè là thời điểm lý tưởng để du lịch biển Nha Trang bởi trời nhiều nắng, ít mưa thích hợp để du khách tắm biển.\r\nNgoài hải sản thì Nha Trang cũng có nhiều món đặc sản rất hấp dẫn và phong phú như bánh xèo mực, nem nướng, bún chả cá, bánh căn, …\r\n\r\nPHÚ QUỐC\r\nPhú Quốc là hòn đảo lớn nhất nằm ở phía Tây Nam và được mệnh danh là đảo ngọc của Việt Nam. Từ cuối tháng 10 đến giữa tháng 5 năm sau, thời tiết Phú Quốc thường không có mưa hoặc rất ít mưa, khí hậu mát mẻ, biển êm rất thích hợp cho du khách có những hoạt động vui chơi trên biển.\r\nNgoài ra khi đến đây, du khách còn được trải nghiệm “Cáp treo 3 dây vượt biển dài nhất thế giới tại Hòn Thơm”, hay ngắm hoàng hôn tại một điểm mới toanh là Cầu Hôn vô cùng lãng mạn. Hay du khách có thể khám phá quy trình nuôi cấy ngọc trai tại các Trung tâm nuôi cấy, quy trình làm ra những giọt nước mắm thơm ngon nức tiếng tại các nhà thùng nước mắm trên hòn đảo này.', 'News-He', 0, 5, '2025-04-19 12:17:01'),
(6, '\'Yêu nhau lên Đà Lạt là chia tay\'?', 'News-DaLat-1.jpg', 'News-DaLat-2.jpg', 'News-DaLat-3.jpg', 'Khi còn bên nhau chúng ta đã cùng đến đây, để rồi khi chia tay lại “đổ thừa” vì cái thành phố này nó “buồn”....', 'Chẳng hiểu từ khi nào mà người ta gán cho Đà Lạt cái khái niệm “dễ sợ” ấy, lẽ nào vì cái danh “Thành phố buồn”? Mà nghĩ cũng lạ, muốn bênh vực Đà Lạt một chút cũng khó lắm nghe, bởi vì đâu đâu cũng gắn liền với những câu chuyện lâm li bi đát, những mối tình dở dang nghe mà “sầu đứt ruột”.\r\nNhưng với mình - một đứa con gái Sài Thành nhưng lại mê tít cái đất “mờ sương”, một năm có khi đến đó tận 5 – 6 lần, mà lần nào cũng thấy Đà Lạt hay ho và dễ thương hết, hỏng có buồn đâu. Bạn đang thắc mắc mình lên đó để làm gì á? Mình cũng không biết, chỉ là đôi khi mệt mỏi với nhịp sống cuồn quay ở Sài Gòn, muốn đi đâu đó thì nơi đầu tiên mình nghĩ về chính là Đà Lạt. Mình hay gọi yêu thương là “trốn về quê” vì ở Đà Lạt mình dễ chịu và thoải mái biết nhường nào.\r\nDu lịch Đà Lạt mùa nào cũng thu hút khách bởi khí hậu miền núi ôn hòa, mát mẻ và có hai mùa rõ rệt là mùa mưa và mùa khô. Mùa mưa bắt đầu từ tháng 4 và kết thúc vào tháng 10. Còn mùa khô kéo dài từ tháng 11 năm trước đến tháng 3 năm sau. Ngay cả trong những ngày nóng nhất thì nhiệt độ trung bình luôn dưới 20 độ C. Ngoài ra còn có hiện tượng sương mù làm cho “thành phố ngàn thông” thêm phần bí ẩn và quyến rũ.\r\nTừ Sài Gòn đi Đà Lạt có rất nhiều phương tiện di chuyển với giờ giấc linh hoạt, mất khoảng 6 – 8 giờ đường bộ còn hàng không thì tầm 50 phút là có mặt tại sân bay Liên Khương rồi. Tuy được mệnh danh là thành phố có nhiều khách sạn bật nhất Việt Nam nhưng vào những mùa cao điểm đôi khi rất khó tìm chỗ lưu trú chất lượng và vừa ý nên mình hay chọn đặt phòng khách sạn online. Vừa đảm bảo chi phí hợp lý, vừa có nhiều lựa chọn thời gian và địa điểm, thỉnh thoảng kèm theo ưu đãi bất ngờ, thích nhất là nhận phòng ngay khi đặt chân đến Đà Lạt sau quãng thời gian di chuyển khá dài.\r\nMình có một anh bạn thân, hai đứa cùng xóm chơi chung từ hồi nhỏ xíu, lớn lên tuy mỗi đứa một công việc nhưng hể cứ “nhớ” Đà Lạt là lại “xách” nhau đi. Về điểm đến, tụi mình chạy theo cung đường để thuận tiện nhất, ví dụ về hướng bắc Đà Lạt sẽ có: Thung lũng tình yêu, Phân viện sinh học, đồi Thiên Phúc Đức, LangBiang,.. Hướng nam sẽ có: Dinh II, Đường hầm đất sét, Thiền viện Trúc Lâm,… Còn lại tất cả thời gian hầu như dùng để khám phá các quán café, địa điểm checkin mới, ẩm thực và đặc biệt là Chợ Âm Phủ.\r\nĐà Lạt là thiên đường ẩm thực với các món ăn đường phố đặc sắc và đặc sản phong phú. Bánh tráng nướng – sữa đậu nành là combo gây “nghiện” của đa số các bạn trẻ và mình là một ví dụ điển hình. Dưới cái tiết trời se se lạnh, ngồi cạnh lò than cháy lách tách tỏa ra hơi ấm, bánh tráng nướng trên vỉ thơm lừng, trên tay là ly sữa đậu nành nóng hổi nghi ngút khói, cảm giác đúng là dễ chịu nhất trên đời. Ngoài ra, kem bơ, bắp nướng, khoai nướng và các món củ quả sấy cũng hấp dẫn không kém. Đến Đà Lạt bạn cũng nhất định phải thử Lẩu Bò 3 toa (Nhà gỗ), Lẩu gà lá, Buffet Kem và cả Nem nướng Bà Hùng nhe.\r\nĐiều đáng nhớ nhất ở Đà Lạt có lẻ là Chợ Âm Phủ, bởi cái tên nghe ngộ ngộ mà đúng là chỉ mở cửa và đông người vào giác tối khuya thôi. Ở đây tất cả các mặt hàng từ quần áo ấm bằng len, giày dép, mũ nón, đến các mặt hàng lưu niệm, các loại trái cây đặc trưng ở Đà Lạt như dâu tây, dâu tằm, hồng,.. các loại mứt dẻo nhiều màu bọc đường hay các loại trà sấy thơm ngát và cả sen đá, xương rồng đều được bày bán ở các gian hàng.\r\nKhông nhớ rõ mình và anh chàng “cạ cứng” đã đến Đà Lạt bao nhiêu lần, mỗi lần đến là lại mang về một mớ quà cho gia đình và cả ngàn tấm hình. Dù là con đường đã từng đi, địa điểm từng đến trước đây, nhưng dường như cảm giác vẫn hoàn toàn mới mẻ và hào hứng như lần đầu, vậy mới nói, Đà Lạt trở thành một phần cuộc sống của mình mất rồi. Mình hay đùa: “Lần này đi Đà Lạt về chia tay chứ nhỉ, tui chán cái mặt ông quá rồi”? Nhưng đến tận bây giờ, tụi mình vẫn chưa có ý định “ngừng” đi Đà Lạt và không những thế, “thành phố mộng mơ’\"còn nâng quan hệ chúng mình còn lên một tầm cao mới.\r\nTụi mình quyết định kết hôn vì chẳng thể tìm được “tri kỷ” thứ hai thấu hiểu tất tần tật về đối phương và đủ cảm thông cho cái đam mê “lạ lùng” kia. Mà đúng hơn là cả thanh xuân của tụi mình đã dành cho nhau với những kỉ niệm vô cùng tuyệt vời trên các cung đường và những con dốc tại Đà Lạt. Bây giờ, nghe mấy đứa nhóc truyền tai nhau chuyện đi Đà Lạt về chia tay mình và “ổng” lại bật cười. Thật ra, chia ly hay ở lại tất cả là do lòng người, chỉ là khi còn bên nhau chúng ta đã cùng đến đây, để rồi khi chia tay lại “đổ thừa” vì cái thành phố này nó “buồn”. Đà Lạt đã làm gì đâu chứ?', 'News-DaLat', 0, 6, '2025-04-19 12:29:34'),
(7, 'Ẩm thực Đà Lạt', 'News-Amthuc-Dalat-1.jpg', 'News-Amthuc-Dalat-2.jpg', 'News-Amthuc-Dalat-3.jpg', 'Đà Lạt thiên đường ẩm thực', 'Đà Lạt là thiên đường ẩm thực với các món ăn đường phố đặc sắc và đặc sản phong phú. Bánh tráng nướng – sữa đậu nành là combo gây “nghiện” của đa số các bạn trẻ và mình là một ví dụ điển hình. Dưới cái tiết trời se se lạnh, ngồi cạnh lò than cháy lách tách tỏa ra hơi ấm, bánh tráng nướng trên vỉ thơm lừng, trên tay là ly sữa đậu nành nóng hổi nghi ngút khói, cảm giác đúng là dễ chịu nhất trên đời. Ngoài ra, kem bơ, bắp nướng, khoai nướng và các món củ quả sấy cũng hấp dẫn không kém. Đến Đà Lạt bạn cũng nhất định phải thử Lẩu Bò 3 toa (Nhà gỗ), Lẩu gà lá, Buffet Kem và cả Nem nướng Bà Hùng nhe.\r\nĐiều đáng nhớ nhất ở Đà Lạt có lẻ là Chợ Âm Phủ, bởi cái tên nghe ngộ ngộ mà đúng là chỉ mở cửa và đông người vào giác tối khuya thôi. Ở đây tất cả các mặt hàng từ quần áo ấm bằng len, giày dép, mũ nón, đến các mặt hàng lưu niệm, các loại trái cây đặc trưng ở Đà Lạt như dâu tây, dâu tằm, hồng,.. các loại mứt dẻo nhiều màu bọc đường hay các loại trà sấy thơm ngát và cả sen đá, xương rồng đều được bày bán ở các gian hàng.\r\nKhông nhớ rõ mình và anh chàng “cạ cứng” đã đến Đà Lạt bao nhiêu lần, mỗi lần đến là lại mang về một mớ quà cho gia đình và cả ngàn tấm hình. Dù là con đường đã từng đi, địa điểm từng đến trước đây, nhưng dường như cảm giác vẫn hoàn toàn mới mẻ và hào hứng như lần đầu, vậy mới nói, Đà Lạt trở thành một phần cuộc sống của mình mất rồi. Mình hay đùa: “Lần này đi Đà Lạt về chia tay chứ nhỉ, tui chán cái mặt ông quá rồi”? Nhưng đến tận bây giờ, tụi mình vẫn chưa có ý định “ngừng” đi Đà Lạt và không những thế, “thành phố mộng mơ’\"còn nâng quan hệ chúng mình còn lên một tầm cao mới.', 'News-Amthuc-Dalat', 0, 7, '2025-04-19 12:41:04'),
(8, 'Nha Trang điểm đến của những tín đồ ẩm thực', 'News-Amthuc-Nhatrang-1.jpg', 'News-Amthuc-Nhatrang-2.jpg', 'News-Amthuc-Nhatrang-3.jpg', 'Nha Trang thành phố biển xinh đẹp là một trong những điểm đến tuyệt vời với những người yêu ẩm thực.', 'Nha Trang là thiên đường biển đảo, cũng là thiên đường ăn vặt những món hải sản. Ở Nha Trang có nhiều quán ốc ngon bổ rẻ để hội bạn thân chúng mình “chem chép” miệng mỗi khi thèm. Dù là ở trung tâm thành phố, hay khu vực xa xa trung tâm, bạn đều có thể dễ dàng bắt gặp những quán ốc, xe bán ốc ở các tuyến đường, trong khu chợ. Ốc tươi ngon, mới lên trong ngày kèm với gia vị đậm đà và chén nước chấm chua cay thần thánh của dân biển Nha Trang, món ốc trở thành món ăn vặt TOP 1 Nha Trang.\r\nHến xúc bánh tráng – “Vị biển” hòa quyện\r\nThay đổi với món ăn vặt Nha Trang không thể không nhắc tới món hến xúc bánh tráng với hương vị thơm ngon được nhiều người ưa chuộng, bạn đã thử món này bao giờ chưa? Hến được tẩm ướp rồi mới xào, khi nào có khách đến sẽ được xào với hành lại cho nóng, thêm vài lát ớt cay thơm. Ăn kèm với bánh tráng vừng đen miền Trung được nướng giòn rụm, hòa quyện làm cho thực khách không thể cưỡng lại độ ngon của nó.\r\nChén trứng nướng – Nhỏ xíu nhưng ngon phải biết\r\nMón ăn này khá mới với team ăn vặt ở Nha Trang. Trứng nướng không người dân ở Nha Trang. Mà còn cả khách du lịch cũng rất thích món ăn này. Mỗi chén nhỏ chứa đựng trứng cút, xúc xích thái nhỏ, hành lá và đôi khi có thêm phô mai béo ngậy. Nướng trên bếp than hồng, từng chén trứng tỏa hương thơm lừng, mặt trứng vàng óng rất bắt mắt.', 'News-Amthuc-Nhatrang', 0, 8, '2025-04-19 13:02:19'),
(9, 'Món ăn đặc sản Phú Quốc ngon nức tiếng – Ăn ở đâu Ngon – Rẻ?', 'News-Amthuc-Phuquoc-1.jpg', 'News-Amthuc-Phuquoc-2.jpg', 'News-Amthuc-Phuquoc-3.jpg', 'Đảo ngọc Phú Quốc thiên đường ẩm thực', 'Gỏi cá trích Phú Quốc – Hương vị biển cả trong từng miếng cá\r\nNhắc đến món ăn đặc sản Phú Quốc, không thể không nhắc đến gỏi cá trích – một món ăn mang hương vị tươi ngon, tinh tế từ biển cả. Gỏi cá trích được chế biến từ những lát cá trích tươi ngon, thái mỏng và trộn cùng dừa nạo, hành tây, rau thơm và đậu phộng rang. Điều đặc biệt của món này là nước chấm pha chế từ nước mắm Phú Quốc nguyên chất, chanh, tỏi, ớt tạo nên vị chua, cay, ngọt đậm đà. Khi ăn, thực khách cuốn cá trích cùng bánh tráng, rau sống và chấm nước mắm, tạo nên sự kết hợp hài hòa giữa vị béo của dừa, vị ngọt của cá, độ giòn của hành tây và vị chua cay của nước chấm.\r\nBún kèn – Món bún độc đáo chỉ có ở Phú Quốc\r\nBún kèn là món ăn sáng đặc trưng của người dân đảo Phú Quốc, khác biệt hoàn toàn so với các loại bún nước thông thường. Món này có nước lèo được nấu từ cá nhàu hoặc cá ngân xay nhuyễn, kết hợp với nước cốt dừa, cà ri, sả, tỏi phi và ớt xay, tạo nên màu vàng hấp dẫn và hương vị béo ngậy đặc trưng. Khi ăn, bún kèn được chan nước lèo đậm đà, ăn kèm với rau sống, giá đỗ, dưa leo và đậu phộng rang. Mỗi muỗng bún kèn là sự hòa quyện giữa vị béo của nước dừa, vị cay của ớt, cùng vị ngọt tự nhiên từ cá biển.\r\nGhẹ Hàm Ninh – Đặc sản hải sản ngon khó cưỡng\r\nGhẹ Hàm Ninh là một trong những món ăn nổi tiếng nhất Phú Quốc, bởi thịt ghẹ săn chắc, ngọt tự nhiên hơn hẳn các loại ghẹ nuôi.\r\n\r\nGhẹ có thể chế biến thành nhiều món như ghẹ hấp, ghẹ rang me, cháo ghẹ… nhưng cách ngon nhất để thưởng thức là ghẹ hấp chấm muối tiêu chanh. Vị ngọt tự nhiên của ghẹ hòa quyện với muối tiêu chanh cay nồng, chua nhẹ làm nổi bật hương vị hải sản tươi ngon.', 'News-Amthuc-Phuquoc', 0, 9, '2025-04-19 14:13:24'),
(10, 'Ẩm thực thành phố biển Quy Nhơn', 'News-Amthuc-QuyNhon-1.jpg', 'News-Amthuc-QuyNhon-2.jpg', 'News-Amthuc-QuyNhon-3.jpg', 'Thành phố của ẩm thực - Quy Nhơn', 'Bún Rạm\r\nBún rạm là một trong những món ăn đặc trưng ở Quy Nhơn mà bạn không thể bỏ qua khi đến đây. Món bún này được chế biến từ rạm (loài cua đồng nhỏ) và bún tươi. Nước dùng của bún rạm rất đặc biệt, có vị ngọt tự nhiên từ cua, kết hợp cùng các gia vị như hành, tỏi, ớt và một ít rau sống tạo nên một món ăn vô cùng hấp dẫn. Bún rạm có thể được ăn kèm với bánh tráng nướng giòn hoặc các loại rau sống, mang đến một hương vị khó quên.\r\nBánh Xèo Tôm Nhảy\r\nBánh xèo tôm nhảy là món ăn không thể thiếu trong thực đơn ẩm thực Quy Nhơn. Những chiếc bánh xèo giòn tan, có màu vàng ươm, được chế biến từ bột gạo, tôm tươi và các loại rau sống như xà lách, rau thơm. Món ăn này thường được ăn kèm với nước chấm chua ngọt, mang đến hương vị đậm đà. Điều đặc biệt ở món bánh xèo Quy Nhơn là tôm sử dụng phải là tôm tươi, nhảy lách tách khi chế biến, tạo nên một hương vị ngọt thanh và hấp dẫn.\r\nBánh Ít Lá Gai\r\nBánh ít lá gai là món ăn dân dã của Quy Nhơn, được làm từ bột nếp và lá gai, nhân đậu xanh hoặc dừa nạo. Bánh được gói trong lá chuối và hấp chín, tạo nên một hương vị rất riêng biệt. Khi thưởng thức, bạn sẽ cảm nhận được độ dẻo, mềm của bánh, kết hợp với vị ngọt bùi của nhân dừa hoặc đậu xanh. Đây là món ăn thường xuất hiện trong các dịp lễ hội, tết cổ truyền của người dân miền Trung.', 'News-Amthuc-Quynhon', 0, 10, '2025-04-19 14:13:24'),
(11, 'Đà Lạt có gì chơi? Ai chưa biết thì xem liền bài viết này ngay', 'News-Kinhnghiem-DaLat-1.jpg', 'News-Kinhnghiem-DaLat-2.jpg', 'News-Kinhnghiem-DaLat-3.jpg', 'Kinh nghiệm du lịch Đà Lạt', 'Hồ Tuyền Lâm\r\nLà hồ nước ngọt rộng nhất Ðà Lạt, nằm cách trung tâm thành phố Đà Lạt 7 km và cách thác Datanla 2km. Đây được xem là khu phức hợp tập trung nhiều cảnh quan đẹp và dịch vụ du lịch phong phú. Hồ có nhiều ốc đảo nhỏ và được bao bọc bởi khu rừng thông. Các bạn có thể đi cáp treo qua đồi Rôbin, ngắm cảnh rừng thông, hồ Tuyền Lâm, núi Phượng Hoàng từ trên cao. Hoặc đi thuyền dạo quanh trên mặt hồ.\r\nGa xe lửa Đà Lạt\r\nCho đến nay là ga duy nhất được công nhận là di tích lịch sử văn hóa quốc gia. Nhà ga được kiến trúc sư người Pháp Moncet cùng với đồng nghiệp là Revenron và lãnh đạo thi công. Hiện tại xe lửa ở Đà Lạt chỉ phục vụ cho hành trình ngắn trong Đà Lạt để phục vụ việc tham quan. Cũng rất thú vị khi ngắm Đà Lạt dọc theo hành trình này.\r\nMột số Thác ở Đà Lạt\r\nThác Prenn: Chỉ cách trung tâm thành phố 10 km, thác Prenn mang đến vẻ đẹp yên bình. Là nơi lý tưởng để thư giãn giữa thiên nhiên.\r\nThác Datanla: Là điểm đến được yêu thích bởi các hoạt động mạo hiểm, đặc biệt là máng trượt và trekking.\r\nThác Hang Cọp: Được bao quanh bởi rừng nguyên sinh, thác mang vẻ đẹp hoang sơ, phù hợp cho những ai yêu thích khám phá.\r\nThác Cam Ly: Nhẹ nhàng và gần gũi, thác Cam Ly là địa điểm hoàn hảo cho những buổi dã ngoại.\r\nThác Pongour: Với quy mô lớn và vẻ đẹp hùng vĩ, Pongour được mệnh danh là “Nam Thiên Đệ Nhất Thác”, thu hút đông đảo du khách.', 'News-Kinhnghiem-Dalat', 0, 11, '2025-04-19 14:23:53'),
(12, 'Khám phá Bắc Đảo Phú Quốc cực hấp dẫn', 'News-Kinhnghiem-PhuQuoc-1.jpg', 'News-Kinhnghiem-PhuQuoc-2.jpg', 'News-Kinhnghiem-PhuQuoc-3.jpg', 'Kinh nghiệm du lịch Phú Quốc', 'Làng chài Rạch Vẹm – Vương quốc sao biển\r\nLàng chài Rạch Vẹm còn được mệnh danh là vương quốc sao biển. Đây là một trong những điểm đến mang lại cho bạn những bức hình với background siêu xịn sò. Nước biển trong xanh mát rượi, điểm tô thêm bằng những con sao biển đầy màu sắc. Bạn sẽ thấy thật là thích mắt khi được ngắm khung cảnh đẹp như mơ này. Vào thời điểm từ tháng 12 đến tháng 4 năm sau, biển lặng sóng, nhiều sao biển sẽ ngoi lên hơn đó.\r\nVinpearl Safari Phú Quốc – Thế giới hoang dã\r\nVinpearl Safari Phú Quốc là công viên chăm sóc và bảo tồn động vật bán hoang dã lớn nhất Việt Nam. Nơi bạn có cơ hội ngắm nhìn hàng trăm loài động vật quý hiếm từ khắp nơi trên thế giới. Hành trình khám phá tại đây mang đến trải nghiệm độc đáo khi du khách được ngồi xe buýt, trực tiếp ngắm nhìn các loài thú trong môi trường sống tự nhiên. Từ những chú hươu cao cổ thanh tao đến những chú hổ Bengal dũng mãnh. Vinpearl Safari Bắc Đảo Phú Quốc thực sự là điểm đến lý tưởng cho các gia đình và những ai yêu thiên nhiên.\r\nMũi Gành Dầu – Góc nhìn ra vịnh Thái Lan\r\nNếu bạn đang tìm cho mình một chút yên bình, đừng bỏ qua mũi Gành dầu yên ả nên thơ này bạn nhé. Là một trong những kho báu mà thiên nhiên ban tặng cho Phú Quốc. Đây là nơi mang trong mình vẻ đẹp hoang sơ quyến rũ với những mỏm đá đa hình đa dạng cùng bãi biển trong xanh.', 'News-Kinhnghiem-Phuquoc', 0, 12, '2025-04-19 14:32:44'),
(13, 'Không cần biết bơi nhưng vẫn khám phá Đại Dương', 'News-Kinhnghiem-Bien-1.jpg', 'News-Kinhnghiem-Bien-2.jpg', 'News-Kinhnghiem-Bien-3.jpg', 'Kinh nghiệm đi biển', 'Lặn biển là một hoạt động du lịch khám phá, trong đó bạn sẽ được trang bị các thiết bị lặn như bình dưỡng khí, ống thở, kính bơi và vây để khám phá thế giới dưới nước. Khi lặn, bạn sẽ được chiêm ngưỡng những rạn san hô tuyệt đẹp, các loài sinh vật biển đa dạng và phong phú như cá, hải quỳ, sao biển…\r\nVịnh San Hô :  Từ cảng cầu Đá Nha Trang, chỉ mất khoảng 10 phút đi ca nô hoặc gần 30 phút đi tàu là đến Vịnh San hô. Gọi Vinh San hô nhưng đây là một bãi đá thuộc hòn Một nằm trong danh thắng quốc gia Vịnh Nha Trang được cải tạo để nuôi trồng san hô phục vụ du lịch.Vịnh San hô có hơn 80 loài san hô, hải quỳ và khoảng 70 giống cá biển.\r\nLưu ý cẩn thận khi đi bộ dưới đáy biển:\r\nKhi đeo mũ lặn vào, bạn sẽ không nghe ai nói gì hết. Ngoài nhìn vào khẩu hình miệng để đoán người khác muốn nói gì. Cảm giác khi mới xuống khiến bạn hơi shock nhưng khi đã quen thì không muốn lên luôn nha. Nếu ù tai bạn chỉ cần bịt mũi rồi nuốt nước bọt xuống thì sẽ giải quyết vấn đề ngay\r\nMũ đồng rất nặng gần 30kg nhưng khi xuống nước trọng lượng sẽ giảm 1 nửa. Nên cần giữ đầu thẳng khi đi xuống nước. Chiếc mũ này nói nôm na cho dễ hiểu là như một cái ly úp ngược vì vậy nước không thể nào tràn vào và sẽ có ống chuyền khí oxy. Khi thở ra khí cacbonic sẽ thoát ra ở những cái lỗ trên mũ. Chân mang ủng để tránh trầy xước bởi san hô dưới đáy.\r\nTrước khi xuống nước nghe kỹ lời Huấn Luận Viên dặn dò, luôn đi theo Hướng Dẫn Viên. Trang phục đi biển gọn gàng, đừng mang trang sức quý giá. Vì vậy mà chúng ta không phải e ngại chuyện không biết nhưng vẫn xuống được dưới đáy biển nhá. Hãy chuẩn bị sẵn sàng máy ảnh chụp dưới nước hoặc túi đựng điện thoại không thấm nước để săn ảnh bạn cùng bạn bè gia đình khi đi qua những rặng san hô đẹp.\r\n', 'News-Kinhnghiem-Bien', 0, 13, '2025-04-19 14:38:16'),
(14, 'Tổng hợp kinh nghiệm đi tour săn mây Đà Lạt', 'News-Kinhnghiem-DaLat-Sanmay-1.jpg', 'News-Kinhnghiem-DaLat-Sanmay-2.jpg', 'News-Kinhnghiem-DaLat-Sanmay-3.jpg', 'Săn mây Đà Lạt trải nghiệm tuyệt vời', 'Thời Điểm Lý Tưởng Để Săn Mây\r\nĐể tận hưởng trọn vẹn những khoảnh khắc tuyệt đẹp của mây tại thành phố ngàn hoa, bạn hãy chú ý đến thời gian và thời tiết Đà Lạt. Thông thường, từ tháng 4 đến tháng 10 được xem là thời điểm tuyệt vời nhất để săn mây Đà Lạt. Trong khoảng thời gian này, Đà Lạt thường có nhiều mây hơn và cảnh quan trở nên đặc biệt hấp dẫn.\r\n\r\nBên cạnh đó, mùa hè cũng là thời điểm mây xuất hiện nhiều nhất, đặc biệt là trong các vùng trũng và thung lũng. Những mảng mây trôi lơ lửng, tạo nên bức tranh thơ mộng và lãng mạn. Trong khi đó, vào mùa đông từ tháng 11 đến tháng 2 . Khi nhiệt độ giảm và trời lạnh hơn, sương mù dày đặc hơn, khiến cho mây tồn tại lâu hơn trên bầu trời.\r\n\r\nThời điểm săn mây đẹp nhất nên bắt đầu vào buổi sáng sớm, khoảng từ 4:30 đến 5:30 sáng. Vì đây là lúc lý tưởng nhất để bạn bắt gặp những khung cảnh mây trôi lơ lửng trông như lạc vào tiên giới.\r\n\r\nNhững Địa Điểm Nổi Tiếng Để Săn Mây\r\n\r\nĐỉnh Pinhatt: Một trong những đỉnh cao nổi tiếng nhất Đà Lạt với cảnh quan tuyệt đẹp. Tour săn mây tại đỉnh Pinhatt cho phép bạn ngắm bình minh, hoàng hôn và biển mây bồng bềnh. Đỉnh Pinhatt nằm cách trung tâm Đà Lạt không xa, rất thuận tiện cho việc di chuyển. Hành trình leo lên đỉnh Pinhatt không chỉ thử thách bản thân mà còn đem lại cảm giác chinh phục đỉnh cao tuyệt vời.\r\n\r\nĐỉnh Hòn Bồ: Địa điểm săn mây gần trung tâm Đà Lạt, rất được du khách yêu thích. Tour săn mây tại đỉnh Hòn Bồ cho phép bạn ngắm nhìn toàn cảnh Đà Lạt ẩn hiện dưới biển mây trắng xóa. Đỉnh Hòn Bồ mang đến khung cảnh thiên nhiên hùng vĩ và không gian yên bình. Hãy chuẩn bị máy ảnh để ghi lại những khoảnh khắc đẹp nhất tại đây!\r\n\r\nCầu Đất: Nằm ở ngoại ô Đà Lạt, Cầu Đất nổi tiếng với những đồi chè xanh mướt và biển mây bồng bềnh. Tour săn mây tại Cầu Đất mang đến không gian yên tĩnh, thanh bình, rất phù hợp để thư giãn và chụp ảnh. Cầu Đất không chỉ thu hút du khách bởi vẻ đẹp thiên nhiên mà còn bởi không khí trong lành, mát mẻ.', 'News-Kinhnghiem-Dalat-Sanmay', 0, 14, '2025-04-19 14:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `hide` int(11) NOT NULL DEFAULT 0,
  `ordered` int(11) NOT NULL,
  `datebegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `name`, `image`, `link`, `hide`, `ordered`, `datebegin`) VALUES
(1, 'slide1-nhatrang', 'slide1-nhatrang.jpg', '', 0, 1, '2025-04-15 22:12:34'),
(2, 'slide2-taybac', 'slide2-taybac.jpg', '', 0, 2, '2025-04-15 22:12:34'),
(3, 'slide3-mientay', 'slide3-mientay.jpg', '', 0, 3, '2025-04-15 22:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `sale_percent` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `khoihanh` varchar(255) NOT NULL,
  `thoigian` varchar(255) NOT NULL,
  `diemkhoihanh` text NOT NULL,
  `description` text NOT NULL,
  `hide` int(11) NOT NULL DEFAULT 0,
  `ordered` int(11) NOT NULL,
  `meta` varchar(255) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `phanhang` int(11) NOT NULL,
  `datebegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id`, `name`, `view`, `price`, `price_sale`, `sale_percent`, `image`, `vehicle`, `khoihanh`, `thoigian`, `diemkhoihanh`, `description`, `hide`, `ordered`, `meta`, `categoryid`, `phanhang`, `datebegin`) VALUES
(1, 'Du Lịch Tây Bắc Mùa Lúa Chín [Nghĩa Lộ - Mù Cang Chải – Sapa – Fansipan – Lai Châu – Điện Biên – Mộc Châu]', 6, 12799000, 12799000, 0, 'mucangchai.jpg', 3, 'Thứ 2 hằng tuần', '6 ngày 5 đêm', 'Thành phố Hồ Chí Minh', 'Du lịch Tây Bắc mùa lúa chín là hành trình đưa du khách khám phá vẻ đẹp vàng rực rỡ của núi rừng Tây Bắc vào thời điểm đẹp nhất trong năm. Cung đường qua Nghĩa Lộ, Mù Cang Chải, Sapa, Lai Châu, Điện Biên, Mộc Châu… không chỉ thu hút bởi những thửa ruộng bậc thang lấp lánh trong nắng thu, mà còn bởi khí hậu mát lành, bản sắc văn hóa độc đáo của đồng bào dân tộc và những điểm đến nổi tiếng như đỉnh Fansipan, rừng thông Mộc Châu, cánh đồng Mường Thanh... Đây là hành trình lý tưởng dành cho những ai yêu thiên nhiên, thích khám phá và muốn lưu giữ những khoảnh khắc tuyệt đẹp của vùng cao.', 0, 1, 'du-lich-tay-bac-mua-lua-chin-nghia-lo-mu-cang-chai-sapa-fansipan-lai-chau-dien-bien-moc-chau', 1, 5, '2025-04-14 20:40:50'),
(2, 'Du Lịch Tây Bắc - Điện Biên - Mường Phăng\r\n', 1, 5990000, 5690000, 5, 'dienbienphu.jpg', 3, 'Thứ 3 hằng tuần', '3 ngày 2 đêm', 'Thành phố Hồ Chí Minh', 'Hành trình về với Điện Biên – vùng đất anh hùng gắn liền với chiến thắng Điện Biên Phủ “lừng lẫy năm châu, chấn động địa cầu”, là cơ hội để du khách sống lại những ký ức hào hùng của dân tộc. Trong tour, du khách sẽ được tham quan Mường Phăng – nơi đặt Sở chỉ huy Chiến dịch Điện Biên Phủ do Đại tướng Võ Nguyên Giáp trực tiếp lãnh đạo.\r\nBên cạnh giá trị lịch sử, tour còn mang đến trải nghiệm gần gũi với thiên nhiên và văn hóa của đồng bào Thái, Mông tại các bản làng vùng cao. Khí hậu trong lành, cảnh sắc núi rừng hùng vĩ cùng những nụ cười thân thiện của người dân địa phương sẽ để lại trong lòng du khách những ấn tượng khó quên. ', 0, 2, 'du-lich-tay-bac-dien-bien-muong-phang', 1, 4, '2025-04-14 20:51:57'),
(3, 'Du Lịch Hà Nội - Tham Quan Chùa Hương', 0, 1100000, 1100000, 0, 'duathuyen_hanoi.jpg', 2, 'Thứ 4 hằng tuần', '1 ngày', 'Hà Nội', 'Chùa Hương – điểm hành hương nổi tiếng và linh thiêng bậc nhất miền Bắc, là nơi hội tụ giữa cảnh sắc thiên nhiên thơ mộng và giá trị tâm linh sâu sắc. Du khách sẽ được du ngoạn trên dòng suối Yến trong xanh, len qua những dãy núi trập trùng để đến với động Hương Tích – được mệnh danh là “Nam Thiên Đệ Nhất Động”.\r\nHành trình không chỉ là chuyến đi về với chốn thiền môn tĩnh lặng, cầu bình an, mà còn là cơ hội hòa mình vào khung cảnh sơn thủy hữu tình, thưởng ngoạn vẻ đẹp non nước hữu tình của danh thắng nổi tiếng này. Một trải nghiệm vừa thanh tịnh, vừa đầy thi vị cho những ai muốn tìm sự an yên trong tâm hồn.', 0, 3, 'du-lich-ha-noi-tham-quan-chua-huong', 1, 5, '2025-04-14 21:01:31'),
(4, 'Du lịch Hà Nội - TÀU ĐIỆN CÁT LINH HÀ ĐÔNG – NHÀ HÁT MÚA RỐI VIỆT NAM', 0, 4580000, 4122000, 10, 'hoguom_hanoi.jpg', 3, 'Thứ 5 hằng tuần', '3 ngày 2 đêm', 'Thành phố Hồ Chí Minh', 'Hành trình du lịch Hà Nội mang đến trải nghiệm mới mẻ và độc đáo, kết hợp giữa hiện đại và truyền thống. Du khách sẽ được trải nghiệm cảm giác thú vị khi di chuyển bằng tuyến tàu điện trên cao Cát Linh - Hà Đông, ngắm nhìn thủ đô từ góc nhìn khác, vừa hiện đại vừa năng động.\r\nTiếp đó, tour đưa bạn đến Nhà hát Múa rối Việt Nam, nơi lưu giữ và trình diễn loại hình nghệ thuật dân gian đặc sắc – múa rối nước. Với những tiết mục sống động, đậm chất văn hóa dân tộc, du khách sẽ có cái nhìn sâu sắc hơn về đời sống tinh thần của người Việt xưa.\r\nMột chuyến đi nhẹ nhàng nhưng đầy sắc màu văn hóa, rất phù hợp cho cả gia đình và những ai yêu Hà Nội theo cách vừa hiện đại vừa truyền thống.', 0, 4, 'du-lich-ha-noi-tau-dien-cat-linh-ha-dong-nha-hat-mua-roi-viet-nam', 1, 3, '2025-04-14 21:01:31'),
(5, 'Du Lịch Hạ Long - Trải Nghiệm Du Thuyền Athena', 1, 3750000, 3450000, 8, 'duthuyen_halong.jpg', 2, 'Thứ 6 hằng tuần', '2 ngày 1 đêm', 'Hà Nội', 'Hành trình khám phá vịnh Hạ Long – kỳ quan thiên nhiên thế giới – trở nên đẳng cấp và thi vị hơn bao giờ hết với trải nghiệm du thuyền Athena 5 sao. Du khách sẽ được tận hưởng không gian sang trọng, tiện nghi cùng các dịch vụ chuẩn quốc tế trên du thuyền.\r\nTrong suốt chuyến đi, bạn có cơ hội chiêm ngưỡng những hòn đảo đá vôi kỳ vĩ, ghé thăm hang động tuyệt đẹp, chèo thuyền kayak, tắm biển, hoặc đơn giản là thư giãn trên boong tàu giữa thiên nhiên mênh mông. Đây là lựa chọn lý tưởng cho những ai muốn tận hưởng kỳ nghỉ vừa thư giãn, vừa đầy cảm hứng giữa non nước Hạ Long.', 0, 5, 'du-lich-ha-long-trai-nghiem-du-thuyen-athena', 1, 5, '2025-04-14 21:08:28'),
(6, 'Du lịch Móng Cái - Hạ Long - Ninh Bình - Tràng An', 2, 10490000, 8915000, 15, 'halong.jpg', 3, 'Thứ 7 hằng tuần', '4 ngày 3 đêm', 'Thành phố Hồ Chí Minh', 'Hành trình du lịch xuyên suốt từ Đông Bắc đến miền Bắc mang đến cho du khách những trải nghiệm đa dạng về cảnh quan thiên nhiên và văn hóa đặc sắc. Từ Móng Cái – vùng đất biên cương sôi động, đến Hạ Long – nơi có vịnh biển kỳ quan thế giới, du khách sẽ được hòa mình vào khung cảnh hùng vĩ và thơ mộng của non nước.\r\nTiếp nối chuyến đi là Ninh Bình, vùng đất cổ kính với quần thể danh thắng Tràng An, nơi nổi bật với những dòng sông xanh ngọc uốn lượn qua núi đá vôi trùng điệp. Đây là hành trình lý tưởng cho những ai muốn khám phá vẻ đẹp tự nhiên kết hợp với những giá trị lịch sử – văn hóa lâu đời của đất nước.', 0, 6, 'du-lich-mong-cai-ha-long-ninh-binh-trang-an', 1, 5, '2025-04-14 21:11:28'),
(7, 'Du lịch Hà Nội - Sapa\r\n', 0, 3799000, 3533000, 5, 'doihoatim_sapa.jpg', 2, 'Thứ 2 hằng tuần', '3 ngày 2 đêm', 'Hà Nội', 'Hành trình từ Hà Nội đến Sapa là sự kết hợp hoàn hảo giữa nét đẹp cổ kính của Thủ đô ngàn năm văn hiến và vẻ đẹp hùng vĩ, thơ mộng của núi rừng Tây Bắc. Du khách sẽ được khám phá khí hậu trong lành, những thửa ruộng bậc thang kỳ vĩ, đỉnh Fansipan – nóc nhà Đông Dương, và trải nghiệm cuộc sống độc đáo của các dân tộc thiểu số nơi đây.\r\nĐây là chuyến đi lý tưởng để nghỉ dưỡng, thư giãn và hòa mình vào thiên nhiên giữa những bản làng yên bình, mây trời bồng bềnh và văn hóa đa sắc màu của vùng cao Tây Bắc.', 0, 7, 'du-lich-ha-noi-sa-pa', 1, 4, '2025-04-14 21:18:25'),
(8, 'Du Lịch Sapa - Lào Cai\r\n', 0, 9799000, 8623000, 12, 'sapa.jpg', 3, 'Thứ 3 hằng tuần', '4 ngày 3 đêm', 'Thành phố Hồ Chí Minh', 'Du lịch Sapa – Lào Cai là hành trình đưa du khách đến với vùng đất Tây Bắc thơ mộng, nơi có khí hậu mát mẻ quanh năm và phong cảnh thiên nhiên tuyệt đẹp. Sapa nổi tiếng với những ruộng bậc thang xanh mướt, bản làng dân tộc mộc mạc và đỉnh Fansipan hùng vĩ – nóc nhà Đông Dương.\r\nBên cạnh đó, Lào Cai còn là cửa khẩu quốc tế sôi động, nơi giao thoa văn hóa giữa Việt Nam và Trung Quốc. Đây là hành trình lý tưởng để vừa nghỉ dưỡng, vừa khám phá vẻ đẹp vùng cao và tìm hiểu đời sống văn hóa đặc sắc của các dân tộc thiểu số.', 0, 8, 'du-lich-sapa-lao-cai', 1, 3, '2025-04-14 21:18:25'),
(9, 'Du Lịch Đà Nẵng - Bà Nà - Hội An - Động Thiên Đường - Huế\r\n', 2, 10349000, 10039000, 3, 'hoian.jpg', 3, 'Thứ 4 hằng tuần', '5 ngày 4 đêm', 'Thành phố Hồ Chí Minh', 'Hành trình du lịch Đà Nẵng – Bà Nà – Hội An – Động Thiên Đường – Huế là chuyến đi kết nối những điểm đến nổi bật nhất miền Trung, mang đến cho du khách trải nghiệm vừa sôi động vừa sâu lắng.\r\nKhởi đầu từ thành phố Đà Nẵng hiện đại, du khách sẽ được chinh phục Bà Nà Hills với cảnh sắc như chốn bồng lai, sau đó hòa mình vào không gian cổ kính, lãng mạn của phố cổ Hội An. Tiếp tục khám phá vẻ đẹp kỳ vĩ của Động Thiên Đường – “hoàng cung trong lòng đất”, và kết thúc tại Cố đô Huế mộng mơ, nơi lưu giữ tinh hoa văn hóa và lịch sử triều Nguyễn.\r\nMột chuyến đi dung hòa giữa thiên nhiên, văn hóa và nghỉ dưỡng, hứa hẹn để lại những kỷ niệm khó quên.', 0, 9, 'du-lich-da-nang-ba-na-hoi-an-dong-thien-duong-hue', 2, 5, '2025-04-14 21:25:26'),
(10, 'Du lịch Đà Nẵng BÀ NÀ HILLS – PHỐ CỔ HỘI AN -RỪNG DỪA BẢY MẪU', 0, 8490000, 8490000, 0, 'cauvang_danang.jpg', 3, 'Thứ 5 hằng tuần', '4 ngày 3 đêm', 'Hà Nội', 'Hành trình du lịch là sự kết hợp hoàn hảo giữa vẻ đẹp thiên nhiên kỳ vĩ và di sản văn hóa đặc sắc của miền Trung.\r\nKhởi đầu chuyến đi, du khách sẽ được chiêm ngưỡng phong cảnh tuyệt đẹp từ đỉnh Bà Nà Hills, nơi có cây cầu Vàng nổi tiếng và không gian mát lạnh, huyền bí. Tiếp theo, bạn sẽ dạo bước qua những con phố cổ kính của Hội An, nơi vẻ đẹp của những ngôi nhà cổ và ánh đèn lồng lung linh tạo nên một không gian rất riêng, lôi cuốn. Cuối cùng, bạn sẽ khám phá Rừng Dừa Bảy Mẫu với hệ sinh thái phong phú, cùng những chuyến tham quan trên thuyền nhỏ giữa những rặng dừa xanh ngát.\r\nChuyến đi mang đến trải nghiệm phong phú, từ thiên nhiên hùng vĩ đến di sản văn hóa, chắc chắn sẽ là một kỷ niệm đáng nhớ.', 0, 10, 'du-lich-da-nang-ba-na-hills-pho-co-hoi-an-rung-dua-bay-mau', 2, 5, '2025-04-14 21:25:26'),
(11, 'Du Lịch Nha Trang - Thác Yang Bay - Đảo Hoa Lan - Chùa Long Sơn - Làng Yến Mai Sinh', 0, 4079000, 3870000, 5, 'beach_nhatrang.jpg', 2, 'Thứ 7 hằng tuần', '4 ngày 3 đêm', 'Thành phố Hồ Chí Minh', 'Chuyến du lịch Nha Trang đưa du khách đến với một trong những điểm đến nổi bật nhất của miền Trung, nơi có vẻ đẹp thiên nhiên hoang sơ, lịch sử văn hóa lâu đời và những trải nghiệm thú vị.\r\nKhởi đầu tại Thác Yang Bay, du khách sẽ được chiêm ngưỡng vẻ đẹp hùng vĩ của thác nước giữa thiên nhiên xanh mát, thích hợp cho những ai yêu thích khám phá và chinh phục. Tiếp theo, Đảo Hoa Lan mang đến một không gian yên bình, là nơi lý tưởng để thư giãn và tận hưởng biển xanh, cát trắng. Chùa Long Sơn với tượng Phật khổng lồ là một trong những điểm đến tâm linh nổi tiếng ở Nha Trang, giúp du khách tìm thấy sự bình yên trong tâm hồn. Cuối cùng, Làng Yến Mai Sinh là cơ hội để du khách khám phá nghề nuôi yến độc đáo, cũng như thưởng thức các sản phẩm từ yến sào.\r\nChuyến đi là sự kết hợp giữa thiên nhiên, văn hóa và những giá trị truyền thống, mang đến một trải nghiệm đa dạng và đáng nhớ.', 0, 11, 'du-lich-nha-trang-thac-yang-bay-dao-hoa-lan-chua-long-son-lang-yen-mai-sinh', 2, 5, '2025-04-14 21:31:14'),
(12, 'DU LỊCH NHA TRANG – HÒN TẦM – VINWONDERS\r\n', 0, 7190000, 6615000, 8, 'nhatrang.jpg', 2, 'Chủ nhật hằng tuần', '4 ngày 3 đêm', 'Hà Nội', 'Chuyến du lịch đưa du khách đến với những trải nghiệm tuyệt vời ở vùng biển miền Trung, nơi có vẻ đẹp tựa thiên đường và các công trình vui chơi giải trí hàng đầu.\r\nKhởi đầu hành trình, du khách sẽ được khám phá Hòn Tầm, một hòn đảo hoang sơ với làn nước trong xanh, bãi biển cát trắng mịn và các hoạt động thể thao dưới nước thú vị như lặn biển, thuyền kayak. Tiếp theo, hành trình đưa du khách đến VinWonders Nha Trang, công viên giải trí nổi tiếng với hàng loạt trò chơi cảm giác mạnh, các khu vui chơi cho mọi lứa tuổi, vườn thú Safari và các show diễn đặc sắc, mang đến một ngày vui chơi sôi động và thư giãn.\r\nChuyến đi này không chỉ là cơ hội để tận hưởng vẻ đẹp tự nhiên của Nha Trang, mà còn là dịp để tham gia vào các hoạt động giải trí hấp dẫn, phù hợp cho gia đình và nhóm bạn.', 0, 12, 'du-lich-nha-trang-hon-tam-vinwonders', 2, 5, '2025-04-14 21:31:14'),
(13, 'Du Lịch Đà Lạt Mongo Land - Đồi Chè Cầu Đất - Chùa Linh Phước - Thác Datanla', 0, 3879000, 3500000, 10, 'dalat.jpg', 2, 'Thứ 2 hằng tuần', '4 ngày 3 đêm', 'Thành phố Hồ Chí Minh', 'Chuyến du lịch Đà Lạt này đưa du khách đến với những điểm đến độc đáo và thơ mộng của thành phố ngàn hoa. Từ Mongo Land – khu tổ hợp sống ảo đầy màu sắc, đến Đồi chè Cầu Đất xanh mướt trải dài, là nơi lý tưởng để hít thở không khí trong lành và lưu giữ những bức ảnh đẹp. Hành trình tiếp tục với Chùa Linh Phước – ngôi chùa độc đáo được khảm sành sứ tinh xảo, và Thác Datanla – nơi du khách có thể trải nghiệm cảm giác mạnh qua máng trượt xuyên rừng. Đây là tour thích hợp cho những ai yêu thiên nhiên, văn hóa và những trải nghiệm mới mẻ giữa cao nguyên thơ mộng.', 0, 13, 'du-lich-da-lat-mongo-land-doi-che-cau-dat-chua-linh-phuoc-thac-datanla', 2, 5, '2025-04-14 21:42:22'),
(14, 'COMBO ĐÀ LẠT', 37, 5490000, 5490000, 0, 'doiche_dalat.jpg', 2, 'Thứ 3 hằng tuần', '3 ngày 2 đêm', 'Hà Nội', '<p>Chuyến du lịch kết hợp l&yacute; tưởng d&agrave;nh cho du kh&aacute;ch từ H&agrave; Nội muốn kh&aacute;m ph&aacute; th&agrave;nh phố Đ&agrave; Lạt mộng mơ với lịch tr&igrave;nh linh hoạt v&agrave; tiết kiệm. Với combo trọn g&oacute;i bao gồm v&eacute; m&aacute;y bay, kh&aacute;ch sạn v&agrave; c&aacute;c điểm tham quan nổi bật như Thung Lũng T&igrave;nh Y&ecirc;u, Đồi Ch&egrave; Cầu Đất, Chợ Đ&agrave; Lạt, Ga Đ&agrave; Lạt&hellip; du kh&aacute;ch sẽ c&oacute; những trải nghiệm thư gi&atilde;n, tận hưởng kh&iacute; hậu se lạnh v&agrave; cảnh sắc n&ecirc;n thơ của cao nguy&ecirc;n. Đ&acirc;y l&agrave; lựa chọn ho&agrave;n hảo cho kỳ nghỉ cuối tuần hoặc kỳ nghỉ ngắn ng&agrave;y đầy th&uacute; vị.</p>', 0, 14, 'du-lich-ha-noi-combo-da-lat', 2, 0, '2025-04-14 21:42:22'),
(15, 'Combo Phú Quốc\r\n', 1, 4590000, 4360000, 5, 'phuquoc.jpg', 3, 'Thứ 4 hằng tuần', '3 ngày 2 đêm', 'Hà Nội', 'Hành trình khám phá đảo ngọc Phú Quốc dành cho du khách xuất phát từ Hà Nội với gói combo tiết kiệm và tiện lợi. Gói dịch vụ bao gồm vé máy bay khứ hồi, lưu trú tại khách sạn hoặc resort chất lượng cùng các điểm tham quan nổi bật như Hòn Thơm, Bãi Sao, Sunset Sanato, Grand World… Đây là cơ hội tuyệt vời để nghỉ dưỡng bên biển, đắm mình trong thiên nhiên hoang sơ và tận hưởng những khoảnh khắc thư giãn tuyệt đối nơi đảo ngọc miền Nam.', 0, 15, 'du-lich-combo-phu-quoc', 3, 5, '2025-04-14 21:50:15'),
(16, 'Du Lịch Phú Quốc - Thiên Đường Giải Trí\r\n', 2, 7979000, 7181000, 10, 'captreo_phuquoc.jpg', 2, 'Thứ 5 hằng tuần', '3 ngày 2 đêm', 'Thành phố Hồ Chí Minh', 'Hành trình khám phá đảo ngọc Phú Quốc – thiên đường nghỉ dưỡng và giải trí hàng đầu Việt Nam. Du khách sẽ được trải nghiệm chuỗi hoạt động hấp dẫn như vui chơi tại VinWonders, khám phá thế giới đại dương ở Vinpearl Safari, lặn ngắm san hô, tham quan Hòn Thơm bằng cáp treo vượt biển dài nhất thế giới, hay thư giãn tại Bãi Sao, Bãi Dài nổi tiếng với làn nước trong xanh. Chuyến đi là sự kết hợp hoàn hảo giữa nghỉ dưỡng, khám phá thiên nhiên và tận hưởng những dịch vụ giải trí đẳng cấp.', 0, 16, 'dulich-phu-quoc-thien-duong-giai-tri', 3, 5, '2025-04-14 21:50:15'),
(17, 'Du lịch Miền Tây Bến Tre - Trà Vinh - Vĩnh Long - Đồng Tháp - Tiền Giang\r\n', 11, 5279000, 4490000, 15, 'dongthap.jpg', 1, 'Thứ 6 hằng tuần', '4 ngày 3 đêm', 'Thành phố Hồ Chí Minh', 'Hành trình khám phá miền Tây sông nước, đưa du khách đến với những vùng đất hiền hòa, mộc mạc và đậm đà bản sắc văn hóa. Từ Bến Tre với những vườn dừa xanh mướt, Trà Vinh mang nét giao thoa văn hóa Khmer độc đáo, đến Vĩnh Long hiền hòa bên những cù lao xanh mát. Đồng Tháp nổi bật với sắc sen hồng rực rỡ và Tiền Giang sôi động với chợ nổi, làng nghề truyền thống. Tour là cơ hội để du khách trải nghiệm đời sống miệt vườn, thưởng thức đặc sản địa phương và cảm nhận sự thân thiện, chân chất của người dân miền Tây.', 0, 17, 'du-lich-mien-tay-ben-tre-tra-vinh-vinh-long-dong-thap-tien-giang', 3, 2, '2025-04-14 21:55:09'),
(18, 'Du Lịch Miền Tây - Châu Đốc - Hà Tiên', 3, 4890000, 4890000, 0, 'hatien.jpg', 1, 'Thứ 7 hằng tuần', '3 ngày 2 đêm', 'Thành phố Hồ Chí Minh', 'Hành trình đưa du khách đến với hai vùng đất linh thiêng và thơ mộng của miền Tây Nam Bộ. Châu Đốc nổi tiếng với núi Sam, Miếu Bà Chúa Xứ linh thiêng, cùng những trải nghiệm văn hóa, tín ngưỡng đặc sắc. Hà Tiên lại mang vẻ đẹp hữu tình với bãi biển hoang sơ, hang động kỳ thú và những di tích cổ kính. Tour là sự kết hợp giữa tham quan tâm linh, khám phá thiên nhiên và tìm hiểu văn hóa địa phương, mang đến cho du khách những khoảnh khắc yên bình và đáng nhớ.', 0, 18, 'du-lich-mien-tay-chau-doc-ha-tien', 3, 5, '2025-04-14 21:55:09'),
(19, 'Du Lịch Vũng Tàu - Cần Giờ\r\n', 19, 2979000, 2979000, 0, 'vungtau.jpg', 1, 'Thứ 2 hằng tuần', '2 ngày 1 đêm', 'Thành phố Hồ Chí Minh', 'Hành trình khám phá hai điểm đến ven biển nổi tiếng của miền Nam, mang đến cho du khách trải nghiệm đa dạng giữa vẻ đẹp hiện đại và thiên nhiên hoang sơ. Tại Vũng Tàu, du khách được đắm mình trong làn nước biển trong xanh, tận hưởng không khí mát mẻ và tham quan các địa danh nổi bật như tượng Chúa Kitô dang tay, ngọn Hải đăng, Bạch Dinh, cùng những món ăn hải sản hấp dẫn tại Bãi Sau, Bãi Trước.\r\nTiếp nối hành trình là Cần Giờ – “lá phổi xanh” của TP.HCM, nơi nổi tiếng với khu dự trữ sinh quyển rừng ngập mặn, đảo Khỉ, chợ Hàng Dương nhộn nhịp và các hoạt động khám phá thiên nhiên sông nước miền Tây. Đây là tour ngắn ngày lý tưởng cho gia đình, nhóm bạn bè muốn tìm kiếm một kỳ nghỉ nhẹ nhàng, gần gũi thiên nhiên nhưng vẫn nhiều điều thú vị để khám phá.', 0, 19, 'du-lich-vung-tau-can-gio', 3, 5, '2025-04-14 22:03:37'),
(20, 'Du Lịch Nghỉ Dưỡng Tại Minera Hot Spring Bình Châu - Vũng Tàu\r\n', 43, 5180000, 4921000, 5, 'resort_vungtau.jpg', 1, 'Thứ 7 hằng tuần', '3 ngày 2 đêm', 'Thành phố Hồ Chí Minh', 'Tour du lịch kết hợp giữa khám phá Vũng Tàu và thư giãn tại khu nghỉ dưỡng Minera Hot Spring Bình Châu. Du khách sẽ được tận hưởng không gian biển xanh của Vũng Tàu, tham quan các địa điểm nổi tiếng như Bãi Sau, ngọn Hải Đăng. Sau đó, tour sẽ đưa bạn đến khu nghỉ dưỡng Minera Hot Spring Bình Châu để thư giãn với suối khoáng nóng tự nhiên, tận hưởng không khí trong lành và dịch vụ chăm sóc sức khỏe tuyệt vời. Tour lý tưởng cho những ai tìm kiếm một kỳ nghỉ dưỡng yên tĩnh và phục hồi năng lượng, kết hợp với những trải nghiệm thư giãn trong không gian khoáng nóng tự nhiên và biển xanh.', 0, 20, 'du-lich-vung-tau-nghi-duong-tai-minera-hot-spring-binh-chau', 3, 3, '2025-04-14 22:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gioitinh` varchar(11) NOT NULL DEFAULT '0',
  `ngaysinh` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `2fa` int(11) NOT NULL DEFAULT 1,
  `datebegin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `fullname`, `email`, `password`, `gioitinh`, `ngaysinh`, `phone`, `address`, `2fa`, `datebegin`) VALUES
(1, 'Lê Phú Vinh', 'lephuvinh30605@gmail.com', '$2y$10$CWDGE/C0UKOI4DrnBu4c/OPTzGyHeOjugblwaRGv22TX/PS2rkDpu', 'Nam', '2005-06-30', '0835651489', 'Quận 7, Tp.HCM', 0, '2025-04-29 16:03:39'),
(2, 'Lương Lê Nhân Trí ', 'Lenhantrisp@gmail.com', '$2y$10$joCH4GUPb3.0NsrgxEqGbu7ELbenLwELDIpNF2nEX7tnB5axPZq9C', 'Nam', '2005-02-03', '0123456789', 'Quận 7, Tp.HCM', 1, '2025-05-17 17:49:58'),
(3, 'Khách hàng 1', 'ruhplq6fjc@illubd.com', '$2y$10$7FadXev.0KZKUUFKCr4.JeCq/WhCk6zEnt2ZfvziwfRjyqCODOXp2', 'Nữ', '2000-01-10', '0123456789', 'Hà Nội', 1, '2025-05-17 19:48:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booktour`
--
ALTER TABLE `booktour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_booktour_user` (`userid`),
  ADD KEY `fk_booktour_tour` (`tourid`);

--
-- Indexes for table `canhdep`
--
ALTER TABLE `canhdep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitiettour`
--
ALTER TABLE `chitiettour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chitiettour_tour` (`tourid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_user` (`userid`),
  ADD KEY `fk_comment_tour` (`tourid`);

--
-- Indexes for table `customerfeedback`
--
ALTER TABLE `customerfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dieuchinhnews`
--
ALTER TABLE `dieuchinhnews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dieuchinhnews_admin` (`adminid`);

--
-- Indexes for table `dieuchinhslide`
--
ALTER TABLE `dieuchinhslide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dieuchinhslide_admin` (`adminid`),
  ADD KEY `fk_dieuchinhslide_slide` (`slideid`);

--
-- Indexes for table `dieuchinhtour`
--
ALTER TABLE `dieuchinhtour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dieuchinhtour_admin` (`adminid`),
  ADD KEY `fk_dieuchinhtour_tour` (`tourid`);

--
-- Indexes for table `lichtrinhtour`
--
ALTER TABLE `lichtrinhtour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lichtrinhtour_tour` (`tourid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tour_category` (`categoryid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `mail` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booktour`
--
ALTER TABLE `booktour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `canhdep`
--
ALTER TABLE `canhdep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chitiettour`
--
ALTER TABLE `chitiettour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customerfeedback`
--
ALTER TABLE `customerfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dieuchinhnews`
--
ALTER TABLE `dieuchinhnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dieuchinhslide`
--
ALTER TABLE `dieuchinhslide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dieuchinhtour`
--
ALTER TABLE `dieuchinhtour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lichtrinhtour`
--
ALTER TABLE `lichtrinhtour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booktour`
--
ALTER TABLE `booktour`
  ADD CONSTRAINT `fk_booktour_tour` FOREIGN KEY (`tourid`) REFERENCES `tour` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_booktour_user` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitiettour`
--
ALTER TABLE `chitiettour`
  ADD CONSTRAINT `fk_chitiettour_tour` FOREIGN KEY (`tourid`) REFERENCES `tour` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_tour` FOREIGN KEY (`tourid`) REFERENCES `tour` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dieuchinhnews`
--
ALTER TABLE `dieuchinhnews`
  ADD CONSTRAINT `fk_dieuchinhnews_admin` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dieuchinhnews_news` FOREIGN KEY (`idnews`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dieuchinhslide`
--
ALTER TABLE `dieuchinhslide`
  ADD CONSTRAINT `fk_dieuchinhslide_admin` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dieuchinhslide_slide` FOREIGN KEY (`slideid`) REFERENCES `slide` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dieuchinhtour`
--
ALTER TABLE `dieuchinhtour`
  ADD CONSTRAINT `fk_dieuchinhtour_admin` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dieuchinhtour_tour` FOREIGN KEY (`tourid`) REFERENCES `tour` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lichtrinhtour`
--
ALTER TABLE `lichtrinhtour`
  ADD CONSTRAINT `fk_lichtrinhtour_tour` FOREIGN KEY (`tourid`) REFERENCES `tour` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `fk_tour_category` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
