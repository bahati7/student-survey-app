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
        echo '<table class="widefat fixed striped"><thead><tr><th>Student</th><th>Answers</th><th>Date</th></tr></thead><tbody>';
        foreach ($responses as $response) {
            $student_id = get_post_meta($response->ID, '_response_student_id', true);
            $student = get_userdata($student_id);
            $answers = get_post_meta($response->ID, '_response_answers', true);
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
            echo '</tr>';
        }
        echo '</tbody></table>';
    }
}
