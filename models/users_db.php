<?php

function getUserByEmail($email) {
    global $db;
    $query = 'SELECT * FROM users WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function emailExists($email) {
    global $db;
    $query = 'SELECT id FROM users WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    return $statement->fetch() !== false;
}

function createUser($name, $email, $password) {
    global $db;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
    $statement = $db->prepare($query);
    $statement->execute([
        ':name'     => $name,
        ':email'    => $email,
        ':password' => $hashedPassword,
    ]);

    return $db->lastInsertId();
}

?>