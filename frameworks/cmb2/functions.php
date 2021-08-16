<?php
if ( file_exists( plugin_dir_path( __FILE__ ) . 'init.php' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'init.php';
} elseif ( file_exists( plugin_dir_path( __FILE__ ) . 'init.php' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'init.php';
}

function deveridlink_options() {
    $prx = 'deveridlink_';
	$deveridlink_options = new_cmb2_box( array(
		'id'           => $prx . 'options',
		'title'        => __( 'Short link', 'deveridlink' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => $prx . 'options',
// 		'parent_slug'  => 'edit.php?post_type=deveridlink',
// 		 'icon_url'        => 'dashicons-chart-pie', // Menu icon. Only applicable if 'parent_slug' is left empty.
		 'icon_url'        => plugin_dir_url( dirname( __FILE__,2 ) ).'/images/link.svg', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'      => __( 'Options', 'deveridlink' ), // Falls back to 'title' (above).
		//'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
		// 'capability'      => 'manage_options', // Cap required to view options-page.
		'position'        => 21, // Menu position. Only applicable if 'parent_slug' is left empty.
		//'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		//'display_cb'      => true, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'     => __( 'Save Theme Options', 'deveridlink' ), // The text for the options-page save button. Defaults to 'Save'.
		// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
		// 'message_cb'      => $prx . 'options_page_message_callback',
	) );
	$deveridlink_options->add_field( array(
		'name'    => __( 'Link type', 'deveridlink' ),
		'id'      => $prx.'link_type',
		'type'    => 'radio_inline',
		'options'    => array(
		    'id'    => __('Id','deveridlink'),
		    'url'    => __('Url','deveridlink'),
		),
		'default' => 'id'
	) );
	
	$deveridlink_options->add_field( array(
		'name'    => __( 'Button position', 'deveridlink' ),
		'id'      => $prx.'btn_position',
		'type'    => 'radio_inline',
		'options'    => array(
		    'tr'    => __('Top right','deveridlink'),
		    'tl'    => __('Top left','deveridlink'),
		    'br'    => __('Bottom right','deveridlink'),
		    'bl'    => __('Bottom left','deveridlink'),
		),
		'default' => 'bl'
	) );
	
    $post_types = get_post_types( array( 'public' => true ), 'names' ); 
	$deveridlink_options->add_field( array(
		'name'    => __( 'Post type', 'deveridlink' ),
		'id'      => $prx.'post_type',
		'type'    => 'multicheck_inline',
		'options'    => $post_types,
		'default' => array('post','product')
	) );
	
	$deveridlink_options->add_field( array(
		'name'    => __( 'Margin', 'deveridlink' ),
		'id'      => $prx.'margin',
		'type'    => 'text',
		'default' => '30',
	    'attributes'  => array(
            'type' => 'number',
        ),

	) );
	
    //////////////////About////////////////////
	$about_options = new_cmb2_box( array(
		'id'           => $prx . 'about',
		'title'        => __( 'About', 'deveridlink' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => $prx . 'about',
		'parent_slug'  => $prx . 'options',
	) );
	$about_options->add_field( array(
	    'before_row' => '<div style="text-align: center;">',
	    'after_row' => '</div>',
	    'after_field' => '<p><b>'.__( 'This plugin helps you to add an icon to copy a short link in pages, articles, products, or anywhere you want.', 'deveridlink' ).'</p></b><a href="https://en.de-ver.com" target="_blank">By Dever</a><style>p.submit{display:none}</style>',
	'name' => __( 'About Dever short link', 'deveridlink' ),
	'type' => 'title',
	'id'   => $prx.'title'
    ) );

}
add_action( 'cmb2_admin_init', 'deveridlink_options' );