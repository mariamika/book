<?php
/**
 * @package Huge IT portfolio
 * @author Huge-IT
 * @copyright (C) 2014 Huge IT. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website		http://www.huge-it.com/
 **/

defined('_JEXEC') or die('Restricted access');
jimport('joomla.html.html');
jimport('joomla.filesystem.folder');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');

class JFormFieldJSColor extends JFormField {

    protected $type = 'jscolor';

    public function getInput() {
        $doc = JFactory::getDocument();
        $doc->addScript(JURI::root(true) . "/media/mod_lightbox/js/admin.js");
        $doc->addScript(JURI::root(true) . "/media/mod_lightbox/js/jscolor/jscolor.js");
        $doc->addScript(JURI::root(true) . "/media/mod_lightbox/js/simple-slider.js");

        JHtml::stylesheet('media/mod_lightbox/css/simple-slider.css');
        JHtml::stylesheet('media/mod_lightbox/css/admin.style.css');

        $name = $this->element['name'];
        $type_ = $this->element['type_'];
        $id = $this->element['id'];
        $this->element['class'] = trim($this->element['class']);
        $for = $this->element['for'] ? ' for="' . (string) $this->element['for'] . '"' : '';
        $class = $this->element['class'] ? ' class="' . (string) $this->element['class'] . '"' : '';
        $name = $this->element['name'] ? 'name="' . (string) $this->element['name'] . '"' : '';
        $id = $this->element['id'] ? 'id="' . (string) $this->element['id'] . '"' : '';
        $value = $this->element['value'] ? 'value="' . (string) $this->element['value'] . '"' : '';
        $checked = $this->element['checked'];
        $default = $this->element['default'];

        if ($type_ == "light_box_style") {
            $options = array(
                JHtml::_('select.option', '1', '1'),
                JHtml::_('select.option', '2', '2'),
                JHtml::_('select.option', '3', '3'),
                JHtml::_('select.option', '4', '4'),
                JHtml::_('select.option', '5', '5')
            );

            $html = '<select  onclick="getSorry()" onchange="sorryChange()"  id="' . $this->id . '" name="' . $this->name . '" style="width:126px">';
            foreach ($options as $i => $option) {
                if ($this->value == $option->value) {
                    $html.= '<option onclick="getSorry()" onchange="sorryChange()" name="' . $this->name . '" value=3  selected>' . $option->value . '</option>';
                } else {
                    $html.= '<option onclick="getSorry()"  on change m= "sorryChange()" name="' . $this->name . '" value=3 >' . $option->value . '</option>';
                }
            }

            $html.= '</select>';

            return $html;

//  return '<input type="radio" name="'.$this->name.'" id="'.$this->id.'" value="'.$this->value.'" '.' '.$class.' onclick="get_value(this)" />';
        } elseif ($type_ == "lightbox_transition_list") {
            $options = array(
                JHtml::_('select.option', 'elastic', 'Elastic'),
                JHtml::_('select.option', 'fade', 'Fade'),
                JHtml::_('select.option', 'none', 'None'),
            );

            $html = '<select  onclick="getSorry()" id="' . $this->id . '" name="' . $this->name . '" for="' . $this->for . '" style="width:126px">';
            foreach ($options as $i => $option) {
                if ($this->value == $option->value) {
                    $html.= '<option name="' . $this->name . '" value=fade  selected>' . $option->value . '</option>';
                } else {
                    $html.= '<option name="' . $this->name . '" value=fade >' . $option->value . '</option>';
                }
            }

            $html.= '</select>';

            return $html;
        } elseif ($type_ == "number") {
            return '<input style="width:115px" onclick="getSorry()"  onchange="sorryChange()" type="number"  id ="' . $this->id . '" name="' . $this->name . '"  ' . $class . ' ' . $for . ' ' . $value . '/>';
        } elseif ($type_ == "checkbox") {
            // $script = $this->element['script'] ? $this->element['script'] : '';
            $checked = $this->value == '1' ? 'checked' : '';
            return '<input onclick="getSorry()"  onchange="sorryChange()" type="checkbox" name="' . $this->name . '" id="' . $this->id . '" ' . $value . ' ' . $default . '' . $class . $checked . '/>';
        } elseif ($type_ == "light_box_opacity_text") {

            return '<div onchange="getSorry()" style="float: left;" class="slider-container">'
                    . '<input  onchange="sorryChange()" value=  20  name="' . $this->name . '"  id="light_box_opacity" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" style="display: none;"/>'
                    . '<span>20%</span></div>';
        } elseif ($type_ == "list") {
            return '<div  style="width:115px" class="has-background"><div id="view-style-block" class="has-background">
					<ul>
						<li data-id="1" class="active"><img src="../media/mod_lightbox/css/images/view1.jpg"></li>
						<li data-id="2"><img src="../media/mod_lightbox/css/images/view2.jpg"></li>
						<li data-id="3"><img src="../media/mod_lightbox/css/images/view3.jpg"></li>
						<li data-id="4"><img src="../media/mod_lightbox/css/images/view4.jpg"></li>
						<li data-id="5"><img src="../media/mod_lightbox/css/images/view5.jpg"></li>
					</ul>
				</div></div>';
        } elseif ($type_ == "radio") {
            $options = array(
                JHtml::_('select.option', '1', '1'),
                JHtml::_('select.option', '2', '2'),
                JHtml::_('select.option', '3', '3'),
                JHtml::_('select.option', '4', '4'),
                JHtml::_('select.option', '5', '5'),
                JHtml::_('select.option', '6', '6'),
                JHtml::_('select.option', '7', '7'),
                JHtml::_('select.option', '8', '8'),
                JHtml::_('select.option', '9', '9')
            );
            $checked = 'checked';

            $html = '<div style="float: left;" >
			<table>
				<tbody>
				  <tr>
					<td style="width:25px"><input onclick="getSorry()" type="radio" value="1" id="slideshow_title_top-left" name="' . $this->name . '"  /></td>
					<td style="width:25px"><input onclick="getSorry()"type="radio" value="2" id="slideshow_title_top-center" name="' . $this->name . '"  /></td>
					<td style="width:25px"><input onclick="getSorry()"type="radio" value="3" id="slideshow_title_top-right" name="' . $this->name . '"  /></td>
				  </tr>
				  <tr>
					<td style="width:25px"><input onclick="getSorry()"type="radio" value="4" id="slideshow_title_middle-left" name="' . $this->name . '" /> </td>
					<td style="width:25px"><input onclick="getSorry()"type="radio" value="5" id="slideshow_title_middle-center" name="' . $this->name . '" checked /></td>
					<td style="width:25px"><input onclick="getSorry()"type="radio" value="6" id="slideshow_title_middle-right" name="' . $this->name . '"  /></td>
				  </tr>
				  <tr>
					<td style="width:25px"><input onclick="getSorry()"type="radio" value="7" id="slideshow_title_bottom-left" name="' . $this->name . '"  /></td>
					<td style="width:25px"><input onclick="getSorry()"type="radio" value="8" id="slideshow_title_bottom-center" name="' . $this->name . '" /></td>
					<td style="width:25px"><input onclick="getSorry()"type="radio" value="9" id="slideshow_title_bottom-right" name="' . $this->name . '" /></td>
				  </tr>
				</tbody>	
			</table>
			</div>';

            return $html;
        } elseif ($type_ == "text") {
            return '<input  style="width:115px" onclick="getSorry()" onchange = "sorryChange"type="text"  id ="' . $this->id . '" name="' . $this->name . '" ' . $value . ' "' . $class . '" "' . $for . '"/>';
        } elseif ($type_ == "label") {
            return '<label  onclick="getSorry()" type="label"  id ="' . $this->id . '" name="' . $this->name . '" value="' . $this->value . '" "' . $class . '" "' . $for . '"  style="margin-top:0px"/>';
        }
    }

}
