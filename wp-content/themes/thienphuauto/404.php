<?php 
    if(wp_is_mobile()){
        get_template_part('layout_mobile/404');
    }else{
        get_template_part('layout_desktop/404');
    }
?>