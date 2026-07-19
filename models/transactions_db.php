<?php

function createTransaction($userId, $productId, $quantity) {
    global $db;
    $query = 'INSERT INTO transaction (product_id, user_id, quantity, date) VALUES (:product_id, :user_id, :quantity, NOW())';
    $statement = $db->prepare($query);
    $statement->execute([
        ':product_id' => $productId,
        ':user_id'    => $userId,
        ':quantity'   => $quantity,
    ]);
}

function decreaseProductStock($productId, $quantity) {
    global $db;
    $query = 'UPDATE products SET stock = stock - :quantity WHERE id = :id AND stock >= :quantity';
    $statement = $db->prepare($query);
    $statement->execute([
        ':quantity' => $quantity,
        ':id'       => $productId,
    ]);
    return $statement->rowCount() > 0;
}

?>