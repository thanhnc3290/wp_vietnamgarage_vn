<!-- <div class="group-product-category js-product-load js-product-load js-product-460 loaded" data-catid="460">
    <div class="banner-category-home d-flex">
        <a href="" class="item">
            <img src="/template/giaodien_2022/images/banner-category-1.png" alt="">
        </a>
    </div>
</div> -->

<?php 
    //lấy tât cả danh mục sản phẩm
    $parent_id         = '15';
    $catalog_list_lv_1 = vietnam_garage_vn_get_product_catalog_list($parent_id);
?>
<?php foreach($catalog_list_lv_1 as $row): ?>
<?php
    $catalog_url  = get_category_link($row->term_id);
    $catalog_name = $row->name;
    $catalog_id   = $row->term_id;

    $catalog_list_lv_2 = vietnam_garage_vn_get_product_catalog_list($row->term_id);
    $count_catalog_list_lv_2 = '0';

    // Lấy Banner cho danh mục nếu có
    $catalog_desc   = $row->description;
    $data_gallery_of_catalog    = explode('[gallery ids=',$catalog_desc);
    $catalog_gallery_short_code = '';
    $catalog_gallery_ids        = array();
    if(isset($data_gallery_of_catalog['1'])){
        if(strlen($data_gallery_of_catalog['1']) > '0'){
            $catalog_gallery_short_code = '[gallery ids='.$data_gallery_of_catalog['1'];
            $ids_of_image_in_galery     = str_replace(array('[gallery ids="','"]'),'',$catalog_gallery_short_code);
            
            $ids_list = explode(',',$ids_of_image_in_galery);
            if(count($ids_list) > '0'){
                foreach($ids_list as $gallery_img_id){
                    $catalog_gallery_ids[] = $gallery_img_id;
                }
            }
        }
    }
?>

<?php if(count($catalog_gallery_ids) > '0'): ?>
    <div class="group-product-category js-product-load js-product-load js-product-460 loaded" data-catid="460">
        <div class="banner-category-home d-flex">
        <?php $count_gallery = '0'; ?>
        <?php foreach($catalog_gallery_ids as $img_id): ?>
            <?php $count_gallery++;?>
            <?php if($count_gallery == '1'): ?>
                <?php $banner_image_link = vietnam_garage_vn_get_image_url($img_id); ?>
            <a href="<?php echo $catalog_url ?>" class="item"> 
                <img border="0" src="<?php echo $banner_image_link ?>" width="594" height="200"> 
            </a>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>


<div class="group-product-category js-product-load js-product-load js-product-<?php echo $catalog_id ?> loaded" data-catid="<?php echo $catalog_id ?>">
    <div class="title-category d-flex align-items space-between">
        <h2 class="name">
            <a href="<?php echo $catalog_url ?>"><?php echo $catalog_name ?></a>
        </h2>
        <a href="<?php echo $catalog_url ?>" class="more-all">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
    </div>
    <div class="product-list d-flex" id="js-category-homepage-<?php echo $catalog_id ?>">
        
        <?php
             //tag_id của chuyên mục bài viết

             $args = array(
                 'post_type' => 'product',
                 'product_cat' => $row->slug,
                 'orderby' => 'id',
                 'posts_per_page'        => '10',
             );
             $product_list = new WP_query($args);
             $count_product_list = '0';
             global $wp_query; 
             $wp_query->in_the_loop = true;
             $count_product_list = '0';
        ?>
        <?php while ($product_list->have_posts()) : $product_list->the_post(); ?>
            <?php 
                $product_id = get_the_id();
                //Lấy thông tin sản phẩm từ Woocommerce
                $product_info                   = wc_get_product( $product_id );
                $product_image_link             = $product_info->get_image('thumbnail');

                $product_price                  = format_price($product_info->get_price());
                $product_price_regular_price    = format_price($product_info->get_regular_price());
                $product_price_sale_price       = format_price($product_info->get_sale_price());
                $product_desc                   = short_desc('70',$product_info->short_description);

                //lấy phần trăm giảm giá
                $input_regular_price            = $product_info->get_regular_price();
                $input_sale_price               = $product_info->get_sale_price();
                $product_sale_percent           = get_sale_percent($input_regular_price, $input_sale_price);
            ?>
        <div class="product-item">
            <div class="product-img">
                <a href="<?php the_permalink() ?>"><?php echo $product_image_link ?></a>
                <?php if(strlen($product_sale_percent) > '0'): ?>
                <div class="sale"><?php echo $product_sale_percent; ?></div>
                <?php endif; ?>
            </div>
            <div class="product-info">
                <h2 class="product-title">
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h2>
                <div class="product-price">
                    <?php if($product_price_regular_price !== no_price()): ?>
                    <del class="old-price"><?php echo $product_price_regular_price ?></del>
                    <span class="item-price"><?php echo $product_price_sale_price ?></span>
                    <?php else: ?>
                    <del class="old-price"></del>
                    <span class="item-price"><?php echo $product_price_regular_price ?></span>
                    <?php endif; ?>
                </div>
                <div class="product-summary line-clamp-1"><?php echo $product_desc ?></div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>

<?php endforeach; ?>