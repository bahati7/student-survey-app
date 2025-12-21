# Student Survey App : Setup & Contributor Guide

---

## Table of Contents

1. [Introduction](#introduction)
2. [Project Scope & Overview](#project-scope--overview)
3. [Quick Start (10 Minutes)](#quick-start-10-minutes)
4. [Prerequisites](#prerequisites)
5. [Detailed Installation](#detailed-installation)
6. [Project Structure](#project-structure)
7. [User Guides](#user-guides)

   * [Administrator Guide](#administrator-guide)
   * [Instructor Guide](#instructor-guide)
   * [Student Guide](#student-guide)
8. [Developer Guide](#developer-guide)
9. [Git Workflow](#git-workflow)
10. [Troubleshooting](#troubleshooting)
11. [Conclusion & Support](#conclusion--support)

---

## Introduction

Welcome to the Student Survey App, a WordPress-based survey application designed to empower instructors to create surveys and enable students to respond easily.
This project was developed by students of MichaelKentBurns.com as part of a practical, collaborative learning experience, and it is intended to be used as a survey and feedback tool for students of  MichaelKentBurns.com.

This guide explains how to set up the project locally, how the codebase is structured, and how different roles (Administrator, Instructor, Student) interact with the system. It also serves as an onboarding reference for new contributors and reviewers involved in testing, documentation, and quality assurance.


---

## Project Scope & Overview

**Important:**
This repository does **not** contain a full WordPress site or a backup that can be imported directly into Local by Flywheel.
It contains the **Student Survey App** as a **WordPress custom theme** that must be integrated into an existing WordPress installation.

### What This Repository Contains

* A custom WordPress child theme (`student-survey-child`)
* Modular code under `inc/` for features such as roles, authentication, dynamic menu, and survey responses
* Must-use plugins for Surveys and Questions CPT
* Documentation and SQL schema for initial data

### What This Repository Does *Not* Contain

* Full WordPress core files (except sample directories)
* A complete Local importable site package
* A working database unless imported manually

### Expected Outcome

To run this project locally, you will:

1. Create a fresh WordPress site (e.g., in Local by Flywheel)
2. Add the Student Survey App theme to the site
3. Activate the theme
4. Import the provided database (optional but recommended)
5. Proceed with testing or development

---

## Quick Start

### Checklist

Ensure you have:

* Local by Flywheel (or similar local WP environment)
* Git installed
* A cloned repository
* A working WordPress site

### Quick Setup Steps

1. **Create a new site in Local by Flywheel**
2. **Clone this repository**
3. **Copy theme files into WordPress theme folder**
4. **Activate the theme**
5. **Regenerate permalinks**
6. **Verify Custom Post Types (Surveys, Questions)**

Make sure the theme is active and no errors appear on site load.

---

## Prerequisites

### Required Software

* **Local by Flywheel**, for local WordPress sites
* **Git**,for version control
* **Code Editor** (VS Code, PhpStorm, etc.)

### System Requirements

Minimum:

* RAM: 4GB
* Disk: 2GB free
* OS: Windows / macOS / Linux

Recommended:

* RAM: 8GB+
* PHP 8.0+
* WordPress 6.x
* MySQL 8.x / MariaDB

---

## Detailed Installation

### Step 1: Clone the Repo

```bash
git clone https://github.com/bahati7/student-survey-app.git
cd student-survey-app
```

### Step 2: Create a WordPress Site

Use Local by Flywheel to create a new WordPress site with default environment settings.

### Step 3: Replace WordPress Files

1. In Local, go to site folder `app/public/`
2. Delete default WordPress files
3. Copy contents from your local clone into `app/public/`

### Step 4: Create `wp-config.php`

Copy `wp-config-sample.php` to `wp-config.php` and update database credentials from Local.

### Step 5: Import Database (optional but recommended)

Use Adminer in Local to import `app/sql/local.sql`.

### Step 6: Start the Site and Verify

* Start the site in Local
* Open WP Admin and verify everything is working

### Step 7: Activate Theme & Permalinks

* Activate `Student Survey Child Theme`
* Go to Settings -> Permalinks -> Save

---

## Project Structure

```
student-survey-app-main/
├── app/public/                   # WordPress root for Local environment
│   ├── wp-content/
│   │   ├── mu-plugins/           # CPT definitions
│   │   ├── themes/
│   │   │   └── student-survey-child/   # Main theme
├── conf/                         # Server configs
├── logs/                         # Server logs
├── README.md                     # Project overview
└── COMPLETE_DOCUMENTATION.md     # Full doc (develop)
```

### Key Folders

* `inc/` : Modular theme code
* `mu-plugins/` : Must-Use Plugins for CPTs
* `templates/` : Page templates for surveys, My Surveys, etc.

---

## User Guides

### Administrator Guide

Admins have full access in WP Admin:

* Manage users
* Configure site
* View all surveys and questions
* Review student responses

### Instructor Guide

Instructors can:

1. Create surveys
2. Add questions
3. Edit surveys
4. View responses

**Creating a survey:**

* Surveys -> Add New -> Title -> Publish

**Adding questions:**

* Questions -> Add New -> Link to Survey -> Publish

### Student Guide

Students can:

* Register as student
* View surveys
* Submit responses
* See completed surveys

---

## Developer Guide

### Technical Stack

* WordPress 6.x
* PHP 8.x
* MySQL 8.x / MariaDB
* Modular child theme

### Important Modules

* `inc/roles.php`: Role and capability definitions
* `inc/dynamic-menu.php` : Dynamic menu shortcode
* `inc/auth-redirect.php` : Redirect logic based on roles

---

## Git Workflow

### Branch Strategy

* `main` -> production
* `develop` -> integration
* `feature/*` -> new features

### Typical Flow

```bash
git checkout develop
git pull
git checkout -b feature/my-feature
```

Commit and push with conventional messages (`feat:`, `fix:`, `docs:`).

---

## Troubleshooting

### CPTs Not Visible

* Check that `mu-plugins` files exist
* Regenerate permalinks

### Database Errors

* Verify `wp-config.php` settings
* Restart site in Local

---

## Conclusion & Support

You now have a complete high-level setup and usage guide for the Student Survey App.

For questions, bugs, or feature requests, please:

* Create a GitHub issue in this repo
* Follow the issue templates
* Provide screenshots and clear steps to reproduce

Happy developing!
