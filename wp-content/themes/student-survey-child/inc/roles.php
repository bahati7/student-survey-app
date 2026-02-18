<!-- // Autoriser l'inscription publique pour les étudiants -->
<?php
// Custom roles: Student, Teacher, Instructor
// Uncomment if you want to (re)create roles on theme load
add_action('init', function() {
    // Student: accès limité, feedback, lecture
    if (!get_role('student')) {
        add_role('student', 'Student', array(
            'read' => true,
            'edit_posts' => false,
            'edit_surveys' => false,
            'manage_users' => false,
        ));
    }
    // Teacher: créer/éditer surveys, gérer ses classes
    if (!get_role('teacher')) {
        add_role('teacher', 'Instructor', array(
            'read' => true,
            'edit_posts' => true,
            'edit_surveys' => true,
            'manage_classes' => true,
            'manage_users' => false,
        ));
    }
    // Instructor: identique à teacher (pour compatibilité)
    if (!get_role('instructor')) {
        add_role('instructor', 'Instructor', array(
            'read' => true,
            'edit_posts' => true,
            'edit_surveys' => true,
            'manage_classes' => true,
            'manage_users' => false,
        ));
    }
    // Admin: tout accès (WordPress natif)
    // On peut ajouter des capacités custom si besoin
});

add_action('init', function() {
    if (get_option('users_can_register') != 1) {
        update_option('users_can_register', 1);
    }
});

add_action('user_register', function($user_id) {
    $user = new WP_User($user_id);
    if ($user) {
        $user->set_role('student');
    }
});
