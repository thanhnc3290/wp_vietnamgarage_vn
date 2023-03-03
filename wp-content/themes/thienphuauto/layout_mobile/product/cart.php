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
<?php get_template_part('layout_mobile/news/header-single'); ?>

<body>
    <div class="container-mb">
        <?php get_template_part('layout_mobile/menu'); ?>

        <style>
            .name-product {
                padding-bottom: 15px;
                display: block;
                font-weight: bold;
            }

            .quantity-change {
                width: 55px;
                height: 35px;
                text-align: center;
            }

            .total-item-price {
                color: #fe0001;
                font-weight: 700;
            }

            .space-between {
                justify-content: space-between!important;
            }

            .info-cart-right{width:100%;}
        </style>
        <div class="home-cart">
            <div class="container">
                <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('
                    <div id="breadcrumb" class="breadcrumb" style="margin-top:0.5rem;padding-bottom:0.5rem;">','</div>');
                    }
                ?>
                <div class="clearfix"></div>
            </div>

            <div class="content-cart">
                <a href="/" class="back-to-home" style="margin-left:1rem;"><i class="fa fa-angle-left"></i> Quay lại mua thêm sản phẩm khác</a>
            </div>

            <div class="box-cart">
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
                <div class="item-product-cart js-item-row d-flex" data-variant_id="0" data-item_id="8318" data-item_type="product">
                    <div class="info-cart-left">
                        <div class="info-product-cart">
                            <a href="<?php the_permalink($row_product_id); ?>" class="image-product">
                                <?php echo $row_product_image_link ?>
                            </a>
                            <a href="<?php echo $row_url_to_remove_product_query ?>" class="delete-from-cart text-center d-flex align-center space-center">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="info-cart-right">
                        <a href="<?php the_permalink($row_product_id); ?>" class="name-product"><?php echo $row_product_name ?></a>
                        <div class="price-cart">
                            <input type="hidden" class="buy-price" value="<?php echo format_price($row_product_price) ?>">
                            <b class="js-show-buy-price" style="display:none;"><?php echo format_price($row_product_price) ?></b>
                        </div>
                        <div class="d-flex align-items space-between">
                            <div class="quantity-cart">
                                <input 
                                    onchange="update_cart_key_<?php echo $row_product_key ?>()"
                                    id="<?php echo $row_product_key ?>"
                                    value="<?php echo $row_product_qty ?>"
                                    type="text" size="3" value="1" class="buy-quantity quantity-change js-buy-quantity js-quantity-change">
                            </div>
                            <div class="total-price-cart" style="color: #fe0001;font-weight: 700;">
                                <span class="total-item-price itemCart-price"><?php echo format_price($row_product_price_total) ?></span>
                            </div>
                        </div>
                    </div>
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
                <!-- end foreach -->
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="box-form-cart">
                <form method="post" enctype="multipart/form-data" action="<?php echo site_url() ?>/thanh-toan/">
                    <div class="row">
                        <div class="col-4">
                            <h2>Thông tin người mua</h2>
                            <p class="note">
                                Để tiếp tục đặt hàng, quý khách xin vui lòng nhập thông tin bên dưới
                            </p>
                            <div class="form-group row">
                                <label class="col-md-3 col-12">Họ tên*</label>
                                <div class="col-md-9 col-12">
                                    <input type="text" name="user_name" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-12">SĐT*</label>
                                <div class="col-md-9 col-12"><input type="text" name="user_phone" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-12">Email*</label>
                                <div class="col-md-9 col-12">
                                    <input type="text" name="user_email" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-12">Địa chỉ*</label>
                                <div class="col-md-9 col-12">
                                    <input type="text" name="user_address" value="" class="form-control">
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
                        <div class="col-4">
                            <h2>Các hình thức thanh toán</h2>
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

        <?php get_template_part('layout_mobile/product/footer'); ?>
        <?php get_template_part('layout_mobile/sticky_footer'); ?>
    </div>
</body>

</html>