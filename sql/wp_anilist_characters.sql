CREATE TABLE IF NOT EXISTS `wp_anilist_characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `character_id` int(11) NOT NULL,
  `name_first` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name_last` varchar(50) DEFAULT NULL,
  `img_lge` text NOT NULL,
  `role` varchar(25) NOT NULL,
  `series_id` int(11) NOT NULL,
  `actor_name_first` varchar(50) DEFAULT NULL,
  `actor_name_last` varchar(50) DEFAULT NULL,
  `actor_img_lge` text,
  `actor_language` varchar(50) DEFAULT NULL,
  `actor_role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `series_id` (`series_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3316 DEFAULT CHARSET=utf8;
