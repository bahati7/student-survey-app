# MKB Git Workflow Guide
This document outlines the standard Git workflow for our team(MKB). Following these steps ensures our codebase remains stable, our work is isolated, and we can collaborate effectively.

## Daily Git Workflow
This is the standard procedure for a single task or feature development, from start to finish.

### Before you start a new task:
Always ensure you have the latest code from the develop branch before starting.

    1. Switch to the develop branch:

            ```
            git checkout develop
            ```
    2. Pull the latest changes from GitHub:

            ```
                git pull origin develop
            ```
    3. Create a new feature branch for your task:
            ```
                git checkout -b feature/my-task-name
            ```
            Replace *my-task-name* with a short, descriptive name for your task (e.g., feature/*login-form* or *feature/cpt-survey*).

**While you are developing**:
As you make progress, commit your changes frequently and with clear messages.

    1. Stage all your changes:
        ```
            git add .
        ```
    2. Commit your changes with a clear message:
        ```
            git commit -m "feat: A concise description of my change"
        ```
**When your task is complete:**
Once you've finished the feature or bug fix, it's time to push your work and get it reviewed.

    1. Push your feature branch to GitHub:

        ```
        git push origin feature/my-task-name
        ```
    2. Create a Pull Request (PR): 
    Go to GitHub and create a Pull Request from your *feature/my-task-name* branch to the *develop* branch.

## Pull Requests and Code Review

- Every Pull Request must be reviewed by at least one other team member before it can be merged.

- Use the PR comments section to discuss changes, ask questions, or provide feedback.

- Once a PR is approved, it can be merged into the develop branch.

##  Clear Commit Messages
We will use a standard format for our commit messages to keep our history clean and readable.

Format: type: A concise message #issue

**Common Types**:

*feat*: A new feature is added.

*fix*: A bug is fixed.

*docs*: Documentation changes.

*style*: Code formatting changes (e.g., whitespace, semicolons).

*refactor*: Code changes that neither fix a bug nor add a feature.

*chore*: Maintenance tasks (e.g., updating build processes).

Example
```
git commit -m "feat: Add custom post type for surveys #1"
```

# Important: First Task for the Team
I have pushed the new child theme to the develop branch. Before you start working on any new features, please follow these steps to get your local environment ready:

Pull the latest changes: Open your terminal in the project directory and run ```git pull origin develop```. This will download the child theme files.

Activate the child theme: Go to your WordPress admin dashboard. Navigate to Appearance > Themes and activate the "Student Survey Child Theme".

Start coding: All of our custom code, including CSS and PHP functions, should now be placed within this child theme to avoid losing our work when the parent theme is updated.

Hey Team! Let's stick to this workflow to ensure our project stays organized and our collaboration is smooth.