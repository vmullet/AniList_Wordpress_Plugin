CREATE TABLE IF NOT EXISTS `wp_anilist_animelist` (
  `record_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `list_status` varchar(25) NOT NULL,
  `score` int(11) NOT NULL,
  `episodes_watched` int(11) NOT NULL,
  `rewatched` int(11) NOT NULL,
  `added_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `anime_title_romaji` text NOT NULL,
  `anime_title_english` text NOT NULL,
  `anime_title_japanese` text NOT NULL,
  `description` text NOT NULL,
  `anime_type` varchar(25) NOT NULL,
  `season` varchar(5) DEFAULT NULL,
  `start_date_airing` date NOT NULL,
  `end_date_airing` date DEFAULT NULL,
  `genres` text NOT NULL,
  `studio_name` text NOT NULL,
  `average_score` int(11) NOT NULL,
  `img_lge` text NOT NULL,
  `img_banner` text,
  `total_episodes` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `airing_status` varchar(50) NOT NULL,
  `popularity` int(11) NOT NULL,
  `adult` tinyint(4) NOT NULL,
  PRIMARY KEY (`record_id`),
  UNIQUE KEY `series_id` (`series_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

