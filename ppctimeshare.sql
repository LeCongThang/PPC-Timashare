-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2017 at 07:09 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppctimeshare`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calc_distance` (`lat1` DECIMAL(10,6), `long1` DECIMAL(10,6), `lat2` DECIMAL(10,6), `long2` DECIMAL(10,6)) RETURNS DECIMAL(10,6) RETURN (6353 * 2 * ASIN(SQRT( POWER(SIN((lat1 - abs(lat2)) * pi()/180 / 2),2) + COS(lat1 * pi()/180 ) * COS( abs(lat2) * pi()/180) * POWER(SIN((long1 - long2) * pi()/180 / 2), 2) )))$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `title_about_1` text NOT NULL,
  `content_about_1` text NOT NULL,
  `title_about_2` text NOT NULL,
  `content_about_2` text NOT NULL,
  `id_about` int(11) NOT NULL,
  `about_language` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`title_about_1`, `content_about_1`, `title_about_2`, `content_about_2`, `id_about`, `about_language`) VALUES
('What is TimeShare?', 'Timeshare has many different forms, but the forms and scale of the timeshare is most commonly understood as shared vacation of premises by the landlord together.', 'Starting when and where?', 'The idea was triggered in early timeshare 20th century in Europe when families tend to buy holiday home together. These families have the same need to exchange its ownership in the same rest period, including renovation costs, as well as home improvement. For example, there are about 4 families with duration of use of 3-month / per year.', 1, 'en'),
('Timeshare là gì?', 'Timeshare có nhiều dạng khác nhau, tuy nhiên với nhiều hình thức và quy mô thì Timeshare được hiểu một cách phổ biến nhất như là kỳ nghỉ chia sẻ phòng ốc bởi các chủ nhà với nhau.', 'Khởi phát khi nào và ở đâu?', 'Ý tưởng timeshare được khởi phát vào đầu thế kỷ thứ 20 tại Châu Âu khi các gia đình có xu hướng muốn mua kỳ nghỉ tại gia với nhau. Những gia đình này đều cùng nhu cầu trao đổi quyền sở hữu của mình trong khoảng thời gian nghỉ như nhau gồm cả chi phí tu bổ cũng như sửa sang nhà cửa. Ví dụ như có khoảng 4 gia đình với thời gian sử dụng nhà 3 tháng/lần trong một năm.', 2, 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `announce_papers`
--

CREATE TABLE `announce_papers` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announce_papers`
--

INSERT INTO `announce_papers` (`id`, `link`, `date`, `image`) VALUES
(1, '#', '2017-01-01', 'img/connect_h1.jpg'),
(2, '#', '2017-01-02', 'img/connect_h2.jpg'),
(3, '#', '2017-01-03', 'img/connect_h3.jpg'),
(4, '#', '2017-01-04', 'img/connect_h4.jpg'),
(5, '#', '2017-01-05', 'img/connect_h5.jpg'),
(6, '#', '2017-01-06', 'img/connect_h6.jpg'),
(7, '#', '2017-01-07', 'img/connect_h1.jpg'),
(8, '#', '2017-01-08', 'img/connect_h2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `announce_papers_language`
--

CREATE TABLE `announce_papers_language` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `language` text NOT NULL,
  `id_announce_papers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announce_papers_language`
--

INSERT INTO `announce_papers_language` (`id`, `title`, `content`, `language`, `id_announce_papers`) VALUES
(1, 'THÔNG BÁO 1', 'Ngoài PPC Property thì PPCTimeshare được thành lập với hy vọng là cầu nối cho các khách hàng và các chủ đầu tư tham gia lĩnh vực Time-share, cùng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sở hữu quyền sở hữu tài sản của nhau', 'vi', 1),
(2, 'THÔNG BÁO 2', 'Ngoài PPC Property thì PPCTimeshare được thành lập với hy vọng là cầu nối cho các khách hàng và các chủ đầu tư tham gia lĩnh vực Time-share, cùng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sở hữu quyền sở hữu tài sản của nhau', 'vi', 2),
(3, 'THÔNG BÁO 3', 'Ngoài PPC Property thì PPCTimeshare được thành lập với hy vọng là cầu nối cho các khách hàng và các chủ đầu tư tham gia lĩnh vực Time-share, cùng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sở hữu quyền sở hữu tài sản của nhau', 'vi', 3),
(4, 'THÔNG BÁO 4', 'Ngoài PPC Property thì PPCTimeshare được thành lập với hy vọng là cầu nối cho các khách hàng và các chủ đầu tư tham gia lĩnh vực Time-share, cùng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sở hữu quyền sở hữu tài sản của nhau', 'vi', 4),
(5, 'THÔNG BÁO 5', 'Ngoài PPC Property thì PPCTimeshare được thành lập với hy vọng là cầu nối cho các khách hàng và các chủ đầu tư tham gia lĩnh vực Time-share, cùng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sở hữu quyền sở hữu tài sản của nhau', 'vi', 5),
(6, 'THÔNG BÁO 6', 'Ngoài PPC Property thì PPCTimeshare được thành lập với hy vọng là cầu nối cho các khách hàng và các chủ đầu tư tham gia lĩnh vực Time-share, cùng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sở hữu quyền sở hữu tài sản của nhau', 'vi', 6),
(7, 'THÔNG BÁO 7', 'Ngoài PPC Property thì PPCTimeshare được thành lập với hy vọng là cầu nối cho các khách hàng và các chủ đầu tư tham gia lĩnh vực Time-share, cùng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sở hữu quyền sở hữu tài sản của nhau', 'vi', 7),
(8, 'THÔNG BÁO 8', 'Ngoài PPC Property thì PPCTimeshare được thành lập với hy vọng là cầu nối cho các khách hàng và các chủ đầu tư tham gia lĩnh vực Time-share, cùng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sở hữu quyền sở hữu tài sản của nhau', 'vi', 8),
(9, 'ANNOUNCE 1', 'Property outside the PPCTimeshare PPC was established in the hope of a bridge for customers and investors to participate Time-share sector, to exchange holiday, and flexibility in property ownership other''s products', 'en', 1),
(10, 'ANNOUNCE 2', 'Property outside the PPCTimeshare PPC was established in the hope of a bridge for customers and investors to participate Time-share sector, to exchange holiday, and flexibility in property ownership other''s products', 'en', 2),
(11, 'ANNOUNCE 3', 'Property outside the PPCTimeshare PPC was established in the hope of a bridge for customers and investors to participate Time-share sector, to exchange holiday, and flexibility in property ownership other''s products', 'en', 3),
(12, 'ANNOUNCE 4', 'Property outside the PPCTimeshare PPC was established in the hope of a bridge for customers and investors to participate Time-share sector, to exchange holiday, and flexibility in property ownership other''s products', 'en', 4),
(13, 'ANNOUNCE 5', 'Property outside the PPCTimeshare PPC was established in the hope of a bridge for customers and investors to participate Time-share sector, to exchange holiday, and flexibility in property ownership other''s products', 'en', 5),
(14, 'ANNOUNCE 6', 'Property outside the PPCTimeshare PPC was established in the hope of a bridge for customers and investors to participate Time-share sector, to exchange holiday, and flexibility in property ownership other''s products', 'en', 6),
(15, 'ANNOUNCE 7', 'Property outside the PPCTimeshare PPC was established in the hope of a bridge for customers and investors to participate Time-share sector, to exchange holiday, and flexibility in property ownership other''s products', 'en', 7),
(16, 'ANNOUNCE 8', 'Property outside the PPCTimeshare PPC was established in the hope of a bridge for customers and investors to participate Time-share sector, to exchange holiday, and flexibility in property ownership other''s products', 'en', 8);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `idkhunghiduong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `idkhunghiduong`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `benefit_timeshare`
--

CREATE TABLE `benefit_timeshare` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `language` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `benefit_timeshare`
--

INSERT INTO `benefit_timeshare` (`id`, `title`, `content`, `language`) VALUES
(1, 'BENEFITS OF OWNING A TIMESHARE', 'Extra Vacations\r\nIf you want to get away but want to use your week for exchange, Extra Vacations offers weekly accommodation at amazing prices. \r\nThere is no limit to how many getaways you can book so share your membership benefits with your friends and family.\r\n-Exchange: The most significant benefit of PPC membership is the ability to exchange into one of the over affiliated resorts worldwide. Deposit the vacation time you own with PPC and then exchange for a vacation at another available resort.\r\n- Without anxiety for booking at hotels and resorts for holidays, just enjoy your PPC Timeshare Week ', 'en'),
(2, 'LỢI ÍCH SỞ HỮU TIMESHARE', 'Với quyền sở hữu kỳ nghỉ, người sử dụng dịch vụ có cơ hội tận hưởng được phòng ở của riêng mình mà vẫn đạt chất lượng như ở resorts với một loạt tiện nghi như tại nhà qua các điểm đến trong nước và quốc tế.\r\nNgười mua Timeshare có thể tiết kiệm được khối lượng chi phí trên giá cả leo thang phòng khách sạn tiêu chuẩn và chi phí nghỉ khác.\r\n-Có cơ hội tạo thêm thu nhập trong khoảng thời gian rảnh không sử dụng tài sản của bản thân.\r\n-Các chủ sở hữu Timeshare không phải chịu thêm khoản chi phí phát sinh nếu họ có nhu cầu muốn ở lại thêm, và với quyền sở hữu, bạn có thể sử dụng các tài sản thuộc sở hữu Timeshare.\r\n-Chủ sở hữu kỳ nghỉ được tận hưởng dịch vụ Timeshare với những giây phút thư giãn và thoải mái nhất trong chuyến du lịch hằng năm, không phải căng thẳng trong việc sắp xếp cho lịch trình kỳ nghỉ cũng như đặt chỗ ở. \r\n-Linh hoạt trong kỳ nghỉ thuộc mạng lưới PPC nói riêng và ở khắp nơi trên thế giới nói chung.', 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `book_now`
--

CREATE TABLE `book_now` (
  `id_book` int(100) NOT NULL,
  `id_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_resort` int(11) NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `adults` int(11) DEFAULT '0',
  `childs` int(11) DEFAULT '0',
  `room` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cauhoithuonggap`
--

CREATE TABLE `cauhoithuonggap` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cauhoithuonggap`
--

INSERT INTO `cauhoithuonggap` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16);

-- --------------------------------------------------------

--
-- Table structure for table `cauhoithuonggap_ngonngu`
--

CREATE TABLE `cauhoithuonggap_ngonngu` (
  `id` int(11) NOT NULL,
  `id_cauhoithuonggap` int(11) NOT NULL,
  `cauhoi` text NOT NULL,
  `cautraloi` text NOT NULL,
  `ngonngu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cauhoithuonggap_ngonngu`
--

INSERT INTO `cauhoithuonggap_ngonngu` (`id`, `id_cauhoithuonggap`, `cauhoi`, `cautraloi`, `ngonngu`) VALUES
(1, 1, '<p><strong>L&agrave;m thế n&agrave;o để c&oacute; thể tối đa h&oacute;a Quyền năng Giao Dịch Tiền Gửi tuần của bạn?</strong></p>\r\n', '<p>Yếu tố duy nhất của quyền năng giao dịch đ&oacute; l&agrave; m&agrave; bạn c&oacute; thể kiểm so&aacute;t được thời gian của bạn khi gửi tiền cho PPC. Bạn n&ecirc;n gửi tiền tuần của bạn ngay sau khi bạn quyết định kh&ocirc;ng quay trở lại khu nghỉ m&aacute;t của bạn. H&atilde;y đặt cọc số tiền 9 th&aacute;ng trở l&ecirc;n trước ng&agrave;y bắt đầu của tuần nghỉ lễ của bạn, bạn sẽ nhận được 100% gi&aacute; trị số tiền gửi giao dịch c&oacute; sẵn, qua đ&oacute; gi&uacute;p bạn để tăng cơ hội c&oacute; được kỳ nghỉ m&agrave; bạn mong muốn.</p>\r\n', 'vi'),
(2, 1, '<p><strong>How can I maximize the Deposit Trading Power of my week?</strong></p>\r\n', '<p>The only component of trading power that you can control is the timing of when you deposit with PPC. You should deposit your week as soon as you decide not to return to your home resort. By depositing 9 months or more in advance of the start date of your week you will receive 100% of the available Deposit Trading Power, thereby helping you to increase the chances of obtaining your desired vacation.</p>\r\n', 'en'),
(3, 2, '<p><strong>Quyền năng Việc Trao Đổi &nbsp;ph&aacute;t huy như thế n&agrave;o?</strong></p>\r\n', '<p>Trong t&iacute;nh to&aacute;n Quyền năng Việc Trao Đổi, PPC xem x&eacute;t c&aacute;c yếu tố như:</p>\r\n\r\n<ul>\r\n	<li>Nhu cầu, cung ứng v&agrave; sử dụng của c&aacute;c kỳ nghỉ trao đổi, v&agrave; c&aacute;c khu du lịch li&ecirc;n kết PPC v&agrave; c&aacute;c v&ugrave;ng địa l&yacute; kết hợp với việc trao đổi kỳ nghỉ.</li>\r\n	<li>Chỉ định từng m&ugrave;a để trao đổi kỳ nghỉ.</li>\r\n	<li>K&iacute;ch thước v&agrave; ph&acirc;n loại c&aacute;c mẫu (v&iacute; dụ: số lượng ph&ograve;ng ngủ, loại bếp v&agrave; kh&ocirc;ng gian c&aacute; nh&acirc;n của n&oacute;)</li>\r\n	<li>Kiểm phiếu bầu bằng c&aacute;ch PPC bi&ecirc;n soạn lại &yacute; kiến ​​nhận được bởi c&aacute;c th&agrave;nh vi&ecirc;n tham quan khu du li&ecirc;n kết với PPC</li>\r\n	<li>Ng&agrave;y giao dịch v&agrave; bắt đầu giao dịch gửi tiền.</li>\r\n</ul>\r\n', 'vi'),
(4, 2, '<p><strong>How is Exchange Trading Power calculated?</strong></p>\r\n', '<p>In calculating Exchange Trading Power, PPC considers such factors as:</p>\r\n\r\n<ul>\r\n	<li>the demand, supply and utilization of the exchange vacation, and the affiliated resort and geographic regions associated with the exchange vacation</li>\r\n	<li>the seasonal designation of the exchange vacation</li>\r\n	<li>the size and type of the unit (i.e., number of bedrooms, kitchen type and maximum/private occupancy of the physical unit)</li>\r\n	<li>comment card scores that PPC compiles from comments submitted by members who visit the affiliated resort</li>\r\n	<li>the date of Deposit and the start date of the Deposit.</li>\r\n</ul>\r\n', 'en'),
(5, 3, '<p><strong>Quyền năng Giao Dịch Tiền Gửi được t&iacute;nh thế n&agrave;o?</strong></p>\r\n', '<p>Quyền năng Giao Dịch Tiền Gửi được dựa tr&ecirc;n c&aacute;c ti&ecirc;u ch&iacute; sau:</p>\r\n\r\n<ul>\r\n	<li>Nhu cầu, cung ứng v&agrave; sử dụng: Đ&acirc;y l&agrave; những yếu tố ảnh hưởng lớn nhất về Quyền năng Giao Dịch Tiền Gửi của bạn, bao gồm:\r\n	<ul>\r\n		<li>Nhu cầu: C&agrave;ng nhiều th&agrave;nh vi&ecirc;n &ndash; những người muốn sở hữu số tiền m&agrave; bạn đ&atilde; bỏ ra trước đ&oacute; th&igrave; Quyền năng Giao Dịch c&agrave;ng lớn.</li>\r\n		<li>Cung cấp: C&oacute; bao nhi&ecirc;u tiền gửi tương tự như vậy đ&atilde; được thực hiện?</li>\r\n		<li>Sử dụng: C&oacute; bao nhi&ecirc;u tiền gửi như của bạn đ&atilde; được x&aacute;c nhận bởi c&aacute;c th&agrave;nh vi&ecirc;n kh&aacute;c trước đ&oacute;?</li>\r\n	</ul>\r\n	</li>\r\n	<li>K&iacute;ch thước mẫu v&agrave; loại tuần nghỉ lễ của bạn gồm 2 ph&ograve;ng kiểu cabin, hoặc 8 ph&ograve;ng dạng chung cư.</li>\r\n	<li>Thời gian của tiền gửi của bạn: Đ&acirc;y l&agrave; một trong những yếu tố m&agrave; bạn c&oacute; thể kiểm so&aacute;t! Đặt cọc từ trước 2 năm tới 9 th&aacute;ng gần ng&agrave;y bắt đầu tuần nghỉ lễ của bạn để hưởng được 100% quyền năng số tiền gửi giao dịch.</li>\r\n	<li>Phiếu nhận x&eacute;t: điểm tr&ecirc;n Phiếu Nhận X&eacute;t n&agrave;y l&agrave; c&aacute;c th&agrave;nh vi&ecirc;n như bạn phải điền v&agrave;o sau kỳ nghỉ m&aacute;t, đ&oacute; cũng l&agrave; một th&agrave;nh phần của Quyền Năng Giao Dịch Tiền Gửi.</li>\r\n	<li>M&ugrave;a: T&ugrave;y thuộc v&agrave;o vị tr&iacute;, một số thời điểm trong năm th&igrave; việc sử dung sẽ c&oacute; gi&aacute; trị nhiều hơn những lần kh&aacute;c.</li>\r\n</ul>\r\n', 'vi'),
(6, 3, '<p><strong>How is my Deposit Trading Power calculated?</strong></p>\r\n', '<p>Your Deposit Trading Power is based on the following criteria:</p>\r\n\r\n<p>Demand, Supply, and Utilization: This is the biggest influence on your Deposit Trading Power, consisting of:</p>\r\n\r\n<p>Demand: The more subscribing members there are who want your deposit, the higher its Trading Power.</p>\r\n\r\n<p>Supply: How many similar deposits have been made?</p>\r\n\r\n<p>Utilization: How many deposits like yours have been confirmed by other members in the past?</p>\r\n\r\n<p>Unit size and type of your week. Is it a 2 room cabin, or an 8 room condominium?</p>\r\n\r\n<p>The timing of your deposit: This is the one factor that you can control! Deposit 2 years to 9 months in advance of the start date of your week to get 100% of the available Deposit Trading Power.</p>\r\n\r\n<p>Comment Cards: Comment Card scores that members like you fill out after going on vacation are also a component of Deposit Trading Power.</p>\r\n\r\n<p>Season: Depending on location, some times of year are worth more than others.</p>\r\n', 'en'),
(7, 4, '<p><strong>Ng&agrave;y hết hạn Khoản Tiền Gửi Kết Hợp được x&aacute;c định như thế n&agrave;o?</strong></p>\r\n', '<p style="text-align:justify">Khi bạn kết hợp c&aacute;c khoản tiền gửi (c&ugrave;ng với/ hoặc Tiền Gửi T&iacute;n Dụng), ng&agrave;y hết hạn của Khoản Tiền Gửi Kết Hợp l&agrave; 1 năm kể từ ng&agrave;y m&agrave; bạn kết hợp. (V&iacute; dụ, nếu bạn kết hợp của c&aacute;c khoản tiền gửi của bạn tại thời điểm th&aacute;ng 12 năm 2011 v&agrave; th&aacute;ng 12 năm 2012 v&agrave;o th&aacute;ng Tư năm 2012, th&igrave; ng&agrave;y hết hạn kết hợp tiền gửi sẽ l&agrave; th&aacute;ng Tư năm 2013.)</p>\r\n', 'vi'),
(8, 4, '<p><strong>How is the expiration date of my combined deposit determined?</strong></p>\r\n', '<p style="text-align:justify">When you combine deposits (and/or Deposit Credits), your Combined Deposit expiration date is 1 year from the date in which you combine. (For example, If you combined your Dec 2011 and Dec 2012 deposits in April of 2012, the Combined Deposit expiration date would be April of 2013.)</p>\r\n', 'en'),
(9, 5, '<p><strong>Ng&agrave;y hết hạn Tiền Gửi T&iacute;n Dụng được x&aacute;c định như thế n&agrave;o?</strong></p>\r\n', '<p>T&iacute;n dụng tiền gửi của bạn sẽ c&ugrave;ng ng&agrave;y hết hạn với c&aacute;c khoản tiền gửi được sử dụng để đặt ph&ograve;ng kỳ nghỉ trao đổi của bạn. (Nếu bạn sử dụng th&aacute;ng 12 năm 2012 tiền gửi của bạn m&agrave; c&oacute; thể đ&atilde; hết hạn v&agrave;o th&aacute;ng 12 năm 2014, t&iacute;n dụng tiền gửi của bạn sẽ hết hạn v&agrave;o th&aacute;ng năm 2014.)</p>\r\n', 'vi'),
(10, 5, '<p><strong>How is the expiration date of my Deposit Credit determined?</strong></p>\r\n', '<p>Your Deposit Credit will have the same expiration date as the deposit used to book your exchange vacation. (If you used your Dec 2012 deposit that would have expired in Dec 2014, your Deposit Credit will expire in Dec 2014.)</p>\r\n', 'en'),
(11, 6, '<p><strong>L&agrave;m thế n&agrave;o v&agrave; Tại sao bạn n&ecirc;n kết hợp c&aacute;c khoản tiền gửi lại với nhau?</strong></p>\r\n', '<p>Bạn n&ecirc;n xem x&eacute;t kết hợp tiền gửi của bạn khi bạn c&oacute; một tuần nữa l&agrave; hết hạn hoặc khi bạn y&ecirc;u cầu kỳ nghỉ trao đổi m&agrave; bạn mong muốn đạt được khối lượng giao dịch nhiều hơn so với bất kỳ của c&aacute;c khoản tiền gửi đơn của bạn.</p>\r\n\r\n<p>Bạn c&oacute; thể kết hợp c&aacute;c khoản tiền gửi bằng c&aacute;ch nhấp v&agrave;o tab &quot;Quản l&yacute; tiền gửi của bạn&rdquo;. H&atilde;y di chuyển xuống, kiểm tra c&aacute;c khoản tiền gửi bạn muốn kết hợp, v&agrave; nhấp v&agrave;o n&uacute;t &quot;Kết hợp&quot;. Một m&agrave;n h&igrave;nh sẽ hiển thị c&aacute;c chi tiết của c&aacute;c khoản tiền gửi được kết hợp, v&agrave; kết quả l&agrave; tiền gửi giao dịch điện sẽ được hiển thị khi sự kết hợp ho&agrave;n tất. Sau khi nhấp v&agrave;o n&uacute;t m&agrave;u xanh l&aacute; c&acirc;y &quot;Tiếp tục&quot;, bạn c&oacute; thể nhập th&ocirc;ng tin thẻ t&iacute;n dụng của bạn để xử l&yacute; ph&iacute; được &aacute;p dụng. Sau khi nhập c&aacute;c th&ocirc;ng tin y&ecirc;u cầu, nhấp v&agrave;o n&uacute;t &quot;Tiếp tục&quot; m&agrave;u xanh l&aacute; c&acirc;y. Sau khi ho&agrave;n th&agrave;nh, c&aacute;c chi tiết kết hợp tiền gửi sẽ được hiển thị. Tổng hợp tiền gửi mới sẽ c&oacute; sẵn để sử dụng cho đến một năm, kể từ ng&agrave;y kết hợp.</p>\r\n\r\n<p>Xin lưu &yacute; rằng nếu bạn kết hợp c&aacute;c khoản tiền gửi hoặc tiền gửi T&iacute;n với tiền gửi từ một khu nghỉ m&aacute;t c&oacute; c&aacute;c hạn chế trao đổi nhất định, những hạn chế cũng sẽ &aacute;p dụng cho c&aacute;c khoản tiền gửi kết hợp mới.</p>\r\n\r\n<p>&nbsp;* Ph&iacute; PPC c&oacute; thể thay đổi theo quyết định của PPC của. Đối với chi tiết đầy đủ của th&agrave;nh vi&ecirc;n PPC, bao gồm cả ch&iacute;nh s&aacute;ch hủy PPC, xin vui l&ograve;ng tham khảo Điều khoản v&agrave; điều kiện ở của PPC&reg; tuần th&agrave;nh vi&ecirc;n.</p>\r\n', 'vi'),
(12, 6, '<p><strong>How, why, and when should I combine my deposits?</strong></p>\r\n', '<p>You should consider combining your deposits when you have a week expiring or when your desired exchange vacation requires more trading power than that of any of your single deposits.</p>\r\n\r\n<p>You may combine deposits by clicking on the &quot;Manage Your Deposits&quot; tab. Please scroll down, check the deposits you wish to combine, and click on the green &quot;Combine&quot; button. A screen will then display the details of the deposits being combined, and the resulting Deposit Trading Power will be shown once the combination is complete. After clicking on the green &quot;Continue&quot; button, you may enter your credit card information to process the applicable fee. After entering the requested information, click the green &quot;Continue&quot; button. Upon completion, the Combined Deposit details will be displayed. The new Combined Deposit will be available for use for up to one year from the date combined.</p>\r\n\r\n<p>Please note that if you combine deposits or Deposit Credits with a deposit from a resort that has certain exchange restrictions, those restrictions will also apply to the newly combined deposit.</p>\r\n\r\n<p>*PPC fees are subject to change at PPC&#39;s sole discretion. For complete details of PPC membership, including PPC&#39;s cancellation policy, please refer to the Terms and Conditons of PPC&reg; Weeks Membership.</p>\r\n', 'en'),
(13, 7, '<p><strong>Những điều g&igrave; c&oacute; thể gi&uacute;p bạn tối đa h&oacute;a t&iacute;nh năng trao đổi kỳ nghỉ?</strong></p>\r\n', '<p>Khi bạn c&oacute; một T&iacute;n Dụng Tiền Gửi hoặc nhiều Tiền Gửi trong t&agrave;i khoản của bạn, bạn c&oacute; thể gi&uacute;p tối đa h&oacute;a t&ugrave;y chọn trao đổi của bạn bằng c&aacute;ch kết hợp với nhau. Sau đ&oacute; bạn c&oacute; thể Quyền Năng Giao Dịch Tiền Gửi của Khoản Tiền Gửi Kết Hợp để lựa chọn một kỳ nghỉ nhằm ph&aacute;t huy Quyền Năng Giao Dịch Tiền Gửi tốt hơn.</p>\r\n', 'vi'),
(14, 7, '<p><strong>Is there anything more I can do to help maximize my exchange options?</strong></p>\r\n', '<p>When you have a Deposit Credit or multiple Deposits in your account, you can help maximize your exchange options by combining them. You can then use the Deposit Trading Power of your newly Combined Deposit to select a vacation that has greater Exchange Trading Power.</p>\r\n', 'en'),
(15, 8, '<p><strong>T&iacute;n dụng tiền gửi l&agrave; g&igrave;?</strong></p>\r\n', '<p>Khoản t&iacute;n dụng tiền gửi l&agrave; một tuần m&agrave; bạn c&oacute; được trong t&agrave;i khoản của bạn sau khi bạn đ&atilde; trao đổi bằng c&aacute;ch sử dụng khoản tiền gửi m&agrave; ở đ&oacute; Quyền Năng Giao Dịch Tiền Gửi lớn hơn Quyền Năng Giao Dịch Trao Đổi Kỳ Nghỉ. T&iacute;n dụng tiền gửi ch&iacute;nh l&agrave; sự kh&aacute;c biệt giữa việc &aacute;p dụng Quyền Năng Giao Dịch Tiền Gửi v&agrave; &aacute;p dụng Quyền Năng Giao Dịch Trao Đổi Kỳ Nghỉ.</p>\r\n', 'vi'),
(16, 8, '<p><strong>What is a Deposit Credit?</strong></p>\r\n', '<p>A Deposit Credit is a week that is placed on your account after you have exchanged using a deposit which has a Deposit Trading Power greater than the Exchange Trading Power of your selected vacation. The Deposit Credit is the difference between the applicable Deposit Trading Power and the applicable Exchange Trading Power.</p>\r\n', 'en'),
(17, 9, '<p><strong>Khu nghỉ m&aacute;t trọn g&oacute;i l&agrave; g&igrave;?</strong></p>\r\n', '<p>Một v&agrave;i khu nghỉ m&aacute;t m&agrave; PPC li&ecirc;n kết sẽ được bổ sung chương tr&igrave;nh trọn g&oacute;i. Ph&iacute; thanh to&aacute;n cho c&aacute;c chương tr&igrave;nh n&agrave;y được bổ sung lệ ph&iacute; trao đổi PPC v&agrave; thường được trả trực tiếp cho c&aacute;c khu nghỉ m&aacute;t.</p>\r\n\r\n<p>C&aacute;c g&oacute;i t&iacute;ch hợp n&agrave;y kh&aacute;c nhau về gi&aacute; cả v&agrave; c&aacute;c loại thực phẩm, đồ uống v&agrave; c&aacute;c tiện nghi bao gồm họ. Điều quan trọng l&agrave; phải x&aacute;c định liệu c&aacute;c khu nghỉ m&aacute;t n&agrave;y sử dụng chương tr&igrave;nh trọn g&oacute;i t&ugrave;y chọn hay bắt buộc. Nếu chương tr&igrave;nh trọn g&oacute;i l&agrave; bắt buộc, bạn sẽ được y&ecirc;u cầu mua trọn g&oacute;i khi nhận ph&ograve;ng. Nếu chương tr&igrave;nh l&agrave; t&ugrave;y chọn, bạn sẽ c&oacute; c&aacute;c lựa chọn mua c&aacute;c g&oacute;i hay kh&ocirc;ng, theo quyết định của bạn. Xin lưu &yacute;, tuy nhi&ecirc;n, bạn kh&ocirc;ng thể mua thức ăn hoặc đồ uống tại m&aacute;y chủ của bạn resort hoặc l&acirc;n cận khu du lịch nếu bạn chọn kh&ocirc;ng tham gia v&agrave;o một chương tr&igrave;nh như vậy.</p>\r\n\r\n<p>Để t&igrave;m th&ocirc;ng tin bao gồm tất cả, bấm v&agrave;o &quot;Resort Directory&quot; tab, v&agrave; nhập v&agrave;o một khu nghỉ m&aacute;t ID cụ thể # trong &quot;Quick Resort ID t&igrave;m kiếm&quot; hộp b&ecirc;n phải. Tiếp theo bấm v&agrave;o li&ecirc;n kết &quot;All-Inclusive&quot; được liệt k&ecirc; dưới &quot;Resort Details&quot;. Khi bạn nhấp v&agrave;o li&ecirc;n kết n&agrave;y, bạn sẽ thấy chi tiết đầy đủ về chương tr&igrave;nh bao gồm tất cả của khu nghỉ m&aacute;t.</p>\r\n\r\n<p>Bạn cũng c&oacute; thể bấm v&agrave;o &quot;T&igrave;m kiếm bao gồm tất cả c&aacute;c khu nghỉ m&aacute;t&quot; hộp liệt k&ecirc; ở ph&iacute;a b&ecirc;n phải của trang trong &quot;Resort Directory&quot; tab. Điều n&agrave;y cho ph&eacute;p bạn t&igrave;m kiếm c&aacute;c khu nghỉ m&aacute;t bao gồm tất cả c&oacute; sẵn trong một th&agrave;nh phố / quốc gia cụ thể.</p>\r\n', 'vi'),
(18, 9, '<p><strong>What is an all-inclusive resort?</strong></p>\r\n', '<p>Some PPC-affiliated resorts offer all-inclusive programs. Payment for these programs is in addition to the PPC exchange fee and is typically paid directly to the resort.</p>\r\n\r\n<p>All-inclusive packages vary in price and in the types of food, beverages, and amenities they include. It is important to identify whether the resort offers a mandatory or an optional all-inclusive program. If the all-inclusive program is mandatory, you will be required to purchase the all-inclusive package upon check-in. If the program is optional, you will have the option to either purchase the package or not, at your discretion. Please note, however, that you may not be able to purchase food or drink at your host resort or neighboring resorts if you choose not to participate in such a program.&nbsp;</p>\r\n\r\n<p>To find all-inclusive information, click on the &quot;Resort Directory&quot; tab, and enter a specific resort ID # in the &quot;Quick Resort ID Search&quot; box on the right. Next click on the &quot;All-Inclusive&quot; link listed under &quot;Resort Details&quot;. When you click on this link, you&#39;ll find complete details about the resort&#39;s all-inclusive program.&nbsp;</p>\r\n\r\n<p>You may also click on the &quot;Search all-inclusive resorts&quot; box listed on the right side of the page within the &quot;Resort Directory&quot; tab. This allows you to search all-inclusive resorts available in a specific city/country.</p>\r\n', 'en'),
(19, 10, '<p><strong>PPC&reg; du lịch biển l&agrave; g&igrave;?</strong></p>\r\n', '<p>L&agrave; một th&agrave;nh vi&ecirc;n PPC&reg; tuần, bạn c&oacute; quyền truy cập v&agrave;o du lịch tr&ecirc;n biển th&uacute; vị v&agrave; hai c&aacute;ch thuận tiện để đặt ph&ograve;ng nghỉ h&agrave;nh tr&igrave;nh của bạn: trao đổi tuần của bạn đối với một t&agrave;u hoặc mua một kỳ nghỉ du lịch bằng tiền mặt. Để t&igrave;m hiểu l&agrave;m thế n&agrave;o để sử dụng những lợi &iacute;ch biển của bạn.</p>\r\n', 'vi'),
(20, 10, '<p><strong>What is PPC&reg; Cruise?</strong></p>\r\n', '<p>As an PPC&reg; Weeks Member, you have access to exciting cruises and two convenient ways to book your cruise vacation: exchange your week towards a cruise or purchase a cruise vacation with cash. To find out how to use your cruise benefits.</p>\r\n', 'en'),
(21, 11, '<p><strong>M&aacute;y t&iacute;nh tiền gửi l&agrave; g&igrave;?</strong></p>\r\n', '<p>C&aacute;c tiền gửi Calculator l&agrave; một c&ocirc;ng cụ bạn c&oacute; thể sử dụng để xem Quyền Năng Giao Dịch Tiền Gửi đ&oacute; sẽ được giao cho tuần của bạn trước khi bạn quyết định gửi tiền tuần của bạn cho PPC</p>\r\n', 'vi'),
(22, 11, '<p><strong>What is the Deposit Calculator?</strong></p>\r\n', '<p>The Deposit Calculator is a tool you can use to see the Deposit Trading Power that would be assigned to your week(s) before you decide to deposit your week with PPC.</p>\r\n', 'en'),
(23, 12, '<p>&nbsp;<strong>Hoạch định trao đổi l&agrave; g&igrave;?</strong></p>\r\n', '<p>Hoạch định trao đổi l&agrave; một c&ocirc;ng cụ cung cấp trung b&igrave;nh Quyền Năng Giao DỊch Trao Đổi lịch sử để khẳng định v&agrave;o c&aacute;c khu vực cụ thể.</p>\r\n', 'vi'),
(24, 12, '<p><strong>What is the Exchange Planner?</strong></p>\r\n', '<p>The Exchange Planner is a tool which provides the average Exchange Trading Power historically required to confirm into specific areas.</p>\r\n', 'en'),
(25, 13, '<p><strong>Ch&iacute;nh s&aacute;ch hủy kỳ nghỉ ph&aacute;t sinh như thế n&agrave;o?</strong></p>\r\n', '<p>Khi huỷ trong thời hạn &acirc;n hạn (v&agrave;o cuối ng&agrave;y l&agrave;m việc sau ng&agrave;y x&aacute;c nhận đủ d&agrave;i từ 21 ng&agrave;y trở l&ecirc;n trước ng&agrave;y bắt đầu kỳ nghỉ), bạn sẽ được ho&agrave;n trả bằng gi&aacute; mua đầy đủ. Khi huỷ trước 61 ng&agrave;y hoặc hơn ng&agrave;y bắt đầu, bạn sẽ được ho&agrave;n trả bằng 70% của gi&aacute; b&aacute;n. Khi huỷ 15-60 ng&agrave;y trước ng&agrave;y bắt đầu, bạn sẽ được ho&agrave;n trả bằng 50% của gi&aacute; b&aacute;n. Khi huỷ 14 ng&agrave;y hoặc &iacute;t hơn từ ng&agrave;y bắt đầu của bất kỳ ph&ograve;ng, kh&ocirc;ng c&oacute; phần của gi&aacute; b&aacute;n sẽ được ho&agrave;n trả. Xin lưu &yacute; bất kỳ thuế doanh thu sẽ tự động được ho&agrave;n trả đầy đủ bất kỳ thời gian hủy xảy ra.</p>\r\n', 'vi'),
(26, 13, '<p><strong>What is the Extra Vacations Cancellation Policy?</strong></p>\r\n', '<p>When cancellation is made within the Grace Period (by the end of the business day following the date confirmed as long as this is 21 days or more before the start date) you will receive a refund equal to the full purchase price. When cancellation is made 61 days or more before the start date, you will receive a refund equal to 70% of the purchase price. When cancellation is made 15 to 60 days before the start date, you will receive a refund equal to 50% of the purchase price. When cancellation is made 14 days or less from the start date of any reservation, no portion of the purchase price will be refunded. Please note any sales tax collected will automatically be refunded in full any time a cancellation occurs.</p>\r\n', 'en'),
(27, 14, '<p><strong>Bảo Vệ Quyền Năng Giao Dịch như thế n&agrave;o?</strong></p>\r\n', '<p>PPC sẽ vui l&ograve;ng cung cấp t&iacute;nh năng bảo vệ giao dịch cho việc trao đổi kỳ nghỉ. Điều n&agrave;y nhằm bảo vệ Quyền Năng Giao Dịch Tiền Gửi m&agrave; bạn đ&atilde; sử dụng để trao đổi kỳ nghỉ gi&uacute;p đảm bảo sự an t&acirc;m trong trường hợp bạn cần phải thay đổi hoặc hủy bỏ v&igrave; l&yacute; do n&agrave;o.</p>\r\n\r\n<p>Bảo Vệ Quyền Năng Giao Dịch &aacute;p dụng v&agrave;o ng&agrave;y du lịch của bạn! Bạn sẽ lựa chọn việc bảo vệ n&agrave;y khi đặt chỗ cho kỳ nghỉ trao đổi mới, hoặc nếu bạn muốn th&ecirc;m n&oacute; v&agrave;o một kỳ nghỉ hiện c&oacute;. Bảo Vệ Quyền Năng Giao Dịch c&oacute; thể được ho&agrave;n lại nếu việc mua được hủy bỏ trước khi ng&agrave;y giao dịch đ&oacute; đ&oacute;ng cửa sau khi mua h&agrave;ng.</p>\r\n\r\n<p>Bảo Vệ Quyền Năng Giao Dịch kh&ocirc;ng &aacute;p dụng cho c&aacute;c kỳ nghỉ ph&aacute;t sinh hoặc bất kỳ kỳ nghỉ kh&aacute;c m&agrave; kh&ocirc;ng y&ecirc;u cầu th&ecirc;m một tuần. Lợi &iacute;ch của chương tr&igrave;nh n&agrave;y l&agrave; sự phục hồi cho Quyền Năng Giao Dịch Tiền Gửi, trong đ&oacute; sẽ kh&ocirc;ng &aacute;p dụng cho c&aacute;c kỳ nghỉ kh&aacute;c.</p>\r\n', 'vi'),
(28, 14, '<p><strong>What is Trading Power Protection?</strong></p>\r\n', '<p>PPC is pleased to offer Trading Power Protection for exchange vacations.&nbsp; This protects the Deposit Trading Power that you have used toward an exchange vacation to ensure peace of mind in the event that you need to change or cancel for any reason.</p>\r\n\r\n<p>Trading Power Protection right up to your date of travel! You&#39;ll find it as an option when booking a new Exchange vacation reservation, or if you want to add it to an existing vacation. Trading Power Protection can be refunded if the purchase is cancelled by close of business the day after purchase.</p>\r\n\r\n<p>Trading Power Protection is not available for Extra Vacations or any other vacation which does not require a deposited week. The benefit of this program is the restoration of Deposit Trading Power, which would not apply to these other vacations.</p>\r\n', 'en'),
(29, 15, '<p><strong>Tại sao t&ocirc;i nhận được một khoản t&iacute;n dụng tiền gửi khi t&ocirc;i trao đổi?</strong></p>\r\n', '<p>Bạn nhận được một khoản t&iacute;n dụng tiền gửi v&igrave; bạn đ&atilde; trao đổi cho một kỳ nghỉ bằng c&aacute;ch sử dụng tiền gửi trong đ&oacute; Quyền Năng Giao Dịch Tiền Gửi lớn hơn Quyền Năng Giao Dịch Trao Đổi Kỳ Nghỉ của c&aacute;c kỳ nghỉ m&agrave; bạn x&aacute;c nhận. T&iacute;n dụng tiền gửi l&agrave; sự kh&aacute;c biệt giữa &aacute;p dụng Quyền Năng Giao Dịch Tiền Gửi v&agrave; &aacute;p dụng Quyền Năng Giao Dịch Trao Đổi Kỳ Nghỉ.</p>\r\n', 'vi'),
(30, 15, '<p><strong>Why did I get a Deposit Credit when I exchanged?</strong></p>\r\n', '<p>You received a Deposit Credit because you exchanged for a vacation using a Deposit which had a Deposit Trading Power greater than the Exchange Trading Power of the vacation you confirmed. The Deposit Credit is the difference between the applicable Deposit Trading Power and the applicable Exchange Trading Power.</p>\r\n', 'en'),
(31, 16, '<p><strong>Tại sao tiền của t&ocirc;i được liệt k&ecirc; dưới phần Tiền gửi kh&ocirc;ng hợp lệ?</strong></p>\r\n', '<p>Một tiền gửi sẽ nằm trong &quot;Tiền gửi kh&ocirc;ng hợp lệ&quot; nếu việc trao đổi kỳ nghỉ nằm ngo&agrave;i cửa sổ Tiền gửi du lịch, với Quyền Năng Giao Dịch Trao Đổi Kỳ Nghỉ cao hơn so với Quyền Năng Giao Dịch Tiền Gửi, hoặc nếu việc trao đổi kỳ nghỉ đ&atilde; chọn vi phạm một quy tắc cụ thể khu nghỉ m&aacute;t.</p>\r\n', 'vi'),
(32, 16, '<p><strong>Why is my deposit listed under the Ineligible Deposits section?</strong></p>\r\n', '<p>A Deposit will be in the &quot;Ineligible Deposit&quot; section if the selected exchange vacation is outside of the Deposit travel window, has an Exchange Trading Power higher than the trading power of the Deposit, or if the selected exchange violates a resort specific rule. Additional detail regarding the specific reason for ineligibility is available in the &quot;Status&quot; column of the &quot;Ineligible Deposit&quot; section.</p>\r\n', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `chitietquyenvaitro`
--

CREATE TABLE `chitietquyenvaitro` (
  `id_quyen` int(11) NOT NULL,
  `id_vaitro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `id_country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `number`, `id_country`) VALUES
(5, 'other', 0, 213),
(6, 'Hồ Chí Minh', 0, 237),
(7, 'California', 0, 230),
(8, 'Lào Cai', 0, 237);

-- --------------------------------------------------------

--
-- Table structure for table `connect_ppc`
--

CREATE TABLE `connect_ppc` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `connect_ppc`
--

INSERT INTO `connect_ppc` (`id`, `image`, `date`) VALUES
(1, 'img/1487303336_connect_h1.jpg', '2017-01-01'),
(2, 'img/connect_h2.jpg', '2017-01-02'),
(3, 'img/connect_h3.jpg', '2017-01-03'),
(4, 'img/connect_h4.jpg', '2017-01-04'),
(5, 'img/connect_h5.jpg', '2017-01-05'),
(6, 'img/connect_h6.jpg', '2017-01-06'),
(7, 'img/connect_h1.jpg', '2017-01-07'),
(9, 'img/1487303374_connect_h4.jpg', '2017-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `connect_ppc_language`
--

CREATE TABLE `connect_ppc_language` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `language` text NOT NULL,
  `id_connect_ppc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `connect_ppc_language`
--

INSERT INTO `connect_ppc_language` (`id`, `title`, `content`, `language`, `id_connect_ppc`) VALUES
(1, 'TUYỂN DỤNG NHÂN VIÊN SALE 1', '<ul>\r\n	<li><strong>Y&ecirc;u cầu</strong></li>\r\n</ul>\r\n\r\n<p>Nam, tuổi từ 23 đến 31.</p>\r\n\r\n<p>Tốt nghiệp từ cao đẳng trở l&ecirc;n.</p>\r\n\r\n<p>C&oacute; &iacute;t nhất 2 năm kinh nghiệm từ vị tr&iacute; tuyển dụng trở l&ecirc;n</p>\r\n\r\n<p>Kỹ năng giao tiếp, đ&agrave;m ph&aacute;m tốt, chủ động trong c&ocirc;ng việc.</p>\r\n\r\n<p>Tin học: th&ocirc;ng thạo Word, Excel.</p>\r\n\r\n<p>S&aacute;ng tạo, năng động v&agrave; c&oacute; &yacute; thức trong c&ocirc;ng việc.</p>\r\n\r\n<p>Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; tr&igrave;nh độ tiếng anh tương đương (Toeic) &gt;=400.</p>\r\n\r\n<ul>\r\n	<li><strong>M&ocirc; tả c&ocirc;ng việc</strong></li>\r\n</ul>\r\n\r\n<p>T&igrave;m kiếm kh&aacute;ch h&agrave;ng c&aacute; nh&acirc;n v&agrave; doanh nghiệp cho sản phẩm thẻ th&agrave;nh vi&ecirc;n, sản phẩm g&oacute;i kh&aacute;m của BV/PK v&agrave; c&aacute;c sản phẩm kh&aacute;c trong tương lai.</p>\r\n\r\n<p>Gọi điện giới thiệu sản phẩm v&agrave; gặp gỡ tư vấn kh&aacute;ch khi cần thiết.</p>\r\n\r\n<p>Hỗ trợ l&agrave;m thủ tục đăng k&yacute; thẻ cũng như c&aacute;c thủ tục đăng k&yacute; g&oacute;i kh&aacute;m.</p>\r\n\r\n<p>Ho&agrave;n th&agrave;nh c&aacute;c b&aacute;o c&aacute;o theo y&ecirc;u cầu của cấp tr&ecirc;n, tham dự đ&agrave;o tạo bắt buộc của BV/PK để n&acirc;ng cao năng lực b&aacute;n h&agrave;ng.</p>\r\n', 'vi', 1),
(2, 'TUYỂN DỤNG NHÂN VIÊN SALE', '<ul>\n	<li><strong>Y&ecirc;u cầu</strong></li>\n</ul>\n\n<p>Nam, tuổi từ 23 đến 30.</p>\n\n<p>Tốt nghiệp từ cao đẳng trở l&ecirc;n.</p>\n\n<p>C&oacute; &iacute;t nhất 2 năm kinh nghiệm từ vị tr&iacute; tuyển dụng trở l&ecirc;n</p>\n\n<p>Kỹ năng giao tiếp, đ&agrave;m ph&aacute;m tốt, chủ động trong c&ocirc;ng việc.</p>\n\n<p>Tin học: th&ocirc;ng thạo Word, Excel.</p>\n\n<p>S&aacute;ng tạo, năng động v&agrave; c&oacute; &yacute; thức trong c&ocirc;ng việc.</p>\n\n<p>Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; tr&igrave;nh độ tiếng anh tương đương (Toeic) &gt;=400.</p>\n\n<ul>\n	<li><strong>M&ocirc; tả c&ocirc;ng việc</strong></li>\n</ul>\n\n<p>T&igrave;m kiếm kh&aacute;ch h&agrave;ng c&aacute; nh&acirc;n v&agrave; doanh nghiệp cho sản phẩm thẻ th&agrave;nh vi&ecirc;n, sản phẩm g&oacute;i kh&aacute;m của BV/PK v&agrave; c&aacute;c sản phẩm kh&aacute;c trong tương lai.</p>\n\n<p>Gọi điện giới thiệu sản phẩm v&agrave; gặp gỡ tư vấn kh&aacute;ch khi cần thiết.</p>\n\n<p>Hỗ trợ l&agrave;m thủ tục đăng k&yacute; thẻ cũng như c&aacute;c thủ tục đăng k&yacute; g&oacute;i kh&aacute;m.</p>\n\n<p>Ho&agrave;n th&agrave;nh c&aacute;c b&aacute;o c&aacute;o theo y&ecirc;u cầu của cấp tr&ecirc;n, tham dự đ&agrave;o tạo bắt buộc của BV/PK để n&acirc;ng cao năng lực b&aacute;n h&agrave;ng.</p>\n', 'vi', 2),
(3, 'TUYỂN DỤNG NHÂN VIÊN SALE', '<ul>\n	<li><strong>Y&ecirc;u cầu</strong></li>\n</ul>\n\n<p>Nam, tuổi từ 23 đến 30.</p>\n\n<p>Tốt nghiệp từ cao đẳng trở l&ecirc;n.</p>\n\n<p>C&oacute; &iacute;t nhất 2 năm kinh nghiệm từ vị tr&iacute; tuyển dụng trở l&ecirc;n</p>\n\n<p>Kỹ năng giao tiếp, đ&agrave;m ph&aacute;m tốt, chủ động trong c&ocirc;ng việc.</p>\n\n<p>Tin học: th&ocirc;ng thạo Word, Excel.</p>\n\n<p>S&aacute;ng tạo, năng động v&agrave; c&oacute; &yacute; thức trong c&ocirc;ng việc.</p>\n\n<p>Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; tr&igrave;nh độ tiếng anh tương đương (Toeic) &gt;=400.</p>\n\n<ul>\n	<li><strong>M&ocirc; tả c&ocirc;ng việc</strong></li>\n</ul>\n\n<p>T&igrave;m kiếm kh&aacute;ch h&agrave;ng c&aacute; nh&acirc;n v&agrave; doanh nghiệp cho sản phẩm thẻ th&agrave;nh vi&ecirc;n, sản phẩm g&oacute;i kh&aacute;m của BV/PK v&agrave; c&aacute;c sản phẩm kh&aacute;c trong tương lai.</p>\n\n<p>Gọi điện giới thiệu sản phẩm v&agrave; gặp gỡ tư vấn kh&aacute;ch khi cần thiết.</p>\n\n<p>Hỗ trợ l&agrave;m thủ tục đăng k&yacute; thẻ cũng như c&aacute;c thủ tục đăng k&yacute; g&oacute;i kh&aacute;m.</p>\n\n<p>Ho&agrave;n th&agrave;nh c&aacute;c b&aacute;o c&aacute;o theo y&ecirc;u cầu của cấp tr&ecirc;n, tham dự đ&agrave;o tạo bắt buộc của BV/PK để n&acirc;ng cao năng lực b&aacute;n h&agrave;ng.</p>\n', 'vi', 3),
(4, 'TUYỂN DỤNG NHÂN VIÊN SALE', '<ul>\n	<li><strong>Y&ecirc;u cầu</strong></li>\n</ul>\n\n<p>Nam, tuổi từ 23 đến 30.</p>\n\n<p>Tốt nghiệp từ cao đẳng trở l&ecirc;n.</p>\n\n<p>C&oacute; &iacute;t nhất 2 năm kinh nghiệm từ vị tr&iacute; tuyển dụng trở l&ecirc;n</p>\n\n<p>Kỹ năng giao tiếp, đ&agrave;m ph&aacute;m tốt, chủ động trong c&ocirc;ng việc.</p>\n\n<p>Tin học: th&ocirc;ng thạo Word, Excel.</p>\n\n<p>S&aacute;ng tạo, năng động v&agrave; c&oacute; &yacute; thức trong c&ocirc;ng việc.</p>\n\n<p>Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; tr&igrave;nh độ tiếng anh tương đương (Toeic) &gt;=400.</p>\n\n<ul>\n	<li><strong>M&ocirc; tả c&ocirc;ng việc</strong></li>\n</ul>\n\n<p>T&igrave;m kiếm kh&aacute;ch h&agrave;ng c&aacute; nh&acirc;n v&agrave; doanh nghiệp cho sản phẩm thẻ th&agrave;nh vi&ecirc;n, sản phẩm g&oacute;i kh&aacute;m của BV/PK v&agrave; c&aacute;c sản phẩm kh&aacute;c trong tương lai.</p>\n\n<p>Gọi điện giới thiệu sản phẩm v&agrave; gặp gỡ tư vấn kh&aacute;ch khi cần thiết.</p>\n\n<p>Hỗ trợ l&agrave;m thủ tục đăng k&yacute; thẻ cũng như c&aacute;c thủ tục đăng k&yacute; g&oacute;i kh&aacute;m.</p>\n\n<p>Ho&agrave;n th&agrave;nh c&aacute;c b&aacute;o c&aacute;o theo y&ecirc;u cầu của cấp tr&ecirc;n, tham dự đ&agrave;o tạo bắt buộc của BV/PK để n&acirc;ng cao năng lực b&aacute;n h&agrave;ng.</p>\n', 'vi', 4),
(5, 'TUYỂN DỤNG NHÂN VIÊN SALE', '<ul>\n	<li><strong>Y&ecirc;u cầu</strong></li>\n</ul>\n\n<p>Nam, tuổi từ 23 đến 30.</p>\n\n<p>Tốt nghiệp từ cao đẳng trở l&ecirc;n.</p>\n\n<p>C&oacute; &iacute;t nhất 2 năm kinh nghiệm từ vị tr&iacute; tuyển dụng trở l&ecirc;n</p>\n\n<p>Kỹ năng giao tiếp, đ&agrave;m ph&aacute;m tốt, chủ động trong c&ocirc;ng việc.</p>\n\n<p>Tin học: th&ocirc;ng thạo Word, Excel.</p>\n\n<p>S&aacute;ng tạo, năng động v&agrave; c&oacute; &yacute; thức trong c&ocirc;ng việc.</p>\n\n<p>Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; tr&igrave;nh độ tiếng anh tương đương (Toeic) &gt;=400.</p>\n\n<ul>\n	<li><strong>M&ocirc; tả c&ocirc;ng việc</strong></li>\n</ul>\n\n<p>T&igrave;m kiếm kh&aacute;ch h&agrave;ng c&aacute; nh&acirc;n v&agrave; doanh nghiệp cho sản phẩm thẻ th&agrave;nh vi&ecirc;n, sản phẩm g&oacute;i kh&aacute;m của BV/PK v&agrave; c&aacute;c sản phẩm kh&aacute;c trong tương lai.</p>\n\n<p>Gọi điện giới thiệu sản phẩm v&agrave; gặp gỡ tư vấn kh&aacute;ch khi cần thiết.</p>\n\n<p>Hỗ trợ l&agrave;m thủ tục đăng k&yacute; thẻ cũng như c&aacute;c thủ tục đăng k&yacute; g&oacute;i kh&aacute;m.</p>\n\n<p>Ho&agrave;n th&agrave;nh c&aacute;c b&aacute;o c&aacute;o theo y&ecirc;u cầu của cấp tr&ecirc;n, tham dự đ&agrave;o tạo bắt buộc của BV/PK để n&acirc;ng cao năng lực b&aacute;n h&agrave;ng.</p>\n', 'vi', 5),
(6, 'TUYỂN DỤNG NHÂN VIÊN SALE', '<ul>\n	<li><strong>Y&ecirc;u cầu</strong></li>\n</ul>\n\n<p>Nam, tuổi từ 23 đến 30.</p>\n\n<p>Tốt nghiệp từ cao đẳng trở l&ecirc;n.</p>\n\n<p>C&oacute; &iacute;t nhất 2 năm kinh nghiệm từ vị tr&iacute; tuyển dụng trở l&ecirc;n</p>\n\n<p>Kỹ năng giao tiếp, đ&agrave;m ph&aacute;m tốt, chủ động trong c&ocirc;ng việc.</p>\n\n<p>Tin học: th&ocirc;ng thạo Word, Excel.</p>\n\n<p>S&aacute;ng tạo, năng động v&agrave; c&oacute; &yacute; thức trong c&ocirc;ng việc.</p>\n\n<p>Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; tr&igrave;nh độ tiếng anh tương đương (Toeic) &gt;=400.</p>\n\n<ul>\n	<li><strong>M&ocirc; tả c&ocirc;ng việc</strong></li>\n</ul>\n\n<p>T&igrave;m kiếm kh&aacute;ch h&agrave;ng c&aacute; nh&acirc;n v&agrave; doanh nghiệp cho sản phẩm thẻ th&agrave;nh vi&ecirc;n, sản phẩm g&oacute;i kh&aacute;m của BV/PK v&agrave; c&aacute;c sản phẩm kh&aacute;c trong tương lai.</p>\n\n<p>Gọi điện giới thiệu sản phẩm v&agrave; gặp gỡ tư vấn kh&aacute;ch khi cần thiết.</p>\n\n<p>Hỗ trợ l&agrave;m thủ tục đăng k&yacute; thẻ cũng như c&aacute;c thủ tục đăng k&yacute; g&oacute;i kh&aacute;m.</p>\n\n<p>Ho&agrave;n th&agrave;nh c&aacute;c b&aacute;o c&aacute;o theo y&ecirc;u cầu của cấp tr&ecirc;n, tham dự đ&agrave;o tạo bắt buộc của BV/PK để n&acirc;ng cao năng lực b&aacute;n h&agrave;ng.</p>\nYêu cầu công việc\n- Giới tính: Nữ\n- Thành thạo máy tính, có laptop riêng để làm việc\n- Giao tiếp tốt\n- Giọng nói chuẩn, dễ nghe\n- Xử lý tình huống nhanh, chăm chỉ, cần cù\n\nYêu cầu hồ sơ\n- Lương: 4,6 triệu + 5% - 8% hoa hồng\n- Thưởng: thưởng ngày, thưởng tuần, thưởng quý\n- Du lịch hằng năm\n- Cơ hội thăng tiến ngay trong vòng 6 tháng\n- Các chế độ nghỉ phép năm, bảo hiểm theo luật lao động và công ty', 'vi', 6),
(7, 'TUYỂN DỤNG NHÂN VIÊN SALE', '<ul>\n	<li><strong>Y&ecirc;u cầu</strong></li>\n</ul>\n\n<p>Nam, tuổi từ 23 đến 30.</p>\n\n<p>Tốt nghiệp từ cao đẳng trở l&ecirc;n.</p>\n\n<p>C&oacute; &iacute;t nhất 2 năm kinh nghiệm từ vị tr&iacute; tuyển dụng trở l&ecirc;n</p>\n\n<p>Kỹ năng giao tiếp, đ&agrave;m ph&aacute;m tốt, chủ động trong c&ocirc;ng việc.</p>\n\n<p>Tin học: th&ocirc;ng thạo Word, Excel.</p>\n\n<p>S&aacute;ng tạo, năng động v&agrave; c&oacute; &yacute; thức trong c&ocirc;ng việc.</p>\n\n<p>Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; tr&igrave;nh độ tiếng anh tương đương (Toeic) &gt;=400.</p>\n\n<ul>\n	<li><strong>M&ocirc; tả c&ocirc;ng việc</strong></li>\n</ul>\n\n<p>T&igrave;m kiếm kh&aacute;ch h&agrave;ng c&aacute; nh&acirc;n v&agrave; doanh nghiệp cho sản phẩm thẻ th&agrave;nh vi&ecirc;n, sản phẩm g&oacute;i kh&aacute;m của BV/PK v&agrave; c&aacute;c sản phẩm kh&aacute;c trong tương lai.</p>\n\n<p>Gọi điện giới thiệu sản phẩm v&agrave; gặp gỡ tư vấn kh&aacute;ch khi cần thiết.</p>\n\n<p>Hỗ trợ l&agrave;m thủ tục đăng k&yacute; thẻ cũng như c&aacute;c thủ tục đăng k&yacute; g&oacute;i kh&aacute;m.</p>\n\n<p>Ho&agrave;n th&agrave;nh c&aacute;c b&aacute;o c&aacute;o theo y&ecirc;u cầu của cấp tr&ecirc;n, tham dự đ&agrave;o tạo bắt buộc của BV/PK để n&acirc;ng cao năng lực b&aacute;n h&agrave;ng.</p>\n', 'vi', 7),
(9, 'SALE JOB 1', '<p>- Finding customers - Consulting and convince customers to use the service &quot;Post news online recruitment website mywork.com.vn&quot; - Negotiating and signing contract - Customer support during customer use of services - Work at 927/1 Cach Mang Thang 8, Ward 7, Tan Binh District, HCMC - The work will be discussed in the interview</p>\r\n', 'en', 1),
(10, 'SALE JOB', '- Finding customers\r\n- Consulting and convince customers to use the service "Post news online recruitment website mywork.com.vn"\r\n- Negotiating and signing contract\r\n- Customer support during customer use of services\r\n- Work at 927/1 Cach Mang Thang 8, Ward 7, Tan Binh District, HCMC\r\n- The work will be discussed in the interview\r\n', 'en', 2),
(11, 'SALE JOB', '- Finding customers\r\n- Consulting and convince customers to use the service "Post news online recruitment website mywork.com.vn"\r\n- Negotiating and signing contract\r\n- Customer support during customer use of services\r\n- Work at 927/1 Cach Mang Thang 8, Ward 7, Tan Binh District, HCMC\r\n- The work will be discussed in the interview', 'en', 3),
(12, 'SALE JOB', '- Finding customers\r\n- Consulting and convince customers to use the service "Post news online recruitment website mywork.com.vn"\r\n- Negotiating and signing contract\r\n- Customer support during customer use of services\r\n- Work at 927/1 Cach Mang Thang 8, Ward 7, Tan Binh District, HCMC\r\n- The work will be discussed in the interview', 'en', 4),
(13, 'SALE JOB', '- Finding customers\r\n- Consulting and convince customers to use the service "Post news online recruitment website mywork.com.vn"\r\n- Negotiating and signing contract\r\n- Customer support during customer use of services\r\n- Work at 927/1 Cach Mang Thang 8, Ward 7, Tan Binh District, HCMC\r\n- The work will be discussed in the interview', 'en', 5),
(14, 'SALE JOB', '- Finding customers\r\n- Consulting and convince customers to use the service "Post news online recruitment website mywork.com.vn"\r\n- Negotiating and signing contract\r\n- Customer support during customer use of services\r\n- Work at 927/1 Cach Mang Thang 8, Ward 7, Tan Binh District, HCMC\r\n- The work will be discussed in the interview', 'en', 6),
(15, 'SALE JOB', '- Finding customers\r\n- Consulting and convince customers to use the service "Post news online recruitment website mywork.com.vn"\r\n- Negotiating and signing contract\r\n- Customer support during customer use of services\r\n- Work at 927/1 Cach Mang Thang 8, Ward 7, Tan Binh District, HCMC\r\n- The work will be discussed in the interview', 'en', 7),
(17, 'TUYỂN DỤNG NHÂN VIÊN SALE 10', '<p>TUYỂN DỤNG NH&Acirc;N VI&Ecirc;N SALE 10</p>\r\n', 'vi', 9),
(18, 'TUYỂN DỤNG NHÂN VIÊN SALE - ANH', '<p>TUYỂN DỤNG NH&Acirc;N VI&Ecirc;N SALE 10 - ANH</p>\r\n', 'en', 9);

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE `continents` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`id`, `name`, `number`) VALUES
(1, 'Europe', 0),
(2, 'Africa', 0),
(3, 'Asia', 0),
(4, 'Oceania', 0),
(5, 'Antarctica', 0),
(6, 'North America', 0),
(7, 'South America', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `long_name` text NOT NULL,
  `number` int(11) DEFAULT '0',
  `id_continents` int(11) NOT NULL,
  `sort_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `long_name`, `number`, `id_continents`, `sort_name`) VALUES
(1, 'Afghanistan', 0, 3, 'AF'),
(2, 'Albania', 0, 1, 'AL'),
(3, 'Algeria', 0, 2, 'DZ'),
(4, 'American Samoa', 0, 6, 'DS'),
(5, 'Andorra', 0, 1, 'AD'),
(6, 'Angola', 0, 2, 'AO'),
(7, 'Anguilla', 0, 6, 'AI'),
(8, 'Antarctica', 0, 5, 'AQ'),
(9, 'Antigua and Barbuda', 0, 6, 'AG'),
(10, 'Argentina', 0, 7, 'AR'),
(11, 'Armenia', 0, 3, 'AM'),
(12, 'Aruba', 0, 6, 'AW'),
(13, 'Australia', 0, 4, 'AU'),
(14, 'Austria', 0, 1, 'AT'),
(15, 'Azerbaijan', 0, 3, 'AZ'),
(16, 'Bahamas', 0, 6, 'BS'),
(17, 'Bahrain', 0, 3, 'BH'),
(18, 'Bangladesh', 0, 3, 'BD'),
(19, 'Barbados', 0, 6, 'BB'),
(20, 'Belarus', 0, 1, 'BY'),
(21, 'Belgium', 0, 1, 'BE'),
(22, 'Belize', 0, 6, 'BZ'),
(23, 'Benin', 0, 2, 'BJ'),
(24, 'Bermuda', 0, 6, 'BM'),
(25, 'Bhutan', 0, 3, 'BT'),
(26, 'Bolivia', 0, 7, 'BO'),
(27, 'Bosnia and Herzegovina', 0, 1, 'BA'),
(28, 'Botswana', 0, 2, 'BW'),
(29, 'Bouvet Island', 0, 5, 'BV'),
(30, 'Brazil', 0, 7, 'BR'),
(31, 'British Indian Ocean Territory', 0, 3, 'IO'),
(32, 'Brunei Darussalam', 0, 3, 'BN'),
(33, 'Bulgaria', 0, 1, 'BG'),
(34, 'Burkina Faso', 0, 2, 'BF'),
(35, 'Burundi', 0, 2, 'BI'),
(36, 'Cambodia', 0, 3, 'KH'),
(37, 'Cameroon', 0, 2, 'CM'),
(38, 'Canada', 0, 6, 'CA'),
(39, 'Cape Verde', 0, 2, 'CV'),
(40, 'Cayman Islands', 0, 6, 'KY'),
(41, 'Central African Republic', 0, 2, 'CF'),
(42, 'Chad', 0, 2, 'TD'),
(43, 'Chile', 0, 7, 'CL'),
(44, 'China', 0, 3, 'CN'),
(45, 'Christmas Island', 0, 3, 'CX'),
(46, 'Cocos (Keeling) Islands', 0, 3, 'CC'),
(47, 'Colombia', 0, 7, 'CO'),
(48, 'Comoros', 0, 2, 'KM'),
(49, 'Congo', 0, 2, 'CG'),
(50, 'Cook Islands', 0, 4, 'CK'),
(51, 'Costa Rica', 0, 6, 'CR'),
(52, 'Croatia (Hrvatska)', 0, 1, 'HR'),
(53, 'Cuba', 0, 6, 'CU'),
(54, 'Cyprus', 0, 3, 'CY'),
(55, 'Czech Republic', 0, 1, 'CZ'),
(56, 'Denmark', 0, 1, 'DK'),
(57, 'Djibouti', 0, 2, 'DJ'),
(58, 'Dominica', 0, 6, 'DM'),
(59, 'Dominican Republic', 0, 6, 'DO'),
(60, 'East Timor', 0, 3, 'TP'),
(61, 'Ecuador', 0, 7, 'EC'),
(62, 'Egypt', 0, 2, 'EG'),
(63, 'El Salvador', 0, 6, 'SV'),
(64, 'Equatorial Guinea', 0, 2, 'GQ'),
(65, 'Eritrea', 0, 2, 'ER'),
(66, 'Estonia', 0, 1, 'EE'),
(67, 'Ethiopia', 0, 2, 'ET'),
(68, 'Falkland Islands (Malvinas)', 0, 7, 'FK'),
(69, 'Faroe Islands', 0, 1, 'FO'),
(70, 'Fiji', 0, 4, 'FJ'),
(71, 'Finland', 0, 1, 'FI'),
(72, 'France', 0, 1, 'FR'),
(73, 'France, Metropolitan', 0, 1, 'FX'),
(74, 'French Guiana', 0, 7, 'GF'),
(75, 'French Polynesia', 0, 4, 'PF'),
(76, 'French Southern Territories', 0, 5, 'TF'),
(77, 'Gabon', 0, 2, 'GA'),
(78, 'Gambia', 0, 2, 'GM'),
(79, 'Georgia', 0, 3, 'GE'),
(80, 'Germany', 0, 1, 'DE'),
(81, 'Ghana', 0, 2, 'GH'),
(82, 'Gibraltar', 0, 1, 'GI'),
(83, 'Guernsey', 0, 1, 'GK'),
(84, 'Greece', 0, 1, 'GR'),
(85, 'Greenland', 0, 6, 'GL'),
(86, 'Grenada', 0, 6, 'GD'),
(87, 'Guadeloupe', 0, 6, 'GP'),
(88, 'Guam', 0, 4, 'GU'),
(89, 'Guatemala', 0, 6, 'GT'),
(90, 'Guinea', 0, 2, 'GN'),
(91, 'Guinea-Bissau', 0, 2, 'GW'),
(92, 'Guyana', 0, 7, 'GY'),
(93, 'Haiti', 0, 6, 'HT'),
(94, 'Heard and Mc Donald Islands', 0, 5, 'HM'),
(95, 'Honduras', 0, 6, 'HN'),
(96, 'Hong Kong', 0, 3, 'HK'),
(97, 'Hungary', 0, 1, 'HU'),
(98, 'Iceland', 0, 1, 'IS'),
(99, 'India', 0, 3, 'IN'),
(100, 'Isle of Man', 0, 1, 'IM'),
(101, 'Indonesia', 0, 3, 'ID'),
(102, 'Iran (Islamic Republic of)', 0, 3, 'IR'),
(103, 'Iraq', 0, 3, 'IQ'),
(104, 'Ireland', 0, 1, 'IE'),
(105, 'Israel', 0, 3, 'IL'),
(106, 'Italy', 0, 1, 'IT'),
(107, 'Ivory Coast', 0, 2, 'CI'),
(108, 'Jersey', 0, 1, 'JE'),
(109, 'Jamaica', 0, 6, 'JM'),
(110, 'Japan', 0, 3, 'JP'),
(111, 'Jordan', 0, 3, 'JO'),
(112, 'Kazakhstan', 0, 3, 'KZ'),
(113, 'Kenya', 0, 2, 'KE'),
(114, 'Kiribati', 0, 4, 'KI'),
(115, 'Korea, Democratic People''s Republic of', 0, 3, 'KP'),
(116, 'Korea, Republic of', 0, 3, 'KR'),
(117, 'Kosovo', 0, 1, 'XK'),
(118, 'Kuwait', 0, 3, 'KW'),
(119, 'Kyrgyzstan', 0, 3, 'KG'),
(120, 'Lao People''s Democratic Republic', 0, 3, 'LA'),
(121, 'Latvia', 0, 1, 'LV'),
(122, 'Lebanon', 0, 3, 'LB'),
(123, 'Lesotho', 0, 2, 'LS'),
(124, 'Liberia', 0, 2, 'LR'),
(125, 'Libyan Arab Jamahiriya', 0, 2, 'LY'),
(126, 'Liechtenstein', 0, 1, 'LI'),
(127, 'Lithuania', 0, 1, 'LT'),
(128, 'Luxembourg', 0, 1, 'LU'),
(129, 'Macau', 0, 3, 'MO'),
(130, 'Macedonia', 0, 1, 'MK'),
(131, 'Madagascar', 0, 2, 'MG'),
(132, 'Malawi', 0, 2, 'MW'),
(133, 'Malaysia', 0, 3, 'MY'),
(134, 'Maldives', 0, 3, 'MV'),
(135, 'Mali', 0, 2, 'ML'),
(136, 'Malta', 0, 1, 'MT'),
(137, 'Marshall Islands', 0, 4, 'MH'),
(138, 'Martinique', 0, 6, 'MQ'),
(139, 'Mauritania', 0, 2, 'MR'),
(140, 'Mauritius', 0, 2, 'MU'),
(141, 'Mayotte', 0, 1, 'TY'),
(142, 'Mexico', 0, 6, 'MX'),
(143, 'Micronesia, Federated States of', 0, 4, 'FM'),
(144, 'Moldova, Republic of', 0, 1, 'MD'),
(145, 'Monaco', 0, 1, 'MC'),
(146, 'Mongolia', 0, 3, 'MN'),
(147, 'Montenegro', 0, 1, 'ME'),
(148, 'Montserrat', 0, 6, 'MS'),
(149, 'Morocco', 0, 2, 'MA'),
(150, 'Mozambique', 0, 2, 'MZ'),
(151, 'Myanmar', 0, 3, 'MM'),
(152, 'Namibia', 0, 2, 'NA'),
(153, 'Nauru', 0, 4, 'NR'),
(154, 'Nepal', 0, 3, 'NP'),
(155, 'Netherlands', 0, 1, 'NL'),
(156, 'Netherlands Antilles', 0, 6, 'AN'),
(157, 'New Caledonia', 0, 4, 'NC'),
(158, 'New Zealand', 0, 4, 'NZ'),
(159, 'Nicaragua', 0, 6, 'NI'),
(160, 'Niger', 0, 2, 'NE'),
(161, 'Nigeria', 0, 2, 'NG'),
(162, 'Niue', 0, 4, 'NU'),
(163, 'Norfolk Island', 0, 4, 'NF'),
(164, 'Northern Mariana Islands', 0, 4, 'MP'),
(165, 'Norway', 0, 1, 'NO'),
(166, 'Oman', 0, 3, 'OM'),
(167, 'Pakistan', 0, 3, 'PK'),
(168, 'Palau', 0, 4, 'PW'),
(169, 'Palestine', 0, 3, 'PS'),
(170, 'Panama', 0, 6, 'PA'),
(171, 'Papua New Guinea', 0, 4, 'PG'),
(172, 'Paraguay', 0, 7, 'PY'),
(173, 'Peru', 0, 7, 'PE'),
(174, 'Philippines', 0, 3, 'PH'),
(175, 'Pitcairn', 0, 4, 'PN'),
(176, 'Poland', 0, 1, 'PL'),
(177, 'Portugal', 0, 1, 'PT'),
(178, 'Puerto Rico', 0, 6, 'PR'),
(179, 'Qatar', 0, 3, 'QA'),
(180, 'Reunion', 0, 2, 'RE'),
(181, 'Romania', 0, 1, 'RO'),
(182, 'Russian Federation', 0, 1, 'RU'),
(183, 'Rwanda', 0, 2, 'RW'),
(184, 'Saint Kitts and Nevis', 0, 6, 'KN'),
(185, 'Saint Lucia', 0, 6, 'LC'),
(186, 'Saint Vincent and the Grenadines', 0, 6, 'VC'),
(187, 'Samoa', 0, 4, 'WS'),
(188, 'San Marino', 0, 1, 'SM'),
(189, 'Sao Tome and Principe', 0, 2, 'ST'),
(190, 'Saudi Arabia', 0, 3, 'SA'),
(191, 'Senegal', 0, 2, 'SN'),
(192, 'Serbia', 0, 1, 'RS'),
(193, 'Seychelles', 0, 2, 'SC'),
(194, 'Sierra Leone', 0, 2, 'SL'),
(195, 'Singapore', 0, 3, 'SG'),
(196, 'Slovakia', 0, 1, 'SK'),
(197, 'Slovenia', 0, 1, 'SI'),
(198, 'Solomon Islands', 0, 4, 'SB'),
(199, 'Somalia', 0, 2, 'SO'),
(200, 'South Africa', 0, 2, 'ZA'),
(201, 'South Georgia South Sandwich Islands', 0, 5, 'GS'),
(202, 'Spain', 0, 1, 'ES'),
(203, 'Sri Lanka', 0, 3, 'LK'),
(204, 'St. Helena', 0, 2, 'SH'),
(205, 'St. Pierre and Miquelon', 0, 6, 'PM'),
(206, 'Sudan', 0, 2, 'SD'),
(207, 'Suriname', 0, 7, 'SR'),
(208, 'Svalbard and Jan Mayen Islands', 0, 1, 'SJ'),
(209, 'Swaziland', 0, 2, 'SZ'),
(210, 'Sweden', 0, 1, 'SE'),
(211, 'Switzerland', 0, 1, 'CH'),
(212, 'Syrian Arab Republic', 0, 3, 'SY'),
(213, 'Taiwan', 0, 3, 'TW'),
(214, 'Tajikistan', 0, 3, 'TJ'),
(215, 'Tanzania, United Republic of', 0, 2, 'TZ'),
(216, 'Thailand', 0, 3, 'TH'),
(217, 'Togo', 0, 2, 'TG'),
(218, 'Tokelau', 0, 4, 'TK'),
(219, 'Tonga', 0, 4, 'TO'),
(220, 'Trinidad and Tobago', 0, 6, 'TT'),
(221, 'Tunisia', 0, 2, 'TN'),
(222, 'Turkey', 0, 3, 'TR'),
(223, 'Turkmenistan', 0, 3, 'TM'),
(224, 'Turks and Caicos Islands', 0, 6, 'TC'),
(225, 'Tuvalu', 0, 4, 'TV'),
(226, 'Uganda', 0, 2, 'UG'),
(227, 'Ukraine', 0, 1, 'UA'),
(228, 'United Arab Emirates', 0, 3, 'AE'),
(229, 'United Kingdom', 0, 1, 'GB'),
(230, 'United States', 0, 6, 'US'),
(231, 'United States minor outlying islands', 0, 4, 'UM'),
(232, 'Uruguay', 0, 7, 'UY'),
(233, 'Uzbekistan', 0, 3, 'UZ'),
(234, 'Vanuatu', 0, 4, 'VU'),
(235, 'Vatican City State', 0, 1, 'VA'),
(236, 'Venezuela', 0, 7, 'VE'),
(237, 'Vietnam', 0, 3, 'VN'),
(238, 'Virgin Islands (British)', 0, 6, 'VG'),
(239, 'Virgin Islands (U.S.)', 0, 6, 'VI'),
(240, 'Wallis and Futuna Islands', 0, 4, 'WF'),
(241, 'Western Sahara', 0, 2, 'EH'),
(242, 'Yemen', 0, 3, 'YE'),
(243, 'Zaire', 0, 2, 'ZR'),
(244, 'Zambia', 0, 2, 'ZM'),
(245, 'Zimbabwe', 0, 2, 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `image`) VALUES
(1, 'img/h1.jpg'),
(2, 'img/h2.jpg'),
(3, 'img/h3.jpg'),
(4, 'img/h4.jpg'),
(5, 'img/h5.jpg'),
(6, 'img/h6.jpg'),
(7, 'img/h1.jpg'),
(8, 'img/h2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `deals_language`
--

CREATE TABLE `deals_language` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `language` text NOT NULL,
  `id_deals` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deals_language`
--

INSERT INTO `deals_language` (`id`, `title`, `content`, `language`, `id_deals`) VALUES
(1, 'KHUYẾN MÃI 1', 'Thay vì áp dụng cứng nhắc một mức và tại một thời điểm như Dự thảo sửa đổi Thông tư 36, Ngân hàng Nhà nước (NHNN) vừa thiết lập lộ trình rút ngắn tỷ lệ vốn ngắn hạn cho vay trung và dài hạn. Điều này giúp giới kinh doanh BĐS như trút được một gánh nặng. Lộ trình siết tín dụng BĐS Thông tư 06 có nêu quy định, hệ số rủi ro của các khoản phải đòi để kinh doanh BĐS tăng từ 150% lên 200%, thay vì 250% như dự kiến; tỷ lệ vốn ngắn hạn cho vay trung, dài hạn vẫn giữ nguyên mức 60% cho đến hết năm 2016 rồi hạ dần... Theo ông Nguyễn Tú Anh, Phó vụ trưởng Vụ chính sách, NHNN hiện có bộ phận chuyên trách phân tích, đánh giá về rủi ro tín dụng ở lĩnh vực BĐS. Số liệu cập nhật 6 tháng gần đây cho thấy, tỷ trọng tín dụng đổ vào cho vay BĐS đang có xu hướng giảm dần, hiện chỉ chiếm khoảng 8,3% tổng dư nợ tín dụng. Trong đó, tín dụng dành cho người mua nhà từ nguồn thu nhập chỉ đạt khoảng hơn 13%. ''Sắp tới, phía NHNN sẽ có một số điều chỉnh rất lớn về quản lý tín dụng ngân hàng theo hướng bền vững hơn. Nếu NHNN cố gắng giữ ổn định vĩ mô - lạm phát và lãi suất, thì những rủi ro BĐS hoàn toàn có thể kiểm soát được''- ông Tú Anh cho biết.', 'vi', 1),
(2, 'DEALS 1', 'Instead of a rigid application level and at a time as the draft revision of Circular 36, the State Bank of Vietnam (SBV) has set the roadmap reduce short-term capital medium and long term loans. This helps the real estate business is a burden pouring. Property Roadmap credit squeeze Circular 06 mentioned regulations, the risk factor of receivables for real estate business rose from 150% to 200%, instead of 250% as expected; Short-term funds rate for medium and long term remains unchanged at 60% until the end of 2016, then dropping ... According to Nguyen Tu Anh, Deputy Director of policy, the central bank is in charge of analyzing parts and assessment of credit risk in the real estate field. Figures 6 months recent update shows, the proportion of credit flowing into real estate loans are decreasing, only accounts for about 8.3% of total outstanding loans. In particular, credit for home buyers from the only source of income for more than 13%. ''Looking ahead, the central bank will have some huge adjustments in bank credit management more sustainable direction. If the central bank tries to keep macroeconomic stability - inflation and interest rates, the real estate risks can fully control Xiuying duoc''- he said.', 'en', 1),
(3, 'KHUYẾN MÃI 2', 'Thay vì áp dụng cứng nhắc một mức và tại một thời điểm như Dự thảo sửa đổi Thông tư 36, Ngân hàng Nhà nước (NHNN) vừa thiết lập lộ trình rút ngắn tỷ lệ vốn ngắn hạn cho vay trung và dài hạn. Điều này giúp giới kinh doanh BĐS như trút được một gánh nặng. Lộ trình siết tín dụng BĐS Thông tư 06 có nêu quy định, hệ số rủi ro của các khoản phải đòi để kinh doanh BĐS tăng từ 150% lên 200%, thay vì 250% như dự kiến; tỷ lệ vốn ngắn hạn cho vay trung, dài hạn vẫn giữ nguyên mức 60% cho đến hết năm 2016 rồi hạ dần... Theo ông Nguyễn Tú Anh, Phó vụ trưởng Vụ chính sách, NHNN hiện có bộ phận chuyên trách phân tích, đánh giá về rủi ro tín dụng ở lĩnh vực BĐS. Số liệu cập nhật 6 tháng gần đây cho thấy, tỷ trọng tín dụng đổ vào cho vay BĐS đang có xu hướng giảm dần, hiện chỉ chiếm khoảng 8,3% tổng dư nợ tín dụng. Trong đó, tín dụng dành cho người mua nhà từ nguồn thu nhập chỉ đạt khoảng hơn 13%. ''Sắp tới, phía NHNN sẽ có một số điều chỉnh rất lớn về quản lý tín dụng ngân hàng theo hướng bền vững hơn. Nếu NHNN cố gắng giữ ổn định vĩ mô - lạm phát và lãi suất, thì những rủi ro BĐS hoàn toàn có thể kiểm soát được''- ông Tú Anh cho biết.', 'vi', 2),
(4, 'DEALS 2', 'Instead of a rigid application level and at a time as the draft revision of Circular 36, the State Bank of Vietnam (SBV) has set the roadmap reduce short-term capital medium and long term loans. This helps the real estate business is a burden pouring. Property Roadmap credit squeeze Circular 06 mentioned regulations, the risk factor of receivables for real estate business rose from 150% to 200%, instead of 250% as expected; Short-term funds rate for medium and long term remains unchanged at 60% until the end of 2016, then dropping ... According to Nguyen Tu Anh, Deputy Director of policy, the central bank is in charge of analyzing parts and assessment of credit risk in the real estate field. Figures 6 months recent update shows, the proportion of credit flowing into real estate loans are decreasing, only accounts for about 8.3% of total outstanding loans. In particular, credit for home buyers from the only source of income for more than 13%. ''Looking ahead, the central bank will have some huge adjustments in bank credit management more sustainable direction. If the central bank tries to keep macroeconomic stability - inflation and interest rates, the real estate risks can fully control Xiuying duoc''- he said.\r\n', 'en', 2),
(5, 'KHUYẾN MÃI 3 ', 'Thay vì áp dụng cứng nhắc một mức và tại một thời điểm như Dự thảo sửa đổi Thông tư 36, Ngân hàng Nhà nước (NHNN) vừa thiết lập lộ trình rút ngắn tỷ lệ vốn ngắn hạn cho vay trung và dài hạn. Điều này giúp giới kinh doanh BĐS như trút được một gánh nặng. Lộ trình siết tín dụng BĐS Thông tư 06 có nêu quy định, hệ số rủi ro của các khoản phải đòi để kinh doanh BĐS tăng từ 150% lên 200%, thay vì 250% như dự kiến; tỷ lệ vốn ngắn hạn cho vay trung, dài hạn vẫn giữ nguyên mức 60% cho đến hết năm 2016 rồi hạ dần... Theo ông Nguyễn Tú Anh, Phó vụ trưởng Vụ chính sách, NHNN hiện có bộ phận chuyên trách phân tích, đánh giá về rủi ro tín dụng ở lĩnh vực BĐS. Số liệu cập nhật 6 tháng gần đây cho thấy, tỷ trọng tín dụng đổ vào cho vay BĐS đang có xu hướng giảm dần, hiện chỉ chiếm khoảng 8,3% tổng dư nợ tín dụng. Trong đó, tín dụng dành cho người mua nhà từ nguồn thu nhập chỉ đạt khoảng hơn 13%. ''Sắp tới, phía NHNN sẽ có một số điều chỉnh rất lớn về quản lý tín dụng ngân hàng theo hướng bền vững hơn. Nếu NHNN cố gắng giữ ổn định vĩ mô - lạm phát và lãi suất, thì những rủi ro BĐS hoàn toàn có thể kiểm soát được''- ông Tú Anh cho biết.', 'vi', 3),
(6, 'DEALS 3 ', 'Instead of a rigid application level and at a time as the draft revision of Circular 36, the State Bank of Vietnam (SBV) has set the roadmap reduce short-term capital medium and long term loans. This helps the real estate business is a burden pouring. Property Roadmap credit squeeze Circular 06 mentioned regulations, the risk factor of receivables for real estate business rose from 150% to 200%, instead of 250% as expected; Short-term funds rate for medium and long term remains unchanged at 60% until the end of 2016, then dropping ... According to Nguyen Tu Anh, Deputy Director of policy, the central bank is in charge of analyzing parts and assessment of credit risk in the real estate field. Figures 6 months recent update shows, the proportion of credit flowing into real estate loans are decreasing, only accounts for about 8.3% of total outstanding loans. In particular, credit for home buyers from the only source of income for more than 13%. ''Looking ahead, the central bank will have some huge adjustments in bank credit management more sustainable direction. If the central bank tries to keep macroeconomic stability - inflation and interest rates, the real estate risks can fully control Xiuying duoc''- he said.\r\n', 'en', 3),
(7, 'KHUYẾN MÃI 4', 'Thay vì áp dụng cứng nhắc một mức và tại một thời điểm như Dự thảo sửa đổi Thông tư 36, Ngân hàng Nhà nước (NHNN) vừa thiết lập lộ trình rút ngắn tỷ lệ vốn ngắn hạn cho vay trung và dài hạn. Điều này giúp giới kinh doanh BĐS như trút được một gánh nặng. Lộ trình siết tín dụng BĐS Thông tư 06 có nêu quy định, hệ số rủi ro của các khoản phải đòi để kinh doanh BĐS tăng từ 150% lên 200%, thay vì 250% như dự kiến; tỷ lệ vốn ngắn hạn cho vay trung, dài hạn vẫn giữ nguyên mức 60% cho đến hết năm 2016 rồi hạ dần... Theo ông Nguyễn Tú Anh, Phó vụ trưởng Vụ chính sách, NHNN hiện có bộ phận chuyên trách phân tích, đánh giá về rủi ro tín dụng ở lĩnh vực BĐS. Số liệu cập nhật 6 tháng gần đây cho thấy, tỷ trọng tín dụng đổ vào cho vay BĐS đang có xu hướng giảm dần, hiện chỉ chiếm khoảng 8,3% tổng dư nợ tín dụng. Trong đó, tín dụng dành cho người mua nhà từ nguồn thu nhập chỉ đạt khoảng hơn 13%. ''Sắp tới, phía NHNN sẽ có một số điều chỉnh rất lớn về quản lý tín dụng ngân hàng theo hướng bền vững hơn. Nếu NHNN cố gắng giữ ổn định vĩ mô - lạm phát và lãi suất, thì những rủi ro BĐS hoàn toàn có thể kiểm soát được''- ông Tú Anh cho biết.', 'vi', 4),
(8, 'DEALS 4', 'Instead of a rigid application level and at a time as the draft revision of Circular 36, the State Bank of Vietnam (SBV) has set the roadmap reduce short-term capital medium and long term loans. This helps the real estate business is a burden pouring. Property Roadmap credit squeeze Circular 06 mentioned regulations, the risk factor of receivables for real estate business rose from 150% to 200%, instead of 250% as expected; Short-term funds rate for medium and long term remains unchanged at 60% until the end of 2016, then dropping ... According to Nguyen Tu Anh, Deputy Director of policy, the central bank is in charge of analyzing parts and assessment of credit risk in the real estate field. Figures 6 months recent update shows, the proportion of credit flowing into real estate loans are decreasing, only accounts for about 8.3% of total outstanding loans. In particular, credit for home buyers from the only source of income for more than 13%. ''Looking ahead, the central bank will have some huge adjustments in bank credit management more sustainable direction. If the central bank tries to keep macroeconomic stability - inflation and interest rates, the real estate risks can fully control Xiuying duoc''- he said.', 'en', 4),
(9, 'KHUYẾN MÃI 5', 'Thay vì áp dụng cứng nhắc một mức và tại một thời điểm như Dự thảo sửa đổi Thông tư 36, Ngân hàng Nhà nước (NHNN) vừa thiết lập lộ trình rút ngắn tỷ lệ vốn ngắn hạn cho vay trung và dài hạn. Điều này giúp giới kinh doanh BĐS như trút được một gánh nặng. Lộ trình siết tín dụng BĐS Thông tư 06 có nêu quy định, hệ số rủi ro của các khoản phải đòi để kinh doanh BĐS tăng từ 150% lên 200%, thay vì 250% như dự kiến; tỷ lệ vốn ngắn hạn cho vay trung, dài hạn vẫn giữ nguyên mức 60% cho đến hết năm 2016 rồi hạ dần... Theo ông Nguyễn Tú Anh, Phó vụ trưởng Vụ chính sách, NHNN hiện có bộ phận chuyên trách phân tích, đánh giá về rủi ro tín dụng ở lĩnh vực BĐS. Số liệu cập nhật 6 tháng gần đây cho thấy, tỷ trọng tín dụng đổ vào cho vay BĐS đang có xu hướng giảm dần, hiện chỉ chiếm khoảng 8,3% tổng dư nợ tín dụng. Trong đó, tín dụng dành cho người mua nhà từ nguồn thu nhập chỉ đạt khoảng hơn 13%. ''Sắp tới, phía NHNN sẽ có một số điều chỉnh rất lớn về quản lý tín dụng ngân hàng theo hướng bền vững hơn. Nếu NHNN cố gắng giữ ổn định vĩ mô - lạm phát và lãi suất, thì những rủi ro BĐS hoàn toàn có thể kiểm soát được''- ông Tú Anh cho biết.', 'vi', 5),
(10, 'DEALS 5', 'Instead of a rigid application level and at a time as the draft revision of Circular 36, the State Bank of Vietnam (SBV) has set the roadmap reduce short-term capital medium and long term loans. This helps the real estate business is a burden pouring. Property Roadmap credit squeeze Circular 06 mentioned regulations, the risk factor of receivables for real estate business rose from 150% to 200%, instead of 250% as expected; Short-term funds rate for medium and long term remains unchanged at 60% until the end of 2016, then dropping ... According to Nguyen Tu Anh, Deputy Director of policy, the central bank is in charge of analyzing parts and assessment of credit risk in the real estate field. Figures 6 months recent update shows, the proportion of credit flowing into real estate loans are decreasing, only accounts for about 8.3% of total outstanding loans. In particular, credit for home buyers from the only source of income for more than 13%. ''Looking ahead, the central bank will have some huge adjustments in bank credit management more sustainable direction. If the central bank tries to keep macroeconomic stability - inflation and interest rates, the real estate risks can fully control Xiuying duoc''- he said.', 'en', 5),
(11, 'KHUYẾN MÃI 6', 'Thay vì áp dụng cứng nhắc một mức và tại một thời điểm như Dự thảo sửa đổi Thông tư 36, Ngân hàng Nhà nước (NHNN) vừa thiết lập lộ trình rút ngắn tỷ lệ vốn ngắn hạn cho vay trung và dài hạn. Điều này giúp giới kinh doanh BĐS như trút được một gánh nặng. Lộ trình siết tín dụng BĐS Thông tư 06 có nêu quy định, hệ số rủi ro của các khoản phải đòi để kinh doanh BĐS tăng từ 150% lên 200%, thay vì 250% như dự kiến; tỷ lệ vốn ngắn hạn cho vay trung, dài hạn vẫn giữ nguyên mức 60% cho đến hết năm 2016 rồi hạ dần... Theo ông Nguyễn Tú Anh, Phó vụ trưởng Vụ chính sách, NHNN hiện có bộ phận chuyên trách phân tích, đánh giá về rủi ro tín dụng ở lĩnh vực BĐS. Số liệu cập nhật 6 tháng gần đây cho thấy, tỷ trọng tín dụng đổ vào cho vay BĐS đang có xu hướng giảm dần, hiện chỉ chiếm khoảng 8,3% tổng dư nợ tín dụng. Trong đó, tín dụng dành cho người mua nhà từ nguồn thu nhập chỉ đạt khoảng hơn 13%. ''Sắp tới, phía NHNN sẽ có một số điều chỉnh rất lớn về quản lý tín dụng ngân hàng theo hướng bền vững hơn. Nếu NHNN cố gắng giữ ổn định vĩ mô - lạm phát và lãi suất, thì những rủi ro BĐS hoàn toàn có thể kiểm soát được''- ông Tú Anh cho biết.', 'vi', 6),
(12, 'DEALS 6', 'Instead of a rigid application level and at a time as the draft revision of Circular 36, the State Bank of Vietnam (SBV) has set the roadmap reduce short-term capital medium and long term loans. This helps the real estate business is a burden pouring. Property Roadmap credit squeeze Circular 06 mentioned regulations, the risk factor of receivables for real estate business rose from 150% to 200%, instead of 250% as expected; Short-term funds rate for medium and long term remains unchanged at 60% until the end of 2016, then dropping ... According to Nguyen Tu Anh, Deputy Director of policy, the central bank is in charge of analyzing parts and assessment of credit risk in the real estate field. Figures 6 months recent update shows, the proportion of credit flowing into real estate loans are decreasing, only accounts for about 8.3% of total outstanding loans. In particular, credit for home buyers from the only source of income for more than 13%. ''Looking ahead, the central bank will have some huge adjustments in bank credit management more sustainable direction. If the central bank tries to keep macroeconomic stability - inflation and interest rates, the real estate risks can fully control Xiuying duoc''- he said.\r\n', 'en', 6),
(13, 'KHUYẾN MÃI 7', 'Thay vì áp dụng cứng nhắc một mức và tại một thời điểm như Dự thảo sửa đổi Thông tư 36, Ngân hàng Nhà nước (NHNN) vừa thiết lập lộ trình rút ngắn tỷ lệ vốn ngắn hạn cho vay trung và dài hạn. Điều này giúp giới kinh doanh BĐS như trút được một gánh nặng. Lộ trình siết tín dụng BĐS Thông tư 06 có nêu quy định, hệ số rủi ro của các khoản phải đòi để kinh doanh BĐS tăng từ 150% lên 200%, thay vì 250% như dự kiến; tỷ lệ vốn ngắn hạn cho vay trung, dài hạn vẫn giữ nguyên mức 60% cho đến hết năm 2016 rồi hạ dần... Theo ông Nguyễn Tú Anh, Phó vụ trưởng Vụ chính sách, NHNN hiện có bộ phận chuyên trách phân tích, đánh giá về rủi ro tín dụng ở lĩnh vực BĐS. Số liệu cập nhật 6 tháng gần đây cho thấy, tỷ trọng tín dụng đổ vào cho vay BĐS đang có xu hướng giảm dần, hiện chỉ chiếm khoảng 8,3% tổng dư nợ tín dụng. Trong đó, tín dụng dành cho người mua nhà từ nguồn thu nhập chỉ đạt khoảng hơn 13%. ''Sắp tới, phía NHNN sẽ có một số điều chỉnh rất lớn về quản lý tín dụng ngân hàng theo hướng bền vững hơn. Nếu NHNN cố gắng giữ ổn định vĩ mô - lạm phát và lãi suất, thì những rủi ro BĐS hoàn toàn có thể kiểm soát được''- ông Tú Anh cho biết.', 'vi', 7),
(14, 'DEALS 7', 'Instead of a rigid application level and at a time as the draft revision of Circular 36, the State Bank of Vietnam (SBV) has set the roadmap reduce short-term capital medium and long term loans. This helps the real estate business is a burden pouring. Property Roadmap credit squeeze Circular 06 mentioned regulations, the risk factor of receivables for real estate business rose from 150% to 200%, instead of 250% as expected; Short-term funds rate for medium and long term remains unchanged at 60% until the end of 2016, then dropping ... According to Nguyen Tu Anh, Deputy Director of policy, the central bank is in charge of analyzing parts and assessment of credit risk in the real estate field. Figures 6 months recent update shows, the proportion of credit flowing into real estate loans are decreasing, only accounts for about 8.3% of total outstanding loans. In particular, credit for home buyers from the only source of income for more than 13%. ''Looking ahead, the central bank will have some huge adjustments in bank credit management more sustainable direction. If the central bank tries to keep macroeconomic stability - inflation and interest rates, the real estate risks can fully control Xiuying duoc''- he said.\r\n', 'en', 7),
(15, 'KHUYẾN MÃI 8', 'Thay vì áp dụng cứng nhắc một mức và tại một thời điểm như Dự thảo sửa đổi Thông tư 36, Ngân hàng Nhà nước (NHNN) vừa thiết lập lộ trình rút ngắn tỷ lệ vốn ngắn hạn cho vay trung và dài hạn. Điều này giúp giới kinh doanh BĐS như trút được một gánh nặng. Lộ trình siết tín dụng BĐS Thông tư 06 có nêu quy định, hệ số rủi ro của các khoản phải đòi để kinh doanh BĐS tăng từ 150% lên 200%, thay vì 250% như dự kiến; tỷ lệ vốn ngắn hạn cho vay trung, dài hạn vẫn giữ nguyên mức 60% cho đến hết năm 2016 rồi hạ dần... Theo ông Nguyễn Tú Anh, Phó vụ trưởng Vụ chính sách, NHNN hiện có bộ phận chuyên trách phân tích, đánh giá về rủi ro tín dụng ở lĩnh vực BĐS. Số liệu cập nhật 6 tháng gần đây cho thấy, tỷ trọng tín dụng đổ vào cho vay BĐS đang có xu hướng giảm dần, hiện chỉ chiếm khoảng 8,3% tổng dư nợ tín dụng. Trong đó, tín dụng dành cho người mua nhà từ nguồn thu nhập chỉ đạt khoảng hơn 13%. ''Sắp tới, phía NHNN sẽ có một số điều chỉnh rất lớn về quản lý tín dụng ngân hàng theo hướng bền vững hơn. Nếu NHNN cố gắng giữ ổn định vĩ mô - lạm phát và lãi suất, thì những rủi ro BĐS hoàn toàn có thể kiểm soát được''- ông Tú Anh cho biết.', 'vi', 8),
(16, 'DEALS 8', 'Instead of a rigid application level and at a time as the draft revision of Circular 36, the State Bank of Vietnam (SBV) has set the roadmap reduce short-term capital medium and long term loans. This helps the real estate business is a burden pouring. Property Roadmap credit squeeze Circular 06 mentioned regulations, the risk factor of receivables for real estate business rose from 150% to 200%, instead of 250% as expected; Short-term funds rate for medium and long term remains unchanged at 60% until the end of 2016, then dropping ... According to Nguyen Tu Anh, Deputy Director of policy, the central bank is in charge of analyzing parts and assessment of credit risk in the real estate field. Figures 6 months recent update shows, the proportion of credit flowing into real estate loans are decreasing, only accounts for about 8.3% of total outstanding loans. In particular, credit for home buyers from the only source of income for more than 13%. ''Looking ahead, the central bank will have some huge adjustments in bank credit management more sustainable direction. If the central bank tries to keep macroeconomic stability - inflation and interest rates, the real estate risks can fully control Xiuying duoc''- he said.\r\n', 'en', 8);

-- --------------------------------------------------------

--
-- Table structure for table `details_deal_resort`
--

CREATE TABLE `details_deal_resort` (
  `id` int(11) NOT NULL,
  `id_deal` int(11) NOT NULL,
  `id_resort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gioithieu`
--

CREATE TABLE `gioithieu` (
  `id` int(11) NOT NULL,
  `img_tieude` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gioithieu`
--

INSERT INTO `gioithieu` (`id`, `img_tieude`) VALUES
(1, 'img/1484294993_banner_5.png');

-- --------------------------------------------------------

--
-- Table structure for table `gioithieu_ngonngu`
--

CREATE TABLE `gioithieu_ngonngu` (
  `id` int(11) NOT NULL,
  `tieu_de` text NOT NULL,
  `noidung_gioithieu` text NOT NULL,
  `id_gioithieu` int(11) NOT NULL,
  `ngonngu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gioithieu_ngonngu`
--

INSERT INTO `gioithieu_ngonngu` (`id`, `tieu_de`, `noidung_gioithieu`, `id_gioithieu`, `ngonngu`) VALUES
(1, 'Về PPC TIMESHAR', '<p style="text-align:justify"><span style="font-size:16px"><strong>Ngo&agrave;i PPC Property th&igrave; PPC Timeshare được th&agrave;nh lập với hy vọng l&agrave; cầu nối cho kh&aacute;ch h&agrave;ng v&agrave; c&aacute;c chủ đầu tư tham gia trong lĩnh vực Timeshare, c&ugrave;ng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sử dụng quyền sở hữu t&agrave;i sản của nhau kh&ocirc;ng chỉ tại thị trường Việt Nam n&oacute;i ri&ecirc;ng m&agrave; c&ograve;n tại thị trường Mỹ, Nhật Bản, H&agrave;n Quốc, ...</strong></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:16px"><strong>PPC Timeshare cũng cung cấp th&ecirc;m dịch vụ nh&acirc;n vi&ecirc;n buồng ph&ograve;ng gi&uacute;p cho c&aacute;c chủ nh&agrave; thoải m&aacute;i v&agrave; y&ecirc;n t&acirc;m hơn trong việc trao đổi sở hữu t&agrave;i sản của nhau trước v&agrave; sau kỳ nghỉ.</strong></span></p>\r\n', 1, 'vi'),
(2, 'About PPC TIMESHARE', '<p style="text-align:justify"><span style="font-size:16px"><strong>In addition, the PPC PPC assets established with the timeshare được hope is a bridge for customers and other investors participating in the field of timeshare, vacation exchange together, and flexibility in the use of resources Ownership production of each other not only in the Vietnam market in particular also in the US market đ&oacute;, Japan, South Korea, ...</strong></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:16px"><strong>Timeshare PPC services are provided additional housekeeping staff makes all the home comfort and peace of mind of coal in the exchange of other property before and after the holiday.</strong></span></p>\r\n', 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `khunghiduong_en`
--

CREATE TABLE `khunghiduong_en` (
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `thongtin` text NOT NULL,
  `diachi` text NOT NULL,
  `link` text NOT NULL,
  `thoigianbatdau` date NOT NULL,
  `thoigianketthuc` date NOT NULL,
  `trangthai` int(11) NOT NULL,
  `loai` int(11) NOT NULL,
  `idnguoixacnhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khunghiduong_en`
--

INSERT INTO `khunghiduong_en` (`id`, `ten`, `thongtin`, `diachi`, `link`, `thoigianbatdau`, `thoigianketthuc`, `trangthai`, `loai`, `idnguoixacnhan`) VALUES
(1, 'KRIS VUE', 'Vue is Kris housing projects for young families as all companies CapitaLand', '0', 'img/banner_1.png', '0000-00-00', '0000-00-00', 0, 1, 'admin'),
(2, 'VISTA VERDE', '"Verde" means green in Spanish, Vista Verde is designed as a green nursery', '', 'img/banner_2.png', '0000-00-00', '0000-00-00', 0, 1, 'admin'),
(3, 'FLC COMPLEX PHAM HÙNG', 'Experience the value of modern life, complete with apartment complexes, commercial centers - services', '', 'img/banner_3.png', '0000-00-00', '0000-00-00', 0, 1, 'admin'),
(4, 'KRIS VUE', 'Investor: Company CVH Spring Location: Nguyen Duy Trinh Street, Binh Trung Dong Ward, District 2, HCMC', 'Location: Nguyen Duy Trinh Street, Binh Trung Dong Ward, District 2, HCMC', 'img/banner_4.png', '0000-00-00', '0000-00-00', 0, 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `khunghiduong_vi`
--

CREATE TABLE `khunghiduong_vi` (
  `id` int(11) NOT NULL,
  `ten` text NOT NULL,
  `thongtin` text NOT NULL,
  `diachi` text NOT NULL,
  `link` text NOT NULL,
  `thoigianbatdau` date NOT NULL,
  `thoigianketthuc` date NOT NULL,
  `trangthai` int(11) NOT NULL,
  `loai` int(11) NOT NULL,
  `idnguoixacnhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khunghiduong_vi`
--

INSERT INTO `khunghiduong_vi` (`id`, `ten`, `thongtin`, `diachi`, `link`, `thoigianbatdau`, `thoigianketthuc`, `trangthai`, `loai`, `idnguoixacnhan`) VALUES
(1, 'KRIS VUE', 'Kris Vue là dự án nhà ở dành cho các gia đình trẻ do công ty CapitalLand (Singapore) đầu tư và phát triển', '0', 'img/banner_1.png', '0000-00-00', '0000-00-00', 0, 1, 'admin'),
(2, 'VISTA VERDE', '"Verde" có nghĩa là xanh ngát trong tiếng Tây Ban Nha, Vista Verde được thiết kế như một vườn ươm xanh mát', '', 'img/banner_2.png', '0000-00-00', '0000-00-00', 0, 1, 'admin'),
(3, 'FLC COMPLEX PHẠM HÙNG', 'Trải nghiệm giá trị của cuộc sống hiện đại, hoàn hảo với tổ hợp khu căn hộ, trung tâm thương mại - dịch vụ', '', 'img/banner_3.png', '0000-00-00', '0000-00-00', 0, 1, 'admin'),
(4, 'KRIS VUE', 'Chủ đầu tư: Cty CVH Mùa Xuân Vị trí: đường Nguyễn Duy Trinh, Phường Bình Trưng Đông, Quận 2,TPHCM', 'Vị trí: đường Nguyễn Duy Trinh, Phường Bình Trưng Đông, Quận 2,TPHCM', 'img/banner_4.png', '0000-00-00', '0000-00-00', 0, 1, 'admin'),
(5, 'a', '', '', '', '0000-00-00', '0000-00-00', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `ten_lienhe` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt_lienhe` int(11) NOT NULL,
  `email_lienhe` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `conten_lienhe` varchar(3000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `trangthai` int(11) NOT NULL,
  `nguoi_duyet` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `loai_lien_he` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `ten_lienhe`, `sdt_lienhe`, `email_lienhe`, `conten_lienhe`, `trangthai`, `nguoi_duyet`, `loai_lien_he`) VALUES
(8, 'HBB Solutions', 1217009796, 'vinhhongquang@gmail.com', '<p>Li&ecirc;n hệ về khu đất ở Ph&uacute; Mỹ Hưng</p>\r\n\r\n<p><img alt="" src="http://chungcusaigon.info/upload/news/0.jpg" style="height:200px; width:400px" /></p>\r\n\r\n<p>C&ocirc;ng ty TNHH Ph&aacute;t triển Ph&uacute; Mỹ Hưng l&agrave; li&ecirc;n doanh giữa b&ecirc;n nước ngo&agrave;i (C&ocirc;ng ty Central Trading &amp; Development Coporation - Đ&agrave;i Loan) v&agrave; b&ecirc;n Việt Nam (C&ocirc;ng ty TNHH Một th&agrave;nh vi&ecirc;n Ph&aacute;t triển C&ocirc;ng nghiệp T&acirc;n Thuận - doanh nghiệp 100% vốn Nh&agrave; nước thuộc UBND Th&agrave;nh phố) với vốn ph&aacute;p định của C&ocirc;ng ty li&ecirc;n doanh l&agrave; 60 triệu USD. Trong đ&oacute;, b&ecirc;n Việt Nam g&oacute;p 18 triệu USD, chiếm tỷ lệ 30%, b&ecirc;n nước ngo&agrave;i g&oacute;p 42 triệu USD, chiếm tỷ lệ 70% vốn ph&aacute;p định.</p>\r\n\r\n<p>Theo UBND Th&agrave;nh phố, từ năm 2010 đến 2014, C&ocirc;ng ty TNHH Ph&aacute;t triển Ph&uacute; Mỹ Hưng hoạt động kinh doanh c&oacute; hiệu quả, lợi nhuận cao. Mặc d&ugrave; b&ecirc;n Việt Nam đ&atilde; nhiều lần biểu quyết y&ecirc;u cầu đối t&aacute;c li&ecirc;n doanh chia l&atilde;i. Tuy nhi&ecirc;n, do kh&ocirc;ng c&oacute; quyền chi phối n&ecirc;n kh&ocirc;ng quyết định được việc chia lợi nhuận.</p>\r\n\r\n<p>Trong khi đ&oacute;, Hội đồng th&agrave;nh vi&ecirc;n C&ocirc;ng ty TNHH Ph&aacute;t triển Ph&uacute; Mỹ Hưng vẫn quyết định kh&ocirc;ng chia lợi nhuận cho c&aacute;c b&ecirc;n g&oacute;p vốn. Uớc t&iacute;nh khoản lợi nhuận phải chia cho b&ecirc;n Việt Nam khoảng 1.444 tỷ đồng, ảnh hưởng đến nguồn thu của ng&acirc;n s&aacute;ch Nh&agrave; nước từ lợi nhuận sau khi tr&iacute;ch lập c&aacute;c quỹ của c&aacute;c c&ocirc;ng ty 100% vốn Nh&agrave; nước.</p>\r\n\r\n<p>UBND Th&agrave;nh phố đề nghị Bộ Kế hoạch v&agrave; Đầu tư nghi&ecirc;n cứu điều chỉnh quy định về chia lợi nhuận đối với trường hợp li&ecirc;n doanh giữa doanh nghiệp Nh&agrave; nước v&agrave; doanh nghiệp nước ngo&agrave;i. Theo đ&oacute;, cần quy định doanh nghiệp li&ecirc;n doanh phải chia l&atilde;i h&agrave;ng năm sau khi đ&atilde; ho&agrave;n th&agrave;nh nghĩa vụ thuế v&agrave; c&aacute;c nghĩa vụ t&agrave;i ch&iacute;nh kh&aacute;c theo quy định của ph&aacute;p luật, đồng thời đảm bảo thanh to&aacute;n đủ c&aacute;c khoản nợ v&agrave; nghĩa vụ t&agrave;i sản đến hạn trả kh&aacute;c sau khi chia lợi nhuận.</p>\r\n', 1, 'admin@hbbsolution.com', 0),
(10, 'HBB Solutions', 1217009796, 'vinhhongquang@gmail.com', '<p>Dự &aacute;n nh&agrave; đất ng&ocirc;i sao&nbsp;</p>\r\n\r\n<p><img alt="" src="http://sanphaply.com/Upload/thu-tuc-mua-ban-nha-dat-2015.jpg" style="height:375px; width:500px" /></p>\r\n', 1, 'admin@hbbsolution.com', 0),
(11, 'Quang Vinh', 837516495, 'vinhhongquang@gmail.com', '<p>Đặt chỗ khu nghỉ dưỡng STAR&nbsp;</p>\r\n\r\n<p>Nhu cầu:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>2 Ph&ograve;ng đ&ocirc;i</li>\r\n	<li>C&oacute; cho nu&ocirc;i th&uacute; cưng</li>\r\n</ul>\r\n', 1, 'admin@hbbsolution.com', 0),
(12, 'Quang Vinh', 1217009796, 'justindno2@gmail.com', '<p>uốn mua nh&agrave;&nbsp;</p>\r\n', 1, 'admin@hbbsolution.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loai_lien_he`
--

CREATE TABLE `loai_lien_he` (
  `id` int(11) NOT NULL,
  `ten_loai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_lien_he`
--

INSERT INTO `loai_lien_he` (`id`, `ten_loai`) VALUES
(1, 'Mua'),
(2, 'Bán'),
(3, 'Khác');

-- --------------------------------------------------------

--
-- Table structure for table `owning_a_timeshare`
--

CREATE TABLE `owning_a_timeshare` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `language` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owning_a_timeshare`
--

INSERT INTO `owning_a_timeshare` (`id`, `title`, `content`, `language`) VALUES
(1, 'Thông Tin TimeShare', 'Kinh doanh cốt lõi của PPC Timeshare là trao đổi kỳ nghỉ - giúp chủ sở hữu timeshare trao đổi quyền sở hữu kỳ nghỉ của họ cho thời gian tại khu nghỉ mát khác. Vì vậy, để tận hưởng những lợi ích trao đổi qua PPC, bạn phải sở hữu một timeshare để trao đổi! \r\nTimeshare, còn được gọi là Sở hữu kỳ nghỉ, mang đến cho bạn cơ hội sở hữu phòng chung cư theo phong cách tại khu nghỉ mát chất lượng với một loạt các tiện nghi tại các điểm đến nổi tiếng trong nước và quốc tế. Phòng timeshare cung cấp nơi ở được bố trí rộng rãi và tiện nghi tại gia nhưng lại như khách sạn, có thể bao gồm nhà bếp, thiết bị giặt là, với không gian rộng rãi gồm nhiêù phòng khách, phòng ngủ và nhiều - tất cả đều là thuộc quyền sở hữu riêng tư.\r\nChủ sở hữu kỳ nghỉ còn được hưởng sự an nhàn mà timeshare cung cấp khi đi du lịch mỗi năm. Họ không phải đối phó với sự căng thẳng của kế hoạch cho một kỳ nghỉ và đặt phòng khách sạn. Họ biết rằng họ có một nơi để quay về mỗi năm. Đồng thời, thông qua các công ty trao đổi timeshare như PPC, chủ sở hữu có sự linh hoạt để kỳ nghỉ tại khu nghỉ dưỡng trên toàn thế giới. Ngày nay, có hơn 7 triệu chủ sở hữu timeshare. Một số các nhà phát triển timeshare lớn như Disney, Hilton, và Wyndham Worldwide.', 'vi'),
(2, 'TimeShare Information', 'PPC Timeshare''s core business is exchange vacations – helping timeshare owners to exchange their vacation ownership for time at other resorts. So, to enjoy exchange benefits through PPC Timeshare, you must own a timeshare to exchange! \r\nTimeshare, also known as Vacation Ownership, gives you the opportunity to own condominium-style accommodations at quality resorts, which typically offer an array of amenities in popular domestic and international destinations. Timeshare accommodations offer spacious floor plans and home-like amenities when compared with traditional hospitality products like hotels, and may include kitchens, laundry facilities, living room space, and multiple bedrooms – all in the privacy of your own unit.\r\nVacation owners also enjoy the peace-of-mind timeshare provides when traveling each year. They don’t have to deal with the stress of planning a vacation and booking accommodations. They know they have a place to return to each year. At the same time, through timeshare exchange companies like PPC, owners have the flexibility to vacation at resorts all over the world. Today, there are more than 7 million timeshare owners. Some of the major timeshare developers include Disney, Hilton, and Wyndham Worldwide, just to name a few.', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id_quyen` int(11) NOT NULL,
  `tenquyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resort`
--

CREATE TABLE `resort` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_resort_type` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `id_city` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resort_image`
--

CREATE TABLE `resort_image` (
  `id_resort_image` int(11) NOT NULL,
  `image` text NOT NULL,
  `id_resort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resort_language`
--

CREATE TABLE `resort_language` (
  `id_resort_language` int(11) NOT NULL,
  `introduce` text NOT NULL,
  `location` text NOT NULL,
  `service` text NOT NULL,
  `equipment` text NOT NULL,
  `language` text NOT NULL,
  `id_resort` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `info_map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resort_type`
--

CREATE TABLE `resort_type` (
  `id` int(11) NOT NULL,
  `tenloai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resort_type`
--

INSERT INTO `resort_type` (`id`, `tenloai`) VALUES
(1, 'Resort'),
(2, 'Holiday Homes');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `image_slider` text NOT NULL,
  `duongdan_slider` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `image_slider`, `duongdan_slider`) VALUES
(1, 'img/1487302070_wallpaper_nature.jpg', '#'),
(2, 'img/1484294348_banner_main.jpg', '#'),
(3, 'img/1484294359_banner_main.jpg', '#'),
(4, 'img/1484294369_banner_main.jpg', '#');

-- --------------------------------------------------------

--
-- Table structure for table `slider_ngonngu`
--

CREATE TABLE `slider_ngonngu` (
  `id` int(11) NOT NULL,
  `id_slider` int(11) NOT NULL,
  `noidung_slider` text NOT NULL,
  `tieude_slider` text NOT NULL,
  `mota_slider` text NOT NULL,
  `ngon_ngu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider_ngonngu`
--

INSERT INTO `slider_ngonngu` (`id`, `id_slider`, `noidung_slider`, `tieude_slider`, `mota_slider`, `ngon_ngu`) VALUES
(1, 1, 'LEARN MORE', 'Treat yourself this Christmas!', '<p>Upgrade to RCI Platinum and enjoy the benefits all year round</p>\r\n', 'en'),
(2, 1, 'XEM THÊM', 'Tận hưởng giáng sinh của bạn!', '<p>N&acirc;ng cấp g&oacute;i RCI bạch kim v&agrave; tận hưởng những ưu đ&atilde;i quanh năm&nbsp;</p>\r\n', 'vi'),
(3, 2, 'XEM THÊM', 'Vùng đất nào có mùa đông tuyệt vời nhất?', '<p>Chia sẽ k&igrave; nghỉ y&ecirc;u th&iacute;ch với những bức ảnh l&ecirc;n Instagram với li&ecirc;n kết #gorci</p>\r\n', 'vi'),
(4, 2, 'LEARN MORE', 'Where''s  Winter Wonderland?', 'Share your favourite festive holiday photos on our Instagram page with #gorci', 'en'),
(5, 3, 'REGISTER NOW', '', '', 'en'),
(7, 3, 'ĐĂNG KÝ', '', '', 'vi'),
(8, 4, 'ĐẶT CHỖ', '', '', 'vi'),
(9, 4, 'BOOK NOW', '', '', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tendangnhap` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `matkhau` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_vaitro` int(11) NOT NULL,
  `hoten` text COLLATE utf8mb4_vietnamese_ci,
  `diachi` text COLLATE utf8mb4_vietnamese_ci,
  `dienthoai` text COLLATE utf8mb4_vietnamese_ci,
  `id_account` int(11) NOT NULL,
  `avatar_account` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sex_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `id_vaitro`, `hoten`, `diachi`, `dienthoai`, `id_account`, `avatar_account`, `sex_account`) VALUES
('admin@hbbsolution.com', '07714b732dbc738b8df5bfbfc1a51ca6', 2, 'Quang Vinh', '215/B37 Nguyễn Văn Hưởng ,P. Thảo Điền,Q. 2,TP. HCM', '01217009796', 0, '', 0),
('admin1@hbbsolution.com', 'e00cf25ad42683b3df678c61f42c6bda', 2, 'admin1', '215/B37 Nguyễn Văn Hưởng,P. Thảo Điền,Q. 2,TP. HCM', '0873077477', 0, '', 0),
('quangvinh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Quang Vinh', '3rd Floor, JABES 1 Building244 Cong Quynh, Pham Ngu Lao Ward District 1, HCM City, Vietnam', '+84(08)82253248', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoandangky`
--

CREATE TABLE `taikhoandangky` (
  `id_taikhoandk` int(11) NOT NULL,
  `email_taikhoandk` text NOT NULL,
  `sdt_taikhoandk` text NOT NULL,
  `trangthai_taikhoandk` int(11) NOT NULL,
  `nguoiduyet_taikhoandk` text NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoandangky`
--

INSERT INTO `taikhoandangky` (`id_taikhoandk`, `email_taikhoandk`, `sdt_taikhoandk`, `trangthai_taikhoandk`, `nguoiduyet_taikhoandk`, `ghichu`) VALUES
(1, 'vinh123@gmail.com', '01217009796', 0, 'admin@hbbsolution.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `thamgia`
--

CREATE TABLE `thamgia` (
  `id` int(11) NOT NULL,
  `hinh_anh` text NOT NULL,
  `link_hinh_1` text NOT NULL,
  `link_hinh_2` text NOT NULL,
  `link_hinh_3` text NOT NULL,
  `link_hinh_4` text NOT NULL,
  `link_hinh_5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thamgia`
--

INSERT INTO `thamgia` (`id`, `hinh_anh`, `link_hinh_1`, `link_hinh_2`, `link_hinh_3`, `link_hinh_4`, `link_hinh_5`) VALUES
(1, 'img/1484363533_banner_main.jpg', '#', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `thamgia_ngonngu`
--

CREATE TABLE `thamgia_ngonngu` (
  `id` int(11) NOT NULL,
  `label_hinh_1` text NOT NULL,
  `label_hinh_2` text NOT NULL,
  `label_hinh_3` text NOT NULL,
  `label_hinh_4` text NOT NULL,
  `label_hinh_5` text NOT NULL,
  `ngonngu` text NOT NULL,
  `id_thamgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thamgia_ngonngu`
--

INSERT INTO `thamgia_ngonngu` (`id`, `label_hinh_1`, `label_hinh_2`, `label_hinh_3`, `label_hinh_4`, `label_hinh_5`, `ngonngu`, `id_thamgia`) VALUES
(1, '', 'Lợi ích sở hữu TIMESHARE', 'Kết nối với PPC TIMESHARE', 'Khách đã sở hữu TIMESHARE', 'Thông cáo báo chí', 'vi', 1),
(2, '', 'Benefit of owning a TIMESHARE', 'Working with PPC TIMESHARE', 'For whom already owing a TIMESHARE', 'PRESS RELEASE FOR PPC TS', 'en', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `id_vaitro` int(11) NOT NULL,
  `tenvaitro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`id_vaitro`, `tenvaitro`) VALUES
(1, 'Người dùng thông thường'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `ten_video_vi` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `url_video` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ten_video_en` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `ten_video_vi`, `url_video`, `ten_video_en`) VALUES
(1, 'Chàng Trai Của Em', 'https://www.youtube.com/embed/Ha_6LqzXJSo', 'My Boys'),
(2, 'So sánh Samsung Galaxy A7 2016 vs Iphone 61', 'https://www.youtube.com/embed/4jHQ8ciHe28', 'My Boys'),
(3, 'Giày Bitis                                        ', 'https://www.youtube.com/embed/QZ_qGJSn7-A', ''),
(4, 'Real Madrid VS Barcelona                                                                            ', 'https://www.youtube.com/embed/QZ_qGJSn7-A', ''),
(5, 'Tuyển chọn những ca khúc hay                                                                        ', 'https://www.youtube.com/embed/72g4Zkexu3E', ''),
(6, 'Tuyển chọn những ca khúc nhạc trẻ                                        ', 'https://www.youtube.com/embed/FK8BlX-8pUI', ''),
(7, 'Schannel - Hôm Nay Ăn Gì: Lần đầu ăn Sầu Riêng ra sao?', 'https://www.youtube.com/embed/jO34AKUp7ac', ''),
(8, 'FAPtv Cơm Nguội: Tập 103 - Bí mật của gái đẹp', 'https://www.youtube.com/embed/6Wnra0xnVpI', ''),
(9, 'Giọng ải giọng ai | tập 11 full hd: Chàng tài xế đẹp như trai Hàn khiến 2 đội ngẩn ngơ', 'https://www.youtube.com/embed/_oD5BQg6XLs', ''),
(10, 'Thách thức danh hài 3 | tập 11 full hd: hai giám khảo "chịu khổng nổi" vòng 5 của hot boy trà sữa', 'https://www.youtube.com/embed/Cj0KuCBy_04', ''),
(11, 'LẠC TRÔI | OFFICIAL MUSIC VIDEO | SƠN TÙNG M-TP', 'https://www.youtube.com/embed/Llw9Q6akRo4', ''),
(12, 'ĐI ĐỂ TRỞ VỀ | SOOBIN HOÀNG SƠN | OFFICIAL MUSIC VIDEO', 'https://www.youtube.com/embed/wnSNyE2hVu4', ''),
(16, 'Vật Vờ| Galaxy A5 2017 xách tay rẻ hơn chính hãng 2 triệu\r\n', 'https://www.youtube.com/embed/9llewN6NWso', 'Vật Vờ| Galaxy A5 2017 xách tay rẻ hơn chính hãng 2 triệu\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `announce_papers`
--
ALTER TABLE `announce_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announce_papers_language`
--
ALTER TABLE `announce_papers_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_timeshare`
--
ALTER TABLE `benefit_timeshare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_now`
--
ALTER TABLE `book_now`
  ADD PRIMARY KEY (`id_book`);

--
-- Indexes for table `cauhoithuonggap`
--
ALTER TABLE `cauhoithuonggap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cauhoithuonggap_ngonngu`
--
ALTER TABLE `cauhoithuonggap_ngonngu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connect_ppc`
--
ALTER TABLE `connect_ppc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connect_ppc_language`
--
ALTER TABLE `connect_ppc_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals_language`
--
ALTER TABLE `deals_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details_deal_resort`
--
ALTER TABLE `details_deal_resort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gioithieu`
--
ALTER TABLE `gioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gioithieu_ngonngu`
--
ALTER TABLE `gioithieu_ngonngu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_lien_he`
--
ALTER TABLE `loai_lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owning_a_timeshare`
--
ALTER TABLE `owning_a_timeshare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id_quyen`);

--
-- Indexes for table `resort`
--
ALTER TABLE `resort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resort_image`
--
ALTER TABLE `resort_image`
  ADD PRIMARY KEY (`id_resort_image`);

--
-- Indexes for table `resort_language`
--
ALTER TABLE `resort_language`
  ADD PRIMARY KEY (`id_resort_language`);

--
-- Indexes for table `resort_type`
--
ALTER TABLE `resort_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `slider_ngonngu`
--
ALTER TABLE `slider_ngonngu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Indexes for table `taikhoandangky`
--
ALTER TABLE `taikhoandangky`
  ADD PRIMARY KEY (`id_taikhoandk`);

--
-- Indexes for table `thamgia`
--
ALTER TABLE `thamgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thamgia_ngonngu`
--
ALTER TABLE `thamgia_ngonngu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id_vaitro`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `announce_papers`
--
ALTER TABLE `announce_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `announce_papers_language`
--
ALTER TABLE `announce_papers_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `benefit_timeshare`
--
ALTER TABLE `benefit_timeshare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `book_now`
--
ALTER TABLE `book_now`
  MODIFY `id_book` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cauhoithuonggap`
--
ALTER TABLE `cauhoithuonggap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cauhoithuonggap_ngonngu`
--
ALTER TABLE `cauhoithuonggap_ngonngu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `connect_ppc`
--
ALTER TABLE `connect_ppc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `connect_ppc_language`
--
ALTER TABLE `connect_ppc_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `continents`
--
ALTER TABLE `continents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `deals_language`
--
ALTER TABLE `deals_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `details_deal_resort`
--
ALTER TABLE `details_deal_resort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gioithieu`
--
ALTER TABLE `gioithieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gioithieu_ngonngu`
--
ALTER TABLE `gioithieu_ngonngu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `loai_lien_he`
--
ALTER TABLE `loai_lien_he`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `owning_a_timeshare`
--
ALTER TABLE `owning_a_timeshare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id_quyen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resort`
--
ALTER TABLE `resort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `resort_image`
--
ALTER TABLE `resort_image`
  MODIFY `id_resort_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `resort_language`
--
ALTER TABLE `resort_language`
  MODIFY `id_resort_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `resort_type`
--
ALTER TABLE `resort_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slider_ngonngu`
--
ALTER TABLE `slider_ngonngu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `taikhoandangky`
--
ALTER TABLE `taikhoandangky`
  MODIFY `id_taikhoandk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `thamgia`
--
ALTER TABLE `thamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `thamgia_ngonngu`
--
ALTER TABLE `thamgia_ngonngu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id_vaitro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
