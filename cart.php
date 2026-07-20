<?php
require('./models/database.php');
require('./models/categories_db.php');
require('./models/carts_db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$categories = getCategories();
$cartItems = getCartItems($_SESSION['user_id']);

$subtotal = 0;
foreach ($cartItems as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$delivery = empty($cartItems) ? 0 : 400;
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
                <form action="logout.php" method="GET" id="logout_form">
                    <button type="submit" id="logout_btn">Log out</button>
                </form>
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
                        <th>Product Name</th>
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
                                    <form action="update_cart.php" method="GET" class="qty_form">
                                        <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                        <input type="hidden" name="action" value="decrease">
                                        <button type="submit" class="qty_btn">-</button>
                                    </form>
                                    <span class="qty_value"><?= $item['quantity'] ?></span>
                                    <form action="update_cart.php" method="GET" class="qty_form">
                                        <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                        <input type="hidden" name="action" value="increase">
                                        <button type="submit" class="qty_btn">+</button>
                                    </form>
                                </div>
                            </td>
                            <td><a href="delete_from_cart.php?product_id=<?= $item['product_id'] ?>" class="delete_link">Delete</a></td>
                            <td>¥<?= $item['price'] * $item['quantity'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php if (empty($cartItems)): ?>
                <p id="empty_cart_message">Your cart is empty.</p>
            <?php endif; ?>

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

                <form action="checkout.php" method="POST">
                    <button type="submit" id="checkout_btn" <?= empty($cartItems) ? 'disabled' : '' ?>>Checkout</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>Copyright &copy; FamilyMart Co., Ltd All Rights Reserved.</p>
    </footer>

</body>

</html>