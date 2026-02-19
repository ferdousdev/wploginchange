/* Change WordPress Login Logo */
function fr_login_logo_change() {

    $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
    $logo_url = $logo ? $logo[0] : get_stylesheet_directory_uri() . '/images/login-logo.png';
    ?>

    <style type="text/css">
        #login h1 a {
            background-image: url('<?php echo esc_url( $logo_url ); ?>');
            background-size: contain;
            background-repeat: no-repeat;
            width: 300px;
            height: 100px;
        }
    </style>

    <?php
}
add_action( 'login_enqueue_scripts', 'fr_login_logo_change' );


/* Change Login Logo URL */
function fr_wp_admin_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'fr_wp_admin_login_logo_url' );


/* Change Login Logo Title */
function fr_wp_admin_login_logo_title() {
    return get_bloginfo( 'name' ) . ' : ' . get_bloginfo( 'description' );
}
add_filter( 'login_headertext', 'fr_wp_admin_login_logo_title' );
