<?php

// Registration of CPT 'Question'
function register_question_cpt() {
    $labels = array(
        'name'               => _x( 'Questions', 'post type general name', 'student-survey-child' ),
        'singular_name'      => _x( 'Question', 'post type singular name', 'student-survey-child' ),
        'menu_name'          => _x( 'Questions', 'admin menu', 'student-survey-child' ),
        'add_new'            => _x( 'Add New', 'question', 'student-survey-child' ),
        'add_new_item'       => __( 'Add New Question', 'student-survey-child' ),
        'edit_item'          => __( 'Edit Question', 'student-survey-child' ),
        'all_items'          => __( 'All Questions', 'student-survey-child' ),
        'search_items'       => __( 'Search Questions', 'student-survey-child' ),
        'not_found'          => __( 'No questions found.', 'student-survey-child' ),
        'not_found_in_trash' => __( 'No questions found in Trash.', 'student-survey-child' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false, // This means that questions are not public on the front-end
        'show_ui'            => true,
        'show_in_menu'       => true,
        'capability_type'    => 'question', 
        'map_meta_cap'       => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title' ), 
        'menu_icon'          => 'dashicons-editor-help',
    );

    register_post_type( 'question', $args );
}
add_action( 'init', 'register_question_cpt' );

