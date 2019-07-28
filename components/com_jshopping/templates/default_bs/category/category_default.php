<?php defined( '_JEXEC' ) or die(); ?>
<div class="jshop">
<h1><?php echo $this->category->name?></h1>
<?php echo $this->category->description?>

<div class="jshop_list_category">

<?php if (count($this->categories)){ ?>
<div class = "jshop list_category">
    <?php foreach($this->categories as $k=>$category){?>
        <?php if ($k%$this->count_category_to_row==0) echo '<div class="nvg_clear"></div><div class="row-fluid str_category">'; ?>
        <div class="span<?php echo round(12/$this->count_category_to_row, 0)?> jshop_categ wrap_categ">

          <div class="category">
            <div class="image">
              <a href = "<?php echo $category->category_link;?>">
                <img class="jshop_img my_categ" 
                  src="<?php print_r($this->config->live_path);?>/images/book.svg" 
                  alt="category"  />
              </a>
            </div>
            <h2 class="category_title"><a class = "product_link" href = "<?php echo $category->category_link?>"><?php echo $category->name?></a></h2>
          </div>
 
        </div>    
        <?php if ($k%$this->count_category_to_row==$this->count_category_to_row-1) echo '</div>'; ?>
    <?php } ?>
        <?php if ($k%$this->count_category_to_row!=$this->count_category_to_row-1) echo '</div>'; ?>
</div>
<?php }?>

</div>
<?php include(dirname(__FILE__)."/products.php");?>
</div>
<script type="text/javascript">
  var hg = new Array();
  //вычисляю наибольшую высоту блока
  jQuery(".mainblock").each(function(){
    hg.push(parseInt(jQuery(this).css("height")));
  });
  //Делаю блоки одной высоты
  var max_hg = Math.max.apply(0, hg);
  jQuery(".mainblock").each(function(){
    jQuery(this).css("height", max_hg);
  });
    var hg2 = new Array();
  //вычисляю наибольшую высоту блока
  jQuery(".product_title").each(function(){
    hg2.push(parseInt(jQuery(this).css("height")));
  });
  //Делаю блоки одной высоты
  var max_hg2 = Math.max.apply(0, hg2);
  jQuery(".product_title").each(function(){
    jQuery(this).css("height", max_hg2);
  });
</script>