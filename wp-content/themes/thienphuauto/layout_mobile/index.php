<!DOCTYPE html>
<html lang="vi-vn">
<?php get_template_part('layout_mobile/header'); ?>
<body class="">
    <?php get_template_part('layout_mobile/menu'); ?>
    <h1 style="position: absolute; top: -999px"><?php echo get_bloginfo( 'name' ); ?></h1>
    <div class="homepage">
        <?php get_template_part('layout_mobile/home/home_slider'); ?>
        <?php get_template_part('layout_mobile/home/home_product_category'); ?>
        <?php get_template_part('layout_mobile/home/home_product_list_sale'); ?>
        <?php get_template_part('layout_mobile/home/home_product_list'); ?>
    </div>
    <?php get_template_part('layout_mobile/footer'); ?>
    <?php get_template_part('layout_mobile/sticky_footer'); ?>
</body>
</html>