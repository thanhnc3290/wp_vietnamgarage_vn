<?php 
    //file này xử lý chung cho cả PC và Mobile -- nhập form ok thì sẽ gọi template ra dựa theo thiết bị
    $name           =   urlencode($_POST['user_name']);if(!$name){$name = '';}
    $phone          =   urlencode($_POST['user_phone']);if(!$phone){$phone = '';}
    $email          =   urlencode($_POST['user_email']);if(!$email){$email = '';}
    $address        =   urlencode($_POST['user_address']);if(!$address){$address = '';}
    $note           =   urlencode($_POST['user_note']);if(!$note){$note = '';}
    $total_order    =   urlencode($_POST['user_order']);if(!$total_order){$total_order = '';}

    $check          =   submit_order_to_google_driver($name, $phone, $email, $address, $note, $total_order);
    
    
    if($check == 'OK'){
        //destroy cart
        global $woocommerce;
        $woocommerce->cart->empty_cart();
    }
?>

<?php if(wp_is_mobile()): ?>
<!DOCTYPE html>
<html lang="vi-vn">
<?php get_template_part('layout_mobile/product/header-page'); ?>

<body>
    <div class="container-mb">
        <?php get_template_part('layout_mobile/menu'); ?>
        <div class="content_wrap fullwidth bg-white text-center">
            <?php if($check == 'OK'): ?>
            <p class="error_title font-800">Success</p>
            <p class="error_subtitle">Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ tới bạn trong vòng 01 ngày làm việc.</p>
            <a href="<?php echo site_url(); ?>" class="green text-18"><i class="fa fa-arrow-left"></i> Quay lại trang chủ </a>
            <?php else: ?>
            <p class="error_title font-800">ERROR</p>
            <p class="error_subtitle">Phương thức đặt hàng của chúng tôi đang bảo trì, vui lòng quay lại sau.</p>
            <a href="<?php echo site_url(); ?>" class="green text-18"><i class="fa fa-arrow-left"></i> Quay lại trang chủ </a>
            <?php endif; ?>
        </div>
        <?php get_template_part('layout_mobile/product/footer'); ?>
    </div>
</body>

</html>
<?php else: ?>
<!DOCTYPE html>
<html lang="vi-vn">
<?php get_template_part('layout_desktop/product/header-page'); ?>

<body>
    <?php get_template_part('layout_desktop/menu'); ?>
    <div class="content_wrap fullwidth bg-white text-center">
        <?php if($check == 'OK'): ?>
        <p class="error_title font-800" style="font-weight:800;color:red;font-size:10rem;">Success</p>
        <p class="error_subtitle">Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ tới bạn trong vòng 01 ngày làm việc.</p>
        <a href="<?php echo site_url(); ?>" class="green text-18"><i class="fa fa-arrow-left"></i> Quay lại trang chủ </a>
        <?php else: ?>
        <p class="error_title font-800" style="font-weight:800;color:red;font-size:10rem;">ERROR</p>
        <p class="error_subtitle">Phương thức đặt hàng của chúng tôi đang bảo trì, vui lòng quay lại sau.</p>
        <a href="<?php echo site_url(); ?>" class="green text-18"><i class="fa fa-arrow-left"></i> Quay lại trang chủ </a>
        <?php endif; ?>
    </div>

    <?php get_template_part('layout_desktop/footer'); ?>

    <?php get_template_part('layout_desktop/product/scripts'); ?>
    <?php get_template_part('layout_desktop/product/scripts_cart_custom'); ?>
</body>

</html>
<!-- Load time: 0.174 seconds  / 7 mb-->
<!-- Powered by HuraStore 7.4.6, Released: 17-July-2020 / Website: www.hurasoft.vn -->
<?php endif; ?>