<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tasks WHERE id='$id' AND user_id='$user_id'");

if (mysqli_num_rows($result) == 0) {
    header("Location: dashboard.php");
    exit();
}

$task = mysqli_fetch_assoc($result);
$message = "";

if (isset($_POST['update_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];

    $query = "UPDATE tasks SET 
              title='$title',
              description='$description',
              priority='$priority',
              status='$status',
              due_date='$due_date'
              WHERE id='$id' AND user_id='$user_id'";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Task update failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Task | Task Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">TaskFlow</div>
    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="add_task.php">Add Task</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="form-wrapper">
    <div class="form-card">
        <h2>Edit Task</h2>
        <p class="subtitle">Update your task details</p>

        <?php if ($message != "") { ?>
            <div class="message"><?php echo $message; ?></div>
        <?php } ?>

        <form method="POST">
            <div class="input-group">
                <label>Task Title</label>
                <input type="text" name="title" value="<?php echo $task['title']; ?>" required>
            </div>

            <div class="input-group">
                <label>Description</label>
                <textarea name="description" rows="4"><?php echo $task['description']; ?></textarea>
            </div>

            <div class="input-group">
                <label>Priority</label>
                <select name="priority">
                    <option value="Low" <?php if($task['priority'] == 'Low') echo 'selected'; ?>>Low</option>
                    <option value="Medium" <?php if($task['priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
                    <option value="High" <?php if($task['priority'] == 'High') echo 'selected'; ?>>High</option>
                </select>
            </div>

            <div class="input-group">
                <label>Status</label>
                <select name="status">
                    <option value="Pending" <?php if($task['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                    <option value="In Progress" <?php if($task['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
                    <option value="Completed" <?php if($task['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                </select>
            </div>

            <div class="input-group">
                <label>Due Date</label>
                <input type="date" name="due_date" value="<?php echo $task['due_date']; ?>" required>
            </div>

            <button type="submit" name="update_task" class="btn">Update Task</button>
        </form>

        <p class="footer-text">
            <a href="dashboard.php">Back to Dashboard</a>
        </p>
    </div>
</div>

</body>
</html>