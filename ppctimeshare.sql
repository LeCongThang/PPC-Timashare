-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 06:04 AM
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
-- Table structure for table `book_now`
--

CREATE TABLE `book_now` (
  `id_book` int(100) NOT NULL,
  `tendangnhap` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idkhunghiduong` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `ghichu` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `book_now`
--

INSERT INTO `book_now` (`id_book`, `tendangnhap`, `idkhunghiduong`, `thoigian`, `ghichu`) VALUES
(158, 'quangvinh13', 0, '0000-00-00', ''),
(159, 'quangvinh13', 1, '0000-00-00', ''),
(160, 'quangvinh13', 1, '0000-00-00', '');

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
(1);

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
(1, 1, '<p>T&ocirc;i C&oacute; Thể Hẹn Thời Gian Giao H&agrave;ng Cụ Thể Hay Hẹn&nbsp;</p>\r\n', '<p>Tiki giao h&agrave;ng trong giờ h&agrave;nh ch&iacute;nh: từ 8 giờ s&aacute;ng đến 5 giờ chiều v&agrave; trong c&aacute;c ng&agrave;y từ Thứ 2 đến thứ 6. Do nh&acirc;n vi&ecirc;n vận chuyển giao h&agrave;ng theo tuyến n&ecirc;n rất tiếc Tiki chưa thể hỗ trợ thời gian giao h&agrave;ng cụ thể. Sau khi đặt h&agrave;ng th&agrave;nh c&ocirc;ng, Tiki sẽ th&ocirc;ng b&aacute;o thời gian giao h&agrave;ng dự kiến cho đơn h&agrave;ng, qu&yacute; kh&aacute;ch vui l&ograve;ng sắp xếp thời gian v&agrave; giữ li&ecirc;n lạc để nhận h&agrave;ng trong thời gian Tiki đ&atilde; th&ocirc;ng b&aacute;o. Trong trường hợp nh&acirc;n vi&ecirc;n vận chuyển li&ecirc;n hệ v&agrave;o thời gian chưa ph&ugrave; hợp, qu&yacute; kh&aacute;ch c&oacute; thể giữ li&ecirc;n lạc qua điện thoại v&agrave; hẹn lại thời gian giao h&agrave;ng kh&aacute;c, nh&acirc;n vi&ecirc;n vận chuyển sẽ cố gắng hỗ trợ trong mức c&oacute; thể.</p>\r\n', 'vi'),
(2, 1, '<p>I Can Romance Specific Delivery Time Delivery On Sunday Romance Or Not?</p>\r\n', '<p>Tiki delivery during office hours: from 8 am to 5 pm and during the day from Monday to Friday 6. Do shipping delivery staff according Tiki online so unfortunately can not support a specific delivery time . After a successful order, Tiki will announce the expected delivery time for orders, please arrange a time and keep in touch to receive goods in time Tiki announced. In the case of transport staff contact time is not appropriate, you can keep in touch by phone and reschedule another time delivery, transportation staff will try to support as possible.</p>\r\n', 'en');

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
(1, 'img/1483948305_banner_main.jpg');

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
(1, 'Về PPC TIMESHARE', '<p><strong><em>Ngo&agrave;i PPC Property th&igrave; PPC Timeshare được th&agrave;nh lập với hy vọng l&agrave; cầu nối cho c&aacute;c kh&aacute;ch h&agrave;ng v&agrave; c&aacute;c chủ đầu tư tham gia trong lĩnh vực Timeshare, c&ugrave;ng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sử dụng quyền sở hữu t&agrave;i sản của nhau kh&ocirc;ng chỉ tại thị trường Việt Nam n&oacute;i ri&ecirc;ng m&agrave; c&ograve;n tại thị trường Mỹ, Nhật Bản, H&agrave;n Quốc,&hellip; </em></strong></p>\r\n\r\n<p><strong><em>Timeshare cũng cung cấp th&ecirc;m dịch vụ nh&acirc;n vi&ecirc;n buồng ph&ograve;ng nhằm gi&uacute;p cho c&aacute;c chủ nh&agrave; thoải m&aacute;i v&agrave; y&ecirc;n t&acirc;m hơn trong việc trao đổi quyền sở hữu t&agrave;i sản của nhau trước v&agrave; sau kỳ nghỉ.&nbsp;</em></strong></p>\r\n', 1, 'vi'),
(2, 'About PPC TimeShare', '<p><strong>In addition, the PPC PPC Timeshare Property was established in the hope of a bridge for customers and investors to participate in the field of timeshare, vacation exchange together, and flexibility in the use of property ownership not only each other&#39;s products in Vietnam market in particular, but also in the US, Japan, South Korea, ...</strong></p>\r\n\r\n<p><strong>Timeshare also provides additional services to help Housekeeping staff for the home comfort and peace of mind in the exchange of ownership of the same property before and after the holiday.</strong></p>\r\n', 1, 'en');

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
(4, 'KRIS VUE', 'Chủ đầu tư: Cty CVH Mùa Xuân Vị trí: đường Nguyễn Duy Trinh, Phường Bình Trưng Đông, Quận 2,TPHCM', 'Vị trí: đường Nguyễn Duy Trinh, Phường Bình Trưng Đông, Quận 2,TPHCM', 'img/banner_4.png', '0000-00-00', '0000-00-00', 0, 1, 'admin');

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
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `ten_lienhe`, `sdt_lienhe`, `email_lienhe`, `conten_lienhe`, `trangthai`) VALUES
(6, 'HBB Solutions', 1222555, 'vinhhongquang@gmail.com', '<p>cxczxc</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loaidichvu`
--

CREATE TABLE `loaidichvu` (
  `id` int(11) NOT NULL,
  `tenloai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaidichvu`
--

INSERT INTO `loaidichvu` (`id`, `tenloai`) VALUES
(1, 'Khu Nghỉ Dưỡng'),
(2, 'Nhà cá nhân');

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
(1, 'img/1483497797_banner_1.png', '#'),
(2, 'img/banner_1.png', '#'),
(3, 'img/banner_3.png', '#'),
(4, 'img/banner_4.png', '#');

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
(2, 1, 'XEM THÊM A', 'Tận hưởng giáng sinh của bạn!', '<p>N&acirc;ng cấp g&oacute;i RCI bạch kim v&agrave; tận hưởng những ưu đ&atilde;i quanh năm A</p>\r\n', 'vi'),
(3, 2, 'XEM THÊM', 'Vùng đất nào có mùa đông tuyệt vời nhất?', 'Chia sẽ kì nghỉ yêu thích với những bức ảnh lên Instagram với liên kết #gorci', 'vi'),
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
  `dienthoai` text COLLATE utf8mb4_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `id_vaitro`, `hoten`, `diachi`, `dienthoai`) VALUES
('admin@hbbsolution.com', '21232f297a57a5a743894a0e4a801fc3', 2, 'QuangVinh', 'Lầu 3, tòa nhà JABES 1\r\n, 244 Cống Quỳnh, Phường Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh, Việt Nam', '0839 262 998'),
('admin1@hbbsolution.com', 'e00cf25ad42683b3df678c61f42c6bda', 2, 'admin1', '215/B37 Nguyễn Văn Hưởng,P. Thảo Điền,Q. 2,TP. HCM', '0873077477'),
('quangvinh@gmail.com', 'c56d0e9a7ccec67b4ea131655038d604', 1, 'Quang Vinh', '3rd Floor, JABES 1 Building244 Cong Quynh, Pham Ngu Lao Ward District 1, HCM City, Vietnam', '+84(08)82253248'),
('vinh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'Vinh', 'ABC ', '01217009796');

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
(1, 'img/1483957778_banner_main.jpg', '#', '#', '#', '#', '#');

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
(1, 'Tiếng Việt', 'Lợi ích sở hữu TIMESHARE', 'Kết nối với PPC TIMESHARE', 'Khách đã sở hữu TIMESHARE', 'Thông cáo báo chí', 'vi', 1),
(2, 'Tiếng Anh', 'Benefit of owning a TIMESHARE', 'Working with PPC TIMESHARE', 'For whom already owing a TIMESHARE', 'PRESS RELEASE FOR PPC TS', 'en', 1);

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
  `ten_video` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `url_video` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `ten_video`, `url_video`) VALUES
(1, 'Video10                                                                                             ', 'https://www.youtube.com/embed/XGSy3_Czz8k                                                                                                                                                                                                                                                                                                 '),
(2, 'Video2', 'https://www.youtube.com/embed/4jHQ8ciHe28'),
(3, 'Review Điện thoại                                                                                   ', 'https://www.youtube.com/embed/mrGbgv1ZS_0                                      '),
(4, 'Video4', 'https://www.youtube.com/embed/dwFUinYXkm0'),
(5, 'Video5', 'https://www.youtube.com/embed/72g4Zkexu3E'),
(6, 'Video 6', 'https://www.youtube.com/embed/FK8BlX-8pUI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
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
-- Indexes for table `khunghiduong_en`
--
ALTER TABLE `khunghiduong_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khunghiduong_vi`
--
ALTER TABLE `khunghiduong_vi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaidichvu`
--
ALTER TABLE `loaidichvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id_quyen`);

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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book_now`
--
ALTER TABLE `book_now`
  MODIFY `id_book` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `cauhoithuonggap`
--
ALTER TABLE `cauhoithuonggap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cauhoithuonggap_ngonngu`
--
ALTER TABLE `cauhoithuonggap_ngonngu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `khunghiduong_en`
--
ALTER TABLE `khunghiduong_en`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `khunghiduong_vi`
--
ALTER TABLE `khunghiduong_vi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loaidichvu`
--
ALTER TABLE `loaidichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id_quyen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slider_ngonngu`
--
ALTER TABLE `slider_ngonngu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `taikhoandangky`
--
ALTER TABLE `taikhoandangky`
  MODIFY `id_taikhoandk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
