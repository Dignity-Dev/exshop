<?php
include('../includes/header.php');
include('../includes/config.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

$productCount = $conn->query("SELECT COUNT(*) AS count FROM products")->fetch_assoc()['count'];
$orderCount = $conn->query("SELECT COUNT(*) AS count FROM orders")->fetch_assoc()['count'];
$expiryCount = $conn->query("SELECT COUNT(*) AS count FROM products WHERE expiry_date < CURDATE() + INTERVAL 7 DAY")->fetch_assoc()['count'];

?>

<h1>Admin Dashboard</h1>

<div class="admin-dashboard">
    <p>Total Products: <?php echo $productCount; ?></p>
    <p>Total Orders: <?php echo $orderCount; ?></p>
    <p>Products Expiring Soon: <?php echo $expiryCount; ?></p>

    <h2>Manage Products</h2>
    <a href="products.php">View Products</a> | <a href="add_product.php">Add New Product</a>

    <h2>Manage Orders</h2>
    <a href="orders.php">View Orders</a>

    <h2>Expiry Alerts</h2>
    <a href="expiry_alerts.php">View Expiring Products</a>
</div>

<?php
include('../includes/footer.php');
?>
