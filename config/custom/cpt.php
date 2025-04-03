<?php
    /** add actions + filter */
    add_action( 'init', 'create_post_type' );

    /** define functions */
    if ( ! function_exists( 'create_post_type' ) ) {
        function create_post_type() {
            register_post_type( 'team',
                array(
                    'labels' => array(
                        'name' => __( 'Team' ),
                        'singular_name' => __( 'Team' ),
                        'add_new' => __('Neues Teammitglied anlegen'),
                    ),
                    'public' => true,
                    'supports' => [
                        'title',
                        'editor',
                        'custom-fields',
                        'excerpt',
                        'thumbnail',
                    ],
                    //'taxonomies' => array( 'category', 'post_tag' ),
                    'hierarchical' => true,
                    'has_archive' => true,
                    'show_in_rest' => true,
                    'show_ui' => true,
                    'rewrite' => array ( 'slug' => __( 'team' ) )
                )
            );
            register_post_type( 'rezensionen',
                array(
                    'labels' => array(
                        'name' => __( 'Rezensionen' ),
                        'singular_name' => __( 'Rezension' ),
                        'add_new' => __('Neue Rezension anlegen'),
                    ),
                    'public' => true,
                    'supports' => [
                        'title',
                        'editor',
                        'custom-fields',
                        'excerpt',
                        'thumbnail',
                    ],
                    //'taxonomies' => array( 'category', 'post_tag' ),
                    'hierarchical' => true,
                    'has_archive' => true,
                    'show_in_rest' => true,
                    'show_ui' => true,
                    'rewrite' => array ( 'slug' => __( 'rezension' ) )
                )
            );
        }
    }

    /**
     * noindex Posttype Projekte Kategorien
     */
    // function noindex_for_nameofcpt() {
    //     if ( is_singular( 'name-of-cpt' ) ) {
    //         echo '<meta name="robots" content="noindex, nofollow">';
    //     }
    // } add_action('wp_head', 'noindex_for_nameofcpt');
