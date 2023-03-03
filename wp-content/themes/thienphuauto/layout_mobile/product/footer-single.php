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
        <a href="<?php echo get_theme_messenger_from_function(); ?>"><img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png">Chat FB</a>
    </div>
    <div class="right">
        <a href="tel:<?php echo get_theme_hotline_number(); ?>"><img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.gif">Gọi ngay</a>
    </div>
    <div class="left">
        <a href="<?php echo get_theme_zalo_from_function(); ?>"><img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/zalo.png">Chat Zalo</a>
    </div>
    <div class="clearboth"></div>
</div> -->


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
        urlSearch = '/ajax/get_json.php?action=search&content=product&q=' + encodeURIComponent(inputString);

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
var PRODUCT_ID = '7789';
var product_config_count = parseInt('0');
var product_config = {
    "attributes": [],
    "variant_list": [],
    "product_info": {
        "product_id": "7789",
        "label": "D\u00e1n phim c\u00e1ch nhi\u1ec7t M\u1ef9 Classic, xe Vinfast Lux A \u0111en 2020, ch\u1ed1ng n\u00f3ng, ch\u1ed1ng ch\u00f3i, an to\u00e0n",
        "sku": "Classic M\u1ef9",
        "description": "",
        "sale_price": 0,
        "stock_quantity": "100",
        "bulk_price": []
    }
};
var idVariantSelected = 0;
var VARIANT_SELECTED = {};

$(document).ready(function() {

    //mua sp
    listenBuyButton(".js-buyNow", 0);

    // anh san pham
    $("#sync2 .item-thumbnail").click(function() {
        event.preventDefault();
        $(".item-thumbnail").removeClass("active");
        $(this).addClass("active");
        var src = $(this).find("a").attr("href");
        $("#sync1 a").attr("href", src);
        $("#sync1 img").attr("src", src);
        return false;
    });

    $("#sync2").owlCarousel({
        items: 5,
        margin: 10,
        dots: false,
        nav: true,
        autoHeight: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
    });

    // click mo ta tom tat thuoc tinh
    collapse_content('#content-summary', 98);

    // click tab san pham lien quan
    $(".tab-pro-detail .title-tab-ct li").click(function() {
        var datatab = $(this).find("a").attr("data-id");
        $(".tab-pro-detail .title-tab-ct li").removeClass("active");
        $(".tab-pro-detail .product-list-related").removeClass("active");
        $(this).addClass("active");
        $(datatab).addClass("active");
    });

    // slide san pham lien quan
    run_carousel('.product-list-related');

    // tab noi dung chi tiet san pham
    $("#title_tab_scroll_pro a").click(function() {
        $("#title_tab_scroll_pro a").removeClass("active");
        $(this).addClass("active");
        var idTab = $(this).attr('href');

        if ($(this).hasClass('item-tab')) {
            $('.tab-detail').removeClass('active');
            $(idTab).addClass('active')
        } else {
            $('body,html').animate({
                scrollTop: $($(this).attr("href")).offset().top - 90
            }, 800);
        }
        return false;
    });

    // click mo ta chi tiet san pham
    collapse_content('#content-desc', 500);

    // show ky thuat
    var height_spec = $('.product-spec .content').height();
    if (height_spec > 500) {
        $('.product-spec .content').css('height', '500px')
    }

    $('*[data-show-hover]').click(function() {
        var id = $(this).attr('data-show-hover');
        var view = $(this).attr('data-view');
        $(view).hide();
        $(id).show();
    });

})

// function mua hang
function listenBuyButton(dom_target, goCart) {
    $(dom_target).on("click", function() {
        var quantity = $('#js-buy-quantity').val();
        var buyer_note = '';

        var variant_id = 0;
        if ($(".js-variant-holder .selected").attr("id")) {
            variant_id = $(".js-variant-holder .selected").attr("id");
        }

        Hura.Cart.Product.add(PRODUCT_ID, variant_id, {
            quantity: quantity
        }).then(function(response) {
            console.log(PRODUCT_ID)
            if (response.status == 'error') {
                // bao loi
                if (response.error_type == 'item-in-cart') alert(
                    'Sản phẩm đã có trong giỏ hàng!');
                else if (response.error_type == 'invalid-item-id') alert(
                    'ID sản phẩm không đúng!');
                else alert(response.message);
            } else {
                if (goCart == 0) {
                    // thành công chuyển sang trang giỏ hàng
                    window.location.href = '/cart';
                } else if (goCart == 'tragop') {
                    location.href = '/cart?show=tragop'
                } else {
                    alert("Đã thêm sản phẩm vào giỏ hàng !");

                    setTimeout(function() {
                        showCartSummary(".js-cart-counter");
                    }, 1000);
                }
            }
        });
    });
}

