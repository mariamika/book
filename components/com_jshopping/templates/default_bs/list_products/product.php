<?php defined( '_JEXEC' ) or die(); ?>
<?php echo $product->_tmp_var_start?>
<div class="<?php if ($this->count_product_to_row == 1) echo "one_in_row "; ?>product productitem_<?php echo $product->product_id?>">

    <?php if ($this->count_product_to_row == 1) echo "<div class='row-fluid'>"; ?>

    <div class="<?php if ($this->count_product_to_row == 1) echo "span4"; ?> image">
        <?php if ($product->image){?>
        <div class="image_block">
		<?php print $product->_tmp_var_image_block;?>
            <?php if ($product->label_id){?>
                <div class="product_label">
                    <?php if ($product->_label_image){?>
                        <img src="<?php echo $product->_label_image?>" alt="<?php echo htmlspecialchars($product->_label_name)?>" />
                    <?php }else{?>
                        <span class="label_name"><?php echo $product->_label_name;?></span>
                    <?php }?>
                </div>
            <?php }?>
            <a href="<?php echo $product->product_link?>">
                <img class="jshop_img" src="<?php echo $product->image?>" alt="<?php echo htmlspecialchars($product->name);?>" />
            </a>
        </div>
        <?php }?>
        <?php echo $product->_tmp_var_bottom_foto;?>
    </div>

    <h2 class="product_title <?php if ($this->count_product_to_row == 1) echo "hidden"; ?>">
        <a href="<?php echo $product->product_link?>"><?php echo $product->name?></a>
        <?php if ($this->config->product_list_show_product_code){?>
        <span class="jshop_code_prod">(<?php echo _JSHOP_EAN?>: <span><?php echo $product->product_ean;?></span>)</span>
        <?php }?>
    </h2>

    <div class="<?php if ($this->count_product_to_row == 1) echo "span6"; ?> mainblock">

        <?php if ($this->count_product_to_row == 1){ ?>
            <h2 class="product_title">
                <a href="<?php echo $product->product_link?>"><?php echo $product->name?></a>
                <?php if ($this->config->product_list_show_product_code){?>
                <span class="jshop_code_prod">(<?php echo _JSHOP_EAN?>: <span><?php echo $product->product_ean;?></span>)</span>
                <?php }?>
            </h2>
        <?php } ?>

        <?php if ($this->allow_review){?>
        <div class="review_mark">
            <?php echo showMarkStar($product->average_rating);?>
            <div class="count_commentar">
                <?php echo sprintf(_JSHOP_X_COMENTAR, $product->reviews_count);?>
            </div>
        </div>
        <?php }?>

        <div class="wrap-desc-product">
            <div class="desc">
                <?php if (is_array($product->extra_field)){?>
                    <ul class="unstyled extra_fields">
                    <?php foreach($product->extra_field as $extra_field){?>
                        <li>
                            <span class="text-right extra_fields_name"><?php echo $extra_field['name'];?>:</span>
                            <span class="text-left extra_fields_value">&nbsp;&nbsp;<?php echo $extra_field['value']; ?></span>
                        </li>
                    <?php }?>
                    </ul>
                <?php }?>
                <div class="description">
                    <?php echo $product->short_description?>
                </div>
            </div>
            <div class="price">
                <div class="jshop_price_block">
                    <?php if ($product->_display_price){?>
                        <div class="jshop_price"><?php if ($this->config->product_list_show_price_description) echo _JSHOP_PRICE.": ";?>
                            <?php if ($product->show_price_from) echo _JSHOP_FROM." ";?>
                            <span><?php echo formatprice($product->product_price);?></span>
                        </div>
                    <?php }?>
                    <?php echo $product->_tmp_var_bottom_price;?>
                    <?php if ($product->product_old_price > 0){?>
                        <div class="old_price"><?php if ($this->config->product_list_show_price_description) echo _JSHOP_OLD_PRICE.": ";?>
                            <span><?php echo formatprice($product->product_old_price)?></span>
                        </div>
                    <?php }?>
                    <?php print $product->_tmp_var_bottom_old_price;?>
                </div>
            </div>
        </div>
        
        <?php if ($product->manufacturer->name){?>
            <div class="manufacturer_name"><?php echo _JSHOP_MANUFACTURER?>: <span><?php echo $product->manufacturer->name?></span></div>
        <?php }?>

        

        <?php if ($product->product_quantity <=0 && !$this->config->hide_text_product_not_available){?>
            <div class="not_available"><?php echo _JSHOP_PRODUCT_NOT_AVAILABLE?></div>
        <?php }?>

        <?php if ($product->product_price_default > 0 && $this->config->product_list_show_price_default){?>
            <div class="default_price"><?php echo _JSHOP_DEFAULT_PRICE.": ";?><span><?php echo formatprice($product->product_price_default)?></span></div>
        <?php }?>

        <?php if ($this->config->show_tax_in_product && $product->tax > 0){?>
            <span class="taxinfo"><?php echo productTaxInfo($product->tax);?></span>
        <?php }?>
        <?php if ($this->config->show_plus_shipping_in_product){?>
            <span class="plusshippinginfo"><?php echo sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span>
        <?php }?>
        <?php if ($product->basic_price_info['price_show']){?>
            <div class="base_price"><?php echo _JSHOP_BASIC_PRICE?>: <?php if ($product->show_price_from) echo _JSHOP_FROM;?> <span><?php echo formatprice($product->basic_price_info['basic_price'])?> / <?php echo $product->basic_price_info['name'];?></span></div>
        <?php }?>
        <?php if ($this->config->product_list_show_weight && $product->product_weight > 0){?>
            <div class="productweight"><?php echo _JSHOP_WEIGHT?>.: <span><?php echo formatweight($product->product_weight)?></span></div>
        <?php }?>
        <?php if ($product->delivery_time != ''){?>
            <div class="deliverytime"><?php echo _JSHOP_DELIVERY_TIME?>: <span><?php echo $product->delivery_time?></span></div>
        <?php }?>

        <?php if ($product->vendor){?>
            <div class="vendorinfo"><?php echo _JSHOP_VENDOR?>: <a href="<?php echo $product->vendor->products?>"><?php echo $product->vendor->shop_name?></a></div>
        <?php }?>
        <?php if ($this->config->product_list_show_qty_stock){?>
            <div class="qty_in_stock"><?php echo _JSHOP_QTY_IN_STOCK?>: <span><?php echo sprintQtyInStock($product->qty_in_stock)?></span></div>
        <?php }?>
        
    </div>
        <?php echo $product->_tmp_var_top_buttons;?>
        <div class="buttons my_btn_styles">
            <div class="btn-buy">
                <?php if ($product->buy_link){?>
                    <a class="btn btn-success button_buy" href="<?php echo $product->buy_link?>"><?php echo _JSHOP_BUY?></a> &nbsp;
                <?php }?>
            </div>
            <div class="link-info">
                    <a href="<?php echo $product->product_link?>"><img src="<?php print_r($this->config->live_path);?>images/info.svg" alt="info" class="info_svg"/></a>
                <?php echo $product->_tmp_var_buttons;?>
            </div>
        </div>
        <?php echo $product->_tmp_var_bottom_buttons;?>

    <?php if ($this->count_product_to_row == 1) echo "</div>"; ?>
</div>
<?php echo $product->_tmp_var_end?>