<?php
include('../includes/header.php');
include('../includes/config.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $product = $conn->query($sql)->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $expiry_date = $_POST['expiry_date'];

        // Image upload (optional)
        if ($_FILES['image']['name']) {
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/" . $image);
            $imageQuery = ", image = '$image'";
        } else {
            $imageQuery = "";
        }

        $sql = "UPDATE products SET name = '$name', description = '$description', price = '$price',
                stock = '$stock', expiry_date = '$expiry_date' $imageQuery WHERE id = '$id'";

        if ($conn->query($sql)) {
            header('Location: products.php');
            exit();
        } else {
            $error = "Failed to update product!";
        }
    }
} else {
    header('Location: products.php');
    exit();
}
?>

<h1>Edit Product</h1>

<?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

<form method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required>

    <label for="description">Description:</label>
    <textarea name="description" required><?php echo $product['description']; ?></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" value="<?php echo $product['price']; ?>" step="0.01" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required>

    <label for="expiry_date">Expiry Date:</label>
    <input type="date" name="expiry_date" value="<?php echo $product['expiry_date']; ?>" required>

    <label for="image">Product Image:</label>
    <input type="file" name="image">

    <button type="submit">Update Product</button>
</form>

<?php
include('../includes/footer.php');
?>
