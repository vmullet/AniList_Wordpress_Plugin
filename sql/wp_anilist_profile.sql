CREATE TABLE IF NOT EXISTS `wp_anilist_profile` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `anime_time` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `nb_anime_watching` int(11) NOT NULL,
  `nb_anime_plan_watch` int(11) NOT NULL,
  `nb_anime_completed` int(11) NOT NULL,
  `nb_anime_dropped` int(11) NOT NULL,
  `nb_anime_onhold` int(11) NOT NULL,
  `nb_anime_total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
