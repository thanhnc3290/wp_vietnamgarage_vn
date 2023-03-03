<div class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-content-main d-flex">
                <div class="item">
                    <h6 class="title"><?php echo get_bloginfo('name'); ?></h6>
                    <div class="content">
                        <p class="d-flex">
                            <i class="fa fa-map-marker"></i>
                            <span><?php echo get_theme_address_from_function(); ?></span>
                        </p>
                        <p class="d-flex">
                            <i class="fa fa-map-marker"></i>
                            <span><a href="<?php echo get_theme_google_map_from_function(); ?>" class="btn-map">Xem bản đồ</a></span>
                        </p>
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
                <div class="item pay">
                    <h6 class="title">Thanh toán Tiện lợi</h6>
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/pay.png" alt=""></a>
                    <h6 class="title pay">Thanh toán Tiện lợi</h6>
                    <div class="d-flex align-items space-between">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/baokim.png" alt=""></a>
                        <a href="#" style="margin: 0 10px;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bct.png" alt=""></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/dmca-protected.png" alt=""></a>
                    </div>
                </div>
                <div class="item">
                    <h6 class="title">Thông Tin <?php echo get_bloginfo('name'); ?></h6>
                    <div class="content">
                        <a href="<?php echo get_category_link('1') ?>">Tin Tức</a>
                        <a href="<?php echo get_category_link('28') ?>">Thông tin khuyến mại</a>
                        <a href="<?php echo site_url().'/sitemap.xml'; ?>">Sơ đồ web</a>
                        <a href="<?php echo site_url().'/lien-he'.'/'; ?>">Liên hệ</a>
                    </div>
                </div>
                <div class="item">
                    <h6 class="title">Dịch Vụ</h6>
                    <div class="content">
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
    <div class="footer-bottom">
        <p>Copyright © 2023 <?php echo get_bloginfo('name'); ?>. All Rights Reserved.</p>
    </div>
</div>

<?php get_template_part('layout_desktop/sidebar'); ?>

<style>
#banner_ads_left {
    position: fixed;
    z-index: 12;
    bottom: -100%;
    left: 0;
    -webkit-box-shadow: 0 0 4px 0 #000;
    box-shadow: 0 0 4px 0 #000;
    -webkit-transition: .6s all;
    transition: .6s all
}

#banner_ads_left .toggle-banner {
    background: #fff;
    color: #464646;
    font-size: 16px;
    font-weight: 300;
    width: 24px;
    height: 24px;
    line-height: 24px;
    text-align: center;
    position: absolute;
    top: 0;
    right: 0
}

#banner_ads_left.on-screen {
    transition: .6s all;
    bottom: 0;
}

#banner_ads_left img {
    height: 400px;
    width: 400px;
}
</style>
<script>
setTimeout(function() {
    $('#banner_ads_left').addClass('on-screen')
}, 5000);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/hurastore.js"> </script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/libbrary.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/global.js"> </script>

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

    //category fix
    fixed_menu_left();

    $(window).scroll(function() {
        var page_height = 500;


        if ($(window).scrollTop() > page_height) {
            $(".header-bottom").addClass('header-fixed');
        } else {
            $(".header-bottom").removeClass('header-fixed');
        }

    })
    global_getArticle(25, '#js-art-header');

    $(document).ajaxStop(function() {
        $('.header-bottom-right').owlCarousel({
            margin: 10,
            lazyLoad: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplaySpeed: 2000,
            autoplayHoverPause: true,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            items: 3,
        });
    });

    $('.banner-popup-container').fadeIn()

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

function run_carousel(holder) {
    $(holder).owlCarousel({
        margin: 10,
        lazyLoad: true,
        loop: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1500,
        autoplayHoverPause: true,
        dots: false,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        items: 5,
    });
}

//  Fixed category //

function fixed_menu_left() {
    var topfix = $("#main-menu").offset().top + $("#main-menu").height();
    $(window).scroll(function() {
        if ($(window).scrollTop() > topfix) $("#category-fixed").addClass("slideInLeft").fadeIn();
        else $("#category-fixed").removeClass("slideInLeft").fadeOut();
    });

    $("#category-fixed a").click(function() {
        var id = $(this).attr("id");
        var top = $(".group-product-category[data-cat='" + id + "']").offset().top;
        $('html,body').animate({
            scrollTop: top - 40
        }, 800);
    });
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
        urlSearch = '/ajax/get_json.php?action=search&content=product&q=' + encodeURIComponent(inputString);

        $.getJSON(urlSearch, function(result) {
            var data = result;
            data.forEach(function(item, key) {
                if (key < 10) {
                    var price = Hura.Util.writeStringToPrice(item.price);
                    if (price != 0) price = price + ' VNĐ';
                    else price = "Liên hệ"

                    htmlResult += '<a href="' + item.productUrl + '">';
                    htmlResult += '<img src="' + item.productImage.medium + '" alt="' + item
                        .productName + '" />';
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

function global_getArticle(catId, holder) {
    var html = "";
    var url = "/ajax/get_json.php?action=article&action_type=featured&type=article&catId=" + catId + "&show=10";

    $.getJSON(url, function(result) {
        var data = result;

        data.forEach(function(item, limit) {
            if (limit < 3) {

                html += `
                         <a href="` + item.url + `" class="item d-flex align-items">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_gift.png" style="width: 9%" alt="">
                           <div class="txt">` + item.title + `</div>
                        </a>
                    `;
            }
        })
        $(holder).html(html);
    });
}
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

    run_carousel('#js-product-saleoff');

    // scroll load san pham
    $(window).scroll(function() {
        ajaxLoadProduct();

        $(".group-product-category").each(function() {
            var top = $(this).offset().top;
            if ($(window).scrollTop() > top - 190) {
                var id = $(this).attr("data-cat");
                $("#category-fixed a").removeClass("active");
                $("#" + id).addClass("active");
            }
        });

    });

});

function ajaxLoadProduct() {
    $(".js-product-load").each(function() {
        if (isOnScreen($(this)) && $(this).hasClass('loaded') == false) {

            var catId = $(this).attr("data-catid");
            getBanner(catId, "#js-banner-" + catId);

            getProductList(
                "/ajax/get_json.php?action=product&action_type=product-list&type=hot&limit=10&sort=order&category=" +
                catId, "#js-category-homepage-" + catId);

            $(document).ajaxStop(function() {

                run_carousel("#js-category-homepage-" + catId);

            });

            $(this).addClass('loaded');
        }
    });

}

function getBanner(catId, holder) {
    var url =
        "/ajax/get_json.php?action=banner&action_type=list&template=product_list&location=33&sort=order&show=2&category=" +
        catId;

    $.getJSON(url, function(result) {
        var data = "";
        var html = "";
        var data = result.list;
        console.log(data)
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

<script>
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {
        myFunction()
    };

    // Get the header
    var header = document.getElementById("myHeader");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("header-fixed");
        } else {
            header.classList.remove("header-fixed");
        }
    }
</script>

<?php wp_footer();?>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/myjs_desktop.js"> </script>