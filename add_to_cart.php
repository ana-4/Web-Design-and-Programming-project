<?php
require 'database.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_GET, 'quantity', FILTER_VALIDATE_INT);

$stmt = $db->prepare('INSERT INTO carts (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)');
$stmt = $db->prepare($sql);
$stmt->execute([
    ':user_id' => 1,
    ':product_id' => $id,
    ':quantity' => $quantity,
    ]);
header('Location: index.php');
exit;
?>
