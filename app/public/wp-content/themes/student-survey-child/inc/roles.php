<?php
// Custom roles: Student, Teacher, Instructor
// Uncomment if you want to (re)create roles on theme load
add_action('init', function() {
    if (!get_role('student')) {
        add_role('student', 'Student', array('read' => true));
    }
    if (!get_role('teacher')) {
        add_role('teacher', 'Teacher', array('read' => true, 'edit_posts' => true));
    }
    if (!get_role('instructor')) {
        add_role('instructor', 'Instructor', array('read' => true));
    }
});

// Force default role "student" on registration
add_action('user_register', function($user_id) {
    $user = new WP_User($user_id);
    if ($user && !in_array('student', $user->roles, true)) {
        $user->set_role('student');
    }
});
