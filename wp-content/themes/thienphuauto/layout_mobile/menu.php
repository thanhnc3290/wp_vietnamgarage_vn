<?php 
    //lấy tât cả danh mục sản phẩm
    $parent_id         = '15';
    $product_list_lv_1 = vietnam_garage_vn_get_product_catalog_list($parent_id);
    //print_r($product_list_lv_1);
?>

<div class="container-mb">
    <div class="header">
        <div class="header-main">
            <div class="container">
                <div class="header-main-content d-flex align-items space-between">
                    <div class="header-left d-flex align-items">
                        <a href="javascript:void(0)" id="menu-mobile">
                            <i class="fa fa-bars"></i>
                        </a>
                        <a href="<?php echo site_url() ?>" class="logo" style="max-width:10rem!important;"><img src="<?php echo get_custom_logo_image_link() ?>" alt="" class="header-logo-site"></a>
                    </div>
                    <div class="header-right d-flex align-items">
                        <a href="<?php echo get_category_link('1') ?>" class="item"><i class="icon_2022 art"></i></a>
                        <a href="<?php echo get_category_link('29') ?>" class="item"><i class="icon_2022 baohanh"></i></a>
                        <a href="<?php echo site_url().'/gio-hang'.'/'; ?>" class="item cart">
                            <i class="icon_2022 cart"></i>
                            <span class="js-cart-counter cart-count">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="form__input">
                    <form method="get" action="<?php echo site_url() ?>" enctype="multipart/form-data"
                        class="clearfix search-form bg-white">
                        <div class="searh-form-container">
                            <input type="text" id="js-global-search" class="text_search" name="s" placeholder="Nhập từ khóa tìm kiếm" autocomplete="off">
                            <input type="text" class="text_search" name="scat_id" placeholder="Nhập từ khóa tìm kiếm" autocomplete="off" style="display:none!important;">
                            <button type="submit" class="submit-search">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="autocomplete-suggestions" id="js-seach-holder" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay" onclick="closeMainMenu();"></div>
    <div id="main-menu" class="">
        <div class="list">
            <div class="item d-flex space-between">
                <a href="<?php echo site_url(); ?>" class="item"><span class="icon"><i class="fa fa-home"></i></span><span class="title">Trang chủ</span></a>
                <a href="javascript:void()" class="item" onclick="closeMainMenu();"><i class="fa fa-close"></i></a>
            </div>
            <div class="line"></div>
            <div id="category-menu">
                <div class="list">
                    <?php foreach($product_list_lv_1 as $row): ?>
                        <?php 
                            $catalog_url  = get_category_link($row->term_id);
                            $catalog_name = $row->name;  
                        ?>
                    <div class="item">
                        <a href="<?php echo $catalog_url ?>" class="lv1"><?php echo $catalog_name ?></a>
                            <?php 
                                $parent_id = $row->term_id;
                                $product_list_lv_2 = vietnam_garage_vn_get_product_catalog_list($parent_id);
                            ?>
                            <?php if(count($product_list_lv_2) > '0'): ?>
                        <i class="fa fa-chevron-down"></i>
                        <div class="sub">
                            <?php foreach($product_list_lv_2 as $subs): ?>
                                <?php 
                                    $catalog_url    = get_category_link($subs->term_id);
                                    $catalog_name   = $subs->name;
                                ?>
                            <div class="item">
                                <a href="<?php echo $catalog_url ?>" class="lv2"><?php echo $catalog_name ?></a>
                                    <?php 
                                        $parent_id = $subs->term_id;
                                        $product_list_lv_3 = vietnam_garage_vn_get_product_catalog_list($parent_id);
                                    ?>
                                    <?php if(count($product_list_lv_3) > '0'): ?>
                                <i class="fa fa-chevron-down"></i>
                                <div class="sub">
                                    <?php foreach($product_list_lv_3 as $subss): ?>
                                        <?php 
                                            $catalog_url    = get_category_link($subss->term_id);
                                            $catalog_name   = $subss->name;
                                        ?>
                                    <div class="item">
                                        <a href="<?php echo $catalog_url ?>" class="lv2"><?php echo $catalog_name ?></a>
                                        <div class="sub">

                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <!--sub-->
                                    <?php endif; ?>
                            </div>
                            <!--item-->
                            <?php endforeach; ?>
                        </div>
                        <!--sub-->
                            <?php endif; ?>

                    </div>
                    <!--item-->
                    <?php endforeach; ?>

                </div>
                <!--list-->
            </div>
            <!--category-menu-->


            <div class="line"></div>
            <div class="item">
                <a href="<?php echo site_url().'/gioi-thieu'.'/'; ?>" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="title">Giới thiệu</span></a>
            </div>
            <div class="item">
                <a href="<?php echo site_url().'/lien-he'.'/'; ?>" class="item"><span class="icon"><i class="fa fa-id-card"></i></span><span class="title">Liên hệ</span></a>
            </div>
            <div class="item">
                <a href="<?php echo get_category_link('1') ?>" class="item"><span class="icon"><i class="fa fa-newspaper-o"></i></span><span class="title">Tin tức</span></a>
            </div>
            <div class="line"></div>
            <div class="item">
                <a href="<?php echo site_url().'/gio-hang'.'/'; ?>" class="item"><span class="icon"><i class="fa fa-shopping-cart"></i></span><span class="title">Giỏ hàng của bạn</span></a>
            </div>
            <div class="line"></div>
            <div class="item">
                <a href="tel:<?php echo get_theme_hotline_number(); ?>" class="item"><span class="icon"><i class="fa fa-phone"></i></span><span class="title"><?php echo get_theme_hotline_number(); ?></span></a>
            </div>
        </div>
        <!--list-->
    </div>
    <!--main-menu-->