<?php
$dsn      = 'mysql:host=172.21.82.206;dbname=z126004;charset=utf8';
$username = 'z126004';
$password = '9056';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('<p style="color:red">Database connection failed: ' . $e->getMessage() . '</p>');
}
?>
