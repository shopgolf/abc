DROP TABLE IF EXISTS `px_post`;
CREATE TABLE IF NOT EXISTS `px_post` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `type` int(1) NOT NULL,
  `seo_url` varchar(100) NOT NULL,
  `seo_keyword` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `owner` int(3) NOT NULL,
  `created` datetime NOT NULL,
  `lastupdated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
