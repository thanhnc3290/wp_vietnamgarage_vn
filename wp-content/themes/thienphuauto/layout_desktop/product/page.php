<?php 
    $catalog_id = get_queried_object_id();
   
    $product_catalog_list_lv_2 = vietnam_garage_vn_get_product_catalog_list($catalog_id);
   
    //Lấy danh sách thuộc tính sản phẩm trên toàn trang
    //$total_product_attribute_list = wc_get_attribute_taxonomies();
        // kiểm tra xem hiện tại đang là truy vấn vào trang thuộc tính hay trang danh mục sản phẩm
        //print_r($total_product_attribute_list);
        

        //đoạn này lấy pa_brand -- để hiển thị thương hiệu
        $attribute_name_to_get          = 'pa_brand'; // slug của thuộc tính sản phẩm cần lấy giá trị
        //dùng get_terms để lấy thông tin theo giá trị taxonomy -- nếu query khác thì thay thế
        $attribute_info_to_get          = get_terms( array('taxonomy' => $attribute_name_to_get)); // mảng các giá trị có trong thuộc tính
    //print_r($attribute_info_to_get);

    //Xử lý danh sánh list nội dung & sort / phân trang
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;

    
    $sort  = $_GET['sort'];if(!$sort){$sort = 'new';}
    $brand  = $_GET['brand'];if(!$brand){$brand = '';}
    

    $input_list = array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'ignore_sticky_posts'   => 1,
        'posts_per_page'        => '16',

        'paged'                 => $paged,
    );

    //điều kiện lọc filter theo danh mục / thuộc tính / loại hình sản phẩm abc....
    $input_tax_query    =   array();
    $input_tax_query_1  =   array(
        'taxonomy'      => 'product_cat',
        'field'         => 'term_id', //This is optional, as it defaults to 'term_id'
        'terms'         => $catalog_id,
        'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
    );
    $input_tax_query[]  = $input_tax_query_1;

    $input_tax_query_2  =  array(
        'taxonomy'      => 'product_visibility',
        'field'         => 'slug',
        'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
        'operator'      => 'NOT IN'
    );
    $input_tax_query[]  = $input_tax_query_2;


    //xử lý query brand
    if($brand !== ''){
        $input_tax_query_3  =  array(
            'taxonomy' => $attribute_name_to_get,
            'field'    => 'term_id', //default
            'terms'    => $brand,
            'operator' => 'IN',
        );
        $input_tax_query[]  = $input_tax_query_3;
    }
    
    //print_r($input_tax_query);


    //Gộp vào  $input_list mảng 'tax_query'
    $input_list['tax_query'] = $input_tax_query;




    //xử lý query sort
    
    if($sort == 'new'){
        $input_list['orderby']      = 'id';
        $input_list['order']        = 'desc';
    }

    if($sort == 'price-asc'){
        $input_list['orderby']      = 'meta_value_num';
        $input_list['order']        = 'asc';
        $input_list['meta_key']     = '_price';
    }

    if($sort == 'price-desc'){
        $input_list['orderby']      = 'meta_value_num';
        $input_list['order']        = 'desc';
        $input_list['meta_key']     = '_price';
    }

    if($sort == 'name'){
        $input_list['orderby']      = 'title';
        $input_list['order']        = 'asc';
    }

    if($sort == 'bestsale'){
        $input_list['orderby']      = 'meta_value_num';
        $input_list['meta_key']     = 'total_sales';
        $input_list['order']        = 'desc';
    }
    

    $list      = new WP_Query($input_list);
    //print_r($list);

    

?>
<!DOCTYPE html>
<html lang="vi-vn">
    <?php get_template_part('layout_desktop/product/header-page'); ?>

