<!DOCTYPE html>
<html lang="vi-vn">
<?php get_template_part('layout_mobile/product/header-page'); ?>

<body>
    <div class="container-mb">
        <?php get_template_part('layout_mobile/menu'); ?>
        <div class="content_wrap fullwidth bg-white text-center">
            <p class="error_title font-800">404</p>
            <p class="error_subtitle">Nội dung không tìm thấy hoặc đã bị xóa bỏ!</p>
            <a href="<?php echo site_url(); ?>" class="green text-18"><i class="fa fa-arrow-left"></i> Quay lại trang chủ </a>
        </div>
        <?php get_template_part('layout_mobile/product/footer'); ?>
    </div>
</body>

</html>