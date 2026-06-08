<?php
/**
 * The Template for initializing plugin with action, filter hook.
 *
 * @version     1.0
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (! class_exists('Class_WP_API')) {

    class Class_WP_Post_Type
    {
        // Construct
        public function __construct()
        {
            add_action('init', array($this,'create_post_type'));
        }

        function create_post_type()
        {
            //Testimonial
            register_post_type(
                'testimonials',
                array(
                    'labels' => array(
                        'name' => __('Testimonials'),
                        'singular_name' => __('Testimonials')
                    ),
                    'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                    'public' => true,
                    'has_archive' => true,
                    'rewrite' => array('slug' => 'testimonials'),
                    'show_in_rest' => true,
                )
            );

            //Case Study
            register_post_type(
                'casestudy',
                array(
                    'labels' => array(
                        'name' => __('Case Study'),
                        'singular_name' => __('Case Study')
                    ),
                    'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                    'public' => true,
                    'has_archive' => true,
                    'rewrite' => array('slug' => 'casestudy'),
                    'show_in_rest' => true,
                )
            );

            //Careers
            register_post_type(
                'careers',
                array(
                    'labels' => array(
                        'name' => __('Careers'),
                        'singular_name' => __('Career')
                    ),
                    'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                    'public' => true,
                    'has_archive' => false,
                    'rewrite' => array('slug' => 'careers'),
                    'show_in_rest' => true,
                )
            );

            //Our Work
            /*register_post_type( 'portfolio',
                array(
                    'labels' => array(
                        'name' => __( 'Portfolio' ),
                        'singular_name' => __( 'Portfolio' )
                    ),
                    'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                    'public' => true,
                    'has_archive' => true,
                    'rewrite' => array('slug' => 'portfolio'),
                    'show_in_rest' => true,
                    'taxonomies' => array( 'portfolio_cat', 'portfolio_tag'),
                )
            );

            register_taxonomy('portfolio_cat',array('portfolio'), array(
                'hierarchical' => true,
                'labels' => 'Category',
                'show_ui' => true,
                'query_var' => true,
                'has_archive' => 'portfolio',
                'show_in_rest' => true,
                'rewrite' => array( 'slug' => 'portfolio_cat' ),
            ));

            register_taxonomy('portfolio_tag','portfolio',array(
                'hierarchical' => false,
                'labels' => 'Tag',
                'show_ui' => true,
                'has_archive' => 'portfolio',
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'show_in_rest' => true,
                'rewrite' => array( 'slug' => 'portfolio_tag' ),
              ));*/
        }
    }//End class
}//End if
