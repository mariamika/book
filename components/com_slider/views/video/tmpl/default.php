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
JHtml::stylesheet(Juri::root() . 'media/com_slider/style/admin.style.css');
$doc = JFactory::getDocument();
//$doc->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js");
//$doc->addScript("http://code.jquery.com/ui/1.10.4/jquery-ui.js");
//JHtml::script(Juri::root() . "/media/com_slider/js/admin.js");
?>
<!--<script src="<?php echo JURI::root(true) ?>/media/com_slider/js/admin.js"></script>-->
<script src="<?php echo JURI::root(true) ?>/media/com_slider/js/simple-slider.js"></script>
<?php
$doc->addScript(JURI::root(true) . "/media/com_slider/elements/jscolor/jscolor.js");
JHtml::stylesheet('media/com_slider/style/simple-slider.css');

?>

<style>
    html.wp-toolbar {
        padding:0px !important;
    }
    #wpadminbar,#adminmenuback,#screen-meta, .update-nag,#dolly {
        display:none;
    }
    #wpbody-content {
        padding-bottom:30px;
    }
    #adminmenuwrap {display:none !important;}
    .auto-fold #wpcontent, .auto-fold #wpfooter {
        margin-left: 0px;
    }
    #wpfooter {display:none;}
    iframe {height:250px !important;}
    #TB_window {height:250px !important;}
</style>
<script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery('.huge-it-insert-post-button').on('click', function() {
            var ID1 = jQuery('#huge_it_add_video_input').val();
            if (ID1 == "") {
                alert("Please copy and past url form Youtobe or Vimeo to insert into slider.");
                return false;
            }

            window.parent.uploadID.val(ID1);

            tb_remove();
            $("#save-buttom").click();
        });

        jQuery('#huge_it_add_video_input').change(function() {

            if (jQuery(this).val().indexOf("youtube") >= 0) {
                jQuery('#add-video-popup-options > div').removeClass('active');
                jQuery('#add-video-popup-options  .youtube').addClass('active');
            } else if (jQuery(this).val().indexOf("vimeo") >= 0) {
                jQuery('#add-video-popup-options > div').removeClass('active');
                jQuery('#add-video-popup-options  .vimeo').addClass('active');
            } else {
                jQuery('#add-video-popup-options > div').removeClass('active');
                jQuery('#add-video-popup-options  .error-message').addClass('active');
            }
        })

        jQuery('.updated').css({"display": "none"});
<?php if (@$_GET["closepop"] == 1) { ?>
            $("#closepopup").click();
            self.parent.location.reload();
<?php } ?>

    });

</script>
<a id="closepopup"  onclick=" parent.eval('tb_remove()')" style="display:none;" > [X] </a>

<div id="huge_it_slider_add_videos">
    <div class="slider-options-head">
    <div style="float: left;">
        <div><a href="http://huge-it.com/joomla-extensions-slider-user-manual/" target="_blank">User Manual</a></div>
        <div>This feature is available in Pro version. To use it <a href="http://huge-it.com/joomla-slider/" target="_blank">get Full version.</a></div>
    </div>
 
</div>
    <div id="huge_it_slider_add_videos_wrap" style="float:left">
        <h2>Add Video URL From Youtobe or Vimeo</h2>
        <div class="control-panel">
            <form action="<?php echo JRoute::_('index.php?option=com_slider&view=video&task=video.save&id=' . $_GET['pid']) ?>" method="post" name="adminForm" id="adminForm"   enctype="multipart/form-data">
                <input type="text" id="huge_it_add_video_input" name="huge_it_add_video_input"  style="float: left;"/>
<!--                 onClick="window.parent.location.reload();"-->

<div class="button2-left" style="margin: 0 0 0 10px;width: 115px;float: left;">
<div class="blank">
  <button class='btn btn-small btn-success' id='huge-it-insert-video-button' onClick="alert('Add Video Slide feature is disabled in free version. If you need this functionality, you need to buy the commercial version.');window.parent.location.reload();"  >Insert Video Slide</button>
</div>
</div>
<div id="add-video-popup-options" style="float:left;width: 100%">
                    <div class="youtube" >
                        <div>
                            <label for="show_quality">Quality:</label>	
                            <select id="show_quality" name="show_quality" style="width: 100px;">
                                <option value="none">Auto</option>
                                <option value="280">280</option>
                                <option value="360"selected="selected">360</option>
                                <option value="480">480</option>
                                <option value="hd720">720 HD</option>
                                <option value="hd1080">1080 HD</option>
                            </select>
                        </div>
                        <div>
                            <label for="">Volume:</label>	
                            <div class="slider-container">
                                <input name="show_volume" value="50" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" />
                            </div>
                        </div>
                        <div>
                            <label for="show_controls">Show Controls:</label>
                            <input type="hidden" name="show_controls" value="" />
                            <input type="checkbox" class="checkbox" checked="checked" name="show_controls" />	
                        </div>
                        <div>
                            <label for="show_info">Show Info:</label>
                            <input type="hidden" name="show_info" value="" />
                            <input type="checkbox" class="checkbox" checked="checked" name="show_info" />	
                        </div>
                    </div>
                    <div class="vimeo">
                        <div>
                            <label for="">Elements Color:</label>	
                            <input name="show_quality_vim" type="text" class="color" id="" size="10" value="00adef" style="width: 100px;"/>
                        </div>
                        <div>
                            <label for="">Volume:</label>	
                            <div class="slider-container">
                                <input name="show_volume_v" value="50" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" />
                            </div>
                        </div>
                    </div>
    <div class="error-message" style="color: #ff0000">
                        Please insert link only from youtobe or vimeo
                    </div>
                </div>
            </form>
        </div>
    </div>	
</div>