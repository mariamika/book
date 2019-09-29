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
JHtml::_('behavior.formvalidation');
JHtml::_('bootstrap.tooltip');
JHtml::_('formbehavior.chosen', 'select');
?>
<div class="slider-options-head">
    <div style="float: left;">
        <div><a href="http://huge-it.com/joomla-extensions-slider-user-manual/" target="_blank">User Manual</a></div>
        <div>This feature is available in Pro version. To use it <a href="http://huge-it.com/joomla-slider/" target="_blank">get Full version.</a></div>
    </div>
    <div style="float: right;margin-bottom: 15px;">
        <a style= "position: relative;right: 50px;"class="header-logo-text" href="http://huge-it.com/joomla-slider/" target="_blank">
            <div><img width="250px" src="<?php echo JUri::root()?>media/com_slider/images/huge-it1.png" /></div>
        </a>
    </div>
</div>
<style>
.element {
	position: relative;
	width:93%; 
	margin:5px 0px 5px 0px;
	padding:2%;
	clear:both;
	overflow: hidden;
	border:1px solid #DEDEDE;
	background:#F9F9F9;
}
.element > div {
	display:table-cell;
}
.element div.left-block {
	padding-right:10px;
}
.element div.left-block .main-image-block {
	clear:both; 
}
.element div.left-block .thumbs-block {
	position:relative;
	margin-top:10px;
}
.element div.left-block .thumbs-block ul {
	width:240px; 
	height:auto;
	display:table;
	margin:0px;
	padding:0px;
	list-style:none;
}
.element div.left-block .thumbs-block ul li {
	margin:0px 3px 0px 2px;
	padding:0px;
	width:75px; 
	height:75px; 
	float:left;
}
.element div.left-block .thumbs-block ul li a {
	display:block;
	width:75px; 
	height:75px; 
}
.element div.left-block .thumbs-block ul li a img {
	width:75px; 
	height:75px; 
}
.element div.right-block {
	vertical-align:top;
}
.element div.right-block > div {
	width:100%;
	padding-bottom:10px;
	margin-top:10px;
}
.element div.right-block > div:last-child {
	background:none;
}
.element div.right-block .title-block  {
	margin-top:3px;
}
.element div.right-block .title-block h3 {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:18px !important;
	line-height:18px !important;
	color:#0074A2;
}
.element div.right-block .description-block p,.element div.right-block .description-block * {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:14px;
	color:#555555;
}
.element div.right-block .description-block h1,
.element div.right-block .description-block h2,
.element div.right-block .description-block h3,
.element div.right-block .description-block h4,
.element div.right-block .description-block h5,
.element div.right-block .description-block h6,
.element div.right-block .description-block p, 
.element div.right-block .description-block strong,
.element div.right-block .description-block span {
	padding:2px !important;
	margin:0px !important;
}
.element div.right-block .description-block ul,
.element div.right-block .description-block li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}
.element .button-block {
	position:relative;
}
.element div.right-block .button-block a,.element div.right-block .button-block a:link,.element div.right-block .button-block a:visited {
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#2EA2CD;
	color:#FFFFFF;
	font-size:14;
	text-decoration:none;
}
.element div.right-block .button-block a:hover,.pupup-elemen.element div.right-block .button-block a:focus,.element div.right-block .button-block a:active {
	background:#0074A2;
	color:#FFFFFF;
}
.button-block a {
	float: right;
}
.description-block p {
	text-align: justify !important;
}
@media only screen and (max-width: 767px) {
	.element > div {
		display:block;
		width:100%;
		clear:both;
	}
	.element div.left-block {
		padding-right:0px;
	}
	.element div.left-block .main-image-block {
		clear:both;
		width:100%; 
	}
	.element div.left-block .main-image-block img {
		width:100% !important;  
		height:auto;
	}
	.element div.left-block .thumbs-block ul {
		width:100%; 
	}
}
</style>
<script type="text/javascript">
    Joomla.submitbutton = function(task)
    {
        if (task == 'application.cancel' || document.formvalidator.isValid(document.id('application-form')))
        {
            Joomla.submitform(task, document.getElementById('application-form'));
        }
    }
</script>
<form action="<?php echo JRoute::_('index.php?option=com_slider'); ?>" id="application-form" method="post" name="adminForm" class="form-validate">
   
<div class="element hugeitmicro-item">
    <div class="left-block">
            <div class="main-image-block">
                <a href="<?php echo JUri::root(). 'media/com_slider/images/lightbox_.png'; ?>" rel="content"><img src="<?php echo JUri::root(). 'media/com_slider/images/lightbox_.png'; ?>"></a>
            </div>
    </div>
    <div class="right-block">
            <div class="title-block"><h3>Joomla Lightbox</h3></div>
            <div class="description-block">
                    <p>Joomla Lightbox is a perfect tool for viewing photos. It is created especially for simplification of using, permits you to view larger version of images and giving an interesting design. With the help of slideshow and various styles, betray a unique image to your website.</p>
            </div>			  				
            <div class="button-block">
                    <a href="http://huge-it.com/joomla-lightbox/" target="_blank">View Plugin</a>
            </div>
    </div>
</div>
 
    <div>
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
       
</form>