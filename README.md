# TaskFlow - Task Management Application

A full-stack Task Management Web Application built using PHP, MySQL, HTML, CSS, and JavaScript.

TaskFlow helps users organize daily tasks, manage deadlines, track progress, and improve productivity through an intuitive dashboard.

# Features

- User Registration & Login
- Secure Authentication using PHP Sessions
- Create New Tasks
- Edit Existing Tasks
- Delete Tasks
- Search Tasks by Title
- Filter Tasks by Status
- Filter Tasks by Priority
- Dashboard Analytics
- Due Date Tracking
- Responsive Design for Desktop and Mobile

# Application Modules

## Home Page

- User Profile
- Application Overview
- Quick Statistics
- How to Use the Application
- Application Features

## Dashboard

- Total Tasks
- Pending Tasks
- Completed Tasks
- Due Today Tasks
- Completion Rate

## Task Management

- Add Task
- Edit Task
- Delete Task
- Search Task
- Filter Task

# Technology Used

## Frontend

- HTML5
- CSS3
- JavaScript

## Backend

- PHP

## Database

- MySQL

## Server

- Apache (XAMPP)

# Database Structure

## Users Table

| Column | Type |
|----------|----------|
| id | INT |
| name | VARCHAR |
| email | VARCHAR |
| password | VARCHAR |

## Tasks Table

| Column | Type |
|----------|----------|
| id | INT |
| user_id | INT |
| title | VARCHAR |
| description | TEXT |
| priority | VARCHAR |
| status | VARCHAR |
| due_date | DATE |
| created_at | TIMESTAMP |

# Project Setup

## Step 1: Download Project

Clone the repository:

```bash
git clone https://github.com/ShaliniPrakash-907/task-management-app.git
```

Or download the ZIP file from GitHub.

## Step 2: Move Project Folder

Copy the project folder into:

```text
xampp/htdocs/
```

Example:

```text
xampp/htdocs/task-management-app
```

## Step 3: Start XAMPP

Start the following services from the XAMPP Control Panel:

- Apache
- MySQL

## Step 4: Create Database

Open:

```text
http://localhost/phpmyadmin
```

Create a database named:

```sql
task_management
```

## Step 5: Import Database

Import:

```text
task_management.sql
```

using phpMyAdmin.

## Step 6: Configure Database Connection

Open:

```php
db.php
```

Update credentials if required:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "task_management";
```

## Step 7: Run Application

Open your browser and visit:

```text
http://localhost/task-management-app
```

# How to Use

## Register

1. Click Register.
2. Create a new account.
3. Login using your credentials.

## Add Task

1. Click Add Task.
2. Enter:
   - Task Title
   - Description
   - Priority
   - Status
   - Due Date
3. Save the task.

## Manage Tasks

- Edit existing tasks.
- Delete completed tasks.
- Search tasks by title.
- Filter tasks by status or priority.

## Dashboard

Monitor:

- Total Tasks
- Pending Tasks
- Completed Tasks
- Due Today Tasks
- Completion Rate

# Expected Outcome

This project demonstrates:

- Full Stack Web Development
- User Authentication
- CRUD Operations
- Database Integration
- Dashboard Analytics
- Responsive UI Design

# Author

Shalini P

M.Sc Integrated Computer Science

College of Engineering, Guindy (CEG)
