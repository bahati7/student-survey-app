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



<?php 
    get_footer(); 
?>