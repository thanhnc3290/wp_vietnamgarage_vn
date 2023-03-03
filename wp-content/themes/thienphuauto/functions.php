<?php 
    
    //Lấy Logo site 
    require_once get_template_directory() . '/inc/customizer.php';
    function get_custom_logo_image_link()
    {
        //lấy modify tạo ở ./inc/customizer.php
        get_theme_mod( 'vietnam_garage_vn_logo' );
        if(strlen(get_theme_mod( 'vietnam_garage_vn_logo' )) > '0'){
            $logo_image_link = get_theme_mod( 'vietnam_garage_vn_logo' );
            return $logo_image_link;
        }else{
            $defaul_thumbnail = get_template_directory_uri().'/assets/images/no-image.png';
            return $defaul_thumbnail;
        }
    }

    //nhập thông tin đặt hàng vào driver
    function submit_order_to_google_driver($name, $phone, $email, $address, $note, $total_order){
        $form_google_driver_url = 'https://docs.google.com/forms/d/e/1FAIpQLSevKKrMqeqhqes0j4OajZS3hm3Ty16ddRA4yZBJBxGkbgBpmw/formResponse';
    
        //tạo query để post vào driver -- mấy cái entry.{number} là name của input trong form
        $query_post_google_driver   = '';
        $query_post_google_driver  .= 'entry.10009404='.$name;
        $query_post_google_driver  .= '&entry.592377722='.$phone;
        $query_post_google_driver  .= '&entry.582163649='.$email;
        $query_post_google_driver  .= '&entry.1560448065='.$address;
        $query_post_google_driver  .= '&entry.764703234='.$note;
        $query_post_google_driver  .= '&entry.168170377='.$total_order;
        
        $url_to_send_request    = $form_google_driver_url.'?'.$query_post_google_driver;
        if(file_get_contents($url_to_send_request)){
            return 'OK';
        }else{
            return 'FALSE';
        }
        
    }

    //kiểm tra xem là đang request tới trang danh mục sản phẩm hay là trang thuộc tính sản phẩm
    function check_attribute_term_id($id){
        $check  = 'product';
        if($id > '0'){
            $attribute_term_id = $id;
            $terms = get_terms();
            $attribute_term_id_array = array();
            foreach($terms as $row){
                //gộp các term có chứa 'pa_' trong taxonomy để tạo mảng array, sau đó check id
                if(strpos($row->taxonomy,'pa_') !== false){ 
                    $attribute_term_id_array[] = $row->term_id;
                }
            }
            if (in_array($id, $attribute_term_id_array) !==false){
                $check = 'attribute';
            }
        }
        return $check;
    }

    //lấy thông tin của attribute sản phẩm bằng term_id
    function get_attribute_info($id){
        $info_array = array();
        if($id > '0'){
            $attribute_term_id = $id;
            $terms = get_terms();
            $attribute_term_id_array = array();
            foreach($terms as $row){
                if($row->term_id == $id){
                    $info_array = $row;
                }
            }
        }
        return $info_array;
    }


    // phần này tương tự với routers
    //điều hướng view riêng cho trang sản phẩm / bài viết
    function my_single_templates($single_template) {
        global $post;
        if($post->post_type == 'product'){
            //điều hướng template trang single dựa vào post_type
            if(wp_is_mobile()){
                //điều hướng template trên thiết bị di dộng
                $single_template = dirname( __FILE__ ) . '/layout_mobile/product/single.php';
            }else{
                ////điều hướng template trên desktop
                $single_template = dirname( __FILE__ ) . '/layout_desktop/product/single.php';
            }

            //$single_template = dirname( __FILE__ ) . '/single-product.php';
            
        }else{
            // trả về template của folder news
            if(wp_is_mobile()){
                //điều hướng template trên thiết bị di dộng
                $single_template = dirname( __FILE__ ) . '/layout_mobile/news/single.php';
            }else{
                ////điều hướng template trên desktop
                $single_template = dirname( __FILE__ ) . '/layout_desktop/news/single.php';
            }
        }
        // Copy the above for your other categories
        return $single_template;
    }
    add_filter( "single_template", "my_single_templates" );

    //điều hướng page
    function my_page_templates($page_template) {
        global $post;
        if($post->ID == '0'){
            //điều hướng template page sản phẩm ---- Nghĩa là các page product / danh mục product thì có $post->ID = '0', còn các page có chứa nội dung thì $post->id > '0'
            if(wp_is_mobile()){
                $catalog_id         = get_queried_object_id();
                $check_template     = check_attribute_term_id($catalog_id);
                //điều hướng trang thuộc tính hoặc danh mục sản phẩm
                if($check_template == 'product'){
                    $page_template = dirname( __FILE__ ) . '/layout_mobile/product/page.php';
                }else{
                    $page_template = dirname( __FILE__ ) . '/layout_mobile/product/attribute.php';
                }
            }else{
                $catalog_id         = get_queried_object_id();
                $check_template     = check_attribute_term_id($catalog_id);
                //điều hướng trang thuộc tính hoặc danh mục sản phẩm
                if($check_template == 'product'){
                    $page_template = dirname( __FILE__ ) . '/layout_desktop/product/page.php';
                }else{
                    $page_template = dirname( __FILE__ ) . '/layout_desktop/product/attribute.php';
                }
            }
        }else{
            if($post->post_name == 'gio-hang'){
                //điều hướng template page chứa nội dung giỏ hàng
                if(wp_is_mobile()){
                    $page_template = dirname( __FILE__ ) . '/layout_mobile/product/cart.php';
                }else{
                    $page_template = dirname( __FILE__ ) . '/layout_desktop/product/cart.php';
                }
            }else{
                // trả về template của folder news
                if(wp_is_mobile()){
                    $page_template = dirname( __FILE__ ) . '/layout_mobile/news/page.php';
                }else{
                    $page_template = dirname( __FILE__ ) . '/layout_desktop/news/page.php';
                }
            }
        }

        //điều hướng trang thanh toán -- xử lý php
        if($post->ID == '8'){ // lấy id page thanh toán theo từng bộ cài wp
            $page_template = dirname( __FILE__ ) . '/thanh-toan.php';
        }
        
        return $page_template;
    }
    add_filter( "page_template", "my_page_templates" );
    // end - phần này tương tự với routers
    
    //lấy danh sách danh mục sản phẩm theo woocommerce dựa vào parent của danh mục đó
        function vietnam_garage_vn_get_product_catalog_list($id){
            $parent_id = '0';
            if($id){$parent_id = $id;}
            $args = array( 
                'hide_empty' => 0,
                'taxonomy' => 'product_cat',
                'orderby' => 'id',
                // là danh mục con của
                'parent' => $parent_id
            ); 
            $product_catalog_list = get_categories( $args ); 
            return $product_catalog_list;
        }
    //lấy danh sách category tin tức dựa vào parent của category đó
        function vietnam_garage_vn_get_news_catalog_list($id){
            $parent_id = '0';
            if($id){$parent_id = $id;}
            $args = array( 
                'hide_empty' => 0,
                'taxonomy' => 'category',
                'orderby' => 'id',
                // là danh mục con của
                'parent' => $parent_id
            ); 
            $news_catalog_list = get_categories( $args ); 
            return $news_catalog_list;
        }

    //lấy ảnh thumbnail của danh mục sản phẩm theo woocommerce dựa vào term_id của danh mục đó
        function vietnam_garage_vn_get_product_catalog_thumbnail_url($id){
            if(isset($id)){
                $thumbnail_id = get_woocommerce_term_meta($id, 'thumbnail_id', true );
                $catalog_image = wp_get_attachment_url( $thumbnail_id );
                if(strlen($catalog_image) > '0'){
                    return $catalog_image;
                }else{
                    $defaul_thumbnail = get_template_directory_uri().'/assets/images/no-image.png';
                    return $defaul_thumbnail;
                }
            }else{
                $defaul_thumbnail = get_template_directory_uri().'/assets/images/no-image.png';
                return $defaul_thumbnail;
            }
        }

    //lay thumbnail san pham dua theo id san pham cu the
    
    function vietnam_garage_vn_get_product_thumbnail($id){
        $defaul_thumbnail = get_template_directory_uri().'/assets/images/no-image.png';
        if(strlen($id) > '0'){
            $product_image_link = wp_get_attachment_url( get_post_thumbnail_id($id), 'thumbnail' );   
            if(strlen($product_image_link) > '0'){
                return $product_image_link;
            }else{
                return $defaul_thumbnail;
            }
        }else{
            return $defaul_thumbnail;
        }
    }

    function vietnam_garage_vn_get_product_category_thumbnail($catalog_id){
        $defaul_thumbnail = get_template_directory_uri().'/assets/images/no-image.png';
        if(strlen($catalog_id) > '0'){
            $thumbnail_id       = get_woocommerce_term_meta( $catalog_id, 'thumbnail_id', true );
            $catalog_image_url  = wp_get_attachment_url( $thumbnail_id );
            if(strlen($catalog_image_url) > '0'){
                return $catalog_image_url;
            }else{
                return $defaul_thumbnail;
            }
        }else{
            return $defaul_thumbnail;
        }
    }
    
    function vietnam_garage_vn_get_image_url($id){
        
        $defaul_thumbnail = get_template_directory_uri().'/assets/images/no-image.png';
        $image_id = '';
        if($id > '0'){
            $image_id   = $id;
            $image_url  = wp_get_attachment_url($image_id,'medium');
            if(strlen($image_url) > '0'){
                return $image_url;
            }else{
                return $defaul_thumbnail;
            }
        }else{
            return $defaul_thumbnail;
        }
    }

    function vietnam_garage_vn_get_image_url_thumbnail($id){
        $defaul_thumbnail = get_template_directory_uri().'/assets/images/no-image.png';
        $image_id = '';
        if($id > '0'){
            $image_id   = $id;
            $image_url  = wp_get_attachment_url($image_id,'thumbnail');
            if(strlen($image_url) > '0'){
                return $image_url;
            }else{
                return $defaul_thumbnail;
            }
        }else{
            return $defaul_thumbnail;
        }
    }



    //lấy giá tiền sản phẩm
    function format_price($input){
        if(strlen($input) < '1'){
            return 'Liên Hệ';
        }else{
            $format         = number_format($input);
            $output_price   = str_replace(',','.',$format).' đ';
            return $output_price;
        }
    }
    //Khôgn có giá tiền
    function no_price(){
        return 'Liên Hệ';
    }
    //tạo short_desc
    function short_desc($number,$input){
       return mb_strimwidth($input,'0',$number,'...');
    }
    //lấy % giảm giá
    function get_sale_percent($regular_price,$sale_price){
        if($regular_price > '0'){
            //làm tròn số %
            $percent = round(($regular_price - $sale_price) / $regular_price * 100);
            return '-'.$percent.'%';
        }else{
            return '';
        }
    }

    //lấy ảnh đại diện thumb từ id của post / product

    function get_thumb_image_link_from_post_id($id){
        $defaul_thumbnail = get_template_directory_uri().'/assets/images/no-image.png';
        if(strlen($id) > '0'){
            $product_image_link = wp_get_attachment_thumb_url( get_post_thumbnail_id($id));   
            if(strlen($product_image_link) > '0'){
                return $product_image_link;
            }else{
                return $defaul_thumbnail;
            }
        }else{
            return $defaul_thumbnail;
        }
    }


    //Lấy các thông tin liên hệ chung của website
    function get_theme_hotline_from_function(){
        //phần này là return thẻ <a> kèm sđt
        $hotline = '0974 168 155';
        return '<b><a href="tel:'.$hotline.'" >'.$hotline.'</a></b>';
    }

    function get_theme_hotline_number(){
        $hotline = '0974 168 155';
        return $hotline;
    }

    function get_theme_phone_from_function(){
        //phần này là return thẻ <a> kèm sđt
        $phone_number = '0974 168 155';
        return '<b><a href="tel:'.$phone_number.'" >'.$phone_number.'</a></b>';
    }

    function get_theme_email_from_function(){
        //phần này là return thẻ <a> kèm email
        $email = 'toanauto.vn@gmail.com';
        return '<b><a href="mailto:'.$email.'" >'.$email.'</a></b>';
    }

    function get_theme_address_from_function(){
        $address = 'Hà Nội: Số 9 Đường Lê Quang Đạo, Phường Phú Đô, Quận Nam Từ Liêm, TP. Hà Nội.';
        return $address;
    }

    function get_theme_google_map_from_function(){
        $google_map_url = 'https://www.google.com/maps/place/Bacnam.net/@21.0113903,105.77155,19.75z/data=!4m5!3m4!1s0x0:0x206bde0ffe5e2ae0!8m2!3d21.0115453!4d105.7712495?shorturl=1';
        return $google_map_url;
    }
    function get_theme_google_map_embed_from_function(){
        $google_map_url = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5246760419163!2d105.7710487!3d21.011682399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345310c0d1cf27%3A0xee38f83464bdb050!2sBacnam.vn!5e0!3m2!1sen!2s!4v1677219769953!5m2!1sen!2s';
        return $google_map_url;
    }

    function get_theme_fanpage_from_function(){
        $fanpage = '';
        return $fanpage;
    }

    function get_theme_youtube_from_function(){
        $youtube = '';
        return $youtube;
    }

    function get_theme_google_plus_from_function(){
        $google_plus = '';
        return $google_plus;
    }

    function get_theme_messenger_from_function(){
        $mesenger_link = '';
        return $mesenger_link;
    }

    function get_theme_zalo_from_function(){
        $zalo_link = '';
        return $zalo_link;
    }

    //cái này dể detect thiết bị
    function eg_define_custom_user_agent( $args ) {
        $versions           = ActionScheduler_Versions::instance();
        $args['user-agent'] = 'Action Scheduler/' . $versions->latest_version();
    
        return $args;
    }
    add_filter( 'as_async_request_queue_runner_post_args', 'eg_define_custom_user_agent', 10, 1 );

    //cái này để đếm view
    function set_post_view($postID) {
        $countKey = 'post_views_count';
        $count = get_post_meta($postID, $countKey, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $countKey);
            add_post_meta($postID, $countKey, '1');
        }else{
            $count++;
            update_post_meta($postID, $countKey, $count);
        }
    }

    //tạo table of content trong bài viết
    function get_table_of_content(){
        $content = get_the_content();
        preg_match_all('/<(h\d*) (id="(.*?)")>((.*?))</',$content,$matches);
        //preg_match_all('/<(h\d*)>((.*?))</',$content,$matches);
        $levels = $matches[1];
        $anchors = $matches[3];
        $headings = $matches[4];
        if ( $headings ) {
            echo '<div class="title"></div>';
            function collate_row($depth, $anchor, $heading) {
                $level = substr($depth, 1);
                return ["<a href='#{$anchor}' class='{$depth} toc-link'>{$heading}</a>",$level];
            }
                                  
            $collated = array_map('collate_row', $levels, $anchors, $headings );
            $previous_level = 2;
            echo '<ol class="toc-list">';
            foreach ($collated as $row) {
                $current_level = $row[1];
                if (  $current_level === $previous_level ) {
                    echo '<li>' . $row[0];
                } else if (  $current_level < $previous_level ) {
                    echo str_repeat('</ol>', $previous_level - $current_level) . '<li>'. $row[0];
                } else {
                    echo '<ol><li>' . $row[0];
                }
                $previous_level = $row[1];
            }
            //close off the list
            echo str_repeat('</ol>', $previous_level) . '</li></ol>';
        }
    }

?>