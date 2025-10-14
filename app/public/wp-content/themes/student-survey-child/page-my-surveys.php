<?php
/*
Template Name: My Completed Surveys
*/
get_header();
?>
<div class="my-surveys-container">
<?php
if (!is_user_logged_in() || !current_user_can('student')) {
    echo '<div class="survey-permission">You do not have permission to view this page.</div>';
    get_footer();
    exit;
}
$user_id = get_current_user_id();
$responses = get_posts([
    'post_type' => 'response',
    'author' => $user_id,
    'posts_per_page' => -1
]);
if ($responses) {
    echo '<h2 class="my-surveys-title">Surveys You Have Completed</h2>';
    echo '<ul class="survey-list">';
    foreach ($responses as $response) {
        $survey_id = get_post_meta($response->ID, '_response_survey_id', true);
        $survey_title = get_the_title($survey_id);
        $view_link = add_query_arg(['survey_id' => $survey_id, 'response_id' => $response->ID], get_permalink());
        echo '<li class="survey-list-item"><a href="' . esc_url($view_link) . '" class="survey-link">' . esc_html($survey_title) . '</a></li>';
    }
    echo '</ul>';
    if (isset($_GET['survey_id']) && isset($_GET['response_id'])) {
        $survey_id = intval($_GET['survey_id']);
        $response_id = intval($_GET['response_id']);
        $answers = get_post_meta($response_id, '_response_answers', true);
        $feedback = get_post_meta($response_id, '_response_feedback', true);
        $questions = get_posts([
            'post_type' => 'question',
            'meta_key' => '_question_parent_survey',
            'meta_value' => $survey_id,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'posts_per_page' => -1,
        ]);
        echo '<div class="survey-answers-block">';
        echo '<h3 class="answers-title">Your Answers for: ' . esc_html(get_the_title($survey_id)) . '</h3>';
        if ($questions) {
            echo '<ul class="question-list">';
            foreach ($questions as $question) {
                $question_id = $question->ID;
                $question_text = $question->post_title;
                $answer = isset($answers[$question_id]) ? $answers[$question_id] : '';
                echo '<li class="question-list-item"><span class="question-label">' . esc_html($question_text) . ':</span> <span class="answer-value">' . esc_html(is_array($answer) ? implode(', ', $answer) : $answer) . '</span></li>';
            }
            echo '</ul>';
        } else {
            echo '<div class="no-questions">No questions found for this survey.</div>';
        }
        // Affiche le feedback de l'instructeur
        if (!empty($feedback)) {
            echo '<div class="instructor-feedback" style="background:#eafbe7;color:#256029;padding:14px 18px;border-radius:6px;margin-top:18px;border:1px solid #b7e4c7;">';
            echo '<strong>Instructor Feedback:</strong> ' . esc_html($feedback);
            echo '</div>';
        }
        echo '</div>';
    }
} else {
    echo '<div class="survey-error">You have not completed any surveys yet.</div>';
}
?>
</div>
<style>
.my-surveys-container {
    max-width: 700px;
    margin: 32px auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 16px rgba(0,0,0,0.07);
    padding: 32px 24px;
}
.my-surveys-title {
    font-size: 1.3em;
    font-weight: 600;
    margin-bottom: 18px;
    color: #0073aa;
    text-align: center;
}
.survey-list {
    list-style: none;
    padding: 0;
    margin-bottom: 32px;
}
.survey-list-item {
    margin-bottom: 16px;
}
.survey-link {
    display: block;
    background: #f4f8fb;
    color: #0073aa;
    font-weight: 500;
    font-size: 1em;
    padding: 10px 14px;
    border-radius: 6px;
    text-decoration: none;
    transition: background 0.2s;
    box-shadow: 0 1px 4px rgba(0,0,0,0.04);
}
.survey-link:hover {
    background: #eaf3fa;
}
.survey-answers-block {
    background: #f9f9f9;
    border-radius: 8px;
    padding: 24px 18px;
    margin-top: 24px;
    box-shadow: 0 1px 8px rgba(0,0,0,0.04);
}
.answers-title {
    font-size: 1.1em;
    font-weight: 500;
    margin-bottom: 12px;
    color: #333;
}
.question-list {
    list-style: none;
    padding: 0;
}
.question-list-item {
    margin-bottom: 14px;
    padding: 10px 0;
    border-bottom: 1px solid #e3e3e3;
}
.question-label {
    font-weight: 400;
    color: #444;
    font-size: 0.97em;
}
.answer-value {
    color: #0073aa;
    font-weight: 400;
    margin-left: 8px;
    font-size: 0.97em;
}
.survey-error, .survey-permission, .no-questions {
    background: #ffeaea;
    color: #c00;
    padding: 14px 18px;
    border-radius: 6px;
    margin-bottom: 18px;
    text-align: center;
}
@media (max-width: 700px) {
    .my-surveys-container {
        padding: 12px 4px;
    }
    .survey-answers-block {
        padding: 12px 4px;
    }
}
</style>
<?php
get_footer();
