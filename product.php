<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Template - DispensarySA</title>
    <meta
      name="description"
      content="A simple HTML5 Template for new projects."
    />
    <meta name="Group 10" content="DispensarySA" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/shop.css" />
    <link rel="stylesheet" href="styles/product.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>

  <body>
    <nav class="navbar">
      <a href="landing.html" id="logo-text">DispensarySA</a>
      <div class="navbar-right">
        <a href="landing.html">Home <i class="fa fa-home"></i></a>
        <a class="navbar-active" href="shop.php">Shop <i class="fa fa-shopping-bag"></i></a>
        <a href="about_us.html">About <i class="fa fa-info-circle"></i></a>
        <a href="cart.php">Cart <i class="fa fa-shopping-cart"></i></a>
      </div>
    </nav>
    <div class="main-content">
      <div class="shop-header">
        <a href="shop.php">Shop</a>
        >
        <a href="shop.php">All Products</a>
        >
        <a href="">Product Name</a>
      </div>
      <div class="product-content">
        <?php
          require_once "lib/dbconn.php";

          $sql = 'SELECT * FROM Product WHERE product_id="' . $_GET["product_id"] . '";';

          if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
              global $product;
              $product = mysqli_fetch_assoc($result);
            }
            mysqli_free_result($result);
          }
          mysqli_close($conn);
        ?>
        <table class="content-table">
          <tr>
            <td class="center-image">
              <img class="product-image" src="img/prod/<?php echo preg_replace("/\s/", "-", strtolower($product["name"])); ?>.png" alt="">
            </td>
            <td>
              <div class="product-info">
                <h1><?php echo $product["name"]; ?></h1>
                <h2>$<?php echo $product["price"]; ?><span id="quantity"> / <?php echo $product["size"]; ?>g</span></h2>
                <p><?php echo $product["description"]; ?></p>
                <form action="lib/cart-add.php" method="POST">
                  <input type="hidden" name="product_id" value="<?php echo $product["product_id"]; ?>">
                  <input type="number" name="product_quantity" value="1" min="1">
                  <button><i class="fa fa-shopping-cart"></i> Add to cart</button>
                </form>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="footer">
      <table>
        <tr>
          <td>
            <h3>About</h3>
            <a href="about_us.html">About DispensarySA</a>
          </td>
          <td>
            <h3>Contact Us</h3>
            <p>Email: <a href="mailto:store@dispensarysa.com.au">store@dispensarysa.com.au</a></p>
            <p>Ph: <a href="tel:1800-420-420">1800 420 420</a></p>
          </td>
          <td>
            <h3>Follow Us</h3>
            <p><a href="https://www.facebook.com">Facebook</a></p>
            <p><a href="https://www.instagram.com">Instagram</a></p>
            <p><a href="https://www.twitter.com">Twitter</a></p>
          </td>
          <td>
            <h3>Location</h3>
            <p><a href="https://goo.gl/maps/rCKphGHHkdzFn4vJ6">420 King William Street</a></p>
            <p>Adelaide</p>
            <p>SA 5000</p>
          </td>
        </tr>
      </table>
      <div class="footer-base">
        <p>Copyright © 2021 Dispensary SA</p>
        <!-- <i class="fa fa-cc-visa"></i> -->
        <!-- <i class="fa fa-credit-card"></i> -->
      </div>
    </div>
  </body>
</html>
