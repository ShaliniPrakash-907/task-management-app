<?php
session_start();
include 'db.php';

$message = "";

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) > 0) {

        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            header("Location: dashboard.php");
            exit();

        } else {
            $message = "Invalid Password!";
        }

    } else {
        $message = "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Task Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="form-wrapper">

    <div class="form-card">

        <h2>Welcome Back</h2>
        <p class="subtitle">Login to manage your tasks</p>

        <?php if(!empty($message)) { ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php } ?>

        <form method="POST">

            <div class="input-group">
                <label>Email Address</label>
                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                >
            </div>

            <div class="input-group">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <button type="submit" name="login" class="btn">
                Login
            </button>

        </form>

        <p class="footer-text">
            Don't have an account?
            <a href="register.php">Register</a>
        </p>

    </div>

</div>

</body>
</html>