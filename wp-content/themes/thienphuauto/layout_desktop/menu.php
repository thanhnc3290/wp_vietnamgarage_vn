

<?php 
    //lấy tât cả danh mục sản phẩm
    $parent_id         = '15';
    $product_list_lv_1 = vietnam_garage_vn_get_product_catalog_list($parent_id);
    //print_r($product_list_lv_1);
?>
<div class="header">
        <?php get_template_part('layout_desktop/home/banner-top'); ?>
        <div class="header-mid">
            <div class="container">
                <div class="header-main-mid d-flex align-items">
                    <a href="<?php echo site_url() ?>" class="logo">
                        <img src="<?php echo get_custom_logo_image_link() ?>" alt="logo" class="header-logo-site">
                    </a>
                    <div class="content-form-search">
                        <div class="phone-contact d-flex align-items space-center">
                            <i class="fa fa-phone-volume"></i>
                            <p>Hotline(24/7) :</p>
                            <div class="color-contact d-flex align-items">
                                <?php echo get_theme_hotline_from_function(); ?>
                            </div>

                        </div>
                        <div class="form__input">
                            <form method="get" action="<?php echo site_url() ?>" enctype="multipart/form-data" class="clearfix search-form bg-white">
                                <select name="scat_id">
                                    <option value="">Tất cả danh mục</option>
                                    <?php foreach($product_list_lv_1 as $row): ?>
                                        <?php 
                                            $catalog_name = $row->name;
                                            $catalog_id   = $row->term_id;    
                                        ?>
                                    <option value="<?php echo $catalog_id ?>"><?php echo $catalog_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="searh-form-container">
                                    <input type="text" id="js-global-search" class="text_search" name="s" placeholder="Nhập từ khóa tìm kiếm" autocomplete="off">
                                    <button type="submit" class="submit-search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="autocomplete-suggestions" id="js-seach-holder"></div>
                        </div>
                    </div>
                    <div class="header-mid-right d-flex align-items">
                        <a href="<?php echo get_category_link('1') ?>" class="item">
                            <i class="icon_2022 art"></i>
                            <div class="txt">Tin tức</div>
                        </a>
                        <a href="<?php echo get_category_link('29') ?>" class="item">
                            <i class="icon_2022 baohanh"></i>
                            <div class="txt">Tra cứu bảo hành</div>
                        </a>
                        <a href="<?php echo site_url().'/gio-hang'.'/'; ?>" class="item cart">
                            <i class="icon_2022 cart"></i>
                            <div class="txt">Giỏ hàng</div>
                            <span class="js-cart-counter cart-count">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="header-bottom" id="myHeader">
            <div class="container">
                <div class="content-header-bottom d-flex align-items">
                    <div class="header-menu" id="main-menu">
                        <div class="title">
                            <i class="icon_2022 menu"></i>
                            <div class="name-title">Danh mục sản phẩm</div>
                        </div>
                        <div class="height-hover"></div>
                        
                        <div class="menu_holder ">
                        <?php foreach($product_list_lv_1 as $row): ?>
                            <?php 
                                $catalog_url  = get_category_link($row->term_id);
                                $catalog_name = $row->name;  
		                        $catalog_image = vietnam_garage_vn_get_product_catalog_thumbnail_url($row->term_id);  
                            ?>
                            <div class="item">
                                <a href="<?php echo $catalog_url ?>" class="item-cate d-flex align-items space-between">
                                    <div class="img-cat">
                                        <img src="<?php echo $catalog_image ?>" alt="<?php echo $row->name ?>" width="100%" height="100%">
                                    </div>
                                    <p class="cat-title"><?php echo $row->name ?></p>
                                </a>
                                <?php 
                                    $parent_id = $row->term_id;
                                    $product_list_lv_2 = vietnam_garage_vn_get_product_catalog_list($parent_id);
                                ?>
                                <?php if(count($product_list_lv_2) > '0'): ?>
                                <div class="menu-hover">
                                    <div class="list-holder d-flex  flex-wrap">
                                        <?php foreach($product_list_lv_2 as $subs): ?>
                                            <?php 
                                                $catalog_url    = get_category_link($subs->term_id);
                                                $catalog_name   = $subs->name;
                                            ?>

                                        <div class="item-holder">
                                            <a href="<?php echo $catalog_url ?>" class="title-holder"><?php echo $catalog_name ?></a>
                                            <?php 
                                                $parent_id = $subs->term_id;
                                                $product_list_lv_3 = vietnam_garage_vn_get_product_catalog_list($parent_id);
                                            ?>
                                            <?php if(count($product_list_lv_3) > '0'): ?>
                                                <?php foreach($product_list_lv_3 as $subss): ?>
                                                    <?php 
                                                        $catalog_url    = get_category_link($subss->term_id);
                                                        $catalog_name   = $subss->name;
                                                    ?>
                                            <div class="holder-last">
                                                <a href="<?php echo $catalog_url ?>"><?php echo $catalog_name; ?></a>
                                            </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <?php get_template_part('layout_desktop/menu_slider_text'); ?>
                </div>
            </div>
        </div>
    </div>