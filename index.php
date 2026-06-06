<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Task Management Application</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .hero {
            min-height: calc(100vh - 80px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .hero-content {
            max-width: 850px;
        }

        .hero h1 {
            font-size: 58px;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #38bdf8, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 20px;
            color: #cbd5e1;
            line-height: 1.8;
            margin-bottom: 35px;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .hero-btn {
            padding: 15px 35px;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            transition: 0.3s;
        }

        .login-btn {
            background: linear-gradient(135deg, #38bdf8, #8b5cf6);
            color: white;
        }

        .register-btn {
            border: 2px solid #38bdf8;
            color: #38bdf8;
        }

        .hero-btn:hover {
            transform: translateY(-3px);
        }

        .features {
            padding: 40px 8% 80px;
        }

        .features h2 {
            text-align: center;
            margin-bottom: 35px;
            font-size: 36px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .feature-card {
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(18px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.18);
        }

        .feature-card h3 {
            margin-bottom: 15px;
            color: #67e8f9;
        }

        .feature-card p {
            color: #cbd5e1;
            line-height: 1.6;
        }

        @media(max-width: 768px) {
            .hero h1 {
                font-size: 38px;
            }

            .hero p {
                font-size: 17px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="logo">TaskFlow</div>

    <div class="nav-links">
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
</nav>

<section class="hero">
    <div class="hero-content">

        <h1>Task Management Application</h1>

        <p>
            TaskFlow helps users create, update, delete, search, filter,
            and track tasks in one simple dashboard. It includes secure login,
            task priority management, due dates, and progress tracking.
        </p>

        <div class="hero-buttons">
            <a href="login.php" class="hero-btn login-btn">Login</a>
            <a href="register.php" class="hero-btn register-btn">Register</a>
        </div>

    </div>
</section>

<section class="features">
    <h2>About This Project</h2>

    <div class="feature-grid">

        <div class="feature-card">
            <h3>Authentication</h3>
            <p>Users can register, login, and manage only their own tasks.</p>
        </div>

        <div class="feature-card">
            <h3>Task CRUD</h3>
            <p>Create, view, edit, delete, search, and filter tasks easily.</p>
        </div>

        <div class="feature-card">
            <h3>Dashboard Tracking</h3>
            <p>Track total tasks, pending tasks, completed tasks, priority, and due dates.</p>
        </div>

    </div>
</section>

</body>
</html>