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
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="shop.css" />
    <link rel="stylesheet" href="product.css" />
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
        <a class="navbar-active" href="shop.html">Shop <i class="fa fa-shopping-bag"></i></a>
        <a href="about_us.html">About <i class="fa fa-info-circle"></i></a>
        <a href="cart.html">Cart <i class="fa fa-shopping-cart"></i></a>
      </div>
    </nav>
    <div class="main-content">
      <div class="shop-header">
        <a href="shop.html">Shop</a>
        >
        <a href="shop.html">All Products</a>
        >
        <a href="#">Product Name</a>
      </div>
      <div class="product-content">
        <?php
          require_once "lib/dbconn.php";

          // preg_match("/([\?&]id=)([^&]+)/", $_SERVER["REQUEST_URI"], $matches); // Find the ?id=xxx parameter in the url

          $sql = 'SELECT id, price, quantity, name, description FROM Product WHERE id="' . $_GET["id"] . '";';

          // function product($id, $price, $quantity, $name, $description) {
          //   echo '<a id="prd" href="#" class="shop-item">';
          //   echo '<img src="img/placeholder.jpg" alt="">';
          //   echo '<h3 class="item-name">' . $name . '</h3>';
          //   echo '<h3 class="item-price">' . $price . '</h3>';
          //   echo '<p class="item-quantity">per' . $quantity . 'g</p>';
          //   echo '<button>Add to cart</button>';
          //   echo '</a>';
          // }

          if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              echo $row["id"] . " " . $row["name"];
            }
            mysqli_free_result($result);
          }
          mysqli_close($conn);
        ?>
      </div>
    </div>
    <div class="footer">
      <table>
        <tr>
          <td>
            <h3>About</h3>
            <p>Text and Logos</p>
          </td>
          <td>
            <h3>Contact Us</h3>
            <p>Email: store@dispensarysa.com.au</p>
            <p>Ph: 1800 420 420</p>
          </td>
          <td>
            <h3>Follow Us</h3>
            <p>Facebook</p>
            <p>Instagram</p>
            <p>Twitter</p>
          </td>
          <td>
            <h3>Location</h3>
            <p>0 King William Street</p>
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
