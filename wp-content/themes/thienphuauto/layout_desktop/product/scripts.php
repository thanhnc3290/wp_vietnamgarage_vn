<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/product/libbrary.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

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
                           <img src="/template/giaodien_2022/images/icon_gift.png" style="width: 9%" alt="">
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
var PRODUCT_ID = '8291';
var product_config_count = parseInt('0');
var product_config = {
    "attributes": [],
    "variant_list": [],
    "product_info": {
        "product_id": "8291",
        "label": "M\u00e0n h\u00ecnh \u00f4 t\u00f4 Zestech S100J",
        "sku": "",
        "description": "",
        "sale_price": 5900000,
        "stock_quantity": "1",
        "bulk_price": []
    }
};
var idVariantSelected = 0;
var VARIANT_SELECTED = {};

MagicZoom.options = {
    'disable-zoom': false,
    'selectors-change': 'click',
    'zoom-width': 400,
    'zoom-height': 400
}

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
    collapse_content('#content-summary', 90);

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

    $('*[data-show-hover]').hover(function() {
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
                if (response.error_type == 'item-in-cart') alert('Sản phẩm đã có trong giỏ hàng!');
                else if (response.error_type == 'invalid-item-id') alert('ID sản phẩm không đúng!');
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