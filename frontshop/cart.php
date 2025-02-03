<?php
include('../includes/header.php');
include('../includes/config.php');

// Initialize session if not already started
session_start();

// If the add to cart action is triggered
if (isset($_GET['add'])) {
    $product_id = $_GET['add'];
    // Logic to add product to cart in session
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

// Query to get the products in the cart
$cart_items = [];
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $query = "SELECT * FROM products WHERE id = $product_id";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);
        $product['quantity'] = $quantity;
        $cart_items[] = $product;
    }
}
?>

<div class="container">
    <h1>Your Shopping Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart_items as $item) : ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo $item['price']; ?></td>
                    <td>$<?php echo $item['price'] * $item['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
</div>

<?php include('../includes/footer.php'); ?>
