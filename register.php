<?php
include('includes/header.php');
include('includes/config.php');
include('includes/auth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    // Validate email and password
    if (!validateEmail($email)) {
        $error = "Invalid email format!";
    } elseif (!validatePassword($password)) {
        $error = "Password must be at least 8 characters long and contain 1 uppercase letter and 1 number!";
    } else {
        if (register($username, $email, $password, $conn)) {
            header('Location: login.php');
            exit();
        } else {
            $error = "Registration failed, please try again!";
        }
    }
}
?>

<h1>User Registration</h1>

<?php if (isset($error)) { ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php } ?>

<form method="POST" action="register.php">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="login.php">Login here</a></p>

<?php
include('includes/footer.php');
?>
