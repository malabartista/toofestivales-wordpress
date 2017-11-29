-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Servidor: db488692435.db.1and1.com
-- Tiempo de generación: 28-11-2017 a las 23:56:07
-- Versión del servidor: 5.5.57-0+deb7u1-log
-- Versión de PHP: 5.4.45-0+deb7u11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db488692435`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_commentmeta`
--

CREATE TABLE IF NOT EXISTS `tf_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `disqus_dupecheck` (`meta_key`,`meta_value`(11)),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_comments`
--

CREATE TABLE IF NOT EXISTS `tf_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_em_bookings`
--

CREATE TABLE IF NOT EXISTS `tf_em_bookings` (
  `booking_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) unsigned DEFAULT NULL,
  `person_id` bigint(20) unsigned NOT NULL,
  `booking_spaces` int(5) NOT NULL,
  `booking_comment` text,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_status` tinyint(1) NOT NULL DEFAULT '1',
  `booking_price` decimal(14,4) unsigned NOT NULL DEFAULT '0.0000',
  `booking_tax_rate` decimal(7,4) DEFAULT NULL,
  `booking_taxes` decimal(14,4) DEFAULT NULL,
  `booking_meta` longtext,
  PRIMARY KEY (`booking_id`),
  KEY `event_id` (`event_id`),
  KEY `person_id` (`person_id`),
  KEY `booking_status` (`booking_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_em_events`
--

CREATE TABLE IF NOT EXISTS `tf_em_events` (
  `event_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `event_slug` varchar(200) DEFAULT NULL,
  `event_owner` bigint(20) unsigned DEFAULT NULL,
  `event_status` int(1) DEFAULT NULL,
  `event_name` text,
  `event_start_time` time DEFAULT NULL,
  `event_end_time` time DEFAULT NULL,
  `event_all_day` int(1) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  `post_content` longtext,
  `event_rsvp` tinyint(1) NOT NULL DEFAULT '0',
  `event_rsvp_date` date DEFAULT NULL,
  `event_rsvp_time` time DEFAULT NULL,
  `event_rsvp_spaces` int(5) DEFAULT NULL,
  `event_spaces` int(5) DEFAULT '0',
  `event_private` tinyint(1) NOT NULL DEFAULT '0',
  `location_id` bigint(20) unsigned DEFAULT NULL,
  `recurrence_id` bigint(20) unsigned DEFAULT NULL,
  `event_category_id` bigint(20) unsigned DEFAULT NULL,
  `event_attributes` text,
  `event_date_created` datetime DEFAULT NULL,
  `event_date_modified` datetime DEFAULT NULL,
  `recurrence` tinyint(1) NOT NULL DEFAULT '0',
  `recurrence_interval` int(4) DEFAULT NULL,
  `recurrence_freq` tinytext,
  `recurrence_byday` tinytext,
  `recurrence_byweekno` int(4) DEFAULT NULL,
  `recurrence_days` int(4) DEFAULT NULL,
  `blog_id` bigint(20) unsigned DEFAULT NULL,
  `group_id` bigint(20) unsigned DEFAULT NULL,
  `recurrence_rsvp_days` int(3) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `event_status` (`event_status`),
  KEY `post_id` (`post_id`),
  KEY `blog_id` (`blog_id`),
  KEY `group_id` (`group_id`),
  KEY `location_id` (`location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=627 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_em_locations`
--

CREATE TABLE IF NOT EXISTS `tf_em_locations` (
  `location_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `blog_id` bigint(20) unsigned DEFAULT NULL,
  `location_slug` varchar(200) DEFAULT NULL,
  `location_name` text,
  `location_owner` bigint(20) unsigned NOT NULL DEFAULT '0',
  `location_address` varchar(200) DEFAULT NULL,
  `location_town` varchar(200) DEFAULT NULL,
  `location_state` varchar(200) DEFAULT NULL,
  `location_postcode` varchar(10) DEFAULT NULL,
  `location_region` varchar(200) DEFAULT NULL,
  `location_country` char(2) DEFAULT NULL,
  `location_latitude` float(10,6) DEFAULT NULL,
  `location_longitude` float(10,6) DEFAULT NULL,
  `post_content` longtext,
  `location_status` int(1) DEFAULT NULL,
  `location_private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`location_id`),
  KEY `location_state` (`location_state`),
  KEY `location_region` (`location_region`),
  KEY `location_country` (`location_country`),
  KEY `post_id` (`post_id`),
  KEY `blog_id` (`blog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=616 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_em_meta`
--

CREATE TABLE IF NOT EXISTS `tf_em_meta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  `meta_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`meta_id`),
  KEY `object_id` (`object_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_em_tickets`
--

CREATE TABLE IF NOT EXISTS `tf_em_tickets` (
  `ticket_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) unsigned NOT NULL,
  `ticket_name` tinytext NOT NULL,
  `ticket_description` text,
  `ticket_price` decimal(14,4) DEFAULT NULL,
  `ticket_start` datetime DEFAULT NULL,
  `ticket_end` datetime DEFAULT NULL,
  `ticket_min` int(10) DEFAULT NULL,
  `ticket_max` int(10) DEFAULT NULL,
  `ticket_spaces` int(11) DEFAULT NULL,
  `ticket_members` int(1) DEFAULT NULL,
  `ticket_members_roles` longtext,
  `ticket_guests` int(1) DEFAULT NULL,
  `ticket_required` int(1) DEFAULT NULL,
  `ticket_meta` longtext,
  PRIMARY KEY (`ticket_id`),
  KEY `event_id` (`event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_em_tickets_bookings`
--

CREATE TABLE IF NOT EXISTS `tf_em_tickets_bookings` (
  `ticket_booking_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) unsigned NOT NULL,
  `ticket_id` bigint(20) unsigned NOT NULL,
  `ticket_booking_spaces` int(6) NOT NULL,
  `ticket_booking_price` decimal(14,4) NOT NULL,
  PRIMARY KEY (`ticket_booking_id`),
  KEY `booking_id` (`booking_id`),
  KEY `ticket_id` (`ticket_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_ewwwio_images`
--

CREATE TABLE IF NOT EXISTS `tf_ewwwio_images` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `path` text NOT NULL,
  `results` varchar(55) NOT NULL,
  `image_size` int(10) unsigned DEFAULT NULL,
  `orig_size` int(10) unsigned DEFAULT NULL,
  `updates` int(5) unsigned DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `trace` blob,
  UNIQUE KEY `id` (`id`),
  KEY `path_image_size` (`path`(255),`image_size`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_data_article`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_data_article` (
  `post_id` int(11) unsigned NOT NULL DEFAULT '0',
  `rules_articles` char(1) DEFAULT 'A',
  `rules_comments` char(1) DEFAULT 'A',
  `moderate_articles` char(1) DEFAULT 'N',
  `moderate_comments` char(1) DEFAULT 'N',
  `recc_rules_articles` char(1) DEFAULT 'A',
  `recc_rules_comments` char(1) DEFAULT 'A',
  `recc_moderate_articles` char(1) DEFAULT 'N',
  `recc_moderate_comments` char(1) DEFAULT 'N',
  `is_page` char(1) DEFAULT '0',
  `user_voters` int(11) DEFAULT '0',
  `user_votes` decimal(11,1) DEFAULT '0.0',
  `visitor_voters` int(11) DEFAULT '0',
  `visitor_votes` decimal(11,1) DEFAULT '0.0',
  `review` decimal(3,1) DEFAULT '-1.0',
  `review_text` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `user_recc_plus` int(11) DEFAULT '0',
  `user_recc_minus` int(11) DEFAULT '0',
  `visitor_recc_plus` int(11) DEFAULT '0',
  `visitor_recc_minus` int(11) DEFAULT '0',
  `expiry_type` char(1) NOT NULL DEFAULT 'N',
  `expiry_value` varchar(32) NOT NULL DEFAULT '',
  `recc_expiry_type` char(1) NOT NULL DEFAULT 'N',
  `recc_expiry_value` varchar(32) NOT NULL DEFAULT '',
  `last_voted` timestamp NULL DEFAULT NULL,
  `last_voted_recc` timestamp NULL DEFAULT NULL,
  `cmm_integration_std` char(1) DEFAULT 'I',
  `cmm_integration_mur` char(1) DEFAULT 'I',
  `cmm_integration_set` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_data_category`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_data_category` (
  `category_id` int(11) unsigned NOT NULL DEFAULT '0',
  `rules_articles` char(1) DEFAULT '0',
  `rules_comments` char(1) DEFAULT '0',
  `moderate_articles` char(1) DEFAULT '0',
  `moderate_comments` char(1) DEFAULT '0',
  `recc_rules_articles` char(1) DEFAULT 'A',
  `recc_rules_comments` char(1) DEFAULT 'A',
  `recc_moderate_articles` char(1) DEFAULT 'N',
  `recc_moderate_comments` char(1) DEFAULT 'N',
  `expiry_type` char(1) NOT NULL DEFAULT 'N',
  `expiry_value` varchar(32) NOT NULL DEFAULT '',
  `recc_expiry_type` char(1) NOT NULL DEFAULT 'N',
  `recc_expiry_value` varchar(32) NOT NULL DEFAULT '',
  `cmm_integration_std` char(1) DEFAULT 'A',
  `cmm_integration_mur` char(1) DEFAULT 'A',
  `cmm_integration_set` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_data_comment`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_data_comment` (
  `comment_id` int(11) unsigned NOT NULL DEFAULT '0',
  `post_id` int(11) DEFAULT '-1',
  `is_locked` char(1) DEFAULT '0',
  `user_voters` int(11) DEFAULT '0',
  `user_votes` decimal(11,1) DEFAULT '0.0',
  `visitor_voters` int(11) DEFAULT '0',
  `visitor_votes` decimal(11,1) DEFAULT '0.0',
  `review` decimal(3,1) DEFAULT '-1.0',
  `review_text` varchar(255) DEFAULT NULL,
  `user_recc_plus` int(11) DEFAULT '0',
  `user_recc_minus` int(11) DEFAULT '0',
  `visitor_recc_plus` int(11) DEFAULT '0',
  `visitor_recc_minus` int(11) DEFAULT '0',
  `last_voted` timestamp NULL DEFAULT NULL,
  `last_voted_recc` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_ips`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_ips` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT 'B',
  `mode` varchar(1) DEFAULT 'S',
  `ip` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_moderate`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_moderate` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `vote_type` varchar(10) DEFAULT 'article',
  `multi_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `vote` int(11) DEFAULT '0',
  `object` text NOT NULL,
  `voted` datetime DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `comment_id` bigint(20) unsigned DEFAULT '0',
  PRIMARY KEY (`record_id`),
  KEY `idx_id_mod` (`id`),
  KEY `idx_vote_mod` (`vote_type`),
  KEY `idx_multi_mod` (`multi_id`),
  KEY `idx_user_mod` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_multis`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_multis` (
  `multi_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `stars` int(11) NOT NULL DEFAULT '10',
  `object` text NOT NULL,
  `weight` text NOT NULL,
  `auto_insert` varchar(4) NOT NULL DEFAULT 'no',
  `auto_location` varchar(8) NOT NULL DEFAULT 'bottom',
  `auto_categories` text NOT NULL,
  `rules` char(1) DEFAULT 'A',
  `moderate` char(1) DEFAULT 'N',
  PRIMARY KEY (`multi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_multis_data`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_multis_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `multi_id` int(11) NOT NULL,
  `average_rating_users` decimal(3,1) NOT NULL DEFAULT '0.0',
  `average_rating_visitors` decimal(3,1) NOT NULL DEFAULT '0.0',
  `total_votes_users` int(11) NOT NULL DEFAULT '0',
  `total_votes_visitors` int(11) NOT NULL DEFAULT '0',
  `average_review` decimal(3,1) NOT NULL DEFAULT '0.0',
  `last_voted` timestamp NULL DEFAULT NULL,
  `rules` char(1) DEFAULT 'A',
  `moderate` char(1) DEFAULT 'N',
  `expiry_type` char(1) NOT NULL DEFAULT 'N',
  `expiry_value` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `idx_post_mdt` (`post_id`),
  KEY `idx_multi_mdt` (`multi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_multis_trend`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_multis_trend` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `multi_id` int(11) NOT NULL,
  `vote_date` varchar(10) DEFAULT NULL,
  `average_rating_users` decimal(3,1) NOT NULL DEFAULT '0.0',
  `average_rating_visitors` decimal(3,1) NOT NULL DEFAULT '0.0',
  `total_votes_users` int(11) NOT NULL DEFAULT '0',
  `total_votes_visitors` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_post_mtt` (`post_id`),
  KEY `idx_multi_mtt` (`multi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_multis_values`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_multis_values` (
  `id` bigint(20) unsigned NOT NULL,
  `source` varchar(3) NOT NULL DEFAULT 'dta',
  `item_id` int(11) NOT NULL,
  `user_voters` int(11) DEFAULT '0',
  `user_votes` decimal(11,1) DEFAULT '0.0',
  `visitor_voters` int(11) DEFAULT '0',
  `visitor_votes` decimal(11,1) DEFAULT '0.0',
  KEY `id` (`id`),
  KEY `item_id` (`item_id`),
  KEY `source` (`source`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_templates`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_templates` (
  `template_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section` varchar(3) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `elements` text NOT NULL,
  `dependencies` text NOT NULL,
  `preinstalled` varchar(1) NOT NULL DEFAULT '0',
  `default` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`template_id`),
  KEY `idx_section_tpl` (`section`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_votes_log`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_votes_log` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `vote_type` varchar(10) DEFAULT 'article',
  `multi_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `vote` int(11) DEFAULT '0',
  `object` text NOT NULL,
  `voted` datetime DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `comment_id` bigint(20) unsigned DEFAULT '0',
  PRIMARY KEY (`record_id`),
  KEY `idx_id_log` (`id`),
  KEY `idx_vote_log` (`vote_type`),
  KEY `idx_multi_log` (`multi_id`),
  KEY `idx_user_log` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=277 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_gdsr_votes_trend`
--

CREATE TABLE IF NOT EXISTS `tf_gdsr_votes_trend` (
  `id` int(11) DEFAULT NULL,
  `vote_type` varchar(10) DEFAULT 'article',
  `user_voters` int(11) DEFAULT '0',
  `user_votes` int(11) DEFAULT '0',
  `visitor_voters` int(11) DEFAULT '0',
  `visitor_votes` int(11) DEFAULT '0',
  `vote_date` varchar(10) DEFAULT NULL,
  KEY `idx_id_trd` (`id`),
  KEY `idx_vote_trd` (`vote_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_ha_user`
--

CREATE TABLE IF NOT EXISTS `tf_ha_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT '',
  `username` varchar(255) DEFAULT '',
  `last_updt_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1680 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_ha_user_event`
--

CREATE TABLE IF NOT EXISTS `tf_ha_user_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_env_id` int(11) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `x_coord` int(11) DEFAULT NULL,
  `y_coord` int(11) DEFAULT NULL,
  `page_width` int(11) DEFAULT NULL,
  `record_date` datetime DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `last_updt_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_event` (`x_coord`,`y_coord`,`event_type`,`page_width`,`url`,`user_env_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2887 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_itsec_lockouts`
--

CREATE TABLE IF NOT EXISTS `tf_itsec_lockouts` (
  `lockout_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lockout_type` varchar(20) NOT NULL,
  `lockout_start` datetime NOT NULL,
  `lockout_start_gmt` datetime NOT NULL,
  `lockout_expire` datetime NOT NULL,
  `lockout_expire_gmt` datetime NOT NULL,
  `lockout_host` varchar(20) DEFAULT NULL,
  `lockout_user` bigint(20) unsigned DEFAULT NULL,
  `lockout_username` varchar(20) DEFAULT NULL,
  `lockout_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`lockout_id`),
  KEY `lockout_expire_gmt` (`lockout_expire_gmt`),
  KEY `lockout_host` (`lockout_host`),
  KEY `lockout_user` (`lockout_user`),
  KEY `lockout_username` (`lockout_username`),
  KEY `lockout_active` (`lockout_active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_itsec_log`
--

CREATE TABLE IF NOT EXISTS `tf_itsec_log` (
  `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_type` varchar(20) NOT NULL DEFAULT '',
  `log_function` varchar(255) NOT NULL DEFAULT '',
  `log_priority` int(2) NOT NULL DEFAULT '1',
  `log_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_host` varchar(20) DEFAULT NULL,
  `log_username` varchar(20) DEFAULT NULL,
  `log_user` bigint(20) unsigned DEFAULT NULL,
  `log_url` varchar(255) DEFAULT NULL,
  `log_referrer` varchar(255) DEFAULT NULL,
  `log_data` longtext NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `log_type` (`log_type`),
  KEY `log_date_gmt` (`log_date_gmt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=208 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_itsec_temp`
--

CREATE TABLE IF NOT EXISTS `tf_itsec_temp` (
  `temp_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `temp_type` varchar(20) NOT NULL,
  `temp_date` datetime NOT NULL,
  `temp_date_gmt` datetime NOT NULL,
  `temp_host` varchar(20) DEFAULT NULL,
  `temp_user` bigint(20) unsigned DEFAULT NULL,
  `temp_username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`temp_id`),
  KEY `temp_date_gmt` (`temp_date_gmt`),
  KEY `temp_host` (`temp_host`),
  KEY `temp_user` (`temp_user`),
  KEY `temp_username` (`temp_username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=233 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_layerslider`
--

CREATE TABLE IF NOT EXISTS `tf_layerslider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `data` mediumtext NOT NULL,
  `date_c` int(10) NOT NULL,
  `date_m` int(11) NOT NULL,
  `flag_hidden` tinyint(1) NOT NULL DEFAULT '0',
  `flag_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_links`
--

CREATE TABLE IF NOT EXISTS `tf_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_ngg_album`
--

CREATE TABLE IF NOT EXISTS `tf_ngg_album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `previewpic` bigint(20) NOT NULL DEFAULT '0',
  `albumdesc` mediumtext,
  `sortorder` longtext NOT NULL,
  `pageid` bigint(20) NOT NULL DEFAULT '0',
  `extras_post_id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `extras_post_id_key` (`extras_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_ngg_gallery`
--

CREATE TABLE IF NOT EXISTS `tf_ngg_gallery` (
  `gid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `path` mediumtext,
  `title` mediumtext,
  `galdesc` mediumtext,
  `pageid` bigint(20) NOT NULL DEFAULT '0',
  `previewpic` bigint(20) NOT NULL DEFAULT '0',
  `author` bigint(20) NOT NULL DEFAULT '0',
  `extras_post_id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`),
  KEY `extras_post_id_key` (`extras_post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=578 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_ngg_pictures`
--

CREATE TABLE IF NOT EXISTS `tf_ngg_pictures` (
  `pid` bigint(20) NOT NULL AUTO_INCREMENT,
  `image_slug` varchar(255) NOT NULL,
  `post_id` bigint(20) NOT NULL DEFAULT '0',
  `galleryid` bigint(20) NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL,
  `description` mediumtext,
  `alttext` mediumtext,
  `imagedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `exclude` tinyint(4) DEFAULT '0',
  `sortorder` bigint(20) NOT NULL DEFAULT '0',
  `meta_data` longtext,
  `extras_post_id` bigint(20) NOT NULL DEFAULT '0',
  `updated_at` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `post_id` (`post_id`),
  KEY `extras_post_id_key` (`extras_post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2170 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_options`
--

CREATE TABLE IF NOT EXISTS `tf_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) DEFAULT NULL,
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1249224 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_postmeta`
--

CREATE TABLE IF NOT EXISTS `tf_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2585619 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_posts`
--

CREATE TABLE IF NOT EXISTS `tf_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_name` (`post_name`(191)),
  FULLTEXT KEY `yarpp_title` (`post_title`),
  FULLTEXT KEY `yarpp_content` (`post_content`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9622 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_smush_dir_images`
--

CREATE TABLE IF NOT EXISTS `tf_smush_dir_images` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `path` text NOT NULL,
  `resize` varchar(55) DEFAULT NULL,
  `error` varchar(55) DEFAULT NULL,
  `image_size` int(10) unsigned DEFAULT NULL,
  `orig_size` int(10) unsigned DEFAULT NULL,
  `file_time` int(10) unsigned DEFAULT NULL,
  `last_scan` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta` text,
  `lossy` varchar(55) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `path` (`path`(191)),
  KEY `image_size` (`image_size`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_termmeta`
--

CREATE TABLE IF NOT EXISTS `tf_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_terms`
--

CREATE TABLE IF NOT EXISTS `tf_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `name` (`name`(191)),
  KEY `slug` (`slug`(191))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=890 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_term_relationships`
--

CREATE TABLE IF NOT EXISTS `tf_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `tf_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=890 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_totalsoft_cal_1`
--

CREATE TABLE IF NOT EXISTS `tf_totalsoft_cal_1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TotalSoftCal_ID` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_Name` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_Type` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_BgCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_GrCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_GW` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_BW` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_BStyle` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_BCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_BSCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_MW` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_HBgCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_HCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_HFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_HFF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_WBgCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_WCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_WFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_WFF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_LAW` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_LAWS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_LAWC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_DBgCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_DCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_DFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_TBgCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_TCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_TFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_TNBgCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_HovBgCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_HovCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_NumPos` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_WDStart` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_RefIcCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_RefIcSize` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_ArrowType` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_ArrowLeft` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_ArrowRight` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_ArrowCol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_ArrowSize` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_totalsoft_cal_2`
--

CREATE TABLE IF NOT EXISTS `tf_totalsoft_cal_2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TotalSoftCal_ID` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_Name` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_Type` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_WDStart` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_BW` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_BS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_BC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_W` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_H` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_BxShShow` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_BxShType` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_BxSh` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_BxShC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_MBgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_MC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_MFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_MFF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_WBgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_WC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_WFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_WFF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_LAW_W` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_LAW_S` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_LAW_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_DBgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_DC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_DFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_TdBgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_TdC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_TdFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_EdBgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_EdC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_EdFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_HBgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_HC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_ArrType` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_ArrFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_ArrC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_OmBgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_OmC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_OmFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_HBgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_HC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_HFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_HFF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_HText` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_BBgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_TC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_TFF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_TFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_DC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_DFF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal2_Ev_DFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_totalsoft_cal_3`
--

CREATE TABLE IF NOT EXISTS `tf_totalsoft_cal_3` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TotalSoftCal_ID` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_Name` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_Type` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_MW` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_WDStart` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_BgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_GrC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_BBC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_BoxShShow` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_BoxShType` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_BoxSh` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_BoxShC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_H_BgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_H_BTW` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_H_BTC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_H_FF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_H_MFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_H_MC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_H_YFS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_H_YC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_H_Format` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Arr_Type` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Arr_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Arr_S` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Arr_HC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_LAH_W` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_LAH_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_WD_BgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_WD_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_WD_FS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_WD_FF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_D_BgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_D_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_TD_BgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_TD_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_HD_BgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_HD_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_ED_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_ED_HC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_Format` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_BTW` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_BTC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_BgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_FS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_FF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_C_Type` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_C_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_C_HC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_C_FS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_LAH_W` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_LAH_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_B_BgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_B_BC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_T_FS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_T_FF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_T_BgC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_T_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_T_TA` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_D_FS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_D_FF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_D_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_I_W` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_I_Pos` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_L_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_L_HC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_L_Pos` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_L_Text` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_LAE_W` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_LAE_C` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_L_FS` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_L_FF` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_L_BW` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_L_BC` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal3_Ev_L_BR` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_totalsoft_cal_events`
--

CREATE TABLE IF NOT EXISTS `tf_totalsoft_cal_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TotalSoftCal_EvName` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvCal` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvStartDate` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvEndDate` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvURL` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvURLNewTab` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvStartTime` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvEndTime` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvColor` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_totalsoft_cal_events_p2`
--

CREATE TABLE IF NOT EXISTS `tf_totalsoft_cal_events_p2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TotalSoftCal_EvDesc` longtext COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvImg` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvVid_Src` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvVid_Iframe` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_EvCal` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_totalsoft_cal_ids`
--

CREATE TABLE IF NOT EXISTS `tf_totalsoft_cal_ids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cal_ID` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_totalsoft_cal_part`
--

CREATE TABLE IF NOT EXISTS `tf_totalsoft_cal_part` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TotalSoftCal_ID` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_Name` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_Type` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_01` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_02` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_03` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_04` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_05` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_06` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_07` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_08` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_09` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_10` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_11` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_12` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_13` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_14` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_15` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_16` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_17` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_18` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_19` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_20` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_21` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_22` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_23` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_24` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_25` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_26` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_27` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_28` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_29` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_30` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_totalsoft_cal_types`
--

CREATE TABLE IF NOT EXISTS `tf_totalsoft_cal_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TotalSoftCal_Name` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `TotalSoftCal_Type` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_totalsoft_fonts`
--

CREATE TABLE IF NOT EXISTS `tf_totalsoft_fonts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Font` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=126 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_uji_counter`
--

CREATE TABLE IF NOT EXISTS `tf_uji_counter` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `title` varchar(128) NOT NULL,
  `style` varchar(8) NOT NULL,
  `options` longtext,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_uji_subscriptions`
--

CREATE TABLE IF NOT EXISTS `tf_uji_subscriptions` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `EmailAddress` varchar(64) NOT NULL,
  `ProviderId` tinyint(3) unsigned DEFAULT '0',
  `List` varchar(128) DEFAULT NULL,
  `ListGroup` varchar(32) DEFAULT NULL,
  `CreatedDate` datetime NOT NULL,
  `IsSynchronized` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_usermeta`
--

CREATE TABLE IF NOT EXISTS `tf_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=299 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_users`
--

CREATE TABLE IF NOT EXISTS `tf_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_wpgmza`
--

CREATE TABLE IF NOT EXISTS `tf_wpgmza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map_id` int(11) NOT NULL,
  `address` varchar(700) NOT NULL,
  `description` mediumtext NOT NULL,
  `pic` varchar(700) NOT NULL,
  `link` varchar(700) NOT NULL,
  `icon` varchar(700) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `anim` varchar(3) NOT NULL,
  `title` varchar(700) NOT NULL,
  `infoopen` varchar(3) NOT NULL,
  `category` varchar(500) NOT NULL,
  `approved` tinyint(1) DEFAULT '1',
  `retina` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0',
  `did` varchar(500) NOT NULL,
  `other_data` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_wpgmza_categories`
--

CREATE TABLE IF NOT EXISTS `tf_wpgmza_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_icon` varchar(700) NOT NULL,
  `retina` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_wpgmza_category_maps`
--

CREATE TABLE IF NOT EXISTS `tf_wpgmza_category_maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `map_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_wpgmza_maps`
--

CREATE TABLE IF NOT EXISTS `tf_wpgmza_maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map_title` varchar(55) NOT NULL,
  `map_width` varchar(6) NOT NULL,
  `map_height` varchar(6) NOT NULL,
  `map_start_lat` varchar(700) NOT NULL,
  `map_start_lng` varchar(700) NOT NULL,
  `map_start_location` varchar(700) NOT NULL,
  `map_start_zoom` int(10) NOT NULL,
  `default_marker` varchar(700) NOT NULL,
  `type` int(10) NOT NULL,
  `alignment` int(10) NOT NULL,
  `directions_enabled` int(10) NOT NULL,
  `styling_enabled` int(10) NOT NULL,
  `styling_json` longtext NOT NULL,
  `active` int(1) NOT NULL,
  `kml` varchar(700) NOT NULL,
  `bicycle` int(10) NOT NULL,
  `traffic` int(10) NOT NULL,
  `dbox` int(10) NOT NULL,
  `dbox_width` varchar(10) NOT NULL,
  `listmarkers` int(10) NOT NULL,
  `listmarkers_advanced` int(10) NOT NULL,
  `filterbycat` tinyint(1) NOT NULL,
  `ugm_enabled` int(10) NOT NULL,
  `fusion` varchar(100) NOT NULL,
  `map_width_type` varchar(3) NOT NULL,
  `map_height_type` varchar(3) NOT NULL,
  `mass_marker_support` int(10) NOT NULL,
  `ugm_access` int(10) NOT NULL,
  `order_markers_by` int(10) NOT NULL,
  `order_markers_choice` int(10) NOT NULL,
  `show_user_location` int(3) NOT NULL,
  `ugm_category_enabled` tinyint(1) NOT NULL,
  `default_to` varchar(700) NOT NULL,
  `other_settings` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_wpgmza_polygon`
--

CREATE TABLE IF NOT EXISTS `tf_wpgmza_polygon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map_id` int(11) NOT NULL,
  `polydata` longtext NOT NULL,
  `linecolor` varchar(7) NOT NULL,
  `fillcolor` varchar(7) NOT NULL,
  `opacity` varchar(3) NOT NULL,
  `lineopacity` varchar(7) NOT NULL,
  `title` varchar(250) NOT NULL,
  `link` varchar(700) NOT NULL,
  `ohfillcolor` varchar(7) NOT NULL,
  `ohlinecolor` varchar(7) NOT NULL,
  `ohopacity` varchar(3) NOT NULL,
  `polyname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_wpgmza_polylines`
--

CREATE TABLE IF NOT EXISTS `tf_wpgmza_polylines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map_id` int(11) NOT NULL,
  `polydata` longtext NOT NULL,
  `linecolor` varchar(7) NOT NULL,
  `linethickness` varchar(3) NOT NULL,
  `opacity` varchar(3) NOT NULL,
  `polyname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_yarpp_related_cache`
--

CREATE TABLE IF NOT EXISTS `tf_yarpp_related_cache` (
  `reference_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `score` float unsigned NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reference_ID`,`ID`),
  KEY `score` (`score`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_yoast_seo_links`
--

CREATE TABLE IF NOT EXISTS `tf_yoast_seo_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `target_post_id` bigint(20) unsigned NOT NULL,
  `type` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_direction` (`post_id`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=757 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tf_yoast_seo_meta`
--

CREATE TABLE IF NOT EXISTS `tf_yoast_seo_meta` (
  `object_id` bigint(20) unsigned NOT NULL,
  `internal_link_count` int(10) unsigned DEFAULT NULL,
  `incoming_link_count` int(10) unsigned DEFAULT NULL,
  UNIQUE KEY `object_id` (`object_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
