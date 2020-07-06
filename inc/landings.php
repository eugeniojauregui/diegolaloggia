<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
* Creating a function to create our CPT
*/

function custom_post_type_landings() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Landing Pages', 'Post Type General Name', 'dll' ),
		'singular_name'       => _x( 'Landing', 'Post Type Singular Name', 'dll' ),
		'menu_name'           => __( 'Landings', 'dll' ),
		'parent_item_colon'   => __( 'Primary Landing', 'dll' ),
		'all_items'           => __( 'Todas las Landings', 'dll' ),
		'view_item'           => __( 'Ver Landing', 'dll' ),
		'add_new_item'        => __( 'Agregar nueva Landing', 'dll' ),
		'add_new'             => __( 'Agregar nueva', 'dll' ),
		'edit_item'           => __( 'Editar Landing', 'dll' ),
		'update_item'         => __( 'Actualizar Landing', 'dll' ),
		'search_items'        => __( 'Buscar Landing', 'dll' ),
		'not_found'           => __( 'Sin resultados', 'dll' ),
		'not_found_in_trash'  => __( 'Sin resultados en la papelera', 'dll' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'Landings', 'dll' ),
		'description'         => __( 'Landings - dll', 'dll' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'landings' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
        'menu_icon' => 'dashicons-admin-site',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest' => true,
	);
	
	// Registering your Custom Post Type
	register_post_type( 'Landings', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type_landings', 0 );
add_action('init', 'create_org_taxonomies_landings', 0);

// create two taxonomies, countrys and writers for the post type "org"
function create_org_taxonomies_landings() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Categorías', 'taxonomy general name', 'dll'),
        'singular_name' => _x('Categoría', 'taxonomy singular name', 'dll'),
        'search_items' => __('Buscar Categorías', 'dll'),
        'all_items' => __('Todas las Categorías', 'dll'),
        'parent_item' => __('Categoría superior', 'dll'),
        'parent_item_colon' => __('Categoría superior:', 'dll'),
        'edit_item' => __('Editar Categoría', 'dll'),
        'update_item' => __('Actualizar Categoría', 'dll'),
        'add_new_item' => __('Agregar nueva Categoría', 'dll'),
        'new_item_name' => __('Nombre de nueva Categoría', 'dll'),
        'menu_name' => __('Categorías Landings', 'dll'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'land'),
    );

    register_taxonomy('landings', array('Landings'), $args);
}