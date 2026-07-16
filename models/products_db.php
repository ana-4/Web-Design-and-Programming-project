<?php
function getProducts() {
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function getProductsByCategory($id) {
    global $db;
    $query = 'SELECT * FROM products WHERE category_id = :category_id ORDER BY name';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $id);
    $statement->execute();
    return $statement;    
}

function getNbProducts() {
    global $db;
    $query = $db->query('SELECT COUNT(*) AS total FROM products');
    $count = $query->fetch(PDO::FETCH_ASSOC);
    return $count;    
}

function getNbProductsByCategory($id) {
    global $db;
    $query = 'SELECT COUNT(*) AS total FROM products WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $id);
    $statement->execute();  
    $count = $statement->fetch(PDO::FETCH_ASSOC);
    return $count;    
}

function getProductById($id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE id = :id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();    
    $product = $statement->fetch();
    $statement->closeCursor();    
    return $product;
}
?>