<head>
    <meta charset="utf-8">
    <meta content="document" name="resource-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
      $category_id    = get_queried_object_id();
      $category_info  = get_term( $category_id );
      $category_name  = $category_info->name;
    ?>
    <title><?php echo $category_name ?> - <?php echo get_bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
    <!--//Css files here-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style_2022.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/libbrary.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/mycss_desktop.css??v=<?php echo time(); ?>" type="text/css"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/desktop/category-news.css" type="text/css">
</head>