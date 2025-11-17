# Student Survey App - Complete Documentation

**Version:** 1.0  
**Team:** MKB  
**Date:** October 31, 2025  
**Project:** WordPress-based Survey Application

![](.\screens\8.png)

---

## Table of Contents

1. [Introduction](#1-introduction)
2. [Quick Start (10 Minutes)](#2-quick-start-10-minutes)
3. [Prerequisites](#3-prerequisites)
4. [Detailed Installation](#4-detailed-installation)
5. [Project Structure](#5-project-structure)
6. [User Guides](#6-user-guides)
   - [Administrator Guide](#administrator-guide)
   - [Instructor Guide](#instructor-guide)
   - [Student Guide](#student-guide)
   - [How to Implement an About Page](#65-how-to-implement-an-about-page)
7. [Developer Guide](#7-developer-guide)
8. [Git Workflow](#8-git-workflow)
9. [Troubleshooting](#9-troubleshooting)
10. [FAQ](#10-faq)

---

## 1. Introduction

### What is Student Survey App?

The **Student Survey App** is a WordPress-based application that enables instructors to create custom surveys and students to respond to them. The application features:

- **Role-based access control** (Admin, Instructor, Student)
- **Dynamic menu system** that adapts to user roles
- **Custom Post Types** for Surveys and Questions
- **Modern, responsive interface**
- **Survey response tracking and history**

![](.\screens\8.png)
*Placeholder: Main application interface showing homepage*

### Key Features

✅ **For Instructors:**
- Create unlimited surveys
- Add various question types (text, radio, dropdown, multiple choice)
- View all student responses
- Manage survey dates and status

✅ **For Students:**
- View available surveys
- Submit responses easily
- Track completed surveys
- Review past answers

✅ **For Administrators:**
- Full WordPress control
- User management
- Site configuration
- Survey oversight

---

## 2. Quick Start (10 Minutes)

### Prerequisites Checklist
- [ ] Local by Flywheel downloaded and installed
- [ ] Local by Flywheel installed
- [ ] Git installed
- [ ] Repository cloned

### Installation Steps
We have provided two possibilities to set up the project in Local by Flywheel.

you can create a new site from scratch and replace the files with the ones from the repository or you can clone the repository first and then create a new site in Local by Flywheel pointing to the cloned folder.
#### Step 1: Create a new WebSite in Local by Flywheel (2 min)
1. Open Local by Flywheel.
2. Click the "+" button then choose Create a new site.
   ![](.\screens\1.png)
3. Enter **Site Name:** `student-survey-app` and click Continue.
   ![](.\screens\2.png)
4. Choose Environment: Preferred (ensure PHP 8.x, MySQL 8.x, WordPress 6.x) and click Continue.
   ![](.\screens\3.png)
   ![](.\screens\4.png)
   ![](.\screens\5.png)
5. Set WordPress admin account (username, email, secure password) and click Create Site.
   ![](.\screens\6.png)
6. Wait for provisioning to finish, then click Open Site and WP Admin to verify the site and dashboard are accessible.
   ![](.\screens\7.png)

#### Step 2: Clone the Repository (2 min)
```bash
cd C:\Users\YourName\Documents # .\Local Sites\student-survey-app
git clone https://github.com/bahati7/student-survey-app
```
![](.\screens\9.png)

#### Step 3: Create Site in Local (3 min)
1. Open Local by Flywheel
2. Click **"+"** → **"Create a new site"**
3. Site name: `student-survey-app`
4. Environment: **Preferred** (PHP 8.0+, MySQL 8.0)
5. WordPress credentials: admin / your-password
6. Click **"Add Site"**

![](.\screens\2.png)

#### Step 1*: Replace Files (2 min)
1. In Local, click **"Go to site folder"**
2. Navigate to `app/public/`
3. Delete all contents
4. Copy everything from `student-survey-app/app/public/` to this folder

![](.\screens\12.png)

#### Step 4: Configure wp-config.php (1 min)
1. In Local → **Database tab** → Note DB credentials
2. Copy `wp-config-sample.php` → `wp-config.php`
3. Edit the database connection:

```php
define( 'DB_NAME', 'local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
```

![](.\screens\13.png)

#### Step 5: Import Database (2 min)
1. In Local → Database → **"Open Adminer"**
2. Click **Import**
3. Select `app/sql/local.sql`
4. Click **Execute**

![](.\screens\14.png)

#### Step 6: Start and Test (1 min)
1. In Local, click **"Start site"**
2. Click **"Open site"**
3. Login to **WP Admin**
4. Verify theme is active

![](.\screens\15.png)

### Quick Configuration

**Activate Theme:**
1. Go to **Appearance → Themes**
2. Activate **"Student Survey Child Theme"**

![](.\screens\16.png)

**Regenerate Permalinks:**
1. Go to **Settings → Permalinks**
2. Click **"Save Changes"**

![](.\screens\17.png)

**Verify Custom Post Types:**
- Check left menu for **"Surveys"** and **"Questions"**

![](.\screens\18.png)

### Quick Test

**Create a Survey (as Admin):**
1. **Surveys → Add New**
2. Title: "Test Survey"
3. Publish

**Add a Question:**
1. **Questions → Add New**
2. Title: "How satisfied are you?"
3. Associated Survey: "Test Survey"
4. Question Type: Radio
5. Options: Very Satisfied, Satisfied, Neutral, Dissatisfied
6. Publish

**Register as Student:**
1. Log out
2. Click **User → Register as Student**
3. Create account
4. Verify menu adapts to student role

![](.\screens\19.png)

![](.\screens\20.png)

![](.\screens\21.png)

---

## 3. Prerequisites

### Required Software

#### 1. Local by Flywheel
- **Version:** 8.0+
- **Download:** [https://localwp.com/](https://localwp.com/)
- **Purpose:** Local WordPress development environment
- **OS:** Windows, macOS, Linux

#### 2. Git
- **Version:** 2.0+
- **Download:** [https://git-scm.com/](https://git-scm.com/)
- **Purpose:** Version control
- **Configuration:**
```bash
git config --global user.name "Your Name"
git config --global user.email "your.email@example.com"
```

#### 3. Code Editor (Optional but Recommended)
- **Visual Studio Code** (recommended)
- PhpStorm
- Sublime Text

### System Requirements

**Minimum:**
- OS: Windows 10, macOS 10.14, Ubuntu 18.04
- RAM: 4GB
- Disk Space: 2GB free
- Internet: For downloads and Git operations

**Recommended:**
- RAM: 8GB+
- SSD storage
- Stable internet connection

### Knowledge Requirements

**Basic:**
- WordPress basics
- Understanding of Git concepts
- File system navigation

**For Developers:**
- PHP 8.0+
- WordPress theme development
- MySQL/MariaDB
- Git workflows

---

## 4. Detailed Installation

### Step 1: Clone the GitHub Repository

#### Using Command Line

**Windows (Command Prompt):**
```cmd
cd C:\Users\YourName\Documents\Projects
git clone https://github.com/your-username/student-survey-app.git
cd student-survey-app
```

**macOS/Linux (Terminal):**
```bash
cd ~/Documents/Projects
git clone https://github.com/your-username/student-survey-app.git
cd student-survey-app
```

![Screenshot: Git Clone Command]
![](.\screens\22.png)

#### Verify Clone

```bash
dir  # Windows
ls   # macOS/Linux
```

You should see:
- `app/`
- `conf/`
- `logs/`
- `README.md`
- Other documentation files

### Step 2: Import Site into Local by Flywheel

#### Method 1: Create New Site

1. **Launch Local by Flywheel**

2. **Click "+" Button** (bottom left)

3. **Select "Create a new site"**

4. **Enter Site Details:**
   - Site Name: `student-survey-app`
   - Choose your preferred environment or use default

![](.\screens\1.png)

![](.\screens\2.png)

![](.\screens\3.png)

5. **Choose Environment:**
   - PHP Version: 8.0 or higher
   - Web Server: nginx (recommended) or Apache
   - MySQL Version: 8.0 or higher

![](.\screens\4.png)

6. **Setup WordPress:**
   - Username: `admin`
   - Password: Choose a strong password
   - Email: Your email address

![](.\screens\6.png)

7. **Click "Add Site"** and wait for setup to complete

#### Method 2: Import from Blueprint (if available)

1. Click **"+"** → **"Import"**
2. Select the project folder or .zip file
3. Follow prompts

### Step 3: Replace WordPress Files

1. **Locate Site Folder:**
   - In Local, select your site
   - Click **"Go to site folder"** or right-click → **"Reveal in Finder/Explorer"**

![](.\screens\23.png)

![](.\screens\24.png)

2. **Navigate to `app/public/`**

3. **Backup Existing Files (optional):**
   - Rename `public` folder to `public_backup`

4. **Copy Project Files:**
   - Copy all contents from your cloned `student-survey-app/app/public/`
   - Paste into Local's `app/public/` folder
   - Overwrite when prompted

![](.\screens\12.png)

### Step 4: Create wp-config.php

**Important:** This file is not in Git for security reasons.

1. **Get Database Credentials:**
   - In Local, select your site
   - Go to **Database** tab
   - Note down:
     - Database Name (usually `local`)
     - Username (usually `root`)
     - Password (usually `root`)
     - Host (usually `localhost`)

![](.\screens\13.png)

2. **Create Configuration File:**
   - Navigate to `app/public/` folder
   - Find `wp-config-sample.php`
   - Copy and rename to `wp-config.php`

3. **Edit wp-config.php:**
   - Open in a text editor
   - Update these lines:

```php
// ** Database settings ** //
define( 'DB_NAME', 'local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );

// You can also add these for debugging (remove in production)
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
```

4. **Save the file**

### Step 5: Import Database

1. **Access Adminer:**
   - In Local → Database tab
   - Click **"Open Adminer"**


2. **Login to Adminer:**
   - Credentials are pre-filled from Local
   - Click **"Login"**

3. **Import Database:**
   - Click **"Import"** in the left menu
   - Click **"Choose Files"**
   - Select `app/sql/local.sql` from your project
   - Click **"Execute"**

4. **Verify Import:**
   - You should see a success message
   - Check that tables are listed (wp_posts, wp_users, etc.)

![](.\screens\14.png)

### Step 6: Start the Site

1. **In Local, ensure site is started:**
   - Click **"Start site"** if not already running
   - Wait for all services to start (green indicators)

![](.\screens\15.png)

2. **Open Site:**
   - Click **"Open site"** to view frontend
   - Or click **"WP Admin"** to access dashboard

3. **Verify Installation:**
   - Frontend should load without errors
   - Login to admin with your credentials
   - Check that theme is active

![](.\screens\25.png)

### Step 7: Initial Configuration

#### Activate Theme

1. Go to **Appearance → Themes**
2. Activate **"Student Survey Child Theme"**
3. Verify that parent theme "Twenty Twenty Five" is present

![](.\screens\26.png)

#### Regenerate Permalinks

1. Go to **Settings → Permalinks**
2. Select **"Post name"** (recommended)
3. Click **"Save Changes"**

![](.\screens\17.png)

#### Verify Custom Post Types

1. Check left admin menu for:
   - **Surveys**
   - **Questions**

2. If not visible:
   - Go to Settings → Permalinks → Save again
   - Verify files in `wp-content/mu-plugins/` exist

![](.\screens\26.png)

#### Create Required Pages

Create these pages with their respective templates:

**1. Home Page:**
- Title: "Home"
- Template: "Home Context"
- Publish

![](.\screens\27.png)

**2. All Surveys Page:**
- Title: "All Surveys"
- Template: "All Surveys"
- Publish

**3. My Completed Surveys:**
- Title: "My Completed Surveys"
- Template: "My Completed Surveys"
- Publish

**4. Take Survey:**
- Title: "Take Survey"
- Template: "Survey Page"
- Publish

![](.\screens\27.png)

#### Add Dynamic Menu

1. Go to **Appearance → Editor**
2. Select **Header template**
3. Add a **Shortcode block**
4. Enter: `[dynamic_main_menu]`
5. Click **Save**

---

## 5. Project Structure

### Directory Tree

```
student-survey-app-main/
│
├── .git/                          # Git repository
├── .gitignore                     # Git ignore rules
├── README.md                      # Project overview
├── COMPLETE_DOCUMENTATION.md      # This file
│
├── app/
│   ├── public/                    # WordPress root
│   │   ├── wp-admin/             # WordPress admin (core)
│   │   ├── wp-includes/          # WordPress core files
│   │   ├── wp-content/           # Custom content
│   │   │   │
│   │   │   ├── mu-plugins/       # Must-Use Plugins
│   │   │   │   ├── custom-post-type-surveys.php
│   │   │   │   └── custom-post-type-questions.php
│   │   │   │
│   │   │   ├── plugins/          # Regular plugins
│   │   │   │
│   │   │   ├── themes/           # Themes
│   │   │   │   ├── twentytwentyfive/         # Parent theme
│   │   │   │   └── student-survey-child/     # Child theme (custom)
│   │   │   │       │
│   │   │   │       ├── assets/               # CSS, JS, images
│   │   │   │       │   ├── css/
│   │   │   │       │   ├── js/
│   │   │   │       │   └── screens/
│   │   │   │       │
│   │   │   │       ├── inc/                  # Modular functionality
│   │   │   │       │   ├── auth-redirect.php
│   │   │   │       │   ├── dynamic-menu.php
│   │   │   │       │   ├── enqueue.php
│   │   │   │       │   ├── roles.php
│   │   │   │       │   └── survey-responses-admin.php
│   │   │   │       │
│   │   │   │       ├── parts/                # Template parts
│   │   │   │       ├── templates/            # FSE templates
│   │   │   │       │
│   │   │   │       ├── functions.php         # Main theme file
│   │   │   │       ├── style.css             # Theme styles
│   │   │   │       ├── header.php
│   │   │   │       ├── footer.php
│   │   │   │       │
│   │   │   │       ├── page-all-surveys.php  # Template: All Surveys
│   │   │   │       ├── page-home-context.php # Template: Home Context
│   │   │   │       ├── page-my-surveys.php   # Template: My Surveys
│   │   │   │       ├── page-survey.php       # Template: Survey Page
│   │   │   │       └── single-survey.php     # Single survey view
│   │   │   │
│   │   │   └── uploads/          # User uploads (gitignored)
│   │   │
│   │   ├── wp-config.php         # WordPress config (gitignored)
│   │   ├── wp-config-sample.php  # Config template
│   │   └── index.php             # WordPress entry point
│   │
│   └── sql/
│       └── local.sql              # Database dump
│
├── conf/                          # Server configurations
│   ├── nginx/
│   ├── php/
│   └── mysql/
│
└── logs/                          # Server logs
    ├── nginx/
    ├── php/
    └── mysql/
```


### Key Files Explained

#### Theme Files

**functions.php**
- Main theme entry point
- Loads all modules from `inc/` folder

```php
<?php
// Enqueue parent theme styles
function my_theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Load modular features
require_once get_stylesheet_directory() . '/inc/enqueue.php';
require_once get_stylesheet_directory() . '/inc/roles.php';
require_once get_stylesheet_directory() . '/inc/auth-redirect.php';
require_once get_stylesheet_directory() . '/inc/dynamic-menu.php';
require_once get_stylesheet_directory() . '/inc/survey-responses-admin.php';
?>
```

**inc/roles.php**
- Defines custom user roles
- Configures role capabilities
- Handles automatic role assignment

**inc/dynamic-menu.php**
- Generates role-based menu
- Shortcode: `[dynamic_main_menu]`

**inc/auth-redirect.php**
- Handles login redirects based on role
- Manages user access control

**inc/enqueue.php**
- Loads CSS and JavaScript files
- Manages dependencies

**inc/survey-responses-admin.php**
- Admin interface for viewing responses
- Instructor dashboard features

#### Must-Use Plugins

**custom-post-type-surveys.php**
- Registers "Survey" post type
- Defines survey capabilities
- Adds meta boxes for survey details

**custom-post-type-questions.php**
- Registers "Question" post type
- Links questions to surveys
- Adds admin columns and filters

#### Page Templates

**page-home-context.php**
- Contextual homepage
- Adapts content based on user status

**page-all-surveys.php**
- Lists all available surveys
- Student-only access

**page-survey.php**
- Displays single survey
- Handles form submission

**page-my-surveys.php**
- Shows completed surveys
- Student response history

---

## 6. User Guides

### Administrator Guide

#### Dashboard Overview

As an administrator, you have full access to all WordPress features plus survey management.

#### Managing Users

**Create Instructor:**

1. Go to **Users → Add New**
2. Fill in details:
   - Username
   - Email
   - First Name / Last Name
   - Password
3. **Role:** Select **"Instructor"**
4. Click **"Add New User"**

![](.\screens\28.png)

**Create Student:**

Students can self-register, but you can also create them:

1. **Users → Add New**
2. Fill in details
3. **Role:** Select **"Student"**
4. Click **"Add New User"**

**Change User Role:**

1. **Users → All Users**
2. Click **"Edit"** under user
3. Change **"Role"** dropdown
4. Click **"Update Profile"**

![](.\screens\29.png)

#### Managing Surveys

**View All Surveys:**
- **Surveys → All Surveys**
- See surveys from all instructors
- Edit or delete any survey

**View All Questions:**
- **Questions → All Questions**
- Filter by survey
- Edit or delete questions

**View Responses:**
- Access through individual surveys
- Or via instructor tools

#### Site Configuration

**Theme Settings:**
- **Appearance → Themes**
- Keep "Student Survey Child" active

**Menu Configuration:**
- Dynamic menu is automatic via shortcode
- Custom menus can be added in **Appearance → Menus**

**Permalink Settings:**
- **Settings → Permalinks**
- Recommended: "Post name"

**General Settings:**
- **Settings → General**
- Site title, tagline, timezone

---

### Instructor Guide

#### Logging In

1. Navigate to your site URL + `/wp-admin`
2. Enter your credentials
3. You'll be redirected to the instructor dashboard

#### Dashboard Overview

After login, you'll see:
- Welcome message
- Quick links to create surveys
- Recent surveys
- Response statistics

#### Creating a Survey

**Step 1: Create the Survey**

1. Click **Surveys → Add New**

2. **Enter Survey Title:**
   - Example: "Student Satisfaction Survey Q1 2025"

3. **Add Description:**
   - Use the editor to add instructions or context
   - This appears to students when taking the survey

4. **Configure Survey Details (in meta box):**
   - Start Date
   - End Date
   - Status (Active/Inactive)

5. Click **"Publish"**

**Step 2: Add Questions**

1. Click **Questions → Add New**

2. **Enter Question Text:**
   - Title field = Question text
   - Example: "How satisfied are you with the course?"


3. **Select Associated Survey:**
   - Use the "Associated Survey" dropdown
   - Select the survey you just created


4. **Choose Question Type:**
   - **Text:** Single line input
   - **Textarea:** Multi-line input
   - **Radio:** Single choice (circles)
   - **Dropdown:** Single choice (dropdown menu)
   - **Multiple Choice:** Multiple selections allowed

5. **Add Options (for Radio/Dropdown/Multiple Choice):**
   - Enter each option on a new line
   - Example:
     ```
     Very Satisfied
     Satisfied
     Neutral
     Dissatisfied
     Very Dissatisfied
     ```

6. Click **"Publish"**

**Step 3: Repeat for All Questions**

Create as many questions as needed for your survey.

#### Question Types Examples

**Text Question:**
- "What is your student ID?"
- Single line answer

**Textarea Question:**
- "What improvements would you suggest?"
- Multiple lines for detailed feedback

**Radio Question:**
- "Rate the instructor"
- Options: Excellent, Good, Fair, Poor

**Dropdown Question:**
- "Your current year"
- Options: Freshman, Sophomore, Junior, Senior

**Multiple Choice:**
- "Which topics interest you? (Select all that apply)"
- Options: Web Development, Mobile Apps, Data Science, AI/ML

#### Viewing Survey Responses

**Method 1: Via Surveys List**

1. Go to **Surveys → All Surveys**
2. Hover over a survey
3. Click **"View Responses"** (if available)

**Method 2: Individual Survey**

1. Click to edit a survey
2. Scroll to "Survey Responses" meta box
3. View all student responses

**Response Details:**

- Student name
- Submission date
- All answers
- Option to export (if implemented)

#### Managing Your Surveys

**Edit Survey:**
1. **Surveys → All Surveys**
2. Click survey title or **"Edit"**
3. Make changes
4. Click **"Update"**

**Delete Survey:**
1. **Surveys → All Surveys**
2. Hover over survey
3. Click **"Trash"**
4. Confirm deletion

**Note:** Deleting a survey may affect linked questions

**Edit Questions:**
1. **Questions → All Questions**
2. Edit any question
3. Change text, type, or options
4. Click **"Update"**

---

### Student Guide

#### Registration

**Self-Registration:**

1. On the homepage, click **"User" → "Register as Student"**

2. Fill in the registration form:
   - Username
   - Email

3. Click **"Register"**

4. You'll automatically be assigned the "Student" role

5. You'll be logged in and see the student menu

#### Viewing Available Surveys

1. After logging in, click **"All Surveys"** in the menu


2. You'll see a list of all active surveys


3. Click on a survey to view and respond

#### Taking a Survey

**Step 1: Access Survey**

1. Click on a survey from the list
2. The survey page opens with all questions

**Step 2: Answer Questions**

- **Text fields:** Type your answer
- **Radio buttons:** Select one option
- **Dropdowns:** Choose from the menu
- **Checkboxes:** Select multiple options
- **Text areas:** Write detailed responses

**Step 3: Submit**

1. Review your answers
2. Click **"Submit"** at the bottom
3. You'll see a confirmation message

#### Viewing Completed Surveys

1. Click **"My Completed Surveys"** in the menu

2. See a list of all surveys you've completed

3. Click on any survey to review your answers


#### Student Menu Overview

**When logged in as a student, you'll see:**

- **Home:** Return to homepage
- **About:** Information about the platform
- **All Surveys:** Browse and take surveys
- **My Completed Surveys:** View your history
- **[Your Name] (dropdown):**
  - Dashboard
  - Profile
  - Logout

![](.\screens\21.png)

---

## 6.5. How to Implement an About Page

### Overview

The About page is an important component of the Student Survey App that provides information about the platform, its purpose, and how to use it. This section will guide you through creating and implementing a fully functional About page with proper styling and content.

### Step 1: Create the About Page in WordPress

#### Option A: Using WordPress Admin Interface

1. **Login to WordPress Admin**
   - Navigate to your site URL + `/wp-admin`
   - Login with administrator credentials

2. **Create a New Page**
   - Go to **Pages → Add New**
   - Title: "About"
   - Slug: "about" (WordPress will auto-generate this)

![](.\screens\30.png)

3. **Add Content**

Use the block editor to add the following content structure:

**Header Section:**
```
# About Student Survey App

Welcome to the Student Survey App, a comprehensive platform designed to streamline the survey creation and response process for educational institutions.
```

**Mission Statement:**
```
## Our Mission

The Student Survey App aims to bridge the gap between instructors and students by providing an intuitive, accessible platform for gathering feedback, conducting assessments, and improving the educational experience.
```

**Features Section:**
```
## Key Features

### For Instructors
- Create unlimited custom surveys
- Multiple question types (text, radio, dropdown, checkboxes)
- Real-time response tracking
- Comprehensive response analytics
- Export survey data

### For Students
- Easy survey access and submission
- Track completed surveys
- Review past responses
- User-friendly interface
- Mobile-responsive design

### For Administrators
- Complete system oversight
- User management
- Survey moderation
- Site configuration
```

**How It Works:**
```
## How It Works

### 1. Registration
Students can self-register through the platform. Instructors and administrators are created by system administrators.

### 2. Survey Creation
Instructors create surveys and add questions with various types:
- Text input for short answers
- Text areas for detailed responses
- Radio buttons for single-choice questions
- Dropdowns for selection lists
- Multiple choice for multi-select options

### 3. Taking Surveys
Students log in, view available surveys, and submit their responses. The system tracks completion and stores all answers securely.

### 4. Viewing Results
Instructors can view all student responses, analyze trends, and export data for further analysis.
```

**Technology Stack:**
```
## Technology Stack

- **Platform:** WordPress 6.0+
- **Language:** PHP 8.0+
- **Database:** MySQL 8.0+ / MariaDB
- **Parent Theme:** Twenty Twenty Five
- **Custom Development:** Child theme with modular architecture
```

**Getting Started:**
```
## Getting Started

### For Students
1. Click "Register as Student" in the User menu
2. Complete the registration form
3. Login with your credentials
4. Navigate to "All Surveys" to view available surveys
5. Click on any survey to respond
6. View your completed surveys in "My Completed Surveys"

### For Instructors
1. Contact your administrator for an instructor account
2. Login to WordPress admin
3. Navigate to Surveys → Add New
4. Create your survey and add questions
5. View responses in the Survey dashboard

### For Administrators
1. Login to WordPress admin
2. Manage users, surveys, and site settings
3. Monitor system activity
4. Configure site-wide options
```

**Contact Section:**
```
## Contact & Support

For technical support, feature requests, or bug reports:
- **GitHub:** [Repository Link]
- **Email:** support@yourdomain.com
- **Documentation:** [Link to full documentation]
```

4. **Publish the Page**
   - Click **"Publish"** button
   - Verify the page is live by clicking "View Page"

#### Option B: Using Custom Page Template (Advanced)

For more control over the design and layout, create a custom page template.

### Step 2: Create a Custom About Page Template (Optional)

If you want more design control, create a custom template file:

1. **Create Template File**

Navigate to: `wp-content/themes/student-survey-child/`

Create a new file: `page-about.php`

```php
<?php
/**
 * Template Name: About Page
 * Description: Custom template for the About page
 */

get_header();
?>

<div class="about-page-container">
    <div class="about-header">
        <h1><?php the_title(); ?></h1>
    </div>

    <div class="about-content">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <div class="about-main-content">
                <?php the_content(); ?>
            </div>

            <!-- Mission Section -->
            <section class="about-section mission-section">
                <h2>Our Mission</h2>
                <p>The Student Survey App aims to bridge the gap between instructors and students by providing an intuitive, accessible platform for gathering feedback, conducting assessments, and improving the educational experience.</p>
            </section>

            <!-- Features Section -->
            <section class="about-section features-section">
                <h2>Key Features</h2>
                <div class="features-grid">
                    <div class="feature-box">
                        <h3>👨‍🏫 For Instructors</h3>
                        <ul>
                            <li>Create unlimited custom surveys</li>
                            <li>Multiple question types</li>
                            <li>Real-time response tracking</li>
                            <li>Comprehensive analytics</li>
                            <li>Export survey data</li>
                        </ul>
                    </div>
                    
                    <div class="feature-box">
                        <h3>👨‍🎓 For Students</h3>
                        <ul>
                            <li>Easy survey access</li>
                            <li>Track completed surveys</li>
                            <li>Review past responses</li>
                            <li>User-friendly interface</li>
                            <li>Mobile-responsive design</li>
                        </ul>
                    </div>
                    
                    <div class="feature-box">
                        <h3>⚙️ For Administrators</h3>
                        <ul>
                            <li>Complete system oversight</li>
                            <li>User management</li>
                            <li>Survey moderation</li>
                            <li>Site configuration</li>
                            <li>Analytics dashboard</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- How It Works Section -->
            <section class="about-section how-it-works-section">
                <h2>How It Works</h2>
                <div class="steps-container">
                    <div class="step">
                        <div class="step-number">1</div>
                        <h3>Registration</h3>
                        <p>Students self-register through the platform. Instructors are created by administrators.</p>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <h3>Survey Creation</h3>
                        <p>Instructors create surveys with various question types to gather specific feedback.</p>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <h3>Taking Surveys</h3>
                        <p>Students log in, view available surveys, and submit their responses securely.</p>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <h3>Viewing Results</h3>
                        <p>Instructors analyze responses and export data for further insights.</p>
                    </div>
                </div>
            </section>

            <!-- Technology Stack Section -->
            <section class="about-section tech-stack-section">
                <h2>Technology Stack</h2>
                <div class="tech-list">
                    <div class="tech-item">
                        <strong>Platform:</strong> WordPress 6.0+
                    </div>
                    <div class="tech-item">
                        <strong>Language:</strong> PHP 8.0+
                    </div>
                    <div class="tech-item">
                        <strong>Database:</strong> MySQL 8.0+ / MariaDB
                    </div>
                    <div class="tech-item">
                        <strong>Parent Theme:</strong> Twenty Twenty Five
                    </div>
                    <div class="tech-item">
                        <strong>Architecture:</strong> Custom child theme with modular design
                    </div>
                </div>
            </section>

            <!-- Getting Started Section -->
            <section class="about-section getting-started-section">
                <h2>Getting Started</h2>
                <div class="role-instructions">
                    <div class="role-box">
                        <h3>Students</h3>
                        <ol>
                            <li>Click "Register as Student"</li>
                            <li>Complete registration form</li>
                            <li>Login with credentials</li>
                            <li>Browse available surveys</li>
                            <li>Submit responses</li>
                        </ol>
                    </div>
                    <div class="role-box">
                        <h3>Instructors</h3>
                        <ol>
                            <li>Request instructor account</li>
                            <li>Login to WordPress admin</li>
                            <li>Create surveys</li>
                            <li>Add questions</li>
                            <li>View responses</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section class="about-section contact-section">
                <h2>Contact & Support</h2>
                <p>For technical support, feature requests, or bug reports:</p>
                <div class="contact-info">
                    <p><strong>GitHub:</strong> <a href="https://github.com/bahati7/student-survey-app" target="_blank">Repository Link</a></p>
                    <p><strong>Documentation:</strong> <a href="<?php echo esc_url(home_url('/documentation/')); ?>">Complete Documentation</a></p>
                    <p><strong>Team:</strong> MKB Development Team</p>
                </div>
            </section>

        <?php
        endwhile;
        ?>
    </div>
</div>

<?php
get_footer();
?>
```

2. **Create Stylesheet for About Page**

Add to `wp-content/themes/student-survey-child/assets/css/about-page.css`:

```css
/* About Page Styles */
.about-page-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

.about-header {
    text-align: center;
    margin-bottom: 60px;
    padding-bottom: 30px;
    border-bottom: 3px solid #0073aa;
}

.about-header h1 {
    font-size: 3em;
    color: #0073aa;
    margin-bottom: 20px;
}

.about-content {
    font-size: 1.1em;
    line-height: 1.8;
}

.about-section {
    margin: 60px 0;
    padding: 40px;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.about-section h2 {
    font-size: 2.2em;
    color: #333;
    margin-bottom: 30px;
    text-align: center;
}

/* Mission Section */
.mission-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.mission-section p {
    font-size: 1.3em;
    text-align: center;
    line-height: 1.8;
}

/* Features Section */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.feature-box {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.feature-box h3 {
    font-size: 1.5em;
    margin-bottom: 20px;
    color: #0073aa;
}

.feature-box ul {
    list-style: none;
    padding: 0;
}

.feature-box ul li {
    padding: 8px 0;
    padding-left: 25px;
    position: relative;
}

.feature-box ul li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #46b450;
    font-weight: bold;
}

/* How It Works Section */
.steps-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.step {
    text-align: center;
    padding: 30px;
    background: white;
    border-radius: 10px;
    position: relative;
}

.step-number {
    width: 60px;
    height: 60px;
    background: #0073aa;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2em;
    font-weight: bold;
    margin: 0 auto 20px;
}

.step h3 {
    font-size: 1.4em;
    margin-bottom: 15px;
    color: #333;
}

.step p {
    color: #666;
    line-height: 1.6;
}

/* Technology Stack Section */
.tech-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 30px;
}

.tech-item {
    background: white;
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid #0073aa;
}

.tech-item strong {
    color: #0073aa;
    display: block;
    margin-bottom: 5px;
}

/* Getting Started Section */
.role-instructions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.role-box {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.role-box h3 {
    font-size: 1.6em;
    color: #0073aa;
    margin-bottom: 20px;
}

.role-box ol {
    padding-left: 20px;
}

.role-box ol li {
    padding: 10px 0;
    line-height: 1.6;
}

/* Contact Section */
.contact-section {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    text-align: center;
}

.contact-info {
    margin-top: 30px;
    font-size: 1.1em;
}

.contact-info p {
    margin: 15px 0;
}

.contact-info a {
    color: white;
    text-decoration: underline;
    font-weight: bold;
}

.contact-info a:hover {
    color: #fff;
    opacity: 0.8;
}

/* Responsive Design */
@media (max-width: 768px) {
    .about-header h1 {
        font-size: 2em;
    }
    
    .about-section {
        padding: 20px;
        margin: 30px 0;
    }
    
    .features-grid,
    .steps-container,
    .tech-list,
    .role-instructions {
        grid-template-columns: 1fr;
    }
}
```

3. **Enqueue the Stylesheet**

Add to `wp-content/themes/student-survey-child/inc/enqueue.php`:

```php
// Enqueue About Page Styles
function enqueue_about_page_styles() {
    if (is_page('about')) {
        wp_enqueue_style(
            'about-page-style',
            get_stylesheet_directory_uri() . '/assets/css/about-page.css',
            array(),
            '1.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_about_page_styles');
```

### Step 3: Assign the Template to Your About Page

1. **Edit the About Page**
   - Go to **Pages → All Pages**
   - Click on "About" page

2. **Select Template**
   - In the right sidebar, find "Page Attributes" or "Template"
   - Select "About Page" from dropdown
   - Click **"Update"**

![Assigning Template](.\screens\27.png)

### Step 4: Add About Link to Menu

The About link is already included in the dynamic menu via `inc/dynamic-menu.php`:

```php
// About link (visible to all users)
$menu[] = '<a href="' . esc_url(home_url('/about/')) . '">About</a>';
```

**Verify the menu includes:**
- Home
- About
- Other role-specific links

### Step 5: Test the About Page

1. **View as Guest User**
   - Open incognito/private browser window
   - Navigate to your site
   - Click "About" in the menu
   - Verify content displays correctly

2. **View as Logged-in Student**
   - Login as a student
   - Click "About" in menu
   - Verify page is accessible

3. **View as Instructor**
   - Login as instructor
   - Verify About page accessibility

4. **Check Responsive Design**
   - Resize browser window
   - Test on mobile device
   - Verify layout adapts properly

### Step 6: Customize Content (Optional)

You can further customize the About page with:

**Additional Images:**
```php
<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-hero.jpg" alt="About Us">
```

**Video Embed:**
```php
<div class="video-container">
    <iframe width="560" height="315" 
            src="https://www.youtube.com/embed/VIDEO_ID" 
            frameborder="0" 
            allowfullscreen>
    </iframe>
</div>
```

**Team Members Section:**
```php
<section class="team-section">
    <h2>Meet the Team</h2>
    <div class="team-grid">
        <div class="team-member">
            <img src="path/to/photo.jpg" alt="Team Member">
            <h3>John Doe</h3>
            <p>Lead Developer</p>
        </div>
        <!-- Add more team members -->
    </div>
</section>
```

### Step 7: SEO Optimization

Install and configure an SEO plugin (like Yoast SEO):

1. **Install Yoast SEO**
   - **Plugins → Add New**
   - Search "Yoast SEO"
   - Install and activate

2. **Configure About Page SEO**
   - Edit About page
   - Scroll to Yoast SEO section
   - Add:
     - Focus keyphrase: "Student Survey App"
     - Meta description
     - Social media preview

### Step 8: Analytics (Optional)

Track About page visits:

1. **Add Google Analytics**
2. **Track Events**
3. **Monitor Page Views**

### Troubleshooting

**About Page Shows 404:**
- Go to **Settings → Permalinks** → Click "Save"
- Clear browser cache

**Template Not Available:**
- Verify `page-about.php` exists in theme folder
- Check template header comment is correct
- Refresh page in admin

**CSS Not Loading:**
- Clear browser cache (Ctrl+F5)
- Verify file path in enqueue.php
- Check file permissions

**Menu Link Missing:**
- Verify `inc/dynamic-menu.php` includes About link
- Clear any caching plugins
- Check theme is active

### Maintenance

**Regular Updates:**
- Keep content current
- Update contact information
- Refresh screenshots
- Add new features as they're developed

**Backup:**
- Save template files to Git repository
- Document any customizations
- Keep version history

---

## 7. Developer Guide

### Technical Stack

- **CMS:** WordPress 6.0+
- **PHP:** 8.0+
- **Database:** MySQL 8.0+ / MariaDB
- **Parent Theme:** Twenty Twenty Five
- **Local Environment:** Local by Flywheel


### Code Architecture

#### Theme Structure

The child theme follows a modular architecture:

```
student-survey-child/
├── functions.php       # Entry point, loads modules
├── style.css          # Theme styles
├── inc/               # Modular functionality
│   ├── roles.php
│   ├── dynamic-menu.php
│   ├── auth-redirect.php
│   ├── enqueue.php
│   └── survey-responses-admin.php
├── page-*.php         # Page templates
└── assets/            # Static resources
```

#### Module System

**inc/roles.php** - Custom Roles

```php
<?php
// Register custom roles on init
add_action('init', function() {
    // Student role
    if (!get_role('student')) {
        add_role('student', 'Student', array(
            'read' => true,
            'edit_posts' => false,
            'edit_surveys' => false,
            'manage_users' => false,
        ));
    }
    
    // Instructor role
    if (!get_role('instructor')) {
        add_role('instructor', 'Instructor', array(
            'read' => true,
            'edit_posts' => true,
            'edit_surveys' => true,
            'manage_classes' => true,
            'manage_users' => false,
        ));
    }
});

// Automatically assign Student role on registration
add_action('user_register', function($user_id) {
    $user = new WP_User($user_id);
    if ($user) {
        $user->set_role('student');
    }
});

// Enable public registration
add_action('init', function() {
    if (get_option('users_can_register') != 1) {
        update_option('users_can_register', 1);
    }
});
```

**inc/dynamic-menu.php** - Dynamic Menu

```php
<?php
// Dynamic menu shortcode
add_shortcode('dynamic_main_menu', function() {
    $menu = array();
    
    // Home link
    $menu[] = '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    $menu[] = '<a href="' . esc_url(home_url('/about/')) . '">About</a>';
    
    if(is_user_logged_in() && current_user_can('student')) {
        // Student links
        $menu[] = '<a href="' . esc_url(home_url('/survey/')) . '">All Surveys</a>';
        $menu[] = '<a href="' . esc_url(home_url('/my-surveys/')) . '">My Completed Surveys</a>';
    }
    
    if (!is_user_logged_in()) {
        // Guest links
        $menu[] = '<div class="dynamic-menu-dropdown">'
            . '<a href="#">User</a>'
            . '<div class="dynamic-menu-dropdown-content">'
            . '<a href="' . esc_url(wp_login_url()) . '">Login</a>'
            . '<a href="' . esc_url(wp_registration_url()) . '">Register as Student</a>'
            . '</div></div>';
    } else {
        // Logged in user dropdown
        $user = wp_get_current_user();
        $dashboard = home_url('/dashboard/');
        
        if (in_array('administrator', $user->roles)) {
            $dashboard = admin_url();
        } elseif (in_array('instructor', $user->roles)) {
            $dashboard = admin_url();
        }
        
        $menu[] = '<div class="dynamic-menu-dropdown">'
            . '<a href="#">' . esc_html($user->display_name) . '</a>'
            . '<div class="dynamic-menu-dropdown-content">'
            . '<a href="' . esc_url($dashboard) . '">Dashboard</a>'
            . '<a href="' . esc_url(get_edit_profile_url()) . '">Profile</a>'
            . '<a href="' . esc_url(wp_logout_url(home_url())) . '">Logout</a>'
            . '</div></div>';
    }
    
    return '<nav class="dynamic-menu">' . implode('', $menu) . '</nav>';
});
```

**inc/auth-redirect.php** - Login Redirects

```php
<?php
// Redirect users after login based on role
add_filter('login_redirect', function($redirect_to, $request, $user) {
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('administrator', $user->roles)) {
            return admin_url();
        } elseif (in_array('instructor', $user->roles)) {
            return admin_url();
        } elseif (in_array('student', $user->roles)) {
            return home_url('/');
        }
    }
    return $redirect_to;
}, 10, 3);
```

### Custom Post Types

#### Survey CPT

**File:** `wp-content/mu-plugins/custom-post-type-surveys.php`

```php
<?php
function register_survey_cpt() {
    $args = array(
        'labels' => array(
            'name' => 'Surveys',
            'singular_name' => 'Survey',
            // ... other labels
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
        'capability_type' => 'survey',
        'map_meta_cap' => true,
        'menu_icon' => 'dashicons-list-view',
        'rewrite' => array('slug' => 'survey'),
    );
    
    register_post_type('survey', $args);
}
add_action('init', 'register_survey_cpt');

// Add capabilities to roles
function add_survey_caps() {
    $roles = array('administrator', 'instructor');
    
    foreach ($roles as $the_role) {
        $role = get_role($the_role);
        if ($role) {
            $role->add_cap('edit_survey');
            $role->add_cap('read_survey');
            $role->add_cap('delete_survey');
            $role->add_cap('edit_surveys');
            $role->add_cap('edit_others_surveys');
            $role->add_cap('publish_surveys');
            $role->add_cap('read_private_surveys');
        }
    }
}
add_action('admin_init', 'add_survey_caps');
```

**Survey Metadata:**
- `_survey_start_date`: Start date
- `_survey_end_date`: End date
- `_survey_status`: Active/Inactive

#### Question CPT

**File:** `wp-content/mu-plugins/custom-post-type-questions.php`

```php
<?php
function register_question_cpt() {
    $args = array(
        'labels' => array(
            'name' => 'Questions',
            'singular_name' => 'Question',
            // ... other labels
        ),
        'public' => false,
        'show_ui' => true,
        'capability_type' => 'question',
        'map_meta_cap' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-editor-help',
    );
    
    register_post_type('question', $args);
}
add_action('init', 'register_question_cpt');
```

**Question Metadata:**
- `_question_parent_survey`: Survey ID (relationship)
- `_question_type`: text, textarea, radio, dropdown, multiple_choice
- `_question_options`: Array of options for select-type questions

**Relationship:**
```
Survey (1) ←→ (N) Questions
```

### Database Schema

#### wp_posts Table

Stores surveys, questions, and standard WordPress content.

**Key columns:**
- `ID`: Primary key
- `post_author`: User ID of creator
- `post_type`: 'survey', 'question', 'page', etc.
- `post_status`: 'publish', 'draft', etc.
- `post_title`: Title
- `post_content`: Content/description

#### wp_postmeta Table

Stores metadata for posts.

**Survey metadata:**
```sql
meta_key = '_survey_start_date'
meta_key = '_survey_end_date'
meta_key = '_survey_status'
```

**Question metadata:**
```sql
meta_key = '_question_parent_survey'  -- Survey ID
meta_key = '_question_type'           -- text, radio, etc.
meta_key = '_question_options'        -- Serialized array
```

**Response metadata:**
```sql
meta_key = 'student_answer_{user_id}'
```

#### Useful Queries

**Get all surveys:**
```sql
SELECT * FROM wp_posts 
WHERE post_type = 'survey' 
AND post_status = 'publish';
```

**Get questions for a survey:**
```sql
SELECT p.* FROM wp_posts p
INNER JOIN wp_postmeta pm ON p.ID = pm.post_id
WHERE p.post_type = 'question'
AND pm.meta_key = '_question_parent_survey'
AND pm.meta_value = '123';  -- Survey ID
```

**Get all students:**
```sql
SELECT u.* FROM wp_users u
INNER JOIN wp_usermeta um ON u.ID = um.user_id
WHERE um.meta_key = 'wp_capabilities'
AND um.meta_value LIKE '%student%';
```

### WordPress Hooks Used

**Actions:**
```php
add_action('init', 'register_custom_roles');
add_action('init', 'register_survey_cpt');
add_action('admin_init', 'add_survey_caps');
add_action('user_register', 'assign_student_role');
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
```

**Filters:**
```php
add_filter('login_redirect', 'custom_login_redirect', 10, 3);
add_filter('manage_question_posts_columns', 'set_question_columns');
```

**Shortcodes:**
```php
add_shortcode('dynamic_main_menu', 'render_dynamic_menu');
```

### Security Practices

**Input Sanitization:**
```php
$survey_id = isset($_GET['survey_id']) ? intval($_GET['survey_id']) : 0;
$answer = sanitize_text_field($_POST['answer']);
```

**Output Escaping:**
```php
echo esc_html($survey_title);
echo esc_url($survey_link);
echo esc_attr($survey_id);
```

**Nonces:**
```php
// Generate
wp_nonce_field('submit_survey_action', 'submit_survey_nonce');

// Verify
if (!wp_verify_nonce($_POST['submit_survey_nonce'], 'submit_survey_action')) {
    die('Security check failed');
}
```

**Capability Checks:**
```php
if (!current_user_can('student')) {
    wp_die('You do not have permission');
}
```

### Adding New Features

**Example: Add Survey Export**

1. Create new file: `inc/survey-export.php`

2. Add export function:
```php
<?php
function export_survey_responses($survey_id) {
    // Check permissions
    if (!current_user_can('edit_surveys')) {
        return false;
    }
    
    // Get questions
    $questions = get_posts(array(
        'post_type' => 'question',
        'meta_key' => '_question_parent_survey',
        'meta_value' => $survey_id,
        'posts_per_page' => -1
    ));
    
    // Get all responses
    // Format as CSV
    // Output for download
}
```

3. Add to functions.php:
```php
require_once get_stylesheet_directory() . '/inc/survey-export.php';
```

4. Add button in admin interface

### Testing

**Manual Testing Checklist:**
- [ ] Survey creation
- [ ] Question creation (all types)
- [ ] Student registration
- [ ] Survey submission
- [ ] Response viewing
- [ ] Role-based access
- [ ] Menu adaptation
- [ ] Login redirects
---

## 8. Git Workflow

### Branch Structure

- **main:** Production-ready code
- **develop:** Integration branch for features
- **feature/[name]:** Individual feature branches

### Daily Workflow

#### Before Starting Work

```bash
# Switch to develop
git checkout develop

# Get latest changes
git pull origin develop

# Create feature branch
git checkout -b feature/my-feature-name
```

#### During Development

```bash
# Stage changes
git add .

# Commit with clear message
git commit -m "feat: Add survey export functionality"
```

**Commit Message Conventions:**
- `feat:` New feature
- `fix:` Bug fix
- `docs:` Documentation
- `style:` Formatting, CSS
- `refactor:` Code restructuring
- `test:` Adding tests
- `chore:` Maintenance

#### When Feature is Complete

```bash
# Push to GitHub
git push origin feature/my-feature-name
```

### Pull Requests

1. Go to GitHub repository
2. Click **"Compare & pull request"**
3. Base branch: `develop`
4. Compare branch: `feature/my-feature-name`
5. Add description:
   - What changed
   - Why it changed
   - How to test
6. Request review from team member
7. Wait for approval
8. Merge when approved


### Resolving Conflicts

```bash
# Update develop
git checkout develop
git pull origin develop

# Merge into your branch
git checkout feature/your-branch
git merge develop

# Resolve conflicts in editor
# Then:
git add .
git commit -m "fix: Resolve merge conflicts"
git push origin feature/your-branch
```

### Useful Git Commands

```bash
# View status
git status

# View commit history
git log --oneline

# Undo uncommitted changes
git checkout -- filename

# View branches
git branch

# Delete local branch
git branch -d feature/branch-name

# View differences
git diff

# Stash changes temporarily
git stash
git stash pop
```

---

## 9. Troubleshooting

### Common Issues and Solutions

#### 1. Database Connection Error

**Error Message:** "Error establishing a database connection"

**Causes:**
- Incorrect wp-config.php credentials
- Database not running
- Wrong database host

**Solutions:**

1. **Verify wp-config.php:**
   - Open `app/public/wp-config.php`
   - Check DB_NAME, DB_USER, DB_PASSWORD, DB_HOST
   - Compare with Local's Database tab

2. **Restart Site in Local:**
   - Click "Stop site"
   - Wait a few seconds
   - Click "Start site"

3. **Check Database Service:**
   - In Local, verify MySQL is running (green indicator)

#### 2. Dynamic Menu Not Showing

**Symptoms:**
- Menu not visible on site
- Shortcode appears as text

**Solutions:**

1. **Verify Shortcode:**
   - Go to **Appearance → Editor**
   - Open Header template
   - Check for Shortcode block with `[dynamic_main_menu]`

2. **Verify Theme Active:**
   - **Appearance → Themes**
   - "Student Survey Child" should be active

3. **Clear Cache:**
   - In Local, click "Stop site" → "Start site"
   - Clear browser cache (Ctrl+F5)

#### 3. Custom Post Types Missing

**Symptoms:**
- "Surveys" and "Questions" not in admin menu

**Solutions:**

1. **Verify mu-plugins:**
   - Check files exist in `wp-content/mu-plugins/`:
     - `custom-post-type-surveys.php`
     - `custom-post-type-questions.php`

2. **Regenerate Permalinks:**
   - **Settings → Permalinks**
   - Click "Save Changes" (don't change anything)

3. **Check File Permissions:**
   - Ensure files are readable by web server

#### 4. Cannot Login as Admin

**Causes:**
- Forgotten password
- Database not imported
- User doesn't exist

**Solutions:**

**Option 1: Reset via Adminer**
1. Local → Database → Open Adminer
2. Select `wp_users` table
3. Find admin user
4. Click "edit"
5. Set `user_pass` to MD5 hash of new password
6. Save

**Option 2: Reimport Database**
1. Local → Database → Open Adminer
2. Import → Select `app/sql/local.sql`
3. Execute
4. Try default credentials from import

**Option 3: WP-CLI**
```bash
wp user update admin --user_pass=newpassword
```

#### 5. 404 Errors on Survey Pages

**Symptoms:**
- Survey links return 404 Not Found
- Pages exist but not accessible

**Solutions:**

1. **Flush Permalinks:**
   - **Settings → Permalinks** → Save

2. **Verify Page Templates:**
   - Check pages have correct templates assigned
   - Re-save pages

3. **Check .htaccess:**
   - Ensure `.htaccess` file exists in `app/public/`
   - Should contain WordPress rewrite rules

#### 6. CSS Styles Not Applied

**Symptoms:**
- Site looks unstyled
- Custom styles missing

**Solutions:**

1. **Clear Browser Cache:**
   - Press Ctrl+F5 (Windows) or Cmd+Shift+R (Mac)

2. **Verify style.css:**
   - Check file exists at `wp-content/themes/student-survey-child/style.css`
   - Check file is not empty

3. **Check Enqueue:**
   - Verify `inc/enqueue.php` is loaded
   - Check browser DevTools for CSS loading

4. **Disable Other Plugins:**
   - Temporary disable plugins that might conflict

#### 7. Git Clone Fails

**Error Messages:**
- "Permission denied"
- "Repository not found"

**Solutions:**

1. **Verify Repository Access:**
   - Check you have permissions on GitHub
   - Repository must be accessible

2. **Configure Git:**
```bash
git config --global user.name "Your Name"
git config --global user.email "your.email@example.com"
```

3. **Use HTTPS with Token:**
   - Generate personal access token on GitHub
   - Use as password when cloning

4. **Check Internet Connection:**
   - Ensure stable connection
   - Try different network

#### 8. Local Won't Start Site

**Symptoms:**
- Site stuck on "Starting"
- Services won't start
- Red indicators

**Solutions:**

1. **Close Other Servers:**
   - Stop XAMPP, WAMP, MAMP if running
   - These conflict with Local

2. **Restart Local:**
   - Completely quit Local
   - Restart application

3. **Change Ports:**
   - Right-click site → "Change ports"
   - Use different port numbers

4. **Check System Resources:**
   - Ensure enough RAM available
   - Close unnecessary applications

5. **Reinstall Local:**
   - Backup your sites first
   - Uninstall and reinstall Local

### Logs Location

**PHP Errors:**
- `logs/php/error.log`

**Nginx Errors:**
- `logs/nginx/error.log`

**MySQL Errors:**
- `logs/mysql/error.log`


**Create GitHub Issue:**
- Use provided issue template
- Include error messages
- Describe steps to reproduce
- Attach screenshots

---

## Conclusion

You now have complete documentation for the Student Survey App, covering:

✅ **Installation:** From clone to running site in 10 minutes  
✅ **Configuration:** WordPress setup and customization  
✅ **Usage:** Guides for all user roles  
✅ **Development:** Code architecture and best practices  
✅ **Collaboration:** Git workflow for teams  
✅ **Support:** Troubleshooting and FAQ

### Contributing

We welcome contributions! To contribute:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request
5. Follow the Git Workflow guidelines

### Support and Contact

- **Documentation Issues:** Create a GitHub issue
- **Bug Reports:** Use the issue template
- **Feature Requests:** Submit via GitHub issues
- **Team Contact:** Reach out to MKB team maintainers

---

**Thank you for using Student Survey App!** 🎓

Happy surveying! 🚀📊✨

