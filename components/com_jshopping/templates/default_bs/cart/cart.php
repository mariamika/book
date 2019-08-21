<?php 
	defined('_JEXEC') or die();
	$countprod = count($this->products);
?>
<div class="jshop">
<h2 class="headingcart" ><?php print _JSHOP_YOUR_CART ?></h2>
  <form action="<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=refresh')?>" method="post" name="updateCart">
    <?php print $this->_tmp_ext_html_cart_start?>
    <?php if ($countprod>0){?>
    <div class="hidden-phone">
      <table class="table table-bordered table-striped">
        <tr>
          <th width="20%" style="text-align:center"><?php print _JSHOP_IMAGE?></th>
          <th style="text-align:center"><?php print _JSHOP_ITEM?></th>    
          <th width="15%" style="text-align:center"><?php print _JSHOP_SINGLEPRICE?></th>
          <th width="15%" style="text-align:center"><?php print _JSHOP_NUMBER?></th>
          <th width="15%" style="text-align:center"><?php print _JSHOP_PRICE_TOTAL?></th>
          <th width="10%" style="text-align:center"><?php print _JSHOP_REMOVE?></th>
        </tr>
        <?php 
        $i=1;   
        foreach($this->products as $key_id=>$prod){
        ?> 
        <tr class="jshop_prod_cart <?php if ($i%2==0) print "even"; else print "odd"?>">
          <td class="jshop_img_description_center">
            <a href="<?php print $prod['href']?>">
              <img src="<?php print $this->image_product_path ?>/<?php if ($prod['thumb_image']) print $prod['thumb_image']; else print $this->no_image; ?>" alt="<?php print htmlspecialchars($prod['product_name']);?>" class="jshop_img" />
            </a>
          </td>
          <td class="product_name">
              <a href="<?php print $prod['href']?>"><?php print $prod['product_name']?></a>
              <?php if ($this->config->show_product_code_in_cart){?>
              <span class="jshop_code_prod">(<?php print $prod['ean']?>)</span>
              <?php }?>
              <?php if ($prod['manufacturer']!=''){?>
              <div class="manufacturer"><?php print _JSHOP_MANUFACTURER?>: <span><?php print $prod['manufacturer']?></span></div>
              <?php }?>
              <?php print sprintAtributeInCart($prod['attributes_value']);?>
              <?php print sprintFreeAtributeInCart($prod['free_attributes_value']);?>
              <?php print sprintFreeExtraFiledsInCart($prod['extra_fields']);?>
              <?php print $prod['_ext_attribute_html']?>
          </td>
          <td style="text-align:center">
              <?php print formatprice($prod['price'])?>
              <?php print $prod['_ext_price_html']?>
              <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
                  <span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
              <?php }?>
              <?php if ($this->config->cart_basic_price_show && $prod['basicprice']>0){?>
                  <div class="basic_price"><?php print _JSHOP_BASIC_PRICE?>: <span><?php print sprintBasicPrice($prod);?></span></div>
              <?php }?>
          </td>
          <td style="text-align:center">
            <!--input type="text" name="quantity[<?php print $key_id ?>]" value="<?php print $prod['quantity'] ?>" class="inputbox" style="width: 60px" /-->
            <?php print $prod['quantity'];?>
            <!--span class = "cart_reload">
              <img style="cursor:pointer" src="<?php print $this->image_path ?>/images/bs/reload.png" title="<?php print _JSHOP_UPDATE_CART ?>" alt = "<?php print _JSHOP_UPDATE_CART ?>" onclick="document.updateCart.submit();" />
            </span-->
          </td>
          <td style="text-align:center">
              <?php print formatprice($prod['price']*$prod['quantity']); ?>
              <?php print $prod['_ext_price_total_html']?>
              <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
                  <span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
              <?php }?>
          </td>
          <td style="text-align:center">
            <a class="remove" href="<?php print $prod['href_delete']?>" onclick="return confirm('<?php print _JSHOP_CONFIRM_REMOVE?>')"><img src = "<?php print $this->image_path ?>images/bs/remove.svg" alt = "<?php print _JSHOP_DELETE?>" title = "<?php print _JSHOP_DELETE?>" /></a>
          </td>
        </tr>
        <?php 
        $i++;
        } 
        ?>
      </table>
    </div>

    <div class="visible-phone" style="display:none;">
      <table class="table table-bordered table-striped">
        <?php 
        $i=1;   
        foreach($this->products as $key_id=>$prod){
        ?> 
        <tr class="jshop_prod_cart <?php if ($i%2==0) print "even"; else print "odd"?>">
          <td>
            <a class="jshop_cart_product_name" href="<?php print $prod['href']?>"><?php print $prod['product_name']?></a>
            <div class="jshop_cart_img">
              <a href="<?php print $prod['href']?>">
                <img src="<?php print $this->image_product_path ?>/<?php if ($prod['thumb_image']) print $prod['thumb_image']; else print $this->no_image; ?>" alt="<?php print htmlspecialchars($prod['product_name']);?>" class="jshop_img" />
              </a>
            </div>
            <?php if ($this->config->show_product_code_in_cart){?>
            <span class="jshop_code_prod">(<?php print $prod['ean']?>)</span>
            <?php }?>

            <?php if ($prod['manufacturer']!=''){?>
            <div class="manufacturer"><?php print _JSHOP_MANUFACTURER?>: <span><?php print $prod['manufacturer']?></span></div>
            <?php }?>

            <?php print sprintAtributeInCart($prod['attributes_value']);?>
            <?php print sprintFreeAtributeInCart($prod['free_attributes_value']);?>
            <?php print sprintFreeExtraFiledsInCart($prod['extra_fields']);?>
            <?php print $prod['_ext_attribute_html']?>
          </td>
          <td class="cart_order_info">
            <div class="jshop_cart_price">
              <div class="cart_label"><?php print _JSHOP_SINGLEPRICE?></div>
              <?php print formatprice($prod['price'])?>
              <?php print $prod['_ext_price_html']?>
              <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
                  <span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
              <?php }?>
              <?php if ($this->config->cart_basic_price_show && $prod['basicprice']>0){?>
                  <div class="basic_price"><?php print _JSHOP_BASIC_PRICE?>: <span><?php print sprintBasicPrice($prod);?></span></div>
              <?php }?>
            </div>
          
            <div class="jshop_cart_price_total">
              <div class="cart_label"><?php print _JSHOP_PRICE_TOTAL?></div>
              <?php print formatprice($prod['price']*$prod['quantity']); ?>
              <?php print $prod['_ext_price_total_html']?>
              <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0){?>
                  <span class="taxinfo"><?php print productTaxInfo($prod['tax']);?></span>
              <?php }?>
            </div>

			
            <div class="jshop_cart_prod_delete">
              <a href="<?php print $prod['href_delete']?>" onclick="return confirm('<?php print _JSHOP_CONFIRM_REMOVE?>')"><img src = "<?php print $this->image_path ?>images/remove.png" alt = "<?php print _JSHOP_DELETE?>" title = "<?php print _JSHOP_DELETE?>" /><?php print _JSHOP_REMOVE?></a>
            </div>              
          </td>
        </tr>
        <?php 
        $i++;
        } 
        ?>
      </table>
    </div>
    
    <?php if ($this->config->show_weight_order){?>  
    <div class="weightorder">
        <?php print _JSHOP_WEIGHT_PRODUCTS?>: <span><?php print formatweight($this->weight);?></span>
    </div>
    <?php }?>  

    <?php if ($this->config->summ_null_shipping>0){?>
    <div class="shippingfree">
        <?php printf(_JSHOP_FROM_PRICE_SHIPPING_FREE, formatprice($this->config->summ_null_shipping, null, 1));?>
    </div>
    <?php } ?>
    
    <div class="cartdescr"><?php print $this->cartdescr?></div>
    <br/>

    <ul class="unstyled jshop_subtotal">
      <?php if (!$this->hide_subtotal){?>
      <li>
        <span class="name"><?php print _JSHOP_SUBTOTAL ?>:</span>
        <span class="value"><?php print formatprice($this->summ);?><?php print $this->_tmp_ext_subtotal?></span>
      </li>
      <?php } ?>
      <?php if ($this->discount > 0){ ?>
      <li>
        <span class="name"><?php print _JSHOP_RABATT_VALUE ?>:</span>
        <span class="value"><?php print formatprice(-$this->discount);?><?php print $this->_tmp_ext_discount?></span>
      </li>
      <?php } ?>
      <?php if (!$this->config->hide_tax){?>
        <?php foreach($this->tax_list as $percent=>$value){ ?>
        <li>
          <span class="name"><?php print displayTotalCartTaxName();?>
            <?php if ($this->show_percent_tax) print formattax($percent)."%"?>:</span>
          <span class="value"><?php print formatprice($value);?><?php print $this->_tmp_ext_tax[$percent]?></span>
        </li>
        <?php } ?>
      <?php } ?>
      <li>
        <span class="name"><?php print _JSHOP_PRICE_TOTAL ?>:</span>
        <span class="value"><?php print formatprice($this->fullsumm)?><?php print $this->_tmp_ext_total?></span>
        <?php if ($this->config->show_plus_shipping_in_product){?>  
        <br/><span class="plusshippinginfo"><?php print sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span> 
        <?php }?>
      </li>

      <?php if ($this->free_discount > 0){?> 
      <div calss="text-right">    
        <span class="free_discount"><?php print _JSHOP_FREE_DISCOUNT;?>: <?php print formatprice($this->free_discount); ?></span>  
      </div>
      <?php }?>
    </ul>
    <?php }else{?>
    <div class="cart_empty_text"><?php print _JSHOP_CART_EMPTY?></div>
    <?php }?>

    <div class="checkout" id="checkout">
      <div class="btn-group">
        <a class="btn back_to_shop" href="<?php print $this->href_shop ?>">
        <i class="icon-arrow-left"></i>
        <?php print _JSHOP_BACK_TO_SHOP ?>
        </a>

        <?php if ($countprod>0){?>
        <a class="btn btn-success" href="<?php print $this->href_checkout ?>&Itemid=153">
        <?php print _JSHOP_CHECKOUT ?>
        <i class="icon-arrow-right"></i>
        </a>
        <?php }?>
      </div>
    </div>
  </form>
<br />
<br />
  <?php print $this->_tmp_ext_html_before_discount?>
  <?php if ($this->use_rabatt && $countprod>0){ ?>
  <form class="form-inline" name="rabatt" method="post" action="<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=discountsave')?>">
        <?php print _JSHOP_RABATT ?>
        <input type = "text" class = "inputbox" name = "rabatt" value = "" />
        <input type = "submit" class = "btn" value = "<?php print _JSHOP_RABATT_ACTIVE ?>" />
  </form>
  <?php }?>
</div>