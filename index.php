
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
            <div id="container">
                <!-- Comment bien alterner les couleurs selon la taille de l'écran ? (Calculer combien on peut en mettre max ?) -->
                <div class="card blue">
                    <img src="images/famichiki_temp.jpg" alt="picture of a Famichiki" class="product_img">
                    <p class="price_product">Price</p>
                    <h2>Name</h2>
                    <!-- Rajouter un productId en param -->
                    <a href="product_page.php">
                        <img src="images/cart_icon.svg">
                        <p>Add to cart</p>
                    </a>
                </div>
                <div class="card green">
                    <img src="images/famichiki_temp.jpg" alt="picture of a Famichiki" class="product_img">
                    <p class="price_product">Price</p>
                    <h2>Name</h2>
                    <a href="product_page.php">
                        <img src="images/cart_icon.svg">
                        <p>Add to cart</p>
                    </a>
                </div>
                <div class="card blue">
                    <img src="images/famichiki_temp.jpg" alt="picture of a Famichiki" class="product_img">
                    <p class="price_product">Price</p>
                    <h2>Name</h2>
                    <a href="product_page.php">
                        <img src="images/cart_icon.svg">
                        <p>Add to cart</p>
                    </a>
                </div>
                <div class="card green">
                    <img src="images/famichiki_temp.jpg" alt="picture of a Famichiki" class="product_img">
                    <p class="price_product">Price</p>
                    <h2>Name</h2>
                    <a href="product_page.php">
                        <img src="images/cart_icon.svg">
                        <p>Add to cart</p>
                    </a>
                </div>
                <div class="card blue">
                    <img src="images/famichiki_temp.jpg" alt="picture of a Famichiki" class="product_img">
                    <p class="price_product">Price</p>
                    <h2>Name</h2>
                    <a href="product_page.php">
                        <img src="images/cart_icon.svg">
                        <p>Add to cart</p>
                    </a>
                </div>
                <div class="card green">
                    <img src="images/famichiki_temp.jpg" alt="picture of a Famichiki" class="product_img">
                    <p class="price_product">Price</p>
                    <h2>Name</h2>
                    <a href="product_page.php">
                        <img src="images/cart_icon.svg">
                        <p>Add to cart</p>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>Copyright &copy; FamilyMart Co., Ltd All Rights Reserved.</p>
    </footer>

</body>

</html>