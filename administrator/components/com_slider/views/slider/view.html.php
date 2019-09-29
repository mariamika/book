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

jimport('joomla.application.component.view');

class SliderViewSlider extends JViewLegacy
{
	
	protected $item;
        protected $sliderParams;
	protected $form;
        protected $prop;
        protected $all;

	public function display($tpl = null)
	{
		try
		{     
                     
			$this->form = $this->get('Form');
			$this->item = $this->get('Item');
                        $this->sliderParams = $this->get('Slider');
                        $this->prop= $this->get('Propertie');
                        JHtml::stylesheet(Juri::root() . 'media/com_slider/style/portfolios.style.css');
			$this->addToolBar();
   			parent::display($tpl);
		}
		catch (Exception $e)
		{
			throw new Exception($e->getMessage());
		}
	}

	protected function addToolBar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title(JText::_('COM_SLIDER_MANAGER_SLIDER'), JText::_('COM_SLIDER_MANAGER_SLIDER'));		
		JToolBarHelper::apply('slider.save');
		JToolBarHelper::cancel('slider.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
              
	}
}
