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

// manage capacities for the CPT question
function add_question_caps() {
    $roles = array( 'administrator', 'instructor' );
    foreach ( $roles as $the_role ) {
        $role = get_role( $the_role );
        if ( empty( $role ) ) {
            continue;
        }

        $role->add_cap( 'edit_question' );
        $role->add_cap( 'read_question' );
        $role->add_cap( 'delete_question' );
        $role->add_cap( 'edit_questions' );
        $role->add_cap( 'edit_others_questions' );
        $role->add_cap( 'publish_questions' );
        $role->add_cap( 'read_private_questions' );
        $role->add_cap( 'delete_questions' );
        $role->add_cap( 'delete_private_questions' );
        $role->add_cap( 'delete_published_questions' );
        $role->add_cap( 'delete_others_questions' );
        $role->add_cap( 'edit_private_questions' );
        $role->add_cap( 'edit_published_questions' );
    }
}
add_action( 'admin_init', 'add_question_caps' );
