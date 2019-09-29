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

jimport('joomla.application.component.modelitem');

class SliderModelSlider extends JModelItem
{
	public function getTable($type = 'Slider', $prefix = 'SliderTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getItem($id = null)
	{
		
		$id = (!empty($id)) ? $id : (int) $this->getState('message.id');

		if ($this->_item === null)
		{
			$this->_item = array();
		}

		if (!isset($this->_item[$id]))
		{
			
			$table = $this->getTable();

			
			$table->load($id);

			
			$this->_item[$id] = $table->name;
		}

		return $this->_item[$id];
	}

        protected function populateState()
	{
		$app = JFactory::getApplication();

		
		$id = $app->input->getInt('id', 0);

		
		$this->setState('message.id', $id);

		parent::populateState();
	}
        
        public function getSliders(){
       $db = JFactory::getDBO();
       $id = (!empty($id)) ? $id : (int) $this->getState('message.id');
       $id = $this->setState('message.id', $id);
       $query = $db->getQuery(true);
       $query->SELECT('*');
       $query-> FROM ('#__huge_itslider_sliders');
       $query-> where('id='.$id);
       $query->order('ordering desc',$id);
       $db->setQuery($query);
       $results = $db->loadObjectList();
       return $results;
        }
        
        public function getSliderId(){
        $db = JFactory::getDBO();
        $id = (!empty($id)) ? $id : (int) $this->getState('message.id');
        $id = $this->setState('message.id', $id);
        return $id;
        }


        public function getSliderParams(){
           $db = JFactory::getDBO();
           $id = (!empty($id)) ? $id : (int) $this->getState('message.id');
           $id = $this->setState('message.id', $id);
           $query = $db->getQuery(true);
           $query->select('*,#__huge_itslider_images.name as imgname,#__huge_itslider_sliders.description as pousetimeDescription');
           $query->from('#__huge_itslider_sliders,#__huge_itslider_images');
           $query->where('#__huge_itslider_sliders.id ='.$id)->where('#__huge_itslider_sliders.id = #__huge_itslider_images.slider_id');
           $query ->order('#__huge_itslider_images.ordering desc');
           $db->setQuery($query);
           $results = $db->loadObjectList();
           return $results;
        }
          
          public function  getOptionsParams(){
           $db = JFactory::getDBO();
           $query = $db->getQuery(true);
           $query ->select('*');
           $query -> from('#__huge_itslider_params');
           $db->setQuery($query);
           $results = $db->loadObjectList();
           return $results;
          }
     
}