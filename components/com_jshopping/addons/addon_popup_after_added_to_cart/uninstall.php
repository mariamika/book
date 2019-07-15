<?php
	defined('_JEXEC') or die('Restricted access');
	$db = JFactory::getDbo();
	
	$db->setQuery("DELETE FROM `#__extensions` WHERE element = 'addon_popup_after_added_to_cart' AND folder = 'jshopping' AND `type` = 'plugin'");
	$db->query();
	
	jimport('joomla.filesystem.folder');
	foreach(array(
		'plugins/jshopping/addon_popup_after_added_to_cart/',
		'components/com_jshopping/lang/addon_popup_after_added_to_cart',
		'components/com_jshopping/addons/addon_popup_after_added_to_cart/'
	) as $folder){JFolder::delete(JPATH_ROOT.'/'.$folder);}
?>