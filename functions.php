<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

/* Paid Membership Pro Invite only */
global $pmproio_invite_required_levels;
$pmproio_invite_required_levels = array(2);

global $pmproio_invite_given_levels;
$pmproio_invite_given_levels = array(2);

define('PMPROIO_CODES',1);


function image_map_scripts() {
	if ( is_page(1831) ):
    wp_enqueue_script( 'image-map-js', get_stylesheet_directory_uri() . '/js/imagemapster.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'image-map-stick', get_stylesheet_directory_uri() . '/js/jquery.stickem.min.js');
      endif;

}
add_action( 'wp_enqueue_scripts', 'image_map_scripts' );

function jquery_noConflictFR() {
    wp_add_inline_script( 'jquery-core', '$ = jQuery;' );
}
add_action( 'wp_enqueue_scripts', 'jquery_noConflictFR' );

/*@ Change WordPress Admin Login Logo   */
function fr_login_logo_change() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('/wp-content/uploads/2023/08/AIT-logo-TM.png');
            height:100px;
            width:300px;
            background-size: 300px 100px;
            background-repeat: no-repeat;
            padding-bottom: 10px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'fr_login_logo_change' );

/*@ Change WordPress Admin Login Logo Link URL  */
if ( !function_exists('fr_wp_admin_login_logo_url') ) :

    function fr_wp_admin_login_logo_url() {
        return home_url();
    }
    add_filter( 'login_headerurl', 'fr_wp_admin_login_logo_url' );

endif;

/*@ Change WordPress Admin Login Logo's Title & Tagline */
if ( !function_exists('fr_wp_admin_login_logo_title') ) :

    function fr_wp_admin_login_logo_title( $headertext ) {
        $headertext = esc_html__( get_bloginfo('name') . ' : '. get_bloginfo( 'description' ) );
        return $headertext;
    }
    add_filter( 'login_headertext', 'fr_wp_admin_login_logo_title' );

endif;
