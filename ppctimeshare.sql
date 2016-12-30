-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 10:52 AM
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
-- Table structure for table `chitietquyenvaitro`
--

CREATE TABLE `chitietquyenvaitro` (
  `id_quyen` int(11) NOT NULL,
  `id_vaitro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `name_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucmenu`
--

CREATE TABLE `danhmucmenu` (
  `id` int(11) NOT NULL,
  `tendanhmuc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gioithieu_en`
--

CREATE TABLE `gioithieu_en` (
  `tieu_de` text,
  `img_tieude` text,
  `noidung_gioithieu1` text,
  `noidung_gioithieu2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gioithieu_en`
--

INSERT INTO `gioithieu_en` (`tieu_de`, `img_tieude`, `noidung_gioithieu1`, `noidung_gioithieu2`) VALUES
('About PPC TimeShare', 'img/banner_gioithieu.png', 'In addition, the PPC PPC Timeshare Property was established in the hope of a bridge for customers and investors to participate in the field of timeshare, vacation exchange together, and flexibility in the use of property ownership not only each other''s products in Vietnam market in particular, but also in the US, Japan, South Korea, ...', 'Timeshare also provides additional services to help Housekeeping staff for the home comfort and peace of mind in the exchange of ownership of the same property before and after the holiday.');

-- --------------------------------------------------------

--
-- Table structure for table `gioithieu_vi`
--

CREATE TABLE `gioithieu_vi` (
  `tieu_de` text,
  `img_tieude` text,
  `noidung_gioithieu1` text,
  `noidung_gioithieu2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gioithieu_vi`
--

INSERT INTO `gioithieu_vi` (`tieu_de`, `img_tieude`, `noidung_gioithieu1`, `noidung_gioithieu2`) VALUES
('Về PPC TIMESHARE', 'img/banner_gioithieu.png', 'Ngoài PPC Property thì PPC Timeshare được thành lập với hy vọng là cầu nối cho các khách hàng và các chủ đầu tư tham gia trong lĩnh vực Timeshare, cùng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sử dụng quyền sở hữu tài sản của nhau không chỉ tại thị trường Việt Nam nói riêng mà còn tại thị trường Mỹ, Nhật Bản, Hàn Quốc,…', 'Timeshare cũng cung cấp thêm dịch vụ nhân viên buồng phòng nhằm giúp cho các chủ nhà thoải mái và yên tâm hơn trong việc trao đổi quyền sở hữu tài sản của nhau trước và sau kỳ nghỉ.');

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
(1, 'HBB Solutions', 1222222, 'sadsa@gmail.com', '\r\nádasdsakmdlkasmldmaslmdasd', 1),
(2, 'HBB Solutions', 1222222, 'sadsa@gmail.com', '<p>&aacute;dasdsakmdlkasmldmaslmdasd</p>\r\n', 0),
(3, 'HBB Solutions', 2147483647, 'asdnjasnd@gmail.com', '<p>sadjasnkdnasndjknaskjdnkajsndkjnaskjdnkj &aacute;ndkjasjkdnkasndkansdkjasnkdnksajd</p>\n', 0),
(4, 'abc', 0, 'abc', '<h3 style="color:#aaaaaa; font-style:italic"><span style="font-size:12px"><em>abcadsjkaskdnjkansdknaskndkansdnasndjasndkjnaskjnd</em></span></h3>\r\n', 0),
(5, '', 0, '', '', 0),
(6, 'anc', 0, 'abc', '<p>abc</p>\r\n', 0),
(7, 'QV', 0, 'justindno2@gmai.com', '<p>abc</p>\r\n', 0),
(8, '', 0, '', '                    ', 0),
(9, '', 0, '', '', 0),
(10, '', 0, '', '', 0),
(11, 'ádasd', 0, 'sadasd', '<p>đ&acirc;sdasd&aacute;dasdasd</p>\r\n', 0),
(12, '', 0, '', '', 0),
(13, 's', 0, 's', '', 0),
(14, 'HBB Solutions', 1222222, 'justindno2@gmail.com', '<p>d</p>\r\n', 0),
(15, 'HBB Solutions', 23456, 'vinhhongquang@gmail.com', '<p>ch&uacute;ng t&ocirc;i l&agrave; hbb solutions</p>\r\n', 0),
(16, '', 0, '', '', 0),
(17, 'x', 0, 'z', '', 0),
(18, 'x', 0, 'z', '', 0),
(19, 'x', 0, 'z', '', 0),
(20, 'x', 0, 'z', '', 0),
(21, 'x', 0, 'z', '', 0),
(22, 'HBB Solutions', 0, 'vinhhongquang@gmail.com', '<p><strong>&aacute;dsasadasdasdas</strong></p>\r\n', 0),
(23, 'HBB Solutions', 1222555, 'justindno2@gmai.com', '<p>sadasdasd</p>\r\n', 0),
(24, 'x', 0, 'z', '<p>aaa</p>\r\n', 0),
(25, '', 0, '', '', 0),
(26, '', 0, '', '', 0);

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
-- Table structure for table `ngon_ngu`
--

CREATE TABLE `ngon_ngu` (
  `vietnam` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `english` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhadat`
--

CREATE TABLE `nhadat` (
  `id_nha` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi_nha` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nha_ngonngu`
--

CREATE TABLE `nha_ngonngu` (
  `id_nha_ngonngu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi_nha_ngonngu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
(1, 'img/banner_main.jpg', '#'),
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
(1, 1, 'LEARN MORE', 'Treat yourself this Christmas!', 'Upgrade to RCI Platinum and enjoy the benefits all year round', 'en'),
(2, 1, 'XEM THÊM', 'Tận hưởng giáng sinh của bạn!', 'Nâng cấp gói RCI bạch kim và tận hưởng những ưu đãi quanh năm', 'vi'),
(3, 2, 'XEM THÊM', 'Vùng đất nào có mùa đông tuyệt vời nhất?', 'Chia sẽ kì nghỉ yêu thích với những bức ảnh lên Instagram với liên kết #gorci', 'vi'),
(4, 2, 'LEARN MORE', 'Where''s  Winter Wonderland?', 'Share your favourite festive holiday photos on our Instagram page with #gorci', 'en'),
(5, 3, 'BOOK NOW', '', '', 'en'),
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
  `email` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `id_vaitro`, `hoten`, `diachi`, `dienthoai`, `email`) VALUES
('', 'd41d8cd98f00b204e9800998ecf8427e', 1, '', '', '', ''),
('abcd', 'e2fc714c4727ee9395f324cd2e7f331f', 1, 'đá', 'ádasd', '366386', ''),
('admin', '21232f297a57a5a743894a0e4a801fc3', 2, 'QuangVinh', 'Lầu 3, tòa nhà JABES 1\r\n, 244 Cống Quỳnh, Phường Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh, Việt Nam', '0839 262 998', ''),
('admin1', 'e00cf25ad42683b3df678c61f42c6bda', 2, 'admin1', '215/B37 Nguyễn Văn Hưởng,P. Thảo Điền,Q. 2,TP. HCM', '0873077477', ''),
('quangvinh', '0f12c7a13c9ebaf1520583010be4dd49', 1, 'quangvinh', '93/6M Phùng Tá Chu', '1', ''),
('quangvinh13', 'e10adc3949ba59abbe56e057f20f883e', 1, 'quangvinh', '93/6M Phùng Tá Chu', '23222333', ''),
('quangvinh15', 'd3677da84302bc96677df88295e918d7', 1, 'Hồng Quang Vinh', '93/6M Phùng Tá Chu Phường An Lạc A Quận Bình Tân, Thành Phố Hồ Chí Minh', '01217009796', ''),
('quangvinh17', 'e10adc3949ba59abbe56e057f20f883e', 1, 'quangvinh', '123456', '123456', ''),
('quangvinh2', 'e10adc3949ba59abbe56e057f20f883e', 1, 'a', '', '', ''),
('quangvinh23', 'd3677da84302bc96677df88295e918d7', 1, 'Hồng Quang Vinh', 'abc', '01222222', ''),
('quangvinh27', 'd3677da84302bc96677df88295e918d7', 1, 'Hồng Quang Vinh', '93/6M Phùng Tá Chu Phường An Lạc A Quận Bình Tân, Thành Phố Hồ Chí Minh', '01217009796', ''),
('quangvinh5', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Hồng Quang Vinh', '93/6M Phùng Tá Chu Phường An Lạc A Quận Bình Tân, Thành Phố Hồ Chí Minh', '01222222', '');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoandangky`
--

CREATE TABLE `taikhoandangky` (
  `id_taikhoandk` int(11) NOT NULL,
  `email_taikhoandk` text NOT NULL,
  `sdt_taikhoandk` text NOT NULL,
  `trangthai_taikhoandk` int(11) NOT NULL,
  `nguoiduyet_taikhoandk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoandangky`
--

INSERT INTO `taikhoandangky` (`id_taikhoandk`, `email_taikhoandk`, `sdt_taikhoandk`, `trangthai_taikhoandk`, `nguoiduyet_taikhoandk`) VALUES
(1, 'justindno2@gmail.com', '01222222', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `trang`
--

CREATE TABLE `trang` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ten_video` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `url_video` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `danhmucmenu`
--
ALTER TABLE `danhmucmenu`
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
-- Indexes for table `nhadat`
--
ALTER TABLE `nhadat`
  ADD PRIMARY KEY (`id_nha`);

--
-- Indexes for table `nha_ngonngu`
--
ALTER TABLE `nha_ngonngu`
  ADD PRIMARY KEY (`id_nha_ngonngu`);

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
-- Indexes for table `trang`
--
ALTER TABLE `trang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`id_vaitro`);

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
-- AUTO_INCREMENT for table `danhmucmenu`
--
ALTER TABLE `danhmucmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
-- AUTO_INCREMENT for table `trang`
--
ALTER TABLE `trang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `id_vaitro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
