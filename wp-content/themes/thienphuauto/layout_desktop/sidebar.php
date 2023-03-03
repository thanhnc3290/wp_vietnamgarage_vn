
<?php 
    //lấy tât cả danh mục sản phẩm
    $parent_id         = '15';
    $product_list_lv_1 = vietnam_garage_vn_get_product_catalog_list($parent_id);
    //print_r($product_list_lv_1);
    $count_catalog_sidebar = '0';
?>
<div id="category-fixed" class="animated slideInLeft" style="display: block;">
<?php foreach($product_list_lv_1 as $row): ?>
    <?php
        $catalog_url    = get_category_link($row->term_id);
        $catalog_name   = $row->name;
        $catalog_image  = vietnam_garage_vn_get_product_catalog_thumbnail_url($row->term_id);  
        $catalog_id     = $row->term_id;
        $count_catalog_sidebar++;
    ?>

    <a href="<?php echo $catalog_url ?>" <?php if($count_catalog_sidebar == '1'): ?>class="active"<?php endif; ?>>
        <img src="<?php echo $catalog_image ?>" alt="<?php echo $catalog_name ?>" width="22" height="22">
        <span class="title"><?php echo $catalog_name ?></span>
    </a>
<?php endforeach; ?>
</div>
