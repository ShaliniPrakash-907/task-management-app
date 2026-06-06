<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_POST['add_task'])) {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];

    $query = "INSERT INTO tasks (user_id, title, description, priority, status, due_date)
              VALUES ('$user_id', '$title', '$description', '$priority', '$status', '$due_date')";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Task not added!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Task | Task Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">TaskFlow</div>
    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="form-wrapper">
    <div class="form-card">
        <h2>Add New Task</h2>
        <p class="subtitle">Create and track your work easily</p>

        <?php if ($message != "") { ?>
            <div class="message"><?php echo $message; ?></div>
        <?php } ?>

        <form method="POST">
            <div class="input-group">
                <label>Task Title</label>
                <input type="text" name="title" placeholder="Enter task title" required>
            </div>

            <div class="input-group">
                <label>Description</label>
                <textarea name="description" placeholder="Enter task description" rows="4"></textarea>
            </div>

            <div class="input-group">
                <label>Priority</label>
                <select name="priority">
                    <option value="Low">Low</option>
                    <option value="Medium" selected>Medium</option>
                    <option value="High">High</option>
                </select>
            </div>

            <div class="input-group">
                <label>Status</label>
                <select name="status">
                    <option value="Pending" selected>Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="input-group">
                <label>Due Date</label>
                <input type="date" name="due_date" required>
            </div>

            <button type="submit" name="add_task" class="btn">Add Task</button>
        </form>

        <p class="footer-text">
            <a href="dashboard.php">Back to Dashboard</a>
        </p>
    </div>
</div>

</body>
</html>