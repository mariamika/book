DROP TABLE IF EXISTS `#__huge_itslider_sliders`;

CREATE TABLE `#__huge_itslider_sliders` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sl_height` int(11) unsigned DEFAULT NULL,
  `sl_width` int(11) unsigned DEFAULT NULL,
  `pause_on_hover` text,
  `slider_list_effects_s` text,
  `description` text,
  `param` text,
  `sl_position` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `#__huge_itslider_images`;

CREATE TABLE IF NOT EXISTS `#__huge_itslider_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `slider_id` varchar(200) DEFAULT NULL,
  `description` text,
  `image_url` text,
  `sl_url` varchar(128) DEFAULT NULL,
  `sl_type` text NOT NULL,
  `link_target` text NOT NULL,
  `sl_stitle` text NOT NULL,
  `sl_sdesc` text NOT NULL,
  `sl_postlink` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(4) unsigned DEFAULT NULL,
  `published_in_sl_width` tinyint(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



DROP TABLE  IF EXISTS `#__huge_itslider_params`;

CREATE TABLE `#__huge_itslider_params`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `value` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200;


INSERT INTO `#__huge_itslider_params` ( `name`, `title`, `description`, `value`) VALUES
('slider_crop_image', 'Slider crop image', 'Slider crop image', 'resize'),
('slider_title_color', 'Slider title color', 'Slider title color', '000000'),
('slider_title_font_size', 'Slider title font size', 'Slider title font size', '13'),
('slider_description_color', 'Slider description color', 'Slider description color', 'ffffff'),
('slider_description_font_size', 'Slider description font size', 'Slider description font size', '13'),
('slider_title_position', 'Slider title position', 'Slider title position', 'right-top'),
('slider_description_position', 'Slider description position', 'Slider description position', 'right-bottom'),
('slider_title_border_size', 'Slider Title border size', 'Slider Title border size', '0'),
('slider_title_border_color', 'Slider title border color', 'Slider title border color', 'ffffff'),
('slider_title_border_radius', 'Slider title border radius', 'Slider title border radius', '4'),
('slider_description_border_size', 'Slider description border size', 'Slider description border size', '0'),
('slider_description_border_color', 'Slider description border color', 'Slider description border color', 'ffffff'),
('slider_description_border_radius', 'Slider description border radius', 'Slider description border radius', '0'),
('slider_slideshow_border_size', 'Slider border size', 'Slider border size', '0'),
('slider_slideshow_border_color', 'Slider border color', 'Slider border color', 'ffffff'),
('slider_slideshow_border_radius', 'Slider border radius', 'Slider border radius', '0'),
('slider_navigation_type', 'Slider navigation type', 'Slider navigation type', '1'),
('slider_navigation_position', 'Slider navigation position', 'Slider navigation position', 'bottom'),
('slider_title_background_color', 'Slider title background color', 'Slider title background color', 'ffffff'),
('slider_description_background_color', 'Slider description background color', 'Slider description background color', '000000'),
('slider_title_transparent', 'Slider title has background', 'Slider title has background', 'on'),
('slider_description_transparent', 'Slider description has background', 'Slider description has background', 'on'),
('slider_slider_background_color', 'Slider slider background color', 'Slider slider background color', 'ffffff'),
('slider_dots_position', 'slider dots position', 'slider dots position', 'top'),
('slider_active_dot_color', 'slider active dot color', '', 'ffffff'),
('slider_dots_color', 'slider dots color', '', '000000'),
('slider_description_width', 'Slider description width', 'Slider description width', '70'),
('slider_description_height', 'Slider description height', 'Slider description height', '50'),
('slider_description_background_transparency', 'slider description background transparency', 'slider description background transparency', '70'),
('slider_description_text_align', 'description text-align', 'description text-align', 'justify'),
('slider_title_width', 'slider title width', 'slider title width', '30'),
('slider_title_height', 'slider title height', 'slider title height', '50'),
('slider_title_background_transparency', 'slider title background transparency', 'slider title background transparency', '70'),
('slider_title_text_align', 'title text-align', 'title text-align', 'right'),
('slider_title_has_margin', 'title has margin', 'title has margin', 'on'),
('slider_description_has_margin', 'description has margin', 'description has margin', 'on'),
('slider_show_arrows', 'Slider show left right arrows', 'Slider show left right arrows', 'on');


INSERT INTO `#__huge_itslider_images` (`name`, `slider_id`, `description`, `image_url`, `sl_url`, `sl_type`, `link_target`, `sl_stitle`, `sl_sdesc`, `sl_postlink`, `ordering`, `published`, `published_in_sl_width`) VALUES
( '', '1', '', 'media/com_slider/images/slide1.jpg', 'http://huge-it.com', 'image', 'on', '', '', '', 1, 1, NULL),
('Simple Usage', '1', '', 'media/com_slider/images/slide2.jpg', 'http://huge-it.com', 'image', 'on', '', '', '', 2, 1, NULL),
('Huge-IT Slider', '1', 'The slider allows having unlimited amount of images with their titles and descriptions. The slider uses autogenerated shortcodes making it easier for the users to add it to the custom location.', 'media/com_slider/images/slide3.jpg', 'http://huge-it.com', 'image', 'on', '', '', '', 3, 1, NULL);


INSERT INTO `#__huge_itslider_sliders` (`name`, `sl_height`, `sl_width`, `pause_on_hover`, `slider_list_effects_s`, `description`, `param`, `sl_position`, `ordering`, `published`) VALUES
('My First Slider', 375, 600, 'on', 'random', '4000', '1000', 'center', 1, '300');


