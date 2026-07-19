<?php
require('./models/database.php');
require('./models/carts_db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$productId = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
$action    = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

if ($productId) {
    $currentQuantity = getCartItemQuantity($_SESSION['user_id'], $productId);

    if ($action === 'increase') {
        updateCartQuantity($_SESSION['user_id'], $productId, $currentQuantity + 1);
    } elseif ($action === 'decrease') {
        updateCartQuantity($_SESSION['user_id'], $productId, $currentQuantity - 1);
    }
}

header('Location: cart.php');
exit;
?>