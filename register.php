<?php
include 'db.php';

$message = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        $message = "Email already registered!";
    } else {
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

        if (mysqli_query($conn, $query)) {
            header("Location: login.php");
            exit();
        } else {
            $message = "Registration failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Task Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="form-wrapper">
    <div class="form-card">
        <h2>Create Account</h2>

        <?php if ($message != "") { ?>
            <p class="message"><?php echo $message; ?></p>
        <?php } ?>

        <form method="POST">
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Create password" required>
            </div>

            <button type="submit" name="register" class="btn" style="width:100%;">
                Register
            </button>
        </form>

        <p class="footer-text">
            Already have an account?
            <a href="login.php">Login</a>
        </p>
    </div>
</div>

</body>
</html>