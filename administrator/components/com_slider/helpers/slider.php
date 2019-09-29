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
abstract class SliderHelper
{
	public static function addSubmenu($submenu)
	{
            	JSubMenuHelper::addEntry(
                JText::_('Sliders'),
                'index.php?option=com_slider&view=sliders',
                $submenu == 'sliders'
		);
                JSubMenuHelper::addEntry(
                JText::_('General Options'),
                'index.php?option=com_slider&view=general',
                $submenu == 'general'
		);
                JSubMenuHelper::addEntry(
			JText::_('Featured Products'),
			'index.php?option=com_slider&view=featured',
			$submenu == 'featured'
		);

	}
}
