-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Décembre 2016 à 04:09
-- Version du serveur :  5.6.21
-- Version de PHP :  5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ppctimeshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `book_now`
--

CREATE TABLE IF NOT EXISTS `book_now` (
  `id_book` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thongtin_book` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chitietquyenvaitro`
--

CREATE TABLE IF NOT EXISTS `chitietquyenvaitro` (
  `id_quyen` int(11) NOT NULL,
  `id_vaitro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `danhmuc`
--

CREATE TABLE IF NOT EXISTS `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `name_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Structure de la table `danhmucmenu`
--

CREATE TABLE IF NOT EXISTS `danhmucmenu` (
`id` int(11) NOT NULL,
  `tendanhmuc` text
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `danhmucmenu`
--

INSERT INTO `danhmucmenu` (`id`, `tendanhmuc`) VALUES
(1010, 'NHÀ ĐẤT'),
(1011, 'KHU NGHĨ DƯỠNG');

-- --------------------------------------------------------

--
-- Structure de la table `gioithieu`
--

CREATE TABLE IF NOT EXISTS `gioithieu` (
  `tieu_de` text,
  `img_tieude` text,
  `noidung_gioithieu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gioithieu`
--

INSERT INTO `gioithieu` (`tieu_de`, `img_tieude`, `noidung_gioithieu`) VALUES
('VỀ PPC TIMESHARE', 'core/img/banner gioithieu.jpg', '<p>&nbsp;</p>\r\n\r\n<p><span style="color:#000000"><code>Ngo&agrave;i PPC Property th&igrave; PPC Timeshare được th&agrave;nh lập với hy vọng l&agrave; cầu nối cho c&aacute;c kh&aacute;ch h&agrave;ng v&agrave; c&aacute;c chủ đầu tư tham gia trong lĩnh vực Timeshare, c&ugrave;ng nhau trao đổi kỳ nghỉ, đồng thời linh hoạt trong việc sử dụng quyền sở hữu t&agrave;i sản của nhau kh&ocirc;ng chỉ tại thị trường Việt Nam n&oacute;i ri&ecirc;ng m&agrave; c&ograve;n tại thị trường Mỹ, Nhật Bản, H&agrave;n Quốc,&hellip; Timeshare cũng cung cấp th&ecirc;m dịch vụ nh&acirc;n vi&ecirc;n buồng ph&ograve;ng nhằm gi&uacute;p cho c&aacute;c chủ nh&agrave; thoải m&aacute;i v&agrave; y&ecirc;n t&acirc;m hơn trong việc trao đổi quyền sở hữu t&agrave;i sản của nhau trước v&agrave; sau kỳ nghỉ.</code></span></p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `khunghiduong`
--

CREATE TABLE IF NOT EXISTS `khunghiduong` (
  `id_khunghi` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thongtin` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `img_khu` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Contenu de la table `khunghiduong`
--

INSERT INTO `khunghiduong` (`id_khunghi`, `diachi`, `thongtin`, `sdt`, `img_khu`) VALUES
('100A', '80 RẠCH BÙNG BINH QUẬN 3', '80 RẠCH BÙNG BINH QUẬN 3', 1214233087, 'img/banner_1.png'),
('100B', '84 RẠCH BUNG BINH', '84 RẠCH BUNG BINH', 1214233087, 'img/banner_1.png'),
('100C', '84 RẠCH BÙNG BINH', '84 RẠCH BÙNG BINH', 1214233087, 'img/banner_1.png'),
('100D', '84 RẠCH BÙNG BINH', '84 RẠCH BÙNG BINH', 1214233087, 'img/banner_1.png');

-- --------------------------------------------------------

--
-- Structure de la table `lienhe`
--

CREATE TABLE IF NOT EXISTS `lienhe` (
  `ten_lienhe` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt_lienhe` int(11) NOT NULL,
  `email_lienhe` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `conten_lienhe` varchar(3000) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ngon_ngu`
--

CREATE TABLE IF NOT EXISTS `ngon_ngu` (
  `vietnam` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `english` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Structure de la table `nhadat`
--

CREATE TABLE IF NOT EXISTS `nhadat` (
  `id_nha` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi_nha` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Structure de la table `nha_ngonngu`
--

CREATE TABLE IF NOT EXISTS `nha_ngonngu` (
  `id_nha_ngonngu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi_nha_ngonngu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Structure de la table `quyen`
--

CREATE TABLE IF NOT EXISTS `quyen` (
`id_quyen` int(11) NOT NULL,
  `tenquyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) DEFAULT NULL,
  `idnhadat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `taikhoan`
--

CREATE TABLE IF NOT EXISTS `taikhoan` (
  `tendangnhap` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `matkhau` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_vaitro` int(11) NOT NULL,
  `hoten` text COLLATE utf8mb4_vietnamese_ci,
  `diachi` text COLLATE utf8mb4_vietnamese_ci,
  `dienthoai` text COLLATE utf8mb4_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Contenu de la table `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `id_vaitro`, `hoten`, `diachi`, `dienthoai`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 2, 'nguyen minh duc', '84 rach  bung binh', '01214233087'),
('user', 'user', 1, NULL, NULL, NULL),
('user1', 'user2', 0, NULL, NULL, NULL),
('user2', '123', 1, 'minh thanh', '84 rach bung binh', '090890890'),
('user3', '123', 1, 'van khuyet', '84 rach bung binh', '0123123123');

-- --------------------------------------------------------

--
-- Structure de la table `trang`
--

CREATE TABLE IF NOT EXISTS `trang` (
`id` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vaitro`
--

CREATE TABLE IF NOT EXISTS `vaitro` (
`id_vaitro` int(11) NOT NULL,
  `tenvaitro` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vaitro`
--

INSERT INTO `vaitro` (`id_vaitro`, `tenvaitro`) VALUES
(1, 'Người dùng thông thường'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name_video` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `link_video` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`id_video`, `name_video`, `link_video`) VALUES
('1A', '                                                                                                                                                                                                                                                                                                                                                      VIDEO RẤT HAY VÀ HẤP DẪN    VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN                                                                                                                                                                                                                                                                                                                                            ', '                     https://www.youtube.com/embed/5jqjxHAVA7I                                                                                                                                                                                                                          '),
('2A', '                                          VIDEO RẤT HAY VÀ HẤP DẪN    VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN                                                                                                                                            ', '                                          https://www.youtube.com/embed/5jqjxHAVA7I                                                                                                                                                                    '),
('3A', '                                                                              VIDEO RẤT HAY VÀ HẤP DẪN    VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN  aaaaaa                                            ', '                                                                                                                              https://www.youtube.com/embed/5jqjxHAVA7I                                                                                                                  '),
('4A', '                                      VIDEO RẤT HAY VÀ HẤP DẪN    VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN                                                                       ', '                                                               https://www.youtube.com/embed/5jqjxHAVA7I                                                              '),
('5A', '                                      VIDEO RẤT HAY VÀ HẤP DẪN    VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN VIDEO RẤT HAY VÀ HẤP DẪN                      ', '                                          https://www.youtube.com/embed/XGSy3_Czz8k                                            ');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `book_now`
--
ALTER TABLE `book_now`
 ADD PRIMARY KEY (`id_book`);

--
-- Index pour la table `danhmuc`
--
ALTER TABLE `danhmuc`
 ADD PRIMARY KEY (`id_danhmuc`);

--
-- Index pour la table `danhmucmenu`
--
ALTER TABLE `danhmucmenu`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `khunghiduong`
--
ALTER TABLE `khunghiduong`
 ADD PRIMARY KEY (`id_khunghi`);

--
-- Index pour la table `nhadat`
--
ALTER TABLE `nhadat`
 ADD PRIMARY KEY (`id_nha`);

--
-- Index pour la table `nha_ngonngu`
--
ALTER TABLE `nha_ngonngu`
 ADD PRIMARY KEY (`id_nha_ngonngu`);

--
-- Index pour la table `quyen`
--
ALTER TABLE `quyen`
 ADD PRIMARY KEY (`id_quyen`);

--
-- Index pour la table `taikhoan`
--
ALTER TABLE `taikhoan`
 ADD PRIMARY KEY (`tendangnhap`);

--
-- Index pour la table `trang`
--
ALTER TABLE `trang`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vaitro`
--
ALTER TABLE `vaitro`
 ADD PRIMARY KEY (`id_vaitro`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `danhmucmenu`
--
ALTER TABLE `danhmucmenu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1012;
--
-- AUTO_INCREMENT pour la table `quyen`
--
ALTER TABLE `quyen`
MODIFY `id_quyen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `trang`
--
ALTER TABLE `trang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vaitro`
--
ALTER TABLE `vaitro`
MODIFY `id_vaitro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
