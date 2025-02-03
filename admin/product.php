<?php
include('../includes/header.php');
include('../includes/config.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<h1>Manage Products</h1>

<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($product = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td>$<?php echo number_format($product['price'], 2); ?></td>
                <td><?php echo $product['stock']; ?> units</td>
                <td>
                    <a href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a> |
                    <a href="delete_product.php?id=<?php echo $product['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
include('../includes/footer.php');
?>
