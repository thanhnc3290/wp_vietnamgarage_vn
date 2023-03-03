<?php 
    //lấy danh sách các chuyên mục ngay dưới Tin Tức
    $news_catalog_lv_2 = vietnam_garage_vn_get_news_catalog_list('1');

    //xử lý nội dung chuyên mục
    $category_id    = get_queried_object_id();
    $category_info  = get_term( $category_id );

    $category_name  = $category_info->name;

    //lấy danh sách post từ category
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    $input_list = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'ignore_sticky_posts'   => '1',
        'posts_per_page'        => '12',
        'paged'                 => $paged,
    );

    //lấy danh sách các post được đánh dấu sticky / ghim đầu trang
    $input_sticky_list = array(
        'post_type'         => 'post',
        'post__in'          => get_option( 'sticky_posts'),
        'posts_per_page'    => '5',
    );

    $input_tax_query    =   array();
    if($category_id > '1'){   
        $input_tax_query_1  =   array(
            'taxonomy'      => 'category',
            'field'         => 'term_id', //This is optional, as it defaults to 'term_id'
            'terms'         => $category_id,
            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
        );
        $input_tax_query[]              = $input_tax_query_1;
        $input_list['tax_query']        = $input_tax_query;
        $input_sticky_list['tax_query'] = $input_tax_query;
    }
    $list               =   new WP_Query($input_list);
    $sticky_list        =   new WP_Query($input_sticky_list);
    //print_r($list);


    
?>


<!DOCTYPE html>
<html lang="vi-vn">
<?php get_template_part('layout_mobile/news/header-category'); ?>

<body>
    <div class="container-mb">
        <?php get_template_part('layout_mobile/menu'); ?>
        <div class="container">
            <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('
                    <div id="breadcrumb" class="breadcrumb" style="margin-top:0.5rem;padding-bottom:0.5rem;">','</div>');
                    }
                ?>
            <div class="clearfix"></div>
        </div>
        <div class="head-blog container">
            <h1><?php echo $category_name ?></h1>
            <ul class="blog-cat d-flex flex-wrap">
                <?php foreach($news_catalog_lv_2 as $row): ?>
                <?php $row_category_url = get_category_link($row->term_id); ?>
                <li><a href="<?php echo $row_category_url ?>" class="active0"><?php echo $row->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="main-blog">
            <div class="row">
                <div class="col-12">
                    <?php if(count($sticky_list >= '3')): ?>
                    <div class="blog-top-left">
                        <?php if($sticky_list->have_posts()): ?>
                            <?php $count_sticky_area_1 = '0'; ?>
                        <div class="col-md-12 blog-larg" style="margin-right: 10px;">
                            <?php while ( $sticky_list->have_posts() ) : $sticky_list->the_post(); ?>
                                <?php $count_sticky_area_1++;?>
                                <?php if($count_sticky_area_1 == '1'): ?>
                                    <?php 
                                        $post_id            = get_the_id();
                                        $post_info          = get_post($post_id);
                                        $post_created       = $post_info->post_date;
                                    ?>
                            <div class="blog-item">
                                <a href="<?php the_permalink() ?>" class="b-img">
                                    <?php echo get_the_post_thumbnail($post_id, 'thumbnail'); ?>
                                </a>
                                <h2 class="b-name">
                                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                </h2>
                                <span class="b-comment"><?php echo $post_created ?></span>
                            </div>
                                <?php endif;?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <div class="main-left">

                        <?php if($list->have_posts()): ?>
                            <?php while ( $list->have_posts() ) : $list->the_post(); ?>
                            <?php 
                                $post_id            = get_the_id();
                                $post_info          = get_post($post_id);
                                $post_created       = $post_info->post_date;
                                $post_desc          = get_the_excerpt();
                            ?>
                        <div class="blog-item">
                            <a href="<?php the_permalink() ?>" class="b-img">
                                <?php echo get_the_post_thumbnail($post_id, 'thumbnail'); ?>
                            </a>
                            <div class="b-emty">
                                <h3 class="b-name">
                                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="line-clamp-3"><?php echo $post_desc; ?></p>
                                <span class="outhor-by"><?php echo $post_created; ?></span>
                            </div>
                        </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

                        

                        <div class="clearfix space20"></div>
                        <div class="bg-white p-15">
                            <div class="top_area_list_page bg-white mt-3 mb-3">
                                <div class="paging">

                                    <?php 
                                        //lấy đường dẫn của catalog hiện tại (không có query)
                                        global $wp;
                                        $catalog_url = home_url( $wp->request );
                                        //ví dụ nếu mà muốn query đồng thời nhiều mục và vẫn phân trang thì bổ sung thêm query vào đường dẫn
                                        $add_new_query = '';
                                        
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
                                <!--paging-->
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php get_template_part('layout_mobile/news/sidebar_right'); ?>
            </div>
        </div>
        <?php get_template_part('layout_mobile/news/footer'); ?>
        <?php get_template_part('layout_mobile/sticky_footer'); ?>
    </div>
</body>

</html>