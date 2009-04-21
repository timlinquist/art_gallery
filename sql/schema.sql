
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) default NULL,
  `description` text default NULL,
  `phone` varchar(15) default NULL,
  `fax` varchar(15) default NULL,
  `street_address_1` varchar(200) default NULL,
  `street_address_2` varchar(200) default NULL,
  `city` varchar(200) default NULL,
  `state` varchar(2) default NULL,
  `zip_code` varchar(15) default NULL,
  `google_map_url` varchar(250) default NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `art`;
CREATE TABLE IF NOT EXISTS `art` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `medium_id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) UNSIGNED default NULL,
  `name` varchar(250) default NULL,
  `description` text default NULL,
  `price` varchar(20) default NULL,
  `status` varchar(100) default NULL,
  `paypal_link` varchar(250) default NULL,
  `photo_name` varchar(250) default NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `biography` text default NULL,
  `phone` varchar(15) default NULL,
  `email` varchar(200) default NULL,
  `photo_file` varchar(250) default NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS `mediums`;
CREATE TABLE IF NOT EXISTS `mediums` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS `mailing_list`;
CREATE TABLE IF NOT EXISTS `mailing_list` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) UNSIGNED default NULL,
  `medium_id` int(11) UNSIGNED default NULL,
  `category_id` int(11) UNSIGNED default NULL,
  `everything` tinyint(1) default 0,
	`name` varchar(200) default NULL,
  `email` varchar(200) default NULL,
  PRIMARY KEY (id)
);

