<!-- // Restrict access to admin pages for non-admins -->
<?php

// Login redirect by role
add_filter('login_redirect', function($redirect_to, $request, $user) {
    if ($user instanceof WP_User && !empty($user->roles)) {
        if (in_array('administrator', $user->roles, true)) {
            return admin_url();
        }
        if (in_array('teacher', $user->roles, true) || in_array('instructor', $user->roles, true)) {
            return home_url('/dashboard/');
        }
        if (in_array('student', $user->roles, true)) {
            return home_url('/');
        }
    }
    return $redirect_to;
}, 10, 3);

// Logout redirect to home
add_action('wp_logout', function() {
    wp_safe_redirect(home_url());
    exit;
});

// Block wp-admin for students and instructors (no admin for eux)
add_action('admin_init', function() {
    if ( is_admin() && !defined('DOING_AJAX') ) {
        $user = wp_get_current_user();
        if ( in_array('student', (array) $user->roles) ) {
            wp_redirect(home_url('/'));
            exit;
        }
        if ( in_array('teacher', (array) $user->roles) || in_array('instructor', (array) $user->roles) ) {
            wp_redirect(home_url('/dashboard/'));
            exit;
        }
    }
});

add_action('template_redirect', function() {
    if (is_page('admin-only')) {
        $user = wp_get_current_user();
        if (!in_array('administrator', (array) $user->roles)) {
            wp_redirect(home_url('/'));
            exit;
        }
    }
    if (is_page('instructor-only')) {
        $user = wp_get_current_user();
        if (!in_array('teacher', (array) $user->roles) && !in_array('instructor', (array) $user->roles)) {
            wp_redirect(home_url('/'));
            exit;
        }
    }
    if (is_page('student-only')) {
        $user = wp_get_current_user();
        if (!in_array('student', (array) $user->roles)) {
            wp_redirect(home_url('/'));
            exit;
        }
    }
});
