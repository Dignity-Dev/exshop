<?php
include('includes/header.php');
include('includes/config.php');

// Ensure the user is an admin
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

// Fetch the total number of products and orders for the admin dashboard
$productCount = $conn->query("SELECT COUNT(*) AS count FROM products")->fetch_assoc()['count'];
$orderCount = $conn->query("SELECT COUNT(*) AS count FROM orders")->fetch_assoc()['count'];
?>

<h1>Admin Dashboard</h1>

<div class="admin-dashboard">
    <p>Total Products: <?php echo $productCount; ?></p>
    <p>Total Orders: <?php echo $orderCount; ?></p>

    <h2>Manage Products</h2>
    <a href="admin/products.php">View Products</a>

    <h2>Manage Orders</h2>
    <a href="admin/orders.php">View Orders</a>

    <h2>Expiry Alerts</h2>
    <a href="admin/expiry_alerts.php">Manage Expiry Alerts</a>
</div>

<?php
include('includes/footer.php');
?>
