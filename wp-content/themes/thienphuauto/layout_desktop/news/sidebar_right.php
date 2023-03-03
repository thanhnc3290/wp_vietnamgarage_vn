<?php 
    //lấy danh sách bài viết xem nhiều
    $input_most_view_list = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'posts_per_page'        => '7',
        'meta_key'              => 'post_views_count',
        'orderby'               => 'meta_value_num',
        'order'                 => 'desc',
    );
    $most_view_list               =   new WP_Query($input_most_view_list);
    
    //lấy danh sách bài viết khuyến mãi
    $input_khuyen_mai_list = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'ignore_sticky_posts'   => '1',
        'posts_per_page'        => '10',
        'tax_query'             => array(
            array(
                'taxonomy'      => 'category',
                'field'         => 'term_id', //This is optional, as it defaults to 'term_id'
                'terms'         => '28',
                'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
            ),
        ),
    );
    $khuyen_mai_list = new WP_query($input_khuyen_mai_list);
?>

<div class="col-md-4 blog-right">
    <div class="blog-top-right">
        <h3 class="title">Xem nhiều</h3>
        <ul class="list-top">
            <?php if($most_view_list->have_posts()): ?>
                <?php $count_most_view_list = '0'; ?>
                <?php while ($most_view_list->have_posts() ) : $most_view_list->the_post(); ?>
                <?php $count_most_view_list++; ?>
            <li>
                <span class="number"><?php echo $count_most_view_list; ?></span>
                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            </li>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div>
    <div class="blog-cat">
        <h3 class="title">Khuyến mại</h3>
        <ul id="list-blog-sale">
            <?php if($khuyen_mai_list->have_posts()): ?>
                <?php while ($khuyen_mai_list->have_posts() ) : $khuyen_mai_list->the_post(); ?>
                <?php 
                    $post_id            = get_the_id();
                ?>
            <div class="item" style="padding-bottom: 20px;">
                <a href="<?php the_permalink(); ?>" class="b-img">
                    <?php echo get_the_post_thumbnail($post_id, array('600','600'));   //gọi theo kiểu kích thước ?>
                </a>
                <a href="<?php the_permalink(); ?>" style="display: block;margin: 10px 0;" class="b-name">
                    <b><?php the_title() ?></b>
                </a>
            </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div>
</div>