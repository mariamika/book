<?php
/**
 * @package Huge IT Slider
 * @author Huge-IT
 * @copyright (C) 2014 Huge IT. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website		http://www.huge-it.com/
 * */
?>
<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::stylesheet(Juri::root() . 'media/com_slider/style/admin.style.css');
$doc = JFactory::getDocument();
$doc->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js");
$doc->addScript("http://code.jquery.com/ui/1.10.4/jquery-ui.js");
$doc->addScript(JURI::root(true) . "/media/com_slider/js/admin.js");
$doc->addScript(JURI::root(true) . "/media/com_slider/js/simple-slider.js");
$doc->addScript(JURI::root(true) . "/media/com_slider/elements/jscolor/jscolor.js");
JHtml::stylesheet('media/com_slider/style/simple-slider.css');
JHtml::stylesheet('media/com_slider/style/admin.style.css');
?>
<script type="text/javascript">
    Joomla.submitbutton = function (task)
    {
        if (task == 'general.apply1') {
            alert("General Settings are disabled in free version. If you need those functionalityes, you need to buy the commercial version.");
        }
        else if (task == 'general.save')
        {
            Joomla.submitform('apply1', document.getElementById('application-form'));
            alert("General Settings are disabled in free version. If you need those functionalityes, you need to buy the commercial version.");
        } else if (task == 'general.cancel') {
            Joomla.submitform('apply1', document.getElementById('application-form'));
        }
    }
</script>

