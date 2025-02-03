<?php
include('../includes/header.php');
include('../includes/config.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

$sql = "SELECT * FROM products WHERE stock < 10"; // Example threshold of 10 units
$result = $conn->query($sql);
?>

<h1>Low-stock Products</h1>

<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($product = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['stock']; ?> units</td>
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

