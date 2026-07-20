<?php
require('./models/database.php');
require('./models/categories_db.php');
require('./models/users_db.php');

$categories = getCategories();
$error = '';
$name = '';
$email = '';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name            = trim($_POST['name'] ?? '');
    $email           = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password        = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($name === '' || !$email || $password === '') {
        $error = 'Please fill in all fields with a valid email.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } elseif (emailExists($email)) {
        $error = 'An account with this email already exists.';
    } else {
        $userId = createUser($name, $email, $password);
        $_SESSION['user_id']   = $userId;
        $_SESSION['user_name'] = $name;

        header('Location: index.php');
        exit;
    }
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
    <link rel="stylesheet" href="style_login.css">
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
                <a href="login.php"><img src="images/person_icon.svg" alt="blue icon of a person" id="person_icon"></a>
            </div>
        </div>

        <div id="header_bottom">
        </div>
    </header>

    <main>
        <div id="login_page_container">
            <div class="login_card">
                <h2>Create Account</h2>

                <?php if ($error): ?>
                    <p class="login_error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

                <form action="signup.php" method="POST" id="login_form">
                    <div class="login_form_box">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>

                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" value="<?= $email ? htmlspecialchars($email) : '' ?>" required>

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>

                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>

                    <button type="submit" class="login_btn">Sign up</button>
                </form>

                <p class="signup_text">Already have an account? <a href="login.php">Log in</a></p>
            </div>
        </div>
    </main>

    <footer>
        <p>Copyright &copy; FamilyMart Co., Ltd All Rights Reserved.</p>
    </footer>

</body>

</html>