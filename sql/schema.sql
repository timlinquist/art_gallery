
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) default NULL,
  `description` text default NULL,
  `phone` varchar(15) default NULL,
  `fax` varchar(15) default NULL,
  `email` varchar(200) default NULL,
  `street_address_1` varchar(200) default NULL,
  `street_address_2` varchar(200) default NULL,
  `city` varchar(200) default NULL,
  `state` varchar(2) default NULL,
  `zip_code` varchar(15) default NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `gallery_photos`;
CREATE TABLE IF NOT EXISTS `gallery_photos` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `art_photos`;
CREATE TABLE IF NOT EXISTS `art_photos` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(250) default NULL,
  `biography` text default NULL,
  `phone` varchar(15) default NULL,
  `email` varchar(200) default NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thumb_path` varchar(250) default NULL,
  `full_size_path` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
);

DROP TABLE IF EXISTS `art_types`;
CREATE TABLE IF NOT EXISTS `art_types` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(200) default 'default',
  PRIMARY KEY (id)
);