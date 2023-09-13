<?php
function ah_register_custom_post_types() {

    //Register Sponsors custom post type
    $labels = array(
        'name'               => _x( 'Sponsor', 'post type general name'  ),
        'singular_name'      => _x( 'Sponsor', 'post type singular name'  ),
        'menu_name'          => _x( 'Sponsors', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Sponsor', 'add new on admin bar' ),
        'add_new'            => _x( 'Add Sponsor', 'sponsor' ),
        'add_new_item'       => __( 'Add New Sponsor' ),
        'new_item'           => __( 'New Sponsor' ),
        'edit_item'          => __( 'Edit Sponsor' ),
        'view_item'          => __( 'View Sponsor'  ),
        'all_items'          => __( 'All Sponsors' ),
        'search_items'       => __( 'Search Sponsors' ),
        'parent_item_colon'  => __( 'Parent Sponsor:' ),
        'not_found'          => __( 'No sponsors found.' ),
        'not_found_in_trash' => __( 'No sponsors found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'sponsors' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-money-alt',
        'supports'           => array( 'title'),
        'template'           => array( array( 'core/title' ) ),
        'template_lock'      => 'all'
    );
  
    register_post_type( 'fvics-sponsor', $args );
   


//Register Event Gallery/recap custom post type
$labels = array(
    'name'               => _x( 'Gallery', 'post type general name'  ),
    'singular_name'      => _x( 'Gallery', 'post type singular name'  ),
    'menu_name'          => _x( 'Galleries', 'admin menu'  ),
    'name_admin_bar'     => _x( 'Gallery', 'add new on admin bar' ),
    'add_new'            => _x( 'Add Gallery', 'sponsor' ),
    'add_new_item'       => __( 'Add New Gallery' ),
    'new_item'           => __( 'New Gallery' ),
    'edit_item'          => __( 'Edit Gallery' ),
    'view_item'          => __( 'View Gallery'  ),
    'all_items'          => __( 'All Galleries' ),
    'search_items'       => __( 'Search Galleries' ),
    'parent_item_colon'  => __( 'Parent Gallery:' ),
    'not_found'          => __( 'No galleries found.' ),
    'not_found_in_trash' => __( 'No galleries found in Trash.' ),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'galleries' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 7,
    'menu_icon'          => 'dashicons-layout',
    'supports'           => array( 'title', 'editor', 'thumbnail' ),
    // 'template'           => array( array( 'core/title' ) ),
    // 'template_lock'      => 'all'
);

register_post_type( 'fvics-galleries', $args );

}

add_action( 'init', 'ah_register_custom_post_types' );

    //flushes permalinks when switching themes
    function ah_rewrite_flush() {
        ah_register_custom_post_types();
        flush_rewrite_rules();
    }
    add_action( 'after_switch_theme', 'ah_rewrite_flush' );