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

class SliderViewSliders extends JViewLegacy
{
	
	protected $items;
	protected $pagination;
        protected $slider;
        protected $other;
       

	public function display($tpl = null)
	{
		try
		{
			
			$this->items = $this->get('Items');
                        $this ->slider = $this->get('Slider');
                        $this->other=$this->get('Other');
			$this->pagination = $this->get('Pagination');
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

		JToolBarHelper::title(JText::_('COM_SLIDER_MANAGER_SLIDERS'),  JText::_('COM_SLIDER_MANAGER_SLIDERS'));
             	JToolBarHelper::addNew('sliders.add');
                JToolBarHelper::divider();
		JToolBarHelper::editList('slider.edit');
		JToolBarHelper::divider();
		JToolBarHelper::deleteList('', 'sliders.delete');
	}
}
