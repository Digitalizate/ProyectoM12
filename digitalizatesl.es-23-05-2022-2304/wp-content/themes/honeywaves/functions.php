<?php
// Global variables define
define('HONEYWAVES_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('HONEYWAVES_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('HONEYWAVES_CHILD_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }

}
add_action('after_setup_theme', 'honeywaves_setup');

function honeywaves_sanitize_checkbox($checked) {
    // Boolean check.
    return ( ( isset($checked) && true == $checked ) ? true : false );
}

function honeywaves_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}

function honeywaves_setup() {
    load_theme_textdomain('honeywaves', HONEYWAVES_CHILD_TEMPLATE_DIR . '/languages');
    require( HONEYWAVES_CHILD_TEMPLATE_DIR . '/inc/customizer/customizer_theme_style.php');
    require( HONEYWAVES_CHILD_TEMPLATE_DIR . '/functions/widgets/sidebars.php');
    require( HONEYWAVES_CHILD_TEMPLATE_DIR . '/functions/widgets/wdl_social_icon.php');
    require( HONEYWAVES_CHILD_TEMPLATE_DIR . '/functions/widgets/wdl_topbar_info.php');
}

add_action('wp_enqueue_scripts', 'honeywaves_enqueue_styles');

function honeywaves_enqueue_styles() {
    if (get_theme_mod('custom_color_enable') == true) {
        honeywaves_custom_light();
    }
    wp_enqueue_style('honeywaves-parent-style', HONEYWAVES_PARENT_TEMPLATE_DIR_URI . '/style.css', array('bootstrap'));
    wp_enqueue_style('honeywaves-default-style', HONEYWAVES_TEMPLATE_DIR_URI . '/assets/css/default.css');
}

if (is_admin()) {
    require get_stylesheet_directory() . '/admin/admin-init.php';
}

function honeywaves_custom_light() {
    $honeywaves_link_color = get_theme_mod('link_color');
    list($r, $g, $b) = sscanf($honeywaves_link_color, "#%02x%02x%02x");
    $r = $r - 50;
    $g = $g - 25;
    $b = $b - 40;

    if ($honeywaves_link_color != '#ff0000') :
        ?>
        <style type="text/css">
            .header-sidebar {
                background: <?php echo esc_attr($honeywaves_link_color); ?> !important;
            }
            body a.nav-link.search-icon.bg-light:hover{background-color: <?php echo esc_attr($honeywaves_link_color); ?> !important;}
            body a.nav-link.search-icon.bg-light {background-color: transparent !important;}
            .navbar5.navbar .nav .nav-item:hover .nav-link, .navbar5.navbar .nav .nav-item.active .nav-link, .navbar5.navbar .nav .nav-item.menu-html.honeywaves:hover a, .navbar5.navbar .nav .nav-item.menu-html.honeywaves.active a {
                background: <?php echo esc_attr($honeywaves_link_color); ?> !important;
                color:#fff!important;
            }
            .services4 .post {
                background:  <?php echo esc_attr($honeywaves_link_color); ?> !important;
            }
            .services4 .entry-header .entry-title a:hover{
                color:#061018!important;
            }
            #testimonial-carousel2 .testmonial-block:before {
                border-top: 25px solid <?php echo esc_attr($honeywaves_link_color); ?> !important;
            }
            #testimonial-carousel2 .testmonial-block {
                border-left: 4px solid <?php echo esc_attr($honeywaves_link_color); ?> !important;
            }
            @media (min-width: 992px){
                body .navbar .nav .dropdown-menu {
                    border-bottom: 3px solid <?php echo esc_attr($honeywaves_link_color); ?>;}
            }

            .nav .dropdown-item:focus, .nav .dropdown-item:hover {
                color: <?php echo esc_attr($honeywaves_link_color); ?>;
            }
            .site-title a:hover {
                color: <?php echo esc_attr($honeywaves_link_color); ?> !important;
            }
            body .widget .tag-cloud-link:hover, body .widget .tag-cloud-link:focus, body .site-footer .widget .tag-cloud-link:hover, body .site-footer .widget .tag-cloud-link:focus {
                background-color: <?php echo esc_attr($honeywaves_link_color);?> ;
                border: 1px solid <?php echo esc_attr($honeywaves_link_color);?> ;
            }
            body .site-footer .widget .tag-cloud-link:hover { color: #ffffff !important; }
        </style>
        <?php
    endif;
}

