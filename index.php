<?php
include('includes/header.php');
include('includes/config.php');

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<h1>Welcome to the E-commerce Frontshop</h1>

<div class="products">
    <?php while ($product = $result->fetch_assoc()) { ?>
        <div class="product">
            <img src="assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h3><?php echo $product['name']; ?></h3>
            <p><?php echo $product['description']; ?></p>
            <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
            <p>Stock: <?php echo $product['stock']; ?> units</p>
            <a href="product.php?id=<?php echo $product['id']; ?>">View Details</a>
        </div>
    <?php } ?>
</div>

<?php
include('includes/footer.php');
?>
