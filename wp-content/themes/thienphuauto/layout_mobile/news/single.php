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
<?php get_template_part('layout_mobile/news/header-single'); ?>

<body>
    <div class="container-mb">
        <?php get_template_part('layout_mobile/menu'); ?>
        <div class="container">
            <?php 
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<div id="breadcrumb" class="breadcrumb" style="margin-top:0.5rem;padding-bottom:0.5rem;">','</div>');
                }
            ?>
            <div class="clearfix"></div>
        </div>
        <div class="head-blog container">
            <h1><?php echo $post_name ?></h1>
            <ul class="blog-cat d-flex flex-wrap">
                <li><a href="<?php echo $post_category_url ?>" class="active"><?php echo $post_category_name ?></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="main-blog">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-white entry" style="background: #fff;padding: 15px;margin-top: 15px;">
                        <div class="entry-header">
                            <h1 class="title">Giảm giá tận gốc khi dán phim cách nhiệt ô tô (09.9 đến 19.9)</h1>
                            <div style="display: inline-flex;padding: 10px;font-size: 12px;">
                                <span class="entry-author none"> </span>&nbsp;
                                <span class="entry-date">09-09-2022, 12:00 am </span>&nbsp;
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
                                <div id="outp">
                                    <?php 
                                        //function này tự tạo trong function.php -- gọi vào là được
                                        get_table_of_content(); 
                                    ?>
                                </div>
                            </div>
                            <p><?php echo $post_content; ?></p>
                        </div>
                        <!-- <div style="padding: 10px;margin: 0 auto 20px;padding: 15px 0;border-top: 1px solid #e3e3e3;width: 100%;color: #555;">
                            <div style="float: right;font-size: 14px;" class="entry-comment"> <?php echo $post_view ?>&nbsp;lượt xem</div>
                        </div> -->
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