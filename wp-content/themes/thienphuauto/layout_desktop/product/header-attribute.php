<head>
    <meta charset="utf-8">
    <meta content="document" name="resource-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        $attribute_id = get_queried_object_id();
        $attribute_info = get_attribute_info($attribute_id);
        $product_catalog_list_lv_2 = array();
        $attribute_name_to_get          = $attribute_info->taxonomy; // slug của thuộc tính sản phẩm cần lấy giá trị
        
        //lấy tên của taxonomy của thuộc tính - ví dụ: bảo hành / nhãn hàng
        $taxonomy_info =    get_taxonomy($attribute_name_to_get); 
        $taxonomy_name =    $taxonomy_info->label;
        if(strlen($taxonomy_name) > '1'){
        $h1_title = $taxonomy_name.' '.$attribute_info->name;
        }else{
            $h1_title = $attribute_info->name;
        }
    ?>
    <title><?php echo $h1_title; ?> - <?php echo get_bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
    <!--//Css files here-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style_2022.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/libbrary.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/mycss_desktop.css??v=<?php echo time(); ?>" type="text/css"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/desktop/page-attribute.css" type="text/css">
</head>