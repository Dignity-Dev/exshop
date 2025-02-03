<?php
session_start();
?>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="frontshop/index.php">Shop</a></li>
        <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] == 'admin') { ?>
            <li><a href="admin/index.php">Admin Dashboard</a></li>
        <?php } ?>
        <?php if (isset($_SESSION['user_id'])) { ?>
            <li><a href="orders/view_orders.php">My Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php } ?>
    </ul>
</nav>
