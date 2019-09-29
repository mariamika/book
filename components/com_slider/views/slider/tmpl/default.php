<?php 
/**
 * @package Huge IT Slider
 * @author Huge-IT
 * @copyright (C) 2014 Huge IT. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website		http://www.huge-it.com/
 **/

defined('_JEXEC') or die('Restircted access');

require_once JPATH_SITE.'/components/com_slider/helpers/helper.php';

$id_15 = intval(JRequest::getVar('slider',   $this -> slder_id , '', 'int'));
$cis_class = new SlidersHelper;
$cis_class->slider_id = $id_15;
$cis_class->type = 'component';
$cis_class->class_suffix = '';
$cis_class->module_id =  $this -> slder_id ;
echo $cis_class->render_html();
