<?php
include('../includes/header.php');
include('../includes/config.php');

// Get the product ID from the URL
$product_id = $_GET['id'];

// Query to get product details
$query = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
?>

<div class="container">
    <h1><?php echo $product['name']; ?></h1>
    <div class="product-details">
        <img src="../uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
        <p><?php echo $product['description']; ?></p>
        <p>Price: $<?php echo $product['price']; ?></p>
        <p>Expiry Date: <?php echo $product['expiry_date']; ?></p>
        <a href="cart.php?add=<?php echo $product['id']; ?>" class="btn btn-success">Add to Cart</a>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
