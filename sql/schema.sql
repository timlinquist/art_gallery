-- phpMyAdmin SQL Dump
-- version 2.11.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2009 at 08:46 AM
-- Server version: 5.0.41
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(250) default NULL,
  `description` text,
  `phone` varchar(15) default NULL,
  `fax` varchar(15) default NULL,
  `street_address_1` varchar(200) default NULL,
  `street_address_2` varchar(200) default NULL,
  `city` varchar(200) default NULL,
  `state` varchar(2) default NULL,
  `zip_code` varchar(15) default NULL,
  `google_map_url` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mailing_list`
--

CREATE TABLE `mailing_list` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `artist_id` int(11) unsigned default NULL,
  `medium_id` int(11) unsigned default NULL,
  `category_id` int(11) unsigned default NULL,
  `everything` tinyint(1) default '0',
  `name` varchar(200) default NULL,
  `email` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mediums`
--

CREATE TABLE `mediums` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `thumb_path` varchar(250) default NULL,
  `full_size_path` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
