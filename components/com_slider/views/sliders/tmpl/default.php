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
JHtml::_('behavior.tooltip');
JHtml::stylesheet(Juri::root() . 'media/com_slider/style/admin.style.css');

JHtml::stylesheet(Juri::root() . 'media/com_slider/style/portfolios.style.css');
?>

<div class="sidebar">
 <ul id="submenu" class="nav nav-list">
     <li class="active"> 
        <a href="index.php?option=com_slider&amp;view=sliders">Sliders</a>
    </li>
    <li>
        <a href="index.php?option=com_slider&amp;view=general">General Options</a>
    </li>
    <li>
        <a href="index.php?option=com_slider&amp;view=featured">Featured Products</a>
    </li>
</ul>
</div>
<div class="slider-options-head">
    <div style="float: left;">
        <div><a href="http://huge-it.com/joomla-extensions-slider-user-manual/" target="_blank">User Manual</a></div>
        <div>This feature is available in Pro version. To use it <a href="http://huge-it.com/joomla-slider/" target="_blank">get Full version.</a></div>
    </div>
    <div style="float: right;">
        <a style= "position: relative;right: 50px;"class="header-logo-text" href="http://huge-it.com/joomla-slider/" target="_blank">
            <div><img width="250px" src="<?php echo JUri::root() ?>media/com_slider/images/huge-it1.png" /></div>
        </a>
    </div>
</div>
<form action="<?php echo JRoute::_('index.php?option=com_slider'); ?>" method="post" name="adminForm" id="adminForm">
    <table class="wp-list-table widefat fixed pages" style="width:90%;">
        <thead>
        <tr  style="height: 38px;border: 1px solid #cccccc;">
        <th style="text-align: left;"><input style= "margin-left: 11px;" type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
            <span style="margin-top: 27px;position: relative;top: 3px;left: 3px;"><?php echo JText::_('ID'); ?></span></th>
        <th style="text-align: left;"><span><?php echo JText::_('Name'); ?></span><span class="sorting-indicator"></span></th>
        <th style="text-align: left;"><?php echo JText::_('Images'); ?></th>
        </tr>
        </thead>
        <tbody style="border: 1px solid #ccc;">
        <?php echo $this->loadTemplate('body');  ?>
        </tbody>

    </table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
