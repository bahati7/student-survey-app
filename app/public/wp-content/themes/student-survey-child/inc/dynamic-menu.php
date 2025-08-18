<?php
// Dynamic main menu shortcode
add_shortcode('dynamic_main_menu', function() {
    $menu = array();
    $menu[] = '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    $menu[] = '<a href="' . esc_url(home_url('/about/')) . '">About</a>';
    if (!is_user_logged_in()) {
        $menu[] = '<div class="dynamic-menu-dropdown"><a href="#">User</a><div class="dynamic-menu-dropdown-content">'
            .'<a href="' . esc_url(wp_login_url()) . '">Login</a>'
            .'<a href="' . esc_url(wp_registration_url()) . '">Register</a>'
            .'</div></div>';
    } else {
        $user = wp_get_current_user();
        $dashboard = '';
        if (in_array('administrator', $user->roles)) {
            $dashboard = home_url('/dashboard/');
        } elseif (in_array('teacher', $user->roles)) {
            $dashboard = home_url('/dashboard/teacher/');
        } elseif (in_array('instructor', $user->roles)) {
            $dashboard = home_url('/dashboard/instructor/');
        } elseif (in_array('student', $user->roles)) {
            $dashboard = home_url('/student-dashboard');
        }
        $menu[] = '<div class="dynamic-menu-dropdown"><a href="#">User</a><div class="dynamic-menu-dropdown-content">'
            .'<a href="' . esc_url(get_edit_profile_url($user->ID)) . '">Profile</a>'
            .($dashboard ? '<a href="' . esc_url($dashboard) . '">Dashboard</a>' : '')
            .'<a href="' . esc_url(wp_logout_url(home_url('/'))) . '">Logout</a>'
            .'</div></div>';
    }
    return '<nav class="dynamic-main-menu">' . implode(' ', $menu) . '</nav>';
});
