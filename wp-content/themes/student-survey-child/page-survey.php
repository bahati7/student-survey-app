<?php
/*
Template Name: Survey Page
*/
get_header();
if (function_exists('do_shortcode')) {
    echo do_shortcode('[dynamic_main_menu]');
}
?>
<div class="survey-container">
<?php
if (!is_user_logged_in() || !current_user_can('student')) {
    echo '<div class="survey-permission">You do not have permission to view this survey.</div>';
    get_footer();
    return;
}

$survey_id = isset($_GET['survey_id']) ? intval($_GET['survey_id']) : 0;
if (!$survey_id) {
    echo '<div class="survey-error">No survey specified.</div>';
    get_footer();
    return;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['survey_answers'])) {
    $answers = $_POST['survey_answers'];
    $user_id = get_current_user_id();
    foreach ($answers as $question_id => $answer) {
        add_post_meta($question_id, 'student_answer_' . $user_id, sanitize_text_field($answer));
    }
    echo '<div class="survey-success">Your answers have been submitted. Thank you!</div>';
}

// echo '<pre>';
// echo 'Survey ID from URL: ' . $survey_id . "\n";
// $all_questions = get_posts([
//     'post_type' => 'question',
//     'posts_per_page' => -1,
//     'post_status' => 'publish',
// ]);
// foreach ($all_questions as $q){
//     $qid = $q->ID;
//     $meta = get_post_meta($qid, 'survey_id', true);
//     echo 'Question ID: ' . $qid . ', Associated Survey ID: ' . $meta . "\n";
// }
// echo '</pre>';

// Query questions for this survey (assume custom post type "question" with meta survey_id)
$questions = new WP_Query([
    'post_type' => 'question',
    'meta_query' => [
        [
            'key' => '_question_parent_survey',
            'value' => $survey_id,
            'compare' => '='
        ]
    ],
    'posts_per_page' => -1
]);
if ($questions->have_posts()) {
    echo '<form method="post" class="survey-form">';
    while ($questions->have_posts()) {
        $questions->the_post();
        $question_id = get_the_ID();
        $question_text = get_the_title();
        $question_type = get_post_meta($question_id, 'question_type', true);
        echo '<div class="survey-question">';
        echo '<label>' . esc_html($question_text) . '</label><br />';
        switch ($question_type) {
            case 'text':
                echo '<input type="text" name="survey_answers[' . esc_attr($question_id) . ']" />';
                break;
            case 'radio':
                $options = get_post_meta($question_id, 'question_options', true);
                if ($options && is_array($options)) {
                    foreach ($options as $opt) {
                        echo '<label><input type="radio" name="survey_answers[' . esc_attr($question_id) . ']" value="' . esc_attr($opt) . '"> ' . esc_html($opt) . '</label> ';
                    }
                }
                break;
            case 'dropdown':
            case 'multiple_choice':
                $options = get_post_meta($question_id, 'question_options', true);
                if ($options && is_array($options)) {
                    echo '<select name="survey_answers[' . esc_attr($question_id) . ']">';
                    foreach ($options as $opt) {
                        echo '<option value="' . esc_attr($opt) . '">' . esc_html($opt) . '</option>';
                    }
                    echo '</select>';
                }
                break;
            case 'textarea':
                echo '<textarea name="survey_answers[' . esc_attr($question_id) . ']"></textarea>';
                break;
            default:
                echo '<input type="text" name="survey_answers[' . esc_attr($question_id) . ']" />';
        }
        echo '</div>';
    }
    echo '<button type="submit">Submit</button>';
    echo '</form>';
    wp_reset_postdata();
} else {
    echo '<div class="survey-error">No questions found for this survey.</div>';
}
?>
</div>
<?php
get_footer();
