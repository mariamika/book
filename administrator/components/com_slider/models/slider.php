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

class SliderModelSlider extends JModelAdmin {

    public function getTable($type = 'Slider', $prefix = 'SliderTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true) {

        $form = $this->loadForm(
                $this->option . '.slider', 'slider', array('control' => 'jform', 'load_data' => $loadData)
        );

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData() {
        $data = JFactory::getApplication()->getUserState($this->option . '.editslider.data', array());
        if (empty($data)) {
            $data = $this->getItem();
        }
        return $data;
    }

    public function getSlider() {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__huge_itslider_sliders');
        $db->setQuery($query);
        $results = $db->loadObjectList();
        return $results;
    }

    public function getPropertie() {
        $db = JFactory::getDBO();
        $id_cat = intval(JRequest::getVar('id'));
        $query = $db->getQuery(true);
        $query->select('#__huge_itslider_images.name as name,'
                . '#__huge_itslider_images.id ,'
                . '#__huge_itslider_sliders.name as portName,'
                . 'slider_id, #__huge_itslider_images.description as description,image_url,sl_url,sl_type,link_target,#__huge_itslider_images.ordering,#__huge_itslider_images.published,published_in_sl_width');
        $query->from(array('#__huge_itslider_sliders' => '#__huge_itslider_sliders', '#__huge_itslider_images' => '#__huge_itslider_images'));
        $query->where('#__huge_itslider_sliders.id = slider_id')->where('slider_id=' . $id_cat);
        $query->order('ordering desc');
        $db->setQuery($query);
        $results = $db->loadObjectList();
        return $results;
    }

    public function getImageByID() {
        $db = JFactory::getDBO();
        $id_cat = intval(JRequest::getVar('id'));
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__huge_itslider_images');
        $query->where('slider_id=' . $id_cat);
        $db->setQuery($query);
        $results = $db->loadObjectList();
        return $results;
    }

   public function save($data) {
        $db = JFactory::getDBO();       
        $result = $this->getPropertie();
        $this->updarteSlider();
        $this->selectStyle();
        foreach ($result as $key => $value) {
            $imageId = $value->id;
            $id = $data['imageId'. $imageId];
            $titleimage = $db->escape($data['titleimage' . $imageId]);
            $im_description = $db->escape($data['im_description'. $imageId]);
            $sl_url = $db->escape($data['sl_url'. $imageId]);
            $sl_link_target = $db->escape($data['sl_link_target'. $imageId]);
            $ordering = $data['order_by_'. $imageId];
            $image_url = $db->escape($data['image_url'. $imageId]);
                                
            $query = $db->getQuery(true);
            $query->update('#__huge_itslider_images')->set('name="' . $titleimage . '"')->set('description="' . $im_description . '"')
                    ->set('sl_url="' . $sl_url . '"')->set('link_target="' . $sl_link_target . '"')
                    ->set('ordering="' . $ordering . '"')->set('image_url="' . $image_url . '"')->where('id=' . $imageId);
            $db->setQuery($query);
            $db->execute();
            
        }      
        
    }

    function updarteSlider() {
        $db = JFactory::getDBO();
        $data = JRequest::get('post');
        $name = $data['name'];
        $slider_effects_list = $data['slider_effects_list'];
        $sl_width = $data['sl_width'];
        $sl_height = $data['sl_height'];
        $pause_on_hover = $data['pause_on_hover'];
        $sl_pausetime = $data['sl_pausetime'];
        $sl_changespeed = $data['sl_changespeed'];
        $sl_position = $data['sl_position'];
        $id_cat = intval(JRequest::getVar('id'));

        $query = $db->getQuery(true);
        $query->update('#__huge_itslider_sliders')->set('name ="' . $name. '"')
                ->set('sl_height="' . $sl_height . '"')->set('slider_list_effects_s="' . $slider_effects_list . '"')
                ->set('pause_on_hover="' . $pause_on_hover . '"')
                ->set('param="' . $sl_changespeed . '"')
                ->set('sl_position="' . $sl_position . '"')->set('description="' . $sl_pausetime . '"')->set('sl_width="' . $sl_width . '"')->where('id="' . $id_cat . '"');
        $db->setQuery($query);
        $db->execute();
    }



    function selectStyle() {
        $db = JFactory::getDBO();
        $data = JRequest::get('post');
        $styleName = $data['slider_effects_list'];
        $id_cat = intval(JRequest::getVar('id'));
        $query = $db->getQuery(true);
        $query->update('#__huge_itslider_sliders')->set('slider_list_effects_s ="' . $styleName . '"')->where('id="' . $id_cat . '"');
        $db->setQuery($query);
        $db->execute();
    }




    public function saveCat() {
        $db = JFactory::getDBO();

        $query2 = $db->getQuery(true);
        $query2->select('*');
        $query2->from('#__huge_itslider_sliders ');
        $query2->order('id');
        $db->setQuery($query2);
        $results = $db->loadObjectList();
        $last_row =  end($results);
        $last_id = $last_row->id+1;
        

        $query = $db->getQuery(true);
        $query->insert('#__huge_itslider_sliders', 'id')->set('name = "New Slider'.$last_id.'"')
                ->set('sl_height = 375')
                ->set('sl_width = 600')
                ->set('pause_on_hover = "on"')
                ->set('slider_list_effects_s = "cubeH"')
                ->set('description=4000')
                ->set('param = 1000')
                ->set('sl_position = "left"');
        $db->setQuery($query);
        $db->execute();
        return $db->insertid();
    }
    
     private function getNumber($sliderId) {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('max(ordering) as maximum');
        $query->from('#__huge_itslider_images');
        $query->where('slider_id=' . $sliderId);
        $db->setQuery($query);
        $results = $db->loadResult();
        return $results;        
    }

    function saveProject($imageUrl, $sliderId) {
        $imageUrl = $imageUrl;
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $ordering = $this->getNumber($sliderId) + 1;
        $query->insert('#__huge_itslider_images', 'id')->set('slider_id = "' . $sliderId . '"')
                ->set('image_url= "' . $imageUrl . '"')
                ->set('sl_type= "image"')
                ->set('ordering= "'.$ordering.'"');
        $db->setQuery($query);
        $db->execute();
        return $sliderId;
    }

    public function deleteProject() {
        $id_cat = intval(JRequest::getVar('removeslide'));
        $id = intval(JRequest::getVar('id'));
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->delete('#__huge_itslider_images')->where('id =' . $id_cat);
        $db->setQuery($query);
        $db->execute();
        return;
    }
}
