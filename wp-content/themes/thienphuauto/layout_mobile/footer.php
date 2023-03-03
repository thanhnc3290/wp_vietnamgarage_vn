<div class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-content-main">
                <div class="item">
                    <h6 class="title"><?php echo get_bloginfo('name'); ?></h6>
                    <div class="content">
                        <p class="d-flex">
                            <i class="fa fa-map-marker"></i>
                            <span><?php echo get_theme_address_from_function(); ?></span>
                        </p>
                        <a href="<?php echo get_theme_google_map_from_function(); ?>" class="btn-map">Xem bản đồ</a>
                        <p class="d-flex">
                            <i class="fa fa-phone-volume"></i>
                            <span>Điện thoại: <?php echo get_theme_phone_from_function(); ?></span>
                        </p>
                        <p class="d-flex">
                            <i class="fa fa-phone-volume"></i>
                            <span>Hotline : <?php echo get_theme_hotline_from_function(); ?></span>
                        </p>
                        <p class="d-flex">
                            <i class="fa fa-envelope"></i>
                            <span>Email: <?php echo get_theme_email_from_function(); ?></span>
                        </p>
                        <div class="media-social d-flex align-items">
                            <a href="<?php echo get_theme_fanpage_from_function(); ?>" class="icon_media facebook"></a>
                            <a href="<?php echo get_theme_google_plus_from_function(); ?>" class="icon_media google"></a>
                            <a href="<?php echo get_theme_youtube_from_function(); ?>" class="icon_media youtobe"></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="show-footer">
                        <div class="title d-flex align-items space-between">
                            <h6>Thông tin <?php echo get_bloginfo('name'); ?></h6>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="content" style="display:block;">
                            <a href="<?php echo get_category_link('1') ?>">Tin Tức</a>
                            <a href="<?php echo get_category_link('28') ?>">Thông tin khuyến mại</a>
                            <a href="<?php echo site_url().'/sitemap.xml'; ?>">Sơ đồ web</a>
                            <a href="<?php echo site_url().'/lien-he'.'/'; ?>">Liên hệ</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="show-footer">
                        <div class="title d-flex align-items space-between">
                            <h6>Dịch Vụ</h6>
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="content"  style="display:block;">
                            <a href="<?php echo site_url().'/gioi-thieu'.'/'; ?>">Giới thiệu</a>
                            <a href="<?php echo site_url() ?>/chinh-sach-ban-hang/">Chính Sách Bán Hàng</a>
                            <a href="<?php echo site_url() ?>/huong-dan-dat-hang/">Hướng Dẫn Đặt Hàng</a>
                            <a href="<?php echo site_url() ?>/huong-dan-thanh-toan/">Hướng Dẫn Thanh Toán</a>
                            <a href="<?php echo site_url() ?>/chinh-sach-bao-hanh-san-pham/">Chính Sách Bảo Hành</a>
                            <a href="<?php echo site_url() ?>/chinh-sach-doi-tra-va-hoan-tien/">Hướng Dẫn Đổi Trả Hàng</a>
                            <a href="<?php echo site_url() ?>/dieu-khoan-chinh-sach/">Điều Khoản Chính Sách</a>
                            <a href="<?php echo site_url() ?>/quy-dinh-ve-bao-mat/">Quy Định Về Bảo Mật</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center">
        <p>Copyright © 2023 <?php echo get_bloginfo('name'); ?>. All Rights Reserved.</p>
    </div>
</div>

<style>
    .hotline-footer {
        display: none
    }

    @media (max-width: 767px) {
        .hotline-footer {
            display: block;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 50px;
            z-index: 99;
            background: rgba(0, 0, 0, 0.6)
        }

        .hotline-footer .left {
            width: 33.33%;
            float: left;
            height: 100%;
            color: white;
            line-height: 43px;
            text-align: center;
        }


        .hotline-footer .right {
            width: 33.33%;
            float: right;
            height: 100%;
            line-height: 43px;
            text-align: center;
        }

        .hotline-footer .left {
            width: 33.33%;
            float: left;
            height: 100%;
            color: white;
            line-height: 43px;
            text-align: center;
        }

        .absolute-footer {
            font-size: 13px
        }

        .blog-single .large-9,
        .blog-single .large-3 {
            flex-basis: 100%;
            max-width: 100%;
        }

        .blog-single .large-3 {
            padding-left: 15px;
            font-size: 15px
        }

        .blog-single .large-3 .widget-area .section4 {
            display: none
        }

        .tin-tuc-section .cot1-2 {
            display: none
        }

        .hotline-footer a {
            color: white
        }

        .hotline-footer a {
            display: block;
        }

        .hotline-footer .left a {
            background: #0082d0;
            line-height: 40px;
            margin: 5px;
            border-radius: 3px;
        }

        .hotline-footer .right a {
            background: #3fb801;
            line-height: 40px;
            margin: 5px;
            border-radius: 3px;
        }

        .hotline-footer .left img,
        .hotline-footer .right img {
            width: 30px;
            padding-right: 10px;
        }
    }
</style>

<!-- <div class="hotline-footer">
    <div class="left">
        <a href="<?php echo get_theme_messenger_from_function(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png">Chat FB</a>
    </div>
    <div class="right">
        <a href="tel:<?php echo get_theme_hotline_number(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.gif">Gọi ngay</a>
    </div>
    <div class="left"> 
        <a href="<?php echo get_theme_zalo_from_function(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/zalo.png">Chat Zalo</a>
    </div>
    <div class="clearboth"></div>
</div> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/hurastore.js"> </script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libbrary.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/global.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/myjs_mobile.js"></script>

