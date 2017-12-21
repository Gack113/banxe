/*
Navicat MySQL Data Transfer

Source Server         : hi
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_nhadat

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-21 11:37:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bills
-- ----------------------------
DROP TABLE IF EXISTS `bills`;
CREATE TABLE `bills` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `date_order` date DEFAULT NULL,
  `total` double DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bills_ibfk_1` (`id_customer`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bills
-- ----------------------------

-- ----------------------------
-- Table structure for bill_detail
-- ----------------------------
DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE `bill_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bill_detail_ibfk_2` (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bill_detail
-- ----------------------------
INSERT INTO `bill_detail` VALUES ('26', '21', '1', '2', '3400000000', '2017-11-17 02:27:33', '2017-11-17 02:27:33');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_type` int(11) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_id_type_foreign` (`id_type`),
  CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('12', 'Audi R8', '1', 'There are several ways to paginate items. The simplest is by using the paginate method on the query builder or an Eloquent query. The paginate method automatically takes care of setting the proper limit and offset based on the current page being viewed by the user. By default, the current page is detected by the value of the page query string argument on the HTTP request. Of course, this value is automatically detected by Laravel, and is also automatically inserted into links generated by the paginator.', '2000000000', '0', '1513790651.jpg', '0', 'Sài Gòn', '1', 'audi-r8-12', '2017-12-21 00:24:11', '2017-12-21 00:24:11');
INSERT INTO `products` VALUES ('13', 'Audi R9', '1', 'There are several ways to paginate items. The simplest is by using the paginate method on the query builder or an Eloquent query. The paginate method automatically takes care of setting the proper limit and offset based on the current page being viewed by the user. By default, the current page is detected by the value of the page query string argument on the HTTP request. Of course, this value is automatically detected by Laravel, and is also automatically inserted into links generated by the paginator.', '300000000', '0', '1513791005.jpg', '0', 'Sài gòn', '1', 'audi-r9-13', '2017-12-21 00:30:05', '2017-12-21 00:30:05');
INSERT INTO `products` VALUES ('14', 'Audi R10', '1', 'There are several ways to paginate items. The simplest is by using the paginate method on the query builder or an Eloquent query. The paginate method automatically takes care of setting the proper limit and offset based on the current page being viewed by the user. By default, the current page is detected by the value of the page query string argument on the HTTP request. Of course, this value is automatically detected by Laravel, and is also automatically inserted into links generated by the paginator.', '40000000000', '0', '1513791481.jpg', '0', 'Sài gòn', '1', 'au-r10-14', '2017-12-21 00:38:01', '2017-12-21 00:38:01');

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(11) unsigned NOT NULL,
  `new` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_image_id_product` (`id_product`),
  CONSTRAINT `fk_image_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES ('112', '12', '1', '1513790651_0.jpg', '2017-12-21 00:24:11', '2017-12-21 00:24:11');
INSERT INTO `product_images` VALUES ('113', '12', '1', '1513790651_1.jpg', '2017-12-21 00:24:11', '2017-12-21 00:24:11');
INSERT INTO `product_images` VALUES ('114', '13', '1', '1513791005_0.jpg', '2017-12-21 00:30:05', '2017-12-21 00:30:05');
INSERT INTO `product_images` VALUES ('115', '13', '1', '1513791005_1.jpg', '2017-12-21 00:30:05', '2017-12-21 00:30:05');
INSERT INTO `product_images` VALUES ('116', '13', '1', '1513791005_2.jpg', '2017-12-21 00:30:05', '2017-12-21 00:30:05');
INSERT INTO `product_images` VALUES ('117', '13', '1', '1513791005_3.jpg', '2017-12-21 00:30:05', '2017-12-21 00:30:05');
INSERT INTO `product_images` VALUES ('118', '13', '1', '1513791006_4.jpg', '2017-12-21 00:30:06', '2017-12-21 00:30:06');
INSERT INTO `product_images` VALUES ('119', '14', '1', '1513791482_0.jpg', '2017-12-21 00:38:02', '2017-12-21 00:38:02');
INSERT INTO `product_images` VALUES ('120', '14', '1', '1513791482_1.jpg', '2017-12-21 00:38:02', '2017-12-21 00:38:02');
INSERT INTO `product_images` VALUES ('121', '14', '1', '1513791482_2.jpg', '2017-12-21 00:38:02', '2017-12-21 00:38:02');
INSERT INTO `product_images` VALUES ('122', '14', '1', '1513791482_3.jpg', '2017-12-21 00:38:02', '2017-12-21 00:38:02');

-- ----------------------------
-- Table structure for product_views
-- ----------------------------
DROP TABLE IF EXISTS `product_views`;
CREATE TABLE `product_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) unsigned NOT NULL,
  `visited` int(11) DEFAULT NULL,
  `last_visited` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_product_view` (`id_product`),
  CONSTRAINT `fk_product_view` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_views
-- ----------------------------
INSERT INTO `product_views` VALUES ('10', '12', '3', '2017-12-21 01:33:11', '2017-12-21 01:33:11', '2017-12-21 01:33:11');
INSERT INTO `product_views` VALUES ('11', '13', '0', null, '2017-12-21 00:30:05', '2017-12-21 00:30:05');
INSERT INTO `product_views` VALUES ('12', '14', '1', '2017-12-21 01:07:06', '2017-12-21 01:07:06', '2017-12-21 01:07:06');

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES ('1', '', 'banner1.jpg');
INSERT INTO `slide` VALUES ('2', '', 'banner2.jpg');
INSERT INTO `slide` VALUES ('3', '', 'banner3.jpg');
INSERT INTO `slide` VALUES ('4', '', 'banner4.jpg');
INSERT INTO `slide` VALUES ('5', '', 'banner5.jpg');
INSERT INTO `slide` VALUES ('6', '', 'banner6.jpg');

-- ----------------------------
-- Table structure for type_products
-- ----------------------------
DROP TABLE IF EXISTS `type_products`;
CREATE TABLE `type_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pk_type_products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_products
-- ----------------------------
INSERT INTO `type_products` VALUES ('1', 'Audi', 'Audi', '', '2017-11-16 16:32:00', '2017-11-16 16:32:03');
INSERT INTO `type_products` VALUES ('2', 'Lamborghini', 'Lamborghini', '', '2017-11-16 16:32:07', '2017-11-16 16:32:10');
INSERT INTO `type_products` VALUES ('3', 'Toyato', 'Toyota', '', '2017-11-16 16:32:00', '2017-11-16 16:32:03');
INSERT INTO `type_products` VALUES ('4', 'Lexus', 'Lexus', '', '2017-11-16 16:32:07', '2017-11-16 16:32:10');
INSERT INTO `type_products` VALUES ('5', 'Ferrari', 'Ferrari', '', '2017-11-16 16:32:00', '2017-11-16 16:32:03');
INSERT INTO `type_products` VALUES ('6', 'Porsche', 'Porsche', '', '2017-11-16 16:32:07', '2017-11-16 16:32:10');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Trần Ngọc Quốc', 'admin', 'kugack@gmail.com', '$2y$10$mfv2tl9BPGRxfE5.dUdvGeSucHjokIEZBj3e8UkZ4.8f6OgOqy/J2', 'H5N0woHIx6ymmWcl0hxctx7bzawLXfwCQ0QfZqx3NmsCcIlCxed4EofzgAOl', '2017-11-16 02:02:39', '2017-11-16 02:28:25');
