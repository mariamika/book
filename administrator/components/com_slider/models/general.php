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
jimport('joomla.application.component.modeladmin');
jimport('joomla.application.component.helper');

class SliderModelGeneral extends JModelAdmin {
    public function getTable($type = 'General', $prefix = 'SliderTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }
    public function getForm($data = array(), $loadData = true) {
        
        $form = $this->loadForm(
                $this->option . '.general', 'general', array('control' => 'jform', 'load_data' => $loadData)
        );

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    
    protected function loadFormData() {
        $data = JFactory::getApplication()->getUserState($this->option . '.editgeneral.data', array());

        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }
    function getOptions(){
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__huge_itslider_params');
    $db->setQuery($query);
    $results = $db->loadObjectList();
    return $results;
    }
    function save($data) {
        $data = JRequest::get('post');
        $db = JFactory::getDbo();
        echo $data['params[slider_title_font_size]'];

    }
            
    function  apply1(){
      
    }
 }
 
