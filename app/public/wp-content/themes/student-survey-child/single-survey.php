<?php
get_header();

// Check if the user is a student
if(!current_user_can('student')) {
    echo "<p class='alert'>You do not have permission to view this survey !</p>";
    get_footer();
    exit;
}

// Fetch current survey information
$survey_id   = get_the_ID();
$title       = get_the_title();
$description = get_post_meta( $survey_id, '_survey_description', true );
$start_date  = get_post_meta( $survey_id, '_survey_start_date', true );
$end_date    = get_post_meta( $survey_id, '_survey_end_date', true );

// Retrieve survey questions
// Gestion de la soumission du formulaire
// Vérifie si l'étudiant a déjà répondu à ce survey
$user_id = get_current_user_id();
$already_responded = false;
if (is_user_logged_in()) {
    $existing_response = get_posts([
        'post_type' => 'response',
        'meta_key' => '_response_survey_id',
        'meta_value' => $survey_id,
        'author' => $user_id,
        'posts_per_page' => 1
    ]);
    if ($existing_response) {
        $already_responded = true;
    }
}

$success_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer']) && is_user_logged_in() && !$already_responded) {
    $answers = $_POST['answer'];
    $user_id = get_current_user_id();
    $clean_answers = array();
    foreach ($answers as $question_id => $response) {
        if (is_array($response)) {
            $response = array_map('sanitize_text_field', $response);
            $clean_answers[$question_id] = $response;
        } else {
            $clean_answers[$question_id] = sanitize_text_field($response);
        }
    }
    // Crée un post de type 'response'
    $response_post = array(
        'post_type'    => 'response',
        'post_title'   => 'Response for Survey #' . $survey_id . ' by User #' . $user_id,
        'post_status'  => 'publish',
        'post_author'  => $user_id,
    );
    $response_id = wp_insert_post($response_post);
    if ($response_id && !is_wp_error($response_id)) {
        update_post_meta($response_id, '_response_survey_id', $survey_id);
        update_post_meta($response_id, '_response_student_id', $user_id);
        update_post_meta($response_id, '_response_answers', $clean_answers);
        $success_message = "<div class='survey-success' style='background:#d4edda;color:#155724;padding:12px 18px;border-radius:6px;margin-bottom:18px;border:1px solid #c3e6cb;'>Merci, vos réponses ont bien été enregistrées !</div>";
    } else {
        $success_message = "<div class='survey-error' style='background:#f8d7da;color:#721c24;padding:12px 18px;border-radius:6px;margin-bottom:18px;border:1px solid #f5c6cb;'>Erreur lors de l'enregistrement des réponses.</div>";
    }
}

$questions = get_posts(array(
    'post_type' => 'question',
    'meta_key' => '_question_parent_survey',
    'meta_value' => $survey_id,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => -1,
));
?>

