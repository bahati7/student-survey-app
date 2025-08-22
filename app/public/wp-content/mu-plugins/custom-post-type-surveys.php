
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

// Add meta boxes for custom fields
function survey_add_meta_box() {
    add_meta_box(
        'survey_details',
        'Survey Details',
        'survey_details_meta_box_callback',
        'survey',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'survey_add_meta_box' );

function survey_details_meta_box_callback( $post ) {
    wp_nonce_field( 'survey_details_save_meta_box_data', 'survey_details_meta_box_nonce' );

    $description = get_post_meta( $post->ID, '_survey_description', true );
    $start_date  = get_post_meta( $post->ID, '_survey_start_date', true );
    $end_date    = get_post_meta( $post->ID, '_survey_end_date', true );
    ?>
    <p>
        <label for="survey_description">Description</label>
        <br>
        <textarea id="survey_description" name="survey_description" style="width:100%;"><?php echo esc_textarea( $description ); ?></textarea>
    </p>
    <p>
        <label for="survey_start_date">Start Date</label>
        <br>
        <input type="date" id="survey_start_date" name="survey_start_date" value="<?php echo esc_attr( $start_date ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="survey_end_date">End Date</label>
        <br>
        <input type="date" id="survey_end_date" name="survey_end_date" value="<?php echo esc_attr( $end_date ); ?>" style="width:100%;">
    </p>
    <?php
}

// Saving metabox data
function survey_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['survey_details_meta_box_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['survey_details_meta_box_nonce'], 'survey_details_save_meta_box_data' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_survey', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['survey_description'] ) ) {
        update_post_meta( $post_id, '_survey_description', sanitize_textarea_field( $_POST['survey_description'] ) );
    }

    if ( isset( $_POST['survey_start_date'] ) ) {
        update_post_meta( $post_id, '_survey_start_date', sanitize_text_field( $_POST['survey_start_date'] ) );
    }

    if ( isset( $_POST['survey_end_date'] ) ) {
        update_post_meta( $post_id, '_survey_end_date', sanitize_text_field( $_POST['survey_end_date'] ) );
    }
}
add_action( 'save_post', 'survey_save_meta_box_data' );

?>