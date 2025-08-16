<?php
/**
 * Enqueue parent theme styles.
 */
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/*
                        _____________________________________________________________
                        |                                                           |
-_-_-_-_-_-_-_-_-_-_-_-_|    MKB - Student Survey App (SSA) - Role & Auth Helpers   |-_-_-_-_-_-_-_-_-_-_-_-_-_-
                        |___________________________________________________________|
                        
    The code on this block:
        - Ensure minimal existence of "Student" and "Instructor" roles
        - Handles login/logout redirects by role
        - Sets default role on registration
        - Blocks Student access to wp-admin

    Notes:
        - Capabilities remain minimal here, we'll have manage fine-grained caps via the CPT Team.
        - Keep slugs like /student/dashboard /instructor/dashboardor in sync with our pages.
 */


    //  1| Ensure custom roles exist (minimal caps) - CPT team will manage detailled capabilities
    function ssa_register_minimal_roles() {
        if (!get_role('instructor')) {
            add_role(
                'instructor',
                __('Instructor', 'student-survey-app'),
                [
                    'read' => true,
                ]
            );
        }
        if(!get_role('student')) {
            add_role(
                'student',
                __('Student', 'student-survey-app'),
                [
                    'read' => true,
                ]
            );
        }
    }
    add_action('init', 'ssa_register_minimal_roles');

    //  2| Login redirect by role - *Admin -> /wp-admin *Instructor -> /instructor/dasnboard - *Student -> /student/dashboard
    function ssa_login_redirect($redirect_to, $request, $user) {
       if($user instanceof WP_User && !empty($user -> roles))  {
            if(in_array('administrator', $user -> roles, true)) {
                return admin_url();
            }
            if(in_array('instructor', $user -> roles, true)) {
                return site_url('/instructor/dashboard');
            }
            if(in_array('student', $user -> roles, true)) {
                return site_url('/student/dashboard');
            }
       } 
       return $redirect_to;
    }
    add_filter('login_redirect', 'ssa_login_redirect', 10, 3);

    // 3| Logout redirect to home page
    function ssa_logout_redirect() {
        wp_safe_redirect(home_url());
        exit;
    }
    add_action('wp_logout', 'ssa_logout_redirect');

    // 4| Block wp-admin for students
    function ssa_block_wp_admin_access() {
        if ( is_admin() && !defined('DOING_AJAX') ) {
            $user = wp_get_current_user();

            if ( in_array('student', (array) $user->roles) ) {
                wp_redirect(home_url('/student/dashboard'));
                exit;
            }
        }
    }
    add_action('admin_init', 'ssa_block_wp_admin_access');

    // 5| Force default role "student" on new registrations.
    function ssa_set_default_role_on_register($user_id) {
        $user = new WP_User($user_id);
        if ($user && ! in_array('student', $user->roles, true)) {
            $user->set_role('student');
        }
    }
    add_action('user_register', 'ssa_set_default_role_on_register');

/* -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_ END OF Role & Auth Helpers _-_-_-_-_-__-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_- */

?>