<div class="slider-options-head" style="height: 53px">
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
<?php
foreach ($this->optionsPropertie as $optionsPropertie) {
    $key = $optionsPropertie->name;
    $value = $optionsPropertie->value;
    $param_values[$key] = $value;
}
?>
<?php $path_site = JURI::root() . 'media/com_slider/images/Front_images' ?>
<div id="slider-options-list">
    <div class="wrap">
        <div id="poststuff">
            <div style="width: 9%;position: relative;float: left;margin-left:5px;">
                <ul id="submenu" class="nav nav-list">
                    <li>
                        <a href="index.php?option=com_slider&amp;view=sliders">Sliders</a>
                    </li>
                    <li class="active">
                        <a href="index.php?option=com_slider&amp;view=general">General Options</a>
                    </li>
                    <li>
                        <a href="index.php?option=com_slider&amp;view=featured">Featured Products</a>
                    </li>
                </ul>
            </div>
            <div id="post-body-content" class="slider-options" style="margin: 0 0 0 27px;width: 85%;float: left;">
           
                <form action="<?php echo JRoute::_('index.php?option=com_slider'); ?>" id="application-form" method="post" name="adminForm" class="form-validate">
                    <div class="options-block" id="options-block-title" >
                        <div class="has-background">
                            <label for="title-container-width">Title Width 
                                <div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Select the width for the title</div>
                                </div>
                            </label>
                            <div class="slider-container">
                                <input name="params[slider_title_width]" id="title-container-width" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" value="<?php echo $param_values['slider_title_width']; ?>" />
                                <span><?php echo $param_values['slider_title_width']; ?>%</span>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <!--<div>
                                <label for="params[slider_title_height]">Title height</label>
                                <div class="slider-container">
                                        <input name="params[slider_title_height]" id="title-container-height" data-slider-range="1,100" type="text" data-slider="true"  data-slider-highlight="true" value="<?php echo $param_values['slider_title_height']; ?>" />
                                        <span><?php echo $param_values['slider_title_height']; ?>%</span>
                                </div>
                        </div>-->
                        <div>
                            <label for="slider_title_has_margin">Title Has Margin
                                <div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                        <div class="pnt"></div>
                                    <div class="showme">Choose the margin level for title</div>
                                </div>
                            </label>	
                            <input type="hidden" value="off" name="params[slider_title_has_margin]" />					
                            <input type="checkbox" id="slider_title_has_margin"  <?php if ($param_values['slider_title_has_margin'] == 'on') {
    echo 'checked="checked"';
} ?>  name="params[slider_title_has_margin]"  value="on" />
                        </div>
                        <div class="has-background">
                            <label for="slider_title_font_size">Title Font Size<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Specify the font size for the image title</div>
                                </div>
                            </label>
                            <input type="number" name="params[slider_title_font_size]" id="slider_title_font_size" value="<?php echo $param_values['slider_title_font_size']; ?>" class="text" />
                            <span>px</span>
                        </div>
                        <div>
                            <label for="slider_title_color">Title Text Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the color for the title</div>
                                </div>
                            </label>
                            <input name="params[slider_title_color]" type="text" class="color" id="slider_title_color" value="#<?php echo $param_values['slider_title_color']; ?>" size="10" />
                        </div>
                        <div  class="has-background">
                            <label for="slider_title_text_align">Title Text Align<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Choose where to place the title</div>
                                </div>
                            </label>
                            <select id="slider_title_text_align" name="params[slider_title_text_align]">
                                <option <?php if ($param_values['slider_title_text_align'] == 'justify') {
    echo 'justify';
} ?> value="justify">Full width</option>
                                <option <?php if ($param_values['slider_title_text_align'] == 'center') {
    echo 'selected';
} ?> value="center">Center</option>
                                <option <?php if ($param_values['slider_title_text_align'] == 'left') {
    echo 'selected';
} ?> value="left">Left</option>
                                <option <?php if ($param_values['slider_title_text_align'] == 'right') {
    echo 'selected';
} ?> value="right">Right</option>
                            </select>
                        </div>
                        <div>
                            <label for="title-background-transparency">Title Background Transparency<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the level of transparency for the title</div>
                                </div>
                            </label>
                            <div class="slider-container">
                                <input name="params[slider_title_background_transparency]" id="title-background-transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['slider_title_background_transparency']; ?>" />
                                <span><?php echo $param_values['slider_title_background_transparency']; ?>%</span>
                            </div>
                        </div>
                        <div class="has-background">
                            <label for="slider_title_background_color">Title Background Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Choose the color for the cell containing the title</div>
                                </div>
                            </label>
                            <input name="params[slider_title_background_color]" type="text" class="color" id="slider_title_background_color" value="#<?php echo $param_values['slider_title_background_color']; ?>" size="10" />
                        </div>
                        <div>
                            <label for="slider_title_border_size">Title Border Size<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the border size for the title</div>
                                </div></label>
                            <input type="number" name="params[slider_title_border_size]" id="slider_title_border_size" value="<?php echo $param_values['slider_title_border_size']; ?>" class="text" />
                            <span>px</span>
                        </div>
                        <div class="has-background">
                            <label for="slider_title_border_color">Title Border Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Select the border color for the title</div>
                                </div></label>
                            <input name="params[slider_title_border_color]" type="text" class="color" id="slider_title_border_color" value="#<?php echo $param_values['slider_title_border_color']; ?>" size="10">
                        </div>
                        <div>
                            <label for="slider_title_border_radius">Title Border Radius<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the border radius for the title</div>
                                </div></label>
                            <input type="number" name="params[slider_title_border_radius]" id="slider_title_border_radius" value="<?php echo $param_values['slider_title_border_radius']; ?>" class="text" />
                            <span>px</span>
                        </div>
                        <div class="has-height has-background">
                            <label for="">Title Position<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Define the position of the title using the view graph</div>
                                </div></label>
                            <div>
                                <table class="bws_position_table">
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" value="left-top" id="slideshow_title_top-left" name="params[slider_title_position]" <?php if ($param_values['slider_title_position'] == 'left-top') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="center-top" id="slideshow_title_top-center" name="params[slider_title_position]" <?php if ($param_values['slider_title_position'] == 'center-top') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="right-top" id="slideshow_title_top-right" name="params[slider_title_position]"  <?php if ($param_values['slider_title_position'] == 'right-top') {
    echo 'checked="checked"';
} ?> /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" value="left-middle" id="slideshow_title_middle-left" name="params[slider_title_position]" <?php if ($param_values['slider_title_position'] == 'left-middle') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="center-middle" id="slideshow_title_middle-center" name="params[slider_title_position]" <?php if ($param_values['slider_title_position'] == 'center-middle') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="right-middle" id="slideshow_title_middle-right" name="params[slider_title_position]" <?php if ($param_values['slider_title_position'] == 'right-middle') {
    echo 'checked="checked"';
} ?> /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" value="left-bottom" id="slideshow_title_bottom-left" name="params[slider_title_position]" <?php if ($param_values['slider_title_position'] == 'left-bottom') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="center-bottom" id="slideshow_title_bottom-center" name="params[slider_title_position]" <?php if ($param_values['slider_title_position'] == 'center-bottom') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="right-bottom" id="slideshow_title_bottom-right" name="params[slider_title_position]" <?php if ($param_values['slider_title_position'] == 'right-bottom') {
    echo 'checked="checked"';
} ?> /></td>
                                        </tr>
                                    </tbody>	
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="options-block" id="options-block-description">
                        <div class="has-background">
                            <label for="description-container-width">Description Width<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the width for the description text</div>
                                </div></label>
                            <div class="slider-container">
                                <input name="params[slider_description_width]" id="description-container-width" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" value="<?php echo $param_values['slider_description_width']; ?>" />
                                <span><?php echo $param_values['slider_description_width']; ?>%</span>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <!--<div>
                                <label for="params[slider_description_height]">description height</label>
                                <div class="slider-container">
                                        <input name="params[slider_description_height]" id="description-container-height" data-slider-range="1,100" type="text" data-slider="true"  data-slider-highlight="true" value="<?php echo $param_values['slider_description_height']; ?>" />
                                        <span><?php echo $param_values['slider_description_height']; ?>%</span>
                                </div>
                        </div>-->
                        <div>
                            <label for="slider_description_has_margin">Description Has Margin<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Choose the margin for description text</div>
                                </div></label>
                            <input type="hidden" value="off" name="params[slider_description_has_margin]" />
                            <input type="checkbox" id="slider_description_has_margin"  <?php if ($param_values['slider_description_has_margin'] == 'on') {
    echo 'checked="checked"';
} ?>  name="params[slider_description_has_margin]" value="on" />
                        </div>
                        <div class="has-background">
                            <label for="slider_description_font_size">Description Font Size<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Specify the font size for the image description</div>
                                </div></label>
                            <input type="number" name="params[slider_description_font_size]" id="slider_description_font_size" value="<?php echo $param_values['slider_description_font_size']; ?>" class="text" />
                            <span>px</span>
                        </div>
                        <div>
                            <label for="slider_description_color">Description Text Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the color for the image description</div>
                                </div></label>
                            <input name="params[slider_description_color]" type="text" class="color" id="slider_description_color" value="#<?php echo $param_values['slider_description_color']; ?>" size="10" />
                        </div>
                        <div  class="has-background">
                            <label for="slider_description_text_align">Description Text Align<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">choose where to place the description text</div>
                                </div></label>
                            <select id="slider_description_text_align" name="params[slider_description_text_align]">	
                                <option <?php if ($param_values['slider_description_text_align'] == 'justify') {
    echo 'justify';
} ?> value="justify">Full width</option>
                                <option <?php if ($param_values['slider_description_text_align'] == 'center') {
    echo 'center';
} ?> value="center">Center</option>
                                <option <?php if ($param_values['slider_description_text_align'] == 'left') {
    echo 'left';
} ?> value="left">Left</option>
                                <option <?php if ($param_values['slider_description_text_align'] == 'right') {
    echo 'right';
} ?> value="right">Right</option>
                            </select>
                        </div>
                        <div>
                            <label for="description-background-transparency">Description Background Transparency<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the level of description background transparency</div>
                                </div></label>
                            <div class="slider-container">
                                <input name="params[slider_description_background_transparency]" id="description-background-transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['slider_description_background_transparency']; ?>" />
                                <span><?php echo $param_values['slider_description_background_transparency']; ?>%</span>
                            </div>
                        </div>
                        <div class="has-background">
                            <label for="slider_description_background_color">Description Background Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Choose the color for description's background</div>
                                </div></label>
                            <input name="params[slider_description_background_color]" type="text" class="color" id="slider_description_background_color" value="#<?php echo $param_values['slider_description_background_color']; ?>" size="10">
                        </div>
                        <div>
                            <label for="slider_description_border_size">Description Border Size<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Specify the border for the image description</div>
                                </div></label>
                            <input type="number" name="params[slider_description_border_size]" id="slider_description_border_size" value="<?php echo $param_values['slider_description_border_size']; ?>" class="text" />
                            <span>px</span>
                        </div>
                        <div class="has-background">
                            <label for="slider_description_border_color">Description Border Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Select the border color for the image description</div>
                                </div></label>
                            <input name="params[slider_description_border_color]" type="text" class="color" id="slider_description_border_color" value="#<?php echo $param_values['slider_description_border_color']; ?>" size="10">
                        </div>
                        <div>
                            <label for="slider_description_border_radius">Description Border Radius<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the border radius for the image description cell</div>
                                </div></label>
                            <input type="number" name="params[slider_description_border_radius]" id="slider_description_border_radius" value="<?php echo $param_values['slider_description_border_radius']; ?>" class="text" />
                            <span>px</span>
                        </div>
                        <div class="has-height has-background">
                            <label for="params[slider_description_position]">Description Position<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Select the positioning of the description. Please make sure it does not coincide with the title position avoiding overloading</div>
                                </div>
                            </label>
                            <div>
                                <table class="bws_position_table">
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" value="left-top" id="slideshow_description_top-left" name="params[slider_description_position]" <?php if ($param_values['slider_description_position'] == 'left-top') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="center-top" id="slideshow_description_top-center" name="params[slider_description_position]" <?php if ($param_values['slider_description_position'] == 'center-top') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="right-top" id="slideshow_description_top-right" name="params[slider_description_position]"  <?php if ($param_values['slider_description_position'] == 'right-top') {
    echo 'checked="checked"';
} ?> /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" value="left-middle" id="slideshow_description_middle-left" name="params[slider_description_position]" <?php if ($param_values['slider_description_position'] == 'left-middle') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="center-middle" id="slideshow_description_middle-center" name="params[slider_description_position]" <?php if ($param_values['slider_description_position'] == 'center-middle') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="right-middle" id="slideshow_description_middle-right" name="params[slider_description_position]" <?php if ($param_values['slider_description_position'] == 'right-middle') {
    echo 'checked="checked"';
} ?> /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" value="left-bottom" id="slideshow_description_bottom-left" name="params[slider_description_position]" <?php if ($param_values['slider_description_position'] == 'left-bottom') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="center-bottom" id="slideshow_description_bottom-center" name="params[slider_description_position]" <?php if ($param_values['slider_description_position'] == 'center-bottom') {
    echo 'checked="checked"';
} ?> /></td>
                                            <td><input type="radio" value="right-bottom" id="slideshow_description_bottom-right" name="params[slider_description_position]" <?php if ($param_values['slider_description_position'] == 'right-bottom') {
    echo 'checked="checked"';
} ?> /></td>
                                        </tr>
                                    </tbody>	
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="options-block" id="options-block-slider">
                        <div>
                            <label for="slider_crop_image">Image Behaviour<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Choose how to behave the image in slider</div>
                                </div>
                            </label>
                            <select id="slider_crop_image" name="params[slider_crop_image]">
                                <option <?php if ($param_values['slider_crop_image'] == 'crop') {
    echo 'selected';
} ?> value="crop">Natural</option>
                                <option <?php if ($param_values['slider_crop_image'] == 'resize') {
    echo 'selected';
} ?> value="resize">Resize</option>
                            </select>
                        </div>
                        <div class="has-background">
                            <label for="slider_slider_background_color">Slider Background Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the color for background of the slider</div>
                                </div>
                            </label>
                            <input name="params[slider_slider_background_color]" type="text" class="color" id="slider_slider_background_color" value="#<?php echo $param_values['slider_slider_background_color']; ?>" size="10">
                        </div>

                        <div>
                            <label for="slider_slideshow_border_size">Slideshow Border Size<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the border for the slideshow</div>
                                </div>
                            </label>
                            <input type="number" name="params[slider_slideshow_border_size]" id="slider_slideshow_border_size" value="<?php echo $param_values['slider_slideshow_border_size']; ?>" class="text" />
                        </div>
                        <div class="has-background">
                            <label for="slider_slideshow_border_color">Slideshow Border Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Select the border color for the slideshow</div>
                                </div>
                            </label>
                            <input name="params[slider_slideshow_border_color]" type="text" class="color" id="slider_slideshow_border_color" value="#<?php echo $param_values['slider_slideshow_border_color']; ?>" size="10">
                        </div>
                        <div>
                            <label for="slider_slideshow_border_radius">Slideshow Border radius<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the border radius for the slideshow</div>
                                </div>
                            </label>
                            <input type="number" name="params[slider_slideshow_border_radius]" id="slider_slideshow_border_radius" value="<?php echo $param_values['slider_slideshow_border_radius']; ?>" class="text" />
                        </div>
                    </div>
                    <div class="options-block" id="options-block-navigation">
                        <div>
                            <label for="slider_show_arrows">Show Navigation Arrows <div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Choose whether to show navigation arrows</div>
                                </div>
                            </label>
                            <input type="hidden" value="off" name="params[slider_show_arrows]" />		
                            <input type="checkbox" id="slider_show_arrows" <?php if ($param_values['slider_show_arrows'] == 'on') {
    echo 'checked="checked"';
} ?> name="params[slider_show_arrows]" value="on" />
                        </div>
                        <div class="has-background">
                            <label for="slider_dots_position">Navigation Dots Position / Hide Dots<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Set the position for the navigation arrows</div>
                                </div>
                            </label>
                            <select id="slider_dots_position" name="params[slider_dots_position]">
                                <option <?php if ($param_values['slider_dots_position'] == 'none') {
    echo 'selected';
} ?> value="none">Dont Show</option>
                                <option <?php if ($param_values['slider_dots_position'] == 'top') {
    echo 'selected';
} ?> value="top">Top</option>
                                <option <?php if ($param_values['slider_dots_position'] == 'bottom') {
    echo 'selected';
} ?> value="bottom">Bottom</option>
                            </select>
                        </div>
                        <div>
                            <label for="slider_dots_color">Navigation Dots Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Select the dot color for the navigation</div>
                                </div>
                            </label>
                            <input type="text" class="color" name="params[slider_dots_color]" id="slider_dots_color" value="<?php echo $param_values['slider_dots_color']; ?>" class="text" />
                        </div>
                        <div class="has-background">
                            <label for="slider_active_dot_color">Navigation Active Dot Color<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Specify the color for the dot for the currently displayed image</div>
                                </div>
                            </label>
                            <input type="text" class="color" name="params[slider_active_dot_color]" id="slider_active_dot_color" value="<?php echo $param_values['slider_active_dot_color']; ?>" class="text" />
                        </div>
                        <div class="has-height" style="padding-top:20px;">
                            <label for="">Navigation Type<div class="help">
                                    <div style="position: relative;top: 3px;">?</div>
                                    <div class="pnt"></div>
                                    <div class="showme">Select the type of the navigation arrows to be used for the website</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="has-height">
                        <div>
                            <ul id="arrows-type">
                                <li <?php if ($param_values['slider_navigation_type'] == 1) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.simple.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="1" <?php if ($param_values['slider_navigation_type'] == 1) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 2) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.circle.shadow.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="2" <?php if ($param_values['slider_navigation_type'] == 2) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 3) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.circle.simple.dark.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="3" <?php if ($param_values['slider_navigation_type'] == 3) {
    echo 'checked="checked"';
} ?>>
                                </li>

                                <li <?php if ($param_values['slider_navigation_type'] == 4) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.cube.dark.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="4" <?php if ($param_values['slider_navigation_type'] == 4) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 5) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.light.blue.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="5" <?php if ($param_values['slider_navigation_type'] == 5) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 6) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.light.cube.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="6" <?php if ($param_values['slider_navigation_type'] == 6) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 7) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.light.transparent.circle.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="7" <?php if ($param_values['slider_navigation_type'] == 7) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 8) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="8" <?php if ($param_values['slider_navigation_type'] == 8) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 9) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.circle.blue.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="9" <?php if ($param_values['slider_navigation_type'] == 9) {
    echo 'checked="checked"';
} ?>>
                                </li>	
                                <li <?php if ($param_values['slider_navigation_type'] == 10) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.circle.green.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="10" <?php if ($param_values['slider_navigation_type'] == 10) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 11) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.blue.retro.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="11" <?php if ($param_values['slider_navigation_type'] == 11) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 12) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.green.retro.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="12" <?php if ($param_values['slider_navigation_type'] == 12) {
    echo 'checked="checked"';
} ?>>
                                </li>	
                                <li <?php if ($param_values['slider_navigation_type'] == 13) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.red.circle.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="13" <?php if ($param_values['slider_navigation_type'] == 13) {
    echo 'checked="checked"';
} ?>>
                                </li>	
                                <li class="color" <?php if ($param_values['slider_navigation_type'] == 14) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.triangle.white.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="14" <?php if ($param_values['slider_navigation_type'] == 14) {
    echo 'checked="checked"';
} ?>>
                                </li>	
                                <li <?php if ($param_values['slider_navigation_type'] == 15) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.ancient.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="15" <?php if ($param_values['slider_navigation_type'] == 15) {
    echo 'checked="checked"';
} ?>>
                                </li>
                                <li <?php if ($param_values['slider_navigation_type'] == 16) {
    echo 'class="active"';
} ?>>
                                    <div class="image-block">
                                        <img src="<?php echo $path_site; ?>/arrows/arrows.black.out.png" alt="" />
                                    </div>
                                    <input type="radio" name="params[slider_navigation_type]" value="16" <?php if ($param_values['slider_navigation_type'] == 16) {
    echo 'checked="checked"';
} ?>>
                                </li>							
                            </ul>
                        </div>
                         
                    </div>
                    <div>
                        <input type="hidden" name="task" value="" />
<?php echo JHtml::_('form.token'); ?>
                    </div>
                </form>
            </div>
           
            
        </div>
    </div>
    
  
</div>