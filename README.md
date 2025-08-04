# Student Survey Application - Local Setup Guide
Welcome to the MKB team! This document provides a step-by-step guide for setting up your local development environment to work on the Student Survey Application project.

## Prerequisites
Before you begin, please ensure you have the following installed on your machine:

Local by Flywheel: [A simple and powerful local development tool for WordPress](https://localwp.com/)

Git: [version control system used to manage our codebase.](https://git-scm.com/)

## Team Member Setup Instructions
Once the project repository has been shared with you, follow these steps to clone the project and get it running locally.

### Step 1: Clone the GitHub Repository
Open your terminal or command prompt.

Navigate to the directory where you store your projects.

Go to the project page on GitHub, click on the "Code" button, and copy the HTTPS URL.

In your terminal, use the git clone command with the copied URL to download the project files:

git clone https://github.com/your-username/student-survey-app.git

### Step 2: Import the Site into Local by Flywheel
Open Local by Flywheel.

Click the "+" button on the bottom left to "Add a local site."

Choose the option to "Import site from a folder," or, in many cases, you can simply drag the student-survey-app folder you just cloned directly into the Local application window.

Local will now configure a new site instance using the project's files.

### Step 3: Create the wp-config.php File
Since the wp-config.php file is ignored by Git for security reasons, each team member must create their own.

In your file explorer, navigate to the root directory of the student-survey-app project.

Open the site in Local by Flywheel and go to the "Database" tab. Copy the database name, username, and password.

In the project folder, locate the file named wp-config-sample.php.

Copy the content of wp-config-sample.php and create a new file in the same directory named wp-config.php.

In the new wp-config.php file, update the following lines with the database credentials you copied from Local:

```
define('DB_NAME', 'your_local_db_name');
define('DB_USER', 'your_local_db_user');
define('DB_PASSWORD', 'your_local_db_password');
define('DB_HOST', 'localhost');
```

### Step 4: Start the Site and Verify Installation
Back in Local by Flywheel, click the "Start Site" button for the student-survey-app project.

Click "Open Site" to view the live website or "Admin" to access the WordPress dashboard.

Your local environment is now set up and ready. You should have a fully functional WordPress site running with our project files.

Happy coding! :joy:
