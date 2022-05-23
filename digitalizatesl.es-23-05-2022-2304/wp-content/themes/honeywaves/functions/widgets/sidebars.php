<?php	
add_action( 'widgets_init', 'honeywaves_widgets_init');
function honeywaves_widgets_init() {
	
   
	// Header Social Icon Sidebar
	register_sidebar( array(
		'name' => esc_html__( 'Top header sidebar left area', 'honeywaves' ),
		'id' => 'home-header-sidebar_left',
		'description' => esc_html__('Social media menu lateral area', 'honeywaves' ),
		'before_widget' => '<aside id="%1$s" class="right-widgets %2$s">',
		'after_widget' => '</aside>',
	));
	
	// Subscribe Sidebar
	register_sidebar( array(
		'name' => esc_html__( 'Top header sidebar right area', 'honeywaves' ),
		'id' => 'home-header-sidebar_right',
		'description' => esc_html__('Subscriber section widget area', 'honeywaves' ),
		'before_widget' => '<aside id="%1$s" class="left-widgets %2$s">',
		'after_widget' => '</aside>',
	));
}