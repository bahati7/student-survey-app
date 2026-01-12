<?php
// Only load for admin area
add_action('admin_menu', function() {
    if (!current_user_can('instructor') && !current_user_can('administrator')) return;
    add_menu_page(
        'Survey Responses',
        'Survey Responses',
        'read', // 'read' is enough for instructor/administrator
        'survey-responses',
        'survey_responses_admin_page',
        'dashicons-feedback',
        6
    );
});

function survey_responses_admin_page() {
    if (!current_user_can('instructor') && !current_user_can('administrator')) {
        echo '<div class="notice notice-error"><p>Access denied.</p></div>';
        return;
    }
    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;

    // Handle feedback submission
    if (isset($_POST['response_feedback']) && isset($_POST['response_id']) && check_admin_referer('add_feedback_' . intval($_POST['response_id']))) {
        $response_id = intval($_POST['response_id']);
        $feedback = sanitize_textarea_field($_POST['response_feedback']);
        update_post_meta($response_id, '_response_feedback', $feedback);
        echo '<div class="updated"><p>Feedback saved!</p></div>';
    }

    // Get surveys created by this instructor
    $survey_args = [
        'post_type' => 'survey',
        'author' => $user_id,
        'posts_per_page' => -1
    ];
    $surveys = get_posts($survey_args);
    if (!$surveys) {
        echo '<p>No surveys found.</p>';
        return;
    }
    echo '<h1>Survey Responses</h1>';
    foreach ($surveys as $survey) {
        echo '<h2>' . esc_html($survey->post_title) . '</h2>';
        // Fetch responses linked to this survey
        $response_args = [
            'post_type' => 'response',
            'meta_key' => '_response_survey_id',
            'meta_value' => $survey->ID,
            'posts_per_page' => -1
        ];
        $responses = get_posts($response_args);
        if (!$responses) {
            echo '<p>No responses yet.</p>';
            continue;
        }
        echo '<table class="widefat fixed striped"><thead><tr><th>Student</th><th>Answers</th><th>Date</th><th>Feedback</th></tr></thead><tbody>';
        foreach ($responses as $response) {
            $student_id = get_post_meta($response->ID, '_response_student_id', true);
            $student = get_userdata($student_id);
            $answers = get_post_meta($response->ID, '_response_answers', true);
            $feedback = get_post_meta($response->ID, '_response_feedback', true);
            echo '<tr>';
            echo '<td>' . esc_html($student ? $student->display_name : 'Unknown') . '</td>';
            echo '<td>';
            if (is_array($answers) && !empty($answers)) {
                echo '<ul style="margin:0;padding-left:18px;">';
                foreach ($answers as $question_id => $answer) {
                    $question_title = get_the_title($question_id);
                    echo '<li><strong>' . esc_html($question_title) . ':</strong> ' . esc_html(is_array($answer) ? implode(', ', $answer) : $answer) . '</li>';
                }
                echo '</ul>';
            } else {
                echo esc_html($answers);
            }
            echo '</td>';
            echo '<td>' . esc_html(get_the_date('', $response)) . '</td>';
            echo '<td>';
            echo '<form method="post" style="margin:0;">';
            wp_nonce_field('add_feedback_' . $response->ID);
            echo '<textarea name="response_feedback" rows="2" style="width:100%;min-width:180px;max-width:320px;resize:vertical;">' . esc_textarea($feedback) . '</textarea>';
            echo '<input type="hidden" name="response_id" value="' . esc_attr($response->ID) . '" />';
            echo '<button type="submit" class="button button-primary" style="margin-top:4px;">Save</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    }
}