<script>
$(document).ready(function() {
    // lazy load anh
    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });

    // dem so luong sp them vao gio hang
    showCartSummary(".js-cart-counter");

    //search
    _run_search();

    //back to  top
    scrollToTop();

    // click footer
    click_footer();

    // click menu
    $("#menu-mobile").click(function() {
        $("#main-menu,.overlay,body").toggleClass("active");
    });

    $("#category-menu .list i").click(function() {
        if ($(this).parent().hasClass("active")) {
            $(this).parent().removeClass("active");
            $(this).parent().children(".sub").slideUp("fast");
        } else {
            $(this).parent().parent().children(".item").removeClass("active");
            $(this).parent().addClass("active");
            $(this).parent().parent().children(".item").children(".sub").slideUp("fast");
            $(this).parent().children(".sub").slideDown("fast");
        }
    }); // end click menu   
})

function scrollToTop() {
    $(window).scroll(function() {
        if ($(window).scrollTop() > 0) $("#toTop").fadeIn();
        else $("#toTop").fadeOut();
    });
    $("#toTop").click(function() {
        $('html,body').animate({
            scrollTop: 0
        }, 800);
    });
}

function click_footer() {
    $(".footer-content-main .item .title").click(function() {
        $(this).parents(".show-footer").toggleClass("active");
    });
}

function run_carousel(holder) {
    $(holder).owlCarousel({
        margin: 10,
        lazyLoad: true,
        loop: false,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplaySpeed: 1500,
        autoplayHoverPause: true,
        dots: false,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        items: 2,
    });
}

function closeMainMenu() {
    $("#main-menu,.overlay,body").toggleClass("active");
}

function showMenuCategory() {
    $("#category-menu,body").addClass("active");
}

function hideMenuCategory() {
    $("#category-menu,body").removeClass("active");
}
</script>
<script>
// search
function _run_search() {
    var curr_text = "";
    var count_select = 0;
    var curr_element = "";
    var textarea = document.getElementById("js-global-search");

    detectPaste(textarea, function(pasteInfo) {
        inputString = pasteInfo.text;
        search(inputString);
    });


    $('#js-global-search').keyup(debounce(function() {
        inputString = $(this).val();
        search(inputString);
    }, 500));

    $('body').click(function() {
        $(".autocomplete-suggestions").hide();
    });
}

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};

function search(inputString) {
    var htmlResult = "<div class='list'>";
    if (inputString.trim() != '') {
        //urlSearch = '/ajax/get_json.php?action=search&content=product&q=' + encodeURIComponent(inputString);
        urlSearch = '';

        $.getJSON(urlSearch, function(result) {
            var data = result;
            data.forEach(function(item, key) {
                if (key < 10) {
                    var price = Hura.Util.writeStringToPrice(item.price);
                    if (price != 0) price = price + ' VNĐ';
                    else price = "Liên hệ";
                    var image = item.productImage.medium;
                    if (image == '') image = '/template/giaodien_2022/images/logo-mb.png';

                    htmlResult += '<a href="' + item.productUrl + '">';
                    htmlResult += '<img src="' + image + '" alt="' + item.productName + '" />';
                    htmlResult += '<span class="info">';
                    htmlResult += '<span class="name">' + item.productName + '</span>';
                    htmlResult += '<span class="price">' + price + '</span>';
                    htmlResult += '</span>';
                    htmlResult += '</a>';
                }
            });
            htmlResult += '</div>';
            $(".autocomplete-suggestions").html(htmlResult);
            $(".autocomplete-suggestions").show();
        });

    } else {
        $(".autocomplete-suggestions").hide();
    }
}

function getTextAreaSelection(textarea) {
    var start = textarea.selectionStart,
        end = textarea.selectionEnd;
    return {
        start: start,
        end: end,
        length: end - start,
        text: textarea.value.slice(start, end)
    };
}

function detectPaste(textarea, callback) {
    textarea.onpaste = function() {
        var sel = getTextAreaSelection(textarea);
        var initialLength = textarea.value.length;
        window.setTimeout(function() {
            var val = textarea.value;
            var pastedTextLength = val.length - (initialLength - sel.length);
            var end = sel.start + pastedTextLength;
            callback({
                start: sel.start,
                end: end,
                length: pastedTextLength,
                text: val.slice(sel.start, end)
            });
        }, 1);
    };
}
// end search                                
</script>



<script>
$(document).ready(function() {

    // slide trang chu
    $("#js-slider-home").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        dotsSpeed: 1000,
        navSpeed: 1000,
        dots: true,
        nav: false,
        margin: 10,
        lazyLoad: true
    });

});

// scroll load san pham
$(window).scroll(function() {

    ajaxLoadProduct();

});

function ajaxLoadProduct() {
    $(".js-product-load").each(function() {
        if (isOnScreen($(this)) && $(this).hasClass('loaded') == false) {

            var catId = $(this).attr("data-catid");
            //getBanner(catId, "#js-banner-" + catId);	

            getProductList(
                // "/ajax/get_json.php?action=product&action_type=product-list&limit=10&sort=order&category=" +
                // catId, "#js-category-homepage-" + catId);
                '';);

            $(this).addClass('loaded');
        }
    });

}

function getBanner(catId, holder) {
    // var url =
    //     "/ajax/get_json.php?action=banner&action_type=list&template=product_list&location=12&sort=order&show=2&category=" +
    //     catId;
    var url ='';

    $.getJSON(url, function(result) {
        var data = "";
        var html = "";
        var data = result.list;
        //console.log(data)
        if (result.total > 0) {
            data.forEach(function(item, index) {
                html += `<a href="` + item.desUrl + `" class="item"> ` + item.html_code + ` </a>`;
            });

            $(holder).html(html);
        } else {
            $(holder).remove();
        }
    });
}
</script>


</div>