// thay doi so luong mua  
$(".unit-detail-amount-control a").click(function() {
    let current_quantity = parseInt($("#js-buy-quantity").val());
    let change_quantity = parseInt($(this).attr("data-value"));
    let total_quantity = parseInt($("#js-buy-quantity").attr("data-total"));
    current_quantity += change_quantity;
    if (current_quantity > 0) {
        $("#js-buy-quantity").val(current_quantity);
    }

});
</script>


<script>
$("#js-show-rating").click(function() {
    $(".form-review").toggle();
});
$(".rating-selection input").click(function() {
    $(this).parents(".rating-selection").find("input").prop("checked", false);
    $(this).parents(".rating-selection").find("label").removeClass("active");
    $(this).prop("checked", true);
    $(this).parents("label").addClass("active");
});

function check_form_review_2022(id) {
    var error = "";
    var name = document.getElementById("review_reply_name_" + id).value;
    var email = document.getElementById("review_reply_email_" + id).value;
    var content = document.getElementById("review_reply_content_" + id).value;

    if (name.length < 4) error += "- Bạn chưa nhập tên\n";

    if (email.length < 4) {
        error += "- Bạn chưa nhập email\n";
    }
    if (email.length > 4) {
        if (validateEmail(email) == false) error += "- Email không hợp lệ\n";
    }
    if (content == '') error += "Bạn chưa nhập nội dung\n";
    if (error == '') {
        return true;
    } else {
        alert(error);
        return false;
    }
}

function postReview2022(id, reply) {
    if (check_form_review_2022(id) == false) return false;
    if (reply == '') {
        var user_name = document.getElementById("review_reply_name_" + id).value;
        var user_email = document.getElementById("review_reply_email_" + id).value;
        var content = document.getElementById("review_reply_content_" + id).value;
        var rate = parseInt($(".rating-selection input:checked").val());
        var item_type = $(".form-post [name='user_post[item_type]']").val();
        var item_id = $(".form-post [name='user_post[item_id]']").val();
        var item_title = $(".form-post [name='user_post[item_title]']").val();
        var title = $(".form-post [name='user_post[title]']").val();

        var payload = {
            item_type: item_type,
            item_id: item_id,
            reply_to: id,
            item_title: item_title,
            user_email: user_email,
            user_name: user_name,
            user_avatar: '',
            user_note: '',
            rate: rate,
            title: title,
            content: content
        };
        var ENDPOINT = "/ajax/post.php";
        $.post(ENDPOINT, {
            action: "review",
            action_type: "send",
            type: "ajax",
            user_post: payload
        }, function(data) {
            console.log(data);
            alert("Bạn đã gửi thành công");
            location.reload();
        });
    } else {
        var reply_to = id;
        var user_name = document.getElementById("review_reply_name_" + id).value;
        var user_email = document.getElementById("review_reply_email_" + id).value;
        var content = document.getElementById("review_reply_content_" + id).value;
        var rate = parseInt($(".rating-selection input:checked").val());
        var item_type = $(".form-reply" + id + " [name='user_post[item_type]']").val();
        var item_id = $(".form-reply" + id + " [name='user_post[item_id]']").val();
        var item_title = $(".form-reply" + id + " [name='user_post[item_title]']").val();
        var title = $(".form-reply" + id + " [name='user_post[title]']").val();

        var payload = {
            item_type: item_type,
            item_id: item_id,
            reply_to: id,
            item_title: item_title,
            user_email: user_email,
            user_name: user_name,
            user_avatar: '',
            user_note: '',
            rate: rate,
            title: title,
            content: content
        };
        var ENDPOINT = "/ajax/post.php";
        $.post(ENDPOINT, {
            action: "review",
            action_type: "send",
            type: "ajax",
            user_post: payload
        }, function(data) {
            console.log(data);
            alert("Bạn đã gửi thành công");
            location.reload();
        });


    }
}
</script>