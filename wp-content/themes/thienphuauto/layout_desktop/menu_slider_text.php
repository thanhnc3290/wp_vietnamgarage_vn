<div class="header-bottom-right owl-carousel owl-theme owl-loaded owl-drag" id="js-art-header">
    <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-1293px, 0px, 0px); transition: all 2s ease 0s; width: 2910px;">
            <?php 
                //tag_id của chuyên mục bài viết
                $catalog_id = '28';
                $args = array(
                    'post_status' => 'publish', // Chỉ lấy những bài viết được publish
                    'post_type' => 'post', // Lấy những bài viết thuộc post, nếu lấy những bài trong 'trang' thì để là page
                    'showposts' => 10, // Số lượng bài viết
                    'cat' => $catalog_id, // lấy bài viết trong chuyên mục có id là 1
                );
                $getposts = new WP_query($args);
                global $wp_query; 
                $wp_query->in_the_loop = true;
            ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

            <div class="owl-item cloned" style="width: 313.333px; margin-right: 10px;">
                <a href="<?php the_permalink(); ?>"
                    class="item d-flex align-items">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_gift.png" style="width: 9%" alt="">
                    <div class="txt"><?php the_title(); ?></div>
                </a>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>


        </div>
    </div>
    <div class="owl-nav disabled">
        <button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
        <button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
    </div>
    <div class="owl-dots disabled"></div>
    <div class="owl-thumbs"></div>
</div>