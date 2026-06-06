<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$total = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT COUNT(*) AS count FROM tasks WHERE user_id='$user_id'"
))['count'];

$completed = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT COUNT(*) AS count FROM tasks WHERE user_id='$user_id' AND status='Completed'"
))['count'];

$pending = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT COUNT(*) AS count FROM tasks WHERE user_id='$user_id' AND status='Pending'"
))['count'];

$today = date('Y-m-d');

$due_today = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT COUNT(*) AS count FROM tasks WHERE user_id='$user_id' AND due_date='$today'"
))['count'];

$completion_rate = 0;

if ($total > 0) {
    $completion_rate = round(($completed / $total) * 100);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | TaskFlow</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .home-container {
            padding: 40px 8%;
        }

        .home-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
        }

        .home-card {
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(18px);
            border-radius: 20px;
            padding: 28px;
            border: 1px solid rgba(255,255,255,0.18);
            min-height: 260px;
        }

        .home-card h2 {
            margin-bottom: 18px;
            color: #67e8f9;
        }

        .home-card p {
            color: #e5e7eb;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            color: #67e8f9;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 12px;
            color: #e5e7eb;
            line-height: 1.5;
        }

        .highlight {
            color: #67e8f9;
            font-weight: 700;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="logo">TaskFlow</div>

    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="add_task.php">Add Task</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="home-container">

    <div class="home-grid">

        <div class="home-card">
            <h2>User Profile</h2>

            <p><strong>Name:</strong> <?php echo $_SESSION['user_name']; ?></p>
            <p><strong>User ID:</strong> <?php echo $_SESSION['user_id']; ?></p>
            <p><strong>Status:</strong> Active User</p>
        </div>

        <div class="home-card">
            <h2>About TaskFlow</h2>

            <p>
                TaskFlow is a simple and efficient task management application
                that helps users organize daily work, manage deadlines,
                and track progress from one dashboard.
            </p>

            <p>
                It is useful for students, developers, interns, and professionals
                who want to plan tasks and complete work on time.
            </p>
        </div>

        <div class="home-card">
            <h2>Quick Statistics</h2>

            <p>Total Tasks: <span class="stat-number"><?php echo $total; ?></span></p>
            <p>Pending Tasks: <span class="stat-number"><?php echo $pending; ?></span></p>
            <p>Completed Tasks: <span class="stat-number"><?php echo $completed; ?></span></p>
            <p>Due Today: <span class="stat-number"><?php echo $due_today; ?></span></p>
            <p>Completion Rate: <span class="stat-number"><?php echo $completion_rate; ?>%</span></p>
        </div>

        <div class="home-card">
            <h2>How to Use This App</h2>

            <ul>
                <li>Click <span class="highlight">Add Task</span> to create a new task.</li>
                <li>Set task priority as Low, Medium, or High.</li>
                <li>Choose task status: Pending, In Progress, or Completed.</li>
                <li>Use due dates to remember important deadlines.</li>
                <li>Update or delete tasks from the dashboard anytime.</li>
            </ul>
        </div>

        <div class="home-card">
            <h2>Why Use TaskFlow?</h2>

            <ul>
                <li>Keeps all tasks in one place.</li>
                <li>Helps avoid missing deadlines.</li>
                <li>Makes it easy to identify pending and completed work.</li>
                <li>Improves daily planning and productivity.</li>
                <li>Useful for project work, study plans, and internship tasks.</li>
            </ul>
        </div>

        <div class="home-card">
            <h2>Application Features</h2>

            <ul>
                <li>User Registration and Login</li>
                <li>Create, Edit, and Delete Tasks</li>
                <li>Search Tasks by Title</li>
                <li>Filter Tasks by Status and Priority</li>
                <li>Track Due Today Tasks</li>
                <li>Dashboard Analytics</li>
            </ul>
        </div>

    </div>

</div>

</body>
</html>