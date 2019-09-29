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
jimport('joomla.application.component.modellist');

class SliderModelSliders extends JModelList {

    public function getListQuery() {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__huge_itslider_sliders');
        return $query;
    }

    public function getSlider() {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('#__huge_itslider_sliders.name, #__huge_itslider_sliders.id,count(*) as count');
        $query->from(array('#__huge_itslider_sliders' => '#__huge_itslider_sliders', '#__huge_itslider_images' => '#__huge_itslider_images'));
        $query->where('#__huge_itslider_sliders.id = slider_id');
        $query->group('#__huge_itslider_sliders.name');
        $db->setQuery($query);
        $results = $db->loadObjectList();
        return $results;
    }

    public function getOther() {
        $db = JFactory::getDBO();
        $query2 = $db->getQuery(true);
        $query2->select('#__huge_itslider_sliders.name, #__huge_itslider_sliders.id,0 as count');
        $query2->from('#__huge_itslider_sliders');
        $query2->where('#__huge_itslider_sliders.id not in (select slider_id from #__huge_itslider_images)');
        $db->setQuery($query2);

        $results = $db->loadObjectList();
        return $results;
    }

}
