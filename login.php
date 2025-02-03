<?php
include('includes/header.php');
include('includes/config.php');
include('includes/auth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    if (login($email, $password, $conn)) {
        header('Location: index.php');
        exit();
    } else {
        $error = "Invalid login credentials!";
    }
}
?>

<h1>User Login</h1>

<?php if (isset($error)) { ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php } ?>

<form method="POST" action="login.php">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="register.php">Register here</a></p>

<?php
include('includes/footer.php');
?>
