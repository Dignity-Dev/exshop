<?php
// Sanitize input data
function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Check if a product is expired
function isExpired($expiry_date) {
    return (strtotime($expiry_date) < time()) ? true : false;
}

// Format date for display
function formatDate($date) {
    return date("F j, Y", strtotime($date));
}
?>
