<?php
/**
 * @package Huge IT portfolio
 * @author Huge-IT
 * @copyright (C) 2014 Huge IT. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website		http://www.huge-it.com/
 **/
 
defined('_JEXEC') or die('Restricted access');
$lightbox_transition = 20;
$light_box_speed = 800;
$light_box_fadeout = 300;
$light_box_title = 'false';
$light_box_opacity = 20;
$light_box_open = 'false';
$light_box_overlayclose = 'true';
$light_box_esckey = 'false';
$light_box_arrowkey = 'false';
$light_box_loop = 'false';
$light_box_closebutton = 'true';
$light_box_fixed = 'false';
$slider_title_position = 5;
$light_box_size_fix = 'true';
$light_box_width = 1000;
$light_box_height = 1000;
$light_box_maxwidth = 768;
$light_box_maxheight = 500;
$light_box_initialwidth = 300;
$light_box_initialheight = 100;
$light_box_slideshow = 'false';
$light_box_slideshowstart = 'false';
$light_box_slideshowstop = 'false';
$light_box_slideshowspeed = 2500;
$light_box_slideshowauto = 'false';
?>
<script>
    var lightbox_transition = <?php echo $lightbox_transition; ?>;
    var lightbox_speed = <?php echo $light_box_speed; ?>;
    var lightbox_fadeOut = <?php echo $light_box_fadeout; ?>;
    var lightbox_title = <?php echo $light_box_title; ?>;
    var lightbox_scalePhotos = <?php echo $params->get('light_box_scalephotos') == "1" ? 'true' : 'false'; ?>;
    var lightbox_scrolling = <?php echo $params->get('light_box_scrolling') == "1" ? 'true' : 'false'; ?>;
    var lightbox_opacity = <?php echo ($light_box_opacity / 100) + 0.001; ?>;
    var lightbox_open = <?php echo $light_box_open; ?>;
    var lightbox_returnFocus = 'false';
    var lightbox_trapFocus = <?php echo $params->get('light_box_trapfocus') == "1" ? 'true' : 'false'; ?>;
    var lightbox_fastIframe = <?php echo $params->get('light_box_fastiframe') == "1" ? 'true' : 'false'; ?>;
    var lightbox_preloading = <?php echo $params->get('light_box_preloading') == "1" ? 'true' : 'false'; ?>;
    var lightbox_overlayClose = <?php echo $light_box_overlayclose; ?>;
    var lightbox_escKey = <?php echo $light_box_esckey; ?>;
    var lightbox_arrowKey = <?php echo $light_box_arrowkey; ?>;
    var lightbox_loop = <?php echo $light_box_loop; ?>;
    var lightbox_closeButton = <?php echo $light_box_closebutton; ?>;
    var lightbox_previous = "PREVIOUSE";
    var lightbox_next = "NEXT";
    var lightbox_close = "<?php echo $params->get('light_box_close') == "1" ? 'true' : 'false'; ?>";
    var lightbox_html = "<?php echo $params->get('light_box_html') == "1" ? 'true' : 'false'; ?>";
    var lightbox_photo = 'true';
    var lightbox_width = '<?php
if ($light_box_size_fix == 'false') {
    echo '';
} else {
    echo $light_box_width;
}
?>';
    var lightbox_height = '<?php
if ($light_box_size_fix == 'false') {
    echo '';
} else {
    echo $light_box_height;
}
?>';
    var lightbox_innerWidth = 'true';
    var lightbox_innerHeight = 'true';
    var lightbox_initialWidth = <?php echo $light_box_initialwidth; ?>;
    var lightbox_initialHeight = <?php echo $light_box_initialheight; ?>;
    var lightbox_maxWidth = <?php
if ($light_box_size_fix == 'true') {
    echo 'false';
} else {
    echo $light_box_maxwidth;
}
?>;
    var lightbox_maxHeight = <?php
if ($light_box_size_fix == 'true') {
    echo 'false';
} else {
    echo $light_box_maxwidth;
}
?>;
    var lightbox_slideshow = <?php echo $light_box_slideshow; ?>;
    var lightbox_slideshowSpeed = <?php echo $light_box_slideshowspeed; ?>;
    var lightbox_slideshowAuto = <?php echo $light_box_slideshowauto; ?>;
    var lightbox_slideshowStart = <?php echo $light_box_slideshowstart; ?>;
    var lightbox_slideshowStop = <?php echo $light_box_slideshowstop; ?>;
    var lightbox_fixed = <?php echo $light_box_fixed; ?>;

<?php
$pos = $slider_title_position;
switch ($pos) {
    case 1:
        ?>
            var lightbox_top = '10%';
            var lightbox_bottom = false;
            var lightbox_left = '10%';
            var lightbox_right = false;
        <?php
        break;
    case 1:
        ?>
            var lightbox_top = '10%';
            var lightbox_bottom = false;
            var lightbox_left = '10%';
            var lightbox_right = false;
        <?php
        break;
    case 2:
        ?>
            var lightbox_top = '10%';
            var lightbox_bottom = false;
            var lightbox_left = false;
            var lightbox_right = false;
        <?php
        break;
    case 3:
        ?>
            var lightbox_top = '10%';
            var lightbox_bottom = false;
            var lightbox_left = false;
            var lightbox_right = '10%';
        <?php
        break;
    case 4:
        ?>
            var lightbox_top = false;
            var lightbox_bottom = false;
            var lightbox_left = '10%';
            var lightbox_right = false;
        <?php
        break;
    case 5:
        ?>
            var lightbox_top = false;
            var lightbox_bottom = false;
            var lightbox_left = false;
            var lightbox_right = false;
        <?php
        break;
    case 6:
        ?>
            var lightbox_top = false;
            var lightbox_bottom = false;
            var lightbox_left = false;
            var lightbox_right = '10%';
        <?php
        break;
    case 7:
        ?>
            var lightbox_top = false;
            var lightbox_bottom = '10%';
            var lightbox_left = '10%';
            var lightbox_right = false;
        <?php
        break;
    case 8:
        ?>
            var lightbox_top = false;
            var lightbox_bottom = '10%';
            var lightbox_left = false;
            var lightbox_right = false;
        <?php
        break;
    case 9:
        ?>
            var lightbox_top = false;
            var lightbox_bottom = '10%';
            var lightbox_left = false;
            var lightbox_right = '10%';
        <?php
        break;
}
?>

    var lightbox_reposition = <?php echo $params->get('light_box_reposition') == "1" ? 'true' : 'false'; ?>;
    var lightbox_retinaImage = <?php echo $params->get('light_box_retinaimage') == "1" ? 'true' : 'false'; ?>;
    var lightbox_retinaUrl = <?php echo $params->get('light_box_retinaurl') == "1" ? 'true' : 'false'; ?>;
    var lightbox_retinaSuffix = "<?php echo $params->get('light_box_retinasuffix') == "1" ? 'true' : 'false'; ?>";
</script>
<script src="media/mod_lightbox/js/frontend/custom.js" type="text/javascript"></script>
<script src="media/mod_lightbox/js/frontend/jquery.colorbox.js" type="text/javascript"></script>

<?php
$light_box_style = $params->get("light_box_style");
$doc = JFactory::getDocument();
if ($light_box_style != 6) {
    JHtml::stylesheet('media/mod_lightbox/css/frontend/colorbox-' . $light_box_style . '.css');
}

