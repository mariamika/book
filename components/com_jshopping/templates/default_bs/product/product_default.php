<?php
defined('_JEXEC') or die('Restricted access');
defined('_JEXEC') or die;
$config = JFactory::getConfig();
$jshopConfig = JSFactory::getConfig();
$document = JFactory::getDocument();
$uri = JUri::getInstance();

$productPriceValue = number_format($this->product->getPriceCalculate(), $jshopConfig->decimal_count, $jshopConfig->decimal_symbol, $jshopConfig->thousand_separator);

?>
<?php $product = $this->product?>
<?php include(dirname(__FILE__)."/load.js.php");?>
<div class="jshop productfull">
<form name="product" method="post" action="<?php print $this->action?>" enctype="multipart/form-data" autocomplete="off">

    <?php print $this->_tmp_product_html_start;?>
    <?php if ($this->config->display_button_print) print printContent();?>
    
    <div class="row-fluid">    

        <div class="span5">
            <div class="image_middle">
                <?php print $this->_tmp_product_html_before_image;?>
                <?php if ($product->label_id){?>
                    <div class="product_label">
                        <?php if ($product->_label_image){?>
                            <img src="<?php print $product->_label_image?>" alt="<?php print htmlspecialchars($product->_label_name)?>" />
                        <?php }else{?>
                            <span class="label_name"><?php print $product->_label_name;?></span>
                        <?php }?>
                    </div>
                <?php }?>
                <?php if (count($this->videos)){?>
                    <?php foreach($this->videos as $k=>$video){?>
    					<?php if ($video->video_code){ ?>
    					<div class="video_full no_display" id="hide_video_<?php print $k?>"><?php echo $video->video_code?></div>
    					<?php } else { ?>
    					<a class="video_full no_display" id="hide_video_<?php print $k?>" href=""></a>
    					<?php } ?>
                    <?php } ?>
                <?php }?>
                
                <span id='list_product_image_middle'>
    			<?php print $this->_tmp_product_html_body_image?>
                <?php if(!count($this->images)){?>
                    <img id = "main_image" src = "<?php print $this->image_product_path?>/<?php print $this->noimage?>" alt = "<?php print htmlspecialchars($this->product->name)?>" />
                <?php }?>
                <?php foreach($this->images as $k=>$image){?>
                <a class="lightbox<?php if ($k!=0){?> no_display<?php }?>" id="main_image_full_<?php print $image->image_id?>" href="<?php print $this->image_product_path?>/<?php print $image->image_full;?>" >
                    <img id = "main_image_<?php print $image->image_id?>" src = "<?php print $this->image_product_path?>/<?php print $image->image_name;?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" />
                    <div class="text_zoom">
                        <i class="icon-zoom-in"></i>&nbsp;<?php echo _JSHOP_ZOOM_IMAGE?>
                    </div>
                </a>
                <?php }?>
                </span>
                <?php print $this->_tmp_product_html_after_image;?>
                
                <?php if ($this->config->product_show_manufacturer_logo && $this->product->manufacturer_info->manufacturer_logo!=""){?>
                <div class="manufacturer_logo">
                    <a href="<?php print SEFLink('index.php?option=com_jshopping&controller=manufacturer&task=view&manufacturer_id='.$this->product->product_manufacturer_id, 2);?>">
                        <img src="<?php print $this->config->image_manufs_live_path."/".$this->product->manufacturer_info->manufacturer_logo?>" alt="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" title="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" border="0" />
                    </a>
                </div>
                <?php }?>
            </div>
            <div class="jshop_img_description">
                <?php print $this->_tmp_product_html_before_image_thumb;?>
                <ul id='list_product_image_thumb'>
                <?php if ( (count($this->images)>1) || (count($this->videos) && count($this->images)) ) {?>
                    <?php foreach($this->images as $k=>$image){?>
                    <li>
                        <img class="jshop_img_thumb thumbnail" src="<?php print $this->image_product_path?>/<?php print $image->image_thumb?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" onclick="showImage(<?php print $image->image_id?>)" />
                    </li>
                    <?php }?>
                <?php }?>
                </ul>
                <?php print $this->_tmp_product_html_after_image_thumb;?>
                <?php if (count($this->videos)){?>
                    <?php foreach($this->videos as $k=>$video){?>
    					<?php if ($video->video_code) { ?>
    					<a href="#" id="video_<?php print $k?>" onclick="showVideoCode(this.id);return false;"><img class="jshop_video_thumb" src="<?php print $this->video_image_preview_path."/"; if ($video->video_preview) print $video->video_preview; else print 'video.gif'?>" alt="video" /></a>
    					<?php } else { ?>
                        <a href="<?php print $this->video_product_path?>/<?php print $video->video_name?>" id="video_<?php print $k?>" onclick="showVideo(this.id, '<?php print $this->config->video_product_width;?>', '<?php print $this->config->video_product_height;?>'); return false;"><img class="jshop_video_thumb" src="<?php print $this->video_image_preview_path."/"; if ($video->video_preview) print $video->video_preview; else print 'video.gif'?>" alt="video" /></a>
    					<?php } ?>
                    <?php } ?>
                <?php }?>
                <?php print $this->_tmp_product_html_after_video;?>
            </div>
        </div><!-- /span5 -->

        <div class="span7">

            <h1><?php print $this->product->name?>
                <?php if ($this->config->show_product_code){?> 
                    <span class="jshop_code_prod">(<?php echo _JSHOP_EAN?>: <span id="product_code"><?php print $this->product->getEan();?></span>)</span>
                <?php }?>
            </h1>

            <?php include(dirname(__FILE__)."/ratingandhits.php");?>
			
			<?php if ($this->product->_display_price) : ?>
				<div class="product_price_block" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
					<span class="product_price_label"><?php echo _JSHOP_PRICE; ?>:</span>
					<span id="block_price" class="product_price_block">
						<?php echo(formatprice($this->product->getPriceCalculate())); ?>
						<span itemprop="price" style="display: none;"><?php echo($productPriceValue); ?></span>
						<meta itemprop="priceCurrency" content="<?php echo($jshopConfig->currency_code_iso); ?>" />
					</span>
					<span class="product_price_ext"><?php echo $this->product->_tmp_var_price_ext; ?></span>
					<link itemprop="itemCondition" href="http://schema.org/NewCondition"/>
					<?php if (!empty($this->available)) : ?>
						<link itemprop="availability" href="http://schema.org/OutOfStock" />
					<?php else : ?>
						<link itemprop="availability" href="http://schema.org/InStock" />
					<?php endif; ?>
				</div>
			<?php endif; ?>

            <div class="row-fluid">
                <?php if ($this->product->product_old_price > 0){?>
                <div class="span6 old_price">
                    <?php echo _JSHOP_OLD_PRICE?> <span class="old_price" id="old_price"><?php print formatprice($this->product->product_old_price)?></span>
                    <?php print $this->product->_tmp_var_old_price_ext;?></span>
                </div>
                <?php }?>
                
                <?php if ($this->product->product_price_default > 0 && $this->config->product_list_show_price_default){?>
                    <div class="span6 default_price"><?php echo _JSHOP_DEFAULT_PRICE?>: <span id="pricedefault"><?php print formatprice($this->product->product_price_default)?></span></div>
                <?php }?> 
            </div>       
            
            <?php print $this->product->_tmp_var_bottom_price;?>

            <?php if ($this->product->product_url!=""){?>
            <div class="prod_url">
                <a target="_blank" href="<?php print $this->product->product_url;?>"><?php echo _JSHOP_READ_MORE?></a>
            </div>
            <?php }?>

            <!-- Attributes -->
            <?php if (count($this->attributes)){?>
            <div class="jshop_prod_attributes">
                <ul class="unstyled jshop attributes">
                    <?php foreach($this->attributes as $attribut){?>
            		<li class="row-fluid attributes_<?php print $attribut->attr_id?>">
                        <label class="span4 attributes_title">
                            <span class="attributes_name"><?php print $attribut->attr_name?>:</span>
                        </label>
                        <span class="span8" id='block_attr_sel_<?php print $attribut->attr_id?>'>
                            <?php print $attribut->selects?>
                        </span>
            			<?php if ($attribut->attr_description) {?> 
            			<span id="attributes_<?php print $attribut->attr_id?>"></span>
            			<script type="text/javascript">
            				jQuery("#attributes_<?php print $attribut->attr_id?>").tooltip({
            					txt: '<span class="attributes_description"><?php print $attribut->attr_description; ?></span>'
            				});
            			</script>
            			<?php } ?>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <?php }?>
            <!-- Attributes -->

           <!-- Free Attributes -->
            <?php if (count($this->product->freeattributes)){?>
            <div class="prod_free_attribs">
                <div class="jshop row-fluid">
                <?php foreach($this->product->freeattributes as $freeattribut){?>
                    <label class="freeattributes_title">
        				<span class="span4 attributes_title"><?php print $freeattribut->name;?></span> 
        				<?php if ($freeattribut->required){?><span>*</span><?php }?>
        			</label>
                    <span class="span8"><?php print $freeattribut->input_field;?></span>
        			<?php if ($freeattribut->description) {?> 
        			<span id="freeattribut_<?php print $freeattribut->id?>"></span>
        			<script type="text/javascript">
        				jQuery("#freeattribut_<?php print $freeattribut->id?>").tooltip({
        					txt: '<span class="freeattribut_description"><?php print $freeattribut->description; ?></span>'
        				});
        			</script>
        			<?php } ?>	
                <?php }?>
                </div>
                <?php if ($this->product->freeattribrequire) {?>
                <div class="requiredtext">* <?php echo _JSHOP_REQUIRED?></div>
                <?php }?>
            </div>
            <?php }?>
            <!-- Free Attributes -->

            <!-- Extra fields -->
            <?php if (is_array($this->product->extra_field)){?>
            <ul class="unstyled extra_fields">
            <?php $extra_field_group = "";
            foreach($this->product->extra_field as $extra_field){
                if ($extra_field_group!=$extra_field['groupname']){ 
                    $extra_field_group = $extra_field['groupname'];
                ?>
                <li class='extra_fields_group'>
                    <?php print $extra_field_group?>
                </li>
                <?php }?>
                <li class="row-fluid">
                    <span class="span4 extra_fields_name"><?php print $extra_field['name'];?>:</span>
                    <span class="span8 extra_fields_value"><?php print $extra_field['value'];?></span>
                    <?php if ($extra_field['description']) {?> 
                    <span id="extra_fields_tooltip_<?php print $extra_field["id"]?>"></span>
                    <script type="text/javascript">
                        jQuery("#extra_fields_tooltip_<?php print $extra_field['id']?>").tooltip({
                            txt: '<span class="extra_fields_description"><?php print $extra_field["description"];?></span>'
                        });
                    </script>
                    <?php } ?>              
                </li>
            <?php }?>
            </ul>
            <?php }?>
            <!-- Extra fields -->

            <!-- Manufacturer -->
            <?php if ($this->config->product_show_manufacturer && $this->product->manufacturer_info->name!=""){?>
            <div class="manufacturer_name">
                <?php echo _JSHOP_MANUFACTURER?>: <span><?php print $this->product->manufacturer_info->name?></span>
            </div>
            <?php }?>
            <!-- Manufacturer -->

            <!--  WARNING class collspan3  -->
            <?php if ($this->product->product_is_add_price){?>
            <div class="price_prod_qty_list_head"><?php echo _JSHOP_PRICE_FOR_QTY?></div>
            <div class="price_prod_qty_list">
            <?php foreach($this->product->product_add_prices as $k=>$add_price){?>
        	<div>
            	<span class="qty_from" <?php if ($add_price->product_quantity_finish==0){?>class="collspan3"<?php } ?>>
        			<?php if ($add_price->product_quantity_finish==0) echo _JSHOP_FROM?>
        			<?php print $add_price->product_quantity_start?> <?php print $this->product->product_add_price_unit?>
                </span>
        		<?php if ($add_price->product_quantity_finish > 0){?>
        		<span class="qty_line"> - </span>
        		<?php } ?>
        		<?php if ($add_price->product_quantity_finish > 0){?>
        		<span class="qty_to">
        			<?php print $add_price->product_quantity_finish?> <?php print $this->product->product_add_price_unit?>
        		</span>
        		<?php } ?>
        		<span class="qty_price">            
        			<span id="pricelist_from_<?php print $add_price->product_quantity_start?>"><?php print formatprice($add_price->price)?><?php print $add_price->ext_price?></span> <span class="per_piece">/ <?php print $this->product->product_add_price_unit?></span>
        		</span>
        	</div>
            <?php }?>
            </div>
            <?php }?>
            <!-- WARNING -->
                     
            <?php if ($this->config->show_tax_in_product && $this->product->product_tax > 0){?>
                <span class="taxinfo"><?php print productTaxInfo($this->product->product_tax);?></span>
            <?php }?>
            <?php if ($this->config->show_plus_shipping_in_product){?>
                <span class="plusshippinginfo"><?php print sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span>
            <?php }?>
            <?php if ($this->product->delivery_time != ''){?>
                <div class="deliverytime"><?php echo _JSHOP_DELIVERY_TIME?>: <?php print $this->product->delivery_time?></div>
            <?php }?>
            <?php if ($this->config->product_show_weight && $this->product->product_weight > 0){?>
                <div class="productweight"><?php echo _JSHOP_WEIGHT?>: <span id="block_weight"><?php print formatweight($this->product->getWeight())?></span></div>
            <?php }?>
            
            <?php if ($this->product->product_basic_price_show){?>
                <div class="prod_base_price"><?php echo _JSHOP_BASIC_PRICE?>: <span id="block_basic_price"><?php print formatprice($this->product->product_basic_price_calculate)?></span> / <?php print $this->product->product_basic_price_unit_name;?></div>
            <?php }?>


            <?php if ($this->product->vendor_info){?>
                <div class="vendorinfo">
                    <?php echo _JSHOP_VENDOR?>: <?php print $this->product->vendor_info->shop_name?> (<?php print $this->product->vendor_info->l_name." ".$this->product->vendor_info->f_name;?>),
                    ( 
                    <?php if ($this->config->product_show_vendor_detail){?><a href="<?php print $this->product->vendor_info->urlinfo?>"><?php echo _JSHOP_ABOUT_VENDOR?></a>,<?php }?> 
                    <a href="<?php print $this->product->vendor_info->urllistproducts?>"><?php echo _JSHOP_VIEW_OTHER_VENDOR_PRODUCTS?></a> )
                </div>
            <?php }?>
            
            <?php if (!$this->config->hide_text_product_not_available){ ?>
                <div class = "not_available" id="not_available"><?php print $this->available?></div>
            <?php }?>
            
            <?php if ($this->config->product_show_qty_stock){?>
                <div class="qty_in_stock"><?php echo _JSHOP_QTY_IN_STOCK?>: <span id="product_qty"><?php print sprintQtyInStock($this->product->qty_in_stock);?></span></div>
            <?php }?>
         
            <?php print $this->_tmp_product_html_before_buttons;?>
            <?php if (!$this->hide_buy){?>
                <div class="prod_qty">
                    <?php echo _JSHOP_QUANTITY?>:&nbsp;
                </div>
                <div class="prod_qty_input">
                    <input type="text" name="quantity" id="quantity" onkeyup="reloadPrices();" class="inputbox" disabled value="<?php print $this->default_count_product?>" /><?php print $this->_tmp_qty_unit;?>
                </div>                         
                <div class="prod_buttons" style="<?php print $this->displaybuttons?>">
                    <input type="submit" class="btn btn-success buy" value="<?php echo _JSHOP_ADD_TO_CART?>" onclick="jQuery('#to').val('cart');" />
                    <?php if ($this->enable_wishlist){?>
                    <input type="submit" class="btn wishlist" value="<?php echo _JSHOP_ADD_TO_WISHLIST?>" onclick="jQuery('#to').val('wishlist');" />
                    <?php }?>
                    <?php print $this->_tmp_product_html_buttons;?>
                    <div id="jshop_image_loading" class="no_display"></div>
                </div>
            <?php }?>
            <?php print $this->_tmp_product_html_after_buttons;?>
        </div><!-- /span7 -->

    </div><!-- /row-fluid -->    
        
    <input type="hidden" name="to" id='to' value="cart" />
    <input type="hidden" name="product_id" id="product_id" value="<?php print $this->product->product_id?>" />
    <input type="hidden" name="category_id" id="category_id" value="<?php print $this->category_id?>" />
</form>

<?php print $this->_tmp_product_html_before_demofiles; ?>
<div id="list_product_demofiles"><?php include(dirname(__FILE__)."/demofiles.php");?></div>

<ul class="nav nav-tabs">
    <li class="active"><a href="#specs" data-toggle="tab"><h3><?php echo _JSHOP_DESCR ?></h3></a></li>
    <?php if ($this->allow_review){?>
    <li><a href="#review" data-toggle="tab"><h3><?php echo _JSHOP_REWIEWSPR ?></h3></a></li>
    <?php }?>
    <?php if (count($this->related_prod)){?>
    <li><a href="#related" data-toggle="tab"><h3><?php echo _JSHOP_RELATEDPR ?></h3></a></li>
    <?php } ?>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="specs">
        <div class="jshop_prod_description">
            <?php print $this->product->description; ?>
        </div>
    </div>
    <div class="tab-pane" id="related">
        <?php
            print $this->_tmp_product_html_before_related;
            include(dirname(__FILE__)."/related.php");
        ?>
    </div>
    <?php if ($this->allow_review){?>
    <div class="tab-pane" id="review">
        <?php
            print $this->_tmp_product_html_before_review;
            include(dirname(__FILE__)."/review.php");
        ?>
    </div>
    <?php }?>
</div>

<?php
if ($this->config->product_show_button_back){?>
<div class="button_back">
<input type="button" class="btn back" value="<?php echo _JSHOP_BACK;?>" onclick="<?php print $this->product->button_back_js_click;?>" />
</div>
<?php }?>

<?php print $this->_tmp_product_html_end;?>
</div>