<!DOCTYPE html>
<html lang="vi-vn">
<?php get_template_part('layout_desktop/header'); ?>

<body>
    <?php get_template_part('layout_desktop/menu'); ?>
    <!---FILE TRANG CHỦ WEBSITE BẢN PC --->
    <h1 style="position: absolute; top: -999px"><?php echo get_bloginfo( 'name' ); ?></h1>
    <div class="homepage">
        <?php get_template_part('layout_desktop/home/home_slider'); ?>
        <div class="container">
            <?php get_template_part('layout_desktop/home/home_product_list_sale'); ?>
            <?php //get_template_part('layout_desktop/home/home_2_banner_midle'); ?>
            <?php get_template_part('layout_desktop/home/home_product_list'); ?>
        </div>
    </div>
    <?php get_template_part('layout_desktop/footer'); ?>
    <?php get_template_part('layout_desktop/product/scripts'); ?>
    <?php get_template_part('layout_desktop/product/scripts_cart_custom'); ?>
</body>

</html>