<?php
include('../includes/header.php');
include('../includes/config.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

$sql = "SELECT * FROM products WHERE expiry_date < CURDATE() + INTERVAL 7 DAY";
$result = $conn->query($sql);
?>

<h1>Expiring Products</h1>

<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Expiry Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($product = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['expiry_date']; ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
include('../includes/footer.php');
?>
