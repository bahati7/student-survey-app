<?php
// Dynamic main menu shortcode
add_shortcode('dynamic_main_menu', function() {
    $menu = array();
    // Lien dynamique pour la page d'accueil contextuelle
    $home_context_page = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-home-context.php',
        'post_status' => 'publish',
        'number' => 1
    ));
    if (!empty($home_context_page)) {
        $menu[] = '<a href="' . esc_url(get_permalink($home_context_page[0]->ID)) . '">' . esc_html(get_the_title($home_context_page[0]->ID)) . '</a>';
    } else {
        $menu[] = '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    }
    $menu[] = '<a href="' . esc_url(home_url('/about/')) . '">Abouts</a>';
    if(is_user_logged_in() && current_user_can('student')) {
        $menu[] = '<a href="' . esc_url(home_url('/survey/')) . '">All Surveys</a>';

        // $menu[] = '<a href="' . esc_url(home_url('/my-completed-surveys/')) . '">My Completed Surveys</a>';

        // Lien dynamique pour la page "My Completed Surveys"
        $my_surveys_page = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-my-surveys.php',
            'post_status' => 'publish',
            'number' => 1
        ));
        if (!empty($my_surveys_page)) {
            $menu[] = '<a href="' . esc_url(get_permalink($my_surveys_page[0]->ID)) . '">My Completed Surveys</a>';
        }
    }
    if (!is_user_logged_in()) {
        $menu[] = '<div class="dynamic-menu-dropdown"><a href="#">User</a><div class="dynamic-menu-dropdown-content">'
            .'<a href="' . esc_url(wp_login_url()) . '">Login</a>'
            .'<a href="' . esc_url(wp_registration_url()) . '">Register as Student</a>'
            .'</div></div>';
    } else {
        $user = wp_get_current_user();
        $dashboard = '';
        $role_label = '';
        if (in_array('administrator', $user->roles)) {
            $dashboard = home_url('/dashboard/');
            $role_label = 'Admin';
        } elseif (in_array('teacher', $user->roles) || in_array('instructor', $user->roles)) {
            $dashboard = home_url('/dashboard/teacher/');
            $role_label = 'Instructor';
        } elseif (in_array('student', $user->roles)) {
            $dashboard = home_url('/student-dashboard');
            $role_label = 'Student';
        }
        $menu[] = '<div class="dynamic-menu-dropdown"><a href="#">' . esc_html($role_label) . '</a><div class="dynamic-menu-dropdown-content">'
            .'<a href="' . esc_url(get_edit_profile_url($user->ID)) . '">Profile</a>'
            .($dashboard ? '<a href="' . esc_url($dashboard) . '">Dashboard</a>' : '')
            .'<a href="' . esc_url(wp_logout_url(home_url('/'))) . '">Logout</a>'
            .'</div></div>';
    }
    return '<nav class="dynamic-main-menu">' . implode(' ', $menu) . '</nav>';
});
