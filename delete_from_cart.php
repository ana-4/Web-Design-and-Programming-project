<?php
require('./models/database.php');
require('./models/carts_db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$productId = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);

if ($productId) {
    removeFromCart($_SESSION['user_id'], $productId);
}

header('Location: cart.php');
exit;
?>