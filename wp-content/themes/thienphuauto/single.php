<?php 
    if(wp_is_mobile()){
        get_template_part('layout_mobile/product/single');
        //echo 'mobile single';
    }else{
        get_template_part('layout_desktop/product/single');
        //echo 'pc single';
    }
?>