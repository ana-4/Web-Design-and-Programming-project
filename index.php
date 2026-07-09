<?php
require './model/database.php';
require('./model/categories_db.php');

$categories = getCategories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Alexia Yung Mee CHINOTTI & Anna Barbara KROL">

    <Title>E-commerce Website</Title>

    <link rel="stylesheet" href="style_index.css">

</head>

<body>

    <header>
        <div id="header_top">
        </div>

        <div id="header_center">
            <button>Shop by categories ⌄</button>

            <div id="header_title">
                <img src="images/family_mart_logo.png" alt="a small logo of FamilyMart">
                <h1>FamilyMart</h1>
            </div>

            <div id="page_links">
                <a href="cart.html"><img src="images/blue_cart_icon.svg" alt="blue icon of a cart" id="cart_icon"></a>
                <a href="login.html"><img src="images/person_icon.svg" alt="blue icon of a person" id="person_icon"></a>
            </div>
        </div>

        <div id="header_bottom">
        </div>
    </header>

    <main>
        <div id="main_container">
            <div id="container">
            </div>
        </div>
    </main>

    <footer>
        <p>Copyright &copy; FamilyMart Co., Ltd All Rights Reserved.</p>
    </footer>

</body>

</html>