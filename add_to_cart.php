<?php
require ('./models/database.php');
require ('./models/carts_db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_GET, 'quantity', FILTER_VALIDATE_INT);

if ($id && $quantity && $quantity > 0) {
    addToCart($_SESSION['user_id'], $id, $quantity);
}

header('Location: cart.php');
exit;
?>
