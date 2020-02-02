<?php
/**
 * @package Helix Ultimate Framework
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2018 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/

defined ('_JEXEC') or die();

function modChrome_sp_xhtml($module, $params, $attribs)
{

	$moduleTag     = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize = (int) $params->get('bootstrap_size', 0);
	$moduleClass   = $bootstrapSize !== 0 ? ' span' . $bootstrapSize : '';
	$headerTag     = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
	$headerClass   = htmlspecialchars($params->get('header_class', 'sp-module-title'), ENT_COMPAT, 'UTF-8');
	$offcanvas = '';
	
	if ($attribs) {
		foreach ($attribs as $value) {
			if ($value === 'offcanvas') {
				$offcanvas = $offcanvas + $value;
			}
		}
	}


	if ($module->content)
	{
		echo '<' . $moduleTag . ' class="sp-module ' . htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8') . $moduleClass . '">';

			if ($module->showtitle)
			{
				echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
			}

			echo '<div class="sp-module-content">';

			if ($offcanvas !== '') {
				echo '<div class="offcanvas-menu">
        <a href="#" class="close-offcanvas"><span class="fa fa-remove"></span></a>
        <div class="offcanvas-inner">
          <ul class="menu">
						<li class="item-117"><a href="/index.php?option=com_content&amp;view=article&amp;id=6&amp;Itemid=117" >О нас</a></li>
						<li class="item-124"><a href="/index.php?option=com_jshopping&view=category">Категории</a></li>
						<li class="item-113"><a href="/index.php?option=com_jshopping&amp;view=products&amp;task=last&amp;Itemid=113" >Новые поступления</a></li>
						<li class="item-135 menu-deeper menu-parent"><a href="#" >Наши услуги<span class="menu-toggler"></span></a>
							<ul class="menu-child">
								<li class="item-122"><a href="/index.php?option=com_content&amp;view=article&amp;id=9&amp;Itemid=122" >Формирование библиотек</a></li>
								<li class="item-118"><a href="/index.php?option=com_content&amp;view=article&amp;id=5&amp;Itemid=118" >Прием книг</a></li>
								<li class="item-121"><a href="/index.php?option=com_content&amp;view=article&amp;id=8&amp;Itemid=121" >Подарочные карты</a></li>
								<li class="item-116"><a href="/index.php?option=com_content&amp;view=article&amp;id=3&amp;Itemid=116" >Доставка и оплата</a></li>
							</ul>
						</li>
						<li class="item-119"><a href="/index.php?option=com_content&amp;view=article&amp;id=7&amp;Itemid=119" >Контакты</a></li>
					</ul>
        </div>
    	</div>';
			}

  	  echo $module->content;

			echo $offCanvas;
			echo '</div>';
		echo '</' . $moduleTag . '>';
	}
}