<?php

function getCartItems($userId) {
    global $db;
    $query = 'SELECT c.product_id, c.quantity, p.name, p.price, p.image, p.stock
              FROM carts c
              JOIN products p ON p.id = c.product_id
              WHERE c.user_id = :user_id
              ORDER BY p.name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchAll();
}

function getCartItemQuantity($userId, $productId) {
    global $db;
    $query = 'SELECT quantity FROM carts WHERE user_id = :user_id AND product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindValue(':product_id', $productId, PDO::PARAM_INT);
    $statement->execute();
    $row = $statement->fetch();
    return $row ? (int) $row['quantity'] : 0;
}

function addToCart($userId, $productId, $quantity) {
    $existingQuantity = getCartItemQuantity($userId, $productId);

    if ($existingQuantity > 0) {
        updateCartQuantity($userId, $productId, $existingQuantity + $quantity);
        return;
    }

    global $db;
    $query = 'INSERT INTO carts (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)';
    $statement = $db->prepare($query);
    $statement->execute([
        ':user_id'    => $userId,
        ':product_id' => $productId,
        ':quantity'   => $quantity,
    ]);
}

function updateCartQuantity($userId, $productId, $quantity) {
    if ($quantity < 1) {
        removeFromCart($userId, $productId);
        return;
    }

    global $db;
    $query = 'UPDATE carts SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->execute([
        ':quantity'   => $quantity,
        ':user_id'    => $userId,
        ':product_id' => $productId,
    ]);
}

function removeFromCart($userId, $productId) {
    global $db;
    $query = 'DELETE FROM carts WHERE user_id = :user_id AND product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->execute([
        ':user_id'    => $userId,
        ':product_id' => $productId,
    ]);
}

?>