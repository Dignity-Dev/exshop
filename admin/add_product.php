<?php
include('../includes/header.php');
include('../includes/config.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $expiry_date = $_POST['expiry_date'];
    $image = $_FILES['image']['name'];

    // Image upload
    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/" . $image);

    $sql = "INSERT INTO products (name, description, price, stock, expiry_date, image)
            VALUES ('$name', '$description', '$price', '$stock', '$expiry_date', '$image')";

    if ($conn->query($sql)) {
        header('Location: products.php');
        exit();
    } else {
        $error = "Failed to add product!";
    }
}
?>

<h1>Add New Product</h1>

<?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

<form method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" required>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" required>

    <label for="expiry_date">Expiry Date:</label>
    <input type="date" name="expiry_date" required>

    <label for="image">Product Image:</label>
    <input type="file" name="image" required>

    <button type="submit">Add Product</button>
</form>

<?php
include('../includes/footer.php');
?>
