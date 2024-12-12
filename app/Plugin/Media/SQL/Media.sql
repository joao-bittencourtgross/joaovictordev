DROP TABLE IF EXISTS `tb_media_images`;
CREATE TABLE `tb_media_images` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
