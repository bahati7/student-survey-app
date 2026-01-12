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

// Populate custom columns with data
function populate_question_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'question_parent_survey':
            $parent_survey_id = get_post_meta( $post_id, '_question_parent_survey', true );
            if ( $parent_survey_id ) {
                echo esc_html( get_the_title( $parent_survey_id ) );
            } else {
                echo '—';
            }
            break;
        case 'question_type':
            $question_type = get_post_meta( $post_id, '_question_type', true );
            if ( $question_type ) {
                echo ucfirst( str_replace( '_', ' ', $question_type ) );
            } else {
                echo '—';
            }
            break;
    }
}
add_action( 'manage_question_posts_custom_column', 'populate_question_columns', 10, 2 );

// Add Survey filter in Questions admin list
function filter_questions_by_survey( $post_type ) {
    if ( $post_type !== 'question' ) {
        return;
    }

    $surveys = get_posts( array(
        'post_type'      => 'survey',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC'
    ) );

    echo '<select name="question_parent_survey">';
    echo '<option value="">All Surveys</option>';
    foreach ( $surveys as $survey ) {
        $selected = ( isset( $_GET['question_parent_survey'] ) && $_GET['question_parent_survey'] == $survey->ID ) ? ' selected="selected"' : '';
        echo '<option value="' . esc_attr( $survey->ID ) . '"' . $selected . '>' . esc_html( $survey->post_title ) . '</option>';
    }
    echo '</select>';
}
add_action( 'restrict_manage_posts', 'filter_questions_by_survey' );

// Apply filter to query
function filter_questions_query( $query ) {
    global $pagenow;
    if ( $pagenow === 'edit.php' && isset( $_GET['question_parent_survey'] ) && $_GET['question_parent_survey'] != '' && $query->get( 'post_type' ) === 'question' ) {
        $query->set( 'meta_key', '_question_parent_survey' );
        $query->set( 'meta_value', intval( $_GET['question_parent_survey'] ) );
    }
}
add_filter( 'pre_get_posts', 'filter_questions_query');


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
    $question_required = get_post_meta( $post->ID, '_question_required', true );

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
            <option value="email" <?php selected( $question_type, 'email' ); ?>>Email</option>
            <option value="phone" <?php selected( $question_type, 'phone' ); ?>>Phone Number</option>
            <option value="text_array" <?php selected( $question_type, 'text_array' ); ?>>Text Array</option>
            <option value="radio_button" <?php selected( $question_type, 'radio_button' ); ?>>Radio Button</option>
            <option value="date" <?php selected( $question_type, 'date' ); ?>>Date</option>
            <option value="number" <?php selected( $question_type, 'number' ); ?>>Number</option>
            <option value="file_upload" <?php selected( $question_type, 'file_upload' ); ?>>File Upload</option>
            <option value="checkbox" <?php selected( $question_type, 'checkbox' ); ?>>Checkbox</option>
            <option value="time" <?php selected( $question_type, 'time' ); ?>>Time</option>
            <option value="range" <?php selected( $question_type, 'range' ); ?>>Range</option>
        </select>
    </p>

    <p>
        <label for="answer_options">Answer Options</label>
        <br>
        <textarea id="answer_options" name="answer_options" style="width:100%;" placeholder="Enter one option per line for multiple choice questions."><?php echo esc_textarea( $answer_options ); ?></textarea>
        
    </p>

    <p>
        <label for="question_required">
            <input type="checkbox" name="question_required" id="question_required" value="1" <?php checked( $question_required, '1' ); ?>>
            Required question
        </label>
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
    // Save required flag
    if ( isset( $_POST['question_required'] ) && $_POST['question_required'] == '1' ) {
        update_post_meta( $post_id, '_question_required', '1' );
    } else {
        delete_post_meta( $post_id, '_question_required' );
    }
}
add_action( 'save_post', 'question_save_meta_box_data' );