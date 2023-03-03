<?php 
    if(wp_is_mobile()){
        get_template_part('layout_mobile/product/search');
    }else{
        get_template_part('layout_desktop/product/search');
    }
?>