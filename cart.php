<?php
require('./models/database.php');
require('./models/categories_db.php');

$categories = getCategories();

$cartItems = [
    [
        'id' => 1,
        'name' => 'Famichiki',
        'image' => "images/family_mart_logo.png" 
        'price' => 213,
        'quantity' => 1,
    ],
];

$subtotal = 0;
foreach ($cartItems as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$delivery = 400;
$total = $subtotal + $delivery;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Alexia Yung Mee CHINOTTI & Anna Barbara KROL">

    <Title>E-commerce Website</Title>

    <link rel="stylesheet" href="style_index.css">
    <link rel="stylesheet" href="style_cart.css">

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
        <div id="cart_page_container">
            <h2 id="cart_title">Your cart</h2>

            <table id="cart_table">
                <thead>
                    <tr>
                        <th class="product_name_col">Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td class="product_name_col">
                                <img src="images/products/<?= htmlspecialchars($item['image']) ?>" alt="picture of a <?= htmlspecialchars($item['name']) ?>" class="cart_product_img">
                                <span><?= htmlspecialchars($item['name']) ?></span>
                            </td>
                            <td>¥<?= $item['price'] ?></td>
                            <td>
                                <div class="quantity_control">
                                    <button type="button" class="qty_btn" id="minus_<?= $item['id'] ?>">-</button>
                                    <span class="qty_value" id="qty_<?= $item['id'] ?>"><?= $item['quantity'] ?></span>
                                    <button type="button" class="qty_btn" id="plus_<?= $item['id'] ?>">+</button>
                                </div>
                            </td>
                            <td><a href="#" class="delete_link" id="delete_<?= $item['id'] ?>">Delete</a></td>
                            <td>¥<?= $item['price'] * $item['quantity'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div id="cart_summary_wrapper">
                <div id="cart_summary_label">Cart summary</div>

                <div id="cart_summary_box">
                    <div class="summary_row">
                        <span>Subtotal</span>
                        <span>¥<?= $subtotal ?></span>
                    </div>
                    <div class="summary_row">
                        <span>Delivery</span>
                        <span>¥<?= $delivery ?></span>
                    </div>
                    <hr>
                    <div class="summary_row total_row">
                        <span>Total</span>
                        <span>¥<?= $total ?></span>
                    </div>
                </div>

                <button type="button" id="checkout_btn">Checkout</button>
            </div>
        </div>
    </main>

    <footer>
        <p>Copyright &copy; FamilyMart Co., Ltd All Rights Reserved.</p>
    </footer>

</body>

</html>