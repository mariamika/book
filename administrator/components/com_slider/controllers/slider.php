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

jimport('joomla.application.component.controllerform');

class SliderControllerSlider extends JControllerForm
{
   public function save ($key = null, $urlVar = null) {
        $model = $this->getModel();
        global $option;
        $id_cat = intval(JRequest::getVar('id'));
        $table = $model->getTable();
        $post = JRequest::get('post');      
        $model->save($post);
        $this->setredirect('index.php?option=com_slider&view=slider&id='.$id_cat,JText::_('COM_SLIDER_SAVE'));
}
function addProject() {
     $model = $this->getModel();    
     $id = $model->saveProject(JRequest::getVar('sel'),intval(JRequest::getVar('parentId') ));
     $this->setredirect('index.php?option=com_slider&view=slider&layout=edit&id='. $id);
    
}
function deleteProject(){
     $model = $this->getModel();    
     $id = $model->deleteProject();
     $projectId = intval(JRequest::getVar('id'));
     echo $projectId;
  $this->setredirect('index.php?option=com_slider&view=slider&layout=edit&id='.$projectId);
 }
 function  video(){
     $model = $this->getModel(); 
     $model -> video();
 }
}