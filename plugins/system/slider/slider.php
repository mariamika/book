 <?php 
/**
 * @package Huge IT Slider
 * @author Huge-IT
 * @copyright (C) 2014 Huge IT. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website		http://www.huge-it.com/
 **/
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');
jimport('joomla.event.plugin');

class plgSystemSlider extends JPlugin {
    
      function __construct( &$subject ) {
        parent::__construct( $subject );
        $this->_plugin = JPluginHelper::getPlugin( 'system', 'slider' );
        $this->_params = json_decode( $this->_plugin->params );
        JPlugin::loadLanguage('plg_system_slider', JPATH_ADMINISTRATOR);
    }
    function cis_make_slider($m) {
       $id_slider = (int) $m[2];
    	require_once JPATH_SITE.'/components/com_slider/helpers/helper.php';
    	$cis_class = new SlidersHelper;
    	$cis_class->slider_id = $id_slider;
    	$cis_class->type = 'plugin';
    	$cis_class->class_suffix = 'cis_plg';
    	$cis_class->module_id = $this->plg_order;
    	$this->plg_order ++;
    	return  $cis_class->render_html();
    }
    function render_styles_scripts() {
        $document = JFactory::getDocument();
    	$content = JResponse::getBody();
    	$scripts = '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>'."\n";
    	$content = str_replace('</head>', $scripts . '</head>', $content);
    	return $content;
    }
    function onAfterRender() {
      $mainframe = JFactory::getApplication();
      if($mainframe->isAdmin())
        return;

      $plugin = JPluginHelper::getPlugin('system', 'slider');
      $pluginParams = json_decode( $plugin->params );

      $content = JResponse::getBody();
      
      //add scripts
      if(preg_match('/(\[huge_it_slider_id="([0-9]+)"\])/s',$content))
        $content = $this->render_styles_scripts();
      else
      	return;
      $this->plg_order = 100000;
      $c = preg_replace_callback('/(\[huge_it_slider_id="([0-9]+)"\])/s',array($this, 'cis_make_slider'),$content);
      JResponse::setBody($c);
    }
   

}
function huge_it_slider_id($id_cat) {  
     include 'components/com_slider/views/slider/tmpl/shortcode.php';
        shortcode($id_cat);
}