<div id="survey-wrapper" class="container" style="max-width:600px;margin:auto;">
    <h1><?= esc_html($title); ?></h1>

    <?php if ($description) { ?>
        <p class="survey-description"><?= esc_html($description); ?></p>
    <?php } ?>

    <?php if ($start_date && $end_date) { ?>
        <p class="survey-dates">
            <strong>Available from:</strong>
            <?= esc_html($start_date); ?> to <?= esc_html($end_date); ?>
        </p>
    <?php } ?>

    <?php if ($success_message) echo $success_message; ?>
    <?php if ($already_responded) { ?>
        <div class="survey-info" style="background:#fff3cd;color:#856404;padding:12px 18px;border-radius:6px;margin-bottom:18px;border:1px solid #ffeeba;">
            You have already responded to this survey. Thank you!
        </div>
    <?php } elseif ($questions) { ?>
        <form id="survey-form" method="post" autocomplete="off">
            <?php
            $total = count($questions);
            foreach ($questions as $i => $question) {
                $question_id = $question->ID;
                $question_text = $question->post_title;
                $question_type = get_post_meta($question_id, '_question_type', true);
                $options = get_post_meta($question_id, '_question_answer_options', true);
                $options_array = $options ? array_filter(array_map('trim', explode("\n", $options))) : [];
            ?>
                <fieldset class="survey-question" style="border:1px solid #eee;padding:24px 18px 18px 18px;border-radius:8px;margin-bottom:24px;background:#fafbfc;">
                    <legend style="font-weight:bold;font-size:1.1em;margin-bottom:12px;">
                        Question <?= ($i+1) ?> / <?= $total ?> :
                    </legend>
                    <p style="margin-bottom:18px;"><?= esc_html($question_text); ?></p>

                    <?php
                    switch ($question_type) {
                        case 'text':
                            echo '<input type="text" name="answer['.$question_id.']" required class="form-control" style="width:100%;padding:8px;" placeholder="Your answer...">';
                            break;
                        case 'multiple_choice':
                        case 'checkbox':
                            if (!empty($options_array)) {
                                foreach ($options_array as $opt) {
                                    echo '<label style="display:block;margin-bottom:8px;">';
                                    echo '<input type="checkbox" name="answer['.$question_id.'][]" value="'.esc_attr($opt).'" required> '.esc_html($opt);
                                    echo '</label>';
                                }
                            }
                            break;
                        case 'radio_button':
                            if (!empty($options_array)) {
                                foreach ($options_array as $opt) {
                                    echo '<label style="margin-right:16px;">';
                                    echo '<input type="radio" name="answer['.$question_id.']" value="'.esc_attr($opt).'" required> '.esc_html($opt);
                                    echo '</label>';
                                }
                            }
                            break;
                        case 'dropdown':
                            if (!empty($options_array)) {
                                echo '<select name="answer['.$question_id.']" required style="width:100%;padding:8px;">';
                                foreach ($options_array as $opt) {
                                    echo '<option value="'.esc_attr($opt).'">'.esc_html($opt).'</option>';
                                }
                                echo '</select>';
                            }
                            break;
                        case 'true_false':
                            echo '<label style="margin-right:16px;"><input type="radio" name="answer['.$question_id.']" value="true" required> True</label>';
                            echo '<label><input type="radio" name="answer['.$question_id.']" value="false" required> False</label>';
                            break;
                        case 'email':
                            echo '<input type="email" name="answer['.$question_id.']" required class="form-control" style="width:100%;padding:8px;" placeholder="Your email...">';
                            break;
                        case 'phone':
                            echo '<input type="tel" name="answer['.$question_id.']" required class="form-control" style="width:100%;padding:8px;" placeholder="Your phone number...">';
                            break;
                        case 'text_array':
                            echo '<textarea name="answer['.$question_id.']" required class="form-control" style="width:100%;padding:8px;" placeholder="Enter multiple lines..."></textarea>';
                            break;
                        case 'date':
                            echo '<input type="date" name="answer['.$question_id.']" required class="form-control" style="width:100%;padding:8px;">';
                            break;
                        case 'number':
                            echo '<input type="number" name="answer['.$question_id.']" required class="form-control" style="width:100%;padding:8px;">';
                            break;
                        case 'file_upload':
                            echo '<input type="file" name="answer['.$question_id.']" class="form-control" style="width:100%;padding:8px;">';
                            break;
                        case 'time':
                            echo '<input type="time" name="answer['.$question_id.']" required class="form-control" style="width:100%;padding:8px;">';
                            break;
                        case 'range':
                            echo '<input type="range" name="answer['.$question_id.']" min="0" max="100" class="form-control" style="width:100%;">';
                            break;
                        case 'textarea':
                            echo '<textarea name="answer['.$question_id.']" required class="form-control" style="width:100%;padding:8px;" placeholder="Your answer..."></textarea>';
                            break;
                        default:
                            echo '<input type="text" name="answer['.$question_id.']" required class="form-control" style="width:100%;padding:8px;" placeholder="Your answer...">';
                    }
                    ?>
                </fieldset>
            <?php } ?>

            <div class="survey-navigation" style="text-align:center;margin-bottom:16px;">
                <button type="submit" id="submit-btn">Submit</button>
            </div>
            <p id="progress" style="text-align:center;font-size:1em;">Total questions: <?= $total; ?></p>
        </form>
    <?php } else { ?>
        <p>No questions found for this survey.</p>
    <?php } ?>
</div>

<style>
/* Responsive and accessible improvements */
@media (max-width: 600px) {
    #survey-wrapper { padding: 0 8px; }
    fieldset.survey-question { padding: 16px 6px 12px 6px; }
}
input[type="text"], .form-control {
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1em;
}
button#prev-btn, button#next-btn, button#submit-btn {
    padding: 8px 18px;
    border-radius: 4px;
    border: none;
    background: #0073aa;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}
button[disabled] {
    background: #ccc;
    cursor: not-allowed;
}
</style>

<?php
get_footer();
?>
