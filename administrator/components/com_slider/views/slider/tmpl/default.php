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
JHtml::stylesheet(Juri::root() . 'media/com_slider/style/admin.style.css');
JHtml::stylesheet(Juri::root() . 'media/com_slider/style/simple-slider.css');
JHtml::stylesheet(Juri::root() . 'media/com_slider/style/portfolios.style.css');
$doc = JFactory::getDocument();
$editor = JFactory::getEditor('tinymce');
$doc->addScript(JURI::root(true) . "/media/com_slider/js/param_block.js");
JHTML::_('behavior.modal');
?>
<script src="<?php echo JURI::root(true) ?>/media/com_slider/js/admin.js"></script>
<script src="<?php echo JURI::root(true) ?>/media/com_slider/js/simple-slider.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js" ></script>
<script src="<?php echo JURI::root(true) ?>/media/media/js/mediafield-mootools.min.js" type="text/javascript"></script>
 <?php
$doc->addScript(JURI::root(true) . "/media/com_slider/elements/jscolor/jscolor.js");
$thumburl = "";
$liclass = "";
?>

<script type="text/javascript">
    var time = 0;
    par_images = [];
    Joomla.submitbutton = function (pressbutton)
    {
        if (document.adminForm.name.value == '' && pressbutton != 'cancel')
        {
            alert('Name is required.');
            document.adminForm.name.focus();
        }
        else
            submitform(pressbutton);
    }
</script>

<script type="text/javascript">
    var image_base_path = '<?php
$params = JComponentHelper::getParams('com_media');
echo $params->get('image_path', 'images');
?>/';
    function submitbutton(pressbutton)
    {
        if (!document.getElementById('name').value) {
            alert("Name is required.");
            return;
        }

        document.getElementById("adminForm").action = document.getElementById("adminForm").action + "&task=" + pressbutton;
        document.getElementById("adminForm").submit();
    }
    function change_select() {
        submitbutton('apply');
    }
    jQuery(function () {
        jQuery("#images-list").sortable({
            stop: function () {
                jQuery("#images-list > li").removeClass('has-background');
                count = jQuery("#images-list > li").length;
                for (var i = 0; i <= count; i += 2) {
                    jQuery("#images-list > li").eq(i).addClass("has-background");
                }
                jQuery("#images-list > li").each(function () {
                    jQuery(this).find('.order_by').val(count - jQuery(this).index());
                });
            },
            revert: true
        });

    });

    jQuery(document).ready(function(){

        jQuery('ul.widget-images-list li a.modal').on('click',function(){
            var num = jQuery(this).data('number');
            var id = jQuery(this).data('id');
            jQuery('ul.widget-images-list li a input.edit-image').on('change',function(){
                getImage('<?php echo $_SERVER['HTTP_HOST'] . JURI::root(true) ?>',id ,num ,false,true);
            });

        })


    });



