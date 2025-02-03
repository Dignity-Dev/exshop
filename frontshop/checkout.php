<?php
include('../includes/header.php');
include('../includes/config.php');
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process checkout logic (e.g., insert order details into DB, clear cart)
    // Simulate successful order placement
    $_SESSION['cart'] = []; // Empty the cart
    header("Location: order_confirmation.php");
}
?>

<div class="container">
    <h1>Checkout</h1>
    <form method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Shipping Address</label>
            <input type="text" id="address" name="address" required class="form-control">
        </div>
        <div class="form-group">
            <label for="payment">Payment Method</label>
            <select id="payment" name="payment" required class="form-control">
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
