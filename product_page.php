
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Alexia Yung Mee CHINOTTI & Anna Barbara KROL">

    <Title>E-commerce Website</Title>

    <link rel="stylesheet" href="style_product_page.css">

</head>

<body>

    <header>
        <div id="header_top">
        </div>

        <div id="header_center">
            <div class="selection_menu">
                <button>Shop by categories ⌄</button>
                <div class="selection_elt">
                    <!-- Onclick : update la variable productList selon la categorieId ou ouvrir une nouvelle page -->
                    <a>Sweets</a>
                    <a>Soups</a>
                    <a>Drinks</a>
                </div>
            </div>

            <div id="header_title">
                <a href="index.php">
                    <img src="images/family_mart_logo.png" alt="a small logo of FamilyMart">
                    <h1>FamilyMart</h1>
                </a>
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
            <img src="images/famichiki_temp.jpg" alt="a picture of a Famichiki" id="product_img">

            <div id="container">
                <section id="description">
                    <h2>Famichiki</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </section>

                <section id="data">
                    <section id="information">
                        <p>Stock left: 5</p>
                        <p>Price: ¥213</p>
                    </section>

                    <section id="quantity">
                        <p>Quantity: </p>

                        <div id="counter">
                            <a>+</a><!-- Mettre un onclick pour updater la variable et l'affichage -->
                            <p>1</p><!-- Mettre sous la forme d'une variable -->
                            <a>-</a>
                        </div>

                    </section>
                    <!-- Rajouter un productId et un quantity en param -->
                    <a href="add_to_cart.php" id="cart">
                        <img src="images/cart_icon.svg">
                        <p>Add to cart</p>
                    </a>
                </section>
            </div>
        </div>
    </main>

    <footer>
        <p>Copyright &copy; FamilyMart Co., Ltd All Rights Reserved.</p>
    </footer>

</body>

</html>