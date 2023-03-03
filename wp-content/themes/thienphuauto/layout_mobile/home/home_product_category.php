<?php 
    //lấy tât cả danh mục sản phẩm
    $parent_id         = '15';
    $product_list_lv_1 = vietnam_garage_vn_get_product_catalog_list($parent_id);
    //print_r($product_list_lv_1);
?>

<div class="container">
    <div class="list-category-home d-flex flex-wrap">
        <?php foreach($product_list_lv_1 as $row): ?>
            <?php
                $catalog_name = $row->name;
                $catalog_id   = $row->term_id;
                $catalog_url  = get_category_link($catalog_id);
                $catalog_image_url = vietnam_garage_vn_get_product_category_thumbnail($catalog_id);
            ?>
        <a class="item-category" href="<?php echo $catalog_url ?>">
            <div class="img-cat">
                <img src="<?php echo $catalog_image_url ?>" alt="<?php echo $catalog_name ?>" width="22" height="22">
            </div>
            <p class="cat-title"><?php echo $catalog_name ?></p>
        </a>
        <?php endforeach; ?>
    </div>
</div>