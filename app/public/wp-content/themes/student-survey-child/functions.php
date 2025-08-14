<?php
/**
 * Enqueue parent theme styles.
 */
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>



<?php


// Enregistration of CPT 'Survey'
function register_survey_cpt() {
    $labels = array(
        'name'               => _x( 'Surveys', 'post type general name', 'student-survey-child' ),
        'singular_name'      => _x( 'Survey', 'post type singular name', 'student-survey-child' ),
        'menu_name'          => _x( 'Surveys', 'admin menu', 'student-survey-child' ),
        'name_admin_bar'     => _x( 'Survey', 'add new on admin bar', 'student-survey-child' ),
        'add_new'            => _x( 'Add New', 'survey', 'student-survey-child' ),
        'add_new_item'       => __( 'Add New Survey', 'student-survey-child' ),
        'new_item'           => __( 'New Survey', 'student-survey-child' ),
        'edit_item'          => __( 'Edit Survey', 'student-survey-child' ),
        'view_item'          => __( 'View Survey', 'student-survey-child' ),
        'all_items'          => __( 'All Surveys', 'student-survey-child' ),
        'search_items'       => __( 'Search Surveys', 'student-survey-child' ),
        'parent_item_colon'  => __( 'Parent Surveys:', 'student-survey-child' ),
        'not_found'          => __( 'No surveys found.', 'student-survey-child' ),
        'not_found_in_trash' => __( 'No surveys found in Trash.', 'student-survey-child' )
    );

    $capabilities = array(                     
        'edit_post'          => 'edit_survey',
        'read_post'          => 'read_survey',
        'delete_post'        => 'delete_survey',
        'edit_posts'         => 'edit_surveys',        
        'edit_others_posts'  => 'edit_others_surveys',
        'publish_posts'      => 'publish_surveys',
        'read_private_posts' => 'read_private_surveys'
         
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'survey' ),
        'capability_type'    => 'survey',
        'capabilities'       => $capabilities,
        'map_meta_cap'       => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor' ),
        'menu_icon'          => 'dashicons-list-view'
       

    );

    register_post_type( 'survey', $args );                                 
}
add_action( 'init', 'register_survey_cpt' );


// manage capabilities for 'Instructor' and 'Administrator' roles
function add_survey_caps() {
    
    $roles = array( 'administrator', 'instructor' );

    foreach ( $roles as $the_role ) {

        $role = get_role( $the_role );
        if ( empty( $role ) ) {
            continue;
        }

        $role->add_cap( 'edit_survey' );     
        $role->add_cap( 'read_survey' );
        $role->add_cap( 'delete_survey' );      
        $role->add_cap( 'edit_surveys' );
        $role->add_cap( 'edit_others_surveys' );
        $role->add_cap( 'publish_surveys' );
        $role->add_cap( 'read_private_surveys' );
        $role->add_cap( 'delete_surveys' );     
        $role->add_cap( 'delete_private_surveys' );
        $role->add_cap( 'delete_published_surveys' );    
        $role->add_cap( 'delete_others_surveys' ); 
        $role->add_cap( 'edit_private_surveys' );
        $role->add_cap( 'edit_published_surveys' );
    }
}
add_action( 'admin_init', 'add_survey_caps' );

         
