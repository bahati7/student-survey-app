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


// Add custom columns to the 'Question' list table
function set_question_columns( $columns ) {
    $columns['question_parent_survey'] = 'Associated Survey';
    $columns['question_type'] = 'Question Type';
    return $columns;
}
add_filter( 'manage_question_posts_columns', 'set_question_columns' );





// Add meta boxes for the CPT 'Question'
function question_add_meta_box() {
    add_meta_box(
        'question_details',
        'Question Details',
        'question_details_meta_box_callback',
        'question',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'question_add_meta_box' );

// Callback to display the meta box html
function question_details_meta_box_callback( $post ) {
    wp_nonce_field( 'question_details_save_meta_box_data', 'question_details_meta_box_nonce' );

    $parent_survey_id = get_post_meta( $post->ID, '_question_parent_survey', true );
    $question_type    = get_post_meta( $post->ID, '_question_type', true );
    $answer_options   = get_post_meta( $post->ID, '_question_answer_options', true );

    // Retrieve all surveys for dropdown list
    $surveys = get_posts( array(
        'post_type'      => 'survey',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC'
    ) );
    ?>
    
    <p>
        <label for="question_parent_survey">Associated Survey</label>
        <br>
        <select name="question_parent_survey" id="question_parent_survey" style="width:100%;">
            <option value=""> Select a Survey </option>
            <?php foreach ( $surveys as $survey ) : ?>
                <option value="<?php echo esc_attr( $survey->ID ); ?>" <?php selected( $parent_survey_id, $survey->ID ); ?>>
                    <?php echo esc_html( $survey->post_title ); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label for="question_type">Question Type</label>
        <br>
        <select name="question_type" id="question_type" style="width:100%;">
            <option value="text" <?php selected( $question_type, 'text' ); ?>>Text</option>
            <option value="multiple_choice" <?php selected( $question_type, 'multiple_choice' ); ?>>Multiple Choice</option>
            <option value="true_false" <?php selected( $question_type, 'true_false' ); ?>>True/False</option>
        </select>
    </p>

    <p>
        <label for="answer_options">Answer Options</label>
        <br>
        <textarea id="answer_options" name="answer_options" style="width:100%;" placeholder="Enter one option per line for multiple choice questions."><?php echo esc_textarea( $answer_options ); ?></textarea>
        
    </p>

    <?php
}

// Saving meta box data 'Question'
function question_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['question_details_meta_box_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['question_details_meta_box_nonce'], 'question_details_save_meta_box_data' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_question', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['question_parent_survey'] ) ) {
        update_post_meta( $post_id, '_question_parent_survey', sanitize_text_field( $_POST['question_parent_survey'] ) );
    }

    if ( isset( $_POST['question_type'] ) ) {
        update_post_meta( $post_id, '_question_type', sanitize_text_field( $_POST['question_type'] ) );
    }

    if ( isset( $_POST['answer_options'] ) ) {
        update_post_meta( $post_id, '_question_answer_options', sanitize_textarea_field( $_POST['answer_options'] ) );
    }
}
add_action( 'save_post', 'question_save_meta_box_data' );