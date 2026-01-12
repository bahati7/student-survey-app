<?php
// Register a custom REST API endpoint for survey responses
add_action('rest_api_init', function() {
    register_rest_route('survey/v1', '/responses', array(
        'methods' => 'POST',
        'callback' => 'handle_survey_response',
        'permission_callback' => '__return_true', // You can restrict to logged-in users if needed
        'args' => array(
            'survey_id' => array('required' => true, 'type' => 'integer'),
            'answers'   => array('required' => true, 'type' => 'array'),
            'user_id'   => array('required' => false, 'type' => 'integer'),
        ),
    ));
});

function handle_survey_response($request) {
    $params = $request->get_json_params();
    $survey_id = isset($params['survey_id']) ? intval($params['survey_id']) : 0;
    $answers   = isset($params['answers']) ? $params['answers'] : array();
    $user_id   = isset($params['user_id']) ? intval($params['user_id']) : get_current_user_id();

    // Validate required fields
    if (!$survey_id || !is_array($answers) || empty($answers)) {
        return new WP_Error('invalid_data', 'Missing or invalid survey_id or answers.', array('status' => 400));
    }

    // Validate each answer (example: must have question_id and value)
    foreach ($answers as $answer) {
        if (empty($answer['question_id']) || !isset($answer['value'])) {
            return new WP_Error('invalid_answer', 'Each answer must have question_id and value.', array('status' => 400));
        }
    }

    // Save each answer as post meta (or use a custom table for production)
    foreach ($answers as $answer) {
        $question_id = intval($answer['question_id']);
        $value = sanitize_text_field($answer['value']);
        add_post_meta($question_id, 'student_answer_' . $user_id, $value);
    }

    return array('success' => true, 'message' => 'Survey responses saved.');
}
