<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$search = "";
$status_filter = "";
$priority_filter = "";

$where = "WHERE user_id='$user_id'";

if (isset($_GET['search']) && $_GET['search'] != "") {
    $search = $_GET['search'];
    $where .= " AND title LIKE '%$search%'";
}

if (isset($_GET['status']) && $_GET['status'] != "") {
    $status_filter = $_GET['status'];
    $where .= " AND status='$status_filter'";
}

if (isset($_GET['priority']) && $_GET['priority'] != "") {
    $priority_filter = $_GET['priority'];
    $where .= " AND priority='$priority_filter'";
}

$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM tasks WHERE user_id='$user_id'"))['count'];

$pending = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM tasks WHERE user_id='$user_id' AND status='Pending'"))['count'];

$completed = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM tasks WHERE user_id='$user_id' AND status='Completed'"))['count'];

$today = date('Y-m-d');

$due_today = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM tasks WHERE user_id='$user_id' AND due_date='$today'"))['count'];

$completion_rate = 0;

if ($total > 0) {
    $completion_rate = round(($completed / $total) * 100);
}

$tasks = mysqli_query($conn, "SELECT * FROM tasks $where ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Task Management</title>
    <link rel="stylesheet" href="css/style.css">
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

<div class="dashboard">

    <div class="dashboard-header">
        <h2>Welcome, <?php echo $_SESSION['user_name']; ?></h2>
        <a href="add_task.php" class="btn" style="width:auto;">+ Add Task</a>
    </div>

    <div class="cards">

        <div class="card">
            <h3>Total Tasks</h3>
            <p><?php echo $total; ?></p>
        </div>

        <div class="card">
            <h3>Pending</h3>
            <p><?php echo $pending; ?></p>
        </div>

        <div class="card">
            <h3>Completed</h3>
            <p><?php echo $completed; ?></p>
        </div>

        <div class="card">
            <h3>Due Today</h3>
            <p><?php echo $due_today; ?></p>
        </div>

        <div class="card">
            <h3>Completion Rate</h3>
            <p><?php echo $completion_rate; ?>%</p>
        </div>

    </div>

    <div class="task-section">
        <h3>Your Tasks</h3>

        <form method="GET" class="filter-form">
            <input 
                type="text" 
                name="search" 
                placeholder="Search task by title..." 
                value="<?php echo $search; ?>"
            >

            <select name="status">
                <option value="">All Status</option>
                <option value="Pending" <?php if ($status_filter == "Pending") echo "selected"; ?>>Pending</option>
                <option value="In Progress" <?php if ($status_filter == "In Progress") echo "selected"; ?>>In Progress</option>
                <option value="Completed" <?php if ($status_filter == "Completed") echo "selected"; ?>>Completed</option>
            </select>

            <select name="priority">
                <option value="">All Priority</option>
                <option value="Low" <?php if ($priority_filter == "Low") echo "selected"; ?>>Low</option>
                <option value="Medium" <?php if ($priority_filter == "Medium") echo "selected"; ?>>Medium</option>
                <option value="High" <?php if ($priority_filter == "High") echo "selected"; ?>>High</option>
            </select>

            <button type="submit" class="btn filter-btn">Filter</button>
            <a href="dashboard.php" class="clear-btn">Clear</a>
        </form>

        <table class="task-table">
            <tr>
                <th>Title</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>

            <?php if (mysqli_num_rows($tasks) > 0) { ?>

                <?php while ($task = mysqli_fetch_assoc($tasks)) { ?>

                    <tr>
                        <td><?php echo $task['title']; ?></td>

                        <td>
                            <span class="badge <?php echo strtolower($task['priority']); ?>">
                                <?php echo $task['priority']; ?>
                            </span>
                        </td>

                        <td>
                            <span class="badge <?php echo strtolower(str_replace(' ', '', $task['status'])); ?>">
                                <?php echo $task['status']; ?>
                            </span>
                        </td>

                        <td><?php echo $task['due_date']; ?></td>

                        <td>
                            <a href="edit_task.php?id=<?php echo $task['id']; ?>" class="action-btn edit">
                                Edit
                            </a>

                            <a href="delete_task.php?id=<?php echo $task['id']; ?>" 
                               class="action-btn delete"
                               onclick="return confirm('Are you sure you want to delete this task?')">
                                Delete
                            </a>
                        </td>
                    </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="5">No tasks found.</td>
                </tr>

            <?php } ?>

        </table>
    </div>

</div>

</body>
</html>