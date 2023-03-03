<?php 
    if(wp_is_mobile()){
        get_template_part('layout_mobile/index');
    }else{
        get_template_part('layout_desktop/index');
    }
?>