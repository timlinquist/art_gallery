-- phpMyAdmin SQL Dump
-- version 2.11.9.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2009 at 07:38 PM
-- Server version: 5.0.77
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `entree_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE IF NOT EXISTS `art` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `artist_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `medium_id` int(11) unsigned NOT NULL,
  `name` varchar(250) default NULL,
  `description` text,
  `price` varchar(20) default NULL,
  `inventory_number` varchar(100) default NULL,
  `sold` tinyint(1) default '0',
  `status` varchar(100) default NULL,
  `paypal_link` varchar(250) default NULL,
  `photo_file` varchar(250) default NULL,
  `gallery` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`id`, `artist_id`, `category_id`, `medium_id`, `name`, `description`, `price`, `inventory_number`, `sold`, `status`, `paypal_link`, `photo_file`, `gallery`) VALUES
(1, 1, 1, 1, 'Burgandy Grapevine 11', '16\\"x 12\\"        \noil', '$400', '2max09', 0, '', '', '1245100447_2.jpg', 'Reeder Bay Gallery'),
(2, 1, 1, 1, 'Burgandy Grapevine I', '16\\"x12\\"        \noil                           \n\n1max09', '$400', NULL, 0, '', '', '1245100256_1.jpg', 'Reeder Bay Gallery'),
(3, 1, 1, 1, 'Birthday Bouquet', '20\\"x16\\"\noil                \n\n3max09', '$525', '3max09', 0, '', '', '1245100599_3.jpg', 'Reeder Bay Gallery'),
(8, 2, 1, 1, 'Ripples- River Otter', '9.75\\" x 16\\"\n$1650\n1bes09', '', NULL, 0, '', '', '1245111886_Ripples - River Otter.jpg', 'Reeder Bay Gallery'),
(7, 1, 1, 1, 'Toby', '20\\"x16\\"      \n oil                \n$725\n4max09', '', NULL, 0, '', '', '1245101948_4.jpg', 'Reeder Bay Gallery'),
(9, 2, 1, 1, 'Giraffe & Company', '27\\" x 13.25\\"\n\n2bes09', '$3900', NULL, 0, '', '', '1245112425_Giraffe & Company by Linda Besse.jpg', 'Reeder Bay Gallery'),
(10, 2, 1, 1, 'Penguin Party', '8\\" x 13.75\\"\n\n3bes09', '$1250', NULL, 0, '', '', '1245112757_Penguin Party.jpg', 'Reeder Bay Gallery'),
(11, 2, 1, 1, 'Grizzly Encounter', '8.5\\" x 12\\"\n\n4bes09', '$1100', NULL, 0, '', '', '1245113313_Grizzly Encounter by Linda Besse.jpg', 'Reeder Bay Gallery'),
(12, 2, 1, 4, 'Test Watercolor', 'this is just a test art piece so we can test delete', '$4500', 'test001', 0, '', '', '1245281328_watercolor_test.jpg', 'Coolin Bay Gallery');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(250) NOT NULL,
  `biography` text,
  `phone` varchar(15) default NULL,
  `email` varchar(200) default NULL,
  `photo_file` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `biography`, `phone`, `email`, `photo_file`) VALUES
