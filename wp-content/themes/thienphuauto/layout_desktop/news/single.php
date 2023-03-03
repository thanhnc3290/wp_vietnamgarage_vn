<?php 
    $post_id   = get_the_id();
    $post_info = get_post($post_id);
    $post_category_info = get_the_category($post_id)['0']; // lấy thông tin danh mục chính của post, nếu muốn lấy nhiều danh mục thì foreach ra
    // print_r($post_category_info);
    // print_r($post_info);

    $post_category_name = $post_category_info->name;
    $post_category_url  = get_category_link( $post_category_info->term_id );

    $post_name          = $post_info->post_title;
    $post_created       = $post_info->post_date;
    $post_content       = $post_info->post_content;

    //đếm view -- function này tự tạo trong function.php
    set_post_view($post_id);

    $post_view = get_post_meta($post_id, 'post_views_count', true );
    if($post_view < '1'){
        $post_view = '0';
    }

    //lấy danh sách bài viết liên quan cùng danh mục
    $post_related_list = get_posts( 
        array( 
            'category__in'  => wp_get_post_categories($post_id), 
            'numberposts'   => '3', 
            'post__not_in'  => array($post_id), 
        ), 
    );
?>

<!DOCTYPE html>
<html lang="vi-vn">
<?php get_template_part('layout_desktop/news/header-single'); ?>

<body>
    <?php get_template_part('layout_desktop/menu'); ?>
    <div class="container">
        <?php 
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('
                <div id="breadcrumb" class="breadcrumb">','</div>');
            }
        ?>
        <div class="clearfix"></div>
    </div>

    <div class="head-blog container">
        <ul class="blog-cat">
            <li><a href="<?php echo $post_category_url ?>" class="active"><?php echo $post_category_name ?></a></li>
        </ul>
    </div>

    <div class="clearfix"></div>

    <div class="main-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="bg-white entry" style="background: #fff;padding: 15px;margin-top: 15px;">
                        <div class="entry-header">
                            <h1 class="title"><?php echo $post_name ?></h1>
                            <div style="display: inline-flex;padding: 10px;font-size: 12px;">
                                <span class="entry-author none"> </span>&nbsp;
                                <span class="entry-date"><?php echo $post_created ?></span>&nbsp;
                            </div>
                        </div>
                        <style>
                        @media only screen and (max-width: 600px) {
                            .a-content table {
                                display: block;
                                overflow: scroll;
                            }
                        }
                        </style>
                        <style>
                        td,
                        th {
                            max-width: 100%;
                            padding: 6px;
                            border: solid 1px #cecece;
                            text-align: center;
                        }

                        td p {
                            text-align: center !important;
                        }
                        </style>
                        <div class="entry-content a-content anchor-text" id="find_toc">
                            <div id="first-paragraph"></div>
                            <div id="toc_container" class="toc_light_blue">
                                <div class="toc_title">Nội dung chính <span class="toc_toggle">[<a>Ẩn</a>]</span></div>
                                <?php 
                                    //function này tự tạo trong function.php -- gọi vào là được
                                    get_table_of_content(); 
                                ?>
                            </div>
                            <p><?php echo $post_content; ?></p>

                        </div>
                        <!-- <div style="margin: 0 auto 1rem;padding: 1rem 0;border-top: 1px solid #e3e3e3;width: 100%;color: #555;">
                            <div style="float: right;font-size: 14px;padding: 0.25rem 0rem;" class="entry-comment"> <?php echo $post_view ?>&nbsp;lượt xem</div>
                        </div> -->

                        <?php if(count($post_related_list) > '0'): ?>
                        <div class="article-related">
                            <h3 class="title">BÀI VIẾT LIÊN QUAN</h3>

                            <div class="list-article d-flex">
                            
                            <?php foreach($post_related_list as $row): ?>
                                <?php setup_postdata($row); ?>
                                    <?php 
                                        $row_post_id            = get_the_id();
                                        $row_post_image_link    = vietnam_garage_vn_get_product_thumbnail($row_post_id);
                                        $row_post_name          = $row->post_name;
                                        $row_post_created       = $row->post_date;
                                    ?>
                                <div class="item-art">
                                    <a href="<?php the_permalink() ?>" class="art-img">
                                        <img src="<?php echo $row_post_image_link ?>" alt="<?php echo $row_post_name ?>">
                                    </a>
                                    <div class="info-art">
                                        <a href="<?php the_permalink() ?>" class="name-art line-clamp-2"><?php echo $row_post_name ?></a>
                                        <span class="time-art"><?php echo $row_post_created ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata();?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php get_template_part('layout_desktop/news/sidebar_right'); ?>
            </div>
        </div>
    </div>

    <?php get_template_part('layout_desktop/footer'); ?>
    <?php get_template_part('layout_desktop/product/scripts'); ?>
    <?php get_template_part('layout_desktop/product/scripts_cart_custom'); ?>
</body>

</html>