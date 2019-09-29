<?php 
/**
 * @package Huge IT Slider
 * @author Huge-IT
 * @copyright (C) 2014 Huge IT. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website		http://www.huge-it.com/
 **/
?>
<?php defined('_JEXEC') or die('Restricted access'); 

JError::$legacy = false;
JLoader::register('SliderHelper', dirname(__FILE__) . '/helpers/slider.php');
$document = JFactory::getDocument();
jimport('joomla.application.component.controller');
?>
<?php
$controller = JControllerLegacy::getInstance('Slider');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