(1, 'Mary Maxam', 'A native of Idaho, Mary Maxam finds inspiration for her paintings in the beautiful scenery and gardens of the Northwest. She is a graduate of Boise State University and has studied in many professional workshops, teaching art for many years herself. Most recently, she attended classes in Scottsdale working with the specific issues of plein air painting.  Mary works in watercolor, acrylic and oil for her landscape and still life works. Her paintings are a response to familiar subjects, seen daily and discoveries that take place through the painting process.\n\nMy subject might be wildflowers, a garden, or a fly fisherman, but in looking closer, you\\''ll see that the subjects I paint are really light and color. Something draws my eye, and initially, my work is abstract driven. I search for the visual spark that I\\''ll convey in the work. Then I look at the formal aspects of painting, composition, etc. And, finally, I move in closer, developing subject personality. To answer a question posed by some of my collectors, yes, I really do see those colors. Then, I \\"push\\" the color a bit further in the painting, to express a bit more about how the place felt as well as what I saw. When I look particularly at water, there are so many things going on. You see blue, but then in knowing about the adjacent colors to blue (violets and greens) I use that color harmony to say something more, and make a more personal statement. I try to bring to the viewer a little more of a feeling rather than a strict listing of the elements that were in the scene. Another method I like to employ is the use of a transparent color under painting that flickers through the more subdued top layers of paint. Hopefully, it all helps to further that interesting dialogue between painter and viewer.', '(208) 665-0837', 'tmaxam@verizon.net', '1243979765_MaryMaxim.jpg'),
(2, 'Linda Besse', 'Like most wildlife artists, Linda was enchanted with animals at an early age. However, vivid childhood memories of her great uncle and his African hunting stories gave her an immediate sense of the adventure one experiences when exploring wild animals and places. Linda was drawn to the outdoors through her geology bachelor\\''s degree from Colgate University, followed with a Master of Science degree which enabled her to get into the back country of Alaska, Nevada, Wyoming, Utah, and Montana.	 	\nShe is a self-taught artist and from field sketches, small field paintings, and her photographs, Linda creates a composition designed to reflect the inherent artistry of nature. Painting exclusively in oil because she likes its luminosity, depth, and intensity of color, Linda uses a mostly wet-on-wet technique to capture the immediacy of the image. She lives in the country surrounded by deer, wild turkey, grouse, quail, coyote, and the occasional moose and mountain lion.	 	\nAfter visiting over 20 countries, she finally got to Africa in 1997, and again in 1999 for an extended 5 Ã‚Â½ week trip (including a 70 km canoe trip on the Zambezi river.) In May 2001, Linda added to her list of countries Iceland, where she revisited her love of geology as well as explored arctic bird life.\nLinda visited her 27th country, New Zealand in 2005, then Kenya and Tanzania in 2007. In November and December 2008, Linda added her 7th continent, Antarctica.', '(509) 238-9129', 'linda@besseart.com', '1245110429_linda copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'paintings'),
(2, 'sculpture'),
(3, 'bronze'),
(4, 'jewelry'),
(5, 'furniture'),
(6, 'books'),
(7, 'ceramics'),
(8, 'calligraphy'),
(9, 'mirrors'),
(10, 'etchings'),
(11, 'enamels'),
(12, 'glass'),
(13, 'prints'),
(14, 'woodworking'),
(15, 'yard & garden'),
(16, 'stone'),
(17, 'gifts'),
(18, 'baskets'),
(19, 'Priest Lake'),
(20, 'structures'),
(21, 'lighting'),
(22, 'fiber artwork');

-- --------------------------------------------------------

--
-- Table structure for table `epc_calendar`
--

CREATE TABLE IF NOT EXISTS `epc_calendar` (
  `id` int(7) NOT NULL auto_increment,
  `startDate` int(11) NOT NULL default '0',
  `endDate` int(11) NOT NULL default '0',
  `startTime` time NOT NULL default '00:00:00',
  `endTime` time NOT NULL default '00:00:00',
  `eventType` text NOT NULL,
  `repeatx` int(7) NOT NULL default '0',
  `title` text NOT NULL,
  `descr` text NOT NULL,
  `days` int(7) NOT NULL default '0',
  `stop` int(7) NOT NULL default '0',
  `month` tinyint(2) NOT NULL default '0',
  `weekDay` tinyint(1) NOT NULL default '0',
  `weekNumber` tinyint(1) NOT NULL default '0',
  `category` text NOT NULL,
  `eventKey` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `epc_calendar`
--

INSERT INTO `epc_calendar` (`id`, `startDate`, `endDate`, `startTime`, `endTime`, `eventType`, `repeatx`, `title`, `descr`, `days`, `stop`, `month`, `weekDay`, `weekNumber`, `category`, `eventKey`) VALUES
(6, 2454984, 2454984, '00:00:00', '00:00:00', 'Once', 0, 'NEW Website Launch ', 'Please be patient as we begin to add events and information to the new website that was designed and developed by www.SimonsenStudios.com and www.Dentone.net ', 1, 0, 0, 0, 0, '0[4X', ''),
(7, 2454974, 2455013, '00:00:00', '00:00:00', 'Once', 0, '&quot;Nature’s Pallet&quot; oils and acrylics by Mary Maxam ', '&quot;Nature’s Pallet&quot; oils and acrylics by Mary Maxam ', 40, 0, 0, 0, 0, '0[12X3[8X', ''),
(8, 2454976, 2454976, '14:00:00', '16:00:00', 'Once', 0, 'Artist Reception for Mary Maxam ', 'Artist Reception for Mary Maxam ', 1, 0, 0, 0, 0, '0[11X', ''),
(9, 2455014, 2455044, '00:00:00', '00:00:00', 'Once', 0, '&quot;Oil and Water&quot; a mixed media showing by Janene Grende ', '&quot;Oil and Water&quot; a mixed media showing by Janene Grende ', 31, 0, 0, 0, 0, '0[12X3[8X', ''),
(10, 2455024, 2455024, '12:01:00', '15:00:00', 'Once', 0, 'Artist Reception for Janene Grende ', 'Artist Reception for Janene Grende\r\nSaturday, July 11 from 12-3 pm\r\nWith Music and debut CD signing by Mike Wagoner ', 1, 0, 0, 0, 0, '0[11X', ''),
(11, 2455038, 2455038, '12:01:00', '15:00:00', 'Once', 0, 'Artist Demonstration by Janene Grende ', 'Artist Demonstration by Janene Grende \r\nSaturday, July 25 from 12-3 pm ', 1, 0, 0, 0, 0, '0[11X', ''),
(12, 2455045, 2455105, '00:00:00', '00:00:00', 'Once', 0, '&quot;Expressions in Color&quot; oils by Terry Lee ', '&quot;Expressions in Color&quot; oils by Terry Lee ', 61, 0, 0, 0, 0, '0[12X3[8X', ''),
(13, 2455045, 2455045, '17:00:00', '19:00:00', 'Once', 0, 'Wine Tasting Reception ', 'Wine Tasting Reception for Terry Lee\r\nSaturday, August 1 from 5-7 pm ', 1, 0, 0, 0, 0, '0[11X', ''),
(14, 2455045, 2455045, '12:01:00', '15:00:00', 'Once', 0, 'Music by Mike Wagoner ', 'Music by Mike Wagoner, 12-3 pm ', 1, 0, 0, 0, 0, '0[11X', ''),
(15, 2455080, 2455080, '13:00:00', '16:00:00', 'Once', 0, 'Demonstration by Terry Lee ', 'Demonstration by Terry Lee\r\nSaturday, September 5   1-4 pm ', 1, 0, 0, 0, 0, '0[11X', ''),
(16, 2454953, 2454983, '00:00:00', '00:00:00', 'Once', 0, '&quot;Color&quot; a mixed media showing by Regional Artists ', '&quot;Color&quot; a mixed media showing by Regional Artists ', 31, 0, 0, 0, 0, '0[12X3[10X', ''),
(17, 2454962, 2454962, '10:00:00', '16:00:00', 'Once', 0, 'Mother’s Day Open House ', 'Mother’s Day Open House \r\nSunday, May 10   10am-4pm ', 1, 0, 0, 0, 0, '0[4X', ''),
(18, 2454953, 2455051, '00:00:00', '00:00:00', 'Once', 0, '&quot;The Finishing Touch&quot; mixed media furnishings ', '&quot;The Finishing Touch&quot; mixed media furnishings ', 99, 0, 0, 0, 0, '0[12X3[10X', ''),
(19, 2454996, 2455094, '00:00:00', '00:00:00', 'Once', 0, '&quot;Green&quot; a yard and garden showing by Regional Artists ', '&quot;Green&quot; a yard and garden showing by Regional Artists ', 99, 0, 0, 0, 0, '0[12X3[10X', ''),
(20, 2455014, 2455044, '00:00:00', '00:00:00', 'Once', 0, '&quot;Fin, Fur and Feathers&quot; oils by Linda Besse ', '&quot;Fin, Fur and Feathers&quot; oils by Linda Besse ', 31, 0, 0, 0, 0, '0[12X3[10X', ''),
(21, 2455018, 2455018, '13:00:00', '15:00:00', 'Once', 0, 'Artist Reception for Linda Besse ', 'Artist Reception for Linda Besse\r\nSunday, July 5 from 1-3 pm ', 1, 0, 0, 0, 0, '0[4X', ''),
(22, 2455045, 2455075, '00:00:00', '00:00:00', 'Once', 0, '&quot;My Space&quot; a mixed media showing by Regional Artists ', '&quot;My Space&quot; a mixed media showing by Regional Artists ', 31, 0, 0, 0, 0, '0[12X3[10X', ''),
(23, 2455076, 2455105, '00:00:00', '00:00:00', 'Once', 0, '&quot;The Ross Hall Collection&quot; by Dann Hall ', '&quot;The Ross Hall Collection&quot; by Dann Hall ', 30, 0, 0, 0, 0, '0[12X3[10X', ''),
(24, 2455087, 2455087, '17:00:00', '19:00:00', 'Once', 0, 'Wine Tasting Reception ', 'Wine Tasting Reception\r\nSaturday, September 12 from 5-7 pm\r\nMusic by Mike Wagoner ', 1, 0, 0, 0, 0, '0[4X', ''),
(25, 2455010, 2455011, '11:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'Metal Artwork by Eric Langeliers ', 2, 0, 0, 0, 0, '0[11X', ''),
(27, 2455056, 2455056, '11:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'Watercolors by Loretta West ', 1, 0, 0, 0, 0, '0[11X', ''),
(28, 2455030, 2455030, '11:00:00', '15:00:00', 'Once', 0, 'Artist on the Grounds ', 'Jewelry by Beth Viren\r\nWoodturning demo by Paul Viren ', 1, 0, 0, 0, 0, '0[11X', ''),
(29, 2455051, 2455051, '11:00:00', '15:00:00', 'Once', 0, 'Artist on the Grounds ', 'Jewelry by Beth Viren\r\nWoodturning demo by Paul Viren ', 1, 0, 0, 0, 0, '0[4X', ''),
(30, 2455041, 2455042, '11:00:00', '17:00:00', 'Once', 0, 'Wildlife Artist Showing ', 'A collection of wildlife painters and carvers featuring Federal Duck Stamp artist ', 2, 0, 0, 0, 0, '0[4X', ''),
(31, 2455045, 2455046, '11:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'Oils on canvas by Steve Aller ', 2, 0, 0, 0, 0, '0[4X', ''),
(32, 2455046, 2455046, '11:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'Jewelry demo by Erin Earle ', 1, 0, 0, 0, 0, '0[4X', ''),
(33, 2455052, 2455053, '11:00:00', '17:00:00', 'Once', 0, 'Artist on the Grounds ', 'Jewelry by John Blessent ', 2, 0, 0, 0, 0, '0[4X', ''),
(34, 2455052, 2455053, '11:00:00', '17:00:00', 'Once', 0, 'Artist on the Grounds ', 'Metal artwork by Paul Kuhlman ', 2, 0, 0, 0, 0, '0[4X', ''),
(35, 2455025, 2455025, '11:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'Hand-painted accessories by Valerie Samuel ', 1, 0, 0, 0, 0, '0[4X', ''),
(36, 2455024, 2455025, '11:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'A mixed-media showing by Daris Judd ', 2, 0, 0, 0, 0, '0[4X', ''),
(38, 2455047, 2455047, '11:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'Watercolors by Loretta West ', 1, 0, 0, 0, 0, '0[11X', ''),
(39, 2455052, 2455053, '11:00:00', '17:00:00', 'Once', 0, 'Artist on the Grounds ', 'Painting demo by Clancie Pleasants ', 2, 0, 0, 0, 0, '0[11X', ''),
(40, 2455037, 2455038, '11:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'Paintings by Barbara Field ', 2, 0, 0, 0, 0, '0[4X', ''),
(41, 2455025, 2455025, '11:00:00', '15:00:00', 'Once', 0, 'Artist on the Grounds ', 'Book signing by Boots Reynolds ', 1, 0, 0, 0, 0, '0[4X', ''),
(42, 2455031, 2455032, '11:00:00', '17:00:00', 'Once', 0, 'Artist on the Grounds ', 'Lampwork glass demo by Ken Frybarger ', 2, 0, 0, 0, 0, '0[11X', ''),
(43, 2455039, 2455039, '00:01:00', '15:00:00', 'Once', 0, 'Artist on the Grounds ', 'Painting demo by Janene Grende ', 1, 0, 0, 0, 0, '0[4X', ''),
(44, 2455031, 2455032, '11:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'Native American painting demo by George Flett ', 2, 0, 0, 0, 0, '0[4X', ''),
(47, 2455080, 2455080, '01:00:00', '16:00:00', 'Once', 0, 'Artist on the Grounds ', 'Demo in oils by Terry Lee ', 1, 0, 0, 0, 0, '0[11X', '');

-- --------------------------------------------------------

--
-- Table structure for table `mediums`
--

CREATE TABLE IF NOT EXISTS `mediums` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mediums`
--

INSERT INTO `mediums` (`id`, `name`, `category_id`) VALUES
(1, 'oil', 0),
(2, 'acrylic', 0),
(3, 'mixed-media', 0),
(4, 'watercolor', 0),
(5, 'metal', 0),
(6, 'bronze', 0),
(7, 'wood', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `thumb_path` varchar(250) default NULL,
  `full_size_path` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `photos`
--

