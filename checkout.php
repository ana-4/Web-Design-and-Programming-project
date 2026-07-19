<?php
require('./models/database.php');
require('./models/categories_db.php');
require('./models/carts_db.php');
require('./models/transactions_db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: cart.php');
    exit;
}

$categories = getCategories();
$userId = $_SESSION['user_id'];
$cartItems = getCartItems($userId);

if (empty($cartItems)) {
    header('Location: cart.php');
    exit;
}

$errorMessage = '';
$orderPlaced = false;

try {
    $db->beginTransaction();

    foreach ($cartItems as $item) {
        if (!decreaseProductStock($item['product_id'], $item['quantity'])) {
            throw new Exception('Sorry, "' . $item['name'] . '" no longer has enough stock.');
        }

        createTransaction($userId, $item['product_id'], $item['quantity']);
        removeFromCart($userId, $item['product_id']);
    }

    $db->commit();
    $orderPlaced = true;
} catch (Exception $e) {
    $db->rollBack();
    $errorMessage = $e->getMessage();
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
    <link rel="stylesheet" href="style_checkout.css">

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
                <form action="logout.php" method="GET" id="logout_form">
                    <button type="submit" id="logout_btn">Log out</button>
                </form>
            </div>
        </div>

        <div id="header_bottom">
        </div>
    </header>

    <main>
        <div id="checkout_message_container">
            <?php if ($orderPlaced): ?>
                <h2>Thank you for your order!</h2>
                <p>Your order has been placed successfully.</p>
                <a href="index.php" class="back_link">Continue shopping</a>
            <?php else: ?>
                <h2>Checkout failed</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
                <a href="cart.php" class="back_link">Back to cart</a>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>Copyright &copy; FamilyMart Co., Ltd All Rights Reserved.</p>
    </footer>

</body>

</html>