--
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `artist_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `medium_id` int(11) unsigned NOT NULL,
  `name` varchar(250) default NULL,
  `description` text,
  `price` varchar(20) default NULL,
  `status` varchar(100) default NULL,
  `paypal_link` varchar(250) default NULL,
  `photo_file` varchar(250) default NULL,
  `gallery` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(250) NOT NULL,
  `biography` text,
  `phone` varchar(15) default NULL,
  `email` varchar(200) default NULL,
  `photo_file` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Table structure for table `mediums`
--

CREATE TABLE `mediums` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `thumb_path` varchar(250) default NULL,
  `full_size_path` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
