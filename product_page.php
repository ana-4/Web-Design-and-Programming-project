<?php
require ('./models/database.php');
require('./models/products_db.php');
require('./models/categories_db.php');

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$product = getProductById($id);
$categories = getCategories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Alexia Yung Mee CHINOTTI & Anna Barbara KROL">

    <Title>E-commerce Website</Title>

    <link rel="stylesheet" href="style_product_page.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');
    </style>

</head>

<body>

    <header>
        <div id="header_top">
        </div>

        <div id="header_center">
            <div id="selection_menu">
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
                <?php
                    if (!isset($_SESSION['user_id'])) { ?>
                        <a href="login.php"><img src="images/person_icon.svg" alt="blue icon of a person" id="person_icon"></a>
                    <?php } else { ?>
                        <form action="logout.php" method="GET" id="logout_form">
                            <button type="submit" id="logout_btn">Log out</button>
                        </form>
                    <?php } ?>
            </div>
        </div>

        <div id="header_bottom">
        </div>
    </header>

    <main>
        <div id="main_container">
            <img src="images/products/<?= htmlspecialchars($product['image']) ?>" alt="a picture of a <?= htmlspecialchars($product['name']) ?>" id="product_img">

            <div id="container">
                <section id="description">
                    <h2><?= htmlspecialchars($product['name']) ?></h2>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                </section>

                <section id="data">
                    <section id="information">
                        <p>Stock left: <?= $product['stock'] ?></p>
                        <p>Price: ¥<?= $product['price'] ?></p>
                    </section>

                    <?php if ($product['stock'] > 0) { ?>
                        <form action="add_to_cart.php" method="GET">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <section id="quantity">
                                <label for="quantity_input">Quantity: </label>
                                <input type="number" id="quantity_input" name="quantity" value="1" min="1" max="<?= $product['stock'] ?>">
                            </section>
                        
                            <button type="submit" id="cart_btn">
                                <img src="images/cart_icon.svg" alt="Cart icon">
                                <p>Add to cart</p>
                            </button>
                        </form>
                    <?php } ?>
                </section>
            </div>
        </div>
    </main>

    <footer>
        <p>Copyright &copy; FamilyMart Co., Ltd All Rights Reserved.</p>
    </footer>

</body>

</html>