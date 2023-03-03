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
        
        <div class="about_us" style="background-color: #fff;padding: 10px;">
            <h1><?php the_title() ?></h1>
            <div class="nd">
                <div id="toc_container" class="toc_light_blue">
                    <div class="toc_title">Nội dung chính <span class="toc_toggle">[<a>Ẩn</a>]</span></div>
                    <?php 
                        //function này tự tạo trong function.php -- gọi vào là được
                        get_table_of_content(); 
                    ?>
                </div>
                <p><?php the_content(); ?></p>
            </div>
        </div>
        <?php get_template_part('layout_mobile/news/footer'); ?>
        <?php get_template_part('layout_mobile/sticky_footer'); ?>
    </div>
</body>

</html>