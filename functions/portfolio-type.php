<?php

/**
 * This file contains the code for generating the portfolio custom type and his taxonomy.
 * 
 * register_post_type : http://codex.wordpress.org/Function_Reference/register_post_type
 * register_taxonomy : http://codex.wordpress.org/Function_Reference/register_taxonomy
 * 
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */


function portfolio_type_init() {
  $labels = array(
    'name' => 'Portfolio',
    'singular_name' => 'Portfolio',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Project',
    'edit_item' => 'Edit Project',
    'new_item' => 'New Project',
    'all_items' => 'All Project',
    'view_item' => 'View Project',
    'search_items' => 'Search Project',
    'not_found' =>  'No Project found',
    'not_found_in_trash' => 'No Projects found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Portfolio'
  );

  register_post_type( 'portfolio', array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    '_builtin' => false, 
    'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false,'pages' => false ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
  ));
  
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'                => _x( 'Sections', 'taxonomy general name' ),
    'singular_name'       => _x( 'Section', 'taxonomy singular name' ),
    'search_items'        => __( 'Search Sections' ),
    'all_items'           => __( 'All Sections' ),
    'parent_item'         => __( 'Parent Section' ),
    'parent_item_colon'   => __( 'Parent Section:' ),
    'edit_item'           => __( 'Edit Section' ), 
    'update_item'         => __( 'Update Section' ),
    'add_new_item'        => __( 'Add New Section' ),
    'new_item_name'       => __( 'New Genre Section' ),
    'menu_name'           => __( 'Section' )
  ); 	

  register_taxonomy( 'section', array( 'portfolio' ), array(
    'hierarchical'        => true,
    'labels'              => $labels,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'section' )
  ));
}
add_action( 'init', 'portfolio_type_init' );