</script>
<div class="">
    <?php $path_site2 = JUri::root()."media/com_slider/images"; 
	?>
	<style>
		.free_version_banner {
			position:relative;
			display:block;
			background-image:url(<?php echo $path_site2; ?>/wp_banner_bg.jpg);
			background-position:top left;
			backround-repeat:repeat;
			overflow:hidden;
		}
		
		.free_version_banner .manual_icon {
			position:absolute;
			display:block;
			top:15px;
			left:15px;
		}
		
		.free_version_banner .usermanual_text {
                        font-weight: bold !important;
			display:block;
			float:left;
			width:270px;
			margin-left:75px;
			font-family:'Open Sans',sans-serif;
			font-size:12px;
			font-weight:300;
			font-style:italic;
			color:#ffffff;
			line-height:10px;
                        margin-top: 0;
                        padding-top: 15px;
		}
		
		.free_version_banner .usermanual_text a,
		.free_version_banner .usermanual_text a:link,
		.free_version_banner .usermanual_text a:visited {
			display:inline-block;
			font-family:'Open Sans',sans-serif;
			font-size:17px;
			font-weight:600;
			font-style:italic;
			color:#ffffff;
			line-height:30.5px;
			text-decoration:underline;
		}
		
		.free_version_banner .usermanual_text a:hover,
		.free_version_banner .usermanual_text a:focus,
		.free_version_banner .usermanual_text a:active {
			text-decoration:underline;
		}
		
		.free_version_banner .get_full_version,
		.free_version_banner .get_full_version:link,
		.free_version_banner .get_full_version:visited {
                        padding-left: 60px;
                        padding-right: 4px;
			display: inline-block;
                        position: absolute;
                        top: 15px;
                        right: calc(50% - 167px);
                        height: 38px;
                        width: 285px;
                        border: 1px solid rgba(255,255,255,.6);
                        font-family: 'Open Sans',sans-serif;
                        font-size: 23px;
                        color: #ffffff;
                        line-height: 43px;
                        text-decoration: none;
                        border-radius: 2px;
		}
		
		.free_version_banner .get_full_version:hover {
			background:#ffffff;
			color:#bf1e2e;
			text-decoration:none;
			outline:none;
		}
		
		.free_version_banner .get_full_version:focus,
		.free_version_banner .get_full_version:active {
			
		}
		
		.free_version_banner .get_full_version:before {
			content:'';
			display:block;
			position:absolute;
			width:33px;
			height:23px;
			left:25px;
			top:9px;
			background-image:url(<?php echo $path_site2; ?>/wp_shop.png);
			background-position:0px 0px;
			background-repeat:repeat;
		}
		
		.free_version_banner .get_full_version:hover:before {
			background-position:0px -27px;
		}
		
		.free_version_banner .huge_it_logo {
			float:right;
			margin:15px 15px;
		}
		
		.free_version_banner .description_text {
                        padding:0 0 13px 0;
			position:relative;
			display:block;
			width:100%;
			text-align:center;
			float:left;
			font-family:'Open Sans',sans-serif;
			color:#fffefe;
			line-height:inherit;
		}
                .free_version_banner .description_text p{
                        margin:0;
                        padding:0;
                        font-size: 14px;
                }
		</style>
	<div class="free_version_banner">
		<img class="manual_icon" src="<?php echo $path_site2; ?>/icon-user-manual.png" alt="user manual" />
		<p class="usermanual_text">If you have any difficulties in using the options, Follow the link to <a href="http://huge-it.com/joomla-slider-user-manual/" target="_blank">User Manual</a></p>
		<a class="get_full_version" href="http://huge-it.com/joomla-slider/" target="_blank">GET THE FULL VERSION</a>
                <a href="http://huge-it.com" target="_blank"><img class="huge_it_logo" src="<?php echo $path_site2; ?>/Huge-It-logo.png"/></a>
                <div style="clear: both;"></div>
		<div  class="description_text"><p>This is the free version of the plugin. Click "GET THE FULL VERSION" for more advanced options.   We appreciate every customer.</p></div>
	</div>
        <div style="clear:both;"></div>
	
		</div>
<div style="clear: both;"></div>


