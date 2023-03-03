<?php 
    if(wp_is_mobile()){
        get_template_part('layout_mobile/news/category');
    }else{
        get_template_part('layout_desktop/news/category');
    }
?>