//Set for old user before 1.3.8
if (!get_option('honeypress_user_before_1_3_8', false)) {
    //detect old user and set value
    $honeywaves_service_title=get_theme_mod('home_service_section_title');
    $honeywaves_service_discription=get_theme_mod('home_service_section_discription');
    $honeywaves_blog_title=get_theme_mod('home_news_section_title');
    $honeywaves_blog_discription=get_theme_mod('home_news_section_discription');
    $honeywaves_slider_title=get_theme_mod('home_slider_title');
    $honeywaves_slider_discription=get_theme_mod('home_slider_discription');
    $honeywaves_testimonial_title=get_theme_mod('home_testimonial_section_title');
    $honeywaves_testimonial__discription=get_theme_mod('home_testimonial_section_discription');
    $honeywaves_footer_credit=get_theme_mod('footer_copyright');

    if ($honeywaves_service_title !=null || $honeywaves_service_discription !=null || $honeywaves_blog_title !=null || $honeywaves_blog_discription !=null || $honeywaves_slider_title !=null || $honeywaves_slider_discription !=null || $honeywaves_testimonial_title !=null || $honeywaves_testimonial__discription !=null || $honeywaves_footer_credit !=null )  {
        add_option('honeypress_user_before_1_3_8', 'old');

    } else {
        add_option('honeypress_user_before_1_3_8', 'new');
    }
}

function honeywaves_footer_section_hook() {
    ?>
    <footer class="site-footer">
        <div class="container">
            <?php if (is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3')): ?>
                <div class="seprator-line"></div>
                <?php
                get_template_part('sidebar', 'footer');
            endif;
            ?>
        </div>
        <?php
        $honeywaves_user=get_option('honeypress_user_before_1_3_8');
        if($honeywaves_user=='old'){?>
                <div class="site-info text-center">
                <?php $honeywaves_footer_copyright = get_theme_mod('footer_copyright', '<p>' . __('Proudly powered by <a href="https://wordpress.org"> WordPress</a> | Theme: <a href="https://spicethemes.com" rel="nofollow">HoneyWaves</a> by SpiceThemes', 'honeywaves') . '</p>'); ?>
                    <?php echo wp_kses_post($honeywaves_footer_copyright); ?>
                </div>
        <?php } else{?>
                <div class="site-info text-center">
                     <p><?php esc_html_e( 'Proudly powered by', 'honeywaves' ); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org', 'honeywaves' ) ); ?>"><?php esc_html_e( 'WordPress', 'honeywaves' ); ?> </a> <?php esc_html_e( '| Theme:', 'honeywaves' ); ?> <a href="<?php echo esc_url( __( 'https://spicethemes.com', 'honeywaves' ) ); ?>" rel="nofollow"> <?php esc_html_e( 'HoneyWaves', 'honeywaves' ); ?></a> <?php esc_html_e( 'by SpiceThemes', 'honeywaves' );?></p>
                </div>
            <?php } ?>
    </footer>
    <?php
}

add_action('honeywaves_footer_section_hook', 'honeywaves_footer_section_hook');

function honeywaves_custom_logo_setup() {
 $defaults = array(
		   	'height'      => 100,
		   	'width'       => 400,
		   	'flex-height' => true,
            'flex-width'  => true,
		   	'header-text' => array( 'site-title', 'site-description' ),
			);
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'honeywaves_custom_logo_setup' ,11);

//Remove Footer section
function honeywaves_remove_customize_register( $wp_customize ) {

   $wp_customize->remove_section( 'footer_section');

}
add_action( 'customize_register', 'honeywaves_remove_customize_register',11);

//Remove parent topbar header widgets
function honeywaves_remove_widget() {
    unregister_widget('honeypress_social_icon_widget');
    unregister_widget('honeypress_header_topbar_info_widget');
}
add_action( 'widgets_init', 'honeywaves_remove_widget', 11 );
