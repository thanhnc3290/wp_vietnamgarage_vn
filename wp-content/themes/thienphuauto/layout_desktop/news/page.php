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
    </div>
    <?php get_template_part('layout_desktop/footer'); ?>
    <?php get_template_part('layout_desktop/product/scripts'); ?>
    <?php get_template_part('layout_desktop/product/scripts_cart_custom'); ?>
</body>

</html>