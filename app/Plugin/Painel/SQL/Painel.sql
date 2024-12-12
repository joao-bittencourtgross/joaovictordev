DROP TABLE IF EXISTS `pnn_activations`;
CREATE TABLE `pnn_activations` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `pnn_downloads`;
CREATE TABLE `pnn_downloads` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `reference_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(900) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `order` int(10) DEFAULT '999999999',
  `expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `pnn_galleries`;
CREATE TABLE `pnn_galleries` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `reference_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `legend` varchar(900) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(900) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gallery` varchar(900) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images',
  `order` int(10) DEFAULT '999999999',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `pnn_users`;
CREATE TABLE `pnn_users` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(900) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(900) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(900) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(900) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` varchar(900) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(900) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `pnn_videos`;
CREATE TABLE `pnn_videos` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `reference_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(900) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) DEFAULT '999999999',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;