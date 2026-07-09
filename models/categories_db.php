<?php
function getCategories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}
?>