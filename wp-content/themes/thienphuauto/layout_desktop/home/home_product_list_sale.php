
<?php
    //tag_id của chuyên mục bài viết
    $san_pham_khuyen_mai_category_id    = '16';
    $san_pham_khuyen_mai_category_url   = get_category_link($san_pham_khuyen_mai_category_id);

    $args = array(
        'post_type' => 'product',
        //lấy product trong danh mục sản phẩm khuyến mại, khoá key bằng slug
        'product_cat' => 'san-pham-khuyen-mai',
        'orderby' => 'id',
        'posts_per_page'        => '10',
    );
    $product_list = new WP_query($args);
    $count_product_list = '0';
    global $wp_query; 
    $wp_query->in_the_loop = true;
    $count_product_list = '0';
?>

<div class="product-saleoff">
    <div class="title d-flex align-items space-between">
        <h2 class="name">
            <a href="<?php echo $san_pham_khuyen_mai_category_url ?>" class="d-flex align-items">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_hot.png" alt="">
                Sản phẩm khuyến mại
            </a>
        </h2>
        <a href="<?php echo $san_pham_khuyen_mai_category_url; ?>" class="more-all">
            Xem tất cả
            <i class="fa fa-angle-double-right"></i>
        </a>
    </div>
    <div class="product-list owl-carousel owl-theme custom-nav owl-loaded owl-drag" id="js-product-saleoff">
        <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(-476px, 0px, 0px); transition: all 1.5s ease 0s; width: 1666px;">
                <?php while ($product_list->have_posts()) : $product_list->the_post(); ?>
                    <?php $count_product_list++; ?>
                    <?php if($count_product_list <= '10'):  ?>
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
                <div class="owl-item active" style="width: 228px; margin-right: 10px;">
                    <div class="product-item">
                        <div class="product-img">
                            <a href="<?php the_permalink() ?>">
                                <?php echo $product_image_link ?>
                            </a>
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
                </div>
                    <?php endif; ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="owl-nav">
            <button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left" ria-hidden="true"></i></button>
            <button type="button" role="presentation" class="owl-next disabled"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        </div>
        <div class="owl-dots disabled"></div>
        <div class="owl-thumbs"></div>
    </div>
</div>