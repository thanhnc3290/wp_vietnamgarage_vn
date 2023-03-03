<?php 
    $product_id     = get_the_id();
    $product_info   = wc_get_product($product_id);
    $product_name   = $product_info->name;

    //trạng thái còn hàng / hết hàng
    $product_stock = '';
    if($product_info->manage_stock == '1'){
        if($product_info->stock_quantity < '1'){
            $product_stock = 'Hết Hàng';
        }else{
            $product_stock = 'Còn Hàng';
        }
    }else{
        if($product_info->stock_status == 'outofstock'){
            $product_stock = 'Hết Hàng';
        }
        if($product_info->stock_status == 'onbackorder'){
            $product_stock = 'Chờ Hàng';
        }
        if($product_info->stock_status == 'instock'){
            $product_stock = 'Còn Hàng';
        }
    }

    // mã sku
    $product_sku_code = '';
    if(strlen($product_info->sku) > '0'){
        $product_sku_code = $product_info->sku;
    }

    //thời gian bảo hành
    $product_bao_hanh = '';
    if(strlen($product_info->get_attribute('pa_bao-hanh')) > '0'){
        $product_bao_hanh = $product_info->get_attribute('pa_bao-hanh');
    }

    //lấy nội dung mô tả sản phẩm
    $product_desc           = $product_info->short_description;
    $product_content        = $product_info->description;

    //lấy giá sản phẩm
    $product_price                  = format_price($product_info->get_price());
    $product_price_regular_price    = format_price($product_info->get_regular_price());
    $product_price_sale_price       = format_price($product_info->get_sale_price());

    //lấy phần trăm giảm giá
    $input_regular_price            = $product_info->get_regular_price();
    $input_sale_price               = $product_info->get_sale_price();
    $product_sale_percent           = get_sale_percent($input_regular_price, $input_sale_price);

    //lấy nội dung khuyến mại
    $product_gift                   = $product_info->purchase_note;

    //lấy ảnh sản phẩm
    $product_image_link             = vietnam_garage_vn_get_product_thumbnail($product_id);
    $product_image_link_thumb       = get_thumb_image_link_from_post_id($product_id);
    $product_image_list             = $product_info->gallery_image_ids;

    //lấy danh sách sản phẩm tương tự (upsell product)
    $product_upsell_list            = $product_info->upsell_ids;

    //lấy danh sách sản phẩm cùng hãng (cross sell product)
    $product_cross_sell_list            = $product_info->cross_sell_ids;
    
    //print_r($product_image_list);
    //print_r($product_attributes);
    //print_r($product_info);




?>

<?php 

?>

