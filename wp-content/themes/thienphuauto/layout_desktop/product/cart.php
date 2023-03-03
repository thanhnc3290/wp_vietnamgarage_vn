<?php 

    
    //update cart dựa vào query    
    function update_cart_item_qty($item_key, $new_qty){
        global $woocommerce;
        $woocommerce->cart->set_quantity( $item_key, $new_qty );
    }

    //update cart dựa vào query
    $update_key     = $_GET['change'];
    $removed_item   = $_GET['removed_item'];
    if(!$removed_item){ //check nếu không tồn tại query remove_item thì mới thực hiện, nếu không sẽ lỗi
        if($update_key){
            $data_array = explode('---',$update_key);
            $item_key   = $data_array['0'];
            $new_qty    = $data_array['1'];
            if(isset($item_key) && isset($new_qty)){
                update_cart_item_qty($item_key, $new_qty);
            }
        }
    }

    //lấy nội dung cart
    global $woocommerce;
    $cart_items = $woocommerce->cart->get_cart();
    $cart_url   = home_url( $wp->request );
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
        <style>
            .back-to-home {
                color: #fda430;
                margin-bottom: 10px;
                display: block;
                font-weight: 600;
            }

            .box-cart {
                background: #fff;
            }

            .top-title-cart {
                border-bottom: 1px solid #f0f0f0;
                padding: 10px;
            }

            .title-info-cart {
                width: 50%;
            }

            .info-product-cart {
                width: 50%;
            }

            .title-price-cart {
                width: 14%;
            }

            .title-quantity-cart {
                width: 14%;
            }

            .quantity-cart {
                width: 14%;
            }

            .title-total-price-cart {
                width: 14%;
            }

            .total-price-cart {
                width: 14%;
            }

            .price-cart {
                width: 14%;
            }

            .quantity-change {
                width: 55px;
                height: 35px;
                text-align: center;
            }

            .title-delete-cart {
                width: 8%;
            }

            .item-product-cart {
                margin: 10px 0;
                padding: 10px;
            }

            .total-item-price {
                color: #fe0001;
                font-weight: 700;
            }

            .delete-from-cart {
                width: 8%;
            }

            .image-product {
                width: 100px;
                margin-right: 20px;
            }

            .name-product {
                width: calc(100% - 100px);
                margin-right: 30px;
                font-weight: 700;
                line-height: 20px;
            }

            .total-cart {
                border-top: 1px solid #f0f0f0;
                padding: 20px 10px;
            }

            #total-cart-price {
                color: #fe0001;
            }

            .box-form-cart {
                background: #fff;
                padding: 10px 6px;
                margin-top: 20px;
            }

            .box-form-cart h3 {
                text-transform: uppercase;
                font-size: 16px;
                font-weight: 700;
                background: #f0f0f0;
                padding: 11px 10px;
                border-radius: 8px;
                margin-bottom: 10px;
            }
            .form-group {
                margin-bottom: 1rem;
            }
            .note {
                padding-bottom: 10px;
            }
            .select-method {
                font-size: 14px;
                margin-bottom: 14px;
            }
            .select-method span {
                position: relative;
                padding-left: 20px;
                margin-right: 15px;
                display: block;
                margin-bottom: 10px;
            }

            .active::before {
                background-color: #fda430;
            }

            .method-oder {
                background: #f0f0f0;
                border-radius: 8px;
                padding: 15px;
            }

            .item-form {
                margin-bottom: 10px;
            }
           .buy-cart {
                background: #fda430;
                border-radius: 5px;
                display: block;
                width: 100%;
                outline: none;
                border: none;
                padding: 10px;
                font-size: 18px;
                margin-top: 10px;
                text-transform: uppercase;
                font-weight: 700;
            }
        </style>

        <div class="about_us" style="padding: 10px;">
            <a href="/" class="back-to-home"><i class="fa fa-angle-left"></i> Quay lại mua thêm sản phẩm khác</a>
            <div class="box-cart" style="background-color: #fff;">
                <div class="top-title-cart d-flex align-items">
                    <div class="title-info-cart">Sản phẩm</div>
                    <div class="title-price-cart">Đơn giá</div>
                    <div class="title-quantity-cart">Số lượng</div>
                    <div class="title-total-price-cart">Số tiền</div>
                    <div class="title-delete-cart text-center">Thao tác</div>
                </div>

                <!-- foreach -->
                <?php $total_cart_price = '0'; ?>
                <?php $user_total_order = ''; ?>
                <?php if(count($cart_items) > '0'): ?>
                <?php foreach($cart_items as $row): ?>
                            <?php 
                                //print_r($row);
                                $row_product_key            = $row['key'];

                                $row_product_id             = $row['product_id'];
                                $row_product_qty            = $row['quantity'];
                                $row_product_info           = wc_get_product($row_product_id);
                                //print_r($row_product_info);
                                $row_product_name           = $row_product_info->name;
                                $row_product_image_link     = $row_product_info->get_image('thumbnail');
                                $row_product_price          = get_post_meta($row_product_id , '_price', true);
                                $row_product_price_total    = $row_product_price * $row_product_qty;
                                $total_cart_price           = $total_cart_price + $row_product_price_total;
                                
                                
                                //url để remove product khỏi cart
                                $row_url_to_remove_product_query  = $woocommerce->cart->get_remove_url($row_product_key);

                                //gộp nội dung order vào total_order
                                $user_total_order           .= $row_product_name.' x '.$row_product_qty.' - Tổng tiền: '.format_price($row_product_price_total).'||||';
                            ?>

                <div class="item-product-cart js-item-row d-flex align-items" data-variant_id="0" data-item_id="8268" data-item_type="product">
                    <div class="info-product-cart d-flex ">
                        <a href="<?php the_permalink($row_product_id); ?>" class="image-product">
                            <?php echo $row_product_image_link ?>
                        </a>
                        <a href="<?php the_permalink($row_product_id); ?>"
                            class="name-product"><?php echo $row_product_name ?></a>
                    </div>
                    <div class="price-cart">
                        <input type="hidden" class="buy-price" value="<?php echo format_price($row_product_price) ?>">
                        <b class="js-show-buy-price"><?php echo format_price($row_product_price) ?></b>
                    </div>
                    <div class="quantity-cart">
                        <input onchange="update_cart_key_<?php echo $row_product_key ?>()"
                            id="<?php echo $row_product_key ?>" type="text" size="3"
                            value="<?php echo $row_product_qty ?>"
                            class="buy-quantity  js-buy-quantity js-quantity-change quantity-change">
                    </div>
                    <div class="total-price-cart" style="color: #fe0001;font-weight: 700;">
                        <span class="total-item-price itemCart-price"><?php echo format_price($row_product_price_total) ?></span>
                    </div>
                    <a href="<?php echo $row_url_to_remove_product_query ?>" class="delete-from-cart text-center"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
                <script>
                function update_cart_key_<?php echo $row_product_key ?>() {
                    var cart_new_qty_of_item = document.getElementById('<?php echo $row_product_key ?>').value;
                    var url_to_update_cart_item = window.location.href.split('?')[0] +
                        '?change=<?php echo $row_product_key ?>---' + cart_new_qty_of_item;
                    //console.log(url_to_update_cart_item);
                    window.location.href = url_to_update_cart_item;
                }
                </script>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- end foreach -->

                <div class="total-cart d-flex align-items space-between">
                    <b>Tổng tiền</b>
                    <b id="total-cart-price"><?php echo format_price($total_cart_price); ?></b>
                </div>
            </div>

            <div class="box-form-cart">
                <form method="post" enctype="multipart/form-data" action="<?php echo site_url() ?>/thanh-toan/" onsubmit="">
                    <div class="row">
                        <div style="width:49%; margin-rigth:1%;">
                            <h3>Thông tin người mua</h3>
                            <p class="note">
                                Để tiếp tục đặt hàng, quý khách xin vui lòng nhập thông tin bên dưới
                            </p>
                            <div class="form-group row">
                                <label class="col-md-3 col-12">Họ tên*</label>
                                <div class="col-md-9 col-12">
                                    <input type="text" name="user_name" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-12">SĐT*</label>
                                <div class="col-md-9 col-12">
                                    <input type="text" name="user_phone" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-12">Email*</label>
                                <div class="col-md-9 col-12">
                                    <input type="text" name="user_email" value="" class="form-control"></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-12">Địa chỉ*</label>
                                <div class="col-md-9 col-12">
                                    <input type="text" name="user_address" id="buyer_address" value="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 col-12">Ghi chú</label>
                                <div class="col-md-9 col-12">
                                    <textarea name="user_note" class="form-control" row="3"></textarea>
                                </div>
                            </div>
                            <textarea name="user_order" class="form-control" row="3" style="display:none!important;"><?php echo $user_total_order ?></textarea>
                        </div>
                        <div style="width:49%; margin-left:1%;">
                            <h3>Các hình thức thanh toán</h3>
                            <div class="method-pay">
                                <p style="line-height:1.5rem;">Thanh toán tiền mặt tại cửa hàng Thiên Phú Auto</p>
                                <p style="line-height:1.5rem;">Thanh toán chuyển khoản qua ngân hàng (Vietcombank, Agribank, Viettinbank, ACB....)</p>
                                <p style="line-height:1.5rem;">Thanh toán khi nhận hàng</p>
                            </div>
                            <input type="hidden" name="send_order" value="yes">
                            <input type="submit" value="Đặt hàng" class="btn_next buy-cart">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <?php get_template_part('layout_desktop/footer'); ?>
    <?php get_template_part('layout_desktop/product/scripts'); ?>
    <?php get_template_part('layout_desktop/product/scripts_cart_custom'); ?>
</body>

</html>