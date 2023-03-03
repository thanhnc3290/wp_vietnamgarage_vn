<?php
function vietnam_garage_vn_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'vietnam_garage_vn_logo' ); // Thêm cài đặt cho trình tải lên logo
    // Thêm kiểm soát cho trình tải lên logo (trình tải lên thực tế)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'vietnam_garage_vn_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'vietnam_garage_vn_logo' ),
        'section'  => 'title_tagline',
        'settings' => 'vietnam_garage_vn_logo',
    ) ) );
}
add_action( 'customize_register', 'vietnam_garage_vn_customize_register' );

?>