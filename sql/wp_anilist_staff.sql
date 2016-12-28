CREATE TABLE IF NOT EXISTS `wp_anilist_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `name_first` varchar(50) NOT NULL,
  `name_last` varchar(50) CHARACTER SET utf8 NOT NULL,
  `language` varchar(50) NOT NULL,
  `img_lge` text NOT NULL,
  `role` varchar(25) NOT NULL,
  `series_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `series_id` (`series_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2261 DEFAULT CHARSET=utf8;
