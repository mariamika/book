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

jimport('joomla.database.table');

class SliderTableSlider extends JTable
{
   
    function __construct(&$db) 
    {
        parent::__construct('#__huge_itslider_sliders', 'id', $db);
    }
}