<html lang="vi-vn">
<?php get_template_part('layout_desktop/product/header-single'); ?>
<body>
    <?php get_template_part('layout_desktop/menu'); ?>
    <div class="product-detail">
        <div class="container">

            <?php 
                if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('
                <div id="breadcrumb" class="breadcrumb">','</div>');
                }
            ?>

            <div class="clearfix"></div>
            <div class="main-product-detail">
                <h1 class="name-product-detail"><?php echo $product_name ?></h1>
                <div class="content-review d-flex align-items">
                    <span class="icon-star star0"></span>
                    <div class="total-review">(0 lượt đánh giá)</div>
                    <div class="product-status">Tình trạng: <?php echo $product_stock; ?></div>
                    <?php if($product_bao_hanh !== ''): ?>
                    <div class="product-warranty">Bảo hành: <?php echo $product_bao_hanh ?></div>
                    <?php endif; ?>
                    <?php if($product_sku_code !== ''): ?>
                    <div class="product-sku">Mã sản phẩm: <?php echo $product_sku_code; ?></div>
                    <?php endif; ?>
                </div>
                <div class="content-main-detail d-flex">
                    <div class="product-detail-image">
                        <div class="product-detail-gallery text-center">
                            <div id="sync1">
                                <a class="MagicZoom" id="Zoomer" title="" data-fancybox="gallery"
                                    href="<?php echo $product_image_link ?>"
                                    style="position: relative; display: inline-block; text-decoration: none; outline: 0px; overflow: hidden; margin: auto; width: auto; height: auto;">
                                    <img src="<?php echo $product_image_link ?>" alt="<?php echo $product_name ?>"  loading="lazy" class="lazy" style="height: 400px; width: 100%; object-fit: cover; opacity: 1;">
                                    <div class="MagicZoomPup" style="z-index: 10; position: absolute; overflow: hidden; display: none; visibility: hidden; width: 233px; height: 301px; opacity: 0.5; left: 147.5px; top: 0px;"></div>
                                    <div class="MagicZoomHint" style="display: block; overflow: hidden; position: absolute; visibility: visible; z-index: 1; inset: 2px auto auto 2px; opacity: 0.75; max-width: 466px;"></div>
                                </a>
                            </div>
                            <div class="product-detail-thumbnail owl-carousel owl-theme custom-nav owl-loaded owl-drag" id="sync2" style="margin-top: 10px;">
                                <div class="owl-stage-outer owl-height" style="height: 81.75px;">
                                    <div class="owl-stage" style="transform: translate3d(-96px, 0px, 0px); transition: all 0.25s ease 0s; width: 576px;">

                                        <div class="owl-item active" style="width: 86px; margin-right: 10px;">
                                            <div class="item-thumbnail active">
                                                <a href="<?php echo $product_image_link ?>" class="border-img" rev="<?php echo $product_image_link ?>" rel="zoom-id:Zoomer;" style="outline: 0px; display: inline-block;">
                                                    <img src="<?php echo $product_image_link_thumb ?>" alt="<?php echo $product_name ?>" loading="lazy" class="lazy">
                                                </a>
                                            </div>
                                        </div>
                                        <?php foreach($product_image_list as $img_id): ?>
                                            <?php 
                                                $image_link_thumb = wp_get_attachment_thumb_url($img_id); 
                                                $image_link = wp_get_attachment_url($img_id); 
                                            ?>
                                        <div class="owl-item active" style="width: 86px; margin-right: 10px;">
                                            <div class="item-thumbnail active">
                                                <a href="<?php echo $image_link ?>" class="border-img" rev="<?php echo $image_link ?>" rel="zoom-id:Zoomer;" style="outline: 0px; display: inline-block;">
                                                    <img src="<?php echo $image_link_thumb ?>" alt="<?php echo $product_name ?>"  loading="lazy" class="lazy">
                                                </a>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="owl-nav">
                                    <button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                    <button type="button" role="presentation" class="owl-next disabled"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                </div>
                                <div class="owl-dots disabled"></div>
                                <div class="owl-thumbs"></div>
                            </div>
                        </div>
                        <div class="product-summary">
                            <div class="content" id="content-summary" style="height: 100%;">
                                <div class="d-flex flex-wrap cnt-summary">
                                    <?php echo $product_desc; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="product-detail-mid">
                        <div class="detail-price-main">
                            <?php if($product_sale_percent !== ''): ?>
                            <div class="detail-old-price d-flex align-items marketprice-config">
                                <p class="title">Giá niêm yết:</p>
                                <del><?php echo $product_price_regular_price ?></del>
                                <p class="detail-saleoff">(Tiết kiệm <?php echo $product_sale_percent ?>)</p>
                            </div>

                            <div class="detail-price d-flex align-items">
                                <p class="title">Giá bán:</p>
                                <b class="price-config"><?php echo $product_price_sale_price ?></b>
                            </div>
                            <?php else: ?>
                            <div class="detail-price d-flex align-items">
                                <p class="title">Giá niêm yết<tr></tr>:</p>
                                <b class="price-config"><?php echo $product_price_regular_price ?></b>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <?php if(strlen($product_gift) > '5'): ?>
                        <div class="offer-detail">
                            <div class="title-offer d-flex align-items">
                                <i class="fa fa-gift"></i>
                                <b>Khuyến mại</b>
                                <span>Tặng miễn phí ngay khi mua</span>
                            </div>
                            <div class="content-offer">
                                <?php $gift_list = explode(PHP_EOL, $product_gift); ?>
                                <?php foreach($gift_list as $row): ?>
                                    <?php if(strlen($row) > '3'): ?>
                                    <p><?php echo $row; ?></p>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="product-btn-cart d-flex align-items">
                            <?php if($product_price !== no_price()): ?>
                            <div class="unit-detail-amount-control">
                                <a onclick="create_cart_minus()" href="javascript:;" data-value="-1"><i class="fa fa-minus"></i></a>

                                <input disabled type="text" size="3" data-total="1" value="1" id="js-buy-quantity">

                                <a onclick="create_cart_plus()" href="javascript:;" data-value="1"><i class="fa fa-plus"></i></a>
                            </div>
                            
                            <div class="btn-buy">
                                <a id="button_add_to_cart" href="<?php echo site_url().'/gio-hang/?add-to-cart='.$product_id.'&quantity=1' ?>" class="">Mua ngay</a>
                            </div>
                            <script>
                                function create_cart_plus(){
                                    var cart_new_qty_of_item    = document.getElementById('js-buy-quantity').value ;
                                    var new_qty = ++cart_new_qty_of_item;
                                    var url_add_to_cart = '<?php echo site_url()?>/gio-hang/?add-to-cart=' + '<?php echo $product_id ?>' + '&quantity=' + new_qty;
                                    console.log(url_add_to_cart);
                                    document.getElementById('button_add_to_cart').setAttribute('href',url_add_to_cart);
                                }
                                function create_cart_minus(){
                                    var cart_new_qty_of_item    = document.getElementById('js-buy-quantity').value ;
                                    if(cart_new_qty_of_item > '1'){
                                        var new_qty  = --cart_new_qty_of_item;
                                    }else{
                                        var new_qty  = '1';
                                    }
                                    
                                    var url_add_to_cart = '<?php echo site_url()?>/gio-hang/?add-to-cart=' + '<?php echo $product_id ?>' + '&quantity=' + new_qty;
                                    console.log(url_add_to_cart);
                                    document.getElementById('button_add_to_cart').setAttribute('href',url_add_to_cart);
                                }
                            </script>
                            <?php else: ?>
                            <div class="btn-buy" style="width:100%;">
                                <a href="tel:<?php echo get_theme_hotline_number() ?>'.$product_id.'&quantity=1' ?>" class="buy-go-cart btn-buyNow js-buyNow" data-id="<?php echo $product_id ?>" data-name="">Gọi ngay: <?php echo get_theme_hotline_number(); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="note-phone-cart">
                            <p>Vui lòng gọi: <a href="tel:<?php echo get_theme_hotline_number(); ?>" class=""><?php echo get_theme_hotline_number(); ?></a> để được hỗ trợ lắp đặt tại nhà.</p>
                        </div>
                    </div>
                    <div class="product-detail-right">

                        <div class="box-chinhsach">
                            <h3 class="title">Chính sách bán hàng:</h3>
                            <div class="content">
                                <p>Cung cấp, lắp đặt sản phẩm chính hãng, phong phú chủng loại, đảm bảo chất lượng.</p>
                                <p>Giá cả hợp lý, mang lại lợi ích cao nhất cho khách hàng.</p>
                                <p>Bảo hành điện tử chính hãng toàn quốc lên đến 10 năm.</p>
                                <p>Dùng thử sản phẩm 3-7 ngày miễn phí</p>
                            </div>
                        </div>
                        <div class="box-chinhsach">
                            <h3 class="title">Trợ giúp:</h3>
                            <div class="content">
                                <p><a href="<?php echo site_url().'/huong-dan-mua-hang'.'/'; ?>">Hướng dẫn mua hàng.</a></p>
                                <p><a href="<?php echo site_url().'/chinh-sach-bao-hanh-san-pham'.'/'; ?>'">Chính sách bảo hành sản phẩm.</a></p>
                                <p><a href="<?php echo site_url().'/chinh-sach-doi-tra-va-hoan-tien'.'/'; ?>">Chính sách đổi trả và hoàn tiền.</a></p>
                            </div>
                        </div>
                        <div class="box-chinhsach">
                            <h3 class="title">Điện thoại tư vấn bán hàng:</h3>
                            <div class="content">
                                <p><?php echo get_theme_phone_from_function(); ?></p>
                            </div>
                        </div>
                        <div class="box-chinhsach">
                            <h3 class="title">Địa chỉ mua hàng:</h3>
                            <div class="content">
                                <p data-show-hover="#map1" data-view=".map"><?php echo get_theme_address_from_function(); ?></p>

                                <iframe id="map1" class="map"
                                    src="<?php echo get_theme_google_map_embed_from_function(); ?>"
                                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content-main-detail- -->
            </div>
            <!-- end main-product-detail- -->
            <?php 
                $count_related_product_list = '0';
                if(count($product_cross_sell_list) > '0'){$count_related_product_list++;}
                if(count($product_upsell_list) > '0'){$count_related_product_list++;}
            ?>
            <?php if($count_related_product_list > '0'): ?>
            <div class="tab-pro-detail" id="js-tab-pro-detail">
                <ul class="title-tab-ct">
                    <li class="<?php if(count($product_upsell_list) >= '1'){ echo 'active';} ?>">
                        <a data-toggle="tab" href="javascript:;" data-id="#related1" data-tab=".tab-rl" data-holder="#product-related" class="item <?php if(count($product_upsell_list) >= '1'){ echo 'active';} ?>">Sản phẩm tương tự</a>
                    </li>
                    <li class="<?php if(count($product_upsell_list) < '1'){ echo 'active';} ?>">
                        <a data-toggle="tab" href="javascript:;" data-id="#related2" data-tab=".tab-rl" data-holder="#product-related" class="item <?php if(count($product_upsell_list) < '1'){ echo 'active';} ?>">Sản phẩm cùng hãng</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <div class="content-product-list-related">
                    <div class="product-list-related owl-carousel owl-theme custom-nav js-pro-carousel owl-loaded owl-drag <?php if(count($product_upsell_list) >= '1'){ echo 'active';} ?>" id="related1">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 952px;">
                                <?php foreach($product_upsell_list as $row): ?>
                                    <?php 
                                        $row_product_id = $row;
                                        //Lấy thông tin sản phẩm từ Woocommerce
                                        $row_product_info                   = wc_get_product( $row_product_id );
                                        $row_product_image_link             = $row_product_info->get_image('thumbnail');

                                        $row_product_price                  = format_price($row_product_info->get_price());
                                        $row_product_price_regular_price    = format_price($row_product_info->get_regular_price());
                                        $row_product_price_sale_price       = format_price($row_product_info->get_sale_price());
                                        $row_product_desc                   = short_desc('70',$row_product_info->description);
                
                                        //lấy phần trăm giảm giá
                                        $row_input_regular_price            = $row_product_info->get_regular_price();
                                        $row_input_sale_price               = $row_product_info->get_sale_price();
                                        $row_product_sale_percent           = get_sale_percent($row_input_regular_price, $row_input_sale_price);
                                        
                                        $row_product_gift                   = $row_product_info->purchase_note;
                                    ?>
                                <div class="owl-item">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="<?php the_permalink($row_product_id); ?>">
                                                <?php echo $row_product_image_link; ?>
                                            </a>
                                            <?php if(strlen($row_product_sale_percent) > '0'): ?>
                                            <div class="sale"><?php echo $row_product_sale_percent; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title">
                                                <a href="<?php the_permalink($row_product_id); ?>"><?php echo $row_product_info->name ?></a>
                                            </h2>
                                            
                                            <div class="product-price">
                                            <?php if($row_product_price_regular_price !== no_price()): ?>
                                                <del class="old-price"><?php echo $row_product_price_regular_price ?></del>
                                                <span class="item-price"><?php echo $row_product_price_sale_price ?></span>
                                            <?php else: ?>
                                                <del class="old-price"></del>
                                                <span class="item-price"><?php echo $row_product_price_regular_price ?></span>
                                            <?php endif; ?>
                                            </div>

                                            <div class="product-summary line-clamp-1">
                                                <?php echo nl2br($row_product_gift); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="owl-nav disabled">
                            <button type="button" role="presentation" class="owl-prev disabled"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                            <button type="button" role="presentation" class="owl-next disabled"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </div>
                        <div class="owl-dots disabled"></div>
                        <div class="owl-thumbs"></div>
                    </div>

                    <div class="product-list-related owl-carousel owl-theme custom-nav js-pro-carousel owl-loaded owl-drag <?php if(count($product_upsell_list) < '1'){ echo 'active';} ?>" id="related2">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                <?php foreach($product_cross_sell_list as $row): ?>
                                    <?php 
                                        $row_product_id = $row;
                                        //Lấy thông tin sản phẩm từ Woocommerce
                                        $row_product_info                   = wc_get_product( $row_product_id );
                                        $row_product_image_link             = $row_product_info->get_image('thumbnail');

                                        $row_product_price                  = format_price($row_product_info->get_price());
                                        $row_product_price_regular_price    = format_price($row_product_info->get_regular_price());
                                        $row_product_price_sale_price       = format_price($row_product_info->get_sale_price());
                                        $row_product_desc                   = short_desc('70',$row_product_info->description);
                
                                        //lấy phần trăm giảm giá
                                        $row_input_regular_price            = $row_product_info->get_regular_price();
                                        $row_input_sale_price               = $row_product_info->get_sale_price();
                                        $row_product_sale_percent           = get_sale_percent($row_input_regular_price, $row_input_sale_price);
                                        
                                        $row_product_gift                   = $row_product_info->purchase_note;
                                    ?>
                                <div class="owl-item">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="<?php the_permalink($row_product_id); ?>">
                                                <?php echo $row_product_image_link ?>
                                            </a>
                                            <?php if(strlen($row_product_sale_percent) > '0'): ?>
                                            <div class="sale"><?php echo $row_product_sale_percent; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title">
                                                <a href="<?php the_permalink($row_product_id); ?>"><?php echo $row_product_info->name ?></a>
                                            </h2>
                                            
                                            <div class="product-price">
                                            <?php if($row_product_price_regular_price !== no_price()): ?>
                                                <del class="old-price"><?php echo $row_product_price_regular_price ?></del>
                                                <span class="item-price"><?php echo $row_product_price_sale_price ?></span>
                                            <?php else: ?>
                                                <del class="old-price"></del>
                                                <span class="item-price"><?php echo $row_product_price_regular_price ?></span>
                                            <?php endif; ?>
                                            </div>

                                            <div class="product-summary line-clamp-1">
                                                <?php echo nl2br($row_product_gift); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="owl-nav disabled">
                            <button type="button" role="presentation" class="owl-prev disabled"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                            <button type="button" role="presentation" class="owl-next disabled"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </div>
                        <div class="owl-dots disabled"></div>
                        <div class="owl-thumbs"></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!---tab-pro-detail---->
            <div class="clearfix"></div>
            <div class="detail-content-read d-flex">
                <div class="content-left">
                    <div class="list-tab d-flex align-items" id="title_tab_scroll_pro">
                        <a href="#tab1" class="item-tab active">Mô Tả Sản Phẩm</a>
                        <!-- <a href="#tab2">Đánh giá & Nhận xét</a> -->
                    </div>
                    <div class="content-main">
                        <div class="tab-detail-content">
                            <div id="tab1" class="content-scroll tab-detail content-description active">
                                <div class="content" id="content-desc">
                                    <p><?php echo $product_content; ?></p>
                                </div>
                                <a href="javascript:void(0)" class="more-all js-viewmore-content" data-content="#content-desc">Xem thêm</a>
                            </div>
                            <!--                             
                            <div id="tab2" class="content-scroll product-review">
                                <h3 class="title">Đánh giá & Nhận xét về <?php echo $product_name; ?></h3>
                                <div id="vote-statistic" class="border">
                                    <?php echo do_shortcode('[cusrev_all_reviews]'); ?>
                                </div>
                            </div> -->
                        </div>
                        
                    </div>
                </div>
                <div class="content-right">
                    <div class="product-spec">
                        <h3 class="title">
                            Thông số kỹ thuật
                        </h3>

                        <div class="content">
                            <?php 
                                //lấy thông số kỹ thuật
                                $product_info->list_attributes(); 
                            ?>
                        </div>
                        <a href="#full-spec" data-fancybox="spec" class="common-vm">Xem thêm thông số kỹ thuật</a>
                        <div id="full-spec" class="content-text" style="display:none;">
                            <?php 
                                //lấy thông số kỹ thuật
                                $product_info->list_attributes(); 
                            ?>
                        </div>

                    </div>
                    <!-- <div class="article-lienquan">
                        <h3 class="title">Tin tức liên quan</h3>

                        <div class="list-article">

                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('layout_desktop/footer'); ?>
    <?php get_template_part('layout_desktop/product/scripts'); ?>
    <?php get_template_part('layout_desktop/product/scripts_cart_custom'); ?>
</body>

</html>

