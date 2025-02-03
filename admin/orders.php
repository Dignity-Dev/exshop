<?php
include('../includes/header.php');
include('../includes/config.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<h1>Manage Orders</h1>

<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($order = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['user_id']; ?></td>
                <td>$<?php echo number_format($order['total_price'], 2); ?></td>
                <td><?php echo $order['status']; ?></td>
                <td>
                    <a href="view_order.php?id=<?php echo $order['id']; ?>">View</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
include('../includes/footer.php');
?>
