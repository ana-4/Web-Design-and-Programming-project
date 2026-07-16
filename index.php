<?php
require ('./models/database.php');
require('./models/categories_db.php');
require('./models/products_db.php');

$categories = getCategories();

if (isset($_GET['category']) && !empty($_GET['category'])) {
    $categoryId = intval($_GET['category']);
    $products = getProductsByCategory($categoryId); 
    $nbProduct = getNbProductsByCategory($categoryId);
} else {
    $products = getProducts();
    $nbProduct = getNbProducts();
}
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
            <div class="selection_menu">
                <button>Shop by categories ⌄</button>
                <div class="selection_elt">
                    <?php foreach ($categories as $category): ?>
                        <a href="index.php?category=<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="header_title">
                <a href="index.php">
                    <img src="images/family_mart_logo.png" alt="a small logo of FamilyMart">
                    <h1>FamilyMart</h1>
                </a>
            </div>

            <div id="page_links">
                <a href="cart.php"><img src="images/blue_cart_icon.svg" alt="blue icon of a cart" id="cart_icon"></a>
                <a href="login.php"><img src="images/person_icon.svg" alt="blue icon of a person" id="person_icon"></a>
            </div>
        </div>

        <div id="header_bottom">
        </div>
    </header>

    <main>
            <div id="main_container">
                <div id="container">
                    <?php 
                    $i = 0;
                    while ($product = $products->fetch()): 
                        $cardClass = ($i % 2 === 0) ? 'blue' : 'green';
                    ?>
                        <div class="card <?= $cardClass ?>">
                            <img src="images/products/<?= htmlspecialchars($product['image']) ?>" alt="picture of a <?= htmlspecialchars($product['name']) ?>" class="product_img">
                            <p class="price_product">¥<?= $product['price'] ?></p>
                            <h2><?= htmlspecialchars($product['name']) ?></h2>
                            <?php 
                                if (isset($_GET['user']) && !empty($_GET['user'])) { ?>
                                    <a href="product_page.php?id=<?= $product['id'] ?>">
                                        <img src="images/cart_icon.svg" alt="cart icon">
                                        <p>Add to cart</p>
                                    </a>
                                <?php } else { ?>
                                    <a href="login.php">
                                        <img src="images/cart_icon.svg" alt="cart icon">
                                        <p>Add to cart</p>
                                    </a>
                                <?php } ?>
                        </div>
                    <?php 
                        $i++;
                    endwhile; 
                    ?>
                </div>
            </div>
    </main>

    <footer>
        <p>Copyright &copy; FamilyMart Co., Ltd All Rights Reserved.</p>
    </footer>

</body>

</html>