<body>
    <?php get_template_part('layout_desktop/menu'); ?>

    <div class="product-category">
        <div class="container">
            <?php 
                if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('
                <div id="breadcrumb" class="breadcrumb">','</div>');
                }
            ?>
            <div class="clearfix"></div>
            <div class="box-filter">
                <?php if(count($product_catalog_list_lv_2) > '0'): ?>
                <div class="category-childer d-flex flex-wrap">
                    <?php foreach($product_catalog_list_lv_2 as $row): ?>
                        <?php 
                            $catalog_name = $row->name;    
                            $catalog_url  = get_category_link($row->term_id);
                        ?>
                    <a href="<?php echo $catalog_url ?>" class="item "><?php echo $catalog_name ?></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="filter-list d-flex">

                    <div class="item-filter">
                        <div class="title-filter">
                            <b>Hãng</b>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="content-filter">
                            <a style="cursor: pointer;<?php if($brand == ''){ echo 'color:#fda430;font-weight:bold;';} ?>" onclick="location.href='?sort=new&brand='">All</a>
                            <?php foreach($attribute_info_to_get as $row): ?>
                            <a style="cursor: pointer;<?php if($brand == $row->term_id){ echo 'color:#fda430;font-weight:bold;';} ?>" onclick="location.href='?sort=new&brand=<?php echo $row->term_id; ?>'"><?php echo $row->name ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!---loc thuong hieu --->
                        
                    <label onclick="location.href='?sort=new'" style="cursor: pointer;">
                        <?php if($sort !== 'bestsale'): ?>
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                        <?php else: ?>
                        <i class="fa fa-square-o" aria-hidden="true"></i>
                        <?php endif; ?>
                        <span>Mới</span>
                    </label>
                    <label onclick="location.href='?sort=bestsale'" style="cursor: pointer;">
                        <?php if($sort == 'bestsale'): ?>
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                        <?php else: ?>
                        <i class="fa fa-square-o" aria-hidden="true"></i>
                        <?php endif; ?>
                        <span>Bán chạy</span>
                    </label>
                    <div class="item-filter">
                        <div class="title-filter">
                            <b>Sắp xếp</b>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="content-filter">
                            <a style="cursor: pointer;" onclick="location.href='?sort=new'">Mới nhất</a>
                            <a style="cursor: pointer;" onclick="location.href='?sort=price-asc'">Giá tăng dần</a>
                            <a style="cursor: pointer;" onclick="location.href='?sort=price-desc'">Giá giảm dần</a>
                            <a style="cursor: pointer;" onclick="location.href='?sort=name'">Tên A->Z</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <h1 class="name-category"><?php the_title(); ?></h1>
            <div class="product-list d-flex flex-wrap">

                <?php if($list->have_posts()): ?>
                    <?php while ( $list->have_posts() ) : $list->the_post(); ?>
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
                        <a href="<?php the_permalink($product_id); ?>">
                            <?php echo $product_image_link; ?>
                        </a>
                        <?php if(strlen($product_sale_percent) > '0'): ?>
                        <div class="sale"><?php echo $product_sale_percent ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title">
                            <a href="<?php the_permalink($product_id); ?>"><?php the_title(); ?></a>
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
                        <div class="product-summary line-clamp-1"><?php echo nl2br($product_gift); ?></div>
                    </div>
                </div>
                    <?php endwhile; ?>
                    
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            </div>
            
            
            
            <!-- phân trang -->           
            <div class="paging">
                <?php 
                    //lấy đường dẫn của catalog hiện tại (không có query)
                    global $wp;
                    $catalog_url = home_url( $wp->request );
                    //ví dụ nếu mà muốn query đồng thời nhiều mục và vẫn phân trang thì bổ sung thêm query vào đường dẫn
                    $add_new_query = '';

                    //xử lý các query trong trang sản phẩm
                    if($sort !== 'new'){
                        $add_new_query .= '&sort='.$sort;
                    }

                    if($brand !== ''){
                        $add_new_query .= '&brand='.$brand;
                    }

                    $catalog_url_to_show = $catalog_url.'?'.$add_new_query;

                    //lấy query 'page' để thực hiện phân trang
                    $current_page = get_query_var('page');
                    if(!$current_page){$current_page = '1';}
                    if($current_page < '1'){$current_page = '1';}
                    
                    $last_page          = $list->max_num_pages;
                ?>
                <?php if($current_page <= '3'): ?>
                    <a href="<?php echo $catalog_url_to_show ?>"            <?php if($current_page == '1'){echo 'class="current"';} ?>>1</a>
                    
                    <?php if($last_page >= '2'): ?>
                    <a href="<?php echo $catalog_url_to_show ?>&page=2"     <?php if($current_page == '2'){echo 'class="current"';} ?>>2</a>
                    <?php endif; ?>
                    
                    <?php if($last_page >= '3'): ?>
                    <a href="<?php echo $catalog_url_to_show ?>&page=3"     <?php if($current_page == '3'){echo 'class="current"';} ?>>3</a>
                    <?php endif; ?>
                    <?php if($last_page >= '4'): ?>
                    <a href="<?php echo $catalog_url_to_show ?>&page=4">4</a>
                    <?php endif; ?>
                    <?php if($last_page >= '5'): ?>
                    <a href="<?php echo $catalog_url_to_show ?>&page=5">5</a>
                    <?php endif; ?>
                    <?php if($last_page >= '6'): ?>
                    <a href="<?php echo $catalog_url_to_show ?>&page=6">6</a>
                    <?php endif; ?>
                <?php else: ?>
                    <?php 
                        //Với những phân trang lớn hơn thì xử lý kiểu khác
                        $prev_page          = $current_page - 1;
                        $next_page          = $current_page + 1;
                    ?>
                <a href="<?php echo $catalog_url_to_show ?>">1</a>

                <a>...</a>

                <a href="<?php echo $catalog_url_to_show.'&page='.$prev_page ?>"><?php echo $prev_page ?></a>

                <a class="current"><?php echo $current_page ?></a>
                <?php if($next_page < $last_page): ?>
                <a href="<?php echo $catalog_url_to_show.'&page='.$next_page ?>"><?php echo $next_page ?></a>
                    <?php if($next_page < ($last_page - 2)): ?>
                <a>...</a>
                    <?php endif; ?>
                <?php endif; ?>
                    <?php if($current_page < $last_page): ?>
                <a href="<?php echo $catalog_url_to_show.'&page='.$next_page ?>"><?php echo $last_page ?></a>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
            <!-- end phân trang-->
        </div>
    </div>
    <?php get_template_part('layout_desktop/footer'); ?>
    
    <?php get_template_part('layout_desktop/product/scripts'); ?>
    <?php get_template_part('layout_desktop/product/scripts_cart_custom'); ?>
 </body>
</html>
<!-- Load time: 0.174 seconds  / 7 mb-->
<!-- Powered by HuraStore 7.4.6, Released: 17-July-2020 / Website: www.hurasoft.vn -->
