<?php
/*
Template Name: All Surveys
*/
get_header();
if (function_exists('do_shortcode')) {
    echo do_shortcode('[dynamic_main_menu]');
}
?>
<div class="all-surveys-container">
<?php
if (!is_user_logged_in() || !current_user_can('student')) {
    echo '<div class="survey-permission">You do not have permission to view surveys.</div>';
    get_footer();
    exit;
}

$surveys = new WP_Query([
    'post_type' => 'survey',
    'posts_per_page' => -1
]);
if ($surveys->have_posts()) {
    echo '<h2>Available Surveys</h2>';
    echo '<ul class="survey-list">';
    while ($surveys->have_posts()) {
        $surveys->the_post();
        $survey_id = get_the_ID();
        $survey_title = get_the_title();
        $survey_link = add_query_arg('survey_id', $survey_id, site_url('/take-survey/'));
        echo '<li><a href="' . esc_url($survey_link) . '">' . esc_html($survey_title) . '</a></li>';
    }
    echo '</ul>';
    wp_reset_postdata();
} else {
    echo '<div class="survey-error">No surveys available.</div>';
}
?>
</div>
<?php
get_footer();
