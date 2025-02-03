<?php
// Validate email format
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Validate password strength (at least 8 characters, 1 uppercase, 1 number)
function validatePassword($password) {
    return preg_match("/^(?=.*[A-Z])(?=.*\d).{8,}$/", $password);
}

// Validate product price
function validatePrice($price) {
    return is_numeric($price) && $price > 0;
}

// Validate product stock
function validateStock($stock) {
    return is_numeric($stock) && $stock >= 0;
}
?>
