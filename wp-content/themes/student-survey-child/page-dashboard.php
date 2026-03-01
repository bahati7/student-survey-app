<?php
/* 
    Template for Dashboard page
    Template Name: Dashboard
*/
    if (!is_user_logged_in()) {
        wp_redirect(wp_login_url());
        exit;
    }

    get_header();

    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;
    $user_roles = $current_user->roles;

    $is_student = in_array('student', $user_roles);
    $is_instructor = in_array('instructor', $user_roles);

?>

<style>
    .dashboard {
        padding: 30px;
        font-family: Arial, sans-serif;
    }

    .cards {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .card {
        background: #daefffba;
        padding: 20px;
        border-radius: 12px;
        flex: 1;
        min-width: 220px;
    }

    .number {
        font-size: 28px;
        font-weight: bold;
        color: #2563eb;
    }

    .actions {
        margin-top: 30px;
        text-align: center;
    }

    .btn {
        padding: 10px 20px;
        background: #2563eb;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        margin-right: 10px;
    }

    .bar-chart {
        width: 100%;
        max-width: 100%;
        overflow: hidden;
    }

    .bar-inner {
        background: #3b82f6;
        padding: 0;
        margin: 0;
        transition: .3s;
        display: list-item;
        border-radius: 20px;
    }

    .bar {
        background: #daefffba;
        border-radius: 12px;
        transition: .3s;
        margin: 10px 15px;
        overflow: hidden;
    }

    .chart-container {
        margin: 30px 0;
        border-radius: 20px;
    }
</style>
<div class="dashboard">
    <h2>Welcome <?= esc_html($current_user->display_name); ?> !</h2>

    <?php if ($is_student): ?>

        <?php
            // Total surveys
            $total_surveys = wp_count_posts('survey')->publish;

            // Completed surveys
            $completed_args = array(
                'post_type' => 'response',
                'author' => $user_id,
                'post_status' => 'publish'
            );
            $completed_query = new WP_Query($completed_args);
            $completed_surveys = $completed_query->found_posts;
            $completed_surveys_chart = $completed_surveys > 0 ? number_format(($completed_surveys * 100) / $total_surveys, 0) : 0;

            // Feedbacks received
            $feedback_args = array(
                'post_type' => 'response',
                '_response_student_id' => $user_id,
                'meta_query' => array(
                    array(
                        'key' => '_response_feedback',
                        'compare' => 'EXISTS'
                    )
                )
            );
            $feedback_query = new WP_Query($feedback_args);
            $feedback_count = $feedback_query->found_posts;
            $feedback_count_chart = $feedback_count > 0 ? number_format(($feedback_count * 100) / $completed_surveys, 0) : 0;

            // New surveys (not completed yet)
            $new_surveys = $total_surveys - $completed_surveys;
            $new_surveys_chart = $new_surveys > 0 ? number_format(($new_surveys * 100) / $completed_surveys, 0) : 0;
        ?>

        <div class="cards">
            <div class="card">
            <h3>Surveys</h3>
            <p class="number"><?= $total_surveys; ?></p>
        </div>

        <div class="card">
            <h3>My Completed Surveys</h3>
            <p class="number"><?= $completed_surveys; ?></p>
        </div>

        <div class="card">
            <h3>Feedbacks</h3>
            <p class="number"><?= $feedback_count; ?></p>
        </div>

        <div class="card">
            <h3>New Surveys</h3>
            <p class="number"><?= max(0, $new_surveys); ?></p>
        </div>
</div>
        
        <div class="actions">
            <a href="<?= home_url('/survey/'); ?>" class="btn">Take a Survey</a>
        </div>

        <fieldset class="chart-container">
            <legend><h3 style="margin: 0;">Stats</h3></legend>

            <div class="bar-chart">
                <h4 style="margin: 0;">Completed surveys <span style="right: 0;float: right"><?= $completed_surveys_chart; ?>%</span></h4>
                <div class="bar">
                    <div class="bar-inner" style="width:<?= $completed_surveys_chart; ?>%"></div>
                </div>

                <h4 style="margin: 0;">New surveys <span style="right: 0;float: right"><?= $new_surveys_chart; ?>%</span></h4>
                <div class="bar">
                    <div class="bar-inner" style="width:<?= $new_surveys_chart; ?>%"></div>
                </div>
                
                <h4 style="margin: 0;">Feedback Received <span style="right: 0;float: right"><?= $feedback_count_chart; ?>%</span></h4>
                <div class="bar">
                    <div class="bar-inner" style="width:<?= $feedback_count_chart; ?>%"></div>
                </div>

            </div>
        </fieldset>

    <?php endif; ?>

    <?php if ($is_instructor): ?>

    <?php
        // Total surveys in system
        $total_surveys = wp_count_posts('survey')->publish;

        // My surveys
        $my_surveys_posts = get_posts(array(
            'post_type'      => 'survey',
            'author'         => $user_id,
            'posts_per_page' => -1,
            'fields'         => 'ids'
        ));

        $my_surveys = count($my_surveys_posts);
        $my_surveys_chart = $my_surveys > 0 ? number_format(($my_surveys * 100) / $total_surveys, 0) : 0;

        // Given Feedbacks

        $responses_with_feedback = new WP_Query(array(
            'post_type'      => 'response',
            'posts_per_page' => -1,
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => '_response_survey_id',
                    'value'   => $my_surveys_posts,
                    'compare' => 'IN',
                ),
                array(
                    'key'     => '_response_feedback',
                    'value'   => '',
                    'compare' => '!=',
                ),
            ),
        ));

        $feedback_given = $responses_with_feedback->found_posts;
        $feedback_given_chart = $feedback_given > 0 ? number_format(($feedback_given * 100) / $my_surveys,0) : 0;

    ?>

        <div class="cards">

            <div class="card">
                <h3>Total Surveys</h3>
                <p class="number"><?= $total_surveys; ?></p>
                <small>My surveys: <?= $my_surveys; ?></small>
            </div>

            <div class="card">
                <h3>Feedbacks Given</h3>
                <p class="number"><?= $feedback_given; ?></p>
            </div>

        </div>

        <div class="actions">
            <a href="<?= admin_url('post-new.php?post_type=survey'); ?>" class="btn">Create Survey</a>
            <a href="<?= admin_url('admin.php?page=survey-responses'); ?>" class="btn">View Responses</a>
            <a href="<?= admin_url('admin.php?page=survey-responses'); ?>" class="btn">Give Feedback</a>
        </div>

        <fieldset class="chart-container">
            <legend><h3 style="margin: 0;">Stats</h3></legend>

            <div class="bar-chart">
                <h4 style="margin: 0;">My surveys <span style="right: 0;float: right"><?= $my_surveys_chart; ?>%</span></h4>
                <div class="bar">
                    <div class="bar-inner" style="width:<?= $my_surveys_chart; ?>%"></div>
                </div>

                <h4 style="margin: 0;">Feedback Given <span style="right: 0;float: right"><?= $feedback_given_chart; ?>%</span></h4>
                <div class="bar">
                    <div class="bar-inner" style="width:<?= $feedback_given_chart; ?>%"></div>
                </div>
            </div>
        </fieldset>

    <?php endif; ?>
</div>

<?php 
    get_footer(); 
?>