<?php

namespace UNICOPLUGIN\Inc;


use UNICOPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpunico' ),
			'singular_name'     => _x( 'Project Category', 'wpunico' ),
			'search_items'      => __( 'Search Category', 'wpunico' ),
			'all_items'         => __( 'All Categories', 'wpunico' ),
			'parent_item'       => __( 'Parent Category', 'wpunico' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpunico' ),
			'edit_item'         => __( 'Edit Category', 'wpunico' ),
			'update_item'       => __( 'Update Category', 'wpunico' ),
			'add_new_item'      => __( 'Add New Category', 'wpunico' ),
			'new_item_name'     => __( 'New Category Name', 'wpunico' ),
			'menu_name'         => __( 'Project Category', 'wpunico' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'unico_project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpunico' ),
			'singular_name'     => _x( 'Service Category', 'wpunico' ),
			'search_items'      => __( 'Search Category', 'wpunico' ),
			'all_items'         => __( 'All Categories', 'wpunico' ),
			'parent_item'       => __( 'Parent Category', 'wpunico' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpunico' ),
			'edit_item'         => __( 'Edit Category', 'wpunico' ),
			'update_item'       => __( 'Update Category', 'wpunico' ),
			'add_new_item'      => __( 'Add New Category', 'wpunico' ),
			'new_item_name'     => __( 'New Category Name', 'wpunico' ),
			'menu_name'         => __( 'Service Category', 'wpunico' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'unico_service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpunico' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpunico' ),
			'search_items'      => __( 'Search Category', 'wpunico' ),
			'all_items'         => __( 'All Categories', 'wpunico' ),
			'parent_item'       => __( 'Parent Category', 'wpunico' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpunico' ),
			'edit_item'         => __( 'Edit Category', 'wpunico' ),
			'update_item'       => __( 'Update Category', 'wpunico' ),
			'add_new_item'      => __( 'Add New Category', 'wpunico' ),
			'new_item_name'     => __( 'New Category Name', 'wpunico' ),
			'menu_name'         => __( 'Testimonials Category', 'wpunico' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'unico_testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpunico' ),
			'singular_name'     => _x( 'Team Category', 'wpunico' ),
			'search_items'      => __( 'Search Category', 'wpunico' ),
			'all_items'         => __( 'All Categories', 'wpunico' ),
			'parent_item'       => __( 'Parent Category', 'wpunico' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpunico' ),
			'edit_item'         => __( 'Edit Category', 'wpunico' ),
			'update_item'       => __( 'Update Category', 'wpunico' ),
			'add_new_item'      => __( 'Add New Category', 'wpunico' ),
			'new_item_name'     => __( 'New Category Name', 'wpunico' ),
			'menu_name'         => __( 'Team Category', 'wpunico' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'unico_team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpunico' ),
			'singular_name'     => _x( 'Faq Category', 'wpunico' ),
			'search_items'      => __( 'Search Category', 'wpunico' ),
			'all_items'         => __( 'All Categories', 'wpunico' ),
			'parent_item'       => __( 'Parent Category', 'wpunico' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpunico' ),
			'edit_item'         => __( 'Edit Category', 'wpunico' ),
			'update_item'       => __( 'Update Category', 'wpunico' ),
			'add_new_item'      => __( 'Add New Category', 'wpunico' ),
			'new_item_name'     => __( 'New Category Name', 'wpunico' ),
			'menu_name'         => __( 'Faq Category', 'wpunico' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'unico_faqs', $args );
	}
	
}
