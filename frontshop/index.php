<?php
include('../includes/header.php');
include('../includes/config.php');

// Query to get all available products
$query = "SELECT * FROM products WHERE expiry_date > CURDATE() ORDER BY name ASC";
$result = mysqli_query($conn, $query);
?>

<div class="container">
    <h1>Welcome to Our Shop</h1>
    <div class="product-list">
        <?php while ($product = mysqli_fetch_assoc($result)) : ?>
            <div class="product-item">
                <img src="uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <p>Price: $<?php echo $product['price']; ?></p>
                <a href="frontshop/product.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">View Details</a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