<form action="<?php echo JRoute::_('index.php?option=com_slider&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm"  enctype="multipart/form-data">
    <div id="poststuff" >
        <div id="slider-header">
            <ul id="sliders-list">
                <?php
                foreach ($this->sliderParams as $rowsldires) {
                    if ($rowsldires->id != $this->item->id) {
                        ?>
                        <li>
                            <a href="#" onclick="window.location.href = 'index.php?option=com_slider&view=slider&layout=edit&id=<?php echo $rowsldires->id; ?>'" ><?php echo $rowsldires->name; ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="active" style='background-image:url("<?= JURI::root() . 'media/com_slider/images/edit.png' ?>")'>
                            <input onfocus="this.style.width = ((this.value.length + 1) * 8) + 'px'" type="text" name="name" id="name" maxlength="250" value="<?php echo stripslashes($this->item->name); ?>" />
                        </li>
                        <?php
                    }
                }
                ?>
                <li class="add-new">
                    <a onclick="window.location.href = 'index.php?option=com_slider&view=slider&task=sliders.add'">+</a>
                </li>
            </ul>
        </div>
        <div id="post-body-wrapper" class="metabox-holder columns-2">
            <div id="post-body-heading">
                <input type="hidden" name="imagess" id="_unique_name" />
                <div class="huge-it-newuploader uploader button button-primary add-new-image" style="width: 166px">
                    <a class="modal" title="Image" href="index.php?option=com_media&view=images&tmpl=component&e_name=tempimage&amp;fieldid=_unique_name_button"  rel="{handler: 'iframe', size: {x: 800, y: 500}}">
                        <div class="button2-left" style="float: left">
                            <div class="blank">
                                <input type="button" class="btn btn-small btn-success" class="button wp-media-buttons-icon" name="_unique_name_button" id="_unique_name_button" value="Add Image" onchange="getImage('<?php echo $_SERVER['HTTP_HOST'] . JURI::root(true) ?>', <?php echo intval(JRequest::getVar('id')); ?>, null, true);" onclick="jInsertFieldValue('', 'jform_images_image_intro'); return false;" />
                            </div>
                        </div>
                    </a>

                    <a class="modal" rel="{handler: 'iframe', size: {x: 800, y: 500}}" href="index.php?option=com_slider&view=video&tmpl=component&pid=<?php echo $_GET['id']; ?>" title="Video" >
                        <div class="button2-left">
                            <div class="blank" style="margin-left: 5px;">
                                <input type="button" class="btn btn-small btn-success" class="button wp-media-buttons-icon" name="_unique_name_button" id="_unique_name_button" value="Add Video" />
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
  <div id="h-sidebar-container" class="h-sidebar-container h-sidebar-visible">
            <div id="h-toggle-sidebar-wrapper">
                <div id="h-toggle-button-wrapper" class="h-toggle-button-wrapper h-toggle-visible">
                    <div id="h-toggle-sidebar-button" class="h-toggle-sidebar-button hidden-phone hasTooltip" title="" type="button" onclick="toggleSidebar(false);
                    return false;" data-original-title="Hide the sidebar">
                    </div>
                </div>


                <div id="sidebar" class="sidebar">
                    <div class="sidebar-nav">
                        <ul id="submenu" class="nav nav-list">
                            <li class="active">
                                <a href="index.php?option=com_slider">Huge-IT Slider</a>
                            </li>
                            <li>
                                <a href="index.php?option=com_slider&amp;view=general">General Options</a>
                            </li>
                            <li>
                                <a href="index.php?option=com_slider&amp;view=featured">Featured Products</a>
                            </li>
                        </ul>

                        <div class="filter-select hidden-phone">
                            <h4 class="page-header">Current Slider Options:</h4>
                            <ul class="adminformlist1">
                                <li>
                                    <label for="sl_width" class="title">Width</label>
                                    <input  type="text" name="sl_width" id="sl_width" value="<?php echo $this->item->sl_width; ?>"  />
                                </li>
                                <li>
                                    <label for="sl_height" class="title" >Height</label>
                                    <input type="text"  name="sl_height" id="sl_height" value="<?php echo $this->item->sl_height; ?>" />
                                </li>
                                <li>
                                    <label for="pause_on_hover" class="title">Pause on hover</label>
                                    <input type="hidden" value="off" name="pause_on_hover" />					
                                    <input  type="checkbox" name="pause_on_hover"  style="    margin: 3px 5px 9px 4px;" value="on" id="pause_on_hover"  <?php
                                    if ($this->item->pause_on_hover == 'on') {
                                        echo 'checked="checked"';
                                    }
                                    ?> />
                                </li>
                                <li>
                                    <label for="slider_effects_list" class="title">Effects</label>
                                    <select name="slider_effects_list" id="slider_effects_list"> 
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'none') {
                                            echo 'selected';
                                        }
                                        ?>  value="none">None</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'cubeH') {
                                            echo 'selected';
                                        }
                                        ?>   value="cubeH">Cube Horizontal</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'cubeV') {
                                            echo 'selected';
                                        }
                                        ?>  value="cubeV">Cube Vertical</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'fade') {
                                            echo 'selected';
                                        }
                                        ?>  value="fade">Fade</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'sliceH') {
                                            echo 'selected';
                                        }
                                        ?>  value="sliceH">Slice Horizontal</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'sliceV') {
                                            echo 'selected';
                                        }
                                        ?>  value="sliceV">Slice Vertical</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'slideH') {
                                            echo 'selected';
                                        }
                                        ?>  value="slideH">Slide Horizontal</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'slideV') {
                                            echo 'selected';
                                        }
                                        ?>  value="slideV">Slide Vertical</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'scaleOut') {
                                            echo 'selected';
                                        }
                                        ?>  value="scaleOut">Scale Out</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'scaleIn') {
                                            echo 'selected';
                                        }
                                        ?>  value="scaleIn">Scale In</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'blockScale') {
                                            echo 'selected';
                                        }
                                        ?>  value="blockScale">Block Scale</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'kaleidoscope') {
                                            echo 'selected';
                                        }
                                        ?>  value="kaleidoscope">Kaleidoscope</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'fan') {
                                            echo 'selected';
                                        }
                                        ?>  value="fan">Fan</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'blindH') {
                                            echo 'selected';
                                        }
                                        ?>  value="blindH">Blind Horizontal</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'blindV') {
                                            echo 'selected';
                                        }
                                        ?>  value="blindV">Blind Vertical</option>
                                        <option <?php
                                        if ($this->item->slider_list_effects_s == 'random') {
                                            echo 'selected';
                                        }
                                        ?>  value="random">Random</option>
                                    </select>
                                </li>

                                <li>
                                    <label for="sl_pausetime" class="title">Pause time</label>
                                    <input   type="text" name="sl_pausetime" id="sl_pausetime" value="<?php echo $this->item->description; ?>"  />
                                </li>
                                <li>
                                    <label for="sl_changespeed" class="title">Change speed</label>
                                    <input   type="text" name="sl_changespeed" id="sl_changespeed" value="<?php echo $this->item->param; ?>"  />
                                </li>
                                <li>
                                    <label for="slider_position" class="title">Slider Position</label>
                                    <select name="sl_position" id="slider_position" >
                                        <option <?php
                                        if ($this->item->sl_position == 'left') {
                                            echo 'selected';
                                        }
                                        ?>  value="left">Left</option>
                                        <option <?php
                                        if ($this->item->sl_position == 'right') {
                                            echo 'selected';
                                        }
                                        ?>   value="right">Right</option>
                                        <option <?php
                                        if ($this->item->sl_position == 'center') {
                                            echo 'selected';
                                        }
                                        ?>  value="center">Center</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="filter-select hidden-phone">
                            <h4 class="page-header">Shortcodes:</h4>
                            <div class="inside">
                                <ul>
                                    <li>
                                        <div class="shortcodeText"><p>Copy &amp; paste the shortcode directly into any Joomla article.</p></div>
                                        <textarea class="full" readonly="readonly">[huge_it_slider_id="<?php echo $this->item->id ?>"]</textarea>
                                    </li>

                                </ul>
                            </div>
                              <div class="inside">
                                    <ul>
                                        <li>
                                            <div class="shortcodeText"><p>Copy & paste this code into a template file to include the slider within your theme.</p></div>
                                            <textarea class="full" readonly="readonly">&lt;?php echo huge_it_slider_id(<?php echo $this->item->id; ?>); ?&gt;</textarea>
                                        </li>

                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="h-toggle-sidebar"></div>
            </div>
        </div>
    <div  id="h-main-container" class="span10 h-toggle-main">
    <div id="post-body" >
        <ul id="images-list">
            <?php
            function get_youtube_id_from_url($url) {
                $result = preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID);
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                    return $match[1];
                }
            }
            ?>
            <?php $j = 2; ?>
            <?php foreach ($this->prop as $key => $rowimages) : ?>
                <?php
                if ($rowimages->sl_type == '') {
                    $rowimages->sl_type = 'image';
                }
                switch ($rowimages->sl_type) {
                    case 'image':
                        ?>
                        <li style="padding-bottom: 15px" <?php
                        if ($j % 2 == 0) {
                            echo "class='has-background'";
                        }$j++;
                        ?>>
                            <input class="order_by" type="hidden" name="order_by_<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
                            <div deleteId = '1' id="sel_img<?php echo $rowimages->id; ?>" class="image-container">
                                <ul  class="widget-images-list"> 
                                    <?php
                                    $imgurl = $rowimages->image_url;
                                    $image = explode('/',$imgurl);
                                    if($image[0] == 'http:' || $image[0] == 'https:'){
                                        $serv = '';
                                    }
                                    else{
                                        $serv = juri::root();
                                    }
                                    $i = 1;
                                    ?>
                                    <script type="text/javascript">
                                        url = '<?php echo $_SERVER['HTTP_HOST'] . JURI::root(true) ?>';
                                        par_images[<?php echo $rowimages->id; ?>] = new Array('<?php echo $imgurl; ?>');
                                    </script>
                                    <?php
                                    //foreach ($imgurl as $key1 => $img) {
                                    ?>
                                    <li id = "editthisimage_<?php echo $i; ?>_<?php echo $rowimages->id; ?>" class="editthisimage<?php echo $key; ?> first" onclick="jInsertFieldValue('', 'jform_images_image_intro'); return false;">
                                        <img id="sel_img_<?php echo $i; ?>"  value="<?php echo JURI::root() . $imgurl; ?>" src="<?php echo $serv.$imgurl; ?>" />
                                        <div  class="editimageicon">
                                            <a class="modal" data-number="<?php echo $i;?>" data-id="<?php echo $rowimages->id;?>"  title="Image" href="index.php?option=com_media&view=images&tmpl=component&e_name=tempimage&amp;fieldid=unique_name_button<?php echo $i; ?>"  rel="{handler: 'iframe', size: {x: 570, y: 400}}">
                                                Edit Image
                                                <input type="hidden" class="edit-image" id="unique_name_button<?php echo $i; ?>" value="+"   />
                                            </a>
                                        </div>
                                    </li>

                            </div>
                            <input hidden="" id= "image_url<?php echo $rowimages->id; ?>" name="image_url<?php echo $rowimages->id; ?>" value='<?php echo $rowimages->image_url; ?>'/>
                            <div class="image-options" >
                                <div>
                                    <div for="titleimage<?php echo $rowimages->id; ?>" class="slidetTitle">Title:</div>
                                    <input  style="margin-left: 60px;width: 82%"  type="text" id="titleimage<?php echo $rowimages->id; ?>" name="titleimage<?php echo $rowimages->id; ?>" id="titleimage<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->name; ?>">
                                </div>
                                <div class="description-block" >
                                    <div for="im_description<?php echo $rowimages->id; ?>" class="slidetTitle">Description:</div>
                                    <textarea style="margin-left:20px;"  id="im_description<?php echo $rowimages->id; ?>" name="im_description<?php echo $rowimages->id; ?>" ><?php echo $rowimages->description; ?></textarea>
                                </div>
                                <div class="link-block">
                                    <div class="slidetTitle" for="sl_url<?php echo $rowimages->id; ?>">URL:</div>
                                    <input  style="margin-left: 60px;"  class="url-input" type="text" id="sl_url<?php echo $rowimages->id; ?>" name="sl_url<?php echo $rowimages->id; ?>"  value="<?php echo $rowimages->sl_url; ?>" >
                                    <div class="long" for="sl_link_target<?php echo $rowimages->id; ?>">
                                        <span>Open in new tab</span>
                                        <input type="hidden" name="sl_link_target<?php echo $rowimages->id; ?>" value="" />
                                        <input  style="position: relative;
                                                top: 3px;
                                                width: 29px;"<?php
                                                if ($rowimages->link_target == 'on') {
                                                    echo 'checked="checked"';
                                                }
                                                ?>  class="link_target" type="checkbox" id="sl_link_target<?php echo $rowimages->id; ?>" name="sl_link_target<?php echo $rowimages->id; ?>" />
                                    </div>
                                </div>
                                <div class="remove-image-container">
                                    <a class="button remove-image" href="index.php?option=com_slider&view=slider&layout=edit&id=<?php echo $this->item->id ?>&task=slider.deleteProject&removeslide=<?php echo $rowimages->id; ?>">Remove Slide</a>
                                </div>                                      
                            </div>
                            <div class="clear"></div>
                        </li>

                        <?php break;
                    case 'video':
                        ?>
                        <li  style="padding-bottom: 15px" <?php
                             if ($j % 2 == 0) {
                                 echo "class='has-background'";
                             }$j++;
                             ?>> 
                            <input class="order_by" type="hidden" name="order_by_<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->ordering; ?>" />
                            <?php
                            $videoUrl = $rowimages->image_url;
                            if (strpos($rowimages->image_url, 'youtube') !== false) {
                                $liclass = "youtube";
                                $video_thumb_url = get_youtube_id_from_url($rowimages->image_url);
                                $thumburl = '<img src="http://img.youtube.com/vi/' . $video_thumb_url . '/mqdefault.jpg" alt="" style="margin-left: 11px;"/>';
                            } else if (strpos($rowimages->image_url, 'vimeo') !== false) {
                                $liclass = "vimeo";
                                $vimeo = $rowimages->image_url;
                                $vimeo = explode("/", $vimeo);
                                $imgid = end($vimeo);
                                $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/" . $imgid . ".php"));
                                $imgsrc = $hash[0]['thumbnail_large'];
                                $thumburl = '<img src="' . $imgsrc . '" alt=""   style="margin-left: 11px;"/>';
                            }
                            ?> 
                            <div class="image-container"  name="image_url">	
            <?php echo $thumburl; ?>
                                <div class="play-icon <?php echo $liclass; ?>"></div>
                                <div>
                                    <input type="hidden" name="imagess<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->image_url; ?>" />
                                </div>
                            </div>
                            <div class="image-options video-options">
            <?php if (strpos($rowimages->image_url, 'youtube') !== false) { ?>
                                    <div class="video-quality video-options">
                                        <label for="titleimage<?php echo $rowimages->id; ?>" >Quality:</label>	
                                        <select id="titleimage<?php echo $rowimages->id; ?>" name="titleimage<?php echo $rowimages->id; ?>" style="width:100px;float:left">
                                            <option value="none" <?php
                                            if ($rowimages->name == 'none') {
                                                echo 'selected="selected"';
                                            }
                                            ?>>Auto</option>
                                            <option value="280" <?php
                                            if ($rowimages->name == '280') {
                                                echo 'selected="selected"';
                                            }
                                            ?>>280</option>
                                            <option value="360" <?php
                                                    if ($rowimages->name == '360') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>>360</option>
                                            <option value="480" <?php
                            if ($rowimages->name == '480') {
                                echo 'selected="selected"';
                            }
                            ?>>480</option>
                                            <option value="hd720" <?php
                            if ($rowimages->name == 'hd720') {
                                echo 'selected="selected"';
                            }
                            ?>>720 HD</option>
                                            <option value="hd1080" <?php
                            if ($rowimages->name == 'hd1080') {
                                echo 'selected="selected"';
                            }
                            ?>>1080 HD</option>
                                        </select>
                                        <!--                </div>
                                                        <div class="video-volume video-options">-->
                                        <label for="im_description<?php echo $rowimages->id; ?>"  style="margin-left: 80px; margin-top: 4px">Volume:</label>	
                                        <div class="slider-container" style="float: left;margin-top: 10px;">
                                            <input id="im_description<?php echo $rowimages->id; ?>" name="im_description<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->description; ?>" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" />
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?= $rowimages->image_url ?>" name="videoUrl"  style="width: 10px;"/>
                                    <input hidden="" id= "image_url<?php echo $rowimages->id; ?>" name="image_url<?php echo $rowimages->id; ?>" value='<?php echo $rowimages->image_url; ?>'/>
                                    <div class="video-options" style="position: relative;top: 42px;right: 531px;">
                                        <label style="position: relative;top: 11px;left: 3px;" for="sl_url<?php echo $rowimages->id; ?>">Show Controls:</label>
                                        <input type="hidden" name="sl_url<?php echo $rowimages->id; ?>" value="" />
                                        <input <?php
                            if ($rowimages->sl_url == 'on') {
                                echo 'checked="checked"';
                            }
                                                    ?> class="link_target"  type="checkbox" id="sl_url<?php echo $rowimages->id; ?>" name="sl_url<?php echo $rowimages->id; ?>" class="videoCheckbox"/>		
                                    </div>
                                    <div class="video-options" style="position: relative;
                                         top: 13px;
                                         right: 233px;">
                                        <label style="margin:17px 0 0 115px" for="sl_link_target<?php echo $rowimages->id; ?>">Show Info:</label>
                                        <input type="hidden" name="sl_link_target<?php echo $rowimages->id; ?>" value="" />
                                        <input  <?php
                    if ($rowimages->link_target == 'on') {
                        echo 'checked="checked"';
                    }
                    ?>  class="link_target" type="checkbox" id="sl_link_target<?php echo $rowimages->id; ?>" name="sl_link_target<?php echo $rowimages->id; ?>" style="position: relative;
                                            left: 12px;
                                            top: 20px;"/>		
                                    </div>
                                    <div class="remove-image-container">
                                        <a class="button remove-image" href="index.php?option=com_slider&view=slider&layout=edit&id=<?php echo $this->item->id ?>&task=slider.deleteProject&removeslide=<?php echo $rowimages->id; ?>">Remove Video</a>
                                    </div>
            <?php } else { ?>

                                    <div class="video-quality video-options">
                                        <label for="sl_link_target<?php echo $rowimages->id; ?>" style="margin-top: 40px;">Elements Color:</label>	
                                        <input style="margin-top: 40px;
                                               color: rgb(255, 255, 255);
                                               width: 100px;
                                               float: left;"name="titleimage<?php echo $rowimages->id; ?>" type="text" class="color" id="sl_link_target<?php echo $rowimages->id; ?>" size="10" value="<?php echo $rowimages->name; ?>"/>
                                        <label for="im_description<?php echo $rowimages->id; ?>" style="margin-left: 80px;
                                               width: 111px;
                                               margin-top: 40px">Volume:</label>	
                                        <div class="slider-container" style="float: left;
                                             margin-top: 40px;">
                                            <input id="im_description<?php echo $rowimages->id; ?>" name="im_description<?php echo $rowimages->id; ?>" value="<?php echo $rowimages->description; ?>" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" />
                                        </div> 
                                        <input type="hidden" value="<?= $rowimages->image_url ?>" name="videoUrl"  style="width: 10px;"/>
                                        <input hidden="" id= "image_url<?php echo $rowimages->id; ?>" name="image_url<?php echo $rowimages->id; ?>" value='<?php echo $rowimages->image_url; ?>'/>
                                    </div>
                                    <div class="remove-image-container">
                                        <a class="button remove-image" href="index.php?option=com_slider&view=slider&layout=edit&id=<?php echo $this->item->id ?>&task=slider.deleteProject&removeslide=<?php echo $rowimages->id; ?>"">Remove Video</a>
                                    </div>

                    <?php } ?>
                            </div>	
                            <div class="clear"></div>
                        </li>
    <?php } endforeach;
?>
        </ul>  

        <div style=" position:absolute; width:1px; height:1px; top:0px; overflow:hidden">
            <textarea id="tempimage" name="tempimage" class="mce_editable"></textarea><br />
        </div>
<?php
$editor->display('description', 'sss', '0', '0', '0', '0');
?>
    </div>

    </div>
    <div>
        <input type="hidden" name="task" value="" />
<?php echo JHtml::_('form.token'); ?>
    </div>

</form>
