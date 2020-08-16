-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2013 at 05:17 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `A_ID` int(11) NOT NULL AUTO_INCREMENT,
  `A_Name` varchar(50) NOT NULL,
  `A_Username` varchar(50) NOT NULL,
  `A_Password` text NOT NULL,
  `A_Email` text NOT NULL,
  PRIMARY KEY (`A_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `A_Name`, `A_Username`, `A_Password`, `A_Email`) VALUES
(1, 'Trần Ngọc Thắng', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@vafood.com.vn');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `B_ID` int(11) NOT NULL AUTO_INCREMENT,
  `U_ID` int(11) NOT NULL,
  `B_Date` date NOT NULL,
  `B_Address` text NOT NULL,
  `B_Note` text,
  `B_Flag` int(1) NOT NULL,
  PRIMARY KEY (`B_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`B_ID`, `U_ID`, `B_Date`, `B_Address`, `B_Note`, `B_Flag`) VALUES
(4, 2, '2011-06-05', '', NULL, 1),
(5, 2, '2011-06-04', '1231313123', NULL, 1),
(6, 2, '2011-06-04', '', NULL, 1),
(7, 2, '2011-06-04', '12313', NULL, 1),
(8, 2, '2011-06-07', '', NULL, 1),
(9, 2, '2011-06-08', '', NULL, 1),
(10, 2, '2011-06-08', '', NULL, 1),
(11, 2, '2011-06-08', '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `Contact_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Contact_Ten` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Contact_Phone` varchar(15) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `Contact_Email` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `Contact_Diachi` tinytext CHARACTER SET latin1,
  `Contact_Subject` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Contact_Noidung` text CHARACTER SET latin1,
  `Contact_Flag` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`Contact_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_ID`, `Contact_Ten`, `Contact_Phone`, `Contact_Email`, `Contact_Diachi`, `Contact_Subject`, `Contact_Noidung`, `Contact_Flag`) VALUES
(6, 'Th?ng', '974324940', 'toi_loi_acon@yahoo.com', '1231313123', 'demo', '', 0),
(4, '34', '0', '', NULL, NULL, NULL, 0),
(5, 'Th?ng', '974324940', 'toi_loi_acon@yahoo.com', '1231313123', 'demo', '', 0),
(7, 'Th?ng', '974324940', 'toi_loi_acon@yahoo.com', '1231313123', 'demo', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

CREATE TABLE IF NOT EXISTS `detail_bill` (
  `BD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `B_ID` int(11) NOT NULL,
  `F_ID` int(11) NOT NULL,
  `BD_Price` int(11) NOT NULL,
  `BD_Quantity` int(11) NOT NULL,
  PRIMARY KEY (`BD_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `detail_bill`
--

INSERT INTO `detail_bill` (`BD_ID`, `B_ID`, `F_ID`, `BD_Price`, `BD_Quantity`) VALUES
(16, 6, 15, 4, 1),
(15, 6, 11, 2, 1),
(14, 6, 10, 3, 1),
(13, 5, 12, 3, 1),
(12, 5, 11, 2, 1),
(11, 5, 10, 3, 1),
(10, 5, 9, 4, 1),
(17, 6, 16, 4, 1),
(18, 7, 9, 4, 1),
(19, 7, 13, 3, 1),
(20, 7, 23, 3, 1),
(21, 8, 1, 12, 1),
(22, 8, 2, 12, 1),
(23, 8, 3, 15, 1),
(24, 8, 4, 18, 1),
(25, 8, 5, 20, 1),
(26, 9, 2, 12, 2),
(27, 9, 4, 18, 1),
(28, 10, 2, 12, 1),
(29, 11, 1, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_message`
--

CREATE TABLE IF NOT EXISTS `detail_message` (
  `MD_ID` int(11) NOT NULL,
  `MD_Name` varchar(50) NOT NULL,
  `M_ID` int(11) NOT NULL,
  PRIMARY KEY (`MD_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `F_ID` int(11) NOT NULL AUTO_INCREMENT,
  `F_Name` varchar(50) NOT NULL,
  `F_Price` int(11) NOT NULL,
  `F_Image` text NOT NULL,
  `F_Sale` int(11) NOT NULL,
  `FD_ID` int(11) NOT NULL,
  `F_Flag` int(1) NOT NULL,
  PRIMARY KEY (`F_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`F_ID`, `F_Name`, `F_Price`, `F_Image`, `F_Sale`, `FD_ID`, `F_Flag`) VALUES
(2, 'Ngẫu nhiên 2', 12, '', 20, 0, 1),
(3, 'Ngẫu nhiên 3', 15, '', 0, 0, 1),
(4, 'Ngẫu nhiên 4', 18, '', 0, 0, 1),
(5, 'Ngẫu nhiên 5', 20, '', 0, 0, 1),
(9, 'Cơm(nhiều)', 4, '', 0, 1, 1),
(10, 'Cơm(ít)', 3, '', 0, 1, 1),
(11, 'Rau luộc', 2, '20110606220359bunnautha285_136.jpg', 15, 4, 1),
(12, 'Rau xào', 3, '20110606220345bixao285_136.jpg', 0, 4, 1),
(13, 'Thit kho', 3, '20110606220335heoman285_136.jpg', 0, 2, 1),
(14, 'Thit luoc', 3, '20110606220309saladga285_136.jpg', 0, 2, 1),
(15, 'Ca kho', 4, '20110606220527caran285_136.jpg', 5, 3, 1),
(16, 'Ca ran', 4, '20110606220255tomhap285_136.jpg', 0, 3, 1),
(18, 'Đậu luộc', 2, '20110606220222saladga285_136.jpg', 1, 107, 1),
(25, 'Thịt luộc', 4, '20110606220052ganuong285_136.jpg', 0, 2, 1),
(24, 'Chả lá lốt', 3, '20110606220132chalalot285_136.jpg', 0, 107, 1),
(23, 'Chả cá', 3, '20110606220159chaca285_136.jpg', 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE IF NOT EXISTS `food_type` (
  `FD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FD_Name` varchar(50) NOT NULL,
  `FD_Flag` int(1) NOT NULL,
  PRIMARY KEY (`FD_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`FD_ID`, `FD_Name`, `FD_Flag`) VALUES
(3, 'Món cá', 1),
(2, 'Món thịt', 1),
(1, 'Cơm', 1),
(104, 'demo', 1),
(4, 'Món rau', 1),
(108, 'Món Xào', 1),
(107, 'Món khác', 1);

-- --------------------------------------------------------

--
-- Table structure for table `infor`
--

CREATE TABLE IF NOT EXISTS `infor` (
  `Infor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Infor_Ten` varchar(255) DEFAULT NULL,
  `Infor_Mota` varchar(255) DEFAULT NULL,
  `Infor_Noidung` text,
  `Infor_Flag` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Infor_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `infor`
--

INSERT INTO `infor` (`Infor_ID`, `Infor_Ten`, `Infor_Mota`, `Infor_Noidung`, `Infor_Flag`) VALUES
(1, 'Website', 'Thông tin về địa chỉ ,số điện thoại', '<p>SVF - Cơm sinh vi&ecirc;n</p>\r\n<p>P1103 - 1101B Building - Nam Trung Y&ecirc;n - Cầu Giấy - H&agrave; Nội</p>\r\n<p>Số điện thoại : 0974324940</p>\r\n<p>Email :trranngocthang89@gmail.com</p>', 1),
(2, 'Copyright- Admin', 'Thông tin về website', 'SVF &copy; Copyright 2011. <a href="http://www.c%c6%a1mvs.vn/" target="_blank">www.cơmvs.vn</a>. All rights reserved.', 1),
(3, 'Liên hệ', 'Thông tin để người dùng liên hệ với quản trị web', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SVF - cơm sinh vi&ecirc;n</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cầu giấy, h&agrave; nội</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; http://cơmvs.vn</p>', 1),
(4, 'Hướng dẫn mua hàng', 'Hướng dẫn mua hàng', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam iaculis vehicula dolor sed tempor. Donec lacinia aliquam lacus ac accumsan. Mauris et tortor odio. Suspendisse a convallis lacus. Mauris id mi sit amet ante commodo placerat consectetur a erat. Integer volutpat mauris in nunc facilisis convallis. Pellentesque sit amet felis lectus, convallis viverra turpis. Nunc eu elit elit. Nulla ultrices ligula et est eleifend vel imperdiet libero porttitor. Morbi fermentum ullamcorper lectus, vel tincidunt tellus imperdiet eu. Suspendisse posuere euismod bibendum. Donec non metus in sem sagittis tincidunt sit amet nec sapien. Donec volutpat faucibus odio, commodo sagittis sapien bibendum et. Suspendisse auctor nunc a purus lobortis iaculis. Praesent vitae purus at arcu laoreet hendrerit ut eu tellus. Sed consequat euismod ornare. Cras viverra aliquet est vitae porta. Nullam ut turpis sit amet ipsum porttitor sodales. Aenean sed risus elit, vel vulputate purus. <br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam iaculis vehicula dolor sed tempor. Donec lacinia aliquam lacus ac accumsan. Mauris et tortor odio. Suspendisse a convallis lacus. Mauris id mi sit amet ante commodo placerat consectetur a erat. Integer volutpat mauris in nunc facilisis convallis. Pellentesque sit amet felis lectus, convallis viverra turpis. Nunc eu elit elit. Nulla ultrices ligula et est eleifend vel imperdiet libero porttitor. Morbi fermentum ullamcorper lectus, vel tincidunt tellus imperdiet eu. Suspendisse posuere euismod bibendum. Donec non metus in sem sagittis tincidunt sit amet nec sapien. Donec volutpat faucibus odio, commodo sagittis sapien bibendum et. Suspendisse auctor nunc a purus lobortis iaculis. Praesent vitae purus at arcu laoreet hendrerit ut eu tellus. Sed consequat euismod ornare. Cras viverra aliquet est vitae porta. Nullam ut turpis sit amet ipsum porttitor sodales. Aenean sed risus elit, vel vulputate purus. <br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam iaculis vehicula dolor sed tempor. Donec lacinia aliquam lacus ac accumsan. Mauris et tortor odio. Suspendisse a convallis lacus. Mauris id mi sit amet ante commodo placerat consectetur a erat. Integer volutpat mauris in nunc facilisis convallis. Pellentesque sit amet felis lectus, convallis viverra turpis.</p>', 1),
(5, 'About Us', 'thông tin về trang web', '<p>Thuở c&ograve;n thơ ng&agrave;y ba cữ l&agrave; thường.<br /> T&ocirc;i say sưa qua từng chai lớn nhỏ.<br /> Ai bảo lai rai l&agrave; khổ?<br /> T&ocirc;i mơ m&agrave;ng men rượu v&uacute;t l&ecirc;n cao.<br /> C&oacute; những ng&agrave;y say xỉn, t&eacute; cầu ao,<br /> Vợ bắt được chưa mắng c&acirc;u n&agrave;o đ&atilde; kh&oacute;c.<br /> C&ocirc; b&eacute; nh&agrave; b&ecirc;n nh&igrave;n t&ocirc;i cười kh&uacute;c kh&iacute;ch:<br /> Chị giận anh rồi, tối qua ngủ với em&hellip;</p>', 1),
(6, 'Phí giao hàng', 'Mức phí  giao hàng tận nơi cho khách', '10', 1),
(8, 'Điều khoản sử dụng', 'Các điều mà khách khàng phải tuân theo khi sử dụng dịch vụ', '<p>Bạn hiểu rằng tất cả c&aacute;c th&ocirc;ng tin, dữ liệu, văn bản, phần mềm, &acirc;m nhạc, &acirc;m thanh, h&igrave;nh chụp, h&igrave;nh họa, video, thư, thẻ hoặc c&aacute;c t&agrave;i liệu kh&aacute;c (sau đ&acirc;y được gọi l&agrave; "Nội Dung"), cho d&ugrave; được đăng c&ocirc;ng khai hoặc được gửi ri&ecirc;ng, l&agrave; ho&agrave;n to&agrave;n thuộc về tr&aacute;ch nhiệm của người tạo ra Nội Dung đ&oacute;. Điều n&agrave;y c&oacute; nghĩa l&agrave; bạn, chứ kh&ocirc;ng phải Yahoo!, phải ho&agrave;n to&agrave;n chịu tr&aacute;ch nhiệm đối với to&agrave;n bộ Nội Dung m&agrave; bạn đăng tải, đăng, gửi qua thư điện tử, truyền tải hoặc phương thức kh&aacute;c qua Dịch Vụ. Yahoo! kh&ocirc;ng kiểm so&aacute;t hoặc theo d&otilde;i Nội Dung được đăng qua Dịch Vụ v&agrave;, v&igrave; vậy, kh&ocirc;ng bảo đảm về t&iacute;nh ch&iacute;nh x&aacute;c, nguy&ecirc;n vẹn hoặc chất lượng của Nội Dung đ&oacute;. Bạn hiểu v&agrave; x&aacute;c nhận rằng khi sử dụng Dịch Vụ bạn c&oacute; thể tiếp x&uacute;c với Nội Dung g&acirc;y kh&oacute; chịu, kh&ocirc;ng nghi&ecirc;m t&uacute;c hoặc c&oacute; thể bị phản đối. Trong mọi trường hợp, Yahoo! hoặc c&aacute;c tổ chức cấp giấy ph&eacute;p, người cung cấp, người b&aacute;n, c&ocirc;ng ty mẹ, c&ocirc;ng ty con, chi nh&aacute;nh hoặc c&aacute;c c&ocirc;ng ty, tổ chức, c&aacute;c vi&ecirc;n chức, đại diện hoặc nh&acirc;n vi&ecirc;n c&oacute; li&ecirc;n quan của ch&uacute;ng t&ocirc;i, t&ugrave;y từng trường hợp, sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm dưới bất kỳ h&igrave;nh thức n&agrave;o đối với mọi Nội Dung, bao gồm, nhưng kh&ocirc;ng giới hạn bởi, bất kỳ trường hợp n&agrave;o tiếp x&uacute;c với Nội Dung g&acirc;y kh&oacute; chịu, kh&ocirc;ng nghi&ecirc;m t&uacute;c hoặc c&oacute; thể bị phản đối, mọi sai s&oacute;t hoặc sơ suất trong Nội Dung, hoặc bất kỳ tổn thất hoặc thiệt hại dưới mọi h&igrave;nh thức ph&aacute;t sinh do việc sử dụng Nội Dung được đăng, gửi qua thư điện tử, truyền tải hoặc phương thức kh&aacute;c qua Dịch Vụ. Bạn đồng &yacute; kh&ocirc;ng sử dụng Dịch Vụ để:</p>\r\n<p>(a). tải l&ecirc;n, đăng, gửi thư điện tử, truyền tải hoặc phương thức kh&aacute;c bất kỳ Nội Dung n&agrave;o bị coi l&agrave; bất hợp ph&aacute;p, nguy hại, đe dọa, lạm dụng, s&aacute;ch nhiễu, c&oacute; hại, phỉ b&aacute;ng, khiếm nh&atilde;, tục tĩu, khi&ecirc;u d&acirc;m, b&ocirc;i nhọ, x&acirc;m phạm sự ri&ecirc;ng tư của những người kh&aacute;c, lật đổ, hận th&ugrave;, hoặc ph&acirc;n biệt chủng tộc, d&acirc;n tộc hoặc g&acirc;y kh&oacute; chịu hoặc tr&aacute;i với lợi &iacute;ch c&ocirc;ng cộng, trật tự c&ocirc;ng cộng hoặc sự b&igrave;nh ổn quốc gia trong tất cả c&aacute;c phạm vi ph&aacute;p l&yacute; c&oacute; li&ecirc;n quan;</p>\r\n<p>(b). g&acirc;y tổn hại cho trẻ vị th&agrave;nh ni&ecirc;n dưới bất kỳ h&igrave;nh thức n&agrave;o;</p>\r\n<p>(c). mạo nhận với bất kỳ c&aacute; nh&acirc;n hoặc tổ chức n&agrave;o, bao gồm, nhưng kh&ocirc;ng giới hạn đối với bất kỳ vi&ecirc;n chức, trưởng nh&oacute;m quản l&yacute; diễn đ&agrave;n, hướng dẫn vi&ecirc;n, người quản tr&ograve; hoặc nh&acirc;n vi&ecirc;n n&agrave;o của Yahoo!, hoặc tuy&ecirc;n truyền giả dối hoặc bằng c&aacute;ch kh&aacute;c xuy&ecirc;n tạc tư c&aacute;ch của một c&aacute; nh&acirc;n hoặc tổ chức;</p>\r\n<p>(d). giả mạo th&ocirc;ng tin trong phần đầu thư hoặc sửa đổi c&aacute;c định dạng để che giấu nguồn gốc của bất kỳ Nội Dung n&agrave;o được truyền tải qua Dịch Vụ;</p>\r\n<p>(e). tải l&ecirc;n, đăng, gửi thư điện tử, truyền tải hoặc phương thức kh&aacute;c bất kỳ Nội Dung n&agrave;o m&agrave; bạn kh&ocirc;ng c&oacute; quyền được truyền đi theo quy định của bất kỳ điều luật n&agrave;o hoặc theo bất kỳ mối quan hệ hợp đồng hoặc ủy th&aacute;c n&agrave;o (v&iacute; dụ như th&ocirc;ng tin nội bộ, th&ocirc;ng tin độc quyền v&agrave; bảo mật được biết đến hoặc tiết lộ trong c&aacute;c mối quan hệ lao động hoặc theo c&aacute;c thỏa thuận kh&ocirc;ng tiết lộ);</p>\r\n<p>(f). tải l&ecirc;n, đăng, gửi thư điện tử, truyền tải hoặc phương thức kh&aacute;c bất kỳ Nội Dung n&agrave;o vi phạm c&aacute;c bằng s&aacute;ng chế, thương hiệu, b&iacute; quyết kinh doanh, bản quyền hoặc c&aacute;c quyền sở hữu kh&aacute;c của bất kỳ người n&agrave;o;</p>\r\n<p>(g). tải l&ecirc;n, đăng, gửi thư điện tử, truyền tải hoặc phương thức kh&aacute;c c&aacute;c t&agrave;i liệu quảng c&aacute;o, khuyến mại, "thư linh tinh", "thư r&aacute;c", "thư gửi h&agrave;ng loạt", "kế hoạch kim tự th&aacute;p" kh&ocirc;ng được mong muốn hoặc kh&ocirc;ng được ph&eacute;p, hoặc bất kỳ dạng quảng c&aacute;o n&agrave;o kh&aacute;c, trừ ở những nơi (chẳng hạn như mua sắm) được d&agrave;nh ri&ecirc;ng cho mục đ&iacute;ch đ&oacute; (vui l&ograve;ng đọc <a href="http://docs.yahoo.com/info/guidelines/spam.html">Ch&iacute;nh S&aacute;ch Spam</a> của ch&uacute;ng t&ocirc;i);</p>\r\n<p>(h). tải l&ecirc;n, đăng, gửi thư điện tử, truyền tải hoặc phương thức kh&aacute;c bất kỳ t&agrave;i liệu chứa c&aacute;c vi-r&uacute;t phần mềm hoặc c&aacute;c m&atilde; số m&aacute;y t&iacute;nh kh&aacute;c, c&aacute;c tập tin hoặc c&aacute;c chương tr&igrave;nh được thiết kế để g&acirc;y cản trở, ph&aacute; hỏng hoặc hạn chế c&aacute;c chức năng của phần cứng hoặc phần mềm m&aacute;y t&iacute;nh hoặc thiết bị viễn th&ocirc;ng;</p>\r\n<p>(i). ph&aacute; rối luồng th&ocirc;ng tin li&ecirc;n lạc b&igrave;nh thường, khiến m&agrave;n h&igrave;nh "chạy" nhanh hơn những người sử dụng Dịch Vụ kh&aacute;c c&oacute; thể đ&aacute;nh m&aacute;y, hoặc c&oacute; h&agrave;nh động g&acirc;y ảnh hưởng bất lợi tới khả năng của những người sử dụng kh&aacute;c trong việc trao đổi th&ocirc;ng tin trực tiếp;</p>\r\n<p>(j). g&acirc;y cản trở hoặc ph&aacute; rối Dịch Vụ hoặc việc sử dụng của người kh&aacute;c đối với Dịch Vụ hoặc c&aacute;c m&aacute;y chủ hoặc c&aacute;c mạng li&ecirc;n kết với Dịch Vụ, hoặc kh&ocirc;ng tu&acirc;n theo c&aacute;c y&ecirc;u cầu, thủ tục, ch&iacute;nh s&aacute;ch hoặc quy định của c&aacute;c mạng được kết nối với Dịch Vụ;</p>\r\n<p>(k). cố &yacute; hoặc v&ocirc; &yacute; vi phạm c&aacute;c điều luật, đạo luật, sắc lệnh, quy chế, nội quy hoặc quy tắc, bao gồm, nhưng kh&ocirc;ng giới hạn đối với, c&aacute;c quy định, quy tắc, th&ocirc;ng b&aacute;o, chỉ thị hoặc hướng dẫn của bất kỳ cơ quan chức năng, cơ quan của ch&iacute;nh phủ hoặc trung t&acirc;m giao dịch chứng kho&aacute;n quốc gia hoặc c&aacute;c trung t&acirc;m giao dịch chứng kho&aacute;n kh&aacute;c;</p>\r\n<p>(l). cung cấp c&aacute;c t&agrave;i liệu hỗ trợ hoặc c&aacute;c nguồn (hoặc để che giấu hoặc ngụy tạo về bản chất, vị tr&iacute;, nguồn gốc hoặc chủ sở hữu của c&aacute;c t&agrave;i liệu hỗ trợ hoặc nguồn) đến c&aacute;c tổ chức m&agrave; Ch&iacute;nh phủ Hoa Kỳ x&aacute;c định l&agrave; c&aacute;c tổ chức khủng bố nước ngo&agrave;i căn cứ theo mục 219 Đạo Luật Quốc tịch v&agrave; Di tr&uacute;.</p>\r\n<p>(m) "theo l&eacute;n" hoặc quấy rối người kh&aacute;c;</p>\r\n<p>(n). c&oacute; h&agrave;nh động gian lận hoặc tr&aacute;i ph&eacute;p, cho d&ugrave; c&oacute; li&ecirc;n quan tới một nh&agrave; cung cấp sản phẩm v&agrave; dịch vụ l&agrave; b&ecirc;n thứ ba tr&ecirc;n Dịch Vụ hoặc ở nơi kh&aacute;c v&agrave; / hoặc</p>\r\n<p>(o) thu thập hoặc lưu trữ th&ocirc;ng tin c&aacute; nh&acirc;n về những người sử dụng kh&aacute;c c&oacute; li&ecirc;n quan đến c&aacute;c quy định v&agrave; c&aacute;c hoạt động bị cấm được quy định tại c&aacute;c điều khoản vừa n&oacute;i ở tr&ecirc;n.</p>', 1),
(7, 'Thuế VAT', 'Mức thuế VAT khách hàng phải trả', '1', 1),
(9, 'Copyright-Web', 'Thông tin về website', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style="color: #ebebeb;">SVF &copy; Copyright 2011. <a href="http://www.c%c6%a1mvs.vn/" target="_blank"><span style="color: #ebebeb;">www.cơmvs.vn</span></a>. All rights reserved.</span></p>\r\n<p><span style="color: #f0f0f0;">Sinh vi&ecirc;n thực hiện: Nghi&ecirc;m Huyền Trang</span></p>\r\n<p><span style="color: #f0f0f0;">GVHD : !@#$%</span></p>', 1),
(10, 'Hỗ trợ 1', 'Yahoo ID của người quản trị', 'toi_loi_acon', 1),
(11, 'Hỗ trợ 2', 'Yahoo ID của người quản trị', 'tranngoc_bka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `M_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `M_Content` text NOT NULL,
  PRIMARY KEY (`M_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `T_ID` int(11) NOT NULL AUTO_INCREMENT,
  `T_Name` varchar(50) NOT NULL,
  `M_ID` int(11) NOT NULL,
  PRIMARY KEY (`T_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `U_ID` int(11) NOT NULL AUTO_INCREMENT,
  `U_Username` varchar(30) NOT NULL,
  `U_Name` varchar(20) NOT NULL,
  `U_Password` text NOT NULL,
  `U_Email` text NOT NULL,
  `U_Address` text NOT NULL,
  `U_Address1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `U_Phone` int(13) NOT NULL,
  `U_Flag` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`U_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `U_Username`, `U_Name`, `U_Password`, `U_Email`, `U_Address`, `U_Address1`, `U_Phone`, `U_Flag`) VALUES
(2, 'toi_loi_acon', 'Trần Ngọc Thắng', 'ac91d8e2ed224180ae0570d3cfc7339a', 'toi_loi_acon@yahoo.com', 'B11B- Nam Trung Yên -Hà Nội', 'P305 Ngõ 3- Thôn Đồng Xa - Mai Dịch -Hà Nội', 974324940, 1),
(5, 'tranngoc8x', 'Trần Ngọc Thắng', 'ac91d8e2ed224180ae0570d3cfc7339a', 'toi_loi@yahoo.com', 'B11B- Nam Trung Yên -Hà Nội', 'P305 Ngõ 3- Thôn Đồng Xa - Mai Dịch -Hà Nội', 974324940, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
