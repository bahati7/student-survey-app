<?php
/*
Template Name: About
*/
get_header();
?>
<div class="about-container" style="max-width:1000px;margin:40px auto 0 auto;padding:40px 32px;background:#fff;border-radius:12px;box-shadow:0 2px 16px rgba(0,0,0,0.07);">

    <!-- Hero Section -->
    <div class="about-hero" style="text-align:center;margin-bottom:48px;padding:32px;background:linear-gradient(135deg, #16203a 0%, #223355 100%);border-radius:10px;color:#fff;">
        <h1 style="color:#ffd700;font-size:2.5em;font-weight:700;margin-bottom:16px;">About Student Survey App</h1>
<!--        <p style="font-size:1.2em;line-height:1.6;color:#e0e6f0;max-width:700px;margin:0 auto;">-->
<!--            Empowering educational institutions with modern, efficient, and user-friendly survey management solutions.-->
<!--        </p>-->
    </div>

    <!-- Mission Section -->
    <div class="about-section" style="margin-bottom:48px;">
        <h2 style="color:#16203a;font-size:2em;font-weight:700;margin-bottom:20px;border-bottom:3px solid #0073aa;padding-bottom:12px;">Our Mission</h2>
        <p style="font-size:1.1em;line-height:1.8;color:#333;margin-bottom:16px;">
            The <strong>Student Survey App</strong> was developed to bridge the communication gap between instructors and students.
            We believe that effective feedback is the cornerstone of quality education. Our platform enables instructors to
            gather valuable insights through customizable surveys, while providing students with an intuitive interface to
            share their thoughts and experiences.
        </p>
        <p style="font-size:1.1em;line-height:1.8;color:#333;">
            Built on WordPress, our application combines the reliability of a proven CMS with modern development practices
            to deliver a seamless survey experience for educational institutions of all sizes.
        </p>
    </div>

    <!-- Key Features Grid -->
    <div class="about-section" style="margin-bottom:48px;">
        <h2 style="color:#16203a;font-size:2em;font-weight:700;margin-bottom:24px;border-bottom:3px solid #0073aa;padding-bottom:12px;">Key Features</h2>
        <div class="features-grid" style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:24px;margin-top:24px;">

            <!-- Feature 1 -->
            <div class="feature-card" style="background:#f8f9fa;padding:24px;border-radius:10px;border-left:4px solid #0073aa;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color:#16203a;font-size:1.4em;margin-bottom:12px;font-weight:600;">🎯 Role-Based Access</h3>
                <p style="line-height:1.6;color:#555;">
                    Three distinct user roles (Administrator, Instructor, Student) with tailored interfaces and permissions for optimal workflow.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="feature-card" style="background:#f8f9fa;padding:24px;border-radius:10px;border-left:4px solid #0073aa;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color:#16203a;font-size:1.4em;margin-bottom:12px;font-weight:600;">📋 Flexible Survey Creation</h3>
                <p style="line-height:1.6;color:#555;">
                    Create surveys with multiple question types: text, radio buttons, dropdowns, multiple choice, and text areas.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="feature-card" style="background:#f8f9fa;padding:24px;border-radius:10px;border-left:4px solid #0073aa;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color:#16203a;font-size:1.4em;margin-bottom:12px;font-weight:600;">📊 Response Tracking</h3>
                <p style="line-height:1.6;color:#555;">
                    Comprehensive response management system allowing instructors to view and analyze all student submissions.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="feature-card" style="background:#f8f9fa;padding:24px;border-radius:10px;border-left:4px solid #0073aa;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color:#16203a;font-size:1.4em;margin-bottom:12px;font-weight:600;">🎨 Modern Interface</h3>
                <p style="line-height:1.6;color:#555;">
                    Clean, responsive design with intuitive navigation that works seamlessly across all devices.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="feature-card" style="background:#f8f9fa;padding:24px;border-radius:10px;border-left:4px solid #0073aa;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color:#16203a;font-size:1.4em;margin-bottom:12px;font-weight:600;">📱 Dynamic Menus</h3>
                <p style="line-height:1.6;color:#555;">
                    Smart menu system that automatically adapts based on user authentication status and role.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="feature-card" style="background:#f8f9fa;padding:24px;border-radius:10px;border-left:4px solid #0073aa;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color:#16203a;font-size:1.4em;margin-bottom:12px;font-weight:600;">📜 Survey History</h3>
                <p style="line-height:1.6;color:#555;">
                    Students can easily track and review their completed surveys, maintaining a complete response history.
                </p>
            </div>

        </div>
    </div>

    <!-- Who Is It For Section -->
    <div class="about-section" style="margin-bottom:48px;">
        <h2 style="color:#16203a;font-size:2em;font-weight:700;margin-bottom:20px;border-bottom:3px solid #0073aa;padding-bottom:12px;">Who Is It For?</h2>
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:24px;margin-top:24px;">

            <!-- For Instructors -->
            <div style="background:linear-gradient(135deg, #0073aa 0%, #005a87 100%);padding:28px;border-radius:10px;color:#fff;">
                <h3 style="color:#ffd700;font-size:1.5em;margin-bottom:16px;font-weight:600;">👨‍🏫 For Instructors</h3>
                <ul style="list-style:none;padding:0;margin:0;line-height:1.8;">
                    <li style="margin-bottom:8px;">✓ Create unlimited surveys</li>
                    <li style="margin-bottom:8px;">✓ Add custom questions</li>
                    <li style="margin-bottom:8px;">✓ View all student responses</li>
                    <li style="margin-bottom:8px;">✓ Manage survey schedules</li>
                    <li>✓ Export and analyze data</li>
                </ul>
            </div>

            <!-- For Students -->
            <div style="background:linear-gradient(135deg, #223355 0%, #16203a 100%);padding:28px;border-radius:10px;color:#fff;">
                <h3 style="color:#ffd700;font-size:1.5em;margin-bottom:16px;font-weight:600;">👨‍🎓 For Students</h3>
                <ul style="list-style:none;padding:0;margin:0;line-height:1.8;">
                    <li style="margin-bottom:8px;">✓ Browse available surveys</li>
                    <li style="margin-bottom:8px;">✓ Submit responses easily</li>
                    <li style="margin-bottom:8px;">✓ Track completed surveys</li>
                    <li style="margin-bottom:8px;">✓ Review past submissions</li>
                    <li>✓ User-friendly interface</li>
                </ul>
            </div>

            <!-- For Administrators -->
            <div style="background:linear-gradient(135deg, #16203a 0%, #0d1320 100%);padding:28px;border-radius:10px;color:#fff;">
                <h3 style="color:#ffd700;font-size:1.5em;margin-bottom:16px;font-weight:600;">⚙️ For Administrators</h3>
                <ul style="list-style:none;padding:0;margin:0;line-height:1.8;">
                    <li style="margin-bottom:8px;">✓ Full system control</li>
                    <li style="margin-bottom:8px;">✓ User management</li>
                    <li style="margin-bottom:8px;">✓ Role assignments</li>
                    <li style="margin-bottom:8px;">✓ Site configuration</li>
                    <li>✓ Complete oversight</li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Development Team Section -->
    <div class="about-section" style="margin-bottom:48px;">
        <h2 style="color:#16203a;font-size:2em;font-weight:700;margin-bottom:20px;border-bottom:3px solid #0073aa;padding-bottom:12px;">Development Team</h2>
        <div style="background:linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);padding:32px;border-radius:10px;text-align:center;">
            <p style="font-size:1.15em;line-height:1.8;color:#333;margin-bottom:20px;">
                This application is proudly developed by the <strong style="color:#16203a;">MKB Team</strong>,
                a dedicated group of developers committed to creating innovative solutions for educational institutions.
            </p>
            <p style="font-size:1.05em;line-height:1.8;color:#555;margin-bottom:20px;">
                Our team combines expertise in WordPress development, database design, and user experience
                to deliver high-quality, maintainable software solutions.
            </p>
            <div style="margin-top:24px;padding-top:24px;border-top:2px solid #d0d7e0;">
                <p style="color:#777;font-size:0.95em;">
                    <strong>Version:</strong> 1.0 | <strong>Last Updated:</strong> November 2025
                </p>
            </div>
        </div>
    </div>

    <!-- Get Started Section -->
    <div class="about-section" style="margin-bottom:0;">
        <div style="background:linear-gradient(135deg, #0073aa 0%, #005a87 100%);padding:40px;border-radius:10px;text-align:center;color:#fff;">
            <h2 style="color:#ffd700;font-size:2em;font-weight:700;margin-bottom:16px;">Ready to Get Started?</h2>
            <p style="font-size:1.15em;line-height:1.7;margin-bottom:28px;color:#e0e6f0;">
                Join hundreds of educators and students already using the Student Survey App to improve their educational experience.
            </p>
            <?php if (!is_user_logged_in()): ?>
            <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
                <a href="<?php echo esc_url(wp_registration_url()); ?>"
                   style="background:#ffd700;color:#16203a;padding:14px 32px;border-radius:8px;text-decoration:none;font-weight:700;font-size:1.1em;box-shadow:0 4px 12px rgba(0,0,0,0.15);transition:transform 0.2s;display:inline-block;">
                    Register as Student
                </a>
                <a href="<?php echo esc_url(wp_login_url()); ?>"
                   style="background:#fff;color:#16203a;padding:14px 32px;border-radius:8px;text-decoration:none;font-weight:700;font-size:1.1em;box-shadow:0 4px 12px rgba(0,0,0,0.15);transition:transform 0.2s;display:inline-block;">
                    Login
                </a>
            </div>
            <?php else: ?>
            <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
                <?php if (current_user_can('student')): ?>
                <a href="<?php echo esc_url(home_url('/survey/')); ?>"
                   style="background:#ffd700;color:#16203a;padding:14px 32px;border-radius:8px;text-decoration:none;font-weight:700;font-size:1.1em;box-shadow:0 4px 12px rgba(0,0,0,0.15);transition:transform 0.2s;display:inline-block;">
                    View Available Surveys
                </a>
                <?php endif; ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   style="background:#fff;color:#16203a;padding:14px 32px;border-radius:8px;text-decoration:none;font-weight:700;font-size:1.1em;box-shadow:0 4px 12px rgba(0,0,0,0.15);transition:transform 0.2s;display:inline-block;">
                    Go to Home
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

</div>

<style>
    /* Hover effects for CTAs */
    .about-container a[style*="background:#ffd700"]:hover,
    .about-container a[style*="background:#fff"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.2) !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .about-container {
            padding: 24px 16px !important;
            margin: 20px auto !important;
        }

        .about-hero h1 {
            font-size: 1.8em !important;
        }

        .about-section h2 {
            font-size: 1.5em !important;
        }

        .features-grid,
        .about-section > div[style*="display:grid"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<?php
get_footer();

